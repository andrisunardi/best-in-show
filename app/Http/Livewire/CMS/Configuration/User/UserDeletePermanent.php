<?php

namespace App\Http\Livewire\CMS\Configuration\User;

use App\Http\Livewire\CMS\Component;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Str;

class UserDeletePermanent extends Component
{
    public function mount($user)
    {
        $user = User::onlyTrashed()->findOrFail($user);

        (new UserService())->deletePermanent(user: $user);

        $this->flash(
            'success',
            trans('index.user')." - {$user->id} - ".trans('index.deleted_permanently'),
        );

        if (Str::endsWith(url()->previous(), 'trash')) {
            return redirect()->route('cms.configuration.user.trash');
        }

        return redirect()->route('cms.configuration.user.index');
    }
}
