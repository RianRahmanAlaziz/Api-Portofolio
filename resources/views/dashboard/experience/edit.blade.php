@extends('dashboard.layouts.app')
@section('container')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ $title }}
        </h2>
    </div>
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">
        <div class="intro-y col-span-11 2xl:col-span-9">
            <form action="/dashboard/experience/{{ $experience->id }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <!-- BEGIN: Work Experience -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Work Experience
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Nama Perusahaan</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="title" name="title" type="text" class="form-control"
                                        placeholder="Nama Perusahaan" value="{{ old('title', $experience->title) }}">
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
                                            <div class="font-medium">Jabatan</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="jabatan" name="jabatan" type="text" class="form-control"
                                        placeholder="Jabatan" value="{{ old('jabatan', $experience->jabatan) }}">
                                    @error('jabatan')
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
                                            <div class="font-medium">Jenis Pekerjaan</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <select id="pekerjaan" name="pekerjaan" class="form-select">
                                        <option value="">Jenis Pekerjaan</option>
                                        <option value="Full Time"
                                            {{ old('pekerjaan', $experience->pekerjaan) == 'Full Time' ? 'selected' : '' }}>
                                            Full Time</option>
                                        <option value="Part Time"
                                            {{ old('pekerjaan', $experience->pekerjaan) == 'Part Time' ? 'selected' : '' }}>
                                            Part Time</option>
                                        <option value="Kontrak"
                                            {{ old('pekerjaan', $experience->pekerjaan) == 'Kontrak' ? 'selected' : '' }}>
                                            Kontrak</option>
                                        <option value="Magang"
                                            {{ old('pekerjaan', $experience->pekerjaan) == 'Magang' ? 'selected' : '' }}>
                                            Magang
                                        </option>
                                    </select>
                                    @error('pekerjaan')
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
                                        @if ($experience->tech)
                                            @foreach (json_decode($experience->tech) as $index => $tech)
                                                <option value="{{ $tech }}" selected>{{ $tech }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('tech')
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
                                            <div class="font-medium">Description</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <textarea name="desc" id="desc" rows="5" class="w-full form-control">{{ old('desc', $experience->desc) }}</textarea>
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
                                            <div class="font-medium">From</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="from" name="from" type="text" data-single-mode="true"
                                        class="datepicker form-control" value="{{ old('from', $experience->from) }}">
                                    @error('from')
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
                                            <div class="font-medium">To</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="to" name="to" type="text" data-single-mode="true"
                                        class="datepicker form-control" value="{{ old('to', $experience->to) }}">
                                    @error('to')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Work Experience -->

                <!-- END: Product Management -->
                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                    <a href="/dashboard/experience"
                        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">
                        Cancel
                    </a>
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

        function removeExistingImage(index, imageName) {
            const previewContainer = document.getElementById("preview-container0");
            const imagePreview = document.getElementById(`existing-preview-${index}`);
            if (imagePreview) {
                previewContainer.removeChild(imagePreview);
            }

            // Tambahkan gambar yang dihapus ke input hidden
            const deletedImagesInput = document.getElementById('deleted_images');

            // Pisahkan dengan koma atau tambahkan sebagai array (gunakan format array di HTML)
            let deletedImagesArray = deletedImagesInput.value ? deletedImagesInput.value.split(',') : [];
            deletedImagesArray.push(imageName); // Tambahkan gambar yang dihapus
            deletedImagesInput.value = deletedImagesArray.join(','); // Gabungkan kembali sebagai string
        }
        // thumdnail
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

        function removethumbnail() {
            const previewContainer = document.getElementById("preview-thumbnail");
            previewContainer.innerHTML = ""; // Hapus pratinjau file
            document.getElementById("thumbnail").value = ""; // Reset input file
        }
    </script>
@endpush
