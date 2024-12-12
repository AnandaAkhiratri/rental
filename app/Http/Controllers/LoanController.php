<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $data = [
            'content' => 'admin/rent/index'
        ];
        $dt = (auth()->user()->role == "USR") ? Loan::with('car','user')->where("user_id",auth()->user()->id)->get() : Loan::with('car','user')->get();
        $title = "Rent";
        // Kirim data ke view
        return view('admin.layouts.wrapper',$data, compact('dt','title'));
    }
    
    public function create()
    {
        $data = [
            'content' => 'admin/rent/forms'
        ];
        $title = "Rent";
        $type = "create";
        $cars = Car::where('status','Available')->get();
        // Kirim data ke view
        return view('admin.layouts.wrapper',$data, compact('type','cars','title'));
    }
    
    public function edit($id)
    {
        $data = [
            'content' => 'admin/rent/forms'
        ];
        $loan = Loan::with('car')->find($id);
        $title = "Rent";
        $type = "edit";
        $cars = Car::where('status','Available')->get();
        return view('admin.layouts.wrapper',$data, compact('type','cars','loan','title'));
    }

    public function store(Request $request){
        $data = $request->validate([
            "car_id" => "required",
            "loan_at" => "required",
            "days" => 'required|numeric'
        ]);
        $data["status"] = "Waiting";
        $data["user_id"] = auth()->user()->id;
        $loan = Loan::create($data);
        if ($loan) {
            Car::where('id',$loan->car_id)->update(["status" => "Not Available"]);
        }
        return redirect(route('rent.index'))->with('success',"Berhasil melakukan penyewaan");
    }
    
    public function update(Request $request,$id){
        $loan = Loan::find($id);
        $data = $request->validate([
            "loan_at" => "required",
            "days" => 'required|numeric'
        ]);
        if ($request->car_id) {
            $data["car_id"] = $request->car_id;
            Car::where('id',$request->car_id)->update(["status" => "Not Available"]);            
            Car::where('id',$loan->car_id)->update(["status" => "Available"]);            
        }
        $loan = $loan->update($data);
        return redirect(route('rent.index'))->with('success',"Berhasil memperbaharui penyewaan");
    }

    public function delete($id){
        $loan = Loan::find($id);
        Car::where('id',$loan->car_id)->update(["status" => "Available"]);
        $loan->delete();
        return redirect()->back()->with('success','Data penyewaan berhasil dihapus');
    }

    public function updateStatus(Request $request,Loan $loan){
        $loan->update(["status" => $request->status]);
        if ($request->status == "Cancelled") {
            Car::where('id',$loan->car_id)->update(["status" => "Available"]);
        }
        return redirect()->back()->with('success','Status berhasil diperbaharui');
    }

    public function getCar(Car $car){
        return response()->json([
            "success" => true,
            "img" => asset('storage/'.$car->image)
        ]);
    }
}
