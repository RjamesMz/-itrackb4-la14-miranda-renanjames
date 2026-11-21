<div class="container my-3">
    <nav class="navbar navbar-expand-lg bg-primary rounded-3 mb-4" data-bs-theme="dark">
        <div class="container-fluid">
                    <a href="{{ route('home') }}" class="navbar-brand fw-bold">
                        Medicine Inventory
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a  class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                            href=" {{ route('home') }} ">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('medicines.*') ? 'active' : '' }}" 
                            href=" {{ route('medicines.index') }}">Medicines</a>
                     </li>
                </ul>
            </div>
            <form method="POST" action="{{ route('logout')}}" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-outline-ligth">Log out</button>

            </form>
        </div>
    </nav>
</div>