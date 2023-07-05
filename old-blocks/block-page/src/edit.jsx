const { RichText, URLInputButton } = wp.blockEditor;
const { __ } = wp.i18n;
import Panel from "./components/panel";
import Image from "./components/editImage";

const Edit = props => {
  const { attributes, setAttributes, className } = props;
  const { title, text, textBtn, pictureInverted, urlBtn } = attributes;

  return (
    <>
      <Panel props={props} />
      <div
        className={`gm-block-page-container ${
          pictureInverted ? "gm-block-page-inverted" : ""
        } ${className}`}
      >
        <Image props={props} />
        <div className={`gm-block-page-content`}>
          <h2 className="gm-block-page-title">
            <a onClick={e => e.preventDefault}>
              <RichText
                allowedFormats={[]}
                placeholder={__("Add title", "gm-bloc")}
                value={title}
                onChange={content => setAttributes({ title: content })}
              />
            </a>
          </h2>
          <p className="gm-block-page-text">
            <RichText
              allowedFormats={[]}
              placeholder={__("Add text", "gm-bloc")}
              value={text}
              onChange={content => setAttributes({ text: content })}
            />
          </p>
          <div className="gm-block-page-btn">
            <a
              onClick={e => e.preventDefault}
              className="btn-arrow btn-icon-after"
            >
              <RichText
                tagName="span"
                allowedFormats={[]}
                placeholder={__("Add text", "gm-bloc")}
                value={textBtn}
                onChange={content => setAttributes({ textBtn: content })}
              />
            </a>
            <URLInputButton
              url={urlBtn}
              onChange={(_urlBtn, post) =>
                setAttributes({
                  urlBtn: _urlBtn,
                  titleBtn: (post && post.title) || textBtn
                })
              }
            />
          </div>
        </div>
      </div>
    </>
  );
};

export default Edit;
