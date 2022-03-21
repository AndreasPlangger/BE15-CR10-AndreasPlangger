-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2022 at 08:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BE15_CR10_AndreasPlangger_BigLibrary`
--
CREATE DATABASE IF NOT EXISTS `BE15_CR10_AndreasPlangger_BigLibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `BE15_CR10_AndreasPlangger_BigLibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `Media`
--

CREATE TABLE `Media` (
  `bookID` int(11) NOT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `ISBN` int(13) NOT NULL,
  `short_description` varchar(650) NOT NULL,
  `book_type` varchar(13) NOT NULL,
  `author_first_name` varchar(50) NOT NULL,
  `author_last_name` varchar(50) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `publisher_address` varchar(50) NOT NULL,
  `publish_date` date NOT NULL,
  `book_status` enum('available','reserved') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Media`
--

INSERT INTO `Media` (`bookID`, `picture`, `title`, `ISBN`, `short_description`, `book_type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `book_status`) VALUES
(1, 'siddhartha_alt.jpeg', 'Siddhartha', 2147483647, 'Siddhartha is an allegorical novel by Hermann Hesse which deals with the spiritual journey of an Indian boy called Siddhartha during the time of the Buddha. The book, Hesses ninth novel, was written in German, in a simple, yet powerful and lyrical, style.', 'Book', 'Hermann', 'Hesse', 'Suhrkamp', 'Torstrasse 44 10119 Berlin Germany', '1922-03-01', 'available'),
(2, 'theGunsOfAugust_alt.jpeg', 'The Guns of August', 2147483646, 'A brilliant piece of military history which proves up to the hilt the force of Winston Churchills statement that the first month of World War I was a drama never surpassed.', 'Book', 'Barbara', 'Tuchman', 'Macmillan Publishers', '120 Broadway New York USA', '1962-01-01', 'reserved'),
(3, 'kilimanjaro.jpg', 'The Snows of Kilimanjaro', 2147483645, 'Men and women of passion and action live, fight, love and die in scenes of dramatic intensity. From haunting tragedy on the snow-capped peak of Kilimanjaro to brutal sensationalism in the bullring; from rural America with its deceptive calm to the heart of war-ravaged Europe.', 'Book', 'Ernest', 'Hemingway', 'Random House', '1745 Broadway New York USA', '1936-08-01', 'available'),
(4, 'schubert.jpeg', 'Schubert: Three Piano Sonatas', 214748364, 'Piano sonatas, D958, D959, and D960, were long neglected. Composed in the summer of 1828, a year that also saw the composition of the Fantasia in F-minor for four hands, the String Quintet in C, the Mass in E-flat, and in his final days a sketch of a symphony in D. ', 'CD', 'Alfred', 'Brendel', 'Philips Classics', 'Gravelandseweg 80 1217 Hilversum Netherlands', '1975-03-14', 'reserved'),
(5, 'tchaikowsky.jpeg', 'Tchaikovsky concerto No. 1', 2147483643, 'The Tchaikovsky Piano Concerto No.1 was the first recording of Van Cliburn in 1958 for RCA Victor. It won Cliburn a Grammy award and was the first classical recording to go platinum, that is to sell more than a million copies.', 'CD', 'Van', 'Cliburn', 'RCA Victor', 'Av. Cuitláhuac 2519 Mexico, D.F.', '1958-05-02', 'available'),
(6, 'casablanca_alt.jpeg', 'Casablanca', 2147483642, 'A good man, wounded in love, goes to a remote place to drown his sorrows. To his astonishment, the woman he has never stopped loving walks into his bar. ', 'DVD', 'Julius', 'Epstein', 'Warner Bros Pictures', '4000 Warner Boulevard, Burbank, California USA', '1943-11-26', 'available'),
(7, 'citizenKane.jpeg', 'Citizen Kane', 2147483641, 'Revered by all of the towns children and dreaded by all of its mothers, Huckleberry Finn is indisputably the most appealing child-hero in American literature. Unlike the tall-tale, idyllic world of Tom Sawyer, The Adventures of Huckleberry Finn is firmly grounded in early reality. From the abusive ', 'DVD', 'Orson', 'Welles', 'Warner Bros Pictures', '1270 Avenue of the Americas, New York, USA', '1941-05-01', 'available'),
(8, 'vertigo_alt.jpeg', 'Vertigo', 2147483637, 'The film stars James Stewart as former police detective John \"Scottie\" Ferguson. Scottie is forced into early retirement because an incident in the line of duty has caused him to develop acrophobia (an extreme fear of heights) and vertigo (a false sense of rotational movement).', 'DVD', 'Alec', 'Coppel', 'Paramount Pictures', '5555 Melrose Avenue, Hollywood, California, USA', '1958-05-09', 'available'),
(9, 'medusa.jpeg', 'The Wreck of the Medusa', 2147483633, 'The Wreck of the Medusa is a spellbinding account of the most famous shipwreck before the Titanic, a tragedy that riled a nation and inspired Théodore Géricaults magnificent painting The Raft of the Medusa . ', 'Book', 'Jonathan', 'Mills', 'Atlantic Monthly Press', '154 W. 14th Street, NY 10011, USA', '2007-04-05', 'available'),
(10, 'totoro.jpeg', 'My Neighbor Totoro', 2147483622, 'Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. ', 'DVD', 'Hayao', 'Miyazaki', 'Studio Ghibli', '184 Koganei, Tokyo, Japan', '1988-04-16', 'reserved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Media`
--
ALTER TABLE `Media`
  ADD PRIMARY KEY (`bookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Media`
--
ALTER TABLE `Media`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
