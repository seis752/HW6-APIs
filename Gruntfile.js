module.exports = function (grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    csslint: {
      options: {
        csslintrc: '.csslintrc'
      },
      src: './web/css/**/*.css'
    },
    jscs: {
      options: {
        config: '.jscsrc'
      },
      src: './web/js/**/*.js'
    },
    jshint: {
      options: {
        jshintrc: true
      },
      src: './web/js/**/*.js'
    }
  });

  // Load the plugins.
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-jscs');
  grunt.loadNpmTasks('grunt-contrib-csslint');

  // Default task(s).
  grunt.registerTask('default', ['jshint', 'jscs', 'csslint']);

};
