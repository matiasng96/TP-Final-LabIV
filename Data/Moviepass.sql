CREATE DATABASE Moviepass;
USE Moviepass;


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
<<<<<<< HEAD
RoomName VARCHAR(20) NOT NULL,
TicketPrice FLOAT NOT NULL,
Capacity INT NOT NULL
);


CREATE TABLE IF NOT EXISTS movies(
Id_movie INT NOT NULL,
Id_genre INT NOT NULL,
MovieName VARCHAR(30) NOT NULL,    
=======
Id_room INT NOT NULL AUTO_INCREMENT,
RoomName VARCHAR(30) NOT NULL,
Capacity SMALLINT NOT NULL,
CONSTRAINT `PK-Id_room` PRIMARY KEY (Id_room)
);



CREATE TABLE IF NOT EXISTS movies(
Id_movie INT NOT NULL,  
>>>>>>> TestNicolas
Poster_path VARCHAR(200)  NOT NULL,
Title VARCHAR(30) NOT NULL,
CONSTRAINT `PK-Id_movie` PRIMARY KEY (Id_movie),
CONSTRAINT `FK-Id_genre` FOREIGN KEY (Id_genre) REFERENCES genres (Id_genre)
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
<<<<<<< HEAD
);
=======
);
>>>>>>> TestNicolas
