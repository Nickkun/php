-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 16-10-26 07:37
-- 서버 버전: 5.7.14
-- PHP 버전: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `test`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `author` varchar(20) NOT NULL,
  `notice` int(1) NOT NULL DEFAULT '0',
  `ipaddress` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`id`, `user_id`, `title`, `content`, `author`, `notice`, `ipaddress`, `timestamp`) VALUES
(21, 1, '공지사항', '테스트중입니다', '관리자', 1, '', '2016-10-26 05:42:16'),
(22, 5, '안녕하세요', '반가워요', '테스터', 0, '', '2016-10-26 06:05:05'),
(23, 6, '가입했어요', '반갑습니다', '오버워치', 0, '', '2016-10-26 06:10:06'),
(24, 6, '매드무비', '하이요', '오버워치', 0, '', '2016-10-26 06:13:11'),
(25, 7, '레벨테스트', '아이콘 변하나요', '매드킬', 0, '', '2016-10-26 06:17:28'),
(26, 1, '1234', '1234', '관리자', 0, '::1', '2016-10-26 07:19:38');

-- --------------------------------------------------------

--
-- 테이블 구조 `point`
--

CREATE TABLE `point` (
  `id` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `icon` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `point`
--

INSERT INTO `point` (`id`, `min`, `max`, `icon`) VALUES
(1, 0, 99, '<i class="fa fa-star-o text-success"></i> '),
(2, 100, 299, '<i class="fa fa-star text-success"></i> '),
(3, 300, 599, '<i class="fa fa-star-o text-warning"></i><i class="fa fa-star-o text-warning"></i> '),
(4, 600, 999, '<i class="fa fa-star text-warning"></i><i class="fa fa-star-o text-warning"></i>'),
(5, 1000, 1499, '<i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i>'),
(6, 1500, 2099, '<i class="fa fa-star-o text-danger"></i><i class="fa fa-star-o text-danger"></i><i class="fa fa-star-o text-danger"></i> '),
(7, 2100, 2799, '<i class="fa fa-star text-danger"></i><i class="fa fa-star-o text-danger"></i> <i class="fa fa-star-o text-danger"></i> '),
(8, 2800, 3599, '<i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i> <i class="fa fa-star-o text-danger"></i> '),
(9, 3600, 999999, '<i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i><i class="fa fa-star text-danger"></i> ');

-- --------------------------------------------------------

--
-- 테이블 구조 `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `author` varchar(10) NOT NULL,
  `content` varchar(200) NOT NULL,
  `ipaddress` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `reply`
--

INSERT INTO `reply` (`id`, `board_id`, `user_id`, `author`, `content`, `ipaddress`, `timestamp`) VALUES
(7, 21, 1, '관리자', '1234', '', '2016-10-26 05:46:18'),
(8, 24, 6, '오버워치', '1111', '', '2016-10-26 06:13:46'),
(9, 24, 6, '오버워치', '1234', '', '2016-10-26 06:14:04'),
(10, 24, 6, '오버워치', '111', '', '2016-10-26 06:14:58'),
(11, 24, 6, '오버워치', '123', '', '2016-10-26 06:16:05');

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `point` int(11) NOT NULL DEFAULT '0',
  `role` int(1) NOT NULL DEFAULT '9',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_password`, `user_name`, `point`, `role`, `timestamp`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '관리자', 10009, 0, '2016-10-24 08:05:35'),
(5, 'test', '81dc9bdb52d04dc20036dbd8313ed055', '테스터', 0, 9, '2016-10-26 05:13:47'),
(6, 'test2', '81dc9bdb52d04dc20036dbd8313ed055', '오버워치', 113, 9, '2016-10-26 06:05:19'),
(7, 'test3', '81dc9bdb52d04dc20036dbd8313ed055', '매드킬', 411, 9, '2016-10-26 06:16:27'),
(8, 'test4', '81dc9bdb52d04dc20036dbd8313ed055', '야야', 0, 9, '2016-10-26 07:07:00');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 테이블의 AUTO_INCREMENT `point`
--
ALTER TABLE `point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 테이블의 AUTO_INCREMENT `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 테이블의 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
