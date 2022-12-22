@extends('admin.master')
@section('category')
    active
@endsection

@section('title')
    Category
@endsection

@section('header')
    All Category
@endsection

@section('action')
    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-info"><i class="fa-solid fas fa-folder-plus mr-1"></i>
        New
        Category</a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Popular</th>
                            <th>Created_At</th>
                            <th>Updated_At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td><span class="right badge badge-primary"> {{ $category->name }}</span></td>
                                <td><span class="right badge badge-info">{{ $category->slug }}</span></td>
                                <td>
                                    <img src="{{ Storage::url($category->image) }}" alt="image" width="50"
                                        height="40">
                                </td>
                                <td>
                                    <span class="right badge badge-{{ $category->status ? 'danger' : 'success' }}">
                                        {{ $category->status ? 'hidden' : 'active' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="right badge badge-{{ $category->popular ? 'danger' : 'primary' }}">
                                        {{ $category->popular ? 'old model' : 'trending' }}
                                    </span>
                                </td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category) }}"
                                        class="btn btn-xs btn-warning mr-1"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="{{ route('categories.show', $categories) }}" class="btn btn-xs btn-primary"><i
                                            class="fas fa-eye"></i> Show</a>
                                    <a href="" class="btn btn-xs">
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                            onsubmit="return confirm('Are you sure, delete {{ $category->name }} ? ') ">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-danger"><i
                                                    class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="float-right">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
