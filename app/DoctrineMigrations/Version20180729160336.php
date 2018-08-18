<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180729160336 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE but (id INT AUTO_INCREMENT NOT NULL, stats_rencontres_id INT NOT NULL, buteur_id INT NOT NULL, passeur_id INT DEFAULT NULL, INDEX IDX_B132FECAA1FF9E2A (stats_rencontres_id), INDEX IDX_B132FECA59365323 (buteur_id), INDEX IDX_B132FECA90B9A1AF (passeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE but ADD CONSTRAINT FK_B132FECAA1FF9E2A FOREIGN KEY (stats_rencontres_id) REFERENCES stats_rencontre (id)');
        $this->addSql('ALTER TABLE but ADD CONSTRAINT FK_B132FECA59365323 FOREIGN KEY (buteur_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE but ADD CONSTRAINT FK_B132FECA90B9A1AF FOREIGN KEY (passeur_id) REFERENCES licencie (id)');
        $this->addSql('DROP TABLE buteur');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE buteur (id INT AUTO_INCREMENT NOT NULL, buteur_id INT NOT NULL, passeur_id INT DEFAULT NULL, stats_rencontres_id INT NOT NULL, INDEX IDX_83CEC3EEA1FF9E2A (stats_rencontres_id), INDEX IDX_83CEC3EE59365323 (buteur_id), INDEX IDX_83CEC3EE90B9A1AF (passeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE buteur ADD CONSTRAINT FK_83CEC3EE59365323 FOREIGN KEY (buteur_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE buteur ADD CONSTRAINT FK_83CEC3EE90B9A1AF FOREIGN KEY (passeur_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE buteur ADD CONSTRAINT FK_83CEC3EEA1FF9E2A FOREIGN KEY (stats_rencontres_id) REFERENCES stats_rencontre (id)');
        $this->addSql('DROP TABLE but');
    }
}
