CREATE DATABASE  IF NOT EXISTS `bd-hackaton` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd-hackaton`;


--
-- Estrutura para tabela `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `donations`
--

INSERT INTO `donations` (`id`, `type`) VALUES
(1, 'Food'),
(2, 'Hygiene'),
(3, 'Material'),
(4, 'Clothes'),
(5, 'Money');


CREATE TABLE `city` (
  `id`  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cep` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `city`
--

INSERT INTO `city` (`id`, `cep`, `country`, `state`, `name`) VALUES
(1, '96745-000', 'Brasil', 'Rio Grande do Sul', 'Charqueadas'),
(2, '96700-000', 'Brasil', 'Rio Grande do Sul', 'São Jerônimo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clothes`
--

CREATE TABLE `clothes` (
  `id`  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type` int(11) DEFAULT NULL,
  `donated` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `date` date DEFAULT curdate(),
  `idCity` int(11) DEFAULT NULL,
    FOREIGN KEY (type) REFERENCES Donations(id),
    FOREIGN KEY (idCity) REFERENCES City(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clothes`
--
INSERT INTO `clothes` (`id`, `type`, `donated`, `goal`, `date`, `idCity`) VALUES
(1, 4, 60, 120, '2023-10-06', 1),
(2, 4, 40, 80, '2023-10-06', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `food`
--

CREATE TABLE `food` (
  `id`  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type` int(11) DEFAULT NULL,
  `donated` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `date` date DEFAULT curdate(),
  `idCity` int(11) DEFAULT NULL,
    FOREIGN KEY (type) REFERENCES Donations(ID),
    FOREIGN KEY (idCity) REFERENCES City(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `food`
--
INSERT INTO `food` (`id`, `type`, `donated`, `goal`, `date`, `idCity`) VALUES
(1, 1, 100, 200, '2023-10-06', 1),
(2, 1, 50, 100, '2023-10-06', 2);
-- --------------------------------------------------------

--
-- Estrutura para tabela `hygiene`
--

CREATE TABLE `hygiene` (
  `id`  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type` int(11) DEFAULT NULL,
  `donated` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `date` date DEFAULT curdate(),
  `idCity` int(11) DEFAULT NULL,
    FOREIGN KEY (type) REFERENCES Donations(ID),
    FOREIGN KEY (idCity) REFERENCES City(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `hygiene`
--
INSERT INTO `hygiene` (`id`, `type`, `donated`, `goal`, `date`, `idCity`) VALUES
(1, 2, 75, 150, '2023-10-06', 1),
(2, 2, 30, 60, '2023-10-06', 2);
-- --------------------------------------------------------

--
-- Estrutura para tabela `material`
--

CREATE TABLE `material` (
  `id`  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type` int(11) DEFAULT NULL,
  `donated` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `date` date DEFAULT curdate(),
  `idCity` int(11) DEFAULT NULL,
    FOREIGN KEY (type) REFERENCES Donations(ID),
    FOREIGN KEY (idCity) REFERENCES City(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `material`
--
INSERT INTO `material` (`id`, `type`, `donated`, `goal`, `date`, `idCity`) VALUES
(1, 3, 50, 100, '2023-10-06', 1),
(2, 3, 25, 50, '2023-10-06', 2);
--
-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(255) NOT NULL UNIQUE KEY,
  `cpf` int(11) DEFAULT NULL UNIQUE KEY,
  `cnpj` int(14) DEFAULT NULL UNIQUE KEY,
  `password` varchar(255) NOT NULL,
  `idCity` int(11) DEFAULT NULL,
  FOREIGN KEY (idCity) REFERENCES City(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admin`
--
INSERT INTO `admin` (`id`, `email`, `cpf`, `cnpj`, `password`, `idCity`) VALUES
(1, 'adm1@gmail.com', 75, 150, '1234567', 1),
(2, 'adm2@gmail.com', 30, 60, '1234567', 2);
-- --------------------------------------------------------

--
-- Estrutura para tabela `news`
--

CREATE TABLE `news` (
  `id`  int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type` varchar(255) NOT NULL,
  `idCity` int(11) DEFAULT NULL,
  FOREIGN KEY (idCity) REFERENCES City(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `news`
--
INSERT INTO `news` (`id`, `type`, `idCity`) VALUES
(1, 2, 1),
(2, 2, 2);
-- --------------------------------------------------------
--
-- Estrutura para tabela `warnings`
--

CREATE TABLE `warnings` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `injured` int(11) NOT NULL,
  `deaths` int(11) NOT NULL,
  `homeless` int(11) NOT NULL,
  `missing` int(11) NOT NULL,
  `idCity` int(11) DEFAULT NULL,
  FOREIGN KEY (idCity) REFERENCES City(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`email` varchar(255) NOT NULL UNIQUE KEY,
`password` varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;