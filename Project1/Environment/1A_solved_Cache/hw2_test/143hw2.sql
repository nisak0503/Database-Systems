#TestSample for 1 2
CREATE TABLE Employee(
	personname varchar(20),
	age int,
	street varchar(20),
	city varchar(5));
INSERT INTO Employee VALUES ('Alan', 21, 'Barstow', 'LA');
INSERT INTO Employee VALUES ('Jerry', 22, 'Barstow', 'LA');
INSERT INTO Employee VALUES ('Flora', 23, 'West', 'SF');
INSERT INTO Employee VALUES ('Grace', 22, 'East', 'LA');

CREATE TABLE Work(
	personname varchar(20),
	companyname varchar(20),
	salary int);
INSERT INTO Work VALUES ('Alan', 'Google', 21000);
INSERT INTO Work VALUES ('Alan', 'Apple', 20000);
INSERT INTO Work VALUES ('Jerry', 'Google', 25000);
INSERT INTO Work VALUES ('Flora', 'Amazon', 21000);
INSERT INTO Work VALUES ('Grace', 'Amazon', 22000);
INSERT INTO Work VALUES ('Grace', 'Apple', 28000);
INSERT INTO Work VALUES ('Kristine', 'Apple', 23000);
INSERT INTO Work VALUES ('Jennifer', 'Google', 22000);
INSERT INTO Work VALUES ('Joey', 'Amazon', 34000);


CREATE TABLE Company(
	companyname varchar(20),
	city varchar(5));
INSERT INTO Company VALUES('Apple', 'SF');
INSERT INTO Company VALUES('Apple', 'LA');
INSERT INTO Company VALUES('Amazon', 'LA');
INSERT INTO Company VALUES('Google', 'SF');

CREATE TABLE Manager(
	personname varchar(20),
	managername varchar(20));
INSERT INTO Manager VALUES('Alan', 'Kristine');
INSERT INTO Manager VALUES('Jerry', 'Jennifer');
INSERT INTO Manager VALUES('Flora', 'Joey');
INSERT INTO Manager VALUES('Grace', 'Kristine');

#TestSample for 6
CREATE TABLE Student
(sid int,
name varchar(20),
addr varchar(20),
age int,
GPA float
);

INSERT INTO Student VALUES (301, 'John', '181 West', 19, 2.1);
INSERT INTO Student VALUES (303, 'Elaine', '301 Wil', 17, 3.9);
INSERT INTO Student VALUES (401, 'James', '183 West', 17, 3.5);
INSERT INTO Student VALUES (208, 'Esther', '421 Wil', 20, 3.1);

CREATE TABLE Class
(dept varchar(20),
cnum int,
sec int,
unit int,
title varchar(20),
instructor varchar(20)
);

INSERT INTO Class VALUES ('CS', 112, 01, 03, 'Modeling', 'Dick Munk');
INSERT INTO Class VALUES ('CS', 143, 01, 04, 'DB systems', 'Carlo Zaniolo');
INSERT INTO Class VALUES ('EE', 143, 01, 03, 'Signal', 'Dick Munk');
INSERT INTO Class VALUES ('ME', 183, 02, 05, 'Mechanics', 'Susan Tracey');

CREATE TABLE Enroll
(sid int,
dept varchar(20),
cnum int,
sec int);

INSERT INTO Enroll VALUES (301, 'CS', 112, 01);
INSERT INTO Enroll VALUES (301, 'CS', 143, 01);
INSERT INTO Enroll VALUES (303, 'EE', 143, 01);
INSERT INTO Enroll VALUES (303, 'CS', 112, 01);
INSERT INTO Enroll VALUES (401, 'CS', 112, 01);


/*test sample for 7*/
create table Customer(
 customername varchar(255),
 street varchar(255),
 city varchar(255));
 
INSERT INTO Customer (customername, street, city)
VALUES ('Flora', 'West', 'LA');
INSERT INTO Customer (customername, street, city)
VALUES ('Alan', 'East', 'LA');
INSERT INTO Customer (customername, street, city)
VALUES ('Grace', 'North', 'SF');
INSERT INTO Customer (customername, street, city)
VALUES ('Jerry', 'West', 'LA');

create table Branch(
 branchname varchar(255),
 city varchar(255));

INSERT INTO Branch (branchname, city)
VALUES ('BOA',  'LA');
INSERT INTO Branch (branchname, city)
VALUES ('Chase',  'SF');
INSERT INTO Branch (branchname, city)
VALUES ('Region12',  'LA');
INSERT INTO Branch (branchname, city)
VALUES ('Citi',  'SF');


create table Account(
 customername varchar(255),
 branchname varchar(255),
 accountnumber varchar(255));
 
