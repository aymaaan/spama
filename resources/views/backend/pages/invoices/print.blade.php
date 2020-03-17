<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <section class="card">
                <div id="invoice-template" class="card-body">
                    <!-- Invoice Company Details -->
                    <div id="invoice-company-details" class="row">
                        <div class="col-md-6 col-sm-12 text-center text-md-left">
                            <div class="media">
                                <img src="{{url('assets/img/logo-2-2x-322x70.png')}}" alt="company logo" class=""
                                />
                                {{--<div class="media-body">--}}
                                {{--<ul class="ml-2 px-0 list-unstyled">--}}
                                {{--<li class="text-bold-800">Modern Creative Studio</li>--}}
                                {{--<li>4025 Oak Avenue,</li>--}}
                                {{--<li>Melbourne,</li>--}}
                                {{--<li>Florida 32940,</li>--}}
                                {{--<li>USA</li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 text-center text-md-right">
                            <h2>{{ __('backend.invoice_number') }}</h2>
                            <p class="pb-3"> {{ $data->invoice_number}}</p>
                            {{--<ul class="px-0 list-unstyled">--}}
                            {{--<li>Balance Due</li>--}}
                            {{--<li class="lead text-bold-800">$ 12,000.00</li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                    <!--/ Invoice Company Details -->
                    <!-- Invoice Customer Details -->
                    <div id="invoice-customer-details" class="row pt-2">
                        <div class="col-md-3"><h3> {{ __('backend.supplier_name') }}</h3>
                            <h4>{{ $data->customer_name}}</h4>
                        </div>
                        <div class="col-md-3"><h3> {{ __('backend.supplier_tax') }}</h3>
                            <p>{{ $data->ustomer_tax}}</p>
                        </div>
                        <div class="col-md-3"><h3> {{ __('backend.payment_types') }}</h3>
                            <p>{{ $data->payment_types}}</p>
                        </div>
                        <div class="col-md-3"><h3> {{ __('backend.date') }}</h3>
                            <p>{{ $data->date}}</p>
                        </div>


                        {{--<div class="col-sm-12 text-center text-md-left">--}}
                        {{--<p class="text-muted">{{ __('backend.customer_name') }}</p>--}}
                        {{----}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-12 text-center text-md-left">--}}
                        {{--<h4 style="text-align:right;">{{ __('backend.customer_name') }} : dfdfdfd</h4>--}}
                        {{--<p>--}}
                        {{--<span class="text-muted-right">{{ __('backend.customer_tax') }} :</span> 06/05/2017</p>--}}
                        {{--<p>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-12 text-center text-md-right">--}}
                        {{--<p>--}}
                        {{--<span class="text-muted">{{ __('backend.customer_name') }} :</span> 06/05/2017</p>--}}
                        {{--<p>--}}
                        {{--<span class="text-muted">{{ __('backend.payment_types') }} :</span> Due on Receipt</p>--}}
                        {{--<p>--}}
                        {{--<span class="text-muted">{{ __('backend.customer_name') }} :</span> 10/05/2017</p>--}}
                        {{--</div>--}}
                    </div>
                    <!--/ Invoice Customer Details -->
                    <!-- Invoice Items Details -->
                    <div id="invoice-items-details" class="pt-2">
                        <div class="row">
                            <div class="table-responsive col-sm-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>SKU</th>
                                        <th>SKU Supplier</th>
                                        <th class="text-right">{{ __('backend.description') }}</th>
                                        <th class="text-right">{{ __('backend.exp') }}</th>
                                        <th class="text-right">{{ __('backend.lot') }}</th>
                                        <th class="text-right">{{ __('backend.unit') }}</th>
                                        <th class="text-right">{{ __('backend.qty') }}</th>
                                        <th class="text-right">{{ __('backend.unit_price') }}</th>
                                        <th class="text-right">{{ __('backend.disc') }}</th>
                                        <th class="text-right">{{ __('backend.total') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ( $data_details as $k=>$row )
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>
                                                {{$row->sku}}
                                            </td>
                                            <td>
                                                @php
                                                    $skuProduct = \App\Products::where('sku',$row->sku)->first();
                            $skuSupplier = \App\ProductsSuppliers::where('product_id',$skuProduct['id'])->first();
                                                @endphp

                                                {{$skuSupplier['sku']}}
                                            </td>

                                            <td>
                                                {{$row->description}}
                                            </td>
                                            <td class="text-right">{{$row->expiry_date}}</td>
                                            <td class="text-right">{{$row->lot_number}}</td>
                                            <td class="text-right">{{$row->unit}}</td>
                                            <td class="text-right">{{$row->qty}}</td>
                                            <td class="text-right">{{$row->unit_price}}</td>
                                            <td class="text-right">{{$row->discount}}</td>
                                            <td class="text-right">{{$row->total}}</td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            {{--<div class="col-md-7 col-sm-12 text-center text-md-left">--}}
                            {{--<p class="lead">Payment Methods:</p>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-md-8">--}}
                            {{--<table class="table table-borderless table-sm">--}}
                            {{--<tbody>--}}
                            {{--<tr>--}}
                            {{--<td>Bank name:</td>--}}
                            {{--<td class="text-right">ABC Bank, USA</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td>Acc name:</td>--}}
                            {{--<td class="text-right">Amanda Orton</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td>IBAN:</td>--}}
                            {{--<td class="text-right">FGS165461646546AA</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td>SWIFT code:</td>--}}
                            {{--<td class="text-right">BTNPP34</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                            {{--</table>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-8 col-sm-12">
                                {{--<p class="lead">Total due</p>--}}
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>{{ __('backend.total') }}</td>
                                            <td class="text-right">{{$data->total}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('backend.disc') }}</td>
                                            <td class="text-right">{{$data->disc}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('backend.vat') }}</td>
                                            <td class="text-right">{{$data->vat}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('backend.net') }}</td>
                                            <td class="text-right">{{$data->net}}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                {{--<div class="text-center">--}}
                                {{--<p>Authorized person</p>--}}
                                {{--<img src="app-assets/images/pages/signature-scan.png" alt="signature" class="height-100"--}}
                                {{--/>--}}
                                {{--<h6>Amanda Orton</h6>--}}
                                {{--<p class="text-muted">Managing Director</p>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Footer -->
                    <div id="invoice-footer">
                        <div class="row">
                            <div class="col-md-7 col-sm-12">
                                {{--<h6>Terms & Condition</h6>--}}
                                <p>You know, being a test pilot isn't always the healthiest business
                                    in the world. We predict too much for the next year and yet far
                                    too little for the next 10.</p>
                            </div>
                            <div class="col-md-5 col-sm-12 text-center">
                                <a target="#" data-toggle="modal" data-target="#print" style="float:left;color:#fff;" class="btn btn-success print-window">  طباعة    </a>
                            </div>
                        </div>
                        <!--/ Invoice Footer -->
                    </div>
            </section>
        </div>
    </div>
</div>