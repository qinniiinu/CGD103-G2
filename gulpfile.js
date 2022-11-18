const { src, dest, series, parallel, watch } = require("gulp");

function defaultTask(cb) {
	console.log("gulp 成功");
	cb();
}
exports.c = defaultTask;

// //重新命名
// function file() {
// 	return src([
// 		"src/*.html",
// 		"src/*.css",
// 		"src/**/*.js",
// 		"!src/about.html",
// 	]).pipe(dest("dist/")); // 打包兩種不同檔案格式  !排除  **下一層目錄
// }
const rename = require("gulp-rename");

//壓縮css
const cleanCSS = require("gulp-clean-css");
function cssminify_F() {
	return src("src/front-end/*.css")
		.pipe(cleanCSS())
		.pipe(
			rename({
				extname: ".min.css",
			})
		)
		.pipe(dest("dist/front-end/css"));
}

//壓縮 js //醜化JS，壓縮JS
const uglify = require("gulp-uglify");
function js_F() {
	return src("src/front-end/js/*.js").pipe(dest("dist/front-end/js"));
}

//醜化JS，壓縮JS
function minijs_F() {
	return src("src/front-end/js/*.js")
		.pipe(uglify())
		.pipe(dest("dist/front-end/js"));
}

// //====== 同時壓縮 css js ======
// exports.combine = parallel(js, cssminify)

// rename 改檔名
function cssname_F() {
	return src("src/front-end/*.css")
		.pipe(
			rename({
				extname: ".min.css",
			})
		)
		.pipe(dest("dist/front-end/css"));
}

//sass 轉 css + 壓縮css
const sass = require("gulp-sass")(require("sass"));
const autoprefixer = require("gulp-autoprefixer");

function styleSass_F() {
	return src("src/front-end/sass/*.scss")
		.pipe(sass.sync().on("error", sass.logError))
		.pipe(
			autoprefixer({
				cascade: false,
			})
		)
		.pipe(cleanCSS())
		.pipe(dest("./dist/front-end/css"));
}

////sass 轉 css+ map
const sourcemaps = require("gulp-sourcemaps");

function styleSassmap_F() {
	return (
		src("src/front-end/sass/*.scss")
			.pipe(sourcemaps.init())
			// .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
			.pipe(sass.sync().on("error", sass.logError))
			.pipe(sourcemaps.write("./"))
			.pipe(dest("./dist/front-end/css"))
	);
}

// html layout
const fileinclude = require("gulp-file-include");
function html_F() {
	return src("src/front-end/*.html")
		.pipe(
			fileinclude({
				prefix: "@@",
				basepath: "@file",
			})
		)
		.pipe(dest("dist/front-end/"));
}

//壓縮圖片
const imagemin = require("gulp-imagemin");
function min_images_F() {
	return src(["src/front-end/images/*.*", "src/front-end/images/**/*.*"])
		.pipe(imagemin())
		.pipe(dest("dist/front-end/images"));
}

//圖片搬家
function img_F() {
	return src([
		"src/front-end/images/*.*",
		"src/front-end/images/**/*.*",
	]).pipe(dest("dist/front-end/images"));
}

// js 打包 es6 -> es5
const babel = require("gulp-babel");
function babel5_F() {
	return src("src/front-end/js/*.js")
		.pipe(
			babel({
				presets: ["@babel/env"],
			})
		)
		.pipe(uglify())
		.pipe(dest("dist/front-end/js"));
}

//back-end

//壓縮css
function cssminify_B() {
	return src("src/back-end/*.css")
		.pipe(cleanCSS())
		.pipe(
			rename({
				extname: ".min.css",
			})
		)
		.pipe(dest("dist/back-end/css"));
}

//壓縮 js //醜化JS，壓縮JS
function js_B() {
	return src("src/back-end/js/*.js").pipe(dest("dist/back-end/js"));
}

//醜化JS，壓縮JS
function minijs_B() {
	return src("src/back-end/js/*.js")
		.pipe(uglify())
		.pipe(dest("dist/back-end/js"));
}

