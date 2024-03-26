<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240325111909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oeuvre ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oeuvre ADD CONSTRAINT FK_35FE2EFEBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_35FE2EFEBCF5E72D ON oeuvre (categorie_id)');
        $this->addSql('ALTER TABLE product ADD oeuvres_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4928CE22 FOREIGN KEY (oeuvres_id) REFERENCES oeuvre (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD4928CE22 ON product (oeuvres_id)');
        $this->addSql('ALTER TABLE user ADD adress_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498486F9AC FOREIGN KEY (adress_id) REFERENCES adress (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498486F9AC ON user (adress_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oeuvre DROP FOREIGN KEY FK_35FE2EFEBCF5E72D');
        $this->addSql('DROP INDEX IDX_35FE2EFEBCF5E72D ON oeuvre');
        $this->addSql('ALTER TABLE oeuvre DROP categorie_id');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD4928CE22');
        $this->addSql('DROP INDEX IDX_D34A04AD4928CE22 ON product');
        $this->addSql('ALTER TABLE product DROP oeuvres_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498486F9AC');
        $this->addSql('DROP INDEX IDX_8D93D6498486F9AC ON user');
        $this->addSql('ALTER TABLE user DROP adress_id');
    }
}
