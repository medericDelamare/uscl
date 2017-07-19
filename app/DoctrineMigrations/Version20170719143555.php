<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170719143555 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (1,\'13/14\',0,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (1,\'14/15\',0,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (1,\'15/16\',0,NULL,1,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (1,\'16/17\',0,0,0,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (2,\'16/17\',0,0,0,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (3,\'14/15\',0,NULL,0,1)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (3,\'15/16\',0,NULL,1,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (3,\'16/17\',0,0,0,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (4,\'13/14\',0,NULL,1,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (4,\'14/15\',0,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (4,\'15/16\',0,NULL,2,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (4,\'16/17\',0,0,0,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (5,\'16/17\',0,1,1,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (6,\'13/14\',0,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (6,\'14/15\',0,NULL,0,1)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (6,\'15/16\',0,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (6,\'16/17\',1,0,1,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (7,\'13/14\',0,NULL,3,1)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (7,\'14/15\',1,NULL,4,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (7,\'15/16\',2,NULL,5,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (7,\'16/17\',0,2,6,1)');


        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (8,\'16/17\',2,1,2,1)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (9,\'14/15\',0,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (9,\'15/16\',1,NULL,1,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (9,\'16/17\',1,0,1,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (10,\'13/14\',1,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (10,\'14/15\',0,NULL,1,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (10,\'15/16\',0,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (10,\'16/17\',1,1,1,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (16,\'16/17\',0,0,1,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (17,\'15/16\',0,0,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (17,\'16/17\',0,0,0,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (18,\'13/14\',8,NULL,3,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (18,\'14/15\',5,NULL,3,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (18,\'15/16\',8,NULL,5,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (18,\'16/17\',6,4,6,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (19,\'13/14\',3,NULL,4,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (19,\'15/16\',5,NULL,1,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (19,\'16/17\',10,7,3,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (20,\'13/14\',2,NULL,4,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (20,\'14/15\',4,NULL,5,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (20,\'15/16\',0,NULL,0,1)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (20,\'16/17\',4,3,4,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (21,\'13/14\',6,NULL,0,1)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (21,\'14/15\',3,NULL,2,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (21,\'15/16\',2,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (21,\'16/17\',4,0,3,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (23,\'13/14\',2,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (23,\'14/15\',0,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (23,\'15/16\',3,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (23,\'16/17\',1,4,0,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (28,\'13/14\',NULL ,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (28,\'14/15\',NULL ,NULL,1,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (28,\'15/16\',6,NULL,2,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (28,\'16/17\',11,11,3,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (29,\'13/14\',NULL ,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (29,\'14/15\',NULL ,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (29,\'15/16\',20,NULL,1,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (29,\'16/17\',16,7,1,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (31,\'13/14\',NULL ,NULL,1,1)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (31,\'14/15\',NULL ,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (31,\'15/16\',29,NULL,1,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (31,\'16/17\',17,7,2,0)');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (32,\'13/14\',5 ,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (32,\'14/15\',3 ,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (32,\'15/16\',3,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (32,\'16/17\',8,0,0,0)');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
