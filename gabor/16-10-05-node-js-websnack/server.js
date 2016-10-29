var request = require('request');

var htmlFromExternalServer = "";

request('http://jcrud.io', function (error, response, body) {
  if (!error && response.statusCode == 200) {
    // console.log(body) // Show the HTML for the Google homepage. 
    htmlFromExternalServer = body;
  }
})


//////////////////////////////////////////////////////////////////
/* 1. Getting started */
//////////////////////////////////////////////////////////////////

// tell the system that we need to use express that we need to be able to deliver websites to deliver APIs

/*var express = require("express");

// create an app/website that uses the code form express
var app = express();

// create a very simple website
app.get("/", function(req, res){
	res.send("Hello from websnack")
})

// open the server and listen to incoming traffic/requests
app.listen(80, function(){
	console.log("Server running on port 80");
});*/

//////////////////////////////////////////////////////////////////
/* 2. Developing Nodejs application*/
//////////////////////////////////////////////////////////////////

// var express = require("express");
// // file system 
// var fs = require("fs");
// var app = express();

// app.get("/", function(req, res){
// 	// Open the file, read the contents
// 	// of it and give it to the brower
// 	var oneHtml = fs.readFileSync( __dirname+"/one.html", "utf8" );
// 	res.send(oneHtml)
// })

// app.get("/awesome", function(req, res){
// 	// Open the file, read the contents
// 	// of it and give it to the brower
// 	var oneHtml = fs.readFileSync( __dirname+"/two.html", "utf8" );
// 	res.send(oneHtml)
// })

// app.listen(80, function(){
// 	console.log("Server running on port 80");
// });


//////////////////////////////////////////////////////////////////
/* 3. Improving Nodejs application*/
//////////////////////////////////////////////////////////////////

var express = require("express");
// file system 
var fs = require("fs");
var app = express();

// when I start the server load the CSS into RAM
var theCss = fs.readFileSync(__dirname + "/app.css", "utf8")

// Save info in RAM
var oneHtml = fs.readFileSync( __dirname+"/master.html", "utf8" );
	oneHtml = oneHtml.replace("{{NUMBER}}", "ONE");
	oneHtml = oneHtml.replace("{{TITLE}}", "ONE");
	oneHtml = oneHtml.replace("{{CSS}}", theCss);
	oneHtml = oneHtml.replace("{{COLOR}}", "#3351B5");

var twoHtml = fs.readFileSync( __dirname+"/master.html", "utf8" );
	twoHtml = twoHtml.replace("{{NUMBER}}", "TWO");
	twoHtml = twoHtml.replace("{{TITLE}}", "TWO");
	twoHtml = twoHtml.replace("{{CSS}}", theCss);
	twoHtml = twoHtml.replace("{{COLOR}}", "#3351B5");

app.get("/", function(req, res){
	res.send(htmlFromExternalServer);
})

app.get("/two", function(req, res){
	res.send(twoHtml)
})

app.listen(80, function(){
	console.log("Server running on port 80");
});