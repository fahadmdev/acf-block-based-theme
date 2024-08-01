module.exports = function (grunt) {
	const sass = require('node-sass');
 
	require('load-grunt-tasks')(grunt);
	
    grunt.initConfig({
		// define source files and their destinations
		uglify: {
			my_target: {
				files: {
					'assets/javascript/theme.min.js' : ['assets/javascript/js/**.js','inc/**/*.js','!inc/global/plugins/**/*.js'],
				},
				options: {
					sourceMap: 'assets/javascript/theme-sourcemap.map'
				}
			}
		},
		sass_globbing: {
			your_target: {
				options: {
					useSingleQuotes: false,
					signature: '//Do not update. Use CLI to run "grunt styles" or "grunt watch:styles"'
				},
				files: {
					'assets/styles/scss/style.scss': 
					[
						'assets/styles/scss/partials/_global.scss',
						'assets/styles/scss/partials/_mixins.scss',
						'assets/styles/scss/partials/_functions.scss',
						'assets/styles/scss/**/**.scss',
						'inc/**/*.scss',
						'!inc/global/plugins/**/*.scss',
						'blocks/**/*.scss'
					],
				}
			}
		},
		sass: {
			options: {
				outputStyle: 'compressed',
				implementation: sass,
				sourceMap: true
			},
			dist: {
				files: {
					'assets/styles/css/style.min.css': 'assets/styles/scss/style.scss',
				}
			}
		},
		watch: {
			options: {
				atBegin: true
			},
			js:  { 
				files: ['assets/javascript/js/**.js','inc/**/*.js','!inc/global/plugins/**/*.js'], 
				tasks: [ 'uglify' ] 
			},
			styles: {
				files: ['assets/styles/scss/**/**.scss','inc/**/*.scss','!inc/global/plugins/**/*.scss','blocks/**/*.scss'], 
				tasks: [ 'sass_globbing','sass' ],
			}
		}
	});


// register at least this one task
grunt.registerTask('js', [ 'uglify' ]);
grunt.registerTask('styles', [ 'sass_globbing','sass' ]);
};