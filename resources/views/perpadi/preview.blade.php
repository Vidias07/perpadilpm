<x-app-layout>
    <style>
        .pdf-preview {
            width: 100%;
            height: 100vh;
            border: 1px solid #ccc;
        }

        .back-btn {
            margin-top: 10px;
        }
    </style>

    <div class="back-btn mt-4 mb-5">
        <a href="javascript:history.back()"
            class="flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>

            <span class="ml-2">Kembali</span>
        </a>
    </div>
    <div class="pdf-preview">
        <embed src="{{ $pdfPath }}" type="application/pdf" width="100%" height="100%">
    </div>

</x-app-layout>
