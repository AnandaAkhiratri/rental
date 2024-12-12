<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Loan;
use App\Models\Reversion;
use Illuminate\Http\Request;

class ReversionController extends Controller
{
    public function index()
    {
        $data = [
            'content' => 'admin/return/index'
        ];
        $dt = (auth()->user()->role == "USR") ? Reversion::with(['loan.car','loan.user' => function($query){
            return $query->where('id',auth()->user()->id);
        }])->get() : Reversion::with('loan.car','loan.user')->get();
        $title = "Return";
        // Kirim data ke view
        return view('admin.layouts.wrapper',$data, compact('dt','title'));
    }

    public function create()
    {
        $data = [
            'content' => 'admin/return/forms'
        ];
        $title = "Return";
        $loan = Loan::with('user','car')->where('status','On Going')->get();
        return view('admin.layouts.wrapper',$data, compact('loan','title'));
    }

    public function store(Request $request){
        $data = $request->validate([
            "loan_id" => "required",
            "returned_at" => "required"
        ]);
        $reversion = Reversion::create($data);
        if ($reversion) {
            $loan = Loan::find($reversion->loan_id);
            $loan->update(["status" => "Finished"]);
            Car::where('id',$loan->car_id)->update(["status" => "Available"]);
        }
        return redirect(route('return.index'))->with('success',"Pengembalian berhasil dilakukan");
    }
}
