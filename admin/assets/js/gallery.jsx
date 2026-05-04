import classnames from 'classnames'
const { InspectorControls } = wp.blockEditor
const { Fragment } = wp.element
const { PanelBody, SelectControl } = wp.components
const { __ } = wp.i18n

const enableOnBlocks = ['core/gallery']

const types = {
  '' : 'Default',
  'gallery-grid-one': 'Grid One',
  'gallery-grid-two': 'Grid Two',
};

const setSidebarAttribute = (settings, name) => {
  if (!enableOnBlocks.includes(name)) {
    return settings
  }
  return Object.assign({}, settings, {
    attributes: Object.assign({}, settings.attributes, {
      type: {
        type: 'string',
        default: true,
      }
    }),
  })
}

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'mouss-films/set-sidebar-attribute-gallery',
  setSidebarAttribute,
)

const withSettings = wp.compose.createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    if (!enableOnBlocks.includes(props.name)) {
      return <BlockEdit {...props} />
    }

    const { attributes, setAttributes } = props
    const { type } = attributes

    const classname = classnames({[type]: true, 'gallery-grid': type !== ''})

    return (
      <Fragment>
        <BlockEdit {...props} className={classname} />
        <InspectorControls>
          <PanelBody title={__('Settings Styles', 'mouss-films')}>
            <SelectControl
                label={__('Type', 'mouss-films')}
                value={type}
                options={Object.keys(types).map((key) => ({
                    label: types[key],
                    value: key,
                }))}
                onChange={(value) => {
                    setAttributes({ type: value })
                }}
            />
          </PanelBody>
        </InspectorControls>
      </Fragment>
    )
  }
}, 'withSettings')

wp.hooks.addFilter(
  'editor.BlockEdit',
  'press-wind/with-settings-gallery',
  withSettings,
)

const saveAttribute = (extraProps, blockType, attributes) => {
  if (enableOnBlocks.includes(blockType.name)) {
    const { type } = attributes
    if (type) {
      extraProps.className = classnames(extraProps.className, {[type]: true, 'gallery-grid': type !== ''})
    }
  }

  return extraProps
}

wp.hooks.addFilter(
  'blocks.getSaveContent.extraProps',
  'mouss-films/save-attribute-gallery',
  saveAttribute,
)
