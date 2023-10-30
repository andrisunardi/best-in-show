<aside id="sidebar"
    class="collapse collapse-horizontal {{ !$isMobile ? "show" : null }} col-sm-4 col-md-4 col-lg-3 col-xl-2 vh-100 p-0 m-0 overflow-auto">
    <ul class="list-group mt-5 pt-3">
        <li>
            @livewire('c-m-s.layouts.search-menu')
        </li>

        <li>
            <a draggable="false" wire:navigate
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ Route::is('cms.index') ? 'active' : null }}"
                href="{{ route('cms.index') }}">
                <span>
                    <span class="fas fa-home fa-fw me-1"></span>
                    <span>{{ trans('index.home') }}</span>
                </span>
            </a>
        </li>

        @foreach ($menus as $menu)
            @role($menu['roles'])
                @can([$menu['permissions']])
                    @if ($menu['subMenus'])
                        <li>
                            <a draggable="false"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ Route::is($menu['route']) || Route::is(Str::before($menu['route'], '.index') . '.*') ? 'active' : null }}"
                                href="#{{ Str::slug($menu['name']) }}-sidebar" data-bs-toggle="collapse">
                                <span>
                                    <span class="{{ $menu['icon'] }} fa-fw me-1"></span>
                                    <span>{{ Utils::translate($menu['name']) }}</span>
                                </span>
                                <span class="fas fa-caret-down"></span>
                            </a>

                            <ul class="list-group list-group-flush collapse
                                {{ Route::is($menu['route']) || Route::is(Str::before($menu['route'], '.index') . '.*') ? 'show' : null }}"
                                id="{{ Str::slug($menu['name']) }}-sidebar" data-bs-parent="#sidebar">
                                @foreach ($menu['subMenus'] as $subMenu)
                                    @role($subMenu['roles'])
                                        @can($subMenu['permissions'])
                                            @if ($subMenu['sidebar'])
                                                <li>
                                                    <a draggable="false"
                                                        class="list-group-item d-flex justify-content-between align-items-center
                                                    {{ Route::is($subMenu['route']) || Route::is(Str::before($subMenu['route'], '.index') . '.*') ? 'active' : null }}"
                                                        href="{{ route($subMenu['route']) }}" wire:navigate>
                                                        <span class="ms-4">
                                                            <span class="{{ $subMenu['icon'] }} fa-fw me-1"></span>
                                                            <span>{{ Utils::translate($subMenu['name']) }}</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endcan
                                    @endrole
                                @endforeach
                            </ul>
                        </li>
                    @else
                        @if ($menu['sidebar'])
                            <li>
                                <a draggable="false"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
                                    {{ Route::is($menu['route']) || Route::is(Str::before($menu['route'], '.index') . '.*') ? 'active' : null }}"
                                    href="{{ route($menu['route']) }}" wire:navigate>
                                    <span>
                                        <span class="{{ $menu['icon'] }} fa-fw me-1"></span>
                                        <span>{{ Utils::translate($menu['name']) }}</span>
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endif
                @endcan
            @endrole
        @endforeach

        <li>
            <a draggable="false"
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ Route::is('cms.profile.*') ? 'active' : null }}"
                href="#profile-sidebar" data-bs-toggle="collapse">
                <span>
                    <span class="fas fa-user-circle fa-fw me-1"></span>
                    <span>{{ trans('index.my_profile') }}</span>
                </span>
                <span class="fas fa-caret-down"></span>
            </a>

            <ul class="list-group list-group-flush collapse {{ Route::is('cms.profile.*') ? 'show' : null }}"
                id="profile-sidebar" data-bs-parent="#sidebar">
                <li>
                    <a draggable="false"
                        class="list-group-item d-flex justify-content-between align-items-center {{ Route::is('cms.profile.index') ? 'active' : null }}"
                        href="{{ route('cms.profile.index') }}" wire:navigate>
                        <span class="ms-4">
                            <span class="fas fa-user fa-fw me-1"></span>
                            <span>{{ trans('index.profile') }}</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a draggable="false"
                        class="list-group-item d-flex justify-content-between align-items-center {{ Route::is('cms.profile.activity-log') ? 'active' : null }}"
                        href="{{ route('cms.profile.activity-log') }}" wire:navigate>
                        <span class="ms-4">
                            <span class="fas fa-user-clock fa-fw me-1"></span>
                            <span>{{ trans('index.activity_log') }}</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a draggable="false"
                        class="list-group-item d-flex justify-content-between align-items-center {{ Route::is('cms.profile.edit-profile') ? 'active' : null }}"
                        href="{{ route('cms.profile.edit-profile') }}" wire:navigate>
                        <span class="ms-4">
                            <span class="fas fa-user-edit fa-fw me-1"></span>
                            <span>{{ trans('index.edit_profile') }}</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a draggable="false"
                        class="list-group-item d-flex justify-content-between align-items-center {{ Route::is('cms.profile.change-password') ? 'active' : null }}"
                        href="{{ route('cms.profile.change-password') }}" wire:navigate>
                        <span class="ms-4">
                            <span class="fas fa-user-lock fa-fw me-1"></span>
                            <span>{{ trans('index.change_password') }}</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a draggable="false" class="list-group-item d-flex justify-content-between align-items-center"
                        href="{{ route('cms.logout') }}" wire:navigate>
                        <span class="ms-4">
                            <span class="fas fa-sign-out-alt fa-fw me-1"></span>
                            <span>{{ trans('index.logout') }}</span>
                        </span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
