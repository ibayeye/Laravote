@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold mb-4">Tambah Paslon</h2>

    @if(session('success'))
    <div class="bg-green-500 text-black p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('tambah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-white">Nama</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md text-gray-900" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-white">Deskripsi</label>
            <textarea name="description" id="description" class="mt-1 block w-full rounded-md text-gray-900" required></textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-white">Gambar</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md text-gray-900" required>
            <img id="imagePreview" src="#" alt="Preview Gambar" class="mt-4 w-full max-w-md h-auto object-cover rounded-lg" style="display: none;">
        </div>

        <div class="mb-4">
            <label for="number" class="block text-sm font-medium text-white">Nomor Urut</label>
            <input type="number" name="number" id="number" class="mt-1 block w-full rounded-md text-gray-900" required>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-white">Kategori</label>
            <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-900" required>
                <option value="capres">Presiden</option>
                <option value="gubernur">Gubernur</option>
                <option value="ketua_organisasi">Ketua Organisasi</option>
            </select>
        </div>

        <div>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Tambah Paslon
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(){
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').style.display = 'block';
                document.getElementById('imagePreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
