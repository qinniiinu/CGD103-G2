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
function cssminify() {
	return src("src/*.css")
		.pipe(cleanCSS())
		.pipe(
			rename({
				extname: ".min.css",
			})
		)
		.pipe(dest("dist/css"));
}

//壓縮 js //醜化JS，壓縮JS
const uglify = require("gulp-uglify");
function js() {
	return src("src/js/*.js").pipe(dest("dist/js"));
}

//醜化JS，壓縮JS
function minijs() {
	return src("src/js/*.js").pipe(uglify()).pipe(dest("dist/js"));
}

// //====== 同時壓縮 css js ======
// exports.combine = parallel(js, cssminify)

// rename 改檔名
function cssname() {
	return src("src/*.css")
		.pipe(
			rename({
				extname: ".min.css",
			})
		)
		.pipe(dest("dist/css"));
}

//sass 轉 css + 壓縮css
const sass = require("gulp-sass")(require("sass"));
const autoprefixer = require("gulp-autoprefixer");

function styleSass() {
	return src("src/sass/*.scss")
		.pipe(sass.sync().on("error", sass.logError))
		.pipe(
			autoprefixer({
				cascade: false,
			})
		)
		.pipe(cleanCSS())
		.pipe(dest("./dist/css"));
}

////sass 轉 css+ map
const sourcemaps = require("gulp-sourcemaps");

function styleSassmap() {
	return (
		src("src/sass/*.scss")
			.pipe(sourcemaps.init())
			// .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
			.pipe(sass.sync().on("error", sass.logError))
			.pipe(sourcemaps.write("./"))
			.pipe(dest("./dist/css"))
	);
}

// html layout
const fileinclude = require("gulp-file-include");
function html() {
	return src("src/*.html")
		.pipe(
			fileinclude({
				prefix: "@@",
				basepath: "@file",
			})
		)
		.pipe(dest("dist"));
}

//壓縮圖片
const imagemin = require("gulp-imagemin");
function min_images() {
	return src(["src/images/*.*", "src/images/**/*.*"])
		.pipe(imagemin())
		.pipe(dest("dist/images"));
}

//圖片搬家
function img() {
	return src(["src/images/*.*", "src/images/**/*.*"]).pipe(
		dest("dist/images")
	);
}

// js 打包 es6 -> es5
const babel = require("gulp-babel");
function babel5() {
	return src("src/js/*.js")
		.pipe(
			babel({
				presets: ["@babel/env"],
			})
		)
		.pipe(uglify())
		.pipe(dest("dist/js"));
}

//刪除檔案
const clean = require("gulp-clean");
function clear() {
	return src("dist", { read: false, allowEmpty: true }) //不去讀檔案結構，增加刪除效率  / allowEmpty : 允許刪除空的檔案
		.pipe(clean({ force: true })); //強制刪除檔案
}

const browserSync = require("browser-sync");
const reload = browserSync.reload;

function browser(done) {
	browserSync.init({
		server: {
			baseDir: "./dist",
			index: "index.html",
		},
		port: 3000,
	});
	watch(["src/*.html", "src/layout/*.html", "src/layout/**/*.html"], html).on(
		"change",
		reload
	);
	watch(["src/sass/*.scss", "src/sass/**/*.scss"], styleSassmap).on(
		"change",
		reload
	);
	watch(["src/images/*.*", "src/images/**/*.*"], img).on("change", reload);
	watch(["src/js/*.js", "src/js/**/*.js"], js).on("change", reload);
	done();
}

exports.XXX = clear;
//開發用
exports.develop = series(parallel(html, styleSassmap, img, js), browser);

//上線用
exports.online = series(clear, parallel(html, styleSass, min_images, babel5));
