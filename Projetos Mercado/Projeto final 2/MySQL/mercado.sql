-- MySQL Script generated by MySQL Workbench
-- Tue May 23 19:37:45 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mercado
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mercado
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mercado` DEFAULT CHARACTER SET utf8 ;
USE `mercado` ;

-- -----------------------------------------------------
-- Table `mercado`.`cargo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`cargo` ;

CREATE TABLE IF NOT EXISTS `mercado`.`cargo` (
  `idcargo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcargo`),
  UNIQUE INDEX `descricao_UNIQUE` (`descricao` ASC) ,
  UNIQUE INDEX `idcargo_UNIQUE` (`idcargo` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mercado`.`funcionario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`funcionario` ;

CREATE TABLE IF NOT EXISTS `mercado`.`funcionario` (
  `idfuncionario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `datacontratacao` DATE NOT NULL,
  `cargo_idcargo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idfuncionario`),
  UNIQUE INDEX `idfuncionario_UNIQUE` (`idfuncionario` ASC) ,
  INDEX `fk_funcionario_cargo1_idx` (`cargo_idcargo` ASC) ,
  CONSTRAINT `fk_funcionario_cargo1`
    FOREIGN KEY (`cargo_idcargo`)
    REFERENCES `mercado`.`cargo` (`idcargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mercado`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`cliente` ;

CREATE TABLE IF NOT EXISTS `mercado`.`cliente` (
  `idcliente` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `telefone` VARCHAR(11) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(3) NOT NULL,
  `complemento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE INDEX `idcliente_UNIQUE` (`idcliente` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mercado`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`usuario` ;

CREATE TABLE IF NOT EXISTS `mercado`.`usuario` (
  `idusuario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `senha` CHAR(16) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `funcionario_idfuncionario` INT UNSIGNED NULL,
  `cliente_idcliente` INT UNSIGNED NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) ,
  UNIQUE INDEX `idusuario_UNIQUE` (`idusuario` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `fk_usuario_funcionario_idx` (`funcionario_idfuncionario` ASC) ,
  INDEX `fk_usuario_cliente1_idx` (`cliente_idcliente` ASC) ,
  CONSTRAINT `fk_usuario_funcionario`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `mercado`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `mercado`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mercado`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`categoria` ;

CREATE TABLE IF NOT EXISTS `mercado`.`categoria` (
  `idcategoria` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`),
  UNIQUE INDEX `descricao_UNIQUE` (`descricao` ASC) ,
  UNIQUE INDEX `idcategoria_UNIQUE` (`idcategoria` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mercado`.`marca`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`marca` ;

CREATE TABLE IF NOT EXISTS `mercado`.`marca` (
  `idmarca` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idmarca`),
  UNIQUE INDEX `idmarca_UNIQUE` (`idmarca` ASC) ,
  UNIQUE INDEX `descricao_UNIQUE` (`descricao` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mercado`.`produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`produto` ;

CREATE TABLE IF NOT EXISTS `mercado`.`produto` (
  `idproduto` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `imagem` VARCHAR(60) NOT NULL,
  `valor` DECIMAL(10,2) UNSIGNED NOT NULL,
  `desconto` FLOAT(3,2) UNSIGNED,
  `descricao` TEXT,
  `tipo` VARCHAR(80) NOT NULL,
  `embalagem` VARCHAR(45) NOT NULL,
  `peso` VARCHAR(10) NOT NULL,
  `categoria_idcategoria` INT UNSIGNED NOT NULL,
  `marca_idmarca` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idproduto`),
  UNIQUE INDEX `idproduto_UNIQUE` (`idproduto` ASC) ,
  INDEX `fk_produto_categoria1_idx` (`categoria_idcategoria` ASC) ,
  INDEX `fk_produto_marca1_idx` (`marca_idmarca` ASC) ,
  CONSTRAINT `fk_produto_categoria1`
    FOREIGN KEY (`categoria_idcategoria`)
    REFERENCES `mercado`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_marca1`
    FOREIGN KEY (`marca_idmarca`)
    REFERENCES `mercado`.`marca` (`idmarca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mercado`.`pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`pedido` ;

CREATE TABLE IF NOT EXISTS `mercado`.`pedido` (
  `idpedido` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `valor` DECIMAL(10,2) NOT NULL,
  `datacompra` DATE NOT NULL,
  `cliente_idcliente` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idpedido`),
  UNIQUE INDEX `valor_UNIQUE` (`valor` ASC) ,
  UNIQUE INDEX `idpedido_UNIQUE` (`idpedido` ASC) ,
  INDEX `fk_pedido_cliente1_idx` (`cliente_idcliente` ASC) ,
  CONSTRAINT `fk_pedido_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `mercado`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mercado`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`status` ;

CREATE TABLE IF NOT EXISTS `mercado`.`status` (
  `idstatus` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idstatus`),
  UNIQUE INDEX `idstatus_UNIQUE` (`idstatus` ASC) ,
  UNIQUE INDEX `descricao_UNIQUE` (`descricao` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mercado`.`funcionario_has_pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`funcionario_has_pedido` ;

CREATE TABLE IF NOT EXISTS `mercado`.`funcionario_has_pedido` (
  `funcionario_idfuncionario` INT UNSIGNED NOT NULL,
  `pedido_idpedido` INT UNSIGNED NOT NULL,
  `datastatus` DATE NOT NULL,
  `status_idstatus` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`funcionario_idfuncionario`, `pedido_idpedido`),
  INDEX `fk_funcionario_has_pedido_pedido1_idx` (`pedido_idpedido` ASC) ,
  INDEX `fk_funcionario_has_pedido_funcionario1_idx` (`funcionario_idfuncionario` ASC) ,
  INDEX `fk_funcionario_has_pedido_status1_idx` (`status_idstatus` ASC) ,
  CONSTRAINT `fk_funcionario_has_pedido_funcionario1`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `mercado`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_has_pedido_pedido1`
    FOREIGN KEY (`pedido_idpedido`)
    REFERENCES `mercado`.`pedido` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_has_pedido_status1`
    FOREIGN KEY (`status_idstatus`)
    REFERENCES `mercado`.`status` (`idstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mercado`.`pedido_has_produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mercado`.`pedido_has_produto` ;

CREATE TABLE IF NOT EXISTS `mercado`.`pedido_has_produto` (
  `pedido_idpedido` INT UNSIGNED NOT NULL,
  `produto_idproduto` INT UNSIGNED NOT NULL,
  `quantidade` INT NOT NULL,
  `valorreferencia` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`pedido_idpedido`, `produto_idproduto`),
  INDEX `fk_pedido_has_produto_produto1_idx` (`produto_idproduto` ASC) ,
  INDEX `fk_pedido_has_produto_pedido1_idx` (`pedido_idpedido` ASC) ,
  CONSTRAINT `fk_pedido_has_produto_pedido1`
    FOREIGN KEY (`pedido_idpedido`)
    REFERENCES `mercado`.`pedido` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_has_produto_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `mercado`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

ALTER TABLE `mercado`.`pedido` ADD `avaliacao` INT(1);

ALTER TABLE `mercado`.`pedido` ADD  `comentario_avaliacao` TEXT;

ALTER TABLE `mercado`.`pedido` DROP INDEX `valor_UNIQUE`;

ALTER TABLE `mercado`.`pedido` ADD  `cep` VARCHAR(8) NOT NULL;

ALTER TABLE `mercado`.`pedido` ADD  `endereco` VARCHAR(45) NOT NULL;

ALTER TABLE `mercado`.`pedido` ADD  `numero` VARCHAR(3) NOT NULL;

ALTER TABLE `mercado`.`pedido` ADD  `complemento` VARCHAR(45) NOT NULL;

ALTER TABLE `mercado`.`usuario` DROP INDEX `cpf_UNIQUE`;

ALTER TABLE `mercado`.`usuario` ADD ativo BOOLEAN NOT NULL DEFAULT TRUE;

ALTER TABLE funcionario_has_pedido ADD etapafinalizada BOOLEAN NOT NULL DEFAULT FALSE;

ALTER TABLE funcionario_has_pedido ADD datasaida DATE;

ALTER TABLE funcionario_has_pedido DROP PRIMARY KEY;
ALTER TABLE funcionario_has_pedido ADD idfuncionariopedido INT AUTO_INCREMENT UNIQUE;
ALTER TABLE funcionario_has_pedido ADD PRIMARY KEY (funcionario_idfuncionario, pedido_idpedido, idfuncionariopedido);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
