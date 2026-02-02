<style>
    body {
        background-color: #f4f7fa;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        height: 100vh;
        background: #1f263e;
        color: white;
        position: fixed;
        top: 0;
        left: 0;
        transition: width 0.3s ease;
        z-index: 1001;
        overflow: hidden;
    }

    /* Closed by default */
    .sidebar.collapsed {
        width: 70px;
    }

   .sidebar-header {
    display: flex;
    justify-content: space-around;
    padding: 15px;
}

    .toggle-btn {
        background: #2b3453;
        color: white;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 5px;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-menu li a {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        color: #c7cbe3;
        text-decoration: none;
        transition: 0.3s;
        white-space: nowrap;
    }

    .sidebar-menu li a:hover {
        background: #2b3453;
        color: white;
    }

    .icon {
        font-size: 20px;
        min-width: 30px;
        text-align: center;
    }

    /* Hide text when collapsed */
    .sidebar.collapsed .menu-text {
        display: none;
    }

    /* Main content */
    .content {
        margin-left: 250px;
        padding: 40px;
        transition: margin-left 0.3s ease;
    }

    .content.shrink {
        margin-left: 70px;
    }
</style>

<div class="sidebar collapsed" id="sidebar">
    <div class="sidebar-header">
        <button id="toggle-btn" class="toggle-btn">☰</button>
    </div>

<ul class="sidebar-menu">
    <li>
        <a href="{{ route('admin.dashboard') }}">
            <span class="icon" data-lucide="layout-dashboard"></span>
            <span class="menu-text">Dashboard</span>
        </a>
    </li>

    <li>
        <a href="{{ route('show_category') }}">
            <span class="icon" data-lucide="layers"></span>
            <span class="menu-text">Categories</span>
        </a>
    </li>

    <li>
        <a href="{{ route('show_package') }}">
            <span class="icon" data-lucide="map"></span>
            <span class="menu-text">Packages</span>
        </a>
    </li>

    <li>
        <a href="{{ route('booking.index') }}">
            <span class="icon" data-lucide="calendar-check"></span>
            <span class="menu-text">Bookings</span>
        </a>
    </li>
</ul>

</div>
