<?php

class m141113_130800_request extends CDbMigration
{
	public function up()
	{
        $s = "    DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

ALTER TABLE `angler`.`parser`
ADD COLUMN `request_id` INT(11) NOT NULL AFTER `date`,
ADD INDEX `fk_parser_request1_idx` (`request_id` ASC);

ALTER TABLE `angler`.`parser`
ADD CONSTRAINT `fk_parser_request1`
  FOREIGN KEY (`request_id`)
  REFERENCES `angler`.`request` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
";
        $this->execute($s);
        return true;
	}

	public function down()
	{
        $this->dropTable('request');
        $this->dropForeignKey('request_id','parser');
        $this->dropColumn('parser','request_id');

		return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}