<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use App\Models\SaldoCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all();

        $cuti = Cuti::join('employees', 'time_offs.employee_id', 'employees.id')
            ->select('employees.id', 'employees.name', 'time_offs.start_date', 'time_offs.end_date', 'time_offs.status', 'time_offs.reason')
            ->get();

        return view('pages.cuti', [
            'karyawan' => $karyawan,
            'data'=> $cuti
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'karyawan' =>'required|exists:employees,id',
                'date_range' => 'required',
                'keterangan' => 'required'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validate->errors()->first(),
                ], 422);
            }

            // \Log::info('Request data: ', $request->all());

            $dateRange = $request->input('date_range');

            // Pisahkan tanggal mulai dan akhir
            list($startDate, $endDate) = explode(' - ', $dateRange);

            // Validasi tanggal (opsional)
            $startDate = Carbon::createFromFormat('Y-m-d', trim($startDate)); // gunakan Y-m-d
            $endDate = Carbon::createFromFormat('Y-m-d', trim($endDate)); // gunakan Y-m-d

            $jumlahHariCuti = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) + 1;

            $saldo = SaldoCuti::where('employee_id', $request->karyawan)->pluck('timeoff_saldo')->first();
            // dd($saldo);
            if ($saldo >= $jumlahHariCuti) {
                Cuti::create([
                    'employee_id' => $request->karyawan,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'reason' => $request->keterangan,
                    'status' => 'Diterima'
                ]);

                $newSaldo = $saldo - $jumlahHariCuti;
                // dd($newSaldo);

                // $saldo = $newSaldo;
                $saldo_karyawan = SaldoCuti::where('employee_id', $request->karyawan)->first();
                // dd($saldo_karyawan);

                $saldo_karyawan-> timeoff_saldo = $newSaldo;

                $saldo_karyawan->save();

                return response()->json(['status' => 'success', 'message' => 'Cuti karyawan disetujui']);
            }else{
                Cuti::create([
                    'employee_id' => $request->karyawan,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'reason' => $request->keterangan,
                    'status' => 'Ditolak'
                ]);
                return response()->json(['status' => 'error', 'message' => 'Saldo cuti anda sudah habis']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Data gagal ditambahkan: ' . $e->getMessage()], 500);
        }
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
