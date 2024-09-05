DROP DATABASE IF EXISTS tradeshop_DB;

CREATE DATABASE tradeshop_DB;

USE tradeshop_DB;

CREATE TABLE
    users (
        DPI BIGINT NOT NULL UNIQUE,
        username VARCHAR(25) NOT NULL,
        usrpass VARCHAR(65) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        usr_rol INT DEFAULT (1),
        /*1 trader, 0 admin*/ isActive INT DEFAULT (1),
        /*1 true, 0 false*/ PRIMARY KEY (DPI)
    );

CREATE TABLE
    cards (
        card_number BIGINT NOT NULL,
        cardname VARCHAR(50) NOT NULL,
        cvv INT NOT NULL,
        exp DATE NOT NULL,
        PRIMARY KEY (card_number)
    );

CREATE TABLE
    traders (
        user_dpi BIGINT NOT NULL,
        mainname VARCHAR(50) NULL,
        forename VARCHAR(50) NULL,
        uAddress VARCHAR(100) NULL,
        no_card BIGINT NULL,
        phone BIGINT NULL,
        birthday DATE NOT NULL,
        PRIMARY KEY (user_dpi),
        CONSTRAINT user_dpi_fk FOREIGN KEY (user_dpi) REFERENCES users (DPI),
        CONSTRAINT user_card_fk FOREIGN KEY (no_card) REFERENCES cards (card_number)
    );

CREATE TABLE
    products (
        UIDC BIGINT NOT NULL,
        prodname VARCHAR(50) NOT NULL,
        proddesc VARCHAR(250) DEFAULT ('NO DESC'),
        price DECIMAL(6, 2) DEFAULT (0.00),
        isIntercambiable INT DEFAULT (1),
        /*1 true, 0 false*/ PRIMARY KEY (UIDC)
    );

CREATE TABLE
    user_inventory (
        trader_dpi BIGINT NOT NULL,
        product_uidc BIGINT NOT NULL,
        CONSTRAINT fk_trader_inventory FOREIGN KEY (trader_dpi) REFERENCES traders (user_dpi),
        CONSTRAINT fk_prod_uic FOREIGN KEY (product_uidc) REFERENCES products (UIDC)
    );

CREATE TABLE
    posts (
        UIDC BIGINT NOT NULL,
        trader_dpi BIGINT NOT NULL,
        product_uidc BIGINT NOT NULL,
        postAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        desc_post VARCHAR(350) DEFAULT ('NO DESC'),
        isAvaible INT DEFAULT (1),
        /*1 avaible, 0 sold*/ PRIMARY KEY (UIDC),
        CONSTRAINT fk_creator_dpi FOREIGN KEY (trader_dpi) REFERENCES traders (user_dpi),
        CONSTRAINT fk_product_published FOREIGN KEY (product_uidc) REFERENCES products (UIDC)
    );

CREATE table
    offers (
        UIDC BIGINT NOT NULL,
        offerdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        amount DECIMAL(6, 2) DEFAULT (0.00),
        paid_product BIGINT NULL,
        offerstate INT DEFAULT (0),
        /*0 pending, 1 acept, -1 declined*/ offermessage VARCHAR(250) NULL,
        trader_dpi BIGINT NOT NULL,
        post_uid BIGINT NOT NULL,
        PRIMARY KEY (UIDC),
        CONSTRAINT fk_tradeoffer FOREIGN KEY (trader_dpi) REFERENCES traders (user_dpi),
        CONSTRAINT fk_product_paid FOREIGN KEY (paid_product) REFERENCES products (UIDC),
        CONSTRAINT fk_post_offer FOREIGN KEY (post_uid) REFERENCES posts (UIDC)
    );

CREATE table
    trades (
        UIDC BIGINT NOT NULL,
        aceptedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        offer_uid BIGINT NOT NULL,
        tradetype INT DEFAULT (0),
        /*0 trade, 1 sell*/ PRIMARY KEY (UIDC),
        CONSTRAINT fk_offer_traded FOREIGN KEY (offer_uid) REFERENCES offers (UIDC)
    );

CREATE table
    payments (
        UIDC BIGINT NOT NULL,
        trader_pay BIGINT NOT NULL,
        trader_recipe BIGINT NOT NULL,
        trade_pay BIGINT NOT NULL,
        PRIMARY KEY (UIDC),
        CONSTRAINT fk_trader_pay FOREIGN KEY (trader_pay) REFERENCES traders (user_dpi),
        CONSTRAINT fk_trader_recipe FOREIGN KEY (trader_recipe) REFERENCES traders (user_dpi),
        CONSTRAINT fk_trade_payed FOREIGN KEY (trade_pay) REFERENCES trades (UIDC)
    );

