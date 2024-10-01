<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Cuti;
use App\Models\Karyawan;
use App\Models\SaldoCuti;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard(){
        $jml_karyawan = Karyawan::count();
        $jml_cuti_diterima  = Cuti::where('status', 'Diterima')->count();
        $jml_cuti_ditolak =Cuti::where('status', 'Ditolak')->count();

        return view('pages.dashboard', compact('jml_karyawan', 'jml_cuti_diterima', 'jml_cuti_ditolak'));
    }

    public function index()
    {
        $karyawan = SaldoCuti::join('employees', 'time_offs_saldo.employee_id', 'employees.id')
            ->select('employees.*', 'time_offs_saldo.timeoff_saldo as saldo_cuti')
            ->get();

        return view('pages.karyawan', [
            'data' => $karyawan
        ])->with('success', 'Data Mahasiswa Ditemukan');
    }

    // Fungsi untuk menghitung saldo cuti
    private function hitungSaldoCuti($tanggalMulaiKerja) {
        // Hitung selisih waktu antara tanggal mulai kerja dengan tanggal hari ini
        $tanggalSekarang = \Carbon\Carbon::now();
        $tanggalMulaiKerja = \Carbon\Carbon::parse($tanggalMulaiKerja)->format('Y-m-d');

        // Hitung masa kerja dalam bulan
        $masaKerjaDalamBulan = $tanggalSekarang->diffInMonths($tanggalMulaiKerja);

        // Tentukan saldo cuti berdasarkan masa kerja
        if ($masaKerjaDalamBulan <= 6) {
            return 0; // Jika masa kerja 0 hingga 6 bulan
        } elseif ($masaKerjaDalamBulan > 6 && $masaKerjaDalamBulan <= 11) {
            return 6; // Jika masa kerja lebih dari 6 bulan hingga 11 bulan
        } else {
            return 12; // Jika masa kerja lebih dari 12 bulan
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->updateSaldoCuti();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSaldoCuti()
    {
        $karyawan = Karyawan::all();

        foreach ($karyawan as $k) {
            // Hitung saldo cuti
            $saldoCuti = $this->hitungSaldoCuti($k->join_date);

            // Log::info("Saldo cuti yang dihitung untuk karyawan ID {$k->id}: {$saldoCuti}");

            SaldoCuti::updateOrCreate(
                ['employee_id' => $k->id],
                ['timeoff_saldo' => $saldoCuti]
            );

        }

        return redirect()->back()->with('success', 'Saldo cuti semua karyawan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
