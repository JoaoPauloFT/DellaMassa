CREATE TABLE config(
    id_config INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    hora_inicio_almoco TIME NOT NULL,
    hora_termino_almoco TIME NOT NULL,
    hora_inicio_janta TIME NOT NULL,
    hora_termino_janta TIME NOT NULL
);

INSERT INTO config (hora_inicio_almoco, hora_termino_almoco, hora_inicio_janta, hora_termino_janta) VALUE ('11:30', '15:00', '18:00', '03:00')