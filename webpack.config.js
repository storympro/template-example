const Encore = require('@symfony/webpack-encore')
const Dotenv = require('dotenv-webpack');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev')
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    // SCSS
    .addStyleEntry('styles/header', './assets/styles/Header.scss')
    .addStyleEntry('styles/footer', './assets/styles/Footer.scss')

    // JavaScript
    .addEntry('app-js', './assets/js/App.js')

    // TypeScript
    .addEntry('app', './assets/app/App.ts')

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-proposal-class-properties');
        config.plugins.push('@babel/plugin-proposal-nullish-coalescing-operator');
    })
    .enableSassLoader()
    .enableBuildNotifications(false)
    .addPlugin(new Dotenv({
        ignoreStub: true,
    }))
    .enableTypeScriptLoader()
    .enableForkedTypeScriptTypesChecking();

module.exports = Encore.getWebpackConfig();