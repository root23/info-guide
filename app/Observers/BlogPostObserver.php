<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;
use GrahamCampbell\Markdown\Facades\Markdown;

class BlogPostObserver
{
    /**
     * Handle the models blog post "created" event.
     *
     * @param  \App\ModelsBlogPost  $modelsBlogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    public function creating(BlogPost $blogPost) {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }

    /**
     * Handle the models blog post "updated" event.
     *
     * @param  \App\ModelsBlogPost  $modelsBlogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    public function updating(BlogPost $blogPost) {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
    }

    /**
     * Если дата публикации пустая
     *
     * @param BlogPost $blogPost
     */
    protected function setPublishedAt(BlogPost $blogPost) {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     * Если slug пустой
     *
     * @param BlogPost $blogPost
     */
    protected function setSlug(BlogPost $blogPost) {
        $blogPost->slug = Str::slug($blogPost->title);
    }

    /**
     * Конвертация из markdown в html
     *
     * @param BlogPost $blogPost
     */
    protected function setHtml(BlogPost $blogPost) {
        if ($blogPost->isDirty('content_raw')) {
            $blogPost->content_html = Markdown::convertToHtml($blogPost->content_raw);
        }
    }

    /**
     * Устанавливает пользователя, опубликовавшего статью
     *
     * @param BlogPost $blogPost
     */
    protected function setUser(BlogPost $blogPost) {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }

    /**
     * Handle the models blog post "deleted" event.
     *
     * @param  \App\ModelsBlogPost  $modelsBlogPost
     * @return void
     */
    public function deleted(ModelsBlogPost $modelsBlogPost)
    {
        //
    }

    /**
     * Handle the models blog post "restored" event.
     *
     * @param  \App\ModelsBlogPost  $modelsBlogPost
     * @return void
     */
    public function restored(ModelsBlogPost $modelsBlogPost)
    {
        //
    }

    /**
     * Handle the models blog post "force deleted" event.
     *
     * @param  \App\ModelsBlogPost  $modelsBlogPost
     * @return void
     */
    public function forceDeleted(ModelsBlogPost $modelsBlogPost)
    {
        //
    }
}
