@extends('admin-layout.master')
@section('title', 'Aset Edit')
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
                        <form id="editFormAset" class="row g-3 app-form rounded-control"
                            action="{{ route('admin.master.Asset.update', $data['aset']->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="users_id">Fakultas</label>
                                <select class="form-select @error('users_id') is-invalid @enderror"
                                    aria-label="Select Fakultas" name="users_id" required>
                                    <option selected="">Pilih Fakultas</option>
                                    @foreach ($data['user_faculty'] as $users_id)
                                        <option value="{{ $users_id->id }}"
                                            {{ $data['aset']->users_id == $users_id->id ? 'selected' : '' }}>
                                            {{ $users_id->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('users_id')
                                        <span class="text-danger" id="users_id">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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
                                <label class="form-label" for="aset_kategori">Kategori
                                    Aset</label>
                                <select
                                    class="form-select @error('aset_kategori')
                                                            is-invalid
                                                        @enderror"
                                    aria-label="Select kategori aset" name="aset_kategori">
                                    <option selected="">Pilih Kategori Aset</option>
                                    @foreach ($data['aset_kategori'] as $kategoriAset)
                                        <option value="{{ $kategoriAset->id }}"
                                            {{ $data['aset']->aset_kategori == $kategoriAset->id ? 'selected' : '' }}>
                                            {{ $kategoriAset->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('aset_kategori')
                                        <span class="text-danger" id="aset_kategori">{{ $message }}</span>
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
                                <label class="form-label" for="tahun_aset">Tahun
                                    Aset</label>
                                <select class="form-select @error('tahun') is-invalid @enderror"
                                    aria-label="Select tahun aset" name="tahun" required>
                                    <option selected="">Pilih Tahun Aset</option>
                                    @for ($i = date('Y'); $i >= 1990; $i--)
                                        <option value="{{ $i }}"
                                            {{ $data['aset']->tahun == $i ? 'selected' : '' }}>
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
                                <label class="form-label" for="aset_kondisi">Kondisi Aset</label>
                                <select class="form-select @error('aset_kondisi') is-invalid @enderror"
                                    aria-label="Select kondisi aset" name="aset_kondisi" required>
                                    <option selected="">Pilih Kondisi Aset</option>
                                    @foreach ($data['aset_kondisi'] as $kondisiAset)
                                        <option value="{{ $kondisiAset->id }}"
                                            {{ $data['aset']->aset_kondisi == $kondisiAset->id ? 'selected' : '' }}>
                                            {{ $kondisiAset->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('aset_kondisi')
                                        <span class="text-danger" id="aset_kondisi">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="aset_status">Status Aset</label>
                                <select
                                    class="form-select @error('aset_status')
                                                            is-invalid
                                                        @enderror"
                                    aria-label="Select status aset" name="aset_status" required>
                                    <option selected="">Pilih Status Aset</option>
                                    @foreach ($data['aset_status'] as $statusAset)
                                        <option value="{{ $statusAset->id }}"
                                            {{ $data['aset']->aset_status == $statusAset->id ? 'selected' : '' }}>
                                            {{ $statusAset->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('aset_status')
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
                                <button class="btn btn-warning b-r-22" onclick="clearEditFormAset()" value="Clear">Clear
                                </button>
                                <a class="btn btn-danger b-r-22" href="{{ route('admin.master.Asset.index') }}">Cancel
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
        function clearEditFormAset() {
            const form = document.getElementById('editFormAset');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
