DROP TABLE MaxMovieID, MaxPersonID, Review, MovieRating, MovieActor, MovieDirector, MovieGenre, Director, Sales, Actor, Movie;

/*
id is the primary key of table Movie,
which means every movie has a unique identification number
*/
/*
check constrain : The year of movie much be later than 1895,
the start year of films
*/
CREATE TABLE Movie(
  id int not null, 
  title varchar(100),
  year int,
  rating varchar(10),
  company varchar(50),
  primary key (id),
  check(year >= 1895));

/*id is the primary key of table Actor,
which means every actor has a unique identification number
*/
/*
check constrain : The sex of actor has to be Male/ Female/ Not Applicable
*/
CREATE TABLE Actor(
  id int not null,
  last varchar(20), 
  first varchar(20), 
  sex varchar(6), 
  dob date, 
  dod date,
  primary key (id),
  check(sex = 'Male' or sex = 'Female' or sex = 'Not Applicable'));

/*
mid is the foreign key of table Sales. mid refers to the primary key in
table Movie. If the row with a specific id in table Movie is deleted, 
the row with the same mid in table Sales will also be deleted.
If some id is updated in table Movie, the same mids in table Sales will
also be updated.
*/
/*
check constrain : The ticketsSold of Sales has to be larger than 0
*/
CREATE TABLE Sales(
  mid int, 
  ticketsSold int, 
  totalIncome int,
  FOREIGN KEY (mid) references Movie(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  check(ticketsSold >= 0))ENGINE=INNODB;


/*id is the primary key of table Director,
which means every director has a unique identification number
*/
CREATE TABLE Director(
  id int not null, 
  last varchar(20), 
  first varchar(20), 
  dob date, 
  dod date,
  primary key (id));

/*
mid is the foreign key of table MovieGenre. mid refers to the primary key in
table Movie. If the row with a specific id in table Movie is deleted, 
the row with the same mid in table MovieGenre will also be deleted.
If some id is updated in table Movie, the same mids in table MovieGenre will
also be updated.
*/

CREATE TABLE MovieGenre(
  mid int, 
  genre varchar(20),
  FOREIGN KEY (mid) references Movie(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE)ENGINE=INNODB;


/*
mid is the foreign key of table MovieDirector. mid refers to the primary key in
table Movie. If the row with a specific id in table Movie is deleted, 
the row with the same mid in table MovieDirector will also be deleted.
If some id is updated in table Movie, the same mids in table MovieDirector will
also be updated.
*/
/*
did is the foreign key of table MovieDirector. mid refers to the primary key in
table Director. If the row with a specific id in table Director is deleted, 
the row with the same did in table MovieDirector will also be deleted.
If some id is updated in table Director, the same dids in table MovieDirector will
also be updated.
*/

CREATE TABLE MovieDirector(
  mid int, 
  did int,
  FOREIGN KEY (mid) references Movie(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  FOREIGN KEY (did) references Director(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE )ENGINE=INNODB;

/*
mid is the foreign key of table MovieActor. mid refers to the primary key in
table Movie. If the row with a specific id in table Movie is deleted, 
the row with the same mid in table MovieActor will also be deleted.
If some id is updated in table Movie, the same mids in table MovieActor will
also be updated.
*/
/*
aid is the foreign key of table MovieActor. mid refers to the primary key in
table Actor. If the row with a specific id in table Actor is deleted, 
the row with the same aid in table MovieActor will also be deleted.
If some id is updated in table Actor, the same aids in table MovieActor will
also be updated.
*/
CREATE TABLE MovieActor(
  mid int,
  aid int,
  role varchar(50),
  FOREIGN KEY (mid) references Movie(id) 
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  FOREIGN KEY (aid) references Actor(id) 
  ON DELETE CASCADE
  ON UPDATE CASCADE)ENGINE=INNODB;

CREATE TABLE MovieRating(
  mid int,
  imdb int, 
  rot int);

CREATE TABLE Review(
  name varchar(20), 
  time timestamp, 
  mid int, 
  rating int, 
  comment varchar(500));

CREATE TABLE MaxPersonID(
  id int);

CREATE TABLE MaxMovieID(
  id int);

