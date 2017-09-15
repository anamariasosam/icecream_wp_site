// Include gulp
var gulp = require('gulp');
var browserSync = require('browser-sync').create();

// Include Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var concatCss = require('gulp-concat-css');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var cssmin = require('gulp-cssmin');
// var debug = require('gulp-debug');

// Concatenate core js files
gulp.task('core-shortcodes-js', function () {
    return gulp.src([
        '../../../../plugins/eltdf-core/shortcodes/**/assets/js/*.js',
    ]).pipe(concat('shortcodes.js'))
        .pipe(gulp.dest('../../../../plugins/eltdf-core/assets/js'));
});

// Concatenate core js files
gulp.task('core-cpt-js', function () {
	return gulp.src([
		'../../../../plugins/eltdf-core/post-types/**/assets/js/*.js',
	]).pipe(concat('custom-post-types.js'))
		.pipe(gulp.dest('../../../../plugins/eltdf-core/assets/js'));
});

// Concatenate header js files
gulp.task('header-js', function () {
	return gulp.src([
		'../../framework/modules/header/types/**/assets/js/*.js',
	]).pipe(concat('header-types.js'))
		.pipe(gulp.dest('../../framework/modules/header/assets/js'));
});


// Concatenate theme js files
gulp.task('js', ['header-js', 'core-shortcodes-js', 'core-cpt-js'], function () {
	return gulp.src([
        '../js/modules/global.js',
		'../js/modules/common.js',
		'../js/modules/blog.js',
		'../../framework/modules/header/assets/js/header.js',
		'../../framework/modules/header/assets/js/header-types.js',
		'../../framework/modules/footer/assets/js/footer.js',
		'../js/modules/title.js',
		'../js/modules/like.js',
        '../../../../plugins/eltdf-core/assets/js/shortcodes.js',
		'../../../../plugins/eltdf-core/assets/js/custom-post-types.js',
        '../../framework/modules/woocommerce/assets/js/woocommerce.js'
	]).pipe(concat('modules.js'))
		.pipe(gulp.dest('../js'));
});

// Minify JS
gulp.task('minifyjs', ['js'], function () {
	return gulp.src([
		'../js/modules.js',
	]).pipe(uglify())
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest('../js'))
});

// Compile Core Sass
gulp.task('core-sass', function () {
    return gulp.src('../../../../plugins/eltdf-core/assets/css/scss/*.scss')
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(sassGlob())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(sourcemaps.write('../../../../plugins/eltdf-core/assets/css'))
        .pipe(gulp.dest('../../../../plugins/eltdf-core/assets/css'))
});

// Compile Woo Sass
gulp.task('woo-sass', function () {
    return gulp.src('../../framework/modules/woocommerce/assets/css/scss/*.scss')
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(sassGlob())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(sourcemaps.write('../css'))
        .pipe(gulp.dest('../css'))
});

// Compile Header Global Sass
gulp.task('header-sass', function () {
	return gulp.src('../../framework/modules/header/assets/css/scss/*.scss')
		.pipe(sourcemaps.init({loadMaps: true}))
		.pipe(sassGlob())
		.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
		.pipe(sourcemaps.write('../css'))
		.pipe(gulp.dest('../../framework/modules/header/assets/css'))
});

// Compile Theme Sass
gulp.task('sass', function () {
	return gulp.src('../css/scss/*.scss')
		.pipe(sourcemaps.init({loadMaps: true}))
		.pipe(sassGlob())
		.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
		.pipe(sourcemaps.write('../css'))
		.pipe(gulp.dest('../css'))
});

//Concate default core, header and theme css files
gulp.task('concat-modules-css', ['core-sass','header-sass','sass'], function () {
    return gulp.src([
    	    '../css/modules.css',
	        '../../framework/modules/header/assets/css/header.css',
	        '../../../../plugins/eltdf-core/assets/css/shortcodes.css',
	        '../../../../plugins/eltdf-core/assets/css/custom-post-types.css'
        ])
        .pipe(concatCss('../css/modules.css'))
        .pipe(gulp.dest('../css'))
});

