# README

cPanel-php-remote-backup is a simple php script that allows to make remote backups from a remote cPanel account to a ftp 
or scp server.

## Table of Contents

- [Background](#background)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Known limitations](#known-limitations)
- [Support](#support)
- [Contributing](#contributing)

## Background

Default cPanel full backup feature does not allow to schedule backups. To generate a backup and transfer to a remote ftp/scp 
server, you need generate it manually from your cPanel account.

This script aims to schedule full backup generation and ftp/scp transfer using cron and the 
[cPanel xmlapi-php PHP Class](https://github.com/CpanelInc/xmlapi-php)

## Requirements
- PHP 5.3.2+
- Composer
- cPanel version 11+


## Installation

[Download](https://github.com/fmfpereira/cpanel-php-remote-backup/releases) or 
[clone](https://github.com/fmfpereira/cpanel-php-remote-backup.git) the project.

Run composer to install dependencies.
```sh
composer install
```

## Usage

- Rename or copy example.settings.php to settings.php.
- Edit the new settings.php file and fill the cPanel and remote ftp server settings.
- Test configuration and backup generation:
    ```sh
    php cpanel-remote-ftp-backup.php
    ```
    - If everything goes ok, the script will end without any message, otherwise you will receive an error.
- Schedule script execution to the cron table.

## Known limitations

- At the moment this README was made, the [cPanel xmlapi-php PHP Class](https://github.com/CpanelInc/xmlapi-php) releases 
are too old. Since xmlapi-php does not provide a composer.json, this project composer configuration will fetch last commit from 
dev-master branch and register xmlapi.php Class for auto loading.
If you find any problem regarding to the xmlapi-php Class please [open an issue](https://github.com/fmfpereira/cpanel-php-remote-backup/issues/new)
or try to use an older version. The [cPanel xmlapi-php PHP Class](https://github.com/CpanelInc/xmlapi-php) commit used was b9593c7, from 18 Jan 2015.
- The [cPanel xmlapi-php PHP Class](https://github.com/CpanelInc/xmlapi-php) uses the [deprecated cPanel API 1](https://documentation.cpanel.net/display/SDK/cPanel+API+1+Functions+-+Fileman%3A%3Afullbackup). However, no equivalent backup function exists in newer APIs.

## Support

Please [open an issue](https://github.com/fmfpereira/cpanel-php-remote-backup/issues/new) for support.

## Contributing

Please contribute using [Github Flow](https://guides.github.com/introduction/flow/). 
Create a branch, add commits, and [open a pull request](https://github.com/fmfpereira/cpanel-php-remote-backup/compare).
