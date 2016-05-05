CREATE TABLE tbleventmanager(
	em_id			INT(6),
	em_username		VARCHAR(15),
	em_password		VARCHAR(15),
	em_firstname	VARCHAR(15),
	em_lastname		VARCHAR(25),
	em_phone		INT(15),
	em_email		VARCHAR(50),
PRIMARY KEY(em_id)
);

CREATE TABLE tblconference(
	conf_id			INT(6),
	conf_name		VARCHAR(50),
	conf_startdate	DATE,
	conf_enddate	DATE,
	conf_numpass	INT(4),
	caterer_id		INT(6),
PRIMARY KEY(conf_id)
FOREIGN KEY(caterer_id) REFERENCES tblcaterer(caterer_id)
);

CREATE TABLE tblcaterer(
	caterer_id		INT(6),
	caterer_name	VARCHAR(40),
	caterer_phone	INT(15),
	caterer_email	VARCHAR(50),
PRIMARY KEY(caterer_id)
);

CREATE TABLE tblparticipant(
	p_id			INT(6),
	p_username		VARCHAR(20),
	p_password		VARCHAR(15),
	p_firstname		VARCHAR(20),
	p_surname		VARCHAR(30),
	p_email			VARCHAR(50),
	p_phone			INT(15),
	p_dob			DATE,
	p_address		VARCHAR(50),
	p_country		VARCHAR(30),
	p_city			VARCHAR(30),
	p_state			VARCHAR(30),
	p_postalcode	VARCHAR(10),		
	p_newsletter	BOOLEAN,
	p_occupation	VARCHAR(30),
	
PRIMARY KEY(p_id)
);

CREATE TABLE tblspeaker(
	speaker_id			INT(6),
	speaker_firstname	VARCHAR(30),
	speaker_lastname	VARCHAR(40),
	speaker_details		TEXT,
PRIMARY KEY(speaker_id)
);

CREATE TABLE tblsponsor(
	sponsor_id		INT(6),
	sponsor_name	VARCHAR(50),
	sponsor_email	VARCHAR(50),
	sponsor_phone	INT(15),
	sponsor_logo 	LONGBLOB,
PRIMARY KEY(sponsor_id)
);

CREATE TABLE tblconfpass(

PRIMARY KEY()
);

CREATE TABLE tblschedule(

PRIMARY KEY()
);


