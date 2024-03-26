CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preco` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `percentual` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) DEFAULT NULL,
  `numero_venda` int(11) DEFAULT NULL,
  `quantidade_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`)
);