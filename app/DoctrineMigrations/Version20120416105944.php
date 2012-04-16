<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120416105944 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE club_ranking_team (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("CREATE TABLE club_ranking_team_user (team_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_9604FB08296CD8AE (team_id), INDEX IDX_9604FB08A76ED395 (user_id), PRIMARY KEY(team_id, user_id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE club_ranking_team_user ADD CONSTRAINT FK_9604FB08296CD8AE FOREIGN KEY (team_id) REFERENCES club_ranking_team(id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE club_ranking_team_user ADD CONSTRAINT FK_9604FB08A76ED395 FOREIGN KEY (user_id) REFERENCES club_user_user(id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE club_ranking_team_user DROP FOREIGN KEY FK_9604FB08296CD8AE");
        $this->addSql("DROP TABLE club_ranking_team");
        $this->addSql("DROP TABLE club_ranking_team_user");
    }
}
