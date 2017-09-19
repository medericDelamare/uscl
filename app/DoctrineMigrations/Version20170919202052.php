<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170919202052 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stats_par_journee CHANGE journee journee INT NOT NULL, CHANGE place place INT NOT NULL');

        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'BEUZEVILLE AC\',1,1) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'THIBERVILLE 2\',1,2) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'ST GERMAIN CA\',1,3) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'BEAUMONT 2\',1,4) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'BRIONNE FC\',1,5) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'EPEGARD NEUBOURG FC 2\',1,6) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'VAL DE RISLE FC 2\',1,7) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'PLASNES FC\',1,8) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'CORM.LIEUREY US\',1,9) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'MANNEVILLE AS\',1,10) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'CONTEVILLE CO\',1,11) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'LE BEL AIR FC 2\',1,12) ');

        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'CHARENTONNE\',1,1) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'ST AUBIN LE VERTUEUX\',1,2) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'VIEVRE AS\',1,3) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'PLASNES FC 2\',1,4) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'BERNAY S.C. 2\',1,5) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'PONT AUTHOU FOOTBALL\',1,6) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'VAL DE RISLE FC 3\',1,7) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'ST GERMAIN CA 2\',1,8) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'CORM.LIEUREY US 2\',1,9) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'EPAIGNES 2\',1,10) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-B\', \'BRIONNE FC 2\',1,11) ');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stats_par_journee CHANGE journee journee VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE place place VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
