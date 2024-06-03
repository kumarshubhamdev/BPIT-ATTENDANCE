CREATE DATABASE main_bpitattendance_db;

USE main_bpitattendance_db;

CREATE TABLE student_record (
	enrollment_no BIGINT(15) NOT NULL,
	stud_first_name VARCHAR(10) NOT NULL,
	stud_last_name VARCHAR(10) NOT NULL,
	date_of_birth DATE NOT NULL,
	batch_year VARCHAR(10) NOT NULL,
	stud_phone_no BIGINT(10),
	ward_phone_no BIGINT(10),
	stud_email VARCHAR(30),
	ward_email VARCHAR(30),
	CONSTRAINT PK_stud_recd PRIMARY KEY ( enrollment_no )
);

CREATE TABLE Batch_2021_25_student(
	enrollment_no BIGINT(15) NOT NULL,
	dept_name VARCHAR(20),
	sect VARCHAR(10),
	curr_attendance INT(10) DEFAULT 0,
	total_session INT(10) DEFAULT 0,
	CONSTRAINT FK_stud_recd FOREIGN KEY( enrollment_no )
	REFERENCES student_record(enrollment_no)
);

CREATE TABLE department(
	dept_no INT(10) NOT NULL,
	dept_name VARCHAR(30) NOT NULL,
	CONSTRAINT PK_dept PRIMARY KEY( dept_no )
);

CREATE TABLE courses(
	course_id INT(10) NOT NULL,
	course_name VARCHAR(30) NOT NULL,
	dept_no INT(10) NOT NULL,
	CONSTRAINT PK_course PRIMARY KEY(course_id),
	CONSTRAINT FK_course FOREIGN KEY(dept_no)
	REFERENCES department(dept_no)
);

