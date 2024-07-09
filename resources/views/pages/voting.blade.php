@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold mb-4">Hasil Voting Terbanyak</h2>

    <div class="mb-8">
        <h3 class="text-2xl font-semibold mb-2">Capres & Cawapres</h3>
        @if($topCapres)
        <div class="bg-gray-800 p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold">No Urut {{ $topCapres->number }}</h2>
            <img src="{{ asset('storage/' . $topCapres->image) }}" alt="{{ $topCapres->name }}" class="w-full h-64 object-fill rounded-lg">
            <h3 class="text-xl font-semibold">{{ $topCapres->name }}</h3>
            <p class="mt-2">{{ $topCapres->description }}</p>
            <p class="mt-2 font-bold">Votes: {{ $topCapres->votes_count }}</p>
        </div>
        @else
        <p>Tidak ada data.</p>
        @endif
    </div>

    <div class="mb-8">
        <h3 class="text-2xl font-semibold mb-2">Gubernur Jawa Barat</h3>
        @if($topGubernur)
        <div class="bg-gray-800 p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold">No Urut {{ $topGubernur->number }}</h2>
            <img src="{{ asset('storage/' . $topGubernur->image) }}" alt="{{ $topGubernur->name }}" class="w-full h-64 object-fill rounded-lg">
            <h3 class="text-xl font-semibold">{{ $topGubernur->name }}</h3>
            <p class="mt-2">{{ $topGubernur->description }}</p>
            <p class="mt-2 font-bold">Votes: {{ $topGubernur->votes_count }}</p>
        </div>
        @else
        <p>Tidak ada data.</p>
        @endif
    </div>

    <div class="mb-8">
        <h3 class="text-2xl font-semibold mb-2">Ketua Organisasi</h3>
        @if($topKetuaOrganisasi)
        <div class="bg-gray-800 p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold">No Urut {{ $topKetuaOrganisasi->number }}</h2>
            <img src="{{ asset('storage/' . $topKetuaOrganisasi->image) }}" alt="{{ $topKetuaOrganisasi->name }}" class="w-full h-64 object-fill rounded-lg">
            <h3 class="text-xl font-semibold">{{ $topKetuaOrganisasi->name }}</h3>
            <p class="mt-2">{{ $topKetuaOrganisasi->description }}</p>
            <p class="mt-2 font-bold">Votes: {{ $topKetuaOrganisasi->votes_count }}</p>
        </div>
        @else
        <p>Tidak ada data.</p>
        @endif
    </div>
</div>
@endsection
