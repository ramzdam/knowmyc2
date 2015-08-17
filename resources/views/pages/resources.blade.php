<div id="dashboard" class="col-md-12" style="margin-bottom: 60px;">

    <div style="margin-left: 15px;padding: 20px;border-radius:.5em;border: 1px solid #eee;background: #fff;" class="text-center">
        <h2 style="margin:0;text-align: center;" class="text-uppercase">Know My C2 Helpful Links</h2>
        <div class="text-center">
            Controlled Substance Perpetual Inventory Management and Reporting Syste
        </div>
        @if (Auth::check())
        <h2 class="text-center">
            {{ Session::get('data.pharmacy')->name }}
        </h2>
        @endif
        <h3>DEA Diversion Main Sites</h3>
        {!! HTML::image('images/deadiv_header.png') !!}
        <h3>Order DEA 222 Forms</h3>
        {!! HTML::link('http://www.deadiversion.usdoj.gov/webforms/orderFormsRequest.jsp', null,  ['target' => '_blank']) !!}

        <h3>International Narcotics Control Strategy Report(INCSR)</h3>
        {!! HTML::link('http://www.state.gov/j/inl/rls/ncrypt/', null,  ['target' => '_blank']) !!}

        <h3>Electronic Prescriptinos for Controlled Substances(EPCS)</h3>
        {!! HTML::link('http://deadiversion.usdoj.gov/ecomm/e_rx/index.html', null,  ['target' => '_blank']) !!}

        <h3>Prescription Drug Monitoring Programs(PDMP)<br/>
            Individual State Information and Links</h3>
        {!! HTML::link('http://www.pdmpassits.org/content/state-profile', null,  ['target' => '_blank']) !!}


    </div>

</div>
