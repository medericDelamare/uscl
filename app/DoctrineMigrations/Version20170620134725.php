<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170620134725 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE carriere_joueur (id INT AUTO_INCREMENT NOT NULL, joueur_id INT DEFAULT NULL, saison VARCHAR(255) NOT NULL, sous_categorie VARCHAR(255) NOT NULL, club VARCHAR(255) NOT NULL, INDEX IDX_44BC27BBA9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carriere_joueur ADD CONSTRAINT FK_44BC27BBA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE carriere_joueur');
    }
}
