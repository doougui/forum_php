-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.26 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `forum`;

-- Copiando estrutura para tabela forum.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela forum.category: ~4 rows (aproximadamente)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Q&A Desenvolvimento'),
	(2, 'Desenvolvimento e Banco de Dados'),
	(3, 'Design e Produto'),
	(4, 'Entretenimento e uso pessoal');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Copiando estrutura para tabela forum.forum
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela forum.forum: ~3 rows (aproximadamente)
DELETE FROM `forum`;
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` (`id`, `id_category`, `name`, `description`) VALUES
	(1, 1, 'Perguntas rápidas', 'Perguntas rápidas e breves sobre programação.'),
	(2, 2, 'PHP', 'Discussões sobre a linguagem PHP.'),
	(3, 2, 'JavaScript', 'Discussões sobre a linguagem JavaScript.'),
	(4, 3, 'Photoshop', 'Discussões sobre Adobe Photoshop.'),
	(5, 4, 'Entretenimento', 'Chatzão UOL.');
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;

-- Copiando estrutura para tabela forum.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_topic` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela forum.post: 2 rows
DELETE FROM `post`;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `id_topic`, `id_author`, `msg_date`, `msg`) VALUES
	(1, 5, 1, '2019-10-08 19:50:30', 'Mensagem de teste :)'),
	(2, 5, 1, '2019-10-08 19:50:56', 'Outro mensagem de teste \'-\''),
	(3, 5, 3, '2019-10-08 19:53:08', '<p>envia ai na moralzinha n aguento mais tanto erro :(</p>'),
	(4, 6, 1, '2019-10-08 19:57:06', '<p>Testando ALO</p>'),
	(5, 8, 1, '2019-10-08 21:27:47', '<p>Teste de resposta</p>');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Copiando estrutura para tabela forum.topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `upvotes` int(11) NOT NULL DEFAULT '0',
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela forum.topic: 4 rows
DELETE FROM `topic`;
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` (`id`, `id_forum`, `id_author`, `upvotes`, `title`, `content`) VALUES
	(1, 1, 1, 0, 'Erro PHP', '<b>Parse error</b>: syntax error, unexpected \'if\' (T_IF) in <b>/home1/santacruz/public_html/catalog/controller/common/footer.php</b> on line <b>2</b>'),
	(5, 2, 1, 0, 'Passar resposta JSON para Ajax com PHP', '<p>Queria passar a resposta JSON do <strong>PHP para o done do Ajax </strong>pra deixar as coisas <i>bonitinhas</i>, mas não vai dar tempo.</p><blockquote><p><i><strong>TRISTE</strong></i></p><p>- Douglas Pinheiro Goulart - 2019</p></blockquote><p>Link: <a href="http://www.devwilliam.com.br/php/sistema-de-login-com-ajax-e-php">http://www.devwilliam.com.br/php/sistema-de-login-com-ajax-e-php</a></p>'),
	(6, 3, 1, 0, 'Requisição Ajax com Axios e Promises', '<p>Como fazer uma requisição <strong>Ajax </strong>usando <i>Axios e Promises no JavaScript</i>?</p><blockquote><p>axios.get(\'https://api.github.com/users/doougui\')</p><p>.then(function(response) {</p><p>&nbsp;console.log(response.data.name);</p><p>})</p><p>.catch(function(error) {</p><p>&nbsp;console.log(error);</p><p>});</p></blockquote>'),
	(8, 4, 1, 0, 'Como usar a varinha mágina.', '<p>bla bla bla <strong>bla negrito </strong><i>bla itálico</i></p><blockquote><p><i>bla blockquotado</i></p></blockquote><p><a href="bla linkado"><i>bla linkado</i></a></p>'),
	(9, 5, 2, 0, 'Eu não sei o que escrever aqui :/', '<p>Teste</p>');
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

-- Copiando estrutura para tabela forum.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela forum.user: ~3 rows (aproximadamente)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `password`, `sex`) VALUES
	(1, 'Douglas Pinheiro Goulart', 'douglaspigoulart@gmail.com', '$2y$10$wPIXzk/FguCJZAm0ktBChepcL6XqbE3xN5evaGsFkRNMml.8lIA5a', 'M'),
	(2, 'Leandro Soares', 'leandrogay@gmail.com', '$2y$10$DLfNclU4N/SyP.hhgWF3FO8e1D9NBb43zawe23aHg47CZzSRP2oaS', 'U'),
	(3, 'Luciana Ramos Pinheiro Inácio', 'luciana.rpi93@gmail.com', '$2y$10$2XugDDyEEJGsgExAYvr6eu5bjoiI20AZx8XmKQ27q7C17HrQn0r3W', 'F'),
	(4, 'Julia Pinheiro Inácio', 'juliapi@gmail.com', '$2y$10$b9Pc19SotALfHlC4e.C5setmX1pvJqmAbJqRvJvEjzeVZZuIwW432', 'F');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
