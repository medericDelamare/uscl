<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180720202952 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carriere_joueur ADD club_id INT DEFAULT NULL, CHANGE club club_parse VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE carriere_joueur ADD CONSTRAINT FK_44BC27BB61190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_44BC27BB61190A32 ON carriere_joueur (club_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carriere_joueur DROP FOREIGN KEY FK_44BC27BB61190A32');
        $this->addSql('DROP INDEX IDX_44BC27BB61190A32 ON carriere_joueur');
        $this->addSql('ALTER TABLE carriere_joueur DROP club_id, CHANGE club_parse club VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE dirigeant CHANGE fixe fixe VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE mobile mobile VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE mail mail VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE photo photo VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE equipe CHANGE club_id club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5BCF5E72D');
        $this->addSql('ALTER TABLE joueur CHANGE numero_licence numero_licence VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
