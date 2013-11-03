# Teegas

## What does it do?

Teegas is a micro CMS with Google Spreadsheet as a database. This tool is designed for sites that are up around 500 pages. (Though it has never been tested but 1 line content with 1,000 pages worked ok.)
Although this is using Google spreadsheet as a database, it still uses files as a cahche, current version can't be used in cloud environment.

## How to use

1. Install the PHP modules onto server environment.
2. Manually modify config.php in the rootfolder especially, (1) SITETITLE with site title, (2) URL_PUBLIC with URL, (3) Google spreadsheet key. Others are not mandatory to change.
3. Change name of _htaccess to .htaccess and update the root directory in case if you install Teegas on subdirectory.

### Requirements

Teegas requires PHP 5.3 and mod_rewrite functionality.

## Templates

Templates are on themes/default directory. In case if you like to modify, please copy the folder contents and modify it. Then update THEME definition to the name you gave to the folder.
At this momemnt, some of the formats (templates) are built in the code itself, you may have to update them accordingly.


