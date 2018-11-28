<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128181919 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE notation (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, bug_id INT NOT NULL, fonctionnalite_id INT NOT NULL, score INT NOT NULL, INDEX IDX_268BC95A76ED395 (user_id), INDEX IDX_268BC95FA3DB3D5 (bug_id), INDEX IDX_268BC954477C5D8 (fonctionnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notation ADD CONSTRAINT FK_268BC95A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notation ADD CONSTRAINT FK_268BC95FA3DB3D5 FOREIGN KEY (bug_id) REFERENCES bug (id)');
        $this->addSql('ALTER TABLE notation ADD CONSTRAINT FK_268BC954477C5D8 FOREIGN KEY (fonctionnalite_id) REFERENCES fonctionnalite (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE notation');
    }
}
