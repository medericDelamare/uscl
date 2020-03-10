<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20200310221242 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4D06C909F');
        $this->addSql('DROP INDEX IDX_166FDEC4D06C909F ON bureau');
        $this->addSql('ALTER TABLE bureau CHANGE responsabe_u15_id responsable_u15_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC48B442907 FOREIGN KEY (responsable_u15_id) REFERENCES licencie (id)');
        $this->addSql('CREATE INDEX IDX_166FDEC48B442907 ON bureau (responsable_u15_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC48B442907');
        $this->addSql('DROP INDEX IDX_166FDEC48B442907 ON bureau');
        $this->addSql('ALTER TABLE bureau CHANGE responsable_u15_id responsabe_u15_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4D06C909F FOREIGN KEY (responsabe_u15_id) REFERENCES licencie (id)');
        $this->addSql('CREATE INDEX IDX_166FDEC4D06C909F ON bureau (responsabe_u15_id)');
    }
}
