<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180725203949 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE buteur (id INT AUTO_INCREMENT NOT NULL, stats_rencontres_id INT NOT NULL, buteur_id INT NOT NULL, passeur_id INT DEFAULT NULL, INDEX IDX_83CEC3EEA1FF9E2A (stats_rencontres_id), INDEX IDX_83CEC3EE59365323 (buteur_id), INDEX IDX_83CEC3EE90B9A1AF (passeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats_rencontre (id INT AUTO_INCREMENT NOT NULL, rencontre_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_48C2FE486CFC0818 (rencontre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueurs_rencontres (stats_rencontre_id INT NOT NULL, licencie_id INT NOT NULL, INDEX IDX_D93B68A2E79D76AF (stats_rencontre_id), INDEX IDX_D93B68A2B56DCD74 (licencie_id), PRIMARY KEY(stats_rencontre_id, licencie_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueurs_cartons_jaunes (stats_rencontre_id INT NOT NULL, licencie_id INT NOT NULL, INDEX IDX_7673F969E79D76AF (stats_rencontre_id), INDEX IDX_7673F969B56DCD74 (licencie_id), PRIMARY KEY(stats_rencontre_id, licencie_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueurs_cartons_rouges (stats_rencontre_id INT NOT NULL, licencie_id INT NOT NULL, INDEX IDX_2917FC71E79D76AF (stats_rencontre_id), INDEX IDX_2917FC71B56DCD74 (licencie_id), PRIMARY KEY(stats_rencontre_id, licencie_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE buteur ADD CONSTRAINT FK_83CEC3EEA1FF9E2A FOREIGN KEY (stats_rencontres_id) REFERENCES stats_rencontre (id)');
        $this->addSql('ALTER TABLE buteur ADD CONSTRAINT FK_83CEC3EE59365323 FOREIGN KEY (buteur_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE buteur ADD CONSTRAINT FK_83CEC3EE90B9A1AF FOREIGN KEY (passeur_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE stats_rencontre ADD CONSTRAINT FK_48C2FE486CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id)');
        $this->addSql('ALTER TABLE joueurs_rencontres ADD CONSTRAINT FK_D93B68A2E79D76AF FOREIGN KEY (stats_rencontre_id) REFERENCES stats_rencontre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueurs_rencontres ADD CONSTRAINT FK_D93B68A2B56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueurs_cartons_jaunes ADD CONSTRAINT FK_7673F969E79D76AF FOREIGN KEY (stats_rencontre_id) REFERENCES stats_rencontre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueurs_cartons_jaunes ADD CONSTRAINT FK_7673F969B56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueurs_cartons_rouges ADD CONSTRAINT FK_2917FC71E79D76AF FOREIGN KEY (stats_rencontre_id) REFERENCES stats_rencontre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueurs_cartons_rouges ADD CONSTRAINT FK_2917FC71B56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE buteur DROP FOREIGN KEY FK_83CEC3EEA1FF9E2A');
        $this->addSql('ALTER TABLE joueurs_rencontres DROP FOREIGN KEY FK_D93B68A2E79D76AF');
        $this->addSql('ALTER TABLE joueurs_cartons_jaunes DROP FOREIGN KEY FK_7673F969E79D76AF');
        $this->addSql('ALTER TABLE joueurs_cartons_rouges DROP FOREIGN KEY FK_2917FC71E79D76AF');
        $this->addSql('DROP TABLE buteur');
        $this->addSql('DROP TABLE stats_rencontre');
        $this->addSql('DROP TABLE joueurs_rencontres');
        $this->addSql('DROP TABLE joueurs_cartons_jaunes');
        $this->addSql('DROP TABLE joueurs_cartons_rouges');
        $this->addSql('ALTER TABLE dirigeant CHANGE fixe fixe VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE mobile mobile VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE mail mail VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE photo photo VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE equipe CHANGE club_id club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5BCF5E72D');
        $this->addSql('ALTER TABLE joueur CHANGE numero_licence numero_licence VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
