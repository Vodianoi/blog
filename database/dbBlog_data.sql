-- Adminer 4.8.1 MySQL 10.6.12-MariaDB-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

INSERT INTO `CATEGORIES` (`id`, `name`) VALUES
(1,	'loisirs');

INSERT INTO `COMS` (`id`, `content`, `createdAt`, `users_id`, `posts_id`) VALUES
(1,	'Bravo',	'2024-01-23',	1,	1),
(2,	'Bravo',	'2024-01-23',	2,	2),
(3,	'Sans avis',	'2024-01-23',	3,	2),
(4,	'Sans avis',	'2024-01-23',	1,	1),
(5,	'il est super cet article',	'2024-01-23',	1,	3);

INSERT INTO `POST-CATEGORY` (`posts_id`, `categories_id`) VALUES
(1,	1),
(2,	1),
(3,	1);

INSERT INTO `POSTS` (`id`, `title`, `content`, `createdAt`, `deletedAt`, `priority`, `users_id`) VALUES
(1,	'Le Sport c\'est bien',	'\r\nLe biathlon, mariage parfait entre le ski de fond et le tir à la carabine, incarne l\'essence même de la polyvalence athlétique. Ce sport d\'hiver captivant allie l\'endurance physique à la précision du tir, créant ainsi un défi unique et exigeant. Les compétiteurs parcourent des distances variées en ski de fond, entrecoupées de séances de tir debout et couché, mettant à l\'épreuve leur capacité à maintenir la concentration malgré l\'effort physique intense.\r\n\r\nOriginaire de Scandinavie, le biathlon est devenu un sport emblématique des Jeux Olympiques d\'hiver, attirant l\'attention mondiale. Les athlètes, souvent comparés à des « combattants de la neige », doivent jongler entre la maîtrise du ski et la stabilité mentale requise pour atteindre la cible. Avec son mélange unique de compétences, le biathlon continue de fasciner les amateurs de sports d\'hiver, offrant un spectacle spectaculaire où vitesse et précision se conjuguent harmonieusement.',	'2024-01-23',	'2025-01-23',	1,	2),
(2,	'Le Sport c\'est bien 2 : Le retour',	'\r\nLe biathlon, mariage harmonieux entre la puissance physique et la finesse mentale, s\'impose comme l\'un des sports les plus captivants des Jeux Olympiques d\'hiver. Alliant le ski de fond à la précision du tir, les biathlètes se lancent dans une compétition exigeante qui teste leurs compétences athlétiques polyvalentes.\r\n\r\nLe tracé du biathlon est un parcours sinueux qui mélange habilement des sections de ski de fond avec des moments cruciaux de tir. La transition entre l\'effort physique intense et la nécessité de se concentrer rapidement sur une cible apporte une dimension unique à ce sport. Les pénalités pour les tirs manqués ajoutent une pression supplémentaire, mettant à l\'épreuve la résilience mentale des athlètes.\r\n\r\nOriginaire des régions nordiques, le biathlon a conquis le monde grâce à son mélange de compétences variées. En regardant un biathlon, les spectateurs sont témoins d\'une fusion exceptionnelle entre la force brute et la précision chirurgicale, faisant de ce sport une expérience palpitante et inoubliable.',	'2024-01-23',	'2026-01-23',	2,	3),
(3,	'Le Sport c\'est bien 3 : La fin',	'\r\nLe biathlon, mariage subtil entre la glisse élégante du ski de fond et la concentration extrême du tir à la carabine, offre un spectacle sportif unique et captivant. Ce sport d\'hiver exigeant trouve ses origines dans les terrains nordiques, et a évolué pour devenir l\'une des compétitions les plus acclamées des Jeux Olympiques.\r\n\r\nLes athlètes de biathlon se lancent dans des courses endiablées, alternant entre des séquences de ski effréné et des moments de tir nécessitant une précision chirurgicale. C\'est une danse exigeante entre l\'endurance physique et la maîtrise mentale, où chaque tir manqué se traduit par des pénalités sur la piste.\r\n\r\nLe biathlon transcende les frontières culturelles, captivant un public mondial par son mélange unique de compétences athlétiques. En mêlant la grâce du ski avec la tension du tir, le biathlon continue d\'émerveiller les amateurs de sports d\'hiver, offrant un spectacle où la virtuosité sportive atteint son apogée.',	'2024-01-23',	'2026-01-23',	3,	1);

INSERT INTO `USERS` (`id`, `nickname`, `name`, `surname`) VALUES
(1,	'Mateo',	NULL,	NULL),
(2,	'Valentine',	NULL,	NULL),
(3,	'BlueJohn',	'Chaloyard',	'Hugo'),
(4,	'Edvele',	'VERNET',	'Eddy'),
(5,	'Vodianoi',	'POTY',	'Axel');

-- 2024-01-23 10:26:33
