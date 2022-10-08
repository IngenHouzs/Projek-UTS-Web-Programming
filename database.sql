CREATE DATABASE ForumProgrammer;
USE ForumProgrammer;



CREATE TABLE User (
    -- PAKE PREFIX U-, PAKE uniqid('U-', true) -> generate 23, tambah 2 dari prefix = 25 --
    ID_User CHAR(25) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL, 
    email VARCHAR(50) UNIQUE NOT NULL, 
    foto VARCHAR(50),
    isAdmin BIT,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE Post (
    -- PAKE PREFIX P-, PAKE uniqid('P-', true) -> generate 23, tambah 2 dari prefix = 25 --
    ID_Post CHAR(25) PRIMARY KEY,
    ID_User CHAR(25), 
    waktu_post DATETIME, 
    KATEGORI ENUM('JavaScript', 'Python', 'CPP', 'TypeScript', 'PHP', 'C', 'Java', 'Ruby', 'Dart', 'Kotlin'),
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
    PRIMARY KEY (ID_Post, ID_User),
    FOREIGN KEY (ID_Post) REFERENCES Post(ID_Post) ON DELETE CASCADE,
    FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE   
    
);

CREATE TABLE Like_Comment(
    -- PAKE PREFIX A-, PAKE uniqid('L-', true) -> generate 23, tambah 2 dari prefix = 25 --     
    ID_Like CHAR(25),
    ID_Comment CHAR(25),
    ID_User CHAR(25),
    PRIMARY KEY (ID_Comment, ID_User),
    FOREIGN KEY (ID_Comment) REFERENCES Comment_Post(ID_CommentPost) ON DELETE CASCADE,
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



-- ADMIN -- 
INSERT INTO User VALUES ('A-12345678901234567890123', 'ADMIN', 'ADMIN','-',NULL,TRUE,'$2y$10$DCLT4NGWavvimM0LIpOLL.zu77nkH9uyK.Z3Y6QewejjgJQM/TdgS');