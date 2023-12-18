<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218143300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE secteurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(191) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ateliers (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(191) NOT NULL, description LONGTEXT NOT NULL, secteur_id INT NOT NULL, heure_depart DATETIME NOT NULL, FOREIGN KEY (secteur_id) REFERENCES secteurs(id), UNIQUE INDEX UNIQ_B98805616C6E55B5 (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervenants (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(191) NOT NULL, telephone VARCHAR(10) NOT NULL, nom VARCHAR(191) NOT NULL, prénom VARCHAR(191) NOT NULL, entreprise VARCHAR(191) DEFAULT NULL, UNIQUE INDEX UNIQ_79A002C0E7927C74 (email), UNIQUE INDEX UNIQ_79A002C0450FF010 (telephone), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier_intervenant (id INT AUTO_INCREMENT NOT NULL, atelier_id INT NOT NULL, intervenant_id INT NOT NULL, FOREIGN KEY (atelier_id) REFERENCES ateliers(id), FOREIGN KEY (intervenant_id) REFERENCES intervenants(id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lyceens (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(191) NOT NULL, telephone VARCHAR(10) NOT NULL, nom VARCHAR(191) NOT NULL, prénom VARCHAR(191) NOT NULL, âge INT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscriptions (id INT AUTO_INCREMENT NOT NULL, atelier_id INT NOT NULL, lyceen_id INT NOT NULL,  FOREIGN KEY (atelier_id) REFERENCES ateliers(id),  FOREIGN KEY (lyceen_id) REFERENCES lyceens(id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questionnaires (id INT AUTO_INCREMENT NOT NULL, lyceen_id INT NOT NULL, question LONGTEXT NOT NULL, réponse LONGTEXT NOT NULL,  FOREIGN KEY(lyceen_id) REFERENCES lyceens(id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsors (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(191) NOT NULL, logo LONGBLOB DEFAULT NULL, url_redirection VARCHAR(191) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE atelier_intervenant');
        $this->addSql('DROP TABLE ateliers');
        $this->addSql('DROP TABLE inscriptions');
        $this->addSql('DROP TABLE intervenants');
        $this->addSql('DROP TABLE lyceens');
        $this->addSql('DROP TABLE questionnaires');
        $this->addSql('DROP TABLE secteurs');
        $this->addSql('DROP TABLE sponsors');
    }
}
