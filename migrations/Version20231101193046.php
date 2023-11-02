<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231101193046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ciudad (id INT AUTO_INCREMENT NOT NULL, departamento_id INT DEFAULT NULL, ciudad VARCHAR(255) NOT NULL, estado TINYINT(1) NOT NULL, INDEX IDX_8E86059E5A91C08D (departamento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE convenio (id INT AUTO_INCREMENT NOT NULL, tipoeps_id INT DEFAULT NULL, ciudad_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, nit VARCHAR(255) NOT NULL, codigo INT NOT NULL, INDEX IDX_255772447C27BA81 (tipoeps_id), INDEX IDX_25577244E8608214 (ciudad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE datos_clinicos (id INT AUTO_INCREMENT NOT NULL, convenio_id INT DEFAULT NULL, pacientes_id INT DEFAULT NULL, sala_id INT DEFAULT NULL, prioridad_id INT DEFAULT NULL, procedencia_id INT DEFAULT NULL, modalidad_id INT DEFAULT NULL, tipo_estudio_id INT DEFAULT NULL, medico_asignado_id INT DEFAULT NULL, medico_remitente VARCHAR(255) DEFAULT NULL, tarjeta_profesional VARCHAR(255) DEFAULT NULL, info_clinica VARCHAR(4) NOT NULL, fecha_estudio DATE NOT NULL, hora_estudio TIME NOT NULL, archivos VARCHAR(255) NOT NULL, estado VARCHAR(255) NOT NULL, INDEX IDX_FF079E0EF9D43F2A (convenio_id), INDEX IDX_FF079E0E66BCBB32 (pacientes_id), INDEX IDX_FF079E0EC51CDF3F (sala_id), INDEX IDX_FF079E0EBDD13D7A (prioridad_id), INDEX IDX_FF079E0E797627A (procedencia_id), INDEX IDX_FF079E0E1E092B9F (modalidad_id), INDEX IDX_FF079E0EE7A4999B (tipo_estudio_id), INDEX IDX_FF079E0E92C0A89F (medico_asignado_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departamento (id INT AUTO_INCREMENT NOT NULL, departamento VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresa (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, nit VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE especialidad_medico (id INT AUTO_INCREMENT NOT NULL, especialidad VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estudios (id INT AUTO_INCREMENT NOT NULL, modalidad_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, birad TINYINT(1) NOT NULL, activo TINYINT(1) NOT NULL, consentimiento TINYINT(1) NOT NULL, INDEX IDX_59035C7D1E092B9F (modalidad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gsanguineo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modalidad (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, modalidad VARCHAR(255) NOT NULL, grabacion TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paciente (id INT AUTO_INCREMENT NOT NULL, tipo_documento_id INT DEFAULT NULL, departamento_id INT DEFAULT NULL, ciudad_id INT DEFAULT NULL, tipo_sangre_id INT DEFAULT NULL, primer_nombre VARCHAR(255) NOT NULL, segundo_nombre VARCHAR(255) DEFAULT NULL, primer_apellido VARCHAR(255) NOT NULL, segundo_apellido VARCHAR(255) DEFAULT NULL, fecha_nacimiento DATE NOT NULL, edad VARCHAR(255) NOT NULL, sexo VARCHAR(255) NOT NULL, hijo_de TINYINT(1) NOT NULL, numero_iden VARCHAR(255) NOT NULL, zona_residencial VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, correo VARCHAR(255) NOT NULL, acudiente VARCHAR(255) NOT NULL, celular VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C6CBA95ECF04A67D (numero_iden), INDEX IDX_C6CBA95EF6939175 (tipo_documento_id), INDEX IDX_C6CBA95E5A91C08D (departamento_id), INDEX IDX_C6CBA95EE8608214 (ciudad_id), INDEX IDX_C6CBA95E99A5433 (tipo_sangre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plantilla (id INT AUTO_INCREMENT NOT NULL, modalidad_id INT DEFAULT NULL, usuario_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, plantilla LONGTEXT NOT NULL, INDEX IDX_769DF2531E092B9F (modalidad_id), INDEX IDX_769DF253DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prioridad_cita (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE procedencia_cita (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reporte (id INT AUTO_INCREMENT NOT NULL, margen_derecho INT NOT NULL, margen_izquierdo INT NOT NULL, margen_superior INT NOT NULL, margen_inferior INT NOT NULL, cabezera TINYINT(1) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', sede VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salas (id INT AUTO_INCREMENT NOT NULL, modalidad_id INT DEFAULT NULL, sedes_id INT DEFAULT NULL, sala VARCHAR(255) NOT NULL, INDEX IDX_FEDB5401E092B9F (modalidad_id), INDEX IDX_FEDB540BC4E8C79 (sedes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sedes (id INT AUTO_INCREMENT NOT NULL, empresa_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, contacto VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_EAF0B6AB521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_documento (id INT AUTO_INCREMENT NOT NULL, tipo_documento VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_eps (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, tipo_documeto_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, sexo VARCHAR(255) NOT NULL, fecha_nacimiento DATE NOT NULL, numero_docu VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, correo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D6495B530972 (tipo_documeto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ciudad ADD CONSTRAINT FK_8E86059E5A91C08D FOREIGN KEY (departamento_id) REFERENCES departamento (id)');
        $this->addSql('ALTER TABLE convenio ADD CONSTRAINT FK_255772447C27BA81 FOREIGN KEY (tipoeps_id) REFERENCES tipo_eps (id)');
        $this->addSql('ALTER TABLE convenio ADD CONSTRAINT FK_25577244E8608214 FOREIGN KEY (ciudad_id) REFERENCES ciudad (id)');
        $this->addSql('ALTER TABLE datos_clinicos ADD CONSTRAINT FK_FF079E0EF9D43F2A FOREIGN KEY (convenio_id) REFERENCES convenio (id)');
        $this->addSql('ALTER TABLE datos_clinicos ADD CONSTRAINT FK_FF079E0E66BCBB32 FOREIGN KEY (pacientes_id) REFERENCES paciente (id)');
        $this->addSql('ALTER TABLE datos_clinicos ADD CONSTRAINT FK_FF079E0EC51CDF3F FOREIGN KEY (sala_id) REFERENCES salas (id)');
        $this->addSql('ALTER TABLE datos_clinicos ADD CONSTRAINT FK_FF079E0EBDD13D7A FOREIGN KEY (prioridad_id) REFERENCES prioridad_cita (id)');
        $this->addSql('ALTER TABLE datos_clinicos ADD CONSTRAINT FK_FF079E0E797627A FOREIGN KEY (procedencia_id) REFERENCES procedencia_cita (id)');
        $this->addSql('ALTER TABLE datos_clinicos ADD CONSTRAINT FK_FF079E0E1E092B9F FOREIGN KEY (modalidad_id) REFERENCES modalidad (id)');
        $this->addSql('ALTER TABLE datos_clinicos ADD CONSTRAINT FK_FF079E0EE7A4999B FOREIGN KEY (tipo_estudio_id) REFERENCES estudios (id)');
        $this->addSql('ALTER TABLE datos_clinicos ADD CONSTRAINT FK_FF079E0E92C0A89F FOREIGN KEY (medico_asignado_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE estudios ADD CONSTRAINT FK_59035C7D1E092B9F FOREIGN KEY (modalidad_id) REFERENCES modalidad (id)');
        $this->addSql('ALTER TABLE paciente ADD CONSTRAINT FK_C6CBA95EF6939175 FOREIGN KEY (tipo_documento_id) REFERENCES tipo_documento (id)');
        $this->addSql('ALTER TABLE paciente ADD CONSTRAINT FK_C6CBA95E5A91C08D FOREIGN KEY (departamento_id) REFERENCES departamento (id)');
        $this->addSql('ALTER TABLE paciente ADD CONSTRAINT FK_C6CBA95EE8608214 FOREIGN KEY (ciudad_id) REFERENCES ciudad (id)');
        $this->addSql('ALTER TABLE paciente ADD CONSTRAINT FK_C6CBA95E99A5433 FOREIGN KEY (tipo_sangre_id) REFERENCES gsanguineo (id)');
        $this->addSql('ALTER TABLE plantilla ADD CONSTRAINT FK_769DF2531E092B9F FOREIGN KEY (modalidad_id) REFERENCES modalidad (id)');
        $this->addSql('ALTER TABLE plantilla ADD CONSTRAINT FK_769DF253DB38439E FOREIGN KEY (usuario_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE salas ADD CONSTRAINT FK_FEDB5401E092B9F FOREIGN KEY (modalidad_id) REFERENCES modalidad (id)');
        $this->addSql('ALTER TABLE salas ADD CONSTRAINT FK_FEDB540BC4E8C79 FOREIGN KEY (sedes_id) REFERENCES sedes (id)');
        $this->addSql('ALTER TABLE sedes ADD CONSTRAINT FK_EAF0B6AB521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6495B530972 FOREIGN KEY (tipo_documeto_id) REFERENCES tipo_documento (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ciudad DROP FOREIGN KEY FK_8E86059E5A91C08D');
        $this->addSql('ALTER TABLE convenio DROP FOREIGN KEY FK_255772447C27BA81');
        $this->addSql('ALTER TABLE convenio DROP FOREIGN KEY FK_25577244E8608214');
        $this->addSql('ALTER TABLE datos_clinicos DROP FOREIGN KEY FK_FF079E0EF9D43F2A');
        $this->addSql('ALTER TABLE datos_clinicos DROP FOREIGN KEY FK_FF079E0E66BCBB32');
        $this->addSql('ALTER TABLE datos_clinicos DROP FOREIGN KEY FK_FF079E0EC51CDF3F');
        $this->addSql('ALTER TABLE datos_clinicos DROP FOREIGN KEY FK_FF079E0EBDD13D7A');
        $this->addSql('ALTER TABLE datos_clinicos DROP FOREIGN KEY FK_FF079E0E797627A');
        $this->addSql('ALTER TABLE datos_clinicos DROP FOREIGN KEY FK_FF079E0E1E092B9F');
        $this->addSql('ALTER TABLE datos_clinicos DROP FOREIGN KEY FK_FF079E0EE7A4999B');
        $this->addSql('ALTER TABLE datos_clinicos DROP FOREIGN KEY FK_FF079E0E92C0A89F');
        $this->addSql('ALTER TABLE estudios DROP FOREIGN KEY FK_59035C7D1E092B9F');
        $this->addSql('ALTER TABLE paciente DROP FOREIGN KEY FK_C6CBA95EF6939175');
        $this->addSql('ALTER TABLE paciente DROP FOREIGN KEY FK_C6CBA95E5A91C08D');
        $this->addSql('ALTER TABLE paciente DROP FOREIGN KEY FK_C6CBA95EE8608214');
        $this->addSql('ALTER TABLE paciente DROP FOREIGN KEY FK_C6CBA95E99A5433');
        $this->addSql('ALTER TABLE plantilla DROP FOREIGN KEY FK_769DF2531E092B9F');
        $this->addSql('ALTER TABLE plantilla DROP FOREIGN KEY FK_769DF253DB38439E');
        $this->addSql('ALTER TABLE salas DROP FOREIGN KEY FK_FEDB5401E092B9F');
        $this->addSql('ALTER TABLE salas DROP FOREIGN KEY FK_FEDB540BC4E8C79');
        $this->addSql('ALTER TABLE sedes DROP FOREIGN KEY FK_EAF0B6AB521E1991');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6495B530972');
        $this->addSql('DROP TABLE ciudad');
        $this->addSql('DROP TABLE convenio');
        $this->addSql('DROP TABLE datos_clinicos');
        $this->addSql('DROP TABLE departamento');
        $this->addSql('DROP TABLE empresa');
        $this->addSql('DROP TABLE especialidad_medico');
        $this->addSql('DROP TABLE estudios');
        $this->addSql('DROP TABLE gsanguineo');
        $this->addSql('DROP TABLE modalidad');
        $this->addSql('DROP TABLE paciente');
        $this->addSql('DROP TABLE plantilla');
        $this->addSql('DROP TABLE prioridad_cita');
        $this->addSql('DROP TABLE procedencia_cita');
        $this->addSql('DROP TABLE reporte');
        $this->addSql('DROP TABLE salas');
        $this->addSql('DROP TABLE sedes');
        $this->addSql('DROP TABLE tipo_documento');
        $this->addSql('DROP TABLE tipo_eps');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
