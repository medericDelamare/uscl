<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170919220013 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'BEUZEVILLE AC\',2,12) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'THIBERVILLE 2\',2,11) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'ST GERMAIN CA\',2,10) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'BEAUMONT 2\',2,9) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'BRIONNE FC\',2,8) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'EPEGARD NEUBOURG FC 2\',2,7) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'VAL DE RISLE FC 2\',2,6) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'PLASNES FC\',2,5) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'CORM.LIEUREY US\',2,4) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'MANNEVILLE AS\',2,3) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'CONTEVILLE CO\',2,2) ');
        $this->addSql('INSERT INTO stats_par_journee(category, equipe, journee, place) VALUES(\'Senior-A\', \'LE BEL AIR FC 2\',2,1) ');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
