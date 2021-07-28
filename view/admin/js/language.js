(function($) {
    "use strict";
    $.Language = function(settings) {
        var config = {
            url: "",
        };
        if (settings) {
            $.extend(config, settings);
        }

        $("#filter").on("keyup", function() {
            var filter = $(this).val(),
                count = 0;
            $("span[data-editable=true]").each(function() {
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).parents('.item').fadeOut();
                } else {
                    $(this).parents('.item').fadeIn();
                    count++;
                }
            });
        });

        $('#pgroup').on('change', function() {
            var sel = $("#pgroup option:selected").val();
            var type = $("#pgroup option:selected").data('type');
			var abbr = $(this).data('abbr');
            $.get(config.url + "/helper.php", {
                action: "languageSection",
                type: type,
                section: sel,
				abbr:abbr
            }, function(json) {
                $("#editable").html(json.html).fadeIn("slow");
                $('#editable').editableTableWidget();
            }, "json");
        });

        $('#group').on('change', function() {
            var sel = $("#group option:selected").val();
            var type = $("#group option:selected").data('type');
			var abbr = $(this).data('abbr');
            $.get(config.url + "/helper.php", {
                action: "languageFile",
                type: type,
                section: sel,
				abbr:abbr
            }, function(json) {
                if (json.type === "success") {
                    $("#editable").html(json.html).fadeIn("slow");
                    $('#editable').editableTableWidget();
                } else {
                    $.notice(decodeURIComponent(json.message), {
                        autoclose: 12000,
                        type: json.type,
                        title: json.title
                    });
                }
            }, "json");
        });
    };
})(jQuery);