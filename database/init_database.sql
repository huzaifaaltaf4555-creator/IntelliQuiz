SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

;
;
;
;

CREATE DATABASE IF NOT EXISTS `online_quiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `online_quiz`;

CREATE TABLE `admin_login` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES(1, 'admin', 'admin');
INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES(2, 'admin', 'admin');
INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES(3, 'sohaib123', 'sohaib123');

CREATE TABLE `exam_category` (
  `id` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `time` varchar(5) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(2, 'chemistry101', '20', '');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(3, 'physics', '60', '');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(4, 'db ', '90', '');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(5, 'pdc ', '90', '');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(6, 'my_exam ', '90', '');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(7, 'db ', '10', '');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(8, 'hamza ', '10', '');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(9, 'hello1', '60', '');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(10, 'hello2', '61', '');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(11, 'hello3', '62', 'sohaib');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(14, 'haris11', '90', 'sohaib123');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(16, 'sohaib101', '101', '');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(18, 'sohaib109', '109', 'sohaib123');
INSERT INTO `exam_category` (`id`, `category`, `time`, `username`) VALUES(20, 'test1', '90', 'admin');

CREATE TABLE `exam_results` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `exam_time` varchar(50) NOT NULL,
  `attempted` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `question_no` varchar(50) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(50) NOT NULL,
  `opt2` varchar(50) NOT NULL,
  `opt3` varchar(50) NOT NULL,
  `opt4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `quiz_attempts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `attempt_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'started'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES(1, 'Sohaib', 'Shamsi', 'sohaib1083', 'bhbh', 'saroshamsi@gmail.com', '03330220803');
INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES(2, 'Sohaib', 'Shamsi', '21K-3278', 'vava', 'sohaib1083@gmail.com', '03330220803');
INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES(3, 'Sohaib', 'Shamsi', 'sohaib', 'haha', 'saroshamsi@gmail.com', '03330220803');
INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES(4, 'a', 'a', 'a', 'a', 'a', 'a');
INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES(5, 'bb', 'bb', 'bb', 'fast12343', 'ss', '123');
INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES(6, 'Sohaib', 'Shamsi', 'sohaib101', 'Fast1234', 'sohaib1083@gmail.com', '03330220803');

ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_username` (`username`);

ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_category` (`category`);

ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_username` (`username`),
  ADD KEY `idx_exam_type` (`exam_type`);

ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_category` (`category`);

ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_username` (`username`),
  ADD KEY `idx_exam_type` (`exam_type`),
  ADD KEY `idx_attempt_time` (`attempt_time`);

ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`);

ALTER TABLE `admin_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `exam_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `exam_results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2516;

ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

ALTER TABLE `quiz_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_category`
  FOREIGN KEY (`category`) REFERENCES `exam_category` (`category`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE `exam_results`
  ADD CONSTRAINT `fk_exam_results_username`
  FOREIGN KEY (`username`) REFERENCES `registration` (`username`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE `exam_results`
  ADD CONSTRAINT `fk_exam_results_exam_type`
  FOREIGN KEY (`exam_type`) REFERENCES `exam_category` (`category`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE `quiz_attempts`
  ADD CONSTRAINT `fk_quiz_attempts_username`
  FOREIGN KEY (`username`) REFERENCES `registration` (`username`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE `quiz_attempts`
  ADD CONSTRAINT `fk_quiz_attempts_exam_type`
  FOREIGN KEY (`exam_type`) REFERENCES `exam_category` (`category`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

COMMIT;

;
;
;
