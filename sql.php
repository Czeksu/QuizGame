<?php

	include 'connection.php';
		

			$sq1 = "CREATE TABLE `questions` (
 	 `q_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 	 `question` varchar(100) DEFAULT NULL,
 	 `ans_id` int(11) DEFAULT NULL)";

			$sq2 = "CREATE TABLE `answers` (
 	 `a_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 	 `answer` varchar(100) DEFAULT NULL,
 	 `ans_id` int(11) DEFAULT NULL)";

			$sq3 = "INSERT INTO `questions` (`q_id`, `question`, `ans_id`) VALUES
(1, 'Jaka słynna kopalnia znajduje się w Wieliczce?', 3),
(2, 'Najsłynniejszy polski rycerz?', 6),
(3, 'W którym roku państwo polskie przyjęło chrzest?', 9),
(4, 'Jak nazywa się dawna siedziba królów Polski?', 12),
(5, 'Jak nazywała się I stolica Polski?', 15),
(6, 'Jak nazywał się pierwszy człowiek, który poleciał w kosmos?', 18),
(7, 'Jak się nazywał nasz poprzedni prezydent?', 21),
(8, 'Ile było rozbiorów Polski?', 24),
(9, 'Co to jest lub do czego służy rusznica?', 27),
(10, 'Gdzie otwarto pierwsze na świecie metro?', 30),
(11, 'Nad jaką rzeką leży Rzeszów? ', 33),
(12, 'Gdzie znajduje się ratusz ze sławnymi koziołkami? ', 36),
(13, 'Gdzie znajduje się Krzywa Wieża? ', 39),
(14, 'Który kraj jest południowym sąsiadem Egiptu? ', 42),
(15, 'W jakim mieście znajduje się najsłynniejszy Kreml? ', 45),
(16, 'Stolicą jakiego państwa jest Bejrut? ', 48),
(17, 'Jakie państwo słynie z najlepszych i najdroższych zegarków? ', 51),
(18, ' Jakie miasto europejskie przedzielone było przez wiele lat murem? ', 54),
(19, 'Jaki jest najcieplejszy ocean na świecie? ', 57),
(20, 'Jak się nazywa największa wyspa na świecie? ', 60)";

			$sq4 = "INSERT INTO `answers` (`a_id`, `answer`, `ans_id`) VALUES
(1, 'Kopalnia węgla', 1),
(2, 'Kopalnia diamentów', 1),
(3, 'Kopalnia soli', 1),
(4, 'Hetman Wiśniowiecki', 2),
(5, 'Jan Czartoryski', 2),
(6, 'Zawisza Czarny', 2),
(7, '1000 r.', 3),
(8, '768 r.', 3),
(9, '966 r.', 3),
(10, 'Belweder', 4),
(11, 'Barbakan', 4),
(12, 'Wawel', 4),
(13, 'Kraków', 5),
(14, 'Warszawa', 5),
(15, 'Gniezno', 5),
(16, 'Neil Armstrong', 6),
(17, 'Lewis Armstrong', 6),
(18, 'Jurij Gagarin', 6),
(19, 'Lech Kaczyński', 7),
(20, 'Andrzej Duda', 7),
(21, 'Bronisław Komorowski', 7),
(22, '2', 8),
(23, '4', 8),
(24, '3', 8),
(25, 'służy do zmiany toru jazdy pociągu', 9),
(26, 'powstanie chłopów', 9),
(27, 'stary rodzaj broni ręcznej', 9),
(28, 'w Moskwie', 10),
(29, 'w Nowym Jorku', 10),
(30, 'w Londynie', 10),
(31, 'Bug', 11),
(32, 'San', 11),
(33, 'Wisłok', 11),
(34, 'w Toruniu', 12),
(35, 'w Radomiu', 12),
(36, 'w Poznaniu', 12),
(37, 'w Paryżu', 13),
(38, 'w Madrycie', 13),
(39, 'w Pizie', 13),
(40, 'Nigeria', 14),
(41, 'Kenia', 14),
(42, 'Sudan', 14),
(43, 'w Kijowie', 15),
(44, 'w Mińsku', 15),
(45, 'w Moskwie', 15),
(46, 'Afganistanu', 16),
(47, 'Tajwanu', 16),
(48, 'Libanu', 16),
(49, 'Japonia', 17),
(50, 'Szwecja', 17),
(51, 'Szwajcaria', 17),
(52, 'Polska', 18),
(53, 'Włochy', 18),
(54, 'Niemcy', 18),
(55, 'Ocean Atlantycki', 19),
(56, 'Ocean Indyjski', 19),
(57, 'Ocean Spokojny', 19),
(58, 'Islandia', 20),
(59, 'Australia', 20),
(60, 'Grenlandia', 20)";

	$sq5 = "CREATE TABLE `score` (
  `score_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `scoredate` datetime DEFAULT NULL)";

	$sq6 = "CREATE TABLE `user` (
  `user_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL)";




for($i=1; $i < 7; $i++) { 

	if($link->query(${'sq'.$i})){

		echo "gitarka";
		}else{
			echo "zle";
			}
}

$link -> close();
?>