CREATE table
    shippings (
        UIDC BIGINT NOT NULL,
        emitedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        reciptAt TIMESTAMP NULL,
        thirdPersonShip INT DEFAULT (0),
        /*0 false, 1 true*/ emisor_dpi BIGINT NOT NULL,
        recipt_dpi BIGINT NOT NULL,
        trade_uidc BIGINT NOT NULL,
        PRIMARY KEY (UIDC),
        CONSTRAINT fk_trade_shiped FOREIGN KEY (trade_uidc) REFERENCES trades (UIDC),
        CONSTRAINT fk_trader_emisor FOREIGN KEY (emisor_dpi) REFERENCES traders (user_dpi),
        CONSTRAINT fk_trader_recipt FOREIGN KEY (recipt_dpi) REFERENCES traders (user_dpi)
    );

-- Insert data into users table
INSERT INTO
    users (DPI, username, usrpass, email, usr_rol, isActive)
VALUES
    (
        1000000000001,
        'john_doe',
        'password1',
        'john@example.com',
        1,
        1
    ),
    (
        1000000000002,
        'jane_smith',
        'password2',
        'jane@example.com',
        1,
        1
    ),
    (
        1000000000003,
        'admin1',
        'adminpass1',
        'admin1@example.com',
        0,
        1
    ),
    (
        1000000000004,
        'admin2',
        'adminpass2',
        'admin2@example.com',
        0,
        1
    ),
    (
        1000000000005,
        'trader1',
        'traderpass1',
        'trader1@example.com',
        1,
        1
    ),
    (
        1000000000006,
        'trader2',
        'traderpass2',
        'trader2@example.com',
        1,
        1
    ),
    (
        1000000000007,
        'trader3',
        'traderpass3',
        'trader3@example.com',
        1,
        1
    ),
    (
        1000000000008,
        'trader4',
        'traderpass4',
        'trader4@example.com',
        1,
        1
    ),
    (
        1000000000009,
        'trader5',
        'traderpass5',
        'trader5@example.com',
        1,
        1
    ),
    (
        1000000000010,
        'trader6',
        'traderpass6',
        'trader6@example.com',
        1,
        1
    ),
    (
        1000000000011,
        'trader7',
        'traderpass7',
        'trader7@example.com',
        1,
        1
    ),
    (
        1000000000012,
        'trader8',
        'traderpass8',
        'trader8@example.com',
        1,
        1
    ),
    (
        1000000000013,
        'trader9',
        'traderpass9',
        'trader9@example.com',
        1,
        1
    ),
    (
        1000000000014,
        'trader10',
        'traderpass10',
        'trader10@example.com',
        1,
        1
    ),
    (
        1000000000015,
        'trader11',
        'traderpass11',
        'trader11@example.com',
        1,
        1
    ),
    (
        1000000000016,
        'trader12',
        'traderpass12',
        'trader12@example.com',
        1,
        1
    ),
    (
        1000000000017,
        'trader13',
        'traderpass13',
        'trader13@example.com',
        1,
        1
    ),
    (
        1000000000018,
        'trader14',
        'traderpass14',
        'trader14@example.com',
        1,
        1
    ),
    (
        1000000000019,
        'trader15',
        'traderpass15',
        'trader15@example.com',
        1,
        1
    ),
    (
        1000000000020,
        'trader16',
        'traderpass16',
        'trader16@example.com',
        1,
        1
    );

-- Insert data into cards table
INSERT INTO
    cards (card_number, cardname, cvv, exp)
