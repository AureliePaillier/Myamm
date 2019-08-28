<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190828054644 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE accounts (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, tablemeal_number INT NOT NULL, flatware INT NOT NULL, total_command DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_CAC89EACA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE food (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(100) NOT NULL, meal VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, tablemeal_id INT NOT NULL, created_at DATETIME NOT NULL, tablemeal_number INT NOT NULL, flatware INT NOT NULL, comments LONGTEXT DEFAULT NULL, total_command DOUBLE PRECISION NOT NULL, INDEX IDX_8ECAEAD4A76ED395 (user_id), INDEX IDX_8ECAEAD4C4778496 (tablemeal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command_food (command_id INT NOT NULL, food_id INT NOT NULL, INDEX IDX_7592877A33E1689A (command_id), INDEX IDX_7592877ABA8E87C4 (food_id), PRIMARY KEY(command_id, food_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command_accounts (command_id INT NOT NULL, accounts_id INT NOT NULL, INDEX IDX_F324473D33E1689A (command_id), INDEX IDX_F324473DCC5E8CE8 (accounts_id), PRIMARY KEY(command_id, accounts_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tablemeal (id INT AUTO_INCREMENT NOT NULL, tablemeal_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_firstname VARCHAR(100) NOT NULL, user_lastname VARCHAR(100) NOT NULL, role INT NOT NULL, mail VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accounts ADD CONSTRAINT FK_CAC89EACA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4C4778496 FOREIGN KEY (tablemeal_id) REFERENCES tablemeal (id)');
        $this->addSql('ALTER TABLE command_food ADD CONSTRAINT FK_7592877A33E1689A FOREIGN KEY (command_id) REFERENCES command (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE command_food ADD CONSTRAINT FK_7592877ABA8E87C4 FOREIGN KEY (food_id) REFERENCES food (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE command_accounts ADD CONSTRAINT FK_F324473D33E1689A FOREIGN KEY (command_id) REFERENCES command (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE command_accounts ADD CONSTRAINT FK_F324473DCC5E8CE8 FOREIGN KEY (accounts_id) REFERENCES accounts (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE command_accounts DROP FOREIGN KEY FK_F324473DCC5E8CE8');
        $this->addSql('ALTER TABLE command_food DROP FOREIGN KEY FK_7592877ABA8E87C4');
        $this->addSql('ALTER TABLE command_food DROP FOREIGN KEY FK_7592877A33E1689A');
        $this->addSql('ALTER TABLE command_accounts DROP FOREIGN KEY FK_F324473D33E1689A');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4C4778496');
        $this->addSql('ALTER TABLE accounts DROP FOREIGN KEY FK_CAC89EACA76ED395');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4A76ED395');
        $this->addSql('DROP TABLE accounts');
        $this->addSql('DROP TABLE food');
        $this->addSql('DROP TABLE command');
        $this->addSql('DROP TABLE command_food');
        $this->addSql('DROP TABLE command_accounts');
        $this->addSql('DROP TABLE tablemeal');
        $this->addSql('DROP TABLE user');
    }
}
