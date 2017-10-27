This is the part A of Project 1. 

Through this part, we have built a Web Query Interface.

When you input a query, and then submit, you can get the answer of that query. (For empty set, you will be shown just column names.)

Unfortunately, if you fail to give a query, you will be warned "Please input a query!"; if you fail to give a valid query, you will be warned "invalid query!" and error messages; if you just update a table, you won't be shown the table, but just number of total affected rows.

Also, we have added some constraints to the tables. Queries that violates the constraints will not be accepted. 



PS: check is invalid in mySQL, thus check constraints makes no difference. In violate.sql, the first two checks do not work due to the reason above. However, the third check seems to work but in fact it is the foreign key constraint works, not the check. See the example below:

INSERT INTO Sales Values(4736, -250, 250);

ERROR Message:
Cannot add or update a child row: a foreign key constraint fails (`TEST`.`Sales`, CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)
