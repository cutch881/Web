drop table if exists portfolio;

create table if not exists portfolio (
	id INT,
	userId VARCHAR(2),
	symbol VARCHAR(8),
	amount INT
);
insert into portfolio (id, userId, symbol, amount) values (1, 4, 'C', 104);
insert into portfolio (id, userId, symbol, amount) values (2, 3, 'AAPL', 132);
insert into portfolio (id, userId, symbol, amount) values (3, 1, 'GOOG', 10);
insert into portfolio (id, userId, symbol, amount) values (4, 9, 'HAL', 100);
insert into portfolio (id, userId, symbol, amount) values (5, 5, 'ETR', 101);
insert into portfolio (id, userId, symbol, amount) values (6, 3, 'CBG', 162);
insert into portfolio (id, userId, symbol, amount) values (7, 5, 'EBAY', 90);
insert into portfolio (id, userId, symbol, amount) values (8, 4, 'ECL', 8);
insert into portfolio (id, userId, symbol, amount) values (9, 8, 'AAPL', 30);
insert into portfolio (id, userId, symbol, amount) values (10, 9, 'AAPL', 92);
insert into portfolio (id, userId, symbol, amount) values (11, 10, 'AAPL', 37);
insert into portfolio (id, userId, symbol, amount) values (12, 5, 'WFC', 118);
insert into portfolio (id, userId, symbol, amount) values (13, 7, 'AAPL', 95);
insert into portfolio (id, userId, symbol, amount) values (14, 4, 'WYN', 120);
insert into portfolio (id, userId, symbol, amount) values (15, 9, 'BA', 169);
insert into portfolio (id, userId, symbol, amount) values (16, 2, 'AMAT', 10);
insert into portfolio (id, userId, symbol, amount) values (17, 5, 'CSCO', 129);
insert into portfolio (id, userId, symbol, amount) values (18, 2, 'AES', 136);
insert into portfolio (id, userId, symbol, amount) values (19, 3, 'CNC', 120);
insert into portfolio (id, userId, symbol, amount) values (20, 2, 'EIX', 27);
insert into portfolio (id, userId, symbol, amount) values (21, 7, 'XEL', 113);
insert into portfolio (id, userId, symbol, amount) values (22, 3, 'FFIV', 136);
insert into portfolio (id, userId, symbol, amount) values (23, 5, 'FDX', 76);
insert into portfolio (id, userId, symbol, amount) values (24, 7, 'QCOM', 201);
insert into portfolio (id, userId, symbol, amount) values (25, 5, 'NFLX', 47);
insert into portfolio (id, userId, symbol, amount) values (26, 5, 'DIS', 5);
insert into portfolio (id, userId, symbol, amount) values (27, 3, 'GOOG', 5);
insert into portfolio (id, userId, symbol, amount) values (28, 2, 'ORLY', 129);
insert into portfolio (id, userId, symbol, amount) values (29, 2, 'GOOG', 93);
insert into portfolio (id, userId, symbol, amount) values (30, 7, 'V', 119);
insert into portfolio (id, userId, symbol, amount) values (31, 4, 'CAT', 70);
insert into portfolio (id, userId, symbol, amount) values (32, 10, 'ABT', 146);
insert into portfolio (id, userId, symbol, amount) values (33, 2, 'HAL', 85);
insert into portfolio (id, userId, symbol, amount) values (34, 6, 'AWK', 3);
insert into portfolio (id, userId, symbol, amount) values (35, 1, 'EFX', 87);
insert into portfolio (id, userId, symbol, amount) values (36, 3, 'GOOG', 127);
insert into portfolio (id, userId, symbol, amount) values (37, 6, 'BMY', 2);
insert into portfolio (id, userId, symbol, amount) values (38, 1, 'NFLX', 75);
insert into portfolio (id, userId, symbol, amount) values (39, 4, 'ADM', 101);
insert into portfolio (id, userId, symbol, amount) values (40, 8, 'UA', 54);
insert into portfolio (id, userId, symbol, amount) values (41, 4, 'KMX', 155);
insert into portfolio (id, userId, symbol, amount) values (42, 8, 'MCD', 5);
insert into portfolio (id, userId, symbol, amount) values (43, 8, 'MSFT', 56);
insert into portfolio (id, userId, symbol, amount) values (44, 10, 'GE', 112);
insert into portfolio (id, userId, symbol, amount) values (45, 9, 'MU', 129);
insert into portfolio (id, userId, symbol, amount) values (46, 8, 'EBAY', 46);
insert into portfolio (id, userId, symbol, amount) values (47, 2, 'C', 108);
insert into portfolio (id, userId, symbol, amount) values (48, 9, 'BRK.B', 128);
insert into portfolio (id, userId, symbol, amount) values (49, 10, 'MAR', 173);
insert into portfolio (id, userId, symbol, amount) values (50, 7, 'WM', 93);
insert into portfolio (id, userId, symbol, amount) values (51, 5, 'GOOG', 104);
insert into portfolio (id, userId, symbol, amount) values (52, 8, 'GOOG', 100);
insert into portfolio (id, userId, symbol, amount) values (53, 1, 'SHW', 88);
insert into portfolio (id, userId, symbol, amount) values (54, 4, 'C', 143);
insert into portfolio (id, userId, symbol, amount) values (55, 6, 'PEP', 161);
insert into portfolio (id, userId, symbol, amount) values (56, 7, 'WY', 86);
insert into portfolio (id, userId, symbol, amount) values (57, 5, 'ROK', 71);
insert into portfolio (id, userId, symbol, amount) values (58, 1, 'NFLX', 109);
insert into portfolio (id, userId, symbol, amount) values (59, 1, 'NFLX', 10);
insert into portfolio (id, userId, symbol, amount) values (60, 6, 'BWA', 61);
insert into portfolio (id, userId, symbol, amount) values (61, 8, 'F', 57);
insert into portfolio (id, userId, symbol, amount) values (62, 6, 'PSX', 155);
insert into portfolio (id, userId, symbol, amount) values (63, 10, 'HAL', 175);
insert into portfolio (id, userId, symbol, amount) values (64, 7, 'AVGO', 148);
insert into portfolio (id, userId, symbol, amount) values (65, 10, 'CPB', 2);
insert into portfolio (id, userId, symbol, amount) values (66, 6, 'NFLX', 176);
insert into portfolio (id, userId, symbol, amount) values (67, 2, 'STI', 60);
insert into portfolio (id, userId, symbol, amount) values (68, 2, 'PGR', 55);
insert into portfolio (id, userId, symbol, amount) values (69, 7, 'ED', 60);
insert into portfolio (id, userId, symbol, amount) values (70, 5, 'UA', 142);
insert into portfolio (id, userId, symbol, amount) values (71, 4, 'HD', 70);
insert into portfolio (id, userId, symbol, amount) values (72, 9, 'IBM', 116);
insert into portfolio (id, userId, symbol, amount) values (73, 10, 'IBM', 88);
insert into portfolio (id, userId, symbol, amount) values (74, 9, 'GOOG', 69);
insert into portfolio (id, userId, symbol, amount) values (75, 9, 'F', 54);
insert into portfolio (id, userId, symbol, amount) values (76, 7, 'ED', 140);
insert into portfolio (id, userId, symbol, amount) values (77, 8, 'FL', 300);
insert into portfolio (id, userId, symbol, amount) values (78, 9, 'INTC', 81);
insert into portfolio (id, userId, symbol, amount) values (79, 4, 'UTX', 96);
insert into portfolio (id, userId, symbol, amount) values (80, 1, 'MON', 91);
insert into portfolio (id, userId, symbol, amount) values (81, 7, 'FIS', 112);
insert into portfolio (id, userId, symbol, amount) values (82, 6, 'SO', 30);
insert into portfolio (id, userId, symbol, amount) values (83, 4, 'TGT', 172);
insert into portfolio (id, userId, symbol, amount) values (84, 6, 'ACN', 160);
insert into portfolio (id, userId, symbol, amount) values (85, 10, 'F', 10);
insert into portfolio (id, userId, symbol, amount) values (86, 2, 'GM', 20);
insert into portfolio (id, userId, symbol, amount) values (87, 4, 'FB', 55);
insert into portfolio (id, userId, symbol, amount) values (88, 2, 'GOOG', 93);
insert into portfolio (id, userId, symbol, amount) values (89, 2, 'EXC', 11);
insert into portfolio (id, userId, symbol, amount) values (90, 3, 'EMN', 58);
insert into portfolio (id, userId, symbol, amount) values (91, 3, 'FIS', 5);
insert into portfolio (id, userId, symbol, amount) values (92, 3, 'AMZN', 97);
insert into portfolio (id, userId, symbol, amount) values (93, 4, 'ED', 58);
insert into portfolio (id, userId, symbol, amount) values (94, 10, 'KMX', 103);
insert into portfolio (id, userId, symbol, amount) values (95, 10, 'GM', 137);
insert into portfolio (id, userId, symbol, amount) values (96, 6, 'EMN', 83);
insert into portfolio (id, userId, symbol, amount) values (97, 2, 'FB', 82);
insert into portfolio (id, userId, symbol, amount) values (98, 8, 'EFX', 73);
insert into portfolio (id, userId, symbol, amount) values (99, 7, 'BRK.B', 90);
insert into portfolio (id, userId, symbol, amount) values (100, 7, 'PGR', 155);

ALTER TABLE portfolio MODIFY id INT NOT NULL UNIQUE AUTO_INCREMENT FIRST;
