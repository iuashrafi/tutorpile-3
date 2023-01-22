CREATE TABLE IF NOT EXISTS students_primary_info
(
User_no int UNSIGNED NOT NULL UNIQUE,
Unique_user_id varchar(20) NOT NULL UNIQUE,
S_uniqueid varchar(20) NOT NULL UNIQUE,
Firstname varchar(20) NOT NULL,
Lastname varchar(30) NOT NULL,
Emailid varchar(50) NOT NULL,
PRIMARY KEY(Emailid),
Password varchar(30) NOT NULL,
Confirmpassword varchar(30) NOT NULL,
Gender varchar(6) NOT NULL,
Phonenumber bigint NOT NULL,
Category varchar(8) NOT NULL,
Security varchar(10) NOT NULL,
Encrypted varchar(5) NOT NULL,
Pincode MEDIUMINT NOT NULL,
Wallet int UNSIGNED,
Referal_id varchar(8)
);

CREATE TABLE IF NOT EXISTS students_secondary_info
(
	User_no int UNSIGNED NOT NULL UNIQUE,
	Unique_user_id varchar(20) NOT NULL UNIQUE,
	S_uniqueid varchar(20) NOT NULL UNIQUE,
	Emailid varchar(50) NOT NULL,
	PRIMARY KEY(Emailid),
	Institute varchar(70),
	Institute_address varchar(100),
	Standard varchar(18),
	Address varchar(100),
	City varchar(100),
	Istate varchar(100),
	Image_name varchar(50),
	Display_Format int UNSIGNED,
	Maintain_emailid varchar(3),
	Maintain_phonenumber varchar(3),
	Setting_Page_No TINYINT UNSIGNED,
	Description TEXT
);

CREATE TABLE IF NOT EXISTS students_system_info
(
	User_no int UNSIGNED NOT NULL,
	Unique_user_id varchar(20) NOT NULL UNIQUE,
	S_uniqueid varchar(20) NOT NULL UNIQUE,
	Emailid varchar(50) NOT NULL,
	PRIMARY KEY(Emailid),
	No_Of_Login SMALLINT UNSIGNED,
	No_Of_Logout_Used SMALLINT UNSIGNED,
	Last_Login_Date DATE,
	Successful_Referal TINYINT UNSIGNED,
	Login_status varchar(6),
	Dp_Present varchar(5),
	Profile_Status varchar(15),
	Recieve_Notification varchar(5),
	Password_Reset varchar(5),
	Amount_Transacted SMALLINT UNSIGNED,
	Previous_Password varchar(30),
	Account_Status varchar(14),
	No_Of_Batches TINYINT UNSIGNED,
	No_Of_Students TINYINT UNSIGNED,
	Refering_person_id varchar(8) NOT NULL,
	Signup_Date DATE NOT NULL,
	Signup_Time TIME NOT NULL,
	Wallet_System_Confirm smallint UNSIGNED	
);
CREATE TABLE IF NOT EXISTS students_stats_info
(
	Sid int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	S_uniqueid varchar(30) NOT NULL,
	Emailid varchar(50) NOT NULL,
	T_Emailid varchar(50) NOT NULL,
	T_uniqueid varchar(20) NOT NULL,
	Request_status varchar(8),
	Like_status varchar(5),
	Comment_status varchar(5),
	Rating_status varchar(5),
	Rate tinyint
);
CREATE TABLE IF NOT EXISTS students_comments
(
	Sid int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	S_uniqueid varchar(30) NOT NULL,
	Emailid varchar(30) NOT NULL,
	S_Name varchar(51) NOT NULL,
	T_Name varchar(51) NOT NULL,
	T_uniqueid varchar(20) NOT NULL,
	Comment_status varchar(5),
	S_display varchar(1),
	T_display varchar(1),
	Comment varchar(200),
	C_Date Date,
	C_Time Time
);
