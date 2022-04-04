CREATE TABLE `formatifs` (
  `id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  `titre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateevaluation` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

INSERT INTO `formatifs` (`id`, `cours_id`, `titre`, `dateevaluation`) VALUES
(1, 1, 'Formatif pour l\'examen 1', '2022-02-08 13:15:00'),
(2, 2, 'Test de connaissances', '2022-01-26 10:15:00'),
(3, 1, 'Quizz semaine 5', '2022-02-21 13:15:00'),
(4, 2, 'Formatif examen 1', '2022-02-17 10:15:00');
