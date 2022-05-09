const mix = require('laravel-mix');

mix.postCss('assets/css/tailwind.css', 'assets/css/theme.css', [
	require('tailwindcss')
])
.browserSync({
    proxy: 'php-to-html.test',
	files: [
		'assets/css/theme.css',
		'assets/js/common.js',
		'*.+(html|php)',
		'templates-parts/*.php',
	  ]
})
.options({
	processCssUrls: false
});