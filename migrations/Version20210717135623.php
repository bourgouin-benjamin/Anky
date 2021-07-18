<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210717135623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_genre (user_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_6192C8A0A76ED395 (user_id), INDEX IDX_6192C8A04296D31F (genre_id), PRIMARY KEY(user_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_genre ADD CONSTRAINT FK_6192C8A0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_genre ADD CONSTRAINT FK_6192C8A04296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F8A76ED395');
        $this->addSql('DROP INDEX user_id ON genre');
        $this->addSql('ALTER TABLE genre DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_genre');
        $this->addSql('ALTER TABLE genre ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX user_id ON genre (user_id)');
    }
}
