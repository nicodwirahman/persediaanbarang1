<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_fill_properties()
    {
        $admin = new Admin([
            'Nama' => 'Fadli',
            'Username' => 'fadli123',
            'Password' => 'secret'
        ]);

        $this->assertEquals('Fadli', $admin->Nama);
        $this->assertEquals('fadli123', $admin->Username);
        $this->assertEquals('secret', $admin->Password);
    }

    #[Test]
    public function it_can_insert_into_database()
    {
        $admin = Admin::create([
            'Nama' => 'Fadli',
            'Username' => 'fadli123',
            'Password' => bcrypt('password123'),
        ]);

        $this->assertDatabaseHas('admin', [
            'Nama' => 'Fadli',
            'Username' => 'fadli123',
        ]);
    }
}
