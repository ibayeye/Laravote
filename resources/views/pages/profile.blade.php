@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-4 py-6 text-gray-900">
            <h2 class="text-2xl font-bold mb-4 text-center">Your Profile</h2> <!-- Centered heading -->
            <div class="flex justify-center mb-4">
                <div class="rounded-full overflow-hidden border-4 border-gray-200">
                    <img src="{{ asset('images/sofi.png') }}" alt="Profile Image" class="w-32 h-32 object-cover">
                </div>
            </div>
            <div class="mb-4">
                <div class="text-sm font-medium text-gray-700">Nama</div>
                <div class="mt-1 block w-full rounded-md sm:text-sm bg-gray-100 px-3 py-2">Shofi Siti Fatimah</div>
            </div>
            <div class="mb-4">
                <div class="text-sm font-medium text-gray-700">NPM</div>
                <div class="mt-1 block w-full rounded-md sm:text-sm bg-gray-100 px-3 py-2">21552011366</div>
            </div>
        </div>
    </div>
</div>
@endsection
