<div id="sidebar">
    <div class="sidebar_title">
        <div class="sidebar_img">
            <img src="{{ url('backend/assets/phone1.jpg') }}" alt="">
            <h1>PT. Duta Jaya Friztama</h1>
        </div>
        <i class="fa fa-times" id="sidebarIcon" onclick="closeSidebar"></i>
    </div>

    <div class="sidebar_menu">
        <div class="menu">
            <div class="sidebar_link">
                <i class="fa fa-home"></i>
                <a href="{{ route('dashboard') }}">Dashboard</a> 
            </div>
        </div>

        <div class="menu myaccordion" id="accordion">
            <div id="headingOne" class="collapsed btn-collapse" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <div class="sidebar_link active_menu_link" > 
                    <i class="fa fa-calendar-check"></i>
                    <a href="#">Produk</a>
                    <span class="float-right">
                        <i class="fas fa-angle-down" style="font-size: 16px"></i>
                    </span>
                </div>
            </div>
            <div class="child-menu collapse" id="collapseOne" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <div class="sidebar_link">
                    <i class="fa fa-building"></i>
                    <a href="{{ route('products.index') }}">Data Master</a>
                </div>
                <div class="sidebar_link">
                    <i class="fas fa-plus"></i>
                    <a href="{{ route('products.create') }}">Tambah Data</a>
                    <a href="=">Tambah Data</a>
                </div>
            </div>
        </div>

        <div class="menu myaccordion" id="accordion">
            <div id="headingTwo" class="collapsed btn-collapse" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <div class="sidebar_link active_menu_link" > 
                    <i class="fa fa-calendar-check"></i>
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
                <div class="sidebar_link">
                    <i class="fas fa-plus"></i>
                    <a href="{{ route('suppliers.create') }}">Tambah Data</a>
                    <a href="=">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>
</div>