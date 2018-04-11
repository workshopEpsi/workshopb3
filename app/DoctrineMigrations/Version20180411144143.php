<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180411144143 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Etudiants CHANGE id_Ecoles id_Ecoles INT DEFAULT NULL, CHANGE id_Groupes id_Groupes INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Intervenants CHANGE id_Ecoles id_Ecoles INT DEFAULT NULL, CHANGE id_Portefeuille id_Portefeuille INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Groupes CHANGE id_Portefeuille id_Portefeuille INT DEFAULT NULL, CHANGE id_Etudiants id_Etudiants INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Portefeuille CHANGE id_Groupes id_Groupes INT DEFAULT NULL, CHANGE id_Intervenants id_Intervenants INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Projets CHANGE id_Groupes id_Groupes INT DEFAULT NULL, CHANGE id_Sujets id_Sujets INT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Etudiants CHANGE id_Ecoles id_Ecoles INT NOT NULL, CHANGE id_Groupes id_Groupes INT NOT NULL');
        $this->addSql('ALTER TABLE Groupes CHANGE id_Etudiants id_Etudiants INT NOT NULL, CHANGE id_Portefeuille id_Portefeuille INT NOT NULL');
        $this->addSql('ALTER TABLE Intervenants CHANGE id_Ecoles id_Ecoles INT NOT NULL, CHANGE id_Portefeuille id_Portefeuille INT NOT NULL');
        $this->addSql('ALTER TABLE Portefeuille CHANGE id_Groupes id_Groupes INT NOT NULL, CHANGE id_Intervenants id_Intervenants INT NOT NULL');
        $this->addSql('ALTER TABLE Projets CHANGE id_Groupes id_Groupes INT NOT NULL, CHANGE id_Sujets id_Sujets INT NOT NULL');
    }
}
