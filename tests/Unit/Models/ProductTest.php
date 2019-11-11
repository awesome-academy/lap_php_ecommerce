<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    public function test_product_relation()
    {
        $product = new Product();
        $relation = $product->category();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('category_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_size_relation()
    {
        $product = new Product();
        $relation = $product->sizes();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('product_size.product_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('product_size.size_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_order_detail_relation()
    {
        $product = new Product();
        $relation = $product->orderDetails();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('product_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_view_relation()
    {
        $product = new Product();
        $relation = $product->rates();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('product_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_table_name()
    {
        $product = new Product();
        $this->assertEquals('products', $product->getTable());
    }
}
