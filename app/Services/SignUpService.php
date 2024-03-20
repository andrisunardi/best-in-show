<?php

namespace App\Services;

use App\Models\SignUp;

class SignUpService
{
    public function index(
        string $email = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $signUps = SignUp::query()
            ->when($email, fn ($q) => $q->where('email', 'LIKE', "%{$email}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $signUps->paginate($per_page);
        }

        return $signUps->get();
    }

    public function add(array $data = []): SignUp
    {
        return SignUp::create($data);
    }

    public function clone(array $data, SignUp $signUp): SignUp
    {
        return SignUp::create($data);
    }

    public function edit(SignUp $signUp, array $data = []): SignUp
    {
        $signUp->update($data);
        $signUp->refresh();

        return $signUp;
    }

    public function active(SignUp $signUp): SignUp
    {
        $signUp->is_active = ! $signUp->is_active;
        $signUp->save();
        $signUp->refresh();

        return $signUp;
    }

    public function delete(SignUp $signUp): bool
    {
        return $signUp->delete();
    }

    public function deleteAll(array $signUps = []): bool
    {
        return SignUp::when($signUps, fn ($q) => $q->whereIn('id', $signUps))->delete();
    }

    public function restore(SignUp $signUp): bool
    {
        return $signUp->restore();
    }

    public function restoreAll(array $signUps = []): bool
    {
        return SignUp::when($signUps, fn ($q) => $q->whereIn('id', $signUps))->onlyTrashed()->restore();
    }

    public function deletePermanent(SignUp $signUp): bool
    {
        return $signUp->forceDelete();
    }

    public function deletePermanentAll(array $signUps = []): bool
    {
        return SignUp::when($signUps, fn ($q) => $q->whereIn('id', $signUps))->onlyTrashed()->forceDelete();
    }
}
