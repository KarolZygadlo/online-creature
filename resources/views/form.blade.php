@extends('layouts.base')

@section("content")
    <div class="w-full py-10" x-data="{ pdfFile: null }">
        <form hx-post="/process" hx-target="#code" hx-indicator="#spinner">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">OCR AI tool</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive
                        mail.</p>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">PDF
                                file</label>
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload"
                                               class="relative cursor-pointer rounded-md bg-white font-semibold text-sky-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-sky-700 focus-within:ring-offset-2 hover:text-sky-600">
                                            <span>Upload a PDF file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only"
                                                   accept="application/pdf"
                                                   x-on:change="pdfFile = $event.target.files[0]">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PDF up to 10MB</p>
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="country"
                                   class="block text-sm font-medium leading-6 text-gray-900">Document type</label>
                            <div class="mt-2">
                                <select id="country" name="country" autocomplete="country-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>Invoice</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($code ?? false)
                <x-code  :code="$code"/>
            @endif
            <div id="code">

            </div>

            <div id="pdf-preview-container" class="mt-4" x-show="pdfFile">
                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">PDF preview</label>
                <embed class="mt-2" :src="URL.createObjectURL(pdfFile)" type="application/pdf" width="100%"
                       height="600px">
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit"
                        class="flex rounded-md bg-sky-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                    Process
                    <img id="spinner" class="my-indicator ml-3" src="{{ asset("img/bars.svg") }}" alt="bars"/>
                </button>
            </div>
        </form>
    </div>
@endsection
