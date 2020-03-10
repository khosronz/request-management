<?php namespace Tests\Repositories;

use App\Models\Prefactor;
use App\Repositories\PrefactorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PrefactorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PrefactorRepository
     */
    protected $prefactorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->prefactorRepo = \App::make(PrefactorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_prefactor()
    {
        $prefactor = factory(Prefactor::class)->make()->toArray();

        $createdPrefactor = $this->prefactorRepo->create($prefactor);

        $createdPrefactor = $createdPrefactor->toArray();
        $this->assertArrayHasKey('id', $createdPrefactor);
        $this->assertNotNull($createdPrefactor['id'], 'Created Prefactor must have id specified');
        $this->assertNotNull(Prefactor::find($createdPrefactor['id']), 'Prefactor with given id must be in DB');
        $this->assertModelData($prefactor, $createdPrefactor);
    }

    /**
     * @test read
     */
    public function test_read_prefactor()
    {
        $prefactor = factory(Prefactor::class)->create();

        $dbPrefactor = $this->prefactorRepo->find($prefactor->id);

        $dbPrefactor = $dbPrefactor->toArray();
        $this->assertModelData($prefactor->toArray(), $dbPrefactor);
    }

    /**
     * @test update
     */
    public function test_update_prefactor()
    {
        $prefactor = factory(Prefactor::class)->create();
        $fakePrefactor = factory(Prefactor::class)->make()->toArray();

        $updatedPrefactor = $this->prefactorRepo->update($fakePrefactor, $prefactor->id);

        $this->assertModelData($fakePrefactor, $updatedPrefactor->toArray());
        $dbPrefactor = $this->prefactorRepo->find($prefactor->id);
        $this->assertModelData($fakePrefactor, $dbPrefactor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_prefactor()
    {
        $prefactor = factory(Prefactor::class)->create();

        $resp = $this->prefactorRepo->delete($prefactor->id);

        $this->assertTrue($resp);
        $this->assertNull(Prefactor::find($prefactor->id), 'Prefactor should not exist in DB');
    }
}