INSERT INTO Account (customername, branchname, accountnumber)
VALUES ('Flora', 'BOA', '01');
INSERT INTO Account (customername, branchname, accountnumber)
VALUES ('Flora', 'Chase', '01');
INSERT INTO Account (customername, branchname, accountnumber)
VALUES ('Flora', 'Region12', '02');
INSERT INTO Account (customername, branchname, accountnumber)
VALUES ('Alan', 'Region12', '03');
INSERT INTO Account (customername, branchname, accountnumber)
VALUES ('Alan', 'BOA', '05');
INSERT INTO Account (customername, branchname, accountnumber)
VALUES ('Grace', 'BOA', '04');





#1 (a) Write a query in SQL to find the names of persons 
#who work in one or more companies where they make a salary 
#that is less than $22,000.
SELECT DISTINCT personname
FROM Work
WHERE salary<22000;

#1 (b) Write an SQL query to find the names of persons who work 
#in one or more companies and make less than $22,000 in the majority 
#(i.e., 50% or more) of the companies they work for.

SELECT DISTINCT A.personname
FROM 
(SELECT personname, count(companyname) as num
FROM Work
GROUP BY personname) as A, 
(SELECT personname, count(salary) as num
FROM Work
WHERE salary < 22000
GROUP BY personname) as B

WHERE A.personname = B.personname 
AND A.num *0.5 < B.num ;

#2 (a) Find the name(s) of the employee(s) 
#whose total salary is higher than 
#those of all employees living in Barstow.
#Solution 1
SELECT personname
FROM Work
GROUP BY personname
HAVING sum(salary) > all (  SELECT sum(salary)
							FROM Work as w, Employee as e
							WHERE w.personname = e.personname AND e.Street = 'Barstow'
							GROUP BY e.personname );

#Solution 2
SELECT DISTINCT personname
FROM Work
WHERE personname in (
	SELECT A.aname
	FROM (SELECT personname as aname, sum(salary) as total
			FROM Work
			GROUP BY personname) as A,
	     (SELECT max(B.total) as maxtotal
    	  FROM (SELECT w.personname as bname, sum(salary) as total
			    FROM Work as w, Employee as e
			    WHERE w.personname = e.personname AND e.City = 'Barstow'
			    GROUP BY e.personname ) as B) as C
	 WHERE A.total> C.maxtotal
	);

#2 (b) Find the name(s) of the manager(s) 
#whose total salary is higher than that of at least one employee that they manage.
# Solution 1
SELECT managername
FROM Manager
WHERE managername NOT IN (
	SELECT m.managername
	FROM Manager m, Work w
	WHERE m.managername = w.personname
	GROUP BY m.managername
	HAVING sum(w.salary)/ count(m.personname) < all 
		(SELECT B.totall
		FROM ((SELECT sum(A.salary1) as totall, A.name, A.mn as mana
FROM (SELECT ma.personname as name, wo.salary as salary1, ma.managername as mn
FROM Manager ma, Work wo
WHERE ma.personname = wo.personname) as A
Group by A.name)) as B
		WHERE B.mana = m.managername)

) ;

#Solution 2
SELECT managername
FROM Manager M
WHERE EXISTS
(   SELECT *
	FROM (SELECT personname, SUM(salary) as totalsalary
		  FROM Work
		  GROUP BY personname) S1, 
	     (SELECT personname, SUM(salary) as totalsalary
		  FROM Work
		  GROUP BY personname) S2
	WHERE M.managername = S1.personname AND M.personname = S2.personname
	      AND S1.totalsalary > S2.totalsalary
);

#3 (a) Find the names and addresses of all female 
#movie stars who are also movie executives 
#with a net worth over $2,000,000
#3 (a) (i)
#The query using INTERSECT
SELECT ms.name, ms.address
FROM MovieStar ms
WHERE ms.gender = 'F'
INTERSECT
SELECT me.name, me.address
FROM MovieExec me
WHERE me.netWorth >2000000;
#3 (a) (ii)
#The query without using INTERSECT
SELECT ms.name, ms.address
FROM MovieStar ms, MovieExec me
WHERE ms.name = me.name AND ms.gender = 'F'AND me.netWorth >2000000;

#3 (b) Find the movie stars who are not movie executives.
#3 (b) (i)
#The query using EXCEPT
SELECT ms.name
FROM MovieStar ms
EXCEPT
SELECT me.name
FROM MovieExec me;
#3 (b) (ii)
#The query without using EXCEPT
SELECT ms.name
FROM MovieStar ms
WHERE ms.name NOT IN (SELECT me.name FROM MovieExec me);

#4 (a) Find the average speed of all desktop computers.
SELECT avg(speed)
FROM Desktop;

