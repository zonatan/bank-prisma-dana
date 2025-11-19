@extends('layouts.app')
@section('title', 'Chatbot')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
    <h2 class="text-2xl font-bold mb-4">{{ __('Chat dengan Kami') }}</h2>

    <div id="chat-box" class="h-96 overflow-y-auto mb-6 p-4 border rounded-lg bg-gray-50 dark:bg-gray-900"></div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        @foreach($questions as $q)
            <button onclick="ask({{ $q->id }}, `{{ addslashes($q->question) }}`)"
                    class="btn-question p-3 text-left rounded-lg bg-indigo-100 dark:bg-indigo-900 hover:bg-indigo-200 dark:hover:bg-indigo-800 transition">
                {{ $q->question }}
            </button>
        @endforeach
    </div>

    @if(session('user'))
        <a href="{{ route('forms.index') }}" class="mt-4 inline-block text-indigo-600 hover:underline">
            Download Form Pencairan Dana
        </a>
    @endif
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script>
let lastClick = 0;
function ask(id, question) {
    const now = Date.now();
    if (now - lastClick < 3000) {
        Swal.fire('Tunggu', 'Silakan tunggu 3 detik', 'info');
        return;
    }
    lastClick = now;

    const chatBox = document.getElementById('chat-box');
    chatBox.innerHTML += `<div class="text-right mb-3"><span class="inline-block bg-indigo-600 text-white p-3 rounded-lg max-w-xs">${question}</span></div>`;

    const typing = document.createElement('div');
    typing.innerHTML = `<span class="inline-block bg-gray-300 dark:bg-gray-700 p-3 rounded-lg">Bot mengetik...</span>`;
    chatBox.appendChild(typing);
    chatBox.scrollTop = chatBox.scrollHeight;

    fetch("{{ route('chat.send') }}", {
        method: "POST",
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({ qa_id: id })
    })
    .then(r => r.json())
    .then(d => {
        typing.remove();
        const div = document.createElement('div');
        div.innerHTML = `<span class="inline-block bg-gray-200 dark:bg-gray-700 p-3 rounded-lg max-w-md" id="tw-${id}"></span>`;
        chatBox.appendChild(div);
        new Typewriter(`#tw-${id}`, { strings: [d.answer], autoStart: true, delay: 30 });
        chatBox.scrollTop = chatBox.scrollHeight;
    })
    .catch(() => {
        typing.remove();
        Swal.fire('Error', 'Gagal menghubungi server', 'error');
    });
}
</script>
@endpush