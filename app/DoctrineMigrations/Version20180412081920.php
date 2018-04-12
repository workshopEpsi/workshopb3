<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180412081920 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Ecoles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) NOT NULL, UNIQUE INDEX nom (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Etudiants (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) NOT NULL, prenom VARCHAR(25) NOT NULL, email VARCHAR(25) NOT NULL, mdp VARCHAR(25) NOT NULL, id_Ecoles INT DEFAULT NULL, id_Groupes INT DEFAULT NULL, INDEX FK_Etudiants_id_Ecoles (id_Ecoles), INDEX FK_Etudiants_id_Groupes (id_Groupes), UNIQUE INDEX email (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Groupes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) NOT NULL, dateCreation DATE NOT NULL, id_Etudiants INT DEFAULT NULL, id_Portefeuille INT DEFAULT NULL, INDEX FK_Groupes_id_Portefeuille (id_Portefeuille), INDEX FK_Groupes_id_Etudiants (id_Etudiants), UNIQUE INDEX nom (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Intervenants (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) NOT NULL, prenom VARCHAR(25) NOT NULL, specialite VARCHAR(25) NOT NULL, mdp VARCHAR(25) NOT NULL, id_Ecoles INT DEFAULT NULL, id_Portefeuille INT DEFAULT NULL, INDEX FK_Intervenants_id_Ecoles (id_Ecoles), INDEX FK_Intervenants_id_Portefeuille (id_Portefeuille), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Portefeuille (id INT AUTO_INCREMENT NOT NULL, creditJetons INT DEFAULT NULL, id_Groupes INT DEFAULT NULL, id_Intervenants INT DEFAULT NULL, INDEX FK_Portefeuille_id_Groupes (id_Groupes), INDEX FK_Portefeuille_id_Intervenants (id_Intervenants), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Projets (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) NOT NULL, dateDebut DATE DEFAULT NULL, dateFin DATE NOT NULL, id_Groupes INT DEFAULT NULL, id_Sujets INT DEFAULT NULL, INDEX FK_Projets_id_Groupes (id_Groupes), INDEX FK_Projets_id_Sujets (id_Sujets), UNIQUE INDEX nom (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Sujets (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) NOT NULL, description TEXT NOT NULL, UNIQUE INDEX nom (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Etudiants ADD CONSTRAINT FK_A08D8048E5FCE879 FOREIGN KEY (id_Ecoles) REFERENCES Ecoles (id)');
        $this->addSql('ALTER TABLE Etudiants ADD CONSTRAINT FK_A08D80484643F635 FOREIGN KEY (id_Groupes) REFERENCES Groupes (id)');
        $this->addSql('ALTER TABLE Groupes ADD CONSTRAINT FK_98DE5F4520B83C6F FOREIGN KEY (id_Etudiants) REFERENCES Etudiants (id)');
        $this->addSql('ALTER TABLE Groupes ADD CONSTRAINT FK_98DE5F4512A55174 FOREIGN KEY (id_Portefeuille) REFERENCES Portefeuille (id)');
        $this->addSql('ALTER TABLE Intervenants ADD CONSTRAINT FK_6191D938E5FCE879 FOREIGN KEY (id_Ecoles) REFERENCES Ecoles (id)');
        $this->addSql('ALTER TABLE Intervenants ADD CONSTRAINT FK_6191D93812A55174 FOREIGN KEY (id_Portefeuille) REFERENCES Portefeuille (id)');
        $this->addSql('ALTER TABLE Portefeuille ADD CONSTRAINT FK_316424064643F635 FOREIGN KEY (id_Groupes) REFERENCES Groupes (id)');
        $this->addSql('ALTER TABLE Portefeuille ADD CONSTRAINT FK_316424064250AC4A FOREIGN KEY (id_Intervenants) REFERENCES Intervenants (id)');
        $this->addSql('ALTER TABLE Projets ADD CONSTRAINT FK_7BE9F8474643F635 FOREIGN KEY (id_Groupes) REFERENCES Groupes (id)');
        $this->addSql('ALTER TABLE Projets ADD CONSTRAINT FK_7BE9F847B4058370 FOREIGN KEY (id_Sujets) REFERENCES Sujets (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Etudiants DROP FOREIGN KEY FK_A08D8048E5FCE879');
        $this->addSql('ALTER TABLE Intervenants DROP FOREIGN KEY FK_6191D938E5FCE879');
        $this->addSql('ALTER TABLE Groupes DROP FOREIGN KEY FK_98DE5F4520B83C6F');
        $this->addSql('ALTER TABLE Etudiants DROP FOREIGN KEY FK_A08D80484643F635');
        $this->addSql('ALTER TABLE Portefeuille DROP FOREIGN KEY FK_316424064643F635');
        $this->addSql('ALTER TABLE Projets DROP FOREIGN KEY FK_7BE9F8474643F635');
        $this->addSql('ALTER TABLE Portefeuille DROP FOREIGN KEY FK_316424064250AC4A');
        $this->addSql('ALTER TABLE Groupes DROP FOREIGN KEY FK_98DE5F4512A55174');
        $this->addSql('ALTER TABLE Intervenants DROP FOREIGN KEY FK_6191D93812A55174');
        $this->addSql('ALTER TABLE Projets DROP FOREIGN KEY FK_7BE9F847B4058370');
        $this->addSql('DROP TABLE Ecoles');
        $this->addSql('DROP TABLE Etudiants');
        $this->addSql('DROP TABLE Groupes');
        $this->addSql('DROP TABLE Intervenants');
        $this->addSql('DROP TABLE Portefeuille');
        $this->addSql('DROP TABLE Projets');
        $this->addSql('DROP TABLE Sujets');
    }
}
