<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170515173433 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'CHENEVARIN\',\'Nicolas\',\'Senior\', \'Gardien\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'DESMARAIS\',\'Ludovic\',\'Senior\', \'Gardien\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'COLETTE\',\'Alexandre\',\'Senior\', \'Gardien\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'ELOU\',\'Fabien\',\'Senior\', \'Gardien\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'TAQUET\',\'Sebastien\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'BEZARD\',\'Nicolas\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'FURON\',\'Sebastien\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'GAAGNEUR\',\'Maxime\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'GAAGNEUR\',\'Nicolas\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'GUEHL\',\'Cédric\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'CHENEVARIN\',\'Damien\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'MOUCHARD\',\'Florian\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'LEREFFAIT\',\'Fabrice\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'CHENEVARIN\',\'Sylvain\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'CHENEVARIN\',\'Sylvain\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'BOUHOURS\',\'Damien\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'DORE\',\'Matthias\',\'Senior\', \'Defenseur\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'FURON\',\'Morgan\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'LELOUP\',\'Mathieu\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'PETIT\',\'Geoffrey\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'LUST\',\'Simon\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'EYRIGNOUX\',\'Maxime\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'BERRANGER\',\'Charly\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'LECLERC\',\'Pierre\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'LECOQ\',\'Julien\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'DUPONT\',\'THIBAULT\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'ARNOULT\',\'Jonathane\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'PEUFFIER\',\'Baptiste\',\'Senior\', \'Milieu\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'CHENEVARIN\',\'Maxime\',\'Senior\', \'Ataquant\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'VASTINE\',\'Baptiste\',\'Senior\', \'Ataquant\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'PAILLARD\',\'Mathys\',\'Senior\', \'Ataquant\', 0, 0, 0, 0, 0, 0)');
        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, poste, buts_a, buts_b, buts_coupe, cartons_jaunes, cartons_rouges, buts) VALUES (\'PETRAULT\',\'Stan\',\'Senior\', \'Ataquant\', 0, 0, 0, 0, 0, 0)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