CREATE TABLE student_studies(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	batch_year VARCHAR(10) NOT NULL,
	CONSTRAINT FK_stud_studies_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_stud_studies_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_1_crs_attend_recd(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	curr_attendance INT(10) DEFAULT 0,
	total_session INT(10) DEFAULT 0,
	CONSTRAINT FK_sem_1_crs_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_1_crs_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_2_crs_attend_recd(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	curr_attendance INT(10) DEFAULT 0,
	total_session INT(10) DEFAULT 0,
	CONSTRAINT FK_sem_2_crs_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_2_crs_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_3_crs_attend_recd(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	curr_attendance INT(10) DEFAULT 0,
	total_session INT(10) DEFAULT 0,
	CONSTRAINT FK_sem_3_crs_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_3_crs_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_4_crs_attend_recd(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	curr_attendance INT(10) DEFAULT 0,
	total_session INT(10) DEFAULT 0,
	CONSTRAINT FK_sem_4_crs_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_4_crs_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_5_crs_attend_recd(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	curr_attendance INT(10) DEFAULT 0,
	total_session INT(10) DEFAULT 0,
	CONSTRAINT FK_sem_5_crs_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_5_crs_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_6_crs_attend_recd(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	curr_attendance INT(10) DEFAULT 0,
	total_session INT(10) DEFAULT 0,
	CONSTRAINT FK_sem_6_crs_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_6_crs_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_7_crs_attend_recd(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	curr_attendance INT(10) DEFAULT 0,
	total_session INT(10) DEFAULT 0,
	CONSTRAINT FK_sem_7_crs_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_7_crs_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_8_crs_attend_recd(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	curr_attendance INT(10) DEFAULT 0,
	total_session INT(10) DEFAULT 0,
	CONSTRAINT FK_sem_8_crs_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_8_crs_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);


CREATE TABLE teacher_record(
	teacher_id INT(10) NOT NULL,
	teacher_first_name VARCHAR(15) NOT NULL,
	teacher_last_name VARCHAR(15),
	dept_no INT(10),
	teacher_email VARCHAR(20),
	designation VARCHAR(20),
	CONSTRAINT PK_teacher_record_1 PRIMARY KEY(teacher_id),
	CONSTRAINT FK_teacher_recd_1 FOREIGN KEY(dept_no)
	REFERENCES department(dept_no)
);

CREATE TABLE schedule_record(
	schedule_id INT(10) NOT NULL,
	schedule_date DATE NOT NULL,
	CONSTRAINT FK_sch_recd FOREIGN KEY(schedule_id)
	REFERENCES course_teacher(schedule_id)
);

CREATE TABLE course_teacher(
	teacher_id INT(10) NOT NULL,
	course_id INT(10) NOT NULL,
	sect VARCHAR(10) NOT NULL,
	dept_name VARCHAR(30) NOT NULL,
	batch_year VARCHAR(10) NOT NULL,
	schedule_id INT(10),
	CONSTRAINT FK_crs_teach_1 FOREIGN KEY(teacher_id)
	REFERENCES teacher_record(teacher_id),
	CONSTRAINT FK_crs_teach_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id),
	CONSTRAINT FK_crs_teach_3 FOREIGN KEY(schedule_id)
	REFERENCES schedule_record(schedule_id)
);

CREATE TABLE dept_head(
	dept_no INT(10) NOT NULL,
	dept_head_id INT(10) NOT NULL,
	CONSTRAINT FK_dept_head_1 FOREIGN KEY(dept_no)
	REFERENCES department(dept_no),
	CONSTRAINT FK_dept_head_2 FOREIGN KEY(dept_head_id)
	REFERENCES teacher_record(teacher_id)
);

CREATE TABLE sem_1_attend_info(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	CONSTRAINT FK_sem_1_info_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_1_info_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_2_attend_info(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	CONSTRAINT FK_sem_2_info_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_2_info_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_3_attend_info(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	CONSTRAINT FK_sem_3_info_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_3_info_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_4_attend_info(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	CONSTRAINT FK_sem_4_info_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_4_info_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_5_attend_info(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	CONSTRAINT FK_sem_5_info_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_5_info_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_6_attend_info(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	CONSTRAINT FK_sem_6_info_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_6_info_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_7_attend_info(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	CONSTRAINT FK_sem_7_info_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_7_info_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

CREATE TABLE sem_8_attend_info(
	enrollment_no BIGINT(15) NOT NULL,
	course_id INT(10) NOT NULL,
	CONSTRAINT FK_sem_8_info_1 FOREIGN KEY(enrollment_no)
	REFERENCES student_record(enrollment_no),
	CONSTRAINT FK_sem_8_info_2 FOREIGN KEY(course_id)
	REFERENCES courses(course_id)
);

ALTER TABLE sem_1_attend_info ADD schedule_id INT(10) NOT NULL;
ALTER TABLE sem_1_attend_info ADD CONSTRAINT FK_sem_1_info_3 FOREIGN KEY(schedule_id)
REFERENCES course_teacher(schedule_id);
ALTER TABLE sem_1_attend_info ADD schedule_date DATE NOT NULL;
ALTER TABLE sem_1_attend_info ADD attend_count INT(10) DEFAULT 0;

ALTER TABLE sem_2_attend_info ADD schedule_id INT(10) NOT NULL;
ALTER TABLE sem_2_attend_info ADD CONSTRAINT FK_sem_2_info_3 FOREIGN KEY(schedule_id)
REFERENCES course_teacher(schedule_id);
ALTER TABLE sem_2_attend_info ADD schedule_date DATE NOT NULL;
ALTER TABLE sem_2_attend_info ADD attend_count INT(10) DEFAULT 0;

ALTER TABLE sem_3_attend_info ADD schedule_id INT(10) NOT NULL;
ALTER TABLE sem_3_attend_info ADD CONSTRAINT FK_sem_3_info_3 FOREIGN KEY(schedule_id)
REFERENCES course_teacher(schedule_id);
ALTER TABLE sem_3_attend_info ADD schedule_date DATE NOT NULL;
ALTER TABLE sem_3_attend_info ADD attend_count INT(10) DEFAULT 0;

ALTER TABLE sem_4_attend_info ADD schedule_id INT(10) NOT NULL;
ALTER TABLE sem_4_attend_info ADD CONSTRAINT FK_sem_4_info_3 FOREIGN KEY(schedule_id)
REFERENCES course_teacher(schedule_id);
ALTER TABLE sem_4_attend_info ADD schedule_date DATE NOT NULL;
ALTER TABLE sem_4_attend_info ADD attend_count INT(10) DEFAULT 0;

ALTER TABLE sem_5_attend_info ADD schedule_id INT(10) NOT NULL;
ALTER TABLE sem_5_attend_info ADD CONSTRAINT FK_sem_5_info_3 FOREIGN KEY(schedule_id)
REFERENCES course_teacher(schedule_id);
ALTER TABLE sem_5_attend_info ADD schedule_date DATE NOT NULL;
ALTER TABLE sem_5_attend_info ADD attend_count INT(10) DEFAULT 0;

ALTER TABLE sem_6_attend_info ADD schedule_id INT(10) NOT NULL;
ALTER TABLE sem_6_attend_info ADD CONSTRAINT FK_sem_6_info_3 FOREIGN KEY(schedule_id)
REFERENCES course_teacher(schedule_id);
ALTER TABLE sem_6_attend_info ADD schedule_date DATE NOT NULL;
ALTER TABLE sem_6_attend_info ADD attend_count INT(10) DEFAULT 0;

ALTER TABLE sem_7_attend_info ADD schedule_id INT(10) NOT NULL;
ALTER TABLE sem_7_attend_info ADD CONSTRAINT FK_sem_7_info_3 FOREIGN KEY(schedule_id)
REFERENCES course_teacher(schedule_id);
ALTER TABLE sem_7_attend_info ADD schedule_date DATE NOT NULL;
ALTER TABLE sem_7_attend_info ADD attend_count INT(10) DEFAULT 0;

ALTER TABLE sem_8_attend_info ADD schedule_id INT(10) NOT NULL;
ALTER TABLE sem_8_attend_info ADD CONSTRAINT FK_sem_8_info_3 FOREIGN KEY(schedule_id)
REFERENCES course_teacher(schedule_id);
ALTER TABLE sem_8_attend_info ADD schedule_date DATE NOT NULL;
ALTER TABLE sem_8_attend_info ADD attend_count INT(10) DEFAULT 0;