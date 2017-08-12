CREATE DATABASE IF NOT EXISTS webdev;

USE webdev;

CREATE TABLE cliente (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nome VARCHAR(200)  NULL  ,
  cpf VARCHAR(11)  NULL    ,
PRIMARY KEY(id));



CREATE TABLE banco (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nome VARCHAR(100)  NULL    ,
PRIMARY KEY(id));



CREATE TABLE agencia (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  bancoId INTEGER UNSIGNED  NOT NULL  ,
  nome VARCHAR(100)  NULL    ,
PRIMARY KEY(id)  ,
INDEX agencia_FKIndex1(bancoId),
  FOREIGN KEY(bancoId)
    REFERENCES banco(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE conta (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  agenciaId INTEGER UNSIGNED  NOT NULL  ,
  clienteId INTEGER UNSIGNED  NOT NULL  ,
  saldo DECIMAL(10,2)  NULL  ,
  limite DECIMAL(10,2)  NULL  ,
  situacao CHAR(1)  NULL    ,
PRIMARY KEY(id)  ,
INDEX conta_FKIndex1(clienteId)  ,
INDEX conta_FKIndex2(agenciaId),
  FOREIGN KEY(clienteId)
    REFERENCES cliente(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(agenciaId)
    REFERENCES agencia(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE operacao (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  contaId INTEGER UNSIGNED  NOT NULL  ,
  valor DECIMAL(10,2)  NULL  ,
  tipo CHAR(1)  NULL  ,
  dataOperacao DATETIME  NULL    ,
PRIMARY KEY(id)  ,
INDEX extrato_FKIndex1(contaId),
  FOREIGN KEY(contaId)
    REFERENCES conta(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);

CREATE TABLE usuario (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nome VARCHAR(100)  NULL  ,
  usuario VARCHAR(50)  NULL  ,
  senha VARCHAR(50)  NULL    ,
PRIMARY KEY(id));

DROP TRIGGER tri_operacao

DELIMITER $$

CREATE TRIGGER tri_operacao AFTER INSERT  ON operacao
FOR EACH ROW BEGIN

	IF NEW.tipo = 'C' THEN
		UPDATE conta SET saldo=saldo + NEW.valor WHERE id = NEW.contaId;
	END IF;

	IF NEW.tipo = 'D' THEN
		IF ((SELECT count(1) FROM conta WHERE id=NEW.contaid AND (saldo-NEW.valor) >= (limite*-1)) = 1) THEN
			UPDATE conta SET saldo=saldo - NEW.valor WHERE id = NEW.contaId;
		ELSE
			SIGNAL sqlstate '45001' set message_text = "Saldo Indispon�vel";
		END IF;
	END IF;
	
END$$

DELIMITER ;








