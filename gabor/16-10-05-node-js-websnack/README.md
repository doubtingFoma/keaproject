# Node.js Websnack

## 1. Getting started

  1. Install Nodejs from [nodejs.org](https://nodejs.org/)
  2. Create a project folder
  3. Create `package.json`
  4. Add `express` as dependency, then `npm install`
  5. Create `server.js`, which requires `express` and creates an `express` app
  6. Create routing (`app.get(...){}`)
  7. Start listening
  8. Check result on `localhost`
	
## 2. Developing Nodejs application

  1. Create a page called `one.html`
  2. Include `fs` (file system)
  3. Open one.html
  4. *Exercise*: create a page called `two.html` and display that instead of `one.html`
  5. Display page `one.html` on root (`localhost/`) and page `two.html` on `localhost/awesome`

## 3. Improving Nodejs application

  1. Install `nodemon` as a devDependency
  2. Instead of `node server.js` run `nodemon server.js`
  3. Create a page called `master.html`
  4. Serve `master.html` on `/one` and `/two` and replace the content of it
  5. Save information in RAM instead of Hard drive to make it fast
  6. Create `app.css`
  7. When starting the server, load the CSS into RAM
