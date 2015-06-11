CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL,
  `price` float(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
)
