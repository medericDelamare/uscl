<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170616201908 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('INSERT INTO historique_classement (historique_classement.annee, historique_classement.position, historique_classement.nb_points) VALUES 
        (\'03/04\', 4, 66), 
        (\'04/05\', 1, 73), 
        (\'05/06\', 8, 48), 
        (\'06/07\', 11, 37), 
        (\'07/08\', 8, 47), 
        (\'08/09\', 5, 52), 
        (\'09/10\', 5, 59), 
        (\'10/11\', 7, 52), 
        (\'11/12\', 9, 48), 
        (\'12/13\', 9, 38), 
        (\'13/14\', 10, 49), 
        (\'14/15\', 10, 37), 
        (\'15/16\', 11, 39), 
        (\'16/17\', 4, 58)');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
