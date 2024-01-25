@extends('layouts.admin')
@section('title', 'Admin | sales')

@section('page-headder')
    {{-- sales --}}
@endsection

@section('content')
    <div class="row my-auto align-items-center bg-white shadow-md border mb-3 py-2">
        <div class="col-md-6">
            <span class="my-auto h6 page-headder">@yield('page-headder')</span>
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"> <a href="{{ route('admin.dashboard') }}" class="text-primary"><i
                            class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item text-dark"><a href="{{ route('admin.sales.index') }}">sales</a></li>
            </ol>
        </div>
        <div class="col-md-6">
            <ol class="float-right button">
                {{-- <span class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"> Add New</span> --}}
                <a href="{{ route('admin.sales.create') }}" class="btn btn-success">Add sales</a>
                <a href="{{ route('admin.newsale') }}" class="btn btn-success">Add New sales</a>

            </ol>
        </div>
    </div>




    <div class="row">
        <div class="col-12 p-0">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissable text-center" style="display: none;">
                            <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <strong>Success!! Record Saved Successfully! SMS Has been Sent!</strong>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="invoice p-4">
                    <!-- Title row -->
                    <div class="printableArea">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="page-header mb-3">
                                    <i class="fa fa-globe"></i> Sales Invoice
                                    <small class="pull-right">Date: 14-01-2024 01:43:31 pm</small>
                                </h3>
                            </div>
                        </div>

                        <!-- Info row -->
                        <div class="row invoice-info">
                            <!-- From -->
                            <div class="col-sm-4 invoice-col">
                                <p> <i>From</i></p>

                                <address style="line-height:.6">
                                    <p>Khush Fashion Palace</p>
                                    <p>AP: Ankali,</p>
                                    <p>City: Belgaum</p>
                                    <p>Phone: 8888888888,</p>
                                    <p>Mobile: 9999999999</p>
                                    <p>Email: admin@example.com</p>
                                    <p>VAT Number: VAT123</p>
                                </address>
                            </div>

                            <!-- Customer Details -->
                            <div class="col-sm-4 invoice-col">
                                <i>Customer Details<br></i>
                                <address style="line-height:1.5">
                                    <strong>Chris Moris</strong><br>
                                    Cris Building, NY USA, New York-584444<br>
                                    Mobile: 845457454545<br> Phone: 081454544<br> Email: chris@gmail.com<br> GST Number:
                                    GST655<br>
                                    TAX Number: TAx6555<br>
                                </address>
                            </div>

                            <!-- Invoice Details -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #SL0041</b><br>
                                <b>Sales Status: Final</b><br>
                                <b>Reference No.: 6546</b><br>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped records_table table-bordered">
                                    <thead class="bg-gray-active">
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Net Cost</th>
                                            <th class="block">Tax</th>
                                            <th class="block">Tax Amount</th>
                                            <th>Discount</th>
                                            <th>Discount Amount</th>
                                            <th>Unit Cost</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>Lee Jacket</td>
                                            <td class="text-right">₹ 1100.00</td>
                                            <td>1.00</td>
                                            <td class="text-right">₹ 1100.00</td>
                                            <td class="block">Tax 10%<br><b>Inclusive</b></td>
                                            <td class="text-right block">₹ 100.00</td>
                                            <td></td>
                                            <td class="text-right">₹ 0.00</td>
                                            <td class="text-right">₹ 1100.00</td>
                                            <td class="text-right">₹ 1100.00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Armany jacket</td>
                                            <td class="text-right">₹ 2750.00</td>
                                            <td>1.00</td>
                                            <td class="text-right">₹ 2750.00</td>
                                            <td class="block">Vat 5%<br><b>Inclusive</b></td>
                                            <td class="text-right block">₹ 130.95</td>
                                            <td></td>
                                            <td class="text-right">₹ 0.00</td>
                                            <td class="text-right">₹ 2750.00</td>
                                            <td class="text-right">₹ 2750.00</td>
                                        </tr>

                                    </tbody>
                                    <tfoot class="text-right text-bold bg-gray">
                                        <tr>
                                            <td colspan="2" class="text-center">Total</td>
                                            <td>₹ 3850.00</td>
                                            <td class="text-left">2.00</td>
                                            <td class="block"></td>
                                            <td class="block"></td>
                                            <td>₹ 230.95</td>
                                            <td></td>
                                            <td>₹ 0.00</td>


                                            <td></td>
                                            <td>₹ 3850.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span for="discount_to_all_input" class="  control-span"
                                                style="font-size: 17px;">Discount on All</span>
                                            <span class="control-label  " style="font-size: 17px;">: 21(%)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span for="discount_to_all_input" class="  control-span"
                                                style="font-size: 17px;">Note</span>
                                            <span class="control-label  " style="font-size: 17px;">: </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4 class="box-title text-info">Payments Information : </h4>
                                            <table class="table table-hover table-bordered" style="width:100%"
                                                id="">
                                                <thead>
                                                    <tr class="bg-purple">
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Payment Type</th>
                                                        <th>Payment Note</th>
                                                        <th>Payment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-center text-bold bg-light" id="payment_row_100">
                                                        <td>1</td>
                                                        <td>14-01-2024</td>
                                                        <td>Cash</td>
                                                        <td></td>
                                                        <td class="text-right">3850.00</td>
                                                    </tr>
                                                    <tr class="text-right text-bold">
                                                        <td colspan="4">Total</td>
                                                        <td>3850.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <table class="col-md-12">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-right" style="font-size: 17px;">Subtotal</th>
                                                        <th class="text-right" style="padding-left:10%;font-size: 17px;">
                                                            <h6><b id="subtotal_amt" name="subtotal_amt">3850.00</b></h6>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-right" style="font-size: 17px;">Other Charges</th>
                                                        <th class="text-right" style="padding-left:10%;font-size: 17px;">
                                                            <h6><b id="other_charges_amt"
                                                                    name="other_charges_amt">0.00</b></h6>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-right" style="font-size: 17px;">Discount on All
                                                        </th>
                                                        <th class="text-right" style="padding-left:10%;font-size: 17px;">
                                                            <h6><b id="discount_to_all_amt"
                                                                    name="discount_to_all_amt">0.00</b></h6>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-right" style="font-size: 17px;">Round Off</th>
                                                        <th class="text-right" style="padding-left:10%;font-size: 17px;">
                                                            <h6><b id="round_off_amt" name="tot_round_off_amt">0.00</b>
                                                            </h6>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-right" style="font-size: 17px;">Grand Total</th>
                                                        <th class="text-right" style="padding-left:10%;font-size: 17px;">
                                                            <h6><b id="total_amt" name="total_amt">3850.00</b></h6>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row no-print py-3">
                            <div class="col-xs-12">
                                {{-- <a href="https://pos.creatantech.com/sales/update/41" class="btn btn-success">
                                    <i class="fa  fa-edit"></i> Edit
                                </a> --}}

                                <a href="{{ route('admin.printPosInvoice') }}" target="_blank" class="btn btn-warning">
                                    <i class="fa fa-print"></i>
                                    Print
                                </a>

                                <a target="_blank" class="btn btn-info pointer" onclick="print_invoice(41)">
                                    <i class="fa fa-file-text"></i>
                                    POS Invoice
                                </a>


                                <a href="{{ route('admin.salesInvoice') }}" target="_blank" class="btn btn-info">
                                    <i class="fa fa-file-pdf-o"></i>
                                    PDF
                                </a>

                                <a href="#" class="btn btn-danger">
                                    <i class="fa fa-undo"></i> Sales Return
                                </a>

                            </div>
                        </div>
                </section>
                <!-- /.content -->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
