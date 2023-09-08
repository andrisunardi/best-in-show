<footer>
    <div class="container-fluid py-3 bg-body-secondary">
        <div class="row">
            <div class="col-md-7 text-center text-md-start">
                <small class="text-body-secondary">
                    &copy; {{ trans('index.copyright') }}
                    {{ env('APP_YEAR') && env('APP_YEAR') != now()->year ? env('APP_YEAR') . ' - ' : null }}
                    {{ now()->year }} &reg;
                    <a draggable="false" href="{{ route('index') }}" target="_blank" class="text-body text-decoration-none">
                        <strong>{{ env('APP_NAME') }}</strong>&trade;
                    </a>
                    <br class="d-sm-none" />
                    {{ trans('index.all_rights_reserved') }}.
                </small>
            </div>
            <div class="col-md-5 text-center text-md-end">
                <small class="text-body-secondary">
                    {{ trans('index.created_and_designed_by') }}
                    <a draggable="false" href="https://www.diw.co.id" target="_blank">
                        <img draggable="false" src="{{ asset('images/icon-diw.co.id.png') }}" alt="Icon DIW.co.id"
                            title="{{ trans('index.created_and_designed_by') }} DIW.co.id">
                    </a>
                </small>
            </div>
        </div>
    </div>
</footer>
