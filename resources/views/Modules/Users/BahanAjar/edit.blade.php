@extends('user-layout.master')
@section('title', 'Bahan Ajar Edit')
@section('css')
    <!-- flatpickr css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datepikar/flatpickr.min.css') }}">
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
                                <i class="ph-duotone  ph-cardholder f-s-16"></i> Module
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="f-s-14 f-w-500"
                            href="{{ route('staffdosen.BahanAjar.edit', $data['bahanAjar']->id) }}">Bahan Ajar</a>
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
                        <form id="editBahanAjar" class="row g-3 app-form rounded-control"
                            action="{{ route('staffdosen.BahanAjar.update', $data['bahanAjar']->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="judul">Judul Bahan Ajar</label>
                                <input
                                    class="form-control @error('judul')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="judul" placeholder="Masukan judul bahan ajar"
                                    value="{{ $data['bahanAjar']->judul }}">
                                <div class="mt-1">
                                    @error('judul')
                                        <span class="text-danger" id="judul">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="bahan_ajar_jenis">Jenis Bahan
                                    Ajar</label>
                                <select class="form-select @error('bahan_ajar_jenis') is-invalid @enderror"
                                    aria-label="Select bahan_ajar_jenis" name="bahan_ajar_jenis" required>
                                    <option selected="">Pilih Jenis Bahan Ajar</option>
                                    @foreach ($data['jenis'] as $bahan_ajar_jenis)
                                        <option value="{{ $bahan_ajar_jenis->id }}"
                                            {{ $data['bahanAjar']->bahan_ajar_jenis == $bahan_ajar_jenis->id ? 'selected' : '' }}>
                                            {{ $bahan_ajar_jenis->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('bahan_ajar_jenis')
                                        <span class="text-danger" id="bahan_ajar_jenis">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="mata_kuliah">Matakuliah</label>
                                <input
                                    class="form-control @error('mata_kuliah')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="mata_kuliah" placeholder="Masukan Matakuliah"
                                    value="{{ $data['bahanAjar']->mata_kuliah }}">
                                <div class="mt-1">
                                    @error('mata_kuliah')
                                        <span class="text-danger" id="mata_kuliah">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="program_studi">Program
                                    Studi</label>
                                <input
                                    class="form-control @error('program_studi')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="program_studi" placeholder="Masukan Program Studi"
                                    value="{{ $data['bahanAjar']->program_studi }}">
                                <div class="mt-1">
                                    @error('program_studi')
                                        <span class="text-danger" id="program_studi">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="semester">Semester</label>
                                <input
                                    class="form-control @error('semester')
                                                            is-invalid
                                                        @enderror"
                                    type="number" name="semester" placeholder="Masukan Semester"
                                    value="{{ $data['bahanAjar']->semester }}">
                                <div class="mt-1">
                                    @error('semester')
                                        <span class="text-danger" id="semester">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tanggal_terbit">Tanggal
                                    Terbit</label>
                                <input
                                    class="form-control @error('tanggal_terbit')
                                                            is-invalid
                                                        @enderror basic-date"
                                    type="text" name="tanggal_terbit" placeholder="YYYY-MM-DD"
                                    value="{{ $data['bahanAjar']->tanggal_terbit }}">
                                <div class="mt-1">
                                    @error('tanggal_terbit')
                                        <span class="text-danger" id="tanggal_terbit">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <textarea
                                    class="form-control @error('deskripsi')
                                                            is-invalid
                                                        @enderror"
                                    id="" cols="30" rows="10" name="deskripsi">{{ $data['bahanAjar']->deskripsi }}</textarea>
                                <div class="mt-1">
                                    @error('deskripsi')
                                        <span class="text-danger" id="deskripsi">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="file_bahan">File Bahan Ajar</label>
                                <input type="file"
                                    class="form-control @error('file_bahan')
                                                            is-invalid
                                                        @enderror"
                                    name="file_bahan">
                                @error('file_bahan')
                                    <span class="text-danger" id="file_bahan">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="link_bahan">Link Bahan Ajar</label>
                                <input
                                    class="form-control @error('link_bahan')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="link_bahan" placeholder="Masukan Link Bahan Ajar"
                                    value="{{ $data['bahanAjar']->link_bahan }}">
                                <div class="mt-1">
                                    @error('link_bahan')
                                        <span class="text-danger" id="link_bahan">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="bahan_ajar_status_penggunaan">Status Penggunaan Bahan
                                    Ajar</label>
                                <select class="form-select @error('bahan_ajar_status_penggunaan') is-invalid @enderror"
                                    aria-label="Select bahan_ajar_status_penggunaan" name="bahan_ajar_status_penggunaan"
                                    required>
                                    <option selected="">Pilih Status Penggunaan Bahan Ajar
                                    </option>
                                    @foreach ($data['status_penggunaan'] as $bahan_ajar_status_penggunaan)
                                        <option value="{{ $bahan_ajar_status_penggunaan->id }}"
                                            {{ $data['bahanAjar']->bahan_ajar_status_penggunaan == $bahan_ajar_status_penggunaan->id ? 'selected' : '' }}>
                                            {{ $bahan_ajar_status_penggunaan->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('bahan_ajar_status_penggunaan')
                                        <span class="text-danger"
                                            id="bahan_ajar_status_penggunaan">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary b-r-22" type="submit" value="Submit">Submit
                                </button>
                                <button class="btn btn-warning b-r-22" value="clear"
                                    onclick="cleareditFormBahanAjar()">Clear
                                </button>
                                <a class="btn btn-danger b-r-22" href="{{ route('staffdosen.BahanAjar.index') }}">Cancel
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

    <!-- flatpickr js-->
    <script src="{{ asset('assets/vendor/datepikar/flatpickr.js') }}"></script>

    <!--datepicker-->
    <script src="{{ asset('assets/js/date_picker.js') }}"></script>

    <script type="text/javascript">
        function cleareditFormBahanAjar() {
            const form = document.getElementById('editBahanAjar');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
