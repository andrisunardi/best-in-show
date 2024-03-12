@section('title', trans('index.trash') . ' - ' . trans('index.contact'))
@section('icon', 'fas fa-dumpster')

<div>
    <div class="card">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} {{ trans('index.contact') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search.enum :key="'category'" :title="trans('validation.attributes.category')" :icon="'fas fa-list'"
                        :datas="$contactCategories" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'message'" :title="trans('validation.attributes.message')" :icon="'fas fa-message'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'first_name'" :title="trans('validation.attributes.first_name')" :icon="'fas fa-user'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'last_name'" :title="trans('validation.attributes.last_name')" :icon="'fas fa-user'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'email'" :title="trans('validation.attributes.email')" :icon="'fas fa-envelope'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'address'" :title="trans('validation.attributes.address')" :icon="'fas fa-home'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'city'" :title="trans('validation.attributes.city')" :icon="'fas fa-city'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'province'" :title="trans('validation.attributes.province')" :icon="'fas fa-globe'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'postal_code'" :title="trans('validation.attributes.postal_code')" :icon="'fas fa-envelopes-bulk'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'platform'" :title="trans('validation.attributes.platform')" :icon="'fas fa-list'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'phone_country'" :title="trans('validation.attributes.phone_country')" :icon="'fas fa-flag'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search :key="'phone'" :title="trans('validation.attributes.phone')" :icon="'fas fa-phone'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto">
                    <x-components::search.is-active />
                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    <x-components::form.reset :text="trans('index.reset_filter')" />
                </div>
            </div>
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-danger-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} {{ trans('index.trash') }} {{ trans('index.contact') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                    <x-components::link.back :href="route('cms.contact.index')" />
                </div>

                @can('Contact Restore')
                    @if ($contacts->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.restore-all :href="route('cms.contact.restore-all')" />
                        </div>
                    @endif
                @endcan

                @can('Contact Delete Permanent')
                    @if ($contacts->count())
                        <div class="col-12 col-sm-auto mb-3">
                            <x-components::link.delete-permanent-all :href="route('cms.contact.delete-permanent-all')" />
                        </div>
                    @endif
                @endcan
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th width="1%">{{ trans('index.category') }}</th>
                            <th width="1%">{{ trans('index.message') }}</th>
                            <th width="1%">{{ trans('index.attachment') }}</th>
                            <th>{{ trans('index.first_name') }}</th>
                            <th>{{ trans('index.last_name') }}</th>
                            <th width="1%">{{ trans('index.email') }}</th>
                            <th width="1%">{{ trans('index.address') }}</th>
                            <th width="1%">{{ trans('index.city') }}</th>
                            <th width="1%">{{ trans('index.province') }}</th>
                            <th width="1%">{{ trans('index.postal_code') }}</th>
                            <th width="1%">{{ trans('index.platform') }}</th>
                            <th width="1%">{{ trans('index.phone_country') }}</th>
                            <th width="1%">{{ trans('index.phone') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr wire:key="{{ $contact->id }}">
                                <td class="text-center">
                                    {{ ($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.contact.view', ['contact' => $contact->id])" :text="$contact->id" />
                                </td>
                                <td class="text-center">{{ $contact->category?->name }}</td>
                                <td class="text-wrap">{{ $contact->message }}</td>
                                <td class="text-wrap">
                                    @if ($contact->attachment)
                                        <x-components::link.external-link :href="$contact->assetAttachment()" :text="$contact->attachment"
                                            :target="'_blank'" :navigate="false" />
                                    @endif
                                </td>
                                <td class="text-wrap">{{ $contact->first_name }}</td>
                                <td class="text-wrap">{{ $contact->last_name }}</td>
                                <td>
                                    <x-components::link.email :value="$contact->email" />
                                </td>
                                <td class="text-wrap">{{ $contact->address }}</td>
                                <td class="text-wrap">{{ $contact->city }}</td>
                                <td class="text-wrap">{{ $contact->province }}</td>
                                <td class="text-wrap">{{ $contact->postal_code }}</td>
                                <td class="text-wrap">{{ $contact->platform }}</td>
                                <td class="text-wrap">{{ $contact->phone_country }}</td>
                                <td>
                                    <x-components::link.whatsapp :value="$contact->phone" />
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-{{ Utils::successDanger($contact->is_active) }}">
                                        {{ Utils::translate(Utils::yesNo($contact->is_active)) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-tools fa-fw"></span>
                                        {{ trans('index.action') }}
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('Contact Restore')
                                            <li>
                                                <x-components::link.restore :class="'dropdown-item'" :href="route('cms.contact.restore', [
                                                    'contact' => $contact->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Contact Delete Permanent')
                                            <li>
                                                <x-components::link.delete-permanent :class="'dropdown-item'"
                                                    :href="route('cms.contact.delete-permanent', [
                                                        'contact' => $contact->id,
                                                    ])" />
                                            </li>
                                        @endcan
                                    </ul>
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

            {{ $contacts->links('components::components.layouts.pagination') }}
        </div>

        <div class="card-footer bg-danger-subtle"></div>
    </div>
</div>
