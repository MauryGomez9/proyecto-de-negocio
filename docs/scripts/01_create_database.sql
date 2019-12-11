CREATE SCHEMA `ari_db` ;
CREATE USER 'ari_rescue'@'%' IDENTIFIED WITH mysql_native_password BY 'negocios_web';
GRANT ALL ON ari_db.* TO 'ari_rescue'@'%';
