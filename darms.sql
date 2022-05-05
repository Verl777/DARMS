use dars;
drop database dars;
create database darms;
use darms;
create table patient(
patient_id int(10) not null primary key,
patient_name varchar(100) not null,
Date_of_birth date not null,
patient_mobile varchar(100),
patient_gender varchar(50) not null,
patient_email varchar(100),
patient_address varchar(100),
guardian varchar(100),
password varchar(100),
createdat date
);
alter table patient 
add user_id int(10) not null;
create table users(
user_id int(10) not null primary key,
user_name varchar(100) not null,
user_mobile varchar(100),
user_email varchar(100) not null,
user_password varchar(50) not null,
createdat date,
user_role varchar(50)
); 
create table room(
room_id int(10) not null,
room_name varchar(100) not null,
room_status varchar(50) not null,
no_of_beds int(10) not null
);
alter table room add primary key(room_id);
create table allocation(
allocation_id int(10) not null primary key,
patient_id int(10) not null,
room_id int(10) not null,
createdat date
);
create table progress(
progress_id int(10) not null primary key,
patient_id int(10) not null,
therapist_id int(10) not null,
comments varchar(500) not null,
remarks varchar(200) not null
);
create table appointment(
appointment_id int(10) not null primary key,
doctor_id int(10) not null,
patient_id int(10) not null,
appointment_date date not null,
appointment_time time not null,
createdat date
);
describe appointment;
alter table patient
add foreign key (user_id) references users(user_id);
alter table allocation
add foreign key (room_id) references room(room_id);
alter table progress
add foreign key (patient_id) references patient(patient_id);
alter table progress
add foreign key (therapist_id) references users(user_id);
alter table appointment
add foreign key (doctor_id) references users(user_id);
alter table appointment
add foreign key (patient_id) references patient(patient_id);