@extends('layout.desaignlayout')
@section('title', 'Form Identity')

<?php
    $no=1;  
?>

@section('content')  
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <br>
                    <br>
                    <div class="col-sm-7">

                    </div>
                    <div class="col-sm-5">
                    <a href="{{route('foto.null')}}" class="btn btn-primary"><i
                            class="glyphicon glyphicon-picture"></i><span> Foto Kosong</span></a>

                    <!-- search form merupakan baris pencarian-->
                    <div class="col-sm-6">
                    <form action="" method="GET" class="form-inline my-2 my-lg-0">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="pencarian" class="form-control" placeholder="Kata Kunci">
                                <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                    </form>
                    </div>
                    </div>
                    <!-- /.search form -->
                    <div class="col-md-12">
                        <br>
                        <br>
                        <div class="card">
                            <form role="form" action="{{route('delete.selected')}}" method="POST">
                            @csrf
                            <div class="card-header table-title">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>Biodata <b>Pengguna</b></h3>
                                    </div>
            
                                    <div class="col-sm-8">
                                        <br>
                                        <button type="submit" class="btn btn-warning"><i
                                            class="material-icons"></i> <span>Hapus Data</span></button>
                                        {{-- <a href="{{ route('identity.create') }}" class="btn btn-success" data-toggle="modal"><i
                                            class="material-icons"></i> <span>Tambah Data</span></a> --}}
                                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                            class="material-icons"></i> <span>Tambah Data</span></a>
                                        {{-- <a href="#deleteEmployeeModal" class="btn btn-primary" data-toggle="modal"><i
                                            class="material-icons"></i> <span>Hapus Semua</span></a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                    @if ($message = Session::get('status'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        {{-- # --}}
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" id="selectAll">
                                                            <label for="selectAll"></label>
                                                        </span>
                                                    </th> 
                                                    <th>No.</th>
                                                    <th><center>Foto</center></th>
                                                    <th><center>Nama</center></th>
                                                    <th><center>Email</center></th>
                                                    <th><center>Tanggal Lahir</center></th>
                                                    <th><center>Umur</center></th>
                                                    <th><center>Alamat</center></th>
                                                    <th><center>Telepon</center></th>
                                                    <th><center>Action</center></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                    @foreach ($dataidentity as $item)
                                                        <tr>
                                                            <td>
                                                                <span class="custom-checkbox">
                                                                    <input type="checkbox" class="pilih" name="options[]" value="{{$item->id}}">
                                                                    <label for="checkbox"></label>
                                                                </span>
                                                                {{-- <input type="checkbox" id="checkbox" name="options[]" value="{{$item->id}}"> --}}
                                                            </td>
                                                            <td><?php echo $no++; ?></td>
                                                            @if($item->foto == null)
                                                            <td>
                                                                <img src="{{ url('people.png')}}" height="100px" width="100px">
                                                            </td>   
                                                            @else 
                                                            <td>
                                                                <img src="{{asset('storage/'.$item->foto)}}" width="100px" height="100px">
                                                            </td>
                                                            @endif
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->tanggallahir}}</td>
                                                            <td>{{$item->umur}}</td>
                                                            <td>{{$item->alamat}},{{$item->kecamatan}},{{$item->kota}}</td>
                                                            <td>{{$item->telephone}}</td>
                                                            <td>
                                                                <a href="{{route('identity.edit',['id'=>$item->id])}}" class="edit"><i class="material-icons"
                                                                    data-toggle="tooltip" title="" data-original-title="Edit"></i></a>
                                                                <a href="{{route('delete',['id'=>$item->id])}}" class="delete"><i class="material-icons"
                                                                    data-toggle="tooltip" title="" data-original-title="Delete"></i></a>   
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                            </tbody>
                                    </table>
                            </div>
                            {{ $dataidentity->links() }}
                            <div class="card-footer">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('identity.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Tambah <b>Data</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                                         
                            <label>Nama</label>
                            <input type="text" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" id="nama" name="nama" placeholder="Nama"/>
                            @if($errors->has('nama'))
                                <small class="text-danger">{{$errors->first('nama')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                                     
                            <label>Username</label>
                            <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" name="username" placeholder="Username"/>
                            @if($errors->has('username'))
                                <small class="text-danger">{{$errors->first('username')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                                     
                            <label>Email</label>
                            <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Email"/>
                            @if($errors->has('email'))
                                <small class="text-danger">{{$errors->first('email')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                                         
                            <label>Password</label>
                            <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Password" />
                            @if($errors->has('password'))
                                <small class="text-danger">{{$errors->first('password')}}</small>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                            
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control {{$errors->has('tanggallahir') ? 'is-invalid' : ''}}" id="tanggallahir" name="tanggallahir"/>
                                    @if($errors->has('tanggallahir'))
                                        <small class="text-danger">{{$errors->first('tanggallahir')}}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                                             
                                        <label>Umur</label>
                                        <input type="text" class="form-control" name="umur" id="umur" placeholder="umur">
                                    </div>
                                <div class="form-group">
                                         
                                    <label>No. Telepon</label>
                                    <input type="number" class="form-control {{$errors->has('telephone') ? 'is-invalid' : ''}}" id="telephone" name="telephone" placeholder="No.Telepon"/>
                                    @if($errors->has('telephone'))
                                        <small class="text-danger">{{$errors->first('telephone')}}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                                             
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"></textarea>
                                </div>
                                <div class="form-group">
                                                             
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="kecamatan">
                                </div>
                                <div class="form-group">
                                                             
                                    <label>kota</label>
                                    <input type="text" class="form-control" name="kota" id="kota" placeholder="kota">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     
                                    <label for="exampleInputFile">
                                        Foto Identitas
                                    </label>
                                    <input type="file" class="form-control-file {{$errors->has('foto') ? 'is-invalid' : ''}}" id="foto" name="foto"/>
                                    @if($errors->has('foto'))
                                        <small class="text-danger">{{$errors->first('foto')}}</small>
                                    @endif
                                </div>
                                <div class="checkbox">
                                                         
                                    <label>
                                    <input type="checkbox" /> Verifikasi data
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <a class="btn btn-default btn-close" data-dismiss="modal" href="{{ route('identity.index') }}">Batal</a> --}}
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('javascript')
<script type="text/javascript">
   
        $("#selectAll").click(function(){
		if(this.checked){
			$(".pilih").prop("checked",true);
		} else{
			$(".pilih").prop("checked",false);
		} 
	});        
    </script>
    
@endsection