VALUES
    (4000000000000001, 'John Doe', 123, '2026-01-01'),
    (4000000000000002, 'Jane Smith', 456, '2026-02-01'),
    (4000000000000003, 'Trader1', 789, '2027-03-01'),
    (4000000000000004, 'Trader2', 321, '2026-04-01'),
    (4000000000000005, 'Trader3', 654, '2026-05-01'),
    (4000000000000006, 'Trader4', 987, '2026-06-01'),
    (4000000000000007, 'Trader5', 159, '2026-07-01'),
    (4000000000000008, 'Trader6', 753, '2026-08-01'),
    (4000000000000009, 'Trader7', 852, '2026-09-01'),
    (4000000000000010, 'Trader8', 951, '2026-10-01'),
    (4000000000000011, 'Trader9', 741, '2026-11-01'),
    (4000000000000012, 'Trader10', 369, '2026-12-01'),
    (4000000000000013, 'Trader11', 258, '2027-01-01'),
    (4000000000000014, 'Trader12', 147, '2027-02-01'),
    (4000000000000015, 'Trader13', 654, '2027-03-01'),
    (4000000000000016, 'Trader14', 321, '2027-04-01'),
    (4000000000000017, 'Trader15', 987, '2027-05-01'),
    (4000000000000018, 'Trader16', 789, '2027-06-01'),
    (4000000000000019, 'Trader17', 852, '2027-07-01'),
    (4000000000000020, 'Trader18', 951, '2027-08-01');

-- Insert data into traders table
INSERT INTO
    traders (
        user_dpi,
        mainname,
        forename,
        uAddress,
        no_card,
        phone,
        birthday
    )
VALUES
    (
        1000000000001,
        'John',
        'Doe',
        '123 Main St',
        4000000000000001,
        5551234567,
        '1990-01-01'
    ),
    (
        1000000000002,
        'Jane',
        'Smith',
        '456 Maple St',
        4000000000000002,
        5552345678,
        '1992-02-02'
    ),
    (
        1000000000005,
        'Trader1',
        'Lastname1',
        '789 Oak St',
        4000000000000003,
        5553456789,
        '1988-03-03'
    ),
    (
        1000000000006,
        'Trader2',
        'Lastname2',
        '101 Pine St',
        4000000000000004,
        5554567890,
        '1991-04-04'
    ),
    (
        1000000000007,
        'Trader3',
        'Lastname3',
        '202 Cedar St',
        4000000000000005,
        5555678901,
        '1993-05-05'
    ),
    (
        1000000000008,
        'Trader4',
        'Lastname4',
        '303 Birch St',
        4000000000000006,
        5556789012,
        '1994-06-06'
    ),
    (
        1000000000009,
        'Trader5',
        'Lastname5',
        '404 Elm St',
        4000000000000007,
        5557890123,
        '1987-07-07'
    ),
    (
        1000000000010,
        'Trader6',
        'Lastname6',
        '505 Ash St',
        4000000000000008,
        5558901234,
        '1990-08-08'
    ),
    (
        1000000000011,
        'Trader7',
        'Lastname7',
        '606 Willow St',
        4000000000000009,
        5559012345,
        '1989-09-09'
    ),
    (
        1000000000012,
        'Trader8',
        'Lastname8',
        '707 Redwood St',
        4000000000000010,
        5550123456,
        '1985-10-10'
    ),
    (
        1000000000013,
        'Trader9',
        'Lastname9',
        '808 Chestnut St',
        4000000000000011,
        5551234567,
        '1996-11-11'
    ),
    (
        1000000000014,
        'Trader10',
        'Lastname10',
        '909 Spruce St',
        4000000000000012,
        5552345678,
        '1994-12-12'
    ),
    (
        1000000000015,
        'Trader11',
        'Lastname11',
        '1010 Fir St',
        4000000000000013,
        5553456789,
        '1991-01-13'
    ),
    (
        1000000000016,
        'Trader12',
        'Lastname12',
        '1111 Pine St',
        4000000000000014,
        5554567890,
        '1986-02-14'
    ),
    (
        1000000000017,
        'Trader13',
        'Lastname13',
        '1212 Maple St',
        4000000000000015,
        5555678901,
        '1988-03-15'
    ),
    (
        1000000000018,
        'Trader14',
        'Lastname14',
        '1313 Oak St',
        4000000000000016,
        5556789012,
        '1992-04-16'
    ),
    (
        1000000000019,
        'Trader15',
        'Lastname15',
        '1414 Cedar St',
        4000000000000017,
        5557890123,
        '1990-05-17'
    ),
    (
        1000000000020,
        'Trader16',
        'Lastname16',
        '1515 Birch St',
        4000000000000018,
        5558901234,
        '1989-06-18'
    );

-- Insert data into products table
INSERT INTO
    products (UIDC, prodname, proddesc, price, isIntercambiable)
