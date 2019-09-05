# Welcome to InstantCar
![Version](https://img.shields.io/badge/version-1.0.0-blue.svg?cacheSeconds=2592000)
![Documentation](https://img.shields.io/badge/documentation-yes-brightgreen.svg)
  
  
## InstantCar
InstantCar is a small web application for car rent. 

## Structure
1. On the main page, you can see the big picture with the main advert, a link to a catalogue with filter and block with "best" cars for sale. Each car has a short description, a photo and a link to the detail page.

2. On cars page, there is a catalogue of all available cars and a filter with two parameters "carmaker" and "model" filtered alphabetically. Each car has its own description, a photo and a link to the detail page. When you select carmaker, cars are automatically sorted by this selection and the "model" filter automatically fills with available models for this car brand, a catalogue automatically refreshes to show cars filtered by those parameters. If you will push the "Reset" button filter will be reset.

3. Detail page contains a full description of the car, a photo gallery and a button to reserve this car. You can reserve the car by pressing the button "Make reserve" and the car will be hidden from the filter and no longer available on the cars page – you will obtain popup with message "Reservation successful!". If you will push the button again you will have the popup with message "Already reserved".

## Features
- Server-side rendering of the main page and detailed pages makes the site friendly to SEO;
- Mobile-first allows you to use it both on mobile devices and on the desktop;
- The application works with JSON API, which can be easily used for a mobile application or integrated with other services;
- The filter with ReactJS is very fast and does all the work with lightweight API calls.

## Easy start from example docker image
docker run -tid -p 80:80 --name="instant_car_project" ckomop0x/instant-car:v0.4

## Installation
**With local apache server**  
Put project files to a server with Apache that supports PHP 5.6+.

**With Docker**

***Build local docker image***  
docker build -f Dockerfile.dev -t development/auto-site:dev .

***Run local docker image***  
docker run -tid -p 80:80 --name="auto_site_server" -v /Users/<your-local-account>/<projects-folder>/autoSite:/var/www/html development/auto-site:dev

docker run -tid -p 80:80 --name="auto_site_server" -v /Users/p.klochkov/Webtime/autoSite:/var/www/html development/auto-site:dev

***Example***  
docker run -tid -p 80:80 --name="instant_car_server" -v /Users/p.klochkov/Projects  /InstantCar:/var/www/html development/instant-car:dev


##Used technologies
**Data**    
JSON
    
**Backend**    
PHP

**Frontend**  
1. Project builder – webpack2
2. Templates - pug (ex-jade)
3. Styles – preprocessor stylus, postcss(autoprefixer), Bootstrap 4
4. JS – vanillaJS(ES6), React, jQuery for Boostrap, BootstrapJS
	
Structure
----------

**folders**  
- app (js scripts, styles, templates)  
- assets (fonts, images, js libs)  
- data (data bases)
- dist (compiled scripts and styles)  
- docs (generated js documentation)
- helpers (php functions)
- pages (page templates)

**root directory**  

scripts  
- api.php (main application POST API)
- index.php (application router)  
- page (application body)
  
other
- package.json (npm dependencies and start/develop scripts)  
- esdoc.json (config for esdoc)
- .eslint (JS linter)
- .htaccess (rules for webserver)
- webpack.config.js (webpack config)
- yarn.lock (Yarn needs to store exactly which versions of each dependency were installed)
- README.md (project description)
- .dockerignore (exclude some files from docker build)
- .gitignore (exclude some files from git)
- .default.conf ( apache config for this project)
- Dockerfile.build & Dockerfile.dev (docker configs for deploy and for develop)
    
## Development
	Install dependecies:
	$ npm install               # via npm
	$ yarn install              # via yarn
	
	Develop
	$ npm start                 # via npm
    $ yarn start                # via yarn
	
	Build
	$ npm build                 # via npm
    $ yarn build                # via yarn
    
All templates are stored in *app/templates*, styles in *app/stylesheet* and js in *app/js*.  
When "develop" mode is started, webpack is looking for changes, rebuilds the packages and replace the links in application head and body with new ones. The code is divided into small blocks. In develop mode JS and CSS are generated with .map inside so it' very common to navigate and debug.

Build
------

**With Docker**  
docker build -f Dockerfile.build -t <your-docker-account>/<project-name>:<version-tag> .

Documentation 
----------------

For js documentation I use [https://esdoc.org/|ESDocs]

	# install ESDoc from npm
	$ npm install -g esdoc      # via npm
	$ yarn install -g esdoc     # via yarn
	
	#run ESDoc
	$ npm doc                   # via npm
    $ yarn doc                  # via yarn

TODO
----

- Architecture - add some kind of user identification and store reserve only for some time. If a car(s) wouldn't be bought release it;  
- Backend - add 404 page for a detail car page (/auto/dsaadsasd);
- Search page – add a button for show/hide reserved(by this user) cars, add "on the fly" routing for the possibility to give a link on a filter presets (it can be easily implemented with React-router4). 

Performance Considerations
--------------------------

- Better to render and cache on server side pages like main or detail like small composite blocks because they wouldn't be changed very often;
- Pictures and scripts preferably to keep on CDN. And, of cause, use Gzip and a client side cache of scripts, pictures and styles;
 
- Split API data into smaller blocks and if some change happens (a car reserve or a sell) refresh this block. For API it's better to keep them in memory. We can recieve ID and price from one server and then fetch additional data (description, pictures) from other servers using the recieved ID. It is more complex but lowers load and splits requests on as many resources as we want.

- For the best performance very good decision is to keep an API and a static content on the different servers/subdomains and if a load is growing very quickly or a load is a very high, implement a possibility to change API dynamically. It can be done at least in two ways:
 - from the server side (user will obtain API address when it come);
 - from client side (script will change API address to next if does not have a response from current - very useful feature for mobile clients because they have preloaded client part)
 
Decisions
---------

Architecture - I decided to make the filter on the client side to minimize a load on the server. It to request data and made all view rendering on the client side. For styles I use Stylus it helps me keep the code clean and split it to small easy to read peaces. For HTML rendering I use pug - I can split code to small parts, make mixins, includes and etc.  

Version control 
----------------

Git


License
-------

The project is developed for demand.