//Concate responsive core, header and theme css files
gulp.task('concat-modules-css-responsive', ['core-sass','header-sass','sass'], function () {
    return gulp.src([
    	    '../css/modules-responsive.css',
	        '../../framework/modules/header/assets/css/header-responsive.css',
	        '../../../../plugins/eltdf-core/assets/css/shortcodes-responsive.css',
	        '../../../../plugins/eltdf-core/assets/css/custom-post-types-responsive.css'
        ])
        .pipe(concatCss('../css/modules-responsive.css'))
        .pipe(gulp.dest('../css'))
});

//Minify css files
gulp.task('minifycss', ['concat-modules-css','concat-modules-css-responsive','woo-sass'], function () {
	return gulp.src([
		'../css/modules.css',
		'../css/modules-responsive.css',
		'../css/woocommerce.css',
		'../css/woocommerce-responsive.css'
	])
		.pipe(cssmin())
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest('../css'))
		.pipe(browserSync.stream())
});

// Lint Task
gulp.task('lint', function () {
    return gulp.src([
        '../js/modules.js',
    ])
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Default Task
gulp.task('default', ['js', 'concat-modules-css','concat-modules-css-responsive','woo-sass']);

// Minify Files
gulp.task('minify', ['minifyjs', 'minifycss']);

// Watch Files For Changes
gulp.task('watch', function () {
    gulp.watch([
        '../../../../plugins/eltdf-core/shortcodes/**/assets/css/scss/**/*.scss',
        '../../../../plugins/eltdf-core/post-types/**/assets/css/scss/**/*.scss',
        '../../framework/modules/woocommerce/assets/css/scss/**/*.scss',
        '../../framework/modules/woocommerce/shortcodes/**/assets/css/scss/**/*.scss',
        '../../framework/modules/woocommerce/plugins/**/assets/css/scss/**/*.scss',
	    '../../framework/modules/header/assets/css/scss/**/*.scss',
	    '../../framework/modules/header/types/**/assets/css/scss/**/*.scss',
        '../css/scss/**/*.scss'
    ], ['minifycss']);
    gulp.watch([
        '../../../../plugins/eltdf-core/shortcodes/**/assets/js/*.js',
        '../../../../plugins/eltdf-core/post-types/**/assets/js/*.js',
        '../../framework/modules/woocommerce/assets/js/*.js',
        '../../framework/modules/woocommerce/shortcodes/**/assets/js/*.js',
        '../../framework/modules/woocommerce/plugins/**/assets/js/*.js',
	    '../../framework/modules/header/assets/js/*.js',
	    '../../framework/modules/header/types/**/assets/js/*.js',
	    '../../framework/modules/footer/assets/js/*.js',
        '../js/modules/*.js'
    ], ['minifyjs']);
});

// Watch with browser sync
gulp.task('dev', function () {
    browserSync.init({
        proxy: 'sweettooth.dev'
    });

    gulp.watch([
        '../../../../plugins/eltdf-core/shortcodes/**/assets/css/scss/**/*.scss',
        '../../../../plugins/eltdf-core/post-types/**/assets/css/scss/**/*.scss',
        '../../framework/modules/woocommerce/assets/css/scss/**/*.scss',
        '../../framework/modules/woocommerce/shortcodes/**/assets/css/scss/**/*.scss',
        '../../framework/modules/woocommerce/plugins/**/assets/css/scss/**/*.scss',
	    '../../framework/modules/header/assets/css/scss/**/*.scss',
	    '../../framework/modules/header/types/**/assets/css/scss/**/*.scss',
        '../css/scss/**/*.scss'
    ], ['minifycss']);
    gulp.watch([
        '../../../../plugins/eltdf-core/shortcodes/**/assets/js/*.js',
        '../../../../plugins/eltdf-core/post-types/**/assets/js/*.js',
        '../../framework/modules/woocommerce/assets/js/*.js',
        '../../framework/modules/woocommerce/shortcodes/**/assets/js/*.js',
        '../../framework/modules/woocommerce/plugins/**/assets/js/*.js',
	    '../../framework/modules/header/assets/js/*.js',
	    '../../framework/modules/header/types/**/assets/js/*.js',
	    '../../framework/modules/footer/assets/js/*.js',
        '../js/modules/*.js'
    ], ['minifyjs']);
});