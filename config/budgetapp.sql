-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 10. lis 2025, 18:52
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
  `category` enum('jidlo','doprava','najem','zabava','prijem','ostatni','sporeni') NOT NULL,
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
(30, 'Úspory', '', 'minus', 1000.00, 'sporeni', 2, '2025-10-28 17:45:16', '2025-11-04 19:38:57', '2025-06-14'),
(31, 'Předplatné hudby', '', 'minus', 159.00, 'zabava', 2, '2025-10-28 17:45:16', '2025-10-28 17:45:16', '2025-06-16'),
(67, 'Benzín', '', 'minus', 1500.00, 'doprava', 2, '2025-11-03 10:53:07', '2025-11-03 10:53:07', '2025-11-02'),
(72, 'Kino', NULL, 'minus', 50.00, 'zabava', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-06'),
(73, 'Nákup potravin', NULL, 'minus', 320.00, 'jidlo', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-02'),
(74, 'Oběd v restauraci', NULL, 'minus', 180.00, 'jidlo', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-03'),
(75, 'Večeře', NULL, 'minus', 220.00, 'jidlo', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-05'),
(76, 'Autobus', NULL, 'minus', 30.00, 'doprava', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-01'),
(77, 'Taxi', NULL, 'minus', 140.00, 'doprava', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-04'),
(78, 'Benzín', NULL, 'minus', 850.00, 'doprava', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-07'),
(79, 'Spotify', NULL, 'minus', 159.00, 'zabava', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-02'),
(80, 'Steam hra', NULL, 'minus', 499.00, 'zabava', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-05'),
(81, 'Kafe s kamarádem', NULL, 'minus', 65.00, 'zabava', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-08'),
(82, 'Nájem', NULL, 'minus', 9000.00, 'najem', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-01'),
(83, 'Elektřina', NULL, 'minus', 1200.00, 'najem', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-10'),
(84, 'Internet', NULL, 'minus', 550.00, 'najem', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-03'),
(87, 'Spoření', NULL, 'plus', 1500.00, 'sporeni', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-05'),
(89, 'Léky', NULL, 'minus', 120.00, 'ostatni', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-06'),
(90, 'Drogerie', NULL, 'minus', 200.00, 'ostatni', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-09'),
(91, 'Dárek', NULL, 'minus', 350.00, 'ostatni', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-11'),
(92, 'Pečivo', NULL, 'minus', 35.00, 'jidlo', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-06'),
(93, 'Sýr', NULL, 'minus', 60.00, 'jidlo', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-07'),
(94, 'Maso', NULL, 'minus', 220.00, 'jidlo', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-08'),
(95, 'Tramvaj', NULL, 'minus', 24.00, 'doprava', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-09'),
(96, 'Parkování', NULL, 'minus', 40.00, 'doprava', 2, '2025-11-10 17:03:14', '2025-11-10 17:03:14', '2025-11-10'),
(118, 'Nákup potravin', NULL, 'minus', 280.00, 'jidlo', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-01'),
(119, 'Večeře', NULL, 'minus', 190.00, 'jidlo', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-02'),
(120, 'Svačina', NULL, 'minus', 35.00, 'jidlo', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-04'),
(121, 'Autobus', NULL, 'minus', 24.00, 'doprava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-01'),
(122, 'Benzín', NULL, 'minus', 820.00, 'doprava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-03'),
(123, 'Taxi', NULL, 'minus', 150.00, 'doprava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-05'),
(124, 'Netflix', NULL, 'minus', 199.00, 'zabava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-02'),
(125, 'Kino', NULL, 'minus', 140.00, 'zabava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-06'),
(126, 'Čajovna', NULL, 'minus', 90.00, 'zabava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-07'),
(127, 'Nájem', NULL, 'minus', 9000.00, 'najem', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-01'),
(128, 'Elektřina', NULL, 'minus', 1180.00, 'najem', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-07'),
(129, 'Voda', NULL, 'minus', 450.00, 'najem', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-10'),
(130, 'Výplata', NULL, 'plus', 28500.00, 'prijem', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-15'),
(131, 'Přivýdělek', NULL, 'plus', 1200.00, 'prijem', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-20'),
(132, 'Spoření', NULL, 'plus', 1000.00, 'sporeni', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-05'),
(133, 'Investice', NULL, 'plus', 500.00, 'sporeni', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-18'),
(134, 'Drogerie', NULL, 'minus', 140.00, 'ostatni', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-03'),
(135, 'Léky', NULL, 'minus', 90.00, 'ostatni', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-04'),
(136, 'Domácí potřeby', NULL, 'minus', 160.00, 'ostatni', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-11'),
(137, 'Pečivo', NULL, 'minus', 32.00, 'jidlo', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-08'),
(138, 'Ovoce', NULL, 'minus', 75.00, 'jidlo', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-09'),
(139, 'Mléko', NULL, 'minus', 28.00, 'jidlo', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-10'),
(140, 'Parkování', NULL, 'minus', 30.00, 'doprava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-09'),
(141, 'Tramvaj', NULL, 'minus', 24.00, 'doprava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-11'),
(142, 'Myčka auta', NULL, 'minus', 110.00, 'doprava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-12'),
(143, 'Spotify', NULL, 'minus', 159.00, 'zabava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-12'),
(144, 'Bowling', NULL, 'minus', 180.00, 'zabava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-13'),
(145, 'Pivo s kamarády', NULL, 'minus', 120.00, 'zabava', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-14'),
(146, 'Internet', NULL, 'minus', 550.00, 'najem', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-14'),
(147, 'Úklid společných prostor', NULL, 'minus', 70.00, 'najem', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-16'),
(148, 'Brigáda', NULL, 'plus', 900.00, 'prijem', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-22'),
(150, 'Peněžní rezerva', NULL, 'plus', 700.00, 'sporeni', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-21'),
(151, 'Vklad do fondu', NULL, 'plus', 600.00, 'sporeni', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-23'),
(152, 'Hřeben', NULL, 'minus', 40.00, 'ostatni', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-19'),
(153, 'Dárek pro známého', NULL, 'minus', 350.00, 'ostatni', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-20'),
(155, 'Sýr', NULL, 'minus', 60.00, 'jidlo', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-15'),
(156, 'Šunka', NULL, 'minus', 55.00, 'jidlo', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-16'),
(157, 'Těstoviny', NULL, 'minus', 32.00, 'jidlo', 2, '2025-11-10 17:41:15', '2025-11-10 17:41:15', '2025-09-17'),
(161, 'Nákup potravin', NULL, 'minus', 300.00, 'jidlo', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-01'),
(162, 'Oběd', NULL, 'minus', 150.00, 'jidlo', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-02'),
(163, 'Večeře', NULL, 'minus', 210.00, 'jidlo', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-03'),
(164, 'Autobus', NULL, 'minus', 24.00, 'doprava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-01'),
(165, 'Benzín', NULL, 'minus', 780.00, 'doprava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-04'),
(166, 'Taxi', NULL, 'minus', 130.00, 'doprava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-06'),
(167, 'Netflix', NULL, 'minus', 199.00, 'zabava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-02'),
(168, 'Kino', NULL, 'minus', 150.00, 'zabava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-05'),
(169, 'Kafe', NULL, 'minus', 60.00, 'zabava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-07'),
(170, 'Nájem', NULL, 'minus', 9000.00, 'najem', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-01'),
(171, 'Elektřina', NULL, 'minus', 1190.00, 'najem', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-08'),
(172, 'Internet', NULL, 'minus', 550.00, 'najem', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-04'),
(173, 'Výplata', NULL, 'plus', 28500.00, 'prijem', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-15'),
(174, 'Bonus', NULL, 'plus', 1800.00, 'prijem', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-22'),
(175, 'Spoření', NULL, 'plus', 1200.00, 'sporeni', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-05'),
(176, 'Investice', NULL, 'plus', 900.00, 'sporeni', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-18'),
(177, 'Domácí potřeby', NULL, 'minus', 160.00, 'ostatni', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-03'),
(178, 'Léky', NULL, 'minus', 95.00, 'ostatni', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-09'),
(179, 'Dárek', NULL, 'minus', 350.00, 'ostatni', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-10'),
(180, 'Pečivo', NULL, 'minus', 34.00, 'jidlo', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-08'),
(181, 'Ovoce', NULL, 'minus', 65.00, 'jidlo', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-09'),
(182, 'Jogurt', NULL, 'minus', 22.00, 'jidlo', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-11'),
(183, 'Parkování', NULL, 'minus', 30.00, 'doprava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-10'),
(184, 'Tramvaj', NULL, 'minus', 24.00, 'doprava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-12'),
(185, 'Myčka auta', NULL, 'minus', 110.00, 'doprava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-13'),
(186, 'Spotify', NULL, 'minus', 159.00, 'zabava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-12'),
(187, 'Bowling', NULL, 'minus', 170.00, 'zabava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-14'),
(188, 'Pivo', NULL, 'minus', 55.00, 'zabava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-15'),
(189, 'Poplatek', NULL, 'minus', 85.00, 'najem', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-16'),
(190, 'Oprava bytu', NULL, 'minus', 650.00, 'najem', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-18'),
(191, 'Peníze od rodičů', NULL, 'plus', 400.00, 'prijem', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-19'),
(192, 'Brigáda', NULL, 'plus', 1000.00, 'prijem', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-25'),
(193, 'Vklad na spoření', NULL, 'plus', 750.00, 'sporeni', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-20'),
(194, 'Rezerva', NULL, 'plus', 900.00, 'sporeni', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-21'),
(195, 'Úklid', NULL, 'minus', 90.00, 'ostatni', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-17'),
(196, 'Osobní hygiena', NULL, 'minus', 130.00, 'ostatni', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-22'),
(197, 'Hračky pro dítě', NULL, 'minus', 220.00, 'ostatni', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-24'),
(198, 'Čokoláda', NULL, 'minus', 25.00, 'jidlo', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-16'),
(199, 'Těstoviny', NULL, 'minus', 30.00, 'jidlo', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-17'),
(200, 'Maso', NULL, 'minus', 200.00, 'jidlo', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-18'),
(201, 'Servis auta', NULL, 'minus', 450.00, 'doprava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-26'),
(202, 'Náhradní díl', NULL, 'minus', 320.00, 'doprava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-27'),
(203, 'Kolo údržba', NULL, 'minus', 150.00, 'doprava', 2, '2025-11-10 17:41:27', '2025-11-10 17:41:27', '2025-10-29');

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
,`category` enum('jidlo','doprava','najem','zabava','prijem','ostatni','sporeni')
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

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
