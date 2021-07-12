<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# Import Box Class
use App\Box;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A Test function for Box Class
     */
    public function test_box_contents()
    {
        $box = new Box(['toy']);
        // Pengecekan apa benar jika objek box memiliki 'toy'
        $this->assertTrue($box->has('toy'));
        // Pengecekan apa salah jika objek box memiliki 'ball'
        $this->assertFalse($box->has('ball'));
    }

    public function test_take_one_from_the_box() {
        $box = new Box(['torch']);
        $this->assertEquals('torch', $box->takeOne());

        // Null, now the box is empty
        $this->assertNull($box->takeOne());
    }

    public function test_starts_with_a_letter() {
        $box = new Box(['toy', 'torch', 'ball', 'cat', 'tissue']);

        $results = $box->startsWith('t');

        $this->assertCount(3, $results);
        $this->assertContains('toy', $results);
        $this->assertContains('torch', $results);
        $this->assertContains('tissue', $results);

        // Empty array if passed even
        $this->assertEmpty($box->startsWith('s'));
    }

}
