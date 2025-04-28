@extends('dashboard.layouts.app')
@section('container')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Dashboard
                        </h2>
                        <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                                class="w-4 h-4 mr-3"></i> Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="folder" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6 ">{{ $project }}</div>
                                    <div class="text-base text-slate-500 mt-1">Jumlah Poject</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="layers" class="report-box__icon text-pending"></i>
                                        <div class="ml-auto">

                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $category }}</div>
                                    <div class="text-base text-slate-500 mt-1">Jumlah Category</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>
    </div>
@endsection
