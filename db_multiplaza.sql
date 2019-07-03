-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2019 at 07:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_multiplaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `norek` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `atas_nama`, `norek`, `logo`) VALUES
(1, 'BNI', 'Andika', '12345678', 'bni.png'),
(2, 'BRI', 'Andika', '87873412323', 'bri.png'),
(3, 'Mandiri', 'Andika', '778734098', 'mandiri.png'),
(4, 'BCA', 'Andika', '998980342487', 'bca.png');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `judul_blog` varchar(100) NOT NULL,
  `slug_blog` varchar(100) NOT NULL DEFAULT '0',
  `isi_blog` text,
  `foto` text,
  `foto_type` char(10) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` char(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `judul_blog`, `slug_blog`, `isi_blog`, `foto`, `foto_type`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, '4 Tips Memakai Lipstik untuk Bibir Tebal, Yuk Coba Praktekin!', '4-tips-memakai-lipstik-untuk-bibir-tebal-yuk-coba-praktekin', '<p>Bagi kalian yang memiliki bibir tebal, cobain dulu deh <em>Teens </em>tips memakai lipstik untuk bibir tebal berikut ini. Menggunakan cara yang tepat saat memakai lipstik bisa menyamarkan bibir kalian yang tebal lho.</p>\r\n<p>Memiliki bibir yang tebal memang tak selamanya membuat para pemiliknya bangga. Ada juga yang merasa tak percaya diri sehingga takut memakai lipstik karena bibirnya bisa terlihat sangat menonjol.</p>\r\n<p>Nah, daripada kalian takut menggunakan lipstik, lebih baik ketahui dulu tips memakai lipstik untuk bibir tebal berikut ini agar bibir kalian terlihat tipis dan cantik ya.</p>\r\n<p><strong>Gunakan foundation</strong></p>\r\n<p>Sebelum mengaplikasikan lipstik ke bibir, kalian harus memakai foundation terlebih dahulu nih <em>Teens</em>. Berikan foundation secara tipis-tipis ke bibir dan ratakan. Foundation bisa membuat lipstik tahan lama dan menyamarkan garis bibir.</p>\r\n<p><strong>Gunakan lipstik yang bertekstur matte</strong></p>\r\n<div id=\"outstream_article\" data-id=\"297\" data-m=\"{\"> </div>\r\n<p>Bibir yang tebal sebaiknya menggunakan lipstik yang bertekstur matte lho <em>Teens</em>. Lebih baik kalian menghindari penggunaan lipstik bertekstur <em>glossy</em> karena bisa membuat bibir terlihat lebih bervolume. Selain itu, jangan aplikasikan <em>lip gloss</em> setelah menggunakan lipstik ya.</p>\r\n<p><strong>Gunakan lip liner</strong></p>\r\n<p>Lip liner juga menjadi hal yang perlu kalian miliki nih <em>Teens</em>. Jadi dengan lip liner kalian bisa membuat garis di bagian dalam garis bibir sehingga akan membentuk bibir yang terlihat lebih tipis.</p>\r\n<p><strong>Gunakan lipstik berwarna natural dan agak gelap</strong></p>\r\n<p>Warna lipstik yang cocok digunakan oleh pemilik bibir tebal adalah warna-warna yang agak gelap dan natural <em>Teens</em>. Misalnya saja warna nude, marun, cokelat, baby pink dan peach adalah warna-warna yang tepat untuk pemilik bibir tebal lho.</p>\r\n<p>Tips memakai lipstik untuk bibir tebal di atas cukup mudah untuk dilakukan kan <em>Teens</em>, jadi selamat mencoba ya!</p>', '4-tips-memakai-lipstik-untuk-bibir-tebal-yuk-coba-praktekin20171124234128', '.jpg', '2017-11-24 16:32:25', 'azmicolejr', '2017-11-25 05:41:28', 'azmicolejr'),
(2, '8 Cara Jenius Untuk Memakai Eyeliner Bagi Pemula', '8-cara-jenius-untuk-memakai-eyeliner-bagi-pemula', '<p>Eyeliner merupakan salah satu bagian make up yang sangat penting! Dengan memakai eyeliner, kamu bisa membuat penampilanmu semakin segar dan tegas. Sayangnya, banyak wanita yang masih kesulitan dalam memakai eyeliner, terutama bagi para pemula dan mereka yang sedang belajar membuat <em>cat-eye</em> yang dramatis.</p>\r\n<p>Nah, berikut ini ada 8 cara jenius untuk memakai eyeliner. Apakah kalian sudah mengetahuinya?</p>\r\n<h3>1. Ketahui posisi memakai eyeliner yang benar</h3>\r\n<p><img src=\"https://kawaiibeautyjapan.com/upload/gallery/3546.jpg\" alt=\"Cara memakai eyeliner dengan posisi yang benar\" width=\"637\" height=\"346\"></p>\r\n<p>Sumber: <a href=\"https://www.buzzfeed.com/nataliebrown/because-cat-eyes-are-hard?utm_term=.hdD4PQ0Xe#.oxBM6Djz0\" target=\"_blank\" rel=\"noopener noreferrer\">buzzfeed</a></p>\r\n<p>Posisi memakai eyeliner yang salah akan menyulitkanmu memakai eyeliner. Daripada memakainya sambil berdiri, lebih baik kamu duduk dan letakkan tangan kananmu di meja yang stabil, lalu letakan jari kelingkingmu di pipi untuk menghindari kesalahan yang tidak diinginkan.</p>\r\n<h3>2. Jangan tarik ujung matamu!</h3>\r\n<p><img src=\"https://kawaiibeautyjapan.com/upload/gallery/3548.jpg\" alt=\"Jangan menarik ujung mata saat memakai eyeliner\" width=\"637\" height=\"318\"></p>\r\n<p>Sumber: <a href=\"http://www.cosmopolitan.com/style-beauty/beauty/news/a33923/hacks-for-fixing-makeup-mistakes/\" target=\"_blank\" rel=\"noopener noreferrer\">cosmopolitan</a></p>\r\n<p>Kulit di area mata merupakan kulit yang tipis. Menarik ujung matamu seperti ini dapat membuat kulit matamu lebih cepat kendur. Tidak apa-apa melakukan kesalahan saat memakai eyeliner, kamu bisa menghapusnya menggunakan <em>cotton bud</em>.</p>\r\n<h3>3. Buat titik-titik atau garis-garis</h3>\r\n<p><img src=\"https://kawaiibeautyjapan.com/upload/gallery/3547.jpg\" alt=\"Cara memakai eyeliner dengan membuat garis petunjuk\" width=\"637\" height=\"637\"></p>\r\n<p>Sumber: <a href=\"http://theglossy.sephora.com/articles/1053/the-tip-off-daytime-drama?om_mmc=aff-linkshare-redirect-TnL5HPStwNw&c3ch=Linkshare&c3nid=TnL5HPStwNw&affid=TnL5HPStwNw-_aB6_3fIjCurTZZgLD0Hng&ranEAID=TnL5HPStwNw&ranMID=2417&ranSiteID=TnL5HPStwNw-_aB6_3fIjCurTZZgLD0Hng&ranLinkID=10-1&browserdefault=true\" target=\"_blank\" rel=\"noopener noreferrer\">theglossy.sephora</a></p>\r\n<p>Kamu bisa membuat titik-titik atau garis-garis pada kelopak matamu terlebih dahulu. Setelah itu, pakailah eyelinermu seperti biasa. Fungsi titik-titik atau garis-garis ini adalah untuk menjadi panduanmu memakai eyeliner.</p>\r\n<h3>4. Gunakan Sendok</h3>\r\n<p><img src=\"https://kawaiibeautyjapan.com/upload/gallery/3549.jpg\" alt=\"Cara memakai eyeliner dengan sendok\" width=\"637\" height=\"370\"></p>\r\n<p>Untuk membuat bentuk<em> cat-eye</em> yang sempurna, kamu bisa menggunakan bantuan peralatan rumah, seperti sendok. Kamu hanya perlu meletakkan di ujung mata dna menjadikannya panduan untuk memakai eyeliner.</p>\r\n<p><img src=\"https://kawaiibeautyjapan.com/upload/gallery/3550.jpg\" alt=\"Cara memakai eyeliner dengan kartu nama\" width=\"637\" height=\"838\"></p>\r\n<p>Sumber: <a href=\"http://www.cosmopolitan.com/style-beauty/beauty/how-to/a31500/eyeliner-hacks-every-woman-must-know/\" target=\"_blank\" rel=\"noopener noreferrer\">cosmopolitan</a></p>\r\n<p>Tidak hanya sendok, kamu juga bisa gunakan kartu nama sebagai panduan membuat cat-eye.</p>\r\n<h3>5. Gambar <em>cat-eye</em> dari bagian luar mata</h3>\r\n<p>Membuat <em>cat-eye</em> dari luar mata akan jauh lebih mudah, lho! Pastikan kamu menggunakan eyeliner terbaik untuk mendapatkan hasil maksimal seperti <a href=\"https://nadeko.co.id/heroine-make-smooth-liquid-eyeliner-super.html?utm_source=kawaiibeautyjapan&utm_medium=advertorial&utm_campaign=2016614-Kiss Me By Isehan 20% all product\" target=\"_blank\" rel=\"noopener noreferrer\">Kiss Me By Isehan Heroine Make Smooth Liquid Eyeliner Super</a>.</p>\r\n<h3>6. Buat tanda pagar</h3>\r\n<p><img src=\"https://kawaiibeautyjapan.com/upload/gallery/3551.jpg\" alt=\"Cara memakai eyeliner dan membuat smoky eyes\" width=\"637\" height=\"427\"></p>\r\n<p>Sumber: <a href=\"http://www.cosmopolitan.com/style-beauty/beauty/how-to/a31500/eyeliner-hacks-every-woman-must-know/\" target=\"_blank\" rel=\"noopener noreferrer\">cosmopolitan</a></p>\r\n<p>Eyeliner pensil bisa kamu gunakan untuk membuat smoky eyes, lho! Caranya mudah, kamu hanya perlu membuat tanda pagar di bagian ujung luar kelopak matamu, lalu baurkan dengan spons.</p>\r\n<h3>7. Diawali dengan berantakan</h3>\r\n<p>Wajar bagi pemula jika masih membuat eyeliner dan mendapatkan hasil yang agak berantakan. Kamu bisa gunakan concealer untuk menghapus bagian yang berantakan tersebut.</p>\r\n<p><img src=\"https://kawaiibeautyjapan.com/upload/gallery/3553.jpg\" alt=\"Cara memakai eyeliner\" width=\"637\" height=\"958\"></p>\r\n<p>Sumber: <a href=\"https://www.buzzfeed.com/nataliebrown/because-cat-eyes-are-hard?utm_term=.hdD4PQ0Xe#.oxBM6Djz0\" target=\"_blank\" rel=\"noopener noreferrer\">buzzfeed</a></p>\r\n<p>Tidak hanya dengan concealer, kamu bahkan bisa menggunakan sedikit petroleum jelly atau bahkan lip gloss untuk merapikan eyelinermu, lho!</p>\r\n<h3>8. Sambil menjepit bulu mata</h3>\r\n<p>Untuk kamu yang terburu-buru, kamu bisa menjepit bulu mata sambil mengaplikasikan eyeliner seperti cara unik yang satu ini, lho!</p>\r\n<p><img src=\"https://kawaiibeautyjapan.com/upload/gallery/3554.jpg\" alt=\"Cara memakai eyeliner\" width=\"637\" height=\"825\"></p>\r\n<p>Sumber: <a href=\"https://www.buzzfeed.com/nataliebrown/because-cat-eyes-are-hard?utm_term=.hdD4PQ0Xe#.oxBM6Djz0\" target=\"_blank\" rel=\"noopener noreferrer\">buzzfeed</a></p>', '8-cara-jenius-untuk-memakai-eyeliner-bagi-pemula20171124234850', '.jpg', '2017-11-25 05:48:50', 'azmicolejr', '2017-11-25 05:50:03', 'azmicolejr'),
(3, 'Tips dan Cara Merawat Batik di Rumah', 'tips-dan-cara-merawat-batik-di-rumah', '<p>Tips dan Cara Merawat Batik di Rumah – Kita sebagai orang Indonesia, wajib memilki pakaian batik di lemari pakaian kita. Apalagi setelah UNESCO menegaskan bahwa batik Indonesia adalah salah satu warisan budaya yang diakui dunia, desainer-desainer batik berlomba untuk membuat batik yang “kekinian”. Hal tersebut pasti membuat kita sebagai masyarakat Indonesia bangga, terutama bagi yang menyukai batik sebagai salah satu gaya berbusana. Tapi, hal tersebut juga harus diimbangi dengan cara merawat batik kesayangan agar kain batik tidak cepat rusak dan warna tidak mudah kusam.</p>\r\n<p>Nah, mau tahu beberapa tips dan cara ampuh merawat batik di rumah agar tetap awet dan terlihat baru setiap hari? Yuk, simak caranya di daftar berikut ini!</p>\r\n<p> </p>\r\n<p><strong>Hindari Mesin Cuci</strong><br>Memang mesin cuci bisa membantu dan mempercepat kamu untuk mencuci pakaian, tapi apa yang terjadi kalau batik kamu sering dicuci dengan mesin cuci? Serat-serat kain batik akan lebih mudah rusak. Pada umumnya membuat batik menggunakan tenaga dan metode manual, tapi enggak ada salahnya kalau sesekali mencuci batik kesayangan dengan menggunakan sentuhan tangan. Beberapa serat dari kain batik sangat tipis ataupun mudah rusak kalau kita salah dicuci, begitu juga dengan pola warnanya. Mencuci dengan tangan pastinya bisa menurunkan resiko rusaknya warna dan serat kain batik.</p>\r\n<p><strong>Pisahkan Batik dengan Bahan Lain</strong><br>Batik terbuat dari berbagai bahan dan warna yang mudah luntur dari pakaian lain tentu menjadi salah satu kendala kita dalam menjaga warna asli batik. Sebaiknya, sebelum mencuci baju batik, pisahkan dulu baju-baju kita yang mudah luntur dengan batik. Hal tersebut demi menjaga warna asli khas batik agar tetap cemerlang dan tidak terkontaminasi dengan warna lain.</p>\r\n<p><strong>Cuci Menggunakan Shampoo</strong><br>Bukan cuma rambut lho yang bisa dibersihkan dengan shampoo, baju batik juga bisa dicuci dengan shampoo. Shampoo pada dasarnya terbuat dari bahan aditif yang lembut banget dan untuk mencuci rambut. Tapi, hal tersebut juga bisa kita diaplikasikan ke batik. Kamu bisa mencoba mencuci batik kesayangan dengan menggunakan shampoo. Zat aditif yang terkandung dalam shampoo tidak sekeras yang ada di dalam detergen yang bisa untuk mencuci pakaian. Sehingga hal ini diyakini mampu menjaga batik agar tetap indah dalam waktu yang relatif lama.</p>\r\n<p><strong>Hindari Menggunakan Pelembut</strong><br>Softener atau pelembut pakaian seringkali kita gunakan untuk membuat kain lebih wangi dan harum saat dipakai, sehingga saat disimpan di dalam lemari, pakaian bisa langsung dikenakan ketika kita mau mengenakannya sehari-hari. Tapi, sisi lain negatif dari pelembut pakaian ini yaitu bisa membuat serat kain mudah rusak. Seringkali baju yang kita cuci dengan pelembut akan mudah robek dikemudian hari. Nah, maka itu dianjurkan untuk tidak menggunakan bahan ini ketika sedang mencuci batik.</p>\r\n<p><strong>Rendam dengan Air Hangat</strong><br>Toppers, kamu pasti familiar atau sering mendengar kalau mencuci batik harus dengan air dingin? Tapi, kalau kamu mau mencoba cara baru dan terbukti ampuh mencuci batik dengan bersih yaitu dengan menggunakan air hangat. Yup, air hangat dapat mempermudah melepaskan kotoran dari serat kain. Kalau batik tidak terlalu dalam keadaan kotor, daripada mengucek batik dengan tangan, lebih baik direndam dengan air hangat sekitar 20-30 menit agar kotoran lepas dan tinggal dibilas. Praktis, kan?</p>\r\n<p><strong>Hindari Menjemur di Bawah Sinar Matahari Langsung</strong><br>Menjemur pakaian langsung dibawah terik matahari di siang hari bisa membuat pakaian lebih cepat kering, tapi lain halnya dengan pakaian batik. Warna dan tekstur kain batik akan rusak bila dijemur di bawah sinar matahari langsung. Karena itu, mengeringkan kain batik cukup dengan menjemur di tempat yang teduh atau diangin-anginkan saja. Lebih lama memang, tapi cara ini membuat warna pada kain batik anda lebih awet.</p>\r\n<p>Kain batik yang merupakan kebanggaan Indonesia ini memang harus kita jaga dan rawat pemakaiannya. Dengan menghindari panas terik dan pelembut serta menggunakan air hangat, dijamin baju batik kamu bisa lebih bersih dan awet warnanya. Toppers, yuk memakai batik sebagai warisan budaya dari generasi ke generasi!</p>', 'tips-dan-cara-merawat-batik-di-rumah20171204042150', '.jpg', '2017-12-04 10:21:50', 'azmicolejr', NULL, ''),
(4, 'Tips Memilih Topi Sesuai dengan Bentuk Wajah', 'tips-memilih-topi-sesuai-dengan-bentuk-wajah', '<p>Aksesoris merupakan salah satu hal yang penting dan dibutuhkan agar penampilanmu terlihat lebih keren, menarik, dan bisa terlihat maksimal setiap harinya. Apakah Toppers suka memakai topi sebagai salah satu aksesoris agar terkesan stylish dan keren? Topi yang dipakai juga harus sesuai dengan bentuk wajah kita lho, karena bisa membuat wajah lebih proporsional dan cocok dipakai sehari-hari.</p>\r\n<p>Mau tahu beberapa tips untuk memilih topi sesuai dengan bentuk wajahmu supaya lebih cocok untuk dipakai? Yuk, cari tahu infonya berikut ini.</p>\r\n<h2>Tips Memilih Topi Sesuai dengan Bentuk Wajah</h2>\r\n<h2> <img src=\"http://localhost/olshop2/assets/images/upload/a2d19e5458c9cf0998544bee4a53054b5.jpg\"></h2>\r\n<h3>Wajah Panjang</h3>\r\n<p>Kalau kamu memiliki bentuk wajah panjang, lebih baik memilih topi dengan pinggiran berbentuk bulat dan datar seperti topi jenis boater atau panama. Topi-topi dengan bentuk tersebut bisa menyamarkan dagu yang panjang sehingga wajah terlihat pas dan proporsional. Hindari menggunakan topi <a href=\"https://www.tokopedia.com/hot/topi-fedora\" target=\"_blank\" rel=\"noopener noreferrer\">fedora</a> karena bisa membuat wajah kamu terkesan lebih panjang dan lebar.</p>\r\n<h3>Wajah Oval</h3>\r\n<p>Kamu bisa dibilang beruntung jika memiliki wajah berbentuk oval karena semua jenis topi akan terlihat cocok dan tinggal memilih ukuran dan bentuk sesuai dengan seleramu. Tapi, bentuk topi yang disarankan untuk kamu yang memiliki wajah oval yaitu topi dengan model bulat bak bowler hat. Selain itu, topi model kupluk dengan bahan rajut atau topi beanie juga bisa dijadikan salah satu referensi untuk pria yang berwajah oval. Jangan menggunakan topi yang memiliki ukuran besar karena akan membuat wajahmu terlihat tertutup atau tenggelam.</p>\r\n<h3>Wajah Persegi</h3>\r\n<p>Banyak yang bilang kalau seseorang yang memiliki wajah persegi biasanya terkenal dengan sifatnya yang galak, sehingga banyak yang memiliki wajah persegi menggunakan topi untuk menutupinya. Nah, topi yang sesuai untuk Toppers yang berwajah persegi yaitu topi yang memiliki pinggiran berbentuk bulat misalnya floppy, bowler dan boaterhat. Model topi ini akan membuat wajah terlihat lebih lembut karena sudut tegas di wajah akan tertutupi dan lebih bulat. Topi berbentuk<a href=\"https://www.tokopedia.com/hot/baseball-cap\" target=\"_blank\" rel=\"noopener noreferrer\"> baseball cap</a> juga cocok karena bisa membuat kesan sporty dan dinamis.</p>\r\n<h3>Wajah Bulat</h3>\r\n<p>Toppers yang memiliki wajah bulat akan cocok menggunakan topi model fedora atau fedora hat. Karena, kalau kamu mengenakan topi ini maka wajahmu bisa terlihat lebih panjang dan ramping. Sebaiknya kamu menghindari menggunakan topi dengan model beanie dan bowler karena bisa membuat wajah kamu terlihat semakin bulat.</p>\r\n<h3>Wajah Hati</h3>\r\n<p>Wajah yang berbentuk hati sebenarnya nggak jauh berbeda dengan wajah berbentuk oval. Perbedaan dari kedua bentuk wajah ini sebenarnuya hanya bentuk wajah hati yang lebih meruncing di dagu dan lebar pada bagian dahi. Kalau kamu memiliki wajah dengan bentuk hati sebaiknya jangan menggunakan topi yang bisa membuat dagu terlihat makin tajam dan panjang. Topi dengan model cloche hat akan lebih cocok karena bisa membantu menyamarkan dahi yang lebar dan dagu yang agak panjang dan lancip tersebut.</p>\r\n<p>Sebelum membeli atau menggunakan topi, lebih baik kamu mengenali bentuk wajahmu dengan topi tersebut terlebih dahulu supaya lebih pas dan proporsional. Kamu bisa mencocokkan berbagai topi dengan bentuk wajah diatas sehingga saat menggunakannya, akan lebih menarik dan nyaman saat beraktivitas. Di Tokopedia kamu juga bisa menemukan berbagai jenis topi terlengkap dan terbaru, lho. Topi mana yang pas untukmu?</p>', 'tips-memilih-topi-sesuai-dengan-bentuk-wajah20171204042308', '.jpg', '2017-12-04 10:23:09', 'azmicolejr', '2017-12-04 10:49:24', 'azmicolejr'),
(5, 'Ketahui Berbagai Penyebab Diare dan Cara Mengatasi Diare', 'ketahui-berbagai-penyebab-diare-dan-cara-mengatasi-diare', '<p>Meskipun tak tergolong serius, diare bukanlah penyakit yang boleh Toppers sepelekan, lho! Diare sendiri merupakan kondisi yang ditandai dengan encernya tinja yang dikeluarkan dengan frekuensi buang air besar (BAB) yang lebih sering dibandingkan dengan biasanya. Biasanya diare hanya berlangsung beberapa hari, namun pada sebagian kasus memanjang hingga berminggu-minggu.</p>\r\n<p>Gejala diare sendiri bisa dimulai dengan munculnya rasa sakit perut dan diikuti dengan frekuensi buang air besar yang jadi lebih sering dibandingkan biasanya. Tekstur tinja juga lebih encer. Pada kasus yang parah, Toppers bahkan bisa deman dan juga mengalami kram perut parah, lho!</p>\r\n<p>Nggak cuma bisa mengganggu aktivitas sehari-hari, diare bisa berakibat pada dehidrasi hingga malnutrisi karena asupan nutrisi yang jadinya tak terserap sempurna oleh tubuh. Tapi, Toppers nggak perlu khawatir karena diare bisa diatasi dengan mudah, kok. Sebelum mengetahui cara mengatasi diare, mari kita simak kebiasaan-kebiasaan dan berbagai hal yang bisa jadi penyebab Diare yang harus Toppers hindari.</p>\r\n<ol>\r\n<li><strong>Oralit sebagai pertolongan pertama mengobati diare</strong><br>Larutan oralit bisa dengan mudah Toppers temukan di apotik, toko obat-obatan, dan juga Tokopedia. Namun, oralit juga bisa dengan mudah dibuat sendiri dirumah, lho! Cukup larutkan satu sendok teh garam dan delapan sendok gula dengan satu liter air hangat. Minum larutan ini tiga hingga empat kali dalam sehari.</li>\r\n<li><strong>Perbanyak minum air putih</strong><br>Hindari mengonsumsi minuman yang memiliki rasa. Utamakan konsumsi air putih. Pada saat diare, tubuh membutuhkan cairan lebih karena tubuh rentan terkena dehidrasi. Minum air putih dengan frekuensi lebih namun dengan volum yang sedikit-sedikit.</li>\r\n<li><strong>Mengobati diare dengan Probiotik</strong><br>Bakteri jahat bisa dilawan menggunakan bakteri baik. Bakteri baik ini berupa probiotik yang banyak bisa ditemukan dari yoghurt dan juga keju.</li>\r\n<li><strong>Manfaatkan air rebusan daun jambu<br></strong>Kandungan flavanoid yang dimiliki daun jambu bermanfaat mengurangi cairang yang ada dalam feses secara progresif sehingga baik untuk mengurangi dampak dari diare. Cara menggunakan daun jambu untuk obat diare-pun sangat mudah. Cukup rebus 15 lembar daun jambu dengan 1 liter air. Tambahkan satu sedok teh garam hingga air berkurang kurang lebih setengahnya. Minum air rebusan daun jambu ini tiga kali sehari.</li>\r\n<li><strong>Teh Chamomile</strong><br>Sama halnya seperti daun jambu, teh Chamomile mengandung zar flavanoid yang bisa membantu mengobati diare. Namun, konsumsi teh ini secukupnya saja mengingat kandungan kafein yang terdapat pada teh juga tak baik untuk penderita diare.</li>\r\n<li><strong>Hindari makanan-makanan tertentu</strong><br>Saat terkena diare, perhatikan asupan makanan  yang masuk ke dalam tubuh. Berikut makanan-makanan yang perlu Toppers hindari saat menderita diare:\r\n<ul>\r\n<li>Makanan olahan susu, kecuali yoghurt</li>\r\n<li>Minuman-minuman berkafein dan beralkohol</li>\r\n<li>Makanan dengan kandungan asam tinggi</li>\r\n<li>Makanan dengan kandungan gula tinggi</li>\r\n<li>Makanan-makanan berminyak</li>\r\n</ul>\r\n</li>\r\n</ol>', 'ketahui-berbagai-penyebab-diare-dan-cara-mengatasi-diare20171204054411', '.jpg', '2017-12-04 11:34:03', 'azmicolejr', '2017-12-04 11:44:12', 'azmicolejr'),
(6, 'Sering Melamun Pertanda Cerdas?', 'sering-melamun-pertanda-cerdas', '<p>Orang dengan pikiran kerap mengembara kemungkinan mempunyai otak lebih tajam. Sebuah studi menunjukkan bahwa orang yang terus menerus \"terganggu\" ternyata mempunyai \"memori kerja\" lebih banyak. Hal tersebut membuat mereka bisa melakukan dua hal bersamaan dalam satu waktu.Partisipan dalam penelitian ini harus menekan tombol sebagai respons terhadap munculnya huruf tertentu di layar atau menekan pada waktu yang tepat. Para peneliti mengecek secara rutin untuk mengetahui apakah pikiran mereka mengembara. Pada akhir penelitian, para ilmuwan mengukur kapasitas memori kerja partisipan, memberi mereka skor untuk kemampuan dalam mengingat sekumpulan huruf diselingi dengan pertanyaan matematika yang mudah.<br><br>Psikolog dari University of Wisconsin-Madison, Daniel Levinson, mengatakan mereka yang mempunyai kapasitas memori kerja lebih tinggi dilaporkan lebih sering melamun selama mengerjakan tugas-tugas sederhana meskipun prestasi mereka tidak meragukan. Hasil dari penelitian Levinson itu dipublikasikan secara online di Psychological Science. Ini pertama kalinya sebuah penelitian menunjukkan hubungan antara pikiran yang sering mengembara alias melamun dengan kecerdasan.<br><br>Levinson mengatakan dibutuhkan lebih banyak ruang kerja mental, misalnya, untuk menambahkan dua angka yang diucapkan tanpa menuliskannya. Kapasitas tersebut dihubungkan dengan pengukuran umum kecerdasan seperti membaca secara menyeluruh dan skor IQ.<br><br>Studi terbaru ini menggarisbawahi betapa pentingnya memori kerja untuk membantu otak fokus dalam masalah-masalah yang paling sulit.</p>', 'sering-melamun-pertanda-cerdas20180211095422', '.jpg', '2017-12-04 11:35:55', 'azmicolejr', '2018-02-11 15:54:22', 'armageddon');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_desc` text NOT NULL,
  `company_address` text NOT NULL,
  `company_maps` text NOT NULL,
  `company_phone` char(30) NOT NULL,
  `company_phone2` char(30) NOT NULL,
  `company_fax` char(30) NOT NULL,
  `company_email` char(30) NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `created_by` char(50) NOT NULL,
  `modified_by` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `company_name`, `company_desc`, `company_address`, `company_maps`, `company_phone`, `company_phone2`, `company_fax`, `company_email`, `foto`, `foto_type`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'MultiPlaza', 'Deskripsi', 'Bandung', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16327777.649419477!2d108.84621849858628!3d-2.415291213289622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sen!2sid!4v1506312173230\" width=\"100%\" height=\"200\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '081241412', '0711412402', '24141', 'toko@gmail.com', 'iboxstore20180726142054', '.png', '2017-11-09 06:45:34', NULL, '', 'gentur');

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id_featured` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` char(10) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id_featured`, `no_urut`, `produk_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 2, '2018-07-26 20:42:15', 'gentur', NULL, ''),
(2, 2, 7, '2018-08-06 19:26:24', 'dika', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `judul_kategori` varchar(20) NOT NULL,
  `slug_kat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `judul_kategori`, `slug_kat`) VALUES
(1, 'Gamming Device', 'gamming-device'),
(2, 'Laptop', 'laptop'),
(3, 'PC', 'pc'),
(4, 'Mouse', 'mouse'),
(5, 'Dompet', 'dompet'),
(6, 'Sepatu', 'sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `invoice` int(200) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `bank_asal` varchar(200) NOT NULL,
  `bank_tujuan` varchar(200) NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(200) NOT NULL,
  `status_notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_pembayaran`, `invoice`, `nama`, `jumlah`, `bank_asal`, `bank_tujuan`, `foto`, `foto_type`, `status_notif`) VALUES
(1, 10, 'Firman Kahfi', '1200', 'BNI', 'Mandiri', '1020180803002601', '.png', 1),
(2, 1, 'Firman Kahfi', '900000', 'BNI', 'Mandiri', '120180807145625', '.jpg', 1),
(3, 11, 'Firman Kahfi', '22', 'BRI', 'BRI', '1120180812084923', '.jpg', 1),
(4, 12, 'Firman Kahfi', '1', 'BNI', 'BRI', '1220180812085811', '.jpg', 1),
(5, 1, 'Firman Kahfi', '929', 'BRI', 'BRI', '120180815093948', '.png', 1),
(6, 13, 'Firman Kahfi', '724', 'BNI', 'BNI', '1320180815144215', '.jpg', 1),
(7, 16, 'Firman Kahfi', '151,000', 'BRI', 'BNI', '1620180819225126', '.jpg', 1),
(8, 21, 'Firman Kahfi', '218,770,500', 'BNI', 'BNI', '2120180827210756', '.png', 1),
(9, 22, 'Firman Kahfi', '218,895,500', 'BNI', 'BRI', '2220180827211150', '.png', 1),
(10, 24, 'Firman Kahfi', '219,119,500', 'BNI', 'BRI', '2420180828064223', '.png', 1),
(11, 25, 'Firman Kahfi', '219,283,500', 'BRI', 'BNI', '2520180828064544', '.jpg', 1),
(12, 27, 'Maulana', '412,000', 'BNI', 'BCA', '2720181104001852', '.jpg', 0),
(13, 28, 'Maulana Ahmad', '657,000', 'BNI', 'Mandiri', '2820181104002721', '.jpg', 0),
(14, 29, 'Maulana Ahmad', '419,000', 'BNI', 'Mandiri', '2920181104004259', '.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` char(50) NOT NULL,
  `nohp` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `nohp`) VALUES
