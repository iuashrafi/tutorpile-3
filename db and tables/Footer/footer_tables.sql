CREATE TABLE IF NOT EXISTS feedback_tutorsweb
(
	ID int unsigned  AUTO_INCREMENT PRIMARY KEY,
	Emailid varchar(50),
	Fullname varchar(51),
	Phonenumber bigint(20),
	Feedback_date DATE,
	Message text
);
CREATE TABLE IF NOT EXISTS contactus_tutorsweb
(
	ID int unsigned  AUTO_INCREMENT PRIMARY KEY,
	Emailid varchar(50),
	Fullname varchar(51),
	Phonenumber bigint(20),
	Feedback_date DATE,
	Message text
);