USE clinica;

-- Creación de la tabla 'roles'
CREATE TABLE roles (
    rol_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) UNIQUE NOT NULL
);

-- Inserción de los roles predefinidos
INSERT INTO roles (nombre) VALUES ('Administrador'), ('Medico'), ('Paciente');

-- Creación de la tabla 'usuarios'
CREATE TABLE usuarios (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    rol_id INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rol_id) REFERENCES roles (rol_id)
);

-- Creación de la tabla 'medicos'
CREATE TABLE medicos (
    medico_id INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especialidad VARCHAR(100) NOT NULL,
    horario_atencion VARCHAR(100),
    licencia VARCHAR(50) UNIQUE NOT NULL,
    FOREIGN KEY (medico_id) REFERENCES usuarios (usuario_id) ON DELETE CASCADE
);

-- Creación de la tabla 'pacientes'
CREATE TABLE pacientes (
    paciente_id INT PRIMARY KEY,
    fecha_nacimiento DATE,
    telefono VARCHAR(20),
    FOREIGN KEY (paciente_id) REFERENCES usuarios (usuario_id) ON DELETE CASCADE
);

-- Creación de la tabla 'citas'
CREATE TABLE citas (
    cita_id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    medico_id INT NOT NULL,
    fecha_hora TIMESTAMP NOT NULL,
    estado VARCHAR(50) NOT NULL DEFAULT 'Pendiente',
    motivo TEXT,
    FOREIGN KEY (paciente_id) REFERENCES pacientes (paciente_id),
    FOREIGN KEY (medico_id) REFERENCES medicos (medico_id)
);

INSERT INTO usuarios ( nombre, email, password_hash, rol_id) VALUES
('Admin', 'admin@correo.com','hola123', 1)

-- Índices para mejorar el rendimiento de las consultas
CREATE INDEX idx_usuarios_rol_id ON usuarios (rol_id);
CREATE INDEX idx_medicos_especialidad ON medicos (especialidad);
CREATE INDEX idx_citas_medico_id ON citas (medico_id);
CREATE INDEX idx_citas_paciente_id ON citas (paciente_id);