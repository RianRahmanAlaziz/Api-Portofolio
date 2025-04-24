@extends('dashboard.layouts.app')
@section('container')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Project
        </h2>
    </div>
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">
        <div class="intro-y col-span-11 2xl:col-span-9">
            <form action="/dashboard/project" method="post" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Product Information -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Project Information
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Project Name</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="title" name="title" type="text" class="form-control"
                                        placeholder="Project Name" value="{{ old('title') }}">

                                    <div class="form-help text-right">Maximum character 0/70</div>
                                    @error('title')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Slug</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="slug" name="slug" type="text" class="form-control"
                                        value="{{ old('slug') }}" readonly>
                                    <div class="form-help text-right">Maximum character 0/70</div>
                                    @error('slug')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Category</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <select id="category_id" name="category_id" class="form-select">
                                        <option value="">
                                            Pilih Category
                                        </option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Technologi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <select id="tech" name="tech[]" data-placeholder="Etalase"
                                        class="tom-select w-full" multiple>
                                    </select>
                                    @error('tech')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Product Information -->

                <!-- BEGIN: Uplaod Product -->
                <div class="intro-y box p-5  mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Upload Project
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-10">
                                <div class="form-label w-full xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Project Photos</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                    <div class="grid grid-cols-10 gap-5 pl-4 pr-5" id="preview-container0">
                                        <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                    </div>
                                    <div class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                                        <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span
                                            class="text-primary mr-1">Upload
                                            a file</span> or drag and drop
                                        <input id="input" type="file" name="gambar[]" multiple accept="image/*"
                                            class="w-full h-full top-0 left-0 absolute opacity-0"
                                            onchange="previewImage(event)" value="{{ old('gambar') }}">
                                    </div>
                                </div>
                                @error('gambar')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-10">
                                <div class="form-label w-full xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Thumbnail</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                    <div class="grid grid-cols-10 gap-5 pl-4 pr-5" id="preview-thumbnail">
                                        <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                    </div>
                                    <div class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                                        <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span
                                            class="text-primary mr-1">Upload
                                            a file</span> or drag and drop
                                        <input id="thumbnail" type="file" name="thumbnail" accept="image/*"
                                            class="w-full h-full top-0 left-0 absolute opacity-0"
                                            onchange="previewImagethumbnail(event)" value="{{ old('thumbnail') }}">
                                    </div>
                                </div>
                                @error('thumbnail')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END: Uplaod Product -->

                <!-- BEGIN: Product Detail -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Product Description
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
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
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <textarea name="desc" id="desc" rows="5" class="w-full form-control">{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Preview</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="preview" name="preview" type="text" class="form-control"
                                        placeholder="preview" value="{{ old('preview') }}">
                                    @error('url')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Code</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="code" name="code" type="text" class="form-control"
                                        placeholder="code" value="{{ old('code') }}">
                                    @error('url')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Product Detail -->
                <!-- BEGIN: Product Management -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Project Management
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Date</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="year" name="year" type="text" class="datepicker form-control"
                                        data-single-mode="true" value="{{ old('year') }}">
                                    @error('year')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Project Status</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3"> Jika statusnya aktif,
                                            produk dapat dicari. </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <div class="form-check form-switch">
                                        <input id="status" name="status" class="form-check-input" type="checkbox"
                                            {{ old('status') == 'on' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status">Active</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END: Product Management -->
                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                    <a href="/dashboard/product"
                        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">
                        Cancel
                    </a>
                    <button type="submit" name="action" value="save_add"
                        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Save & Add
                        New
                        Product</button>
                    <button type="submit" name="action" value="save"
                        class="btn py-3 btn-primary w-full md:w-52">Save</button>
                </div>
            </form>
        </div>

        <div class="intro-y col-span-2 hidden 2xl:block">
            <div class="pt-10 sticky top-0">

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        let timeout = null;

        title.addEventListener('input', function() {
            clearTimeout(timeout); // Hapus timeout sebelumnya

            if (title.value.trim() === '') {
                // Jika title kosong, hapus slug
                slug.value = '';
            } else {
                // Jika ada nilai pada title, lakukan fetch
                timeout = setTimeout(() => {
                    fetch('/dashboard/project/checkslug?title=' + encodeURIComponent(title
                            .value))
                        .then(response => response.json())
                        .then(data => slug.value = data.slug)
                        .catch(error => console.error('Error fetching slug:', error));
                }, 300); // Menunggu 300ms setelah pengguna berhenti mengetik sebelum mengirim permintaan
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons(); // Memuat ikon dengan atribut data-lucide
        });

        // Fungsi untuk menampilkan pratinjau gambar yang diunggah
        function previewImage(event) {
            const previewContainer = document.getElementById("preview-container0");


            const files = Array.from(event.target.files); // Ambil file yang diunggah
            console.log(files); // Log untuk melihat apakah file terdeteksi

            files.forEach((file, index) => {
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        console.log("File dibaca:", e.target
                            .result); // Log untuk memastikan file dibaca dengan benar

                        const imagePreview = document.createElement("div");
                        imagePreview.className =
                            "col-span-5 md:col-span-2 h-28 relative image-fit cursor-pointer zoom-in";
                        imagePreview.id = `preview-${index}`; // Berikan ID unik berdasarkan index

                        imagePreview.innerHTML = `
                        <img class="rounded-md" alt="Preview Image" src="${e.target.result}" style="width: 100%; height: auto;">
                        <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreview(${index})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    `;
                        previewContainer.appendChild(imagePreview);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Fungsi untuk menghapus pratinjau individual
        function removePreview(index) {
            const previewContainer = document.getElementById("preview-container0");
            const imagePreview = document.getElementById(`preview-${index}`);
            if (imagePreview) {
                previewContainer.removeChild(imagePreview); // Hapus pratinjau gambar berdasarkan index
            }
        }
        // Fungsi untuk menampilkan pratinjau file yang diunggah brosur
        function previewFile(event) {
            const previewContainer = document.getElementById("preview-brosur");
            previewContainer.innerHTML = ""; // Kosongkan container jika ada pratinjau sebelumnya

            const file = event.target.files[0]; // Hanya 1 file yang bisa diunggah
            const fileType = file.type;

            if (fileType === 'application/pdf' || fileType === 'application/msword' || fileType ===
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                const fileIcon = fileType === 'application/pdf' ? 'PDF' : 'DOC/DOCX';

                const filePreview = document.createElement("div");
                filePreview.className =
                    "file w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";

                filePreview.innerHTML = `
                   <div class="w-3/5 file__icon file__icon--file mx-auto">
                <div class="file__icon__file-name">${fileIcon}</div>
                </div>
                 
                <div title="Remove this file?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreviewbrosur()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <a href="" class="block font-medium mt-4 text-center truncate">${file.name}</a>
            `;
                previewContainer.appendChild(filePreview);
            }
        }

        function removePreviewbrosur() {
            const previewContainer = document.getElementById("preview-brosur");
            previewContainer.innerHTML = ""; // Hapus pratinjau file
            document.getElementById("brosur").value = ""; // Reset input file
        }

        // Fungsi untuk menampilkan pratinjau file yang diunggah Manual Book
        function previewFileBook(event) {
            const previewContainer = document.getElementById("preview-manualbook");
            previewContainer.innerHTML = ""; // Kosongkan container jika ada pratinjau sebelumnya

            const file = event.target.files[0]; // Hanya 1 file yang bisa diunggah
            const fileType = file.type;

            if (fileType === 'application/pdf' || fileType === 'application/msword' || fileType ===
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                const fileIcon = fileType === 'application/pdf' ? 'PDF' : 'DOC/DOCX';

                const filePreview = document.createElement("div");
                filePreview.className =
                    "file w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";

                filePreview.innerHTML = `
                   <div class="w-3/5 file__icon file__icon--file mx-auto">
                <div class="file__icon__file-name">${fileIcon}</div>
                </div>
                 
                <div title="Remove this file?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreviewmanualbook()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <a href="" class="block font-medium mt-4 text-center truncate">${file.name}</a>
            `;
                previewContainer.appendChild(filePreview);
            }
        }

        function removePreviewmanualbook() {
            const previewContainer = document.getElementById("preview-manualbook");
            previewContainer.innerHTML = ""; // Hapus pratinjau file
            document.getElementById("manualbook").value = ""; // Reset input file
        }

        // Fungsi untuk menampilkan pratinjau file yang diunggah Datasheet
        function previewFiledatasheet(event) {
            const previewContainer = document.getElementById("preview-datasheet");
            previewContainer.innerHTML = ""; // Kosongkan container jika ada pratinjau sebelumnya

            const file = event.target.files[0]; // Hanya 1 file yang bisa diunggah
            const fileType = file.type;

            if (fileType === 'application/pdf' || fileType === 'application/msword' || fileType ===
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                const fileIcon = fileType === 'application/pdf' ? 'PDF' : 'DOC/DOCX';

                const filePreview = document.createElement("div");
                filePreview.className =
                    "file w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";

                filePreview.innerHTML = `
                   <div class="w-3/5 file__icon file__icon--file mx-auto">
                <div class="file__icon__file-name">${fileIcon}</div>
                </div>
                 
                <div title="Remove this file?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreviewdatasheet()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <a href="" class="block font-medium mt-4 text-center truncate">${file.name}</a>
            `;
                previewContainer.appendChild(filePreview);
            }
        }

        function removePreviewdatasheet() {
            const previewContainer = document.getElementById("preview-datasheet");
            previewContainer.innerHTML = ""; // Hapus pratinjau file
            document.getElementById("datasheet").value = ""; // Reset input file
        }

        // Fungsi untuk menampilkan pratinjau gambar yang diunggah
        function previewImageset(event) {
            const previewContainer = document.getElementById("preview-set");
            const files = Array.from(event.target.files); // Ambil file yang diunggah
            console.log(files); // Log untuk melihat apakah file terdeteksi

            files.forEach((file, index) => {
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        console.log("File dibaca:", e.target
                            .result); // Log untuk memastikan file dibaca dengan benar

                        const imagePreview = document.createElement("div");
                        imagePreview.className =
                            "col-span-5 md:col-span-2 h-28 relative image-fit cursor-pointer zoom-in";
                        imagePreview.id = `previewset-${index}`; // Berikan ID unik berdasarkan index

                        imagePreview.innerHTML = `
                        <img class="rounded-md" alt="Preview Image" src="${e.target.result}" style="width: 100%; height: auto;">
                        <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreviewset(${index})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    `;
                        previewContainer.appendChild(imagePreview);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Fungsi untuk menghapus pratinjau individual
        function removePreviewset(index) {
            const previewContainer = document.getElementById("preview-set");
            const imagePreview = document.getElementById(`previewset-${index}`);
            if (imagePreview) {
                previewContainer.removeChild(imagePreview); // Hapus pratinjau gambar berdasarkan index
            }
        }

        function previewImagethumbnail(event) {
            const previewContainer1 = document.getElementById("preview-thumbnail");
            previewContainer1.innerHTML = ""; // Bersihkan pratinjau sebelumnya

            const file1 = event.target.files[0];
            if (file1) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imagePreview = document.createElement("div");
                    imagePreview.className = "w-40 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";

                    imagePreview.innerHTML = `<img class="rounded-md" alt="Preview Image" src="${e.target.result}">
        <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreviewthumbnail()">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
        </div>`;
                    previewContainer1.appendChild(imagePreview);
                };
                reader.readAsDataURL(file1);
            }
        }
        // Fungsi untuk menghapus pratinjau
        function removePreviewthumbnail() {
            const previewContainer1 = document.getElementById("preview-thumbnail");
            previewContainer1.innerHTML = ""; // Hapus pratinjau gambar

            // Menghapus elemen input file dan menambahkannya kembali
            const fileInput = document.getElementById("thumbnail");
            fileInput.value = ""; // Jika id input file adalah "file"
            const newFileInput = fileInput.cloneNode(true);
            fileInput.parentNode.replaceChild(newFileInput, fileInput);

            // Tambahkan event listener ke elemen baru
            newFileInput.addEventListener("change", previewImage);
        }
    </script>
@endpush
