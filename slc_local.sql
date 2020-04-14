-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Mar 2020 pada 05.28
-- Versi server: 10.3.22-MariaDB-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mengkako_slc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_resto` int(10) UNSIGNED NOT NULL,
  `nama_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar_menu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL,
  `menu_deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.0',
  `suspend` int(1) NOT NULL DEFAULT 0,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `id_resto`, `nama_menu`, `harga`, `gambar_menu`, `status`, `menu_deskripsi`, `rating`, `suspend`, `deleted`, `created_at`, `updated_at`) VALUES
(25, 23, 'Burger Mozarella', 15000, '20181229095551.jpg', 1, 'Keju mozarella', '4.0', 0, 0, NULL, '2019-05-08 01:35:46'),
(26, 23, 'Steak Fries', 15000, '20181229100227.jpeg', 1, 'Steak dengan fries', '0.0', 0, 0, NULL, NULL),
(27, 20, 'Combo Box', 18000, '20181228185845.jpg', 1, 'Toping strawbery mix mango mix chocolate mix green mix cappucino mix blueberry', '0.0', 0, 0, NULL, NULL),
(28, 20, 'Muncrat Chocolate', 12000, '20181228185956.jpg', 1, 'Toping black chocolate', '0.0', 0, 0, NULL, NULL),
(29, 20, 'Muncrat Chocolate Keju', 18000, '20181228190110.jpg', 1, 'Topping chocolate mix keju mix milo', '0.0', 0, 0, NULL, NULL),
(30, 20, 'Muncrat Strawberry Milo', 15000, '20181228190218.jpg', 1, 'Topping strawbery mix milo', '0.0', 0, 0, NULL, NULL),
(31, 24, 'Bakwan mini', 5000, '20181228190848.jpg', 1, 'Satu mangkok 5 bola bakwan', '0.0', 0, 0, NULL, NULL),
(32, 24, 'Bakwan sedang', 12000, '20181228191032.jpg', 1, '12 bola bakwan', '0.0', 0, 0, NULL, NULL),
(33, 24, 'Jumbo bakwan', 16000, '20181228191251.png', 1, '1 mangkok bakwan 20 bola', '0.0', 0, 0, NULL, NULL),
(34, 24, 'Babol praktis', 15000, '20181228191453.jpg', 1, 'Isi praktis 10 bakwan bola', '0.0', 0, 0, NULL, NULL),
(35, 25, 'Burger Telur', 12000, '20181228144300.jpg', 1, 'Burger dengan telur dan saus special garasi cafe', '0.0', 0, 0, NULL, NULL),
(36, 25, 'Burger Daging Keju', 20000, '20181228144400.jpg', 1, 'Ekstra keju dan daging olahan', '0.0', 0, 0, NULL, NULL),
(37, 25, 'Burger Mozarella', 21000, '20181228144515.jpg', 1, 'Keju mozarella dengan daging ayam', '0.0', 0, 0, NULL, NULL),
(38, 25, 'Burger Souce', 15000, '20181228144620.jpg', 1, 'Sause cabai esktra pedas', '0.0', 0, 0, NULL, NULL),
(39, 25, 'Burger Chicken Nuget', 20000, '20181228144918.jpg', 1, 'Burger dengan isi ring chicken steak', '0.0', 0, 0, NULL, NULL),
(40, 25, 'Steak Chicken', 15000, '20181228145109.jpg', 1, 'Ayam dengan bumbu nusantara', '0.0', 0, 0, NULL, NULL),
(41, 25, 'Chicken Mozarella', 19000, '20181228145307.jpg', 1, 'Ayam dengan isi keju mozarella', '0.0', 0, 0, NULL, NULL),
(42, 25, 'Ayam Rica Rica + Nasi', 25000, '20181228145409.jpg', 1, 'Ayam bumbu pedaa rica rica', '0.0', 0, 0, NULL, NULL),
(43, 25, 'Fried Fries Chicken Mozarella', 15000, '20181228145627.jpg', 1, 'Kentang goreng dengan lumeran keju mozarella', '0.0', 0, 0, NULL, NULL),
(44, 26, 'Steak Ayam + Nasi', 20000, '20181228152018.jpg', 1, 'Ayam steak dengan nasi', '0.0', 0, 0, NULL, NULL),
(45, 26, 'Ayam Katsu + Fries', 22000, '20181228152148.jpg', 1, 'Ayam dengan bumbu katsu dengam tambah keju', '0.0', 0, 0, NULL, NULL),
(46, 26, 'Menu Hemat', 15000, '20181228152402.jpg', 1, 'Ayam goreng + nasi + soto + teh es', '0.0', 0, 0, NULL, NULL),
(47, 26, 'Ayam Teriaki Pedas', 22000, '20181228152531.jpg', 1, 'Ayam teriaki dengan nasi dan telur', '0.0', 0, 0, NULL, NULL),
(48, 27, 'Mie Goreng', 10000, '20181228192249.jpg', 1, 'Mie telur goreng', '0.0', 0, 0, NULL, NULL),
(49, 27, 'Mie Sagu Selat Panjang', 12000, '20181228192427.jpg', 1, 'Makanan melayu asli selat panjang dengan rempah pedas', '0.0', 0, 0, NULL, NULL),
(50, 27, 'Mie Aceh', 10000, '20181228192517.jpg', 1, 'Mie aceh dengan bumbu khas aceh', '0.0', 0, 0, NULL, NULL),
(51, 27, 'Milk Shake', 8000, '20181228192619.jpg', 1, 'Milk shake dengan keju dan vanila', '0.0', 0, 0, NULL, NULL),
(52, 27, 'Milk Shake Chocolate', 8000, '20181228192742.jpg', 1, 'Milk shake chocolate dengan topping chocolate', '0.0', 0, 0, NULL, NULL),
(53, 28, 'Ayam Besar Bakar Moody', 50000, '20181228193302.jpg', 1, 'Ayam besar dengan panggan BBQ', '0.0', 0, 0, NULL, NULL),
(54, 28, 'Mie Melayu', 15000, '20181228193350.jpg', 1, 'Mie sagu khas selat panjang', '0.0', 0, 0, NULL, NULL),
(55, 28, 'Nasi Kapsyah', 51000, '20181228193454.jpg', 1, 'Nasi rempah dengan ayam saus moody', '0.0', 0, 0, NULL, NULL),
(56, 29, 'Tawar Kupas Reguler', 15000, '20181228201357.jpg', 1, 'Roti dengan tiga gelas susu', '0.0', 0, 0, NULL, NULL),
(57, 29, 'Tawar kupas premium', 18000, '20181228201512.jpg', 1, 'Dengan empat gelas susu', '0.0', 0, 0, NULL, NULL),
(58, 29, 'Tawar Pandan Premium', 18500, '20181228201614.jpg', 1, 'Tawar dengan rasa pandang dan 3 gelas susu', '0.0', 0, 0, NULL, NULL),
(59, 29, 'Roti tawar reguler', 13500, '20181228201717.jpg', 1, 'Roti tawar dengan telur dan susu', '0.0', 0, 0, NULL, NULL),
(60, 29, 'Roda premium', 10200, '20181228201815.jpg', 1, 'Tawar dengan bentuk bundar untuk cornet yang lebih nikmat', '0.0', 0, 0, NULL, NULL),
(61, 29, 'Roti Siak', 45000, '20181228202002.jpg', 1, 'Roti kering dengan mentega di atasnya', '0.0', 0, 0, NULL, NULL),
(62, 29, 'Triangle Chicken', 8000, '20181228202207.jpg', 1, 'Roti lapis segi tiga isi ayam', '0.0', 0, 0, NULL, NULL),
(63, 29, 'Donat Sapi', 10000, '20181228202244.jpg', 1, 'Isi daging sapi', '0.0', 0, 0, NULL, NULL),
(64, 29, 'Donat Long Keju', 10000, '20181228202352.jpg', 1, 'Roti keju luar dan dalam', '0.0', 0, 0, NULL, NULL),
(65, 29, 'Abon Sapi', 11000, '20181228202442.jpg', 1, 'Roti rasa abon sapi', '0.0', 0, 0, NULL, NULL),
(66, 29, 'Donat Ayam', 10000, '20181228202529.jpg', 1, 'Donat isi ayam', '0.0', 0, 0, NULL, NULL),
(67, 29, 'Danish Kelapa', 8000, '20181228202622.jpg', 1, 'Roti lapis isi kelapa', '0.0', 0, 0, NULL, NULL),
(68, 29, 'Abon Ayam', 8000, '20181228202701.jpg', 1, 'Roti dengan taburan dan isi abon ayam', '0.0', 0, 0, NULL, NULL),
(69, 22, 'Super Besar 2', 30000, '20181228203504.jpg', 1, 'Dua ayam + Nasi + Pepsi', '0.0', 0, 0, NULL, NULL),
(70, 22, 'Super Besar 1', 25000, '20181228203603.jpg', 1, 'Dada + Nasi + Pepsi', '0.0', 0, 0, NULL, NULL),
(71, 22, 'Super Mantap', 20000, '20181228203702.png', 1, 'Paha + Nasi + Pepsi', '0.0', 0, 0, NULL, NULL),
(72, 22, 'Kombo Super Star', 55000, '20181228203856.png', 1, '2 Ayam besar + 2 Nasi + 2 Pepsi + 2 Es Krim', '0.0', 0, 0, NULL, NULL),
(73, 22, 'Super Family', 80000, '20181228204020.png', 1, '6 Ayam + 3 Nasi + 3 Pepsi', '0.0', 0, 0, NULL, NULL),
(74, 22, 'Pepsi 350ml', 9000, '20181228204221.png', 1, 'Pepsi soda', '0.0', 0, 0, NULL, NULL),
(75, 30, 'Ayam Bakar', 9000, '20181228205927.jpg', 1, 'Ayam bakar padang', '0.0', 0, 0, NULL, NULL),
(76, 30, 'Ayam Pop', 9000, '20181228210010.jpg', 1, 'Ayam pop', '0.0', 0, 0, NULL, NULL),
(77, 30, 'Ayam Goreng Bumbu', 9000, '20181228210131.jpg', 1, 'Ayam goreng bumbu kelapa', '0.0', 0, 0, NULL, NULL),
(78, 30, 'Asam Pedas', 10000, '20181228210407.jpg', 1, 'Ikan patin dengan bumbu asam pedas', '0.0', 0, 0, NULL, NULL),
(79, 30, 'Rendang Daging', 13000, '20181228210945.jpg', 1, 'Redang dengan bumbu sumatra barat', '0.0', 0, 0, NULL, NULL),
(80, 30, 'Telur Dadar Padang', 7000, '20181228211222.jpg', 1, 'Telur dadar padang', '0.0', 0, 0, NULL, NULL),
(81, 30, 'Ayam jengkol', 10000, '20190106173906.jpg', 1, 'Gulai jengkol nikmat', '0.0', 0, 0, NULL, NULL),
(82, 31, 'Ayam Bakar', 15000, '20181229093932.jpg', 1, 'Ayam bakar padang', '0.0', 0, 0, NULL, NULL),
(83, 31, 'Rendang Daging', 20000, '20181229094128.jpg', 1, 'Rendang daging bumbu khas sumatra barat', '0.0', 0, 0, NULL, NULL),
(84, 31, 'Asam Pedas', 15000, '20181229094222.jpg', 1, 'Ikan masak asam pedas', '0.0', 0, 0, NULL, NULL),
(85, 31, 'Ikan Balado', 15000, '20181229094315.jpg', 1, 'Ikan cabe merah', '0.0', 0, 0, NULL, NULL),
(86, 31, 'Rendang super', 25000, '20181229094416.jpeg', 1, 'Rendang khas raso situjuah', '0.0', 0, 0, NULL, NULL),
(87, 31, 'Teh Talua', 12000, '20181229094504.jpg', 1, 'Teh dengan campuran telur ayam', '0.0', 0, 0, NULL, NULL),
(88, 31, 'Air Mineral', 5000, '20181229094555.png', 1, 'Air mineral 350 ml', '0.0', 0, 0, NULL, NULL),
(89, 32, 'Rendang', 12000, '20181229101154.jpg', 1, 'Rendang Khas Sumatra Barat', '0.0', 0, 0, NULL, NULL),
(90, 32, 'Ikan balado', 10000, '20181229101233.jpg', 1, 'Ikan balado khas sumatra barat', '0.0', 0, 0, NULL, NULL),
(91, 32, 'Telur dadar padang', 8000, '20181229101349.jpg', 1, 'telur dadar khas sumatra barat', '0.0', 0, 0, NULL, NULL),
(92, 32, 'Telur Balado', 15000, '20181229101436.jpg', 1, 'Telur puyuh dengan sambal khas minang', '0.0', 0, 0, NULL, NULL),
(93, 32, 'Ayam Cabe', 15000, '20181229101531.jpg', 1, 'Ayam cabe hijau', '0.0', 0, 0, NULL, NULL),
(94, 32, 'Ayam  Bakar', 15000, '20181229101615.jpg', 1, 'Ayam bakar Padang', '0.0', 0, 0, NULL, NULL),
(95, 32, 'Ikan Bakar Padang', 20000, '20181229101712.jpg', 1, 'Ikan bakar padang', '0.0', 0, 0, NULL, NULL),
(96, 32, 'Air Mineral', 6000, '20181229101751.png', 1, 'Air putih mineral', '0.0', 0, 0, NULL, NULL),
(97, 32, 'Ayam Goreng', 12000, '20181229102026.jpg', 1, 'Ayam goreng bumbu', '0.0', 0, 0, NULL, NULL),
(98, 32, 'Dendeng Balado', 15500, '20181229102130.jpg', 1, 'Dendeng khas sumatra barat', '0.0', 0, 0, NULL, NULL),
(99, 32, 'Asam Padeh', 12000, '20181229102207.jpg', 1, 'Asam padeh', '0.0', 0, 0, NULL, NULL),
(100, 32, 'Ikan Balado', 12000, '20181229102239.jpg', 1, 'Ikan patin balado', '0.0', 0, 0, NULL, NULL),
(101, 33, 'Nasi Jagung', 45000, '20181228211620.png', 1, 'Nasi jagung', '0.0', 0, 0, NULL, NULL),
(102, 33, 'Roti Mozarella', 48000, '20181228211714.png', 1, 'Roti mozarela', '0.0', 0, 0, NULL, NULL),
(103, 33, 'La pasta', 30000, '20181228211807.png', 1, 'Pasta dengan saus spesial', '0.0', 0, 0, NULL, NULL),
(104, 33, 'Sea lover', 81000, '20181228211844.png', 1, NULL, '0.0', 0, 0, NULL, NULL),
(105, 33, 'Sosis', 71000, '20181228211940.png', 1, 'taburan sosis', '0.0', 0, 0, NULL, NULL),
(106, 33, 'Sosis Jamur', 80000, '20181228212021.png', 1, 'Taburan sosis dan jagung', '0.0', 0, 0, NULL, NULL),
(107, 33, 'Mozarella special', 90000, '20181228212115.png', 1, 'Keju mozarella di setiap gigitan', '0.0', 0, 0, NULL, NULL),
(108, 33, 'Nasi Nuget', 45000, '20181229100532.png', 1, 'Nasi dengan ayam nuget', '0.0', 0, 0, NULL, NULL),
(109, 33, 'Lemon Tea', 15000, '20181229100615.png', 1, 'Teh dengan ekstra lemon', '0.0', 0, 0, NULL, NULL),
(110, 33, 'Blueberry', 17000, '20181229100705.png', 1, 'Air dengan buah blueberry', '0.0', 0, 0, NULL, NULL),
(111, 33, 'Pepsi 600 ml', 15000, '20181229100749.png', 1, 'Minuman soda dengan rasa cola', '0.0', 0, 0, NULL, NULL),
(112, 33, 'Air Mineral 350 ml', 5000, '20181229100833.png', 1, 'Air mineral 350 ml', '0.0', 0, 0, NULL, NULL),
(113, 34, 'Ayam Bakar', 10000, '20181228212704.jpg', 1, 'Ayam bakar padang', '0.0', 0, 0, NULL, NULL),
(114, 34, 'Asam pade', 10000, '20181228212804.jpg', 1, 'Ikan patin asam pedas', '0.0', 0, 0, NULL, NULL),
(115, 34, 'Rendang daging', 12000, '20181228212840.jpg', 1, 'rendang padang', '0.0', 0, 0, NULL, NULL),
(116, 34, 'Dadar Padang', 8000, '20181228212920.jpg', 1, 'dadar pandang', '0.0', 0, 0, NULL, NULL),
(117, 34, 'Balado', 9000, '20181228213019.jpg', 1, 'Ikan laut', '0.0', 0, 0, NULL, NULL),
(118, 34, 'Ayam Balado', 10000, '20181229061037.jpg', 1, 'Sambal cabe hijau', '0.0', 0, 0, NULL, NULL),
(119, 34, 'Ayam Goreng', 8000, '20181229061129.jpg', 1, 'Ayam goreng bumbu', '0.0', 0, 0, NULL, NULL),
(120, 23, 'Air Mineral', 3900, '20181229095635.png', 1, 'Air putih mineral', '0.0', 0, 0, NULL, NULL),
(121, 23, 'Cajuan Butter Steak', 25000, '20181229095907.jpeg', 1, 'Butter steak', '0.0', 0, 0, NULL, NULL),
(122, 23, 'Grilled Flank Steak', 30000, '20181229100102.jpeg', 1, 'Steak bawang dengan ekstra jeruk nipis', '0.0', 0, 0, NULL, NULL),
(123, 23, 'Burger Premiun', 25000, '20181229100342.jpg', 1, 'Dengan daging dan balutan keju', '0.0', 0, 0, NULL, NULL),
(124, 35, 'Combo', 110000, '20181229064044.png', 1, '5 Dada dan 5 Paha', '0.0', 0, 0, NULL, NULL),
(125, 35, 'Reguler', 58000, '20181229064149.png', 1, '3 Dada dan 3 Paha', '0.0', 0, 0, NULL, NULL),
(126, 35, 'Super Besar 2', 52000, '20181229064333.jpg', 1, '2 Ayam besar + Nasi + Pepsi 350 ml', '0.0', 0, 0, NULL, NULL),
(127, 35, 'Super Besar 1', 49000, '20181229064452.jpg', 1, '1 Ayam Besar + Nasi + Pepsi 350 ml', '0.0', 0, 0, NULL, NULL),
(128, 35, 'Kombo Super Star', 91000, '20181229064717.png', 1, '2 Ayam besar + 2 Nasi + 2 Pepsi 600 ml + Chocolate ice', '0.0', 0, 0, NULL, NULL),
(129, 35, 'Super Family', 150000, '20181229064851.png', 1, '6 Ayam Besar + 3 Nasi + 3 Pepsi 600 ml', '0.0', 0, 0, NULL, NULL),
(130, 35, 'Pepsi 350 ml', 6000, '20181229065031.png', 1, 'Minuman bersoda rasa cola', '0.0', 0, 0, NULL, NULL),
(131, 35, 'Twisty', 20000, '20181229065154.jpg', 1, 'Dengan taburan stik ayam', '0.0', 0, 0, NULL, NULL),
(132, 35, 'O.R Burer', 15000, '20181229065252.jpg', 1, 'Isi ayam dan bumbu O R', '0.0', 0, 0, NULL, NULL),
(133, 35, 'Fish Fillet', 21000, '20181229065506.jpg', 1, 'Isi kornet ikan', '0.0', 0, 0, NULL, NULL),
(134, 35, 'Chick\'N Fillet', 25000, '20181229065611.jpg', 1, 'Dengan ayam ukuran besar', '0.0', 0, 0, NULL, NULL),
(135, 35, 'Nasi', 5000, '20181229065925.jpeg', 1, 'Nasi pulen spesial KFC', '0.0', 0, 0, NULL, NULL),
(136, 36, 'D\'besto big', 11000, '20181229072053.jpg', 1, 'Ayam besar dengan saus khas d besto', '0.0', 0, 0, NULL, NULL),
(137, 36, 'D\'Besto Reguler', 20000, '20181229072208.jpg', 1, 'Ayam + Nasi', '0.0', 0, 0, NULL, NULL),
(138, 36, 'Kentang Bolognese', 10000, '20181229072426.jpg', 1, 'Kentang goreng dengan saus khas D\'Besto', '0.0', 0, 0, NULL, NULL),
(139, 36, 'Nasi', 3000, '20181229072504.jpeg', 1, 'Nasi putih', '0.0', 0, 0, NULL, NULL),
(140, 36, 'Pepsi 350 ml', 6000, '20181229072550.png', 1, 'Minuman soda rasa cola', '0.0', 0, 0, NULL, NULL),
(141, 36, 'Bujibery', 15000, '20181229072639.png', 1, 'Minuman soda rasa bujibery', '0.0', 0, 0, NULL, NULL),
(142, 36, 'Cheese Burger', 16000, '20181229072820.jpg', 1, 'lapisan keju dan daging ayam', '0.0', 0, 0, NULL, NULL),
(143, 37, 'Martabak Mesir', 15000, '20181229092608.jpg', 1, 'Dengan telur ayam dan daging rendang', '0.0', 0, 0, NULL, NULL),
(144, 37, 'Boom', 8000, '20181229092720.jpg', 1, 'Roti canai dengan susu kental manis', '0.0', 0, 0, NULL, NULL),
(145, 37, 'Roti Tissu', 15000, '20181229092811.jpg', 1, 'Roti canai lembut sekali cubit', '0.0', 0, 0, NULL, NULL),
(146, 37, 'Roti Canai', 12000, '20181229092949.jpg', 1, 'Roti canai original', '0.0', 0, 0, NULL, NULL),
(147, 37, 'Martabak Mesir Spesial', 20000, '20181229093401.jpg', 1, 'Estra  besar dengan daging rendang dan telur bebek', '0.0', 0, 0, NULL, NULL),
(148, 37, 'Teh Telur', 8000, '20181229093453.jpg', 1, 'Teh dengan telur ayam khas sumatra barat', '0.0', 0, 0, NULL, NULL),
(149, 37, 'Air Mineral', 3000, '20181229093549.png', 1, 'Air aqua 350 ml', '0.0', 0, 0, NULL, NULL),
(150, 38, 'Perkedel', 10000, '20181229102835.jpg', 1, 'Perkedel kentang', '0.0', 0, 0, NULL, NULL),
(151, 38, 'Jengkol', 18000, '20181229102910.jpg', 1, 'Gulai jengkol', '0.0', 0, 0, NULL, NULL),
(152, 38, 'Soto Padang', 12000, '20181229102941.JPG', 1, 'Soto khas padang', '0.0', 0, 0, NULL, NULL),
(153, 38, 'Gulai Kambing', 22000, '20181229103041.jpg', 1, 'Gulai kambing madu', '0.0', 0, 0, NULL, NULL),
(154, 38, 'Sayur', 12000, '20181229103111.jpg', 1, 'Sayur', '0.0', 0, 0, NULL, NULL),
(155, 38, 'Telur dadar', 10000, '20181229103154.jpg', 1, 'Telur dadar', '0.0', 0, 0, NULL, NULL),
(156, 38, 'Telur puyuh sambal', 12000, '20181229103243.jpg', 1, 'Telur puyuh sambal', '0.0', 0, 0, NULL, NULL),
(157, 39, 'Ayam Remuk', 25000, '20181229103548.jpg', 1, 'Ayam + Nasi + lalap', '0.0', 0, 0, NULL, NULL),
(158, 39, 'Ayam pop', 20000, '20181229103641.jpg', 1, 'Ayam pop + Soto + Teh Es', '0.0', 0, 0, NULL, NULL),
(159, 39, 'Ayam Bakar', 15000, '20181229103734.jpg', 1, 'ayam bakar', '0.0', 0, 0, NULL, NULL),
(160, 39, 'Asam Pedas', 15800, '20181229103820.jpg', 1, 'ikan patin asam pedas', '0.0', 0, 0, NULL, NULL),
(161, 39, 'Spageti ikan', 21000, '20181229104026.png', 1, 'Spageti ikan', '0.0', 0, 0, NULL, NULL),
(162, 39, 'Ikan Asam', 12000, '20181229104109.jpg', 1, 'Ikan laut asam', '0.0', 0, 0, NULL, NULL),
(163, 40, 'Sayur Nangka', 6000, '20181229104425.jpg', 1, 'Sayur Nangka', '0.0', 0, 0, NULL, NULL),
(164, 40, 'Pekedel', 12000, '20181229104506.jpg', 1, 'Perkedel Kentang', '0.0', 0, 0, NULL, NULL),
(165, 40, 'Gulai', 8000, '20181229104547.jpg', 1, 'Gulai', '0.0', 0, 0, NULL, NULL),
(166, 40, 'Ayam Pop', 12000, '20181229104641.jpg', 1, 'Ayam Pop', '5.0', 0, 0, NULL, NULL),
(167, 40, 'Ayam Goreng', 12000, '20181229104710.jpg', 1, 'Ayam goreng bumbu', '0.0', 0, 0, NULL, NULL),
(168, 40, 'Ayam cabe hijau', 12000, '20181229104749.jpg', 1, 'Ayam cabe hijau', '0.0', 0, 0, NULL, NULL),
(169, 40, 'Telur dadar bebek', 12000, '20181229104833.jpg', 1, 'telur dadar', '0.0', 0, 0, NULL, NULL),
(170, 40, 'Puyuh Lado', 12000, '20181229104915.jpg', 1, NULL, '0.0', 0, 0, NULL, NULL),
(171, 40, 'Telur dadar ayam', 10000, '20181229105000.jpg', 1, 'Telur dadar ayam', '0.0', 0, 0, NULL, NULL),
(172, 40, 'Teh telur', 12000, '20181229105033.jpg', 1, 'teh telur ayam', '0.0', 0, 0, NULL, NULL),
(174, 41, 'Ayam geprek besar', 15000, '20191105132334.jpg', 1, 'Ayam geprek besar dengan nasi, lalapan, dan sambal', '0.0', 0, 0, '2019-11-05 02:57:53', '2019-11-05 06:23:34'),
(175, 42, 'Chicken Original', 8000, '20191105132729.jpg', 1, 'Potongan paha bawah ayam goreng', '0.0', 0, 0, '2019-11-05 06:27:29', '2019-11-05 06:27:29'),
(176, 43, 'Ayam Penyet Mama Besar', 15000, '20191105133352.jpg', 1, 'Nasi, Ayam Besar, Cah Kangkung', '0.0', 0, 0, '2019-11-05 06:33:52', '2019-11-05 06:33:52'),
(177, 44, 'Mie Goreng', 10000, '20191105133533.jpg', 1, 'Mie Goreng Bihun', '0.0', 0, 0, '2019-11-05 06:35:33', '2019-11-05 06:35:33'),
(178, 46, 'Salad Buah', 11000, '20191105133616.jpg', 1, 'Salad Buah Segar', '0.0', 0, 0, '2019-11-05 06:36:16', '2019-11-05 06:36:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_04_07_232447_create_restos_table', 1),
(9, '2019_04_09_234329_create_menus_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('02265614db4c663589f0c1f222b0fa23d1627bf2e5ff4941b5f4bea0cabcf2cc69a88c26dce63ea6', 4, 1, 'nApp', '[]', 0, '2019-05-07 08:09:10', '2019-05-07 08:09:10', '2020-05-07 15:09:10'),
('21acd365a6cca101ae259fd93a13d88549e225804d10170449193473b78377d02b3708aeeea3472c', 13, 1, 'nApp', '[]', 0, '2019-10-31 09:55:37', '2019-10-31 09:55:37', '2020-10-31 16:55:37'),
('2f608e7c5ab4a6ea99a86958f03f38b061054bb2590b5344a733c86cb7513bb4e5ef4d5914dc0904', 2, 1, 'nApp', '[]', 1, '2019-05-07 09:32:40', '2019-05-07 09:32:40', '2020-05-07 16:32:40'),
('479025a69fd13a34b8cc4f0ce6356e33763aa7c54ece8ebb7759164d51e97f7c6b01879147f48a8a', 17, 1, 'nApp', '[]', 0, '2020-01-11 08:54:20', '2020-01-11 08:54:20', '2021-01-11 15:54:20'),
('67dc67cdd307210958c4d194878568fe61bb18e4d8e78dbd1faa6aeba1330b97303c3a0a46924331', 14, 1, 'nApp', '[]', 0, '2019-11-04 04:11:19', '2019-11-04 04:11:19', '2020-11-04 11:11:19'),
('9ca2163189ad851523f534e9fbc8a25b201f9898076f8eb60ddf035d7299523dc98907529b3d9585', 18, 1, 'nApp', '[]', 0, '2020-03-04 00:50:07', '2020-03-04 00:50:07', '2021-03-04 07:50:07'),
('9d702c200bf1fdb4f43b21c6f95869a68f0a93be273d9fbf5573cd7c8cba017c13b98e28c6b198c1', 11, 1, 'nApp', '[]', 0, '2019-10-31 07:01:34', '2019-10-31 07:01:34', '2020-10-31 14:01:34'),
('a40b6d6a0cf620df61b9d0c1b5d3272bb70bc407d885ce14b21d209a8a06f79e9ecda4fb6a17a52c', 16, 1, 'nApp', '[]', 0, '2019-11-05 04:26:32', '2019-11-05 04:26:32', '2020-11-05 11:26:32'),
('acc2460146fe9cde5c040e010b4712abd25e1f77bd9a7019b4d863f62c4248cb9d15f34fa083fc3f', 1, 1, 'nApp', '[]', 0, '2019-11-05 08:08:02', '2019-11-05 08:08:02', '2020-11-05 15:08:02'),
('d795d0c8ed30eae9298517ac3d1890ef2187cc180f57e5c5b0de732ef7be363f45f7d2f84223873b', 10, 1, 'nApp', '[]', 0, '2019-08-28 02:40:26', '2019-08-28 02:40:26', '2020-08-28 09:40:26'),
('ea9457b202df6c41e23d267b18f01c1e766345837865c3bc02d959af8b6e7de1ca5cb006f106e102', 15, 1, 'nApp', '[]', 0, '2019-11-04 06:55:20', '2019-11-04 06:55:20', '2020-11-04 13:55:20'),
('ed708bd316203465af516aed6a99a113bb17a51681af3881980d587c67d994206dd1475dab855163', 12, 1, 'nApp', '[]', 0, '2019-11-04 07:12:59', '2019-11-04 07:12:59', '2020-11-04 14:12:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'BjrqqWxhX56rE07WaOaWW2RTBj7G17OrEj6zllRI', 'http://localhost', 1, 0, 0, '2019-04-22 00:28:07', '2019-04-22 00:28:07'),
(2, NULL, 'Laravel Password Grant Client', 'IB8A4TmMH4HvhWQTYLYRbfrzrSpwry4Uva6JCDWX', 'http://localhost', 0, 1, 0, '2019-04-22 00:28:07', '2019-04-22 00:28:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-04-22 00:28:07', '2019-04-22 00:28:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'mtoha34@gmail.com', 'VvaKwh', '2019-10-09 23:56:39'),
(2, 'azharsiddiq36@gmail.com', 'kldWii', '2019-11-04 06:54:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promos`
--

