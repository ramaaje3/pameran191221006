<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Driver;
use App\Status;
use App\Vehicle;
use Carbon\Carbon;
use App\Exports\LoanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::get()->where('status_id', '2');
        return view('loan.list', compact('loans'));
    }

    public function pendingLoan()
    {
        $loans = Loan::get()->where('status_id', '1');
        return view('loan.pending', compact('loans'));
    }

    public function rejectedLoan()
    {
        $loans = Loan::get()->where('status_id', '3');
        return view('loan.rejected', compact('loans'));
    }

    public function indexOwner()
    {
        $loans = Loan::get()->where('status_id', '1');
        return view('loan.owner', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::orderBy('nama')->get();
        $vehicles = Vehicle::orderBy('jenis')->get();
        return view('loan.create', compact('drivers', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'tgl_pinjam' => 'required|date',
            'batas_waktu' => 'required|date',
        ]);


        $tgl_pinjam = Carbon::createFromFormat('Y-m-d', $request->tgl_pinjam);
        $batas_waktu = Carbon::createFromFormat('Y-m-d', $request->batas_waktu);

        $loan = new Loan();

        $loan->driver_id = $request->driver_id;
        $loan->vehicle_id = $request->vehicle_id;
        $loan->tgl_pinjam = $tgl_pinjam->format('Y-m-d');
        $loan->batas_waktu = $batas_waktu->format('Y-m-d');

        $loan->save();

        return redirect()->route('loan.pendingLoan')->with('message', 'Loan added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan, $id)
    {
        $loan = Loan::findorfail($id);
        $status = Status::orderBy('nama')->where('id', '>', 1)->get();

        return view('loan.edit', compact('loan', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loan = Loan::findorfail($id);
        $request->validate([
            'status_id' => 'required',
        ]);

        $loan->status_id = $request->status_id;

        $loan->save();

        return redirect()->route('loan.indexOwner')->with('message', 'Loan update successfully!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loans = Loan::findorFail($id);
        $loans->delete();

        return redirect()->route('loan.pendingLoan',)->with('message', 'Loan deleted successfully!');    
    }

    public function export(Request $request)
    {
        $data = Loan::get()->where('status_id', '2');
        return Excel::download(new LoanExport($data), 'Loan.xlsx');
    }

}
