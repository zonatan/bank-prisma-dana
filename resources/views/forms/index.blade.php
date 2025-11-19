<h1 class="text-2xl font-bold mb-4">Form Pencairan Dana</h1>
@foreach($forms as $form)
    <div class="p-4 border rounded mb-2">
        <p>{{ $form->title }}</p>
        <a href="{{ route('forms.download', $form->id) }}" class="text-blue-600">Download PDF</a>
    </div>
@endforeach