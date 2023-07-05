const { RichText } = wp.blockEditor;
import SaveImage from "./components/saveImage";

const Save = props => {
  const {
    title,
    text,
    textBtn,
    image,
    pictureInverted,
    urlBtn,
    titleBtn
  } = props.attributes;
  return (
    <div
      className={`gm-block-page-container ${
        pictureInverted ? "gm-block-page-inverted" : ""
      }`}
    >
      <SaveImage props={props} />
      <div className={`gm-block-page-content`}>
        <h2 className="gm-block-page-title">
          <RichText.Content
            tagName="a"
            href={urlBtn}
            title={title}
            value={title}
          />
        </h2>
        <RichText.Content
          tagName="p"
          className="gm-block-page-text"
          value={text}
        />
        <div className="gm-block-page-btn">
          <a href={urlBtn} title={title} className="btn-arrow btn-icon-after">
            <RichText.Content tagName="span" value={textBtn} />
          </a>
        </div>
      </div>
    </div>
  );
};

export default Save;
