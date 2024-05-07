<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425112949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE work (id INT AUTO_INCREMENT NOT NULL, quantity INT DEFAULT NULL, works VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_author (work_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_16561EEABB3453DB (work_id), INDEX IDX_16561EEAF675F31B (author_id), PRIMARY KEY(work_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE work_author ADD CONSTRAINT FK_16561EEABB3453DB FOREIGN KEY (work_id) REFERENCES work (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE work_author ADD CONSTRAINT FK_16561EEAF675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE work_author DROP FOREIGN KEY FK_16561EEABB3453DB');
        $this->addSql('ALTER TABLE work_author DROP FOREIGN KEY FK_16561EEAF675F31B');
        $this->addSql('DROP TABLE work');
        $this->addSql('DROP TABLE work_author');
    }
}
