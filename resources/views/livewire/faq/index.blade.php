@section('title', trans('index.faq'))
@section('icon', 'fas fa-question')

<main>
    <div class="container">
        @for ($i = 1; $i <= 6; $i++)
            <div class="row mt-5">
                <div class="col-12">
                    <a draggable="false" href="{{ asset("images/faq/$i.jpg") }}" download>
                        <img draggable="false" class="w-100" src="{{ asset("images/faq/$i.jpg") }}"
                            alt="@yield('name') {{ $i }} - {{ env('APP_TITLE') }}">
                    </a>
                </div>
            </div>
        @endfor
    </div>
</main>
