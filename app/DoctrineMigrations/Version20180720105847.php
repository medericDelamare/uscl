<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180720105847 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bureau (id INT AUTO_INCREMENT NOT NULL, president_id INT DEFAULT NULL, vice_president1_id INT DEFAULT NULL, vice_president2_id INT DEFAULT NULL, vice_president3_id INT DEFAULT NULL, secretaire_id INT DEFAULT NULL, tresorier_id INT DEFAULT NULL, responsable_jeunes_id INT DEFAULT NULL, responsable_seniors_id INT DEFAULT NULL, responsable_a_id INT DEFAULT NULL, responsable_b_id INT DEFAULT NULL, responsable_u18_id INT DEFAULT NULL, responsable_u15_id INT DEFAULT NULL, responsable_u13_id INT DEFAULT NULL, responsable_u11_id INT DEFAULT NULL, responsable_u9_id INT DEFAULT NULL, responsable_u7_id INT DEFAULT NULL, responsable_futsal_id INT DEFAULT NULL, INDEX IDX_166FDEC4B40A33C7 (president_id), INDEX IDX_166FDEC47E5FBF14 (vice_president1_id), INDEX IDX_166FDEC46CEA10FA (vice_president2_id), INDEX IDX_166FDEC4D456779F (vice_president3_id), INDEX IDX_166FDEC4A90F02B2 (secretaire_id), INDEX IDX_166FDEC45014067D (tresorier_id), INDEX IDX_166FDEC477FF9A96 (responsable_jeunes_id), INDEX IDX_166FDEC45D5CC7C9 (responsable_seniors_id), INDEX IDX_166FDEC4C104E286 (responsable_a_id), INDEX IDX_166FDEC4D3B14D68 (responsable_b_id), INDEX IDX_166FDEC4792EF1DA (responsable_u18_id), INDEX IDX_166FDEC48B442907 (responsable_u15_id), INDEX IDX_166FDEC4AE2F76DB (responsable_u13_id), INDEX IDX_166FDEC4426BE50 (responsable_u11_id), INDEX IDX_166FDEC482A216C9 (responsable_u9_id), INDEX IDX_166FDEC4627D61FA (responsable_u7_id), INDEX IDX_166FDEC49B5A351 (responsable_futsal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4B40A33C7 FOREIGN KEY (president_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC47E5FBF14 FOREIGN KEY (vice_president1_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC46CEA10FA FOREIGN KEY (vice_president2_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4D456779F FOREIGN KEY (vice_president3_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4A90F02B2 FOREIGN KEY (secretaire_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC45014067D FOREIGN KEY (tresorier_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC477FF9A96 FOREIGN KEY (responsable_jeunes_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC45D5CC7C9 FOREIGN KEY (responsable_seniors_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4C104E286 FOREIGN KEY (responsable_a_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4D3B14D68 FOREIGN KEY (responsable_b_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4792EF1DA FOREIGN KEY (responsable_u18_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC48B442907 FOREIGN KEY (responsable_u15_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4AE2F76DB FOREIGN KEY (responsable_u13_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4426BE50 FOREIGN KEY (responsable_u11_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC482A216C9 FOREIGN KEY (responsable_u9_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4627D61FA FOREIGN KEY (responsable_u7_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC49B5A351 FOREIGN KEY (responsable_futsal_id) REFERENCES dirigeant (id)');
        $this->addSql('DROP TABLE club');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, responsable_u11_id INT DEFAULT NULL, tresorier_id INT DEFAULT NULL, responsable_seniors_id INT DEFAULT NULL, responsable_u7_id INT DEFAULT NULL, vice_president2_id INT DEFAULT NULL, responsable_jeunes_id INT DEFAULT NULL, responsable_u18_id INT DEFAULT NULL, vice_president1_id INT DEFAULT NULL, responsable_u9_id INT DEFAULT NULL, responsable_u15_id INT DEFAULT NULL, responsable_futsal_id INT DEFAULT NULL, secretaire_id INT DEFAULT NULL, responsable_u13_id INT DEFAULT NULL, president_id INT DEFAULT NULL, responsable_a_id INT DEFAULT NULL, responsable_b_id INT DEFAULT NULL, vice_president3_id INT DEFAULT NULL, INDEX IDX_B8EE3872B40A33C7 (president_id), INDEX IDX_B8EE38727E5FBF14 (vice_president1_id), INDEX IDX_B8EE38726CEA10FA (vice_president2_id), INDEX IDX_B8EE3872D456779F (vice_president3_id), INDEX IDX_B8EE3872A90F02B2 (secretaire_id), INDEX IDX_B8EE387277FF9A96 (responsable_jeunes_id), INDEX IDX_B8EE38725D5CC7C9 (responsable_seniors_id), INDEX IDX_B8EE3872C104E286 (responsable_a_id), INDEX IDX_B8EE3872D3B14D68 (responsable_b_id), INDEX IDX_B8EE3872792EF1DA (responsable_u18_id), INDEX IDX_B8EE38728B442907 (responsable_u15_id), INDEX IDX_B8EE3872AE2F76DB (responsable_u13_id), INDEX IDX_B8EE3872426BE50 (responsable_u11_id), INDEX IDX_B8EE387282A216C9 (responsable_u9_id), INDEX IDX_B8EE3872627D61FA (responsable_u7_id), INDEX IDX_B8EE38729B5A351 (responsable_futsal_id), INDEX IDX_B8EE38725014067D (tresorier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872426BE50 FOREIGN KEY (responsable_u11_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38725014067D FOREIGN KEY (tresorier_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38725D5CC7C9 FOREIGN KEY (responsable_seniors_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872627D61FA FOREIGN KEY (responsable_u7_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38726CEA10FA FOREIGN KEY (vice_president2_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE387277FF9A96 FOREIGN KEY (responsable_jeunes_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872792EF1DA FOREIGN KEY (responsable_u18_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38727E5FBF14 FOREIGN KEY (vice_president1_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE387282A216C9 FOREIGN KEY (responsable_u9_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38728B442907 FOREIGN KEY (responsable_u15_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38729B5A351 FOREIGN KEY (responsable_futsal_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872A90F02B2 FOREIGN KEY (secretaire_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872AE2F76DB FOREIGN KEY (responsable_u13_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872B40A33C7 FOREIGN KEY (president_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872C104E286 FOREIGN KEY (responsable_a_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872D3B14D68 FOREIGN KEY (responsable_b_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872D456779F FOREIGN KEY (vice_president3_id) REFERENCES dirigeant (id)');
        $this->addSql('DROP TABLE bureau');
        $this->addSql('ALTER TABLE dirigeant CHANGE fixe fixe VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE mobile mobile VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE mail mail VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE photo photo VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5BCF5E72D');
        $this->addSql('ALTER TABLE joueur CHANGE numero_licence numero_licence VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
