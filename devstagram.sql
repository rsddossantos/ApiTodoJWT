-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Ago-2020 às 03:15
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `devstagram`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `photo`
--

INSERT INTO `photo` (`id`, `id_user`, `url`) VALUES
(1, 1, 'teste'),
(3, 2, 'outra foto user 2'),
(4, 2, 'foto user 2'),
(6, 2, 'mais foto user 2'),
(7, 3, 'foto user 3'),
(8, 3, 'outra foto user 3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `photos_comments`
--

DROP TABLE IF EXISTS `photos_comments`;
CREATE TABLE IF NOT EXISTS `photos_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL,
  `date_comment` datetime NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `photos_comments`
--

INSERT INTO `photos_comments` (`id`, `id_user`, `id_photo`, `date_comment`, `comment`) VALUES
(3, 3, 7, '2020-08-11 00:00:00', 'Essa ficou top demais uhuuuu!!!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `photos_likes`
--

DROP TABLE IF EXISTS `photos_likes`;
CREATE TABLE IF NOT EXISTS `photos_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `photos_likes`
--

INSERT INTO `photos_likes` (`id`, `id_user`, `id_photo`) VALUES
(4, 3, 7),
(3, 3, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `avatar`) VALUES
(1, 'Joaquim Nabuco', 'rsddossantos@gmail.com', '$2y$10$1MEqMr6kWFAtVQnbdVIeAO3FC/aTPpVj7pXcnUFlory/O6txqb3DS', ''),
(3, 'Sergio Malandro', 'salcifufu@gmail.com', '$2y$10$TDgMNiUyK8SWK/Nsai2MFe81M3cI5Q5pQbLZfOROtB79jy93P63DG', NULL),
(2, 'Joseph Climber', 'teste@hotmail.com', '123', 'sdfgsdghdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_following`
--

DROP TABLE IF EXISTS `users_following`;
CREATE TABLE IF NOT EXISTS `users_following` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_active` int(11) NOT NULL,
  `id_user_passive` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users_following`
--

INSERT INTO `users_following` (`id`, `id_user_active`, `id_user_passive`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
