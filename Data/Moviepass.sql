CREATE DATABASE Moviepass;
USE Moviepass;
#DROP DATABASE moviepass;

SELECT * FROM movies;
SELECT * FROM genres;
SELECT * FROM genresXmovies;

SELECT r.Id_room,r.RoomName,r.Capacity,r.TicketPrice,c.CinemaName 
			FROM rooms r INNER JOIN cinemas c ON c.Id_cinema=r.Id_cinema;
#===============TABLA CINEMAS=============================
CREATE TABLE IF NOT EXISTS cinemas(
Id_cinema INT NOT NULL AUTO_INCREMENT,
CinemaName VARCHAR(30) NOT NULL,
TotalCapacity SMALLINT NOT NULL,
CinemaAddress VARCHAR(20) NOT NULL,
CONSTRAINT pk_IdCinema PRIMARY KEY (Id_cinema),
CONSTRAINT unq_Cinema_name UNIQUE (CinemaName),
CONSTRAINT unq_Cinema_address UNIQUE (CinemaAddress)
);


#===============TABLA SALAS=============================
CREATE TABLE IF NOT EXISTS rooms(
Id_room INT NOT NULL AUTO_INCREMENT,
Id_cinema INT NOT NULL,
CinemaName VARCHAR(20) NOT NULL,
RoomName VARCHAR(20) NOT NULL,
TicketPrice FLOAT NOT NULL,
Capacity INT NOT NULL,
CONSTRAINT pk_IdRoom PRIMARY KEY(Id_room),
CONSTRAINT fk_idCinema FOREIGN KEY (Id_cinema) REFERENCES cinemas (Id_cinema)
);

#===============TABLA GENEROS=============================
CREATE TABLE IF NOT EXISTS genres(
Id_genre INT NOT NULL,
GenreName VARCHAR(30) NOT NULL,
CONSTRAINT `PK-Id_genre` PRIMARY KEY (Id_genre)
);

#===============TABLA PELICULAS=============================
CREATE TABLE IF NOT EXISTS movies(
Id_movie INT NOT NULL,  
Poster_path VARCHAR(200)  NOT NULL,
Runtime SMALLINT NOT NULL,
Original_language VARCHAR(10),
Title VARCHAR(30) NOT NULL,
CONSTRAINT `PK-Id_movie` PRIMARY KEY (Id_movie)
);
#===============TABLA GENEROSXPELICULAS=============================
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
Id_userRole BIT NOT NULL,
CONSTRAINT `PK-Id_users` PRIMARY KEY (UserId),
CONSTRAINT `unq_email` UNIQUE(UserEmail),
CONSTRAINT `fk_users_roles` FOREIGN KEY(id_userRole) REFERENCES userRole (id_role)
);



DROP TABLE USERS;
DROP TABLE USERROLE;


