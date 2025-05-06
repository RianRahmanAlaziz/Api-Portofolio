<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->

    <!-- BEGIN: Notifications -->
    <div class="intro-x dropdown mr-auto sm:mr-6">

    </div>
    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
            aria-expanded="false" data-tw-toggle="dropdown">
            <img alt="Midone - HTML Admin Template" src="/assets/images/profile-5.jpg">
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Full Stack Developer</div>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>

                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item hover:bg-white/5 w-full text-left" type="submit">
                            <i data-lucide="log-out" class="w-4 h-4 mr-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
