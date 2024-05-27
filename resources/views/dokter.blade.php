@extends('layouts.main')

@section('container')
    @foreach ($list_dokter as $dokter)
    <article>
        <h2>{{$dokter->nama}}</h2>
        <h5>Spesialis : {{$dokter->spesialis}}</h5>
        <a class="link-info link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/dokter/{{$dokter->slug}}">Lihat Profil >></a>
    </article>
    @endforeach
@endsection
