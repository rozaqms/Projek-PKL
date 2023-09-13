<?php

namespace App\Http\Controllers;

use App\Models\Manage;
use App\Models\Menu;
use App\Models\Laporan_pendapatan;
use App\Models\Pengeluaran;
use App\Models\Pendapatan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    public function users(){
        $manages = Manage::all();
        return view('pages.users',compact('manages'),[
            "title" => "Users"
        ]);
    }

    public function settings(){
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

        // Pastikan $targetPenjualan tidak null dan bukan nol sebelum melakukan pembagian
        if (!is_null($targetPenjualan) && $targetPenjualan != 0) {
            $persentaseTerjual = ($penjualanTerjual / $targetPenjualan) * 100;
        } else {
            $persentaseTerjual = 0; // Atur ke 0 jika $targetPenjualan adalah null atau nol untuk menghindari pembagian oleh nol.
        }
        //<!--akhir::target-->

        return view('pages.manage', compact('bulanSekarang1','tahunSekarang','targetPenjualan','penjualanTerjual','stockterjual','pengeluaranT','pendapatan_bersih'),[
            "title" => "Manage"
        ]);
    }

    public function show($name){
        $profile = Manage::where('name',$name)->get();

        return view('profile.profile',compact('profile'),[
        "title" => "Profile"
        ]);
    }

    public function showMy($name){
    $profile = Manage::where('name',$name)->get();

    return view('profile.profile', ['title' => 'My Profile']);
    }

    public function aturtarget(Request $request)
    {
        $bulanSekarang1 = now()->format('M');
        $tahunSekarang1 = now()->format('y');
        // Validasi data jika diperlukan
        $request->validate([
            'tujuan_penghasilan' => 'required',
        ]);
    
        // Mendapatkan tanggal dari input form
        $data = [
            'Key' => strtoupper($bulanSekarang1 . $tahunSekarang1),
            'tujuan_penghasilan' => $request->tujuan_penghasilan,
        ];
    

        Laporan_pendapatan::updateOrCreate(
            ['key' => $data['Key']],
            ['tujuan_penghasilan' => $data['tujuan_penghasilan']]
        );
    
        // Redirect atau lakukan tindakan lain sesuai kebutuhan
        return redirect()->route('settingsM')->with('success', 'Data berhasil disimpan.');
    }

}
