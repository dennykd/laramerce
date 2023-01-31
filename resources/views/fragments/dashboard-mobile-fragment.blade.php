<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="{{ route('dashboard') }}" class="flex mr-auto">
            <img alt="" class="w-20" src="{{ asset('/image/catalog/urban.png') }}">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        <ul class="scrollable__content py-2 ml-2 text-white">
            @can('isAdmin')
                <li>
                    <a href="{{ route('dashboard') }}" class="menu {{ Request::is('dashboard') ? 'menu--active' : '' }}  ">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title">
                            Dashboard
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('manage_category.all') }}"
                        class="menu {{ Request::is('dashboard/categories') ? 'menu--active' : '' }}">
                        <div class="menu__icon"><i data-lucide="layout-grid"></i></div>
                        <div class="menu__title">
                            Categories
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('manage_product.all') }}"
                        class="menu {{ Request::is('dashboard/products') ? 'menu--active' : '' }}">
                        <div class="menu__icon"><i data-lucide="package"></i></div>
                        <div class="menu__title">
                            Products
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage_brand.all') }}"
                        class="menu {{ Request::is('dashboard/brands') ? 'menu--active' : '' }}">
                        <div class="menu__icon"><i data-lucide="hexagon"></i></div>
                        <div class="menu__title">
                            Brands
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage_user.all') }}"
                        class="menu {{ Request::is('dashboard/users') ? 'menu--active' : '' }}">
                        <div class="menu__icon"><i data-lucide="users"></i></div>
                        <div class="menu__title">
                            Users
                        </div>
                    </a>
                </li>
            @endcan
            <li>
                <a href="{{ route('manage_order.all') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="clipboard-list"></i></div>
                    <div class="menu__title">
                        Orders
                    </div>
                </a>
            </li>
            @can('isUser')
                <li>
                    <a href="{{ route('manage_cart.all') }}"
                        class="menu {{ Request::is('dashboard/carts') ? 'menu--active' : '' }}">
                        <div class="menu__icon"><i data-lucide="shopping-cart"></i></div>
                        <div class="menu__title">
                            Carts
                        </div>
                    </a>
                </li>
                <li>
                    <a href="" class="menu">
                        <div class="menu__icon"><i data-lucide="heart"></i></div>
                        <div class="menu__title">
                            Wishlists
                        </div>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
