@section('title', trans('index.contact'))
@section('icon', 'fas fa-phone')

<div>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
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

        <div class="card-footer bg-primary-subtle"></div>
    </div>

    <div class="card my-3">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                @can('Contact Trash')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.trash :href="route('cms.contact.trash')" />
                    </div>
                @endcan
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th width="1%">{{ trans('index.category') }}</th>
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
                            <th width="1%">{{ trans('index.created_at') }}</th>
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
                                    <x-components::link :href="route('cms.contact.view', [
                                        'contact' => $contact->id,
                                    ])" :text="$contact->id" />
                                </td>
                                <td class="text-center">{{ $contact->category?->name }}</td>
                                <td>
                                    @if ($contact->checkAttachment())
                                        <x-components::link.external-link :href="$contact->assetAttachment()" :text="trans('index.attachment')"
                                            :target="'_blank'" :navigate="false" />
                                    @endif
                                </td>
                                <td>{{ $contact->first_name }}</td>
                                <td>{{ $contact->last_name }}</td>
                                <td><x-components::link.email :value="$contact->email" /></td>
                                <td>{{ $contact->address }}</td>
                                <td>{{ $contact->city }}</td>
                                <td>{{ $contact->province }}</td>
                                <td>{{ $contact->postal_code }}</td>
                                <td>{{ $contact->platform }}</td>
                                <td>{{ $contact->phone_country }}</td>
                                <td><x-components::link.whatsapp :value="$contact->phone" /></td>
                                <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
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
                                        @can('Contact View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.contact.view', [
                                                    'contact' => $contact->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Contact Active')
                                            <li>
                                                <x-components::link.active :class="'dropdown-item'" :href="route('cms.contact.active', [
                                                    'contact' => $contact->id,
                                                ])"
                                                    :value="$contact->is_active" />
                                            </li>
                                        @endcan
                                        @can('Contact Delete')
                                            <li>
                                                <x-components::link.delete :class="'dropdown-item'" :href="route('cms.contact.delete', [
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

        <div class="card-footer bg-primary-subtle"></div>
    </div>
</div>
