import { registerBlockType } from "@wordpress/blocks";
import { withSelect } from "@wordpress/data";
import ServerSideRender from "@wordpress/server-side-render";
import Panel from "./components/panel";
import { __ } from "@wordpress/i18n";

import edit from "./edit";
import save from "./save";
import attributes from "./attributes";

registerBlockType("gm/addock", {
  title: __("Block addock", "gm-addock"),
  description: __("Display addock Widget", "gm-addock"),
  icon: "star-filled",
  category: "theme-blocks",
  example: {},
  attributes,
  edit,
  save
});
