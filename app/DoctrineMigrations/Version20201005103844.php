<?php declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201005103844 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DELETE FROM symfony where version like \'20180607161656\'');
        $this->addSql('UPDATE club set club.scorenco_id = \'540f0aebb1752543a745dc55\' WHERE club.nom like \'PONT AUTHOU FOOTBALL\'  ');
        $this->addSql('UPDATE club set club.scorenco_id = \'5b6472f6cf4e61e60ae4dc01\' WHERE club.nom like \'FUSION CHARENTONNE SAINT AUBIN\'  ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
