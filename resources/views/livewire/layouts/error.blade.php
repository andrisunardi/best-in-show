<main>
    <div class="container d-flex justify-content-center align-items-center text-center vh-100">
        <div class="p-5 mx-auto flex-column">
            <h1>@yield('code')</h1>
            <h3>@yield('message')</h3>
            <p class="lead">@yield('description')</p>
            <div class="mt-4">
                <a draggable="false" class="btn btn-secondary"
                    href="{{ url()->previous() == url()->current() ? route('cms.index') : url()->previous() }}"
                    wire:navigate>
                    <span class="fas fa-arrow-left fa-fw"></span>
                    <span class="fw-bold">Back To Previous Page</span>
                </a>
            </div>
        </div>
    </div>
</main>
