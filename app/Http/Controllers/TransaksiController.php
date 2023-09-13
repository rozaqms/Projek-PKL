<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;
use App\Models\Pengeluaran;
use App\Models\Product;
use App\Models\Laporan_pendapatan;
use App\Models\Ingredients_category;

class TransaksiController extends Controller
{
    public function penjualan(){
        $transaksi = Pendapatan::orderBy('created_at', 'desc')->get();
        return view('pages.transaksi.penjualan',compact('transaksi'),[
            "title" => "Penjualan"
        ]);
    }

    public function pendapatan(){
        $transaksi = Laporan_pendapatan::all();
        return view('pages.transaksi.pendapatan',compact('transaksi'),[
            "title" => "Laporan"
        ]);
    }

    public function labarugi(){
        $transaksi = Pengeluaran::orderBy('created_at', 'desc')->get();
        return view('pages.laba_rugi',compact('transaksi'),[
            "title" => "Laba Rugi"
        ]);
    }

    public function laporanK($Key){

        $transaksi = Laporan_pendapatan::where('Key',$Key)->get();

        $inputTanggal = $Key; // Tanggal awal dalam format "SEP23"

        // Parse tanggal awal menjadi bulan dan tahun
        $bulanAwal = substr($inputTanggal, 0, 3); // Ambil 3 karakter pertama (SEP)
        $tahunAwal = substr($inputTanggal, 3); // Ambil karakter setelah 3 karakter pertama (23)

        // Tambahkan "20" di depan tahun
        $tahunAwal = "20" . $tahunAwal;

        // Konversi bulan menjadi format numerik
        $bulanNumerik = date_parse($bulanAwal)['month'];

        // Buat tanggal dalam format yang diinginkan
        $tanggalBaru = sprintf("%02d-%s", $bulanNumerik, $tahunAwal);

        $transaksiP = Pendapatan::whereMonth('created_at', $bulanNumerik)->whereYear('created_at', $tahunAwal)->get();

        return view('pages.transaksi.laporan-pendapatan',compact('transaksi','tanggalBaru','transaksiP'),[
            "title" => "Pendapatan"
        ]);
    }

    public function pengeluaran(){
        $transaksi = Pengeluaran::orderBy('created_at', 'desc')->get();
        $dataKategori = Ingredients_category::pluck('category');
        return view('pages.pembelian-bahan',compact('transaksi','dataKategori'),[
            "title" => "Pengeluaran"
        ]);
    }

    public function pengeluaranT(Request $request)
    {
        // Validasi data jika diperlukan
        $request->validate([
            'category' => 'required',
            'requirement' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
    
        // Mendapatkan tanggal dari input form
        $data = [
            'category' => $request->category,
            'requirement' => $request->requirement,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];
    

        Pengeluaran::Create($data);
    
        // Redirect atau lakukan tindakan lain sesuai kebutuhan
        return redirect()->route('settingsM')->with('success', 'Data berhasil disimpan.');
    }

    public function laporanT(Request $request){
        $pengeluaranT = Pengeluaran::select('requirement')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('requirement')
            ->get()
            ->pluck('count', 'requirement')
            ->toArray();

        $categoryData = Product::select('category')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('category')
            ->get()
            ->pluck('count', 'category')
            ->toArray();

        //<!--awal::target-->
        // Ambil bulan dan tahun saat ini
        $bulanSekarang1 = now()->format('M');
        $bulanSekarang = now()->format('m');
        $tahunSekarang = now()->format('Y');
        $tahunSekarang1 = now()->format('y');

        // Ambil data pendapatan untuk bulan ini

        $pendapatanBulanIni = Pendapatan::whereMonth('created_at', $bulanSekarang)
            ->whereYear('created_at', $tahunSekarang)
            ->get();

        $pengeluaranBulanIni = Pengeluaran::whereMonth('created_at', $bulanSekarang)
            ->whereYear('created_at', $tahunSekarang)
            ->get();

        $targetP = Laporan_pendapatan::select('tujuan_penghasilan')->whereMonth('created_at', $bulanSekarang)
            ->whereYear('created_at', $tahunSekarang)
            ->get();

        // Hitung total quantity dan total price untuk data bulan ini
        $stockterjual = $pendapatanBulanIni->sum('total_quantity');
        $penjualanTerjual = $pendapatanBulanIni->sum('total_price');
        $targetPenjualan = $targetP->sum('tujuan_penghasilan');
        $pengeluaranT = $pengeluaranBulanIni->sum('price');

        $pendapatan_bersih = $penjualanTerjual - $pengeluaranT;

        //<!--akhir::target-->

        //  $request->validate([
        //     'key'                => 'required',
        //     'penghasilan'        => 'required',
        //     'stok_terjual'       => 'required',
        //     'pengeluaran'        => 'required',
        //     'penghasilan_bersih' => 'required',
        //  ]);
    
        // Mendapatkan tanggal dari input form
        $data = [
            'key'                => strtoupper($bulanSekarang1 . $tahunSekarang1),
            'penghasilan'        => $penjualanTerjual,
            'stok_terjual'       => $stockterjual,
            'pengeluaran'        => $pengeluaranT,
            'penghasilan_bersih' => $pendapatan_bersih,
        ];

        Laporan_pendapatan::where(['key' => $data['key']])->update([
            'penghasilan'        => $data['penghasilan'],
            'stok_terjual'       => $data['stok_terjual'],
            'pengeluaran'        => $data['pengeluaran'],
            'penghasilan_bersih' => $data['penghasilan_bersih'],
        ]);
        
    
        // Redirect atau lakukan tindakan lain sesuai kebutuhan
        return redirect()->route('settingsM')->with('success', 'Data berhasil disimpan.');

    }
}
