<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170622192532 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE historique_stats (id INT AUTO_INCREMENT NOT NULL, joueur_id INT DEFAULT NULL, nb_buts INT DEFAULT NULL, nb_passes INT DEFAULT NULL, nb_cartons_jaunes INT DEFAULT NULL, nb_cartons_rouges INT DEFAULT NULL, INDEX IDX_19C7BDD9A9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE historique_stats ADD CONSTRAINT FK_19C7BDD9A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE historique_stats');
    }
}
