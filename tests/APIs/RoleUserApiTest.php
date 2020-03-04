<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\RoleUser;

class RoleUserApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_role_users()
    {
        $roleUser = factory(RoleUser::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/role_users', $roleUser
        );

        $this->assertApiResponse($roleUser);
    }

    /**
     * @test
     */
    public function test_read_role_users()
    {
        $roleUser = factory(RoleUser::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/role_users/'.$roleUser->id
        );

        $this->assertApiResponse($roleUser->toArray());
    }

    /**
     * @test
     */
    public function test_update_role_users()
    {
        $roleUser = factory(RoleUser::class)->create();
        $editedRoleUser = factory(RoleUser::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/role_users/'.$roleUser->id,
            $editedRoleUser
        );

        $this->assertApiResponse($editedRoleUser);
    }

    /**
     * @test
     */
    public function test_delete_role_users()
    {
        $roleUser = factory(RoleUser::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/role_users/'.$roleUser->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/role_users/'.$roleUser->id
        );

        $this->response->assertStatus(404);
    }
}
