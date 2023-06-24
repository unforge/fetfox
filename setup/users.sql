CREATE TABLE IF NOT EXISTS `users` (
    `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
    `gender` enum('male','female') NOT NULL,
    `title` varchar(255) NOT NULL DEFAULT '',
    `first` varchar(255) NOT NULL DEFAULT '',
    `last` varchar(255) NOT NULL DEFAULT '',
    `last_crc` int(10) unsigned NOT NULL DEFAULT '0',
    `enail` varchar(255) NOT NULL DEFAULT '',
    `phone` varchar(20) NOT NULL DEFAULT '',
    `cell` varchar(20) NOT NULL DEFAULT '',
    `nat` varchar(2) NOT NULL DEFAULT '',
    `id` varchar(50) NOT NULL DEFAULT '',
    `picture` varchar(100) NOT NULL DEFAULT '',
    `postcode` mediumint(8) unsigned NOT NULL DEFAULT '0',
    `street` varchar(100) NOT NULL DEFAULT '',
    `coordinates` varchar(50) NOT NULL DEFAULT '',
    `timezone` varchar(50) NOT NULL DEFAULT '',
    `dob` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `registered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `city_id` int(10) unsigned NOT NULL DEFAULT '0',
    `uuid` varchar(36) NOT NULL DEFAULT '',
    `username` varchar(30) NOT NULL DEFAULT '',
    `password` varchar(30) NOT NULL DEFAULT '',
    `salt` varchar(10) NOT NULL DEFAULT '',
    `md5` varchar(32) NOT NULL DEFAULT '',
    `sha1` varchar(40) NOT NULL DEFAULT '',
    `sha256` varchar(64) NOT NULL DEFAULT '',
    PRIMARY KEY (`user_id`),
    KEY `city` (`last_crc`,`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED KEY_BLOCK_SIZE=4