<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170720150123 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/nicolas-chenevarin.jpg\' where id = 1');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/ludovic-desmarais.jpg\' where id = 2');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/alexandre-colette.jpg\' where id = 3');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/fabien-elou.jpg\' where id = 4');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/sebastien-taquet.jpg\' where id = 5');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/nicolas-bezard.jpg\' where id = 6');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/sebastien-furon.jpg\' where id = 7');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/maxime-gagneur.jpg\' where id = 8');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/nicolas-gagneur.jpg\' where id = 9');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/cedric-guehl.jpg\' where id = 10');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/damien-chenevarin.jpg\' where id = 11');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/florian-mouchard.jpg\' where id = 12');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/fabrice-lereffait.jpg\' where id = 13');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/sylvain-chenevarin.jpg\' where id = 14');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/damien-bouhours.jpg\' where id = 16');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/matthias-dore.jpg\' where id = 17');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/morgan-furon.jpg\' where id = 18');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/mathieu-leloup.jpg\' where id = 19');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/geoffrey-petit.jpg\' where id = 20');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/simon-lust.jpg\' where id = 21');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/maxime-eyrignoux.jpg\' where id = 22');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/charly-beranger.jpg\' where id = 23');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/julein-lecoq.jpg\' where id = 25');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/thibault-dupont.jpg\' where id = 26');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/jonathane-arnout.jpg\' where id = 27');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/baptiste-peuffier.jpg\' where id = 28');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/maxime-chenevarin.jpg\' where id = 29');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/mathys-paillard.jpg\' where id = 31');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/stanislas-petrault.jpg\' where id = 32');
        $this->addSql('UPDATE joueur set joueur.photo = \'pictures/profiles/mederic-delamare.jpg\' where id = 33');


        $this->addSql('UPDATE joueur set joueur.nom = \'BERANGER\' where id = 23');
        $this->addSql('UPDATE joueur set joueur.prenom = \'Stanislas\' where id = 32');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
