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

CREATE TABLE tblconference(
	conf_id			INT(6),
	conf_name		VARCHAR(50),
	conf_startdate	DATE,
	conf_enddate	DATE,
	conf_numpass	INT(4),
	caterer_id		INT(6),
	venue_id		INT(6),
	
PRIMARY KEY(conf_id)
FOREIGN KEY(caterer_id) REFERENCES tblcaterer(caterer_id)
FOREIGN KEY(venue_id) REFERENCES tblvenue(venue_id)
);

CREATE TABLE tblconfpass(
	confpass_reference	INT(6),
	conf_id				INT(6),
	pass_type			VARCHAR(25),
	pass_price			INT(5),
	pass_sponsor		VARCHAR(11),
	
PRIMARY KEY(confpass_reference)
FOREIGN KEY(conf_id) REFERENCES tblconference(conf_id)
FOREIGN KEY(pass_type) REFERENCES tblpasstype(pass_type)
FOREIGN KEY(pass_price) REFERENCES tblpasstype(pass_price)
FOREIGN KEY(pass_sponsor) REFERENCES tblpasstype(pass_sponsor)
);

CREATE TABLE tblpasstype(
	pass_id			INT(6),
	pass_type		VARCHAR(25),
	pass_price		INT(5),
	pass_amount		INT(4),
	pass_sponsor	INT(11),
	
PRIMARY KEY(passid)
); 

CREATE TABLE tblsessions(
	session_id			INT(6),
	session_day			DATE,
	session_starttime	TIME,
	sesson_endtime		TIME,
	session_room		INT(2),
	speaker_id			INT(6),
	speaker_firstname	VARCHAR(30),
	conf_name			VARCHAR(50),
	
PRIMARY KEY (session_id)
FOREIGN KEY(speaker_id) REFERENCES tblspeaker(speaker_id)
FOREIGN KEY(speaker_firstname) REFERENCES tblspeaker(speaker_firstname)
FOREIGN KEY (conf_name) REFERENCES tblconference(conf_name)
);

CREATE TABLE tblvenue(
	venue_id			INT(6),
	venue_name			VARCHAR(50),
	venue_address		VARCHAR(80),
	venue_nrooms		INT(2),

PRIMARY KEY(venue_id)
);

CREATE TABLE tblbookingdetails(
	booking_id			INT(6),
	p_id				INT(6),
	p_firstname			VARCHAR(20),
	p_surname			VARCHAR(30),
	confpass_reference	INT(6),
	hotel_name			VARCHAR(40),
	start_date			DATE,
	end_date			DATE,
	
PRIMARY KEY(booking_id)
FOREIGN KEY(p_id) REFERENCES tblparticipant(p_id)
FOREIGN KEY(p_firstname) REFERENCES tblparticipant(p_firstname)
FOREIGN KEY(p_surname) REFERENCES tblparticipant(p_surname)
FOREIGN KEY(confpass_reference) REFERENCES tblconfpass(confpass_reference)
);

CREATE TABLE tblconf_sponsor(
	sponsor_id		INT(6),
	conf_id			INT(6),
	amountprovided	INT(5),
	
FOREIGN KEY (conf_id) REFERENCES tblconference(conf_id)
FOREIGN KEY (sponsor_id) REFERENCES tblsponsor(sponsor_id)	
);

CREATE TABLE tblconf_participant(
	conf_id				INT(6),
	p_id				INT(6),
	confpass_reference	INT(6),
	p_country			VARCHAR(30),
	pass_price			INT(5),

FOREIGN KEY (conf_id) REFERENCES tblconference(conf_id)
FOREIGN KEY (p_id) REFERENCES tblparticipant(p_id)
FOREIGN KEY (confpass_reference) REFERENCES tblconfpass(confpass_reference)
FOREIGN KEY (p_country) REFERENCES tblparticipant(p_country)
FOREIGN KEY (pass_price) REFERENCES tblpasstype(pass_price)
);