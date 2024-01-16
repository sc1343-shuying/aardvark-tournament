DROP DATABASE IF EXISTS Aardvark_Tournament;
CREATE DATABASE Aardvark_Tournament;
USE Aardvark_Tournament;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user` ;

CREATE TABLE IF NOT EXISTS `user` (
  `userId` INT NOT NULL AUTO_INCREMENT,
  `lastName` VARCHAR(50) NOT NULL,
  `firstName` VARCHAR(50) NOT NULL,
  `teamId` INT,
  `information` VARCHAR(50),
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `username` VARCHAR(100) NOT NULL,
  UNIQUE (`username`),
  PRIMARY KEY (`userId`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = MyISAM;

-- -----------------------------------------------------
-- Table `team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `team` ;

CREATE TABLE IF NOT EXISTS `team` (
  `teamId` INT NOT NULL AUTO_INCREMENT,
  `teamName` VARCHAR(100) NOT NULL,
  `teamMember` VARCHAR(100),
  `teamInformation` longtext COLLATE utf8_unicode_ci,
  `collegeId` INT,
  `numOfMember` INT,
  `userId` INT NOT NULL,
    PRIMARY KEY (`teamId`),
   INDEX `userId_fk_idx` (`userId` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `teamMember`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teamMember` ;

CREATE TABLE IF NOT EXISTS `teamMember` (
  `teamMemberId` INT,
  `teamCaptain` VARCHAR(100),
  `collegeId` INT,
  `teamId` INT,
  `role` VARCHAR(50),
  `teamName` VARCHAR(50),
  INDEX `teamId_fk_idx` (`teamId` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `collegeTeam`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `collegeTeam` ;

CREATE TABLE IF NOT EXISTS `collegeTeam` (
  `collegeId` INT NOT NULL,
  `teamId` INT NOT NULL,
   PRIMARY KEY (`collegeId`, `teamId`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `college`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `college` ;

CREATE TABLE IF NOT EXISTS `college` (
  `collegeId` INT NOT NULL,
  `collegeName` VARCHAR(50) NOT NULL,
  `collegeDescription` longtext COLLATE utf8_unicode_ci,
  `collegeInformation` longtext COLLATE utf8_unicode_ci,
  `field` INT,
   PRIMARY KEY (`collegeId`))
ENGINE = MyISAM;

-- -----------------------------------------------------
-- Table `collegeAdmin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `collegeAdmin` ;

CREATE TABLE IF NOT EXISTS `collegeAdmin` (
  `adminId` INT NOT NULL,
  `manageTeam` INT,
  `collegeTime` DATETIME,
  `eventLocation` VARCHAR(50),
  `team` INT,
   PRIMARY KEY (`adminId`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `manageTeam`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `manageTeam` ;

CREATE TABLE IF NOT EXISTS `manageTeam` (
  `adminId` INT NOT NULL,
  `teamId` INT NOT NULL,
   PRIMARY KEY (`adminId`, `teamId`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `adminType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adminType` ;

CREATE TABLE IF NOT EXISTS `adminType` (
  `adminId` INT,
  `adminType` VARCHAR(50),
   PRIMARY KEY (`adminId`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `tournamentAdmin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tournamentAdmin` ;

CREATE TABLE IF NOT EXISTS `tournamentAdmin` (
  `adminId` INT NOT NULL,
  `manageTeam` INT,
  `collegeTime` DATETIME,
  `eventLocation` VARCHAR(50),
  `team` INT,
   PRIMARY KEY (`adminId`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `manageEvent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `manageEvent` ;

CREATE TABLE IF NOT EXISTS `manageEvent` (
  `adminId` INT NOT NULL,
  `eventId` INT NOT NULL,
   PRIMARY KEY (`adminId`, `eventId`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `event` ;

CREATE TABLE IF NOT EXISTS `event` (
  `eventId` INT NOT NULL AUTO_INCREMENT,
  `eventLocation` VARCHAR(50),
  `eventName` VARCHAR(50),
  `eventStartTime` DATETIME,
  `eventEndTime` DATETIME,
  `teamId` INT,
  PRIMARY KEY (`eventId`),
  INDEX `teamId_fk_idx` (`teamId` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `game`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `game` ;

CREATE TABLE IF NOT EXISTS `game` (
  `gameId` INT NOT NULL AUTO_INCREMENT,
  `eventId` INT,
  `teamId` INT,
  `winner` VARCHAR(50),
  `status` VARCHAR(50),
  PRIMARY KEY (`gameId`),
  INDEX `eventId_fk_idx` (`eventId` ASC))
ENGINE = MyISAM;

-- -----------------------------------------------------
-- Table `score`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `score` ;

CREATE TABLE IF NOT EXISTS `score` (
  `score` VARCHAR(50),
  `teamId` INT,
  `adminId` INT,
  `result` VARCHAR(50),
  `gameId` INT,
  INDEX `gameId_fk_idx` (`gameId` ASC))
ENGINE = MyISAM;
