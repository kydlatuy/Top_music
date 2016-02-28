var gulp = require('gulp'),
    path = require('path'),
    $ = require('gulp-load-plugins')(),
    gulpsync = $.sync(gulp);

var useSourceMaps = false;

// production mode (see build task)
var isProduction = false;

// MAIN PATHS
var paths = {
    styles: 'css/',
    scripts: 'js/front/'
}

var compassOpts = {
    project: path.join(__dirname, '/'),
    css: 'css/build',
    sass: 'css/scss/',
    image: 'img'
};

// VENDOR CONFIG
var vendor = {
    // vendor scripts required to start the app
    base: {
        source: require('./vendor.base.json'),
        dest: paths.scripts + '/build',
        name: 'base.js'
    },
    // vendor scripts to make the app work. Usually via lazy loading
    app: {
        source: require('./vendor.json'),
        dest: 'vendor'
    }
};

// SOURCES CONFIG
var source = {
    scripts: [
        paths.scripts + '*.js'
    ],
    styles: {
        app: [paths.styles + 'scss/*.*'],
        watch: [paths.styles + 'scss/**/*.*']
    }
};

// BUILD TARGET CONFIG
var build = {
    scripts: paths.scripts + '/build',
    styles: paths.styles + '/build',
    templates: {
        index: 'application/views/'
    }
};

// PLUGINS OPTIONS

var vendorUglifyOpts = {
    mangle: {
        except: ['$super'] // rickshaw requires this
    }
};

// JS APP
gulp.task('scripts:base', function () {
    log('Building scripts..');
    // Minify and copy all JavaScript (except vendor scripts)

    return gulp.src(source.scripts)
        .pipe($.if(useSourceMaps, $.sourcemaps.init()))
        .pipe($.concat('app.js'))
        .pipe($.ngAnnotate())
        .on('error', handleError)
        .pipe($.if(isProduction, $.uglify({preserveComments: 'some'})))
        .on('error', handleError)
        .pipe($.if(useSourceMaps, $.sourcemaps.write()))
        .pipe(gulp.dest(build.scripts));
});
gulp.task('scripts:other', function () {
    log('Building scripts other..');

    return gulp.src(paths.scripts + 'other/*.js')
        .pipe($.ngAnnotate())
        .on('error', handleError)
        .pipe($.if(isProduction, $.uglify({preserveComments: 'some'})))
        .on('error', handleError)
        .pipe($.if(useSourceMaps, $.sourcemaps.write()))
        .pipe(gulp.dest(build.scripts));
});
gulp.task('scripts:concat', function () {
    log('Building scripts concat..');

    return gulp.src([build.scripts + '/base.js', build.scripts + '/app.js'])
        .pipe($.if(useSourceMaps, $.sourcemaps.init()))
        .pipe($.concat('united.js'))
        .pipe(gulp.dest(build.scripts));
});
gulp.task('scripts:app', gulpsync.sync(['scripts:base', 'scripts:concat']));

gulp.task('styles:base', function () {
    log('Building application styles..');

    return gulp.src(source.styles.app)
        .pipe($.if(useSourceMaps, $.sourcemaps.init()))
        .pipe($.compass(compassOpts))
        .on('error', handleError)
        .pipe($.if(isProduction, $.minifyCss()))
        .pipe($.if(useSourceMaps, $.sourcemaps.write()))
        .pipe(gulp.dest(build.styles));
});
gulp.task('styles:concat', function () {
    log('Building application styles concat..');

    return gulp.src([build.styles + '/main.css', 'vendor/animate.css/animate.min.css'])
        .pipe($.concat('united.css'))
        .pipe(gulp.dest(build.styles));
});
gulp.task('styles:app', gulpsync.sync(['styles:base', 'styles:concat']));

// VENDOR BUILD
gulp.task('vendor', gulpsync.sync(['vendor:base', 'vendor:app']));

// Build the base script to start the application from vendor assets
gulp.task('vendor:base', function () {
    log('Copying base vendor assets..');

    return gulp.src(vendor.base.source)
        .pipe($.expectFile(vendor.base.source))
        .pipe($.if(isProduction, $.uglify()))
        .pipe($.concat(vendor.base.name))
        .pipe(gulp.dest(vendor.base.dest));
});

// copy file from bower folder into the app vendor folder
gulp.task('vendor:app', function () {
    log('Copying vendor assets..');

    var jsFilter = $.filter('**/*.js');
    var cssFilter = $.filter('**/*.css');

    return gulp.src(vendor.app.source, {base: 'bower_components'})
        .pipe($.expectFile(vendor.app.source))
        .pipe(jsFilter)
        .pipe($.if(isProduction, $.uglify(vendorUglifyOpts)))
        .pipe(jsFilter.restore())
        .pipe(cssFilter)
        .pipe($.if(isProduction, $.minifyCss()))
        .pipe(cssFilter.restore())
        .pipe(gulp.dest(vendor.app.dest));
});

// default (no minify)
gulp.task('default', gulpsync.sync([
    'vendor',
    'assets',
    'watch'
]), function () {
    log('************');
    log('* All Done * You can start editing your code, LiveReload will update your browser after any change..');
    log('************');
});

//assets
gulp.task('assets', [
    'scripts:app',
    'scripts:other',
    'styles:app',
    'cache:index'
]);


// build with sourcemaps (no minify)
gulp.task('sourcemaps', ['usesources', 'default']);
gulp.task('usesources', function () {
    useSourceMaps = true;
});

gulp.task('prod', function () {
    log('Starting production build...');
    isProduction = true;
});

// CACHE BREAKER
gulp.task('cache:index', function () {
    //log('Cache breaker index');
    //gulp.src(build.templates.index + 'index.*')
    //    .pipe($.revAppend())
    //    .on('error', handleError)
    //    .pipe(gulp.dest(build.templates.index));
});


//---------------
// WATCH
//---------------

// Rerun the task when a file changes
gulp.task('watch', function () {
    log('Starting watch and LiveReload..');

    $.livereload.listen();

    gulp.watch(source.scripts, ['scripts:app']);
    gulp.watch(paths.scripts + 'other/*.js', ['scripts:other']);
    gulp.watch(source.styles.watch, ['styles:app']);
    //, 'cache:index'

    // a delay before triggering browser reload to ensure everything is compiled
    var livereloadDelay = 500;
    // list of source file to watch for live reload
    var watchSource = [].concat(
        source.scripts,
        paths.scripts + 'other/*.js',
        source.styles.watch
    );

    gulp
        .watch(watchSource)
        .on('change', function (event) {
            setTimeout(function () {
                $.livereload.changed(event.path);
            }, livereloadDelay);
        });

});

// build for production (minify)
gulp.task('build', gulpsync.sync([
    'prod',
    'vendor',
    'assets'
]));

//////////

// Error handler
function handleError(err) {
    log(err.toString());
    this.emit('end');
}
// log to console using
function log(msg) {
    $.util.log($.util.colors.blue(msg));
}