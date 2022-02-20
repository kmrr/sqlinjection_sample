DROP DATABASE IF EXISTS sample;
CREATE DATABASE sample;

USE sample;
DROP TABLE IF EXISTS test;

CREATE TABLE test(id int AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), password VARCHAR(255));
INSERT INTO test (name, password) VALUES ('admin', 'ni3ehzhVKPaP');

CREATE TABLE flag(id int AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), flag VARCHAR(255));
INSERT INTO flag(name, flag) VALUES('admin', 'flag{s3c0und_0rd3r_sql1nj3ct10n}');
INSERT INTO flag(name, flag) VALUES('admin2', 'flag{s3rcr3t_fl@g}');