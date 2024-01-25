@extends('layouts.admin')
@section('title', 'Admin | Category')

@section('page-headder')
{{-- Categories --}}
@endsection

@section('content')
<div class="row my-auto align-items-center bg-white shadow-md border mb-3 py-2">
    <div class="col-sm-6">
        <span class="my-auto h6 page-headder">@yield('page-headder')</span>
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"> <a href="{{ route('admin.dashboard') }}" class="text-primary"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item text-dark"><a href="{{ route('admin.categories.index') }}">POS Sales</a></li>

        </ol>
    </div>
    <div class="col-md-6">
        <ol class="float-right button">
            <a href="{{ route('admin.sales.index') }}" class="btn btn-success">Sales</a>

        </ol>
    </div>
</div>
<style>
    .product-img img {
        width: 100px;
        height: 120px
    }

    .product-text-area p {
        font-size: 13px;
    }

    /* .product-list-wrapper {
         text-align: center
         } */

    .product-info__content .fs-6 {
        font-size: 13px;
    }

    .productListContainer .col-4:hover {
        border: 1px solid #999;

    }

    .home-details-btn-wrapper {
        display: block;

    }


    #loader {
        display: none;

    }


    .input-group-btn {
        display: flex;
        flex-direction: column;
    }

    .btn {
        cursor: pointer;
    }

</style>


