  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="z-index:10000 !important">

      <!-- Brand Logo -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center border-bottom border-dark">
          <div class="image">
              @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
              <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
              @endif
              <img src="{{ asset('backend/dist/img/dms.png') }}" class="img" alt="User Image" style="height: 44px; width:auto;">
          </div>

          {{-- <div class="info">
              <a href="/user/profile" class="d-block"> DMS</a>
          </div> --}}
      </div>
      <!-- Sidebar -->
      <div class="sidebar mt-0">
          <!-- Sidebar user panel (optional) -->

          <div class="form-inline mb-4 mt-0">
              <div class="input-group bg-transparent" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar bg-transparent" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar bg-transparent">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
              <div class="sidebar-search-results">
                  <div class="list-group"><a href="#" class="list-group-item">
                          <div class="search-title"><strong class="text-light">
                              </strong>N<strong class="text-light"></strong>
                              o<strong class="text-light"></strong> <strong class="text-light"></strong>e
                              <strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light">
                              </strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n
                              <strong class="text-light"></strong>t<strong class="text-light"></strong>
                              <strong class="text-light"></strong>f<strong class="text-light"></strong>o
                              <strong class="text-light"></strong>u<strong class="text-light"></strong>n
                              <strong class="text-light"></strong>d<strong class="text-light"></strong>
                              !<strong class="text-light"></strong>
                          </div>
                          <div class="search-path"></div>
                      </a></div>
              </div>
          </div>
          <style>
              .nav-item a p {
                  font-size: 13px !important;
                  color: #f6f6f6;
              }

          </style>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child nav-child-indent nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                      <a href="{{ url('admin/dashboard') }}" class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>


                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              House keeping
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">


                          <li class="nav-item">
                              <a href="{{ url('admin/categories') }}" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-copy"></i>
                                  <p>
                                      All Categories
                                  </p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{ url('admin/brands') }}" class="nav-link {{ request()->is('admin/brands*') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-copy"></i>
                                  <p>
                                      All Brands
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/uoms') }}" class="nav-link {{ request()->is('admin/uoms*') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-copy"></i>
                                  <p>
                                      All UOM
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/sizes') }}" class="nav-link {{ request()->is('admin/sizes*') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-copy"></i>
                                  <p>
                                      All Sizes
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/colors') }}" class="nav-link {{ request()->is('admin/colors*') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-copy"></i>
                                  <p>
                                      All Colors
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/products') }}" class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-copy"></i>
                                  <p>
                                      Manage Products
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/product/barcode/create') }}" class="nav-link {{ request()->is('admin/product/barcode*') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-copy"></i>
                                  <p>
                                      Barcode Generate
                                  </p>
                              </a>
                          </li>








                          {{-- <li class="nav-item">
                              <a href="{{ url('admin/categories') }}"
                          class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                          <i class="fa-solid fa-list-check"></i>
                          <p>
                              Product Category
                          </p>
                          </a>
                  </li> --}}

                  {{-- <li class="nav-item">
                              <a href="{{ url('admin/brand') }}" class="nav-link">
                  <i class="fa-solid fa-list-check"></i>
                  <p>
                      Product Brand
                  </p>
                  </a>
                  </li> --}}
                  {{-- <li class="nav-item">
                              <a href="{{ url('admin/color') }}" class="nav-link">
                  <i class="fa-solid fa-list-check"></i>
                  <p>
                      Product Color
                  </p>
                  </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('admin/size') }}" class="nav-link">
                          <i class="fa-solid fa-list-check"></i>
                          <p>
                              Product Size
                          </p>
                      </a>
                  </li> --}}


                  {{-- <li class="nav-item">
                              <a href="{{ url('admin/uom/set') }}" class="nav-link">
                  <i class="fa-solid fa-list-check"></i>
                  <p>
                      Product Unit Set
                  </p>
                  </a>
                  </li> --}}

                  {{-- <li class="nav-item">
                              <a href="{{ url('admin/uom') }}" class="nav-link">
                  <i class="fa-solid fa-list-check"></i>
                  <p>
                      Product Unit
                  </p>
                  </a>
                  </li> --}}

                  {{--
                          <li class="nav-item">
                              <a href="{{ url('admin/products') }}" class="nav-link">
                  <i class="fa-solid fa-list-check"></i>
                  <p>
                      Manage Products
                  </p>
                  </a>
                  </li> --}}
              </ul>
              </li>


              <li class="nav-item">
                  <a href="{{ url('admin/customers') }}" class="nav-link {{ request()->is('admin/customers*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                          All Customers
                      </p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{ url('admin/suppliers') }}" class="nav-link {{ request()->is('admin/suppliers*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                          All Suppliers
                      </p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{ url('admin/sales') }}" class="nav-link {{ request()->is('admin/sales*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                          Sales
                      </p>
                  </a>
              </li>


              <li class="nav-item">
                  <a href="{{ url('admin/daily-expenses') }}" class="nav-link">
                      <i class="fa-solid fa-list-check"></i>
                      <p>
                          daily-expenses
                      </p>
                  </a>
              </li>


              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                          Company Setup
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">


                      <li class="nav-item">
                          <a href="{{ url('admin/store') }}" class="nav-link">
                              <i class="fa-solid fa-list-check"></i>
                              <p>
                                  Manage Store
                              </p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="{{ url('admin/discount-decleare') }}" class="nav-link">
                              <i class="fa-solid fa-list-check"></i>
                              <p>
                                  Discount Declearations
                              </p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="{{ url('admin/employee') }}" class="nav-link">
                              <i class="fa-solid fa-list-check"></i>
                              <p>
                                  Manage Employee
                              </p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="{{ url('admin/seller') }}" class="nav-link">
                              <i class="fa-solid fa-list-check"></i>
                              <p>
                                  Manage Seller
                              </p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="{{ url('admin/expense') }}" class="nav-link">
                              <i class="fa-solid fa-list-check"></i>
                              <p>
                                  Manage Expense
                              </p>
                          </a>
                      </li>



                      <li class="nav-item">
                          <a href="{{ url('admin/roles') }}" class="nav-link">
                              <i class="fa-solid fa-list-check"></i>
                              <p>
                                  Roles
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('admin/permissions') }}" class="nav-link">
                              <i class="fa-solid fa-list-check"></i>
                              <p>
                                  Permissions
                              </p>
                          </a>
                      </li>

                  </ul>
              </li>


              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                          Inventoty
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      {{-- <li class="nav-item">
                              <a href="{{ url('admin/assign-product-to-sales-man') }}" class="nav-link">
                      <i class="fa-solid fa-list-check"></i>
                      <p>
                          Product Assign to Sales Man
                      </p>
                      </a>
              </li>

              <li class="nav-item">
                  <a href="{{ url('admin/hand-over-product-to-sales-man') }}" class="nav-link">
                      <i class="fa-solid fa-list-check"></i>
                      <p>
                          Hand-over-product-to-sales-man
                      </p>
                  </a>
              </li>


              <li class="nav-item">
                  <a href="{{ url('admin/update-sales-status') }}" class="nav-link">
                      <i class="fa-solid fa-list-check"></i>
                      <p>
                          Update-sales-status
                      </p>
                  </a>
              </li>



              <li class="nav-item">
                  <a href="{{ url('admin/sells-return') }}" class="nav-link">
                      <i class="fa-solid fa-list-check"></i>
                      <p>
                          Sells-return
                      </p>
                  </a>
              </li>



              <li class="nav-item">
                  <a href="{{ url('admin/purchase-order') }}" class="nav-link">
                      <i class="fa-solid fa-list-check"></i>
                      <p>
                          Purchase-order
                      </p>
                  </a>
              </li>


              <li class="nav-item">
                  <a href="{{ url('admin/purchase-order-receive') }}" class="nav-link">
                      <i class="fa-solid fa-list-check"></i>
                      <p>
                          Purchase-order-receive
                      </p>
                  </a>
              </li>


              <li class="nav-item">
                  <a href="{{ url('admin/purchase-return') }}" class="nav-link">
                      <i class="fa-solid fa-list-check"></i>
                      <p>
                          Purchase-return
                      </p>
                  </a>
              </li>


              </ul>
              </li>



              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                          Commercials
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">


                      <li class="nav-item">
                          <a href="{{ url('admin/cash-collection') }}" class="nav-link">
                              <i class="fa-solid fa-list-check"></i>
                              <p>
                                  Cash-collection
                              </p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="{{ url('admin/payment-to-seller') }}" class="nav-link">
                              <i class="fa-solid fa-list-check"></i>
                              <p>
                                  payment-to-seller
                              </p>
                          </a>
                      </li> --}}

                  </ul>
              </li>



              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                          Reports
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="fa-solid fa-list-check"></i>
                              <p>
                                  Daily Sells Report
                              </p>
                          </a>
                      </li>

                  </ul>
              </li>




              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
