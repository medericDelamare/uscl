<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170520093630 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, president_id INT DEFAULT NULL, vice_president1_id INT DEFAULT NULL, vice_president2_id INT DEFAULT NULL, vice_president3_id INT DEFAULT NULL, secretaire_id INT DEFAULT NULL, tresoirier_id INT DEFAULT NULL, responsable_jeunes_id INT DEFAULT NULL, responsable_seniors_id INT DEFAULT NULL, INDEX IDX_B8EE3872B40A33C7 (president_id), INDEX IDX_B8EE38727E5FBF14 (vice_president1_id), INDEX IDX_B8EE38726CEA10FA (vice_president2_id), INDEX IDX_B8EE3872D456779F (vice_president3_id), INDEX IDX_B8EE3872A90F02B2 (secretaire_id), INDEX IDX_B8EE38729023AD67 (tresoirier_id), INDEX IDX_B8EE387277FF9A96 (responsable_jeunes_id), INDEX IDX_B8EE38725D5CC7C9 (responsable_seniors_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872B40A33C7 FOREIGN KEY (president_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38727E5FBF14 FOREIGN KEY (vice_president1_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38726CEA10FA FOREIGN KEY (vice_president2_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872D456779F FOREIGN KEY (vice_president3_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872A90F02B2 FOREIGN KEY (secretaire_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38729023AD67 FOREIGN KEY (tresoirier_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE387277FF9A96 FOREIGN KEY (responsable_jeunes_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38725D5CC7C9 FOREIGN KEY (responsable_seniors_id) REFERENCES dirigeant (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE club');
    }
}
