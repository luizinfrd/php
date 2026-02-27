-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para blog
CREATE DATABASE IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `blog`;

-- Copiando estrutura para tabela blog.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `autor` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela blog.comentarios: ~4 rows (aproximadamente)
INSERT INTO `comentarios` (`id`, `post_id`, `autor`, `mensagem`, `data_criacao`) VALUES
	(1, 3, 'luis', 'top\r\n', '2026-02-27 20:17:32'),
	(2, 3, 'luis', 'top\r\n', '2026-02-27 20:19:44'),
	(3, 3, 'luis', 'absurdo\r\n', '2026-02-27 20:21:30'),
	(4, 1, 'luis', 'fdsfsdfsdf', '2026-02-27 20:28:18');

-- Copiando estrutura para tabela blog.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela blog.posts: ~3 rows (aproximadamente)
INSERT INTO `posts` (`id`, `titulo`, `conteudo`, `categoria`, `data_criacao`) VALUES
	(1, 'Bem-vindo ao Blog Educacional', 'Este é o nosso primeiro post! Aqui vamos compartilhar conhecimento sobre programação e tecnologia de forma simples e direta.', 'Geral', '2026-02-27 19:05:34'),
	(2, 'Entendendo o PHP PDO', 'O PDO (PHP Data Objects) é uma interface para acessar bancos de dados no PHP. Ele é seguro porque permite o uso de prepared statements, evitando ataques de SQL Injection.', 'Programação', '2026-02-27 19:05:34'),
	(3, 'Dicas de Estudo Ativo', 'Estudar não é apenas ler. Tente explicar o conteúdo para outra pessoa ou aplicar o que aprendeu em um projeto prático para fixar melhor o conhecimento.', 'Educação', '2026-02-27 19:05:34');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
