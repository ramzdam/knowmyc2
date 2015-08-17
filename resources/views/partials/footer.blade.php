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

    function load_subpage(view) {
        $.ajax({
            type: "GET",
            dataType: "html",
            url: view,
            beforeSend: function() {
                $(".center-loading").fadeIn();
            },
            success: function(response) {
                $("#content").html(response);
            }
        }).done(function() {
            $(".center-loading").hide();
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
        });;
    }

    function showMessage(message, success, datas) {
        msg = message || "Sorry an error has occured";
        is_success = success || false;
        array_data = datas || {};

        if (is_success) {
            $(".error_container").removeClass('alert-danger').addClass('alert-success');
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
                if (response.success) {
                    showMessage(msg, true);
                } else {
                    showMessage(msg);
                }
            }
        }).done(function() {
            $(".center-loading").hide();
            $("#verify").modal('hide');
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
        });


    }
</script>

