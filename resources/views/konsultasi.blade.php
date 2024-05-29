@extends('layouts.main')

@section('container')

@if($list_konsultasi->isNotEmpty())
<div class="row">
    <div class="col-md-6">
        <form action="dashboard/konsultasi">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Data Konsultasi" name="search" value="{{request('search')}}">
                <button class="btn btn-info" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class=center-table>
    <table class="table table-hover table-striped table-bordered border-black mx-auto">
        <caption style="caption-side: top; text-align: center; font-size: 1.5em; font-weight: bold;">
            Data Konsultasi
        </caption>
        <tr>
            <thead class = "table-info">
                <th width="40">ID Pasien</th>
                <th width="150">Nama Pasien</th>
                <th width="110">Nama Dokter</th>
                <th width="100">ID Ruangan</th>
                <th width="100">Tanggal</th>
                <th width="100">Jam</th>
                <th width="150">Catatan</th>
            </thead>
        </tr>

    @foreach ($list_konsultasi as $konsultasi)
    <tr>
        <td>{{$konsultasi->id_pasien}}</td>
        <td>{{$konsultasi->pasien->nama}}</td>
        <td>{{$konsultasi->dokter->nama}}</td>
        <td>{{$konsultasi->ruangan->id}}</td>
        <td>{{$konsultasi->tanggal_konsul}}</td>
        <td>{{$konsultasi->jam_konsul}}</td>
        <td>{{$konsultasi->catatan}}</td>
    </tr>
    @endforeach

    @else
        <p class="text-center fs-4">Konsultasi tidak ditemukan.</p>
        <div class="d-flex justify-content-center">
            <a class="link-info link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/konsultasi">Kembali</a></p>
        </div>
    @endif

@endsection
