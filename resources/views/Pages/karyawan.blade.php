@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Karyawan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="index.php?include=dashboard">Home</a></li> -->
                        <li class="breadcrumb-item active">Data Karyawan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex col-sm-12 justify-content-between">
                            <div class="col-md-10 p-0">
                                <form action="" method="GET">
                                    <div class="input-group col-md-6 mr-3 p-0">
                                        <input type="text" name="search" id="search" class="form-control"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- <h3 class="card-title col align-self-center">List Products</h3> -->
                            {{-- <div class="p-0">
                                <a href="" class="btn btn-primary w-100" data-toggle="modal" data-target="#importExcelModal"><i
                                        class="nav-icon fas fa-plus mr-2"></i> Tambah Data</a>
                            </div> --}}
                            {{-- modal import --}}
                            {{-- <div class="modal fade" id="importExcelModal" tabindex="-1" role="dialog" aria-labelledby="importExcelModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="importExcelModalLabel">Formulir Tambah Karyawan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            {{-- <th><input type="checkbox" id="checkAll"></th> --}}
                                            <th style="width: 10px">No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Departemen</th>
                                            <th>Posisi</th>
                                            <th>Status</th>
                                            <th>Tanggal Bergabung</th>
                                            <th>Saldo Cuti</th>
                                            <th style="width: 150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($data as $key => $datas)
                                                {{-- <td><input type="checkbox" class="checkbox" data-id="{{ $datas->id_auth }}"></td> --}}
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $datas->id }}</td>
                                                <td>{{ $datas->name }}</td>
                                                <td>{{ $datas->dept }}</td>
                                                <td>{{ $datas->job_title }}</td>
                                                <td class="text-capitalize">{{ $datas->status }}</td>
                                                <td>{{ $datas->join_date }}</td>
                                                <td>{{ $datas->saldo_cuti }}</td>
                                                {{-- <td>
                                <div class="text-center">
                                    <img src="{{ asset('storage/image/' . $datas->image) }}" class="img-thumbnail" style="max-width: 150px;" alt="">
                                </div>
                            </td> --}}
                                                <td class="d-flex justify-content-center">
                                                    {{-- <a href="" class="btn btn-info"><i class="nav-icon far fa-eye mr-2"></i>Detail</a> --}}
                                                    <a href="" class="btn btn-secondary mr-1" title="Edit Data"><i class="nav-icon fas fa-edit"></i></a>
                                                    {{-- <a  onclick="resetPassword({{ $datas->id }})" class="btn btn-warning mr-1" title="Reset Password"><i class="nav-icon fas fa-key" style="color: white"></i></a> --}}
                                                    <a class="btn btn-danger" onclick="" title="Hapus Data"><i class="nav-icon fas fa-trash-alt"></i></a>
                                                    {{-- <form action="{{ route('admin.mahasiswa.destroy', $datas->id_auth) }}"
                                                        method="post" class="mt-1 ml-1"
                                                        onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="nav-icon fas fa-trash-alt"></i></button>
                                                    </form> --}}
                                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- <button id="deleteSelected" class="btn btn-danger" style="display:none;">Delete Selected</button> --}}
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <div class="float-right">
                                    {{-- {{ $data->onEachSide(1)->links('pagination::bootstrap-4') }} --}}
                                </div>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

