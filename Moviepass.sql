CREATE DATABASE Moviepass;
USE Moviepass;

CREATE TABLE cinemas(

namecinema VARCHAR(20) NOT NULL,
capacity CHAR (5) NOT NULL,
address VARCHAR(20) NOT NULL,
ticketPrice CHAR (5) NOT NULL
);

CREATE TABLE peliculas(
poster_path,
id CHAR (5) NOT NULL,
genre_ids,
titleVARCHAR(20) NOT NULL
);

/*
CREATE TABLE players(

playerCode CHAR (5) NOT NULL,
firstName VARCHAR(20) NOT NULL,
lastName VARCHAR(20) NOT NULL,
email VARCHAR(50) NOT NULL,
playedHours DECIMAL (10,2),
CONSTRAINT pk_Players PRIMARY KEY (playerCode)
)ENGINE = INNODB;
*/