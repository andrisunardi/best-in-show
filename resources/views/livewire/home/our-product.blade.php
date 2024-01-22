@section('title', trans('index.home'))
@section('icon', 'fas fa-home')

<main>
    <h1 class="text-5xl font-bold text-blue-600">
        Hello world!
    </h1>
</main>

@include('livewire.home.our-product')

@livewire('home.our-product')

