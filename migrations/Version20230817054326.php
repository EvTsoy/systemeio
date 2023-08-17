<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230817054326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD payment_processor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398514A7680 FOREIGN KEY (payment_processor_id) REFERENCES payment_processor (id)');
        $this->addSql('CREATE INDEX IDX_F5299398514A7680 ON `order` (payment_processor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398514A7680');
        $this->addSql('DROP INDEX IDX_F5299398514A7680 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP payment_processor_id');
    }
}
