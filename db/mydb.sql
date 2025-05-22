CREATE DATABASE IF NOT EXISTS Blogspheres;

USE Blogspheres;

CREATE TABLE login(
    id int PRIMARY KEY AUTO_INCREMENT NOT Null,
    username varchar(30) NOT null,
    password varchar(255) NOT null
);

Create TABLE sign_up(
    id int PRIMARY KEY AUTO_INCREMENT NOT null,
    firstname varchar(30) not null,
    lastname varchar(30) not null,
    email varchar(30) not null,
    password varchar(255) not null
);

CREATE TABLE contact(
    id int PRIMARY KEY AUTO_INCREMENT not null,
    name varchar(30) not null,
    email varchar(30) not null,
    message varchar(255) not null
);

Create TABLE articles(
    id int PRIMARY KEY AUTO_INCREMENT not null,
    mainTitle varchar(100) not null,
    subTitle varchar(100) not null,
    description TEXT not null,
    categories varchar(30) not null,
    image varchar(255),
    user_id INT, 
    FOREIGN KEY (user_id) REFERENCES sign_up(id) ON DELETE CASCADE
);

Create TABLE superadmin(
    id int PRIMARY KEY AUTO_INCREMENT not null,
    username varchar(30) NOT null,
    password varchar(255) NOT null
);


Insert into sign_up VALUES (1,'test','test','test@gmail.com',SHA2('test',256));
Insert into login VALUES (1,'gmail@gmail.com',SHA2('gmail',256));
Insert into superadmin VALUES (1,'superadmin@gmail.com',SHA2('superadmin',256));
INSERT INTO `articles` (`id`, `mainTitle`, `subTitle`, `description`, `categories`, `image`, `image2`, `user_id`) VALUES
(1, 'The Silent Patient', ' Shocking Psychological Thriller of Silence and Secrets', 'Alicia Berenson lives a seemingly perfect life—until one night when she shoots her husband five times and never speaks another word. Her refusal to talk turns a domestic tragedy into a national mystery. Psychotherapist Theo Faber is determined to unravel the silence and uncover the truth. As he digs deeper into Alicia’s past, disturbing secrets emerge, blurring the line between patient and therapist. 
The Silent Patient is a gripping psychological thriller that keeps readers questioning every character’s motive right up to the final, jaw-dropping twist.', 
'technology', NULL, '/blogsphere_project/assets/blog4.jpg', 3);


