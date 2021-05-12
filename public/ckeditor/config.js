/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for two toolbar rows.
    config.toolbarGroups = [
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        { name: 'forms', groups: [ 'forms' ] },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        { name: 'links', groups: [ 'links' ] },
        { name: 'insert', groups: [ 'insert' ] },
        '/',
        { name: 'styles', groups: [ 'styles' ] },
        { name: 'colors', groups: [ 'colors' ] },
        { name: 'tools', groups: [ 'tools' ] },
        { name: 'others', groups: [ 'others' ] },
        { name: 'about', groups: [ 'about' ] }
    ];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.filebrowserBrowseUrl = pathd + 'adminlte/bower_components/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = pathd + 'adminlte/bower_components/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = pathd + 'adminlte/bower_components/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = pathd + 'adminlte/bower_components/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = pathd + 'adminlte/bower_components/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = pathd + 'adminlte/bower_components/kcfinder/upload.php?opener=ckeditor&type=flash';
};
