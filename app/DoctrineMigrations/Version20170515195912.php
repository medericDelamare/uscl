<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170515195912 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE joueur CHANGE categorie categorie VARCHAR(255) NOT NULL, CHANGE buts_a buts_a INT DEFAULT NULL, CHANGE buts_b buts_b INT DEFAULT NULL, CHANGE buts_coupe buts_coupe INT DEFAULT NULL, CHANGE buts buts INT DEFAULT NULL, CHANGE cartons_jaunes cartons_jaunes INT DEFAULT NULL, CHANGE cartons_rouges cartons_rouges INT DEFAULT NULL, CHANGE poste poste VARCHAR(255) NOT NULL, CHANGE passes passes INT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE joueur CHANGE categorie categorie VARCHAR(200) DEFAULT \'Senior\' COLLATE utf8_unicode_ci, CHANGE buts_a buts_a INT NOT NULL, CHANGE buts_b buts_b INT NOT NULL, CHANGE buts_coupe buts_coupe INT NOT NULL, CHANGE buts buts INT NOT NULL, CHANGE cartons_jaunes cartons_jaunes INT NOT NULL, CHANGE cartons_rouges cartons_rouges INT NOT NULL, CHANGE poste poste VARCHAR(200) DEFAULT NULL COLLATE utf8_general_ci, CHANGE passes passes INT DEFAULT 0 NOT NULL');
    }
}
