-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2018 a las 12:24:23
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_php_mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `categoria` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `dataAlta` date NOT NULL,
  `publico` enum('infantil','adults','tots') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'tots',
  `descripcio` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`categoria`, `dataAlta`, `publico`, `descripcio`) VALUES
('Article', '2018-11-22', 'tots', 'dsfasdfs '),
('manga', '2018-12-20', 'infantil', 'fdgdsfsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `dataAlta` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `dataModificacio` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `foto` longblob,
  `categoria` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'Article'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `author`, `content`, `title`, `dataAlta`, `dataModificacio`, `foto`, `categoria`) VALUES
(9, 'carlos', 'ghjfgfhfjj ', 'InformÃ tico', '2018-11-28 18:49:14.508188', '0000-00-00 00:00:00.000000', 0x656532326363663838626232303938313336316463363965346634323536626232623163383631362d4469616772616d61436c61737365735f436f6e74726f6c6c65722e706e67, ''),
(10, 'pepe', 'wdrfqfrsdfwsfdsfsdfdfddfsdfdfsfsdfsdsdfsfdsfdsfds', 'perro', '2018-11-28 19:23:29.985831', '2018-11-28 19:23:29.985831', NULL, 'Article'),
(18, 'ER CIGALA', 'er sigala lo ma mehior  ', 'ER CIGALA', '2018-11-30 15:10:12.001469', '0000-00-00 00:00:00.000000', 0x366464653632353965613037613862333134386635383830396339303263373931623137356465622d646965676f2d656c2d636967616c612e6a7067, 'Article'),
(19, 'carlos', 'waserfsdasdafsda', 'InformÃ tico', '2018-12-03 10:06:43.716747', '2018-12-03 10:06:43.716747', 0x366464653632353965613037613862333134386635383830396339303263373931623137356465622d646965676f2d656c2d636967616c612e6a7067, 'Manga'),
(20, 'carlos', 'waserfsdasdafsda', 'InformÃ tico', '2018-12-03 10:07:49.016672', '2018-12-03 10:07:49.016672', 0x366464653632353965613037613862333134386635383830396339303263373931623137356465622d646965676f2d656c2d636967616c612e6a7067, 'Manga');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoria`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
