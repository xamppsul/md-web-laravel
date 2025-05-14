@extends('layout.master')
@section('title', 'Master Asset')
@section('css')
    <!--font-awesome-css-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.css') }}">
    <!-- Select2 css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select/select2.min.css') }}">
    <!-- Data Table css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datatable/jquery.dataTables.min.css') }}">
    <!-- flatpickr css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datepikar/flatpickr.min.css') }}">
@endsection
@section('main-content')
    <div class="container-fluid">
        <!-- Breadcrumb start -->
        <div class="row m-1">
            <div class="col-12 ">
                <h4 class="main-title">Master</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li class="">
                        <a href="#" class="f-s-14 f-w-500">
                            <span>
                                <i class="ph-duotone  ph-table f-s-16"></i> Asset
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('admin.master.Asset.index') }}" class="f-s-14 f-w-500">Data</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Breadcrumb end -->

        @session('success')
            <div class="flash-data-success" data-flashdata-success="{{ $value }}"></div>
        @endsession
        @session('error')
            <div class="flash-data-error" data-flashdata-error="{{ $value }}"></div>
        @endsession
        <!-- Data Table start -->
        <div class="row">
            <!-- Default Datatable start -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex justify-content-between code-header card-header">
                        {{-- <h5>Horizontal </h5> --}}
                    </div>

                    <div class="card-body">
                        <p>
                            <button aria-controls="collapseFilter" aria-expanded="false"
                                class="btn btn-light-primary b-r-22" data-bs-target="#collapseFilter"
                                data-bs-toggle="collapse" type="button"> <i class="ti ti-filter"></i>
                                Filter</button>
                            <button type="button" class="btn btn-primary b-r-22" aria-controls="collapseTambahAset"
                                aria-expanded="false" data-bs-target="#collapseTambahAset" data-bs-toggle="collapse"
                                type="button"> <i class="ti ti-text-plus"></i>
                                Tambah Aset</button>
                        </p>
                        <div>
                            <!-- collapse filter -->
                            <div class="collapse collapse-horizontal" id="collapseFilter">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('admin.master.UserMaster.index') }}" method="GET"
                                                    class="row g-3 app-form rounded-control" id="filterFormUserMaster">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="name">Name</label>
                                                        <input class="form-control" id="name"
                                                            placeholder="Masukan Nama" type="text" name="name"
                                                            value="{{ request('name') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="username">Username</label>
                                                        <input class="form-control" id="username"
                                                            placeholder="Masukan Username" type="text" name="username"
                                                            value="{{ request('username') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="username">Emal</label>
                                                        <input class="form-control" id="email"
                                                            placeholder="Masukan Email" type="text" name="email"
                                                            value="{{ request('email') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Role</label>
                                                        <select class="form-select" aria-label="Select role" name="roles_id"
                                                            required>
                                                            <option selected="">Pilih Role</option>
                                                            @foreach ($data['role'] as $roles)
                                                                <option value="{{ $roles->id }}"
                                                                    {{ request('roles_id') == $roles->id ? 'selected' : '' }}>
                                                                    {{ $roles->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
                                                        </button>
                                                        <button class="btn btn-warning b-r-22"
                                                            onclick="clearFilterFormUserMaster()" value="Clear">Clear
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- collapse tambah aset -->
                            <div class="collapse collapse-horizontal" id="collapseTambahAset">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row g-3 app-form rounded-control"
                                                    action="{{ route('admin.master.UserMaster.store') }}" method="POST">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="name">Name</label>
                                                        <input class="form-control @error('name') is-invalid @enderror"
                                                            id="name" name="name" placeholder="Masukan Name"
                                                            type="text" value="{{ old('name') }}">
                                                        <div class="mt-1">
                                                            @error('name')
                                                                <span class="text-danger"
                                                                    id="name">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="username">username</label>
                                                        <input class="form-control @error('username') is-invalid @enderror"
                                                            id="username" name="username" placeholder="Masukan username"
                                                            type="text" value="{{ old('username') }}">
                                                        <div class="mt-1">
                                                            @error('username')
                                                                <span class="text-danger"
                                                                    id="username">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="email">email</label>
                                                        <input class="form-control @error('email') is-invalid @enderror"
                                                            id="email" name="email" placeholder="Masukan email"
                                                            type="text" value="{{ old('email') }}">
                                                        <div class="mt-1">
                                                            @error('email')
                                                                <span class="text-danger"
                                                                    id="email">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="password">password</label>
                                                        <input class="form-control @error('password') is-invalid @enderror"
                                                            id="password" name="password" placeholder="Masukan password"
                                                            type="text" value="{{ old('password') }}">
                                                        <div class="mt-1">
                                                            @error('password')
                                                                <span class="text-danger"
                                                                    id="password">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="roles_id">Pilih Role</label>
                                                        <select
                                                            class="form-select @error('roles_id')
                                                            is-invalid
                                                        @enderror"
                                                            aria-label="Select role" name="roles_id">
                                                            <option selected="">Pilih Role</option>
                                                            @foreach ($data['role'] as $roles)
                                                                <option value="{{ $roles->id }}"
                                                                    {{ old('roles_id') == $roles->id ? 'selected' : '' }}>
                                                                    {{ $roles->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('roles_id')
                                                                <span class="text-danger"
                                                                    id="roles_id">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
                                                        </button>
                                                        <button class="btn btn-warning b-r-22" type="reset"
                                                            value="Submit">Clear
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                    </div>
                    <div class="card-body p-0">
                        <div class="app-datatable-default overflow-auto">
                            <table id="example" class="display app-data-table default-data-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['usermaster'] as $userMaster)
                                        <tr>
                                            <td>{{ $userMaster->name }}</td>
                                            <td>{{ $userMaster->username }}</td>
                                            <td>{{ $userMaster->email }}</td>
                                            <td>{{ $userMaster->roles_name }}</td>
                                            <td>
                                                <button type="button" data-item="{{ $userMaster->id }}"
                                                    data-bs-target="#detailUserMaster--{{ $userMaster->id }}"
                                                    data-bs-toggle="modal" class="btn btn-light-info icon-btn b-r-4">
                                                    <i class="ti ti-info-circle text-success"></i>
                                                </button>
                                                <a href="{{ route('admin.master.Asset.edit', $userMaster->id) }}"
                                                    class="btn btn-light-success icon-btn b-r-4">
                                                    <i class="ti ti-edit text-success"></i>
                                                </a>
                                                <form class="btn btn-light-danger icon-btn b-r-4"
                                                    action="{{ route('admin.master.Asset.destroy', $userMaster->id) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button"
                                                        class="btn btn-light-danger icon-btn b-r-4 btn-delete">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Datatable end -->
        </div>
        <!-- Data Table end -->
        @foreach ($data['usermaster'] as $userMaster)
            <div aria-hidden="true" class="modal fade" data-bs-backdrop="static"
                id="detailUserMaster--{{ $userMaster->id }}" tabindex="-1">
                <div class="modal-dialog app_modal_sm">
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="detailUserMaster2">Detail User</h1>
                        </div>
                        <div class="modal-body">
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Name:
                                {{ $userMaster->name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Username:
                                {{ $userMaster->username }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Email:
                                {{ $userMaster->email }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Role:
                                {{ $userMaster->roles_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Created At:
                                {{ $userMaster->created_at }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Updated At:
                                {{ $userMaster->updated_at }} </p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">Close
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <!--customizer-->
    <div id="customizer"></div>

    <!-- data table js -->
    <script src="{{ asset('assets/vendor/datatable/jquery.dataTables.min.js') }}"></script>

    <!-- js-->
    <script src="{{ asset('assets/js/data_table.js') }}"></script>

    <!--form validation-->
    <script src="{{ asset('assets/js/formvalidation.js') }}"></script>

    <!-- select2 -->
    <script src="{{ asset('assets/vendor/select/select2.min.js') }}"></script>

    <!--js-->
    <script src="{{ asset('assets/js/select.js') }}"></script>

    <!-- flatpickr js-->
    <script src="{{ asset('assets/vendor/datepikar/flatpickr.js') }}"></script>

    <!--js-->
    <script src="{{ asset('assets/js/date_picker.js') }}"></script>

    <!--cleave js  -->
    <script src="{{ asset('assets/vendor/cleavejs/cleave.min.js') }}"></script>

    <!-- input mask currency -->
    {{-- <script src="{{ asset('assets/js/input_masks.js') }}"></script> --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Cleave('.price-input', {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });
        });
    </script> --}}
    <script type="text/javascript">
        function clearFilterFormUserMaster() {
            const form = document.getElementById('filterFormUserMaster');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
