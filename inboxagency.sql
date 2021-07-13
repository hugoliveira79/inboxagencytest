-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 04:11 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inboxagency`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_is_in_purchase`
--

CREATE TABLE IF NOT EXISTS `book_is_in_purchase` (
  `id_ book_is_in_purchase` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_book` int(11) NOT NULL,
  `fk_id_purchase` int(11) NOT NULL,
  PRIMARY KEY (`id_ book_is_in_purchase`),
  KEY `fk_books_has_purchases_purchases1_idx` (`fk_id_purchase`),
  KEY `fk_books_has_purchases_books_idx` (`fk_id_book`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `title_book` varchar(45) DEFAULT NULL,
  `price_book` decimal(6,2) DEFAULT NULL,
  `cover_book` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_book`, `title_book`, `price_book`, `cover_book`) VALUES
(1, 'O Código DaVinci', '12.50', 'codigo.jpg'),
(2, 'Corto Maltese na Sibéra', '20.00', 'corto.jpg'),
(3, 'As Vinhas da Ira', '22.50', 'ira.jpg'),
(4, 'Dog Mendonça e Pizzaboy', '25.00', 'dog.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id_purchase` int(11) NOT NULL AUTO_INCREMENT,
  `date_purchase` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_purchase`),
  KEY `fk_purchases_users1_idx` (`fk_id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE IF NOT EXISTS `shopping_carts` (
  `id_shopping_cart` int(11) NOT NULL,
  PRIMARY KEY (`id_shopping_cart`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login_user` varchar(45) DEFAULT NULL,
  `pass_user` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `login_user`, `pass_user`) VALUES
(1, 'hugo', '202cb962ac59075b964b07152d234b70');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_is_in_purchase`
--
ALTER TABLE `book_is_in_purchase`
  ADD CONSTRAINT `fk_books_has_purchases_books` FOREIGN KEY (`fk_id_book`) REFERENCES `books` (`id_book`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_books_has_purchases_purchases1` FOREIGN KEY (`fk_id_purchase`) REFERENCES `purchases` (`id_purchase`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `fk_purchases_users1` FOREIGN KEY (`fk_id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
