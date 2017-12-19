<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171219195313 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bitcoin (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, sell DOUBLE PRECISION NOT NULL, buy DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE national_bank (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, usd DOUBLE PRECISION NOT NULL, euro DOUBLE PRECISION NOT NULL, rub DOUBLE PRECISION NOT NULL, pln DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE privat_bank (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, euro_buy DOUBLE PRECISION NOT NULL, euro_sale DOUBLE PRECISION NOT NULL, usd_buy DOUBLE PRECISION NOT NULL, usd_sale DOUBLE PRECISION NOT NULL, rur_buy DOUBLE PRECISION NOT NULL, rur_sale DOUBLE PRECISION NOT NULL, btn_buy DOUBLE PRECISION NOT NULL, btn_sale DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL, UNIQUE INDEX user_id_uindex (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE bitcoin');
        $this->addSql('DROP TABLE national_bank');
        $this->addSql('DROP TABLE privat_bank');
        $this->addSql('DROP TABLE user');
    }
}
