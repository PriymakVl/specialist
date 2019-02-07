-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 07 2019 г., 17:52
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
  `description` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `date_exec` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `symbol`, `description`, `state`, `type`, `date_exec`, `note`, `status`) VALUES
(1, 'SP000000216', 'SC-SR-32x20-S', 3, 1, '', 'note', '1'),
(2, 'SP000000213', 'SC-SR-PIPE-160x300', 1, 1, '', 'note order 2', '1'),
(3, '003', 'order 003', 1, 1, '1549008433', 'note order 003', '1'),
(4, '004', 'descr order 004', 1, 1, '1549786150', 'order note', '1'),
(5, '005', 'пневмоциил', 1, 1, '1549178148', 'примечание', '1');

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
(1, 1, 3, 1, '1');

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
  `id_worker` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `id_order`, `id_prod`, `state_work`, `type_order`, `kind_work`, `qty_all`, `qty_done`, `time_start`, `time_end`, `id_worker`, `status`) VALUES
(1, 1, 1, 1, 1, 3, 3, 0, '', '', 0, '1'),
(2, 1, 5, 4, 1, 2, 3, 0, '1549540485', '1549540495', 2, '1'),
(3, 1, 7, 4, 1, 2, 3, 0, '1549540504', '1549540687', 2, '1');

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
(1, 'SR-32', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(2, 'SR-40', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(3, 'SR-50', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(4, 'SR-63', 'Пневмоцилиндр', 14, 1, 2, '', '1'),
(5, 'SR-ROD-12', 'Шток', 1, 1, 4, '', '1'),
(6, 'SR-ROD-16', 'Шток', 2, 1, 4, '', '1'),
(7, 'SR-PIPE-32', 'Гильза', 1, 1, 4, '', '1'),
(8, 'SR-PIPE-40', 'Гильза', 2, 1, 4, '', '1'),
(9, '', 'Производство', 0, 0, 1, '', '1'),
(10, '', 'Готовая продукция', 9, 0, 1, '', '1'),
(11, '', 'Узлы и детали', 9, 0, 1, '', '1'),
(12, '', 'Пневмоцилиндры', 10, 0, 1, 'готовая продукция', '1'),
(13, '', 'Пневмоцилиндры', 11, 0, 1, 'запчасти', '1'),
(14, '', 'Серия SR', 12, 0, 1, 'пневмоцилиндры', '1');

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
(2, 'Logvinov', '12345', 'О', 'Логвинов О.', 1, '1');

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
(2, 'default_kind_work', '2', 2, '1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `order_content`
--
ALTER TABLE `order_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user_options`
--
ALTER TABLE `user_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
