const { registerBlockType } = wp.blocks;
//
console.log('test')

registerBlockType('wpscript-blocks/test-block', {
  title: 'Basic Ex',
  icon: 'smiley',
  category: 'layout',
  edit: ({ className }) => <div className={className}>Hello World!</div>,
  save: () => <div>Hello World</div>
})