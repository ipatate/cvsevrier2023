const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;

import edit from "./edit";
import save from "./save";
import attributes from "./attributes";

registerBlockType("gm/page", {
  title: "Block page",
  description:
    "Page block for show 1 pictures and one block with text, title and link",
  icon: "star-filled",
  category: "theme-blocks",
  attributes,
  edit,
  save
});
