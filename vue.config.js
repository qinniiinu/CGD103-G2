const { defineConfig } = require("@vue/cli-service");
module.exports = defineConfig({
	transpileDependencies: true,
	css: {
		loaderOptions: {
			scss: {
				additionalData: `@import "@/assets/sass/main.scss";`,
			},
		},
	},
	publicPath: process.env.NODE_ENV === 'production'
		? '/cgd103/g2/front/'
		: '/',

	devServer: {

		proxy: {
			'/api_server': {
				target: 'https://tibamef2e.com/cgd103/g2/front/phpfile',
				changeOrigin: true,
				pathRewrite: {
					'^/api_server': ''
				}
			}
		}
	},
	productionSourceMap: false,
	filenameHashing: false
});


