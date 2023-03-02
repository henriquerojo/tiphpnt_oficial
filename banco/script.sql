-- Database: `iwane047_ti##`
CREATE DATABASE
	IF NOT EXISTS `ti93phpdb01`
    DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
    
USE `ti93phpdb01`;

-- --------------------------------------------------------
-- Estrutura da tabela `tbprodutos`
CREATE TABLE `tbprodutos` (
  `id_produto` int(11) NOT NULL,
  `id_tipo_produto` int(11) NOT NULL,
  `descri_produto` varchar(100) NOT NULL,
  `resumo_produto` varchar(1000) DEFAULT NULL,
  `valor_produto` decimal(9,2) DEFAULT NULL,
  `imagem_produto` varchar(50) DEFAULT NULL,
  `destaque_produto` enum('Sim','Não') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Extraindo dados da tabela `tbprodutos`
INSERT INTO `tbprodutos` (`id_produto`, `id_tipo_produto`, `descri_produto`, `resumo_produto`, `valor_produto`, `imagem_produto`, `destaque_produto`) VALUES
(1, 1, 'Picanha ao alho', ' Esta e a combinação do sabor inconfundível da picanha com o aroma acentuado do alho. Condimento que casa perfeitamente com este corte nobre', 29.90, 'picanha_alho.jpg', 'Sim'),
(2, 1, 'Fraldinha', 'Uma das carnes mais suculentas do cardápio. Requintada, com maciez particular e pouca gordura, e uma carne que chama atenção pela sua textura', 29.90, 'fraldinha.jpg', 'Não'),
(3, 1, 'Costela', 'A mais procurada! Feita na churrasqueira ou ao fogo de chão, e preparada por mais de 08 horas para atingir o ponto ideal e torna-la a referência de nossa churrascaria', 29.90, 'costelona.jpg', 'Sim'),
(4, 1, 'Cupim', 'Uma referência especial dos paulistas. Bastante gordurosa e macia, o cupim e uma carne fibrosa, que se desfia quando bem preparada ', 29.90, 'cupim.jpg', 'Sim'),
(5, 1, 'Picanha ', 'Considerada por muitos como a mais nobre e procurada carne de churrasco, a picanha pode ser servida ao ponto , mal passada ou bem passada. Suculenta e com sua característica capa de gordura', 29.90, 'picanha_sem.jpg', 'Não'),
(6, 1, 'Apfelstrudel', 'Sobremesa tradicional austro-germânica e um delicioso folhado de maça e canela com sorvete', 29.90, 'strudel.jpg', 'Não'),
(7, 1, 'Alcatra', 'Carne com muitas fibras, porém macia. Sua lateral apresenta uma boa parcela de gordura. Equilibrando de forma harmônica maciez e fibras.', 29.90, 'alcatra_pedra.jpg', 'Não'),
(8, 1, 'Maminha', 'Vem da parte inferior da Alcatra. E uma carne com fibras, porém macia e saborosa.', 29.90, 'maminha.jpg', 'Não'),
(9, 2, 'Abacaxiiiiiiii', 'Abacaxi assado com canela ao creme de leite condensado ', 29.90, 'abacaxi.jpg', 'Não');

-- Indexes for table `tbprodutos`
ALTER TABLE `tbprodutos`
  ADD PRIMARY KEY (`id_produto`);

-- AUTO_INCREMENT for table `tbprodutos`
ALTER TABLE `tbprodutos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

-- Estrutura para tabela `tbtipos`
CREATE TABLE `tbtipos` (
  `id_tipo` int(11) NOT NULL,
  `sigla_tipo` varchar(3) NOT NULL,
  `rotulo_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Despejando dados para a tabela `tbtipos`
INSERT INTO `tbtipos` (`id_tipo`, `sigla_tipo`, `rotulo_tipo`) VALUES
(1, 'chu', 'Churrasco'),
(2, 'sob', 'Sobremesa');

-- Índices de tabela `tbtipos`
ALTER TABLE `tbtipos`
  ADD PRIMARY KEY (`id_tipo`);

-- AUTO_INCREMENT de tabela `tbtipos`
ALTER TABLE `tbtipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- Estrutura para tabela `tbtipos`
CREATE TABLE `tbusuarios` (
  `id_usuario` int(11) NOT NULL,
  `login_usuario` varchar(30) NOT NULL,
  `senha_usuario` varchar(8) NOT NULL,
  `nivel_usuario` ENUM('sup','com') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserindo Dados na Tabela `tbusuarios'
INSERT INTO `tbusuarios` 
	(`id_usuario`, `login_usuario`, `senha_usuario`, `nivel_usuario`) 
	VALUES
		(1, 'senac', '1234', 'sup'),
		(2, 'joao', '456', 'com'),
		(3, 'maria', '789', 'com'),
		(4, 'iwanezuk', '1234', 'sup');

-- Índices de tabela `tbtipos`
ALTER TABLE `tbusuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `login_usuario_uniq`(`login_usuario`);

-- AUTO_INCREMENT de tabela `tbtipos`
ALTER TABLE `tbusuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  
-- Chave estrangeira
ALTER TABLE `tbprodutos`
  ADD CONSTRAINT `id_tipo_produto_fk` FOREIGN KEY (`id_tipo_produto`)
	REFERENCES `tbtipos`(`id_tipo`)
    ON DELETE no action
    ON UPDATE no action;  
    
-- Criando a view vw_tbprodutos
CREATE VIEW vw_tbprodutos AS
	SELECT	p.id_produto,
			p.id_tipo_produto,
            t.sigla_tipo,
            t.rotulo_tipo,
            p.descri_produto,
            p.resumo_produto,
            p.valor_produto,
            p.imagem_produto,
            p.destaque_produto
    FROM tbprodutos p
		JOIN tbtipos t
	WHERE p.id_tipo_produto=t.id_tipo;
COMMIT;

-- Criando o tipo bebidas
INSERT tbtipos VALUES (3,'beb','Bebidas');

-- Alterando as senhas dos usuarios
UPDATE tbusuarios SET senha_usuario = '1234'WHERE id_usuario = 1;
UPDATE tbusuarios SET senha_usuario = '1234'WHERE id_usuario = 2;
UPDATE tbusuarios SET senha_usuario = '456'WHERE id_usuario = 3;
UPDATE tbusuarios SET senha_usuario = '789'WHERE id_usuario = 4;

-- Colocando criptografia nas senhas dos usuarios
ALTER TABLE tbusuarios CHANGE COLUMN senha_usuario senha_usuario varchar(32);
UPDATE tbusuarios SET senha_usuario = md5(senha_usuario) WHERE id_usuario BETWEEN 1 AND 4;

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema ti93phpdb01
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ti93phpdb01
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ti93phpdb01` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `ti93phpdb01`.`tbusuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`tbusuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `login_usuario` VARCHAR(30) NOT NULL,
  `senha_usuario` VARCHAR(32) NULL DEFAULT NULL,
  `nivel_usuario` ENUM('sup', 'com') NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `login_usuario_uniq` (`login_usuario` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tbclientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbclientes` (
  `id_cliente` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(11) NULL,
  `tbusuarios` INT(11) NOT NULL,
  PRIMARY KEY (`id_cliente`, `nome`),
  INDEX `fk_tbclientes_tbusuarios1_idx` (`tbusuarios` ASC) VISIBLE,
  CONSTRAINT `fk_tbclientes_tbusuarios1`
    FOREIGN KEY (`tbusuarios`)
    REFERENCES `ti93phpdb01`.`tbusuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbcontato_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbcontato_cliente` (
  `id_contato_cliente` INT NOT NULL,
  `email` VARCHAR(70) NOT NULL,
  `tbclientes` INT NOT NULL,
  PRIMARY KEY (`id_contato_cliente`),
  INDEX `fk_tbcontato_cliente_tbclientes1_idx` (`tbclientes` ASC) VISIBLE,
  CONSTRAINT `fk_tbcontato_cliente_tbclientes1`
    FOREIGN KEY (`tbclientes`)
    REFERENCES `mydb`.`tbclientes` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbreservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbreservas` (
  `id_reserva` INT NOT NULL,
  `mesa_reserva` TINYINT(1) NOT NULL,
  `codigo_reserva` MEDIUMINT(3) NOT NULL,
  `status_reserva` VARCHAR(12) NOT NULL,
  `tbclientes` INT NOT NULL,
  PRIMARY KEY (`id_reserva`),
  INDEX `fk_tbreservas_tbclientes_idx` (`tbclientes` ASC) VISIBLE,
  CONSTRAINT `fk_tbreservas_tbclientes`
    FOREIGN KEY (`tbclientes`)
    REFERENCES `mydb`.`tbclientes` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbpedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbpedidos` (
  `idpedido` INT NOT NULL,
  `numeropessoas` VARCHAR(45) NOT NULL,
  `data_pedido` VARCHAR(45) NULL,
  `data_final` VARCHAR(45) NULL,
  PRIMARY KEY (`idpedido`))
ENGINE = InnoDB;

USE `ti93phpdb01` ;

-- -----------------------------------------------------
-- Table `ti93phpdb01`.`tbtipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`tbtipos` (
  `id_tipo` INT(11) NOT NULL AUTO_INCREMENT,
  `sigla_tipo` VARCHAR(3) NOT NULL,
  `rotulo_tipo` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_tipo`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ti93phpdb01`.`tbprodutos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`tbprodutos` (
  `id_produto` INT(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_produto` INT(11) NOT NULL,
  `descri_produto` VARCHAR(100) NOT NULL,
  `resumo_produto` VARCHAR(1000) NULL DEFAULT NULL,
  `valor_produto` DECIMAL(9,2) NULL DEFAULT NULL,
  `imagem_produto` VARCHAR(50) NULL DEFAULT NULL,
  `destaque_produto` ENUM('Sim', 'Não') NOT NULL,
  PRIMARY KEY (`id_produto`),
  INDEX `id_tipo_produto_fk` (`id_tipo_produto` ASC) VISIBLE,
  CONSTRAINT `id_tipo_produto_fk`
    FOREIGN KEY (`id_tipo_produto`)
    REFERENCES `ti93phpdb01`.`tbtipos` (`id_tipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;

USE `ti93phpdb01` ;

-- -----------------------------------------------------
-- Placeholder table for view `ti93phpdb01`.`vw_tbprodutos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ti93phpdb01`.`vw_tbprodutos` (`id_produto` INT, `id_tipo_produto` INT, `sigla_tipo` INT, `rotulo_tipo` INT, `descri_produto` INT, `resumo_produto` INT, `valor_produto` INT, `imagem_produto` INT, `destaque_produto` INT);

-- -----------------------------------------------------
-- View `ti93phpdb01`.`vw_tbprodutos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ti93phpdb01`.`vw_tbprodutos`;
USE `ti93phpdb01`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ti93phpdb01`.`vw_tbprodutos` AS select `p`.`id_produto` AS `id_produto`,`p`.`id_tipo_produto` AS `id_tipo_produto`,`t`.`sigla_tipo` AS `sigla_tipo`,`t`.`rotulo_tipo` AS `rotulo_tipo`,`p`.`descri_produto` AS `descri_produto`,`p`.`resumo_produto` AS `resumo_produto`,`p`.`valor_produto` AS `valor_produto`,`p`.`imagem_produto` AS `imagem_produto`,`p`.`destaque_produto` AS `destaque_produto` from (`ti93phpdb01`.`tbprodutos` `p` join `ti93phpdb01`.`tbtipos` `t`) where `p`.`id_tipo_produto` = `t`.`id_tipo`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Criação da tabela cliente
-- -----------------------------------------------------
create table tbclientes(
id_cliente int not null auto_increment,
nome varchar(45) not null,
cpf varchar(11) not null,
tbusuarios int not null,
tbpedido int not null,
PRIMARY KEY (id_cliente),
CONSTRAINT tbusuarios FOREIGN KEY (tbusuarios) REFERENCES tbusuarios(id_usuario),
CONSTRAINT tbpedido FOREIGN KEY (tbpedido) REFERENCES tbpedidos(id_pedido)
);

-- -----------------------------------------------------
-- Criação da tabela contato_cliente 
-- -----------------------------------------------------
create table tbcontato_cliente(
id_contato_cliente int not null auto_increment,
email varchar(70) not null,
tbcliente int,
PRIMARY KEY (id_contato_cliente),
CONSTRAINT idcliente FOREIGN KEY (tbcliente) REFERENCES tbclientes(id_cliente)
);
-- -----------------------------------------------------
-- Criação da tabela reservas 
-- -----------------------------------------------------
create table tbreservas(
id_reserva int not null auto_increment,
mesa_reserva varchar(3) not null,
codigo_reserva mediumint(3) not null,
status_reserva varchar(12) not null,
tbcliente int not null,
PRIMARY KEY (id_reserva),
CONSTRAINT tbcliente FOREIGN KEY (tb_cliente) REFERENCES tbclientes(id_cliente)
);

-- -----------------------------------------------------
-- Criação da tabela pedidos
-- -----------------------------------------------------
create table tbpedidos(
id_pedido int not null auto_increment,
data_pedido datetime not null,
numero_pessoas varchar(2) not null,
motivo_negativa text not null,
PRIMARY KEY (id_pedido)
);

