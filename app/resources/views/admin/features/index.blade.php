@extends('layouts.admin')

@section('content')

    <style>
        .feature-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        }

        .feature-header {
            padding: 25px 30px;
            background: #fff;
            border-bottom: 1px solid #f1f1f1;
        }

        .feature-title {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }


        .create-btn:hover {
            background: #168f77;
            color: #fff;
        }

        .feature-table {
            margin: 0;
        }

        .feature-table thead th {
            background: #f8f9fc;
            border: none;
            padding: 18px;
            font-size: 14px;
            font-weight: 700;
            color: #555;
        }

        .feature-table tbody td {
            vertical-align: middle;
            padding: 18px;
            border-color: #f2f2f2;
        }

        .feature-image {
            width: 70px;
            height: 70px;
            object-fit: contain;
            border-radius: 14px;
            background: #fff;
            padding: 10px;
            border: 1px solid #eee;
        }

        .action-btn {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: .3s;
        }

        .edit-btn {
            background: #eef7ff;
            color: #1976d2;
        }

        .edit-btn:hover {
            background: #1976d2;
            color: #fff;
        }

        .delete-btn {
            background: #fff1f1;
            color: #e53935;
        }

        .delete-btn:hover {
            background: #e53935;
            color: #fff;
        }

        .empty-state {
            padding: 80px 20px;
            text-align: center;
        }

        .empty-state h4 {
            margin-top: 20px;
            font-weight: 700;
        }

        .empty-state p {
            color: #888;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .feature-name {
            font-size: 16px;
            font-weight: 600;
            color: #222;
        }
    </style>

    <div class="content-wrapper">

        <div class="content">
            <div class="card feature-card">
                <div class="feature-header d-flex justify-content-between align-items-center">
                    <h2 class="feature-title">
                        Features List
                    </h2>
                    <a href="{{ route('features.create') }}" class="btn btn-primary d-inline-flex align-items-center">
                        Create Feature
                    </a>
                </div>

                <div class="card-body p-0">
                    @if($features->count())
                        <div class="table-responsive">
                            <table class="table feature-table align-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Feature Name</th>
                                        <th width="140">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($features as $feature)
                                        <tr>
                                            <td>
                                                {{ $feature->id }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('uploads/features/' . $feature->image) }}" class="feature-image">
                                            </td>
                                            <td>
                                                <div class="feature-name">
                                                    {{ $feature->title }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('features.edit', $feature->id) }}" class="action-btn edit-btn">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('features.destroy', $feature->id) }}" method="POST"
                                                        onsubmit="return confirm('Delete this feature?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action-btn delete-btn border-0">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png" width="120">
                            <h4>
                                No Features Found
                            </h4>
                            <p>
                                Start by creating your first feature.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection