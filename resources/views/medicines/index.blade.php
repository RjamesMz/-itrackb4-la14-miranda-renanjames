@extends('layouts.app')

@section('title', 'All Medicines')

@section('content')

    <div class="container py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                <h4 class="mb-0">Medicines</h4>
                <span class="badge bg-light text-primary rounded-pill">{{ count($medicines) }} items</span>
            </div>

            <div class="card-body">
                <div class="d-flex flex-wrap gap-3 mb-4">
                    Your list view
                    <form method="GET" action="{{ route('medicines.index') }}">
                        <input type="text" name="search" value="{{ request('search') }}">

                        <select name="type_id">
                            <option value="">All</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}"
                                    @selected(request('type_id') == $type->id)>{{ $type->name }}</option>
                            @endforeach
                        </select>

                        <select name="is_available">
                            <option value="">Any</option>
                            <option value="1" @selected(request('is_available') === '1')>Available</option>
                            <option value="0" @selected(request('is_available') === '0')>Unavailable</option>
                        </select>

                        <select name="sort">
                            <option value="name" @selected(request('sort', 'name') === 'name')>Sort by Name</option>
                            <option value="stock" @selected(request('sort') === 'stock')>Sort by Stock</option>
                            <option value="expiry_date" @selected(request('sort') === 'expiry_date')>Sort by Expiry Date</option>
                        </select>

                        <button>Apply</button>
                        <a href="{{ route('medicines.index') }}">Clear</a>
                    </form>

                    @auth
                    <a href="{{ route('medicines.create')}}" class="btn btn-success">
                            <i class="bi bi-plus-lg me-1"></i>Add Medicine
                        </a>
                    @endauth
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center">Stock</th>
                                <th scope="col">Type</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Expiry Date</th>
                                @auth
                                <th scope="col">Action</th>
                                @endauth

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($medicines as $medicine)
                                <tr>
                                    <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('medicines.show', $medicine['id']) }}"
                                            class="fw-semibold text-decoration-none">
                                            {{ $medicine['name'] }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="badge rounded-pill {{ $medicine['stock'] <= 10 ? 'bg-danger' : 'bg-success' }}">
                                            {{ $medicine['stock'] }}
                                        </span>
                                    </td>
                                    <td><span class="badge bg-info-subtle text-info-emphasis">{{ $medicine->type->name }}</span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $medicine->is_available ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $medicine->is_available ? 'Available' : 'Unavailable' }}
                                        </span>
                                    </td>
                                    <td>{{ $medicine['expiry_date'] }}</td>
                                    @auth
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('medicines.edit', $medicine) }}">Edit</a>
                                        <form method="POST" onsubmit="return confirm('Are you Sure?');" action="{{ route('medicines.destroy', $medicine) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>


                                    </td>
                                    @endauth

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">
                                        <span class="fw-bold">No Medicine Found</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{$medicines->links()}}
@endsection
