-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 04 2019 г., 21:38
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

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
(1, 12, 199, 0, 2, 2, 'SA-CU', 'Блок подготовки воздуха', 'Проверка блока', '1551706434', '1551705921', '15', 2, '', '1'),
(2, 12, 0, 0, 0, 1, '', 'Блок', 'ремонт', '', '', '10', 0, '', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `order_action_unplan`
--
ALTER TABLE `order_action_unplan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `order_action_unplan`
--
ALTER TABLE `order_action_unplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
