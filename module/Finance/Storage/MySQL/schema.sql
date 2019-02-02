
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
