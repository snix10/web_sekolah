@extends('admin.index')

@section('ekstrakurikuler')

<h1>laman ekstrakulikuler</h1>


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
                    
                    <th>Ekstrakurikuler</th>
                    <th>Deskripsi</th>
                    <th>Gambar Ekstrakurikuler</th>
                    
                </tr>
            </thead>
            <tbody>

                @foreach ($ekstrakurikulers as $ekstrakurikuler)
                    <tr data-toggle="modal" data-target="#modal-ubah{{ $ekstrakurikuler->id }}">
                        <td>{{ $ekstrakulikuler->ekstrakurikuler }}</td>
                        <td>{{ $ekstrakulikuler->deskripsi }}
                        </td>
                        <td>{{ $ekstrakulikuler->gambar_ektrakurikuler }}
                        </td>




                        {{-- Modal Ubah --}}
                        <div class="modal fade" id="modal-ubah{{ $ekstrakurikuler->id }}">
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
                                            action="{{ route('ekstrakurikuler.update', $ekstrakurikuler) }}">
                                            @csrf
                                            @method('PUT')

                                            <img src="{{ asset('storage/gambar_ekstrakurikuler/' . $ekstrakurikuler->gambar_ekstrakurikuler) }}" alt="">
                                            <div class="form-group">
                                                <label for="form1">gambar ekstrakurikuler</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="gambar_ekstrakurikuler" class="custom-file-input"
                                                            id="form1">
                                                        <label class="custom-file-label"
                                                            for="exampleInputFile">{{ $ekstrakurikuler->gambar_ekstrakurikuler }}</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="form2">Ekstrakurikuler</label>
                                                <input type="text" name="ekstrakurikuler" class="form-control" id="form2"
                                                    value="{{ $ekstrakurikuler->ekstrakurikuler }}" placeholder="Ekstrakurikuler" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="form3">Deskripsi</label>
                                                <input type="text" name="deskripsi" class="form-control" id="form3"
                                                    value="{{ $ekstrakurikuler->deskripsi }}" placeholder="Deskripsi" required>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="form4">Mapel</label>
                                                <input type="text" name="mapel" class="form-control" id="form4"
                                                    value="{{ $stafguru->mapel }}" placeholder="mapel">
                                            </div> --}}

                                    </div>
                                    <div class="modal-footer justify-content-between">


                                        {{-- <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button> --}}
                                        <button type="submit" class="btn btn-primary">Save changes</button>

                                        </form>

                                        <form action="{{ route('ekstrakurikuler.destroy', $ekstrakurikuler) }}" method="POST"
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
        <form enctype="multipart/form-data" class="navbar-form" method="post" action="{{ route('ekstrakurikuler.store') }}">
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
                        <label for="form1">Gambar ekstrakurikuler</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="gambar_ekstrakurikuler" class="custom-file-input" id="form1" required>
                                <label class="custom-file-label" for="exampleInputFile">Gambar ekstrakurikuler</label>
                            </div>

                        </div>
                    </div>



                    <div class="form-group">
                        <label for="form2">Ekstrakurikuler</label>
                        <input type="text" name="ekstrakurikuler" class="form-control" id="form2"
                            placeholder="ekstrakurikuler" required>
                    </div>
                    <div class="form-group">
                        <label for="form3">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="form3"
                            placeholder="Deskripsi" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="form4">Mapel</label>
                        <input type="text" name="mapel" class="form-control" id="form4"
                            placeholder="mapel">
                    </div> --}}

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