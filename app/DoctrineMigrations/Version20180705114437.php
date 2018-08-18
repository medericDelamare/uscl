<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180705114437 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE licencie (id INT AUTO_INCREMENT NOT NULL, numero_licence INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, date_de_naissance DATETIME NOT NULL, lieu_de_naissance DATETIME NOT NULL, adresse VARCHAR(255) DEFAULT NULL, joueur TINYINT(1) NOT NULL, dirigeant TINYINT(1) NOT NULL, educateur TINYINT(1) NOT NULL, telephone_domicile VARCHAR(255) DEFAULT NULL, telephone_portable VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_3B755612DBFEF8E9 (numero_licence), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE licencie');

    }
}
