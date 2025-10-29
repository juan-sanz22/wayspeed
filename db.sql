-- Criação do banco de dados
CREATE DATABASE gerenciamento_ferroviario;
USE gerenciamento_ferroviario;

-- Tabela de Trens
CREATE TABLE Trens (
trem_id INT AUTO_INCREMENT PRIMARY KEY,
numero_serie VARCHAR(50) UNIQUE NOT NULL,
modelo VARCHAR(100) NOT NULL,
data_fabricacao DATE NOT NULL,
capacidade_passageiros INT,
capacidade_carga DECIMAL(10,2),
status_operacional ENUM('ativo', 'manutencao', 'desativado') DEFAULT 'ativo',
quilometragem_total DECIMAL(12,2) DEFAULT 0.00,
data_ultima_inspecao DATE
);

-- Tabela de Estações
CREATE TABLE Estacoes (
estacao_id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
latitude DECIMAL(10,8) NOT NULL,
longitude DECIMAL(11,8) NOT NULL,
tipo ENUM('passageiros', 'carga', 'mista') NOT NULL,
capacidade_estacionamento INT
);

-- Tabela de Rotas
CREATE TABLE Rotas (
rota_id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
estacao_origem INT NOT NULL,
estacao_destino INT NOT NULL,
distancia_total DECIMAL(10,2) NOT NULL,
tempo_medio_percurso TIME NOT NULL,
FOREIGN KEY (estacao_origem) REFERENCES Estacoes(estacao_id),
FOREIGN KEY (estacao_destino) REFERENCES Estacoes(estacao_id)
);

-- Tabela de Segmentos
CREATE TABLE Segmentos (
segmento_id INT AUTO_INCREMENT PRIMARY KEY,
rota_id INT NOT NULL,
estacao_inicio INT NOT NULL,
estacao_fim INT NOT NULL,
comprimento DECIMAL(8,2) NOT NULL,
velocidade_maxima INT NOT NULL,
FOREIGN KEY (rota_id) REFERENCES Rotas(rota_id),

FOREIGN KEY (estacao_inicio) REFERENCES Estacoes(estacao_id),
FOREIGN KEY (estacao_fim) REFERENCES Estacoes(estacao_id)
);

-- Tabela de Viagens
CREATE TABLE Viagens (
viagem_id INT AUTO_INCREMENT PRIMARY KEY,
trem_id INT NOT NULL,
rota_id INT NOT NULL,
horario_partida_previsto DATETIME NOT NULL,
horario_chegada_previsto DATETIME NOT NULL,
horario_partida_real DATETIME,
horario_chegada_real DATETIME,
status ENUM('planejada', 'em_andamento', 'concluida', 'cancelada', 'atrasada') DEFAULT
'planejada',
motivo_atraso VARCHAR(255),
FOREIGN KEY (trem_id) REFERENCES Trens(trem_id),
FOREIGN KEY (rota_id) REFERENCES Rotas(rota_id)
);

-- Tabela de Sensores
CREATE TABLE Sensores (
sensor_id INT AUTO_INCREMENT PRIMARY KEY,
tipo ENUM('temperatura', 'peso', 'velocidade', 'vibracao', 'umidade', 'corrente_eletrica')
NOT NULL,
localizacao_id INT NOT NULL,
tipo_localizacao ENUM('trilho', 'trem') NOT NULL,
unidade_medida VARCHAR(20) NOT NULL,
frequencia_leitura INT NOT NULL COMMENT 'Frequência em segundos',
data_instalacao DATE NOT NULL,
status ENUM('ativo', 'inativo', 'defeituoso') DEFAULT 'ativo'
);

-- Tabela de Leituras de Sensor
CREATE TABLE LeiturasSensor (
leitura_id BIGINT AUTO_INCREMENT PRIMARY KEY,
sensor_id INT NOT NULL,
valor DECIMAL(12,4) NOT NULL,
timestamp DATETIME NOT NULL,
status_anomalia BOOLEAN DEFAULT FALSE,
FOREIGN KEY (sensor_id) REFERENCES Sensores(sensor_id),
INDEX idx_timestamp (timestamp)
);

