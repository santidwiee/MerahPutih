@extends('layout.desaignlayout')
@section('title', 'Form Identity')

@section('content')
    
<!-- Main content -->
<section class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Rule</h5>
                                <ul>
                                    <li class="list-item">
                                        Lorem ipsum dolor sit amet
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <form role="form" action="{{route('identity.update',['id'=>$dataidentity->id])}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                    <div class="form-group">
                                         
                                        <label>Nama</label>
                                        <input type="text" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" id="nama" name="nama" placeholder="Nama" value="{{$dataidentity->nama}}"/>
                                        @if($errors->has('nama'))
                                            <small class="text-danger">{{$errors->first('nama')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                         
                                        <label>Username</label>
                                        <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" name="username" placeholder="Username" value="{{$dataidentity->username}}"/>
                                        @if($errors->has('username'))
                                            <small class="text-danger">{{$errors->first('username')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                         
                                        <label>Email</label>
                                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Email" value="{{$dataidentity->email}}"/>
                                        @if($errors->has('email'))
                                            <small class="text-danger">{{$errors->first('email')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                             
                                        <label>Password</label>
                                        <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Password" value="{{$dataidentity->password}}"/>
                                        @if($errors->has('password'))
                                            <small class="text-danger">{{$errors->first('password')}}</small>
                                        @endif
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                             
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" class="form-control {{$errors->has('tanggallahir') ? 'is-invalid' : ''}}" id="tanggallahir" name="tanggallahir" value="{{$dataidentity->tanggallahir}}"/>
                                                        @if($errors->has('tanggallahir'))
                                                            <small class="text-danger">{{$errors->first('tanggallahir')}}</small>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                             
                                                        <label>No. Telepon</label>
                                                        <input type="number" class="form-control {{$errors->has('telephone') ? 'is-invalid' : ''}}" id="telephone" name="telephone" placeholder="No.Telepon" value="{{$dataidentity->telephone}}"/>
                                                        @if($errors->has('telephone'))
                                                            <small class="text-danger">{{$errors->first('telephone')}}</small>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                                 
                                                        <label>Alamat</label>
                                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat">{{$dataidentity->alamat}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                                 
                                                        <label>Kecamatan</label>
                                                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="kecamatan" value="{{$dataidentity->kecamatan}}">
                                                    </div>
                                                    <div class="form-group">
                                                                 
                                                        <label>kota</label>
                                                        <input type="text" class="form-control" name="kota" id="kota" placeholder="kota" value="{{$dataidentity->kota}}">
                                                    </div>
                                                </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                         
                                                    <label for="exampleInputFile">
                                                        Foto Identitas
                                                    </label>
                                                    <input type="file" class="form-control-file {{$errors->has('foto') ? 'is-invalid' : ''}}" id="foto" name="foto" value="{{$dataidentity->foto}}"/>
                                                    @if($errors->has('foto'))
                                                        <small class="text-danger">{{$errors->first('foto')}}</small>
                                                    @endif
                                                </div>
                                                <div class="checkbox">
                                                             
                                                    <label>
                                                    <input type="checkbox" /> Verifikasi data
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button> 
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

@endsection