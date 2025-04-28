@extends('dashboard.layouts.app')
@section('container')
    <form action="/dashboard/home/{{ $home->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: aboutus Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Home Page
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div
                                    class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                    <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>Home Page
                                </div>
                                <div class="mt-5">
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Title</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            <input id="title" name="title" type="text" class="form-control"
                                                value="{{ old('title', $home->title) }}" placeholder="Title">
                                            @error('title')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-help text-right">Maximum character 0/70</div>

                                        </div>
                                    </div>

                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Description</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-32 mt-3 xl:mt-0 flex-1">
                                            <textarea name="description" id="description" rows="5" class="editor">{{ old('description', $home->description) }}</textarea>
                                            @error('description')
                                                <div class="text-danger form-help text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="intro-y flex justify-center flex-col md:flex-row gap-2 mt-5">

                            <button type="submit" name="action" value="save"
                                class="btn py-3 btn-primary w-full md:w-52">Save</button>
                        </div>
                    </div>
                    <!-- END: contact Report -->
                </div>
            </div>
            <div class="col-span-12 2xl:col-span-3">
                <div class="2xl:border-l -mb-10 pb-10">
                    <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                        <!-- BEGIN: about us -->
                        <div class="intro-x col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                            <div class="intro-x flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">

                                </h2>
                            </div>
                            <div class="mt-5">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="col-span-12 sm:col-span-12">
                                        <label for="gambar" class="form-label">Upload Image</label>
                                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                            <div class="flex flex-wrap px-4 cursor-pointer" id="preview-container3">
                                                <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                @if ($home->gambar)
                                                    <div
                                                        class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                        <img class="rounded-md" alt="Preview Image"
                                                            src="/assets/images/{{ $home->gambar }}">
                                                        <div title="Remove this image?"
                                                            class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                            onclick="removePreview()">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <line x1="18" y1="6" x2="6"
                                                                    y2="18">
                                                                </line>
                                                                <line x1="6" y1="6" x2="18"
                                                                    y2="18">
                                                                </line>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="px-4 pb-4 flex items-center relative cursor-pointer">
                                                <i data-lucide="image" class="w-4 h-4 mr-2 cursor-pointer"></i>
                                                <span class="text-primary mr-1 cursor-pointer">Upload a file</span>
                                                or drag and
                                                drop
                                                <input id="input" name="gambar" type="file" accept="image/*"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                    onchange="previewImage(event)" value="{{ old('gambar') }}">
                                            </div>
                                        </div>
                                        @error('gambar')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="col-span-12 sm:col-span-12">
                                        <label for="gambar" class="form-label">Upload CV</label>
                                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                            <div class="flex flex-wrap px-4 cursor-pointer" id="preview-pdf">
                                                <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                                @if ($home->cv)
                                                    <div
                                                        class="file w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                        <div class="w-3/5 file__icon file__icon--file mx-auto">
                                                            <div class="file__icon__file-name">PDF</div>
                                                        </div>
                                                        <div title="Remove this image?"
                                                            class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                            onclick="removePreviewVideo()">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <line x1="18" y1="6" x2="6"
                                                                    y2="18">
                                                                </line>
                                                                <line x1="6" y1="6" x2="18"
                                                                    y2="18">
                                                                </line>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="px-4 pb-4 flex items-center relative cursor-pointer">
                                                <i data-lucide="image" class="w-4 h-4 mr-2 cursor-pointer"></i>
                                                <span class="text-primary mr-1 cursor-pointer">Upload a file</span>
                                                or drag and
                                                drop
                                                <input id="input" name="cv" type="file"
                                                    accept=".pdf,.doc,.docx"
                                                    class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                                    onchange="previewVideo(event)" value="{{ old('cv') }}">
                                            </div>
                                        </div>
                                        @error('gambar')
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- END: about us -->

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons(); // Ini akan memuat ikon dengan atribut data-lucide
        });

        function previewImage(event) {
            const previewContainer1 = document.getElementById("preview-container3");
            previewContainer1.innerHTML = ""; // Bersihkan pratinjau sebelumnya

            const file1 = event.target.files[0];
            if (file1) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imagePreview = document.createElement("div");
                    imagePreview.className = "w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";

                    imagePreview.innerHTML = `
        <img class="rounded-md" alt="Preview Image" src="${e.target.result}">
        <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreview()">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
        </div>
    `;
                    previewContainer1.appendChild(imagePreview);
                };

                reader.readAsDataURL(file1);
            }
        }

        // Fungsi untuk menghapus pratinjau
        function removePreview() {
            const previewContainer1 = document.getElementById("preview-container3");
            previewContainer1.innerHTML = ""; // Hapus pratinjau gambar

            // Menghapus elemen input file dan menambahkannya kembali
            const fileInput = document.getElementById("file");
            fileInput.value = ""; // Jika id input file adalah "file"
            const newFileInput = fileInput.cloneNode(true);
            fileInput.parentNode.replaceChild(newFileInput, fileInput);

            // Tambahkan event listener ke elemen baru
            newFileInput.addEventListener("change", previewImage);
        }

        function previewVideo(event) {
            const previewContainer = document.getElementById("preview-pdf");
            previewContainer.innerHTML = ""; // Bersihkan pratinjau sebelumnya

            const file1 = event.target.files[0];
            if (file1) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imagePreview = document.createElement("div");
                    imagePreview.className = "file w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";

                    imagePreview.innerHTML = `
                    <div class="w-3/5 file__icon file__icon--file mx-auto">
                        <div class="file__icon__file-name">PDF</div>
                    </div>
                    <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreviewVideo()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    </div>`;
                    previewContainer.appendChild(imagePreview);
                };

                reader.readAsDataURL(file1);
            }
        }

        // Fungsi untuk menghapus pratinjau
        function removePreviewVideo() {
            const previewContainer = document.getElementById("preview-pdf");
            previewContainer.innerHTML = ""; // Hapus pratinjau gambar

            // Menghapus elemen input file dan menambahkannya kembali
            const fileInput = document.getElementById("file");
            fileInput.value = ""; // Jika id input file adalah "file"
            const newFileInput = fileInput.cloneNode(true);
            fileInput.parentNode.replaceChild(newFileInput, fileInput);

            // Tambahkan event listener ke elemen baru
            newFileInput.addEventListener("change", previewImage);
        }
    </script>
@endpush
