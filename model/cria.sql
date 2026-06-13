-- No root
mysql -u root
CREATE DATABASE clube;
CREATE USER 'admin'@'localhost' IDENTIFIED BY "12345";
GRANT ALL PRIVILEGES ON clube.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;
exit

-- No admin
mysql -u admin -p
12345
USE clube;
CREATE TABLE cargos (
    id INT NOT NULL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Cria a tabela de usuários apontando para cargos
CREATE TABLE usuarios (
    id VARCHAR(255) NOT NULL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    sexo CHAR(1),
    cargo_id INT, -- Esta é a coluna que vai armazenar o número do cargo
    
    -- Aqui criamos a restrição que liga as duas tabelas
    CONSTRAINT fk_usuario_cargo 
        FOREIGN KEY (cargo_id) 
        REFERENCES cargos(id)
        ON DELETE RESTRICT -- Impede de apagar um cargo se houver usuário usando ele
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE eventos(
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    _data DATETIME NOT NULL,
    _local VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO cargos (id, nome) VALUES (1, 'Membro');
INSERT INTO cargos (id, nome) VALUES (2, 'Administrador');

INSERT INTO usuarios (id, nome, senha, sexo, cargo_id) VALUES 
('admin', 'Administrador do Clube', MD5('123'), 'M', 2),
('santana', 'Santana Silva', MD5('123'), 'M', 1);