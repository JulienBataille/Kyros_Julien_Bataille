<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240422124059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author_localisation (author_id INT NOT NULL, localisation_id INT NOT NULL, INDEX IDX_E151C6E2F675F31B (author_id), INDEX IDX_E151C6E2C68BE09C (localisation_id), PRIMARY KEY(author_id, localisation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE author_localisation ADD CONSTRAINT FK_E151C6E2F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author_localisation ADD CONSTRAINT FK_E151C6E2C68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author DROP FOREIGN KEY FK_BDAFD8C8C68BE09C');
        $this->addSql('DROP INDEX UNIQ_BDAFD8C8C68BE09C ON author');
        $this->addSql('ALTER TABLE author DROP localisation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author_localisation DROP FOREIGN KEY FK_E151C6E2F675F31B');
        $this->addSql('ALTER TABLE author_localisation DROP FOREIGN KEY FK_E151C6E2C68BE09C');
        $this->addSql('DROP TABLE author_localisation');
        $this->addSql('ALTER TABLE author ADD localisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE author ADD CONSTRAINT FK_BDAFD8C8C68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BDAFD8C8C68BE09C ON author (localisation_id)');
    }
}
