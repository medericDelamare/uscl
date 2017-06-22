<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170622202334 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (33,\'13/14\',6,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (33,\'14/15\',0,NULL,0,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (33,\'15/16\',5,NULL,2,0)');
        $this->addSql('INSERT INTO historique_stats(joueur_id, saison ,nb_buts, nb_passes,nb_cartons_jaunes, nb_cartons_rouges) VALUES (33,\'16/17\',2,2,1,0)');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
