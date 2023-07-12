@extends('layouts.dashboard')

@section('title', 'Create User')

@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard_/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_/css/select2-bootstrap4.min.css') }}">
@endpush

@section('breadcrumb')
    @parent

    <li class="breadcrumb-item active">
        Create User
    </li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <x-dashboard.form.form action="{{ route('dashboard.users.store') }}" method="POST">
                <div class="row">
                    <div class="col-xl-6">
                        <x-dashboard.form.input name="first_name" placeholder="First Name" />
                    </div>

                    <div class="col-xl-6">
                        <x-dashboard.form.input name="last_name" placeholder="Last Name" />
                    </div>

                    <div class="col-xl-6">
                        <x-dashboard.form.input name="username" placeholder="Username" />
                    </div>

                    <div class="col-xl-6">
                        <x-dashboard.form.input name="email" type="email" placeholder="Email" />
                    </div>

                    <div class="col-xl-6">
                        <x-dashboard.form.input name="phone_number" placeholder="Phone Number" />
                    </div>

                    <div class="col-xl-6">
                        <x-dashboard.form.select>
                            <option selected="selected">Account Status</option>
                            <option value="on">On</option>
                            <option value="off">Off</option>
                            <option value="banned">Banned</option>
                        </x-dashboard.form.select>
                    </div>

                    <div class="col-xl-4">
                        <x-dashboard.buttons.primary text="Create" />
                    </div>
                </div>
            </x-dashboard.form.form>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('dashboard_/js/select2.full.min.js') }}"></script>

        <script>
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        </script>
    @endpush
@endsection
