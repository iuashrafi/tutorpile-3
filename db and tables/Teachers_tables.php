<?php
include("connect.php");


$s = "CREATE TABLE user_system_info
(
	User_no int UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
	Unique_user_id varchar(20) NOT NULL UNIQUE,
	T_uniqueid varchar(20),
	S_uniqueid varchar(20),
	Emailid varchar(50) NOT NULL UNIQUE,
	PRIMARY KEY(Emailid)
)";
$sub = "CREATE TABLE subject
(
	Subject_no int UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
	Subject varchar(100) NOT NULL UNIQUE,
	No_of_subject_user int UNSIGNED,
	PRIMARY KEY(Subject)
)";
/* Unique_user_id is for every member of tutorsweb*/
$sql = "CREATE TABLE teachers_primary_info
(
	User_no int UNSIGNED NOT NULL UNIQUE,
	Unique_user_id varchar(20) NOT NULL UNIQUE,
	T_uniqueid varchar(20) NOT NULL UNIQUE,
	Firstname varchar(20) NOT NULL,
	Lastname varchar(30) NOT NULL,
	Emailid varchar(50) NOT NULL,
	PRIMARY KEY(Emailid),
	Password varchar(30) NOT NULL,
	Confirmpassword varchar(30) NOT NULL,
	Gender varchar(6) NOT NULL,
	Phonenumber bigint NOT NULL,
	Category varchar(8) NOT NULL,
	Subject1 varchar(50) NOT NULL,
	Subject2 varchar(50),
	Subject3 varchar(50),
	Security varchar(10) NOT NULL,
	Encrypted varchar(5) NOT NULL,
	Pincode MEDIUMINT NOT NULL,
	Wallet int UNSIGNED,
	Referal_id varchar(8)
)";
$sql2 = "CREATE TABLE teachers_batches_info
(
	User_no int UNSIGNED NOT NULL,
	Unique_user_id varchar(20) NOT NULL,
	T_uniqueid varchar(20) NOT NULL,
	Emailid varchar(50) NOT NULL,
	Batch_no int NOT NULL,
	Batches_id varchar(30) NOT NULL UNIQUE,
	PRIMARY KEY(Batches_id),
	Batch_Name varchar(50),
	Batch_start_year SMALLINT UNSIGNED,
	Batch_end_year SMALLINT UNSIGNED,
	Batch_Created_Date DATE,
	No_Of_day varchar(80),
	Days_week varchar(80),
	Timing varchar(50),
	No_Of_Student SMALLINT UNSIGNED,
	Standard varchar(20),
	Batch_Notification varchar(5),
	Batch_Fees INT UNSIGNED,
	Batch_Deleted varchar(5),
	Batch_Address varchar(100),
	Batch_Description TEXT
)";

$sql3="CREATE TABLE teachers_secondary_info
(
	User_no int UNSIGNED NOT NULL UNIQUE,
	Unique_user_id varchar(20) NOT NULL UNIQUE,
	T_uniqueid varchar(20) NOT NULL UNIQUE,
	Emailid varchar(50) NOT NULL,
	PRIMARY KEY(Emailid),
	Qualifications varchar(100),
	Profession varchar(60),
	Worksat varchar(80),
	Experience TINYINT UNSIGNED,
	Address varchar(100),
	City varchar(100),
	STATE varchar(100),
	Image_name varchar(50),
	Display_Format int UNSIGNED,
	Maintain_emailid varchar(3),
	Maintain_phonenumber varchar(3),
	Setting_Page_No TINYINT UNSIGNED,
	Description TEXT
)
";
			// create other table for storing the page no of settings and notification
