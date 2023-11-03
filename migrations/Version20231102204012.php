<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102204012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_sedes (user_id INT NOT NULL, sedes_id INT NOT NULL, INDEX IDX_8324DF3A76ED395 (user_id), INDEX IDX_8324DF3BC4E8C79 (sedes_id), PRIMARY KEY(user_id, sedes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_sedes ADD CONSTRAINT FK_8324DF3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_sedes ADD CONSTRAINT FK_8324DF3BC4E8C79 FOREIGN KEY (sedes_id) REFERENCES sedes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_sedes DROP FOREIGN KEY FK_8324DF3A76ED395');
        $this->addSql('ALTER TABLE user_sedes DROP FOREIGN KEY FK_8324DF3BC4E8C79');
        $this->addSql('DROP TABLE user_sedes');
    }
}
