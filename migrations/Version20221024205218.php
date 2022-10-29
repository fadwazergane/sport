<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024205218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite CHANGE code_act code_act VARCHAR(50) NOT NULL, CHANGE lib_act lib_act VARCHAR(200) NOT NULL');
        $this->addSql('ALTER TABLE coach CHANGE code_co code_co VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE seance ADD code_co_id INT NOT NULL, ADD code_act_id INT NOT NULL, CHANGE date date_se DATE NOT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EEA018BB FOREIGN KEY (code_co_id) REFERENCES coach (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EAE23038A FOREIGN KEY (code_act_id) REFERENCES activite (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0EEA018BB ON seance (code_co_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0EAE23038A ON seance (code_act_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite CHANGE code_act code_act VARCHAR(255) NOT NULL, CHANGE lib_act lib_act VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE coach CHANGE code_co code_co VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EEA018BB');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EAE23038A');
        $this->addSql('DROP INDEX IDX_DF7DFD0EEA018BB ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0EAE23038A ON seance');
        $this->addSql('ALTER TABLE seance DROP code_co_id, DROP code_act_id, CHANGE date_se date DATE NOT NULL');
    }
}
