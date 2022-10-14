CREATE DATABASE forumprogrammer;
USE forumprogrammer;



CREATE TABLE user (
    -- PAKE PREFIX U-, PAKE uniqid('U-', true) -> generate 23, tambah 2 dari prefix = 25 --
    id_User CHAR(25) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL, 
    email VARCHAR(50) UNIQUE NOT NULL, 
    foto VARCHAR(50),
    isadmin BOOLEAN,
    isbanned BOOLEAN,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE post (
    -- PAKE PREFIX P-, PAKE uniqid('P-', true) -> generate 23, tambah 2 dari prefix = 25 --
    id_post CHAR(25) PRIMARY KEY,
    id_user CHAR(25), 
    waktu_post DATETIME, 
    kategori ENUM('JavaScript', 'Python', 'CPP', 'TypeScript', 'PHP', 'C', 'Java', 'Ruby', 'Dart', 'Kotlin'),
    isi LONG VARCHAR, 
    FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE
);


CREATE TABLE comment_post (
    -- PAKE PREFIX C-, PAKE uniqid('C-', true) -> generate 23, tambah 2 dari prefix = 25 --    
    id_commentpost CHAR(25) PRIMARY KEY, 
    id_post CHAR(25), 
    id_user CHAR(25),
    isi LONG VARCHAR,
    FOREIGN KEY (id_post) REFERENCES post(id_post) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE
);


CREATE TABLE like_post(
    -- PAKE PREFIX L-, PAKE uniqid('L-', true) -> generate 23, tambah 2 dari prefix = 25 --       
    id_like CHAR(25), 
    id_post CHAR(25), 
    id_user CHAR (25),
    PRIMARY KEY (id_post, id_user),
    FOREIGN KEY (id_post) REFERENCES post(id_post) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE   
    
);

CREATE TABLE like_comment(
    -- PAKE PREFIX A-, PAKE uniqid('L-', true) -> generate 23, tambah 2 dari prefix = 25 --     
    id_like CHAR(25),
    id_comment CHAR(25),
    id_user CHAR(25),
    PRIMARY KEY (id_comment, id_user),
    FOREIGN KEY (id_comment) REFERENCES comment_post(id_commentpost) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE    
);


CREATE TABLE gambar_postingan(
        -- PAKE PREFIX G-, PAKE uniqid('L-', true) -> generate 23, tambah 2 dari prefix = 25 -- 
    id_post CHAR(25), 
    nama_gambar VARCHAR(100), 
    urutan INTEGER, 
    PRIMARY KEY (id_post, nama_gambar),
    FOREIGN KEY (id_post) REFERENCES post(id_post) ON DELETE CASCADE
);



-- ADMIN -- 
INSERT INTO user VALUES ('A-12345678901234567890123', 'admin', 'admin','-',NULL,1,0,'$2y$10$DCLT4NGWavvimM0LIpOLL.zu77nkH9uyK.Z3Y6QewejjgJQM/TdgS');