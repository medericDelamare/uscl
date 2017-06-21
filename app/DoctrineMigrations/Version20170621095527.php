<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170621095527 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'1999-2000\', \'Libre / Débutant (3)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2002-2003\', \'Libre / Benjamin (1)\', \'U.S. MOYAUX\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2008-2009\', \'Libre / 18 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2009-2010\', \'Libre / U18 (- 18 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2010-2011\', \'Libre / U19 (- 19 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2011-2012\', \'Libre / Senior U20 (- 20 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2012-2013\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2013-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2013-2014\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2014-2015\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2015-2016\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (33,\'2016-2017\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
