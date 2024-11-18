<ul class="feature-list">
    <li>
        <a href="{{ route('backends.dashboard') }}">
            <i class="bi bi-check-circle-fill"></i> Dashboard
        </a>
    </li>
    @can('view-category')
        <li>
            <a href="{{ url('/backends/categories') }}">
                <i class="bi bi-check-circle-fill"></i> Categories
            </a>
        </li>
    @endcan
    <li>
        <a href="{{ route('backends.services.index') }}">
            <i class="bi bi-check-circle-fill"></i> Services
        </a>
    </li>
    <li>
        <a href="{{ route('backends.dashboard') }}">
            <i class="bi bi-check-circle-fill"></i> Prices
        </a>
    </li>
    <li>
        <a href="{{ route('backends.dashboard') }}">
            <i class="bi bi-check-circle-fill"></i> Contact Form
        </a>
    </li>
    <li>
        <a href="{{ route('backends.users.index') }}">
            <i class="bi bi-check-circle-fill"></i> Users
        </a>
    </li>
</ul>