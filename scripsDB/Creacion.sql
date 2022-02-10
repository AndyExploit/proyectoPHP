DROP DATABASE IF EXISTS php_crud;
CREATE DATABASE IF NOT EXISTS php_crud /*!40100 DEFAULT CHARACTER SET utf8 */;
USE php_crud;

DROP TABLE IF EXISTS `Tarea`;
CREATE TABLE IF NOT EXISTS `Tarea`(
	`Id` int NOT NULL auto_increment,
    `Titulo` Varchar(255),
    `Descripcion` Text,
    `FechaRegistro` datetime,
    PRIMARY KEY (`Id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
