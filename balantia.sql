-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-01-2021 a las 10:42:07
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `balantia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Madrid', NULL, NULL),
(2, 'Santander', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2021_01_20_174021_create_rols_table', 1),
(7, '2021_01_20_174137_create_cities_table', 1),
(8, '2021_01_20_181139_add_foreign_keys', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

DROP TABLE IF EXISTS `rols`;
CREATE TABLE IF NOT EXISTS `rols` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Developer', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_rol_id_foreign` (`rol_id`),
  KEY `users_city_id_foreign` (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `created_at`, `updated_at`, `rol_id`, `city_id`) VALUES
(1, 'Tarja', '2021-01-21 06:41:10', '2021-01-21 06:41:10', 1, 1),
(2, 'Turunen', '2021-01-21 06:41:11', '2021-01-21 06:41:11', 1, 1),
(3, 'Yepez', '2021-01-21 06:41:11', '2021-01-21 06:41:11', 1, 1),
(4, 'Rudolph Adams', '2021-01-21 06:41:11', '2021-01-21 06:41:11', 1, 1),
(5, 'Ronny', '2021-01-21 06:41:11', '2021-01-21 06:41:11', 2, 1),
(7, 'Prof. Ayden Frami', '2021-01-21 08:02:02', '2021-01-21 08:02:02', 1, 1),
(8, 'Norval McDermott', '2021-01-21 08:03:15', '2021-01-21 08:03:15', 1, 1),
(9, 'Lizeth Mayert', '2021-01-21 08:07:50', '2021-01-21 08:07:50', 1, 2),
(10, 'Scotty Rath', '2021-01-21 08:08:30', '2021-01-21 08:08:30', 1, 2),
(11, 'Shanie Lemke', '2021-01-21 08:08:51', '2021-01-21 08:08:51', 1, 1),
(12, 'Sydni Ward', '2021-01-21 08:09:16', '2021-01-21 08:09:16', 1, 1),
(13, 'Sarina Jerde', '2021-01-21 08:09:51', '2021-01-21 08:09:51', 1, 1),
(14, 'Dr. Larue Goodwin Jr.', '2021-01-21 08:10:09', '2021-01-21 08:10:09', 1, 1),
(15, 'Prof. Kip Hayes', '2021-01-21 09:29:18', '2021-01-21 09:29:18', 2, 1),
(16, 'Lilla Streich', '2021-01-21 09:29:29', '2021-01-21 09:29:29', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
