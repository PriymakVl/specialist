-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 15 2019 г., 17:48
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
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `id_parent`, `status`) VALUES
(1, 'Производство', 0, '1'),
(2, 'Готовая продукция', 1, '1'),
(3, 'Пневмоцилиндры', 2, '1'),
(4, 'Серия SR', 3, '1'),
(5, 'Серия SE', 3, '1'),
(6, 'Серия SC', 3, '1'),
(7, 'Запчасти', 1, '1'),
(8, 'Штока', 7, '1'),
(9, 'Гильзы', 7, '1'),
(10, 'Шпильки', 7, '1'),
(11, 'Серия SR', 8, '1'),
(12, 'Серия SR', 9, '1');

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
(1, 'SP000000485', 3, 1, '1550479090', '', '1');

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
(1, 33, 4, 1, '1');

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
(1, 1, 'SC-SE-40x200-S', 4, '', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `state_work` tinyint(3) NOT NULL,
  `type_order` int(11) NOT NULL,
  `kind_work` int(11) NOT NULL,
  `qty_all` int(11) NOT NULL,
  `qty_done` int(11) NOT NULL,
  `time_start` varchar(100) NOT NULL,
  `time_end` varchar(100) NOT NULL,
  `time_plan` varchar(100) NOT NULL COMMENT 'трудоемкость',
  `id_worker` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `id_order`, `id_prod`, `state_work`, `type_order`, `kind_work`, `qty_all`, `qty_done`, `time_start`, `time_end`, `time_plan`, `id_worker`, `status`) VALUES
(1, 1, 33, 1, 1, 3, 4, 0, '1550231966', '1550231970', '5820', 3, '1'),
(2, 1, 38, 1, 1, 2, 4, 0, '1550230281', '1550230290', '2460', 2, '1'),
(3, 1, 46, 1, 1, 2, 4, 0, '', '', '1500', 0, '1');

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
(5, 'SC-SR/SE-ROD-12', 'Шток', 16, 1, 4, 'SE', '1'),
(6, 'SC-SR/SE-ROD-16', 'Шток', 16, 1, 4, '', '1'),
(7, 'SC-SR-PIPE-32', 'Гильза', 1, 1, 4, '', '1'),
(8, 'SC-SR-PIPE-40', 'Гильза', 2, 1, 4, '', '1'),
(9, '', 'Производство', 0, 0, 1, '', '1'),
(10, '', 'Готовая продукция', 9, 0, 1, '', '1'),
(11, '', 'Узлы и детали', 9, 0, 1, '', '1'),
(12, '', 'Пневмоцилиндры', 10, 0, 1, 'готовая продукция', '1'),
(13, '', 'Пневмоцилиндры', 11, 0, 1, 'запчасти', '1'),
(14, '', 'Серия SR', 12, 0, 1, 'пневмоцилиндры', '1'),
(15, 'SC-SR/SE-ROD-20', 'Шток', 16, 1, 4, '', '1'),
(16, '', 'Серия SR', 20, 0, 1, 'запчасти', '1'),
(17, 'SC-SR/SE-ROD-25', 'Шток', 16, 1, 4, '', '1'),
(18, 'SC-SR/SE-ROD-32', 'Шток', 16, 1, 4, '', '1'),
(19, 'SC-SR/SE-ROD-40', 'Шток', 16, 1, 4, '', '1'),
(20, '', 'Штока', 13, 0, 1, 'запчасти', '1'),
(21, '', 'Гильзы', 13, 0, 1, '', '1'),
(22, '', 'Шпильки', 13, 0, 1, '', '1'),
(23, '', 'Серия SE', 12, 0, 1, '', '1'),
(24, '', 'Серия SC', 12, 0, 1, '', '1'),
(25, 'SC-TR-H-6', 'Шпилька 6мм', 1, 4, 4, '', ''),
(26, 'SC-TR-H-8', 'Шпилька 8мм', 22, 1, 4, '', '1'),
(27, 'SC-TR-H-10', 'Шпилька 10мм', 22, 1, 4, '', '1'),
(28, 'SC-TR-H-12', 'Шпилька 12мм', 22, 1, 4, '', '1'),
(29, 'SC-TR-H-16', 'Шпилька 16мм', 22, 1, 4, '', '1'),
(30, 'SC-SR/SE-ROD-12', 'Шток', 16, 1, 4, 'SE', '1'),
(31, 'SC-TR-H-6', 'Шпилька 6мм', 1, 4, 4, '', '1'),
(32, 'SC-SE-32', 'Пневмоцилиндр', 23, 1, 2, '', '1'),
(33, 'SC-SE-40', 'Пневмоцилиндр', 23, 1, 2, '', '1'),
(34, 'SC-SE-50', 'Пневмоцилиндр', 23, 1, 2, '', '1'),
(35, 'SC-SE-63', 'Пневмоцилиндр', 23, 1, 2, '', '1'),
(36, 'SC-SE-80', 'Пневмоцилиндр', 23, 1, 0, '', '1'),
(37, 'SC-SE-100 ', 'Пневмоцилиндр', 23, 1, 0, '', '1'),
(38, 'SC-SR/SE-ROD-16', 'Шток', 33, 1, 4, '', '1'),
(39, '', 'Серия SE', 21, 1, 0, '', '1'),
(40, 'SC-SE-PIPE-32', 'Гильза', 39, 1, 0, '', '1'),
(41, 'SC-SE-PIPE-40', 'Гильза', 39, 1, 0, '', '1'),
(42, 'SC-SE-PIPE-50', 'Гильза', 39, 1, 0, '', '1'),
(43, 'SC-SE-PIPE-63', 'Гильза', 39, 1, 0, '', '1'),
(44, 'SC-SE-PIPE-80', 'Гильза', 39, 1, 0, '', '1'),
(45, 'SC-SE-PIPE-100', 'Гильза', 39, 1, 0, '', '1'),
(46, 'SC-SE-PIPE-40', 'Гильза', 33, 1, 4, '', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `product_action`
--

CREATE TABLE `product_action` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_action`
--

INSERT INTO `product_action` (`id`, `name`, `status`) VALUES
(1, 'Порезка пц', '1'),
(2, 'Обработка пц', '1'),
(3, 'Сборка пц', '1'),
(4, 'Запресовка пц', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `product_times`
--

CREATE TABLE `product_times` (
  `id` int(11) NOT NULL,
  `symbol` varchar(100) NOT NULL COMMENT 'product',
  `id_action` int(11) NOT NULL,
  `time_prod` varchar(100) NOT NULL COMMENT 'production',
  `time_prepar` varchar(100) NOT NULL COMMENT 'preparation',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_times`
--

INSERT INTO `product_times` (`id`, `symbol`, `id_action`, `time_prod`, `time_prepar`, `status`) VALUES
(1, 'SR-ROD-12', 2, '300', '60', '1'),
(2, 'SR-PIPE-32', 2, '420', '60', '1');

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
(2, 'default_kind_work', '2', 2, '1'),
(3, 'default_type_order', '1', 3, '1'),
(4, 'default_kind_work', '3', 3, '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
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
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_action`
--
ALTER TABLE `product_action`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_times`
--
ALTER TABLE `product_times`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `symbol` (`symbol`);

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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `order_content`
--
ALTER TABLE `order_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `order_positions`
--
ALTER TABLE `order_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `product_action`
--
ALTER TABLE `product_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `product_times`
--
ALTER TABLE `product_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user_options`
--
ALTER TABLE `user_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
