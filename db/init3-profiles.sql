CREATE TABLE profile(
	username varchar(30) not null,
    registration_date timestamp without time zone DEFAULT now() NOT NULL
);

create table trip(
	trip_name varchar(30) not null,
	username varchar(30) not null,
	tripID serial
);

create table tripDetails(
	tripID serial,
	location varchar(30),
	country varchar(2),
	arrive varchar(15),
	depart varchar(15)
);

CREATE TABLE log (
    log_id serial,
    username character varying(30) NOT NULL,
    ip_address character varying(15) NOT NULL,
    log_date timestamp without time zone DEFAULT now() NOT NULL,
    action character varying(50) NOT NULL
);

CREATE TABLE authentication (
    username character varying(30) NOT NULL,
    passwrd character(40) NOT NULL,
    salt character(40) NOT NULL
);
