<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425134458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ADD object VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE experience ADD start_year DATE NOT NULL, ADD end_year DATE DEFAULT NULL, ADD job VARCHAR(255) NOT NULL, ADD additional_information VARCHAR(255) DEFAULT NULL, ADD picture VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP object');
        $this->addSql('ALTER TABLE experience DROP start_year, DROP end_year, DROP job, DROP additional_information, DROP picture');
    }
}
