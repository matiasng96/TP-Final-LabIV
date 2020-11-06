CREATE DATABASE Moviepass;
USE Moviepass;
DROP DATABASE moviepass;
SELECT * FROM movies;
SELECT * FROM genres;

CREATE TABLE IF NOT EXISTS cinemas(
Id_cinema INT NOT NULL AUTO_INCREMENT,
CinemaName VARCHAR(30) NOT NULL,
TotalCapacity SMALLINT NOT NULL,
CinemaAddress VARCHAR(20) NOT NULL,
CONSTRAINT `PK-Id_cinema` PRIMARY KEY (Id_cinema),
CONSTRAINT unq_Cinema_name UNIQUE (CinemaName),
CONSTRAINT unq_Cinema_address UNIQUE (CinemaAddress)
);

CREATE TABLE IF NOT EXISTS rooms(
Id_room INT NOT NULL AUTO_INCREMENT,
RoomName VARCHAR(30) NOT NULL,
Capacity SMALLINT NOT NULL,
CONSTRAINT `PK-Id_room` PRIMARY KEY (Id_room)
);


SELECT * FROM movies;
SELECT * FROM genresXmovies;
SELECT * FROM genres;


SELECT m.Title, g.GenreName, m.Runtime, m.Original_language , m.Poster_path
FROM movies m
INNER JOIN genresXmovies gXm 
ON (m.Id_movie = gXm.Id_movie)
INNER JOIN genres g
ON (g.Id_genre = gXm.Id_genre)

GROUP BY(m.Title);

INSERT INTO genresXmovies (Id_movie,Id_genre) VALUES(1,3);

CREATE TABLE IF NOT EXISTS movies(
Id_movie INT NOT NULL,  
Poster_path VARCHAR(200)  NOT NULL,
Runtime SMALLINT NOT NULL,
Original_language VARCHAR(10),
Title VARCHAR(30) NOT NULL,
CONSTRAINT `PK-Id_movie` PRIMARY KEY (Id_movie)
);

CREATE TABLE IF NOT EXISTS genres(
Id_genre INT NOT NULL,
GenreName VARCHAR(30) NOT NULL,
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


CREATE TABLE IF NOT EXISTS users(
UserId INT NOT NULL AUTO_INCREMENT,
UserName VARCHAR(30) NOT NULL,
UserEmail VARCHAR(30) NOT NULL,
UserLastName VARCHAR(30) NOT NULL,
UserPassword VARCHAR(30) NOT NULL,
UserGender VARCHAR(40) NOT NULL,
UserDni BIGINT NOT NULL,
UserAdmin BIT NOT NULL,
CONSTRAINT `PK-Id_users` PRIMARY KEY (UserId)
);