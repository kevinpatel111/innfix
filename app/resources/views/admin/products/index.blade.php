@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">

                <div class="card card-default">

                    {{-- HEADER --}}
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2>Product List</h2>
                        <a href="{{ route('products.create') }}"
                           class="btn btn-primary btn-square">
                            Create Product
                        </a>
                    </div>

                    {{-- FILTER --}}
                    <div class="card-header card-header-border-bottom">
                        <form method="GET" action="{{ route('products.index') }}">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label class="mb-1">Filter by Category</label>
                                    <select name="category_id" class="form-control" onchange="this.form.submit()">
                                        <option value="">All Categories</option>

                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>

                                            @foreach($cat->children as $child)
                                                <option value="{{ $child->id }}"
                                                    {{ request('category_id') == $child->id ? 'selected' : '' }}>
                                                    └─ {{ $child->name }}
                                                </option>

                                                @foreach($child->children as $sub)
                                                    <option value="{{ $sub->id }}"
                                                        {{ request('category_id') == $sub->id ? 'selected' : '' }}>
                                                        └── {{ $sub->name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- TABLE --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped text-center nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>YouTube</th>
                                        <th>Features</th>
                                        <th>Gallery</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>

                                            <td>
                                                {{ $product->category->name ?? '-' }}
                                            </td>

                                            <td>{{ $product->name }}</td>

                                            <td>
                                                @if($product->image)
                                                    <img src="{{ asset('uploads/products/'.$product->image)}}"
                                                         height="40">
                                                @else
                                                    —
                                                @endif
                                            </td>

                                            <td>
                                                @if($product->youtube_link)
                                                    <a href="{{ $product->youtube_link }}" target="_blank">
                                                        View
                                                    </a>
                                                @else
                                                    —
                                                @endif
                                            </td>

                                            <td>
                                                {{ $product->features->count() }}
                                            </td>

                                            <td>
                                                {{ is_array($product->gallery) ? count($product->gallery) : 0 }}
                                            </td>

                                            <td>
                                                <label class="switch switch-primary">
                                                    <input type="checkbox"
                                                           class="toggle-status"
                                                           data-id="{{ $product->id }}"
                                                           {{ $product->status ? 'checked' : '' }}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="{{ route('products.edit',$product) }}"
                                                   title="Edit">
                                                    <span class="mdi mdi-pencil h4"></span>
                                                </a>

                                                <form action="{{ route('products.destroy',$product) }}"
                                                      method="POST"
                                                      style="display:inline"
                                                      onsubmit="return confirm('Delete this product?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            style="background:none;border:none">
                                                        <span class="mdi mdi-delete h4 text-danger"></span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">No products found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- PAGINATION --}}
                        <div class="mt-3">
                            {{ $products->withQueryString()->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- STATUS TOGGLE --}}
<script>
document.querySelectorAll('.toggle-status').forEach(el => {
    el.addEventListener('change', function () {
        fetch("{{ route('products.toggleStatus') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: this.dataset.id
            })
        });
    });
});
</script>

@endsection
