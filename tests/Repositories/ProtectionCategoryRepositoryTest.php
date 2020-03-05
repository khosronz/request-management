<?php namespace Tests\Repositories;

use App\Models\ProtectionCategory;
use App\Repositories\ProtectionCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProtectionCategoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProtectionCategoryRepository
     */
    protected $protectionCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->protectionCategoryRepo = \App::make(ProtectionCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_protection_category()
    {
        $protectionCategory = factory(ProtectionCategory::class)->make()->toArray();

        $createdProtectionCategory = $this->protectionCategoryRepo->create($protectionCategory);

        $createdProtectionCategory = $createdProtectionCategory->toArray();
        $this->assertArrayHasKey('id', $createdProtectionCategory);
        $this->assertNotNull($createdProtectionCategory['id'], 'Created ProtectionCategory must have id specified');
        $this->assertNotNull(ProtectionCategory::find($createdProtectionCategory['id']), 'ProtectionCategory with given id must be in DB');
        $this->assertModelData($protectionCategory, $createdProtectionCategory);
    }

    /**
     * @test read
     */
    public function test_read_protection_category()
    {
        $protectionCategory = factory(ProtectionCategory::class)->create();

        $dbProtectionCategory = $this->protectionCategoryRepo->find($protectionCategory->id);

        $dbProtectionCategory = $dbProtectionCategory->toArray();
        $this->assertModelData($protectionCategory->toArray(), $dbProtectionCategory);
    }

    /**
     * @test update
     */
    public function test_update_protection_category()
    {
        $protectionCategory = factory(ProtectionCategory::class)->create();
        $fakeProtectionCategory = factory(ProtectionCategory::class)->make()->toArray();

        $updatedProtectionCategory = $this->protectionCategoryRepo->update($fakeProtectionCategory, $protectionCategory->id);

        $this->assertModelData($fakeProtectionCategory, $updatedProtectionCategory->toArray());
        $dbProtectionCategory = $this->protectionCategoryRepo->find($protectionCategory->id);
        $this->assertModelData($fakeProtectionCategory, $dbProtectionCategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_protection_category()
    {
        $protectionCategory = factory(ProtectionCategory::class)->create();

        $resp = $this->protectionCategoryRepo->delete($protectionCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(ProtectionCategory::find($protectionCategory->id), 'ProtectionCategory should not exist in DB');
    }
}
