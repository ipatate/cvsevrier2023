import { useEffect, useRef } from "@wordpress/element";
const { RichText } = wp.blockEditor;
const { __ } = wp.i18n;
import config from "../config";
import injectScript from "./helpers/injectScript";
import Panel from "./components/panel";

import "./styles/index.scss";

const Edit = props => {
  const { attributes, setAttributes } = props;
  const { hash } = attributes;
  useEffect(() => {
    injectScript(
      config.apiUrl,
      () => window.EasyLoisirsModule.init(),
      window.EasyLoisirsModule
    );
  }, [hash]);
  return (
    <>
      <Panel props={props} />
      {hash === "" ? (
        <div className="gm-bloc-addock-container">
          Enter hash key on the right panel !
        </div>
      ) : (
        <div
          className="gm-bloc-addock-container easyloisirs_module"
          data-hash={hash}
        />
      )}
    </>
  );
};

export default Edit;
