<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
        <img alt="E-lab Urban Adventure" class="w-36" src="{{ asset('/image/catalog/urban.png') }}" />
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        @can('isAdmin')
            <li>
                <a href="{{ route('dashboard') }}"
                    class="side-menu {{ Request::is('dashboard') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="home"></i></div>
                    <div class="side-menu__title">
                        Dashboard
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('manage_category.all') }}"
                    class="side-menu {{ Request::is('dashboard/categories') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="layout-grid"></i></div>
                    <div class="side-menu__title">
                        Categories
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('manage_product.all') }}"
                    class="side-menu {{ Request::is('dashboard/products') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="package"></i></div>
                    <div class="side-menu__title">
                        Products
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('manage_brand.all') }}"
                    class="side-menu {{ Request::is('dashboard/brands') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="hexagon"></i></div>
                    <div class="side-menu__title">
                        Brands
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('manage_user.all') }}"
                    class="side-menu {{ Request::is('dashboard/users') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="users"></i></div>
                    <div class="side-menu__title"> Users </div>
                </a>
            </li>
        @endcan
        <li>
            <a href="{{ route('manage_order.all') }}"
                class="side-menu {{ Request::is('dashboard/orders') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"><i data-lucide="clipboard-list"></i></div>
                <div class="side-menu__title">
                    Orders
                </div>
            </a>
        </li>
        @can('isUser')
            <li>
                <a href="{{ route('manage_cart.all') }}"
                    class="side-menu {{ Request::is('dashboard/carts') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="shopping-cart"></i></div>
                    <div class="side-menu__title">
                        Carts
                    </div>
                </a>
            </li>
            <li>
                <a href="" class="side-menu">
                    <div class="side-menu__icon"><i data-lucide="heart"></i></div>
                    <div class="side-menu__title">
                        Wishlists
                    </div>
                </a>
            </li>
        @endcan

    </ul>


</nav>
