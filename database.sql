CREATE DATABASE ForumProgrammer;
USE ForumProgrammer;



CREATE TABLE User (
    -- PAKE PREFIX U-, PAKE uniqid('U-', true) -> generate 23, tambah 2 dari prefix = 25 --
    ID_User CHAR(25) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL, 
    email VARCHAR(50) UNIQUE NOT NULL, 
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
    waktu_post DATE, 
    KATEGORI ENUM('JavaScript', 'Python', 'C++', 'TypeScript', 'PHP', 'Node.js'),
    Isi LONG VARCHAR, 
    FOREIGN KEY (ID_User) REFERENCES User(ID_User)
);


CREATE TABLE Comment_Post (
    -- PAKE PREFIX C-, PAKE uniqid('C-', true) -> generate 23, tambah 2 dari prefix = 25 --    
    ID_CommentPost CHAR(25) PRIMARY KEY, 
    ID_Post CHAR(25), 
    ID_User CHAR(25),
    Isi LONG VARCHAR,
    FOREIGN KEY (ID_Post) REFERENCES Post(ID_Post),
    FOREIGN KEY (ID_User) REFERENCES User(ID_User)
);


CREATE TABLE Like_Post(
    -- PAKE PREFIX L-, PAKE uniqid('L-', true) -> generate 23, tambah 2 dari prefix = 25 --       
    ID_Like CHAR(25) PRIMARY KEY, 
    ID_Post CHAR(25), 
    ID_User CHAR (25),
    FOREIGN KEY (ID_Post) REFERENCES Post(ID_Post),
    FOREIGN KEY (ID_User) REFERENCES User(ID_User)    
    
);

CREATE TABLE Like_Comment(
    -- PAKE PREFIX A-, PAKE uniqid('L-', true) -> generate 23, tambah 2 dari prefix = 25 --     
    ID_Like CHAR(25) PRIMARY KEY,
    ID_Comment CHAR(25),
    ID_User CHAR(25),
    FOREIGN KEY (ID_Comment) REFERENCES Comment_Post(ID_Post),
    FOREIGN KEY (ID_User) REFERENCES User(ID_User)    
);


CREATE TABLE Gambar_Postingan(
        -- PAKE PREFIX G-, PAKE uniqid('L-', true) -> generate 23, tambah 2 dari prefix = 25 -- 
    ID_Gambar CHAR(25) PRIMARY KEY,
    ID_Post CHAR(25), 
    nama_gambar VARCHAR(100), 
    Urutan INTEGER, 
    FOREIGN KEY (ID_Post) REFERENCES Post(ID_Post)
)