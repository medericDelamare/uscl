<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180611163325 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE rencontre (id INT AUTO_INCREMENT NOT NULL, equipe_domicile_id INT NOT NULL, equipe_exterieure_id INT NOT NULL, journee INT NOT NULL, arbitre VARCHAR(255) DEFAULT NULL, terrain VARCHAR(255) DEFAULT NULL, score VARCHAR(255) DEFAULT NULL, surface_de_jeu VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, INDEX IDX_460C35ED5FE1AEAD (equipe_domicile_id), INDEX IDX_460C35ED8923FCCA (equipe_exterieure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rencontre ADD CONSTRAINT FK_460C35ED5FE1AEAD FOREIGN KEY (equipe_domicile_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE rencontre ADD CONSTRAINT FK_460C35ED8923FCCA FOREIGN KEY (equipe_exterieure_id) REFERENCES equipe (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE rencontre');
    }
}
