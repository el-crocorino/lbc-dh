--2014-07-11 - create searches table

DROP TABLE IF EXISTS `search`;
CREATE TABLE IF NOT EXISTS `search` (
  `search_id` int(11) NOT NULL AUTO_INCREMENT,
  `search_user_id` int(11) NOT NULL,
  `search_flux_id` int(11) DEFAULT NULL,
  `search_title` varchar(150) NOT NULL,
  `search_created` datetime NOT NULL,
  `search_updated` datetime NOT NULL,
  PRIMARY KEY (`search_id`),
  CONSTRAINT fk_user_id
   FOREIGN KEY (search_user_id)
   REFERENCES user(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


#ALTER TABLE search
#ADD CONSTRAINT fk_user_id FOREIGN KEY (search_user_id) REFERENCES user(user_id);