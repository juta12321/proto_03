-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-12-17 12:38:00
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacy_d01_10`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `proto_3_table`
--

CREATE TABLE `proto_3_table` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `proto_3_table`
--

INSERT INTO `proto_3_table` (`id`, `date`, `lat`, `lng`, `score`) VALUES
(12, '2021-12-15 00:00:00', '34.05240000', '131.82900000', 2),
(13, '2021-12-15 00:00:00', '34.05260000', '131.82900000', 2),
(14, '2021-12-15 00:00:00', '34.04960000', '131.83100100', 2),
(15, '2021-12-15 00:00:00', '34.04940000', '131.83200000', 2),
(16, '2021-12-15 00:00:00', '34.05020000', '131.83100000', 2),
(17, '2021-12-15 00:00:00', '34.05080000', '131.83200000', 2),
(18, '2021-12-15 00:00:00', '34.05110000', '131.83100000', 2),
(20, '2021-12-15 00:00:00', '34.05110000', '131.83100000', 1),
(22, '2021-12-15 00:00:00', '34.05280000', '131.83000000', 1),
(23, '2021-12-15 00:00:00', '34.05280000', '131.83000000', 1),
(24, '2021-12-15 00:00:00', '34.05270000', '131.83200000', 1),
(25, '2021-12-15 00:00:00', '34.05220000', '131.83100000', 1),
(26, '2021-12-15 00:00:00', '34.05210000', '131.83100000', 1),
(27, '2021-12-15 00:00:00', '34.05160000', '131.83100000', 1),
(28, '2021-12-15 00:00:00', '34.05120000', '131.83100000', 1),
(29, '2021-12-15 00:00:00', '34.05070000', '131.83000000', 1),
(30, '2021-12-15 00:00:00', '34.05050000', '131.83000000', 1),
(31, '2021-12-15 00:00:00', '34.05030000', '131.83000000', 1),
(32, '2021-12-15 00:00:00', '34.04960000', '131.83100000', 1),
(33, '2021-12-15 00:00:00', '34.04990000', '131.83100000', 1),
(34, '2021-12-15 00:00:00', '34.05040000', '131.83200000', 1),
(35, '2021-12-15 00:00:00', '34.04970000', '131.83100000', 1),
(36, '2021-12-15 00:00:00', '34.04860000', '131.83200000', 1),
(37, '2021-12-15 00:00:00', '34.05170000', '131.82900000', 1),
(38, '2021-12-15 00:00:00', '34.05170000', '131.82900000', 1),
(39, '2021-12-15 00:00:00', '34.05170000', '131.82800000', 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `proto_3_table`
--
ALTER TABLE `proto_3_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `proto_3_table`
--
ALTER TABLE `proto_3_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;