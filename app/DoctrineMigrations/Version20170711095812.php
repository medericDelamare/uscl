<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170711095812 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `dirigeant` CHANGE `fixe` `fixe` VARCHAR(255) NULL');
        $this->addSql('ALTER TABLE `dirigeant` CHANGE `mobile` `mobile` VARCHAR(255) NULL');
        $this->addSql('ALTER TABLE `dirigeant` CHANGE `mail` `mail` VARCHAR(255) NULL');
        $this->addSql('ALTER TABLE `dirigeant` CHANGE `photo` `photo` VARCHAR(255) NULL');

        $this->addSql('INSERT INTO dirigeant(prenom, nom, fixe, mobile, mail, photo) VALUES(\'Yvon\', \'Lecachey\', NULL,NULL,NULL,NULL)');
        $this->addSql('INSERT INTO dirigeant(prenom, nom, fixe, mobile, mail, photo) VALUES(\'Geoffrey\', \'Petit\', NULL, \'06.59.40.95.18\', NULL, NULL)');
        $this->addSql('INSERT INTO dirigeant(prenom, nom, fixe, mobile, mail, photo) VALUES(\'Benoît\', \'Jeanne\', NULL, \'06.31.00.20.35\', NULL, NULL)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
