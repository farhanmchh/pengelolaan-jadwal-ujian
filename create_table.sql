-- FOR CREATE USERS TABLE
CREATE TABLE `pengelolaan-jadwal-ujian`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;
-- FOR CREATE TABLE JADWAL
DROP TABLE IF EXISTS `pengelolaan-jadwal-ujian`.`jadwal`;
CREATE TABLE `pengelolaan-jadwal-ujian`.`jadwal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `mapel` VARCHAR(255) NOT NULL,
  `tanggal` VARCHAR(255) NOT NULL,
  `jam_mulai` VARCHAR(255) NOT NULL,
  `jam_selesai` VARCHAR(255) NOT NULL,
  `durasi` VARCHAR(255) NOT NULL,
  `berlangsung` BOOLEAN NULL,
  `selesai` BOOLEAN NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;
-- FOR ADD USER ADMIN
INSERT INTO
  `pengelolaan-jadwal-ujian`.`users`
VALUES
  (
    '',
    'admin',
    'admin@gmail.com',
    'admin001',
    'admin'
  );