<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170613162604 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE38729023AD67');
        $this->addSql('DROP INDEX IDX_B8EE38729023AD67 ON club');
        $this->addSql('ALTER TABLE club CHANGE tresoirier_id tresorier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38725014067D FOREIGN KEY (tresorier_id) REFERENCES dirigeant (id)');
        $this->addSql('CREATE INDEX IDX_B8EE38725014067D ON club (tresorier_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE38725014067D');
        $this->addSql('DROP INDEX IDX_B8EE38725014067D ON club');
        $this->addSql('ALTER TABLE club CHANGE tresorier_id tresoirier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38729023AD67 FOREIGN KEY (tresoirier_id) REFERENCES dirigeant (id)');
        $this->addSql('CREATE INDEX IDX_B8EE38729023AD67 ON club (tresoirier_id)');
    }
}
