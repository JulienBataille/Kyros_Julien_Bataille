<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425120715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_contact DROP INDEX IDX_CEA7CFA6F675F31B, ADD UNIQUE INDEX UNIQ_CEA7CFA6F675F31B (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_contact DROP INDEX UNIQ_CEA7CFA6F675F31B, ADD INDEX IDX_CEA7CFA6F675F31B (author_id)');
    }
}
