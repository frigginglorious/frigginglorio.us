var path = require('path');
var webpack = require('webpack');

module.exports = {
    entry: './app.js',
    output: { path: __dirname, filename: 'bundle.js'},
    watch: true,
    module:{
        loaders:[
            {
                test: /.jsx?$/,
                loader: 'babel-loader',
                exclude: /node_modules/,
                query: {
                    presets: ['es2015' , 'react']
                }
            }
        ]
    },
};
