---------------------
-- 1
---------------------

CREATE TABLE Notnormalized2ndForm
( fid int(5) NOT NULL,
  fname VARCHAR(40) NOT NULL,
  college VARCHAR(20) NOT NULL,
  address VARCHAR(40) NOT NULL,
  email VARCHAR(20) NOT NULL,
  PRIMARY KEY (fid)
);

INSERT INTO Notnormalized2ndForm(fid,fname,college,address,email) VALUES (1,'Andrea Corradini', 'KEA', 'Lygten 37', 'andc@kea.dk');
INSERT INTO Notnormalized2ndForm(fid,fname,college,address,email) VALUES (2,'Jens Jensen', 'DTU', 'Lautrupvang 24', 'jj@dtu.dk');
INSERT INTO Notnormalized2ndForm(fid,fname,college,address,email) VALUES (3,'Santiago Donoso', 'KEA', 'Lygten 37', 'sand@kea.dk');

---------------------
-- 2
---------------------

CREATE TABLE Not_normalized3rdForm
( city VARCHAR(20) NOT NULL,
  year int(4) NOT NULL,
  winner VARCHAR(40) NOT NULL,
  citizenship VARCHAR(20) NOT NULL,
  PRIMARY KEY (city, year)
);

INSERT INTO Not_normalized3rdForm VALUES ('Rome',2014, 'winner Rome','Russian');
INSERT INTO Not_normalized3rdForm VALUES ('Athen',2015, 'winner Athen','Cypriot');
INSERT INTO Not_normalized3rdForm VALUES ('Madrid',2016, 'winner Madrid','German');

---------------------
-- 3
---------------------

CREATE TABLE competition_Normalized3rdForm
( city VARCHAR(20) NOT NULL,
  year int(4) NOT NULL,
  winner VARCHAR(40) NOT NULL,
  PRIMARY KEY (city, year)
);

CREATE TABLE winner_Normalized3rdForm
( winner VARCHAR(40) NOT NULL,
  citizenship VARCHAR(20) NOT NULL,
  PRIMARY KEY (winner)
);

INSERT INTO competition_Normalized3rdForm VALUES ('Rome',2014, 'winner Rome');
INSERT INTO competition_Normalized3rdForm VALUES ('Athen',2015, 'winner Athen');
INSERT INTO competition_Normalized3rdForm VALUES ('Madrid',2016, 'winner Madrid');

INSERT INTO winner_Normalized3rdForm VALUES ('winner Rome','Russian');
INSERT INTO winner_Normalized3rdForm VALUES ('winner Athen','Cypriot');
INSERT INTO winner_Normalized3rdForm VALUES ('winner Madrid','German');