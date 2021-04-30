<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210430011051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, estado VARCHAR(255) NOT NULL, cidade VARCHAR(255) NOT NULL, bairro VARCHAR(255) NOT NULL, rua VARCHAR(255) NOT NULL, numero VARCHAR(16) NOT NULL, complemento VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone (id INT AUTO_INCREMENT NOT NULL, area_code VARCHAR(2) NOT NULL, number VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_8D93D649F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_phone (user_id INT NOT NULL, phone_id INT NOT NULL, INDEX IDX_A68D6C85A76ED395 (user_id), UNIQUE INDEX UNIQ_A68D6C853B7323CB (phone_id), PRIMARY KEY(user_id, phone_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE user_phone ADD CONSTRAINT FK_A68D6C85A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_phone ADD CONSTRAINT FK_A68D6C853B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F5B7AF75');
        $this->addSql('ALTER TABLE user_phone DROP FOREIGN KEY FK_A68D6C853B7323CB');
        $this->addSql('ALTER TABLE user_phone DROP FOREIGN KEY FK_A68D6C85A76ED395');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE phone');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_phone');
    }
}
