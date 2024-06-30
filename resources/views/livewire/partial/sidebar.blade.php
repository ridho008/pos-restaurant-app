<ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
    <!-- Sidebar content here -->
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" wire::navigate @class(['active' => Route::is('home')])><span>Dashboard</span></a>
            </li>
            <li>
                <a href="{{ route('transaction.create') }}" wire::navigate @class(['active' => Route::is('transaction.create')])><span>Input
                        Transaksi</span></a>
            </li>
        </ul>
    </li>

    <li>
        <h2 class="menu-title">Data Master</h2>
        <ul>
            <li>
                <a href="{{ route('menu.index') }}" wire::navigate @class(['active' => Route::is('menu.index')])><span>Menus</span></a>
            </li>
            <li>
                <a href="{{ route('customer.index') }}" wire::navigate @class(['active' => Route::is('customer.index')])><span>Data
                        Customers</span></a>
            </li>
            <li>
                <a href="" wire::navigate @class(['active' => false])><span>Transaction History</span></a>
            </li>
        </ul>
    </li>

    <li>
        <h2 class="menu-title">Account</h2>
        <ul>
            <li>
                <a href="{{ route('profile') }}" wire::navigate @class(['active' => Route::is('profile')])><span>Edit
                        Profile</span></a>
            </li>
            <li>
                <button wire:click="logout" wire::navigate @class(['active' => false])><span>Logout</span></button>
            </li>
        </ul>
    </li>

</ul>
