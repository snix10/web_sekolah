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
                        <th>Photo</th>
                        <th>DSB</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($stafgurus as $stafguru)
                        <tr data-toggle="modal" data-target="#modal-ubah{{$stafguru->id}}">
                            <td>{{$stafguru->nama}}</td>
                            <td>{{$stafguru->jabatan}}
                            </td>
                            <td>{{$stafguru->mapel}}</td>
                            <td> {{$stafguru->photo}}-</td>
                            <td>X</td>
                            <div class="modal fade" id="modal-ubah{{$stafguru->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Ubah</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            

                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photo" class="custom-file-input"
                                                            id="exampleInputFile">
                                                        <label class="custom-file-label"
                                                            for="exampleInputFile">photo</label>
                                                    </div>
                                                    {{-- <div class="input-group-append">
                                                  <span class="input-group-text">Upload</span>
                                              </div> --}}
                                                </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" class="form-control" id="nama"
                                                value="{{$stafguru->nama }}" placeholder="masukan nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="sebagai">Jabatan</label>
                                                <input type="text" name="sebagai" class="form-control" id="sebagai"
                                                value="{{$stafguru->jabatan }}" placeholder="jabatan">
                                            </div>
                                            <div class="form-group">
                                                <label for="mapel">Mapel</label>
                                                <input type="text" name="mapel" class="form-control" id="mapel"
                                                value="{{$stafguru->mapel }}" placeholder="mapel">
                                            </div>

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
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
                {{-- <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </tfoot> --}}
            </table>
        </div>
        <!-- /.card-body -->
    </div>




    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
