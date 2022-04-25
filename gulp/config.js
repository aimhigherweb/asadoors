const browserSync = require('browser-sync')

module.exports = {
	themeFolders: [
		'blocks',
		'data',
		'functions',
		'layouts',
		'partials',
		'parts',
		'src'
	],
	themeFiles: [
		'./*.php',
		'./*.css',
		'./screenshot.png',
	],
	phpFiles: [
		'./*.php',
		'./**/*.php',
	],
	sourceMaps: '/src/maps',
	cssFiles: '.',
	compileFiles: [
		'src/scss/style.scss', 
		'src/scss/editor.scss',
		'partials/**/*.scss',
		'layouts/**/*.scss',
		'blocks/**/*.scss',
		'parts/**/*.scss',
		'**/*.scss',
	],
	sassPartials: [
		'src/scss/**/*.scss',
		'partials/**/*.scss',
		'layouts/**/*.scss',
		'blocks/**/*.scss',
		'parts/**/*.scss',
	],
	browserSync: browserSync.create(),
}