const path = require("path");

module.exports = {
	context: __dirname,
	entry: {
		block: ["./index.js"]
		// frontend: ""
	},
	output: {
		path: path.resolve(__dirname, "dist"),
		filename: "block-scaffold-[name].js"
	},
	mode: "development",
	module: {
		rules: [
			{
				test: /\.jsx?$/,
				loader: "babel-loader"
			}
		]
	}
};
