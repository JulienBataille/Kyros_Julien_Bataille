<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425114207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author_work (author_id INT NOT NULL, work_id INT NOT NULL, INDEX IDX_B7A1E05FF675F31B (author_id), INDEX IDX_B7A1E05FBB3453DB (work_id), PRIMARY KEY(author_id, work_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE author_work ADD CONSTRAINT FK_B7A1E05FF675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author_work ADD CONSTRAINT FK_B7A1E05FBB3453DB FOREIGN KEY (work_id) REFERENCES work (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author_work DROP FOREIGN KEY FK_B7A1E05FF675F31B');
        $this->addSql('ALTER TABLE author_work DROP FOREIGN KEY FK_B7A1E05FBB3453DB');
        $this->addSql('DROP TABLE author_work');
    }
}
