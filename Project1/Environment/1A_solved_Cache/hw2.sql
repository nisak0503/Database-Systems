#TestSample
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