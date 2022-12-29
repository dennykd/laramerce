<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
        <img alt="Midone - HTML Admin Template" class="w-6" src="/dist/images/logo.svg" />
        <span class="hidden xl:block text-white text-lg ml-3"> LaraMerce </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
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
                <div class="side-menu__icon"><i data-lucide="box"></i></div>
                <div class="side-menu__title">
                    Categories
                </div>
            </a>
            {{-- <ul class="">
                <li>
                    <a href="{{ route('manage_category.all') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">Categories</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage_order.all') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">Orders</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage_product.all') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">Products</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage_user.all') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">Users</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage_cart.all') }}" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">Cart</div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-dashboard-overview-1.html" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">Orders</div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-dashboard-overview-1.html" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">Wishlists</div>
                    </a>
                </li>
            </ul> --}}
        </li>
        <li>
            <a href="{{ route('manage_order.all') }}"
                class="side-menu {{ Request::is('dashboard/orders') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"><i data-lucide="box"></i></div>
                <div class="side-menu__title">
                    Orders
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('manage_product.all') }}"
                class="side-menu {{ Request::is('dashboard/products') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"><i data-lucide="box"></i></div>
                <div class="side-menu__title">
                    Products
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('manage_user.all') }}"
                class="side-menu {{ Request::is('dashboard/users') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"><i data-lucide="box"></i></div>
                <div class="side-menu__title">
                    Users
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('manage_cart.all') }}"
                class="side-menu {{ Request::is('dashboard/carts') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"><i data-lucide="box"></i></div>
                <div class="side-menu__title">
                    Carts
                </div>
            </a>
        </li>
        <li>
            <a href="" class="side-menu">
                <div class="side-menu__icon"><i data-lucide="box"></i></div>
                <div class="side-menu__title">
                    Orders
                </div>
            </a>
        </li>
        <li>
            <a href="" class="side-menu">
                <div class="side-menu__icon"><i data-lucide="box"></i></div>
                <div class="side-menu__title">
                    Wishlists
                </div>
            </a>
        </li>
    </ul>
</nav>
