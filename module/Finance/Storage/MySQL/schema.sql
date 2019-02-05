
CREATE TABLE rocky_spending (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL
);

CREATE TABLE rocky_calendar (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `spending_id` INT DEFAULT NULL COMMENT 'Related spending ID',
    `date` DATE NOT NULL COMMENT 'Date of this payment',
    `name` varchar(255) NOT NULL,
    `amount` FLOAT NOT NULL,

    FOREIGN KEY (spending_id) REFERENCES rocky_spending(id) ON DELETE CASCADE
);

CREATE TABLE rocky_income (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `from` varchar(255) NOT NULL,
    `date` DATE NOT NULL COMMENT 'Date of this income',
    `amount` FLOAT NOT NULL,
    `comment` TEXT NOT NULL
);

CREATE TABLE rocky_currency (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `code` varchar(10) NOT NULL COMMENT 'Currency code'
);