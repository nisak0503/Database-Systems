
# 1 primary key(id), table Movie
# violate with 
# (2, "Til There Was You", 1997, "PG-13", "Lakeshore Entertainment")
INSERT INTO Movie Values(2, "Harry Potter", 2001, "R", "Hogwarts Entertainment");
#output:
# Duplicate entry '2' for key 'PRIMARY'


# 2 check(year >= 1895)
# insert value with year = 1700 < 1895 is invalid
INSERT INTO Movie Values(13000, "Monkey King", 1700, "R", "Dahua Entertainment");
#output:
# Total affected rows: 1


# 3 primary key(id), table Actor
# violate with 
# (10, "Aaltonen", "Minna", "Female"  19660917  NULL)
INSERT INTO Actor Values(10, "Potter", "Albus", "Male", 19800731, 20800731);
#output:
# Duplicate entry '10' for key 'PRIMARY'


# 4 check(sex = 'Male' or sex = 'Female' or sex = 'Not Applicable');
INSERT INTO Actor Values(2, "Potter", "Harry", 'unknown', 19800731, 20800731);
#output:
#Total affected rows: 1


# 5 foreign key(mid) in Sales references Movie(id) 
# not allowing update mid in Sales
# (Sales table does not have row with mid = 4735)
Update Sales set mid = 4735 where mid = 4734;
#output:
#Cannot add or update a child row: a foreign key constraint fails (`TEST`.`Sales`, CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)

# 6 check (tickesSold >= 0)
# violate with
# ticksSold = -250
INSERT INTO Sales Values(4736, -250, 250);
#output:
#Cannot add or update a child row: a foreign key constraint fails (`TEST`.`Sales`, CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)


# 7 primary key(id), table Director
# violate with 
# (16, "Aames", "Willie", 19600715  NULL);
INSERT INTO Director Values(16, "Alan", "He", 19970530, 29970530);
#output:
#Duplicate entry '16' for key 'PRIMARY'


# 8 foreign key(mid) in MovieGenre references Movie(id) 
# not allowing update mid in MovieGenre
# (MovieGenre table does not have row with mid = 4737)
Update MovieGenre set mid = 4737 where mid = 4733;
#output:
#Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)


# 9 foreign key(mid) in MovieDirector references Movie(id) 
# not allowing update mid in MovieDirector
# (MovieDirector table does not have row with mid = 4738)
Update MovieDirector set mid = 4738 where mid = 4732;
#output:
#Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)


# 10 foreign key(did) in MovieDirector references Director(id) 
# not allowing update did in MovieDirector
# (MovieDirector table does not have row with did = 1)
Update MovieDirector set did = 1 where did = 112;
#output:
#Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_2` FOREIGN KEY (`did`) REFERENCES `Director` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)


# 11 foreign key(mid) in MovieActor references Movie(id) 
# not allowing update did in MovieActor
# (MovieActor table does not have row with mid = 4739)
Update MovieActor set mid = 4739 where mid = 4730;
#output:
#Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)


# 12 foreign key(aid) in MovieActor references Actor(id) 
# not allowing update did in MovieActor
# (MovieActor table does not have row with aid = 18)
Update MovieActor set aid = 18 where aid = 19;
#output:
#Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `Actor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)
