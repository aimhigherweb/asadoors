require('dotenv').config()

const {src, dest} = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const sourcemaps = require('gulp-sourcemaps')
const postcss = require('gulp-postcss')
const gulpIf = require('gulp-if')
const header = require('gulp-header')

const {compileFiles, sourceMaps, cssFiles, browserSync} = require('./config')

const generagePath = (path, filename) => {
	const base = path.match(/\/wp-content\/themes\/asadoors\/(.+?)\/style\.scss$/i)

	console.log({base})

	return ''
}

const compileSass = () => (
	src(compileFiles)
		.pipe(header(`@use 'sass:math';\n@use 'variables' as var;\n@use 'mixins';\n`))
		.pipe(postcss())
		.pipe(sourcemaps.init())
		.pipe(sass({
				outputStyle: process.env.NODE_ENV !== 'production' ? 'expanded' : 'compressed',
				includePaths: [
					'src/scss',
				]
			}).on('error', sass.logError))
		.pipe(dest(({path, base}) => {
			if(path.match(/\/src\/scss/)) {
				return cssFiles
			}
			return base
		}))
		.pipe(gulpIf(process.env.NODE_ENV !== 'production', browserSync.stream()))
)

module.exports = {
	compileSass
}