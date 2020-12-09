@extends('layouts.app')
@section('content')
    <div class="container py-4 my-2">
        <div class="card">
            <div class="card-header bg-blue-one pb-3  ">
                <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
                    <li  class="nav-item "><a id="adminCardNavOrders" class="nav-link text-white" href="{{route('admin-orders')}}">
                            <i class="fa fa-list mr-1"></i>
                            لیست سفارشات
                        </a>
                    </li>

                    <li class="nav-item"><a  id="adminCardNavPass"  class="nav-link text-white " href="{{route('admin-change-password-page')}}">
                            <i class="fa fa-key mr-1"></i>
                            تغییر رمز
                        </a></li>


                    <li  class="nav-item "><a id="adminCardNavBooks"  class="nav-link text-white" href="{{route('admin-books')}}">
                            <i class="fa fa-books  mr-1"></i>
                            کتاب ها
                        </a>
                    </li>

                    <li  class="nav-item "><a id="adminCardNavBooks"  class="nav-link text-white" href="{{route('admin-discounts')}}">
                            <i class="fa fa-books  mr-1"></i>
                            کدهای تخفیف
                        </a>
                    </li>


                    <li class="nav-item"><a  id="adminCardNavSite"  class="nav-link text-white " href="{{route('admin-site')}}">
                            <i class="fa fa-info mr-1"></i>
                            اطلاعات سیستم
                        </a>
                    </li>

                    <li class="nav-item"><a  id="adminCardNavSite"  class="nav-link text-white " href="{{url('/admin/sales/report')}}">
                            <i class="fa fa-print mr-1"></i>
                            گزارش فروش
                        </a>
                    </li>




                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content bg-white">
                    <div id="info" class="tab-pane fade in active show">
                        @yield('admin_content')
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection