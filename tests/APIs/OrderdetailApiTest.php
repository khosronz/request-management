<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Orderdetail;

class OrderdetailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_orderdetail()
    {
        $orderdetail = factory(Orderdetail::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/orderdetails', $orderdetail
        );

        $this->assertApiResponse($orderdetail);
    }

    /**
     * @test
     */
    public function test_read_orderdetail()
    {
        $orderdetail = factory(Orderdetail::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/orderdetails/'.$orderdetail->id
        );

        $this->assertApiResponse($orderdetail->toArray());
    }

    /**
     * @test
     */
    public function test_update_orderdetail()
    {
        $orderdetail = factory(Orderdetail::class)->create();
        $editedOrderdetail = factory(Orderdetail::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/orderdetails/'.$orderdetail->id,
            $editedOrderdetail
        );

        $this->assertApiResponse($editedOrderdetail);
    }

    /**
     * @test
     */
    public function test_delete_orderdetail()
    {
        $orderdetail = factory(Orderdetail::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/orderdetails/'.$orderdetail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/orderdetails/'.$orderdetail->id
        );

        $this->response->assertStatus(404);
    }
}
