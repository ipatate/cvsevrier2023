const SaveImage = ({ props, index }) => {
  const { title, urlBtn, imageUrl } = props.attributes;
  return (
    <div
      className="gm-block-page-image"
      style={{
        backgroundImage: `url('${imageUrl}')`
      }}
    >
      <a href={urlBtn} title={title}></a>
    </div>
  );
};

export default SaveImage;
