const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;

registerBlockType("block-scaffold/block-scaffold", {
	title: __("Block Scaffold", "block-scaffold"),
	category: "widgets",
	supports: {
		html: false
	},
	edit: () => <p>Hello world! 👋</p>,
	save: () => <p>Hello world! 👋</p>
});
