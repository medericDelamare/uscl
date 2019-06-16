<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190616203335 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nombre_licencies_par_annee (id INT AUTO_INCREMENT NOT NULL, annee_depart INT NOT NULL, annee_fin INT NOT NULL, nombre_licencies INT NOT NULL, UNIQUE INDEX UNIQ_21227906F4308634 (annee_depart), UNIQUE INDEX UNIQ_212279067B13567B (annee_fin), UNIQUE INDEX UNIQ_21227906192E010F (nombre_licencies), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');


        $this->addSql('INSERT INTO nombre_licencies_par_annee(id, annee_depart,annee_fin, nombre_licencies) VALUES (1,2010,2011,143)');
        $this->addSql('INSERT INTO nombre_licencies_par_annee(id, annee_depart,annee_fin, nombre_licencies) VALUES (2,2011,2012,131)');
        $this->addSql('INSERT INTO nombre_licencies_par_annee(id, annee_depart,annee_fin, nombre_licencies) VALUES (3,2012,2013,149)');
        $this->addSql('INSERT INTO nombre_licencies_par_annee(id, annee_depart,annee_fin, nombre_licencies) VALUES (4,2013,2014,157)');
        $this->addSql('INSERT INTO nombre_licencies_par_annee(id, annee_depart,annee_fin, nombre_licencies) VALUES (5,2014,2015,191)');
        $this->addSql('INSERT INTO nombre_licencies_par_annee(id, annee_depart,annee_fin, nombre_licencies) VALUES (6,2015,2016,208)');
        $this->addSql('INSERT INTO nombre_licencies_par_annee(id, annee_depart,annee_fin, nombre_licencies) VALUES (7,2016,2017,231)');
        $this->addSql('INSERT INTO nombre_licencies_par_annee(id, annee_depart,annee_fin, nombre_licencies) VALUES (8,2017,2018,225)');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE nombre_licencies_par_annee');
    }
}
