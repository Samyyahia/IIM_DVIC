module.exports = {
  css: {
    loaderOptions: {
      sass: {
        prependData: '@import "~@/assets/scss/style.scss";'
      }
    }
  },
  devServer: {
    proxy: {
      '^/api': {
        target: 'http://localhost:3000',
        changeOrigin: true,
        logLevel: 'debug',
        secure: false,
        pathRewrite: { '^/api': '' }
      }
    }
  }
}
