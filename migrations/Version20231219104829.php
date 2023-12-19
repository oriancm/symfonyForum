<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231219104829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE ressources (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) DEFAULT NULL, fichier LONGBLOB DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, etage INT NOT NULL, capacite_max INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE métiers (id INT AUTO_INCREMENT NOT NULL, activites VARCHAR(255) NOT NULL, competences VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum (id INT AUTO_INCREMENT NOT NULL, annee INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ateliers (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(191) NOT NULL, description LONGTEXT NOT NULL, secteur_id INT NOT NULL, salle_id INT NOT NULL, ressources_id INT, forum_id INT NOT NULL, heure_depart DATETIME NOT NULL, FOREIGN KEY (salle_id) REFERENCES salles(id),  FOREIGN KEY (secteur_id) REFERENCES secteurs(id), FOREIGN KEY (ressources_id) REFERENCES ressources(id), FOREIGN KEY (forum_id) REFERENCES forum(id), UNIQUE INDEX UNIQ_B98805616C6E55B5 (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervenants (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(10) NOT NULL, nom VARCHAR(255) NOT NULL, prénom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_79A002C0E7927C74 (email), UNIQUE INDEX UNIQ_79A002C0450FF010 (telephone), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lyceens (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(10) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, lycee VARCHAR(255) NOT NULL, section VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier_intervenant (id INT AUTO_INCREMENT NOT NULL, atelier_id INT NOT NULL, intervenant_id INT NOT NULL,  FOREIGN KEY (atelier_id) REFERENCES ateliers(id), FOREIGN KEY (intervenant_id) REFERENCES intervenants(id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier_lyceen (id INT AUTO_INCREMENT NOT NULL, atelier_id INT NOT NULL, lyceen_id INT NOT NULL,  FOREIGN KEY (atelier_id) REFERENCES ateliers(id), FOREIGN KEY (lyceen_id) REFERENCES lyceens(id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier_métier (id INT AUTO_INCREMENT NOT NULL, atelier_id INT NOT NULL, metier_id INT NOT NULL,  FOREIGN KEY (atelier_id) REFERENCES ateliers(id), FOREIGN KEY (metier_id) REFERENCES métiers(id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questionnaires (id INT AUTO_INCREMENT NOT NULL, lyceen_id INT NOT NULL, question LONGTEXT NOT NULL, réponse LONGTEXT NOT NULL, ouverte VARBINARY(255) NOT NULL, FOREIGN KEY (lyceen_id) REFERENCES lyceens(id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsors (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, logo LONGBLOB DEFAULT NULL, url_redirection VARCHAR(255) NOT NULL, forum_id INT NOT NULL, FOREIGN KEY (forum_id) REFERENCES forum(id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE atelier_intervenant');
        $this->addSql('DROP TABLE atelier_lyceen');
        $this->addSql('DROP TABLE atelier_métier');
        $this->addSql('DROP TABLE ateliers');
        $this->addSql('DROP TABLE forum');
        $this->addSql('DROP TABLE inscriptions');
        $this->addSql('DROP TABLE intervenants');
        $this->addSql('DROP TABLE lyceens');
        $this->addSql('DROP TABLE métiers');
        $this->addSql('DROP TABLE questionnaires');
        $this->addSql('DROP TABLE salles');
        $this->addSql('DROP TABLE secteurs');
        $this->addSql('DROP TABLE sponsors');
    }
}
