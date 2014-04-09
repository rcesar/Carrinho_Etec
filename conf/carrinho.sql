/*
Navicat MySQL Data Transfer

Source Server         : Conexao
Source Server Version : 50612
Source Host           : 127.0.0.1:3306
Source Database       : carrinho

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-11-21 10:47:02
*/

DROP DATABASE IF EXISTS `carrinho`;
CREATE DATABASE carrinho;

USE carrinho;

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admuser
-- ----------------------------
DROP TABLE IF EXISTS `admuser`;
CREATE TABLE `admuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO admuser VALUES('','admin','admin','admin@admin.com','admin');

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `cpf` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) NOT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `cep` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for compra
-- ----------------------------
DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fornecedor_codigo` int(10) unsigned NOT NULL,
  `produto_codigo` int(10) unsigned NOT NULL,
  `qtd` int(10) unsigned DEFAULT NULL,
  `data_compra` date DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `compra_FKIndex1` (`produto_codigo`),
  KEY `compra_FKIndex2` (`fornecedor_codigo`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`produto_codigo`) REFERENCES `produto` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`fornecedor_codigo`) REFERENCES `fornecedor` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for fornecedor
-- ----------------------------
DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE `fornecedor` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cep` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for marca
-- ----------------------------
DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for produto
-- ----------------------------
DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_codigo` int(10) unsigned NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text,
  `marca` int(11) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `qtd` int(10) unsigned DEFAULT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `vendidos` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `produto_FKIndex1` (`categoria_codigo`),
  KEY `marca` (`marca`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`categoria_codigo`) REFERENCES `categoria` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`marca`) REFERENCES `marca` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for produtos_venda
-- ----------------------------
DROP TABLE IF EXISTS `produtos_venda`;
CREATE TABLE `produtos_venda` (
  `produto_codigo` int(10) unsigned NOT NULL,
  `vendas_cod_venda` int(10) unsigned NOT NULL,
  `qtd` int(10) unsigned DEFAULT NULL,
  KEY `produtos_venda_FKIndex1` (`vendas_cod_venda`),
  KEY `produtos_venda_FKIndex2` (`produto_codigo`),
  CONSTRAINT `produtos_venda_ibfk_1` FOREIGN KEY (`vendas_cod_venda`) REFERENCES `vendas` (`cod_venda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `produtos_venda_ibfk_2` FOREIGN KEY (`produto_codigo`) REFERENCES `produto` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for situacao
-- ----------------------------
DROP TABLE IF EXISTS `situacao`;
CREATE TABLE `situacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `situacao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO situacao VALUES(1,'processando');
INSERT INTO situacao VALUES(2,'finalizado');

-- ----------------------------
-- Table structure for vendas
-- ----------------------------
DROP TABLE IF EXISTS `vendas`;
CREATE TABLE `vendas` (
  `cod_venda` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_cpf` varchar(255) NOT NULL,
  `data_venda` date DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  `forma_pag` varchar(255) DEFAULT NULL,
  `id_situacao` int(11) NOT NULL,
  `parcelas` int(11) NOT NULL,
  PRIMARY KEY (`cod_venda`),
  KEY `vendas_FKIndex1` (`cliente_cpf`),
  KEY `id_situacao` (`id_situacao`),
  CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`cliente_cpf`) REFERENCES `cliente` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`id_situacao`) REFERENCES `situacao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
