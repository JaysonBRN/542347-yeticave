CREATE TABLE users (
id       INT AUTO_INCREMENT PRIMARY KEY,
dt_reg   DATETIME(0),
email    CHAR(48),
name     CHAR(20),
pass     CHAR(128),
avatar   CHAR(48),
contact  TEXT
);
CREATE UNIQUE INDEX email ON users(email);
CREATE UNIQUE INDEX id ON users(id);
CREATE INDEX dt_reg ON users(dt_reg);

CREATE TABLE lots (
id             INT AUTO_INCREMENT PRIMARY KEY,
dt_create      DATETIME(0),
name           CHAR(64),
cat_id         INT,
user_id        INT,
description    TEXT,
img            CHAR(48),
initial_price  INT,
dt_over        DATE,
bet_step       INT,
winner         INT,
FOREIGN KEY (user_id) REFERENCES users(id)
ON UPDATE CASCADE
ON DELETE RESTRICT,
FOREIGN KEY (cat_id) REFERENCES category(id)
ON UPDATE CASCADE
ON DELETE RESTRICT,
FOREIGN KEY (winner) REFERENCES users(id)
ON UPDATE CASCADE
ON DELETE RESTRICT
);
CREATE UNIQUE INDEX id ON lots(id);
CREATE INDEX cat_id ON lots(cat_id);
CREATE INDEX user_id ON lots(user_id);
CREATE INDEX initial_price ON lots(initial_price);
CREATE INDEX dt_over ON lots(dt_over);
CREATE INDEX name ON lots(name);

CREATE TABLE category (
id          INT AUTO_INCREMENT PRIMARY KEY,
name        CHAR(32),
css_class   CHAR(32)
);
CREATE UNIQUE INDEX id ON category(id);

CREATE TABLE bets (
id             INT AUTO_INCREMENT PRIMARY KEY,
dt_add         DATETIME(0),
amount         INT,
user_id        INT,
lot_id         INT,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (lot_id) REFERENCES lots(id)
);
