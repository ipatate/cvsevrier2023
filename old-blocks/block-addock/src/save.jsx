const { RichText } = wp.blockEditor;

import "./styles/index.scss";

const Save = props => {
  const { hash } = props.attributes;
  return (
    <div
      data-gdpr="Addock"
      className="gdpr-mask gm-bloc-addock-container easyloisirs_module"
      data-hash={hash}
    />
  );
};

export default Save;
