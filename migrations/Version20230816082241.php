<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230816082241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F02C54C8C93 FOREIGN KEY (type_id) REFERENCES coupon_type (id)');
        $this->addSql('CREATE INDEX IDX_64BF3F02C54C8C93 ON coupon (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F02C54C8C93');
        $this->addSql('DROP INDEX IDX_64BF3F02C54C8C93 ON coupon');
        $this->addSql('ALTER TABLE coupon DROP type_id');
    }
}
