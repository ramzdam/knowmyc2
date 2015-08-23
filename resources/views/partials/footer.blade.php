{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/moment.min.js') !!}
{!! HTML::script('js/bootstrap-datetimepicker.min.js') !!}
{!! HTML::script('js/select2.full.min.js') !!}
{!! HTML::script('js/jquery.dataTables.min.js') !!}
{!! HTML::script('js/npm.js') !!}
<script>
    $(document).on('click', '.btn_subpage', function () {
        var attr = $(this).attr('data-url');

        if (typeof attr !== typeof undefined && attr !== false) {
            if (attr != '') {
                load_subpage(attr);
            }
        }

        return false;
    });


    $(document).on('click', '.sidebarlink', function () {
        log_nav = $("#navbar").children('ul').children('li:first');

        $("li.active").removeClass("active");
        log_nav.addClass("active");
    });


    $(".navigation").on('click',function() {
        source = $(this).attr('data-url');

        if (source !== undefined) {
            $("li.active").removeClass("active");
            $(this).parents("li").addClass("active");
        }
    });

    function load_subpage(view) {

        $.ajax({
            type: "GET",
            dataType: "html",
            url: view,
            beforeSend: function() {
                $(".center-loading").show();
            },
            success: function(response) {
                $("#content").html(response);
                $(".center-loading").hide();
                $("#new_drug_confirm").modal('hide');
            },
            error: function(datas) {
                $(".center-loading").hide();
                error_code = datas.status;
                error_message = datas.statusText;
                alert(error_code + " : " + error_message);
                $("#new_drug_confirm").modal('hide');
            }
        }).done(function() {
            $(".center-loading").hide();
            $("#new_drug_confirm").modal('hide');
        }).error(function(error_reply) {
            var errors = error_reply.responseJSON;

            var ul = '<ul>';

            $.each(errors, function(index, item) {
                ul += '<li>' + item + '</li>';
            });

            ul += '</ul>';

            $(".center-loading").hide();
            showMessage(ul);
            $("#verify").modal('hide');
            $("#new_drug_confirm").modal('hide');
        });

    }



    function showMessage(message, success, datas) {
        msg = message || "Sorry an error has occured";
        is_success = success || false;
        array_data = datas || {};

        if (is_success == true) {
            $(".error_container").removeClass('alert-danger').addClass('alert-success');
        } else {
            $(".error_container").removeClass('alert-success').addClass('alert-danger');
        }

        $(".error_message").html(msg);
        $(".error_container").fadeIn();
    }

    function logIt(form_name) {

        var $data = $(form_name).serialize();

        $.ajax({
            url: $(form_name).attr('action'),
            type: 'POST',
            dataType: 'json',
            data: $data,
            beforeSend: function() {
                $(".center-loading").fadeIn();
            },
            success: function(response) {
                msg = response.message || '';
                showMessage(msg, response.success);

                if (response.success && typeof response.redirect !== typeof undefined && response.redirect !== false) {

                    load_subpage(response.redirect);
                    $(".center-loading").hide();

                }
                $(".center-loading").hide();
            }
        }).done(function() {
            $(".center-loading").hide();
            $("#verify").modal('hide');
            $("#new_drug_confirm").modal('hide');
        }).error(function(error_reply) {
            var errors = error_reply.responseJSON;

            var ul = '<ul>';

            $.each(errors, function(index, item) {
                ul += '<li>' + item + '</li>';
            });

            ul += '</ul>';

            showMessage(ul);
            $(".center-loading").hide();
            $("#verify").modal('hide');
            $("#new_drug_confirm").modal('hide');
        });

    }
</script>

