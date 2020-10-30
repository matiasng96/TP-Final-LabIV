CREATE DATABASE Moviepass;
USE Moviepass;

CREATE TABLE IF NOT EXISTS users(
UserId INT NOT NULL AUTO_INCREMENT,
UserName VARCHAR(30) NOT NULL,
UserLastName VARCHAR(30) NOT NULL,
UserGender VARCHAR(30) NOT NULL,
UserDni BIGINT (30) NOT NULL,
UserEmail VARCHAR(40) NOT NULL,
UserPassword VARCHAR(30) NOT NULL,
CONSTRAINT `PK-Id_users` PRIMARY KEY (UserId)
);
 
/*
CREATE TABLE IF NOT EXISTS users(
Id_users INT NOT NULL AUTO_INCREMENT,
U_name VARCHAR(30) NOT NULL,
U_email VARCHAR(40) NOT NULL,
U_lastName VARCHAR(30) NOT NULL,
U_password VARCHAR(30) NOT NULL,
U_gender VARCHAR(30) NOT NULL,
U_dni BIGINT NOT NULL,
CONSTRAINT `PK-Id_cinema` PRIMARY KEY (Id_users)
);
*/

CREATE TABLE IF NOT EXISTS cinemas(
Id_cinema INT NOT NULL AUTO_INCREMENT,
C_name VARCHAR(30) NOT NULL,
Capacity SMALLINT NOT NULL,
C_address VARCHAR(20) NOT NULL,
TicketPrice SMALLINT NOT NULL,
CONSTRAINT `PK-Id_cinema` PRIMARY KEY (Id_cinema)
);

CREATE TABLE IF NOT EXISTS movies(
Id_movie INT NOT NULL,
M_name VARCHAR(30) NOT NULL,    
Poster_path VARCHAR(200)  NOT NULL,
Title VARCHAR(30) NOT NULL,
CONSTRAINT `PK-Id_movie` PRIMARY KEY (Id_movie)
);

CREATE TABLE IF NOT EXISTS genres(
Id_genre INT NOT NULL,
G_name VARCHAR(30) NOT NULL,
CONSTRAINT `PK-Id_genre` PRIMARY KEY (Id_genre)
);

CREATE TABLE IF NOT EXISTS genresXmovies(
Id_genresXmovies INT NOT NULL AUTO_INCREMENT,
Id_movie INT NOT NULL,
Id_genre INT NOT NULL,
CONSTRAINT `PK-Id_genresXmovies` PRIMARY KEY (Id_genresXmovies),
CONSTRAINT `FK-Id_movie` FOREIGN KEY (Id_movie) REFERENCES movies (Id_movie),
CONSTRAINT `FK-Id_genre` FOREIGN KEY (Id_genre) REFERENCES genres (Id_genre)
);

SELECT * FROM users;

DROP TABLE users;
