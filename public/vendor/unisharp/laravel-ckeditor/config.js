/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'document', groups: [ 'doctools', 'mode', 'document' ] },
		'/',
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Templates,Save,NewPage,Preview,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,Radio,TextField,Checkbox,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Anchor,Flash,PageBreak,Iframe,ShowBlocks,About';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;h4;h5';

    config.font_names = 'Arial;Arial Black;Comic Sans MS;Courier New;Tahoma;Times New Roman;Verdana;新細明體;細明體;標楷體;微軟正黑體';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;image:Upload;link:advanced';

	// add youtube embed function
	config.extraPlugins = 'youtube,tableresize';

	//set skin
	// config.skin = 'office2013';


};
