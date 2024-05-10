<code
    class="text-sm sm:text-base inline-flex w-full text-left items-center space-x-4 bg-gray-800 text-white rounded-lg p-4 pl-6 relative">
    <span class="flex gap-4">
        <pre class="text-sm">{{ $code }}</pre>
    </span>
    <div class="absolute right-3 top-3 cursor-pointer" onclick="copyToClipboard({{$code}})">
        <svg class="shrink-0 size-6 transition text-gray-500 group-hover:text-white" xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path>
            <path
                d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z">
            </path>
        </svg>
    </div>
</code>

@push('scripts')
    <script>
        function copyToClipboard(code) {
            navigator.clipboard.writeText(JSON.stringify(code));
        }
    </script>
@endpush