-- Tabela de Manutenções
CREATE TABLE Manutencoes (
manutencao_id INT AUTO_INCREMENT PRIMARY KEY,
trem_id INT NOT NULL,

tipo ENUM('preventiva', 'corretiva', 'preditiva') NOT NULL,
descricao TEXT,
data_agendada DATETIME NOT NULL,
data_conclusao DATETIME,
status ENUM('agendada', 'em_andamento', 'concluida', 'cancelada') DEFAULT
'agendada',
custo DECIMAL(10,2),
quilometragem_trem DECIMAL(12,2),
FOREIGN KEY (trem_id) REFERENCES Trens(trem_id)
);

-- Tabela de Alertas
CREATE TABLE Alertas (
alerta_id INT AUTO_INCREMENT PRIMARY KEY,
tipo ENUM('atraso', 'falha_tecnica', 'seguranca', 'manutencao', 'climatico') NOT NULL,
severidade ENUM('baixa', 'media', 'alta', 'critica') NOT NULL,
descricao TEXT NOT NULL,
timestamp DATETIME NOT NULL,
viagem_id INT,
status_resolucao ENUM('aberto', 'em_tratamento', 'resolvido') DEFAULT 'aberto',
FOREIGN KEY (viagem_id) REFERENCES Viagens(viagem_id)
);

-- Tabela de Usuários
CREATE TABLE Usuarios (
usuario_id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
tipo ENUM('controlador', 'engenheiro', 'planejador', 'maquinista', 'administrador') NOT
NULL,
email VARCHAR(100) UNIQUE NOT NULL,
hash_senha VARCHAR(255) NOT NULL,
ultimo_login DATETIME,
status ENUM('ativo', 'inativo', 'suspenso') DEFAULT 'ativo'
);

-- Tabela de Posições de Trem em Tempo Real
CREATE TABLE PosicoesTrem (
posicao_id BIGINT AUTO_INCREMENT PRIMARY KEY,
trem_id INT NOT NULL,
viagem_id INT,
latitude DECIMAL(10,8) NOT NULL,
longitude DECIMAL(11,8) NOT NULL,
velocidade DECIMAL(6,2) COMMENT 'Em km/h',
direcao DECIMAL(5,2) COMMENT 'Em graus',
timestamp DATETIME NOT NULL,
FOREIGN KEY (trem_id) REFERENCES Trens(trem_id),
FOREIGN KEY (viagem_id) REFERENCES Viagens(viagem_id),
INDEX idx_timestamp (timestamp)
);

-- Tabela de Histórico de Consumo Energético
CREATE TABLE ConsumoEnergetico (
registro_id INT AUTO_INCREMENT PRIMARY KEY,
trem_id INT NOT NULL,
data DATE NOT NULL,
distancia_percorrida DECIMAL(8,2) NOT NULL,
energia_consumida DECIMAL(10,2) NOT NULL COMMENT 'Em kWh',
eficiencia DECIMAL(8,2) GENERATED ALWAYS AS (energia_consumida /
distancia_percorrida) STORED,
FOREIGN KEY (trem_id) REFERENCES Trens(trem_id),
UNIQUE KEY uk_trem_data (trem_id, data)
);

-- Tabela de Notificações para Usuários
CREATE TABLE Notificacoes (
notificacao_id INT AUTO_INCREMENT PRIMARY KEY,
usuario_id INT NOT NULL,
alerta_id INT NOT NULL,
mensagem TEXT NOT NULL,
data_envio DATETIME NOT NULL,
lida BOOLEAN DEFAULT FALSE,
FOREIGN KEY (usuario_id) REFERENCES Usuarios(usuario_id),
FOREIGN KEY (alerta_id) REFERENCES Alertas(alerta_id)
);

-- Índices adicionais para otimização
CREATE INDEX idx_viagens_trem ON Viagens(trem_id);
CREATE INDEX idx_viagens_rota ON Viagens(rota_id);
CREATE INDEX idx_viagens_status ON Viagens(status);
CREATE INDEX idx_leituras_sensor ON LeiturasSensor(sensor_id, timestamp);
CREATE INDEX idx_alertas_tipo_severidade ON Alertas(tipo, severidade);
CREATE INDEX idx_posicoes_trem ON PosicoesTrem(trem_id, timestamp);