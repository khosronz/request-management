<?php namespace Tests\Repositories;

use App\Models\Factoryaddress;
use App\Repositories\FactoryaddressRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FactoryaddressRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FactoryaddressRepository
     */
    protected $factoryaddressRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->factoryaddressRepo = \App::make(FactoryaddressRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_factoryaddress()
    {
        $factoryaddress = factory(Factoryaddress::class)->make()->toArray();

        $createdFactoryaddress = $this->factoryaddressRepo->create($factoryaddress);

        $createdFactoryaddress = $createdFactoryaddress->toArray();
        $this->assertArrayHasKey('id', $createdFactoryaddress);
        $this->assertNotNull($createdFactoryaddress['id'], 'Created Factoryaddress must have id specified');
        $this->assertNotNull(Factoryaddress::find($createdFactoryaddress['id']), 'Factoryaddress with given id must be in DB');
        $this->assertModelData($factoryaddress, $createdFactoryaddress);
    }

    /**
     * @test read
     */
    public function test_read_factoryaddress()
    {
        $factoryaddress = factory(Factoryaddress::class)->create();

        $dbFactoryaddress = $this->factoryaddressRepo->find($factoryaddress->id);

        $dbFactoryaddress = $dbFactoryaddress->toArray();
        $this->assertModelData($factoryaddress->toArray(), $dbFactoryaddress);
    }

    /**
     * @test update
     */
    public function test_update_factoryaddress()
    {
        $factoryaddress = factory(Factoryaddress::class)->create();
        $fakeFactoryaddress = factory(Factoryaddress::class)->make()->toArray();

        $updatedFactoryaddress = $this->factoryaddressRepo->update($fakeFactoryaddress, $factoryaddress->id);

        $this->assertModelData($fakeFactoryaddress, $updatedFactoryaddress->toArray());
        $dbFactoryaddress = $this->factoryaddressRepo->find($factoryaddress->id);
        $this->assertModelData($fakeFactoryaddress, $dbFactoryaddress->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_factoryaddress()
    {
        $factoryaddress = factory(Factoryaddress::class)->create();

        $resp = $this->factoryaddressRepo->delete($factoryaddress->id);

        $this->assertTrue($resp);
        $this->assertNull(Factoryaddress::find($factoryaddress->id), 'Factoryaddress should not exist in DB');
    }
}
