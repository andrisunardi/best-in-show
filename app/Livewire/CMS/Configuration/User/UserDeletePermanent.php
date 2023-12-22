<?php

namespace App\Livewire\CMS\Configuration\User;

use App\Livewire\CMS\Component;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Str;

class UserDeletePermanent extends Component
{
    public function mount($user)
    {
        $user = User::onlyTrashed()->findOrFail($user);

        (new UserService())->deletePermanent(user: $user);

        $this->flash('success', trans('index.delete_permanent_success'), [
            'html' => trans('index.user')." - {$user->id} - ".trans('index.deleted_permanently'),
        ]);

        if (Str::endsWith(url()->previous(), 'trash')) {
            return $this->redirect(route('cms.configuration.user.trash'), navigate: true);
        }

        return $this->redirect(route('cms.configuration.user.index'), navigate: true);
    }
}
