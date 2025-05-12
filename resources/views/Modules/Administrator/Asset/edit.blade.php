@extends('layout.master')
@section('title', 'Form Validation')
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
                        <a class="f-s-14 f-w-500" href="{{ route('admin.master.Asset.index') }}">Aset</a>
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
                        <form class="row g-3 app-form rounded-control"
                            action="{{ route('admin.master.Asset.update', $data['aset']->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="kode_aset">Kode Aset</label>
                                <input class="form-control @error('kode_aset') is-invalid @enderror" id="kode_aset"
                                    name="kode_aset" placeholder="Masukan Kode Aset" type="text"
                                    value="{{ $data['aset']->kode_aset }}">
                                <div class="mt-1">
                                    @error('kode_aset')
                                        <span class="text-danger" id="kode_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="nama_aset">Nama Aset</label>
                                <input
                                    class="form-control @error('nama_aset')
                                                            is-invalid
                                                        @enderror"
                                    id="nama_aset" placeholder="Masukan Nama Aset" type="text"
                                    value="{{ $data['aset']->nama_aset }}" name="nama_aset">
                                <div class="mt-1">
                                    @error('nama_aset')
                                        <span class="text-danger" id="nama_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="kategori_aset">Kategori
                                    Aset</label>
                                <select
                                    class="form-select @error('kategori_aset')
                                                            is-invalid
                                                        @enderror"
                                    aria-label="Select kategori aset" name="kategori_aset">
                                    <option selected="">Pilih Kategori Aset</option>
                                    @foreach ($data['kategori'] as $kategoriAset)
                                        <option value="{{ $kategoriAset->id }}"
                                            {{ $data['aset']->kategori_aset == $kategoriAset->id ? 'selected' : '' }}>
                                            {{ $kategoriAset->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('kategori_aset')
                                        <span class="text-danger" id="kategori_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="model_merk_aset">Model/Merk</label>
                                <input
                                    class="form-control @error('model_merk_aset')
                                                            is-invalid
                                                        @enderror"
                                    id="kode_aset" name="model_merk_aset" placeholder="Masukan Model/Merk Aset"
                                    type="text" value="{{ $data['aset']->merek_model }}">
                                <div class="mt-1">
                                    @error('model_merk_aset')
                                        <span class="text-danger" id="model_merk_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tanggal_perolehan_aset">Tanggal
                                    Perolehan(Aset
                                    diterima/dibeli)</label>
                                <input
                                    class="form-control @error('tanggal_perolehan_aset')
                                                            is-invalid
                                                        @enderror basic-date"
                                    type="text" name="tanggal_perolehan_aset" placeholder="YYYY-MM-DD"
                                    value="{{ $data['aset']->tanggal_perolehan }}">
                                <div class="mt-1">
                                    @error('tanggal_perolehan_aset')
                                        <span class="text-danger" id="tanggal_perolehan_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="lokasi_aset">Lokasi Aset</label>
                                <input
                                    class="form-control @error('lokasi_aset')
                                                            is-invalid
                                                        @enderror"
                                    id="kode_aset" name="lokasi_aset" placeholder="Masukan Lokasi Aset" type="text"
                                    value="{{ $data['aset']->lokasi_aset }}">
                                <div class="mt-1">
                                    @error('lokasi_aset')
                                        <span class="text-danger" id="tanggal_perolehan_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="kondisi_aset">Kondisi Aset</label>
                                <select class="form-select @error('kondisi_aset') is-invalid @enderror"
                                    aria-label="Select kondisi aset" name="kondisi_aset" required>
                                    <option selected="">Pilih Kondisi Aset</option>
                                    @foreach ($data['kondisi'] as $kondisiAset)
                                        <option value="{{ $kondisiAset->id }}"
                                            {{ $data['aset']->kondisi_aset == $kondisiAset->id ? 'selected' : '' }}>
                                            {{ $kondisiAset->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('kondisi_aset')
                                        <span class="text-danger" id="kondisi_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="status_aset">Status Aset</label>
                                <select
                                    class="form-select @error('status_aset')
                                                            is-invalid
                                                        @enderror"
                                    aria-label="Select status aset" name="status_aset" required>
                                    <option selected="">Pilih Status Aset</option>
                                    @foreach ($data['status'] as $statusAset)
                                        <option value="{{ $statusAset->id }}"
                                            {{ $data['aset']->status_aset == $statusAset->id ? 'selected' : '' }}>
                                            {{ $statusAset->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('status_aset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="harga_perolehan_aset">Harga
                                    Perolehan</label>
                                {{-- <input class="form-control" id="kode_aset"
                                                            placeholder="Masukan Harga Perolehan" type="number"> --}}
                                {{-- <input type="text"
                                                            class="form-control @error('harga_perolehan_aset')
                                                            is-invalid
                                                        @enderror price-input"
                                                            name="harga_perolehan_aset"> --}}
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary-200 b-r-left" id="basic-addon1">Rp</span>
                                    <input type="number" name="harga_perolehan_aset"
                                        class="form-control @error('harga_perolehan_aset')
                                                                is-invalid
                                                            @enderror"
                                        placeholder="Masukan Harga Perolehan"
                                        value="{{ $data['aset']->harga_perolehan }}">
                                </div>
                                <div class="mt-1">
                                    @error('harga_perolehan_aset')
                                        <span class="text-danger" id="tanggal_perolehan_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="sumber_dana_aset">Sumber
                                    Dana</label>
                                <input
                                    class="form-control @error('sumber_dana_aset')
                                                            is-invalid
                                                        @enderror"
                                    id="kode_aset" name="sumber_dana_aset" placeholder="Masukan Sumber Dana"
                                    type="text" value="{{ $data['aset']->sumber_dana }}">
                                <div class="mt-1">
                                    @error('sumber_dana_aset')
                                        <span class="text-danger" id="tanggal_perolehan_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="keterangan_aset">Keterangan</label>
                                <textarea
                                    class="form-control @error('keterangan_aset')
                                                            is-invalid
                                                        @enderror"
                                    id="" cols="30" rows="10" name="keterangan_aset">{{ $data['aset']->keterangan }}</textarea>
                                <div class="mt-1">
                                    @error('keterangan_aset')
                                        <span class="text-danger" id="tanggal_perolehan_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary b-r-22" type="submit" value="Submit">Submit
                                </button>
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
@endsection
