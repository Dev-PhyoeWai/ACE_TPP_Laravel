<?php
namespace App\Repositories;
use App\Models\Article;
use App\Repositories\Interfaces\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface{
    protected $articleRepository;
    public function __construct(Article $articleRepository){
        $this->articleRepository = $articleRepository;
    }
    public function getAll() {
        return $this->articleRepository->all();
    }

    public function getId($id) {
        return $this->articleRepository->findOrFail($id);
    }

    public function create(array $data) {
        return $this->articleRepository->create($data);
    }

    public function update(array $data, $id) {
        $article = $this->getId($id);
        $article->update($data);
        return $article;
    }

    public function delete($id) {
        $article = $this->getId($id);
        $article->delete();
    }
}
