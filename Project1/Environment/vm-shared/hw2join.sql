CREATE TABLE MotherChild(
 mother varchar(255),
 child varchar(255));

INSERT INTO MotherChild (mother, child)
VALUES ('Lisa','Mary');
INSERT INTO MotherChild (mother, child)
VALUES ('Lisa','Greg');
INSERT INTO MotherChild (mother, child)
VALUES ('Anne','Kim');
INSERT INTO MotherChild (mother, child)
VALUES ('Anne','Phil');
INSERT INTO MotherChild (mother, child)
VALUES ('Mary','Andy');
INSERT INTO MotherChild (mother, child)
VALUES ('Mary','Rob');

CREATE TABLE FatherChild(
father varchar(255),
child varchar(255));

INSERT INTO FatherChild (father, child)
VALUES ('Steve','Frank');
INSERT INTO FatherChild (father, child)
VALUES ('Greg','Kim');
INSERT INTO FatherChild (father, child)
VALUES ('Greg','Phil');
INSERT INTO FatherChild (father, child)
VALUES ('Frank','Andy');
INSERT INTO FatherChild (father, child)
VALUES ('Frank','Rob');

CREATE TABLE Person(
name varchar(255),
age int,
income int);

INSERT INTO Person (name, age, income)
VALUES ('Andy', 27, 21);
INSERT INTO Person (name, age, income)
VALUES ('Rob', 25, 15);
INSERT INTO Person (name, age, income)
VALUES ('Mary', 55, 42);
INSERT INTO Person (name, age, income)
VALUES ('Anne', 50, 35);
INSERT INTO Person (name, age, income)
VALUES ('Phil', 26, 30);
INSERT INTO Person (name, age, income)
VALUES ('Greg', 50, 40);
INSERT INTO Person (name, age, income)
VALUES ('Frank', 60, 20);
INSERT INTO Person (name, age, income)
VALUES ('Kim', 30, 41);
INSERT INTO Person (name, age, income)
VALUES ('Mike', 85, 35);
INSERT INTO Person (name, age, income)
VALUES ('Lisa', 75, 87);