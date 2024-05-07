<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240422134554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author_capacity (author_id INT NOT NULL, capacity_id INT NOT NULL, INDEX IDX_5A789BC1F675F31B (author_id), INDEX IDX_5A789BC166B6F0BA (capacity_id), PRIMARY KEY(author_id, capacity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE author_capacity ADD CONSTRAINT FK_5A789BC1F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author_capacity ADD CONSTRAINT FK_5A789BC166B6F0BA FOREIGN KEY (capacity_id) REFERENCES capacity (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author_capacity DROP FOREIGN KEY FK_5A789BC1F675F31B');
        $this->addSql('ALTER TABLE author_capacity DROP FOREIGN KEY FK_5A789BC166B6F0BA');
        $this->addSql('DROP TABLE author_capacity');
    }
}
