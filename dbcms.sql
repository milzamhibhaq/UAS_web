-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2025 at 04:31 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `date` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `date`, `title`, `content`, `picture`) VALUES
(4, '2022-02-02', 'Pentingnya Pendidikan Karakter di Era Digital', 'Di era digital yang serba cepat dan penuh dengan informasi seperti sekarang, pendidikan karakter menjadi salah satu aspek yang sangat penting untuk diperhatikan. Pendidikan tidak hanya sekadar mengajarkan pengetahuan akademik, tetapi juga membentuk kepribadian, sikap, dan nilai-nilai moral peserta didik.\r\n\r\nPendidikan karakter membantu siswa mengembangkan rasa tanggung jawab, kejujuran, kedisiplinan, dan empati terhadap sesama. Hal ini sangat diperlukan agar mereka tidak hanya cerdas secara intelektual, tetapi juga memiliki sikap sosial yang baik di masyarakat.\r\n\r\nTeknologi dan internet memberikan banyak kemudahan, tetapi juga tantangan, seperti penyebaran informasi yang salah dan perilaku negatif di media sosial. Oleh karena itu, penguatan pendidikan karakter harus menjadi bagian integral dari kurikulum agar siswa mampu menggunakan teknologi dengan bijak dan bertanggung jawab.\r\n\r\nSekolah, guru, dan orang tua harus bekerja sama untuk menanamkan nilai-nilai positif sejak dini. Dengan begitu, generasi muda akan siap menghadapi tantangan global sekaligus menjadi agen perubahan yang membawa dampak positif bagi bangsa dan negara.', 'Membangun Masa Depan Melalui Pendidikan Digital_ Transformasi Pendidikan di Era Digital.jpg'),
(6, '2025-03-15', 'Tari Remong: Simbol Kepahlawanan dalam Balutan Seni Tradisional Jawa Timur', 'Tari Remong adalah salah satu tari tradisional yang berasal dari Provinsi Jawa Timur, khususnya dari daerah Surabaya dan sekitarnya. Tarian ini identik dengan gerakan gagah dan lincah yang mencerminkan keberanian dan semangat kepahlawanan para prajurit Jawa pada masa lampau. Awalnya, Tari Remong merupakan tarian pembuka dalam pertunjukan Ludruk, namun seiring waktu, ia berkembang menjadi pertunjukan seni yang berdiri sendiri.\r\n\r\nAsal-Usul dan Makna\r\nNama \"Remong\" diambil dari penutup kepala atau mahkota yang dikenakan oleh penari, yang disebut \"remong\". Dalam pertunjukan tradisional, tarian ini dibawakan oleh laki-laki, namun dalam perkembangannya, penari perempuan juga sering membawakannya, tetap dengan menampilkan karakter maskulin dan berani.\r\n\r\nTari Remong menggambarkan sosok prajurit yang hendak pergi ke medan perang. Gerakan-gerakannya menunjukkan kesiapan fisik dan mental, ketangkasan, serta rasa percaya diri yang tinggi. Dalam konteks budaya, tarian ini juga mencerminkan nilai-nilai kepahlawanan, patriotisme, dan semangat pantang menyerah.\r\n\r\nGerakan dan Musik Pengiring\r\nTari Remong memiliki karakteristik gerakan yang enerjik, ritmis, dan penuh ekspresi. Gerakan khasnya meliputi langkah kaki yang mantap, gerakan tangan yang tegas, serta mimik wajah yang mencerminkan keberanian. Musik pengiring tarian ini menggunakan gamelan Jawa Timur seperti bonang, kendang, saron, dan gong. Irama musiknya dinamis, mengikuti alur gerakan yang kuat dan cepat.\r\n\r\nBusana penari Remong biasanya terdiri dari celana panjang, kain jarik, baju tanpa lengan, dan sabuk, dilengkapi dengan aksesoris seperti remong (ikat kepala), selendang, dan keris sebagai simbol keperkasaan.\r\n\r\nNilai Budaya dan Pelestarian\r\nTari Remong tidak hanya memiliki nilai estetika, tetapi juga nilai historis dan edukatif. Tarian ini sering dipentaskan dalam acara-acara budaya, peringatan hari besar, hingga ajang festival seni sebagai upaya untuk melestarikan warisan budaya Nusantara.\r\n\r\nPemerintah daerah, sanggar seni, dan komunitas budaya terus berupaya memperkenalkan Tari Remong kepada generasi muda, baik melalui pendidikan formal, pelatihan tari, maupun media digital. Pelestarian ini penting agar identitas budaya lokal tetap hidup dan berkembang di tengah arus modernisasi.\r\n\r\nPenutup\r\nTari Remong adalah warisan budaya yang kaya akan makna dan nilai-nilai luhur. Dengan keunikannya yang memadukan seni, sejarah, dan semangat kepahlawanan, tari ini menjadi simbol kebanggaan masyarakat Jawa Timur. Melestarikan dan mengenalkan Tari Remong kepada khalayak luas merupakan langkah penting dalam menjaga jati diri bangsa melalui seni tradisional.', 'ef332ea3-d4b1-40fc-842e-64738a8c1355.jpg'),
(7, '2025-03-20', 'Orem-orem: Warisan Kuliner Rakyat dari Malang yang Melegenda', 'Malang tidak hanya dikenal dengan keindahan alam dan sejarahnya, tetapi juga kaya akan ragam kuliner tradisional. Salah satu makanan khas yang menjadi ikon budaya kuliner Malang adalah orem-orem. Hidangan ini bukan sekadar sajian lezat, melainkan juga cerminan kearifan lokal masyarakat Malang dalam mengolah bahan sederhana menjadi makanan yang nikmat dan sarat makna.\r\n\r\nAsal Usul dan Filosofi\r\nOrem-orem berasal dari tradisi masyarakat Jawa, khususnya Malang dan sekitarnya. Nama \"orem-orem\" diyakini berasal dari kata dalam bahasa Jawa yang berarti \"mengorek-ngorek\" atau \"mengambil sedikit demi sedikit\", mencerminkan cara makan rakyat kecil yang sederhana namun penuh rasa syukur.\r\n\r\nAwalnya, orem-orem disajikan pada acara hajatan, kenduri, atau syukuran sebagai bentuk sedekah makanan. Lambat laun, makanan ini menjadi hidangan sehari-hari yang bisa dinikmati siapa saja.\r\n\r\nKomposisi dan Cita Rasa\r\nOrem-orem terdiri dari potongan tempe goreng yang dimasak dalam kuah santan kental berwarna kuning. Kuah ini dibumbui dengan rempah-rempah seperti bawang putih, bawang merah, kunyit, ketumbar, dan daun salam. Biasanya disajikan bersama ketupat atau lontong, dan dilengkapi dengan tauge serta sambal bagi penikmat rasa pedas.\r\n\r\nCita rasa orem-orem sangat khas: gurih, sedikit manis, dan kaya aroma rempah. Tempe yang digunakan biasanya adalah tempe semangit, yaitu tempe yang telah difermentasi lebih lama, sehingga memberikan rasa yang lebih kuat dan legit.\r\n\r\nNilai Budaya dan Identitas Lokal\r\nOrem-orem bukan hanya makanan, tetapi bagian dari identitas budaya warga Malang. Keberadaannya memperlihatkan kekayaan kuliner berbasis hasil bumi lokal seperti tempe dan kelapa. Selain itu, makanan ini juga mencerminkan gaya hidup sederhana dan semangat gotong royong masyarakat, karena sering kali dimasak bersama-sama dalam acara besar.\r\n\r\nHingga kini, orem-orem masih mudah ditemukan, baik di warung kaki lima maupun rumah makan khas Jawa di Malang. Beberapa tempat bahkan menjadikan orem-orem sebagai menu andalan untuk menarik wisatawan kuliner.\r\n\r\nPelestarian Kuliner Tradisional\r\nDi tengah arus modernisasi dan makanan cepat saji, menjaga eksistensi orem-orem sebagai makanan tradisional adalah bagian penting dari pelestarian budaya. Pemerintah daerah, pelaku UMKM, hingga komunitas pecinta kuliner lokal terus mendorong promosi orem-orem melalui festival makanan, media sosial, dan wisata kuliner.\r\n\r\nGenerasi muda juga diajak untuk tidak melupakan akar budaya melalui pelatihan memasak makanan tradisional di sekolah atau sanggar budaya.\r\n\r\nPenutup\r\nOrem-orem adalah bukti bahwa budaya tidak selalu berbentuk tari atau upacara adat. Kuliner seperti orem-orem menjadi media pelestarian nilai, rasa, dan sejarah yang melekat erat dalam kehidupan masyarakat. Dengan terus memperkenalkan dan melestarikannya, orem-orem akan tetap hidup sebagai bagian dari warisan budaya Malang yang membanggakan.', 'Malang - Merdeka_com _ Orem-Orem Pak Syahri, rela antri untuk dapatkan kelezatannya, mau_.jpg'),
(8, '2025-04-17', 'Pemanfaatan Kecerdasan Buatan (AI) dalam Dunia Pendidikan: Menuju Pembelajaran yang Lebih Cerdas dan Personal', 'Perkembangan teknologi yang pesat telah membawa perubahan signifikan dalam berbagai aspek kehidupan, termasuk di dunia pendidikan. Salah satu inovasi yang kini semakin banyak diterapkan dalam proses pembelajaran adalah Artificial Intelligence (AI) atau kecerdasan buatan. AI menghadirkan pendekatan baru yang mampu membuat proses belajar mengajar menjadi lebih efektif, personal, dan adaptif terhadap kebutuhan peserta didik WELL.\r\n\r\nApa Itu AI dalam Pendidikan?\r\nArtificial Intelligence dalam konteks pendidikan adalah teknologi yang memungkinkan sistem komputer untuk \"berpikir\" dan \"belajar\" dari data, sehingga dapat memberikan rekomendasi, membuat keputusan, atau merespons interaksi secara cerdas. Dalam pembelajaran, AI dapat digunakan untuk:\r\n\r\nMenganalisis kemampuan siswa,\r\n\r\nMenyediakan materi belajar yang disesuaikan (personalized learning),\r\n\r\nMemberikan umpan balik otomatis, serta\r\n\r\nMembantu guru dalam merancang kurikulum dan penilaian.\r\n\r\nManfaat Penggunaan AI dalam Pembelajaran\r\nPembelajaran yang Dipersonalisasi\r\nAI mampu mengenali kecepatan belajar, gaya belajar, dan kelemahan siswa secara individu. Sistem ini kemudian menyajikan materi atau latihan yang sesuai, sehingga setiap siswa bisa belajar sesuai kebutuhan dan potensinya.\r\n\r\nUmpan Balik Real-Time\r\nDalam platform pembelajaran berbasis AI, siswa bisa mendapatkan koreksi atau masukan secara instan dari sistem, tanpa harus menunggu koreksi manual dari guru.\r\n\r\nGuru sebagai Fasilitator Cerdas\r\nAI membantu guru dalam mengelola kelas, membuat analisis performa siswa, dan merancang pembelajaran yang lebih tepat sasaran, sehingga guru bisa lebih fokus pada pembinaan karakter dan kreativitas siswa.\r\n\r\nAkses Pendidikan yang Lebih Luas\r\nMelalui aplikasi berbasis AI, pembelajaran bisa diakses kapan saja dan di mana saja. Ini sangat membantu siswa di daerah terpencil atau mereka yang memiliki kebutuhan belajar khusus.\r\n\r\nContoh Penerapan AI dalam Pendidikan\r\nChatbot edukatif yang menjawab pertanyaan siswa 24/7.\r\n\r\nAplikasi belajar adaptif seperti Duolingo, Khan Academy, atau Ruangguru yang merekomendasikan materi sesuai tingkat kemampuan siswa.\r\n\r\nSistem prediktif yang bisa memperkirakan kesulitan siswa berdasarkan hasil belajar sebelumnya.\r\n\r\nAI dalam penilaian otomatis untuk soal pilihan ganda maupun esai dengan natural language processing (NLP).\r\n\r\nTantangan dan Etika Penggunaan AI\r\nMeskipun AI membawa banyak manfaat, penerapannya dalam pendidikan juga menghadapi beberapa tantangan, antara lain:\r\n\r\nPrivasi dan keamanan data siswa,\r\n\r\nKesenjangan akses teknologi di daerah tertinggal,\r\n\r\nKetergantungan berlebihan pada mesin, dan\r\n\r\nKurangnya pemahaman guru dan siswa tentang penggunaan AI secara bijak.\r\n\r\nOleh karena itu, diperlukan pendekatan yang seimbang agar AI benar-benar menjadi alat bantu, bukan pengganti peran manusia dalam pendidikan.\r\n\r\nPenutup\r\nAI bukanlah ancaman bagi dunia pendidikan, melainkan peluang besar untuk meningkatkan kualitas pembelajaran. Dengan pemanfaatan yang bijak dan terencana, kecerdasan buatan dapat mendukung proses belajar yang lebih efisien, inklusif, dan relevan dengan kebutuhan masa depan. Guru dan siswa perlu dibekali literasi digital dan etika teknologi agar mampu menghadapi era pendidikan berbasis AI dengan bijak dan bertanggung jawab.', 'AI Homework Tutorship.jpg'),
(16, '2025-05-17', 'Politik Perang Iran vs Israel: Ketegangan Abadi di Timur Tengah', 'Ketegangan antara Iran dan Israel telah berlangsung selama puluhan tahun, berakar pada konflik ideologi, kepentingan geopolitik, dan dinamika kekuasaan di kawasan Timur Tengah. Dalam beberapa tahun terakhir, perseteruan ini semakin meningkat dan berisiko memicu perang terbuka yang dapat melibatkan kekuatan global lainnya.\r\n\r\nLatar Belakang Konflik\r\nIran, sebagai negara yang menganut sistem pemerintahan teokrasi Syiah, secara terbuka menentang eksistensi Israel sebagai negara Yahudi. Retorika anti-Israel kerap digaungkan oleh pemimpin-pemimpin Iran, sementara dukungan Iran terhadap kelompok-kelompok seperti Hizbullah di Lebanon dan Hamas di Palestina dianggap sebagai ancaman langsung oleh Israel.\r\n\r\nSebaliknya, Israel melihat Iran sebagai musuh strategis utama di kawasan. Ambisi nuklir Iran, meskipun dibantah sebagai pengembangan senjata, dipandang Israel sebagai potensi ancaman eksistensial. Karena itu, Israel sering melakukan operasi intelijen dan militer terhadap fasilitas-fasilitas yang diduga menjadi bagian dari program nuklir Iran.\r\n\r\nMotif Politik dan Strategi\r\nSecara politik, baik Iran maupun Israel memanfaatkan konflik ini untuk memperkuat posisi domestik dan internasional masing-masing. Iran menggunakan isu Palestina dan perlawanan terhadap Israel untuk mempersatukan kekuatan Syiah dan memperluas pengaruhnya di Timur Tengah. Sementara itu, Israel menekankan ancaman Iran untuk mendapatkan dukungan internasional, khususnya dari Amerika Serikat dan sekutunya.\r\n\r\nKonflik ini juga menjadi ajang perang bayangan (shadow war), di mana kedua negara terlibat dalam sabotase, serangan siber, pembunuhan ilmuwan, dan serangan drone di kawasan seperti Suriah dan Laut Merah.\r\n\r\nDampak Regional dan Internasional\r\nPerang terbuka antara Iran dan Israel bisa menimbulkan dampak besar bagi kestabilan regional. Negara-negara seperti Lebanon, Suriah, Irak, dan Yaman bisa terseret dalam konflik yang lebih luas, mengingat keterlibatan milisi-milisi yang didukung Iran.\r\n\r\nSelain itu, konflik ini dapat mengguncang pasar energi global, mengingat posisi strategis Selat Hormuz yang menjadi jalur ekspor minyak utama. Keterlibatan negara besar seperti Amerika Serikat, Rusia, dan China pun sangat mungkin terjadi, memperluas skala konflik menjadi lebih kompleks.\r\n\r\nUpaya Diplomasi dan Harapan Perdamaian\r\nMeski tensi tinggi terus berlanjut, beberapa upaya diplomatik tetap berjalan. Negara-negara Arab yang mulai melakukan normalisasi hubungan dengan Israel (seperti Uni Emirat Arab dan Bahrain) menunjukkan adanya perubahan geopolitik yang signifikan. Namun, selama akar ideologi dan rivalitas kekuasaan tidak diselesaikan, perdamaian permanen antara Iran dan Israel masih jauh dari harapan.\r\n\r\nKesimpulan:\r\nKonflik politik antara Iran dan Israel bukan sekadar persoalan dua negara, melainkan mencerminkan dinamika kekuatan Timur Tengah yang penuh ketegangan dan kepentingan global. Solusi jangka panjang membutuhkan pendekatan diplomatik yang menyeluruh, termasuk pengakuan terhadap hak-hak rakyat Palestina dan jaminan keamanan bagi semua negara di kawasan.\r\n\r\n', 'Serangan Israel di Lubnan sasar kakitangan perubatan.jpeg'),
(17, '2025-05-04', 'coban rondo memanjakan mata', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo, nulla at vestibulum posuere, purus magna porta lorem, at fermentum nisi risus non sapien. Nulla facilisi. Praesent nec magna a turpis elementum tincidunt. In nec urna sed enim porttitor convallis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis ac velit vel nisl ultrices dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus tincidunt lorem sed nisi euismod, in suscipit justo vestibulum. Integer sagittis metus ut lectus tempus, ac convallis tellus fringilla.\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo, nulla at vestibulum posuere, purus magna porta lorem, at fermentum nisi risus non sapien. Nulla facilisi. Praesent nec magna a turpis elementum tincidunt. In nec urna sed enim porttitor convallis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis ac velit vel nisl ultrices dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus tincidunt lorem sed nisi euismod, in suscipit justo vestibulum. Integer sagittis metus ut lectus tempus, ac convallis tellus fringilla.\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo, nulla at vestibulum posuere, purus magna porta lorem, at fermentum nisi risus non sapien. Nulla facilisi. Praesent nec magna a turpis elementum tincidunt. In nec urna sed enim porttitor convallis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis ac velit vel nisl ultrices dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus tincidunt lorem sed nisi euismod, in suscipit justo vestibulum. Integer sagittis metus ut lectus tempus, ac convallis tellus fringilla.', 'Air Terjun Coban Rondo, Malang, Jawa Timur.jpg'),
(18, '2025-06-04', 'Tambang Nikel di Raja Ampat: Antara Energi Hijau dan Ancaman Lingkungan', 'Raja Ampat, sebuah kepulauan di Papua Barat yang dijuluki sebagai \"surga terakhir di bumi\", tengah berada di persimpangan jalan. Di satu sisi, kawasan ini menyimpan keanekaragaman hayati laut yang luar biasa dan diakui dunia. Namun di sisi lain, tanahnya menyimpan kekayaan mineral berupa nikel, bahan baku penting dalam baterai kendaraan listrik yang menjadi simbol energi hijau global. Ironisnya, eksploitasi nikel ini justru mengancam lingkungan Raja Ampat yang rapuh.\r\n\r\nAmbisi Tambang di Kawasan Konservasi\r\nSejumlah perusahaan tambang telah mengantongi izin eksplorasi dan eksploitasi nikel di pulau-pulau kecil seperti Gag, Kawe, dan sekitarnya. Beberapa dari wilayah ini berada di zona konservasi dan bahkan termasuk dalam UNESCO Global Geopark sejak 2023. Aktivitas tambang nikel tersebut menimbulkan kekhawatiran serius terhadap rusaknya hutan tropis, sedimentasi laut, dan terganggunya kehidupan masyarakat adat yang bergantung pada alam.\r\n\r\nPemerintah Mulai Bertindak\r\nMenanggapi tekanan publik dan data kerusakan yang mengkhawatirkan, Presiden Prabowo Subianto pada tahun 2025 mencabut izin operasi empat perusahaan tambang nikel yang dinilai bermasalah. Perusahaan-perusahaan tersebut tidak memiliki dokumen lingkungan (AMDAL) yang sah dan berada di wilayah yang dilindungi. Namun, satu perusahaan, PT Gag Nikel (anak usaha BUMN Antam), tetap diizinkan beroperasi karena wilayahnya dinilai berada di luar zona geoparkâ€”meskipun masih dalam kawasan Raja Ampat.\r\n\r\nDampak Lingkungan dan Sosial\r\nTambang nikel di Raja Ampat bukan sekadar ancaman ekologis. Deforestasi yang terjadi menyebabkan sedimentasi di laut yang merusak ekosistem terumbu karang. Pencemaran dari limbah tambang juga mengancam biota laut dan kesehatan masyarakat. Selain itu, konflik sosial mulai bermunculan antara warga yang pro dan kontra terhadap tambang, menyebabkan perpecahan di komunitas adat.\r\n\r\nAntara Green Energy dan Greenwashing\r\nIronisnya, tambang nikel di Raja Ampat dibenarkan atas nama â€œtransisi energi hijauâ€. Nikel adalah bahan utama dalam baterai kendaraan listrikâ€”ikon gerakan green energy global. Namun, jika ekstraksinya menghancurkan lingkungan yang jauh lebih bernilai, maka narasi energi hijau bisa berubah menjadi greenwashing: membungkus kerusakan lingkungan dalam nama pembangunan berkelanjutan.', 'Akhirnya Muhammadiyah Terima Izin Konsesi Tambang, Sebelumnya DPD IMM DIY Sarankan Menolak.jpg'),
(19, '2025-02-21', 'Korupsi dalam Industri Nikel: Kuasa Tambang, Oligarki, dan Ancaman Demokrasi', 'Industri nikel Indonesia tengah menjadi sorotan dunia. Sebagai salah satu produsen nikel terbesar globalâ€”komoditas vital dalam transisi energi bersihâ€”Indonesia memegang posisi strategis dalam rantai pasok baterai kendaraan listrik. Namun di balik gemerlap investasi dan narasi â€œgreen economyâ€, terselip persoalan akut yang mengancam integritas negara: korupsi tambang nikel.\r\n\r\nNikel: Logam Strategis yang Diperebutkan\r\nPemerintah Indonesia mendorong hilirisasi nikel sebagai bagian dari strategi pembangunan nasional. Smelter-smelter dibangun, ekspor nikel mentah dilarang, dan investasi asing dibuka lebar-lebar, terutama dari Tiongkok. Namun, liberalisasi sektor ini justru membuka celah korupsi baru. Izin tambang dikuasai oleh segelintir elite, dan praktik suap menjadi pintu masuk bagi pengusaha-pengusaha besar yang ingin mengamankan konsesi tambang di Sulawesi, Halmahera, hingga Papua.\r\n\r\nKasus-Kasus Korupsi dan Aktor Kekuasaan\r\nSkandal demi skandal bermunculan. Salah satunya menyeret kepala daerah, anggota DPR, hingga pejabat kementerian yang dituduh menerima suap dan gratifikasi terkait izin usaha pertambangan (IUP) nikel. Misalnya:\r\n\r\nKasus Gubernur Sulawesi Tenggara, yang diduga menerima aliran dana dari pengusaha tambang untuk memuluskan perpanjangan IUP.\r\n\r\nKeterlibatan aparat penegak hukum yang â€˜mengamankanâ€™ aktivitas tambang ilegal, termasuk penambangan di kawasan konservasi atau tanpa dokumen AMDAL.\r\n\r\nBahkan beberapa konsesi tambang diduga dikendalikan secara tidak langsung oleh aktor-aktor oligarki politik yang memiliki pengaruh besar dalam kebijakan nasional.\r\n\r\nKorupsi Terstruktur dan Dampak Politiknya\r\nKorupsi dalam industri nikel tidak bisa dilihat sebagai pelanggaran individu semata. Ia bersifat terstruktur dan sistemikâ€”dari birokrasi daerah hingga pusat. Seringkali, peraturan dibuat untuk menguntungkan kelompok tertentu, termasuk revisi UU Minerba yang memperkuat kontrol pusat dan melemahkan peran masyarakat sipil dalam pengawasan.\r\n\r\nKondisi ini menggerus akuntabilitas publik, memperkuat kekuasaan segelintir elite, dan merusak prinsip demokrasi yang sehat. Jika dibiarkan, korupsi tambang bisa melahirkan model ekonomi ekstraktif yang sarat eksploitasi dan minim kesejahteraan untuk rakyat.\r\n\r\nDampak Sosial dan Ekologis\r\nKorupsi membuat tambang nikel menjadi bencana ekologis. Izin tambang yang diperoleh lewat suap sering kali mengabaikan aspek lingkungan. Akibatnya:\r\n\r\nTerjadi deforestasi masif dan pencemaran lingkungan.\r\n\r\nMasyarakat adat kehilangan hak atas tanah.\r\n\r\nKonflik horizontal meletus antara warga lokal dan perusahaan.\r\n\r\nMendorong Reformasi Tambang\r\nPenegakan hukum yang tegas mutlak diperlukan. Komisi Pemberantasan Korupsi (KPK), Kejaksaan Agung, dan lembaga pengawasan lain harus diberi mandat dan perlindungan politik untuk mengusut hingga ke akarâ€”termasuk bila melibatkan tokoh politik besar.\r\n\r\nLebih jauh, transparansi sektor tambang perlu diperkuat, seperti:\r\n\r\nAudit publik atas IUP dan penerimaan negara dari nikel.\r\n\r\nKeterlibatan masyarakat sipil dalam pengawasan tambang.\r\n\r\nPembatasan kepemilikan ganda antara pengusaha tambang dan pejabat publik.\r\n\r\nPenutup: Nikel, Korupsi, dan Masa Depan Demokrasi\r\nNikel memang logam masa depan, tetapi jika tidak diatur dengan baik, ia bisa menjadi logam penghancur demokrasi. Korupsi di sektor nikel bukan hanya soal penyalahgunaan kekuasaan, tetapi cermin dari ketimpangan sistemik antara rakyat dan elite. Membasmi korupsi tambang berarti menyelamatkan masa depan bangsaâ€”bukan hanya secara ekonomi, tetapi juga secara moral dan politik.', 'Accidental Renaissance.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `article_author`
--

CREATE TABLE `article_author` (
  `article_id` int NOT NULL,
  `author_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_author`
--

INSERT INTO `article_author` (`article_id`, `author_id`) VALUES
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(6, 6),
(7, 6),
(8, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `article_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`article_id`, `category_id`) VALUES
(17, 4),
(18, 4),
(4, 5),
(8, 5),
(4, 7),
(6, 7),
(7, 7),
(16, 8),
(19, 8);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `role` enum('admin','penulis') DEFAULT 'penulis'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `nickname`, `email`, `password`, `address`, `phone`, `country`, `instagram`, `role`) VALUES
(5, 'walid', 'walid@gmail.com', '$2y$10$GbuY8NDpv/0FJmxpjt703uKXftvrQR65imLjTewXcaK.QRXvVlAJa', 'malang- jawa timur', '1234567644', 'Arab', '@walidnakkamu', 'penulis'),
(6, 'aldi', 'aldi@gmail.com', '$2y$10$rZhwzT.BxmPzK3/i1UsqIOX0ttPRhryHnAWW5GxydBzFDMnyi3AYi', 'malang- jawa timur', '12345678', 'Indonesia', '@aldigembul23', 'penulis'),
(7, 'admin', 'admin@gmail.com', '$2y$10$iLUulw3Owh27UPR9ijeGCOTvUpbgRlfiexRc4UyDArSsR.E42IpC2', NULL, NULL, NULL, NULL, 'admin'),
(9, 'rizal', 'rizal@gmail.com', '$2y$10$cPMg10QDmfTehI5INaSP6.SSzkY3NdybyfdrznafvIo5Y.tTp0EA2', NULL, NULL, NULL, NULL, 'penulis'),
(10, 'MILZAM', 'milzamhibhaq@gmail.com', '$2y$10$ZSAa80sHnchv1kghcNW5z.niXOrIyMYt79EQYt7QYG0FAABxMngl6', NULL, NULL, NULL, NULL, 'penulis');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(4, 'alam', 'Kategori yang mencakup tempat wisata alam seperti gunung, pantai, air terjun, dan hutan wisata.'),
(5, 'pendidikan', 'Kategori yang berisi tempat wisata edukasi seperti museum, pusat sains, kebun binatang, dan planetarium.'),
(7, 'budaya', 'artikel yang membahas berbagai aspek kehidupan manusia yang berkaitan dengan nilai, norma, adat istiadat, kesenian, kepercayaan, bahasa, dan warisan tradisional suatu kelompok masyarakat.'),
(8, 'politik', 'Politik adalah kategori yang membahas berbagai hal terkait pemerintahan, kekuasaan, kebijakan publik, partai politik, dan tokoh-tokoh yang berperan dalam mengatur kehidupan berbangsa dan bernegara.');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `author_id` int NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `article_id`, `author_id`, `content`, `created_at`) VALUES
(2, 4, 6, 'keren bang milzam {emot api)', '2025-05-23 15:45:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_author`
--
ALTER TABLE `article_author`
  ADD PRIMARY KEY (`article_id`,`author_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`article_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `article_id` (`article_id`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_author`
--
ALTER TABLE `article_author`
  ADD CONSTRAINT `article_author_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_author_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `article_category_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
