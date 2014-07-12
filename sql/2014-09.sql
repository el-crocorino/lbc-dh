
DROP TABLE IF EXISTS `flux`;
CREATE TABLE IF NOT EXISTS `flux` (
  `flux_id` int(10) NOT NULL AUTO_INCREMENT,
  `flux_search_id` int(10) NOT NULL,
  `flux_user_id` int(10) NOT NULL,
  `flux_url` varchar(255) NOT NULL,
  `flux_last_check` datetime DEFAULT NULL,
  `flux_created` datetime NOT NULL,
  `flux_updated` datetime NOT NULL,
  PRIMARY KEY (`flux_id`),  
  CONSTRAINT fk_flux_user_id
   FOREIGN KEY (flux_user_id)
   REFERENCES user(user_id),
  CONSTRAINT fk_flux_search_id
   FOREIGN KEY (flux_search_id)
   REFERENCES search(search_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
