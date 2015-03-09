tinymce.PluginManager.add('blockquoteCite', function(editor, url) {
    // Add a button that opens a window
    editor.addButton('blockquoteCite', {
        text: '',
        icon: 'blockquote',
        onclick: function() {
            // Open window
            editor.windowManager.open({
                title: 'Blockquote',
                width: 500,
                height: 170,
                body: [
                    {type: 'textbox', multiline: true, minHeight: 100, name: 'blockquote', label: 'Blockquote'},
                    {type: 'textbox', name: 'cite', label: 'Cite'}
                ],
                onsubmit: function(e) {
                    // Insert content when the window form is submitted
                    editor.insertContent('<blockquote>' + e.data.blockquote + '<footer><cite title="' + e.data.cite + '">' + e.data.cite + '</cite></footer></blockquote>');
                }
            });
        },
        onPostRender: function() {
            var ctrl = this;

            editor.on('NodeChange', function(e) {
                var i = e.parents.length;

                ctrl.active(e.parents && e.parents[i - 1].nodeName == 'BLOCKQUOTE');
            });
        }
    });

    //editor.onNodeChange.add(function(ed, cm, e) {
    //    console.log(ed, cm, e);
    //    //var selection = ed.selection.getContent();
    //    //var disable = true;
    //    //if (selection) {
    //    //    disable = false;
    //    //}
    //    //ed.controlManager.setDisabled("bold", disable);
    //});

    // Adds a menu item to the tools menu
    //editor.addMenuItem('example', {
    //    text: 'Example plugin',
    //    context: 'tools',
    //    onclick: function() {
    //        // Open window with a specific url
    //        editor.windowManager.open({
    //            title: 'TinyMCE site',
    //            url: 'http://www.tinymce.com',
    //            width: 800,
    //            height: 600,
    //            buttons: [{
    //                text: 'Close',
    //                onclick: 'close'
    //            }]
    //        });
    //    }
    //});
});

//tinyMCE.init({
//    setup : function(ed) {
//        ed.onNodeChange.add(function(ed, cm, e) {
//            console.log(ed, cm, e);
//    });
//}
//});