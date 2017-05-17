# README

cPanel-php-remote-backup is a simple php script that allows to make remote backups from a remote cPanel account to a ftp or scp server.

## Table of Contents

- [Background](#background)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Known limitations](#known-limitations)
- [Support](#support)
- [Contributing](#contributing)

## Background

Default cPanel full backup feature does not allow to schedule backups. To generate a backup and transfer to a remote ftp/scp server, you need generate it manually from your cPanel account.

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

### cPanel full backups are not rocket science and you should not rely on them, specially if you are using cheap shared hosting plans. ###

### **(USE IT AT YOUR OWN RISK)** ###

- At the moment this README was made, the [cPanel xmlapi-php PHP Class](https://github.com/CpanelInc/xmlapi-php) releases are too old. 
Since xmlapi-php does not provide a composer.json, this project composer configuration will fetch last commit from dev-master branch and register xmlapi.php Class for auto loading.
If you find any problem regarding to the xmlapi-php Class, please [open an issue](https://github.com/fmfpereira/cpanel-php-remote-backup/issues/new) or try to use an older version. 
The [cPanel xmlapi-php PHP Class](https://github.com/CpanelInc/xmlapi-php) commit used was b9593c7, from 18 Jan 2015.
- The [cPanel xmlapi-php PHP Class](https://github.com/CpanelInc/xmlapi-php) uses the [deprecated cPanel API 1](https://documentation.cpanel.net/display/SDK/cPanel+API+1+Functions+-+Fileman%3A%3Afullbackup). However, no equivalent backup function exists in newer APIs.
- Here are some common problems:
    - xmlapi-php Class returns success but the backup is not transferred to ftp server.
        - It's most likely that the generation process got stuck on cPanel.
    - xmlapi-php Class returns "Can't call method "login" on an undefined value" message.
        - It's most likely that the ftp transfer has been blocked. Some hosting providers only allow ftp backup transfers at a certain period of the day.
- In this cases try to manually run the backup generation/transfer on cPanel interface. 
    - If you get the same error try to contact to hosting provider.
    - If you are able to generate and transfer backup via cPanel and it fails with cPanel-php-remote-backup please open a [open an issue](https://github.com/fmfpereira/cpanel-php-remote-backup/issues/new) for support

## Support

Please [open an issue](https://github.com/fmfpereira/cpanel-php-remote-backup/issues/new) for support.

## Contributing

Please contribute using [Github Flow](https://guides.github.com/introduction/flow/). Create a branch, add commits, and [open a pull request](https://github.com/fmfpereira/cpanel-php-remote-backup/compare).