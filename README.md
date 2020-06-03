<p align="center" style="color:#007791">
  Kitakursus x kitabooking 
</p>

## Overview :tada:
<p>Kitabooking is application for booking transportation system. This repo is modified version from <b>@ranjithm9634</b>'s repo </p>

## Installation :zap:
```sh
$ cp .env.example .env
$ composer install
$ setup your .env
$ php artisan migrate
$ php artisan migrate --path=database/migrations/new
$ php artisan key:generate
$ php artisan serve
$ run browser localhost:8000
```

## Features & Plugins :art:
### Features
#### ADMIN
- Manage tickets
- Manage categories
- Manage reservations
- Manage members
- Manage brands
#### USER
- Manage MyTicket
- Searching ticket based category
- Book tickets
### Plugins
- bootstrapselectjs
- pickdatejs
- pickdatetimejs
- vanillamaskjs
- datatables (server side) using yajra

## Usage 
- register your user
- change to <b>true</b>=1 for access admin area 
- using factory to fill data if you don't have data

## Disclaimer
This repo originally created by @ranjithm9634

## License
MIT LICENSE
