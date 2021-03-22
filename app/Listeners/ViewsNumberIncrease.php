<?php

namespace App\Listeners;

use App\Events\ShowPost;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ViewsNumberIncrease
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ShowPost  $event
     * @return void
     */
    public function handle(ShowPost $event)
    {
        $post = Post::findOrFail($event->post->id);
        $post->views = $post->views+1;
        $post->save();

        return $post;
    }
}