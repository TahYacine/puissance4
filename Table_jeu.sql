DROP TABLE IF EXISTS `tablesave`;
CREATE TABLE IF NOT EXISTS `tablesave` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `JoueurActuel` varchar(100) NOT NULL,
  `JoueurSuivant` varchar(100) NOT NULL,
  `Grille` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=armscii8;