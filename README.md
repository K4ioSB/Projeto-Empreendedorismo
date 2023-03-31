# Projeto-Empreendedorismo

Codigo SQL para a tabela no banco de dados:
CREATE TABLE `usuarios2` (
   `ID` int(15) PRIMARY KEY NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `CARGO` varchar(255) NOT NULL,
  `DATANASC` date NOT NULL,
  `SALÁRIO` int(11) NOT NULL,
  `SETOR` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `SENHA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

