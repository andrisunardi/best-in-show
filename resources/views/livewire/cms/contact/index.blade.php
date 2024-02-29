@section('title', trans('index.contact'))
@section('icon', 'fas fa-phone')

<div>
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'name'" :title="trans('validation.attributes.name')" :icon="'fas fa-user'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'company'" :title="trans('validation.attributes.company')" :icon="'fas fa-building'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'email'" :title="trans('validation.attributes.email')" :icon="'fas fa-envelope'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'phone'" :title="trans('validation.attributes.phone')" :icon="'fas fa-phone'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'subject'" :title="trans('validation.attributes.subject')" :icon="'fas fa-pencil'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <x-components::search :key="'message'" :title="trans('validation.attributes.message')" :icon="'fas fa-message'" />
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
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
            <div class="row">
                @can('Contact Add')
                    <div class="col-6 col-sm-auto mb-3">
                        <x-components::link.add :href="route('cms.contact.add')" />
                    </div>
                @endcan

                @can('Contact Trash')
                    <div class="col-6 col-sm-auto mb-3">
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
                            <th>{{ trans('index.name') }}</th>
                            <th>{{ trans('index.company') }}</th>
                            <th>{{ trans('index.email') }}</th>
                            <th>{{ trans('index.phone') }}</th>
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
                                <td class="text-wrap">{{ $contact->name }}</td>
                                <td class="text-wrap">{{ $contact->company }}</td>
                                <td>
                                    <x-components::link.email :value="$contact->email" />
                                </td>
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
                                        @can('Contact View')
                                            <li>
                                                <x-components::link.view :class="'dropdown-item'" :href="route('cms.contact.view', [
                                                    'contact' => $contact->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Contact Clone')
                                            <li>
                                                <x-components::link.clone :class="'dropdown-item'" :href="route('cms.contact.clone', [
                                                    'contact' => $contact->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Contact Edit')
                                            <li>
                                                <x-components::link.edit :class="'dropdown-item'" :href="route('cms.contact.edit', [
                                                    'contact' => $contact->id,
                                                ])" />
                                            </li>
                                        @endcan
                                        @can('Contact Active')
                                            <li>
                                                <x-components::link.active :class="'dropdown-item'" :href="route('cms.contact.active', [
                                                    'contact' => $contact->id,
                                                ])" :value="$contact->is_active" />
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
