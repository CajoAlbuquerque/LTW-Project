BEGIN TRANSACTION;
DROP TABLE IF EXISTS "Images";
CREATE TABLE IF NOT EXISTS "Images" (
	"imageID"	INTEGER,
	"title"	TEXT,
	"date"	TEXT,
	"hash"	TEXT,
	PRIMARY KEY("imageID")
);
DROP TABLE IF EXISTS "HouseImages";
CREATE TABLE IF NOT EXISTS "HouseImages" (
	"house"	INTEGER,
	"image"	INTEGER,
	FOREIGN KEY("house") REFERENCES "House"("houseID"),
	FOREIGN KEY("image") REFERENCES "Images"("imageID"),
	PRIMARY KEY("house","image")
);
DROP TABLE IF EXISTS "Comment";
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
DROP TABLE IF EXISTS "Reservation";
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
DROP TABLE IF EXISTS "House";
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
DROP TABLE IF EXISTS "User";
CREATE TABLE IF NOT EXISTS "User" (
	"userID"	INTEGER,
	"username"	TEXT NOT NULL UNIQUE,
	"email"	TEXT NOT NULL,
	"password"	TEXT NOT NULL,
	"name"	TEXT,
	"nationality"	TEXT,
	"age"	INTEGER,
	"photo"	INTEGER,
	PRIMARY KEY("userID"),
	FOREIGN KEY("photo") REFERENCES "Images"("imageID")
);
INSERT INTO "Images" ("imageID","title","date","hash") VALUES (1,'cajopt','2019-12-18:07:05:51','32ba74f9f3bd080519af24922069b817.jpg'),
 (2,'main.jpg','2019-12-18:07:26:26','108fce2d5dc7b15d9a0aee8994ad3521.jpg'),
 (3,'kitchen_2.jpg','2019-12-18:07:26:26','99bd9d9254e868374d33e7033917efc8.jpg'),
 (4,'kitchen.jpg','2019-12-18:07:26:26','c839fa42e028a3c0a4f3cd4a02a01640.jpg'),
 (5,'bedroom.jpg','2019-12-18:07:26:26','8d211fe28307843a5f12630ec560fba8.jpg'),
 (6,'gardens.jfif','2019-12-18:07:31:52','735abd1e78c9c639a7c6b5e59cfc6c80.jpg'),
 (7,'room.jpg','2019-12-18:07:31:52','e481004f390c227c9a3b14f15e24f07a.jpg'),
 (8,'sofes','2019-12-18:07:37:48','92e678d36ac64dd8c3ac95419304afa1.jpg'),
 (9,'main.jpg','2019-12-18:07:42:19','a66aee056a1dbde77084ae7284dfe735.jpg'),
 (10,'living_room.jpg','2019-12-18:07:42:19','5f5eeb64850a3a7578c059c72f86eb60.jpg'),
 (11,'kitchen.jpg','2019-12-18:07:42:19','39006a75696e534dacce797d912f2bcb.jpg'),
 (12,'bedroom.jpg','2019-12-18:07:42:19','745cd1b4ad712ec567c32ba107f8ad54.jpg'),
 (13,'ventosas','2019-12-18:07:48:58','7cfacd96fdbe142d733ce20df0805bf6.jpg'),
 (14,'haystack.jpg','2019-12-18:07:52:16','20916343fc10f1e483a8cdc22c9010a5.jpg');
INSERT INTO "HouseImages" ("house","image") VALUES (1,2),
 (1,3),
 (1,4),
 (1,5),
 (2,6),
 (2,7),
 (3,9),
 (3,10),
 (3,11),
 (3,12),
 (5,14);
INSERT INTO "Comment" ("commentID","user","house","comment","stars") VALUES (1,1,3,'Very cozy but there was a lot of noise during the night',4.0),
 (2,2,1,'Amazing place. Will come back again definetely!',5.0),
 (3,2,2,'Beautiful gardens and village, but price is slightly high.',4.5),
 (4,2,5,'There was a rat on the hay and it was all over the place',1.5);
INSERT INTO "Reservation" ("reservationID","user","house","startDate","endDate","totalPrice") VALUES (1,3,4,'2019-12-24','2019-12-25',8.0),
 (2,2,1,'2019-11-20','2019-11-22',90.0),
 (3,3,1,'2019-12-01','2019-12-05',180.0),
 (4,2,2,'2019-10-12','2019-10-16',320.0),
 (5,1,3,'2019-12-15','2019-12-17',120.0),
 (6,1,4,'2019-08-09','2019-08-10',8.0),
 (7,2,5,'2019-02-08','2019-02-13',25.0);
INSERT INTO "House" ("houseID","title","priceDay","location","description","owner") VALUES (1,'Studio near S Bento',45.0,'Porto','This amazing place is located near Sao Bento station and has everything you wished for. It has 1 king size bed, 1 bathroom with an hot tub and a fully equipped kitchen. Also served with wifi, tv and a heater so you can have the weekend of your dreams.',1),
 (2,'Casa da Insua rooms',80.0,'Penalva do Castelo','This 5 star hotel and its incredible gardens will make your stay unforgettable. With all meals included, you do not have to worry about anything. Great wine, company and service are ensured. Just come and relax in the peaceful village that is Penalva.',1),
 (3,'T2  in Braga Center',60.0,'Braga','If you want to enjoy a splendid weekend near an ancient cathedral, then consider visiting Braga and staying at this great apartment perfect for a family. With 2 bathrooms and a surrounding balcony, you will have the time of your life while visiting this historical city. Pets are allowed.',2),
 (4,'Roomes near Good Jesus',8.0,'Braga','Very good place with very cheap near food places. May have bed in batroom and very near of Good Jesus. Does not smell weed in house. Is incense.',2),
 (5,'Haystack in the middle of Chaves',5.0,'Chaves','Very soft, very comfortable, very good for your posture, may attract livestock and the occasional farmer. Just the best',3);
INSERT INTO "User" ("userID","username","email","password","name","nationality","age","photo") VALUES (1,'cajopt','cajopt@gmail.com','$2y$12$./5IAvjJvgRLgejxgQZs.e1zbXCYPFrF2JrVFsYl05Oj1hYTif0Vi','Cajo Albuquerque','Portuguese',20,1),
 (2,'sofes','sofishltw@hotmail.com','$2y$12$LfLFD/p74PynM/GsE0CUquLB30cGex7bUEAIeto13AzowMgNCW8.m','Sofia Sonecas','','',8),
 (3,'ventosas','borkdork@dork.com','$2y$12$tekJXG6qCc4NvOEyyz8EluCdlE.DXxLnIk./n74eyqmS3Q4BweI06','Vitor Ventuzelos','',42,13);
COMMIT;
