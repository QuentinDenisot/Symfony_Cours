<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128173219 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bug ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE bug ADD CONSTRAINT FK_358CBF14A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_358CBF14A76ED395 ON bug (user_id)');
        $this->addSql('ALTER TABLE fonctionnalite ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE fonctionnalite ADD CONSTRAINT FK_8F83CB48A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8F83CB48A76ED395 ON fonctionnalite (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bug DROP FOREIGN KEY FK_358CBF14A76ED395');
        $this->addSql('DROP INDEX IDX_358CBF14A76ED395 ON bug');
        $this->addSql('ALTER TABLE bug DROP user_id');
        $this->addSql('ALTER TABLE fonctionnalite DROP FOREIGN KEY FK_8F83CB48A76ED395');
        $this->addSql('DROP INDEX IDX_8F83CB48A76ED395 ON fonctionnalite');
        $this->addSql('ALTER TABLE fonctionnalite DROP user_id');
    }
}
