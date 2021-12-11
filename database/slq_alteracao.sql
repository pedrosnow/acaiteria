CREATE DATABASE `app_assai` /*!40100 COLLATE 'utf8_general_ci' */

CREATE TABLE `users` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`email` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `users_email_unique` (`email`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;

CREATE TABLE `usuario` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(45) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`email` VARCHAR(45) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`endereco` VARCHAR(45) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`numero` VARCHAR(45) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`complemento` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`telefone` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`pagamento` VARCHAR(45) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=11
;





CREATE TABLE `produto` (
	`id_produto` INT NOT NULL AUTO_INCREMENT,
	`produto` VARCHAR(50) NULL DEFAULT NULL,
	`preco` FLOAT NULL DEFAULT NULL,
	`complemento` VARCHAR(50) NULL DEFAULT NULL,
	`img` VARCHAR(50) NULL DEFAULT NULL,
	`id_user` BIGINT(20) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id_produto`),
	INDEX `id_user` (`id_user`),
	CONSTRAINT `FK__users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;



CREATE TABLE `pedido` (
	`id_pedido` INT(10) NOT NULL AUTO_INCREMENT,
	`observacao` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`id_usuario` INT(10) NULL DEFAULT NULL,
	PRIMARY KEY (`id_pedido`) USING BTREE,
	INDEX `fk_pedido_usuario_idx` (`id_usuario`) USING BTREE,
	CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `app_acai`.`usuario` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;





CREATE TABLE `pedido_produto_usuario` (
	`idpedido_produto_usuario` INT(11) NOT NULL AUTO_INCREMENT,
	`id_pedido` INT(11) NULL DEFAULT NULL,
	`id_produto` INT(11) NULL DEFAULT NULL,
	`id_usuario` INT(11) NULL DEFAULT NULL,
	`quantidade` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`idpedido_produto_usuario`) USING BTREE,
	INDEX `id_pedido` (`id_pedido`) USING BTREE,
	INDEX `id_produto` (`id_produto`) USING BTREE,
	INDEX `FK_pedido_produto_usuario_usuario` (`id_usuario`) USING BTREE,
	CONSTRAINT `FK__pedido` FOREIGN KEY (`id_pedido`) REFERENCES `app_acai`.`pedido` (`id_pedido`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `FK_pedido_produto_usuario_produto` FOREIGN KEY (`id_produto`) REFERENCES `app_acai`.`produto` (`id_produto`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `FK_pedido_produto_usuario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `app_acai`.`usuario` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;



CREATE TABLE `produto_complemento` (
	`idproduto_complemento` INT(10) NOT NULL AUTO_INCREMENT,
	`id_produto` INT(10) NULL DEFAULT NULL,
	`id_complemento` INT(10) NULL DEFAULT NULL,
	PRIMARY KEY (`idproduto_complemento`) USING BTREE,
	INDEX `id_produto_idx` (`id_produto`) USING BTREE,
	INDEX `id_complemento_idx` (`id_complemento`) USING BTREE,
	CONSTRAINT `id_complemento` FOREIGN KEY (`id_complemento`) REFERENCES `app_acai`.`complemento` (`id_complemento`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `app_acai`.`produto` (`id_produto`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
