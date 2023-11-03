<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102192834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salas ADD habilitado TINYINT(1) DEFAULT NULL, ADD ae_title VARCHAR(255) DEFAULT NULL, ADD ip VARCHAR(255) DEFAULT NULL, ADD puerto VARCHAR(255) DEFAULT NULL, ADD nodo_dicom TINYINT(1) NOT NULL, ADD paso_lectura TINYINT(1) NOT NULL, ADD agrupar_estudios TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salas DROP habilitado, DROP ae_title, DROP ip, DROP puerto, DROP nodo_dicom, DROP paso_lectura, DROP agrupar_estudios');
    }
}
