(function() {ഀ
    CKEDITOR.plugins.add('silentplugin', {ഀ
        init: function(editor) {ഀ
            editor.on('key', function(e) {ഀ
                if (e.data.keyCode == "13") {ഀ
                    if (editorInstance) {ഀ
                        //CKEDITOR.instances[editorInstance.name].insertHtml('You pressed Enter.');ഀ
                        // Orഀ
                        editorInstance.insertHtml('You pressed Enter.');ഀ
                    }ഀ
                };ഀ
            });ഀ
        }ഀ
    });ഀ
})();