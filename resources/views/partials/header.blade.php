{!! HTML::script('js/jquery-1.11.3.min.js') !!}
{!! HTML::script('js/jquery-ui.min.js') !!}
{!! HTML::style('css/bootstrap.min.css') !!}
{!! HTML::style('css/bootstrap-theme.min.css') !!}
{!! HTML::style('css/jquery-ui.min.css') !!}
{!! HTML::style('css/bootstrap-datetimepicker.min.css') !!}
{!! HTML::style('css/dataTables.bootstrap.min.css') !!}
{!! HTML::style('css/dataTables.jqueryui.min.css') !!}
{!! HTML::style('css/jquery.dataTables.min.css') !!}
{!! HTML::style('css/normalize.css') !!}
{!! HTML::style('css/select2.css') !!}

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
        border-left: 8px solid #d5ddea;

    }

    #sidebar li a{
        display: block;
        padding: 10px 15px;
        text-decoration: none;
        color: #777;
    }
    #sidebar li a:hover{
        background: #e5e5e5;

    }

    #sidebar li a.active {
        /*background-color: #2E6DA4;*/
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

    #sidebar_header{
        border-radius: 0.3em 0.3em 0 0;
        background: #3072AC;
        color: #eee;
        padding: 10px 15px;
        text-transform: uppercase;
    }

    #dashboard .panel-heading {
        font-size: 1.5em;
    }
    .heading-title {
        font-weight: bold;
        text-shadow: 1px 1px 1px #444;
    }

    .home_button{

    }

    .dataTables_filter input{

        width: 90% !important;
        display: inline-block !important;
    }

    .dataTables_filter label{
        display: block !important;
    }

    .select2-selection{
        height: 33px !important;
    }

    #new_distributor .row{
        margin-bottom: 10px;
    }

    .search_highlight{
        background-color: #bbd4e8 !important;
        color: #222;
        text-shadow: 1px 1px 1px #fff;
    }


    .navbar-custom{
        background: #2e6da4;
    }

    .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
        color: #000;  /*Sets the text hover color on navbar*/
        background: #2e6da4;

    }

    /*.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active >*/
    /*a:hover, .navbar-default .navbar-nav > .active > a:focus {*/
        /*color: white; *//*BACKGROUND color for active*/
        /*background-color: red;*/
    /*}*/

    .navbar-default {
        background-color: #2e6da4 !important;
        /*border-color: #030033;*/
    }

    .dropdown-menu > li > a:hover,
    .dropdown-menu > li > a:focus {
        color: #262626;
        text-decoration: none;
        background-color: #66CCFF;  /*change color of links in drop down here*/
    }

    .nav > li > a:hover,
    .nav > li > a:focus {
        text-decoration: none;
        background-color: silver; /*Change rollover cell color here*/
    }


    .navbar-default .navbar-nav > li > a {
        color: white; /*Change active text color here*/
    }

    /* Transition effects */
    .navigation{
        /*float: left;*/
        /*height: 100%;*/
        /*position: relative;*/
        background: #2e6da4;
        padding: 0;
    }

    .navigation ul li a {
        color: #fff;
        text-transform: uppercase;
        /*font-family: "OpenSans",*/

        -o-transition:color .1s ease-out, background .4s ease-in;
        -ms-transition:color .1s ease-out, background .4s ease-in;
        -moz-transition:color .1s ease-out, background .4s ease-in;
        -webkit-transition:color .1s ease-out, background .4s ease-in;
        /* ...and now override with proper CSS property */
        transition:color .1s ease-out, background .4s ease-in;
        outline: 0;

    }

    .navigation ul li a:hover { background:#3276B0 !important;color:#fff !important;}
    .navigation li.active { border-left-color: #3276B0 !important;color:#fff !important; }

    #navbar ul li a { text-shadow: 1px 1px 1px #222; }
    #navbar ul li a:hover { background:#fff !important;color:#3276B0 !important; }
    #navbar ul li.active { border-left-color: #3276B0 !important;color:#fff !important; text-shadow: 1px 1px 1px #fff;}

    /* Sub Menu Styling */
    #navbar ul li .dropdown-menu { padding: 0;}
    #navbar ul li.active a { text-shadow: 1px 1px 1px #fff !important;}
    #navbar ul li .dropdown-menu li a { background: #fff; color:#777; text-shadow: none; }
    #navbar ul li .dropdown-menu li a:hover { background: #2E6DA4 !important;color: #fff !important; }

</style>