VALUES
    (10001, 'Product1', 'Description1', 19.99, 1),
    (10002, 'Product2', 'Description2', 29.99, 1),
    (10003, 'Product3', 'Description3', 39.99, 1),
    (10004, 'Product4', 'Description4', 49.99, 1),
    (10005, 'Product5', 'Description5', 59.99, 1),
    (10006, 'Product6', 'Description6', 69.99, 1),
    (10007, 'Product7', 'Description7', 79.99, 1),
    (10008, 'Product8', 'Description8', 89.99, 1),
    (10009, 'Product9', 'Description9', 99.99, 1),
    (10010, 'Product10', 'Description10', 109.99, 1),
    (10011, 'Product11', 'Description11', 119.99, 1),
    (10012, 'Product12', 'Description12', 129.99, 1),
    (10013, 'Product13', 'Description13', 139.99, 1),
    (10014, 'Product14', 'Description14', 149.99, 1),
    (10015, 'Product15', 'Description15', 159.99, 1),
    (10016, 'Product16', 'Description16', 169.99, 1),
    (10017, 'Product17', 'Description17', 179.99, 1),
    (10018, 'Product18', 'Description18', 189.99, 1),
    (10019, 'Product19', 'Description19', 199.99, 1),
    (10020, 'Product20', 'Description20', 209.99, 1);

-- Insert data into user_inventory table
INSERT INTO
    user_inventory (trader_dpi, product_uidc)
VALUES
    (1000000000001, 10001),
    (1000000000002, 10002),
    (1000000000005, 10003),
    (1000000000006, 10004),
    (1000000000007, 10005),
    (1000000000008, 10006),
    (1000000000009, 10007),
    (1000000000010, 10008),
    (1000000000011, 10009),
    (1000000000012, 10010),
    (1000000000013, 10011),
    (1000000000014, 10012),
    (1000000000015, 10013),
    (1000000000016, 10014),
    (1000000000017, 10015),
    (1000000000018, 10016),
    (1000000000019, 10017),
    (1000000000020, 10018),
    (1000000000016, 10019),
    (1000000000020, 10020);

-- Insert data into posts table
INSERT INTO
    posts (
        UIDC,
        trader_dpi,
        product_uidc,
        postAt,
        desc_post,
        isAvaible
    )
VALUES
    (
        20001,
        1000000000001,
        10001,
        CURRENT_TIMESTAMP,
        'Post Description 1',
        1
    ),
    (
        20002,
        1000000000002,
        10002,
        CURRENT_TIMESTAMP,
        'Post Description 2',
        1
    ),
    (
        20003,
        1000000000005,
        10003,
        CURRENT_TIMESTAMP,
        'Post Description 3',
        1
    ),
    (
        20004,
        1000000000006,
        10004,
        CURRENT_TIMESTAMP,
        'Post Description 4',
        1
    ),
    (
        20005,
        1000000000007,
        10005,
        CURRENT_TIMESTAMP,
        'Post Description 5',
        1
    ),
    (
        20006,
        1000000000008,
        10006,
        CURRENT_TIMESTAMP,
        'Post Description 6',
        1
    ),
    (
        20007,
        1000000000009,
        10007,
        CURRENT_TIMESTAMP,
        'Post Description 7',
        1
    ),
    (
        20008,
        1000000000010,
        10008,
        CURRENT_TIMESTAMP,
        'Post Description 8',
        1
    ),
    (
        20009,
        1000000000011,
        10009,
        CURRENT_TIMESTAMP,
        'Post Description 9',
        1
    ),
    (
        20010,
        1000000000012,
        10010,
        CURRENT_TIMESTAMP,
        'Post Description 10',
        1
    ),
    (
        20011,
        1000000000013,
        10011,
        CURRENT_TIMESTAMP,
        'Post Description 11',
        1
    ),
    (
        20012,
        1000000000014,
        10012,
        CURRENT_TIMESTAMP,
        'Post Description 12',
        1
    ),
    (
        20013,
        1000000000015,
        10013,
        CURRENT_TIMESTAMP,
        'Post Description 13',
        1
    ),
    (
        20014,
        1000000000016,
        10014,
        CURRENT_TIMESTAMP,
        'Post Description 14',
        1
    ),
    (
        20015,
        1000000000017,
        10015,
        CURRENT_TIMESTAMP,
        'Post Description 15',
        1
    ),
    (
        20016,
        1000000000018,
        10016,
        CURRENT_TIMESTAMP,
        'Post Description 16',
        1
    ),
    (
        20017,
        1000000000019,
        10017,
        CURRENT_TIMESTAMP,
        'Post Description 17',
        1
    ),
    (
        20018,
        1000000000020,
        10018,
        CURRENT_TIMESTAMP,
        'Post Description 18',
        1
    ),
    (
        20019,
        1000000000016,
        10019,
        CURRENT_TIMESTAMP,
        'Post Description 19',
        1
    ),
    (
        20020,
        1000000000020,
        10020,
        CURRENT_TIMESTAMP,
        'Post Description 20',
        1
    );

