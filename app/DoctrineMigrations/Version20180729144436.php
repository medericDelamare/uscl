<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180729144436 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4426BE50');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC45014067D');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC45D5CC7C9');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4627D61FA');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC46CEA10FA');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC477FF9A96');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4792EF1DA');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC47E5FBF14');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC482A216C9');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC48B442907');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC49B5A351');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4A90F02B2');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4AE2F76DB');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4B40A33C7');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4C104E286');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4D3B14D68');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4D456779F');
        $this->addSql('ALTER TABLE carriere_joueur DROP FOREIGN KEY FK_44BC27BBA9E2D76C');
        $this->addSql('ALTER TABLE historique_stats DROP FOREIGN KEY FK_19C7BDD9A9E2D76C');
        $this->addSql('DROP TABLE bureau');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE dirigeant');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP INDEX IDX_44BC27BBA9E2D76C ON carriere_joueur');
        $this->addSql('ALTER TABLE carriere_joueur DROP joueur_id');
        $this->addSql('DROP INDEX IDX_19C7BDD9A9E2D76C ON historique_stats');
        $this->addSql('ALTER TABLE historique_stats DROP joueur_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bureau (id INT AUTO_INCREMENT NOT NULL, responsable_u11_id INT DEFAULT NULL, tresorier_id INT DEFAULT NULL, responsable_seniors_id INT DEFAULT NULL, responsable_u7_id INT DEFAULT NULL, vice_president2_id INT DEFAULT NULL, responsable_jeunes_id INT DEFAULT NULL, responsable_u18_id INT DEFAULT NULL, vice_president1_id INT DEFAULT NULL, responsable_u9_id INT DEFAULT NULL, responsable_u15_id INT DEFAULT NULL, responsable_futsal_id INT DEFAULT NULL, secretaire_id INT DEFAULT NULL, responsable_u13_id INT DEFAULT NULL, president_id INT DEFAULT NULL, responsable_a_id INT DEFAULT NULL, responsable_b_id INT DEFAULT NULL, vice_president3_id INT DEFAULT NULL, INDEX IDX_166FDEC4B40A33C7 (president_id), INDEX IDX_166FDEC47E5FBF14 (vice_president1_id), INDEX IDX_166FDEC46CEA10FA (vice_president2_id), INDEX IDX_166FDEC4D456779F (vice_president3_id), INDEX IDX_166FDEC4A90F02B2 (secretaire_id), INDEX IDX_166FDEC45014067D (tresorier_id), INDEX IDX_166FDEC477FF9A96 (responsable_jeunes_id), INDEX IDX_166FDEC45D5CC7C9 (responsable_seniors_id), INDEX IDX_166FDEC4C104E286 (responsable_a_id), INDEX IDX_166FDEC4D3B14D68 (responsable_b_id), INDEX IDX_166FDEC4792EF1DA (responsable_u18_id), INDEX IDX_166FDEC48B442907 (responsable_u15_id), INDEX IDX_166FDEC4AE2F76DB (responsable_u13_id), INDEX IDX_166FDEC4426BE50 (responsable_u11_id), INDEX IDX_166FDEC482A216C9 (responsable_u9_id), INDEX IDX_166FDEC4627D61FA (responsable_u7_id), INDEX IDX_166FDEC49B5A351 (responsable_futsal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_497DD6346C6E55B5 (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dirigeant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, nom VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, fixe VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, mobile VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, mail VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, photo VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, poste_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, buts_a INT DEFAULT NULL, buts_b INT DEFAULT NULL, buts_coupe INT DEFAULT NULL, buts INT DEFAULT NULL, cartons_jaunes INT DEFAULT NULL, cartons_rouges INT DEFAULT NULL, passes INT DEFAULT NULL, nb_matchs INT DEFAULT NULL, date_naissance DATE DEFAULT NULL, lieu_naissance VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, ville VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, numero INT DEFAULT NULL, mobile VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, numero_licence VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, mail VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, photo VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, categorie_id INT NOT NULL, INDEX IDX_FD71A9C5BCF5E72D (categorie_id), INDEX IDX_FD71A9C5A0905086 (poste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4426BE50 FOREIGN KEY (responsable_u11_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC45014067D FOREIGN KEY (tresorier_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC45D5CC7C9 FOREIGN KEY (responsable_seniors_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4627D61FA FOREIGN KEY (responsable_u7_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC46CEA10FA FOREIGN KEY (vice_president2_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC477FF9A96 FOREIGN KEY (responsable_jeunes_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4792EF1DA FOREIGN KEY (responsable_u18_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC47E5FBF14 FOREIGN KEY (vice_president1_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC482A216C9 FOREIGN KEY (responsable_u9_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC48B442907 FOREIGN KEY (responsable_u15_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC49B5A351 FOREIGN KEY (responsable_futsal_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4A90F02B2 FOREIGN KEY (secretaire_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4AE2F76DB FOREIGN KEY (responsable_u13_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4B40A33C7 FOREIGN KEY (president_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4C104E286 FOREIGN KEY (responsable_a_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4D3B14D68 FOREIGN KEY (responsable_b_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4D456779F FOREIGN KEY (vice_president3_id) REFERENCES dirigeant (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C5A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE carriere_joueur ADD joueur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carriere_joueur ADD CONSTRAINT FK_44BC27BBA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('CREATE INDEX IDX_44BC27BBA9E2D76C ON carriere_joueur (joueur_id)');
        $this->addSql('ALTER TABLE equipe CHANGE club_id club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historique_stats ADD joueur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historique_stats ADD CONSTRAINT FK_19C7BDD9A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('CREATE INDEX IDX_19C7BDD9A9E2D76C ON historique_stats (joueur_id)');
    }
}
