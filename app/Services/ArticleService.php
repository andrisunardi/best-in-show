<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleService
{
    public function index(
        string $title = '',
        string $title_idn = '',
        string $description = '',
        string $description_idn = '',
        string $date = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $articles = Article::query()
            ->when($title, fn ($q) => $q->where('title', 'LIKE', "%{$title}%"))
            ->when($title_idn, fn ($q) => $q->where('title_idn', 'LIKE', "%{$title_idn}%"))
            ->when($description, fn ($q) => $q->where('description', 'LIKE', "%{$description}%"))
            ->when($description_idn, fn ($q) => $q->where('description_idn', 'LIKE', "%{$description_idn}%"))
            ->when($date, fn ($q) => $q->whereDate('date', $date))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $articles->paginate($per_page);
        }

        return $articles->get();
    }

    public function add(array $data = []): Article
    {
        $data['date'] = $data['date'] ?: null;

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['title'],
            disk: 'images',
            directory: 'article',
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['title']);

        return Article::create($data);
    }

    public function clone(array $data, Article $article): Article
    {
        $data['date'] = $data['date'] ?: null;

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['title'],
            disk: 'images',
            directory: 'article',
            checkAsset: $article->checkImage(),
            fileAsset: $article->image,
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['title']);

        return Article::create($data);
    }

    public function edit(Article $article, array $data = []): Article
    {
        $data['date'] = $data['date'] ?: null;

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['title'],
            disk: 'images',
            directory: 'article',
            checkAsset: $article->checkImage(),
            fileAsset: $article->image,
            deleteAsset: true,
        );

        $data['slug'] = Str::slug($data['title']);

        $article->update($data);
        $article->refresh();

        return $article;
    }

    public function active(Article $article): Article
    {
        $article->is_active = ! $article->is_active;
        $article->save();
        $article->refresh();

        return $article;
    }

    public function deleteImage(Article $article)
    {
        $article->deleteImage();

        $article->image = null;
        $article->save();
        $article->refresh();

        return $article;
    }

    public function delete(Article $article): bool
    {
        return $article->delete();
    }

    public function deleteAll(array $articles = []): bool
    {
        return Article::when($articles, fn ($q) => $q->whereIn('id', $articles))->delete();
    }

    public function restore(Article $article): bool
    {
        return $article->restore();
    }

    public function restoreAll(array $articles = []): bool
    {
        return Article::when($articles, fn ($q) => $q->whereIn('id', $articles))->onlyTrashed()->restore();
    }

    public function deletePermanent(Article $article): bool
    {
        $article->deleteImage();

        return $article->forceDelete();
    }

    public function deletePermanentAll(array $articles = []): bool
    {
        $articles = Article::when($articles, fn ($q) => $q->whereIn('id', $articles))->onlyTrashed()->get();

        foreach ($articles as $article) {
            $article->deleteImage();
            $article->forceDelete();
        }

        return true;
    }

    public function latest(): object
    {
        return Article::with('category')->latest()->active()->limit(3)->get();
    }
}
