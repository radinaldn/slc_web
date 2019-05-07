<?php

namespace App\Http\Controllers\API;

use App\User;
use App\OauthAccessToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\PasswordReset;
use File;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            OauthAccessToken::whereUserId($user->id)->delete();
            $success['id'] =  $user->id;
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            $success['isAdmin'] =  $user->isAdmin;
            if (empty($user->sqlite_backup)) {
              $success['sqlite_backup'] =  "0";
            }else{
              $success['sqlite_backup'] = 'http://192.168.43.71/slc/public/sqlite_backup/'.$user->sqlite_backup;
            }
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $userr=User::where('email', $request->email)->get();
        if ($userr->isEmpty()) {
            $validator = Validator::make($request->all(), [
           'name' => 'required',
           'email' => 'required|email',
           'password' => 'required',
           'c_password' => 'required|same:password',
       ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'error','data'=>$validator->errors()], 401);
            }

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] =  $user->createToken('nApp')->accessToken;
            $success['name'] =  $user->name;

            return response()->json(['status' => 'success','data'=>'Silahkan Login'], $this->successStatus);
        } else {
            return response()->json(['status' => 'error','data'=>'Email Telah Digunakan pada Akun Lain'], 422);
        }
    }

    public function update(Request $request)
    {
        $user=User::find(Auth::guard('api')->id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function logout()
    {
        $user = Auth::guard('api')->user();
        $name = $user->name;
        $user->token()->revoke();
        return response()->json(['success'=>"User $name is successfully logout"]);
    }

    public function backup(request $request)
    {
        $user=User::find(Auth::guard('api')->id());
        if (empty($user)) {
            return response()->json(['error'=>'Akun Anda Tidak Ditemukan'], 404);
        } else {
            $input = $request->all();
            if ($request->hasFile('sqlite_backup')) {
                $foto = $request->file('sqlite_backup');
                $ext = $foto->getClientOriginalExtension();

                if ($request->file('sqlite_backup')->isValid()) {
                    $foto_name = date('YmdHis').".$ext";
                    $upload_path = 'sqlite_backup';
                    $request->file('sqlite_backup')->move($upload_path, $foto_name);
                    $input['sqlite_backup'] = $foto_name;
                    $image_path = "sqlite_backup/".$user->sqlite_backup;  // Value is not URL but directory file path
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }
            $user->update($input);
            return response()->json(['success'=>'Data Anda Berhasil di Cadangkan'], $this->successStatus);
        }
    }

    public function createResetPass(Request $request)
    {
        $request->validate([
           'email' => 'required|string|email',
       ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
               'message' => "We can't find a user with that e-mail address."
           ], 404);
        }

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
               'email' => $user->email,
               'token' => str_random(6)
            ]
       );

        if ($user && $passwordReset) {
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
           );
        }

        return response()->json([
           'message' => 'We have e-mailed your password reset link!'
       ]);
    }
    public function findResetPass($token)
    {
        $passwordReset = PasswordReset::where('token', $token)
           ->first();

        if (!$passwordReset) {
            return response()->json([
               'message' => 'This password reset token is invalid.'
           ], 404);
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
               'message' => 'This password reset token is invalid.'
           ], 404);
        }

        return response()->json($passwordReset);
    }

    public function resetResetPass(Request $request)
    {
        $request->validate([
           'email' => 'required|string|email',
           'password' => 'required|string|confirmed',
           'token' => 'required|string'
       ]);

        $passwordReset = PasswordReset::where([
           ['token', $request->token],
           ['email', $request->email]
       ])->first();

        if (!$passwordReset) {
            return response()->json([
               'message' => 'This password reset token is invalid.'
           ], 409);
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            return response()->json([
               'message' => "We can't find a user with that e-mail address."
           ], 404);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        $passwordReset->delete();
        OauthAccessToken::whereUserId($user->id)->delete();

        $user->notify(new PasswordResetSuccess($passwordReset));

        return response()->json($user);
    }
}
