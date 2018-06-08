<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180607160514 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE joueur ADD poste_id INT DEFAULT NULL, DROP poste');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C5A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id)');
        $this->addSql('CREATE INDEX IDX_FD71A9C5A0905086 ON joueur (poste_id)');
        $this->addSql('ALTER TABLE poste ADD position INT NOT NULL');

        $this->addSql('INSERT INTO poste(nom, code, position) VALUES (\'Gardien\', \'gardien\', 1)');
        $this->addSql('INSERT INTO poste(nom, code, position) VALUES (\'Defenseur\', \'defenseur\', 2)');
        $this->addSql('INSERT INTO poste(nom, code, position) VALUES (\'Milieu\', \'milieu\', 3)');
        $this->addSql('INSERT INTO poste(nom, code, position) VALUES (\'Attaquant\', \'attaquant\', 4)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5A0905086');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP INDEX IDX_FD71A9C5A0905086 ON joueur');
        $this->addSql('ALTER TABLE joueur ADD poste VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, DROP poste_id');
    }
}
