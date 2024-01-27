@extends('backend.layouts.app')
@section('title', 'Order List')
@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">
                    {{ __('9B_B_05A Customer Order') }}
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
                <div class="">
                    <div class="row">
                        <div
                        @if (request('orderId'))
                        class="col-md-4 align-items-center"
                        @endif
                        class="col-md-9 align-items-center"
                        >

                            <label for="">Order NO:</label>
                            <select name="orderId" class="form-control aiz-selectpicker" data-live-search="true" id="">
                                <option value="">Customer Order No</option>
                                @foreach ($orderIds as $value)
                                    <option value="{{ $value->orderId }}" {{ request()->input('orderId') == $value->orderId ? 'selected' : '' }}>
                                        co-{{ $value->orderId }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @if (request('orderId'))
                        <div class="col-md-4">
                            <label for="" style="margin-left: 5px;">Customer Name:</label>
                            <input type="text" class="form-control" style="margin-left: 5px; width: 200px;" value="{{ $data[0]->customerName ?? '' }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="" style="margin-left: 5px;">Customer Phone Number:</label>
                            <input type="text" class="form-control" style="margin-left: 5px; width: 200px;" value="{{ $data[0]->customerPhone ?? '' }}" readonly>
                        </div>
                        @endif
                    </div>
                </div>
                <div
                class="">
                    <button type="submit" class="btn btn-info">Search</button>
                    <a href="{{ route('admin.report.CustomerOrder') }}" id="reset" class="btn btn-warning">Reset</a>
                    @if(request('orderId'))
                        <a href="{{url('/admin/bb-b-05a-pdf')}}?orderId={{request('orderId')}}" target="_blank" class="btn btn-success">
                           PDF
                        </a>
                    @endif
                </div>

            </div>
        </form>
        @if (request('orderId'))
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: center">SL</th>
                        <th style="text-align: left">Book Name</th>
                        <th style="text-align: center">Qty</th>
                        <th style="text-align: center">UOM</th>
                        <th style="text-align: right">Price(BDT)</th>
                        <th style="text-align: right">Amount(BDT)</th>
                        <th style="text-align: left">Remarks</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($data as $key=>$item)
                        <tr>
                            <td style="text-align: center">
                                {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}
                            </td>
                            <td style="text-align: left">{{ $item->bookNameBn ?? ''}}</td>
                            <td style="text-align: center">{{ number_format($item->qty) }}</td>
                            <td style="text-align: center">Pcs</td>
                            <td style="text-align: right">{{ number_format($item->rate, 2, '.', ',') }}</td>
                            <td style="text-align: right">{{ number_format($item->amount, 2, '.', ',') }}</td>
                            <!-- <td style="text-align: center">{{ $item->amount ?? '' }}</td> -->
                            <td style="text-align: left"></td>
                        </tr>
                    @endforeach
                        <tr style="border-bottom: 1px solid black;">
                            <td style="text-align: right;"colspan ="2"><strong>Total: </strong></td>
                            <td style="text-align: center;"><strong>{{(($data)->sum('qty'))}}</strong></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;"><strong>{{number_format(($data)->sum('amount'),2, '.', ',')}}</strong></td>
                            <td></td>
                        </tr>
                        <tr style="border-bottom: 1px solid black;">
                            <td style="text-align: right;"colspan ="5"><strong>Discount: </strong></td>
                            <td style="text-align: right;"><strong>{{number_format(($data)->sum('discount'),2, '.', ',')}}</strong></td>
                            <td></td>
                        </tr>
                        <tr style="border-bottom: 1px solid black;">
                            <td style="text-align: right;"colspan ="5"><strong>VAT: </strong></td>
                            <td style="text-align: right;"><strong>{{number_format(($data)->sum('vatPercentage'),2, '.', ',')}}</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"colspan ="5"><strong>Grand Total: </strong></td>
                            <td style="text-align: right;"><strong>{{number_format(($data)->sum('amount'),2, '.', ',')}}

                                {{-- @php $total_sum = 0; @endphp
                                @php
                                $total_amnt = 0;
                                $total_amnt = ($data->amount) - ($data->discount) + ($data->vatPercentage);
                                $total_sum += $total_amnt;
                                echo number_format ($total_amnt,2). "<br>";
                                @endphp
                                --}}
                            </strong></td>
                            <td></td>
                        </tr>

                </tbody>
            </table>
            <div class="d-flex justify-content-end" style="margin:10px;">
                {{-- <x-pagination :pagination="$data" /> --}}
                <select id="rowsPerPage" class="form-control" onchange="changeRowsPerPage(this)"style="width: 80px;">
                    <!-- <option value="2" {{ $data->perPage() == 2 ? 'selected' : '' }}>2</option>
                    <option value="5" {{ $data->perPage() == 5 ? 'selected' : '' }}>5</option> -->
                    <option value="10" {{ $data->perPage() == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ $data->perPage() == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ $data->perPage() == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $data->perPage() == 100 ? 'selected' : '' }}>100</option>
                </select>
                {{ $data->appends(request()->input())->links() }}
            </div>
        </div>
        @endif

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
