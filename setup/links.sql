CREATE TABLE IF NOT EXISTS `links` (
    `last_crc` int(10) unsigned NOT NULL DEFAULT '0',
    `city_id` int(10) unsigned NOT NULL DEFAULT '0',
    `items` int(10) unsigned NOT NULL DEFAULT '0',
    PRIMARY KEY (`last_crc`,`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED KEY_BLOCK_SIZE=4