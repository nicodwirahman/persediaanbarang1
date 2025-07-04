<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Kategori;
use App\Models\Barang;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class KategoriTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function fillable_properties_should_work()
    {
        $kategori = new Kategori([
            'NamaKategori' => 'Elektronik'
        ]);

        $this->assertEquals('Elektronik', $kategori->NamaKategori);
    }

    #[Test]
    public function kategori_should_have_many_barang()
    {
        $kategori = Kategori::create(['NamaKategori' => 'Elektronik']);

        $barang1 = Barang::create([
            'KdBarang' => 'BR001',
            'NamaBarang' => 'Laptop',
            'Stok' => 10,
            'IdKategori' => $kategori->IdKategori
        ]);

        $barang2 = Barang::create([
            'KdBarang' => 'BR002',
            'NamaBarang' => 'Smartphone',
            'Stok' => 20,
            'IdKategori' => $kategori->IdKategori
        ]);

        $this->assertCount(2, $kategori->barang);
        $this->assertEquals('Laptop', $kategori->barang[0]->NamaBarang);
        $this->assertEquals('Smartphone', $kategori->barang[1]->NamaBarang);
    }
}
