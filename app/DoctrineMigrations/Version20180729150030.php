<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180729150030 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bureau (id INT AUTO_INCREMENT NOT NULL, president_id INT DEFAULT NULL, vice_president_id INT DEFAULT NULL, vice_president2_id INT DEFAULT NULL, vice_president3_id INT DEFAULT NULL, secretaire_id INT DEFAULT NULL, tresorier_id INT DEFAULT NULL, responsable_pole_jeunes_id INT DEFAULT NULL, responsable_pole_seniors_id INT DEFAULT NULL, responsable_senior_a_id INT DEFAULT NULL, responsable_senior_b_id INT DEFAULT NULL, responsable_u18_id INT DEFAULT NULL, responsabe_u15_id INT DEFAULT NULL, responsable_u13_id INT DEFAULT NULL, responsable_u11_id INT DEFAULT NULL, responsable_u9_id INT DEFAULT NULL, responsable_u7_id INT DEFAULT NULL, INDEX IDX_166FDEC4B40A33C7 (president_id), INDEX IDX_166FDEC4544DD2AD (vice_president_id), INDEX IDX_166FDEC46CEA10FA (vice_president2_id), INDEX IDX_166FDEC4D456779F (vice_president3_id), INDEX IDX_166FDEC4A90F02B2 (secretaire_id), INDEX IDX_166FDEC45014067D (tresorier_id), INDEX IDX_166FDEC47337B896 (responsable_pole_jeunes_id), INDEX IDX_166FDEC45D580FEB (responsable_pole_seniors_id), INDEX IDX_166FDEC4FBB5C6E7 (responsable_senior_a_id), INDEX IDX_166FDEC4E9006909 (responsable_senior_b_id), INDEX IDX_166FDEC4792EF1DA (responsable_u18_id), INDEX IDX_166FDEC4D06C909F (responsabe_u15_id), INDEX IDX_166FDEC4AE2F76DB (responsable_u13_id), INDEX IDX_166FDEC4426BE50 (responsable_u11_id), INDEX IDX_166FDEC482A216C9 (responsable_u9_id), INDEX IDX_166FDEC4627D61FA (responsable_u7_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4B40A33C7 FOREIGN KEY (president_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4544DD2AD FOREIGN KEY (vice_president_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC46CEA10FA FOREIGN KEY (vice_president2_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4D456779F FOREIGN KEY (vice_president3_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4A90F02B2 FOREIGN KEY (secretaire_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC45014067D FOREIGN KEY (tresorier_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC47337B896 FOREIGN KEY (responsable_pole_jeunes_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC45D580FEB FOREIGN KEY (responsable_pole_seniors_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4FBB5C6E7 FOREIGN KEY (responsable_senior_a_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4E9006909 FOREIGN KEY (responsable_senior_b_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4792EF1DA FOREIGN KEY (responsable_u18_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4D06C909F FOREIGN KEY (responsabe_u15_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4AE2F76DB FOREIGN KEY (responsable_u13_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4426BE50 FOREIGN KEY (responsable_u11_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC482A216C9 FOREIGN KEY (responsable_u9_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4627D61FA FOREIGN KEY (responsable_u7_id) REFERENCES licencie (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE bureau');
    }
}
