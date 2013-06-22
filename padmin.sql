-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2012 at 07:52 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `padmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kata_kunci` text NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_ubah` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id_album`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kata_kunci` text NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_ubah` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `id_kategori` int(10) unsigned zerofill DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `status` enum('terbit','konsep','menunggu','hapus') NOT NULL,
  PRIMARY KEY (`id_artikel`),
  KEY `id_kategori` (`id_kategori`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `kata_kunci`, `tgl_masuk`, `tgl_ubah`, `id_kategori`, `username`, `status`) VALUES
(0000000016, 'Talaga Remis', '<p>Talaga Remis adalah salah satu objek wisata alam di Kabupaten Kuningan. Talaga Remis merupakan sebuah danau yang terletak di kaki gunung Ciremai tepatnya di Desa Kaduela, Kuningan, Kecamatan Mandirancan, berjarak Â±37 km dari pusat kota Kuningan.</p><h3>Etimologi</h3><p>Nama Talaga Remis mempunyai arti tersendiri, nama talaga diambil dari kata telaga dalam bahasa Sunda, dan remis tersebut diambil dari binatang sejenis kerang bewarna kuning yang banyak hidup di sekitar telaga, binatang tersebut dikenal dengan sebutan remis.</p><h3>Kondisi Alam</h3><p>Hutan wisata Talaga Remis mempunyai luas areal kurang Iebih 13 Ha. Sedangkan luas danaunya 3,25 Ha, yang dikelola oleh Perum Kehutanan Kabupaten Kuningan. Terdapat 8 telaga yaitu : Telaga Leat, Telaga Nilem, Telaga Deleg, Situ Ayu Salintang, Telaga Leutik, Telaga Buruy, Telaga Tespong, dan Sumur Jalatunda. Hutan wisata Talaga Remis menyimpan keanekaragaman flora dan fauna, terdapat kurang lebih 160 jenis tumbuhan di antaranya sonokeling, malaka, kosambi dan lain-lain. Salah satu daya tarik tempat ini adalah adanya satu jenis tumbuhan langka yaitu Pisang Hyang.</p><h3>Sejarah</h3><p>Menurut cerita yang berkembang secara lisan, asal muasal hutan Wisata Talaga Remis terkait dengan sejarah Kesultanan Cirebon. Sultan yang berkuasa di Cirebon pada waktu itu ialah Sultan Giri Laya. Sang Sultan mempunyai seorang puteri yang cantik jelita, bernama Ratna Pandan Kuning. Ratna Pandan Kuning adalah satu-satunya keturunan Sultan, calon penerus tahta Kesultanan Cirebon. Sang Puteri menarik beberapa kalangan untuk meminangnya, namun beberapa kali pinangan selalu ditolaknya sehingga membuat Sultan kebingungan, apalagi ditengah situasi yang tidak kondusif sedang terjadi pertentangan antara Kesultanan Cirebon dan Kesultanan Mataram. Sebenarnya Sultan mempunyai jagoan yang dipersiapkan sebagai calon menantunya yaitu Elang Drajat putra dari Banjar Melati. Dia adalah orang kepercayaan Sultan yang menjadi tameng pertamanya. Sehingga agar tidak terjadi kecemburuan dari orang yang telah meminang Puteri dan setiap orang merasakan keadilan, Sultan Giri Laya mengadakan sayembara percobaan perang. Siapapun yang bisa mengalahkan Elang Drajat, akan dijadikan menantu Sultan Giri Laya atau Dalem Cirebon.</p><p>Pada waktu itu Sultan Cirebon memindahkan pusat pemerintahan ke Matangaji, hingga Sang Sultan terkenal dengan sebutan Sultan Matangaji, Daerah kekuasaan Sultan Matangaji meliputi daerah Kabupaten Kuningan, Kabupaten Majalengka dan Kabupaten Indramayu. Sultan Matangaji setiap tahunnya harus membayar upeti kepada Sultan Mataram yaitu Sultan Agung yang merupakan keturunan dari Amangkurat II.</p><p>Sementara itu di wilayah lain ada seorang pemuda bernama Elang Sutajaya berniat berangkat menuju Cirebon didampingi pawongan Ki Lurah Bango dengan membawa keris pusaka yang bernama Keris Sekober untuk membantu Pangeran Selingsingan di Pakemitan Gedong Silarandenog. Namun setelah sampai di Keraton Cirebon ternyata keraton sudah dikosongkan. Perjalanannya pun dilanjutkan untuk mencari Sang Sultan.</p><p>Elang Sutajaya akhirnya bertemu dengan Sultan yang kini berada di Matangaji. Pada saat itu Sultan sedang bermusyawarah dengan putrinya dalam mengadakan syaembara. Elang Sutajaya kemudian bertemu dengan Putri Ratna Pandan Kuning, Putri Matangaji tersebut tertarik oleh ketampanan dan kesopanan Elang Sutajaya. Setelah bercakap-cakap dengan Sultan Matangaji, Elang Sutajaya mengemukakan maksudnya untuk bertugas kemit atau juru kunci di Gedong Silaradenok membantu Pangeran Selingsingan. Sepeninggalnya Elang Sutajaya putri Matangaji menangis tiada hentinya. Sultan Matangaji mengerti akan maksud putrinya yang mencintai Elang Sutajaya.</p><p>Kemudian Elang Sutajaya datang kembali ke Matangaji, Putri Ratna Pandan Kuning sangat senang dengan kedatangannya dan mengutarakan keinginanya kepada Sultan agar menyetujuinya untuk menikah dengan Elang Sutajaya. Sultan Matangaji tidak keberatan dengan syarat Elang Sutajaya bisa mengalahkan prajurit-prajurit Banjar Melati yang dipimpin oleh Elang Drajat. Spontan saja Elang Sutajaya menyanggupinya hingga terjadilah pertarungan antara Elang Sutajaya dengab prajurit-prajurit banjar Melati. Secepat kilat anak buah Banjar Melati dipatahi oleh Elang Sutajaya, sehingga ratusan prajurit banjar melati menjadi tumbuh-tumbuhan.</p><p>Sultan Matangaji bermaksud membatalkan membayar upeti ke kerajaan Mataram, sementara itu Pangeran Purbaya dari Mataram menuju ke Cirebon bermaksud untuk menagih upeti. Di kaki Gunung Slamet rombongan Pangeran Purbaya bertemu dengan rombongan Pangeran Selingsingan. Terjadilah peperangan yang seru dan memakan korban yang cukup banyak dari kedua belah pihak.</p><p>Peperangan tiada hentinya, maka Sultan Matangaji memanggil mantunya Elang Sutajaya untuk membantu perang menumpas Pangeran Purabaya. Elang Sutajaya dalam mencari jejak Pangeran Selingsingan sampai di desa dukuh Puntang kecamatan Sumber. Diketahui peperangan sedang berjalan sengit dan seru antara Pangeran Purabaya dan Pageran Selingsingan. Pangeran Selingsingan mundur terus ke Desa Cikalahang, desa Mandala sampai ke Desa Kaduela Kecamatan Mandirancan Kabupaten Kuningan. Saking sedihnya Pangeran Selangsingan menangis karena perperangan tiada akhirnya. Air matanya jatuh ke tanah hingga terjadilah kolam Nilam yang letaknya disebelah Talaga Remis.</p><p>Akhirnya Elang Sutajaya bertemu dengan Pangeran Purabaya lalu beradu ilmu kesaktian, Pangeran Purabaya terdesak dan berhasil dikalahkan. Pengeran Purabaya berkata â€œWahai Elang Sutajaya tolonglah aku diberi pengampunan, jangan bunuh aku karena aku adalah manusia biasa yang beragamaâ€, Elang Sutajaya menjawabnya â€œKamu bukan manusia yang baik, beberapa tahun kamu berperang dengan Pangeran Selingsingan sedangkan kamu manusia yang mengerti sebagai mahluk sosial yang harus hormat menghormati, tolong menolong dan bantu membantu. Itulah arti hidup manusia, bukan untuk saling membunuh". Elang Sutajaya meneruskan petuahnya bahwa sebagai umat beragama tidak boleh membuat kekacauan dan kejahatan dalam hidup bermasyarakat dan bernegara.</p><p>Setelah selesai mendengarkan petuah Elang Sutajaya Pangeran Selingsingan menangis tidak ada henti-hentinya dari air matanya hingga menjelmalah menjadi kolam Talaga Remis. Begitupun Pangeran Purabaya menangis dan akhirnya Pangeran Purabaya berubah wujud menjadi seekor Bulus atau kura-kura. Bulus tersebut diberi nama Si Mendung Purbaya. Bentuk bulus atau kura-kura itu mempunyai bentuk lain dari yang lain.&nbsp;</p><h3>Fasilitas</h3><p>Talaga Remis merupakan perpaduan antara pesona alam pergunungan hutan serta air talaga yang jernih, bening laksana kaca didukung udara pergunungan yang sejuk menantang untuk berwana wisata menguak misteri hutan. Fasilitas yang tersedia adalah perahu motor, sepeda air, saung, pos jaga, pondok kerja, papan petunjuk, instalasi air bersih, shelter, tempat sampah, bangku, MCK dan musholla. Ditempat ini dapat pula bersantai dan menikmati jajanan yang tersedia.</p><h3>Aksesibilitas</h3><p>Wana wisata ini dapat dicapai dari Kecamatan Mandirancan, Palimanan dan dari Kota Kuningan. Kondisi jalan umumnya beraspal dan baik, dapat dilalui kendaraan roda dua dan empat, dengan jarak rute perjalanan sebagai berikut :</p><ul><li>Palimanan&nbsp;â€“&nbsp;<strong class="selflink">Talaga Remis</strong>&nbsp;Â± 12 Km.</li><li>Mandirancan&nbsp;â€“&nbsp;<strong class="selflink">Talaga Remis</strong>&nbsp;Â± 25 Km.</li><li>Kuningan&nbsp;â€“&nbsp;<strong class="selflink">Talaga Remis</strong>&nbsp;Â± 37 Km.</li><li>Cirebon&nbsp;â€“&nbsp;<strong class="selflink">Talaga Remis</strong>&nbsp;Â± 30 Km.</li></ul><p><a data-mce-href="http://id.wikipedia.org/wiki/Talaga_Remis" href="http://id.wikipedia.org/wiki/Talaga_Remis" target="_blank" style="">Sumber</a></p>', 'Talaga Remis, Palimanan, Kuningan, Cirebon, Aksesibilitas Talaga Remis, Telaga Remis, Fasilitas Talaga Remis, Pesona Alam Pegunungan, air talaga, Sejarah Talaga Remis, Sultan Cirebon, Bahasa Sunda, Kerang Berwarna Kuning, Etimologi Talaga Remis, Objek Wisata Kuningan, Kota Kuningan', '2012-08-11 03:25:49', '2012-08-27 03:15:15', NULL, 'padmin', 'terbit'),
(0000000017, 'Wisata Pemandian Cibulan', '<p><img style="padding: 5px; float: left;border:1px solid #ccc;margin-right:10px;" src="http://hotelayonglinggarjati.com/pcontent/upload/4cafb2f14b2f1af9921a45df5317685c.jpg" alt="" width="400" data-mce-src="http://hotelayonglinggarjati.com/pcontent/upload/4cafb2f14b2f1af9921a45df5317685c.jpg" data-mce-style="padding: 5px; float: left;border:1px solid #ccc;margin-right:10px;">Objek wisata Cibulan merupakan salah satu objek wisata tertua di Kuningan. Obyek wisata ini diresmikan pada 27 Agustus 1939 oleh Bupati Kuningan saat itu, yaitu R.A.A. Mohamand Achmad.</p><p>Sebagai catatan, selain di Cibulan, terdapat tiga tempat rekreasi sejenis di Kuningan, yaitu: Kolam Linggarjati di kompleks Taman Linggarjati Indah, Kecamatan Cilimus; Kolam Cigugur, di Kecamatan Cigugur; dan Kolam Darma Loka di Kecamatan Darma.</p><p>Menurut cerita yang berkembang di kalangan Masyarakat Desa Maniskidul dan masyarakat Kuningan pada umumnya, ikan dewa yang ada di kolam Cibulan ini konon dahulunya adalah prajurit-prajurit yang membangkang atau tidak setia pada masa pemerintahan Prabu Siliwangi. Singkat cerita, prajurit-prajurit pembangkang tersebut kemudian dikutuk oleh Prabu Siliwangi sehingga menjadi ikan. Konon ikan-ikan dewa ini dari dulu hingga sekarang jumlahnya tidak berkurang maupun bertambah. Apabila kolam dikuras, ikan-ikan ini akan hilang entah kemana, namun saat kolam diisi air, mereka akan kembali lagi dengan jumlah seperti semula. Terlepas dari benar atau tidaknya legenda itu sampai saat ini tidak ada yang berani mengambil ikan ini karena ada kepercayaan bahwa barang siapa yang berani mengganggu ikan-ikan tersebut akan mendapatkan kemalangan.</p><p>Di dalam objek wisata ini terdapat dua kolam besar yang berbentuk persegi panjang. Kolam pertama berukuran 35x15 meter persegi dengan kedalaman sekitar 2 meter. Sedangkan, kolam kedua berukuran 45x15 meter persegi yang dibagi menjadi dua bagian. Bagian pertama berkedalaman 60 sentimeter dan bagian kedua berkedalaman 120 sentimeter. Kedua kolam ini selalu dikuras sekali dalam dua minggu, atau bisa lebih. Hal itu bergantung kebersihan air. Setiap kolamnya dihuni oleh puluhan ikan yang berwarna abu-abu kehitaman dan disebut sebagai kancra bodas atau ikan dewa (cyprinus carpico). Ukurannya berbagai macam mulai dari yang panjangnya 20-an sentimeter hingga 1 meter. Ikan Dewa adalah sejenis ikan yang dikeramatkan oleh penduduk di sekitar wilayah Desa Manis Kidul karena dipercaya mempunyai keistimewaan tertentu.<br>Meski semua kolam itu dihuni puluhan ikan kancra bodas atau ikan dewa, kolam-kolam di Cibulan dibuka sebagai kolam pemandian umum. Tempat rekreasi ini dilengkapi pula dengan fasilitas khas tempat pemandian, seperti tempat ganti pakaian, 6 buah kamar kecil dan 2 buah kamar mandi untuk tempat bilas seusai berenang.<br>Selain kolam dengan ikan dewanya yang jinak, di sudut barat pemandian ini juga terdapat tujuh sumber mata air yang dikeramatkan yang bernama Tujuh Sumur. Tujuh mata air ini berbentuk kolam-kolam kecil yang masing-masing mempunyai nama tersendiri, yaitu: Sumur Kejayaan, Sumur Kemulyaan, Sumur Pengabulan, Sumur Cirancana, Sumur Cisadane, Sumur Kemudahan, dan Sumur Keselamatan. Di antara ketujuh sumur itu, konon ada salah satu sumur yang berisikan Kepiting Emas, yaitu Sumur Cirancana. Apabila ada orang yang sedang mujur dan dapat melihat wujud dari Kepiting Emas itu, maka segala keinginannya akan terkabul.</p><p>Tujuh mata air itu terletak mengelilingi sebuah petilasan yang konon merupakan petilasan Prabu Siliwangi ketika ia beristirahat sekembalinya dari Perang Bubat. Petilasan itu berupa susunan batu seperti menhir dan dua patung harimau loreng (lambang kebesaran Raja Agung Pajajaran). Tujuh sumur dan petilasan Prabu Siliwangi ini sering dikunjungi orang untuk berziarah, terutama pada malam Jumat Kliwon atau selama bulan Maulud dalam penanggalan Hijriah. Mereka percaya bahwa air di tempat itu akan membawa berkah dan dapat mengabulkan permohonan mereka.</p><p>Air di Cibulan selalu bersih, bening, sejuk, dan melimpah, meskipun pada musim kemarau panjang. Itulah sebabnya, selain sebagai tempat rekreasi, Cibulan juga dijadikan sebagai sumber air untuk Perusahaan Daerah Air Minum (PDAM) Kuningan dan dimanfaatkan Pertamina untuk memasok kebutuhan air bersih di dua kompleks miliknya, yaitu Padang Golf Ciperna di Kota Cirebon, dan Kantor Daerah Operasi Hulu Jawa Bagian Barat (DOH JBB) di Klayan, Kabupaten Cirebon.</p><p>Kolam pemandian Cibulan juga menjadi sumber pendapatan bagi penduduk Desa Maniskidul dengan menjadi pedagang asongan atau membuka warung makan di sekitar tempat itu. Saat ini terdaftar 20 warung permanen di luar kompleks kolam dan 14 pedagang asongan resmi yang diizinkan berjualan di dalam kompleks kolam. Mereka kebanyakan menjual minuman ringan dan makanan kecil serta makanan ikan berupa kacang atom dan ikan wader.</p>', 'Cibulan, Kolam Pemandian Cibulan, Pemandian, Kuningan, Objek Wisata Kuningan, Linggarjati, CIlimus, Taman Linggarjati Indah, objek wisata, kolam, kancra, kancra bodas, prabu siliwangi, ', '2012-08-11 03:26:45', '2012-08-23 00:15:55', NULL, 'padmin', 'terbit'),
(0000000018, 'Gunung Ciremai', '<p><img style="padding: 5px; float: left;margin-right:10px;border:1px solid #ccc;" src="http://hotelayonglinggarjati.com/pcontent/upload/c64a18dec8c7bbfc078662c5475a1d37.JPG" alt="" width="300" data-mce-src="http://hotelayonglinggarjati.com/pcontent/upload/c64a18dec8c7bbfc078662c5475a1d37.JPG" data-mce-style="padding: 5px; float: left;margin-right:10px;border:1px solid #ccc;">Gunung Ceremai (seringkali secara salah kaprah dinamakan "Ciremai") secara administratif termasuk dalam wilayah tiga kabupaten, yakni Kabupaten Cirebon, Kabupaten Kuningan dan Kabupaten Majalengka, Provinsi Jawa Barat. Posisi geografis puncaknya terletak pada 6Â° 53'' 30" LS dan 108Â° 24'' 00" BT, dengan ketinggian 3.078 m di atas permukaan laut. Gunung ini merupakan gunung tertinggi di Jawa Barat.<br>Gunung ini memiliki kawah ganda. Kawah barat yang beradius 400 m terpotong oleh kawah timur yang beradius 600 m. Pada ketinggian sekitar 2.900 m dpl di lereng selatan terdapat bekas titik letusan yang dinamakan Gowa Walet.</p><p>Kini G. Ceremai termasuk ke dalam kawasan Taman Nasional Gunung Ciremai (TNGC), yang memiliki luas total sekitar 15.000 hektare.</p><p>Nama gunung ini berasal dari kata cereme (<em>Phyllanthus acidus</em>, sejenis tumbuhan perdu berbuah kecil dengan rada masam), namun seringkali disebut Ciremai, suatu gejala hiperkorek akibat banyaknya nama tempat di wilayah Pasundan yang menggunakan awalan ''ci-'' untuk penamaan tempat.</p><h3>Vulkanologi dan geologi</h3><p><img style="padding: 5px; float: right;border:1px solid #ccc;margin-left:10px" src="http://hotelayonglinggarjati.com/pcontent/upload/08ae8b94708fc0c02a24d70eff881099.jpg" alt="" width="400" data-mce-src="http://hotelayonglinggarjati.com/pcontent/upload/08ae8b94708fc0c02a24d70eff881099.jpg" data-mce-style="padding: 5px; float: right;border:1px solid #ccc;margin-left:10px">Gunung Ceremai termasuk gunungapi Kuarter aktif, tipe A (yakni, gunungapi magmatik yang masih aktif semenjak tahun 1600), dan berbentuk strato. Gunung ini merupakan gunungapi soliter, yang dipisahkan oleh Zona Sesar Cilacap â€“ Kuningan dari kelompok gunungapi Jawa Barat bagian timur (yakni deretan Gunung Galunggung, Gunung Guntur, Gunung Papandayan, Gunung Patuha hingga Gunung Tangkuban Perahu) yang terletak pada Zona Bandung.</p><p>Ceremai merupakan gunungapi generasi ketiga. Generasi pertama ialah suatu gunungapi Plistosen yang terletak di sebelah G. Ceremai, sebagai lanjutan vulkanisma Plio-Plistosen di atas batuan Tersier. Vulkanisma generasi kedua adalah Gunung Gegerhalang, yang sebelum runtuh membentuk Kaldera Gegerhalang. Dan vulkanisma generasi ketiga pada kala Holosen berupa G. Ceremai yang tumbuh di sisi utara Kaldera Gegerhalang, yang diperkirakan terjadi pada sekitar 7.000 tahun yang lalu (Situmorang 1991).</p><p>Letusan G. Ceremai tercatat sejak 1698 dan terakhir kali terjadi tahun 1937 dengan selang waktu istirahat terpendek 3 tahun dan terpanjang 112 tahun. Tiga letusan 1772, 1775 dan 1805 terjadi di kawah pusat tetapi tidak menimbulkan kerusakan yang berarti. Letusan uap belerang serta tembusan fumarola baru di dinding kawah pusat terjadi tahun 1917 dan 1924. Pada 24 Juni 1937 â€“ 7 Januari 1938 terjadi letusan freatik di kawah pusat dan celah radial. Sebaran abu mencapai daerah seluas 52,500 km bujursangkar (Kusumadinata, 1971). Pada tahun 1947, 1955 dan 1973 terjadi gempa tektonik yang melanda daerah baratdaya G. Ciremai, yang diduga berkaitan dengan struktur sesar berarah tenggara â€“ barat laut. Kejadian gempa yang merusak sejumlah bangunan di daerah Maja dan Talaga sebelah barat G. Ceremai terjadi tahun 1990 dan tahun 2001. Getarannya terasa hingga Desa Cilimus di timur G. Ceremai.</p><h3>Jalur pendakian</h3><p><span><img style="padding: 5px; float: left;border:1px solid #ccc; margin-right:10px;" src="http://hotelayonglinggarjati.com/pcontent/upload/b385778e6de41d21849fd0bd87cab551.jpg" alt="" width="350" data-mce-src="http://hotelayonglinggarjati.com/pcontent/upload/b385778e6de41d21849fd0bd87cab551.jpg" data-mce-style="padding: 5px; float: left;border:1px solid #ccc; margin-right:10px;">Puncak gunung Ceremai dapat dicapai melalui banyak jalur pendakian. Akan tetapi yang populer dan mudah diakses adalah melalui Desa Palutungan dan Desa Linggarjati di Kab. Kuningan, dan Desa Apuy di Kab. Majalengka. Satu lagi jalur pendakian yang jarang digunakan ialah melalui Desa Padabeunghar di perbatasan Kuningan dengan Majalengka di utara. Di kota Kuningan terdapat kelompok pecinta alam "AKAR" (Anak Kuningan Alam Rimba) yang dapat membantu menyediakan berbagai informasi dan pemanduan mengenai pendakian Gunung Ceremai.</span></p><h3><span>Keanekaragaman hayati</span></h3><p><strong>Vegetasi</strong></p><p>Hutan-hutan yang masih alami di Gunung Ceremai tinggal lagi di bagian atas. Di sebelah bawah, terutama di wilayah yang pada masa lalu dikelola sebagai kawasan hutan produksi Perum Perhutani, hutan-hutan ini telah diubah menjadi hutan pinus (Pinus merkusii), atau semak belukar, yang terbentuk akibat kebakaran berulang-ulang dan penggembalaan. Kini, sebagian besar hutan-hutan di bawah ketinggian â€¦ m dpl. dikelola dalam bentuk wanatani (agroforest) oleh masyarakat setempat.<br>Sebagaimana lazimnya di pegunungan di Jawa, semakin seseorang mendaki ke atas di Gunung Ciremai ini dijumpai berturut-turut tipe-tipe hutan pegunungan bawah (submontane forest), hutan pegunungan atas (montane forest) dan hutan subalpin (subalpine forest), dan kemudian wilayah-wilayah terbuka tak berpohon di sekitar puncak dan kawah.</p><p>Lebih jauh, berdasarkan keadaan iklim mikronya, LIPI (2001) membedakan lingkungan Ciremai atas dataran tinggi basah dan dataran tinggi kering. Sebagai contoh, hutan di wilayah Resort Cigugur (jalur Palutungan, bagian selatan gunung) termasuk beriklim mikro basah, dan di Resort Setianegara (sebelah utara jalur Linggarjati) beriklim mikro kering.</p><p>Secara umum, jalur-jalur pendakian Palutungan (di bagian selatan Gunung Ciremai), Apuy (barat), dan Linggarjati (timur) berturut-turut dari bawah ke atas akan melalui lahan-lahan pemukiman, ladang dan kebun milik penduduk, hutan tanaman pinus bercampur dengan ladang garapan dalam wilayah hutan (tumpangsari), dan terakhir hutan hujan pegunungan. Sedangkan di jalur Padabeunghar (utara) vegetasi itu ditambah dengan semak belukar yang berasosiasi dengan padang ilalang. Pada keempat jalur pendakian, hutan hujan pegunungannya dapat dibedakan lagi atas tiga tipe yaitu hutan pegunungan bawah, hutan pegunungan atas dan vegetasi subalpin di sekitar kawah. Kecuali vegetasi subalpin yang diduga telah terganggu oleh kebakaran, hutan-hutan hujan pegunungan ini kondisinya masih relatif utuh, hijau dan menampakkan stratifikasi tajuk yang cukup jelas.</p><p><strong>Margasatwa</strong></p><p>Keanekaragaman satwa di Ceremai cukup tinggi. Penelitian kelompok pecinta alam Lawalata IPB di bulan April 2005 mendapatkan 12 spesies amfibia (kodok dan katak), berbagai jenis reptil seperti bunglon, cecak, kadal dan ular, lebih dari 95 spesies burung, dan lebih dari 20 spesies mamalia.<br>Beberapa jenis satwa itu, di antaranya:</p><ul><li><ul><li>Bangkong bertanduk&nbsp;(<em>Megophrys montana</em>)</li><li>Percil Jawa&nbsp;(<em>Microhyla achatina</em>)</li><li>Kongkang Jangkrik&nbsp;(<em>Rana nicobariensis</em>)</li><li>Kongkang kolam&nbsp;(<em>Rana chalconota</em>)</li><li>Katak-pohon Emas&nbsp;(<em>Philautus aurifasciatus</em>)</li></ul></li></ul><ul><li><ul><li>Bunglon Hutan&nbsp;(<em>Gonocephalus chamaeleontinus</em>)</li><li>Cecak Batu&nbsp;(<em>Cyrtodactylus</em>&nbsp;sp.)</li></ul></li></ul><ul><li><ul><li>Elang Hitam&nbsp;(<em>Ictinaetus malayensis</em>)</li><li>Elang Brontok&nbsp;(<em>Spizaetus cirrhatus</em>)</li><li>Elang Jawa&nbsp;(<em>Spizaetus bartelsi</em>)</li><li>Puyuh-gonggong Jawa&nbsp;(<em>Arborophila javanica</em>)</li><li>Walet Gunung&nbsp;(<em>Collocalia vulcanorum</em>) [masih perlu dikonfirmasi]</li><li>Takur Bultok&nbsp;(<em>Megalaima lineata</em>)</li><li>Takur Tulung-tumpuk&nbsp;(<em>Megalaima javensis</em>)</li><li>Berencet Kerdil&nbsp;(<em>Pnoepyga pusilla</em>)</li><li>Anis Gunung&nbsp;(<em>Turdus poliochepalus</em>)</li><li>Tesia Jawa&nbsp;(<em>Tesia superciliaris</em>)</li><li>Ceret Gunung&nbsp;(<em>Cettia vulcania</em>)</li><li>Kipasan Ekor-merah&nbsp;(<em>Rhipidura phoenicura</em>)</li><li>Burung-madu Gunung&nbsp;(<em>Aethopyga eximia</em>)</li><li>Burung-madu Jawa&nbsp;(<em>Aethopyga mystacalis</em>)</li><li>Kacamata Gunung&nbsp;(<em>Zosterops montanus</em>)</li></ul></li></ul><ul><li><ul><li>Trenggiling biasa&nbsp;(<em>Manis javanica</em>)</li><li>Tupai kekes&nbsp;(<em>Tupaia javanica</em>)</li><li>Kukang&nbsp;(<em>Nycticebus coucang</em>)</li><li>Surili Jawa&nbsp;(<em>Presbytis comata</em>)</li><li>Lutung Budeng&nbsp;(<em>Trachypithecus auratus</em>)</li><li>Ajag&nbsp;(<em>Cuon alpinus</em>)</li><li>Teledu Sigung&nbsp;(<em>Mydaus javanensis</em>)</li><li>Kucing Hutan&nbsp;(<em>Prionailurus bengalensis</em>)</li><li>Macan Tutul&nbsp;(<em>Panthera pardus</em>)</li><li>Kancil&nbsp;(<em>Tragulus javanicus</em>)</li><li>Kijang&nbsp;(<em>Muntiacus muntjak</em>)</li><li>Jelarang Hitam&nbsp;(<em>Ratufa bicolor</em>)</li><li>Landak Jawa&nbsp;(<em>Hystrix javanica</em>)</li></ul></li></ul>', 'Gunung, Gunung Ciremai, Gunung tertinggi di jawa barat, jawa barat, kuningan, linggarjati, vulkanologi gunung ciremai, vegetasi, vulkanologi, gunung berapi, letusan gunung ciremai, gunung api, gunung api magmatik, gunung api generasi ketiga, iklim gunung ciremai', '2012-08-11 03:27:42', '2012-08-23 00:44:13', NULL, 'padmin', 'terbit'),
(0000000019, 'swe', '<p>sdaf</p>', 'adf', '2012-08-11 03:29:06', '2012-08-11 03:29:27', NULL, 'padmin', 'hapus'),
(0000000020, 'Gedung Perundingan Linggarjati', '<p><img style="padding: 5px; float: left;border:1px solid #ccc; margin-right:10px;" src="http://hotelayonglinggarjati.com/pcontent/upload/a3d7ca10d9ffce7f484478dd2325d99e.jpg" alt="" data-mce-src="http://hotelayonglinggarjati.com/pcontent/upload/a3d7ca10d9ffce7f484478dd2325d99e.jpg" data-mce-style="padding: 5px; float: left;border:1px solid #ccc; margin-right:10px;">Gedung Perundingan Linggarjati adalah tempat diadakannya perundingan antara Republik Indonesia dengan Pemerintah belanda pasca perang kemerdekaan. terletak di desa Linggajati kecamatan Cilimus kabupaten Kuningan.</p><p>Gedung Perundingan Linggajati merupakan saksi sejarah tempat dilaksanakannya Perundingan Linggajati pada bulan November 1946. Karena tidak memungkinkan perundingan dilakukan di Jakarta maupun di Yogyakarta (ibukota sementara RI), maka diambil jalan tengah jika perjanjian diadakan di Linggajati, Kuningan. Hari Minggu pada tanggal 10 November 1946 Lord Killearn tiba di Cirebon. Ia berangkat dari Jakarta menumpang kapal fregat Inggris H.M.S. Veryan Bay. Ia tidak berkeberatan menginap di Hotel Linggajati yang sekaligus menjadi tempat perundingan.</p><p>Delegasi Belanda berangkat dari Jakarta dengan menumpang kapal terbang â€œCatalinaâ€ yang mendarat dan berlabuh di luar Cirebon. Dari â€œCatalinaâ€ mereka pindah ke kapal perang â€œBanckertâ€ yang kemudian menjadi hotel terapung selama perjanjian berlangsung. Delegasi Indonesia yang dipimpin oleh Sjahrir menginap di desa Linggasama, sebuah desa dekat Linggajati. Presiden Soekarno dan Wakil Presiden Muhammad Hatta sendiri menginap di kediaman Bupati Kuningan. Kedua delegasi mengadakan perundingan pada tanggal 11-12 November 1946 yang ditengahi oleh Lord Kilearn, penengah berkebangsaan Inggris.</p><p>Pada awalnya tahun 1918 bangunan ini merupakan bangunan rumah milik Ibu Jasitem. Tahun 1921 oleh seorang berbangsa Belanda bernama Tuan Tersana dirombak menjadi semi permanen. Tahun 1930 dibangun menjadi permanen dan menjadi bangunan rumah tinggal orang Belanda yang bernama Van Oot Dome. Kemudian tahun 1935 dikontrak oleh Heiker dan dijadikan hotel yang bernama Rustoord. Pada masa pemerintahan Jepang hotel ini diganti namanya menjadi Hokay Ryokan. Tahun 1945 tepatnya setelah Proklamasi Kemerdekaan RI, hotel ini diberi nama Hotel merdeka. Tahun 1946 Hotel merdeka ini digunakan sebagai tempat perundingan antara Pemerintah Indonesia dengan Pemeintah Belanda yang kemudian menghasilkan Naskah Linggarjati, karena perundingan itu sangat penting maka gedung ini disebut Gedung linggarjati. Kadang-kadang disebut Gedung Naskah linggarjati tetapi tidak tepat karena naskahnya disusun dan disimpan di tempat lain, yaitu di Jakarta dan Amsterdam. Tahun 1948-1950 ketika aksi militer tentara II, gedung ini dijadikan markas tentara Belanda. Tahun 1950-1975 ditempati oleh Sekolah dasar Negeri Linggajati. Pada saat ini bangunan tersebut berfiungsi sebagai museum.</p><p>Secara astronomis Gedung Perundingan Linggajati terletak pada koordinat 06Âº52â€™7â€ LS dan 108Âº28â€™9â€ BT. Gedung Perundingan Linggajati ini memiliki luas 500 m2 dan memiliki halaman yang luas sekitar 2,5 ha. Seluruh areal bangunan ini dibatasi oleh pagar. Dinding luar pagar bagian bawah, mengelilingi bangunan ditutup dengan lempengan batu hitam. Di depan pintu masuk ruang sidang terdapat bangunan yang menjorok kearah jalan beratap genting. Pintu masuk ruang dalam atau ruang sidang memiliki dua daun pintu dengan bahan dari kaca. Di kiri kanan pintu tersebut terdapat jendela yang tertutup kaca.</p><p>Bagian ruang sidang berdenah empat persegi panjang. Dalam ruang nini terdapat meja dan kursi yang digunakan sebagai tempat perundingan. Di sebelah utara dinding ruang sidang terdapat pintu masuk ke gang atau lorong. Gang tersebut berukuran 1,50 m dan berfungsi sebagai penghubung kamar-kamar. Pintu masuk kamar memiliki kisi-kisi dengan motif belah ketupat. Di sebelah utara ruang sidang ini terdapat 4 buah kamar tidur, salah satu kamar digunakan untuk Prof. Schemerhon. Disebelah barat ruang sidang terdapat pintu keluar yang menuju halaman gedung ini. Dapur diletakan di sebelah selatan ruang sidang, sedangkan beberapa kamar lagi terdapat di belakang dapur dan untuk mencapainya melewati gang.</p><p>Sumber : <a style="" href="http://www.disparbud.jabarprov.go.id/wisata/dest-det.php?id=63&amp;lang=id" target="_blank" data-mce-href="http://www.disparbud.jabarprov.go.id/wisata/dest-det.php?id=63&amp;lang=id" data-mce-style="">1</a> | <a style="" href="http://id.wikipedia.org/wiki/Gedung_Perundingan_Linggarjati" target="_blank" data-mce-href="http://id.wikipedia.org/wiki/Gedung_Perundingan_Linggarjati" data-mce-style="">2</a></p>', 'Linggarjati, Gedung Perundingan Linggarjati, Perundingan linggarjati, perundingan, naskah linggarjati, gunung ciremai, wisata kuningan, museum linggarjati', '2012-08-14 23:14:03', '2012-08-23 00:45:03', NULL, 'padmin', 'terbit'),
(0000000021, 'Selamat Hari Raya Idul Fitri ', '<p>Kami segenap keluarga besar Hotel Ayong Linggarjati mengucapkan Minal Aidin Walfaidzin - Mohon Maaf Lahir &amp; Batin.</p><p>Selamat Hari Raya Idul Fitri 1 Syawal 1433 H</p>', 'Selamat Hari Raya Idul Fitri 1 Syawal 1433 H, Hari Raya, Idul Fitri, 1 Syawal, 1 Syawal 1433, keluarga besar hotel ayong linggarjati', '2012-08-15 00:19:17', '2012-09-03 01:13:45', NULL, 'padmin', 'hapus'),
(0000000022, 'Linggajati, Cilimus - Kuningan', '<p><img style="padding: 5px; float: left;margin:3px 5px" title="Gedung Perundingan Linggarjati" src="http://www.hotelayonglinggarjati.com/pcontent/upload/f45892d515910fa9699c8e5dfc1143a9.jpg" alt="Gedung Perundingan Linggarjati" width="271" height="176" data-mce-src="http://www.hotelayonglinggarjati.com/pcontent/upload/f45892d515910fa9699c8e5dfc1143a9.jpg" data-mce-style="padding: 5px; float: left;margin:3px 5px">Linggajati, juga dieja Linggarjati, adalah sebuah desa di kecamatan Cilimus, Kuningan yang terletak di kaki Gunung Ceremai, antara kota Cirebon dan Kuningan. Di tempat ini dilangsungkan Perundingan Linggarjati antara Indonesia dan Belanda pada tahun 1946. Tempat diselenggarakannya Perundingan Linggarjati kini dilestarikan sebagai Museum Linggarjati.</p><h3>Riwayat Desa Linggajati</h3><p>Kata Linggajati yang menjadi nama desa ini konon terkait dengan kisah perjalanan Sunan Gunung Jati, salah satu di antara Wali Songo, penyebar agama Islam di tanah Jawa. Beberapa pendapat dan arti kata "Linggajati" di antaranya ialah :</p><h4>Pendapat Sunan Kalijaga</h4><p>Menurut Sunan Kalijaga kawasan ini disebut "Linggajati" karena merupakan tempat linggih (lingga)</p><h4>Pendapat Sunan Bonang</h4><p>Menurut Sunan Bonang nama "Linggajati" mempunyai alasan bahwa sebelum Sunan Gunung Jati sampai ke puncak Gunung Gede, beliau linggar (berangkat) meninggalkan tempat setelah beristirahat dan bermusyawarah tanpa mengendarai kendaraan, melainkan memakai ilmu sejati.</p><h4>Pendapat Sunan Kudus</h4><p>Menurut Sunan Kudus nama "Linggajati" berasal dari kata nalingakeun ilmu sejati, karena di tempat inilah para wali songo bermusyawarah dan menjaga rahasia ilmu sejati agar tidak diketahui oleh orang banyak.</p><h4>Pendapat Syekh Maulana Maghribi</h4><p>Menurut Syekh Maulana Magribi, desa itu dinamai "Linggajati" yang berarti tempat penyiaran ilmu sejati</p><h3>Letak Geografis dan Demografi</h3><p>Desa Linggajati berada di wilayah Cilimus, Kabupaten Kuningan, Provinsi Jawa Barat. Desa ini terletak pada ketinggian 400 meter dari permukaan air laut. Desa ini mudah dijangkau, baik dari Kota Cirebon maupun Kota Kuningan. Jarak tempuh dari Kota Cirebon adalah sekitar 25 km, sementara jika dari Kota Kuningan berjarak sekitar 17 km. Jumlah penduduk Desa Linggajati tahun 2008 setidaknya tercatat lebih dari 3600 jiwa. Sekitar 75% penduduknya berprofesi sebagai petani.</p><h3>Batas Wilayah</h3><ul><li>Di utara berbatasan dengan Desa Lingga Indah.</li><li>Di timur berbatasan dengan Desa Linggamekar.</li><li>Di selatan berbatasan dengan Desa Linggasana.</li><li>Di barat berbatasan dengan&nbsp;Gunung Ciremai.</li></ul><h3>Pariwisata</h3><p>Linggajati adalah daerah hutan wisata di Kuningan, Jawa Barat. Total wilayah hutan adalah sekitar 1.300 hektar.</p><p><a style="" href="http://id.wikipedia.org/wiki/Linggarjati" target="_blank" data-mce-href="http://id.wikipedia.org/wiki/Linggarjati" data-mce-style="">Sumber</a>&nbsp;<a style="" href="http://tripholiday.net/linggarjati-agreement-museum.html" target="_blank" data-mce-href="http://tripholiday.net/linggarjati-agreement-museum.html" data-mce-style="">Foto</a></p>', 'Linggajati, Linggarjati, Cilimus, Kuningan, Jawa Barat, Kecamatan Cilimus, Kaki Gunung Ciremai, Belanda, 1946, Perundingan Linggarjati, Batas Wilayah Linggajati, Penduduk Linggajati, sunan, sunan kalijaga, sunan kudus, sunan bonang, syekh maulana maghribi', '2012-08-27 13:02:23', '2012-08-27 13:23:41', NULL, 'padmin', 'terbit'),
(0000000023, 'zcv', '<p>sdf</p>', 'adf', '2012-09-09 22:42:42', '2012-09-09 22:46:00', NULL, 'padmin', 'hapus');

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai`
--

CREATE TABLE IF NOT EXISTS `detail_nilai` (
  `id_nilai` int(10) unsigned zerofill NOT NULL,
  `id_pertanyaan` int(10) unsigned zerofill NOT NULL,
  `id_jawaban` int(10) unsigned zerofill DEFAULT NULL,
  KEY `id_nilai` (`id_nilai`),
  KEY `id_pertanyaan` (`id_pertanyaan`),
  KEY `id_jawaban` (`id_jawaban`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_nilai`
