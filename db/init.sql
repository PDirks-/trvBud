create schema trvCities;

set search_path trvCities;

create table cities(
	country varchar(25),
	city_raw varchar(50),
	city varchar(50),
	region varchar(50),
	population varchar(25),
	latitude varchar(25),
	longitude varchar(25),
	

\copy cities from './worldcitiespop.txt' delimiter ','
