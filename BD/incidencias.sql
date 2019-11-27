CREATE TABLE Incidencias (
  idIncidencias INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  idEmpleado VARCHAR(2) NULL,
  idClausulas VARCHAR(2) NULL,
  Observaciones TEXT NULL,
  Fecha DATE NULL,
  PRIMARY KEY(idIncidencias)
);


