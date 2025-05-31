@extends('admin-layout.master')
@section('title', 'User Edit')
@section('css')

@endsection
@section('main-content')
    <div class="container-fluid">

        <!-- Breadcrumb start -->
        <div class="row m-1">
            <div class="col-12 ">
                <h4 class="main-title">Edit</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li class="">
                        <a class="f-s-14 f-w-500" href="#">
                            <span>
                                <i class="ph-duotone  ph-cardholder f-s-16"></i> Master
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="f-s-14 f-w-500" href="{{ route('admin.master.UserMaster.index') }}">User</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb end -->

        <!-- Form Validation start -->
        <div class="row ">
            <!-- Tooltips start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column gap-2">
                    </div>
                    <div class="card-body">
                        <form id="editFormUser" class="row g-3 app-form rounded-control"
                            action="{{ route('admin.master.UserMaster.update', $data['usermaster']->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Masukan Name" type="text"
                                    value="{{ $data['usermaster']->name }}">
                                <div class="mt-1">
                                    @error('name')
                                        <span class="text-danger" id="name">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="username">username</label>
                                <input class="form-control @error('username') is-invalid @enderror" id="username"
                                    name="username" placeholder="Masukan username" type="text"
                                    value="{{ $data['usermaster']->username }}">
                                <div class="mt-1">
                                    @error('username')
                                        <span class="text-danger" id="username">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="email">email</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Masukan email" type="text"
                                    value="{{ $data['usermaster']->email }}">
                                <div class="mt-1">
                                    @error('email')
                                        <span class="text-danger" id="email">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="password">password</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="password"
                                    name="password" placeholder="Masukan password" type="text"
                                    value="{{ old('password') }}">
                                <div class="mt-1">
                                    @error('password')
                                        <span class="text-danger" id="password">{{ $message }}</span>
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
                                            {{ $data['usermaster']->roles_id == $roles->id ? 'selected' : '' }}>
                                            {{ $roles->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('roles_id')
                                        <span class="text-danger" id="roles_id">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary b-r-22" type="submit" value="Submit">Submit
                                </button>
                                <button class="btn btn-warning b-r-22" onclick="cleareditFormUser()" value="Clear">Clear
                                </button>
                                <a class="btn btn-danger b-r-22" href="{{ route('admin.master.UserMaster.index') }}">Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Validation end -->

    </div>
@endsection

@section('script')
    <!--customizer-->
    <div id="customizer"></div>

    <!--js-->
    <script src="{{ asset('assets/js/formvalidation.js') }}"></script>

    <script type="text/javascript">
        function cleareditFormUser() {
            const form = document.getElementById('editFormUser');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
