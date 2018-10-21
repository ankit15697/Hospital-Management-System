/*
 creating a database;
*/
create database health;
use health;
create table Admin(
 user_id varchar(10),
 pwd varchar(10),
 primary key(user_id)
);
alter table Admin Engine=InnoDB;

-- Inserting data into admin table

insert into Admin
values('ankit','krati');

-- creating table for doctor login

CREATE TABLE IF NOT EXISTS Doctors (
  user_id varchar(20) NOT NULL,
  pwd varchar(20) NOT NULL,
  first_name varchar(30) NOT NULL,
  middle_name varchar(30) DEFAULT NULL,
  last_name varchar(30) DEFAULT NULL,
  email varchar(30) NOT NULL,
  mob varchar(11) NOT NULL,
  address_line1 varchar(50) NOT NULL,
  address_line2 varchar(50) DEFAULT NULL,
  address_line3 varchar(50) DEFAULT NULL,
  desease varchar(30) NOT NULL,
  primary key(user_id)
);
alter table Doctors Engine=InnoDB;

-- inserting data into doctor table

insert into Doctors
values('ankit1','krati','Ankit','','Mishra','ankitmcamnnit@gmail.com','9140552958','TIlak','','','Acne');
insert into Doctors
values('ankit2','krati','Rahul','','Mishra','ra515@gmail.com','8858352452','PG','','','Allergy');
insert into Doctors
values('ankit3','krati','Ram','','Mishra','kra1556t@gmail.com','8009423756','Unnao','','','Muscle Pain');


--     creating table for customer
CREATE TABLE Customers (
  user_id varchar(11) NOT NULL,
  first_name varchar(30) NOT NULL,
  middle_name varchar(30) DEFAULT NULL,
  last_name varchar(30) DEFAULT NULL,
  email varchar(30) NOT NULL,
  mob varchar(11) NOT NULL,
  address_line1 varchar(50) NOT NULL,
  address_line2 varchar(50) DEFAULT NULL,
  address_line3 varchar(50) DEFAULT NULL,
  desease varchar(30) NOT NULL,
  primary key(user_id)
);
alter table Customers Engine=InnoDB;

-- inserting data into Customer table

insert into Customers
values('ram1','Ram','','','abc@gmail.com','9140552958','Knp','','','Acne');
insert into Customers
values('ram2','Ankit','','','abc@gmail.com','9140552958','Unnao','','','Allergy');
insert into Customers
values('ram3','Shyamu','','','abc@gmail.com','9140552958','Knp','','','Muscle Pain');


-- Creating Table for appointment

CREATE TABLE IF NOT EXISTS Appointments (
  duser_id varchar(20) NOT NULL,
  cuser_id varchar(30) NOT NULL,
  date1 varchar(13) NOT NULL,
  primary key(duser_id,cuser_id)
);
alter table Appointments Engine=InnoDB;
alter table Appointments
add foreign key(duser_id) references Doctors(user_id);
alter table Appointments 
add foreign key(cuser_id) references Customers(user_id)
 ON DELETE CASCADE;
insert into Appointments
values('ankit1','ram1','20/10/2018');
insert into Appointments
values('ankit2','ram2','20/10/2018');
insert into Appointments
values('ankit3','ram3','20/10/2018');
