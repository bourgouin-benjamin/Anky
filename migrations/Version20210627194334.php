<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210627194334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE series (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, genre_id INT NOT NULL, nom VARCHAR(255) NOT NULL, keywords LONGTEXT DEFAULT NULL, INDEX IDX_3A10012DBCF5E72D (categorie_id), INDEX IDX_3A10012D4296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE series ADD CONSTRAINT FK_3A10012DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE series ADD CONSTRAINT FK_3A10012D4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE series');
    }
}