-- Insert data into offers table
INSERT INTO
    offers (
        UIDC,
        offerdate,
        amount,
        paid_product,
        offerstate,
        offermessage,
        trader_dpi,
        post_uid
    )
VALUES
    (
        30001,
        CURRENT_TIMESTAMP,
        0,
        10020,
        0,
        'Offer Message 1',
        1000000000001,
        20001
    ),
    (
        30002,
        CURRENT_TIMESTAMP,
        0,
        10019,
        0,
        'Offer Message 2',
        1000000000002,
        20002
    ),
    (
        30003,
        CURRENT_TIMESTAMP,
        0,
        10018,
        0,
        'Offer Message 3',
        1000000000005,
        20003
    ),
    (
        30004,
        CURRENT_TIMESTAMP,
        0,
        10017,
        0,
        'Offer Message 4',
        1000000000006,
        20004
    ),
    (
        30005,
        CURRENT_TIMESTAMP,
        59.99,
        NULL,
        0,
        'Offer Message 5',
        1000000000007,
        20005
    ),
    (
        30006,
        CURRENT_TIMESTAMP,
        0,
        10015,
        0,
        'Offer Message 6',
        1000000000008,
        20006
    ),
    (
        30007,
        CURRENT_TIMESTAMP,
        0,
        10014,
        0,
        'Offer Message 7',
        1000000000009,
        20007
    ),
    (
        30008,
        CURRENT_TIMESTAMP,
        89.99,
        NULL,
        0,
        'Offer Message 8',
        1000000000010,
        20008
    ),
    (
        30009,
        CURRENT_TIMESTAMP,
        99.99,
        NULL,
        0,
        'Offer Message 9',
        1000000000011,
        20009
    ),
    (
        30010,
        CURRENT_TIMESTAMP,
        0,
        10011,
        0,
        'Offer Message 10',
        1000000000012,
        20019
    ),
    (
        30011,
        CURRENT_TIMESTAMP,
        0,
        10010,
        0,
        'Offer Message 11',
        1000000000013,
        20011
    ),
    (
        30012,
        CURRENT_TIMESTAMP,
        0,
        10009,
        0,
        'Offer Message 12',
        1000000000014,
        20012
    ),
    (
        30013,
        CURRENT_TIMESTAMP,
        0,
        10008,
        0,
        'Offer Message 13',
        1000000000015,
        20013
    ),
    (
        30014,
        CURRENT_TIMESTAMP,
        0,
        NULL,
        0,
        'Offer Message 14',
        1000000000016,
        20014
    ),
    (
        30015,
        CURRENT_TIMESTAMP,
        0,
        10006,
        0,
        'Offer Message 15',
        1000000000017,
        20015
    ),
    (
        30016,
        CURRENT_TIMESTAMP,
        0,
        NULL,
        0,
        'Offer Message 16',
        1000000000018,
        20016
    ),
    (
        30017,
        CURRENT_TIMESTAMP,
        0,
        10004,
        0,
        'Offer Message 17',
        1000000000019,
        20017
    ),
    (
        30018,
        CURRENT_TIMESTAMP,
        0,
        10003,
        0,
        'Offer Message 18',
        1000000000020,
        20018
    ),
    (
        30019,
        CURRENT_TIMESTAMP,
        0,
        10002,
        0,
        'Offer Message 19',
        1000000000016,
        20019
    ),
    (
        30020,
        CURRENT_TIMESTAMP,
        0,
        10001,
        0,
        'Offer Message 20',
        1000000000020,
        20020
    );

-- Insert data into trades table
INSERT INTO
    trades (UIDC, aceptedAt, offer_uid, tradetype)
