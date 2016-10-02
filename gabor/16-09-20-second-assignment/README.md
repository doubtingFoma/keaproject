#Stock Exchange Simulator

Second mandatory assignment for *Web Development* class - Web Development KEA 2016 Fall.

## File structure

  - `config` contains the configuration settings of the application and the router
  - `database` contains the database storing information about the users, stocks and companies
  - `pages` contains the pages (e.g.: `login`, `home` etc.)
  - `style` contains the stylesheets
  - `webapi` contains the webapi being responsible for handling requests and communicating with the database. 

## Flow

  1. `index.php` is a wrapper. This is a single-page application meaning that `index.php` is always the page being loaded.
  2. `index.php` includes one of the pages in `pages/`. By default it is `pages/login.php`.
  3. `router.php` is responsible for maintaining the acces to each page. If the user is allowed to see the requested page, the `router.php` will return the requested page to `index.php`. 
  4. Most of the pages include an ajax call. The ajax call sends a request for the `webapi.php`. The webapi processes the request, gets information from the `database`, and sends back a response object to the page. 
  5. The page processes the response object, may manipulate the DOM or redirect to another page (which is the `index.php` again, but with a different page included in it), and the loop starts again.

## Dummy users

  - Log in as customer with `customer@customer.customer` and `customer` or create a new account
  - Log in as administrator with `admin@admin.admin` and `admin`