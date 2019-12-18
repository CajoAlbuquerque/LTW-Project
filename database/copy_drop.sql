PRAGMA foreign_keys = ON;

BEGIN TRANSACTION;
DROP TABLE IF EXISTS "Comment";
DROP TABLE IF EXISTS "Reservation";
DROP TABLE IF EXISTS "House";
DROP TABLE IF EXISTS "User";

CREATE TABLE IF NOT EXISTS "User" (
	"userID"	INTEGER,
	"username"	TEXT NOT NULL UNIQUE,
	"email"	TEXT NOT NULL,
	"password"	TEXT NOT NULL,
	"name"	TEXT,
	"nationality"	TEXT,
	"age"	INTEGER,
	"photo" INTEGER,
	FOREIGN KEY("photo") REFERENCES "Images"("imageID"),
	PRIMARY KEY("userID")
);
CREATE TABLE IF NOT EXISTS "House" (
	"houseID"	INTEGER,
	"title"	TEXT,
	"priceDay"	REAL,
	"location"	TEXT,
	"description"	TEXT,
	"owner"	INTEGER NOT NULL,
	FOREIGN KEY("owner") REFERENCES "User"("userID"),
	PRIMARY KEY("houseID")
);
CREATE TABLE IF NOT EXISTS "Comment" (
	"commentID"	INTEGER,
	"user"	INTEGER,
	"house"	INTEGER,
	"comment"	TEXT,
	"stars"	REAL,
	PRIMARY KEY("commentID"),
	FOREIGN KEY("user") REFERENCES "User"("userID"),
	FOREIGN KEY("house") REFERENCES "House"("houseID")
);
CREATE TABLE IF NOT EXISTS "Reservation" (
	"reservationID"	INTEGER,
	"user"	INTEGER,
	"house"	INTEGER,
	"startDate"	TEXT,
	"endDate"	TEXT,
	"totalPrice"	REAL,
	PRIMARY KEY("reservationID"),
	FOREIGN KEY("user") REFERENCES "User"("userID"),
	FOREIGN KEY("house") REFERENCES "House"("houseID")
);
CREATE TABLE "HouseImages" (
    "house" INTEGER REFERENCES "House"("houseID"),
    "image" INTEGER REFERENCES "Images"("imageID"),
    PRIMARY KEY ("house", "image")
);
CREATE TABLE "Images" (
    "imageID" INTEGER PRIMARY KEY,
    "title" TEXT,
    "date" TEXT,
    "hash" TEXT
);
INSERT INTO "User" ("userID","username","email","password","name","nationality","age") VALUES (1,'joka','joko@mth.com','123','jokinho',NULL,NULL),
 (2,'cajo','cajo@cajo.pt','$2y$12$papvU3bCVYFJDkNgfLtice./eAOWDzPdley8u8d0tzfBCag78rzFW','CJ PT',NULL,NULL),
 (3,'cajopt','cajo@gmail.com','$2y$12$DOGYa1uE6EkFrFuHLZ/gAOmJlki7XQrwcFYBstGWiQnLwefnxRpei','Cajo A.','Portugal',20),
 (4,'sofia','soshifighting000@gmail.com','$2y$12$XV94WptESH4ALviSJZQYBeDLwRDexP0.JOKtcXZVJMyzDUg6FhjcO','Sofia',NULL,NULL);
INSERT INTO "House" ("houseID","title","priceDay","location","description","owner") VALUES (1,'Ganda RABO',50.0,'Porto','Just great Rabos and Chicks',2),
 (2,'Serious Apartment',25.0,'Lisbon','Well, this is a serious example',2),
 (3,'T3 bem gostoso',30.0,'Viseu','Renting my house while I am in vacation Imaculated place my bros',3),
 (4,'Big beautiful house',13.0,'Mourilhe','Mourilhe Guest House is a cosy house in the middle of nowhere',1),
 (5,'Praia da Rocha Marina House',80.0,'Portimao','Near Portugal''s best beach, this beutiful house will satisfy your demand for parties, sea and warm.',2),
 (6,'Studio for 2',67.0,'Port','Come visit Porto and stay on a cosy place made for a weekend with your special one',1),
 (7,'Casa da Insua rooms',86.0,'Penalva do Castelo','Penalva is a town located in Viseu where the fresh air and peace will make you fall in love with nature. Casa da Insua was a noble family villa. but now is 5 star hotel with beautiful gardens and great food.',1),
 (8,'Montebelo - 5 stars hotel',100.0,'Viseu','The best hotel in Viseu where you can take a break from the city noises. Spa, Golf Court and Swimming Pools are just a few of these hotel''s offer to you',2),
 (9,'Bom Jesus Apartment',39.0,'Braga','Do you wanna come and visit Braga? Do you want to stay at a cheap and cosy place? This apartment is solely used by tourists that want to experience Braga''s food, culture and msot iconic places',3);
INSERT INTO "Reservation" ("reservationID","user","house","startDate","endDate","totalPrice") VALUES (1,2,1,'2019-12-20','2019-12-22',150.0),
 (2,1,1,'2019-12-23','2019-12-24',100.0),
 (3,3,1,'2019-12-25','2019-12-27',150.0),
 (4,2,2,'2019-12-17','2019-12-19',75.0),
 (5,3,1,'2019-12-12','2019-12-31',50.0);
INSERT INTO "Comment" ("commentID","user","house","comment","stars") VALUES (1,3,1,'Loved it, just as in description',5.0),
 (2,1,1,'I prefer boobs',1.5);
COMMIT;
