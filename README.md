# Frontpage Components
Executable code and blocks for the Baze front site

## Architecture
**Frontpage Module** (this repo) -> Frontpage Theme

## Properties
Module name: Baze_FrontpageComponents

Depends on [Baze frontsite theme](https://github.com/baze-magento/theme-baze).

## Notes
At this time, this module doesn't expose any pages directly to the internet. Blocks are to be invoked through CMS pages or the theme's components.

Some blocks are configured throuugh database tables. Where file storage is required, this is to be done through the `pub/media/` directory in the magento install; binary data should not be stored en masse in the database.