$sql4="CREATE TABLE teachers_students_info
(
	Unique_user_id varchar(20) NOT NULL,
	T_uniqueid varchar(20) NOT NULL,
	Emailid varchar(50) NOT NULL,
	Batch_no int NOT NULL,
	Batches_id varchar(30) NOT NULL,
	Batch_Name varchar(50),
	Students_id varchar(35) NOT NULL UNIQUE,
	PRIMARY KEY(Students_id),
	Students_Name varchar(50),
	Students_Emailid varchar(100),
	Gender varchar(6),
	S_Phonenumber bigint NOT NULL,
	Students_Standard varchar(20),
	Students_School varchar(100),
	Students_joining_month varchar(15),
	Student_Joining_Date_year varchar(5),
	Student_Joining_Date DATE,
	Student_Joining_Time TIME NOT NULL,
	Students_Fees SMALLINT UNSIGNED,
	Students_Deleted varchar(5),
	Students_Address varchar(100),
	Students_percentage tinyint,
	Students_Quality varchar(30)
)
";
/*	
$sql5="CREATE TABLE teacher_fee_info
(
	T_uniqueid int NOT NULL AUTO_INCREMENT UNIQUE,
	Emailid varchar(50) NOT NULL,
	PRIMARY KEY(Emailid),
	Batch_no int NOT NULL,
	Batches_id int NOT NULL,
	Batch_Name varchar(50),
	fee_monthly SMALLINT UNSIGNED,
	payment_type varchar(11),
	payment_mode varchar(6)
)
";
*/
$sql6="CREATE TABLE teachers_system_info
(
	User_no int UNSIGNED NOT NULL,
	Unique_user_id varchar(20) NOT NULL UNIQUE,
	T_uniqueid varchar(20) NOT NULL UNIQUE,
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
	Refering_person_id varchar(8) NOT NULL,
	Signup_Date DATE NOT NULL,
	Signup_Time TIME NOT NULL,
	Wallet_System_Confirm smallint UNSIGNED
)
";

$sql9 = "CREATE TABLE teachers_system_more_info
(
	User_no int UNSIGNED NOT NULL UNIQUE,
	Unique_user_id varchar(20) NOT NULL UNIQUE,
	T_uniqueid varchar(20) NOT NULL UNIQUE,
	Emailid varchar(50) NOT NULL,
	PRIMARY KEY(Emailid),
	Message_send_to_Tech TINYINT UNSIGNED,
	Email_send_to_Tech TINYINT UNSIGNED,
	Feedback_Added varchar(5),
	Complain_Added varchar(5),
	Comment_Added varchar(5),
	Advertising_With_Us varchar(5),
	TutorsWeb_Member varchar(5)
)";

$sql7="CREATE TABLE teachers_stats_info
(
	User_no int UNSIGNED NOT NULL UNIQUE,
	Unique_user_id varchar(20) NOT NULL UNIQUE,
	T_uniqueid varchar(20) NOT NULL UNIQUE,
	Emailid varchar(50) NOT NULL,
	PRIMARY KEY(Emailid),
	Rating TINYINT UNSIGNED,
	Total_People_Rated INT UNSIGNED,
	Monthly_People_Rated INT UNSIGNED,
	Total_Views INT UNSIGNED,
	Monthly_Views INT UNSIGNED,
	Total_Likes INT UNSIGNED,
	Monthly_Likes INT UNSIGNED,
	Teaching_Request INT UNSIGNED,
	Total_Comments INT UNSIGNED,
	Monthly_Comments INT UNSIGNED,
	No_Of_Batches INT UNSIGNED,
	No_Of_Students INT UNSIGNED,
	No_Of_notification INT UNSIGNED,
	Last_Updated_Date DATE NOT NULL,
	Last_Updated_Time TIME NOT NULL
)
";

