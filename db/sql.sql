CREATE DATABASE cielo;

CREATE TABLE `dados_usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paymentId` varchar(250) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `produto` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
