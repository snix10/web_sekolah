@extends('admin.index')

@section('stafguru')
    <div class="card">
        <div class="card-header">
            {{-- <h3 class="card-title">DataTable with default features</h3> --}}
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-tambah">
                Tambah
            </button>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Mapel</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($stafgurus as $stafguru)
                        <tr data-toggle="modal" data-target="#modal-ubah{{ $stafguru->id }}">
                            <td>{{ $stafguru->nama }}</td>
                            <td>{{ $stafguru->jabatan }}
                            </td>
                            <td>{{ $stafguru->mapel }}</td>


                            {{-- Modal Ubah --}}
                            <div class="modal fade" id="modal-ubah{{ $stafguru->id }}">
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
                                                action="{{ route('stafguru.update', $stafguru) }}">
                                                @csrf
                                                @method('PUT')

                                                <img src="{{ asset('storage/photos/' . $stafguru->photo) }}" alt="">
                                                <div class="form-group">
                                                    <label for="form1">Photo</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="photo" class="custom-file-input"
                                                                id="form1">
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">{{ $stafguru->photo }}</label>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="form2">Nama</label>
                                                    <input type="text" name="nama" class="form-control" id="form2"
                                                        value="{{ $stafguru->nama }}" placeholder="masukan nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="form3">Jabatan</label>
                                                    <input type="text" name="jabatan" class="form-control" id="form3"
                                                        value="{{ $stafguru->jabatan }}" placeholder="jabatan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="form4">Mapel</label>
                                                    <input type="text" name="mapel" class="form-control" id="form4"
                                                        value="{{ $stafguru->mapel }}" placeholder="mapel">
                                                </div>

                                        </div>
                                        <div class="modal-footer justify-content-between">


                                            {{-- <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button> --}}
                                            <button type="submit" class="btn btn-primary">Save changes</button>

                                            </form>

                                            <form action="{{ route('stafguru.destroy', $stafguru) }}" method="POST"
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
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-lg">
            <form enctype="multipart/form-data" class="navbar-form" method="post" action="{{ route('stafguru.store') }}">
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
                            <label for="form1">Photo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input" id="form1" required>
                                    <label class="custom-file-label" for="exampleInputFile">photo</label>
                                </div>

                            </div>
                        </div>



                        <div class="form-group">
                            <label for="form2">Nama</label>
                            <input type="text" name="nama" class="form-control" id="form2"
                                placeholder="masukan nama" required>
                        </div>
                        <div class="form-group">
                            <label for="form3">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" id="form3"
                                placeholder="jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="form4">Mapel</label>
                            <input type="text" name="mapel" class="form-control" id="form4"
                                placeholder="mapel">
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
