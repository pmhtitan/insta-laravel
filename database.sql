CREATE DATABASE IF NOT EXISTS laravel_master;
USE laravel_master;

CREATE TABLE IF NOT EXISTS users(
    id             int(255) auto_increment not null,
    role            varchar(20),
    name            varchar(100),
    surname         varchar(200),
    nick            varchar(100),
    email           varchar(255),
    password        varchar(255),
    image           varchar(255),
    created_at       datetime,
    updated_at       datetime,
    remember_token  varchar(255),
    CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS images(
    id              int(255) auto_increment not null,
    user_id         int(255),
    image_path      varchar(255),
    description     text,
    created_at       datetime,
    updated_at       datetime,
    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS comments(
    id              int(255) auto_increment not null,
    user_id         int(255),
    image_id        int(255),
    content         text,
    created_at       datetime,
    updated_at       datetime,
    CONSTRAINT pk_comments PRIMARY KEY(id),
    CONSTRAINT pk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT pk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS likes(
    id              int(255) auto_increment not null,
    user_id         int(255),
    image_id        int(255),
    created_at       datetime,
    updated_at       datetime,
    CONSTRAINT pk_likes PRIMARY KEY(id),
    CONSTRAINT pk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT pk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDb;

-- => Para hacer pruebas vamos a insertar unos datos

-- Usuarios
INSERT INTO users VALUES (NULL, 'user', 'Pablo', 'Moras', 'pmh', 'pablomprogram@gmail.com', 'pass', null, CURTIME(), CURTIME(), NULL);
INSERT INTO users VALUES (NULL, 'user', 'Mandila', 'Klobe', 'Kob', 'kob@gmail.com', 'kob', null, CURTIME(), CURTIME(), NULL);
INSERT INTO users VALUES (NULL, 'user', 'Juan', 'Trethm', 'Juanus', 'juanusmaximus@gmail.com', '123', null, CURTIME(), CURTIME(), NULL);

--Images
INSERT INTO images VALUES(NULL,1,'test.jpg','descripcion de prueba 1', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL,1,'playa.jpg','playa de preuba 1', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL,1,'arena.jpg','arena arenosa de prueba 1', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL,3,'musgo.jpg','mumumuummu musgooo', CURTIME(), CURTIME());

--Comments
INSERT INTO comments VALUES(NULL, 1,4, 'YO tmb quiero MUSGOO!!', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2,1, 'Buena foto de FAMILIA!!', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2,4, 'Sucios matasteis a Hameline u.u', CURTIME(), CURTIME());

--Likes
INSERT INTO likes VALUES(NULL, 1, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 1, CURTIME(), CURTIME());
