-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 27 2019 г., 10:55
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `specialist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actions`
--

INSERT INTO `actions` (`id`, `name`, `status`) VALUES
(1, 'Порезка заготовки', '1'),
(2, 'Ток. обработка на УН', '1'),
(3, 'Ток. обработка на ЧПУ', '1'),
(4, 'Фрезерование', '1'),
(5, 'Слесарные операции', '1'),
(6, 'Сборочные операции', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `symbol` varchar(50) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `date_exec` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `symbol`, `state`, `type`, `date_exec`, `note`, `status`) VALUES
(1, 'SP000000485', 4, 1, '1550479090', '', '1'),
(2, 'SP000000095', 1, 1, '1550566789', '', '0'),
(3, 'SP000000510', 4, 1, '1550567012', '', '1'),
(4, 'ddddd', 1, 1, '1550661061', 'vvvvvvvvvvvvv', '0'),
(5, 'SP000000468', 1, 1, '', '', '1'),
(6, 'SP000000479', 4, 1, '', '', '1'),
(7, 'SP000000532', 1, 1, '1550735635', '', '1'),
(8, 'SP000000541', 1, 1, '1550735832', '', '1'),
(9, 'SP000000548', 1, 1, '1550735929', '', '1'),
(10, 'SP000000549', 1, 1, '1550736037', '', '1'),
(11, 'SP-TEST', 4, 1, '1550998423', '', '1'),
(12, 'PN000000135', 3, 1, '1551336067', '', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `order_actions`
--

CREATE TABLE `order_actions` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_action` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `state` int(11) NOT NULL,
  `type_order` int(11) NOT NULL,
  `time_start` varchar(100) NOT NULL,
  `time_end` varchar(100) NOT NULL,
  `time_manufac` varchar(100) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_actions`
--

INSERT INTO `order_actions` (`id`, `id_order`, `id_prod`, `id_action`, `qty`, `state`, `type_order`, `time_start`, `time_end`, `time_manufac`, `id_worker`, `status`) VALUES
(1, 11, 1, 6, 2, 4, 1, '1551253575', '1551253577', '38', 2, '1'),
(2, 11, 102, 1, 2, 4, 1, '1551253559', '1551253562', '5', 2, '1'),
(3, 11, 102, 3, 2, 4, 1, '1551191045', '1551191050', '15', 2, '1'),
(4, 11, 102, 4, 2, 4, 1, '1551253588', '1551253601', '11', 2, '1'),
(5, 11, 103, 1, 8, 4, 1, '1551253564', '1551253565', '9', 2, '1'),
(6, 11, 103, 3, 8, 4, 1, '1551253608', '1551253610', '17', 2, '1'),
(7, 11, 106, 1, 2, 4, 1, '1551253567', '1551253570', '5', 2, '1'),
(8, 11, 106, 2, 2, 4, 1, '1551253618', '1551253964', '21', 2, '1'),
(9, 12, 110, 6, 4, 1, 1, '', '', '77', 0, '1'),
(10, 12, 125, 1, 4, 1, 1, '', '', '13', 0, '1'),
(11, 12, 125, 3, 4, 1, 1, '', '', '25', 0, '1'),
(12, 12, 125, 2, 4, 2, 1, '1551253993', '', '41', 2, '1'),
(13, 12, 125, 4, 4, 1, 1, '', '', '21', 0, '1'),
(14, 12, 126, 1, 4, 1, 1, '', '', '13', 0, '1'),
(15, 12, 126, 2, 4, 1, 1, '', '', '101', 0, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `order_content`
--

CREATE TABLE `order_content` (
  `id` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_content`
--

INSERT INTO `order_content` (`id`, `id_prod`, `quantity`, `id_order`, `status`) VALUES
(1, 1, 2, 11, '1'),
(2, 110, 4, 12, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `order_positions`
--

CREATE TABLE `order_positions` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `symbol` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL COMMENT 'quantity',
  `note` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_positions`
--

INSERT INTO `order_positions` (`id`, `id_order`, `symbol`, `qty`, `note`, `status`) VALUES
(1, 1, 'SC-SE-40x200-S', 4, '', '1'),
(2, 3, 'SC-SDA-25x20', 1, '', '1'),
(3, 4, 'SC-SDA-12', 5, 'vvvvvvv', '1'),
(4, 5, 'SC-ROD-12-170-C01', 24, '', '1'),
(5, 6, 'SC-SC-100x200-S', 1, '', '1'),
(6, 7, 'SC-SR-40x310-S', 6, '', '1'),
(7, 7, 'SC-SR-40x220-S', 2, '', '1'),
(8, 7, 'SC-SR-40x140-S', 2, '', '1'),
(9, 8, 'SA-FU20-08', 2, 'Собрать вместе', '1'),
(10, 9, 'SC-ROD-12x550-C01', 3, 'Шток для цилиндра фесто, без канавки', '1'),
(11, 10, 'SC-MAL-40x120-S', 2, '', '1'),
(12, 10, 'SC-MA-25x100', 1, '', '1'),
(13, 11, 'SC-SR-32', 2, '', '1'),
(14, 12, 'SC-MAL-20x25-S', 4, '', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `symbol` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `note` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `symbol`, `name`, `id_parent`, `quantity`, `type`, `note`, `status`) VALUES
(1, 'SC-SR-32', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(2, 'SC-SR-40', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(3, 'SC-SR-50', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(4, 'SC-SR-63', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(5, 'SR/SE-ROD-12', 'Шток', 16, 1, 4, '', '1'),
(6, 'SR/SE-ROD-16', 'Шток', 16, 1, 4, '', '1'),
(7, 'SR-PIPE-32', 'Гильза', 95, 1, 4, '', '0'),
(8, 'SR-PIPE-40', 'Гильза', 95, 1, 4, '', '1'),
(9, '', 'Производство', 0, 0, 1, '', '1'),
(10, '', 'Готовая продукция', 9, 0, 1, '', '1'),
(11, '', 'Узлы и детали', 9, 0, 1, '', '1'),
(12, '', 'Пневмоцилиндры', 10, 0, 1, '', '1'),
(13, '', 'Пневмоцилиндры', 11, 0, 1, 'запчасти', '1'),
(14, '', 'Серия SR', 12, 0, 1, '', '1'),
(47, '', 'Серия SDA', 12, 0, 1, '', '1'),
(48, 'SC-SDA-12', 'Пневмоцилиндр', 47, 1, 0, '', '1'),
(15, 'SR/SE-ROD-20', 'Шток', 16, 1, 4, '', '1'),
(16, '', 'Серия SR/SE', 20, 0, 1, '', '1'),
(17, 'SR/SE-ROD-25', 'Шток', 16, 1, 4, '', '1'),
(18, 'SR/SE-ROD-32', 'Шток', 16, 1, 4, '', '1'),
(19, 'SR/SE-ROD-40', 'Шток', 16, 1, 4, '', '1'),
(20, '', 'Штока', 10, 0, 1, '', '1'),
(21, '', 'Гильзы', 10, 0, 1, '', '1'),
(22, '', 'Шпильки', 10, 0, 1, '', '1'),
(23, '', 'Серия SE', 12, 0, 1, '', '1'),
(24, '', 'Серия SC', 20, 0, 1, '', '1'),
(25, 'SC-TR-H-6', 'Шпилька 6мм', 22, 1, 4, '', '1'),
(26, 'SC-TR-H-8', 'Шпилька 8мм', 22, 1, 4, '', '1'),
(27, 'SC-TR-H-10', 'Шпилька 10мм', 22, 1, 4, '', '1'),
(28, 'SC-TR-H-12', 'Шпилька 12мм', 22, 1, 4, '', '1'),
(29, 'SC-TR-H-16', 'Шпилька 16мм', 22, 1, 4, '', '1'),
(30, 'SC-SR/SE-ROD-12', 'Шток', 16, 1, 4, '', ''),
(31, 'SC-TR-H-6', 'Шпилька 6мм', 1, 1, 4, '', '0'),
(32, 'SC-SE-32', 'Пневмоцилиндр', 23, 1, 2, '', '1'),
(33, 'SC-SE-40', 'Пневмоцилиндр', 23, 1, 2, '', '1'),
(34, 'SC-SE-50', 'Пневмоцилиндр', 23, 1, 2, '', '1'),
(35, 'SC-SE-63', 'Пневмоцилиндр', 23, 1, 2, '', '1'),
(36, 'SC-SE-80', 'Пневмоцилиндр', 23, 1, 0, '', '1'),
(37, 'SC-SE-100 ', 'Пневмоцилиндр', 23, 1, 0, '', '1'),
(38, 'SC-SR/SE-ROD-16', 'Шток', 16, 1, 4, '', ''),
(39, '', 'Серия SE', 21, 1, 0, '', '1'),
(40, 'SE-PIPE-32', 'Гильза', 39, 1, 4, '', '1'),
(41, 'SE-PIPE-40', 'Гильза', 39, 1, 0, '', '1'),
(42, 'SE-PIPE-50', 'Гильза', 39, 1, 4, '', '1'),
(43, 'SE-PIPE-63', 'Гильза', 39, 1, 4, '', '1'),
(44, 'SE-PIPE-80', 'Гильза', 39, 1, 4, '', '1'),
(45, 'SE-PIPE-100', 'Гильза', 39, 1, 4, '', '1'),
(46, 'SC-SE-PIPE-40', 'Гильза', 33, 1, 4, '', '1'),
(49, 'SC-SDA-16', 'Пневмоцилиндр', 47, 1, 0, '', '1'),
(50, 'SC-SDA-20', 'Пневмоцилиндр', 47, 1, 0, '', '1'),
(51, 'SC-SDA-25', 'Пневмоцилиндр', 47, 1, 0, '', '1'),
(52, 'SC-SDA-32', 'Пневмоцилиндр', 47, 1, 0, '', '1'),
(53, 'SC-SDA-40', 'Пневмоцилиндр', 47, 1, 0, '', '1'),
(54, '', 'Серия SDA', 21, 1, 0, '', '1'),
(55, 'SDA-PIPE-12', 'Гильза', 54, 1, 0, '', '1'),
(56, 'SDA-PIPE-16', 'Гильза', 54, 1, 0, '', '1'),
(57, 'SDA-PIPE-20', 'Гильза', 54, 1, 0, '', '1'),
(58, 'SDA-PIPE-25', 'Гильза', 54, 1, 0, '', '1'),
(59, 'SDA-PIPE-32', 'Гильза', 54, 1, 0, '', '1'),
(60, 'SDA-PIPE-40', 'Гильза', 54, 1, 0, '', '1'),
(61, '', 'Серия SDA', 20, 0, 1, '', '1'),
(62, 'SDA-ROD-6', 'Шток', 61, 1, 0, '', '1'),
(63, 'SDA-ROD-8', 'Шток', 61, 1, 0, '', '1'),
(64, 'SDA-ROD-10', 'Шток', 61, 1, 4, '', '1'),
(65, 'SDA-ROD-12', 'Шток', 61, 1, 0, '', '1'),
(66, 'SDA-ROD-16', 'Шток', 61, 1, 0, '', '1'),
(67, 'SDA-ROD-20', 'Шток', 61, 1, 0, '', '1'),
(68, 'SDA-ROD-25', 'Шток', 61, 1, 0, '', '1'),
(69, 'SDA-ROD-32', 'Шток', 61, 1, 4, '', '1'),
(70, 'SDA-ROD-10', 'Шток', 51, 1, 4, '', '1'),
(71, 'SDA-PIPE-25', 'Гильза', 51, 1, 4, '', '1'),
(102, 'SR/SE-ROD-12', 'Шток', 1, 1, 4, '', '1'),
(72, 'SC-RODE-12', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(73, 'SC-RODE-16', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(74, 'SC-RODE-20', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(75, 'SC-RODE-25', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(76, 'SC-RODE-32', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(77, 'SC-RODE-40', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(78, 'SC-RODE-12-B', 'Шток', 24, 1, 4, '', '1'),
(79, 'SC-RODE-16-B', 'Шток', 24, 1, 4, '', '1'),
(80, 'SC-RODE-20-B', 'Шток', 24, 1, 4, '', '1'),
(81, 'SC-RODE-25-B', 'Шток', 24, 1, 4, '', '1'),
(82, 'SC-RODE-32-B', 'Шток', 24, 1, 4, '', '1'),
(83, '', 'Серия SC', 12, 0, 1, '', '1'),
(84, 'SC-SC-32', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(85, 'SC-SC-40', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(86, 'SC-SC-50', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(87, 'SC-SC-63', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(88, 'SC-SC-80', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(89, 'SC-SC-100', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(90, 'SC-SC-125', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(91, 'SC-SC-160', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(92, 'SC-SC-200', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(93, '', 'Серия MAL', 20, 0, 0, '', '1'),
(94, '', 'Серия MS/MA', 20, 0, 0, '', '1'),
(95, '', 'Серия SR', 21, 0, 1, '', '1'),
(96, 'SR-PIPE-32', 'Гильза', 95, 1, 4, '', '1'),
(97, 'SR-PIPE-40', 'Гильза', 2, 1, 4, '', '1'),
(98, 'SR-PIPE-50', 'Гильза', 95, 1, 4, '', '1'),
(99, 'SR-PIPE-63', 'Гильза', 95, 1, 4, '', '1'),
(100, 'SR-PIPE-80', 'Гильза', 95, 1, 4, '', '1'),
(101, 'SR-PIPE-100', 'Гильза', 95, 1, 4, '', '1'),
(103, 'SC-TR-H-6', 'Шпилька 6мм', 1, 4, 4, '', '1'),
(104, 'SR/SE-ROD-16', 'Шток', 2, 1, 4, '', '1'),
(105, 'SC-TR-H-6', 'Шпилька 6мм', 2, 4, 4, '', '1'),
(106, 'SR-PIPE-32', 'Гильза', 1, 1, 4, '', '1'),
(107, '', 'Номера', 10, 1, 0, '', '1'),
(108, '', 'Серия MAL', 12, 0, 1, '', '1'),
(109, 'SC-MAL-16', 'Пневмоцилиндр', 108, 1, 2, '', '1'),
(110, 'SC-MAL-20', 'Пневмоцилиндр', 108, 1, 2, '', '1'),
(111, 'SC-MAL-25', 'Пневмоцилиндр', 108, 1, 4, '', '1'),
(112, 'SC-MAL-32', 'Пневмоцилиндр', 108, 1, 2, '', '1'),
(113, 'SC-MAL-40', 'Пневмоцилиндр', 108, 1, 2, '', '1'),
(114, 'MAL-ROD-6', 'Шток', 93, 1, 4, '', '1'),
(115, 'MAL-ROD-8', 'Шток', 93, 1, 4, '', '1'),
(116, 'MAL-ROD-10', 'Шток', 93, 1, 4, '', '1'),
(117, 'MAL-ROD-12', 'Шток', 93, 1, 4, '', '1'),
(118, 'MAL-ROD-16', 'Шток', 93, 1, 4, '', '1'),
(119, '', 'Серия MAL', 21, 1, 1, '', '1'),
(120, 'MAL-PIPE-16', 'Гильза', 119, 1, 4, '', '1'),
(121, 'MAL-PIPE-20', 'Гильза', 119, 1, 4, '', '1'),
(122, 'MAL-PIPE-25', 'Гильза', 119, 1, 4, '', '1'),
(123, 'MAL-PIPE-32', 'Гильза', 119, 1, 4, '', '1'),
(124, 'MAL-PIPE-40', 'Гильза', 119, 1, 4, '', '1'),
(125, 'MAL-ROD-8', 'Шток', 110, 1, 4, '', '1'),
(126, 'MAL-PIPE-20', 'Гильза', 110, 1, 4, '', '1'),
(127, 'MAL-ROD-6', 'Шток', 109, 1, 4, '', '1'),
(128, 'MAL-PIPE-16', 'Гильза', 109, 1, 4, '', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `product_actions`
--

CREATE TABLE `product_actions` (
  `id` int(11) NOT NULL,
  `symbol` varchar(100) NOT NULL COMMENT 'symbol product',
  `id_action` int(10) NOT NULL,
  `number` tinyint(3) NOT NULL,
  `time_prod` varchar(100) NOT NULL,
  `time_prepar` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `product_actions`
--

INSERT INTO `product_actions` (`id`, `symbol`, `id_action`, `number`, `time_prod`, `time_prepar`, `status`) VALUES
(1, 'SR/SE-ROD-12', 1, 1, '2', '1', '1'),
(2, 'SR/SE-ROD-12', 3, 1, '7', '1', '0'),
(3, 'SC-TR-H-6', 1, 1, '1,5', '1', '1'),
(4, 'SC-TR-H-6', 3, 2, '2,5', '1', '0'),
(5, 'SC-TR-H-6', 3, 2, '2,5', '1', '1'),
(6, 'SR/SE-ROD-12', 3, 2, '7', '1', '0'),
(7, 'SR/SE-ROD-12', 3, 2, '7', '1', '0'),
(8, 'SR/SE-ROD-12', 3, 2, '7', '1', '1'),
(9, 'SR-PIPE-32', 1, 1, '2', '1', '1'),
(10, 'SR-PIPE-32', 2, 2, '10', '1', '1'),
(11, 'SC-SR-32', 6, 1, '19', '', '1'),
(12, 'SR/SE-ROD-12', 4, 3, '5', '1', '1'),
(13, 'MAL-ROD-8', 1, 1, '3', '1', '1'),
(14, 'MAL-ROD-8', 3, 2, '6', '1', '1'),
(15, 'MAL-ROD-8', 2, 3, '10', '1', '1'),
(16, 'MAL-ROD-8', 4, 4, '5', '1', '1'),
(17, 'MAL-PIPE-20', 1, 1, '3', '1', '1'),
(18, 'MAL-PIPE-20', 2, 2, '25', '1', '1'),
(19, 'SC-MAL-16', 6, 1, '19', '', '1'),
(20, 'SC-MAL-20', 6, 1, '19', '1', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `position` int(11) NOT NULL COMMENT 'должность',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `title`, `position`, `status`) VALUES
(1, 'Priymak', '123', 'Владимир', 'Приймак В.', 0, '1'),
(2, 'Logvinov', '12345', 'О', 'Логвинов О.', 1, '1'),
(3, 'Kovbasa', '54321', 'Юрий', 'Ковбаса Ю.', 1, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `user_options`
--

CREATE TABLE `user_options` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_options`
--

INSERT INTO `user_options` (`id`, `name`, `value`, `id_user`, `status`) VALUES
(1, 'default_type_order', '1', 2, '1'),
(2, 'default_product_action', '3', 2, '1'),
(3, 'default_type_order', '1', 3, '1'),
(4, 'default_product_action', '6', 3, '1'),
(5, 'price_worker_hour', '51,14', 2, '1'),
(6, 'price_worker_hour', '51,14', 3, '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_actions`
--
ALTER TABLE `order_actions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_content`
--
ALTER TABLE `order_content`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_positions`
--
ALTER TABLE `order_positions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_actions`
--
ALTER TABLE `product_actions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `user_options`
--
ALTER TABLE `user_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `order_actions`
--
ALTER TABLE `order_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `order_content`
--
ALTER TABLE `order_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `order_positions`
--
ALTER TABLE `order_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT для таблицы `product_actions`
--
ALTER TABLE `product_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user_options`
--
ALTER TABLE `user_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
