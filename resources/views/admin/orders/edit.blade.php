@extends('admin.master')

@section('title')
    Edit Order
@endsection

@section('order')
    active
@endsection

@section('header')
    Update Order Field
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('update-order') }}" method="POST">

                    @method('PUT')
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="">Order Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" {{ old('status') === 0 ? 'selected' : '' }}>Pending</option>
                            <option value="1" {{ old('status') === 1 ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Update Order Status</button>
                </form>
            </div>
        </div>
    </div>
@endsection
