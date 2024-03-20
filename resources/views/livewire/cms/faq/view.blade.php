@section('title', trans('index.view') . ' - ' . trans('index.faq'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $faq->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.faq') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.faq.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $faq->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.question') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $faq->question }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.question_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $faq->question_idn }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.answer') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <div class="text-pre-wrap">{!! $faq->answer !!}</div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.answer_idn') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <div class="text-pre-wrap">{!! $faq->answer_idn !!}</div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($faq->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($faq->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($faq->createdBy)
                        <x-components::link.user :data="$faq->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($faq->updatedBy)
                        <x-components::link.user :data="$faq->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($faq->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($faq->deletedBy)
                            <x-components::link.user :data="$faq->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($faq->created_at)
                        {{ $faq->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $faq->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($faq->updated_at)
                        {{ $faq->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $faq->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($faq->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($faq->deleted_at)
                            {{ $faq->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $faq->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                @if ($faq->trashed())
                    @can('Faq Restore')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.restore :href="route('cms.faq.restore', [
                                'faq' => $faq->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Faq Delete Permanent')
                        <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete-permanent :href="route('cms.faq.delete-permanent', [
                                'faq' => $faq->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Faq Active')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.active :href="route('cms.faq.active', [
                                'faq' => $faq->id,
                            ])" :value="$faq->is_active" />
                        </div>
                    @endcan

                    @can('Faq Clone')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.clone :href="route('cms.faq.clone', [
                                'faq' => $faq->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Faq Edit')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.edit :href="route('cms.faq.edit', [
                                'faq' => $faq->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Faq Delete')
                        <div class="col-6 col-sm-auto mt-3 mt-sm-0">
                            <x-components::link.delete :href="route('cms.faq.delete', [
                                'faq' => $faq->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $faq->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
