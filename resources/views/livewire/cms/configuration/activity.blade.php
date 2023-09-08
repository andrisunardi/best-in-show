@section('title', trans('index.activity'))
@section('icon', 'fas fa-clock-rotate-left')

<main>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search.select :key="'log_name'" :title="trans('validation.attributes.log_name')" :icon="'fas fa-font'" :datas="$activityLogNames" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'description'" :title="trans('validation.attributes.description')" :icon="'fas fa-file-lines'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search.select :key="'event'" :title="trans('validation.attributes.event')" :icon="'fas fa-font'" :datas="$activityEvents" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search.select :key="'subject_type'" :title="trans('validation.attributes.subject_type')" :icon="'fas fa-list'" :datas="$activitySubjectTypes" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'subject_id'" :title="trans('validation.attributes.subject_id')" :icon="'fas fa-barcode'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search.select :key="'causer_type'" :title="trans('validation.attributes.causer_type')" :icon="'fas fa-list'" :datas="$activityCauserTypes" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'causer_id'" :title="trans('validation.attributes.causer_id')" :icon="'fas fa-barcode'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'properties'" :title="trans('validation.attributes.properties')" :icon="'fas fa-file-lines'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search :key="'batch_uuid'" :title="trans('validation.attributes.batch_uuid')" :icon="'fas fa-barcode'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-search.select :key="'user_id'" :title="trans('validation.attributes.user_id')" :icon="'fas fa-user'" :datas="$users" />
                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    <x-form.reset :text="trans('index.reset_filter')" />
                </div>
            </div>
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th>{{ trans('index.log_name') }}</th>
                            <th>{{ trans('index.description') }}</th>
                            <th>{{ trans('index.event') }}</th>
                            <th>{{ trans('index.subject') }}</th>
                            <th>{{ trans('index.causer') }}</th>
                            <th>{{ trans('index.properties') }}</th>
                            <th>{{ trans('index.batch_uuid') }}</th>
                            <th>{{ trans('index.created_at') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($activities as $activity)
                            <tr wire:key="{{ $activity->id }}">
                                <td class="text-center">
                                    {{ ($activities->currentPage() - 1) * $activities->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">{{ $activity->id }}</td>
                                <td class="text-center">{{ $activity->log_name }}</td>
                                <td class="text-wrap">{{ $activity->description }}</td>
                                <td class="text-center">{{ Str::translate($activity->event) }}</td>
                                <td>
                                    @if ($activity->subject_id)
                                        <div>{{ Str::after($activity->subject_type, 'App\Models\\') }}</div>
                                        <div>{{ trans('index.id') }} : {{ $activity->subject_id }}</div>
                                    @endif
                                </td>
                                <td>
                                    @if ($activity->causer)
                                        <x-link.relation :text="$activity->causer->name" :href="route('cms.configuration.user.view', [
                                            'user' => $activity->causer->id,
                                        ])" />
                                    @endif
                                </td>
                                <td class="text-wrap">
                                    <div class="row">
                                        <div class="col-6">
                                            @if (Arr::exists($activity->changes, ['old']))
                                                <h6>{{ trans('index.old') }}</h6>
                                                <pre><code>{{ json_encode($activity->changes['old'], JSON_PRETTY_PRINT) }}</code></pre>
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            @if (Arr::exists($activity->changes, ['attributes']))
                                                <h6>{{ trans('index.attributes') }}</h6>
                                                <pre><code>{{ json_encode($activity->changes['attributes'], JSON_PRETTY_PRINT) }}</code></pre>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $activity->batch_uuid }}</td>
                                <td>
                                    {{ $activity->created_at->isoFormat('LLLL') }}<br>
                                    ({{ $activity->created_at->diffForHumans() }})
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">
                                    {{ trans('index.no_data_available') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $activities->links('components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</main>
