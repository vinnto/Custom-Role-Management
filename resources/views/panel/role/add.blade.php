@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Form Role</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Role</h5>
                        <form action="{{ route('panel.role.store') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label style="display: block; margin:bottom: 20px;" for="inputText"
                                    class="col-sm-12 col-form-label"><b>Permission</b></label>
                                @foreach ($getPermission as $value)
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-3">
                                            {{ $value['name'] }}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                @foreach ($value['group'] as $group)
                                                    <div class="col-md-3">
                                                        <label for="">
                                                            <input type="checkbox" value="{{ $group['id'] }}"
                                                                name="permission_id[]">{{ $group['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12" style="text-align: right;">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
