/**
* @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config ) {
  // Define changes to default configuration here.
  // For the complete reference:
  // http://docs.ckeditor.com/#!/api/CKEDITOR.config
  
  // The toolbar groups arrangement, optimized for two toolbar rows.
  config.toolbarGroups = [
    { name: 'basicstyles' },
    { name: 'colors' },
    { name: 'styles', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
    { name: 'list', items: ['list', 'indent'] },
    { name: 'links' },
    { name: 'insert', items: ['iFrame', 'Source'] }
    //{ name: 'find' },
    //{ name: 'document', items: ['Source'] }
  ];
  
  // Remove some buttons, provided by the standard plugins, which we don't
  // need to have in the Standard(s) toolbar.
  config.removeButtons = 'Subscript,Superscript,Strike,Anchor,Flash,Character,HorizontalRule,Styles';
  //config.removePlugins = 'specialchar';
  // config.removeButtons = 'Underline,Subscript,Superscript';
  config.uiColor = '#FFFFFF';
  config.removeDialogTabs = 'image:advanced;image:Upload;link:advanced';
  
  config.forcePasteAsPlainText = true;
  
  // config.extraPlugins = 'image2,widget,lineutils,widgetselection';
};

// CKEDITOR.addCss(
//     'p:first-child {' +
//         'border-top: solid 2px green' +
//     '}' +
//     'p:last-child {' +
//         'border-bottom: solid 2px green' +
//     '}'
// );

// CKEDITOR.plugins.add( 'example', {
//     onLoad: function() {
//         CKEDITOR.addCss(
//             'p:first-child {' +
//                 'border-top: solid 2px green' +
//             '}' +
//             'p:last-child {' +
//                 'border-bottom: solid 2px green' +
//             '}'
//         );
//     }
//     // ...
// } );
