<?php namespace Tests\Repositories;

use App\Models\Factory;
use App\Repositories\FactoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FactoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FactoryRepository
     */
    protected $factoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->factoryRepo = \App::make(FactoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_factory()
    {
        $factory = factory(Factory::class)->make()->toArray();

        $createdFactory = $this->factoryRepo->create($factory);

        $createdFactory = $createdFactory->toArray();
        $this->assertArrayHasKey('id', $createdFactory);
        $this->assertNotNull($createdFactory['id'], 'Created Factory must have id specified');
        $this->assertNotNull(Factory::find($createdFactory['id']), 'Factory with given id must be in DB');
        $this->assertModelData($factory, $createdFactory);
    }

    /**
     * @test read
     */
    public function test_read_factory()
    {
        $factory = factory(Factory::class)->create();

        $dbFactory = $this->factoryRepo->find($factory->id);

        $dbFactory = $dbFactory->toArray();
        $this->assertModelData($factory->toArray(), $dbFactory);
    }

    /**
     * @test update
     */
    public function test_update_factory()
    {
        $factory = factory(Factory::class)->create();
        $fakeFactory = factory(Factory::class)->make()->toArray();

        $updatedFactory = $this->factoryRepo->update($fakeFactory, $factory->id);

        $this->assertModelData($fakeFactory, $updatedFactory->toArray());
        $dbFactory = $this->factoryRepo->find($factory->id);
        $this->assertModelData($fakeFactory, $dbFactory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_factory()
    {
        $factory = factory(Factory::class)->create();

        $resp = $this->factoryRepo->delete($factory->id);

        $this->assertTrue($resp);
        $this->assertNull(Factory::find($factory->id), 'Factory should not exist in DB');
    }
}
