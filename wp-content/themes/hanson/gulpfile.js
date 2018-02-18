var gulp 				= require( 'gulp' );
var zip 				= require( 'gulp-zip' );



gulp.task('makeZip', function() { 
	gulp.src([
		'**/*.*',
		'!.idea',
		'!gulpfile.js',
		'!.gitignore',
		'!node_modules',
		'!prepros-6.config',
		'!package-lock.json',
		'!package.json',
		],{base: '../hanson/'})
		.pipe(zip('hanson.zip'))
		.pipe(gulp.dest('dist'));
});