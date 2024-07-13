@extends('admin.index')

@section('prestasi')
    <div class="card">
        <div class="card-header">
            {{-- <h3 class="card-title">DataTable with default features</h3> --}}
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-tambah-prestasi">
                Tambah
            </button>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Prestasi/Kejuaraan</th>
                        <th>Keterangan</th>
                        <th>Sumber</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($prestasisekolah as $prestasi)
                        <tr data-toggle="modal" data-target="#modal-ubah-prestasi{{ $prestasi->id }}">
                            <td>{{ $prestasi->kejuaraan }}</td>
                            <td>{{ $prestasi->keterangan }}
                            </td>
                            <td>{{ $prestasi->sumber }}</td>

                            {{-- Modal Ubah --}}
                            <div class="modal fade" id="modal-ubah-prestasi{{ $prestasi->id }}">
                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Ubah</h4>



                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form enctype="multipart/form-data" class="navbar-form" method="post"
                                                action="{{ route('prestasi.update', $prestasi) }}">
                                                @csrf
                                                @method('PUT')

                                                <img src="{{ asset('storage/gambarprestasi/' . $prestasi->gambarprestasi) }}"
                                                    alt="">
                                                <div class="form-group">
                                                    <label for="form1">Image</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="gambarprestasi"
                                                                class="custom-file-input" id="form1">
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">{{ $prestasi->gambarprestasi }}</label>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="form2">Prestasi/Kejuaraan/Penghargaan</label>
                                                    <input type="text" name="kejuaraan" class="form-control"
                                                        id="form2" value="{{ $prestasi->kejuaraan }}"
                                                        placeholder="kejuaraan/prestasi/penghargaan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="form3">Keterangan</label>
                                                    <input type="text" name="keterangan" class="form-control"
                                                        id="form3" value="{{ $prestasi->keterangan }}"
                                                        placeholder="keterangan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="form4">Sumber</label>
                                                    <input type="text" name="sumber" class="form-control" id="form4"
                                                        value="{{ $prestasi->sumber }}" placeholder="sumber" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="form5">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Enter ...">{{ $prestasi->deskripsi }}</textarea>
                                                    {{-- <input type="text" name="deskripsi" class="form-control" id="form5"
                                                        value="{{ $prestasi->sumber }}" placeholder="sumber" required> --}}
                                                </div>

                                        </div>
                                        <div class="modal-footer justify-content-between">


                                            {{-- <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button> --}}
                                            <button type="submit" class="btn btn-primary">Save changes</button>

                                            </form>

                                            <form action="{{ route('prestasi.destroy', $prestasi) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"> <i
                                                        class="nav-icon fas fa-trash"></i></button>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        </tr>
        @endforeach


        </tbody>

        </table>
    </div>
    <!-- /.card-body -->
    </div>



    {{-- Tambah --}}
    <div class="modal fade" id="modal-tambah-prestasi">
        <div class="modal-dialog modal-lg">
            <form enctype="multipart/form-data" class="navbar-form" method="post" action="{{ route('prestasi.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="form1">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="gambarprestasi" class="custom-file-input" id="form1"
                                        required>
                                    <label class="custom-file-label" for="form1">photo</label>
                                </div>

                            </div>
                        </div>



                        <div class="form-group">
                            <label for="form2">Prestasi/Kejuaraan/Penghargaan</label>
                            <input type="text" name="kejuaraan" class="form-control" id="form2"
                                placeholder="prestasi/kerjuaraan/pernghargaan" required>
                        </div>
                        <div class="form-group">
                            <label for="form3">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="form3"
                                placeholder="keterangan" required>
                        </div>
                        <div class="form-group">
                            <label for="form4">Sumber</label>
                            <input type="text" name="sumber" class="form-control" id="form4"
                                placeholder="sumber" required>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
