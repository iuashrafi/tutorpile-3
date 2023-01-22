CREATE TABLE IF NOT EXISTS teachers_notification_info
(
	T_uniqueid varchar(20) NOT NULL,
	Emailid varchar(50) NOT NULL,
	Unique_Notify_no int NOT NULL AUTO_INCREMENT UNIQUE,
	Notify_id varchar(30) NOT NULL UNIQUE PRIMARY KEY,
	Notify_catogory varchar(50),
	Notify_type varchar(50),
	Notify_priority varchar(10),
	Notify_subject varchar(100),
	S_name varchar(30),
	S_uniqueid varchar(30),
	S_emailid varchar(50),
	Notify_date DATE NOT NULL,
	Notify_time TIME NOT NULL,
	Viewed varchar(5),
	Notify_send_status varchar(15),
	Notify_link varchar(100),
	Notify_img_name varchar(30),
	Notify_message TEXT
);
CREATE TABLE IF NOT EXISTS students_notification_info
(
	S_uniqueid varchar(20) NOT NULL,
	Emailid varchar(50) NOT NULL,
	Unique_Notify_no int NOT NULL AUTO_INCREMENT UNIQUE,
	Notify_id varchar(30) NOT NULL UNIQUE PRIMARY KEY,
	Notify_catogory varchar(50),
	Notify_type varchar(50),
	Notify_priority varchar(10),
	Notify_subject varchar(100),
	T_name varchar(30),
	T_uniqueid varchar(30),
	T_emailid varchar(50),
	Notify_date DATE NOT NULL,
	Notify_time TIME NOT NULL,
	Viewed varchar(5),
	Notify_send_status varchar(15),
	Notify_link varchar(100),
	Notify_img_name varchar(30),
	Notify_message TEXT
);