@extends('layout.master')

@section('content')

<div class="main">
  <div class="main-content">
      <div class="container-fluid">
          <div class="row">
            <div class="panel-heading __web-inspector-hide-shortcut__">
              <h3 class="panel-title">Edit Data Siswa</h3>
            </div>
            <div class="panel-body">
              <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Depan</label>
                <input value="{{$siswa->nama_depan}}" name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Belakang</label>
                  <input value="{{$siswa->nama_depan}}" name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="custom-select">
                        <option value="Cowok" @if($siswa->jenis_kelamin == 'Cowok') selected @endif</option>Cowok</option>
                        <option value="Cewek" @if($siswa->jenis_kelamin == 'Cewek') selected @endif>Cewek</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Agama</label>
                <input value="{{$siswa->agama}}" name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
                  </div>
                 <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                 <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                  </div>
                  {{-- Forms --}}
                  
                    <button type="submit" class="btn btn-warning">Update</button>
            </form>
            </div>
          </div>
      </div>
  </div>
</div>

@stop
@section('content1')
       <h1>Edit Data Siswa</h1>
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
          @endif
        <div class="row">
            <div class="col-12">
            {{-- Form --}}
            <form action="/siswa/{{$siswa->id}}/update" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Depan</label>
                <input value="{{$siswa->nama_depan}}" name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Belakang</label>
                  <input value="{{$siswa->nama_depan}}" name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="custom-select">
                        <option value="Cowok" @if($siswa->jenis_kelamin == 'Cowok') selected @endif</option>Cowok</option>
                        <option value="Cewek" @if($siswa->jenis_kelamin == 'Cewek') selected @endif>Cewek</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Agama</label>
                <input value="{{$siswa->agama}}" name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
                  </div>
                 <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                 <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
                  </div>
                  {{-- Forms --}}
                  
                    <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection