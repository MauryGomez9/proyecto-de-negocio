CREATE TABLE `donaciones` (
  `iddonaciones` BIGINT NOT NULL,
  `descripcion_donacion` VARCHAR(500) NULL,
  `tiempo` CHAR(3) NULL,
  `pago` DECIMAL(10,2) NULL,
  PRIMARY KEY (`iddonaciones`));
