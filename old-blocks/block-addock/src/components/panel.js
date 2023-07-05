import { PanelBody, TextControl } from "@wordpress/components";
import { InspectorControls } from "@wordpress/blockEditor";
import { __ } from "@wordpress/i18n";

const Panel = ({ props }) => {
  const { attributes, setAttributes } = props;
  const { hash } = attributes;

  return (
    <InspectorControls>
      <PanelBody title={__("Settings", "gm-addock")}>
        <TextControl
          label={__("Hash", "gm-addock")}
          value={hash}
          onChange={content => setAttributes({ hash: content })}
        />
      </PanelBody>
    </InspectorControls>
  );
};

export default Panel;
