-- DROP DATABASE 30days;
CREATE DATABASE 30days;
USE 30days;

-- DROP TABLE IF EXISTS 30users;
CREATE TABLE 30users (
    id          BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,

    email       TEXT,
    pass_hash   VARCHAR( 42 ),
    salt        VARCHAR( 50 ),

    PRIMARY     KEY( id )
);

-- DROP TABLE IF EXISTS 30facebook;
CREATE TABLE 30facebook (
    fid             VARCHAR(20) NOT NULL,
    uid             BIGINT UNSIGNED NOT NULL,
    name            VARCHAR(255) NOT NULL,
    first_name      VARCHAR(255),
    middle_name     VARCHAR(255),
    last_name       VARCHAR(255),
    gender          VARCHAR(10),
    locale          VARCHAR(10),
    linked          TIMESTAMP NOT NULL DEFAULT NOW(),
    vast_visit      TIMESTAMP DEFAULT 0,

    PRIMARY KEY (fid),
    FOREIGN KEY (uid) REFERENCES 30users (id)
);
