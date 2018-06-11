<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180611194933 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'LE BEL AIR FC 2\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'BEUZEVILLE AC\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'CORM.LIEUREY US\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'BEAUMONT 2\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'THIBERVILLE 2\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'CONTEVILLE CO\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'BRIONNE FC\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'EPEGARD NEUBOURG FC 2\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'VAL DE RISLE FC 2\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'ST GERMAIN CA\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'MANNEVILLE AS\', \'test\', \'seniorA\')');
        $this->addSql('INSERT INTO equipe(nom_parse, division, categorie) VALUES (\'PLASNES FC\', \'test\', \'seniorA\')');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
