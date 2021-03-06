<?php

namespace Tests\Unit\Models;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    public function test_role_relation()
    {
        $permission = new Permission();
        $relation = $permission->roles();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('permission_role.permission_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('permission_role.role_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_table_name()
    {
        $permission = new Permission();
        $this->assertEquals('permissions', $permission->getTable());
    }
}
