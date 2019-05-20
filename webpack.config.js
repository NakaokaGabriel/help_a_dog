const path = require('path');

module.exports = {
    entry: ['@babel/polyfill', './assets/js/style.js'],
    output: {
        path: path.resolve(__dirname, './assets/js/'),
        filename: 'style-min.js'
    }
};