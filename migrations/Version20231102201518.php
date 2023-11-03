<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102201518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD especialidad_id INT DEFAULT NULL, ADD registro_medico VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64916A490EC FOREIGN KEY (especialidad_id) REFERENCES especialidad_medico (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64916A490EC ON user (especialidad_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64916A490EC');
        $this->addSql('DROP INDEX IDX_8D93D64916A490EC ON `user`');
        $this->addSql('ALTER TABLE `user` DROP especialidad_id, DROP registro_medico');
    }
}
