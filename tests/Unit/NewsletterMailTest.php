<?php

namespace Tests\Unit;

use App\Mail\Newsletter;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

/**
 * @coversNothing
 */
class NewsletterMailTest extends TestCase
{
    use RefreshDatabase;

    public function test_newsletter_mail()
    {
        $user  = $this->user();
        $posts = Post::factory()->count(2)->create();

        Mail::fake();

        Mail::to($user->email)->send(new Newsletter($posts, $user->email));

        Mail::assertSent(Newsletter::class, fn ($mailable) => $mailable->hasTo($user->email));
    }
}