#4 (b) Find the average price of all laptops with weight below 2kg.
SELECT avg(cp.price)
FROM ComputerProduct cp, Laptop l
WHERE cp.model = l.model AND l.weight < 2;

#4 (c) Find the average price of PC’s and laptops made by “Dell.”
SELECT  avg(price)
FROM ComputerProduct
WHERE manufacturer = 'Dell';

#4 (d) For each different CPU speed, find the average price of a laptop.
SELECT  avg(speed)
FROM Laptop
GROUP BY speed;

#4 (e) Find the manufacturers that make at least three different computer models.
SELECT manufacturer
FROM ComputerProduct
GROUP BY manufacturer
HAVING COUNT(DISTINCT model) >= 3;

#5 (a) Using two INSERT statements, 
# insert a desktop computer manufactured by HP, 
#with model number 1200, price $1000, 
#speed 1.2Ghz, 256MB RAM, and an 80GB hard drive.
INSERT INTO ComputerProduct VALUES ('HP', 1200, 1000);
INSERT INTO Desktop VALUES (1200, 1.2, 256, 80);

#5 (b) Using two DELETE statements, 
#delete all desktops manufactured by IBM with price below $1000.
DELETE FROM Desktop WHERE Desktop.model in 
(SELECT cp.model 
	FROM ComputerProduct cp 
	WHERE cp.manufacturer = 'IBM' AND cp.price < 1000 );
DELETE FROM ComputerProduct WHERE manufacturer = 'IBM' AND price < 1000;

#5 (c) For each laptop made by Gateway, add one kilogram to the weight.
UPDATE Laptop SET weight = weight + 1 WHERE model in 
(SELECT cp.model 
	FROM ComputerProduct cp, Laptop l 
	WHERE cp.model = l.model AND cp.manufacturer = 'Gateway');

#6 (a) Find the students who are only enrolled in the CS classes 
#offered this quarter.
SELECT DISTINCT s.sid, s.name
FROM Student s, Enroll e
WHERE s.sid = e.sid AND e.dept = 'CS'
EXCEPT
SELECT DISTINCT s.sid, s.name
FROM Student s, Enroll e
WHERE s.sid = e.sid AND e.dept = 'EE';

#6 (b) Find the students who are enrolled in 
#all the CS classes offered quarter.
SELECT DISTINCT s.sid, s.name
FROM Student s, Enroll e
WHERE s.sid = e.sid AND NOT EXISTS
(SELECT c.cnum
	FROM Class c
	WHERE c.dept = 'CS'
	EXCEPT
	SELECT en.cnum
	FROM Enroll en
	WHERE en.dept = 'CS' AND s.sid = en.sid
);

#6 (c) a Solution2
SELECT DISTINCT s.sid, s.name
FROM Student s, Enroll e
WHERE s.sid = e.sid AND e.sid not in
(SELECT sid
FROM Enroll
WHERE dept != 'CS'
GROUP BY sid
HAVING COUNT(CNUM)<>0
);

#6 (c) b Solution2
SELECT DISTINCT s.sid, s.name
FROM Student s, Enroll e
WHERE s.sid = e.sid AND e.sid in
(SELECT sid
FROM Enroll
WHERE dept='CS'
GROUP BY sid
HAVING COUNT(cnum) = (SELECT COUNT(CNUM) 
						FROM CLASS 
						WHERE dept = 'CS'
					 ) 
);

#7
#3(b) Find the names of all customers 
#who have an account in a branch NOT located in the same city 
#that they live in.
SELECT DISTINCT a.customername
FROM Account a
WHERE EXISTS
(SELECT *
FROM Branch b, Customer c
WHERE a.customername = c.customername AND a.branchname = b. branchname
AND b.city <> c.city);

#3(c) Find the branches that do not have any accounts.
SELECT branchname
FROM Branch b
WHERE NOT EXISTS
(SELECT *
	FROM Account a
	WHERE a.branchname = b.branchname
	GROUP BY a.branchname
	HAVING COUNT(a.customername) <>0
)

#3(d) Find the customer names 
#who do not have any account in the ‘Region12’ branch.
SELECT customername
FROM Customer
WHERE customername not in
(SELECT a.customername
	FROM Account a
	WHERE a.branchname = "Region12"
)

#3(e) Find the customer names 
#who have accounts in all the branches located in ‘Los Angeles’. 
SELECT a.customername
FROM Account a, Branch b
WHERE a.branchname = b.branchname AND b.city = 'LA'
GROUP BY a.customername
HAVING COUNT(a.branchname) =
(SELECT COUNT(br.branchname)
FROM Branch br
WHERE br.city = 'LA');