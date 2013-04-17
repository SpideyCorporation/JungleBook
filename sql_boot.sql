create database JungleBook;
use JungleBook;
status;

/* **************************************************************************************
Creating USERS table with username and password columns.
Table stores user profile information, including either blob images or url to images.
************************************************************************************** */

-- TODO: Primary Key needs to be integer for faster JOINS and merges/unions.
create table USERS (
		username VARCHAR(20) UNIQUE,
		password VARCHAR(30)
		);


