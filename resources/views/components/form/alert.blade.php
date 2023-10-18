@if ($errors->any())
    {{ $this->alert('error', trans('index.form_validation'), ['html' => implode('', $errors->all(':message<br>'))]) }}
@endif
