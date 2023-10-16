@section('title', trans('index.view') . ' - ' . trans('index.setting'))
@section('icon', 'fas fa-eye')

<main>
    <div class="card mb-3">
        <div class="card-header {{ $setting->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.setting') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-link.back :href="route('cms.configuration.setting.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $setting->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.key') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $setting->key }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.value') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $setting->value !!}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Str::successDanger($setting->is_active) }}">
                        {{ Str::translate(Str::yesNo($setting->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($setting->createdBy)
                        <x-link.user :data="$setting->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($setting->updatedBy)
                        <x-link.user :data="$setting->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($setting->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($setting->deletedBy)
                            <x-link.user :data="$setting->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($setting->created_at)
                        {{ $setting->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $setting->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($setting->updated_at)
                        {{ $setting->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $setting->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($setting->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($setting->deleted_at)
                            {{ $setting->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $setting->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                @if ($setting->trashed())
                    @can('Setting Restore')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-link.restore :href="route('cms.configuration.setting.restore', [
                                'setting' => $setting->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Setting Delete Permanent')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-link.delete-permanent :href="route('cms.configuration.setting.delete-permanent', [
                                'setting' => $setting->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Setting Active')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-link.active :href="route('cms.configuration.setting.active', [
                                'setting' => $setting->id,
                            ])" :value="$setting->is_active" />
                        </div>
                    @endcan

                    @can('Setting Clone')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-link.clone :href="route('cms.configuration.setting.clone', [
                                'setting' => $setting->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Setting Edit')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-link.edit :href="route('cms.configuration.setting.edit', [
                                'setting' => $setting->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Setting Delete')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-link.delete :href="route('cms.configuration.setting.delete', [
                                'setting' => $setting->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $setting->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</main>
