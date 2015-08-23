<div>
    <h3 class="text-center label-primary" style="color: #fff;margin-top:5px;padding:10px;">@if (Session::has('data.pharmacy')) {{ Session::get('data.pharmacy')->name }} @endif</h3>
    <div class="form-group row">
        <div class="col-sm-6">
            <label class="text-left" style="text-align: left;"> Pharmacy Information</label>
        </div>
        <div class="col-sm-6">
            <label class="text-left" style="text-align: left;"> {{ $details->created_at }} Date Added </label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label class="text-left" style="text-align: left;"> {{ $details->name }} </label>
        </div>
        <div class="col-sm-6">
            <label class="text-left" style="text-align: left;"> {{ $details->contact }} </label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label class="text-left" style="text-align: left;"> {{ $details->address }} </label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label class="text-left" style="text-align: left;"> {{ $details->city }} </label>
            <label class="text-left" style="text-align: left;"> {{ $details->state }} </label>
            <label class="text-left" style="text-align: left;"> {{ $details->zipcode }} </label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label class="text-left" style="text-align: left;"> DEA: {{ $details->dea }} </label>
        </div>
        <div class="col-sm-6">
            <label class="text-left" style="text-align: left;"> NPI: {{ $details->npi }} </label>
        </div>
    </div>
    <div class="form-group">
        <label class="text-left" style="text-align: left;"> PIC/Contact: {{ $details->rep }} </label>
    </div>
    <div class="form-group">
        <label class="text-left" style="text-align: left;"> Note: {{ $details->note }} </label>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <a href="#" id="transaction_logs" class="btn btn-info btn_dialog_page btn-lg btn-block" data-url="distributor/{{ $details->id }}/transaction"  style="vertical-align: middle;">
                <i class="glyphicon glyphicon-scale"> </i>
                TRANSACTION HISTORY
            </a>
        </div>
        <div class="col-sm-6">
            <a href="#" class="btn btn-info btn_dialog_page btn-lg btn-block" data-url="distributor/{{ $details->id }}/edit"  style="vertical-align: middle;">
                <i class="glyphicon glyphicon-edit"> </i>
                EDIT
            </a>
        </div>

    </div>

</div>
<script>

    $(".btn_dialog_page").on('click',function(event) {
        event.preventDefault();
        var attr = $(this).attr('data-url');

        $('#distributor_detail').on('hidden.bs.modal', function () {
            // do something…

            if (typeof attr !== typeof undefined && attr !== false) {
                if (attr != '') {
                    load_subpage(attr);
                }
            }
        })

        $("#distributor_detail").modal('hide');

        return false;
    });

</script>

