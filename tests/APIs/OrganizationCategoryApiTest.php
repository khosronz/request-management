<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OrganizationCategory;

class OrganizationCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_organization_category()
    {
        $organizationCategory = factory(OrganizationCategory::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/organization_categories', $organizationCategory
        );

        $this->assertApiResponse($organizationCategory);
    }

    /**
     * @test
     */
    public function test_read_organization_category()
    {
        $organizationCategory = factory(OrganizationCategory::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/organization_categories/'.$organizationCategory->id
        );

        $this->assertApiResponse($organizationCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_organization_category()
    {
        $organizationCategory = factory(OrganizationCategory::class)->create();
        $editedOrganizationCategory = factory(OrganizationCategory::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/organization_categories/'.$organizationCategory->id,
            $editedOrganizationCategory
        );

        $this->assertApiResponse($editedOrganizationCategory);
    }

    /**
     * @test
     */
    public function test_delete_organization_category()
    {
        $organizationCategory = factory(OrganizationCategory::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/organization_categories/'.$organizationCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/organization_categories/'.$organizationCategory->id
        );

        $this->response->assertStatus(404);
    }
}
