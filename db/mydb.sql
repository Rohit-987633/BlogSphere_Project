CREATE DATABASE IF NOT EXISTS Blogspheres;

USE Blogspheres;

CREATE TABLE login(
    id int PRIMARY KEY AUTO_INCREMENT NOT Null,
    username varchar(30) NOT null,
    password varchar(255) NOT null
);

Insert into login VALUES (1,'test@gmail.com',SHA2('test',256));

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
    description varchar(200) not null,
    categories varchar(30) not null,
    image longblob
);
