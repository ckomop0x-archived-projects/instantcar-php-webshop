InstantCar
========

InstantCar is a small web application for car rent. 


Structure
--------
1. On the main page, you can see the big picture with the main advert, a link to a catalogue with filter and block with "best" cars for sale. Each car has a base description, photo and link to the detail page.

2. On cars page, there is a catalogue of all available cars and filter with two parameters "carmaker" and "model" filtered alphabetically. Each car has its own description, photo and a link to the detail page. When you select carmaker cars automatically sort by this selection and "model" filter automatically fills with allowable models for this car brand, a catalogue automatically refreshes to show cars filtered by those parameters. If you will push the "Reset" button filter will be reset.

3. Detail page contains a full description of the car, photo gallery and button to reserve this car. You can reserve the car by pressing the button "Make reserve" and the car will be hidden from the filter and no longer available on the cars page – you will obtain popup with message "Reservation successful!". If you will push the button again you will have the popup with message "Already reserved".

Look how easy it is to use:

	import project
    # Get your stuff done
    project.do_stuff()

Features
--------

- server rendering of the main page and detailed pages makes the site friendly to SEO;
- Mobile-first allows you to use it both on mobile devices and on the desktop;
- The application works with JSON API, which can be easily used for a mobile application or integrated with any other service;
- The filter with ReactJS is very fast and does all the work with lightweight API calls.


Installation
------------

Just put it to a server with Apache that support PHP 5.6+  

    install project
    
Development
------------



Contribute
----------

- Issue Tracker: github.com/$project/$project/issues
- Source Code: github.com/$project/$project

Support
-------

If you are having issues, please let us know.
We have a mailing list located at: project@google-groups.com

License
-------

The project is licensed under the BSD license.