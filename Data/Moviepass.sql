CREATE DATABASE Moviepass;
USE Moviepass;

drop database Moviepass;

CREATE TABLE IF NOT EXISTS cinemas(
Id_cinema INT NOT NULL AUTO_INCREMENT,
CinemaName VARCHAR(30) NOT NULL,
TotalCapacity SMALLINT NOT NULL,
CinemaAddress VARCHAR(20) NOT NULL,
CONSTRAINT pk_IdCinema PRIMARY KEY (Id_cinema),
CONSTRAINT unq_CinemaName UNIQUE (CinemaName),
CONSTRAINT unq_CinemaAddress UNIQUE (CinemaAddress)
);

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

CREATE TABLE IF NOT EXISTS showtime (
Id_showtime INT NOT NULL AUTO_INCREMENT,
Date_showtime DATE,
Time_showtime TIME,
Tickets INT NOT NULL,
Id_room INT NOT NULL,
Id_movie INT NOT NULL,
Is_available BIT,
CONSTRAINT pk_IdShowtime PRIMARY KEY (Id_showtime),
CONSTRAINT fk_Id_Room FOREIGN KEY (Id_room) REFERENCES rooms (Id_room),
CONSTRAINT fk_Id_Movie FOREIGN KEY (Id_movie) REFERENCES movies (Id_movie)
);

CREATE TABLE IF NOT EXISTS movies(
Id_movie INT NOT NULL,  
Poster_path VARCHAR(200)  NOT NULL,
Runtime SMALLINT NOT NULL,
Original_language VARCHAR(10),
Title VARCHAR(30) NOT NULL,
CONSTRAINT pk_IdMovie PRIMARY KEY (Id_movie)
);

CREATE TABLE IF NOT EXISTS genres(
Id_genre INT NOT NULL,
GenreName VARCHAR(30) NOT NULL,
CONSTRAINT pk_IdGenre PRIMARY KEY (Id_genre)
);

CREATE TABLE IF NOT EXISTS genresXmovies(
Id_genresXmovies INT NOT NULL AUTO_INCREMENT,
Id_movie INT NOT NULL,
Id_genre INT NOT NULL,
CONSTRAINT pk_IdGenresXmovies PRIMARY KEY (Id_genresXmovies),
CONSTRAINT fk_IdMovie FOREIGN KEY (Id_movie) REFERENCES movies (Id_movie),
CONSTRAINT fk_IdGenre FOREIGN KEY (Id_genre) REFERENCES genres (Id_genre)
);

CREATE TABLE IF NOT EXISTS users(
UserId INT NOT NULL AUTO_INCREMENT,
UserName VARCHAR(30) NOT NULL,
UserEmail VARCHAR(30) NOT NULL,
UserLastName VARCHAR(30) NOT NULL,
UserPassword VARCHAR(30) NOT NULL,
UserGender VARCHAR(40) NOT NULL,
UserDni BIGINT NOT NULL,
Id_userRole INT NOT NULL,
CONSTRAINT pk_IdUsers PRIMARY KEY (UserId),
CONSTRAINT unq_Email UNIQUE(UserEmail),
CONSTRAINT fk_usersRoles FOREIGN KEY (Id_userRole) REFERENCES userRole (Id_role)
);

CREATE TABLE IF NOT EXISTS userRole (
Id_role INT NOT NULL auto_increment,
RoleDescrip VARCHAR (40) NOT NULL,
CONSTRAINT pk_IdRole PRIMARY KEY (Id_role),
CONSTRAINT unq_user_roles UNIQUE(RoleDescrip)
);

insert into userRole (RoleDescrip) values ("Admin");
insert into userRole (RoleDescrip) values ("User");

drop table showtime;
select * from showtime;
select * from rooms;

SELECT * FROM movies;
SELECT * FROM userRole;
SELECT * FROM genresXmovies;
DROP TABLE genresXmovies;
