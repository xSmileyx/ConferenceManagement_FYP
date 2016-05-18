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
	p_email			VARCHAR(50),
	p_password		VARCHAR(15),
	p_firstname		VARCHAR(20),
	p_surname		VARCHAR(30),
	p_phone			INT(15),
	p_dob			DATE,
	p_address		VARCHAR(50),
	p_country		VARCHAR(30),
	p_city			VARCHAR(30),
	p_state			VARCHAR(30),	
	p_occupation	VARCHAR(30),	
	p_newsletter	BOOLEAN,
	
PRIMARY KEY(p_id)
);

CREATE TABLE tblspeaker(
	speaker_id			INT(6),
	speaker_firstname	VARCHAR(30),
	speaker_lastname	VARCHAR(40),
	speaker_details		TEXT,
	speaker_image		LONGBLOB,

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

CREATE TABLE tblvenue(
	venue_id			INT(6),
	venue_name			VARCHAR(50),
	venue_address		VARCHAR(80),
	venue_nrooms		INT(2),

PRIMARY KEY(venue_id)
);

CREATE TABLE tblpasstype(
	pass_id			INT(6),
	pass_type		VARCHAR(25),
	pass_desc		VARCHAR(255),
	pass_price		INT(5),
	pass_amount		INT(4),
	
PRIMARY KEY(pass_id)
); 

CREATE TABLE tblconference(
	conf_id			INT(6),
	conf_name		VARCHAR(50),
	conf_startdate	DATE,
	conf_enddate	DATE,
	caterer_id		INT(6),
	venue_id		INT(6),
	em_id			INT(6),
	conf_desc		TEXT,
	
PRIMARY KEY(conf_id),
FOREIGN KEY(em_id) REFERENCES tbleventmanager(em_id),
FOREIGN KEY(caterer_id) REFERENCES tblcaterer(caterer_id),
FOREIGN KEY(venue_id) REFERENCES tblvenue(venue_id)
);

CREATE TABLE tblconf_sponsor(
	cs_index		INT(6),
	sponsor_id		INT(6),
	conf_id			INT(6),
	amount_provided	INT(5),

PRIMARY KEY(cs_index),	
FOREIGN KEY (conf_id) REFERENCES tblconference(conf_id),
FOREIGN KEY (sponsor_id) REFERENCES tblsponsor(sponsor_id)	
);

CREATE TABLE tblconf_participant(
	confpass_reference	INT(6),
	conf_id				INT(6),
	p_id				INT(6),
	pass_id				INT(6),

PRIMARY KEY(confpass_reference),
FOREIGN KEY (conf_id) REFERENCES tblconference(conf_id),
FOREIGN KEY (p_id) REFERENCES tblparticipant(p_id),
FOREIGN KEY (pass_id) REFERENCES tblpasstype(pass_id)
);

CREATE TABLE tblsession(
	session_id			INT(6),
	conf_id 			INT(6),
	speaker_id 			INT(6),
	session_day			DATE,
	session_starttime	TIME,
	session_endtime		TIME,
	session_room		INT(2),
	session_name		VARCHAR(100),

PRIMARY KEY (session_id),
FOREIGN KEY(conf_id) REFERENCES tblconf_speaker(conf_id),
FOREIGN KEY(speaker_id) REFERENCES tblconf_speaker(speaker_id)
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
	amount_paid			FLOAT(6),
PRIMARY KEY(booking_id),
FOREIGN KEY(p_id) REFERENCES tblparticipant(p_id),
FOREIGN KEY(confpass_reference) REFERENCES tblconf_participant(confpass_reference)

);

CREATE TABLE tblconf_speaker(
	cspeak_index	INT(6),
	conf_id			INT(6),
	speaker_id		INT(6),

	PRIMARY KEY (cspeak_index),
	FOREIGN KEY (conf_id) REFERENCES tblconference(conf_id),
	FOREIGN KEY (speaker_id) REFERENCES tblspeaker(speaker_id)
);
