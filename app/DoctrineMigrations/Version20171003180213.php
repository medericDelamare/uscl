<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171003180213 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'QUESNEY\', \'Alexis\', \'U18\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'TOPSENT\', \'Pierre\', \'U18\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'TUVACHE\', \'Antoine\', \'U18\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'ALPINI\', \'Fabio\', \'U18\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'AULNEY\', \'Clément\', \'U18\', \'Attaquant\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'DUVAL\', \'Lois\', \'U18\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'FRUCTOSO\', \'Titouan\', \'U18\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LAMY\', \'Robin\', \'U18\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LEROUGE\', \'Paul\', \'U18\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LESAULNIER\', \'David\', \'U18\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'POTTIER\', \'Clément\', \'U18\', \'Gardien\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'TRANQUILLE\', \'Léo\', \'U18\', \'Attaquant\')');

        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'AUBE\', \'Tom\', \'U15\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'CARPON\', \'Mathys\', \'U15\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LOZAY\', \'Adrien\', \'U15\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'TOUFLET\', \'Arthur\', \'U15\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LABBE\', \'Teo\', \'U15\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'ERNULT\', \'William\', \'U15\', \'Gardien\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'PLATEL\', \'Julien\', \'U15\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'MOUTAUD\', \'Pierre\', \'U15\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'MAUGARD\', \'Louis\', \'U15\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'PAINCHAULT\', \'Thomas\', \'U15\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'RATOUIT\', \'Antoine\', \'U15\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LEBELLOIS\', \'Julien\', \'U15\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'JONOT\', \'Charly\', \'U15\', \'Attaquant\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'JULIEN\', \'Nathan\', \'U15\', \'Attaquant\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'MORLET\', \'Theo\', \'U15\', \'Attaquant\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LEVESQUE\', \'Lucas\', \'U15\', \'Milieu\')');

        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'MICHEL\', \'Joris\', \'U13\', \'Gardien\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'COLETTE\', \'Logan\', \'U13\', \'Gardien\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'AUBE\', \'Melvyn\', \'U13\', \'Attaquant\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'BERTHOU DEBRAND\', \'Owen\', \'U13\', \'Attaquant\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'DERIOT\', \'Enzo\', \'U13\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'DORE\', \'Louis\', \'U13\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'DUEZ\', \'Lucas\', \'U13\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'FEUGERE\', \'Mathieu\', \'U13\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'GIMER\', \'Noa\', \'U13\', \'Attaquant\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'HEUZE\', \'Matheo\', \'U13\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LEBOURG DELAUNEY\', \'Guillaume\', \'U13\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LEMOINE\', \'Thomas\', \'U13\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LEPELLISSIER\', \'Mario\', \'U13\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LESIEUR\', \'Mathieu\', \'U13\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'LINCK\', \'Lenny\', \'U13\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'MEZERAIS\', \'Matthis\', \'U13\', \'Attaquant\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'PESNEL\', \'Timothe\', \'U13\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'PIMONT\', \'Mathis\', \'U13\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'QUESNEY\', \'Nathan\', \'U13\', \'Milieu\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'ROMAIN\', \'Mathys\', \'U13\', \'Defenseur\')');
        $this->addSql('INSERT INTO joueur(nom,prenom,categorie, poste) VALUES (\'TILLAUX\', \'Nathan\', \'U13\', \'Defenseur\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
