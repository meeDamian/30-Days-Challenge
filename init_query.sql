DROP DATABASE 30days;
CREATE DATABASE 30days;
USE 30days;

-- DROP TABLE IF EXISTS 30users;
CREATE TABLE 30users (
    id                  BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,

    email               TEXT,
    pass_hash           VARCHAR( 42 ),
    salt                VARCHAR( 50 ),

    PRIMARY             KEY( id )
);

-- DROP TABLE IF EXISTS 30facebook;
CREATE TABLE 30facebook (
    fid                 VARCHAR(20) NOT NULL,
    uid                 BIGINT UNSIGNED NOT NULL,
    name                VARCHAR(255) NOT NULL,
    first_name          VARCHAR(255),
    middle_name         VARCHAR(255),
    last_name           VARCHAR(255),
    gender              VARCHAR(10),
    locale              VARCHAR(10),
    linked              TIMESTAMP NOT NULL DEFAULT NOW(),
    vast_visit          TIMESTAMP DEFAULT 0,

    PRIMARY KEY (fid),
    FOREIGN KEY (uid) REFERENCES 30users (id)
);

CREATE TABLE 30status_challanges (
    id                  BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,

    uid                 BIGINT UNSIGNED NOT NULL,
    challange_id        BIGINT UNSIGNED NOT NULL,
    status_status       BIGINT UNSIGNED NOT NULL, -- status of a challange (if ongoing look at days)

    current_day         INT SIGNED NOT NULL DEFAULT 0, -- number of current day OR (0 for not started; -1 for finished)

    date_started        TIMESTAMP NOT NULL DEFAULT NOW(),
    date_last_update    TIMESTAMP NOT NULL,
    date_completed      TIMESTAMP NOT NULL,

    PRIMARY KEY( id ),
    FOREIGN KEY( uid ) REFERENCES 30users( id ),
    FOREIGN KEY( challange_id ) REFERENCES 30challanges_defs( id ),
    FOREIGN KEY( status_status ) REFERENCES 30status_status( id )
);

-- status of EACH day for EACH challange for EACH user; yeah this table will be pretty fucking huge eventually (=
CREATE TABLE 30status_days (
    id                  BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,

    status_id           BIGINT UNSIGNED NOT NULL,
    status_status       BIGINT UNSIGNED NOT NULL,

    date_started        TIMESTAMP NOT NULL DEFAULT NOW(), -- when first seen by user
    date_completed      TIMESTAMP NOT NULL,
    date_edited         TIMESTAMP, -- not null only when edited AFTER completed

    PRIMARY KEY( id ),
    FOREIGN KEY( status_id ) REFERENCES 30status_challanges( id ),
    FOREIGN KEY( status_status ) REFERENCES 30status_status( id )
);

-- CONSTANTS
CREATE TABLE 30status_status (
    id                  BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
    description         VARCHAR( 10 ) DEFAULT "inb4", -- possible (inb4|ongoing|completed|failed)
    PRIMARY KEY( id )
);

CREATE TABLE 30challanges_defs (
    id                  BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,

    -- creation info
    creator_id          BIGINT UNSIGNED NOT NULL,
    date_created        TIMESTAMP NOT NULL DEFAULT NOW(),

    -- modification info
    last_modifier_id    BIGINT UNSIGNED NOT NULL,
    date_modified       TIMESTAMP NOT NULL,

    description         TEXT, -- challange description
    day_description     TEXT, -- is used when definition in particular day is empty

    PRIMARY KEY( id ),
    FOREIGN KEY( creator_id ) REFERENCES 30users ( id ),
    FOREIGN KEY( last_modifier_id ) REFERENCES 30users ( id )
);

CREATE TABLE 30days_defs (
    id                  BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,

    challange_id        BIGINT UNSIGNED NOT NULL,
    day_number          INT UNSIGNED NOT NULL,
    description         TEXT,

    date_created        TIMESTAMP NOT NULL DEFAULT NOW(),
    date_modified       TIMESTAMP NOT NULL,

    PRIMARY KEY( id ),
    FOREIGN KEY( challange_id ) REFERENCES 30challanges_defs( id )
);

CREATE TABLE 30challanges_elements_rels (
    id                  BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, -- not really necessary, I guess...

    entity_id           BIGINT UNSIGNED NOT NULL, -- references to challange or day
    element_id          BIGINT UNSIGNED NOT NULL, -- references to elements

    PRIMARY KEY( id )
    -- FOREINGN KEY(entity_id) REFERENCES(challenges OR days) -- may referer to two different tables, therefor it's not possible to FK dat shit 
);

CREATE TABLE 30challanges_elements (
    id                  BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
    def_id              BIGINT UNSIGNED NOT NULL,

    enabled             BOOLEAN NOT NULL DEFAULT TRUE, -- set to false ONLY when particular day overrides general contest preferences in disabling something (ex. you can embed yt video every day EXCEPT that one day)
    optional            BOOLEAN NOT NULL DEFAULT FALSE, -- defines if filling this element by user is optional
    more                TEXT, -- defines additional field proporties; must be formalized string read by php; example proporties: yt embeded video size, text length

    PRIMARY KEY( id ),
    FOREIGN KEY(def_id) REFERENCES 30challanges_elements_defs(id)
);

CREATE TABLE 30challanges_elements_defs (
    id                  BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, -- used for references from 30challanges_elements only
    name                VARCHAR(255) NOT NULL,  -- name of a challange ex. (youtube, vimeo, picture)
    type                VARCHAR(10) NOT NULL,   -- (embed|url|text|picture) PRE defined types!!!

    PRIMARY KEY( id )
);


-- CREATE DEFAULT INSERTS HERE 