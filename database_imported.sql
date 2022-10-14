-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2022 at 02:06 PM
-- Server version: 10.3.36-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prolangr_forumprogrammer`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_post`
--

CREATE TABLE `comment_post` (
  `id_commentpost` char(25) NOT NULL,
  `id_post` char(25) DEFAULT NULL,
  `id_user` char(25) DEFAULT NULL,
  `isi` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_post`
--

INSERT INTO `comment_post` (`id_commentpost`, `id_post`, `id_user`, `isi`) VALUES
('C-63440da1828a17.64633716', 'P-63440d6dbae768.02526895', 'U-6344048ca89813.67032277', 'coba restart bosqu'),
('C-63440db13db6e5.88328543', 'P-63440d6dbae768.02526895', 'U-6344049e0ac6e7.44316206', 'gabisa bwang'),
('C-63440e07376419.47316554', 'P-63440ddf753c51.21056522', 'U-6344049e0ac6e7.44316206', 'sintaks error itu deck'),
('C-63440e27b5b535.64195892', 'P-63440ddf753c51.21056522', 'U-6344048ca89813.67032277', 'iya nih bro udah ketemu , maakasih bwang'),
('C-63440efed79885.84476520', 'P-63440d6dbae768.02526895', 'U-634404d5e7aad1.52572028', 'saya begini juga nih...'),
('C-63440f45084d68.67676407', 'P-63440f2b448c48.23779988', 'U-6344048ca89813.67032277', 'mantap bang sama saya jg lagi bljr'),
('C-63442ad139fd83.18870889', 'P-63442ab4a46f96.57164180', 'U-634404d5e7aad1.52572028', 'mantap nih bwang, makasih yo'),
('C-63442adc322b24.99426499', 'P-63442ab4a46f96.57164180', 'U-634404be06a469.69537889', '@prudencetendy siap bosq'),
('C-63442b2504eda9.06742752', 'P-634426323744e4.06723000', 'U-634404d5e7aad1.52572028', 'nonton freecodecamp bro... saya blajar disitu'),
('C-63442b38163192.58816802', 'P-634426323744e4.06723000', 'U-634404be06a469.69537889', 'sama, tutor-tutornya mantap wkwkw'),
('C-63442bae423ce6.77122643', 'P-63442b7b4bef67.63963301', 'U-634404d5e7aad1.52572028', 'Depannya jangan pake <?= , kalo = itu buat shorthandnya echo... = nya ganti echo bwang'),
('C-63442bba697738.39844661', 'P-63442b7b4bef67.63963301', 'U-634404be06a469.69537889', 'walah iya bener.. makasih ya hehe'),
('C-63442bf53f5642.81065472', 'P-63442b7b4bef67.63963301', 'U-6344048ca89813.67032277', 'di console gak ada error message kah?'),
('C-63442f68b3cbd0.27927884', 'P-63440d6dbae768.02526895', 'U-6344048ca89813.67032277', 'gimana? udah bisa?'),
('C-634537ae447be8.70580508', 'P-634415f5ab5992.63803616', 'U-6344048ca89813.67032277', 'saya juga awok awok'),
('C-634681ebe781b5.21016766', 'P-63442ab4a46f96.57164180', 'U-6344048ca89813.67032277', 'mantap deck'),
('C-6346821f0a1007.68325693', 'P-634426323744e4.06723000', 'U-6344048ca89813.67032277', 'aduh bos ada yang jago ga ajarin donk soalnya susah banget , saya bentar lagi mau ujian tengah semester ini gimana ya bang aduh tolongin :) nanti saya ga lulus');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_postingan`
--

CREATE TABLE `gambar_postingan` (
  `id_post` char(25) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar_postingan`
--

INSERT INTO `gambar_postingan` (`id_post`, `nama_gambar`, `urutan`) VALUES
('P-63440d6dbae768.02526895', 'G-63440d6dbabfa6.51295062.png', 1),
('P-63440ddf753c51.21056522', 'G-63440ddf751ae6.80253187.png', 1),
('P-63440f2b448c48.23779988', 'G-63440f2b441ab1.75775873.png', 1),
('P-63440f2b448c48.23779988', 'G-63440f2b444d67.15730223.jpg', 2),
('P-634415f5ab5992.63803616', 'G-634415f5ab1265.83411504.png', 1),
('P-63441a5c28fe85.68461347', 'G-63441a5c28d979.57784888.png', 1),
('P-634424c18d4950.24923988', 'G-634424c18cfa04.80717272.png', 1),
('P-63442ab4a46f96.57164180', 'G-63442ab4a412f3.28219492.jpg', 1),
('P-63457cc768c2d3.75480975', 'G-63457cc768c204.13639650.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `like_comment`
--

CREATE TABLE `like_comment` (
  `id_like` char(25) DEFAULT NULL,
  `id_comment` char(25) NOT NULL,
  `id_user` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_comment`
--

INSERT INTO `like_comment` (`id_like`, `id_comment`, `id_user`) VALUES
('LC63440da36c8997.36197034', 'C-63440da1828a17.64633716', 'U-6344049e0ac6e7.44316206'),
('LC63440f0205b492.09647899', 'C-63440db13db6e5.88328543', 'U-634404d5e7aad1.52572028'),
('LC6346f53ede8373.98563134', 'C-63440e07376419.47316554', 'A-12345678901234567890123'),
('LC63440e08dd1133.02656121', 'C-63440e07376419.47316554', 'U-6344049e0ac6e7.44316206'),
('LC6346f53db43cb1.68330018', 'C-63440e27b5b535.64195892', 'A-12345678901234567890123'),
('LC63440e2a25a945.88630916', 'C-63440e27b5b535.64195892', 'U-6344048ca89813.67032277'),
('LC63440e2cba84e2.62350630', 'C-63440e27b5b535.64195892', 'U-6344049e0ac6e7.44316206'),
('LC63440f00726933.09340827', 'C-63440efed79885.84476520', 'U-634404d5e7aad1.52572028'),
('LC63440f46d1d825.08441406', 'C-63440f45084d68.67676407', 'U-6344048ca89813.67032277'),
('LC634681e377efc0.47432485', 'C-63442ad139fd83.18870889', 'U-6344048ca89813.67032277'),
('LC63442ad47c90a1.80831955', 'C-63442ad139fd83.18870889', 'U-634404be06a469.69537889'),
('LC634681e41ccaa6.64567460', 'C-63442adc322b24.99426499', 'U-6344048ca89813.67032277'),
('LC63442add0db109.84573023', 'C-63442adc322b24.99426499', 'U-634404be06a469.69537889'),
('LC63442adfa4ab49.29817355', 'C-63442adc322b24.99426499', 'U-634404d5e7aad1.52572028'),
('LC63468222675e67.70252853', 'C-63442b2504eda9.06742752', 'U-6344048ca89813.67032277'),
('LC63442b2d374a15.48299100', 'C-63442b2504eda9.06742752', 'U-634404be06a469.69537889'),
('LC63442b2652f537.97703075', 'C-63442b2504eda9.06742752', 'U-634404d5e7aad1.52572028'),
('LC63468221ebe0d7.76031294', 'C-63442b38163192.58816802', 'U-6344048ca89813.67032277'),
('LC63442b3a661e09.91203878', 'C-63442b38163192.58816802', 'U-634404be06a469.69537889'),
('LC63442baf74c7a1.82737856', 'C-63442bae423ce6.77122643', 'U-634404d5e7aad1.52572028'),
('LC63442bbf1263a3.83409947', 'C-63442bba697738.39844661', 'U-634404d5e7aad1.52572028'),
('LC63442bf7919a88.41212847', 'C-63442bf53f5642.81065472', 'U-6344048ca89813.67032277'),
('LC63442f79b59316.66278354', 'C-63442f68b3cbd0.27927884', 'U-6344048ca89813.67032277'),
('LC634537b0063e40.47942100', 'C-634537ae447be8.70580508', 'U-6344048ca89813.67032277'),
('LC6346822175ab50.92641125', 'C-6346821f0a1007.68325693', 'U-6344048ca89813.67032277');

-- --------------------------------------------------------

--
-- Table structure for table `like_post`
--

CREATE TABLE `like_post` (
  `id_like` char(25) DEFAULT NULL,
  `id_post` char(25) NOT NULL,
  `id_user` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_post`
--

INSERT INTO `like_post` (`id_like`, `id_post`, `id_user`) VALUES
('L-63440d74765452.02397222', 'P-63440d6dbae768.02526895', 'U-6344048ca89813.67032277'),
('L-634661098870d1.31886425', 'P-63440ddf753c51.21056522', 'A-12345678901234567890123'),
('L-63440e130174d2.54320257', 'P-63440ddf753c51.21056522', 'U-6344048ca89813.67032277'),
('L-63440dea6b6433.04653210', 'P-63440ddf753c51.21056522', 'U-6344049e0ac6e7.44316206'),
('L-63441eeebbfb22.34771648', 'P-63440f2b448c48.23779988', 'U-6344048ca89813.67032277'),
('L-634537a6a09b26.49558311', 'P-634415f5ab5992.63803616', 'U-6344048ca89813.67032277'),
('L-63441a5ebabe33.42660368', 'P-63441a5c28fe85.68461347', 'U-6344048ca89813.67032277'),
('L-63442b005745a7.05856540', 'P-634426323744e4.06723000', 'U-634404d5e7aad1.52572028'),
('L-63465fb83edbd1.26713355', 'P-63442ab4a46f96.57164180', 'A-12345678901234567890123'),
('L-63442ab8afae62.64411567', 'P-63442ab4a46f96.57164180', 'U-634404be06a469.69537889'),
('L-63442ac86042e6.38850463', 'P-63442ab4a46f96.57164180', 'U-634404d5e7aad1.52572028'),
('L-63442bda2e0b87.93559823', 'P-63442b7b4bef67.63963301', 'U-6344048ca89813.67032277'),
('L-63442bb31495e2.30211376', 'P-63442b7b4bef67.63963301', 'U-634404be06a469.69537889'),
('L-63442b93e48969.02467919', 'P-63442b7b4bef67.63963301', 'U-634404d5e7aad1.52572028'),
('L-63465fbbc1dab5.01624607', 'P-63457cc768c2d3.75480975', 'A-12345678901234567890123'),
('L-63457cd35bc046.07728655', 'P-63457cc768c2d3.75480975', 'U-6344048ca89813.67032277');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` char(25) NOT NULL,
  `id_user` char(25) DEFAULT NULL,
  `waktu_post` datetime DEFAULT NULL,
  `kategori` enum('JavaScript','Python','CPP','TypeScript','PHP','C','Java','Ruby','Dart','Kotlin') DEFAULT NULL,
  `isi` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `waktu_post`, `kategori`, `isi`) VALUES
('P-63440d6dbae768.02526895', 'U-6344049e0ac6e7.44316206', '2022-10-10 19:17:49', 'C', 'help plz gabisa install ini'),
('P-63440ddf753c51.21056522', 'U-6344048ca89813.67032277', '2022-10-10 19:19:43', 'PHP', 'ini knapa yak? dari kemaren begini terus heran'),
('P-63440f2b448c48.23779988', 'U-634404d5e7aad1.52572028', '2022-10-10 19:25:15', 'Java', 'belajar java OOP hehe'),
('P-634415f5ab5992.63803616', 'U-634404be06a469.69537889', '2022-10-10 19:54:13', 'JavaScript', 'belajar js wkwkw'),
('P-63441a5c28fe85.68461347', 'U-6344048ca89813.67032277', '2022-10-10 20:13:00', 'Ruby', 'ruby ni bosq'),
('P-634424c18d4950.24923988', 'U-6344048ca89813.67032277', '2022-10-10 20:57:21', 'Dart', 'Nih kalo mau belajar Dart di freecodecamp bosq....'),
('P-6344259953efe4.83636391', 'U-6344048ca89813.67032277', '2022-10-10 21:00:57', 'Dart', 'ada yang bisa bantu ajarin dasar-dasar Dart ga ya.. lagi butuh bantuan :)'),
('P-634426323744e4.06723000', 'U-6344048ca89813.67032277', '2022-10-10 21:03:30', 'CPP', 'aduh C++ susah banget wkwkw'),
('P-63442ab4a46f96.57164180', 'U-634404be06a469.69537889', '2022-10-10 21:22:44', 'Python', 'monggo yang mao belajar python daftar... semoga bermanfaat'),
('P-63442b7b4bef67.63963301', 'U-634404be06a469.69537889', '2022-10-10 21:26:03', 'PHP', '    <?=\r\n\r\n        if (isset($_GET[\'err\'])){\r\n            if ($_GET[\'err\'] == \'1\'){\r\n                echo \"<div class=\'alert alert-danger\' role=\'alert\'>\r\n                Username unavailable\r\n              </div>\";\r\n            }\r\n            if ($_GET[\'err\'] == \'2\'){\r\n                echo \"<div class=\'alert alert-danger\' role=\'alert\'>\r\n                Your email is already registered.\r\n              </div>\";\r\n            }\r\n            if ($_GET[\'err\'] == \'3\'){\r\n                echo \"<div class=\'alert alert-danger\' role=\'alert\'>\r\n                Failed to insert data\r\n              </div>\";\r\n            }                        \r\n            if ($_GET[\'err\'] == \'4\'){\r\n                echo \"<div class=\'alert alert-danger\' role=\'alert\'>\r\n                Invalid Password Confirmation\r\n              </div>\";\r\n            }                                    \r\n        }\r\n    ?>\r\n\r\n\r\nini kenapa ya... kok error ya.. tolong dong para suhu PHP'),
('P-63457cc768c2d3.75480975', 'U-6344048ca89813.67032277', '2022-10-11 21:25:11', 'CPP', 'ada yang bisa bantu... keyword friend itu apa ya...'),
('P-6347ac782d2510.34514868', 'U-634745a8682dc1.37278517', '2022-10-13 13:13:12', 'PHP', 'halo teman-teman, saya baru di komunitas ini, dan mau belajar php. Salam kenal ya.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `isadmin` boolean DEFAULT NULL,
  `isbanned` boolean DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `foto`, `isadmin`, `isbanned`, `password`) VALUES
('A-12345678901234567890123', 'admin', 'admin', '-', NULL, 1, 0, '$2y$10$DCLT4NGWavvimM0LIpOLL.zu77nkH9uyK.Z3Y6QewejjgJQM/TdgS'),
('U-6344048ca89813.67032277', 'Farrel Dinarta', '<h1>Farrel</h1>', 'farrel.dinarta@student.umn.ac.id', 'foto_user_1665498619.png', 0, 1, '$2y$10$v2aybH2MEAtZcdAxkqVCeerjAsXlLMayGEejM5DvtOZVJP2jcnzQa'),
('U-6344049e0ac6e7.44316206', 'Bryan Richie', 'bryanrichie', 'bryan.richie@student.umn.ac.id', NULL, 0, 0, '$2y$10$UJQNjFv1uqb37Ysaa.ykOe0feSjYmOt54cBqTi3PpoiBd4ZtBKzEG'),
('U-634404be06a469.69537889', 'Nayasha Clarisasssss', 'nayashaclarisa', 'nayasha.clarisa@student.umn.ac.id', 'foto_user_1665407707.jpg', 0, 1, '$2y$10$LhZ.SfHT8XoSSoG13rpCYueTDSd4TVX1loA7.2dmMVV4jZ1KvAZ62'),
('U-634404d5e7aad1.52572028', 'Prudence Tendy', 'prudencetendy', 'prudence.tendy@student.umn.ac.id', NULL, 0, 0, '$2y$10$vLMeo59hDHkJeAvHmX6oYeb5Slpui6dSQn15UybAlyRzvBnFgSUZ2'),
('U-6346e942d07d85.65639478', 'Axel Ferdinand', 'axelferdinand', 'axel@gmail.com', NULL, 0, 0, '$2y$10$LH7lCUcVLzUyRs.Q/SW2ceKaAnXp4nJV1umyggQQlg1RDvBy8NPsm'),
('U-634745a8682dc1.37278517', 'missionx', 'missionx', 'missionx@gmail.com', NULL, 0, 0, '$2y$10$w4MlLlQnGT54Dcf1Chfqr.71d88MYdUG2nu5SzEKnjYwbzqM/ewle'),
('U-634790ce2f1a10.26935709', 'Barbarian King', 'barbarianking', 'farreldinarta12@gmail.com', NULL, 0, 0, '$2y$10$TyRKdgpOSZAjqN4986cNQOeCsWUAbwjPgz8A9kXYuVfZl51tictRS'),
('U-6347924d39ed52.91919827', 'mrbeas', 'misterbeast', 'farrel@student.umn.ac.id', NULL, 0, 0, '$2y$10$YwRMCxpoHyvDbIFw1Hf2H.zA0yGJNqriWyIf06nFb7B1ogTlsEye2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_post`
--
ALTER TABLE `comment_post`
  ADD PRIMARY KEY (`id_commentpost`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `gambar_postingan`
--
ALTER TABLE `gambar_postingan`
  ADD PRIMARY KEY (`id_post`,`nama_gambar`);

--
-- Indexes for table `like_comment`
--
ALTER TABLE `like_comment`
  ADD PRIMARY KEY (`id_comment`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`id_post`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_post`
--
ALTER TABLE `comment_post`
  ADD CONSTRAINT `comment_post_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_post_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `gambar_postingan`
--
ALTER TABLE `gambar_postingan`
  ADD CONSTRAINT `gambar_postingan_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE;

--
-- Constraints for table `like_comment`
--
ALTER TABLE `like_comment`
  ADD CONSTRAINT `like_comment_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `comment_post` (`id_commentpost`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `like_post`
--
ALTER TABLE `like_post`
  ADD CONSTRAINT `like_post_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_post_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
