<?php namespace Tests\Repositories;

use App\Models\OrganizationCategory;
use App\Repositories\OrganizationCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OrganizationCategoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OrganizationCategoryRepository
     */
    protected $organizationCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->organizationCategoryRepo = \App::make(OrganizationCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_organization_category()
    {
        $organizationCategory = factory(OrganizationCategory::class)->make()->toArray();

        $createdOrganizationCategory = $this->organizationCategoryRepo->create($organizationCategory);

        $createdOrganizationCategory = $createdOrganizationCategory->toArray();
        $this->assertArrayHasKey('id', $createdOrganizationCategory);
        $this->assertNotNull($createdOrganizationCategory['id'], 'Created OrganizationCategory must have id specified');
        $this->assertNotNull(OrganizationCategory::find($createdOrganizationCategory['id']), 'OrganizationCategory with given id must be in DB');
        $this->assertModelData($organizationCategory, $createdOrganizationCategory);
    }

    /**
     * @test read
     */
    public function test_read_organization_category()
    {
        $organizationCategory = factory(OrganizationCategory::class)->create();

        $dbOrganizationCategory = $this->organizationCategoryRepo->find($organizationCategory->id);

        $dbOrganizationCategory = $dbOrganizationCategory->toArray();
        $this->assertModelData($organizationCategory->toArray(), $dbOrganizationCategory);
    }

    /**
     * @test update
     */
    public function test_update_organization_category()
    {
        $organizationCategory = factory(OrganizationCategory::class)->create();
        $fakeOrganizationCategory = factory(OrganizationCategory::class)->make()->toArray();

        $updatedOrganizationCategory = $this->organizationCategoryRepo->update($fakeOrganizationCategory, $organizationCategory->id);

        $this->assertModelData($fakeOrganizationCategory, $updatedOrganizationCategory->toArray());
        $dbOrganizationCategory = $this->organizationCategoryRepo->find($organizationCategory->id);
        $this->assertModelData($fakeOrganizationCategory, $dbOrganizationCategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_organization_category()
    {
        $organizationCategory = factory(OrganizationCategory::class)->create();

        $resp = $this->organizationCategoryRepo->delete($organizationCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(OrganizationCategory::find($organizationCategory->id), 'OrganizationCategory should not exist in DB');
    }
}
