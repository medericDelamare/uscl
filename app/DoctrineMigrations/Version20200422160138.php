<?php declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200422160138 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('UPDATE licencie SET licencie.poste_id = (SELECT poste_id FROM stats_joueur where stats_joueur.id = licencie.stats_id)');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B75561270AA3482');
        $this->addSql('DROP TABLE stats_joueur');
        $this->addSql('DROP INDEX UNIQ_3B75561270AA3482 ON licencie');
        $this->addSql('ALTER TABLE licencie DROP stats_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stats_joueur (id INT AUTO_INCREMENT NOT NULL, poste_id INT DEFAULT NULL, buts_a INT DEFAULT NULL, buts_b INT DEFAULT NULL, buts_coupe INT DEFAULT NULL, buts INT DEFAULT NULL, cartons_jaunes INT DEFAULT NULL, cartons_rouges INT DEFAULT NULL, passes INT DEFAULT NULL, nb_matchs INT DEFAULT NULL, INDEX IDX_4E614EC6A0905086 (poste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE stats_joueur ADD CONSTRAINT FK_4E614EC6A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE licencie ADD stats_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B75561270AA3482 FOREIGN KEY (stats_id) REFERENCES stats_joueur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3B75561270AA3482 ON licencie (stats_id)');
    }
}
