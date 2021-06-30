<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210630095854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, confirm_mdp VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, birth DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte_categorie (compte_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_8AF3E806F2C56620 (compte_id), INDEX IDX_8AF3E806BCF5E72D (categorie_id), PRIMARY KEY(compte_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte_genre (compte_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_7AB1D493F2C56620 (compte_id), INDEX IDX_7AB1D4934296D31F (genre_id), PRIMARY KEY(compte_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte_categorie ADD CONSTRAINT FK_8AF3E806F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte_categorie ADD CONSTRAINT FK_8AF3E806BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte_genre ADD CONSTRAINT FK_7AB1D493F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte_genre ADD CONSTRAINT FK_7AB1D4934296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte_categorie DROP FOREIGN KEY FK_8AF3E806F2C56620');
        $this->addSql('ALTER TABLE compte_genre DROP FOREIGN KEY FK_7AB1D493F2C56620');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE compte_categorie');
        $this->addSql('DROP TABLE compte_genre');
    }
}
