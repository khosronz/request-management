<?php namespace Tests\Repositories;

use App\Models\PrefactorDetail;
use App\Repositories\PrefactorDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PrefactorDetailRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PrefactorDetailRepository
     */
    protected $prefactorDetailRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->prefactorDetailRepo = \App::make(PrefactorDetailRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_prefactor_detail()
    {
        $prefactorDetail = factory(PrefactorDetail::class)->make()->toArray();

        $createdPrefactorDetail = $this->prefactorDetailRepo->create($prefactorDetail);

        $createdPrefactorDetail = $createdPrefactorDetail->toArray();
        $this->assertArrayHasKey('id', $createdPrefactorDetail);
        $this->assertNotNull($createdPrefactorDetail['id'], 'Created PrefactorDetail must have id specified');
        $this->assertNotNull(PrefactorDetail::find($createdPrefactorDetail['id']), 'PrefactorDetail with given id must be in DB');
        $this->assertModelData($prefactorDetail, $createdPrefactorDetail);
    }

    /**
     * @test read
     */
    public function test_read_prefactor_detail()
    {
        $prefactorDetail = factory(PrefactorDetail::class)->create();

        $dbPrefactorDetail = $this->prefactorDetailRepo->find($prefactorDetail->id);

        $dbPrefactorDetail = $dbPrefactorDetail->toArray();
        $this->assertModelData($prefactorDetail->toArray(), $dbPrefactorDetail);
    }

    /**
     * @test update
     */
    public function test_update_prefactor_detail()
    {
        $prefactorDetail = factory(PrefactorDetail::class)->create();
        $fakePrefactorDetail = factory(PrefactorDetail::class)->make()->toArray();

        $updatedPrefactorDetail = $this->prefactorDetailRepo->update($fakePrefactorDetail, $prefactorDetail->id);

        $this->assertModelData($fakePrefactorDetail, $updatedPrefactorDetail->toArray());
        $dbPrefactorDetail = $this->prefactorDetailRepo->find($prefactorDetail->id);
        $this->assertModelData($fakePrefactorDetail, $dbPrefactorDetail->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_prefactor_detail()
    {
        $prefactorDetail = factory(PrefactorDetail::class)->create();

        $resp = $this->prefactorDetailRepo->delete($prefactorDetail->id);

        $this->assertTrue($resp);
        $this->assertNull(PrefactorDetail::find($prefactorDetail->id), 'PrefactorDetail should not exist in DB');
    }
}
