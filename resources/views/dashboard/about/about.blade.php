@extends('dashboard.layouts.app')
@section('container')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            About Page
        </h2>
    </div>
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">
        <div class="intro-y col-span-11 2xl:col-span-9">
            <form action="/dashboard/about/{{ $about->id }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <!-- BEGIN: Product Detail -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Skills and Expertise
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
                                <div class="w-32 mt-3 xl:mt-0 flex-1">
                                    <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $about->description) }}</textarea>
                                    @error('description')
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
                                            <div class="font-medium">Web Development</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <div class="form-check form-switch">
                                        <input id="web" name="web" class="form-check-input" type="checkbox"
                                            {{ old('web', $about->web ?? '') == 'Active' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="web">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">REST API
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <div class="form-check form-switch">
                                        <input id="api" name="api" class="form-check-input" type="checkbox"
                                            {{ old('api', $about->api ?? '') == 'Active' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="api">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">
                                                Machine Learning</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <div class="form-check form-switch">
                                        <input id="machine" name="machine" class="form-check-input" type="checkbox"
                                            {{ old('machine', $about->machine ?? '') == 'Active' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="machine">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Mobile Development</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <div class="form-check form-switch">
                                        <input id="mobile" name="mobile" class="form-check-input" type="checkbox"
                                            {{ old('mobile', $about->mobile ?? '') == 'Active' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="mobile">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Product Detail -->

                <!-- BEGIN: Product Detail -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Language & Framework
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Framework</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <select id="framework" name="framework[]" data-placeholder="Etalase"
                                        class="tom-select w-full" multiple>
                                        @if ($about->framework)
                                            @foreach (json_decode($about->framework) as $index => $framework)
                                                <option value="{{ $framework }}" selected>{{ $framework }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('framework')
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
                <!-- BEGIN: Product Detail -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Tools
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Tools</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <select id="tools" name="tools[]" data-placeholder="Etalase"
                                        class="tom-select w-full" multiple>
                                        @if ($about->tools)
                                            @foreach (json_decode($about->tools) as $index => $tools)
                                                <option value="{{ $tools }}" selected>{{ $tools }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('tools')
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


                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">

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
