@section('title', trans('index.home'))

<div>
    <div class="container d-flex justify-content-center align-items-center text-center vh-100">
        <div class="p-5 mx-auto flex-column">
            <h1>{{ env('APP_NAME') }}</h1>
            <p class="lead">{{ env('APP_DESCRIPTION') }}</p>
            <div class="mt-4">
                <a draggable="false" class="btn btn-outline-danger" href="https://www.laravel.com" target="_blank">
                    <span class="fab fa-laravel fa-fw"></span>
                    <span class="fw-bold">Laravel</span>
                </a>
            </div>
        </div>
    </div>
</div>
