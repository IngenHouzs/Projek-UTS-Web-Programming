CREATE DATABASE ForumProgrammer;
USE ForumProgrammer;



CREATE TABLE User (
    -- PAKE PREFIX U-, PAKE uniqid('U-', true) -> generate 23, tambah 2 dari prefix = 25 --
    ID_User CHAR(25) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL, 
    email VARCHAR(50) UNIQUE NOT NULL, 
    foto VARCHAR(50),
    password VARCHAR(100) NOT NULL
);


CREATE TABLE Admin (
    ID_Admin CHAR(5) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE Post (
    -- PAKE PREFIX P-, PAKE uniqid('P-', true) -> generate 23, tambah 2 dari prefix = 25 --
    ID_Post CHAR(25) PRIMARY KEY,
    ID_User CHAR(25), 
    waktu_post DATETIME, 
    KATEGORI ENUM('JavaScript', 'Python', 'C++', 'TypeScript', 'PHP', 'C', 'Java', 'Ruby', 'Dart', 'Kotlin'),
    Isi LONG VARCHAR, 
    FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE
);


CREATE TABLE Comment_Post (
    -- PAKE PREFIX C-, PAKE uniqid('C-', true) -> generate 23, tambah 2 dari prefix = 25 --    
    ID_CommentPost CHAR(25) PRIMARY KEY, 
    ID_Post CHAR(25), 
    ID_User CHAR(25),
    Isi LONG VARCHAR,
    FOREIGN KEY (ID_Post) REFERENCES Post(ID_Post) ON DELETE CASCADE,
    FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE
);


CREATE TABLE Like_Post(
    -- PAKE PREFIX L-, PAKE uniqid('L-', true) -> generate 23, tambah 2 dari prefix = 25 --       
    ID_Like CHAR(25), 
    ID_Post CHAR(25), 
    ID_User CHAR (25),
    PRIMARY KEY (ID_Like, ID_Post, ID_User),
    FOREIGN KEY (ID_Post) REFERENCES Post(ID_Post) ON DELETE CASCADE,
    FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE   
    
);

CREATE TABLE Like_Comment(
    -- PAKE PREFIX A-, PAKE uniqid('L-', true) -> generate 23, tambah 2 dari prefix = 25 --     
    ID_Like CHAR(25) PRIMARY KEY,
    ID_Comment CHAR(25),
    ID_User CHAR(25),
    FOREIGN KEY (ID_Comment) REFERENCES Comment_Post(ID_Post) ON DELETE CASCADE,
    FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE    
);


CREATE TABLE Gambar_Postingan(
        -- PAKE PREFIX G-, PAKE uniqid('L-', true) -> generate 23, tambah 2 dari prefix = 25 -- 
    ID_Post CHAR(25), 
    nama_gambar VARCHAR(100), 
    Urutan INTEGER, 
    PRIMARY KEY (ID_Post, nama_gambar),
    FOREIGN KEY (ID_Post) REFERENCES Post(ID_Post) ON DELETE CASCADE
);




-- USER ---
INSERT INTO User VALUES ('U-6337ffe69c8741.93507763', 'Farrel Dinarta', 'farreldinarta', 'farreldinarta133@gmail.com', 'goblinlaugh.png','gataudhserah');

-- POST ---
INSERT INTO Post VALUES ('P-6338009c57d286.48478648', 'U-6337ffe69c8741.93507763', '1120-01-01 01:00:00', 'JavaScript', 'WKWKWKWKWKKWKW');

-- COMMENT POST --- 
INSERT INTO Comment_Post VALUES ('C-6338016f336449.55829493', 'P-6338009c57d286.48478648', 'U-6337ffe69c8741.93507763', 'hehehehhehe');