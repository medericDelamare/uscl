<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180720190542 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nom_parse (id INT AUTO_INCREMENT NOT NULL, club_id INT NOT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_782D18FD6C6E55B5 (nom), INDEX IDX_782D18FD61190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nom_parse ADD CONSTRAINT FK_782D18FD61190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE club DROP noms_parse');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE nom_parse');
        $this->addSql('ALTER TABLE club ADD noms_parse LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE dirigeant CHANGE fixe fixe VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE mobile mobile VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE mail mail VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE photo photo VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE equipe CHANGE club_id club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5BCF5E72D');
        $this->addSql('ALTER TABLE joueur CHANGE numero_licence numero_licence VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
