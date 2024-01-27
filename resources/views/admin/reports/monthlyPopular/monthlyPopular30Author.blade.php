@extends('backend.layouts.app')
@section('title', 'Order List')
@section('content')
    <div class="mt-2 mb-3 text-left aiz-titlebar">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">
                    {{ __('9B_B_05G1 Monthly Most Popular 30 Author') }}
                </h1>
            </div>
            <div class="col-md-6 text-md-right">

            </div>
        </div>
    </div>

    <div class="shadow card">
        <form id="searchOrder" action="{{ url()->current() }}" method="GET">
            <div class="flex card-header justify-content-betweens">
                <div class="col-9">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center">
                            <label class="mr-2 fw-700" for="">From Date:</label>
                            <input class="form-control" type="date" name="from_date" value="{{ @request('from_date') }}">
                        </div>
                        <div class="col-4 d-flex align-items-center">
                            <label class="ml-2 mr-2 fw-700"  for="">To Date:</label>
                            <input class="form-control" type="date" name="to_date" value="{{ @request('to_date') }}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-info">Search</button>
                    <a href="{{ route('admin.report.monthlyPopular100') }}" id="reset" class="btn btn-warning">Reset</a>
                    @if(request('from_date') && request('to_date'))
                        <a href="{{url('/admin/bb-b-05g1-pdf')}}?from_date={{request('from_date')}}&to_date={{request('to_date')}}" target="_blank" class="btn btn-success">
                          PDF
                        </a>
                    @endif
                </div>
            </div>
        </form>
        @if(isset($data) && count($data) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center">SL</th>
                    <th style="text-align: left">Author Name</th>
                    <th style="text-align: center">Issue Oty</th>
                    <th style="text-align: center">UOM</th>
                    <th style="text-align: center">Amount</th>
                    <th style="text-align: left">Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <td style="text-align: center">
                            {{ $key + 1 }}
                        </td>
                        <td style="text-align: left">{{ $item->authorNameBn }}</td>
                        <td style="text-align: center">{{ $item->totalQuantity }}</td>
                        <td style="text-align: center">Pcs</td>
                        <td style="text-align: center">{{ $item->totalAmount }}</td>
                        <td style="text-align: left">{{ $item->remarks }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       @endif
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
                <div class="text-center modal-body">
                    {{-- <p class="mt-1">{{ translate('Are you sure to confirm this?') }}</p>
                    <button type="button" class="mt-2 btn btn-link"
                        data-dismiss="modal">{{ translate('Cancel') }}</button>
                    <a onclick="confirmOrder()" href="javascript:void(0)"
                        class="mt-2 btn btn-primary">{{ translate('Confirm') }}</a> --}}
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
                <div class="text-center modal-body">
                    <p class="mt-1">{{ translate('Are you sure that this order is Delivered ?') }}</p>
                    <button type="button" class="mt-2 btn btn-link"
                        data-dismiss="modal">{{ translate('Cancel') }}</button>
                    <a onclick="deliverOrder()" href="javascript:void(0)"
                        class="mt-2 btn btn-primary">{{ translate('Delivered') }}</a>
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
                <div class="text-center modal-body">
                    <p class="mt-1">{{ translate('Are you sure to cancel this order?') }}</p>
                    <button type="button" class="mt-2 btn btn-link"
                        data-dismiss="modal">{{ translate('Close') }}</button>
                    <a onclick="cancelOrder()" href="javascript:void(0)"
                        class="mt-2 btn btn-primary">{{ translate('Cancel') }}</a>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
@endsection
