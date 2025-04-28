create database library_system_db;
CREATE USER 'library_system_user'@'%' IDENTIFIED BY '0aSMamVOq3';

ALTER USER 'library_system_user'@'%' IDENTIFIED BY '0aSMamVOq3';

GRANT ALL PRIVILEGES ON *.* TO 'library_system_user'@'%' WITH GRANT OPTION;

FLUSH PRIVILEGES;
