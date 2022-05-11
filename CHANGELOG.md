# Change log

This file documents code based changes to the front end framework.

## 11.05.2022 

1. Migrated from laravel 8 to laravel 9
2. Changed pagination by default to bootstrap 5 version
3. Upgraded various PHP libraries 

## 10.05.2022

1. Added static image card component for sections that are not database controlled.
2. Refactored footer images for better rendering
3. Refactored footer text for responsive layout and better display
4. Refactored collections landing page for don't repeat yourself code paradigm
5. Fixed issue with parallax padding and changed image
6. Fixed salary rendering
7. Refactored components
8. External software update - SOLR upgraded from 8.3.0 to 8.11.1 

## 09.05.2022

1. Fix collection landing page carousel for 3 tiles shifting
2. Refactor floor plan render 

## 08.05.2022 

1. Fix image quality issues using new key
2. Fix incorrect timezone for application

## 07.05.2022

1. Fix deprecated BS badges
2. Update image layout on profiles
3. Update NPM security alerts

## 06.05.2022 

1. Fix broken tiles from search layouts
2. Update IIIF issues

## 04.05.2022

1. Add IIIF viewing capabilities via Universal Viewer 4.
2. Add IIIF embeds to True to nature pages where available.

## 01.05.2022

1. NPM package updates and better compression of J's files
2. Add peripleo embed with fullscreen functions 

## 31.04.2022

1. Added geojson linked places geodata to render peripleo viewer

## 30.04.2022 

1. Bootstrap migration fixes - mainly data- attributes.
2. Added researcher attributions to TTN labels.

## 29.04.2022

1. Migrated Bootstrap version from 4.5 to 5 latest version 
2. Fix all breaking changes from BS migration
3. Remove docs folder with unwanted thumbnail

## 28.04.2022 

1. Added curators and external curators to exhibition pages
2. Change order for exhibitions on homepage
3. Implemented better minification of css/js
4. Upgraded webpack 

## 21.04.2022

1. Added True to Nature banner to homepage (this will need removal at end of the exhibition)
2. Change things to do -> Podcasts
3. Change exhibition model for home page to allow for featured instances
4. Changed layout for fundraising and added new component 
5. Added Tessitura search for related exhibition events

## 19.04.2022

1. Added Cockerell exhibition site to solr importer
2. Added Islander site to solr importer
3. Change jekyll site import list to configurable list via directus

## 18.04.2022
1. Added Spoliation MVC functions
2. Added Spoliation to solr importer

## 14.04.2022

1. Added Creative Economy website to solr import routine
2. Update opening hours blade template for markdown support
3. Added DOI and updated release

## 13.04.2022

1. Added plyr support to podcasts and audio guides

## 11.04.2022

1. Added True to Nature MVC functions
2. Added True to Nature Maps, Labels and Artists

## 05.04.2022

1. Added FAQ functions
2. New model, route, views, controller methods
