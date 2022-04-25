require('dotenv').config()

const {src, dest} = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const postcss = require('gulp-postcss')
const gulpIf = require('gulp-if')
const header = require('gulp-header')
const map = require('vinyl-map')

const {compileFiles, cssFiles, browserSync} = require('./config')

const checkVariables = ({path, contents}) => {
	if (
		path.match(/variables\.scss/) ||
		path.match(/variables(\/|\\)/) ||
		path.match(/mixins(\/|\\)/) ||
		path.match(/mixins\.scss/) ||
		path.match(/animations(\/|\\)/)
	) {
		return false
	}

	if(contents.toString().match(/@use 'variables'/)) {
		return false
	}

	return true
}
const checkMixins = ({path}) => {
	if(
		path.match(/mixins(\/|\\)/) ||
		path.match(/mixins\.scss/) ||
		path.match(/animations(\/|\\)/) ||
		path.match(/variables\.scss/) ||
		path.match(/variables(\/|\\)/)
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
		// 	gulpIf(
		// 		({path}) => (path.match('typography.scss')),
		// 		map((code, filename) => {
		// 			console.log({
		// 				filename,
		// 				string: code.toString()
		// 			})

		// 			return code
		// 		})
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
				],
				quietDeps: true,
				verbose: true
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