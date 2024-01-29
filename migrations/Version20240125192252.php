<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125192252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE url DROP FOREIGN KEY FK_F47645AE9D86650F');
        $this->addSql('DROP INDEX IDX_F47645AE9D86650F ON url');
        $this->addSql('ALTER TABLE url ADD creation_date DATETIME NOT NULL, DROP urcl_corta_personalizada, CHANGE user_id_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE url ADD CONSTRAINT FK_F47645AEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F47645AEA76ED395 ON url (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE url DROP FOREIGN KEY FK_F47645AEA76ED395');
        $this->addSql('DROP INDEX IDX_F47645AEA76ED395 ON url');
        $this->addSql('ALTER TABLE url ADD urcl_corta_personalizada TINYINT(1) DEFAULT NULL, DROP creation_date, CHANGE user_id user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE url ADD CONSTRAINT FK_F47645AE9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F47645AE9D86650F ON url (user_id_id)');
    }
}
