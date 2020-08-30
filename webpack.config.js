// webpack.config.js
const defaultConfig = require("./node_modules/@wordpress/scripts/config/webpack.config");
// // console.log('defaultConfig', defaultConfig)
module.exports = {
  ...defaultConfig,
  module: {
    ...defaultConfig.module,
    rules: [
      ...defaultConfig.module.rules,
      {
        test: /\.svg$/,
        use: ["@svgr/webpack", "url-loader"]
      }
    ]
  }
};