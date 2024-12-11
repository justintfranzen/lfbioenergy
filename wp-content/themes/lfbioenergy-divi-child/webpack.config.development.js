const path = require('path');

// -----------------------------------------------------------------------------

const clientConfig = {
  mode: 'development',
  entry: {
    index: path.resolve(__dirname, 'js/index.js'),
  },
  output: {
    path: path.resolve(__dirname, './dist'),
    filename: '[name].js',
  },
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: ['babel-loader'],
      },
    ],
  },
};

// -----------------------------------------------------------------------------

module.exports = clientConfig;