<div class="row">
    <div class="col-md-8 p-0">
        <div class="card">
            <div class="card-header border bg-light">
                <h6 class="text-dark">Best Selling Product </h6>
                <form action="">
                    <div class="d-flex justify-content-start">

                        <div class="col-md-4 m-0 p-0">
                            <div class="form-group">
                                <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror" id="parent_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name_english }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                            <div class="input-group">
                                <input type="search" name="search" value="" placeholder="Search here" class="form-control" id="inlineFormInputGroup">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-search"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-code"></i></label>
                                <input type="search" name="search" value="" placeholder="bar-code" class="form-control" id="inlineFormInputGroup">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div id="productContainer" class="row card-body px-4">
                @foreach ($items as $item)
                <div class="col-4 col-xl-3 borde p-0" title="{{ $item->name }}">
                    <div class="product-list-wrapper text-center m-1 border p-2">
                        <a href="#" title="{{ $item->name }}" target="_blank">
                            <div class="product-img">
                                <img src="{{asset('uploads/products/'.$item->images)}}" alt="{{ $item->name }}">
                            </div>
                            <div class="product-text-area">
                                <p class="product-title myClass fw-semibold" style="white-space: normal">
                                    {{ $item->name }}
                                </p>
                                <p class="product-status text-capitalize"></p>
                                <p class="product-price">
                                    <span><strike class="original-price pl-2 text-danger">{{ $item->published_price}}
                                            TK.</strike></span>
                                    <span class="fs-6 fw-bold">{{ $item->sell_price }} TK.</span>
                                </p>
                            </div>
                        </a>
                        <div class="home-details-btn-wrapper">
                            <!-- Add onclick attribute to call addToCart function with product ID -->
                            <a class="btn home-details-btn btn-success btn-block" onclick="addToCart(event, '{{ $item->id }}', '{{ $item->code }}')" href="javascript:void(0)">
                                Add to Cart
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div id="pagination_wrapper" style="display: flex;justify-content:center;margin-bottom:15px;">

            </div>
        </div>
    </div>
    <div class="col-md-4 p-0">
        <form action="{{ route('admin.sales.store') }}" class="form-horizontal" id="sales-form" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
            @csrf
            @method('POST')
            <div class="card ml-3 bg-ifo">
                <div class="card-header justify-content-between py-3">
                    <h6 class="card-title float-left pt-2">POS Sells</h6>
                    <div class="col-md-12">
                        <div class="input-group">
                            <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror" id="customer_id">
                                <option value="">--Select Customer--</option>
                                @foreach ($customers as $key => $customer)
                                <option value="{{ $customer->id }}">
                                    {{ $customer->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="input-group-text" for="customer_id" data-bs-toggle="modal" data-bs-target="#addModal">
                                <i class="fa fa-plus"></i>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-2">
                    <div class="row mt-2">
                        <div class="col-md-12 mb-3">

                            <section id="cart_container" class="cart-content">
                                <div class="card-body p-0">
                                    <table class="table table-hover shadow-none" id="itemTable">
                                        <span id="nfp"></span>
                                        <div class="spinner-border" role="status" id="loader">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <tbody id="itemTableBody">
                                            <tr class="bg-primary">
                                                <td colspan="9" id="default">
                                                    <h6 class="text-info"><i class="fa fa-cart-shopping"></i> Your
                                                        Cart is
                                                        Empty</h6>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>

                            </section>

                            <input type="hidden" name="country_id" id="country_id_form">
                            <input id="cart_id" type="hidden" multiple="" name="cart_id" value="">
                            <input type="hidden" value="" name="gift_wrap" id="has_gift">
                        </div>

                        <div class="col-md-12">
                            <div class="bg-white p-1">
                                <section id="checkout-sidebar" class="check-sidebar">
                                    <div class="checkout-sidebar__header">
                                        <h4>Checkout Summary</h4>
                                    </div>

                                    <div class="checkout-sidebar__content">
                                        <table class="col-md-12">
                                            <tbody>
                                                <tr>
                                                    <th class="text-right" style="font-size: 14px;">Total Product
                                                        Quantity: </th>
                                                    <th class="text-right" style="padding-left:10%;font-size: 14px;">
                                                        <b id="total_product_qty" class="total_product_qty" name="total_product_qty">0.00 TK</b>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-right" style="font-size: 14px;">Subtotal:</th>
                                                    <th class="text-right" style="padding-left:10%;font-size: 14px;">
                                                        <b id="subtotal_amt" name="subtotal_amt" class="subtotal_amt">0.00 TK</b>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-right" style="font-size: 14px;">Other Charges:
                                                    </th>
                                                    <th class="text-right" style="padding-left:10%;font-size: 14px;">
                                                        <b id="other_charges_amt" name="other_charges_amt">0.00 TK</b>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-right" style="font-size: 14px;">Discount on
                                                        All:</th>
                                                    <!-- Display the calculated discount_to_all_amt -->
                                                    <th class="text-right" style="padding-left:10%;font-size: 14px;">
                                                        <b id="discount_to_all_amt" name="discount_to_all_amt">0.00
                                                            TK</b>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-right" style="font-size: 14px;">Grand Total:
                                                    </th>
                                                    <th class="text-right" style="padding-left:10%;font-size: 14px;">
                                                        <b id="grand_total" name="total_amt">0.00 TK</b>
                                                    </th>
                                                </tr>

                                                <div class="form-group">
                                                    <label for="amount">Total Payable
                                                        Amount</label>
                                                    <div class="input-group">
                                                        <input type="number" name="total_payable_amount" placeholder="total_payable_amount" class="form-control @error('total_payable_amount') is-invalid @enderror" id="total_payable_amount">
                                                    </div>
                                                    @error('total_payable_amount')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}</div>
                                                    @enderror
                                                </div>


                                            </tbody>
                                        </table>

                                        <div class="gift-wrap my-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="hidden" id="shipping_url" value="">
                                                <input type="hidden" id="customer_id" value="">
                                                <input type="checkbox" class="custom-control-input" id="gift_wrap" name="gift_wrap">
                                                <label class="custom-control-label" for="gift_wrap"> Gift Wrap for Tk.
                                                    20 </label>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 text-right">
                        <button type="submit" class="btn home-details-btn btn-success btn-block">Save</button>
                        <a type="button" class="btn btn-primary btn-block" href="{{ route('admin.sales.index') }}">Cancel</a>
                    </div>
                </div>
        </form>
    </div>
    <!-- /.content -->

    @endsection


    @push('.js')

    <script>
        // Define the addToCart function in the global scope
        function addToCart(event, productId, code) {
            event.preventDefault();

            const apiUrl = '/admin/newsales/getItemByBarcode';
            const loader = document.querySelector('#loader');
            let itemCounter = 1;
            if (document.getElementById("default")) {
                var defaultRow = document.getElementById("default").parentElement;
            }

            const barcode = code;
            loader.style.display = 'block';
            console.log('Barcode:', barcode);

            axios.post(apiUrl, {
                    barcode
                }, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(async response => {
                    const data = await response;
                    setTimeout(() => {
                        loader.style.display = 'none';

                        const nfp = document.querySelector('#nfp');
                        nfp.style.display = 'none';

                        const item = response.data;
                        if (item && item.data) {
                            if (defaultRow) {
                                defaultRow.remove();
                            }

                            const existingRow = findExistingRow(item.data.id);
                            if (existingRow) {
                                const quantityInput = existingRow.querySelector('[name="product_qty[]"]');
                                const quantityValue = parseInt(quantityInput.value);
                                const newQuantity = quantityValue + parseInt(item.data.min_qty);
                                quantityInput.value = newQuantity;
                                updateTotalAmount(existingRow);
                            } else {
                                const cartContainer = document.querySelector('#itemTableBody');
                                const row = document.createElement('tr');
                                //console.log(cartContainer);
                                row.className = "bg-white border-bottom cart_container";
                                row.innerHTML = `  
                                <td>${itemCounter}</td>
                                <td class="p-0 m-0"><input type="hidden" name="product_id[]" value="${item.data.id}"></td>
                               
                                <div class="d-flex align-items-center p-2">
                                    
                                   <div class="col-3 col-xl-3"> <div class="product-cover"><a href="#"> <img class="img-fluid border border-rounted" src="{{asset('uploads/products')}}/${item.data.images}" alt="${item.data.images}"></a></div></div>

                                    <div class="col-9"><div class="product-info__content"> <a target="_blank" href="#"> <h6 class="fw-bold">${item.data.name}</h6> </a> <p class="m-0 p-0">${item.data.brand}</p></div>

                                        <div class="align-self-center align-items-center text-center d-flex">
                                            <div class="price-info"><span class="original-price fs-6"> <strike class="text-danger">${item.data.published_price} TK</strike></span> <span class="js--prc fs-5 fw-bolder mx-2">${item.data.sell_price} TK</span> </div>
                                        </div>

                                        <div class="text-center d-flex justify-content-center">
                                            <div class="input-group">
                                                <span class="input-group-btn"> <button type="button" class="btn btn-warning btn-md quantity-decrement" style="border-radius:5px 0px 0px 5px">-</button> </span>
                                                <input type="number" name="product_qty[]" value="${item.data.min_qty}" min="${item.data.min_qty}" max="200" placeholder="Quantity" class="form-control qty" onchange="updateTotalAmount(this.parentElement.parentElement)">
                                                <span class="input-group-btn"> <button type="button" class="btn btn-warning btn-md quantity-increment" style="border-radius:0px 5px 5px 0px">+</button></span>
                                            </div>

                                            <input type="hidden" name="product_sell_price[]" value="${item.data.sell_price}" class="sell_price"></input>
                                            <input type="hidden" name="product_discount" class="product_discount" value="${item.data.discount}"></input>
                                            <input type="hidden" class="product_tax_amount" value="${item.data.tax_amount}"></input>
                                            <input type="hidden" class="total_amount" name="product_total_amount" value="${(item.data.min_qty * item.data.sell_price) - item.data.discount}">


                                            <button type="button" data-id="${item.data.id}" onclick="deleteRow(this)" class="remove btn btn-sm text-danger fs-5"> <i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>`;
                                cartContainer.appendChild(row);
                                itemCounter++;
                                updateTotalAmount(row);
                            }
                        } else {
                            if (barcode != ' ') {
                                nfp.style.display = 'block';
                                nfp.innerHTML =
                                    `<span id="notfound"><h6> <span class="text-danger">${barcode}</span> Not found !</h6></span>`;
                            }
                        }
                    }, 200);
                })
                .catch(error => {
                    console.error(error);
                });
        }

        //Add to cart button click then check duplicate product to cart then marge
        function findExistingRow(productId) {
            const rows = document.querySelectorAll('.cart_container');
            for (const row of rows) {
                const productIdInput = row.querySelector('[name="product_id[]"]');
                if (productIdInput && productIdInput.value === String(productId)) {
                    return row;
                }
            }
            return null;
        }


        //Quantity input then update all data
        function getQuantityFromRow(row) {
            // Create a temporary element to parse the HTML content
            const tempElement = document.createElement('div');
            tempElement.innerHTML = row.outerHTML;

            const quantityInput = tempElement.querySelector('[name="product_qty[]"]');
            return quantityInput ? quantityInput.value : null;
        }

        //});

        //delete the row
        function deleteRow(button) {
            // Get the row that contains the clicked button
            var row = button.parentNode.parentNode;
            // Get the reference to the table
            var table = document.getElementById("itemTable");

            // Delete the row
            table.deleteRow(row.rowIndex);
            updateSummary();
        }


        // Function to update the total amount for a row
        function updateTotalAmount(row) {
            var qty = parseFloat(row.querySelector('.qty').value);
            var sellPrice = parseFloat(row.querySelector('.sell_price').value);
            var discount = parseFloat(row.querySelector('.product_discount').value);
            var tax_amount = parseFloat(row.querySelector('.product_tax_amount').value);

            // Calculate the total amount for the row
            var total_discount = qty * discount;
            var total_tax_amount = qty * tax_amount;
            //var totalAmountwithoutTax = (qty * sellPrice) - total_discount;
            var totalAmount = (qty * sellPrice) - total_discount;
            //var totalAmount = 99;

            // Update the total amount input field in the row
            row.querySelector('.total_amount').value = totalAmount.toFixed(2);
            row.querySelector('.qty').value = qty;
            row.querySelector('.product_tax_amount').value = 55;
            console.log("qty" + qty);
            console.log("sellPrice" + sellPrice);
            console.log(discount);
            console.log(tax_amount);
            // Trigger a recalculation of the summary table
            updateSummary();
        }

        function updateSummary() {
            var subtotal = 0;
            var total_qty = 0;
            var grandTotal = 0;

            // Loop through each row in the item table
            document.querySelectorAll('#itemTableBody tr').forEach(function(row, index) {
                const totalAmount = parseFloat(row.querySelector('.total_amount').value) || 0;
                subtotal += totalAmount;
                const totalProductQty = parseFloat(row.querySelector('.qty').value) || 0;
                total_qty += totalProductQty;

                console.log(totalAmount);
            });

            // Other calculations remain unchanged
            const other_charges_amt = parseFloat(document.getElementById('other_charges_amt').textContent) || 0;
            const discount_to_all_amt = parseFloat(document.getElementById('discount_to_all_amt').textContent) || 0;
            grandTotal = subtotal + other_charges_amt - discount_to_all_amt;

            // Update the subtotal in the summary table
            document.getElementById('subtotal_amt').textContent = subtotal.toFixed(2);
            // Update the total product quantity in the summary table
            document.getElementById('total_product_qty').textContent = total_qty.toFixed(2);
            // Update the grand total in the summary table
            document.getElementById('grand_total').textContent = grandTotal.toFixed(2);
            // Update the total payable amount input field
            document.getElementById('total_payable_amount').value = grandTotal.toFixed(2);
            // ... Add logic to update other fields in the summary table as needed
        }


        function updateDiscountToAllAmt() {
            var discountType = document.getElementById('discount_type_all').value;
            var discountValue = parseFloat(document.getElementById('discount').value) || 0;

            var subtotalAmt = parseFloat(document.getElementById('subtotal_amt').textContent) || 0;
            var discountToAllAmtElement = document.getElementById('discount_to_all_amt');

            if (discountType == 1) {
                // Percentage discount
                var calculatedDiscount = (subtotalAmt * discountValue) / 100;
                discountToAllAmtElement.textContent = calculatedDiscount.toFixed(2);
            } else {
                // Amount discount
                discountToAllAmtElement.textContent = discountValue.toFixed(2);
            }
        }




        document.addEventListener('click', function(event) {
            if (event.target.matches('.quantity-increment')) {
                handleQuantityChange(1);
            } else if (event.target.matches('.quantity-decrement')) {
                handleQuantityChange(-1);
            }
        });

        function handleQuantityChange(increment) {
            var inputField = document.querySelector('.qty');
            var currentValue = parseInt(inputField.value);
            var minValue = parseInt(inputField.getAttribute('min'));
            var maxValue = parseInt(inputField.getAttribute('max'));

            if (!isNaN(currentValue)) {
                var newValue = currentValue + increment;
                if (newValue >= minValue && newValue <= maxValue) {
                    inputField.value = newValue;
                }
            }
        }

    </script>
    @endpush
