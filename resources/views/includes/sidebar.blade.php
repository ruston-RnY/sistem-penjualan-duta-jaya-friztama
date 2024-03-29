<div id="sidebar">
    <div class="sidebar_title">
        <div class="sidebar_img">
            <img src="{{ url('backend/assets/profil.jpg') }}" alt="">
            {{-- <h1>PT. Duta Jaya Friztama</h1> --}}
            <div>
                <span class="ml-4 text-capitalize">{{ auth()->user()->name }}</span>
                <span class="ml-4 d-block">{{ auth()->user()->role }}</span>
            </div>
        </div>
    </div>

    <div class="sidebar_menu">
        <div class="menu">
            <div class="sidebar_link {{ Request::is('/') ? 'active_menu_link' : '' }}">
                <i class="fa fa-home"></i>
                <a href="{{ route('dashboard') }}">Dashboard</a> 
            </div>
        </div>

        <div class="menu myaccordion" id="accordion">
            <div id="headingOne" class="collapsed btn-collapse" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <div class="sidebar_link  {{ Request::is('products*') ? 'active_menu_link' : '' }}" > 
                    <i class="fa fa-university"></i>
                    <a href="#">Produk</a>
                    <span class="float-right">
                        <i class="fas fa-angle-down" style="font-size: 16px"></i>
                    </span>
                </div>
            </div>
            <div class="child-menu collapse" id="collapseOne" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <div class="sidebar_link">
                    {{-- <i class="fa fa-table" aria-hidden="true"></i> --}}
                    <i class="fa fa-building"></i>
                    <a href="{{ route('products.index') }}">Data Master</a>
                </div>
            </div>
        </div>

        <div class="menu myaccordion" id="accordion">
            <div id="headingTwo" class="collapsed btn-collapse" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <div class="sidebar_link {{ Request::is('suppliers*') ? 'active_menu_link' : '' }}" > 
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    <a href="#">Supplier</a>
                    <span class="float-right">
                        <i class="fas fa-angle-down" style="font-size: 16px"></i>
                    </span>
                </div>
            </div>
            <div class="child-menu collapse" id="collapseTwo" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <div class="sidebar_link">
                    <i class="fa fa-building"></i>
                    <a href="{{ route('suppliers.index') }}">Data Master</a>
                </div>
            </div>
        </div>

        <div class="menu myaccordion" id="accordion">
            <div id="headingThree" class="collapsed btn-collapse" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <div class="sidebar_link {{ Request::is('customers*') ? 'active_menu_link' : '' }}"> 
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <a href="#">Pelanggan</a>
                    <span class="float-right">
                        <i class="fas fa-angle-down" style="font-size: 16px"></i>
                    </span>
                </div>
            </div>
            <div class="child-menu collapse" id="collapseThree" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <div class="sidebar_link">
                    <i class="fa fa-building"></i>
                    <a href="{{ route('customers.index') }}">Data Master</a>
                </div>
            </div>
        </div>

        <div class="menu myaccordion" id="accordion">
            <div id="headingFour" class="collapsed btn-collapse" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <div class="sidebar_link {{ Request::is('transactions*') ? 'active_menu_link' : '' }}"> 
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <a href="#">Transaksi</a>
                    <span class="float-right">
                        <i class="fas fa-angle-down" style="font-size: 16px"></i>
                    </span>
                </div>
            </div>
            <div class="child-menu collapse" id="collapseFour" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <div class="sidebar_link">
                    <i class="fa fa-building"></i>
                    <a href="{{ route('transactions.index') }}">Data Penjualan</a>
                </div>
            </div>
        </div>

        <div class="menu myaccordion" id="accordion">
            <div id="headingFive" class="collapsed btn-collapse" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <div class="sidebar_link {{ Request::is('users*') ? 'active_menu_link' : '' }}"> 
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <a href="#">User</a>
                    <span class="float-right">
                        <i class="fas fa-angle-down" style="font-size: 16px"></i>
                    </span>
                </div>
            </div>
            <div class="child-menu collapse" id="collapseFive" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <div class="sidebar_link">
                    <i class="fa fa-building"></i>
                    <a href="{{ route('users.index') }}">Data Master</a>
                </div>
            </div>
        </div>

        <div class="menu myaccordion" id="accordion">
            <div id="headingSix" class="collapsed btn-collapse" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                <div class="sidebar_link"> 
                    <i class="fa fa-book"></i>
                    <a href="#">Laporan</a>
                    <span class="float-right">
                        <i class="fas fa-angle-down" style="font-size: 16px"></i>
                    </span>
                </div>
            </div>
            <div class="child-menu collapse" id="collapseSix" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                <div class="sidebar_link">
                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                    <a href="{{ route('laporan.create') }}">Penjualan</a>
                </div>
            </div>
        </div>

        {{-- @if (auth()->user()->role == 'ADMIN')
          <p>admin</p>  
        @elseif(auth()->user()->role == 'MANAGER')
        <p>aku manager</p>  
        @elseif(auth()->user()->role == 'DIREKTUR')
        <p>aku direktur</p>  
        @endif --}}

    </div>
</div>