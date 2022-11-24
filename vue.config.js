const { defineConfig } = require("@vue/cli-service");
module.exports = defineConfig({
	transpileDependencies: true,
	// css: {
	// 	loaderOptions: {
	// 		sass: {
	// 			prependData: `
	//          @import "@/assets/sass/main.scss";
	//       `,
	// 		},
	// 	},
	// },
});

// css: {
//         loaderOptions: {
//             scss: {
//                 additionalData: `@import "@/assets/scss/main.scss";`,
//             },
//         },
//     },
