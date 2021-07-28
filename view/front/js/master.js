(function($) {
    "use strict";
    $.Master = function(settings) {
        var config = {
            weekstart: 0,
            ampm: 0,
            url: '',
            lang: {
                button_text: "Choose file...",
                empty_text: "No file...",
            }
        };

        if (settings) {
            $.extend(config, settings);
        }

        /* == Input focus == */
		$(document).on("focusout", '.wojo.input input, .wojo.input textarea', function() {
			$('.wojo.input').removeClass('focus');
        });

		$(document).on("focusin", '.wojo.input input, .wojo.input textarea', function() {
			$(this).closest('.input').addClass('focus');
        });

        /* == Dark Light Theme == */
        $(document).on('click', '.atheme-switch', function() {
			var mode = $(this).attr("data-mode");
            $("body").attr("data-theme", (mode === "light") ? "dark" : "light");
			
			$(this).attr("data-mode", (mode === "light") ? "dark" : "light");
			$("span", this).text((mode === "light") ? "Dark" : "Light");

            Cookies.set("MMPF_THEME", (mode === "light") ? "dark" : "light", {
                expires: 360,
                path: '/',
				sameSite: 'strict'
            });
			window.location.href = window.location.href;
        });
		
        /* == Account actions  == */
        $(".add-cart").on("click", function() {
            $(".wojo.cards .card").removeClass('active');
            $(this).closest('.card').addClass('active');
            var id = $(this).data('id');
            $.post(config.url + "/controller.php", {
                action: "buyMembership",
                id: id
            }, function(json) {
                $("#mResult").html(json.message);
                $('html, body').animate({
                    scrollTop: $("#mResult").offset().top
                }, 2000);
            }, "json");
        });

        $("#mResult").on("click", ".sGateway", function() {
            $("#mResult .sGateway").removeClass('primary');
            $(this).addClass('primary');
            var id = $(this).data('id');
            $.post(config.url + "/controller.php", {
                action: "selectGateway",
                id: id
            }, function(json) {
                $("#mResult #gdata").html(json.message);
                $('html, body').animate({
                    scrollTop: $("#gdata").offset().top
                }, 2000);
            }, "json");
        });

        $("#mResult").on("click", "#cinput", function() {
            var id = $(this).data('id');
            var $this = $(this);
            var $parent = $(this).parent();
            var $input = $("input[name=coupon]");
            if (!$input.val()) {
                $parent.addClass('error');
            } else {
                $parent.addClass('loading');
                $.post(config.url + "/controller.php", {
                    action: "getCoupon",
                    id: id,
                    code: $input.val()
                }, function(json) {
                    if (json.type === "success") {
                        $parent.removeClass('error');
                        $this.toggleClass('find check');
                        $parent.prop('disabled', true);
                        $(".totaltax").html(json.tax);
                        $(".totalamt").html(json.gtotal);
                        $(".disc").html(json.disc);
                        $(".disc").parent().addClass('highlite');
                    } else {
                        $parent.addClass('error');
                    }
                    $parent.removeClass('loading');
                }, "json");
            }
        });

        /* == Avatar Upload == */
        $('[data-type="image"]').wavatar({
            text: config.lang.selPic,
            validators: {
                maxWidth: 3200,
                maxHeight: 1800
            },
            reject: function(file, errors) {
                if (errors.mimeType) {
                    $.wNotice(decodeURIComponent(file.name + ' must be an image.'), {
                        autoclose: 4000,
                        type: "error",
                        title: 'Error'
                    });
                }
                if (errors.maxWidth || errors.maxHeight) {
                    $.wNotice(decodeURIComponent(file.name + ' must be width:3200px, and height:1800px  max.'), {
                        autoclose: 4000,
                        type: "error",
                        title: 'Error'
                    });
                }
            }
        });
		
        /* == Master Form == */
        $(document).on('click', 'button[name=dosubmit]', function() {
            var $button = $(this);
            var action = $(this).data('action');
            var $form = $(this).closest("form");
            var asseturl = $(this).data('url');

            function showResponse(json) {
                setTimeout(function() {
                    $($button).removeClass("loading").prop("disabled", false);
                }, 500);
                $.wNotice(json.message, {
                    autoclose: 12000,
                    type: json.type,
                    title: json.title
                });
                if (json.type === "success" && json.redirect) {
                    $('main').transition("scaleOut", {
                        duration: 4000,
                        complete: function() {
                            window.location.href = json.redirect;
                        }
                    });
                }
            }

            function showLoader() {
                $($button).addClass("loading").prop("disabled", true);
            }
            var options = {
                target: null,
                beforeSubmit: showLoader,
                success: showResponse,
                type: "post",
                url: asseturl ? config.url + "/" + asseturl + "/controller.php" : config.url + "/controller.php",
                data: {
                    action: action
                },
                dataType: 'json'
            };

            $($form).ajaxForm(options).submit();
        });

        /* == Clear Session Debug Queries == */
        $("#debug-panel").on('click', 'a.clear_session', function() {
            $.get(config.url + '/controller.php', {
                ClearSessionQueries: 1
            });
            $(this).css('color', '#222');
        });
    };
})(jQuery);