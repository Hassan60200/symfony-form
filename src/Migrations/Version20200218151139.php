<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200218151139 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE articles_mots_clés (articles_id INT NOT NULL, mots_clés_id INT NOT NULL, INDEX IDX_22BA00421EBAF6CC (articles_id), INDEX IDX_22BA0042FAB09DF2 (mots_clés_id), PRIMARY KEY(articles_id, mots_clés_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_catégories (articles_id INT NOT NULL, catégories_id INT NOT NULL, INDEX IDX_EAD1A5E81EBAF6CC (articles_id), INDEX IDX_EAD1A5E86CB52B88 (catégories_id), PRIMARY KEY(articles_id, catégories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles_mots_clés ADD CONSTRAINT FK_22BA00421EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_mots_clés ADD CONSTRAINT FK_22BA0042FAB09DF2 FOREIGN KEY (mots_clés_id) REFERENCES mots_clés (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_catégories ADD CONSTRAINT FK_EAD1A5E81EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_catégories ADD CONSTRAINT FK_EAD1A5E86CB52B88 FOREIGN KEY (catégories_id) REFERENCES catégories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE articles_mots_clés');
        $this->addSql('DROP TABLE articles_catégories');
    }
}
