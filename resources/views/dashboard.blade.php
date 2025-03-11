<x-layouts.app title="Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        {{-- <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div> --}}

        <div class="flex items-center gap-2 p-4 bg-white shadow-lg rounded-lg">
            <input id="url" type="text" value="{{ url('user/' . Auth::user()->username) }}" readonly class="w-full p-2 border rounded-lg bg-gray-50 text-gray-700 focus:ring-indigo-500 focus:ring-opacity-50" />
            <button onclick="copyToClipboard()" id="copyButton" class="flex items-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                <span id="copyText">Copy</span>
            </button>
        </div>
    </div>

    @push('script_sidebar')
        <script>
            function copyToClipboard() {
                const urlInput = document.getElementById("url");
                urlInput.select();
                urlInput.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(urlInput.value);
                
                const copyButton = document.getElementById("copyButton");
                const copyText = document.getElementById("copyText");
                alert('Copied');
                copyText.textContent = "Copied!";
                setTimeout(() => copyText.textContent = "Copy", 2000);
            }
        </script>
    @endpush
</x-layouts.app>
