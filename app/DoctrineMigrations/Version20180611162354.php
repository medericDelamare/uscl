<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180611162354 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE equipe ADD stats_points INT DEFAULT NULL, ADD stats_journees INT DEFAULT NULL, ADD stats_victoires INT DEFAULT NULL, ADD stats_nuls INT DEFAULT NULL, ADD stats_defaites INT DEFAULT NULL, ADD stats_forfaits INT DEFAULT NULL, ADD stats_buts_pour INT DEFAULT NULL, ADD stats_buts_contre INT DEFAULT NULL, ADD stats_penalites INT DEFAULT NULL, ADD stats_difference INT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE equipe DROP stats_points, DROP stats_journees, DROP stats_victoires, DROP stats_nuls, DROP stats_defaites, DROP stats_forfaits, DROP stats_buts_pour, DROP stats_buts_contre, DROP stats_penalites, DROP stats_difference');
    }
}