(1, 'Andika', '+6281214031550');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `provinsi_id`, `nama_kota`) VALUES
(1, 21, 'Aceh Barat'),
(2, 21, 'Aceh Barat Daya'),
(3, 21, 'Aceh Besar'),
(4, 21, 'Aceh Jaya'),
(5, 21, 'Aceh Selatan'),
(6, 21, 'Aceh Singkil'),
(7, 21, 'Aceh Tamiang'),
(8, 21, 'Aceh Tengah'),
(9, 21, 'Aceh Tenggara'),
(10, 21, 'Aceh Timur'),
(11, 21, 'Aceh Utara'),
(12, 32, 'Agam'),
(13, 23, 'Alor'),
(14, 19, 'Ambon'),
(15, 34, 'Asahan'),
(16, 24, 'Asmat'),
(17, 1, 'Badung'),
(18, 13, 'Balangan'),
(19, 15, 'Balikpapan'),
(20, 21, 'Banda Aceh'),
(21, 18, 'Bandar Lampung'),
(22, 9, 'Bandung'),
(23, 9, 'Bandung'),
(24, 9, 'Bandung Barat'),
(25, 29, 'Banggai'),
(26, 29, 'Banggai Kepulauan'),
(27, 2, 'Bangka'),
(28, 2, 'Bangka Barat'),
(29, 2, 'Bangka Selatan'),
(30, 2, 'Bangka Tengah'),
(31, 11, 'Bangkalan'),
(32, 1, 'Bangli'),
(33, 13, 'Banjar'),
(34, 9, 'Banjar'),
(35, 13, 'Banjarbaru'),
(36, 13, 'Banjarmasin'),
(37, 10, 'Banjarnegara'),
(38, 28, 'Bantaeng'),
(39, 5, 'Bantul'),
(40, 33, 'Banyuasin'),
(41, 10, 'Banyumas'),
(42, 11, 'Banyuwangi'),
(43, 13, 'Barito Kuala'),
(44, 14, 'Barito Selatan'),
(45, 14, 'Barito Timur'),
(46, 14, 'Barito Utara'),
(47, 28, 'Barru'),
(48, 17, 'Batam'),
(49, 10, 'Batang'),
(50, 8, 'Batang Hari'),
(51, 11, 'Batu'),
(52, 34, 'Batu Bara'),
(53, 30, 'Bau-Bau'),
(54, 9, 'Bekasi'),
(55, 9, 'Bekasi'),
(56, 2, 'Belitung'),
(57, 2, 'Belitung Timur'),
(58, 23, 'Belu'),
(59, 21, 'Bener Meriah'),
(60, 26, 'Bengkalis'),
(61, 12, 'Bengkayang'),
(62, 4, 'Bengkulu'),
(63, 4, 'Bengkulu Selatan'),
(64, 4, 'Bengkulu Tengah'),
(65, 4, 'Bengkulu Utara'),
(66, 15, 'Berau'),
(67, 24, 'Biak Numfor'),
(68, 22, 'Bima'),
(69, 22, 'Bima'),
(70, 34, 'Binjai'),
(71, 17, 'Bintan'),
(72, 21, 'Bireuen'),
(73, 31, 'Bitung'),
(74, 11, 'Blitar'),
(75, 11, 'Blitar'),
(76, 10, 'Blora'),
(77, 7, 'Boalemo'),
(78, 9, 'Bogor'),
(79, 9, 'Bogor'),
(80, 11, 'Bojonegoro'),
(81, 31, 'Bolaang Mongondow (Bolmong)'),
(82, 31, 'Bolaang Mongondow Selatan'),
(83, 31, 'Bolaang Mongondow Timur'),
(84, 31, 'Bolaang Mongondow Utara'),
(85, 30, 'Bombana'),
(86, 11, 'Bondowoso'),
(87, 28, 'Bone'),
(88, 7, 'Bone Bolango'),
(89, 15, 'Bontang'),
(90, 24, 'Boven Digoel'),
(91, 10, 'Boyolali'),
(92, 10, 'Brebes'),
(93, 32, 'Bukittinggi'),
(94, 1, 'Buleleng'),
(95, 28, 'Bulukumba'),
(96, 16, 'Bulungan (Bulongan)'),
(97, 8, 'Bungo'),
(98, 29, 'Buol'),
(99, 19, 'Buru'),
(100, 19, 'Buru Selatan'),
(101, 30, 'Buton'),
(102, 30, 'Buton Utara'),
(103, 9, 'Ciamis'),
(104, 9, 'Cianjur'),
(105, 10, 'Cilacap'),
(106, 3, 'Cilegon'),
(107, 9, 'Cimahi'),
(108, 9, 'Cirebon'),
(109, 9, 'Cirebon'),
(110, 34, 'Dairi'),
(111, 24, 'Deiyai (Deliyai)'),
(112, 34, 'Deli Serdang'),
(113, 10, 'Demak'),
(114, 1, 'Denpasar'),
(115, 9, 'Depok'),
(116, 32, 'Dharmasraya'),
(117, 24, 'Dogiyai'),
(118, 22, 'Dompu'),
(119, 29, 'Donggala'),
(120, 26, 'Dumai'),
(121, 33, 'Empat Lawang'),
(122, 23, 'Ende'),
(123, 28, 'Enrekang'),
(124, 25, 'Fakfak'),
(125, 23, 'Flores Timur'),
(126, 9, 'Garut'),
(127, 21, 'Gayo Lues'),
(128, 1, 'Gianyar'),
(129, 7, 'Gorontalo'),
(130, 7, 'Gorontalo'),
(131, 7, 'Gorontalo Utara'),
(132, 28, 'Gowa'),
(133, 11, 'Gresik'),
(134, 10, 'Grobogan'),
(135, 5, 'Gunung Kidul'),
(136, 14, 'Gunung Mas'),
(137, 34, 'Gunungsitoli'),
(138, 20, 'Halmahera Barat'),
(139, 20, 'Halmahera Selatan'),
(140, 20, 'Halmahera Tengah'),
(141, 20, 'Halmahera Timur'),
(142, 20, 'Halmahera Utara'),
(143, 13, 'Hulu Sungai Selatan'),
(144, 13, 'Hulu Sungai Tengah'),
(145, 13, 'Hulu Sungai Utara'),
(146, 34, 'Humbang Hasundutan'),
(147, 26, 'Indragiri Hilir'),
(148, 26, 'Indragiri Hulu'),
(149, 9, 'Indramayu'),
(150, 24, 'Intan Jaya'),
(151, 6, 'Jakarta Barat'),
(152, 6, 'Jakarta Pusat'),
(153, 6, 'Jakarta Selatan'),
(154, 6, 'Jakarta Timur'),
(155, 6, 'Jakarta Utara'),
(156, 8, 'Jambi'),
(157, 24, 'Jayapura'),
(158, 24, 'Jayapura'),
(159, 24, 'Jayawijaya'),
(160, 11, 'Jember'),
(161, 1, 'Jembrana'),
(162, 28, 'Jeneponto'),
(163, 10, 'Jepara'),
(164, 11, 'Jombang'),
(165, 25, 'Kaimana'),
(166, 26, 'Kampar'),
(167, 14, 'Kapuas'),
(168, 12, 'Kapuas Hulu'),
(169, 10, 'Karanganyar'),
(170, 1, 'Karangasem'),
(171, 9, 'Karawang'),
(172, 17, 'Karimun'),
(173, 34, 'Karo'),
(174, 14, 'Katingan'),
(175, 4, 'Kaur'),
(176, 12, 'Kayong Utara'),
(177, 10, 'Kebumen'),
(178, 11, 'Kediri'),
(179, 11, 'Kediri'),
(180, 24, 'Keerom'),
(181, 10, 'Kendal'),
(182, 30, 'Kendari'),
(183, 4, 'Kepahiang'),
(184, 17, 'Kepulauan Anambas'),
(185, 19, 'Kepulauan Aru'),
(186, 32, 'Kepulauan Mentawai'),
(187, 26, 'Kepulauan Meranti'),
(188, 31, 'Kepulauan Sangihe'),
(189, 6, 'Kepulauan Seribu'),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(191, 20, 'Kepulauan Sula'),
(192, 31, 'Kepulauan Talaud'),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)'),
(194, 8, 'Kerinci'),
(195, 12, 'Ketapang'),
(196, 10, 'Klaten'),
(197, 1, 'Klungkung'),
(198, 30, 'Kolaka'),
(199, 30, 'Kolaka Utara'),
(200, 30, 'Konawe'),
(201, 30, 'Konawe Selatan'),
(202, 30, 'Konawe Utara'),
(203, 13, 'Kotabaru'),
(204, 31, 'Kotamobagu'),
(205, 14, 'Kotawaringin Barat'),
(206, 14, 'Kotawaringin Timur'),
(207, 26, 'Kuantan Singingi'),
(208, 12, 'Kubu Raya'),
(209, 10, 'Kudus'),
(210, 5, 'Kulon Progo'),
(211, 9, 'Kuningan'),
(212, 23, 'Kupang'),
(213, 23, 'Kupang'),
(214, 15, 'Kutai Barat'),
(215, 15, 'Kutai Kartanegara'),
(216, 15, 'Kutai Timur'),
(217, 34, 'Labuhan Batu'),
(218, 34, 'Labuhan Batu Selatan'),
(219, 34, 'Labuhan Batu Utara'),
(220, 33, 'Lahat'),
(221, 14, 'Lamandau'),
(222, 11, 'Lamongan'),
(223, 18, 'Lampung Barat'),
(224, 18, 'Lampung Selatan'),
(225, 18, 'Lampung Tengah'),
(226, 18, 'Lampung Timur'),
(227, 18, 'Lampung Utara'),
(228, 12, 'Landak'),
(229, 34, 'Langkat'),
(230, 21, 'Langsa'),
(231, 24, 'Lanny Jaya'),
(232, 3, 'Lebak'),
(233, 4, 'Lebong'),
(234, 23, 'Lembata'),
(235, 21, 'Lhokseumawe'),
(236, 32, 'Lima Puluh Koto/Kota'),
(237, 17, 'Lingga'),
(238, 22, 'Lombok Barat'),
(239, 22, 'Lombok Tengah'),
(240, 22, 'Lombok Timur'),
(241, 22, 'Lombok Utara'),
(242, 33, 'Lubuk Linggau'),
(243, 11, 'Lumajang'),
(244, 28, 'Luwu'),
(245, 28, 'Luwu Timur'),
(246, 28, 'Luwu Utara'),
(247, 11, 'Madiun'),
(248, 11, 'Madiun'),
(249, 10, 'Magelang'),
(250, 10, 'Magelang'),
(251, 11, 'Magetan'),
(252, 9, 'Majalengka'),
(253, 27, 'Majene'),
(254, 28, 'Makassar'),
(255, 11, 'Malang'),
(256, 11, 'Malang'),
(257, 16, 'Malinau'),
(258, 19, 'Maluku Barat Daya'),
(259, 19, 'Maluku Tengah'),
(260, 19, 'Maluku Tenggara'),
(261, 19, 'Maluku Tenggara Barat'),
(262, 27, 'Mamasa'),
(263, 24, 'Mamberamo Raya'),
(264, 24, 'Mamberamo Tengah'),
(265, 27, 'Mamuju'),
(266, 27, 'Mamuju Utara'),
(267, 31, 'Manado'),
(268, 34, 'Mandailing Natal'),
(269, 23, 'Manggarai'),
(270, 23, 'Manggarai Barat'),
(271, 23, 'Manggarai Timur'),
(272, 25, 'Manokwari'),
(273, 25, 'Manokwari Selatan'),
(274, 24, 'Mappi'),
(275, 28, 'Maros'),
(276, 22, 'Mataram'),
(277, 25, 'Maybrat'),
(278, 34, 'Medan'),
(279, 12, 'Melawi'),
(280, 8, 'Merangin'),
(281, 24, 'Merauke'),
(282, 18, 'Mesuji'),
(283, 18, 'Metro'),
(284, 24, 'Mimika'),
(285, 31, 'Minahasa'),
(286, 31, 'Minahasa Selatan'),
(287, 31, 'Minahasa Tenggara'),
(288, 31, 'Minahasa Utara'),
(289, 11, 'Mojokerto'),
(290, 11, 'Mojokerto'),
(291, 29, 'Morowali'),
(292, 33, 'Muara Enim'),
(293, 8, 'Muaro Jambi'),
(294, 4, 'Muko Muko'),
(295, 30, 'Muna'),
(296, 14, 'Murung Raya'),
(297, 33, 'Musi Banyuasin'),
(298, 33, 'Musi Rawas'),
(299, 24, 'Nabire'),
(300, 21, 'Nagan Raya'),
(301, 23, 'Nagekeo'),
(302, 17, 'Natuna'),
(303, 24, 'Nduga'),
(304, 23, 'Ngada'),
(305, 11, 'Nganjuk'),
(306, 11, 'Ngawi'),
(307, 34, 'Nias'),
(308, 34, 'Nias Barat'),
(309, 34, 'Nias Selatan'),
(310, 34, 'Nias Utara'),
(311, 16, 'Nunukan'),
(312, 33, 'Ogan Ilir'),
(313, 33, 'Ogan Komering Ilir'),
(314, 33, 'Ogan Komering Ulu'),
(315, 33, 'Ogan Komering Ulu Selatan'),
(316, 33, 'Ogan Komering Ulu Timur'),
(317, 11, 'Pacitan'),
(318, 32, 'Padang'),
(319, 34, 'Padang Lawas'),
(320, 34, 'Padang Lawas Utara'),
(321, 32, 'Padang Panjang'),
(322, 32, 'Padang Pariaman'),
(323, 34, 'Padang Sidempuan'),
(324, 33, 'Pagar Alam'),
(325, 34, 'Pakpak Bharat'),
(326, 14, 'Palangka Raya'),
(327, 33, 'Palembang'),
(328, 28, 'Palopo'),
(329, 29, 'Palu'),
(330, 11, 'Pamekasan'),
(331, 3, 'Pandeglang'),
(332, 9, 'Pangandaran'),
(333, 28, 'Pangkajene Kepulauan'),
(334, 2, 'Pangkal Pinang'),
(335, 24, 'Paniai'),
(336, 28, 'Parepare'),
(337, 32, 'Pariaman'),
(338, 29, 'Parigi Moutong'),
(339, 32, 'Pasaman'),
(340, 32, 'Pasaman Barat'),
(341, 15, 'Paser'),
(342, 11, 'Pasuruan'),
(343, 11, 'Pasuruan'),
(344, 10, 'Pati'),
(345, 32, 'Payakumbuh'),
(346, 25, 'Pegunungan Arfak'),
(347, 24, 'Pegunungan Bintang'),
(348, 10, 'Pekalongan'),
(349, 10, 'Pekalongan'),
(350, 26, 'Pekanbaru'),
(351, 26, 'Pelalawan'),
(352, 10, 'Pemalang'),
(353, 34, 'Pematang Siantar'),
(354, 15, 'Penajam Paser Utara'),
(355, 18, 'Pesawaran'),
(356, 18, 'Pesisir Barat'),
(357, 32, 'Pesisir Selatan'),
(358, 21, 'Pidie'),
(359, 21, 'Pidie Jaya'),
(360, 28, 'Pinrang'),
(361, 7, 'Pohuwato'),
(362, 27, 'Polewali Mandar'),
(363, 11, 'Ponorogo'),
(364, 12, 'Pontianak'),
(365, 12, 'Pontianak'),
(366, 29, 'Poso'),
(367, 33, 'Prabumulih'),
(368, 18, 'Pringsewu'),
(369, 11, 'Probolinggo'),
(370, 11, 'Probolinggo'),
(371, 14, 'Pulang Pisau'),
(372, 20, 'Pulau Morotai'),
(373, 24, 'Puncak'),
(374, 24, 'Puncak Jaya'),
(375, 10, 'Purbalingga'),
(376, 9, 'Purwakarta'),
(377, 10, 'Purworejo'),
(378, 25, 'Raja Ampat'),
(379, 4, 'Rejang Lebong'),
(380, 10, 'Rembang'),
(381, 26, 'Rokan Hilir'),
(382, 26, 'Rokan Hulu'),
(383, 23, 'Rote Ndao'),
(384, 21, 'Sabang'),
(385, 23, 'Sabu Raijua'),
(386, 10, 'Salatiga'),
(387, 15, 'Samarinda'),
(388, 12, 'Sambas'),
(389, 34, 'Samosir'),
(390, 11, 'Sampang'),
(391, 12, 'Sanggau'),
(392, 24, 'Sarmi'),
(393, 8, 'Sarolangun'),
(394, 32, 'Sawah Lunto'),
(395, 12, 'Sekadau'),
(396, 28, 'Selayar (Kepulauan Selayar)'),
(397, 4, 'Seluma'),
(398, 10, 'Semarang'),
(399, 10, 'Semarang'),
(400, 19, 'Seram Bagian Barat'),
(401, 19, 'Seram Bagian Timur'),
(402, 3, 'Serang'),
(403, 3, 'Serang'),
(404, 34, 'Serdang Bedagai'),
(405, 14, 'Seruyan'),
(406, 26, 'Siak'),
(407, 34, 'Sibolga'),
(408, 28, 'Sidenreng Rappang/Rapang'),
(409, 11, 'Sidoarjo'),
(410, 29, 'Sigi'),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)'),
(412, 23, 'Sikka'),
(413, 34, 'Simalungun'),
(414, 21, 'Simeulue'),
(415, 12, 'Singkawang'),
(416, 28, 'Sinjai'),
(417, 12, 'Sintang'),
(418, 11, 'Situbondo'),
(419, 5, 'Sleman'),
(420, 32, 'Solok'),
(421, 32, 'Solok'),
(422, 32, 'Solok Selatan'),
(423, 28, 'Soppeng'),
(424, 25, 'Sorong'),
(425, 25, 'Sorong'),
(426, 25, 'Sorong Selatan'),
(427, 10, 'Sragen'),
(428, 9, 'Subang'),
(429, 21, 'Subulussalam'),
(430, 9, 'Sukabumi'),
(431, 9, 'Sukabumi'),
(432, 14, 'Sukamara'),
(433, 10, 'Sukoharjo'),
(434, 23, 'Sumba Barat'),
(435, 23, 'Sumba Barat Daya'),
(436, 23, 'Sumba Tengah'),
(437, 23, 'Sumba Timur'),
(438, 22, 'Sumbawa'),
(439, 22, 'Sumbawa Barat'),
(440, 9, 'Sumedang'),
(441, 11, 'Sumenep'),
(442, 8, 'Sungaipenuh'),
(443, 24, 'Supiori'),
(444, 11, 'Surabaya'),
(445, 10, 'Surakarta (Solo)'),
(446, 13, 'Tabalong'),
(447, 1, 'Tabanan'),
(448, 28, 'Takalar'),
(449, 25, 'Tambrauw'),
(450, 16, 'Tana Tidung'),
(451, 28, 'Tana Toraja'),
(452, 13, 'Tanah Bumbu'),
(453, 32, 'Tanah Datar'),
(454, 13, 'Tanah Laut'),
(455, 3, 'Tangerang'),
(456, 3, 'Tangerang'),
(457, 3, 'Tangerang Selatan'),
(458, 18, 'Tanggamus'),
(459, 34, 'Tanjung Balai'),
(460, 8, 'Tanjung Jabung Barat'),
(461, 8, 'Tanjung Jabung Timur'),
(462, 17, 'Tanjung Pinang'),
(463, 34, 'Tapanuli Selatan'),
(464, 34, 'Tapanuli Tengah'),
(465, 34, 'Tapanuli Utara'),
(466, 13, 'Tapin'),
(467, 16, 'Tarakan'),
(468, 9, 'Tasikmalaya'),
(469, 9, 'Tasikmalaya'),
(470, 34, 'Tebing Tinggi'),
(471, 8, 'Tebo'),
(472, 10, 'Tegal'),
(473, 10, 'Tegal'),
(474, 25, 'Teluk Bintuni'),
(475, 25, 'Teluk Wondama'),
(476, 10, 'Temanggung'),
(477, 20, 'Ternate'),
(478, 20, 'Tidore Kepulauan'),
(479, 23, 'Timor Tengah Selatan'),
(480, 23, 'Timor Tengah Utara'),
(481, 34, 'Toba Samosir'),
(482, 29, 'Tojo Una-Una'),
(483, 29, 'Toli-Toli'),
(484, 24, 'Tolikara'),
(485, 31, 'Tomohon'),
(486, 28, 'Toraja Utara'),
(487, 11, 'Trenggalek'),
(488, 19, 'Tual'),
(489, 11, 'Tuban'),
(490, 18, 'Tulang Bawang'),
(491, 18, 'Tulang Bawang Barat'),
(492, 11, 'Tulungagung'),
(493, 28, 'Wajo'),
(494, 30, 'Wakatobi'),
(495, 24, 'Waropen'),
(496, 18, 'Way Kanan'),
(497, 10, 'Wonogiri'),
(498, 10, 'Wonosobo'),
(499, 24, 'Yahukimo'),
(500, 24, 'Yalimo'),
(501, 5, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `judul_produk` varchar(25) NOT NULL,
  `slug_produk` varchar(50) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` int(11) NOT NULL,
  `kat_id` int(11) NOT NULL,
  `subkat_id` int(11) NOT NULL,
  `supersubkat_id` int(11) NOT NULL,
  `harga_normal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_diskon` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `uploader` int(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updater` char(20) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `judul_produk`, `slug_produk`, `keywords`, `deskripsi`, `berat`, `kat_id`, `subkat_id`, `supersubkat_id`, `harga_normal`, `diskon`, `harga_diskon`, `stok`, `foto`, `foto_type`, `uploader`, `created`, `updater`, `modified`) VALUES
