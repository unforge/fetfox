CREATE TABLE IF NOT EXISTS `cities` (
    `city_id` int(11) NOT NULL AUTO_INCREMENT,
    `country` varchar(100) NOT NULL DEFAULT '0',
    `country_crc` int(10) unsigned NOT NULL DEFAULT '0',
    `state` varchar(100) NOT NULL DEFAULT '0',
    `state_crc` int(10) unsigned NOT NULL DEFAULT '0',
    `city` varchar(100) NOT NULL DEFAULT '0',
    `city_crc` int(10) unsigned NOT NULL DEFAULT '0',
    PRIMARY KEY (`city_id`),
    UNIQUE KEY `city` (`country_crc`,`state_crc`,`city_crc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED KEY_BLOCK_SIZE=4