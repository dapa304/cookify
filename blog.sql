-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2023 at 01:07 PM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`) VALUES
(4, 4, 19, 'halo\r\n', '2023-10-18 14:20:55'),
(7, 13, 20, 'p', '2023-10-22 09:45:29'),
(8, 13, 31, 'p\r\n', '2023-10-23 03:14:48'),
(10, 13, 31, 'p', '2023-10-23 03:20:32'),
(11, 13, 19, 'halo\r\n', '2023-10-23 13:31:00'),
(12, 13, 19, 'p', '2023-10-23 13:31:09'),
(13, 13, 26, 'jhugyfguij;o', '2023-10-31 13:35:04'),
(14, 13, 26, 'p', '2023-10-31 13:35:11'),
(15, 13, 26, 'tia', '2023-10-31 13:35:19'),
(16, 13, 26, 'ape bende nih\r\n', '2023-10-31 13:35:35'),
(18, 13, 20, '❤️', '2023-10-31 14:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int NOT NULL,
  `follower_id` int NOT NULL,
  `followed_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `follower_id`, `followed_id`) VALUES
(3, 4, 4),
(1, 12, 12),
(4, 13, 8);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `recipe_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `recipe_id`, `user_id`) VALUES
(14, 17, 8),
(20, 21, 4),
(27, 19, 4),
(28, 32, 4),
(29, 31, 13),
(30, 22, 13);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `recipe` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `love` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `user_id`, `title`, `description`, `recipe`, `image`, `love`, `created_at`) VALUES
(17, 4, 'Chicken Schnitzel', 'Crispy? Oh, jangan tanya. Sudah suatu kepastian dalam resep rahasia Chicken Schnitzel yang satu ini.', 'Bahan-bahan:\n2 buah dada ayam fillet (saya pakai paha)\n1 butir telur\nsecukupnya Tepung terigu serbaguna\nsecukupnya Tepung roti\nMinyak untuk menggoreng\nMarinasi\nGaram\nMerica bubuk\nKaldu ayam\nPaprika bubuk\n\nCara Membuat:\nLangkah 1\nSiapkan ayam fillet, pukul2 supaya lbh tipis dan bumbu menyerap. Beri bumbu marinasi lalu diamkan/simpan di kulkas 10 menit\nChicken Schnitzel langkah memasak 1 foto\nLangkah 2\nBalur ayam ke terigu, kocokan telur lalu tepung roti\nChicken Schnitzel langkah memasak 2 foto\nLangkah 3\nGoreng ayam sampai matang kedua sisinya. Angkat dan sajikan dgn sayuran, sup atau kentang', 'recipe_image/chicken schnitzel.jpg', 1, '2023-10-15 13:14:27'),
(18, 4, 'Donat Kentang Nikmat', 'Donat kentang aroma nikmat hanya dengan resep yang singkat! Buruan cobain!', 'Bahan-bahan:\r\n500 gr tepung terigu pro. tinggi\r\n80 gr gula pasir\r\n200 gr kentang (yg sudah dikukus)\r\n2 butir telur\r\n2 sdt ragi instant\r\n120-150 ml air\r\n80 gr mentega\r\n1/2 sdt garam\r\n\r\nCara Membuat:\r\nLangkah 1\r\nSiapkan bahan, haluskan kentang\r\nDonat Kentang langkah memasak 1 foto\r\nLangkah 2\r\nCampur tepung, gula, ragi, telur, kentang, dan air (bertahap ya, sedikit demi sedikit)\r\nDonat Kentang langkah memasak 2 foto\r\nDonat Kentang langkah memasak 2 foto\r\nLangkah 3\r\nUleni hingga setengah kalis, masukkan mentega dan garam. Uleni hingga kalis. Diamkan dlm bowl selama ± 45-60 menit (atau smpai double size)\r\nDonat Kentang langkah memasak 3 foto\r\nDonat Kentang langkah memasak 3 foto\r\nLangkah 4\r\nBagi adonan menjadi bbrp bagian (dsini sy timbang 35 gr masing-masing). Bulatkan, letakkan diatas baking paper yg dipotong sesuai ukuran donat (hal ini dpt memudahkan ketik memindahkan donat stlh di proofing ke penggoreng). Proofing lagi sekitar 20 - 30 menit\r\nDonat Kentang langkah memasak 4 foto\r\nDonat Kentang langkah memasak 4 foto\r\nLangkah 5\r\nPanaskan minyak (cukup banyak). Goreng donat sampai matang, balik cukup sekali saja.\r\nDonat Kentang langkah memasak 5 foto\r\nDonat Kentang langkah memasak 5 foto\r\nLangkah 6\r\nBeri topping (sesuai selera) dan siap dihidangkan', 'recipe_image/donat kentang.jpg', 0, '2023-10-15 13:20:07'),
(19, 8, 'Kue Pancong Terigu Manis', 'Siapa yang pernah makan kue pancong dengan rasa selezat dan selembut ini? Pasti belum kan...', 'Bahan-bahan:\r\n250 gr terigu\r\n250 gr kelapa parut 1/2 tua (kulitnya dikupas)\r\n1 sachet @65ml santan instant\r\n1 butir telur\r\n6 sdm gula pasir (manisnya selera)\r\n1/3 sdt garam\r\n1 sdm margarine\r\n1/2 sdt vanili bubuk\r\n300 ml air matang\r\n\r\nCara Membuat\r\nLangkah 1\r\nDalam wadah campurkan semua bahan.\r\nKue Pancong Terigu Manis langkah memasak 1 foto\r\nLangkah 2\r\nTambahkan air matang sedikit demi sedikit hingga tercampur merata\r\nKue Pancong Terigu Manis langkah memasak 2 foto\r\nKue Pancong Terigu Manis langkah memasak 2 foto\r\nKue Pancong Terigu Manis langkah memasak 2 foto\r\nLangkah 3\r\nSiapkan cetakan pukis dan oles cetakan dengan minyak goreng tipis-tipis saja, biarkan cetaka panas. Tuang adonan pancong pada loyang dan tutup hingga pancong matang.\r\nKue Pancong Terigu Manis langkah memasak 3 foto\r\nKue Pancong Terigu Manis langkah memasak 3 foto\r\nKue Pancong Terigu Manis langkah memasak 3 foto\r\nLangkah 4\r\nSetelah pancong matang dan pinggirnya kecoklatan lalu angkat, dan sajikan.', 'recipe_image/pancong.jpg', 1, '2023-10-15 13:22:36'),
(20, 8, 'Rendang Daging', 'Rendang dengan tekstur lembut nan gurih hanya ada di resep yang satu ini. Ga cobain, ga enak.', 'Bahan-bahan:\r\n\r\n1 kg daging sapi khas dalam(me :pakai daging yg ada dari hewan kurban😅)potong 25 potong\r\n3 liter santan dari 4 buah kelapa tua(me: 5 butir kelapa tua Krn sy menggunakan cabe yg banyak)😍 anak-anak suka pedas\r\n1 Bks Royco sapi\r\n1 Bks Masako sapi\r\nSecukupnya penyedap jika suka(opsional)saya tidak pakai\r\n🌿 Bumbu haluskan\r\n17 butir bawang merah\r\n5 siung bawang putih\r\n1/4 kg Cabe merah keriting 🌶️ (me:1/2 kg, Karena anak² suka pedas)\r\n3 batang sereh,ambil bagian putih nya,lalu iris tipis\r\n5 butir kemiri\r\n3 cm jahe\r\n1 sdm ketumbar halus\r\n1 biji pala\r\n5 butir cengkeh\r\n🌿 Bumbu Cemplung\r\n3 lembar daun kunyit, sobek-sobek,lalu ikat\r\n7 butir kapulaga putih\r\n7 butir kapulaga hijau/kapulaga India\r\n3 cm kayumanis\r\n5 cm laos,geprek\r\n\r\nCara Membuat :\r\nLangkah 1\r\nSiapkan semua bahan-bahannya\r\n\r\nLangkah 2\r\nDalam wajan besar campur daging dengan bumbu halus dan bumbu Cemplung, tambahkan santan,masak dengan api sedang hingga menjadi Kalio\r\n\r\nLangkah 3\r\nKecilkan api,masak sambil di aduk hingga daging empuk dan berminyak\r\n\r\nLangkah 4\r\nSajikan\r\n\r\nLangkah 5\r\nSelamat mencoba jangan lupa untuk selalu bahagia dan bersyukur 🤲❤️', 'recipe_image/rendang.jpg', 0, '2023-10-15 13:24:39'),
(21, 8, 'Ramen Ayam Jamur Kuping', 'Ramen Ayam Jamur Kuping? Terlihat menantang bukan? Yuk buruan masak...', 'Bahan Bahan\r\n\r\nAyam Chasua dan Kuah\r\n1 dada ayam fillet utuh\r\n50 cm tali kasur\r\n4 buah ceker ayam\r\n4 lembar jamur kuping (jika kering rendam dulu)\r\n2 liter air\r\n2 sdm baceman bawang putih (bawang putih yang sudah matang)\r\n2 sdm kecap asin Kikkoman\r\n1 sdm kecap ikan\r\n1 sdm cuka Kikkoman\r\n1 sdt gula\r\n1/2 sdt lada bubuk\r\nPelengkap\r\nMie, rebus\r\nDaun bawang untuk taburan\r\nTelur rebus\r\n\r\nCara Masak\r\n\r\nLangkah 1\r\nGulung dada ayam dan ikat dengan tali kasur.\r\n\r\nLangkah 2\r\nSiapkan air, masukan ceker yang sudah bersih, dada ayam dan jamur kuping.\r\n\r\nLangkah 3\r\nAngkat busa yang mengapung. Tambahkan baceman bawang putih. Saya memilih baceman baput karena lebih mudah dan cepat.\r\n\r\nLangkah 4\r\nBumbui dengan perkecapan dan lain-lain. Masak hingga sekitar 50% air surut. Cicipi.\r\n\r\nLangkah 5\r\nAngkat ayam chasua dan jamur kupiing. Lepaskan tali dari ayam dan jika mau bisa dipanggang sebentar. Saya skip proses ini. Potong ayam dengan pisau yang tajam. Potong-potong juga jamur kuping. Susun mie dan semua pelengkapnya. Banjur dengan kuah.\r\n\r\n', 'recipe_image/Ramen.jpg', 1, '2023-10-15 13:28:21'),
(22, 8, 'Mie Ala Gacoan', 'Mie yang lezat bikin nambah selera makan, kenyal bett dehh!', 'Bahan-bahan: \r\n\r\n1/2 kg ayam. Aku pakai campuran paha dan dada\r\n7 siung bawang putih\r\nSegenggam Cabai rawit setan\r\nMie Telur. Aku pakai yang kering. Kalo ada mie basah lebih enak\r\nKecap asin\r\nSaus tiram\r\nMinyak wijen\r\nKaldu jamur\r\nGula&garam\r\nMerica bubuk\r\nKulit pangsit\r\nbumbu daging :\r\n1 sdt kecap asin\r\n1 sdt merica bubuk\r\n1 sdt saus tiram\r\n1/2 sdt minyak wijen\r\n1 sdt gula\r\n1 sdt kaldu jamur Sedikit garam\r\nbumbu mie racik :\r\n1 sdm minyak ayam\r\n1 sdt saus tiram\r\n1 sdt kecap asin\r\n1/2 sdt minyak wijen\r\nsesuai selera Sambal\r\n\r\nCara Masak :\r\n\r\nLangkah 1\r\nFillet ayam dan pisahkan antara kulit dan dagingnya\r\n\r\nLangkah 2\r\nPanaskan teflon, goreng kulit dan lemak ayam tanpa minyak dengan 2 siung bawang putih geprek. Minyak ayam akan muncul lalu sisihkan ke mangkuk\r\n\r\nLangkah 3\r\nHaluskan daging ayam yang sudah dipisahkan dari kulit dan tulangnya dengan 3 siung bawang putih. Anda bisa menggunakan chopper, blender, atau ditumbuk secara manual\r\n\r\nLangkah 4\r\nDi wajan bekas menggoreng kulit, panaskan daging yang sudah diblender dengan menambahkan bumbu daging.\r\n*Takaran bumbu bisa disesuaikan dengan selera Aduk terus ayam dan bumbu hingga kering dan bertekstur menggerindil Jika sudah matang, bagi menjadi 2 bagian untuk isi pangsit goreng dan topping mie.\r\n\r\nLangkah 5\r\nDi tempat yang berbeda, rebus Cabai rawit setan dan 2 siung bawang putih. Jika sudah layu, haluskan Cabai dan bawang tanpa air dengan menggunakan chopper atau blender\r\n\r\nLangkah 6\r\nBuka kulit pangsit, basahi ujungnya dengan air. Beri daging ayam yang sudah matang kemudian tutup dan lipat sesuai selera. Goreng dengan api kecil hingga kuning kecoklatan. Untuk sisa kulit pangsit bisa dipotong kotak kecil dan digoreng\r\n\r\nLangkah 7\r\nRebus mie di air mendidih hingga matang.\r\n\r\nLangkah 8\r\nSelagi menunggu mie matang, racik bumbu mie\r\nAduk rata.\r\n\r\nLangkah 9\r\nMasukkan mie yang sudah matang ke bumbu yang sudah diracik, aduk hingga merata dan sajikan dengan topping pangsit isi, pangsit goreng, dan sosis atau telur (opsional)\r\n\r\nLangkah 10\r\nMie ala Gacoan siap disajikan', 'recipe_image/Gacoan.jpg', 1, '2023-10-15 13:29:50'),
(23, 8, 'Es Krim Melon Anggur', 'Tekstur yang lembut bikin lidah ga bisa berhenti buat makan eskirm satu ini, wajib cobain nih!', 'Bahan Bahan :\r\n\r\n100 gr anggur red globe\r\nBahan Jelly Melon :\r\n1 sachet nutrijel melon\r\n2 sdm gula\r\n250 ml air\r\n1/2 bagian citric acid dari nutrijelnya\r\nBahan Es Krim :\r\n7 sdm whipped cream bubuk\r\n1 sachet susu bubuk dancow fullcream\r\n2 sdm SKM\r\n14 sdm air dingin\r\n1/3 blok keju cheddar, parut (sesuai selera)\r\n\r\nCara membuat :\r\n\r\nLangkah 1\r\nCuci bersih anggur dan potong-potong sesuai selera.\r\nEs Krim MengAnggur (Melon Anggur) Homemade🍨 langkah memasak 1 foto\r\nLangkah 2\r\nBikin jelly melonnya..campur semua bahan jelly, masak sampai mendidih dan dinginkan. Setelah dingin, potong-potong sesuai selera.\r\nEs Krim MengAnggur (Melon Anggur) Homemade🍨 langkah memasak 2 foto\r\nEs Krim MengAnggur (Melon Anggur) Homemade🍨 langkah memasak 2 foto\r\nLangkah 3\r\nBikin es krimnya...\r\nCampur semua bahan es krim. Aduk sampai teksturnya kental. Lalu masukkan potongan anggur, jelly melon dan parutan keju. Aduk rata.\r\nEs Krim MengAnggur (Melon Anggur) Homemade🍨 langkah memasak 3 foto\r\nEs Krim MengAnggur (Melon Anggur) Homemade🍨 langkah memasak 3 foto\r\nEs Krim MengAnggur (Melon Anggur) Homemade🍨 langkah memasak 3 foto\r\nLangkah 4\r\nMasukkan adonan es krim ke dalam wadah dan bekukan di freezer. Setelah beku, es krim bisa dinikmati dengan roti tawar. Enjoy🥰\r\nEs Krim MengAnggur (Melon Anggur) Homemade🍨 langkah memasak 4 foto\r\nEs Krim MengAnggur (Melon Anggur) Homemade🍨 langkah memasak 4 foto\r\nEs Krim MengAnggur (Melon Anggur) Homemade🍨 langkah memasak 4 foto\r\nLangkah 5\r\nYummY 🥰🍨', 'recipe_image/Es krim.jpg', 0, '2023-10-15 13:32:20'),
(26, 4, 'Chicken Teriyaki', 'Lagi pengen makan Ayam Teriyaki ala Hokben nyoba buat sendiri aja deh ala akuuu, eh ternyata rasanya hampir mirip huhuhu bikin nambah nafsu makan jadinya 😭😍', 'Bahan-bahan:\r\n1 pis ayam dada fillet (potong kotak)\r\n1 biji bawang bombay kecil (cincang/iris)\r\n2 siung bawang putih (cincang)\r\nBahan Marinasi :\r\n4 sdm saus teriyaki\r\n2 sdm kecap manis\r\n1/2 sdm saus tiram\r\n1/2 sdm merica\r\n\r\nCara Membuat:\r\nLangkah 1\r\nMarina ayam dengan bahan marinasi minimal 15 menit\r\nLangkah 2\r\nTumis duo bawang hingga harum lalu masukin ayam yang sudah dimarinasi, masak hingga berubah warna lalu tuang sedikit air dan masak hingga meletup, koreksi rasa (jika menurut ibu/bapak rasanya kurang, masukin saos teriyaki, kecap manis dan saus tiram)\r\nLangkah 3\r\nAngkat dan sajikan', 'recipe_image/teriyaki.jpg', 0, '2023-10-15 13:47:55'),
(28, 8, 'Cheese Sausage Onigiri', 'Kreasi makanan simple, enak tapi tetap lucu yang aku buat adalah Cheese Sausage Onigiri. Kebetulan anakku suka isian sosis, jadi onigirinya pakai isian sosis. Makin enak ditambahkan keju MEG Cheddar Slice. Makan satu rasanya ga cukup🤤', 'Bahan-bahan:\r\n\r\n1 buah sosis ukuran besar\r\n1/4 buah bawang bombay\r\n1 siung bawang putih\r\nsecukupnya Minyak/margarin untuk menumis\r\n1/4 sdt garam\r\n2 sdm thousand island\r\n1 sdm saus tomat\r\nBahan onigiri :\r\n300 gr nasi hangat pulen\r\n1/2 sdt kecap asin\r\n1/2 sdt minyak wijen\r\nsecukupnya Nori\r\nSlice Keju MEG Cheddar Slice\r\n\r\nCara membuat :\r\n\r\nLangkah 1\r\nSiapkan bawang bombay, bawang putih dan sosis. Cincang bawang bombay dan bawang putih, lalu potong kotak kecil sosis.\r\nPanaskan margarin/minyak sayur lalu tumis bawang bombay, bawang putih dan masukkan sosis. Lalu tambahkan garam, masak hingga sosis matang dan angkat.\r\n\r\nLangkah 2\r\nTambahkan thousand islan dan saus tomat (jika mau pedas bisa tambahkan saus sambal) pada tumisan sosis dan aduk rata.\r\n\r\nLangkah 3\r\nSiapkan nori. Gunting seukuran lebar cetakan onigiri. Lalu buat bentuk nori mata, alis, dan mulut (bisa menggunakan nori puncher).\r\n\r\nLangkah 4\r\nSiapkan nasi hangat lalu tambahkan minyak wijen dan kecap asin, aduk rata.\r\n\r\nLangkah 5\r\nSiapkan cetakan onigiri, lapisi dengan plastik wrap. Masukkan nasi, lalu tambahkan isian sosis di tengah nasi dan tutup kembali dengan nasi. Padatkan dengan tutup cetakan. Dan keluarkan nasi. Jika tidak ada cetakan bisa dibentuk menggunakan tangan saja.\r\n\r\nLangkah 6\r\nCetak Keju MEG Cheddar Slice bentuk segitiga, menggunakan penutup cetakan onigiri, lalu tempel di nasi (bisa olesi saus tomat di nasi agar lebih menempel. Bagian sisi onigiri di tempel nori yg sudah disiapkan.\r\n\r\nLangkah 7\r\nLalu tempel nori bentuk alis, mata dan mulut di keju. Tambahkan saos tomat di bagian pipi. Karakter bisa sesuai dengan kreasi masing-masing.\r\nOnigiri Sosis Keju (Cheese Sausage Onigiri) siap disantap.', 'recipe_image/onigiri.jpg', 0, '2023-10-16 06:47:01'),
(29, 8, 'Beef Yakiniku', 'Udah lama banget pingin nyoba bikin beef yakiniku ini, tapi maju mundur karena daging tuh rasanya mahal yaa', 'Bahan-bahan\r\n\r\n500 gr Sliced Beef\r\n2 siung Bawang Putih, cincang\r\n1 cm Jahe, cincang\r\n1 sdm Kecap Manis\r\n3 sdm Kecap Asin\r\n1/2 sdt Gula\r\n1 sdm Minyak Wijen\r\n1 buah Bawang Bombay, iris memanjang\r\nMinyak Goreng\r\nLada\r\nKaldu Jamur\r\nWijen Putih\r\nDaun Bawang\r\n\r\nCara Membuat\r\n\r\nLangkah 1\r\nMarinasi daging dengan bawang putih, jahe, kecap manis, kecap asin, gula, minyak wijen, lada & kaldu jamur. Diamkan min 30 menit\r\n\r\nLangkah 2\r\nTumis Daging yg sudah dimarinasi dengan sedikit minyak, bisa ditambah sedikit air jika terlalu kering, aduk rata\r\n\r\nLangkah 3\r\nTambahkan bawang bombay, masak hingga daging matang. Angkat, sajikan dengan taburan wijen & daun bawang', 'recipe_image/yakiniku.jpg', 0, '2023-10-16 06:56:02'),
(30, 8, 'Sandwich Tuna Mayo with Cheese', 'MaasyaAllahTabarakallah ...', 'Bahan-bahan\r\n\r\n4 lembar roti tawar\r\nsecukupnya Margarin\r\n1 kaleng tuna\r\n1 buah bawang bombay\r\n3 sdm mayones\r\n2 sdm air jeruk nipis\r\n1 sdm cabai bubuk\r\nsejumput Gula pasir / garam\r\n2 sdm SKM putih\r\nTopping sayur\r\nTomat\r\nSelada\r\nTimun\r\n\r\nCara Membuat\r\n\r\nLangkah 1\r\nSiapk bahan bahan...untuk tuna kaleng dlt ditiriskan dahulu minyak/ airnya.\r\n\r\nLangkah 2\r\nBawang bombay dicincang kecil kecil lalu tumis dengan 1 Sdm margarin hingga wangi tambahkan ikan tuna kalengnya aduk rata...karena biasa sudah asin cek rasa dahulu.\r\nIni saya tambahkan gula pasir dan garam sejumput aja.\r\nCek rasa\r\n\r\nLangkah 3\r\nGril roti tawar dengan margadin bolak balik sisihkan\r\n\r\nLangkah 4\r\nSiapkan siapkan mangkok tulang ikan tuna, mayones, susu kental manis dan bubuk cabe.\r\nAduk rata\r\n\r\nLangkah 5\r\nOleskan roti tawar dengan isian ikan tuna, lalu tambahkan selada, tomat dan timun, Beri topping keju slice lalu tumpuk / tangkup dengan roti tawar lainnya.\r\n\r\nLangkah 6\r\nBisa dibungkus dengan kertas roti atau plstik wrap...lalu iris dan sajikan.\r\nYummy banget ini', 'recipe_image/Sandwich.jpg', 0, '2023-10-16 06:58:14'),
(31, 8, 'Chicken Gyoza', 'Gyoza, kuotie, dimsum, dkk adalah cemilan kesukaan saya. Setiap beli di luar, rasanya kurang puas karena mahal, tapi dapetnya sedikit 😆.', 'Bahan-bahan\r\n\r\n200 gr paha ayam giling\r\nSecukupnya kulit gyoza atau dimsum\r\n100 gr sawi putih (me : jamur tiram)\r\n50 gr kucai (me : bawang daun)\r\n25 gram sohun (me : bihun jagung)\r\n\r\nBahan Bumbu :\r\n\r\n1/2 sdm kaldu ayam bubuk\r\n1/2 sdt kaldu jamur\r\n2 sdt gula pasir\r\n1/4 sdt merica bubuk\r\n1 sdt kecap asin\r\n1 sdt saus tiram\r\n1/2 sdt kecap ikan\r\n1/4 sdt minyak wijen\r\n1 sdm air jahe\r\n2 sdt maizena\r\n\r\nCara Membuat\r\n\r\nLangkah 1\r\nGiling daging ayam hingga halus. Lalu masukkan semua bumbu. Aduk rata.\r\n\r\nLangkah 2\r\nMasak bihun jagung hingga matang (jangan terlalu matang), lalu gunting kasar agar tidak panjang. Cuci bersih jamur tiram, lalu potong kecil-kecil, kemudian masak sebentar di atas pan sebentar hingga setengah matang. Lalu campurkan ke adonan ayam. Aduk rata, koreksi rasa.\r\n\r\nLangkah 3\r\nSiapkan kulit gyoza. Basahi pinggiran kulit dengan air. Masukkan 1 sdm isian ke dalam kulit. Lipat-lipat di satu sisi. Lakukan hingga adonan habis.\r\n\r\nLangkah 4\r\nPanaskan wajan. Susun gyoza, lalu masukkan air dan sedikit minyak. Masak di api sedang hingga menyusut.\r\n\r\nLangkah 5\r\nKulit bagian atas lembut, isiannya juicy, dan bagian bawah crunchy 😍. Dicocol pakai chilli oil enak banget.\r\n\r\n', 'recipe_image/gyoza.jpg', 1, '2023-10-16 07:01:11'),
(32, 4, 'Ayam Woku', 'Bismillahirrahmanirrahim kali ini kita mau masak ayam wagu yang super duper enak, yuk simak langkahnya!', 'Bahan:\r\n700 gram Daging Ayam\r\nSedikit Minyak goreng untuk menumis\r\nsecukupnya Air bersih\r\n\r\n🌾Bumbu Halus:\r\n7 butir Bawang Merah\r\n3 siung Bawang Putih\r\n7 buah Cabai Merah Keriting\r\n3 buah Cabai Rawit (bisa ditambah kalau suka pedas)\r\n3 butir Kemiri\r\n3 cm Jahe\r\n3 cm Lengkuas\r\n5 cm Kunyit\r\n\r\n🌾Bumbu Cemplung\r\n1 batang Sereh digeprek\r\n6 lembar Daun Jeruk\r\n1 lembar Daun Pandan disimpul (me: tidak pakai)\r\nsesuai selera Garam, gula, kaldu jamur\r\n1 genggam Daun Kemangi\r\n2 batang Daun Bawang Prei diiris\r\n\r\n\r\n\r\nCara Membuat:\r\n\r\nLangkah 1\r\nPersiapan alat dan bahan. Daging ayam dicuci dan dipotong ukuran sesuai selera. Bumbu bumbu dicuci kemudian bumbu halus dihaluskan. Daun bawang diiris, sereh digeprek.\r\n\r\nLangkah 2\r\nBumbu ditumis dengan sedikit minyak goreng hingga harum. Masukkan daging ayam, daun jeruk kemudian diaduk dan ditambahkan air secukupnya. Wajan ditutup.\r\n\r\nLangkah 3\r\nTambahkan bumbu garam, kaldu jamur, gula sesuai selera. Lanjutkan masak hingga ayam matang dan air kuah menyusut.\r\n\r\nLangkah 4\r\nTambahkan daun kemangi dan daun bawang prei. Aduk rata dan masak hingga daun tersebut layu. Selesai.\r\n\r\nLangkah 5\r\nSajikan...MasyaAllah sedap sekali 🤗🤗', 'recipe_image/ayamwagu.jpg', 1, '2023-10-18 06:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `bio` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'No bio yet.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `profile_image`, `bio`) VALUES
(4, 'admin', '$2y$10$owBB2YPGr8dTd/xk0b05FOGNzM8dLtMwcqub/VJ28Yjamz4PP/OjG', 'uploads/pidi.jpg', 'hi bro gw admin.'),
(5, 'azzam', '$2y$10$JmsGCWu47qquCfw4PtQsKOIU6eciKk1l/C5y6MBVwyZWrOIsQ0Vem', 'uploads/fav.pngfav.png', NULL),
(6, 'a', '$2y$10$a.PI51GmlvSaAM4wVpwuAek8J2R9NQtbKTR1/E/YPYbC1fqW7RvsK', 'uploads/fav.png', NULL),
(7, 'wasd', '$2y$10$tJ10c4PBusiY2zLmkslkJOmgGsjd5UBxfHf6w20PIxu6pN.zS8vRG', 'uploads/divide.png', NULL),
(8, 'qiandra', '$2y$10$It8lvIG69ejGhVt3Ez5pReH/TexbOx7ZFVMl9J6eoy23lI7jM3RYq', 'uploads/652222fda862a_taqi.png', 'nama saya taqi, saya suka membuat resep masakan yang lezat'),
(9, 'obama', '$2y$10$H8D4HbvYeDu.5YpNKDnb9ur.V3cnFvWfYeNOJkf6SSgtXK1wC2cIW', 'uploads/pidi.jpg', NULL),
(11, 'daft', '$2y$10$q2BzXiqV3tOUYCkqR39cwudHtqNFCDfaxma7LsceQkP6tCFfIWKEm', 'uploads/daft logo.jpeg', NULL),
(12, 'zkahant', '$2y$10$YN8VuUmvj653AUqzZ0Kmk.KhR2OFBvC/9Y0Sj3i7y9Z3iu53sDzf6', 'uploads/number-1.png', 'No bio yet.'),
(13, 'dapa', '$2y$10$BtB.wovF8w4kV8N/BCrJ9uQuCGc52asXUzDX7JBQ3UmbLjsLmj19m', 'uploads/daffa.png', 'tulehe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `follower_id` (`follower_id`,`followed_id`),
  ADD KEY `followed_id` (`followed_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`followed_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
