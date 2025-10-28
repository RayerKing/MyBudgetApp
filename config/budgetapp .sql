-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 28. říj 2025, 20:35
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `budgetapp`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `kind` enum('plus','minus') NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `category` enum('doprava','jidlo','zabava','najem','prijem','spoření','ostatni') DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `description`, `kind`, `value`, `category`, `user_id`, `created_at`, `updated_at`, `transaction_date`) VALUES
(26, 'Výplata', '', 'plus', 27000.00, 'prijem', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-06-05'),
(27, 'Cestovní lístek', '', 'minus', 120.00, 'doprava', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-06-06'),
(28, 'Večeře s rodinou', '', 'minus', 680.00, 'jidlo', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-06-09'),
(29, 'Bydlení', '', 'minus', 9800.00, 'najem', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-06-11'),
(30, 'Úspory', '', 'minus', 1000.00, '', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-06-14'),
(31, 'Předplatné hudby', '', 'minus', 159.00, 'zabava', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-06-16'),
(32, 'Výplata', '', 'plus', 27000.00, 'prijem', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-07-05'),
(33, 'Autobusový lístek', '', 'minus', 45.00, 'doprava', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-07-07'),
(34, 'Nákup jídla', '', 'minus', 740.00, 'jidlo', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-07-10'),
(35, 'Bydlení', '', 'minus', 9800.00, 'najem', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-07-11'),
(36, 'Spoření', '', 'minus', 1000.00, '', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-07-15'),
(37, 'Kino', '', 'minus', 180.00, 'zabava', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-07-20'),
(38, 'Dovolená', '', 'minus', 8500.00, 'ostatni', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-08-05'),
(39, 'Výplata', '', 'plus', 27000.00, 'prijem', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-08-10'),
(40, 'Restaurace', '', 'minus', 950.00, 'jidlo', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-08-12'),
(41, 'Cestování vlakem', '', 'minus', 330.00, 'doprava', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-08-15'),
(42, 'Pronájem', '', 'minus', 9800.00, 'najem', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-08-20'),
(43, 'Spotify', '', 'minus', 159.00, 'zabava', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-08-23'),
(44, 'Spoření', '', 'minus', 1000.00, '', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-08-25'),
(45, 'Výplata', '', 'plus', 27000.00, 'prijem', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-09-05'),
(46, 'Taxi', '', 'minus', 260.00, 'doprava', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-09-07'),
(47, 'Potraviny', '', 'minus', 820.00, 'jidlo', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-09-09'),
(48, 'Bydlení', '', 'minus', 9800.00, 'najem', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-09-10'),
(49, 'Úspory', '', 'minus', 1500.00, '', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-09-11'),
(50, 'Káva s přáteli', '', 'minus', 120.00, 'zabava', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-09-15');

-- --------------------------------------------------------

--
-- Zástupná struktura pro pohled `transactions_view`
-- (Vlastní pohled viz níže)
--
CREATE TABLE `transactions_view` (
`user_id` int(10) unsigned
,`user_name` varchar(150)
,`email` varchar(200)
,`transaction_name` varchar(255)
,`value` decimal(10,2)
,`kind` enum('plus','minus')
,`category` enum('doprava','jidlo','zabava','najem','prijem','spoření','ostatni')
);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `userName` varchar(150) NOT NULL,
  `firstName` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `userName`, `firstName`, `lastName`, `password_hash`, `email`, `role`, `created_at`, `updated_at`) VALUES
(2, 'testovaci_data', 'Pepan', 'Jižan', '$2y$10$SnXnPDyD43PYkPjtDtbxNuNJT9QNr8TPOIbCAWzsov4Y180hs./qi', 'dj@seznam.cz', 'user', '2025-10-28 16:37:18', '2025-10-28 16:37:18');

-- --------------------------------------------------------

--
-- Struktura pro pohled `transactions_view`
--
DROP TABLE IF EXISTS `transactions_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transactions_view`  AS SELECT `users`.`id` AS `user_id`, `users`.`userName` AS `user_name`, `users`.`email` AS `email`, `transactions`.`name` AS `transaction_name`, `transactions`.`value` AS `value`, `transactions`.`kind` AS `kind`, `transactions`.`category` AS `category` FROM (`transactions` join `users` on(`transactions`.`user_id` = `users`.`id`)) ORDER BY `users`.`id` ASC ;

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_cat_date` (`user_id`,`category`,`transaction_date`),
  ADD KEY `idx_user_date` (`user_id`,`transaction_date`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
