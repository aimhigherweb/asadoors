require('dotenv').config()

const {src, dest} = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const postcss = require('gulp-postcss')
const gulpIf = require('gulp-if')
const header = require('gulp-header')
const replace = require('gulp-replace')

const {compileFiles, cssFiles, browserSync} = require('./config')

const checkVariables = ({path, contents}) => {
	if (
		path.match(/variables\.scss/)
	) {
		return false
	}

	console.log({path})

	return true
}
const checkMixins = ({path}) => {
	if(
		path.match(/mixins(\/|\\)/) ||
		path.match(/mixins\.scss/) ||
		path.match(/animations(\/|\\)/)
	) {
		return false
	}
	return true
}


const compileSass = () => (
	src(compileFiles)
		.pipe(
			header(
				`@use 'sass:list';\n@use 'sass:map';\n@use 'sass:math';\n`
			)
		)
		.pipe(
			gulpIf(
				(file) => (checkVariables(file)), 
				header(`@use 'variables' as var;\n`)
			)
		)
		.pipe(
			gulpIf(
				(file) => (checkMixins(file)), 
				header(`@use 'mixins';\n`)
			)
		)
		
		// .pipe(
		// 	replace(
		// 		/@use 'variables' as var;\\n@use 'variables' as var;\\n/g, 
		// 		`@use 'variables' as var;\n`
		// 	)
		// )
		.pipe(
			postcss()
			)
		.pipe(
			sass({
				outputStyle: process.env.NODE_ENV !== 'production' ? 'expanded' : 'compressed',
				includePaths: [
					'src/scss',
				]
			}).on('error', sass.logError)
		)
		.pipe(
			dest(({path, base}) => {
				if(path.match(/\/src\/scss/)) {
					return cssFiles
				}
				return base
			})
		)
		.pipe(
			gulpIf(
				process.env.NODE_ENV !== 'production', 
				browserSync.stream()
			)
		)
)

module.exports = {
	compileSass
}