const { Button, Dashicon, Spinner } = wp.components;
const { useEffect } = wp.element;
const { MediaUpload, MediaUploadCheck } = wp.blockEditor;
const { useSelect } = wp.data;
const { __ } = wp.i18n;

const ALLOWED_MEDIA_TYPES = ["image"];

/**
 * find image url
 * @param {object} image
 */
const getUrlImage = image => {
  const { media_details, source_url } = image;
  let url = source_url;
  if (media_details) {
    const { sizes } = media_details;
    const { gm_mobile_size } = sizes;
    url = gm_mobile_size ? gm_mobile_size.source_url : source_url;
  }
  return url;
};

const EditImage = ({ props, index }) => {
  const { attributes, setAttributes } = props;
  const { imageId } = attributes;

  const image = useSelect(
    select => {
      const { getMedia } = select("core");
      return imageId ? getMedia(imageId) : {};
    },
    [imageId]
  );
  // update image info to attribute
  useEffect(() => {
    if (!!image) {
      setAttributes({
        image,
        imageUrl: getUrlImage(image)
      });
    }
  }, [image]);

  const onUpdateImage = image => {
    setAttributes({
      imageId: image.id,
      image,
      imageUrl: getUrlImage(image)
    });
  };

  const onRemoveImage = () => {
    if (confirm("Are you sure to remove this image ?")) {
      setAttributes({
        imageId: undefined,
        image: undefined,
        imageUrl: undefined
      });
    }
  };
  return (
    <>
      <MediaUploadCheck>
        <MediaUpload
          title={__("Image", "")}
          onSelect={onUpdateImage}
          allowedTypes={ALLOWED_MEDIA_TYPES}
          value={image}
          render={({ open }) => {
            if (imageId && image) {
              return (
                <div
                  className="gm-block-page-image"
                  style={{
                    backgroundImage: `url('${image.source_url}')`
                  }}
                >
                  <a onClick={e => e.preventDefault}>
                    <Button
                      onClick={onRemoveImage}
                      title={__("remove", "gm-bloc")}
                    >
                      <Dashicon icon="dismiss" />
                    </Button>
                  </a>
                </div>
              );
            }
            return (
              <div className="gm-block-page-image gm-block-page-image-empty">
                <Button onClick={open} title={__("add image", "gm-bloc")}>
                  {!imageId && <Dashicon icon="plus-alt" />}
                  {!!imageId && !image && <Spinner />}
                </Button>
              </div>
            );
          }}
        />
      </MediaUploadCheck>
    </>
  );
};

export default EditImage;
