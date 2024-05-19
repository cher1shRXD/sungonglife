-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2024 at 09:26 AM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sungong`
--

-- --------------------------------------------------------

--
-- Table structure for table `PROBLEM`
--

CREATE TABLE `PROBLEM` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(300) NOT NULL DEFAULT '',
  `picture` varchar(300) DEFAULT '',
  `description` varchar(300) NOT NULL DEFAULT '',
  `writer` varchar(300) NOT NULL DEFAULT '',
  `subject` varchar(300) NOT NULL DEFAULT '',
  `solved` int(11) NOT NULL,
  `challenged` int(11) NOT NULL,
  `answer` varchar(300) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `PROBLEM`
--

INSERT INTO `PROBLEM` (`id`, `title`, `picture`, `description`, `writer`, `subject`, `solved`, `challenged`, `answer`) VALUES
(8, '자 오늘부터 발로란트 강의 하겠스', '', '본인 골드', '김명준', '발로란트', 1, 1, '버니버니'),
(19, '김민재님의 수학강의 #1', '', '1+1을 계산하시오', '김민재', '수학', 4, 5, '3'),
(22, '고1-계수 비교법(선행할 친구들은 도전해보길)', '', 'kx²+x+ky²+y-13k+1=0일때 모든 실수 k에 대하여 위 식이 성립할때 xy의 값을 구하시오', 'allwayshapppyminjaejjingoneuldogibbeunminjaejjing123456789', '수학', 0, 0, '-6'),
(23, '테스트', '', '반갑습니다 반갑고요', 'dfkajlksdjflajdf', '과학', 0, 0, '반갑워요'),
(24, '파이값 소수점 이후 26자리까지 적어봐', '', '검색하지 말고 풀면 인정해줄겡', '멀멀멀', '수학', 0, 0, '3.14159265358979323846264338');

-- --------------------------------------------------------

--
-- Table structure for table `SOLVED`
--

CREATE TABLE `SOLVED` (
  `id` int(11) UNSIGNED NOT NULL,
  `solver_id` int(11) NOT NULL,
  `prob_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SOLVED`
--

INSERT INTO `SOLVED` (`id`, `solver_id`, `prob_id`) VALUES
(1, 3203, 8),
(2, 3203, 3),
(3, 3203, 1),
(4, 3203, 2),
(5, 1111, 7),
(6, 7777, 1),
(7, 3203, 19),
(8, 1111, 19),
(9, 1111, 18),
(10, 3203, 18),
(11, 1111, 20),
(12, 1111, 21),
(13, 1111, 3),
(14, 1111, 2),
(15, 1111, 2),
(16, 3218, 19),
(17, 3218, 2),
(18, 1312, 19);

-- --------------------------------------------------------

--
-- Table structure for table `TEACHER`
--

CREATE TABLE `TEACHER` (
  `id` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `pwd` varchar(300) NOT NULL,
  `subject` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `TEACHER`
--

INSERT INTO `TEACHER` (`id`, `name`, `pwd`, `subject`) VALUES
('123123', '멀멀멀', '$2y$10$E/qk/G6elsIxg4ZxIlON4ea3Iv7OHGiiDgXomI0jsz85icQNSxZr2', '수학'),
('123456', 'dfkajlksdjflajdf', '$2y$10$IFCIu0JbXqogelg.Z4x2S.XJn4T9nvb6JOMHEDDeYTBWWgZKtm4Du', '과학'),
('allwayshapppyminjaejjingoneuldogibbeunminjaejjing123456789', 'allwayshapppyminjaejjingoneuldogibbeunminjaejjing123456789', '$2y$10$zfPX829JXjsn2ux7IOpIiuYfnrhwu2WXu1AJbwib1cNpWhPMBzzqm', '수학'),
('binj1246', '테스트', '$2y$10$eCB7/kgjLhK/XZDV89dWiOzGg1fn/IIMg/3cm2Z6anMUSuF08qozC', '없음'),
('Qwer', '김민재', '$2y$10$TsVD11nZzinNhHRaGUqGRet2GjFOjBRcUVYxJFWYYBfVxvOutm0ui', '수학'),
('Qwer1234', '김민재', '$2y$10$8c.xdDaEP0wQENPmbSDLM.tywhoo6g3pwptbr0C9uN1bz6AhNyTOe', '수학'),
('rxd123', '김선생', '$2y$10$9gzdjL7bbXCmMJ5edgJoA.9dI7BCaUgykhsNkOrsxKGsusYBnuG9W', '체육'),
('teacher', '김명준', '$2y$10$6StrdnMbSSQXB0.jKT2qyOe/E55CRA7FvQiQ6beUkV9e0HAVjQhPu', '발로란트');

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `id` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `pwd` varchar(300) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `joined_probs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`id`, `name`, `pwd`, `points`, `score`, `joined_probs`) VALUES
('0000', 'tmp_tch', '$2y$10$XnBpbTr34AVAlZu98PDhpOFInN8kFv1yCouqAUb.6Ratmn8sLH5fq', 0, 0, 0),
('1108', '김도영', '$2y$10$ob5mnmnNmGMf2N62mF43ruHxuI6roKm48zqQvBdg3YvY/gOAyIsSm', 0, 0, 0),
('1110', '민', '$2y$10$/Pkd/5hIfzODX3AmlL/VN.qvAfVUV2ubOT7x5RT547lX78exj799a', 0, 0, 0),
('1111', '김민재', '$2y$10$o5RMbWlb3GkH/V/MKgs6S.risMoag9dJc6PrlEXLOhCiTXtS6fXg6', 0, 7, 7),
('1113', '호날두', '$2y$10$XqqSFKTSScpc279lRyV.HeZylrnvO4j78yprMcFWQnsYumR7PnbPG', 0, 0, 0),
('1312', '권하진', '$2y$10$/5vRTk5/o9FAC/QT0rRvL.CXvkinJ3tylJqIEFfRe9wwmCykhSA0q', 0, 1, 1),
('3101', '고현서', '$2y$10$3lLxo5A9jppuSekXN8wpBe.OFtWX5RzBZYXZwYLp8x/q9Frs.7UZO', 0, 0, 0),
('3203', '김태우', '$2y$10$XnBpbTr34AVAlZu98PDhpOFInN8kFv1yCouqAUb.6Ratmn8sLH5fq', 0, 6, 11),
('3218', '김이름', '$2y$10$5iRQJYU97KlfJLIijOdyi.u/bazikvChbBM1IxgcxLYqPUgYB2362', 0, 2, 2),
('7777', '김민재', '$2y$10$S/1dMTfn1jfxG5FomnuT7utNO5P.C3sAmmIfdDqiRnlrvF4cqgfZe', 0, 2, 9),
('9999', '김도영', '$2y$10$szg26ji/y./F7qp6Kj1pDOjm8w0PDjUk3d7IYwYWgFJ8up.5CZu5O', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PROBLEM`
--
ALTER TABLE `PROBLEM`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SOLVED`
--
ALTER TABLE `SOLVED`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TEACHER`
--
ALTER TABLE `TEACHER`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `PROBLEM`
--
ALTER TABLE `PROBLEM`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `SOLVED`
--
ALTER TABLE `SOLVED`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
