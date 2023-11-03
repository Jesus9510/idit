<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102194039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sedes ADD ciudad_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sedes ADD CONSTRAINT FK_EAF0B6ABE8608214 FOREIGN KEY (ciudad_id) REFERENCES ciudad (id)');
        $this->addSql('CREATE INDEX IDX_EAF0B6ABE8608214 ON sedes (ciudad_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sedes DROP FOREIGN KEY FK_EAF0B6ABE8608214');
        $this->addSql('DROP INDEX IDX_EAF0B6ABE8608214 ON sedes');
        $this->addSql('ALTER TABLE sedes DROP ciudad_id');
    }
}
