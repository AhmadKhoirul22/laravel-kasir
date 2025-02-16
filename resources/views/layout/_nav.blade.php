<nav class="top-nav">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="top-menu top-menu--{{ Request::RouteIs('dashboard') ? 'active' : '' }}">
                <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                <div class="top-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user-index') }}" class="top-menu {{ Request::RouteIs('user-index') ? 'top-menu--active' : '' }}">
                <div class="top-menu__icon"> <i data-feather="users"></i> </div>
                <div class="top-menu__title"> User </div>
            </a>
        </li>
        <li>
            <a href="{{ route('kategori-index') }}" class="top-menu top-menu--{{ Request::RouteIs('kategori-index') ? 'active' : '' }}">
                <div class="top-menu__icon"> <i data-feather="tag"></i> </div>
                <div class="top-menu__title"> Kategori </div>
            </a>
        </li>
        <li>
            <a href="{{ route('produk-index') }}" class="top-menu top-menu--{{ Request::RouteIs('produk-index') ? 'active' : '' }}">
                <div class="top-menu__icon"> <i data-feather="package"></i> </div>
                <div class="top-menu__title"> Produk </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon"> <i data-feather="user"></i> </div>
                <div class="top-menu__title"> Pelanggan </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                <div class="top-menu__title"> Penjualan </div>
            </a>
        </li>
    </ul>
</nav>
