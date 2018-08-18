<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180706122213 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carriere_joueur ADD licencie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carriere_joueur ADD CONSTRAINT FK_44BC27BBB56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id)');
        $this->addSql('CREATE INDEX IDX_44BC27BBB56DCD74 ON carriere_joueur (licencie_id)');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carriere_joueur DROP FOREIGN KEY FK_44BC27BBB56DCD74');
        $this->addSql('DROP INDEX IDX_44BC27BBB56DCD74 ON carriere_joueur');
        $this->addSql('ALTER TABLE carriere_joueur DROP licencie_id');
    }
}
