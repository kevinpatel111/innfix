@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-4">

        <h2>Blogs</h2>

        <a href="{{ route('blogs.create') }}" class="btn btn-primary">
            Add Blog
        </a>

    </div>

    <table class="table">

        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Status</th>
                <th width="150">Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($blogs as $blog)

                <tr>

                    <td width="100">
                        <img
                            src="{{ asset('uploads/blogs/'.$blog->image) }}"
                            width="80"
                        >
                    </td>

                    <td>{{ $blog->title }}</td>

                    <td>
                        {{ $blog->status ? 'Active' : 'Inactive' }}
                    </td>

                    <td>

                        <a
                            href="{{ route('blogs.edit',$blog->id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('blogs.destroy',$blog->id) }}"
                            method="POST"
                            style="display:inline-block"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete?')"
                            >
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    {{ $blogs->links() }}

</div>

@endsection
