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
				target: 'http://localhost/cgd103_g2_frontend/phpfile',
				changeOrigin: true,
				pathRewrite: {
					'^/api_server': ''
				}
			}
		}
	},
<<<<<<< HEAD
	productionSourceMap: false
=======
	productionSourceMap: false,
	filenameHashing: false
>>>>>>> b236b4971c985d95551e463ae00636739844b942
});


