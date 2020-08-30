
const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;

const Edit = (props) => {

  const { attributes, setAttributes } = props;
  console.log('props', props)
  const onChangeText = (text) => setAttributes({ content: text })

  return (
    <RichText
      tagName="p"
      onChange={onChangeText}
      value={attributes.content}
    />
  )
}

//
console.log('testing');
registerBlockType('wpscript-blocks/test-block', {
  title: 'Basic Ex',
  icon: 'smiley',
  description: 'a test description',
  category: 'layout',
  //
  attributes: {
    // map markup info from save content into save(props)
    content: {
      //
      type: 'array',
      // content of p
      source: 'children',
      // select from html
      selector: 'p'
    }
  },
  edit: Edit,
  save: (props) => {
    console.log('props', props)
    return (<p> {props.attributes.content[0]} </p>)
  }
})