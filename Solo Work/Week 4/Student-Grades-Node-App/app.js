const express = require('express');
const mongoose = require('mongoose');
const keys = require('./config/keys');
const path = require('path');
const bodyParser = require('body-parser');
// mount express validator (this goes after bodyParser)
var validator = require('express-validator');


const app = express();

// set view engine
app.set('view engine', 'ejs');

// include public folder for js and css files
app.use(express.static(path.join(__dirname, "public")));

// connect to mongodb
mongoose.connect(keys.mongodb.dbURI, () => {
    console.log('connected to mongodb');
});

// middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));
app.use(validator());

// setup routes
const index = require('./routes/index');
app.use('/', index);

// // 404 error handling
// app.use(function(req, res, next) {
//     // if the route doesn't exist..
//     if (!req.route)
//         // let the user know
//         res.status(404).send('<h1>Uh oh! 404 error: page not found</h1><br><a href="/">Go Home</a>');
//     next();
// });

app.listen(3000, () => {
    console.log('app now listening for requests on port 3000');
});
