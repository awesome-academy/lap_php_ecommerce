<?php

namespace Tests\Unit\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestRole extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    public function test_permission_relation()
    {
        $role = new Role();
        $relation = $role->permissions();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('permission_role.role_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('permission_role.permission_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_user_relation()
    {
        $role = new Role();
        $relation = $role->user();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_table_name()
    {
        $role = new Role();
        $this->assertEquals('roles', $role->getTable());
    }
}
