{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/npm.js') !!}
<script>
    $(document).ready(function() {
        $("#btn_log_drug").on('click', function() {
            load_subpage("inventory/logDrug");
        });

        $("#btn_log_inventory").on('click', function() {
            load_subpage("inventory/create");
        });
    });

    function load_subpage(view) {
        $.ajax({
            type: "GET",
            dataType: "html",
            url: view,
            success: function(response) {
                $("#content").html(response);
            }
        }).error(function(data) {
            console.log(data);
        });
    }
</script>

