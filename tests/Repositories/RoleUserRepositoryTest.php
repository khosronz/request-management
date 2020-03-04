<?php namespace Tests\Repositories;

use App\Models\RoleUser;
use App\Repositories\RoleUserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RoleUserRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RoleUserRepository
     */
    protected $roleUserRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->roleUserRepo = \App::make(RoleUserRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_role_users()
    {
        $roleUser = factory(RoleUser::class)->make()->toArray();

        $createdRoleUser = $this->roleUserRepo->create($roleUser);

        $createdRoleUser = $createdRoleUser->toArray();
        $this->assertArrayHasKey('id', $createdRoleUser);
        $this->assertNotNull($createdRoleUser['id'], 'Created RoleUser must have id specified');
        $this->assertNotNull(RoleUser::find($createdRoleUser['id']), 'RoleUser with given id must be in DB');
        $this->assertModelData($roleUser, $createdRoleUser);
    }

    /**
     * @test read
     */
    public function test_read_role_users()
    {
        $roleUser = factory(RoleUser::class)->create();

        $dbRoleUser = $this->roleUserRepo->find($roleUser->id);

        $dbRoleUser = $dbRoleUser->toArray();
        $this->assertModelData($roleUser->toArray(), $dbRoleUser);
    }

    /**
     * @test update
     */
    public function test_update_role_users()
    {
        $roleUser = factory(RoleUser::class)->create();
        $fakeRoleUser = factory(RoleUser::class)->make()->toArray();

        $updatedRoleUser = $this->roleUserRepo->update($fakeRoleUser, $roleUser->id);

        $this->assertModelData($fakeRoleUser, $updatedRoleUser->toArray());
        $dbRoleUser = $this->roleUserRepo->find($roleUser->id);
        $this->assertModelData($fakeRoleUser, $dbRoleUser->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_role_users()
    {
        $roleUser = factory(RoleUser::class)->create();

        $resp = $this->roleUserRepo->delete($roleUser->id);

        $this->assertTrue($resp);
        $this->assertNull(RoleUser::find($roleUser->id), 'RoleUser should not exist in DB');
    }
}
