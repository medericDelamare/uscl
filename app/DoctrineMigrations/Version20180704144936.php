<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180704144936 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('TRUNCATE stats_par_journee');
        $this->addSql('ALTER TABLE stats_par_journee ADD equipe_id INT NOT NULL, DROP category, DROP equipe');
        $this->addSql('ALTER TABLE stats_par_journee ADD CONSTRAINT FK_676E9EA16D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_676E9EA16D861B89 ON stats_par_journee (equipe_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stats_par_journee DROP FOREIGN KEY FK_676E9EA16D861B89');
        $this->addSql('DROP INDEX IDX_676E9EA16D861B89 ON stats_par_journee');
        $this->addSql('ALTER TABLE stats_par_journee ADD category VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, ADD equipe VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP equipe_id');
    }
}
