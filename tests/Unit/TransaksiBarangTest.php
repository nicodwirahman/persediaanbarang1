<?php 
 
namespace Tests\Unit; 
 
use Tests\TestCase; 
use App\Models\Barang; 
use App\Models\Admin; 
use App\Models\TransaksiBarang; 
use Illuminate\Foundation\Testing\RefreshDatabase; 
use PHPUnit\Framework\Attributes\Test; 
 
class TransaksiBarangTest extends TestCase 
{ 
    use RefreshDatabase; 
 
    #[Test] 
    public function fillable_properties_should_work() 
    { 
        $transaksi = new TransaksiBarang([ 
            'IdTransaksi' => 'TRX001', 
            'Jumlah' => 3, 
            'Status' => 'keluar', 
            'Tanggal' => '2024-06-01', 
            'KdBarang' => 'BR001', 
            'IdAdmin' => 1 
        ]); 
 
        $this->assertEquals('TRX001', $transaksi->IdTransaksi); 
        $this->assertEquals(3, $transaksi->Jumlah); 
        $this->assertEquals('keluar', $transaksi->Status); 
        $this->assertEquals('2024-06-01', $transaksi->Tanggal); 
        $this->assertEquals('BR001', $transaksi->KdBarang); 
        $this->assertEquals(1, $transaksi->IdAdmin); 
    } 
 
    #[Test] 
    public function transaksi_should_belong_to_barang_and_admin() 
    { 
        $barang = Barang::create([ 
            'KdBarang' => 'BR001', 
            'NamaBarang' => 'Mouse', 
            'Stok' => 100, 
            'IdKategori' => 1 
        ]); 
 
        $admin = Admin::create([ 
            'IdAdmin' => 1, 
            'Nama' => 'Fadli', 
            'Username' => 'fadli123', 
            'Password' => bcrypt('password123') 
        ]); 
 
        $transaksi = TransaksiBarang::create([ 
            'IdTransaksi' => '01', 
            'Jumlah' => 2, 
            'Status' => 'masuk', 
            'Tanggal' => '2024-06-15', 
            'KdBarang' => $barang->KdBarang, 
            'IdAdmin' => $admin->IdAdmin 
        ]); 
 
        $this->assertInstanceOf(Barang::class, $transaksi->barang); 
        $this->assertEquals('Mouse', $transaksi->barang->NamaBarang); 
 
        $this->assertInstanceOf(Admin::class, $transaksi->admin); 
        $this->assertEquals('Fadli', $transaksi->admin->Nama); 
    } 
}