VALUES
    (40001, CURRENT_TIMESTAMP, 30001, 0),
    (40002, CURRENT_TIMESTAMP, 30002, 0),
    (40003, CURRENT_TIMESTAMP, 30003, 0),
    (40004, CURRENT_TIMESTAMP, 30004, 0),
    (40005, CURRENT_TIMESTAMP, 30005, 1),
    (40006, CURRENT_TIMESTAMP, 30006, 0),
    (40007, CURRENT_TIMESTAMP, 30007, 0),
    (40008, CURRENT_TIMESTAMP, 30008, 1),
    (40009, CURRENT_TIMESTAMP, 30009, 1),
    (40010, CURRENT_TIMESTAMP, 30010, 0),
    (40011, CURRENT_TIMESTAMP, 30011, 0),
    (40012, CURRENT_TIMESTAMP, 30012, 0),
    (40013, CURRENT_TIMESTAMP, 30013, 0),
    (40014, CURRENT_TIMESTAMP, 30014, 1),
    (40015, CURRENT_TIMESTAMP, 30015, 0),
    (40016, CURRENT_TIMESTAMP, 30016, 1),
    (40017, CURRENT_TIMESTAMP, 30017, 0),
    (40018, CURRENT_TIMESTAMP, 30018, 0),
    (40019, CURRENT_TIMESTAMP, 30019, 0),
    (40020, CURRENT_TIMESTAMP, 30020, 0);

-- Insert data into payments table
INSERT INTO
    payments (UIDC, trader_pay, trader_recipe, trade_pay)
VALUES
    (50001, 1000000000001, 1000000000002, 40001),
    (50002, 1000000000005, 1000000000006, 40002),
    (50003, 1000000000007, 1000000000008, 40003),
    (50004, 1000000000009, 1000000000010, 40004),
    (50005, 1000000000011, 1000000000012, 40005),
    (50006, 1000000000013, 1000000000014, 40006),
    (50007, 1000000000015, 1000000000016, 40007),
    (50008, 1000000000017, 1000000000018, 40008),
    (50009, 1000000000019, 1000000000020, 40009),
    (50010, 1000000000020, 1000000000019, 40010),
    (50011, 1000000000018, 1000000000017, 40011),
    (50012, 1000000000016, 1000000000015, 40012),
    (50013, 1000000000014, 1000000000013, 40013),
    (50014, 1000000000012, 1000000000011, 40014),
    (50015, 1000000000010, 1000000000009, 40015),
    (50016, 1000000000008, 1000000000007, 40016),
    (50017, 1000000000006, 1000000000005, 40017),
    (50018, 1000000000007, 1000000000009, 40018),
    (50019, 1000000000002, 1000000000001, 40019),
    (50020, 1000000000001, 1000000000005, 40020);

-- Insert data into shippings table
INSERT INTO
    shippings (
        UIDC,
        emitedAt,
        reciptAt,
        thirdPersonShip,
        emisor_dpi,
        recipt_dpi,
        trade_uidc
    )
VALUES
    (
        60001,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000001,
        1000000000002,
        40001
    ),
    (
        60002,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000005,
        1000000000006,
        40002
    ),
    (
        60003,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000007,
        1000000000008,
        40003
    ),
    (
        60004,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000009,
        1000000000010,
        40004
    ),
    (
        60005,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000011,
        1000000000012,
        40005
    ),
    (
        60006,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000013,
        1000000000014,
        40006
    ),
    (
        60007,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000015,
        1000000000016,
        40007
    ),
    (
        60008,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000017,
        1000000000018,
        40008
    ),
    (
        60009,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000019,
        1000000000020,
        40009
    ),
    (
        60010,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000020,
        1000000000019,
        40010
    ),
    (
        60011,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000018,
        1000000000017,
        40011
    ),
    (
        60012,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000016,
        1000000000015,
        40012
    ),
    (
        60013,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000014,
        1000000000013,
        40013
    ),
    (
        60014,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000012,
        1000000000011,
        40014
    ),
    (
        60015,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000010,
        1000000000009,
        40015
    ),
    (
        60016,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000008,
        1000000000007,
        40016
    ),
    (
        60017,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000006,
        1000000000005,
        40017
    ),
    (
        60018,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000007,
        1000000000009,
        40018
    ),
    (
        60019,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000002,
        1000000000001,
        40019
    ),
    (
        60020,
        CURRENT_TIMESTAMP,
        NULL,
        0,
        1000000000001,
        1000000000005,
        40020
    );

    select * from user_inventory ui 
    left join products p on ui.product_uidc = p.UIDC 
    left join traders t on ui.trader_dpi = t.user_dpi
    left join users u on t.user_dpi = u.DPI where ui.trader_dpi = 1000000000001;