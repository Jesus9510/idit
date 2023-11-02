<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231101200733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reporte ADD sede_id INT DEFAULT NULL, DROP sede');
        $this->addSql('ALTER TABLE reporte ADD CONSTRAINT FK_5CB1214E19F41BF FOREIGN KEY (sede_id) REFERENCES sedes (id)');
        $this->addSql('CREATE INDEX IDX_5CB1214E19F41BF ON reporte (sede_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reporte DROP FOREIGN KEY FK_5CB1214E19F41BF');
        $this->addSql('DROP INDEX IDX_5CB1214E19F41BF ON reporte');
        $this->addSql('ALTER TABLE reporte ADD sede VARCHAR(255) NOT NULL, DROP sede_id');
    }
}
