-- FOR CREATE USERS TABLE
CREATE TABLE `pengelolaan-jadwal-ujian`.`users` ( `id` INT NOT NULL AUTO_INCREMENT ,  `name` VARCHAR(255) NOT NULL ,  `email` VARCHAR(255) NOT NULL ,  `password` VARCHAR(255) NOT NULL ,  `role` VARCHAR(255) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;

-- FOR CREATE TABLE JADWAL
CREATE TABLE `pengelolaan-jadwal-ujian`.`jadwal` ( `id` INT NOT NULL AUTO_INCREMENT ,  `mapel` VARCHAR(255) NOT NULL ,  `waktu` VARCHAR(255) NOT NULL ,  `berlangsung` BOOLEAN NULL ,  `selesai` BOOLEAN NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;

-- FOR ADD USER ADMIN
INSERT INTO `pengelolaan-jadwal-ujian`.`users` VALUES ('', 'admin', 'admin@gmail.com', 'admin001', 'admin');