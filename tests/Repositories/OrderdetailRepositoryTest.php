<?php namespace Tests\Repositories;

use App\Models\Orderdetail;
use App\Repositories\OrderdetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OrderdetailRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OrderdetailRepository
     */
    protected $orderdetailRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->orderdetailRepo = \App::make(OrderdetailRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_orderdetail()
    {
        $orderdetail = factory(Orderdetail::class)->make()->toArray();

        $createdOrderdetail = $this->orderdetailRepo->create($orderdetail);

        $createdOrderdetail = $createdOrderdetail->toArray();
        $this->assertArrayHasKey('id', $createdOrderdetail);
        $this->assertNotNull($createdOrderdetail['id'], 'Created Orderdetail must have id specified');
        $this->assertNotNull(Orderdetail::find($createdOrderdetail['id']), 'Orderdetail with given id must be in DB');
        $this->assertModelData($orderdetail, $createdOrderdetail);
    }

    /**
     * @test read
     */
    public function test_read_orderdetail()
    {
        $orderdetail = factory(Orderdetail::class)->create();

        $dbOrderdetail = $this->orderdetailRepo->find($orderdetail->id);

        $dbOrderdetail = $dbOrderdetail->toArray();
        $this->assertModelData($orderdetail->toArray(), $dbOrderdetail);
    }

    /**
     * @test update
     */
    public function test_update_orderdetail()
    {
        $orderdetail = factory(Orderdetail::class)->create();
        $fakeOrderdetail = factory(Orderdetail::class)->make()->toArray();

        $updatedOrderdetail = $this->orderdetailRepo->update($fakeOrderdetail, $orderdetail->id);

        $this->assertModelData($fakeOrderdetail, $updatedOrderdetail->toArray());
        $dbOrderdetail = $this->orderdetailRepo->find($orderdetail->id);
        $this->assertModelData($fakeOrderdetail, $dbOrderdetail->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_orderdetail()
    {
        $orderdetail = factory(Orderdetail::class)->create();

        $resp = $this->orderdetailRepo->delete($orderdetail->id);

        $this->assertTrue($resp);
        $this->assertNull(Orderdetail::find($orderdetail->id), 'Orderdetail should not exist in DB');
    }
}
