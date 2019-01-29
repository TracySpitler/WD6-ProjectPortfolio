// Node.js Assessment - #31

const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
    res.statusCode = 200;
    var url = req.url;
    if (url ==='/') {
        res.write('<h1>Full Sail Grads Rock!<h1>');
        res.end();
    }
    else {
        res.write('<h1>404 Not Found<h1>');
        res.end();
    }
});

server.listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
});
