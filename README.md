# Beta framework for the Fitzwilliam Museum website

This repository contains the code base for a Laravel based front end for a beta version of @fitzwilliammuseum website. The front end is very simple and uses Bootstrap 4.5.2 framework, latest JQuery and various libraries to interface with a headless API provided by our installation of the @directus system, Solr and ElasticSearch endpoints.

At the moment, it is mostly VC rather than MVC architecture. No database is currently used to power functions as all data is JSON based search and retrieve.

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

1. Install php 7+ on your development environment
2. Install composer
3. git clone https://github.com/FitzwilliamMuseum/beta.fitz.ms
4. cd beta.fitz.ms
5. composer install
6. cp .env.example .env
7. nano .env
8. Fill in variables for your instance (Cache etc)
9. php artisan serve

# Screenshot

![](docs/screenshots/beta.fitz.ms.png)

# License

GPL V3

# Contributors

Daniel Pett @portableant
