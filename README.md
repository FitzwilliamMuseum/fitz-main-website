# Framework for the Fitzwilliam Museum website

[![DOI](https://zenodo.org/badge/DOI/10.5281/zenodo.6304361.svg)](https://doi.org/10.5281/zenodo.6304361)[![ORCiD](https://img.shields.io/badge/ORCiD-0000--0002--0246--2335-green.svg)](http://orcid.org/0000-0002-0246-2335)


This repository contains the code base for a Laravel based front end for the latest version of @fitzwilliammuseum website.

The front end is very simple and uses Bootstrap latest framework, latest JQuery and various libraries to interface with a headless API provided by our installation of the @directus 8 system, Solr and ElasticSearch endpoints.

The models in this system point at an API rather than a database.  

## Data sources

Data comes from various systems and API endpoints.

1. Main content - Directus Headless CMS
2. Search content - SOLR 8.11.1 instance
3. Collections content - CIIM version 5 ElasticSearch instance from Knowledge Integration, standard mappings and the nascent API
4. Twitter - API driven
5. Shopify - FME systems queried and indexed daily into SOLR
6. Sketchfab
7. Instagram
8. Libsyn for podcasts
9. UCAM streaming media service
10. YouTube
11. Vimeo

## Cache

In production, we use REDIS. Locally use File based caching unless you want to install REDIS.

## Deployment 

View [deployment information](https://github.com/FitzwilliamMuseum/fitz-web-docs/blob/main/docs/websites/main-website/how-to-guides/deploying-code/from-github.md) on the Fitzwilliam Docs.   

## Installation

1. Install php 8.1 into your environment
2. Install composer and then do the following:
```
git clone git@github.com:FitzwilliamMuseum/fitz-main-website.git
cd fitz-main-website
composer install
php artisan key:generate
cp .env.example .env
npm install 
```
On some ubuntu machines, the npm install script fails at the npm run copy command. 
To fix this run the commands separately:

```bash
npm run copy-uv-html # "cp -R node_modules/universalviewer/dist/uv.html ./public", Universal viewer copy
npm run copy-uv-css # "cp -R node_modules/universalviewer/dist/uv.css ./public/",
npm run copy-uv-assets # "cp -R node_modules/universalviewer/dist/umd/ ./public/umd/",
npm run copy-icons # "cp -R node_modules/super-tiny-icons/images/svg/ ./public/images/svg/",
npm run copy-cookie-css # cp -R node_modules/vanilla-cookieconsent/dist/*.css ./resources/css/",
npm run copy-cookie-js # "cp -R node_modules/vanilla-cookieconsent/dist/*.js ./resources/js/",
npm run copy-pannellum-css # "cp -R node_modules/pannellum/build/*.css ./public/css/",
npm run copy-pannellum-js # "cp -R node_modules/pannellum/build/*.js ./public/js/",
```

If the versions have been updated you may need to run:

```bash
npm run production 
```

Which will compress all the css and js files. 

### Env setup 

Fill in variables for your instance (Cache etc), values from the production version of the websites are on
the main network drive. 

```
nano .env
```

### A few notes on env settings

Set `CACHE_DRIVER` to `redis` or `file` depending on your environment.

Set the `SOLR_ENABLED` flag to `true` or `false` based on whether Solr is supported in your environment.  

## Running a local copy 

If you are running locally you can preview the website via: 

```bash
php artisan serve
```

### I feel the need for speed

To cache icons and routes:

```bash
php artisan icons:cache
php artisan route:cache
```

## License

GPL V3

## Contributors

Daniel Pett @portableant
