--
-- Base de datos: `blog1`
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `Qbitblog1`;

USE `Qbitblog1`;

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo` (
  `articulo_id` int(4) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(4) DEFAULT NULL,
  `autor` varchar(40) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` date NOT NULL,
  `img` varchar(60) NOT NULL,
  PRIMARY KEY (`articulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
 `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(40) NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_dev` int(4) NOT NULL AUTO_INCREMENT,
  `email_dev` varchar(50) NOT NULL,
  `usuario_dev` varchar(80) NOT NULL,
  `password_dev` varchar(150) NOT NULL,
   PRIMARY KEY (`id_dev`),
   UNIQUE KEY `email_dev` (`email_dev`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `usuario` (`id_dev`, `email_dev`, `usuario_dev`, `password_dev`) VALUES
(DEFAULT, 'juan@developero.com', 'Juan', '$2y$10$Cr6LiuLPEPqwePibULdJZ.UkKVYe2bgBPdzHYYvyw.n/5n3a/JxtG');
