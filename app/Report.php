<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];
}
