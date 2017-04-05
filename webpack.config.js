const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const HtmlPlugin  = require('html-webpack-plugin');
const webpack = require('webpack');
const autoprefixer = require('autoprefixer')

const loaders = [
	{
		loader: 'css-loader',
		options: {
			modules: false
		}
	},
	{
		loader: 'postcss-loader'
	},
	{
		loader: 'stylus-loader'
	}
]

module.exports = {
	entry: {
		index: './app/js/index.js',
		styles: './app/stylesheet/styles.styl'
	},
	output: {
		// filename: '[name].[hash].js',
		filename: 'dist/[name].[hash].js',
		path: path.resolve(__dirname, ''),
		publicPath: '/'
	},
	module: {
		rules: [
			// {
			// 	test: /.css$/,
			// 	use: ExtractTextPlugin.extract({
			// 		fallback: "style-loader",
			// 		use: "css-loader",
			// 		publicPath: ""
			// 	})
			// },
			{
				test: /\.(js|jsx)$/,
				exclude: /node_modules/,
				loader: 'babel-loader',
				query: {
					presets: ['es2015', 'es2016', 'es2017', 'react']
				}
			},
			{
				test: /\.pug$/,
				loader: 'pug-loader?pretty'
			},
			{
				test: /\.styl$/,
				loader: ExtractTextPlugin.extract({
					fallbackLoader: 'style-loader',
					loader: loaders
				})
			}
		]
	},
	plugins: [
		new ExtractTextPlugin({
			filename:  (getPath) => {
				return getPath('dist/[name].[hash].css').replace('css/js', 'css');
			},
			allChunks: true
		}),
		new HtmlPlugin({
			filename: 'content.php',
			template: './app/templates/content.pug',
			chunks: ['']
		}),
		new HtmlPlugin({
			filename: 'filter.php',
			template: './app/templates/filter/filter.pug',
			chunks: ['']
		}),
		new HtmlPlugin({  // Also generate a test.html
			filename: 'page.php',
			template: './app/templates/page.pug',
		}),
		new webpack.LoaderOptionsPlugin({
			options: {
				postcss: [
					autoprefixer()
				]
			}
		})
	]
}