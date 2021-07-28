(function($, window, document, undefined) {
    "use strict";
    var pluginName = 'Manager';

    function Plugin(element, options) {
        this.element = element;
        this._name = pluginName;
        this._defaults = $.fn.Manager.defaults;
        this.options = $.extend({}, this._defaults, options);
        this.init();
    }

    $.extend(Plugin.prototype, {
        init: function() {
            this.bindEvents();
        },


        // Bind events that trigger methods
        bindEvents: function() {
            var plugin = this;
            //File Upload
            $('#drag-and-drop-zone').on('click', function() {
                $(this).wojoUpload({
                    url: plugin.options.url + "/helper.php",
                    dataType: 'json',
                    extraData: {
                        iaction: "fileUpload",
                    },
                    allowedTypes: '*',
                    onBeforeUpload: function(id) {
                        plugin.update_file_status(id, '', 'Uploading...');
                    },
                    onNewFile: function(id, file) {
                        plugin.add_file(id, file);
                    },
                    onUploadProgress: function(id, percent) {
                        plugin.update_file_progress(id, percent);
                    },
                    onUploadSuccess: function(id, data) {
                        if (data.type === "error") {
                            plugin.update_file_status(id, '<i class="icon small negative circular minus"></i>', data.message);
                            plugin.update_file_progress(id, 0);
                        } else {
                            var icon = '<i class="icon small positive circular check"></i>';
                            var btn = '<img src="' + plugin.options.surl + '/assets/images/filetypes/' + data.type + '" class="wojo small rounded image">';

                            plugin.update_file_status(id, icon, btn);
                            plugin.update_file_progress(id, 100);
                            $('#fileData').prepend(data.html);
                        }
                    },
                    onUploadError: function(id, message) {
                        plugin.update_file_status(id, '<i class="icon small negative circular minus"></i>', message);
                    },
                    onFallbackMode: function(message) {
                        alert('Browser not supported: ' + message);
                    },
                });
            });

            //Remove temp file
            $(document).on('click', '.removeit', function() {
                var id = $(this).attr("data-id");
                $("#uploadFile_" + id).transition("scaleOut", {
                    duration: 200,
                    complete: function() {
                        $(this).remove();
                    }
                });
            });
        },

        add_file: function(id, file) {
            var plugin = this;
            var lang = plugin.options.lang;
            var template = '' +
                '<div class="item progress" id="uploadFile_' + id + '">' +
                '<div class="columns auto" id="bStstus_' + id + '">' +
                '<div class="wojo icon button"><i class="icon white file"></i></div>' +
                '</div>' +
                '<div class="columns id="contentFile_' + id + '">' +
                '<h6 class="basic">' + file.name + '</h6>' +
                '<a class="wojo small negative icon right text removeit" data-id="' + id + '">' + lang.removeText + '</a>' +
                '</div>' +
                '<div class="columns auto" id="iStatus_' + id + '"><i class="icon small info circular upload"></i></div>' +
                '<div class="wojo attached bottom tiny progress">' +
                '<div class="bar" data-percent="100"></div>' +
                '</div>' +
                '</div>';

            $('#fileList').prepend(template);
        },

        update_file_status: function(id, status, message) {
            $('#bStstus_' + id).html(message);
            $('#iStatus_' + id).html(status);
        },

        update_file_progress: function(id, percent) {
            $('#uploadFile_' + id).find('.progress').wProgress();
            $('#uploadFile_' + id).find('.progress .bar').attr("data-percent", percent);
        },

    });

    $.fn.Manager = function(options) {
        this.each(function() {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });

        return this;
    };

    $.fn.Manager.defaults = {
        url: "",
        surl: "",
        lang: {
            removeText: "Remove",
        }
    };

})(jQuery, window, document);