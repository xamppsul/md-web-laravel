@extends('user-layout.master')
@section('title', 'Mou/Moa Edit')
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
                        <a class="f-s-14 f-w-500" href="{{ route('uppsfaculty.MouMoa.index') }}">Kerjasama</a>
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
                        <form id="editFormMouMoa" class="row g-3 app-form rounded-control"
                            action="{{ route('uppsfaculty.MouMoa.update', $data['moumoa']->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="nomor_dokumen">Nomor
                                    Dokumen</label>
                                <input class="form-control @error('nomor_dokumen') is-invalid @enderror" id="nomor_dokumen"
                                    name="nomor_dokumen" placeholder="Masukan Nomor Dokumen" type="text"
                                    value="{{ $data['moumoa']->nomor_dokumen }}">
                                <div class="mt-1">
                                    @error('nomor_dokumen')
                                        <span class="text-danger" id="nomor_dokumen">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="mou_moa_jenis_dokumen">Jenis
                                    Dokumen</label>
                                <select
                                    class="form-select @error('mou_moa_jenis_dokumen')
                                                            is-invalid
                                                        @enderror"
                                    aria-label="Select kerjasama" name="mou_moa_jenis_dokumen">
                                    <option selected="">Pilih kerjasama</option>
                                    @foreach ($data['jenis_dokumen'] as $jenisDokumen)
                                        <option value="{{ $jenisDokumen->id }}"
                                            {{ $data['moumoa']->mou_moa_jenis_dokumen == $jenisDokumen->id ? 'selected' : '' }}>
                                            {{ $jenisDokumen->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('mou_moa_jenis_dokumen')
                                        <span class="text-danger" id="mou_moa_jenis_dokumen">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="nama_mitra">Nama Mitra</label>
                                <input
                                    class="form-control @error('nama_mitra')
                                                            is-invalid
                                                        @enderror"
                                    id="nama_mitra" placeholder="Masukan Nama Mitra" type="text"
                                    value="{{ $data['moumoa']->nama_mitra }}" name="nama_mitra">
                                <div class="mt-1">
                                    @error('nama_mitra')
                                        <span class="text-danger" id="nama_mitra">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="judul_kerjasama">Judul
                                    Kerjasama</label>
                                <input
                                    class="form-control @error('judul_kerjasama')
                                                            is-invalid
                                                        @enderror"
                                    id="judul_kerjasama" placeholder="Masukan Judul Kerjasama" type="text"
                                    value="{{ $data['moumoa']->judul_kerjasama }}" name="judul_kerjasama">
                                <div class="mt-1">
                                    @error('judul_kerjasama')
                                        <span class="text-danger" id="judul_kerjasama">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="mou_moa_bidang_kerjasama">Kerja
                                    Sama</label>
                                <select
                                    class="form-select @error('mou_moa_bidang_kerjasama')
                                                            is-invalid
                                                        @enderror"
                                    aria-label="Select kerjasama" name="mou_moa_bidang_kerjasama">
                                    <option selected="">Pilih kerjasama</option>
                                    @foreach ($data['kerjasama'] as $kerjasama)
                                        <option value="{{ $kerjasama->id }}"
                                            {{ $data['moumoa']->mou_moa_bidang_kerjasama == $kerjasama->id ? 'selected' : '' }}>
                                            {{ $kerjasama->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('mou_moa_bidang_kerjasama')
                                        <span class="text-danger" id="mou_moa_bidang_kerjasama">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- disable penanggung jawab: for users will be automatic by sessions input-->
                            {{-- <div class="col-md-6">
                                <label class="form-label" for="users_id">Penanggung Jawab</label>
                                <select
                                    class="form-select @error('users_id')
                                                            is-invalid
                                                        @enderror"
                                    aria-label="Select Penanggung Jawab" name="users_id">
                                    <option selected="">Pilih Penanggung Jawab</option>
                                    @foreach ($data['user'] as $penanggungJawab)
                                        <option value="{{ $penanggungJawab->id }}"
                                            {{ $data['moumoa']->users_id == $penanggungJawab->id ? 'selected' : '' }}>
                                            {{ $penanggungJawab->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('users_id')
                                        <span class="text-danger" id="users_id">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <label class="form-label" for="tahun_mou_moa">Tahun
                                    Mou/Moa</label>
                                <select class="form-select @error('tahun') is-invalid @enderror"
                                    aria-label="Select tahun mou/moa" name="tahun" required>
                                    <option selected="">Pilih Tahun Mou/Moa</option>
                                    @for ($i = date('Y'); $i >= 1990; $i--)
                                        <option value="{{ $i }}"
                                            {{ $data['moumoa']->tahun == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <div class="mt-1">
                                    @error('tahun')
                                        <span class="text-danger" id="tahun">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tanggal_mulai">Tanggal
                                    Mulai</label>
                                <input
                                    class="form-control @error('tanggal_mulai')
                                                            is-invalid
                                                        @enderror basic-date"
                                    type="text" name="tanggal_mulai" placeholder="YYYY-MM-DD"
                                    value="{{ $data['moumoa']->tanggal_mulai }}">
                                <div class="mt-1">
                                    @error('tanggal_mulai')
                                        <span class="text-danger" id="tanggal_mulai">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tanggal_akhir">Tanggal
                                    Akhir</label>
                                <input
                                    class="form-control @error('tanggal_akhir')
                                                            is-invalid
                                                        @enderror basic-date"
                                    type="text" name="tanggal_akhir" placeholder="YYYY-MM-DD"
                                    value="{{ $data['moumoa']->tanggal_akhir }}">
                                <div class="mt-1">
                                    @error('tanggal_akhir')
                                        <span class="text-danger" id="tanggal_akhir">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="mou_moa_klasifikasi">Klasifikasi</label>
                                <select class="form-select @error('mou_moa_klasifikasi') is-invalid @enderror"
                                    aria-label="Select klasifikasi" name="mou_moa_klasifikasi" required>
                                    <option selected="">Pilih klasifikasi</option>
                                    @foreach ($data['klasifikasi'] as $klasifikasi)
                                        <option value="{{ $klasifikasi->id }}"
                                            {{ $data['moumoa']->mou_moa_klasifikasi == $klasifikasi->id ? 'selected' : '' }}>
                                            {{ $klasifikasi->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('mou_moa_klasifikasi')
                                        <span class="text-danger" id="mou_moa_klasifikasi">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="mou_moa_status">Status</label>
                                <select
                                    class="form-select @error('mou_moa_status')
                                                            is-invalid
                                                        @enderror"
                                    aria-label="Select Status" name="mou_moa_status" required>
                                    <option selected="">Pilih Status</option>
                                    @foreach ($data['status'] as $status)
                                        <option value="{{ $status->id }}"
                                            {{ $data['moumoa']->mou_moa_status == $status->id ? 'selected' : '' }}>
                                            {{ $status->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('mou_moa_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="keterangan_tambahan">Keterangan
                                    Tambahan</label>
                                <textarea
                                    class="form-control @error('keterangan_tambahan')
                                                            is-invalid
                                                        @enderror"
                                    id="" cols="30" rows="10" name="keterangan_tambahan">{{ $data['moumoa']->keterangan_tambahan }}</textarea>
                                <div class="mt-1">
                                    @error('keterangan_tambahan')
                                        <span class="text-danger" id="keterangan_tambahan">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="dokumen_pendukung">Dokumen
                                    Pendukung</label>

                                <input type="file"
                                    class="form-control @error('dokumen_pendukung')
                                                            is-invalid
                                                        @enderror"
                                    name="dokumen_pendukung">
                                @error('dokumen_pendukung')
                                    <span class="text-danger" id="dokumen_pendukung">{{ $message }}</span>
                                @enderror

                                @empty($data['moumoa']->dokumen_pendukung)
                                    {{ __('pendukung belum ada harap upload dokumen pendukung') }}
                                @else
                                    <div class="mb-10">
                                        <a href="{{ asset("MD_disk/{$data['moumoa']->penanggung_jawab_id}-{$data['moumoa']->penanggung_jawab_name}/MouMoa/{$data['moumoa']->dokumen_pendukung}") }}"
                                            target="_blank">
                                            Document:<b> Click Here</b>
                                        </a>
                                    </div>
                                @endempty
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary b-r-22" type="submit" value="Submit">Submit
                                </button>
                                <button class="btn btn-warning b-r-22" value="clear"
                                    onclick="cleareditFormMouMoa()">Clear
                                </button>
                                <a class="btn btn-danger b-r-22" href="{{ route('uppsfaculty.MouMoa.index') }}">Cancel
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
        function cleareditFormMouMoa() {
            const form = document.getElementById('editFormMouMoa');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
