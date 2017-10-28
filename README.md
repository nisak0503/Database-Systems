# Database-Systems
CS143 at UCLA project with Flora Dou.

# Project1A mainly created and loaded database for a simple web query interface.

Here are the README for Project 1A.
"This is the part A of Project 1. 

Through this part, we have built a Web Query Interface.

When you input a query, and then submit, you can get the answer of that query. (For empty set, you will be shown just column names.)

Unfortunately, if you fail to give a query, you will be warned "Please input a query!"; if you fail to give a valid query, you will be warned "invalid query!" and error messages; if you just update a table, you won't be shown the table, but just number of total affected rows.

Also, we have added some constraints to the tables. Queries that violates the constraints will not be accepted. 



PS: check is invalid in mySQL, thus check constraints makes no difference. In violate.sql, the first two checks do not work due to the reason above. However, the third check seems to work but in fact it is the foreign key constraint works, not the check. See the example below:

INSERT INTO Sales Values(4736, -250, 250);

ERROR Message:
Cannot add or update a child row: a foreign key constraint fails (`TEST`.`Sales`, CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)"

My work: create.sql, load.sql, query.php, violate.sql
Flora added keys, contrains to create.sql and provided examples in queries.sql, readme.txt


# Project1B built a website maintaining queries with Actor, Movie and Information page for both of them.
People can add actor information to database, add movie information to database and search specific actors like "Tom Hanks" and Movies even with uncompleted name like "Harry Potter". According to the requirement, we'll show actors with name "12hanks4 12tom2132", too. We linked Actors to the movies they played a role in. We also linked movies with their actors. In this way, page jumps between links.

My work: built search page and Information Page (with links) for both Actors and Movies.
Flora built add pages for actors, movies and reviews.