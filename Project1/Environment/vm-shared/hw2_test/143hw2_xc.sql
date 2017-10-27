Drop Table Employee, Work, Company, Manager, Student, Class, Enroll, Customer, Branch, Account;
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