--

INSERT INTO `detail_nilai` (`id_nilai`, `id_pertanyaan`, `id_jawaban`) VALUES
(0000000001, 0000000007, 0000000017),
(0000000001, 0000000008, 0000000021),
(0000000001, 0000000009, 0000000039),
(0000000001, 0000000010, 0000000030),
(0000000001, 0000000011, 0000000038);

-- --------------------------------------------------------

--
-- Table structure for table `foto_album`
--

CREATE TABLE IF NOT EXISTS `foto_album` (
  `foto` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_album` int(10) unsigned zerofill NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`foto`),
  KEY `id_album` (`id_album`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grup_pengguna`
--

CREATE TABLE IF NOT EXISTS `grup_pengguna` (
  `id_grup` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_grup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grup_pengguna`
--

INSERT INTO `grup_pengguna` (`id_grup`, `nama`, `tgl_masuk`) VALUES
(1, 'Administrator', '2012-08-02 06:30:19'),
(2, 'Penulis', '2012-08-08 03:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE IF NOT EXISTS `halaman` (
  `id_halaman` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kata_kunci` text NOT NULL,
  `sub_dari` int(10) unsigned zerofill DEFAULT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_ubah` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(15) NOT NULL,
  `status` enum('terbit','hapus','konsep') NOT NULL DEFAULT 'terbit',
  PRIMARY KEY (`id_halaman`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `kata_kunci`, `sub_dari`, `tgl_masuk`, `tgl_ubah`, `username`, `status`) VALUES
(0000000001, 'About Us', '<p>Empty Post</p>', '', NULL, '2012-09-03 06:24:28', '2012-09-03 06:24:59', 'padmin', 'terbit');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id_jawaban` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id_pertanyaan` int(10) unsigned zerofill NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `benar` enum('benar','salah') NOT NULL,
  PRIMARY KEY (`id_jawaban`),
  KEY `id_pertanyaan` (`id_pertanyaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_pertanyaan`, `jawaban`, `benar`) VALUES
(0000000001, 0000000002, 'So fantastic', 'benar'),
(0000000002, 0000000002, 'very fantastic', 'salah'),
(0000000003, 0000000002, 'too fantastic', 'salah'),
(0000000004, 0000000002, 'fantastic enough', 'salah'),
(0000000005, 0000000005, 'Enough', 'benar'),
(0000000006, 0000000005, 'Indeed', 'salah'),
(0000000007, 0000000005, 'As Well', 'salah'),
(0000000008, 0000000005, 'Too', 'salah'),
(0000000009, 0000000005, 'Fantastic', 'salah'),
(0000000010, 0000000006, 'So Easy', 'salah'),
(0000000011, 0000000006, 'very Easy', 'salah'),
(0000000012, 0000000006, 'Quiet Easy', 'salah'),
(0000000013, 0000000006, 'Too Easy', 'benar'),
(0000000014, 0000000007, '6 m/s', 'salah'),
(0000000015, 0000000007, '7 m/s', 'salah'),
(0000000016, 0000000007, '8 m/s', 'benar'),
(0000000017, 0000000007, '10 m/s', 'salah'),
(0000000018, 0000000007, '12 m/s', 'salah'),
(0000000019, 0000000008, '5 sekon', 'benar'),
(0000000020, 0000000008, '10 sekon', 'salah'),
(0000000021, 0000000008, '15 sekon', 'salah'),
(0000000022, 0000000008, '20 sekon', 'salah'),
(0000000023, 0000000008, '25 sekon', 'salah'),
(0000000029, 0000000010, '1,22', 'salah'),
(0000000030, 0000000010, '1,42', 'benar'),
(0000000031, 0000000010, '1,60', 'salah'),
(0000000032, 0000000010, '1,75', 'salah'),
(0000000033, 0000000010, '1,88', 'salah'),
(0000000034, 0000000011, '1,87 tahun', 'salah'),
(0000000035, 0000000011, '4,85 tahun', 'salah'),
(0000000036, 0000000011, '7,25 tahun', 'benar'),
(0000000037, 0000000011, '9,14 tahun', 'salah'),
(0000000038, 0000000011, '11,2 tahun', 'salah'),
(0000000039, 0000000009, '1,26', 'salah'),
(0000000040, 0000000009, '1,41', 'salah'),
(0000000041, 0000000009, '1,58', 'salah'),
(0000000042, 0000000009, '1,73', 'benar'),
(0000000043, 0000000009, '1,85', 'salah');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE IF NOT EXISTS `kategori_artikel` (
  `id_kategori` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `sub_dari` int(10) unsigned zerofill DEFAULT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_ubah` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(15) NOT NULL,
  `status` enum('terbit','hapus') NOT NULL DEFAULT 'terbit',
  PRIMARY KEY (`id_kategori`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori`, `nama`, `deskripsi`, `sub_dari`, `tgl_masuk`, `tgl_ubah`, `username`, `status`) VALUES
(0000000002, 'asd', 'asd', NULL, '0000-00-00 00:00:00', '2012-08-14 14:03:18', 'padmin', 'hapus'),
(0000000003, 'adf', 'adf', NULL, '2012-08-08 08:01:06', '2012-08-13 13:23:58', 'padmin', 'hapus'),
(0000000004, 'xcv', 'adf', 0000000002, '2012-08-08 08:02:35', '2012-08-13 13:23:53', 'padmin', 'hapus'),
(0000000005, 'test', '', NULL, '2012-08-08 08:06:59', '2012-08-14 14:03:24', 'padmin', 'hapus'),
(0000000006, 'lagi dan lagi', 'asas', 0000000002, '2012-08-08 08:13:35', '2012-08-14 14:03:30', 'padmin', 'hapus'),
(0000000007, 'ooi', 'asd', 0000000002, '2012-08-08 08:14:13', '2012-08-14 14:03:42', 'padmin', 'hapus'),
(0000000008, 'sdgsfg', 'asd', 0000000004, '2012-08-08 08:15:41', '2012-08-14 14:03:36', 'padmin', 'hapus'),
(0000000009, 'asd', 'asd', NULL, '2012-08-08 08:18:13', '2012-08-14 14:03:48', 'padmin', 'hapus'),
(0000000010, '2001', 'siap1', 0000000014, '2012-08-08 08:19:00', '2012-08-14 14:03:53', 'padmin', 'hapus'),
(0000000011, 'Objek Wisata', 'Seputar Objek Wisata', 0000000000, '2012-08-08 08:19:13', '2012-08-23 00:34:22', 'padmin', 'terbit'),
(0000000012, 'Kuliner', 'Objek Wisata Kuliner', 0000000011, '2012-08-08 08:22:05', '2012-08-23 00:36:54', 'padmin', 'terbit'),
(0000000013, 'Vegetasi', 'Wisata Vegetasi', 0000000011, '2012-08-08 08:22:09', '2012-08-23 00:37:52', 'padmin', 'terbit'),
(0000000014, 'Pemandian', 'Wisata Pemandian', 0000000011, '2012-08-08 08:22:14', '2012-08-23 00:35:16', 'padmin', 'terbit'),
(0000000015, 'Sejarah', 'Wisata Sejarah', 0000000011, '2012-08-08 08:22:19', '2012-08-23 00:44:46', 'padmin', 'terbit'),
(0000000016, 'cihuy', 'asd', NULL, '2012-08-08 08:22:26', '0000-00-00 00:00:00', 'padmin', 'terbit'),
(0000000017, 'asek', '', NULL, '2012-08-08 08:22:31', '0000-00-00 00:00:00', 'padmin', 'terbit'),
(0000000018, 'mantep', '', NULL, '2012-08-08 08:22:38', '0000-00-00 00:00:00', 'padmin', 'terbit'),
(0000000019, 'daf', 'asdf', NULL, '2012-08-13 13:04:21', '0000-00-00 00:00:00', 'padmin', 'terbit'),
(0000000020, 'test ', 'test', NULL, '2012-08-13 13:06:27', '0000-00-00 00:00:00', 'padmin', 'terbit'),
(0000000021, 'adsf', 'df', 0000000006, '2012-08-13 13:33:02', '0000-00-00 00:00:00', 'padmin', 'terbit');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_ubah` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`, `deskripsi`, `tgl_masuk`, `tgl_ubah`, `username`) VALUES
(0000000005, 'XI IPA 1', 'Kelas 11 IPA 1', '2012-09-09 01:26:50', '0000-00-00 00:00:00', 'padmin'),
(0000000006, 'XI IPA 2', 'Kelas 11 IPA 2', '2012-09-09 01:27:06', '0000-00-00 00:00:00', 'padmin'),
(0000000007, 'XI IPS I', 'Kelas 11 IPS 1', '2012-09-09 01:27:39', '0000-00-00 00:00:00', 'padmin'),
(0000000008, 'XI IPS II', 'KElas 11 IPS 2', '2012-09-09 01:27:50', '0000-00-00 00:00:00', 'padmin'),
(0000000009, 'XI IPS III', 'Kelas 11 IPS 3', '2012-09-09 01:28:02', '0000-00-00 00:00:00', 'padmin'),
(0000000010, 'X.2', 'Kelas 10.2', '2012-09-09 01:28:25', '0000-00-00 00:00:00', 'padmin');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE IF NOT EXISTS `kunjungan` (
  `ip` char(15) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`ip`, `sumber`, `alamat`, `tanggal`) VALUES
('::1', '', 'localhost/', '2012-11-01'),
('::1', '', 'localhost/halaman/1/About-Us.min', '2012-11-01'),
('219.237.235.150', '', '/', '2012-11-01'),
('127.0.0.1', '', '/?fmt=2.0&intl=us&os=win&ver=11.5.0.228&lang=en-US&fr=login&t=1342154630', '2012-11-01'),
('127.0.0.1', '', '/?fmt=2.0&intl=us&os=win&ver=11.5.0.228&lang=en-US&fr=login&t=1342154630', '2012-11-02'),
('127.0.0.1', '', '/?fmt=2.0&intl=us&os=win&ver=11.5.0.228&lang=en-US&fr=login&t=1342154630', '2012-11-03'),
('127.0.0.1', '', '/?fmt=2.0&intl=us&os=win&ver=11.5.0.228&lang=en-US&fr=login&t=1342154630', '2012-11-04'),
('188.253.6.9', '', '/', '2012-11-04'),
('127.0.0.1', '', '/?fmt=2.0&intl=us&os=win&ver=11.5.0.228&lang=en-US&fr=login&t=1342154630', '2012-11-05'),
('127.0.0.1', '', '/?fmt=2.0&intl=us&os=win&ver=11.5.0.228&lang=en-US&fr=login&t=1342154630', '2012-11-06'),
('61.16.238.87', '', '/', '2012-11-06'),
('127.0.0.1', '', '/?fmt=2.0&intl=us&os=win&ver=11.5.0.228&lang=en-US&fr=login&t=1342154630', '2012-11-07'),
('125.17.1.98', '', '/', '2012-11-07'),
('127.0.0.1', '', '/?fmt=2.0&intl=us&os=win&ver=11.5.0.228&lang=en-US&fr=login&t=1342154630', '2012-11-08'),
('127.0.0.1', '', '/?fmt=2.0&intl=us&os=win&ver=11.5.0.228&lang=en-US&fr=login&t=1342154630', '2012-11-09'),
('146.0.74.67', '', '/', '2012-11-09'),
('::1', '', '/', '2012-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `media` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`media`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media`, `nama_file`, `ukuran`, `tipe`, `tgl_upload`, `username`) VALUES
('02adc31d791a7a1244beee03820de272.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 23:03:54', 'padmin'),
('046e1f22d6faac5bd59011bc619acc4b.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 22:40:02', 'padmin'),
('0ba6260dbe82b1ca2c12a7c1f8f5a851.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 23:06:46', 'padmin'),
('1588575add0fea5c52b60b974ac0497b.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 22:53:34', 'padmin'),
('1b924b43693b30ac7acfedc590564b7b.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 22:43:43', 'padmin'),
('296c362a80ffec2c433521d96fdb8340.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:26:06', 'padmin'),
('3c28e81dee2d7bf6877852b78dd6800d.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:15:54', 'padmin'),
('3ed47940690d1e7a9fe968fc0740e908.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 22:45:11', 'padmin'),
('3fc50294a394e203fadcaeb3152f8950.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 23:05:28', 'padmin'),
('40e142123da3d3542470ab13bf2928ed.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 22:54:06', 'padmin'),
('5f74920876062cd666e7e6b13f24a9d8.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 23:05:56', 'padmin'),
('61d9255b7545ac5d2c37c5d34e2cdafa.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:09:34', 'padmin'),
('65e787db5c048033d640e0306ccc2083.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 22:51:49', 'padmin'),
('6bdb9ab73c011f33c9339f20910679f3.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:17:16', 'padmin'),
('740e35d9071e892552d5226b7bb2a964.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:15:42', 'padmin'),
('74c23e17f64eddac23ce134d35b3e0f3.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 22:59:27', 'padmin'),
('7a24afc8534ec680cc2986098ebbb3d0.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:16:04', 'padmin'),
('8016f8ec7508566a5de38b1601590c12.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:11:23', 'padmin'),
('893cf7e112361b2ef6c16ef5e7ae9fc6.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:13:54', 'padmin'),
('94ddde41d84409304f14045db199bb76.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:12:48', 'padmin'),
('95de8f62fb49bee02db74374d534802b.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 22:40:17', 'padmin'),
('a885431ea1fbc3f0c43c361ad2e43f81.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 23:05:40', 'padmin'),
('b1cf1408aec8c5f9afcbb6ba4492b142.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:19:13', 'padmin'),
('b5253ceeda8779ad776d79e8e6ff7380.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 23:07:23', 'padmin'),
('c8fc028d4548ddc355edf5853a23d753.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 23:10:32', 'padmin'),
('cfd5887b07edd9c53aae82b66000b6db.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:08:51', 'padmin'),
('d3395eadaf48626d49dbb668039f9f45.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 22:51:17', 'padmin'),
('d8010e6939656031e533a0f3532a9376.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 22:53:40', 'padmin'),
('d8cda8a017edf5beb34b81c556b8efc7.jpg', '372898_195182757192535_2135922713_n.jpg', '12518', 'jpg', '2012-09-24 22:41:10', 'padmin'),
('fd7ca3d37122ec1e33350a160b1ba49d.jpg', '46345_187508134707762_752956586_n.jpg', '71667', 'jpg', '2012-09-24 23:16:58', 'padmin');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nis` varchar(15) NOT NULL,
  `id_soal` int(10) unsigned zerofill NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_nilai`),
  KEY `id_soal` (`id_soal`),
  KEY `nis` (`nis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis`, `id_soal`, `waktu`, `tgl_masuk`) VALUES
(0000000001, '10106035', 0000000003, '0 Menit 10 Detik', '2012-10-20 04:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `username` varchar(15) NOT NULL,
  `password` varchar(41) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `biografi` text NOT NULL,
  `kode_verifikasi` varchar(255) NOT NULL,
  `grup_pengguna` int(3) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_ubah` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`username`),
  KEY `group_pengguna` (`grup_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `email`, `nama`, `biografi`, `kode_verifikasi`, `grup_pengguna`, `tgl_masuk`, `tgl_ubah`, `status`) VALUES
('dani', '*9125A3CA35294FBCAC66CC1A9CBBD2496C8A6906', 'dani@hotelayonglinggajati.com', 'Muhammad Dani', 'Pegawai Hotel Ayong Linggarjati', '01bf102482a73f95a84e82491b8a380d', 2, '2012-08-08 06:40:16', '2012-08-15 05:22:43', 'Aktif'),
('padmin', '*9C83F51BB70D827114841113D31817BE0F06A366', 'adityudhna@gmail.com', 'Aditya Yudha Pradhana', 'Master Pradhana Administrator.\nAditya Yudha Pradhana CIO @ StripBandunk\nOrang yang baik hati dan tidak sombong :p', '', 1, '2012-08-01 17:00:00', '2012-08-15 07:12:53', 'Aktif'),
('yuyuy', '*72108C6F34847A76306355FCF5C6E8E1FC46EAE5', 'yuy_awan5@yahoo.co.id', 'yuliana', 'anak baru..', '4b8a2ce96a2f856ff07432f63a8c5ea9', 2, '2012-08-14 11:49:22', '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id_pertanyaan` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `id_soal` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id_pertanyaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`, `id_soal`) VALUES
(0000000001, 'Pertanyaan Pertama', 0000000001),
(0000000002, 'The movie was â€¦â€¦â€¦â€¦ that it was viewed by more than one million people in the world.', 0000000002),
(0000000005, 'Doni served the ball very well .......', 0000000002),
(0000000006, 'This question is ... for the 3rd&nbsp;semester students', 0000000002),
(0000000007, 'Benda&nbsp;m&nbsp;= 3 kg digerakkan pada bidang licin dengan kelajuan awal 10 m/s oleh sebuah gaya&nbsp;F&nbsp;= (12 + 6t)N. Jika semua satuan dalam SI untuk&nbsp;t&nbsp;= 3 sekon, kecepatan benda adalah...', 0000000003),
(0000000008, 'Sebuah mesin melakukan 75 putaran untuk berubah kecepatan dari 600 rpm menjadi 1200 rpm. Waktu yang diperlukan mesin untuk mengubah kecepatan tersebut adalah selama...', 0000000003),
(0000000009, 'Pada setiap titik sudut sebuah segitiga sama sisi dengan panjang sisi&nbsp;a&nbsp;ditempatkan benda bermassa&nbsp;m. Jika besar nya gravitasi yang dialami oleh salah satu benda sebesar Gm2x/a2.&nbsp; besarnya&nbsp;x&nbsp;adalah ...', 0000000003),
(0000000010, 'Kelajuan yang diperlukan oleh sebuah roket yang bergerak lurus ke atas agar mencapai ketinggian di atas Bumi yang sama dengan jari-jari Bumi adalah&nbsp;v1. Dengan demikian, v2/v1adalah .... (MBumi&nbsp;= 5,97 Ã— 1024&nbsp;kg dan&nbsp;RBumi&nbsp;= 6,38 Ã— 106&nbsp;m)', 0000000003),
(0000000011, 'Jarak rata-rata planet Mars dari Matahari adalah 1,52 satuan astronomi. Periode Mars mengelilingi Matahari adalah â€¦.', 0000000003);

-- --------------------------------------------------------

--
-- Table structure for table `relasi_kategori_artikel`
--

CREATE TABLE IF NOT EXISTS `relasi_kategori_artikel` (
  `id_artikel` int(10) unsigned zerofill NOT NULL,
  `id_kategori` int(10) unsigned zerofill NOT NULL,
  KEY `id_artikel` (`id_artikel`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi_kategori_artikel`
--

INSERT INTO `relasi_kategori_artikel` (`id_artikel`, `id_kategori`) VALUES
(0000000019, 0000000002),
(0000000019, 0000000006),
(0000000019, 0000000011),
(0000000017, 0000000011),
(0000000017, 0000000014),
(0000000018, 0000000011),
(0000000018, 0000000013),
(0000000020, 0000000011),
(0000000020, 0000000015),
(0000000016, 0000000011),
(0000000016, 0000000015),
(0000000023, 0000000013),
(0000000023, 0000000014),
(0000000023, 0000000015),
(0000000022, 0000000011),
(0000000022, 0000000015);

-- --------------------------------------------------------

--
-- Table structure for table `relasi_soal_kelas`
--

CREATE TABLE IF NOT EXISTS `relasi_soal_kelas` (
  `id_soal` int(10) unsigned zerofill NOT NULL,
  `id_kelas` int(10) unsigned zerofill NOT NULL,
  KEY `id_soal` (`id_soal`),
  KEY `id_kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi_soal_kelas`
--

INSERT INTO `relasi_soal_kelas` (`id_soal`, `id_kelas`) VALUES
(0000000002, 0000000010),
(0000000002, 0000000008),
(0000000002, 0000000005),
(0000000003, 0000000006),
(0000000003, 0000000005);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(41) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `kelas` int(10) unsigned zerofill DEFAULT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `konfirmasi` varchar(255) NOT NULL,
  `lupa` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`nis`),
  KEY `kelas` (`kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `email`, `password`, `nama`, `jk`, `kelas`, `tempat_lahir`, `tgl_lahir`, `tgl_masuk`, `konfirmasi`, `lupa`) VALUES
('10106035', 'adit@pradhana.net', '*2A1A57C49941F3BE8E4CEB49E4929EF2F8117AF0', 'Aditya Yudha Pradhana', 'L', 0000000005, 'Jakarta', '1989-02-08', '2012-10-20 04:25:11', 'valid', '');

-- --------------------------------------------------------

--
-- Table structure for table `situs`
--

CREATE TABLE IF NOT EXISTS `situs` (
  `judul` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kata_kunci` text NOT NULL,
  `analytic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `situs`
--

INSERT INTO `situs` (`judul`, `slogan`, `deskripsi`, `kata_kunci`, `analytic`) VALUES
('Padmin', 'Pradhana Administrator', 'Pradhana', 'Pradhana', 'UA-30731305-1');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(2) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `gambar`, `keterangan`) VALUES
(23, '1.png', 'Slide 1'),
(24, '2.png', 'Slide 2'),
(25, '3.jpg', 'Slide 3');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id_soal` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `waktu` int(5) NOT NULL DEFAULT '0',
  `kata_kunci` text NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_ubah` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('terbit','konsep') NOT NULL DEFAULT 'konsep',
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `nama`, `deskripsi`, `waktu`, `kata_kunci`, `tgl_masuk`, `tgl_ubah`, `status`, `username`) VALUES
(0000000002, 'Bahasa Inggris Structure 2', 'Bahasa Inggris', 15, 'Bahasa inggris, structure', '2012-09-08 22:18:52', '2012-09-10 01:11:33', 'terbit', 'padmin'),
(0000000003, 'Fisika Kelas XI Semester II', 'Soal ulangan umum fisika kelas XI Semester II', 20, 'Soal fisika, kelas xi, soal ulangan umum, ulangan umum fisika, semester, semester 2. soal ulangan umum fisika', '2012-09-08 22:54:55', '2012-09-10 01:53:56', 'terbit', 'padmin');

-- --------------------------------------------------------

--
-- Table structure for table `tampilan`
--

CREATE TABLE IF NOT EXISTS `tampilan` (
  `tema` varchar(100) NOT NULL,
  `slider` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tampilan`
--

INSERT INTO `tampilan` (`tema`, `slider`) VALUES
('pendidikan', 'Ya');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id_kategori`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `artikel_ibfk_3` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD CONSTRAINT `detail_nilai_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id_nilai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_nilai_ibfk_2` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_nilai_ibfk_3` FOREIGN KEY (`id_jawaban`) REFERENCES `jawaban` (`id_jawaban`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto_album`
--
ALTER TABLE `foto_album`
  ADD CONSTRAINT `foto_album_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_album_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `halaman`
--
ALTER TABLE `halaman`
  ADD CONSTRAINT `halaman_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD CONSTRAINT `kategori_artikel_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`grup_pengguna`) REFERENCES `grup_pengguna` (`id_grup`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relasi_kategori_artikel`
--
ALTER TABLE `relasi_kategori_artikel`
  ADD CONSTRAINT `relasi_kategori_artikel_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_kategori_artikel_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relasi_soal_kelas`
--
ALTER TABLE `relasi_soal_kelas`
  ADD CONSTRAINT `relasi_soal_kelas_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_soal_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
