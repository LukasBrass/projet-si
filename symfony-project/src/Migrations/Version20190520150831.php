<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190520150831 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE absence CHANGE Flag flag INT NOT NULL');
        $this->addSql('ALTER TABLE chefprojet DROP FOREIGN KEY ChefProjet_Consultant_FK');
        $this->addSql('ALTER TABLE client CHANGE IdClient idClient INT NOT NULL, CHANGE RaisonSociale RaisonSociale VARCHAR(255) NOT NULL, CHANGE Adresse Adresse VARCHAR(255) NOT NULL, CHANGE Pays Pays VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE consultant DROP FOREIGN KEY Consultant_Equipe_FK');
        $this->addSql('ALTER TABLE consultant ADD jour VARCHAR(255) NOT NULL, DROP Prenom, CHANGE Code Code INT NOT NULL, CHANGE Nom nom VARCHAR(255) NOT NULL, CHANGE Telephone telephone VARCHAR(255) NOT NULL, CHANGE Mail mail VARCHAR(255) NOT NULL, CHANGE HiringYear HiringYear VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY Equipe_Manager_FK');
        $this->addSql('ALTER TABLE equipe CHANGE IdEquipe idEquipe INT NOT NULL');
        $this->addSql('ALTER TABLE facturer DROP FOREIGN KEY Facturer_Calendrier_FK');
        $this->addSql('ALTER TABLE facturer DROP FOREIGN KEY Facturer_Client_FK');
        $this->addSql('ALTER TABLE facturer DROP FOREIGN KEY Facturer_Equipe_FK');
        $this->addSql('ALTER TABLE facturer CHANGE Montant montant INT NOT NULL');
        $this->addSql('ALTER TABLE imputation DROP FOREIGN KEY Imputation_Calendrier_FK');
        $this->addSql('ALTER TABLE imputation DROP FOREIGN KEY Imputation_Ingenieur_FK');
        $this->addSql('ALTER TABLE imputation DROP FOREIGN KEY Imputation_Projet_FK');
        $this->addSql('ALTER TABLE imputation CHANGE Jour jour INT NOT NULL');
        $this->addSql('ALTER TABLE imputationcdp DROP FOREIGN KEY ImputationCdP_Calendrier_FK');
        $this->addSql('ALTER TABLE imputationcdp DROP FOREIGN KEY ImputationCdP_ChefProjet_FK');
        $this->addSql('ALTER TABLE imputationcdp CHANGE Jour jour INT NOT NULL');
        $this->addSql('ALTER TABLE ingenieur DROP FOREIGN KEY Ingenieur_Consultant_FK');
        $this->addSql('ALTER TABLE ingenieur CHANGE Specialites specialites VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE manager CHANGE IdManager idManager INT NOT NULL, CHANGE NomManager nomManager VARCHAR(255) NOT NULL, CHANGE PrenomManager prenomManager VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY Projet_ChefProjet2_FK');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY Projet_Client1_FK');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY Projet_Manager_FK');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY Projet_TypeProjet0_FK');
        $this->addSql('ALTER TABLE projet CHANGE IdProjet idProjet INT NOT NULL, CHANGE NomProjet nomProjet VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE typeprojet CHANGE IdType idType INT NOT NULL, CHANGE NomTypeProjet nomTypeProjet VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE absence CHANGE flag Flag INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT Absence_Consultant_FK FOREIGN KEY (Code) REFERENCES consultant (Code)');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT Absence_Date_FK FOREIGN KEY (Annee, Mois, Jour) REFERENCES date (Annee, Mois, Jour)');
        $this->addSql('CREATE INDEX IDX_765AE0C91F53EACB768223897A2576FB ON absence (Annee, Mois, Jour)');
        $this->addSql('ALTER TABLE chefprojet ADD CONSTRAINT ChefProjet_Consultant_FK FOREIGN KEY (Code) REFERENCES consultant (Code)');
        $this->addSql('ALTER TABLE client CHANGE idClient IdClient INT AUTO_INCREMENT NOT NULL, CHANGE RaisonSociale RaisonSociale VARCHAR(50) NOT NULL COLLATE utf8_general_ci, CHANGE Adresse Adresse VARCHAR(50) NOT NULL COLLATE utf8_general_ci, CHANGE Pays Pays VARCHAR(50) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE consultant ADD Prenom VARCHAR(15) NOT NULL COLLATE utf8_general_ci, DROP jour, CHANGE Code Code INT AUTO_INCREMENT NOT NULL, CHANGE nom Nom VARCHAR(15) NOT NULL COLLATE utf8_general_ci, CHANGE telephone Telephone VARCHAR(11) NOT NULL COLLATE utf8_general_ci, CHANGE mail Mail VARCHAR(30) NOT NULL COLLATE utf8_general_ci, CHANGE HiringYear HiringYear VARCHAR(5) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE consultant ADD CONSTRAINT Consultant_Equipe_FK FOREIGN KEY (IdEquipe) REFERENCES equipe (IdEquipe)');
        $this->addSql('ALTER TABLE equipe CHANGE idEquipe IdEquipe INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT Equipe_Manager_FK FOREIGN KEY (IdManager) REFERENCES manager (IdManager)');
        $this->addSql('ALTER TABLE facturer CHANGE montant Montant DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE facturer ADD CONSTRAINT Facturer_Calendrier_FK FOREIGN KEY (Annee, Mois) REFERENCES calendrier (Annee, Mois)');
        $this->addSql('ALTER TABLE facturer ADD CONSTRAINT Facturer_Client_FK FOREIGN KEY (IdClient) REFERENCES client (IdClient)');
        $this->addSql('ALTER TABLE facturer ADD CONSTRAINT Facturer_Equipe_FK FOREIGN KEY (IdEquipe) REFERENCES equipe (IdEquipe)');
        $this->addSql('CREATE INDEX IDX_7140699D1F53EACB76822389 ON facturer (Annee, Mois)');
        $this->addSql('ALTER TABLE imputation CHANGE jour Jour INT DEFAULT 0');
        $this->addSql('ALTER TABLE imputation ADD CONSTRAINT Imputation_Calendrier_FK FOREIGN KEY (Annee, Mois) REFERENCES calendrier (Annee, Mois)');
        $this->addSql('ALTER TABLE imputation ADD CONSTRAINT Imputation_Ingenieur_FK FOREIGN KEY (Code) REFERENCES ingenieur (Code)');
        $this->addSql('ALTER TABLE imputation ADD CONSTRAINT Imputation_Projet_FK FOREIGN KEY (IdProjet) REFERENCES projet (IdProjet)');
        $this->addSql('ALTER TABLE imputationcdp CHANGE jour Jour INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE imputationcdp ADD CONSTRAINT ImputationCdP_Calendrier_FK FOREIGN KEY (Annee, Mois) REFERENCES calendrier (Annee, Mois)');
        $this->addSql('ALTER TABLE imputationcdp ADD CONSTRAINT ImputationCdP_ChefProjet_FK FOREIGN KEY (Code) REFERENCES chefprojet (Code)');
        $this->addSql('CREATE INDEX IDX_83E1B5E11F53EACB76822389 ON imputationcdp (Annee, Mois)');
        $this->addSql('ALTER TABLE ingenieur CHANGE specialites Specialites VARCHAR(30) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE ingenieur ADD CONSTRAINT Ingenieur_Consultant_FK FOREIGN KEY (Code) REFERENCES consultant (Code)');
        $this->addSql('ALTER TABLE Manager CHANGE idManager IdManager INT AUTO_INCREMENT NOT NULL, CHANGE nomManager NomManager VARCHAR(15) NOT NULL COLLATE utf8_general_ci, CHANGE prenomManager PrenomManager VARCHAR(15) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE projet CHANGE idProjet IdProjet INT AUTO_INCREMENT NOT NULL, CHANGE nomProjet NomProjet VARCHAR(20) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT Projet_ChefProjet2_FK FOREIGN KEY (Code) REFERENCES chefprojet (Code)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT Projet_Client1_FK FOREIGN KEY (IdClient) REFERENCES client (IdClient)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT Projet_Manager_FK FOREIGN KEY (IdManager) REFERENCES manager (IdManager)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT Projet_TypeProjet0_FK FOREIGN KEY (IdType) REFERENCES typeprojet (IdType)');
        $this->addSql('ALTER TABLE typeprojet CHANGE idType IdType INT AUTO_INCREMENT NOT NULL, CHANGE nomTypeProjet NomTypeProjet VARCHAR(10) NOT NULL COLLATE utf8_general_ci');
    }
}
