@extends('layouts.main')

@section('container')

<article>
    <h2>{{$infodokter->nama}}</h2>
    <h5>Spesialis : {{$infodokter->spesialis}}</h5>
    <p>No. Telepon : {{$infodokter->no_telepon}}
        <br>
    Email : {{$infodokter->email}}</p>
</article>

<a class="link-info link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/dokter">Kembali</a>
@endsection
