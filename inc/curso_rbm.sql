/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : curso_rbm

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 06/02/2023 17:29:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cupons
-- ----------------------------
DROP TABLE IF EXISTS `cupons`;
CREATE TABLE `cupons`  (
  `CODCUPOM` int NOT NULL COMMENT 'CHAVE PRIMARIA DA TABELA',
  `CODIGO` int NOT NULL COMMENT 'CHAVE SECUNDARIA, CODIGO ',
  `CPFCUPOM` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'CPF REGISTRADO NO CUPOM',
  `VALOR` decimal(18, 2) NOT NULL COMMENT 'VALOR',
  `VALORRESTANTE` decimal(18, 2) NULL DEFAULT NULL COMMENT 'VALOR RESTANTE DO CUPOM',
  `LOJA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'LOJA',
  `DTHR` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP COMMENT 'DATA E HORA',
  `SITUACAO` enum('APROVADO','REPROVADO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '\'APROVADO\' OU \'REPROVADO\'',
  `DTHRINSERT` timestamp NOT NULL DEFAULT current_timestamp COMMENT 'DATA E HORA INSERCAO DO REGISTRO',
  PRIMARY KEY (`CODCUPOM`, `CODIGO`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `CODUSUARIO` int NOT NULL AUTO_INCREMENT COMMENT 'CHAVE PRIMARIA DA TABELA',
  `CPF` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'CPF SEM \'.\' OU \'-\', CHAVE SECUNDARIA',
  `NOME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'NOME DO CADASTRADO',
  `SEXO` enum('M','F') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '\'M\' - MASCULINO, \'F\' - FEMININO',
  `NASCIMENTO` date NOT NULL COMMENT 'DATA DE NASCIMENTO DO CADASTRADO',
  `SENHA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'SENHA DO CADASTRADO',
  `DTHRINSERT` timestamp NOT NULL DEFAULT current_timestamp COMMENT 'DATA E HORA DE CRIACAO DO CADASTRO',
  PRIMARY KEY (`CODUSUARIO`, `CPF`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
