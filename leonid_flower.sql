-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 23 2022 г., 22:57
-- Версия сервера: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `leonid_flower`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `country` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL,
  `color` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `photo`, `name`, `price`, `count`, `country`, `category_id`, `color`, `date`) VALUES
(1, 'борщевик.jpg', 'Борщевик', 1500, 8, 'Россия', 4, 'Белый', '2022-07-14 13:00:00'),
(2, 'цикорий.jpg', 'Цикорий', 400, 241, 'Израиль', 4, 'Голубой', '2022-07-13 21:50:25'),
(5, 'горшок_металлический.jpeg', 'Горшок металлический', 3500, 13, 'Узбекистан', 5, 'Серый', '2022-07-13 21:54:19'),
(6, 'горшок_торфянной.jpg', 'Горшок Торфянной', 4000, 1216, 'Аргентина', 5, 'Коричневый', '2022-07-13 21:54:19'),
(7, 'скотч.jpg', 'Скотч', 300, 52, 'Афганистан', 6, 'Коричневый', '2022-07-13 22:05:45'),
(8, 'газета.jpeg', 'Газета', 700, 199929, 'Беларусь', 6, 'Приятный', '2022-07-16 21:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `article_id`, `user_id`, `count`) VALUES
(65, 252, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(4, 'Цветы'),
(5, 'Горшки'),
(6, 'Упаковка');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` set('new','confirmed','canceled') NOT NULL DEFAULT 'new',
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reason` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `name`, `price`, `count`, `status`, `user_id`, `date`, `reason`) VALUES
(12, 'Газета', 700, 1, 'canceled', 6, '2022-07-18 21:14:51', NULL),
(22, 'Газета', 700, 2, 'confirmed', 4, '2022-07-19 11:19:44', 'Нет в наличии'),
(31, 'Газета', 700, 1, 'new', 4, '2022-07-20 00:25:38', NULL),
(32, 'Борщевик', 1500, 1, 'confirmed', 4, '2022-07-20 00:25:38', 'Скоро доставим'),
(36, 'Газета', 700, 4, 'confirmed', 6, '2022-07-20 18:51:59', NULL),
(42, 'Борщевик', 1500, 1, 'new', 6, '2022-07-23 11:22:58', NULL),
(43, 'Цикорий', 400, 1, 'new', 6, '2022-07-23 19:53:24', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `status` set('клиент','администратор') NOT NULL DEFAULT 'клиент',
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `patronymic` varchar(50) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `status`, `name`, `surname`, `patronymic`, `login`, `password`, `email`) VALUES
(3, 'клиент', 'Leonidas', 'Ilyushenkov', 'Vladimirovich', 'tatsil@yandex.ru', 'Admin123*', 'asd'),
(4, 'клиент', 'ываыаkj', 'ывавыа', 'авыавы', 'tatsil', '123456', 'gfsda@jhbfdsa.ru'),
(5, 'администратор', 'Леонид', 'Ильюшенков', 'Владимирович', 'admin', 'admin44', 'forestmarket@yandex.ru'),
(6, 'клиент', 'Леонид', 'Ильюшенков', 'Владимирович', 'leonid', '123456', 'forestmarket@yandex.ru'),
(7, 'клиент', 'Павел', 'Рогов', 'Александрович', 'rogov', '123456', 'gfsda@jhbfdsa.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
