CREATE DATABASE Moviepass;
USE Moviepass;
DROP DATABASE moviepass;
SELECT * FROM movies;
SELECT * FROM genres;
SELECT * FROM genresXmovies;
DROP TABLE genresXmovies;
SELECT * FROM users;

CREATE TABLE IF NOT EXISTS cinemas(
Id_cinema INT NOT NULL AUTO_INCREMENT,
CinemaName VARCHAR(30) NOT NULL,
TotalCapacity SMALLINT NOT NULL,
CinemaAddress VARCHAR(20) NOT NULL,
CONSTRAINT pk_IdCinema PRIMARY KEY (Id_cinema),
CONSTRAINT unq_CinemaName UNIQUE (CinemaName),
CONSTRAINT unq_CinemaAddress UNIQUE (CinemaAddress)
);
SELECT r.Id_room,r.RoomName,r.Capacity,r.TicketPrice,c.CinemaName 
			FROM rooms r INNER JOIN cinemas c ON c.Id_cinema=r.Id_cinema;

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

CREATE TABLE IF NOT EXISTS showing (
Id_showing INT NOT NULL AUTO_INCREMENT,
Date_showing DATE,
Time_showing TIME,
Id_room INT NOT NULL,
Id_movie INT NOT NULL,
CONSTRAINT pk_IdShowing PRIMARY KEY (Id_showing),
CONSTRAINT fk_Id_Room FOREIGN KEY (Id_room) REFERENCES rooms (Id_room),
CONSTRAINT fk_Id_Movie FOREIGN KEY (Id_movie) REFERENCES movies (Id_movie)
);

select * from cinemas inner join rooms on cinemas.Id_cinemas = rooms.Id_cinema;
select * from rooms inner join cinemas  on cinemas.Id_cinema = rooms.Id_cinema;

CREATE TABLE IF NOT EXISTS movies(
Id_movie INT NOT NULL,
Id_genre INT NOT NULL,
MovieName VARCHAR(30) NOT NULL,    
Id_room INT NOT NULL AUTO_INCREMENT,
RoomName VARCHAR(30) NOT NULL,
Capacity SMALLINT NOT NULL,
CONSTRAINT pk_IdRoom PRIMARY KEY (Id_room)
);

SELECT m.* FROM  movies m
INNER JOIN genresXmovies gXm 
ON (m.Id_movie = gXm.Id_movie)
INNER JOIN genres g 
ON (g.Id_genre = gXm.Id_genre)
WHERE(g.GenreName = 'Action');


SELECT g.Id_genre, g.GenreName, m.*
FROM genres g
INNER JOIN movies m 
ON (m.Id_movie = gXm.Id_movie)
LEFT JOIN genresXmovies gXm 
ON (g.Id_genre = gXm.Id_genre)
WHERE(m.Id_movie = '425001') && (g.GenreName = 'Comedy');

/*GROUP BY(m.Title);
*/
INSERT INTO genresXmovies (Id_movie,Id_genre) VALUES(1,3);

CREATE TABLE IF NOT EXISTS movies(
Id_movie INT NOT NULL,  
Poster_path VARCHAR(200)  NOT NULL,
Runtime SMALLINT NOT NULL,
Original_language VARCHAR(10),
Title VARCHAR(30) NOT NULL,
CONSTRAINT pk_IdMovie PRIMARY KEY (Id_movie),
CONSTRAINT fk_IdGenre FOREIGN KEY (Id_genre) REFERENCES genres (Id_genre)
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

drop table rooms;
select * from users;
select * from rooms;


