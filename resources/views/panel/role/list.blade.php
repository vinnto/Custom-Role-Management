@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Form Role</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('auth._message')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Role List</h5>
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                @if (!empty($permissionAdd))
                                    <a href="{{ route('panel.role.add') }}" class="btn btn-primary"
                                        style="margin-top: 10px;">Add</a>
                                @endif
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>
                                            @if (!empty($permissionEdit))
                                                <a href="{{ route('panel.role.edit', ['id' => $value->id]) }}"
                                                    class="btn btn-secondary btn-sm me-2">Edit</a>
                                            @endif
                                            @if (!empty($permissionDelete))
                                                <form action="{{ route('panel.role.delete', ['id' => $value->id]) }}"
                                                    method="post" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
