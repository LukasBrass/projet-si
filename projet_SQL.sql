#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Consultant
#------------------------------------------------------------

CREATE TABLE Consultant(
        id                Int  Auto_increment  NOT NULL ,
        code              Varchar (50) NOT NULL ,
        name_c            Varchar (50) NOT NULL ,
        firstname_c       Varchar (50) NOT NULL ,
        phone             Varchar (50) NOT NULL ,
        mail              Varchar (50) NOT NULL ,
        hired_date        Date NOT NULL ,
        is_chef_de_projet Bool NOT NULL
	,CONSTRAINT Consultant_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ChefDeProjet
#------------------------------------------------------------

CREATE TABLE ChefDeProjet(
        id                Int NOT NULL ,
        code              Varchar (50) NOT NULL ,
        name_c            Varchar (50) NOT NULL ,
        firstname_c       Varchar (50) NOT NULL ,
        phone             Varchar (50) NOT NULL ,
        mail              Varchar (50) NOT NULL ,
        hired_date        Date NOT NULL ,
        is_chef_de_projet Bool NOT NULL
	,CONSTRAINT ChefDeProjet_PK PRIMARY KEY (id)

	,CONSTRAINT ChefDeProjet_Consultant_FK FOREIGN KEY (id) REFERENCES Consultant(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Ingénieur
#------------------------------------------------------------

CREATE TABLE Ingenieur(
        id                Int NOT NULL ,
        speciality        Varchar (50) NOT NULL ,
        code              Varchar (50) NOT NULL ,
        name_c            Varchar (50) NOT NULL ,
        firstname_c       Varchar (50) NOT NULL ,
        phone             Varchar (50) NOT NULL ,
        mail              Varchar (50) NOT NULL ,
        hired_date        Date NOT NULL ,
        is_chef_de_projet Bool NOT NULL
	,CONSTRAINT Ingenieur_PK PRIMARY KEY (id)

	,CONSTRAINT Ingenieur_Consultant_FK FOREIGN KEY (id) REFERENCES Consultant(id)
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

