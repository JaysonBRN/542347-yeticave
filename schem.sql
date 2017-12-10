CREATE TABLE users (
id       INT AUTO_INCREMENT PRIMARY KEY,
dt_reg   DATETIME(0),
email    CHAR,
name     CHAR,
pass     CHAR(32),
avatar   CHAR,
contact  TEXT
);
CREATE TABLE lots (
id             INT AUTO_INCREMENT PRIMARY KEY,
dt_create      DATETIME(0),
name           CHAR,
cat_id         INT,
user_id        INT,
description    TEXT,
img            CHAR,
initial_price  INT,
dt_over        DATE,
bet_step       INT
);
CREATE TABLE category (
id    INT AUTO_INCREMENT PRIMARY KEY,
name  CHAR
);
CREATE TABLE bets (
id             INT AUTO_INCREMENT PRIMARY KEY,
dt_add         DATETIME(0),
amount         INT,
user_id        INT,
lot_id         INT
);