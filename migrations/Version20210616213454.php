<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616213454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lock_question (id INT AUTO_INCREMENT NOT NULL, main_id_id INT NOT NULL, question LONGTEXT NOT NULL, link VARCHAR(255) DEFAULT NULL, INDEX IDX_5FF4C160DC182D11 (main_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lock_question ADD CONSTRAINT FK_5FF4C160DC182D11 FOREIGN KEY (main_id_id) REFERENCES lock_main (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lock_question');
    }
}