//sass 轉 css + 壓縮css
function styleSass_B() {
	return src("src/back-end/sass/*.scss")
		.pipe(sass.sync().on("error", sass.logError))
		.pipe(
			autoprefixer({
				cascade: false,
			})
		)
		.pipe(cleanCSS())
		.pipe(dest("./dist/back-end/css"));
}

////sass 轉 css+ map

function styleSassmap_B() {
	return (
		src("src/back-end/sass/*.scss")
			.pipe(sourcemaps.init())
			// .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
			.pipe(sass.sync().on("error", sass.logError))
			.pipe(sourcemaps.write("./"))
			.pipe(dest("./dist/back-end/css"))
	);
}

// html layout
function html_B() {
	return src("src/back-end/*.html")
		.pipe(
			fileinclude({
				prefix: "@@",
				basepath: "@file",
			})
		)
		.pipe(dest("dist/back-end/"));
}

//壓縮圖片
function min_images_B() {
	return src(["src/back-end/images/*.*", "src/back-end/images/**/*.*"])
		.pipe(imagemin())
		.pipe(dest("dist/back-end/images"));
}

//圖片搬家
function img_B() {
	return src(["src/back-end/images/*.*", "src/back-end/images/**/*.*"]).pipe(
		dest("dist/back-end/images")
	);
}

// js 打包 es6 -> es5
function babel5_B() {
	return src("src/back-end/js/*.js")
		.pipe(
			babel({
				presets: ["@babel/env"],
			})
		)
		.pipe(uglify())
		.pipe(dest("dist/back-end/js"));
}

//刪除檔案
const clean = require("gulp-clean");
function clear() {
	return src("dist", { read: false, allowEmpty: true }) //不去讀檔案結構，增加刪除效率  / allowEmpty : 允許刪除空的檔案
		.pipe(clean({ force: true })); //強制刪除檔案
}

const browserSync = require("browser-sync");
const reload = browserSync.reload;

function index() {
	return src("src/*.html").pipe(dest("dist"));
}

function browser(done) {
	browserSync.init({
		server: {
			baseDir: "./dist",
			index: "index.html",
		},
		port: 3000,
	});
	watch("src/*.html", index).on("change", reload);
	watch(
		[
			"src/front-end/*.html",
			"src/front-end/layout/*.html",
			"src/front-end/layout/**/*.html",
		],
		html_F
	).on("change", reload);
	watch(
		["src/front-end/sass/*.scss", "src/front-end/sass/**/*.scss"],
		styleSassmap_F
	).on("change", reload);
	watch(
		["src/front-end/images/*.*", "src/front-end/images/**/*.*"],
		img_F
	).on("change", reload);
	watch(["src/front-end/js/*.js", "src/front-end/js/**/*.js"], js_F).on(
		"change",
		reload
	);
	watch(
		[
			"src/back-end/*.html",
			"src/back-end/layout/*.html",
			"src/back-end/layout/**/*.html",
		],
		html_B
	).on("change", reload);
	watch(
		["src/back-end/sass/*.scss", "src/back-end/sass/**/*.scss"],
		styleSassmap_B
	).on("change", reload);
	watch(["src/back-end/images/*.*", "src/back-end/images/**/*.*"], img_B).on(
		"change",
		reload
	);
	watch(["src/back-end/js/*.js", "src/back-end/js/**/*.js"], js_B).on(
		"change",
		reload
	);
	done();
}

exports.XXX = clear;
//開發用
exports.develop = series(
	index,
	parallel(
		html_F,
		styleSassmap_F,
		img_F,
		js_F,
		html_B,
		styleSassmap_B,
		img_B,
		js_B
	),
	browser
);

//上線用//沒有index
exports.online = series(
	clear,
	parallel(
		html_F,
		styleSass_F,
		min_images_F,
		babel5_F,
		html_B,
		styleSass_B,
		min_images_B,
		babel5_B
	)
);
