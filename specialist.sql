-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 04 2019 г., 17:57
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
(6, 'Сборочные операции', '1'),
(7, 'Закатка цилиндра', '1');

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
(1, 'PN000000196', 3, 1, '1551375114', '', '1'),
(2, 'PN000000619', 3, 1, '1551375201', '', '1'),
(3, 'SP000000198', 3, 1, '1551375270', '', '1'),
(4, 'SP000000648', 4, 1, '1551375369', '', '1'),
(5, 'SP000000582', 3, 1, '1551375455', '', '1'),
(6, 'PN000000163', 3, 1, '1551375778', '', '1'),
(7, 'SP000000505', 3, 1, '1551375881', '', '1'),
(8, 'SP000000599', 3, 1, '1551375955', '', '1'),
(9, 'PN000000212', 3, 1, '1551341268', '', '1'),
(10, 'SP000000609', 3, 1, '1551339100', '', '1'),
(11, 'SP000000658', 3, 1, '1551339323', '', '1'),
(12, 'SP000000655', 3, 1, '1551339635', '', '1');

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
(1, 1, 50, 6, 2, 2, 1, '1551703997', '', '38', 2, '1'),
(2, 1, 138, 1, 2, 1, 1, '', '', '7', 0, '1'),
(3, 1, 138, 2, 2, 2, 1, '1551703879', '', '41', 2, '1'),
(4, 1, 138, 4, 2, 2, 1, '1551703665', '1551334615', '11', 2, '1'),
(5, 1, 139, 1, 2, 4, 1, '1551334675', '1551334679', '7', 2, '1'),
(6, 1, 139, 2, 2, 1, 1, '', '', '61', 0, '1'),
(7, 1, 139, 5, 2, 1, 1, '', '', '40', 0, '1'),
(8, 2, 145, 6, 2, 1, 1, '', '', '38', 0, '0'),
(9, 2, 170, 1, 2, 1, 1, '', '', '7', 0, '1'),
(10, 2, 170, 3, 2, 1, 1, '', '', '15', 0, '1'),
(11, 2, 170, 2, 2, 1, 1, '', '', '29', 0, '0'),
(12, 2, 170, 4, 2, 2, 1, '1551335625', '1551335647', '13', 3, '1'),
(13, 2, 171, 1, 2, 3, 1, '1551707879', '', '7', 2, '1'),
(14, 2, 171, 2, 2, 4, 1, '1551335996', '1551336913', '37', 2, '1'),
(15, 2, 171, 5, 2, 2, 1, '1551344501', '', '48', 3, '1'),
(16, 4, 172, 6, 1, 4, 1, '', '', '19', 0, '1'),
(17, 4, 175, 1, 1, 4, 1, '', '', '4', 0, '1'),
(18, 4, 175, 4, 1, 4, 1, '', '', '7', 0, '1'),
(19, 4, 175, 3, 1, 4, 1, '', '', '11', 0, '0'),
(20, 4, 176, 1, 1, 4, 1, '', '', '4', 0, '0'),
(21, 4, 176, 2, 1, 4, 1, '', '', '13', 0, '0'),
(22, 4, 177, 1, 1, 4, 1, '', '', '3', 0, '0'),
(23, 4, 177, 3, 1, 4, 1, '', '', '4', 0, '0'),
(24, 6, 143, 6, 3, 1, 1, '', '', '57', 0, '1'),
(25, 6, 178, 1, 3, 4, 1, '1551340503', '1551340598', '10', 3, '1'),
(26, 6, 178, 3, 3, 1, 1, '', '', '19', 0, '1'),
(27, 6, 178, 2, 3, 1, 1, '', '', '22', 0, '1'),
(28, 6, 178, 4, 3, 2, 1, '1551707639', '', '16', 2, '1'),
(29, 6, 179, 1, 3, 1, 1, '', '', '10', 0, '1'),
(30, 6, 179, 2, 3, 1, 1, '', '', '46', 0, '1'),
(31, 6, 179, 5, 3, 1, 1, '', '', '60', 0, '1'),
(32, 7, 4, 6, 2, 1, 1, '', '', '38', 0, '1'),
(33, 7, 180, 1, 2, 4, 1, '1551344204', '1551344376', '7', 3, '1'),
(34, 7, 180, 2, 2, 1, 1, '', '', '15', 0, '1'),
(35, 7, 180, 4, 2, 1, 1, '', '', '11', 0, '1'),
(36, 7, 181, 1, 2, 4, 1, '1551344266', '1551344390', '7', 3, '1'),
(37, 7, 181, 2, 2, 1, 1, '', '', '21', 0, '1'),
(38, 7, 182, 1, 8, 4, 1, '1551344269', '1551344386', '17', 3, '1'),
(39, 7, 182, 3, 8, 1, 1, '', '', '21', 0, '1'),
(40, 8, 4, 6, 1, 1, 1, '', '', '19', 0, '1'),
(41, 8, 180, 1, 1, 1, 1, '', '', '4', 0, '1'),
(42, 8, 180, 2, 1, 1, 1, '', '', '8', 0, '1'),
(43, 8, 180, 4, 1, 1, 1, '', '', '6', 0, '1'),
(44, 8, 181, 1, 1, 1, 1, '', '', '4', 0, '1'),
(45, 8, 181, 2, 1, 1, 1, '', '', '11', 0, '1'),
(46, 8, 182, 1, 4, 1, 1, '', '', '9', 0, '1'),
(47, 8, 182, 3, 4, 1, 1, '', '', '11', 0, '1'),
(48, 3, 185, 6, 1, 1, 1, '', '', '15', 0, '1'),
(49, 5, 172, 6, 1, 1, 1, '', '', '19', 0, '1'),
(50, 5, 172, 6, 2, 1, 1, '', '', '38', 0, '1'),
(51, 5, 112, 6, 1, 1, 1, '', '', '19', 0, '1'),
(52, 5, 113, 6, 1, 1, 1, '', '', '19', 0, '1'),
(53, 5, 175, 1, 1, 1, 1, '', '', '4', 0, '1'),
(54, 5, 175, 4, 1, 1, 1, '', '', '7', 0, '1'),
(55, 5, 175, 3, 1, 1, 1, '', '', '11', 0, '1'),
(56, 5, 176, 1, 1, 1, 1, '', '', '4', 0, '1'),
(57, 5, 176, 2, 1, 4, 1, '1551338980', '1551339007', '13', 2, '1'),
(58, 5, 177, 1, 1, 1, 1, '', '', '3', 0, '1'),
(59, 5, 177, 3, 1, 1, 1, '', '', '4', 0, '1'),
(60, 5, 175, 1, 2, 1, 1, '', '', '7', 0, '1'),
(61, 5, 175, 4, 2, 1, 1, '', '', '13', 0, '1'),
(62, 5, 175, 3, 2, 1, 1, '', '', '21', 0, '1'),
(63, 5, 176, 1, 2, 1, 1, '', '', '7', 0, '1'),
(64, 5, 176, 2, 2, 4, 1, '1551338980', '1551339007', '25', 2, '1'),
(65, 5, 177, 1, 2, 1, 1, '', '', '5', 0, '1'),
(66, 5, 177, 3, 2, 1, 1, '', '', '7', 0, '1'),
(67, 5, 183, 1, 1, 4, 1, '1551340552', '1551340603', '4', 3, '1'),
(68, 5, 183, 3, 1, 1, 1, '', '', '7', 0, '1'),
(69, 5, 183, 2, 1, 1, 1, '', '', '11', 0, '1'),
(70, 5, 183, 4, 1, 1, 1, '', '', '6', 0, '1'),
(71, 5, 184, 1, 1, 4, 1, '1551340574', '1551340611', '4', 3, '1'),
(72, 5, 184, 2, 1, 1, 1, '', '', '26', 0, '1'),
(73, 5, 129, 1, 1, 4, 1, '1551340581', '1551340615', '4', 3, '1'),
(74, 5, 129, 3, 1, 1, 1, '', '', '8', 0, '1'),
(75, 5, 129, 2, 1, 1, 1, '', '', '11', 0, '1'),
(76, 5, 129, 4, 1, 1, 1, '', '', '6', 0, '1'),
(77, 5, 130, 1, 1, 4, 1, '1551340591', '1551340619', '4', 3, '1'),
(78, 5, 130, 2, 1, 1, 1, '', '', '26', 0, '1'),
(79, 11, 90, 6, 2, 2, 1, '', '', '44', 0, '0'),
(80, 11, 90, 6, 2, 1, 1, '', '', '44', 0, '1'),
(81, 11, 198, 1, 1, 4, 1, '1551344343', '1551344393', '4', 3, '1'),
(82, 11, 198, 2, 1, 2, 1, '', '', '13', 0, '1'),
(83, 11, 75, 1, 1, 1, 1, '', '', '4', 0, '1'),
(84, 11, 75, 3, 1, 1, 1, '', '', '9', 0, '1'),
(85, 11, 75, 2, 1, 1, 1, '', '', '13', 0, '1'),
(86, 11, 75, 4, 1, 1, 1, '', '', '7', 0, '1'),
(87, 11, 186, 1, 2, 4, 1, '1551344364', '1551344398', '7', 3, '1'),
(88, 11, 186, 3, 2, 1, 1, '', '', '17', 0, '1'),
(89, 11, 186, 2, 2, 1, 1, '', '', '25', 0, '1'),
(90, 11, 186, 4, 2, 1, 1, '', '', '13', 0, '1'),
(91, 11, 196, 1, 2, 4, 1, '1551344353', '1551344401', '7', 3, '1'),
(92, 11, 196, 2, 2, 1, 1, '', '', '25', 0, '1'),
(93, 11, 197, 1, 8, 4, 1, '1551344367', '1551344404', '17', 3, '1'),
(94, 11, 197, 3, 8, 1, 1, '', '', '21', 0, '1'),
(95, 11, 186, 1, 2, 4, 1, '1551344364', '1551344398', '7', 3, '1'),
(96, 11, 186, 3, 2, 1, 1, '', '', '17', 0, '1'),
(97, 11, 186, 2, 2, 1, 1, '', '', '25', 0, '1'),
(98, 11, 186, 4, 2, 1, 1, '', '', '13', 0, '1'),
(99, 11, 196, 1, 2, 4, 1, '1551344353', '1551344401', '7', 3, '1'),
(100, 11, 196, 2, 2, 1, 1, '', '', '25', 0, '1'),
(101, 11, 197, 1, 8, 4, 1, '1551344367', '1551344404', '17', 3, '1'),
(102, 11, 197, 3, 8, 1, 1, '', '', '21', 0, '1'),
(103, 12, 199, 6, 1, 1, 1, '', '', '10', 0, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `order_action_states`
--

CREATE TABLE `order_action_states` (
  `id` int(11) NOT NULL,
  `id_action` int(11) NOT NULL COMMENT 'order action',
  `state` tinyint(3) NOT NULL,
  `time` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `order_action_unplan`
--

CREATE TABLE `order_action_unplan` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_prod` int(11) DEFAULT NULL,
  `id_action` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `state` tinyint(3) NOT NULL,
  `prod_symbol` varchar(100) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `action_name` varchar(255) NOT NULL,
  `time_start` varchar(100) NOT NULL,
  `time_end` varchar(100) NOT NULL,
  `time_manufac` varchar(100) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `note` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_action_unplan`
--

INSERT INTO `order_action_unplan` (`id`, `id_order`, `id_prod`, `id_action`, `qty`, `state`, `prod_symbol`, `prod_name`, `action_name`, `time_start`, `time_end`, `time_manufac`, `id_worker`, `note`, `status`) VALUES
(1, 12, 199, 0, 2, 2, 'SA-CU', 'Блок подготовки воздуха', 'Проверка блока', '1551706434', '1551705921', '15', 2, '', '1');

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
(1, 50, 2, 1, '1'),
(2, 145, 2, 2, '1'),
(3, 172, 1, 4, '1'),
(4, 143, 3, 6, '1'),
(5, 4, 2, 7, '1'),
(6, 4, 1, 8, '1'),
(7, 185, 1, 3, '1'),
(8, 172, 1, 5, '1'),
(9, 172, 2, 5, '1'),
(10, 112, 1, 5, '1'),
(11, 113, 1, 5, '1'),
(12, 90, 2, 11, '1'),
(13, 90, 2, 11, '1'),
(14, 198, 1, 11, '1'),
(15, 75, 1, 11, '1'),
(16, 199, 1, 12, '1');

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
(1, 1, 'SC-SDA-20x20-B', 2, '', '1'),
(2, 2, 'SC-ADV-32x15-S', 2, '', '1'),
(3, 3, 'SCBV-Q611-16FC-15-RAT032-ITS100', 8, '', '1'),
(4, 4, 'SC-SWR-80X400-S', 1, '', '1'),
(5, 5, 'SC-SE/SR-TC-80-U', 3, 'Переделать под SR цилиндр(+ фрезеровка)', '1'),
(6, 5, 'SC-SE/SR-TCB-80-U', 3, '3 пары по чертежу SE', '1'),
(7, 5, 'SC-MAL-CM-32x40-S', 1, '', '1'),
(8, 5, 'SC-MAL-CM-40x60-S', 1, '', '1'),
(9, 5, 'SC-SR-80x250-S', 1, '', '1'),
(10, 5, 'SC-SR-80x250-S', 2, '', '1'),
(11, 6, 'SC-ADV-20x5-S', 3, 'Сделать 3штока с наружной резьбой, для этих цилиндров', '1'),
(12, 7, 'SC-SR-63x80-S', 2, '', '1'),
(13, 8, 'SC-SR-63x80-S', 1, '', '1'),
(14, 9, 'SF-Z2520 1/8-M5-U', 20, 'Материал сталь по чертежу', '1'),
(15, 10, '20x30x10,4K51 PU', 8, 'Ущильнення', '1'),
(16, 10, '100x88x8.5 K50 PU', 8, 'Манжета пневматична', '1'),
(17, 11, 'SC-SC-125x160-S', 2, '', '1'),
(18, 11, 'SC-SC-125x250-S', 2, '', '1'),
(19, 11, 'SC-SR-PIPE-125x200', 1, 'SC-SC-125x160-S под него', '1'),
(20, 11, 'SC-SC-KITS-125-PISTON-S', 1, 'SC-SC-125x160-S под него', '1'),
(21, 11, 'SC-ROD-25-C01', 1, 'Шток под SC-SC-125x160-S + гайка', '1'),
(22, 12, 'SA-CU40-15', 8, '', '1');

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
(50, 'SC-SDA-20', 'Пневмоцилиндр', 47, 1, 2, '', '1'),
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
(72, 'SC-ROD-12', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(73, 'SC-ROD-16', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(74, 'SC-ROD-20', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(75, 'SC-ROD-25', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(76, 'SC-ROD-32', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(77, 'SC-ROD-40', 'Шток', 24, 1, 4, 'Внутр. резьба', '1'),
(78, 'SC-ROD-12-B', 'Шток', 24, 1, 4, '', '1'),
(79, 'SC-ROD-16-B', 'Шток', 24, 1, 4, '', '1'),
(80, 'SC-ROD-20-B', 'Шток', 24, 1, 4, '', '1'),
(81, 'SC-ROD-25-B', 'Шток', 24, 1, 4, '', '1'),
(82, 'SC-ROD-32-B', 'Шток', 24, 1, 4, '', '1'),
(83, '', 'Серия SC', 12, 0, 1, '', '1'),
(84, 'SC-SC-32', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(85, 'SC-SC-40', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(86, 'SC-SC-50', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(87, 'SC-SC-63', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(88, 'SC-SC-80', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(89, 'SC-SC-100', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(90, 'SC-SC-125', 'Пневмоцилиндр', 83, 1, 2, '', '1'),
(91, 'SC-SC-160', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(92, 'SC-SC-200', 'Пневмоцилиндр', 83, 1, 0, '', '1'),
(93, '', 'Серия MAL', 20, 0, 0, '', '1'),
(94, '', 'Серия MA', 20, 0, 4, '', '1'),
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
(107, '', 'Разное цилиндры', 10, 1, 1, '', '1'),
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
(128, 'MAL-PIPE-16', 'Гильза', 109, 1, 4, '', '1'),
(129, 'MAL-ROD-16', 'Шток', 113, 1, 4, '', '1'),
(130, 'MAL-PIPE-40', 'Гильза', 113, 1, 4, '', '1'),
(131, '', 'Серия MA/MS', 12, 1, 1, '', '1'),
(132, 'SC-MA-10', 'Пневмоцилиндр', 131, 1, 2, '', '1'),
(133, 'MA-ROD-6', 'Шток', 94, 1, 4, '', '1'),
(134, 'MA/MS-ROD-6', 'Шток', 132, 1, 4, '', '1'),
(135, '', 'Серия MS/MA', 21, 1, 4, '', '1'),
(136, 'MS/MA-PIPE-10', 'Гильза', 135, 1, 4, '', '1'),
(137, 'MS/MA-PIPE-10', 'Гильза', 132, 1, 4, '', '1'),
(138, 'SDA-ROD-8', 'Шток', 50, 1, 4, '', '1'),
(139, 'SDA-PIPE-20', 'Гильза', 50, 1, 4, '', '1'),
(140, '', 'Серия ADV', 12, 0, 1, '', '1'),
(141, 'SC-ADV-12', 'Пневмоцилиндр', 140, 1, 2, '', '1'),
(142, 'SC-ADV-16', 'Пневмоцилиндр', 140, 1, 2, '', '1'),
(143, 'SC-ADV-20', 'Пневмоцилиндр', 140, 1, 2, '', '1'),
(144, 'SC-ADV-25', 'Пневмоцилиндр', 140, 1, 2, '', '1'),
(145, 'SC-ADV-32', 'Пневмоцилиндр', 140, 1, 2, '', '1'),
(146, 'SC-ADV-40', 'Пневмоцилиндр', 140, 1, 2, '', '1'),
(147, 'SC-ADV-50', 'Пневмоцилиндр', 140, 1, 2, '', '1'),
(148, 'SC-ADV-60', 'Пневмоцилиндр', 140, 1, 2, '', '1'),
(149, 'SC-ADV-80', 'Пневмоцилиндр', 140, 1, 2, '', '1'),
(150, 'SC-ADV-100', 'Пневмоцилиндр', 140, 1, 2, '', '1'),
(151, '', 'Серия ADV', 20, 1, 1, '', '1'),
(152, 'ADV-ROD-6', 'Шток', 151, 1, 4, '', '1'),
(153, 'ADV-ROD-8', 'Шток', 151, 1, 4, '', '1'),
(154, 'ADV-ROD-10', 'Шток', 151, 1, 4, '', '1'),
(155, 'ADV-ROD-12', 'Шток', 151, 1, 4, '', '1'),
(156, 'ADV-ROD-16', 'Шток', 151, 1, 4, '', '1'),
(157, 'ADV-ROD-20', 'Шток', 151, 1, 4, '', '1'),
(158, 'ADV-ROD-25', 'Шток', 151, 1, 4, '', '1'),
(159, '', 'Серия ADV', 21, 1, 1, '', '1'),
(160, 'ADV-PIPE-12', 'Гильза', 159, 1, 4, '', '1'),
(161, 'ADV-PIPE-16', 'Гильза', 159, 1, 4, '', '1'),
(162, 'ADV-PIPE-20', 'Гильза', 159, 1, 4, '', '1'),
(163, 'ADV-PIPE-25', 'Гильза', 159, 1, 4, '', '1'),
(164, 'ADV-PIPE-32', 'Гильза', 159, 1, 4, '', '1'),
(165, 'ADV-PIPE-40', 'Гильза', 159, 1, 4, '', '1'),
(166, 'ADV-PIPE-50', 'Гильза', 159, 1, 4, '', '1'),
(167, 'ADV-PIPE-63', 'Гильза', 159, 1, 4, '', '1'),
(168, 'ADV-PIPE-80', 'Гильза', 159, 1, 4, '', '1'),
(169, 'ADV-PIPE-100', 'Гильза', 159, 1, 4, '', '1'),
(170, 'ADV-ROD-12', 'Шток', 145, 1, 4, '', '1'),
(171, 'ADV-PIPE-32', 'Гильза', 145, 1, 4, '', '1'),
(172, 'SC-SR-80', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(173, 'SC-SR-100', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(174, 'SC-SR-125', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(175, 'SR/SE-ROD-25', 'Шток', 172, 1, 4, '', '1'),
(176, 'SR-PIPE-80', 'Гильза', 172, 1, 4, '', '1'),
(177, 'SC-TR-H-10', 'Шпилька 10мм', 172, 1, 4, '', '1'),
(178, 'ADV-ROD-10', 'Шток', 143, 1, 4, '', '1'),
(179, 'ADV-PIPE-20', 'Гильза', 143, 1, 4, '', '1'),
(180, 'SR/SE-ROD-20', 'Шток', 4, 1, 4, '', '1'),
(181, 'SR-PIPE-63', 'Гильза', 4, 1, 4, '', '1'),
(182, 'SC-TR-H-8', 'Шпилька 8мм', 4, 4, 4, '', '1'),
(183, 'MAL-ROD-12', 'Шток', 112, 1, 4, '', '1'),
(184, 'MAL-PIPE-32', 'Гильза', 112, 1, 4, '', '1'),
(185, 'RAT', 'Задвижка', 107, 1, 4, '', '1'),
(186, 'SC-ROD-32', 'Шток', 90, 1, 4, 'Внутр. резьба', '1'),
(187, '', 'Серия SC', 21, 1, 1, '', '1'),
(188, 'SC-PIPE-40', 'Гильза', 187, 1, 4, '', '1'),
(189, 'SC-PIPE-50', 'Гильза', 187, 1, 4, '', '1'),
(190, 'SC-PIPE-63', 'Гильза', 187, 1, 4, '', '1'),
(191, 'SC-PIPE-80', 'Гильза', 187, 1, 4, '', '1'),
(192, 'SC-PIPE-100', 'Гильза', 187, 1, 4, '', '1'),
(193, 'SC-PIPE-125', 'Гильза', 187, 1, 4, '', '1'),
(194, 'SC-PIPE-160', 'Гильза', 187, 1, 4, '', '1'),
(195, 'SC-PIPE-200', 'Гильза', 187, 1, 4, '', '1'),
(196, 'SC-PIPE-125', 'Гильза', 90, 1, 4, '', '1'),
(197, 'SC-TR-H-12', 'Шпилька 12мм', 90, 4, 4, '', '1'),
(198, 'SR-PIPE-125', 'Гильза', 95, 1, 4, '', '1'),
(199, 'SA-CU', 'Блок подготовки воздуха', 107, 1, 2, '', '1');

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
(20, 'SC-MAL-20', 6, 1, '19', '1', '1'),
(21, 'MAL-ROD-16', 1, 1, '3', '1', '1'),
(22, 'MAL-ROD-16', 3, 2, '7', '1', '1'),
(23, 'MAL-ROD-16', 2, 3, '10', '1', '1'),
(24, 'MAL-ROD-16', 4, 4, '5', '1', '1'),
(25, 'MAL-PIPE-40', 1, 1, '3', '1', '1'),
(26, 'MAL-PIPE-40', 2, 2, '25', '1', '1'),
(27, 'SC-MAL-40', 6, 1, '19', '', '1'),
(28, 'MA/MS-ROD-6', 1, 1, '3', '1', '1'),
(29, 'MA/MS-ROD-6', 3, 1, '6', '1', '1'),
(30, 'MS/MA-PIPE-10', 1, 1, '3', '1', '1'),
(31, 'MS/MA-PIPE-10', 2, 1, '8', '1', '1'),
(32, 'SC-MA-10', 6, 1, '12', '', '1'),
(33, 'SDA-ROD-8', 1, 1, '3', '1', '1'),
(34, 'SDA-ROD-8', 2, 2, '20', '1', '1'),
(35, 'SDA-ROD-8', 4, 2, '5', '1', '1'),
(36, 'SDA-PIPE-20', 1, 1, '3', '1', '1'),
(37, 'SDA-PIPE-20', 2, 2, '30', '1', '1'),
(38, 'SDA-PIPE-20', 5, 3, '20', '', '1'),
(39, 'SC-SDA-20', 6, 1, '19', '', '1'),
(40, 'ADV-ROD-12', 1, 1, '3', '1', '1'),
(41, 'ADV-ROD-12', 3, 2, '7', '1', '1'),
(42, 'ADV-ROD-12', 2, 3, '14', '1', '1'),
(43, 'ADV-ROD-12', 4, 4, '6', '1', '1'),
(44, 'ADV-PIPE-32', 1, 1, '3', '1', '1'),
(45, 'ADV-PIPE-32', 2, 2, '18', '1', '1'),
(46, 'ADV-PIPE-32', 5, 3, '24', '', '1'),
(47, 'SC-ADV-32', 6, 1, '19', '', '1'),
(48, 'SC-SR-80', 6, 1, '19', '', '1'),
(49, 'SR/SE-ROD-25', 1, 1, '3', '1', '1'),
(50, 'SR/SE-ROD-25', 3, 2, '10', '1', '1'),
(51, 'SR/SE-ROD-25', 4, 1, '6', '1', '1'),
(52, 'SR-PIPE-80', 1, 1, '3', '1', '1'),
(53, 'SR-PIPE-80', 2, 1, '12', '1', '1'),
(54, 'SC-TR-H-10', 1, 1, '2', '1', '1'),
(55, 'SC-TR-H-10', 3, 2, '3', '1', '1'),
(56, 'SC-ADV-20', 6, 1, '19', '', '1'),
(57, 'ADV-ROD-10', 1, 1, '3', '1', '1'),
(58, 'ADV-ROD-10', 3, 2, '6', '1', '1'),
(59, 'ADV-ROD-10', 2, 3, '7', '1', '1'),
(60, 'ADV-ROD-10', 4, 4, '5', '1', '1'),
(61, 'ADV-PIPE-20', 1, 1, '3', '1', '1'),
(62, 'ADV-PIPE-20', 2, 2, '15', '1', '1'),
(63, 'ADV-PIPE-20', 5, 3, '20', '', '1'),
(64, 'SC-SR-63', 6, 1, '19', '', '1'),
(65, 'SR/SE-ROD-20', 1, 1, '3', '1', '1'),
(66, 'SR/SE-ROD-20', 2, 2, '7', '1', '1'),
(67, 'SR/SE-ROD-20', 4, 3, '5', '1', '1'),
(68, 'SR-PIPE-63', 1, 1, '3', '1', '1'),
(69, 'SR-PIPE-63', 2, 2, '10', '1', '1'),
(70, 'SR-PIPE-63', 4, 3, '5', '1', '0'),
(71, 'SC-TR-H-8', 1, 1, '2', '1', '1'),
(72, 'SC-TR-H-8', 3, 2, '2.5', '1', '1'),
(73, 'SC-MAL-32', 6, 1, '19', '', '1'),
(74, 'MAL-ROD-12', 1, 1, '3', '1', '1'),
(75, 'MAL-ROD-12', 3, 2, '6', '1', '1'),
(76, 'MAL-ROD-12', 2, 2, '10', '1', '1'),
(77, 'MAL-ROD-12', 4, 4, '5', '1', '1'),
(78, 'MAL-PIPE-32', 1, 1, '3', '1', '1'),
(79, 'MAL-PIPE-32', 2, 2, '25', '1', '1'),
(80, 'RAT', 6, 1, '15', '', '1'),
(81, 'SC-SC-125', 6, 1, '22', '', '1'),
(82, 'SC-ROD-32', 1, 1, '3', '1', '1'),
(83, 'SC-ROD-32', 3, 2, '8', '1', '1'),
(84, 'SC-ROD-32', 2, 3, '12', '1', '1'),
(85, 'SC-ROD-32', 4, 4, '6', '1', '1'),
(86, 'SC-PIPE-125', 1, 1, '3', '1', '1'),
(87, 'SC-PIPE-125', 2, 2, '12', '1', '1'),
(88, 'SC-TR-H-12', 1, 1, '2', '1', '1'),
(89, 'SC-TR-H-12', 3, 2, '2.5', '1', '1'),
(90, 'SR-PIPE-125', 1, 1, '3', '1', '1'),
(91, 'SR-PIPE-125', 2, 2, '12', '1', '1'),
(92, 'SC-ROD-25', 1, 1, '3', '1', '1'),
(93, 'SC-ROD-25', 3, 2, '8', '1', '1'),
(94, 'SC-ROD-25', 2, 3, '12', '1', '1'),
(95, 'SC-ROD-25', 4, 4, '6', '1', '1'),
(96, 'SA-CU', 6, 1, '10', '', '1');

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
(3, 'Kovbasa', '54321', 'Юрий', 'Ковбаса Ю.', 1, '1'),
(4, '0312', '031289', 'Владислав', 'Земляной В.', 0, '1');

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
-- Индексы таблицы `order_action_states`
--
ALTER TABLE `order_action_states`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_action_unplan`
--
ALTER TABLE `order_action_unplan`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `order_actions`
--
ALTER TABLE `order_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT для таблицы `order_action_states`
--
ALTER TABLE `order_action_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `order_action_unplan`
--
ALTER TABLE `order_action_unplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `order_content`
--
ALTER TABLE `order_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `order_positions`
--
ALTER TABLE `order_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT для таблицы `product_actions`
--
ALTER TABLE `product_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user_options`
--
ALTER TABLE `user_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
