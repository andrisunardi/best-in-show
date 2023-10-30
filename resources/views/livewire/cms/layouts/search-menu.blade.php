<div class="input-group">
    <select class="form-select select2" wire:model="search_menu" id="search_menu">
        <option value="cms.index" {{ Route::is('cms.index') ? 'selected' : null }}>
            {{ trans('index.home') }}
        </option>

        @foreach ($menus as $menu)
            @role($menu['roles'])
                @can($menu['permissions'])
                    @if ($menu['subMenus'])
                        <optgroup label="{{ Utils::translate($menu['name']) }}">
                            @foreach ($menu['subMenus'] as $subMenu)
                                @role($subMenu['roles'])
                                    @can($subMenu['permissions'])
                                        <option value="{{ $subMenu['route'] }}"
                                            {{ Route::is($subMenu['route']) || Route::is(Str::before($subMenu['route'], '.index') . '.*') ? 'selected' : null }}>
                                            {{ Utils::translate($subMenu['name']) }}
                                        </option>
                                    @endcan
                                @endrole
                            @endforeach
                        </optgroup>
                    @else
                        <option value="{{ $menu['route'] }}"
                            {{ Route::is($menu['route']) || Route::is(Str::before($menu['route'], '.index') . '.*') ? 'selected' : null }}>
                            {{ Utils::translate($menu['name']) }}
                        </option>
                    @endif
                @endcan
            @endrole
        @endforeach

        <optgroup label="{{ trans('index.my_profile') }}">
            <option value="cms.profile.index" {{ Route::is('cms.profile.index') ? 'selected' : null }}>
                {{ trans('index.profile') }}
            </option>
            <option value="cms.profile.activity-log" {{ Route::is('cms.profile.activity-log') ? 'selected' : null }}>
                {{ trans('index.activity_log') }}
            </option>
            <option value="cms.profile.edit-profile" {{ Route::is('cms.profile.edit-profile') ? 'selected' : null }}>
                {{ trans('index.edit_profile') }}
            </option>
            <option value="cms.profile.change-password"
                {{ Route::is('cms.profile.change-password') ? 'selected' : null }}>
                {{ trans('index.change_password') }}
            </option>
            <option value="cms.logout">
                {{ trans('index.logout') }}
            </option>
        </optgroup>
    </select>

    <button class="btn btn-light border-0 rounded-0" type="submit" wire:click="submit">
        <span class="fas fa-location-arrow fa-fw"></span>
    </button>
</div>

@push('script')
    <script>
        $("#search_menu").on("change", function() {
            @this.set("search_menu", $(this).val())
        })
    </script>
@endpush
