module.exports = function(grunt) {
    var themeDir = '../../../';

    var gruntConfig = {
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            livereload: {
                options: {
                    livereload: true
                },
                files: [
                    themeDir + '/css/{,**/}*.css',
                    themeDir + 'js/{,**/}*.min.js',
                    themeDir + 'images/{,**/}*.{png,jpg,gif}'
                ]
            },
            compass: {
                files: themeDir + 'resources/scss/{,**/}*.scss',
                tasks: 'compass:theme'
            }
        },
        compass: {
            theme: {
                options: {
                    sassDir: themeDir + 'resources/scss',
                    cssDir: themeDir + 'web/css',
                    environment: 'development',
                    outputStyle: 'expanded',
                    relativeAssets: true
                }
            }
        },
        cssmin: {
            minify: {
                expand: true,
                cwd: themeDir + 'css/',
                src: ['*.css', '!*.min.css'],
                dest: themeDir + 'css/',
                ext: '.min.css'
            }
        }
    };
    grunt.initConfig(gruntConfig);

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.registerTask('default', [
        'compass:theme'
    ]);
};