(2, 'Macbook Pro', 'macbook-pro', 'macbook', '<p>Macbook</p>', 1, 2, 2, 2, 1000000, 10, 900000, -7, 'macbook-pro20180806140053', '.jpg', 1, '2018-07-26 19:31:39', 'andikaa', '2018-08-28 06:45:16'),
(3, 'Macbook Air', 'macbook-air', 'macbook air, macbook, apple macbook', '<p>Desain menawan yang disuguhkan oleh MacBook Air New tidak menghilangkan performa maksimal yang Anda butuhkan untuk menyelesaikan beragam jenis pekerjaan. Kehadiran prosesor dual-core Intel Core i5 pada memiliki kecepatan 2,2 GHz dan Turbo Boost speeds hingga 2.7 GHz. Dengan Intel Grafis HD 6000 membuat perangkat ini siap untuk digunakan bermain game, menonton video kesayangan, serta aktifitas mendesain juga dimanjakan oleh grafis yang hebat ini. </p>', 12, 2, 2, 2, 1500000, 20, 1200000, 12, 'macbook-air20180806135315', '.jpg', 13, '2018-08-06 13:53:17', '', NULL),
(4, 'Garuda Dompet Pria Men Lo', 'garuda-dompet-pria-men-long-wallet-zipper-credits-', 'dompet, garuda, dompet pria', '<p><strong data-spm-anchor-id=\"a2o4j.pdp.product_detail.i0.2ca95ab9kQlPNf\">Deskripsi Produk</strong></p>\r\n<p>Dompet dengan desain mewah dan elegan ini sangat cocok untuk menemani hari-hari Anda. Dibuat dari bahan berkualitas dan didesain oleh para ahli dibidangnya, adalah alasan mengapa Anda perlu segera memiliki dompet ini. Harga yang terjangkau dan desain pilihan pun menjadikan dompet ini dicintai semua kalangan.</p>\r\n<p><strong>Desain</strong><strong> dan</strong><strong> Bahan</strong><strong> Berkualitas</strong></p>\r\n<p>Dompet Garuda dibuat dengan material PU yang berkualitas dan dijahit rapi sehingga dijamin awet. Dengan model memanjang, dompet ini dilengkapi <em>credit</em><em> cards</em><em> holder</em> yang bias memuat banyak kartu sekaligus tanpa membuat banyak kehilangan kemewahannya. <em>Zipper</em> di salah satu sisi memiliki ruang yang cukup luas untuk Anda menyimpan ponsel dengan aman.</p>\r\n<p>Kemiripan barang dg foto 95% Cuma tidak ada tempat simcard nya , overall sama semua dan jika order d tempat kita selalu d packing pake kardus , sehingga barang aman sampe tujuan , selisih dikit dengan took sebelah , membeli barang berarti setuju</p>\r\n<p>Dengan model menawan dan banyakfungsi, dompet Garuda cocok untuk menemani aktivitas harianAnda yang penuh gaya.</p>', 1, 5, 8, 12, 150000, 20, 120000, 2, 'garuda-dompet-pria-men-long-wallet-zipper-credits-cards-mobile-phone-holder-hitam20180806150305', '.jpeg', 1, '2018-08-06 15:03:06', '', '2018-08-12 08:57:55'),
(5, 'Garuda Dompet Pria Men Lo', 'garuda-dompet-pria-men-long-packing-box-hitam', 'dompet, garuda, dompet pria hitam', '<p><strong data-spm-anchor-id=\"a2o4j.pdp.product_detail.i0.4130d4a0jhUSK7\">Deskripsi Produk</strong></p>\r\n<p>Dompet dengan desain mewah dan elegan ini sangat cocok untuk menemani hari-hari Anda. Dibuat dari bahan berkualitas dan didesain oleh para ahli dibidangnya, adalah alasan mengapa Anda perlu segera memiliki dompet ini. Harga yang terjangkau dan desain pilihan pun menjadikan dompet ini dicintai semua kalangan.</p>\r\n<p><strong>Desain</strong><strong> dan</strong><strong> Bahan</strong><strong> Berkualitas</strong></p>\r\n<p>Dompet Garuda dibuat dengan material PU yang berkualitas dan dijahit rapi sehingga dijamin awet. Dengan model memanjang, dompet ini dilengkapi <em>credit</em><em> cards</em><em> holder</em> yang bias memuat banyak kartu sekaligus tanpa membuat banyak kehilangan kemewahannya. <em>Zipper</em> di salah satu sisi memiliki ruang yang cukup luas untuk Anda menyimpan ponsel dengan aman.</p>\r\n<p>Kemiripan barang dg foto 95% Cuma tidak ada tempat simcard nya , overall sama semua dan jika order d tempat kita selalu d packing pake kardus , sehingga barang aman sampe tujuan , selisih dikit dengan took sebelah , membeli barang berarti setuju</p>\r\n<p>Dengan model menawan dan banyakfungsi, dompet Garuda cocok untuk menemani aktivitas harianAnda yang penuh gaya.</p>', 1, 5, 8, 12, 120000, 30, 84000, 12, 'garuda-dompet-pria-men-long-packing-box-hitam20180806153851', '.jpg', 1, '2018-08-06 15:38:51', '', NULL),
(6, 'Garuda Gantungan Kunci Do', 'garuda-gantungan-kunci-dompet-trendy-coklat', 'garuda dompet, dompet, dompet pria', '<div class=\"html-content pdp-product-highlights\">\r\n<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4j.pdp.product_detail.i0.54186e2f9hNns8\">Dompet STNK</li>\r\n<li class=\"\">Kulit Asli</li>\r\n<li class=\"\">Kuat dan Awet</li>\r\n<li class=\"\">Simple , Trendy</li>\r\n<li class=\"\">Warna Natural</li>\r\n<li class=\"\">Ukuran 10,5 x 7,5 cm</li>\r\n</ul>\r\n</div>\r\n<div class=\"html-content detail-content\">\r\n<p>Dompet STNK mobil / motor bahan kulit asli , design yang simple dan praktis cocok untuk menyimpan STNK saat Berkendara.</p>\r\n</div>', 1, 5, 8, 12, 55000, 20, 44000, 11, 'garuda-gantungan-kunci-dompet-stnk-motormobil-bahan-kulit-sapi-asli-trendy-coklat20180806190347', '.jpg', 1, '2018-08-06 19:03:47', 'dika', '2018-08-09 10:44:39'),
(7, 'Dompet Garuda - Original ', 'dompet-garuda-original-clutch-canvas-hitam', 'dompet, garuda, dompet pria', '<div class=\"html-content pdp-product-highlights\">\r\n<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4j.pdp.product_detail.i0.66eb2606tr9Dd9\">material : cotton canvas</li>\r\n<li class=\"\">simple dan trendy</li>\r\n<li class=\"\">packing box eklusive</li>\r\n<li class=\"\">tersedia 2 warna : hitam dan biru navy</li>\r\n<li class=\"\">Ukuran 26 x 18 cm</li>\r\n</ul>\r\n</div>\r\n<div class=\"html-content detail-content\">\r\n<p>Clutch Bag dari garuda shop didesain simple dan trendy berfungsi sebagai tas kecil untuk menemani aktifitas anda sehari - hari . Clutch Bag ini cocok digunakan untuk berbagai aktifitas sperti : nongkrong , cafe , nonton , hang out dll . clutch bag ini bisa membawa alat seperti : dompet , handphone , mini parfum , uang koin , passport , dll</p>\r\n</div>', 1, 5, 8, 12, 50000, 10, 45000, 10, 'dompet-garuda-original-clutch-canvas-hitam20180806190532', '.jpeg', 1, '2018-08-06 19:05:33', '', NULL),
(8, 'Garuda Business Men\'s Zip', 'garuda-business-mens-zipper-pu-leather-long-sectio', 'dompet, garuda, dompet pria', '<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4j.pdp.product_detail.i0.28e2d092rNsIHa\">100% Brand New.</li>\r\n<li class=\"\">Material: PU Leather</li>\r\n<li class=\"\">2 Colors available: Black, Brown</li>\r\n<li class=\"\">Size: 19cm x 10cm (L x W)</li>\r\n<li class=\"\">Thickness: Approx 3 cm</li>\r\n<li class=\"\">Feature: Multi interior pockets</li>\r\n<li class=\"\">Design: Business style</li>\r\n<li class=\"\">Item Style: Wallet Purse</li>\r\n<li class=\"\">Open/Close Type: Zipper, ButtonOccasion: Business, Casual</li>\r\n</ul>', 1, 5, 8, 12, 200000, 20, 160000, 14, 'garuda-business-mens-zipper-pu-leather-long-section-multicard-walletpurse-handbag-coklat20180806190758', '.jpg', 1, '2018-08-06 19:07:58', '', NULL),
(9, 'Louis Dompet Import Panja', 'louis-dompet-import-panjang-wanita-compact-unisex', 'dompet, louis, dompet wanita', '<div class=\"html-content pdp-product-highlights\" data-spm-anchor-id=\"a2o4j.pdp.product_detail.i2.8d4b1100USpyQw\">\r\n<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4j.pdp.product_detail.i0.8d4b1100USpyQw\">Japanese and Korean style</li>\r\n<li class=\"\">Suitable for all ladies</li>\r\n<li class=\"\">Elegant</li>\r\n<li class=\"\">Three Fold Wallets</li>\r\n<li class=\"\">Color: Black/Brown</li>\r\n<li class=\"\">Size: 20cm x 11cm x 3cm</li>\r\n<li class=\"\">Material: PU</li>\r\n<li class=\"\">Feature: Stylish, durable and in great shape</li>\r\n<li class=\"\">Wallet Compartments:</li>\r\n<li class=\"\">Money Slots</li>\r\n<li class=\"\">Card Slots</li>\r\n<li class=\"\">Photo Slot</li>\r\n</ul>\r\n</div>\r\n<div class=\"html-content detail-content\"> </div>\r\n<div class=\"pdp-mod-specification\">\r\n<h2 class=\"pdp-mod-section-title \">Spesifikasi dari Louis Dompet Import Panjang Wanita Compact Unisex</h2>\r\n<div class=\"pdp-general-features\">\r\n<ul class=\"specification-keys\">\r\n<li class=\"key-li\"><span class=\"key-title\">Merek</span>\r\n<div class=\"html-content key-value\">Louis</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">SKU</span>\r\n<div class=\"html-content key-value\">176534301_ID-353302081</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Motif / Detail</span>\r\n<div class=\"html-content key-value\">Polos</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Jenis Garansi</span>\r\n<div class=\"html-content key-value\">Tidak Ada Garansi</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Model</span>\r\n<div class=\"html-content key-value\">Louis Dompet Import Panjang Wanita Compact Unisex - Hitam</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Tren Fashion Wanita</span>\r\n<div class=\"html-content key-value\">Korean</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Material</span>\r\n<div class=\"html-content key-value\">PU,Kulit Imitasi</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Momen Penggunaan</span>\r\n<div class=\"html-content key-value\">Casual</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">number of items selling in the SKU</span>\r\n<div class=\"html-content key-value\">2</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Bahan Pakaian</span>\r\n<div class=\"html-content key-value\">Kulit PU</div>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', 14, 5, 9, 13, 250000, 40, 150000, 15, 'louis-dompet-import-panjang-wanita-compact-unisex20180806191725', '.jpg', 1, '2018-08-06 19:17:26', '', NULL),
(10, 'Louis - Clutch Dompet Com', 'louis-clutch-dompet-compact-lipat-wanita-light-gre', 'dompet, louis, dompet wanita', '<h2 class=\"pdp-mod-section-title outer-title\" data-spm-anchor-id=\"a2o4j.pdp.0.i4.13227f47w0nAbc\">Detail produk dari Louis - Clutch Dompet Compact Lipat Wanita - Light Grey</h2>\r\n<div class=\"pdp-product-detail\" data-spm=\"product_detail\">\r\n<div class=\"pdp-product-desc \">\r\n<div class=\"html-content pdp-product-highlights\">\r\n<ul class=\"\">\r\n<li class=\"\">Dompet Clutch Wanita - Style Korea</li>\r\n<li class=\"\">Lipat 3 - Beberapa Compartment</li>\r\n<li class=\"\">Coin Compartment</li>\r\n<li class=\"\">Premium Quality PU</li>\r\n<li class=\"\">Dimensi: 12 x 8 x 4 cm</li>\r\n<li class=\"\">Dimensi saat dibuka: 12 x 24 x 4 cm</li>\r\n</ul>\r\n</div>\r\n<div class=\"html-content detail-content\"> </div>\r\n<div class=\"pdp-mod-specification\">\r\n<h2 class=\"pdp-mod-section-title \">Spesifikasi dari Louis - Clutch Dompet Compact Lipat Wanita - Light Grey</h2>\r\n<div class=\"pdp-general-features\">\r\n<ul class=\"specification-keys\">\r\n<li class=\"key-li\"><span class=\"key-title\">Merek</span>\r\n<div class=\"html-content key-value\">Louis</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">SKU</span>\r\n<div class=\"html-content key-value\">LO031FAAAM1V7XANID-47624019</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Jenis Garansi</span>\r\n<div class=\"html-content key-value\">Tidak Ada Garansi</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Model</span>\r\n<div class=\"html-content key-value\">Louis - Clutch Dompet Compact Lipat Wanita - Light Grey</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Tren Fashion Wanita</span>\r\n<div class=\"html-content key-value\">Korean</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Material</span>\r\n<div class=\"html-content key-value\">Kulit Imitasi</div>\r\n</li>\r\n</ul>\r\n</div>\r\n<div class=\"box-content\"><span class=\"key-title\">Apa yang ada di dalam kotak</span>\r\n<div class=\"html-content box-content-html\">\r\n<p>Louis - Clutch Dompet Compact Lipat Wanita - Light Grey</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1, 5, 9, 13, 250000, 20, 200000, 18, 'louis-clutch-dompet-compact-lipat-wanita-light-grey20180806193017', '.JPG', 12, '2018-08-06 19:30:17', '', NULL),
(11, 'Louis - Dompet Wanita', 'louis-dompet-wanita', 'dompet, louis, dompet wanita', '<h2 class=\"pdp-mod-section-title outer-title\" data-spm-anchor-id=\"a2o4j.pdp.0.i4.3ccd607baM7Oke\">Detail produk dari Louis - Dompet Wanita Panjang Fashion Leaf Pattern - Beige</h2>\r\n<div class=\"pdp-product-detail\" data-spm=\"product_detail\">\r\n<div class=\"pdp-product-desc \">\r\n<div class=\"html-content pdp-product-highlights\">\r\n<ul class=\"\">\r\n<li class=\"\">Dompet Panjang Wanita - Style Korean</li>\r\n<li class=\"\">Dilengkapi Strap</li>\r\n<li class=\"\">Premium Quality PU</li>\r\n<li class=\"\">Dimensi: 18 x 2.5 x 9</li>\r\n</ul>\r\n</div>\r\n<div class=\"html-content detail-content\">\r\n<ul>\r\n<li>Dompet Panjang Wanita - Style Korean</li>\r\n<li data-spm-anchor-id=\"a2o4j.pdp.product_detail.i0.3ccd607baM7Oke\">Premium Quality PU</li>\r\n<li>Dimensi: 18 x 2.5 x 9</li>\r\n</ul>\r\n</div>\r\n<div class=\"pdp-mod-specification\">\r\n<h2 class=\"pdp-mod-section-title \">Spesifikasi dari Louis - Dompet Wanita Panjang Fashion Leaf Pattern - Beige</h2>\r\n<div class=\"pdp-general-features\">\r\n<ul class=\"specification-keys\">\r\n<li class=\"key-li\"><span class=\"key-title\">Merek</span>\r\n<div class=\"html-content key-value\">Louis</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">SKU</span>\r\n<div class=\"html-content key-value\">LO031FAAAL8CV4ANID-45941847</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Jenis Garansi</span>\r\n<div class=\"html-content key-value\">Tidak Ada Garansi</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Model</span>\r\n<div class=\"html-content key-value\">Louis - Dompet Wanita Panjang Fashion Leaf Pattern - Beige</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Tren Fashion Wanita</span>\r\n<div class=\"html-content key-value\">Korean</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Material</span>\r\n<div class=\"html-content key-value\">Kulit Imitasi</div>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1, 5, 9, 13, 250000, 10, 225000, -4, 'louis-dompet-wanita-panjang-fashion-leaf-pattern-beige20180806194130', '.jpg', 12, '2018-08-06 19:41:30', 'superadmin', '2018-08-15 14:40:45'),
(12, 'Louis Dompet Fashion', 'louis-dompet-fashion', 'dompet, louis, dompet wanita', '<h2 class=\"pdp-mod-section-title outer-title\" data-spm-anchor-id=\"a2o4j.pdp.0.i4.3d4c3110CMw4a3\">Detail produk dari Louis Dompet Fashion Wanita Forever Young Lipat 3 Import</h2>\r\n<div class=\"pdp-product-detail\" data-spm=\"product_detail\">\r\n<div class=\"pdp-product-desc \">\r\n<div class=\"html-content pdp-product-highlights\">\r\n<ul class=\"\">\r\n<li class=\"\">Japanese and Korean style</li>\r\n<li class=\"\">Suitable for all ladies</li>\r\n<li class=\"\">Elegant</li>\r\n<li class=\"\">Three Fold Wallets</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">Size: 19 x 3 x 9 cm</li>\r\n</ul>\r\n</div>\r\n<div class=\"html-content detail-content\"> </div>\r\n<div class=\"pdp-mod-specification\">\r\n<h2 class=\"pdp-mod-section-title \">Spesifikasi dari Louis Dompet Fashion Wanita Forever Young Lipat 3 Import</h2>\r\n<div class=\"pdp-general-features\">\r\n<ul class=\"specification-keys\">\r\n<li class=\"key-li\"><span class=\"key-title\">Merek</span>\r\n<div class=\"html-content key-value\">Louis</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">SKU</span>\r\n<div class=\"html-content key-value\">LO031FAAAWSSQPANID-74365076</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Jenis Garansi</span>\r\n<div class=\"html-content key-value\">Tidak Ada Garansi</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Model</span>\r\n<div class=\"html-content key-value\">Louis Dompet Fashion Wanita Lipat 3 Import</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Tren Fashion Wanita</span>\r\n<div class=\"html-content key-value\">Korean</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Momen Penggunaan</span>\r\n<div class=\"html-content key-value\">Casual</div>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1, 5, 9, 13, 245000, 40, 147000, 17, 'louis-dompet-fashion-wanita-forever-young-lipat-3-import20180806194321', '.jpg', 12, '2018-08-06 19:43:21', 'superadmin', '2018-08-10 17:19:40'),
(13, 'Louis - Clutch Dompet Com', 'louis-clutch-dompet-compact-lipat-wanita-black', 'dompet, louis, dompet wanita', '<h2 class=\"pdp-mod-section-title outer-title\" data-spm-anchor-id=\"a2o4j.pdp.0.i4.10b92f70BZmwQv\">Detail produk dari Louis - Clutch Dompet Compact Lipat Wanita - Black</h2>\r\n<div class=\"pdp-product-detail\" data-spm=\"product_detail\">\r\n<div class=\"pdp-product-desc \">\r\n<div class=\"html-content pdp-product-highlights\">\r\n<ul class=\"\">\r\n<li class=\"\">Dompet Clutch Wanita - Style Korea</li>\r\n<li class=\"\">Lipat 3 - Beberapa Compartment</li>\r\n<li class=\"\">Coin Compartment</li>\r\n<li class=\"\">Premium Quality PU</li>\r\n<li class=\"\">Dimensi: 12 x 8 x 4 cm</li>\r\n<li class=\"\">Dimensi saat dibuka: 12 x 24 x 4 cm</li>\r\n</ul>\r\n</div>\r\n<div class=\"html-content detail-content\"> </div>\r\n<div class=\"pdp-mod-specification\">\r\n<h2 class=\"pdp-mod-section-title \">Spesifikasi dari Louis - Clutch Dompet Compact Lipat Wanita - Black</h2>\r\n<div class=\"pdp-general-features\">\r\n<ul class=\"specification-keys\">\r\n<li class=\"key-li\"><span class=\"key-title\">Merek</span>\r\n<div class=\"html-content key-value\">Louis</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">SKU</span>\r\n<div class=\"html-content key-value\">LO031FAAALVDSVANID-47253363</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Jenis Garansi</span>\r\n<div class=\"html-content key-value\">Tidak Ada Garansi</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Model</span>\r\n<div class=\"html-content key-value\">Louis - Clutch Dompet Compact Lipat Wanita - Black</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Tren Fashion Wanita</span>\r\n<div class=\"html-content key-value\">Korean</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Material</span>\r\n<div class=\"html-content key-value\">Kulit Imitasi</div>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1, 5, 9, 13, 125000, 10, 112500, 22, 'louis-clutch-dompet-compact-lipat-wanita-black20180806194510', '.jpg', 12, '2018-08-06 19:45:11', '', '2018-08-26 22:44:06'),
(14, 'Sepatu Vans Oldskool Clas', 'sepatu-vans-oldskool-classic', 'sepatu, sepatu pria, vans, vans oldskool', '<p>Nikmati kenyamanan gerak stiap hari bersama sepatu vans casual baru berbahan suede kombinasi kanvas membuat pergerakan anda ringan saat beraktifitas warna yang menarik dan design yang berkwalitas membuat penampilan anda makin bergaya baik saat santai atau dalam beraktifitas anda sehari-hari<br>kwalitas bagus dengan material pilihan suede dipadukan dengan,design dan warna yang keren<br>*outsole wafle ifc menambah kenyaman saat dipakai<br><br></p>', 1, 6, 10, 14, 100000, 20, 80000, 16, 'sepatu-vans-oldskool20180808095501', '.jpeg', 12, '2018-08-08 09:55:02', 'superadmin', '2018-11-04 00:42:38'),
(15, 'Sepatu Pria/Wanita Vans A', 'sepatu-priawanita-vans-authentic-casual-navy', 'sepatu, sepatu pria, vans, vans authentic casual navy', '<p>Barang 100 ?ru + Box+Bonus kaos kaki<br>- Kami reseller first hand yang artinya barang kami dapatkan langsung dari vendor & bukan dari reseller lain sehingga akurasi merk, model, warna & ukuran lebih kami ketahui<br>- Quality Control khusus, barang di periksa kondisinya sebelum dikirim untuk meminimalisir retur<br>- Packing box duplex sesuai brand sepatu / box universal jika stock box sedang kosong<br>- Sampul plastik, rapih .& kokoh<br>- Shipping form hasil cetak komputer tidak ditulis tangan agar terlihat bonafide<br>- Pengiriman menggunakan jasa ekspedisi JNE dengan angka sukses delivery mencapai 99%<br>- Admin kami stand by 24 jam pada week days, tentative untuk week end<br>- Cek keberadaan paket 24 jam bekerja sama dengan petugas intern JNE, status waktu lkeberangkatan, transit, trouble, nama kurir, dapat di cek dengan mudah<br>- artikel / katalog update<br><br>warna navy,hitam,maroon sama abu<br>SIZE: 36-43<br>sudah termasuk box vans<br>cocok untuk casual/kuliah/sekolah</p>', 1, 6, 10, 14, 100000, 10, 90000, 23, 'sepatu-priawanita-vans-authentic-casual-navy20180808095925', '.jpg', 12, '2018-08-08 09:59:26', '', NULL),
(16, 'Sepatu Pria Vans Casual B', 'sepatu-pria-vans-casual-black', 'sepatu, sepatu pria, vans, vans authentic casual navy', '<p>Nikmati kenyamanan gerak stiap hari bersama sepatu vans casual baru berbahan suede dan outsole wafle ifc membuat pergerakan anda ringan saat beraktifitas warna yang menarik dan design yang berkwalitas membuat penampilan anda makin bergaya baik saat santai atau dalam beraktifitas anda sehari-hari<br>kwalitas bagus dengan material pilihan suede dipadukan dengan,design dan warna yang keren<br><br>Warna black<br>SIZE: 39-43 (lengkap)<br>sudah termasuk box vans<br>cocok untuk casual/kuliah/sekolah<br>tersedia sepatu casual terbaru<br>silahkan pesan sekarang juga!!</p>', 1, 6, 10, 14, 100000, 25, 75000, 53, 'sepatu-pria-vans-casual-black20180808100835', '.jpg', 12, '2018-08-08 10:08:36', '', NULL),
(17, 'Vans Oldskool Black White', 'vans-oldskool-black-white', 'sepatu, sepatu pria, vans, vans oldskool', '<p>Vans Oldskool Black White<br><br>Size 37 s.d 44<br><br>Dipacking menggunakan box<br><br>Murah dan berkualitas<br><br>Foto 100% sesuai dengan asli barang yang kami jual</p>', 1, 6, 10, 14, 125000, 12, 110000, 16, 'vans-oldskool-black-white20180808101115', '.jpg', 12, '2018-08-08 10:11:15', '', NULL),
(18, 'Sepatu Vans Slip On Check', 'sepatu-vans-slip-on-checker-board-premium-quality', 'sepatu, sepatu pria, vans', '<p>READY STOCK!!! <br>SEPATU VANS SLIP ON WAFFLE DT<br>FREE BOX <br>GARANSI KEPUASAN <br>UKURAN 36, 37, 38, 39, 40, 41, 42, 43 <br>SILAHKAN LIHAT LAPAK KAMI UNTUK MELIHAT SEMUA PRODUK KAMI. THANKS Tambahan: Foto yg dipajang adalah realpict. Jadi Dijamin barang sesuai dengan foto.<br>JADI GAUSA RAGU LAGI ...</p>', 1, 6, 10, 14, 170000, 30, 119000, 38, 'sepatu-vans-slip-on-checker-board-premium-quality20180808101324', '.jpg', 12, '2018-08-08 10:13:24', '', '2018-08-19 22:48:52'),
(19, 'Acer Predator 17 VR Ready', 'acer-predator-17-vr-ready-gaming-laptop-g9-793', 'acer, acer predator, gaming', '<p>FEATURES<br>+NVIDIA VR READY GeForce GTX 1070 <br>+17.3\" Full HD IPS G-SYNC<br>+Four Built-in Stereo Speakers and Two Subwoofers<br>+Dolby Audio Predator SoundPound 4.2<br>+Predator PurifiedVoice<br>+Predator ProZone RGB keyboard<br>+PredatorSense for Macro profiles and RGB configurations<br>+Killer DoubleShot Pro wired and wireless connections simultaneously<br>+Type-C Gen 2: Thunderbolt 3 port<br>+Dual Fans Cooling System<br>+Predator FrostCore by CoolerMaster<br>+Predator DustDefender with AeroBlade Fans<br><br>TECHSPECS<br>7th Gen Intel Core i7-7700HQ Processor (6M Cache, up to 3.80 GHz)<br>DDR4 16 GB Dual-channel, upgradable to 64 GB using four soDIMM modules<br>256GB SSD+ 1TB HDD <br>17.3\" Full HD IPS 1920 x 1080 G-SYNC<br>DVD-Super Multi double-layer + Predator FrostCore easy-swappable 3rd fan module<br>NVIDIA GeForce GTX 1070 with 8 GB of GDDR5 <br><br><br>WARRANTY<br>1-Year PT Acer Indonesia (1-Year On Site Service 1500155)<br><br>Shipping Information:<br>Pengiriman via GO-JEK & GRAB tidak direkomendasi untuk model ini dikarenakan kebijakan pengiriman sebagai berikut:<br>-Nilai barang di atas Rp 10 Juta (Max klaim asuransi pengiriman 10 Juta)<br>-Maksimal ukuran barang yang dapat dikirimkan oleh GO-SEND 40cm (panjang), 40cm (lebar), dan 17cm (tinggi) 7kg (berat). GRAB EXPRESS 25cm (panjang), 32cm (lebar), dan 12cm (tinggi) 5kg (berat).</p>', 2, 1, 4, 10, 34000000, 10, 30600000, -4, 'acer-predator-17-vr-ready-gaming-laptop-g9-79320180808113724', '.jpeg', 12, '2018-08-08 11:37:24', '', '2018-08-27 00:44:45'),
(20, 'ASUS ROG GX800VH I7 7820H', 'asus-rog-gx800vh-i7-7820hk-64gb-15tb-gtx1080-sli-w', 'asus rog, asus, gamming laptop', '<div class=\"o-flag__head qa-pd-description-label\">Deskripsi</div>\r\n<div class=\"o-flag__body\">\r\n<div class=\"js-collapsible-product-detail qa-pd-description u-txt--break-word\">\r\n<p>ASUS ROG GX800VH(KBL)-GY005T<br><br>- Intel Kaby Lake 7th Core i7 7820HK 2.9GHz up to 3.9GHz (8MB Cache), 8 Threads<br>- Intel CM238 Express Chipset<br>- 64GB RAM DDR4 2400MHz<br>- 3x 512GB NVMe SSD (RAID0)<br>- Intel HD Graphics 630 - nVidia Geforce GTX1080 SLI 16GB DDR5X 256bit (G-SYNC)<br>- Windows 10 Home 64bit<br>- 18.4\"inch 4K UHD WVA Matte LED Display (3840 x 2160) <br>- Audio by ASUS SONIC STUDIO II with SONIC RADAR<br>- Mechanical Keyboard RGB Aura Color Backlit Keyboard <br>- HD Webcam<br>- Intel Dual Band AC 8260 WiFi 802.11ac + Bluetooth v4.1<br>- Hi-Res ESS Sabre Hifi Chip Audio Dac<br>- 1x Mic in, 1x Headphone Jack (HiFI/ SPDIF), 1x Line out<br>- 1x DOcking Port, 1x Card Reader, 1x HDMI, 1x Mini Display Port<br>- 3x USB3.0, 1x USB3.1 Type C, 1x USB3.1 ThunderBolt 3<br>- Weight : 5.7kg included 8 cells battery - Dock 4.7kg<br>- Garansi Resmi PT. ASUS Indonesia 2 Tahun<br>- ASUS GAMING MOUSE, ROG BAGPACK, ROG CASE<br>- Non ASUS ROG HEADSET<br><br>Special Features:<br>- Liquid Cooling<br>- Overcloking CPU up to 4.4GHz<br>- Overcloking RAM up to 2800MHz<br>- ROG MECHTAG KEYBOARD BROWN SWITCH<br>- Dual Speakers with Dual Tweeter<br>- ESS SABRE headphone DAC and Amplifier</p>\r\n</div>\r\n</div>', 16, 1, 3, 4, 25000000, 11, 22250000, 14, 'asus-rog-gx800vh-i7-7820hk-64gb-15tb-gtx1080-sli-w1020180808113957', '.jpg', 12, '2018-08-08 11:39:58', '', '2018-08-19 19:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `judul_slider` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `foto_size` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` char(50) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `no_urut`, `judul_slider`, `link`, `foto`, `foto_type`, `foto_size`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 3, 'apple store', 'asda', 'apple-store20180814211756', '.jpg', 203, '2017-11-25 08:05:03', '', '2018-08-14 21:17:56', 'superadmin'),
(2, 2, 'Apple', 'asdasd', 'apple20180814211743', '.jpg', 833, '2017-11-25 08:05:03', '', '2018-08-14 21:17:43', 'superadmin'),
(3, 1, 'Abcd', 'http://www.facebook.com', 'abcd20180728203503', '.jpg', 167, '2017-11-25 08:05:03', '', '2018-07-28 20:35:04', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `id_subkategori` int(11) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `judul_subkategori` char(50) NOT NULL,
  `slug_subkat` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_subkategori`, `id_kat`, `judul_subkategori`, `slug_subkat`) VALUES
(1, 2, 'HP', 'hp'),
(2, 2, 'Macbook', 'macbook'),
(3, 1, 'Asus', 'asus'),
(4, 1, 'Acer', 'acer'),
(5, 2, 'Dell', 'dell'),
(6, 2, 'Lenovo', 'lenovo'),
(7, 2, 'Toshiba', 'toshiba'),
(8, 5, 'Dompet Pria', 'dompet-pria'),
(9, 5, 'Dompet Wanita', 'dompet-wanita'),
(10, 6, 'Sepatu Pria', 'sepatu-pria'),
(11, 6, 'Sepatu Wanita', 'sepatu-wanita'),
(12, 6, 'Sepatu Olahraga', 'sepatu-olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `supersubkategori`
--

CREATE TABLE `supersubkategori` (
  `id_supersubkategori` int(11) NOT NULL,
  `id_subkat` int(11) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `judul_supersubkategori` char(50) NOT NULL,
  `slug_supersubkat` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supersubkategori`
--

INSERT INTO `supersubkategori` (`id_supersubkategori`, `id_subkat`, `id_kat`, `judul_supersubkategori`, `slug_supersubkat`) VALUES
(1, 2, 2, 'Macbook Pro', 'macbook-pro'),
(2, 2, 2, 'Macbook Air', 'macbook-air'),
(3, 5, 2, 'Dell Satellite', 'dell-satellite'),
(4, 3, 1, 'Asus ROG', 'asus-rog'),
(5, 5, 2, 'Anting', 'anting'),
(6, 5, 2, 'Dell Standard', 'dell-standard'),
(7, 6, 2, 'Lenovo ThinkPad', 'lenovo-thinkpad'),
(8, 6, 2, 'Lenovo Standard', 'lenovo-standard'),
(9, 7, 2, 'Toshiba Satellite', 'toshiba-satellite'),
(10, 4, 1, 'Acer Predator', 'acer-predator'),
(11, 2, 2, 'Macbook', 'macbook'),
(12, 8, 5, 'Dompet Garuda', 'dompet-garuda'),
(13, 9, 5, 'Dompet Louis', 'dompet-louis'),
(14, 10, 6, 'Vans', 'vans');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(12) NOT NULL,
  `tgl_tracking` datetime NOT NULL,
  `status_tracking` varchar(250) NOT NULL,
  `provinsi` int(250) NOT NULL,
  `kota` int(250) NOT NULL,
  `alamat_tracking` varchar(250) NOT NULL,
  `no_resi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `tgl_tracking`, `status_tracking`, `provinsi`, `kota`, `alamat_tracking`, `no_resi`) VALUES
(1, '2011-08-19 13:45:00', 'dikirim', 9, 22, 'jalan sarijadi no2', '000032659480'),
(2, '2011-08-19 13:45:00', 'sampai', 9, 22, 'jalan sarijadi no3', '000032659480'),
(3, '2011-08-19 13:45:00', 'dikirim', 9, 54, 'Bekasi', '0000329528'),
(4, '2018-08-19 13:45:00', 'sampai', 9, 34, 'Banjar', '0000329527'),
(5, '2018-04-11 00:44:00', 'dikirim', 5, 135, 'Bantul', '0000329529');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ongkir` int(11) NOT NULL,
  `kurir` char(20) NOT NULL,
  `service` char(50) NOT NULL,
  `status` int(11) NOT NULL,
  `resi` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `user_id`, `created`, `ongkir`, `kurir`, `service`, `status`, `resi`) VALUES
(1, 9, '2018-08-06 13:05:04', 29000, 'pos', 'Paket Kilat Khusus', 2, '000032659480'),
(2, 12, '2018-08-08 10:27:30', 0, '', '', 0, NULL),
(3, 9, '2018-08-08 18:18:54', 14000, 'jne', 'OKE', 2, '000032953'),
(4, 1, '2018-08-09 15:28:17', 0, '', '', 0, NULL),
(5, 9, '2018-08-10 21:03:57', 16000, 'jne', 'REG', 1, NULL),
(6, 9, '2018-08-11 10:54:52', 16000, 'jne', 'REG', 2, '000032956'),
(7, 9, '2018-08-11 10:58:20', 29000, 'pos', 'Paket Kilat Khusus', 2, '000032957'),
(8, 9, '2018-08-11 11:02:21', 14000, 'jne', 'OKE', 2, '0000022424242'),
(9, 9, '2018-08-12 08:32:25', 32000, 'pos', 'Express Next Day Barang', 1, NULL),
(10, 9, '2018-08-12 08:39:21', 29000, 'pos', 'Paket Kilat Khusus', 1, NULL),
(11, 9, '2018-08-12 08:48:55', 14000, 'jne', 'OKE', 1, NULL),
(12, 9, '2018-08-12 08:57:40', 29000, 'pos', 'Paket Kilat Khusus', 1, NULL),
(13, 9, '2018-08-15 14:39:46', 29000, 'pos', 'Paket Kilat Khusus', 2, '0000329513'),
(14, 9, '2018-08-17 00:25:42', 29000, 'pos', 'Paket Kilat Khusus', 1, NULL),
(15, 9, '2018-08-19 19:15:00', 18000, 'jne', 'YES', 1, NULL),
(16, 9, '2018-08-19 22:48:43', 32000, 'pos', 'Express Next Day Barang', 2, '0000329516'),
(17, 9, '2018-08-25 18:02:28', 14000, 'jne', 'OKE', 1, NULL),
(18, 9, '2018-08-26 11:59:40', 14000, 'jne', 'OKE', 1, NULL),
(19, 9, '2018-08-27 00:29:57', 14000, 'jne', 'OKE', 1, NULL),
(20, 9, '2018-08-27 00:32:33', 16000, 'tiki', 'REG', 2, '0000329520'),
(21, 9, '2018-08-27 09:00:55', 14000, 'jne', 'OKE', 1, NULL),
(22, 9, '2018-08-27 21:11:08', 29000, 'pos', 'Paket Kilat Khusus', 1, NULL),
(23, 9, '2018-08-28 00:07:15', 14000, 'jne', 'OKE', 1, NULL),
(24, 9, '2018-08-28 06:09:01', 14000, 'jne', 'OKE', 1, NULL),
(25, 9, '2018-08-28 06:44:54', 18000, 'jne', 'YES', 3, '0000329525'),
(26, 15, '2018-11-04 00:10:47', 27000, 'jne', 'YES', 1, NULL),
(27, 15, '2018-11-04 00:17:02', 27000, 'jne', 'YES', 3, '0000329527'),
(28, 15, '2018-11-04 00:20:17', 21000, 'jne', 'REG', 3, '0000329528'),
(29, 15, '2018-11-04 00:42:23', 21000, 'jne', 'REG', 3, '0000329529'),
(30, 9, '2018-12-29 00:37:17', 0, '', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transdet` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_berat` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transdet`, `trans_id`, `user`, `produk_id`, `harga`, `berat`, `total_qty`, `total_berat`, `subtotal`) VALUES
(1, 1, 9, 2, 900000, 1, 1, 1, 900000),
(3, 3, 9, 15, 90000, 1, 2, 2, 180000),
(5, 5, 9, 13, 112500, 1, 4, 4, 450000),
(6, 5, 9, 19, 30600000, 2, 1, 2, 30600000),
(7, 6, 9, 19, 30600000, 2, 1, 2, 30600000),
(8, 7, 9, 20, 22250000, 16, 2, 32, 44500000),
(9, 8, 9, 20, 22250000, 16, 2, 32, 44500000),
(12, 9, 9, 19, 30600000, 2, 1, 2, 30600000),
(13, 10, 9, 11, 225000, 1, 23, 23, 5175000),
(14, 11, 9, 20, 22250000, 16, 2, 32, 44500000),
(15, 12, 9, 4, 120000, 1, 11, 11, 1320000),
(16, 13, 9, 11, 225000, 1, 1, 1, 225000),
(17, 13, 9, 17, 110000, 1, 1, 1, 110000),
(18, 13, 9, 15, 90000, 1, 2, 2, 180000),
(19, 14, 9, 18, 119000, 1, 1, 1, 119000),
(21, 15, 9, 20, 22250000, 16, 2, 32, 44500000),
(22, 16, 9, 18, 119000, 1, 1, 1, 119000),
(23, 4, 1, 19, 30600000, 2, 1, 2, 30600000),
(24, 17, 9, 19, 30600000, 2, 1, 2, 30600000),
(27, 18, 9, 13, 112500, 1, 1, 1, 112500),
(28, 19, 9, 19, 30600000, 2, 1, 2, 30600000),
(29, 20, 9, 19, 30600000, 2, 1, 2, 30600000),
(31, 21, 9, 15, 90000, 1, 2, 2, 180000),
(32, 22, 9, 17, 110000, 1, 1, 1, 110000),
(33, 23, 9, 18, 119000, 1, 1, 1, 119000),
(34, 24, 9, 4, 120000, 1, 1, 1, 120000),
(35, 25, 9, 8, 160000, 1, 1, 1, 160000),
(36, 26, 15, 14, 80000, 1, 2, 2, 160000),
(37, 27, 15, 16, 75000, 1, 3, 3, 225000),
(39, 28, 15, 18, 119000, 1, 2, 2, 238000),
(40, 29, 15, 18, 119000, 1, 2, 2, 238000),
(41, 30, 9, 16, 75000, 1, 1, 1, 75000),
(42, 30, 9, 14, 80000, 1, 1, 1, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `provinsi` int(11) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `usertype` int(11) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `photo` text,
  `photo_type` varchar(10) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `created_on` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `provinsi`, `kota`, `address`, `usertype`, `active`, `photo`, `photo_type`, `ip_address`, `salt`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `created_on`, `modified`) VALUES
(1, 'Super Admin', 'superadmin', '$2y$08$D8i7zeJSUQulCZKsx/FKGul8ZwWcBxcCGL34/J6Ipzs228xyS9TSG', 'firman.mfk@gmail.com', '081228289766', 6, 151, 'asdasdasdsa', 1, 1, 'super-admin20180726144529', '.png', '::1', NULL, 'c6ad242e6fd3de875568c7de5ba23af4a24137ef', 'D.XSOmPbmUX4O14C-imXHuac06f0cacd852a54cd', 1533395358, NULL, 1541267008, 2147483647, '2018-11-04 00:43:28'),
(2, 'Firman', 'firman', '$2y$08$Kn57o.NcbXALJWRDBLD3M.dK26yTZj8DBFTrTUm.cP/rkE/0o5LPu', 'firman@gmail.com', '0824124124', 6, 155, 'Jl. SUka saya aja', 5, 0, NULL, NULL, '::1', NULL, '7a9ffc2ea0ff5ded3ec4b99bc4091dbe5d36dda6', NULL, NULL, NULL, 1520134948, 2147483647, '2018-11-04 00:45:35'),
(3, 'Gaming', 'gaming', '$2y$08$sNkpSriT4DcYZPnSuLMbkOCSGszAldZSVHmumIbd4sFun1u3y/Gme', 'gaming@gmail.com', '0841274124', 9, 22, 'gaksdlfskldfj', 5, 1, NULL, NULL, '::1', NULL, NULL, NULL, NULL, NULL, 1519708259, 2147483647, '2018-02-27 12:10:59'),
(5, 'Andika', 'andika', '$2y$08$OGBPnoG.5Uyw5YHlHq9m1ecYz8/QCvTWG1j.zeOmBPTLwt4WZ1h8K', 'andika@gmail.com', '081228289766', 18, 21, 'akjdlajsdkl asldjals djaslkdjsa ldjalskjd lsakjd', 5, 1, NULL, NULL, '36.77.102.70', NULL, NULL, NULL, NULL, NULL, 1519646726, 1519390594, '2018-07-25 21:28:12'),
(8, 'Muhammad Firman Kahfi', 'FirmanStore', '$2y$08$mPoDxX517cp58WwOhwuwz.4AWbc0D2zgIf34FT9MllqdpBQVHd/Km', 'firman.mfk@gmail.com', '0873194203', NULL, NULL, 'Bandung', 4, 1, 'muhammad-firman-kahfi20180725193238', '.png', '::1', NULL, NULL, NULL, NULL, NULL, 1533230933, 1532521958, '2018-08-03 00:28:53'),
(9, 'Firman Kahfi', 'FirmanMFK', '$2y$08$0r2Eb6eJG6q.xFA.EOU1I.JfgGF7BsHiRhvB9jPMTR0Evf1YHUJnO', 'firmankahfi@gmail.com', '085731942053', 6, 151, 'Tanjung Duren', 5, 1, NULL, NULL, '::1', NULL, NULL, '85qfu3LnIofYTKqG0B6WVee3d9199bed4f6ddd5e', 1532784667, NULL, 1546670080, 1532530440, '2019-01-05 13:34:40'),
(12, 'Dika', 'dika', '$2y$08$v5sdVKuuWrXlNQNdHlRLb..hVhw.NKcreGzy1b7J5g8mtcODwPIqK', 'andika@multiplaza.com', '085731942053', NULL, NULL, 'Bandung', 4, 1, 'dika20180805113844', '.png', '::1', NULL, NULL, NULL, NULL, NULL, 1533967376, 1533443925, '2018-08-11 13:02:56'),
(13, 'Andika', 'andikaa', '$2y$08$8nQEUXkRJ00jJUBupMH4uOAcTLxiOVFjulf/GggAbZsKHzcZ0OPTe', 'dikaa@gmail.com', '085731942053', NULL, NULL, 'Bandung', 3, 1, 'fahmi20180805114116', '.png', '::1', NULL, NULL, NULL, NULL, NULL, 1533967792, 1533444076, '2018-08-11 13:09:52'),
(14, 'Gentur Ariyadi', 'gentur', '$2y$08$fsmUFED63lPpWdcf0NrzKuRtTPv3lPAuWoyOOXfWKo1Ha/gTVF.Se', 'gentur@gmail.com', '08573192272', NULL, NULL, 'Bandung', 4, 1, 'gentur-ariyadi20180811132528', '.png', '::1', NULL, NULL, NULL, NULL, NULL, 1533968771, 1533968728, '2018-08-11 13:26:11'),
(15, 'Maulana Ahmad', 'maulana', '$2y$08$L/m8ztMGR9Pomgr1O3kkgOXJvvM3Cf.8b9reA6RjFJ041PWePWT.i', 'maulana@gmail.com', '085731942053', 9, 23, 'Bandung Indah', 5, 1, NULL, NULL, '::1', NULL, NULL, NULL, NULL, NULL, 1541267152, 1541264997, '2018-11-04 00:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE `users_group` (
  `id_group` int(11) NOT NULL,
  `name_group` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`id_group`, `name_group`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'manager'),
(4, 'supplier'),
(5, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id_featured`),
  ADD KEY `FK_featured_produk` (`produk_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD UNIQUE KEY `id_komentar` (`id_komentar`),
  ADD KEY `user` (`user_id`),
  ADD KEY `produk` (`produk_id`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `FK_kota_provinsi` (`provinsi_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK_produk_kategori` (`kat_id`),
  ADD KEY `FK_produk_subkategori` (`subkat_id`),
  ADD KEY `FK_produk_supersubkategori` (`supersubkat_id`),
  ADD KEY `uploader` (`uploader`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_subkategori`),
  ADD KEY `subkategori_ibfk_1` (`id_kat`);

--
-- Indexes for table `supersubkategori`
--
ALTER TABLE `supersubkategori`
  ADD PRIMARY KEY (`id_supersubkategori`),
  ADD KEY `supersubkategori_ibfk_1` (`id_subkat`),
  ADD KEY `supersubkategori_ibfk_2` (`id_kat`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`),
  ADD KEY `kota_tracking` (`kota`),
  ADD KEY `provinsi_tracking` (`provinsi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `FK_transaksi_users` (`user_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transdet`),
  ADD KEY `FK_transaksi_detail_transaksi` (`trans_id`),
  ADD KEY `FK_transaksi_detail_produk` (`produk_id`),
  ADD KEY `FK_transaksi_detail_users` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_users_group` (`usertype`),
  ADD KEY `kota` (`kota`),
  ADD KEY `provinsi` (`provinsi`);

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id_featured` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id_subkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supersubkategori`
--
ALTER TABLE `supersubkategori`
  MODIFY `id_supersubkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transdet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `featured`
--
ALTER TABLE `featured`
  ADD CONSTRAINT `FK_featured_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `FK_kota_provinsi` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id_provinsi`);

--
-- Constraints for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD CONSTRAINT `FK_login_attempts_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_produk_kategori` FOREIGN KEY (`kat_id`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `FK_produk_subkategori` FOREIGN KEY (`subkat_id`) REFERENCES `subkategori` (`id_subkategori`),
  ADD CONSTRAINT `FK_produk_supersubkategori` FOREIGN KEY (`supersubkat_id`) REFERENCES `supersubkategori` (`id_supersubkategori`),
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`uploader`) REFERENCES `users` (`id`);

--
-- Constraints for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD CONSTRAINT `subkategori_ibfk_1` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supersubkategori`
--
ALTER TABLE `supersubkategori`
  ADD CONSTRAINT `supersubkategori_ibfk_1` FOREIGN KEY (`id_subkat`) REFERENCES `subkategori` (`id_subkategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supersubkategori_ibfk_2` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `kota_tracking` FOREIGN KEY (`kota`) REFERENCES `kota` (`id_kota`),
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`provinsi`) REFERENCES `provinsi` (`id_provinsi`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_transaksi_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `FK_transaksi_detail_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `FK_transaksi_detail_transaksi` FOREIGN KEY (`trans_id`) REFERENCES `transaksi` (`id_trans`),
  ADD CONSTRAINT `FK_transaksi_detail_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_users_group` FOREIGN KEY (`usertype`) REFERENCES `users_group` (`id_group`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
