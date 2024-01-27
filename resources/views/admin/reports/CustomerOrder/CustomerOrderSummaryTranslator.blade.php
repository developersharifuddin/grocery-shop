@extends('backend.layouts.app')
@section('title', 'Order List')
@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">
                    {{ __('9B_B_05B2 Customer Order Summary By Translator') }}
                </h1>
            </div>
            <div class="col-md-6 text-md-right">

            </div>
        </div>
    </div>

    <div class="card shadow">
        <form id="searchOrder" action="{{ url()->current() }}" method="GET">
            <input type="hidden" name="page" value="{{ @request('page') }}">
            <div class="card-header justify-content-betweens flex">
                <div class="col-9">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center">
                            <label class="mr-2 fw-700" for="">Order From Date:</label>
                            <input class="form-control" type="date" name="from_date" value="{{ @request('from_date') }}">
                        </div>
                        <div class="col-4 d-flex align-items-center">
                            <label class="mr-2 ml-2 fw-700"  for="">Order To Date:</label>
                            <input class="form-control" type="date" name="to_date" value="{{ @request('to_date') }}">
                        </div>
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-info">Search</button>
                    <a href="{{ route('admin.report.CustomerOrderSummaryTranslator') }}" id="reset" class="btn btn-warning">Reset</a>
                    @if(request('from_date') && request('to_date'))
                        <a href="{{url('/admin/bb-b-05b2-pdf')}}?from_date={{request('from_date')}}&to_date={{request('to_date')}}" target="_blank" class="btn btn-success">
                           PDF
                        </a>
                    @endif
                </div>

            </div>
        </form>
        @foreach ($data as $item)
        <p class="m-3 fs-17">Translator: <b>{{ $item['translatorNameBn'] }}</b></p>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center" width="10%">SL</th>
                    <th style="text-align: center" width="10%">Order No</th>
                    <th style="text-align: left" width="20%">Book Name</th>
                    <th style="text-align: center" width="10%">Qty</th>
                    <th style="text-align: center" width="10%">UOM</th>
                    <th style="text-align: right" width="10%">Rate</th>
                    <th style="text-align: right" width="10%">Amount</th>
                    <th style="text-align: left" width="20%">Remarks</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($item['data'] as $key => $value)
                    <tr>
                        <td style="text-align: center">{{ $key+1 }}</td>
                        <td style="text-align: center">{{ $value->orderId}}</td>
                        <td style="text-align: left">{{ $value->bookNameBn }}</td>
                        <td style="text-align: center">{{ number_format($value->qty) }}</td>
                        <td style="text-align: center">Pcs</td>
                        <td style="text-align: right">{{ number_format($value->rate) }}</td>
                        <td style="text-align: right">{{ number_format($value->amount) }}</td>
                        <td style="text-align: left">{{ $value->remarks}}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td style="text-align: right;"colspan ="3"><strong>Total: </strong></td>
                        <td style="text-align: center;"><strong>{{(($item['data'])->sum('qty'))}}</strong></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;"><strong>{{number_format(($item['data'])->sum('amount'), 2, '.', ',')}}</strong></td>
                        <td></td>
                    </tr>
            </tbody>
        </table>

        {{-- @dump($authors) --}}
        <div class="d-flex justify-content-end">
            {{-- <x-pagination :pagination="$orders" /> --}}
        </div>
        @endforeach
    </div>


    @push('script')
        <script>
            var confirmUrl = '';
            var deliveryStatusDomId = '';

            $('#reset').click(function() {
                $('#payment_status').val('')
                $('#order_status').val('');
                $('#searchOrder').submit();
            })

            $(document).on('click', '.confirm-order', function(event) {
                event.preventDefault();
                confirmUrl = $(this).attr('href');
                deliveryStatusDomId = "#order_status_" + $(this).data('id');
                $('#confirm-modal').modal('show');
            })

            $(document).on('click', '.deliver-order', function(event) {
                event.preventDefault();
                confirmUrl = $(this).attr('href');
                deliveryStatusDomId = "#order_status_" + $(this).data('id');
                $('#deliver-modal').modal('show');
            })


            $(document).on('click', '.cancel-order', function(event) {
                event.preventDefault();
                confirmUrl = $(this).attr('href');
                deliveryStatusDomId = "#order_status_" + $(this).data('id');
                $('#cancel-modal').modal('show');
            })

            const confirmOrder = () => {
                const data = {
                    order_status: 'confirmed'
                };
                axios.post(confirmUrl, data)
                    .then((response) => {
                        $(deliveryStatusDomId).html('Confirmed');
                        $(deliveryStatusDomId).removeClass('text-info');
                        $(deliveryStatusDomId).removeClass('text-danger');
                        $(deliveryStatusDomId).addClass('text-success');
                        $('.modal').modal('hide');
                        AIZ.plugins.notify('success', 'Successfully Order Confirmed');
                    }).catch((error) => {
                        $('.modal').modal('hide');
                        AIZ.plugins.notify('danger', error.response.data.message);
                    })
            }


            const deliverOrder = () => {
                const data = {
                    order_status: 'delivered'
                };
                axios.post(confirmUrl, data)
                    .then((response) => {
                        $(deliveryStatusDomId).html('Delivered');
                        $(deliveryStatusDomId).removeClass('text-info');
                        $(deliveryStatusDomId).removeClass('text-danger');
                        $(deliveryStatusDomId).addClass('text-success');
                        $('.modal').modal('hide');
                        AIZ.plugins.notify('success', 'Successfully Order Confirmed');
                    }).catch((error) => {
                        $('.modal').modal('hide');
                        AIZ.plugins.notify('danger', error.response.data.message);
                    })
            }

            const cancelOrder = () => {
                const data = {
                    order_status: 'cancelled'
                };
                axios.post(confirmUrl, data)
                    .then((response) => {
                        $(deliveryStatusDomId).html('Cancelled');
                        $(deliveryStatusDomId).removeClass('text-info');
                        $(deliveryStatusDomId).removeClass('text-success');
                        $(deliveryStatusDomId).addClass('text-danger');
                        $('.modal').modal('hide');
                        AIZ.plugins.notify('success', 'Successfully Order Cancelled');
                    }).catch((error) => {
                        $('.modal').modal('hide');
                        AIZ.plugins.notify('danger', error.response.data.message);
                    })
            }
        </script>
    @endpush
