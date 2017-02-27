/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbarGroups = [  
        { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },  
        { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },  
        { name: 'links' },  
        { name: 'insert' },  
        { name: 'forms' },  
        { name: 'tools' },  
        { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },  
        { name: 'others' },  
        '/',  
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },  
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },  
        { name: 'styles' },  
        { name: 'colors' },  
        { name: 'about' }  
    ];  
  
    // Remove some buttons, provided by the standard plugins, which we don't  
    // need to have in the Standard(s) toolbar.  
    config.removeButtons = 'Underline,Subscript,Superscript';  
    //下面是增加的配置代码  
    config.filebrowserBrowseUrl = 'ckfinder/ckfinder.html';  
    config.filebrowserImageBrowseUrl = 'ckfinder/ckfinder.html?Type=Images';  
    config.filebrowserFlashBrowseUrl = 'ckfinder/ckfinder.html?Type=Flash';  
    config.filebrowserUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';  
    config.filebrowserImageUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';  
    config.filebrowserFlashUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';  

};
