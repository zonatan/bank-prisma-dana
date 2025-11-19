@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Kelola Form PDF</h1>
        <button onclick="openUpload()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">+ Upload PDF</button>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">File</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($forms as $form)
                <tr>
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $form->title }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ $form->file_path }}" target="_blank" class="text-indigo-600 hover:underline">Lihat PDF</a>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.form.destroy', $form->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus PDF ini?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada PDF</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Upload -->
<div id="upload-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-6">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">
        <h3 class="text-xl font-bold mb-4">Upload PDF</h3>
        <form action="{{ route('admin.form.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Judul Form</label>
                <input type="text" name="title" class="w-full p-3 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">File PDF</label>
                <input type="file" name="pdf" accept=".pdf" class="w-full p-3 border rounded-lg" required>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeUpload()" class="px-4 py-2 border rounded-lg hover:bg-gray-100">Batal</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Upload</button>
            </div>
        </form>
    </div>
</div>

<script>
function openUpload() {
    document.getElementById('upload-modal').classList.remove('hidden');
}
function closeUpload() {
    document.getElementById('upload-modal').classList.add('hidden');
}
</script>
@endsection