@endsection

@section('modal')
    <!-- confirm Modal -->
    <div id="confirm-modal" class="modal fade">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{ translate('Order Confirmation') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    {{-- <p class="mt-1">{{ translate('Are you sure to confirm this?') }}</p>
                    <button type="button" class="btn btn-link mt-2"
                        data-dismiss="modal">{{ translate('Cancel') }}</button>
                    <a onclick="confirmOrder()" href="javascript:void(0)"
                        class="btn btn-primary mt-2">{{ translate('Confirm') }}</a> --}}
                </div>
            </div>
        </div>
    </div><!-- /.modal -->


    <!-- Deliver Modal -->
    <div id="deliver-modal" class="modal fade">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{ translate('Order Delivered') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mt-1">{{ translate('Are you sure that this order is Delivered ?') }}</p>
                    <button type="button" class="btn btn-link mt-2"
                        data-dismiss="modal">{{ translate('Cancel') }}</button>
                    <a onclick="deliverOrder()" href="javascript:void(0)"
                        class="btn btn-primary mt-2">{{ translate('Delivered') }}</a>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->


    <!-- Cancel Modal -->
    <div id="cancel-modal" class="modal fade">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{ translate('Order Cancellation') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mt-1">{{ translate('Are you sure to cancel this order?') }}</p>
                    <button type="button" class="btn btn-link mt-2"
                        data-dismiss="modal">{{ translate('Close') }}</button>
                    <a onclick="cancelOrder()" href="javascript:void(0)"
                        class="btn btn-primary mt-2">{{ translate('Cancel') }}</a>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
@endsection
