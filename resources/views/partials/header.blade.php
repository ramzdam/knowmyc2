{!! HTML::script('js/jquery-1.11.3.min.js') !!}
{!! HTML::script('js/jquery-ui.min.js') !!}
{!! HTML::style('css/bootstrap.min.css') !!}
{!! HTML::style('css/bootstrap-theme.min.css') !!}
{!! HTML::style('css/jquery-ui.min.css') !!}
{!! HTML::style('css/bootstrap-datetimepicker.min.css') !!}
{!! HTML::style('css/normalize.css') !!}

<style>
    body{
        background: #f5f5f5;
        padding-top: 90px;
    }
    #login {
        background: #fff;
        width: 500px;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid #eee;
        border-radius: .5em;
        padding: 20px;
    }

    #sidebar {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 0.5em;
        list-style: none;
        margin-left: 10px;
        padding: 0;
    }

    #sidebar li{
        border-bottom: 1px solid #ccc;

    }

    #sidebar li a{
        display: block;
        padding: 10px 15px;
        text-decoration: none;
    }
    #sidebar li a:hover{
        background: #e5e5e5;

    }

    #dashboard{
        /*background: #fff;*/
    }
    #filter-container{
        border: 1px solid #ccc;
        border-radius: 0.5em;
        margin: 0;
        padding: 15px;
    }

    .list-table{
        font-size: .9em;
    }
    .error{
        color: red;
    }

    .margin-bottom-block{
        padding: 18px;
        margin-bottom:10px;
    }
    .panel{
        border: none;
    }

    .center-loading {
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: auto;
        height: auto;
        z-index: 9999;
        display: none;
    }

</style>
