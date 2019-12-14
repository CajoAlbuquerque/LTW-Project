PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS Reservation;
DROP TABLE IF EXISTS House;
DROP TABLE IF EXISTS User;

CREATE TABLE User (
    userID INTEGER PRIMARY KEY,
    username TEXT UNIQUE NOT NULL,
    email TEXT NOT NULL,
    password TEXT NOT NULL,
    name TEXT,
    nationality TEXT,
    age INTEGER
);

CREATE TABLE House (
    houseID INTEGER PRIMARY KEY,
    title TEXT,
    priceDay REAL,
    location TEXT,
    description TEXT,
    owner INTEGER NOT NULL,
    FOREIGN KEY (owner) REFERENCES User(userID)
);

CREATE TABLE Reservation (
    reservationID INTEGER PRIMARY KEY,
    user INTEGER,
    house INTEGER,
    startDate TEXT,
    endDate TEXT,
    totalPrice REAL,
    FOREIGN KEY (user) REFERENCES User(userID),
    FOREIGN KEY (house) REFERENCES House(houseID)
);

CREATE TABLE Comment (
    commentID INTEGER PRIMARY KEY,
    user INTEGER,
    house INTEGER,
    comment TEXT,
    stars REAL,
    FOREIGN KEY (user) REFERENCES User(userID),
    FOREIGN KEY (house) REFERENCES House(houseID)
);

CREATE TABLE Images {
    imageID INTEGER PRIMARY KEY,
    date TEXT,
    hash TEXT
};