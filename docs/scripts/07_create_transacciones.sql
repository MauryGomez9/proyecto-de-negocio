CREATE TABLE `transacciones` (
  `idtransacciones` INT NOT NULL AUTO_INCREMENT,
  `concepto` VARCHAR(120) NULL,
  `tiempo` CHAR(3) NULL,
  `pago` DECIMAL(10,2) NULL,
  `nombre` VARCHAR(100) NULL,
  `telefono` VARCHAR(45) NULL,
  `correo` VARCHAR(128) NULL,
  `numeroTarjeta` VARCHAR(60) NULL,
  `mes` VARCHAR(10) NULL,
  `anno` VARCHAR(10) NULL,
  `cvc` VARCHAR(10) NULL,
  `fecha` DATETIME NULL,
  PRIMARY KEY (`idtransacciones`));
