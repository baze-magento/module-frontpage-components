# Frontpage Components
Executable code and blocks for the Baze front site

## Architecture
**Frontpage Module** (this repo) -> Frontpage Theme

## Properties
Module name: Baze_FrontpageComponents

## Notes
At this time, this module doesn't expose any pages directly to the internet. Blocks are to be invoked through CMS pages or the theme's components.

Some blocks are configured throuugh database tables. Where file storage is required, this is to be done through the `pub/media/` directory in the magento install; binary data should not be stored en masse in the database.

This module expects a database table in the `baze` database with the following create statement:

```sql
CREATE TABLE `segment_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL,
  `url_key` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `thumbnail_uri` varchar(255) DEFAULT NULL,
  `html_content` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_key` (`url_key`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
```
