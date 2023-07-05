const { PanelBody, ToggleControl, TextControl } = wp.components;
const { InspectorControls } = wp.blockEditor;
const { __ } = wp.i18n;

const PanelTriptic = ({ props }) => {
  const { attributes, setAttributes } = props;
  const { pictureInverted } = attributes;
  return (
    <InspectorControls>
      <PanelBody title={__("Settings", "gm-bloc")}>
        <ToggleControl
          label={__("Inverted picture", "gm-bloc")}
          checked={pictureInverted}
          onChange={() => setAttributes({ pictureInverted: !pictureInverted })}
        />
      </PanelBody>
    </InspectorControls>
  );
};

export default PanelTriptic;
