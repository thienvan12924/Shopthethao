<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                    {{-- <div class="lng_dropdown mr-2">
                        <select name="countries" class="custome_select">
                            <option value='en' data-image="/assets_client/assets/images/eng.png" data-title="English">
                                English
                            </option>
                            <option value='fn' data-image="/assets_client/assets/images/fn.png" data-title="France">
                                France
                            </option>
                            <option value='us' data-image="/assets_client/assets/images/us.png"
                                data-title="United States">
                                United States</option>
                        </select>
                    </div>
                    <div class="mr-3">
                        <select name="countries" class="custome_select">
                            <option value='USD' data-title="USD">USD</option>
                            <option value='EUR' data-title="EUR">EUR</option>
                            <option value='GBR' data-title="GBR">GBR</option>
                        </select>
                    </div>
                    <ul class="contact_detail text-center text-lg-left">
                        <li><i class="ti-mobile"></i><span>123-456-7890</span></li>

                    </ul> --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center text-md-right">
                    <ul class="header_list">

                        <li>
                            @if (Auth::guard('customer')->check())
                        </li>
                        <li><a class="nav-link"
                                href="/client/bill-order">{{ Auth::guard('customer')->user()->ho_ten }}</a>
                        </li>



                        <li><a class="" href="/logout">
                                <i class="ti-arrow-right"></i> Logout
                            </a></li>
                    @else
                        <li><a href="/login"><i class="ti-user"style="padding-left: 10px;"></i><span style="padding-left: 5px;"
                                    type="button" >Đăng
                                    Nhập</span></a></li>
                        <li><a href="/register"><i class="ti-notepad" style="padding-left: 10px;"></i><span style="padding-left: 5px;"
                                    type="button" >Đăng Ký</span></a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



