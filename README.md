# Framework for the Fitzwilliam Museum website

[![DOI](https://zenodo.org/badge/DOI/10.5281/zenodo.6304361.svg)](https://doi.org/10.5281/zenodo.6304361)[![ORCiD](https://img.shields.io/badge/ORCiD-0000--0002--0246--2335-green.svg)](http://orcid.org/0000-0002-0246-2335)


This repository contains the code base for a Laravel based front end for the latest version of @fitzwilliammuseum website.

The front end is very simple and uses Bootstrap latest framework, latest JQuery and various libraries to interface with a headless API provided by our installation of the @directus 8 system, Solr and ElasticSearch endpoints.

The models in this system point at an API rather than a database.  

# Data sources

Data comes from various systems and API endpoints.

1. Main content - Directus Headless CMS
2. Search content - SOLR 7.x instance
3. Collections content - ElasticSearch instance from Knowledge Integration, standard mappings and the nascent API
4. Twitter - API driven
5. Shopify - FME systems queried and indexed daily into SOLR
6. Sketchfab
7. ~~Google Poly~~ deprecated as of June 2021
8. Instagram

# Cache

In production, we use REDIS. Locally use File based caching unless you want to install REDIS.

# installation

1. Install php 8.1 into your environment
2. Install composer and then do the following
```
$ git clone https://github.com/FitzwilliamMuseum/fitz-main-website
$ cd fitz-main-website
$ composer install
$ cp .env.example .env
$ nano .env
$ npm install 
```
Fill in variables for your instance (Cache etc)

If you are running locally you can preview the website via: 

```
$ php artisan serve
```

# License

GPL V3

# Contributors

Daniel Pett @portableant
