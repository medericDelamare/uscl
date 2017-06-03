<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170524203656 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE club ADD responsable_a_id INT DEFAULT NULL, ADD responsable_b_id INT DEFAULT NULL, ADD responsable_u18_id INT DEFAULT NULL, ADD responsable_u15_id INT DEFAULT NULL, ADD responsable_u13_id INT DEFAULT NULL, ADD responsable_u11_id INT DEFAULT NULL, ADD responsable_u9_id INT DEFAULT NULL, ADD responsable_u7_id INT DEFAULT NULL, ADD responsable_futsal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872C104E286 FOREIGN KEY (responsable_a_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872D3B14D68 FOREIGN KEY (responsable_b_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872792EF1DA FOREIGN KEY (responsable_u18_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38728B442907 FOREIGN KEY (responsable_u15_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872AE2F76DB FOREIGN KEY (responsable_u13_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872426BE50 FOREIGN KEY (responsable_u11_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE387282A216C9 FOREIGN KEY (responsable_u9_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872627D61FA FOREIGN KEY (responsable_u7_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38729B5A351 FOREIGN KEY (responsable_futsal_id) REFERENCES dirigeant (id)');
        $this->addSql('CREATE INDEX IDX_B8EE3872C104E286 ON club (responsable_a_id)');
        $this->addSql('CREATE INDEX IDX_B8EE3872D3B14D68 ON club (responsable_b_id)');
        $this->addSql('CREATE INDEX IDX_B8EE3872792EF1DA ON club (responsable_u18_id)');
        $this->addSql('CREATE INDEX IDX_B8EE38728B442907 ON club (responsable_u15_id)');
        $this->addSql('CREATE INDEX IDX_B8EE3872AE2F76DB ON club (responsable_u13_id)');
        $this->addSql('CREATE INDEX IDX_B8EE3872426BE50 ON club (responsable_u11_id)');
        $this->addSql('CREATE INDEX IDX_B8EE387282A216C9 ON club (responsable_u9_id)');
        $this->addSql('CREATE INDEX IDX_B8EE3872627D61FA ON club (responsable_u7_id)');
        $this->addSql('CREATE INDEX IDX_B8EE38729B5A351 ON club (responsable_futsal_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE3872C104E286');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE3872D3B14D68');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE3872792EF1DA');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE38728B442907');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE3872AE2F76DB');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE3872426BE50');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE387282A216C9');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE3872627D61FA');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE38729B5A351');
        $this->addSql('DROP INDEX IDX_B8EE3872C104E286 ON club');
        $this->addSql('DROP INDEX IDX_B8EE3872D3B14D68 ON club');
        $this->addSql('DROP INDEX IDX_B8EE3872792EF1DA ON club');
        $this->addSql('DROP INDEX IDX_B8EE38728B442907 ON club');
        $this->addSql('DROP INDEX IDX_B8EE3872AE2F76DB ON club');
        $this->addSql('DROP INDEX IDX_B8EE3872426BE50 ON club');
        $this->addSql('DROP INDEX IDX_B8EE387282A216C9 ON club');
        $this->addSql('DROP INDEX IDX_B8EE3872627D61FA ON club');
        $this->addSql('DROP INDEX IDX_B8EE38729B5A351 ON club');
        $this->addSql('ALTER TABLE club DROP responsable_a_id, DROP responsable_b_id, DROP responsable_u18_id, DROP responsable_u15_id, DROP responsable_u13_id, DROP responsable_u11_id, DROP responsable_u9_id, DROP responsable_u7_id, DROP responsable_futsal_id');
    }
}
