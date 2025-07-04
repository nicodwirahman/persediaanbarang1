<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class BarangTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function fillable_properties_should_work()
    {
        $barang = new Barang([
            'KdBarang' => 'BR001',
            'NamaBarang' => 'Pulpen',
            'Stok' => 100,
            'IdKategori' => 1,
        ]);

        $this->assertEquals('BR001', $barang->KdBarang);
        $this->assertEquals('Pulpen', $barang->NamaBarang);
        $this->assertEquals(100, $barang->Stok);
        $this->assertEquals(1, $barang->IdKategori);
    }

    #[Test]
    public function barang_should_belong_to_kategori()
    {
        $kategori = Kategori::create([
            'IdKategori' => 1,
            'NamaKategori' => 'Alat Tulis'
        ]);

        $barang = Barang::create([
            'KdBarang' => 'BR001',
            'NamaBarang' => 'Pulpen',
            'Stok' => 50,
            'IdKategori' => $kategori->IdKategori,
        ]);

        $this->assertInstanceOf(Kategori::class, $barang->kategori);
        $this->assertEquals('Alat Tulis', $barang->kategori->NamaKategori);
    }
}
