<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240423060301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1BC415685');
        $this->addSql('DROP INDEX IDX_64C19C1BC415685 ON category');
        $this->addSql('ALTER TABLE category DROP pictures_id');
        $this->addSql('ALTER TABLE pictures ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC012469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_8F7C2FC012469DE2 ON pictures (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC012469DE2');
        $this->addSql('DROP INDEX IDX_8F7C2FC012469DE2 ON pictures');
        $this->addSql('ALTER TABLE pictures DROP category_id');
        $this->addSql('ALTER TABLE category ADD pictures_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1BC415685 FOREIGN KEY (pictures_id) REFERENCES pictures (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_64C19C1BC415685 ON category (pictures_id)');
    }
}
