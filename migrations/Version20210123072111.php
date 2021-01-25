<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210123072111 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, scoring_id INT NOT NULL, name VARCHAR(50) NOT NULL, fname VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, phone VARCHAR(12) NOT NULL, user_data_processing TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_C7440455E7927C74 (email), UNIQUE INDEX UNIQ_C7440455444F97DD (phone), UNIQUE INDEX UNIQ_C7440455DF2EDCBF (scoring_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE education (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, education VARCHAR(50) NOT NULL, INDEX IDX_DB0A5ED219EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scoring (id INT AUTO_INCREMENT NOT NULL, balls INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455DF2EDCBF FOREIGN KEY (scoring_id) REFERENCES scoring (id)');
        $this->addSql('ALTER TABLE education ADD CONSTRAINT FK_DB0A5ED219EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE education DROP FOREIGN KEY FK_DB0A5ED219EB6921');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455DF2EDCBF');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE scoring');
    }
}
