var gulp = require('gulp'),
	sass = require('gulp-sass'),
	concat = require('gulp-concat');
	jshint = require('gulp-jshint');
	autoprefixer = require('gulp-autoprefixer');
	imagemin = require('gulp-imagemin');
	notify = require('gulp-notify');
	minifyCss = require('gulp-minify-css');
	browserSync = require('browser-sync');


gulp.task('browser-sync', function(){
	//watch files
	var files = [
		'./style.css',
		'./*.php'
	];
	//initialize browsersync
	browserSync.init(files, {
		proxy: 'http://localhost:8888/mcclellandinsurance/',
		notify: false
		});

	});


gulp.task('styles', function(){

	return gulp.src('sass/*.scss')
			.pipe(sass({
				'sourcemap=none': true,
				errLogToConsole: true
				}))
			.on("error", notify.onError(function(error){
				return "Message to the notifier: " + error.message;
				}))
			.pipe(concat('style.css'))
			.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
			.pipe(minifyCss({compatability:'ie8'}))
			.pipe(gulp.dest('.'))
			.pipe(notify({
				message: 'Sass task complete.'
				}))
	});

gulp.task('jshint', function(){
	return gulp.src('js/*.js')
			.pipe(jshint())	
			.pipe(jshint.reporter('jshint-stylish'))
			.pipe(notify({message: 'Lint task complete'}))
	});

gulp.task('images', function(){
	return gulp.src('img/originals/*.{gif,jpg,png}')
	.pipe(imagemin({
		progressive: true,
		interlaced: true,
		svgoPlugins: [{removeViewBox:false},{removeUselessStrokeAndFill:false}]
		}))
	.pipe(gulp.dest('img/'))
	});

gulp.task('watch', function(){
	gulp.watch('sass/**/*.scss', ['styles']);
	gulp.watch('js/*.js', ['jshint']);
	gulp.watch('img/originals/*.{gif,jpg,png}',['images'])
	});

gulp.task('default', ['styles', 'jshint', 'images', 'browser-sync', 'watch']);	