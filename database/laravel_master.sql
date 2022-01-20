-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-01-2022 a las 19:57:31
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel_master`
--
CREATE DATABASE IF NOT EXISTS `laravel_master` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laravel_master`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_comments_users` (`user_id`),
  KEY `pk_comments_images` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `image_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'YO tmb quiero MUSGOO!!', '2020-05-20 21:32:12', '2020-05-20 21:32:12'),
(2, 2, 1, 'Buena foto de FAMILIA!!', '2020-05-20 21:32:12', '2020-05-20 21:32:12'),
(3, 2, 4, 'Sucios matasteis a Hameline u.u', '2020-05-20 21:32:13', '2020-05-20 21:32:13'),
(7, 6, 11, 'Sugggoi!!', '2020-05-29 19:26:41', '2020-05-29 19:26:41'),
(8, 5, 11, 'Pues dicen que Midir está detrás de la iglesia y le puedes ver !!', '2020-05-29 19:45:33', '2020-05-29 19:45:33'),
(10, 5, 10, 'Namek, sube más fotos de Dark Souls, me gusta ese contenido.', '2020-05-30 16:45:05', '2020-05-30 16:45:05'),
(12, 8, 8, 'Lmao', '2020-05-30 17:35:26', '2020-05-30 17:35:26'),
(13, 6, 9, 'Fun Fact: Ray Dimitri no considera ni boss a los Vigilantes del Abismo, en mi modesta opinión, son formidables para los más iniciados a la saga Souls', '2020-06-03 00:23:50', '2020-06-03 00:23:50'),
(14, 5, 12, 'Siegbraü!', '2020-06-04 18:07:10', '2020-06-04 18:07:10'),
(15, 12, 13, 'lo es :3', '2020-06-08 16:28:21', '2020-06-08 16:28:21'),
(16, 6, 5, 'Hola Diego', '2020-11-08 19:35:50', '2020-11-08 19:35:50'),
(19, 6, 16, 'Tiene mucha verdad.', '2020-12-04 13:12:57', '2020-12-04 13:12:57'),
(20, 6, 16, 'asd', '2021-10-04 11:40:57', '2021-10-04 11:40:57'),
(21, 6, 17, 'Se me olvidó decir que están de rebajas!!', '2021-10-25 08:04:29', '2021-10-25 08:04:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `user_id`, `image_path`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'test.jpg', 'descripcion de prueba 1', '2020-05-20 21:28:09', '2020-05-20 21:28:09'),
(2, 1, 'playa.jpg', 'playa de preuba 1', '2020-05-20 21:28:09', '2020-05-20 21:28:09'),
(3, 1, 'arena.jpg', 'arena arenosa de prueba 1', '2020-05-20 21:28:09', '2020-05-20 21:28:09'),
(4, 3, 'musgo.jpg', 'mumumuummu musgooo', '2020-05-20 21:28:15', '2020-05-20 21:28:15'),
(5, 6, '1607097483Black_Lotus.png', 'Paco-sama decide hacerse fan de la ultrapoderosa Black Lotuss', '2020-05-26 17:51:34', '2020-12-04 15:58:03'),
(6, 5, '1590604760bg.jpg', 'Saaaabeeeeer!!!! Si no te has visto Fate, te la recomiendo. Solo por Fate Zero.', '2020-05-27 18:39:20', '2020-05-27 18:39:20'),
(7, 7, '15906760521442607840-shutterstock_249162988-2.jpg', 'Ñam Ñam VEGANO POWER', '2020-05-28 14:27:32', '2020-05-28 14:27:32'),
(8, 7, '15906760861548138132_005388_1548138268_noticia_normal.jpg', 'Goku Vegano', '2020-05-28 14:28:06', '2020-05-28 14:28:06'),
(9, 8, '1590676439ds3.jpg', 'DARK SOULS Old Times ;P\r\n@namek\r\n@mark', '2020-05-28 14:33:59', '2020-05-28 14:33:59'),
(10, 8, '1590685493ds2.jpg', 'Irythilliltyhlil, qué hermoso. Oh se viene el perrete!!', '2020-05-28 17:04:53', '2020-05-28 17:04:53'),
(11, 6, '1591372157img-vertical.jpg', 'La iglesia de Fillianore, dónde duerme Midir :)', '2020-05-29 17:07:25', '2020-06-05 15:49:17'),
(12, 5, '1591291642cebolla.jpg', 'Un grande de Dark Souls', '2020-06-04 17:27:22', '2020-06-04 17:27:22'),
(13, 12, '1591632962mawile2.jpg', 'Es too cute <3', '2020-06-08 16:16:02', '2020-06-08 16:29:44'),
(14, 6, '1595267629sublime2.jpg', 'Buen sitio de vacaciones', '2020-07-20 17:53:49', '2020-07-20 17:53:49'),
(16, 6, '1607087557branding.png', 'El cubo de la verdad. !!!!', '2020-12-04 13:12:37', '2020-12-09 20:10:05'),
(17, 6, '163514901068803841-1-f.jpg', 'Me he comprado esta sudadera en Pull&Owl, ¡A disfrutar!', '2021-10-25 08:03:30', '2021-10-25 08:03:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_likes_users` (`user_id`),
  KEY `pk_likes_images` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2020-05-20 21:34:36', '2020-05-20 21:34:36'),
(2, 2, 4, '2020-05-20 21:34:36', '2020-05-20 21:34:36'),
(3, 3, 2, '2020-05-20 21:34:36', '2020-05-20 21:34:36'),
(4, 3, 1, '2020-05-20 21:34:36', '2020-05-20 21:34:36'),
(7, 8, 8, '2020-05-30 18:29:32', '2020-05-30 18:29:32'),
(9, 8, 10, '2020-06-01 15:59:18', '2020-06-01 15:59:18'),
(12, 8, 7, '2020-06-01 17:38:21', '2020-06-01 17:38:21'),
(13, 8, 4, '2020-06-01 17:54:17', '2020-06-01 17:54:17'),
(19, 6, 10, '2020-06-02 15:58:06', '2020-06-02 15:58:06'),
(25, 6, 11, '2020-06-03 00:22:18', '2020-06-03 00:22:18'),
(26, 6, 9, '2020-06-03 00:22:20', '2020-06-03 00:22:20'),
(28, 6, 7, '2020-06-03 00:24:58', '2020-06-03 00:24:58'),
(29, 6, 6, '2020-06-03 00:25:00', '2020-06-03 00:25:00'),
(31, 8, 11, '2020-06-03 18:31:58', '2020-06-03 18:31:58'),
(32, 5, 12, '2020-06-04 17:42:27', '2020-06-04 17:42:27'),
(33, 5, 11, '2020-06-04 17:48:41', '2020-06-04 17:48:41'),
(48, 12, 13, '2020-06-08 17:27:58', '2020-06-08 17:27:58'),
(50, 6, 8, '2020-07-28 23:36:47', '2020-07-28 23:36:47'),
(51, 6, 5, '2021-02-16 16:25:03', '2021-02-16 16:25:03'),
(52, 6, 17, '2021-10-25 08:04:15', '2021-10-25 08:04:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `nick`, `email`, `password`, `image`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'user', 'Pablo', 'Moras', 'pmh', 'pablomprogram@gmail.com', 'pass', 'default.jpg', '2020-05-20 20:06:38', '2020-05-20 20:06:38', NULL),
(2, 'user', 'Mandila', 'Klobe', 'Kob', 'kob@gmail.com', 'kob', 'default.jpg', '2020-05-20 20:11:08', '2020-05-20 20:11:08', NULL),
(3, 'user', 'Juan', 'Trethm', 'Juanus', 'juanusmaximus@gmail.com', '123', 'default.jpg', '2020-05-20 20:11:10', '2020-05-20 20:11:10', NULL),
(4, 'admin', 'Admin', 'admin', 'tester64', 'admin@admin.com', '$2y$10$EVjZIHb9wk/yTWLBMXWe1OHK1ZhH1DwSTAS29PI2e8s9k/6yr8DVu', 'default.jpg', '2020-05-22 19:59:27', '2020-05-22 19:59:27', '4LXes9F6zF9nEIiowqXtt2yx8SMVnk2tent5HL4w3PKRJRfM931rF2EB4KwH'),
(5, NULL, 'Marcos', 'Allann', 'Mark-7', 'mark@gmail.com', '$2y$10$/sJNm/3BfjeSNMReMHMWoe/AgL3pmeiHFHKj45rtG1XiSOVpxt2u2', '159060472175397761_2458392574429952_2230245986665548364_n.jpg', '2020-05-22 20:33:35', '2020-05-27 18:38:41', '3Q67UZPz0m7Z7eKuNxGJSfXnfxwL6kUg1jAYTrIbNeYDAy6BXVYoVrSLJFBL'),
(6, 'user', 'Paco\'s', 'Paquezz', 'Paco-8', 'paco@gmail.com', '$2y$10$ZTCPrS8KAwXxgCFeUQOR.ebvhiluc1XIHPDX5dIVEo4ZZQXWWaEjm', '1595267677sublime3.jpg', '2020-05-22 20:35:54', '2020-07-20 17:54:37', 'raVASV5GrPzQ4OJaD02L1DcMHuFHz4j1EQ83ERYGhi7wQkeu83dtOsKoeYWV'),
(7, 'user', 'Demis', 'Lack', 'Gorgon77', 'demis@gmail.com', '$2y$10$zNI.Z42E46jBtQzbXY.g8uBVvPNC6kR3l4wrm0lLbu2b8TPHiw8Ki', '1590676003lechuga-boston.jpg', '2020-05-28 14:26:10', '2020-05-28 14:26:43', 'K4GQEsORAUOfKK7LYvotKu1HWVBhzpg4pwIgOYc8D8mBA1NiSKfKe8GmwuO3'),
(8, 'user', 'Namek', 'Galash', 'Namek_HD', 'namek@gmail.com', '$2y$10$.1idf1fK9scuvwwLsmhrI.oqZdxT23xNg5Sv7JUiNJuJmh3/9eszO', '1590676260hawaiana12.jpg', '2020-05-28 14:30:02', '2020-05-28 14:31:00', '1CwR6F2shEmsSqTd8IuxgKyxR5PMxXf9ZIT00N6YGm7VyifpnCIzPuA3oT8A'),
(10, 'user', 'Ledros', 'Comandante Ledros', 'Ledros el roto', 'ledros@gmail.com', '$2y$10$wIymZffgSPxjDaDNXJV8K.Y5C1q7X55XMP2W3MDJzs0abnTPXcj0m', 'default.jpg', '2020-06-06 19:42:20', '2020-06-06 19:42:20', NULL),
(11, 'user', 'newww yurk', 'Newwie', 'newbie', 'new@gmail.com', '$2y$10$T.amIpHiAcMtLI6Lxz3elee3R7L6F.zwPLjD.52j7r0yWbAR0YwyS', 'default.jpg', '2020-06-08 15:58:03', '2020-06-08 15:58:03', 'x66WlQtVOQvHMuNJBMkvZ1aDqjvbdjzMm56VrEWE11wRPwCDpDgBGJsjEtka'),
(12, 'user', 'mawile', 'wilee', 'pokemonMawileCute', 'mawile@gmail.com', '$2y$10$WH154JqfBLtVLLTXJzkSkOV4v8pOViNtv.mnoHUKw5sfVDqFDPsny', '1591633834mawil1.png', '2020-06-08 15:59:25', '2020-06-08 16:30:34', 'xDul58R2lsXn9CBgS6p1Per4kWzjBVEYxJUdBWagfmO15fRoTgk5kBwLkPyt'),
(13, 'user', 'pmh', 'titan', 'pmhtitan', 'pmhtitan@gmail.com', '$2y$10$mHJssDERI5PK3D5eCTK6nemh4ZKHLaLFc5dVfEFpNMwS00yNPCYSu', '1603912888espirtus.jpg', '2020-10-28 19:21:09', '2020-10-28 19:21:28', 'kFqhxBZpHsBmtk1WZCVqaKt9Bnf6ft6YlHJdMhwOmBo6Y6j9aHPh6RKB461C'),
(14, 'user', 'Bolto', 'Akboltus', 'Bolt', 'bolt@gmail.com', '$2y$10$Qjg5K59CgghzelTsVrDj2ucvhZwDYkH7wPjxE2sQmxj97YYVSmT96', '1608113848capricornio1.jpg', '2020-12-16 10:17:11', '2020-12-16 10:17:28', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `pk_comments_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `pk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `pk_likes_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `pk_likes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
