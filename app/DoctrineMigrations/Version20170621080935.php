<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170621080935 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2001-2002\', \'Libre / Poussin (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2002-2003\', \'Libre / Poussin (2)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2003-2004\', \'Libre / Benjamin (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2004-2005\', \'Libre / Benjamin (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2005-2006\', \'Libre / 13 Ans (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2008-2009\', \'Libre / 15 Ans (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2009-2010\', \'Libre / U17 (- 17 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2010-2011\', \'Libre / U18 (- 18 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2011-2012\', \'Libre / U19 (- 19 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2012-2013\', \'Libre / Senior U20 (- 20 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2013-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (14,\'2016-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'1995-1996\', \'Libre / Benjamin (3)\', \'C.OM. CONTEVILLE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'1998-1999\', \'Libre / 15 Ans (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'1999-2000\', \'Libre / 15 Ans (2)\', \'CERC. A. PONT-AUDEMER\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'2000-2001\', \'Libre / 17 Ans (1)\', \'CERC. A. PONT-AUDEMER\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'2001-2002\', \'Libre / 17 Ans (2)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'2002-2003\', \'Libre / 18 Ans (3)\', \'F.C. LIEUREY EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'2003-2004\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'2004-2005\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'2005-2006\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'2009-2010\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (16,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (17,\'2015-2016\', \'Libre / Vétéran\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (17,\'2016-2017\', \'Libre / Vétéran\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2001-2002\', \'Libre / Débutant (3)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2002-2003\', \'Libre / Poussin (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2003-2004\', \'Libre / Poussin (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2004-2005\', \'Libre / Benjamin (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2005-2006\', \'Libre / Benjamin (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2008-2009\', \'Libre / 15 Ans (1)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2009-2010\', \'Libre / U16 (- 16 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2010-2011\', \'Libre / U17 (- 17 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2011-2012\', \'Libre / U18 (- 18 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2012-2013\', \'Libre / U19 (- 19 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2013-2014\', \'Libre / Senior U20 (- 20 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (18,\'2016-2017\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2000-2001\', \'Libre / Débutant (2)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2001-2002\', \'Libre / Débutant (3)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2002-2003\', \'Libre / Poussin (1)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2003-2004\', \'Libre / Poussin (2)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2004-2005\', \'Libre / Benjamin (1)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2005-2006\', \'Libre / Benjamin (2)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2006-2007\', \'Libre / 13 Ans (1)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2007-2008\', \'Libre / 13 Ans (2)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2008-2009\', \'Libre / 15 Ans (1)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2009-2010\', \'Libre / U16 (- 16 ans)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2009-2010\', \'Arbitre\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2010-2011\', \'Libre / U17 (- 17 ans)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2011-2012\', \'Libre / U18 (- 18 ans)\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2012-2013\', \'Libre / U19 (- 19 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2012-2013\', \'Dirigeant\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2013-2014\', \'Libre / Senior U20 (- 20 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2013-2014\', \'Dirigeant\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2014-2015\', \'Dirigeant\', \'A.S. EPAIGNES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (19,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2001-2002\', \'Libre / Poussin (1)\', \'A.S. ST PHILBERT DES CHAMPS\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2002-2003\', \'Libre / Poussin (2)\', \'A.S. ST PHILBERT DES CHAMPS\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2003-2004\', \'Libre / Benjamin (1)\', \'A.S. ST PHILBERT DES CHAMPS\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2004-2005\', \'Libre / Benjamin (2)\', \'A.S. ST PHILBERT DES CHAMPS\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2005-2006\', \'Libre / 13 Ans (1)\', \'A.S. ST PHILBERT DES CHAMPS\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2005-2006\', \'Libre / 13 Ans (1)\', \'U.S. PONT L EVEQUE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2006-2007\', \'Libre / 13 Ans (2)\', \'C.A. LISIEUX F. PAYS D AUGE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2007-2008\', \'Libre / 15 Ans (1)\', \'C.A. LISIEUX F. PAYS D AUGE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2008-2009\', \'Libre / 15 Ans (2)\', \'C.A. LISIEUX F. PAYS D AUGE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2008-2009\', \'Libre / 15 Ans (2)\', \'A.S. TROUVILLE DEAUVILLE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2009-2010\', \'Libre / U17 (- 17 ans)\', \'A.S. TROUVILLE DEAUVILLE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2010-2011\', \'Libre / U18 (- 18 ans)\', \'C.A. LISIEUX F. PAYS D AUGE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2011-2012\', \'Libre / U19 (- 19 ans)\', \'C.A. LISIEUX F. PAYS D AUGE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2012-2013\', \'Libre / Senior U20 (- 20 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2013-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (20,\'2016-2017\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'1995-1996\', \'Libre / Benjamin (3)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'1998-1999\', \'Libre / 15 Ans (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'1999-2000\', \'Libre / 15 Ans (2)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2000-2001\', \'Libre / 17 ans (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2001-2002\', \'Libre / 17 ans (2)\', \'SP.C. LE RHEU\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2002-2003\', \'Libre / 18 ans (3)\', \'SP.C. LE RHEU\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2005-2006\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2006-2007\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2007-2008\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2008-2009\', \'Libre / Senior\', \'USC MEZIDON FOOTBALL\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2009-2010\', \'Libre / Senior\', \'USC MEZIDON FOOTBALL\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2010-2011\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2011-2012\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2012-2013\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2013-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (21,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2004-2005\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2005-2006\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2006-2007\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2007-2008\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2008-2009\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2009-2010\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2010-2011\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2011-2012\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2012-2013\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2012-2013\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2013-2014\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2013-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2014-2015\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (23,\'2016-2017\', \'Libre / Veteran\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'1995-1996\', \'Libre / Benjamin (2)\', \'U.S. FLEURBAISIENNE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'1996-1997\', \'Libre / Benjamin (2)\', \'U.S. FLEURBAISIENNE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'1998-1999\', \'Libre / 13 Ans (2)\', \'A.S. RADINGHEM\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'1999-2000\', \'Libre / 15 Ans (1)\', \'A.S. RADINGHEM\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'2004-2005\', \'Foot Entreprise / Senior\', \'LILLE A.S. GAZIERS ET ELECTRICIE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'2005-2006\', \'Foot Entreprise / Senior\', \'LILLE A.S. GAZIERS ET ELECTRICIE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'2006-2007\', \'Foot Entreprise / Senior\', \'LILLE A.S. GAZIERS ET ELECTRICIE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'2007-2008\', \'Foot Entreprise / Senior\', \'LILLE A.S. GAZIERS ET ELECTRICIE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'2008-2009\', \'Foot Entreprise / Senior\', \'LILLE A.S. GAZIERS ET ELECTRICIE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'2009-2010\', \'Foot Entreprise / Senior\', \'LILLE A.S. GAZIERS ET ELECTRICIE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (26,\'2009-2010\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (27,\'1998-1999\', \'Libre / 15 Ans (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (27,\'1999-2000\', \'Libre / 15 Ans (2)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (27,\'2000-2001\', \'Libre / 17 Ans (1)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (27,\'2001-2002\', \'Libre / 17 Ans (2)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (27,\'2002-2003\', \'Libre / 18 Ans (3)\', \'A.S. CORMEILLES\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (27,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2006-2007\', \'Libre / Débutant (3)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2007-2008\', \'Libre / Poussin (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2008-2009\', \'Libre / Poussin (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2009-2010\', \'Libre / U11 (- 11 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2010-2011\', \'Libre / U12 (- 12 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2011-2012\', \'Libre / U13 (- 13 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2012-2013\', \'Libre / U14 (- 14 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2013-2014\', \'Libre / U15 (- 15 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2014-2015\', \'Libre / U16 (- 16 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2015-2016\', \'Libre / U17 (- 17 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (28,\'2016-2017\', \'Libre / U18 (- 18 ans)\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (29,\'2006-2007\', \'Libre / Débutant (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (29,\'2007-2007\', \'Libre / Débutant (3)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (29,\'2008-2009\', \'Libre / Poussin (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (29,\'2010-2011\', \'Libre / U11 (- 11 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (29,\'2012-2013\', \'Libre / U13 (- 13 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (29,\'2013-2014\', \'Libre / U14 (- 14 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (29,\'2014-2015\', \'Libre / U15 (- 15 ans))\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (29,\'2015-2016\', \'Libre / U16 (- 16 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (29,\'2016-2017\', \'Libre / U17 (- 17 ans)	\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (29,\'2016-2017\', \'Futsal / U17 (- 17 ans)\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2006-2007\', \'Libre / Débutant (3)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2007-2008\', \'Libre / Poussin (1)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2008-2009\', \'Libre / Poussin (2)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2009-2010\', \'Libre / U11 (- 11 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2010-2011\', \'Libre / U12 (- 12 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2011-2012\', \'Libre / U13 (- 13 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2012-2013\', \'Libre / U14 (- 14 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2013-2014\', \'Libre / U15 (- 15 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2014-2015\', \'Libre / U16 (- 16 ans)\', \'CERC. A. PONT-AUDEMER\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2014-2016\', \'Libre / U16 (- 16 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2015-2016\', \'Libre / U17 (- 17 ans)\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (31,\'2016-2017\', \'Libre / U18 (- 18 ans)\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2005-2006\', \'Libre / Senior\', \'AM. S. DU VIEVRE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2006-2007\', \'Libre / Senior\', \'AM. S. DU VIEVRE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2007-2008\', \'Libre / Senior\', \'AM. S. DU VIEVRE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2008-2009\', \'Libre / Senior\', \'AM. S. DU VIEVRE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2009-2010\', \'Libre / Senior\', \'AM. S. DU VIEVRE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2010-2011\', \'Libre / Senior\', \'AM. S. DU VIEVRE\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2011-2012\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2013-2014\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2014-2015\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2014-2015\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2015-2016\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2015-2016\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2016-2017\', \'Libre / Senior\', \'U.S. CORMEILLES - LIEUREY\')');
        $this->addSql('INSERT INTO carriere_joueur(joueur_id, saison, sous_categorie, club) VALUES (32,\'2016-2017\', \'Dirigeant\', \'U.S. CORMEILLES - LIEUREY\')');

        $this->addSql('INSERT INTO joueur(nom, prenom, categorie, buts_a, buts_b, buts_coupe, buts, cartons_jaunes, cartons_rouges, poste) VALUES (\'DELAMARE\',\'Médéric\', \'Senior\',0,0,0,0,0,0,\'Defenseur\')');







    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
