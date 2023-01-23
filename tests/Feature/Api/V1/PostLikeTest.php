<?php

namespace Tests\Feature\Api\V1;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @coversNothing
 */
class PostLikeTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_like()
    {
        $post = Post::factory()->create();

        $this->actingAsUser('api')
            ->json('POST', "/api/v1/posts/{$post->id}/likes")
            ->assertCreated();

        $this->assertCount(1, $post->likes);
    }

    public function test_post_dislike()
    {
        $user = $this->user();
        $post = Post::factory()->create();
        $post->likes()->create(['author_id' => $user->id]);

        $this->actingAs($user, 'api')
            ->json('DELETE', "/api/v1/posts/{$post->id}/likes")
            ->assertOk();

        $this->assertCount(0, $post->likes);
    }
}
