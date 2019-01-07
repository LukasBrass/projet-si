#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Table: Consultant
#------------------------------------------------------------

CREATE TABLE Consultant(
        id          Int  Auto_increment  NOT NULL ,
        code        Varchar (50) NOT NULL ,
        name_c      Varchar (50) NOT NULL ,
        firstname_c Varchar (50) NOT NULL ,
        phone       Varchar (50) NOT NULL ,
        mail        Varchar (50) NOT NULL ,
        hired_date  Date NOT NULL ,
        type_metier Varchar (5) NOT NULL ,
        specialite  Varchar (50) DEFAULT NULL ,
        TJM_Ing     Int DEFAULT NULL,
        TJM_CP      Int DEFAULT NULL
	,CONSTRAINT Consultant_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Manager
#------------------------------------------------------------

CREATE TABLE Manager(
        id Int  Auto_increment  NOT NULL
	,CONSTRAINT Manager_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Projet
#------------------------------------------------------------

CREATE TABLE Projet(
        id         Int  Auto_increment  NOT NULL ,
        start_date Date NOT NULL ,
        end_date   Date NOT NULL ,
        id_Manager Int NOT NULL
	,CONSTRAINT Projet_PK PRIMARY KEY (id)

	,CONSTRAINT Projet_Manager_FK FOREIGN KEY (id_Manager) REFERENCES Manager(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: EquipeProjet
#------------------------------------------------------------

CREATE TABLE EquipeProjet(
        id        Int NOT NULL ,
        id_Projet Int NOT NULL
	,CONSTRAINT EquipeProjet_PK PRIMARY KEY (id,id_Projet)

	,CONSTRAINT EquipeProjet_Consultant_FK FOREIGN KEY (id) REFERENCES Consultant(id)
	,CONSTRAINT EquipeProjet_Projet0_FK FOREIGN KEY (id_Projet) REFERENCES Projet(id)
)ENGINE=InnoDB;


#populate database : 
# Add ingénieurs

insert into Consultant (code, name_c, firstname_c, phone, mail, hired_date, type_metier, specialite, TJM_Ing) VALUES ("code1", "name1","firstname1","0606060606","name1@gmail.com", "2019-01-01","I", "etudes", "200");
insert into Consultant (code, name_c, firstname_c, phone, mail, hired_date, type_metier, specialite, TJM_Ing) VALUES ("code2", "name2","firstname2","0606060606","name2@gmail.com", "2019-01-01","I", "developpement", "200");
insert into Consultant (code, name_c, firstname_c, phone, mail, hired_date, type_metier, specialite, TJM_Ing) VALUES ("code3", "name3","firstname3","0606060606","name3@gmail.com", "2019-01-01","I", "etudes", "200");
insert into Consultant (code, name_c, firstname_c, phone, mail, hired_date, type_metier, specialite, TJM_Ing) VALUES ("code4", "name4","firstname4","0606060606","name4@gmail.com", "2019-01-01","I", "developpement", "200");

#Add Chef de projets

insert into Consultant (code, name_c, firstname_c, phone, mail, hired_date, type_metier, TJM_CP) VALUES ("code5", "name5","firstname5","0606060606","name5@gmail.com", "2019-01-01","P", 250);
insert into Consultant (code, name_c, firstname_c, phone, mail, hired_date, type_metier, TJM_CP) VALUES ("code6", "name6","firstname6","0606060606","name6@gmail.com", "2019-01-01","P", 250);
insert into Consultant (code, name_c, firstname_c, phone, mail, hired_date, type_metier, TJM_CP) VALUES ("code3", "name7","firstname7","0606060606","name7@gmail.com", "2019-01-01","P", 250);
insert into Consultant (code, name_c, firstname_c, phone, mail, hired_date, type_metier, TJM_CP) VALUES ("code8", "name8","firstname8","0606060606","name8@gmail.com", "2019-01-01","P", 250);


# Add Managers

insert into Manager values();
insert into Manager values();
insert into Manager values();


#Add Projets

insert into Projet(start_date, end_date, id_Manager) values ("2019-01-01", "2019-02-01",1);
insert into Projet(start_date, end_date, id_Manager) values ("2018-01-01", "2018-02-01",1);
insert into Projet(start_date, end_date, id_Manager) values ("2019-10-01", "2018-11-01",2);
insert into Projet(start_date, end_date, id_Manager) values ("2018-12-01", "2019-02-01",2);
insert into Projet(start_date, end_date, id_Manager) values ("2019-01-01", "2019-02-02",3);
insert into Projet(start_date, end_date, id_Manager) values ("2018-07-01", "2018-08-01",3);

#Add consultants in projects

insert into EquipeProjet(id, id_projet) values (1,1);
insert into EquipeProjet(id, id_projet) values (1,2);
insert into EquipeProjet(id, id_projet) values (2,1);
insert into EquipeProjet(id, id_projet) values (2,2);
insert into EquipeProjet(id, id_projet) values (3,2);
insert into EquipeProjet(id, id_projet) values (3,3);

