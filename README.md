# Cloud Pool

A web based DNS (CoreDNS) Manager

## Overview

This application is a dashboard UI of CoreDNS with redis.
It makes managing DNS records with coredns and REDIS have the ease of
point and click.

The dashboard utilises Laravel livewire for interactive UI flows, with tailwindcss and
the [Flowbite dashboard design system](https://flowbite.com/)

## Installation

The installation for this project as the following requirements:

* CoreDNS (Compiled with [redis](https://github.com/arthurkay/coredns-redis))
* PostgreSQL Database
* Redis Server

***NOTE*** : 

* The application is currently only tested on Linux
* The application is currently only tested on Ubuntu 20.04

### Installation Steps

* Clone the repository

```bash
git clone https://github.com/arthurkay/cloud-pool
```

Then create the .env from the .env.example

```bash
cp .env.example .env
```

Add your database configuration parameters for both postgresql and redis to the .env file.

* Generate the application key;
  
```bash
php artisan key:generate
```

Then install composer packages

```bash
composer install
```


Then install npm packages

```bash
npm install
```

Then build the assets

```bash
npm run dev
```

Then migrate the database

```bash
php artisan migrate
```

Then run the application

```bash
php artisan serve
```