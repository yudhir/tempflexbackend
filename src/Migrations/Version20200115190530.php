<?php

declare(strict_types = 1);

// phpcs:ignoreFile
/** @noinspection PhpIllegalPsrClassPathInspection */
namespace DoctrineMigrations;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200115190530 extends AbstractMigration
{
    /** @noinspection PhpMissingParentCallCommonInspection */
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return '';
    }

    /**
     * @param Schema $schema
     *
     * @throws DBALException
     */
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE app_products (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary_ordered_time)\', created_by_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid_binary_ordered_time)\', updated_by_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid_binary_ordered_time)\', brand VARCHAR(255) DEFAULT NULL, name LONGTEXT NOT NULL, description LONGTEXT DEFAULT NULL, size LONGTEXT DEFAULT NULL, sku LONGTEXT DEFAULT NULL, material VARCHAR(255) DEFAULT NULL, manufacturer LONGTEXT DEFAULT NULL, logo LONGTEXT DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_BB3A3AF7B03A8386 (created_by_id), INDEX IDX_BB3A3AF7896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_products ADD CONSTRAINT FK_BB3A3AF7B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE app_products ADD CONSTRAINT FK_BB3A3AF7896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id) ON DELETE SET NULL');
    }

    /**
     * @param Schema $schema
     *
     * @throws DBALException
     */
    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE app_products');
    }
}
