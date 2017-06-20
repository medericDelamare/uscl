<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170620143006 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2002-2003\', \'Libre / Débutant (3)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2003-2004\', \'Libre / Poussin (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2004-2005\', \'Libre / Poussin (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2005-2006\', \'Libre / Benjamin (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2006-2007\', \'Libre / Benjamin (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2007-2008\', \'Libre / 13 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2008-2009\', \'Libre / 13 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2009-2010\', \'Libre / U15 (- 15 ans))\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2010-2011\', \'Libre / U16 (- 16 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2011-2012\', \'Libre / U17 (- 17 ans\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2012-2013\', \'Libre / U18 (- 18 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2013-2014\', \'Libre / U19 (- 19 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2014-2015\', \'Libre / Senior U20 (- 20 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (1,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (2,\'2007-2008\', \'Libre / Senior\', \'F.C. INTERCOMMUNAL LE BEL AIR\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (2,\'2008-2009\', \'Libre / Senior\', \'F.C. INTERCOMMUNAL LE BEL AIR\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (2,\'2015-2016\', \'Libre / Senior\', \'CAMPIGNY FOOTBALL CLUB\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (2,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'1995-1996\', \'Libre / Poussin (3)\', \'A.C. BEUZEVILLE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2000-2001\', \'Libre / 15 Ans (1)\', \'A.C. BEUZEVILLE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2001-2002\', \'Libre / 15 Ans (2)\', \'A.C. BEUZEVILLE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2002-2003\', \'Libre / 18 Ans (1)\', \'A.C. BEUZEVILLE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2003-2004\', \'Libre / 18 Ans (2)\', \'A.C. BEUZEVILLE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2004-2005\', \'Libre / 18 Ans (3)\', \'A.C. BEUZEVILLE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2007-2008\', \'Libre / Senior\', \'F. C. DU BREUIL EN AUGE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2008-2009\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2010-2011\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2011-2012\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2011-2012\', \'Libre / Senior\', \'	AM.S. ST DESIR\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2014-2015\', \'Libre / Senior\', \'	U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2015-2016\', \'Libre / Senior\', \'	U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2015-2016\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2016-2017\', \'Libre / Senior\', \'	U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (3,\'2016-2017\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'1995-1996\', \'Libre / Benjamin (2)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'1998-1999\', \'Libre / 15 Ans (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'1999-2000\', \'Libre / 15 Ans (2)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2004-2005\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2006-2007\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2007-2008\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2009-2010\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2010-2011\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2011-2012\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2012-2013\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2013-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (4,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'1998-1999\', \'Libre / 13 Ans (1)\', \'	A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'1999-2000\', \'Libre / 13 Ans (2)\', \'	A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2000-2001\', \'Libre / 15 Ans (1)\', \'	A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2001-2002\', \'Libre / 15 Ans (2)\', \'	A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2001-2002\', \'Libre / 15 Ans (2)\', \'	A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2001-2002\', \'Libre / 18 Ans (1)\', \'	A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2002-2003\', \'Libre / 18 Ans (1)\', \'U.S. PONT L EVEQUE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2003-2004\', \'Libre / 18 Ans (2)\', \'A.S. ST PHILBERT DES CHAMPS\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2004-2005\', \'Libre / 18 Ans (3)\', \'U.S. PONT L EVEQUE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2005-2006\', \'Libre / Senior\', \'U.S. PONT L EVEQUE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2006-2007\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2007-2008\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2008-2009\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2009-2010\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2010-2011\', \'Libre / Senior\', \'U.S. PONT L EVEQUE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2011-2012\', \'Libre / Senior\', \'U.S. PONT L EVEQUE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2012-2013\', \'Libre / Senior\', \'U.S. PONT L EVEQUE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2013-2014\', \'Libre / Senior\', \'U.S. PONT L EVEQUE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2014-2015\', \'Libre / Senior\', \'U.S. PONT L EVEQUE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2015-2016\', \'Libre / Senior\', \'U.S. PONT L EVEQUE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (5,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2005-2006\', \'Libre / Débutant (3)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2006-2007\', \'Libre / Poussin (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2007-2008\', \'Libre / Poussin (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2009-2010\', \'Libre / U12 (- 12 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2010-2011\', \'Libre / U13 (- 13 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2011-2012\', \'Libre / U14 (- 14 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2012-2013\', \'Libre / U15 (- 15 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2013-2014\', \'Libre / U16 (- 16 ans))\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2014-2015\', \'Libre / U17 (- 17 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2015-2016\', \'Libre / U18 (- 18 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (6,\'2016-2017\', \'Libre / U19 (- 19 ans)\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'1998-1999\', \'Libre / Poussin (2)\', \'A.S CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'1999-2000\', \'Libre / Benjamin (1)\', \'A.S CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2000-2001\', \'Libre / Benjamin (2)\', \'A.S CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2001-2002\', \'Libre / 13 Ans (1)\', \'A.S CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2002-2003\', \'Libre / 13 Ans (2)\', \'A.S CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2003-2004\', \'Libre / 15 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2004-2005\', \'Libre / 15 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2005-2006\', \'Libre / 18 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2006-2007\', \'Libre / 18 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2007-2008\', \'Libre / 18 Ans (3)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2008-2009\', \'Libre / 15 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2009-2010\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2010-2011\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2011-2012\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2012-2013\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2013-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (7,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'1998-1999\', \'Libre / Débutant (2)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'1999-2000\', \'Libre / Poussin (1)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2000-2001\', \'Libre / Poussin (2)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2001-2002\', \'Libre / Benjamin (1)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2002-2003\', \'Libre / Benjamin (2)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2003-2004\', \'Libre / 13 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2004-2005\', \'Libre / 13 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2005-2006\', \'Libre / 15 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2006-2007\', \'Libre / 15 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2007-2008\', \'Libre / 18 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2008-2009\', \'Libre / 18 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2009-2010\', \'Libre / U19 (- 19 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2010-2011\', \'Libre / Senior U20 (- 20 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2011-2012\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2012-2013\', \'Libre / Senior\', \'CERC. A. PONT-AUDEMER\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2013-2014\', \'Libre / Senior\', \'CERC. A. PONT-AUDEMER\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2014-2015\', \'Libre / Senior\', \'CERC. A. PONT-AUDEMER\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2015-2016\', \'Libre / Senior\', \'CERC. A. PONT-AUDEMER\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (8,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'1995-1996\', \'Libre / Débutant (3)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'1998-1999\', \'Libre / Benjamin  (2)\',\'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'1999-2000\', \'Libre / 13 Ans (1)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2000-2001\', \'Libre / 13 Ans (2)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2001-2002\', \'Libre / 15 Ans (1)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2001-2002\', \'Libre / 15 Ans (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2002-2003\', \'Libre / 15 Ans (2)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2003-2004\', \'Libre / 18 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2004-2005\', \'Libre / 18 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2005-2006\', \'Libre / 18 Ans (3)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2006-2007\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2007-2008\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2008-2009\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2009-2010\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2010-2011\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2011-2012\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2012-2013\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (9,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'1995-1996\', \'Libre / Benjamin (3)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'1998-1999\', \'Libre / 15 Ans (2)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'1999-2000\', \'Libre / 17 Ans (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2000-2001\', \'Libre / 17 Ans (2)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2001-2002\', \'Libre / Senior\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2002-2003\', \'Libre / Senior\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2003-2004\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2004-2005\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2005-2006\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2006-2007\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2007-2008\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2008-2009\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2009-2010\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2010-2011\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2011-2012\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2012-2013\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2013-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (10,\'2016-2017\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'1998-1999\', \'Libre / Poussin (1)\', \'CERC. A. PONT-AUDEMER\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2001-2002\', \'Libre / Benjamin (2)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2002-2003\', \'Libre / 13 Ans (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2003-2004\', \'Libre / 13 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2004-2005\', \'Libre / 15 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2005-2006\', \'Libre / 15 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2006-2007\', \'Libre / 18 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2007-2008\', \'Libre / 18 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2008-2009\', \'Libre / 18 Ans (3)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2010-2011\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2011-2012\', \'Libre / Senior\', \'J. S. DE MONTICELLO\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2012-2013\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2013-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2010-2011\', \'Libre / U19 (- 19 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (11,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');



    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