$sql8="CREATE TABLE teachers_payments_info
(
	Unique_user_id varchar(20) NOT NULL,
	T_uniqueid varchar(20) NOT NULL,
	Emailid varchar(50) NOT NULL,
	Batch_no int NOT NULL,
	Batches_id varchar(30) NOT NULL,
	Students_id varchar(35) NOT NULL,
	Unique_payment_id varchar(40),
	PRIMARY KEY(Unique_payment_id),
	Default_Payment_Amount INT UNSIGNED,
	Payment_Year varchar(10) NOT NULL,
	Payment_Starting_Date DATE,
	January varchar(10) NOT NULL DEFAULT 'unpaid' COMMENT 'paid = fees paid, unpaid = fees not paid, pending = fees payment is pending',
	February varchar(10) NOT NULL,
	March varchar(10) NOT NULL,
	April varchar(10) NOT NULL,
	May varchar(10) NOT NULL,
	June varchar(10) NOT NULL,
	July varchar(10) NOT NULL,
	August varchar(10) NOT NULL,
	September varchar(10) NOT NULL,
	October varchar(10) NOT NULL,
	November varchar(10) NOT NULL,
	December varchar(10) NOT NULL,
	January_Paid_Date DATE,
	February_Paid_Date DATE,
	March_Paid_Date DATE,
	April_Paid_Date DATE,
	May_Paid_Date DATE,
	June_Paid_Date DATE,
	July_Paid_Date DATE,
	August_Paid_Date DATE,
	September_Paid_Date DATE,
	October_Paid_Date DATE,
	November_Paid_Date DATE,
	December_Paid_Date DATE,
	January_Paid_Time TIME,
	February_Paid_Time TIME,
	March_Paid_Time TIME,
	April_Paid_Time TIME,
	May_Paid_Time TIME,
	June_Paid_Time TIME,
	July_Paid_Time TIME,
	August_Paid_Time TIME,
	September_Paid_Time TIME,
	October_Paid_Time TIME,
	November_Paid_Time TIME,
	December_Paid_Time TIME,
	January_Paid_Mode varchar(15),
	February_Paid_Mode varchar(15),
	March_Paid_Mode varchar(15),
	April_Paid_Mode varchar(15),
	May_Paid_Mode varchar(15),
	June_Paid_Mode varchar(15),
	July_Paid_Mode varchar(15),
	August_Paid_Mode varchar(15),
	September_Paid_Mode varchar(15),
	October_Paid_Mode varchar(15),
	November_Paid_Mode varchar(15),
	December_Paid_Mode varchar(15),
	January_Paid_Amount int UNSIGNED COMMENT 'amount paid in this month',
	February_Paid_Amount int UNSIGNED,
	March_Paid_Amount int UNSIGNED,
	April_Paid_Amount int UNSIGNED,
	May_Paid_Amount int UNSIGNED,
	June_Paid_Amount int UNSIGNED,
	July_Paid_Amount int UNSIGNED,
	August_Paid_Amount int UNSIGNED,
	September_Paid_Amount int UNSIGNED,
	October_Paid_Amount int UNSIGNED,
	November_Paid_Amount int UNSIGNED,
	December_Paid_Amount int UNSIGNED,
	Last_Updated_Date DATE NOT NULL,
	Last_Updated_Time TIME NOT NULL
)
";

if(!mysql_query($s,$con))
echo " cannot create table1". mysql_error();
if(!mysql_query($sub,$con))
echo " cannot create table2". mysql_error();
if(!mysql_query($sql,$con))
echo " cannot create table3". mysql_error();
if(!mysql_query($sql2,$con))
echo " cannot create table". mysql_error();
if(!mysql_query($sql3,$con))
echo " cannot create table4". mysql_error();
if(!mysql_query($sql4,$con))
echo " cannot create table". mysql_error();  
/*
if(!mysql_query($sql5,$con))
echo " cannot create table". mysql_error();
*/
if(!mysql_query($sql6,$con))
echo " cannot create table5". mysql_error();

if(!mysql_query($sql7,$con))
echo " cannot create table". mysql_error();

if(!mysql_query($sql8,$con))
echo " cannot create table". mysql_error();

if(!mysql_query($sql9,$con))
echo " cannot create table6". mysql_error();
mysql_close($con);
?>