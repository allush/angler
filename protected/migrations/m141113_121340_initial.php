<?php

class m141113_121340_initial extends CDbMigration
{
	public function up()
	{
$s="
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `head` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблицы `news_tag`
--

DROP TABLE IF EXISTS `news_tag`;
CREATE TABLE `news_tag` (
  `tags_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  KEY `fk_news_tag_tags1_idx` (`tags_id`),
  KEY `fk_news_tag_news1_idx` (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `parser`
--

DROP TABLE IF EXISTS `parser`;
CREATE TABLE `parser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=150 ;

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `is_confirmed` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `coord_x` float DEFAULT NULL,
  `coord_y` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photo_user_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Структура таблицы `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `network` text,
  `identity` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;
";
        $this->execute($s);
        return true;
	}

	public function down()
	{
		$this->dropTable('user');
        $this->dropTable("score");
        $this->dropTable("news");
        $this->dropTable("news_tag");
        $this->dropTable("parser");
        $this->dropTable("photo");
		return false;
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