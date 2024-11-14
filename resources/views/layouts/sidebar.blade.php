<!-- Sidebar -->
<div id="sidebar"
    class="fixed inset-y-0 left-0 w-64 bg-primary border-r z-50 border-gray-200 p-4 sidebar-transition hidden-sidebar md:static md:transform-none">
    <div class="flex justify-center">
        <a href="{{ url('/') }}">
            <span class="grid h-10 place-content-center rounded-lg text-xl text-white px-3">
                LISAMAN
            </span>
        </a>
    </div>

    <ul id="sidebar-menu" class="mt-6 space-y-1">
        <li>
            <a href="{{ url('admin/dashboard') }}"
                class="block rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-100 hover:text-gray-700 {{ Request::is('admin/dashboard') ? 'bg-gray-100 text-gray-500' : 'text-white -mb-3' }}">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="#}"
                class="block rounded-lg pt-3 text-white font-medium">
                Tables
            </a>
        </li>
        <li>
            <a href="{{ route('category.index') }}"
                class="block rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-100 hover:text-gray-700 {{ Request::is('admin/category*') ? 'bg-gray-100 text-gray-500 mt-3' : 'text-white' }}">
                <i class="fas fa-tags mr-2"></i> Category
            </a>
        </li>
        <li>
            <a href="{{ route('product.index') }}"
                class="block rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-100 hover:text-gray-700 {{ Request::is('admin/product*') || Request::is('review*') ? 'bg-gray-100 text-gray-500' : 'text-white' }}">
                <i class="fas fa-box mr-2"></i> Product
            </a>
        </li>
        <li>
            <a href="{{ route('order.index') }}"
                class="block rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-100 hover:text-gray-700 {{ Request::is('admin/order*') ? 'bg-gray-100 text-gray-500' : 'text-white' }}">
                <i class="fas fa-clipboard-list mr-2"></i> Order
            </a>
        </li>
        <li>
            <a href="{{ route('contacts.index') }}"
                class="block rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-100 hover:text-gray-700 {{ Request::is('admin/contacts*') ? 'bg-gray-100 text-gray-500' : 'text-white' }}">
                <i class="fas fa-address-book mr-2"></i> Contact
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}"
                class="block rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-100 hover:text-gray-700 {{ Request::is('admin/users*') ? 'bg-gray-100 text-gray-500' : 'text-white' }}">
                <i class="fas fa-users mr-2"></i> Users
            </a>
        </li>
    </ul>
</div>
