@extends('layout.master')

@section('content')

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
                @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{session('sukses')}}
                </div>
            @endif
                @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            @endif
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                            <img src="{{$siswa->getavatar()}}" width="100" class="img-circle" alt="Avatar">
                            <h3 class="name">{{$siswa->nama_depan}}</h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        {{$siswa->mapel->count()}} <span>Mapel Diambil</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        15 <span>Awards</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Data Diri</h4>
                                <ul class="list-unstyled list-justify">
                                <li>Jenis Kelamin<span>{{$siswa->jenis_kelamin}}</span></li>
                                <li>Agama<span>{{$siswa->agama}}</span></li>
                                <li>Alamat<span>{{$siswa->alamat}}</span></li>
                                </ul>
                            </div>
                        <div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            Tambah Nilai
                          </button>
                        <h4 class="heading">Nilai Mapel</h4>
                        <!-- TABBED CONTENT -->
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>KODE</th>
                                        <th>NAMA MAPEL</th>
                                        <th>SEMESTER</th>
                                        <th>NILAI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswa->mapel as $mapel)
                                    <tr>
                                        <td>{{$mapel->kode}}</td>
                                        <td>{{$mapel->nama}}</td>
                                        <td>{{$mapel->semster}}</td>
                                        <td>{{$mapel->pivot->nilai}}</td>
                                        
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Nilai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- Form --}}
        <form action="/siswa/{{$siswa->id}}/addnilai" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{-- SELECT --}}
            <div class="form-group">
                <label for="mapel">Mata Pelajaran</label>
                <select class="form-control" id="mapel" name="mapel">
                  @foreach($matapelajaran as $mp)
                <option value="{{$mp->id}}">{{$mp->nama}}</option>
                  @endforeach
                </select>
              </div>
            {{-- SELECT --}}
        <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
              <label for="exampleInputEmail1">Nilai</label>
        <input name="nilai" value="{{old('nilai')}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai">
                @if ($errors->has('nilai'))
                     <span class="help-block">{{$errors->first('nilai')}}</span>
                @endif
            </div>
            {{-- Form --}}
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>

@stop