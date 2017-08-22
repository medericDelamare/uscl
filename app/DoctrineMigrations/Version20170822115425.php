<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170822115425 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('Update joueur set joueur.passes = 0');
        $this->addSql('Update joueur set joueur.poste = \'Attaquant\' WHERE joueur.poste = \'Ataquant\' ');
        $this->addSql('Update joueur set joueur.nom = \'GAGNEUR\' WHERE joueur.nom = \'GAAGNEUR\' ');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
