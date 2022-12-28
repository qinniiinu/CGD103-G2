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
<<<<<<< HEAD
				// target: 'https://tibamef2e.com/cgd103/g2/front/phpfile',
				target: 'http://localhost/cgd103_g2_frontend/phpfile',
=======
				target: 'https://tibamef2e.com/cgd103/g2/front/phpfile',
>>>>>>> e981bc49c9eab6bc5191126b7341fea13dd79577
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


