const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
	context: __dirname,
	entry: {
		block_one: ["./block-one/index.js", "./block-one/block-one.css"],
		block_two: ["./block-two/index.js", "./block-two/block-two.css"],
	},
	output: {
		path: path.resolve(__dirname, "dist"),
		filename: "[name]/bundle.js",
	},
	mode: "development",
	module: {
		rules: [
			{
				test: /\.jsx?$/,
				loader: "babel-loader",
			},
			{
				test: /\.s?css$/,
				use: [MiniCssExtractPlugin.loader, "css-loader"],
			},
		],
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: "[name]/styles.css",
		}),
	],
};
