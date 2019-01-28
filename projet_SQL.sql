
CREATE TABLE `Consultant` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name_c` varchar(50) NOT NULL,
  `firstname_c` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `hired_date` date NOT NULL,
  `type_metier` varchar(5) NOT NULL,
  `specialite` varchar(50) DEFAULT NULL,
  `TJM_Ing` int(11) DEFAULT NULL,
  `TJM_CP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `EquipeProjet` (
  `id_consultant` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `workedDays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `Manager` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Projet` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `id_Manager` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `Consultant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Consultant_User_FK` (`id`) USING BTREE;

ALTER TABLE `EquipeProjet`
  ADD PRIMARY KEY (`id_consultant`,`id_projet`) USING BTREE,
  ADD KEY `EquipeProjet_Projet_FK` (`id_projet`) USING BTREE,
  ADD KEY `EquipeProjet_Consultant_FK` (`id_consultant`);

ALTER TABLE `Manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Manager_User_FK` (`id`) USING BTREE;

ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

ALTER TABLE `Projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Projet_Manager_FK` (`id_Manager`);

ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `Manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `Projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `Consultant`
  ADD CONSTRAINT `Consultant_User_FK` FOREIGN KEY (`id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `EquipeProjet`
  ADD CONSTRAINT `EquipeProjet_Consultant_FK` FOREIGN KEY (`id_consultant`) REFERENCES `Consultant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EquipeProjet_Projet_FK` FOREIGN KEY (`id_projet`) REFERENCES `Projet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Manager`
  ADD CONSTRAINT `Manager_User_FK` FOREIGN KEY (`id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Projet`
  ADD CONSTRAINT `Projet_Manager_FK` FOREIGN KEY (`id_Manager`) REFERENCES `Manager` (`id`);

INSERT INTO `Projet` (`id`, `start_date`, `end_date`, `id_Manager`) VALUES
(1, '2019-01-01', '2019-01-15', 1),
(2, '2019-01-15', '2019-01-31', 1);

INSERT INTO `User` (`id`, `login`, `password`) VALUES
(1, 'login1', 'password1'),
(2, 'login2', 'password2'),
(3, 'login3', 'password3'),
(4, 'login4', 'password4'),
(5, 'login5', 'password5');

INSERT INTO `Consultant` (`id`, `code`, `name_c`, `firstname_c`, `phone`, `mail`, `hired_date`, `type_metier`, `specialite`, `TJM_Ing`, `TJM_CP`) VALUES
(2, 'code2', 'name2', 'firstname2', '0160606060', 'test2@gmail.com', '2018-11-13', 'I', 'etudes', 200, NULL),
(3, 'code3', 'name3', 'firstname3', '0160606061', 'test3@gmail.com', '2018-10-18', 'P', NULL, NULL, 250);

INSERT INTO `Manager` (`id`) VALUES
(1);

INSERT INTO `EquipeProjet` (`id_consultant`, `id_projet`, `workedDays`) VALUES
(2, 1, 20),
(3, 2, 0);
