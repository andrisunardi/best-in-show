<?php

namespace App\Services;

use App\Models\Faq;

class FaqService
{
    public function index(
        string $question = '',
        string $question_idn = '',
        string $answer = '',
        string $answer_idn = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $faqs = Faq::query()
            ->when($question, fn ($q) => $q->where('question', 'LIKE', "%{$question}%"))
            ->when($question_idn, fn ($q) => $q->where('question_idn', 'LIKE', "%{$question_idn}%"))
            ->when($answer, fn ($q) => $q->where('answer', 'LIKE', "%{$answer}%"))
            ->when($answer_idn, fn ($q) => $q->where('answer_idn', 'LIKE', "%{$answer_idn}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $faqs->paginate($per_page);
        }

        return $faqs->get();
    }

    public function add(array $data = []): Faq
    {
        return Faq::create($data);
    }

    public function clone(array $data, Faq $faq): Faq
    {
        return Faq::create($data);
    }

    public function edit(Faq $faq, array $data = []): Faq
    {
        $faq->update($data);
        $faq->refresh();

        return $faq;
    }

    public function active(Faq $faq): Faq
    {
        $faq->is_active = ! $faq->is_active;
        $faq->save();
        $faq->refresh();

        return $faq;
    }

    public function delete(Faq $faq): bool
    {
        return $faq->delete();
    }

    public function deleteAll(array $faqs = []): bool
    {
        return Faq::when($faqs, fn ($q) => $q->whereIn('id', $faqs))->delete();
    }

    public function restore(Faq $faq): bool
    {
        return $faq->restore();
    }

    public function restoreAll(array $faqs = []): bool
    {
        return Faq::when($faqs, fn ($q) => $q->whereIn('id', $faqs))->onlyTrashed()->restore();
    }

    public function deletePermanent(Faq $faq): bool
    {
        return $faq->forceDelete();
    }

    public function deletePermanentAll(array $faqs = []): bool
    {
        return Faq::when($faqs, fn ($q) => $q->whereIn('id', $faqs))->onlyTrashed()->forceDelete();
    }

    public function latest(): object
    {
        return Faq::latest()->get();
    }
}
