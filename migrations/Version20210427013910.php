<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427013910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address_entity (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, pais VARCHAR(255) NOT NULL, estado VARCHAR(255) NOT NULL, cidade VARCHAR(255) NOT NULL, bairro VARCHAR(255) NOT NULL, rua VARCHAR(16) NOT NULL, numero VARCHAR(255) NOT NULL, complemento VARCHAR(255) NOT NULL, cep VARCHAR(8) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone_entity (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, area_code VARCHAR(2) NOT NULL, number VARCHAR(9) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_entity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE address_entity');
        $this->addSql('DROP TABLE phone_entity');
        $this->addSql('DROP TABLE user_entity');
    }
}
