/* Go to relevant database */
USE f20_3;

/* Drop all existing tables before recreating them */
DROP TABLE IF EXISTS BUILDING;
DROP TABLE IF EXISTS STUDENT;
DROP TABLE IF EXISTS ROOM_GROUP;
DROP TABLE IF EXISTS ROOM;
DROP TABLE IF EXISTS BEDROOM;
DROP TABLE IF EXISTS BEDROOM_GROUP;

/* Make foreign key contraints not trigger while creating tables */
SET FOREIGN_KEY_CHECKS = 0;


/* Create each table */
CREATE TABLE STUDENT (
	ID int NOT NULL,
	Login varchar(255),
	PassHash varchar(32),
	GroupID int /*UNIQUE*/,
	BedroomGroupID int /*UNIQUE*/,
	Fname varchar(255),
	Lname varchar(255),
	Year int,
	PRIMARY KEY (ID)
	/*FOREIGN KEY(GroupID) REFERENCES ROOM_GROUP(GroupID),*/
	/*FOREIGN KEY(BedroomGroupID) REFERENCES BEDROOM_GROUP(GroupID)*/
);

CREATE TABLE ROOM_GROUP (
	GroupID int, /* a unique integer */
	LeaderID int UNIQUE, /* Leader’s student ID */
	Size int
        /*PRIMARY KEY(GroupID)*/
	/*FOREIGN KEY(LeaderID) REFERENCES STUDENT(ID)*/
);

CREATE TABLE BEDROOM_GROUP (
	GroupID int NOT NULL /*UNIQUE*/,
	RoomGroupID int /*UNIQUE*/
	/*CONSTRAINT BedroomGroupID PRIMARY KEY(GroupID, RoomGroupID),*/
	/*FOREIGN KEY(RoomGroupID) REFERENCES ROOM_GROUP(GroupID)*/
);

CREATE TABLE BUILDING (
        Name varchar(255) NOT NULL,
        Kitchen bit, /* 0 for no kitchen, 1 for kitchen */
        MealPlan bit, /* 0 for no meal plan req, 1 for meal plan req */
        Parking bit, /* 0 for no parking, 1 for parking */
        AC bit, /* 0 for no AC, 1 for AC */
        Type bit, /* 0 for Dorm, 1 for Apartment */
        PRIMARY KEY(Name)
);


CREATE TABLE ROOM (
	Number int NOT NULL,
	BuildingName varchar(255) NOT NULL,
	GroupID int /*NOT NULL UNIQUE*/,
	Kitchen bit, /* 0 for no kitchen, 1 for kitchen */
	Price int,
	Size int,
	FloorPlan varchar(255), /* hyperlink to image of floor plan */
	BathroomNum int /* 0 if a public bathroom */
    	/*FOREIGN KEY(BuildingName) REFERENCES BUILDING(Name),*/
	/*FOREIGN KEY(GroupID) REFERENCES ROOM_GROUP(GroupID),*/
	/*CONSTRAINT RoomID PRIMARY KEY(BuildingName, Number)*/
);

CREATE TABLE BEDROOM (
	Letter varchar(255) NOT NULL,
	RoomNum int /*UNIQUE*/,
	BuildingName varchar(255) /*UNIQUE*/,
	Size int
	/*FOREIGN KEY(RoomNum) REFERENCES ROOM(Number),*/
	/*FOREIGN KEY(BuildingName) REFERENCES BUILDING(Name),*/
	/*CONSTRAINT BedroomID PRIMARY KEY(BuildingName, RoomNum, Letter)*/
);
