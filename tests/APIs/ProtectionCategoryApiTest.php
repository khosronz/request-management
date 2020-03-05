<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProtectionCategory;

class ProtectionCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_protection_category()
    {
        $protectionCategory = factory(ProtectionCategory::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/protection_categories', $protectionCategory
        );

        $this->assertApiResponse($protectionCategory);
    }

    /**
     * @test
     */
    public function test_read_protection_category()
    {
        $protectionCategory = factory(ProtectionCategory::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/protection_categories/'.$protectionCategory->id
        );

        $this->assertApiResponse($protectionCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_protection_category()
    {
        $protectionCategory = factory(ProtectionCategory::class)->create();
        $editedProtectionCategory = factory(ProtectionCategory::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/protection_categories/'.$protectionCategory->id,
            $editedProtectionCategory
        );

        $this->assertApiResponse($editedProtectionCategory);
    }

    /**
     * @test
     */
    public function test_delete_protection_category()
    {
        $protectionCategory = factory(ProtectionCategory::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/protection_categories/'.$protectionCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/protection_categories/'.$protectionCategory->id
        );

        $this->response->assertStatus(404);
    }
}