CREATE TABLE `promos` (
  `id` int(11) NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `keterangan` text CHARACTER SET latin1 NOT NULL,
  `gambar` text CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL,
  `mulai` date NOT NULL,
  `batas` date NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `promos`
--

INSERT INTO `promos` (`id`, `id_menu`, `keterangan`, `gambar`, `harga`, `mulai`, `batas`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 27, 'fhfgf', '20191022084836.jpg', 15000, '2019-10-22', '2019-10-22', 1, '2019-10-22 08:48:36', '2019-10-22 09:38:03'),
(2, 27, 'Promo akhir bulan', '20191022101100.jpg', 15000, '2019-10-22', '2019-10-22', 0, '2019-10-22 10:11:00', '2019-10-22 10:11:00'),
(3, 27, 'Promo Akhir Bulan', '20191024092442.jpg', 15000, '2019-10-24', '2019-10-24', 0, '2019-10-24 09:24:42', '2019-10-24 09:24:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reports`
--

INSERT INTO `reports` (`id`, `id_user`, `id_menu`, `comment`, `tanggal`, `deleted`) VALUES
(1, 1, 25, 'menu tidak tersedia', '2019-05-07 15:00:52', 0),
(2, 1, 25, 'asdfasdf', '2019-05-07 17:09:55', 0),
(3, 1, 26, 'dafasdf', '2019-05-08 03:23:49', 0),
(4, 1, 150, 'tidak sesuai', '2019-10-14 08:52:34', 0),
(5, 15, 165, 'sangat enak', '2019-11-04 13:52:47', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `restos`
--

CREATE TABLE `restos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_inputer` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `gambar_resto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `restos`
--

INSERT INTO `restos` (`id`, `id_inputer`, `nama`, `lat`, `lng`, `gambar_resto`, `alamat`, `status`, `deleted`, `phone`) VALUES
(20, 1, 'Pisang Muncrat', 0.48477299, 101.40668392, '20181228010648.png', 'Jalan Srikandi, Delima (Sebelah Family Ponsel)', 1, 0, '6281370903177'),
(22, 1, 'KFC Soebrantas', 0.46389002, 101.38614558, '20181228015740.jpg', 'Jl H.R Sobrantas No. 70', 1, 0, '6281268475431'),
(23, 1, 'Steak House', 0.46494342, 101.37137800, '20181228021900.jpg', 'Jl. Soebrantas No 321', 1, 0, '6281268475435'),
(24, 1, 'Warung Bakwan', 0.48203555, 101.41873877, '20181228011122.png', 'Jl. Soekarno Hatta (Simp. Jl. Buncis, Seberang RS. Eka Hospital)', 1, 0, '6282387772588'),
(25, 1, 'Garasi Kafe', 0.46183887, 101.40945900, '20181228011641.jpg', 'Jl. Marsan sejahtera no.3 Panam Pekanbaru (setelah ramayana panam)', 1, 0, '628124188884'),
(26, 1, 'Waroeng 7', 0.53425678, 101.46586955, '20181228012128.jpg', 'Jl. Lokomotif No. 106', 1, 0, '6282284076665'),
(27, 1, 'Seventeen Cafe', 0.51733376, 101.42308295, '20181228014307.png', 'Jl. Durian No.69F (sebrang kedai kopi \"Saroha Nauli\")', 1, 0, '6282247366589'),
(28, 1, 'Roaster Moody', 0.51346717, 101.45450000, '20181228014706.jpg', 'Jalan ronggowarsito no 88', 1, 0, '6282283252601'),
(29, 1, 'Vanhollano Srikandi', 0.48116185, 101.40686966, '20181228015314.png', 'Jl. Srikandi SPBU Srikandi', 1, 0, '628117541984'),
(30, 1, 'Pak Nurdin Soebrantas', 0.46439158, 101.41442947, '20181228020117.jpg', 'JL H.R Soebrantas No 40', 1, 0, '6281268475430'),
(31, 1, 'Raso Situjuah', 0.49020996, 101.40192434, '20181228020615.jpg', 'Jl. Sekuntum Raya No 45', 1, 0, '6281378688500'),
(32, 1, 'Bare Solok', 0.46408649, 101.38888679, '20181228020908.jpg', 'Jl. Soebrantas (depan Aulia Hospital)', 1, 0, '6281268475412'),
(33, 1, 'Pizza Hut Panam', 0.46468259, 101.38563462, '20181228021335.jpg', 'Jl. H.R Soebrantas (Giant Panam)', 1, 0, '6281268475433'),
(34, 1, 'Puetra Buana', 0.46405799, 101.37607757, '20181228021555.jpg', 'Jl H.R Soebrantas No 201', 1, 0, '6281268475434'),
(35, 1, 'KFC Arifin Ahmad', 0.48082156, 101.43865351, '20181228022141.jpg', 'Jl. Arifin Ahmad', 1, 0, '6281268475436'),
(36, 1, 'D Besto', 0.47956197, 101.40694275, '20181228022429.jpg', 'Jl. Srikandi (Simpang Ardhat)', 1, 0, '6281268475437'),
(37, 1, 'Kubang Resto', 0.46590698, 101.40362922, '20181228022941.jpg', 'Jl. Delima No 20', 1, 0, '6281268475438'),
(38, 1, 'Pagi Sore', 0.50926868, 101.44940313, '20181228023201.jpeg', 'Jl. Jendral Sudirman No 213', 1, 0, '6281268475439'),
(39, 1, 'Ayam Remuk Pak Tisto', 0.46710488, 101.39457677, '20181228023429.jpg', 'Jl Soekarna Hatta No 80', 1, 0, '6281268475440'),
(40, 1, 'RM Sederhana UIN Suska Panam', 0.46043847, 101.35944016, '20181228023704.jpg', 'Jl. Soebrantas No 2', 1, 0, '6281268475441'),
(41, 1, 'Geprek Star', 0.46853285, 101.36110206, '20191105132305.jpg', 'Jalan Buluh Cina Pekanbaru', 1, 0, NULL),
(42, 1, 'Waroeng Chicken', 0.46872668, 101.36354565, '20191105132543.jpg', 'Jalan Buluh Cina', 1, 0, NULL),
(43, 1, 'Kedai Anjas', 0.46914530, 101.36409581, '20191105133009.jpg', 'Jalan Buluh Cina', 1, 0, NULL),
(44, 1, 'Nasi Jamblang Bu Tina', 0.46941351, 101.36516869, '20191105133119.jpg', 'Jalan Buluh Cina', 1, 0, NULL),
(45, 1, 'Nasi Jamblang Bu Tina', 0.46941351, 101.36516869, '20191105133128.jpg', 'Jalan Buluh Cina', 1, 1, NULL),
(46, 1, 'Jus Madu 2', 0.46881166, 101.36674235, '20191105133238.jpg', 'Jalan Garuda Sakti', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggal` varchar(191) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `id_user`, `id_menu`, `comment`, `rating`, `tanggal`, `deleted`) VALUES
(1, 1, 25, 'mantap', 4, '2019-10-13', 0),
(2, 1, 166, 'enak banget dah', 5, '2019-10-30', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` int(1) NOT NULL DEFAULT 0,
  `sqlite_backup` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `isAdmin`, `sqlite_backup`, `created_at`, `updated_at`) VALUES
(1, 'Muhamad Toha', 'mtoha34@gmail.com', '$2y$10$ZC64c0u4oNCKVGTs2Wjvb.eE.sS7j8l7KajyVx2VY8jWxsgkCVmkG', NULL, 1, '20191105001007.db', '2019-04-22 00:35:05', '2019-11-04 17:10:07'),
(2, 'Coba Aja', 'coba34@gmail.com', '$2y$10$fsq.FKLLh09D8wfHwh7PqeuSGXZD7n9p3/ZbGGXL5IZNVN2hMEN5y', NULL, 0, NULL, '2019-04-23 08:18:26', '2019-04-24 04:37:37'),
(4, 'Coba3', 'coba3@gmail.com', '$2y$10$kHTYjeFULTyARZ882uJq4englSkl/HKxSjm3omLMMad7DUGXKSMOC', NULL, 0, '20190504101702.db', '2019-04-23 16:03:17', '2019-05-04 03:17:02'),
(8, 'Coba Admin', 'cobaadmin@gmail.com', '$2y$10$3MF8wXaJi7DfGUkiVUqoGeZjBsIApU4uwwKVb7qJ0XMfNgHkh2TP6', NULL, 1, NULL, '2019-05-07 01:28:24', '2019-05-07 01:28:24'),
(9, 'coba lagi', 'cobalagi@gmail.com', '$2y$10$ErpHU09To5MKJuVt9P0O3ecxd9r0v/CNbMLpy4R6m95h3YBTyjiZm', NULL, 1, NULL, '2019-05-07 08:14:35', '2019-05-07 08:14:35'),
(10, 'haeru', 'haeru@gmail.com', '$2y$10$IROgV04JQEzonLtdV3rDbOmStbRcXG0SoAX.r8SLxaAMV0zglU80m', NULL, 0, NULL, '2019-08-28 02:39:23', '2019-08-28 02:39:23'),
(11, 'Haha', 'hshs@jdjdj.fkv', '$2y$10$QEtCm6fACLv0foi6aE4ED.Vm76G45GOz8QPkDkV/OuOU2Qoj.6duy', NULL, 0, NULL, '2019-10-31 07:01:34', '2019-10-31 07:01:34'),
(12, 'haris', 'harisgaul7@gmail.com', '$2y$10$i.U1OvOj0He51lfG6OfnjeOQeoCr2yqbSrnqPsSplJIZSZTFXHS2W', NULL, 0, '20191106224405.db', '2019-10-31 07:03:49', '2019-11-06 15:44:05'),
(13, 'Wira', 'wirandragusman4@gmail.com', '$2y$10$bkevUrhW0wrWxnRWaF7X/.dPlrMExpXbwm1MkRFmwRkUGTt0k/P8i', NULL, 0, NULL, '2019-10-31 09:53:08', '2019-10-31 09:53:08'),
(14, 'cunggun', 'anggun.triana90@gmail.com', '$2y$10$5mvMTIir8H3D.0LUm4vzn.C6D5hFOXFHaX0nlWLylAdNVnym9k3aS', NULL, 0, NULL, '2019-11-04 03:23:24', '2019-11-04 03:23:24'),
(15, 'azhar', 'azharsiddiq36@gmail.com', '$2y$10$TSBxvAPb7LOwdAcKuS4bw.ulIC3dCy9itQr9fPLb22M62a/CQnFXy', NULL, 0, '20191104134729.db', '2019-11-04 06:46:42', '2019-11-04 06:47:29'),
(16, 'Albis Ya Albi', 'lapankelompok@gmail.com', '$2y$10$aus4GaDs49PVCFo1FuxtNuGtDllHuUAZsHEv3TuC5j/b2alJF0a7i', NULL, 0, NULL, '2019-11-05 04:26:12', '2019-11-05 04:26:12'),
(17, 'hemi', 'helminasir10@gmail.com', '$2y$10$v3ynw2.8eGpKjQuE1DkB3.VgvJCEYJITjbRBnHh9PuQ3JKv7X6jLq', NULL, 0, NULL, '2020-01-11 08:53:47', '2020-01-11 08:53:47'),
(18, 'Irsyad', 'irsyadtech@gmail.com', '$2y$10$PaPNxsLIHzIduZf5dp9kHej2PsyI7xbMfijn2gAWetCySy9GwtnKu', NULL, 0, '20200308191820.db', '2020-03-04 00:36:08', '2020-03-08 12:18:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_id_resto_index` (`id_resto`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`id_user`),
  ADD KEY `menu` (`id_menu`);

--
-- Indeks untuk tabel `restos`
--
ALTER TABLE `restos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restos_id_inputer_index` (`id_inputer`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `promos`
--
ALTER TABLE `promos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `restos`
--
ALTER TABLE `restos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_id_resto_foreign` FOREIGN KEY (`id_resto`) REFERENCES `restos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `promos`
--
ALTER TABLE `promos`
  ADD CONSTRAINT `promos_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`);

--
-- Ketidakleluasaan untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `menu` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `restos`
--
ALTER TABLE `restos`
  ADD CONSTRAINT `restos_id_inputer_foreign` FOREIGN KEY (`id_inputer`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
