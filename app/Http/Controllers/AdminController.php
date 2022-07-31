<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\specialty;

class AdminController extends Controller
{
    
    //*********************************************************************************** */
    //DOCTORS
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor=new doctor;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->specialty=$request->specialty;
        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function showappointment()
    {
        $data = appointment::paginate(5);
        return view('admin.showappointment', compact('data'));
    }

    public function approved($id)
    {
        $data=Appointment::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();
    }

    public function canceled($id)
    {
        $data=Appointment::find($id);
        $data->status='Canceled';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor()
	{
        $data = doctor::paginate(5);
		return view('admin.showdoctor', compact('data'));
	}

    public function deletedoctor($id)
    {
        $data = doctor::find($id);
        
        unlink("doctorimage/".$data->image);
        Doctor::where("id", $data->id)->delete();
        //return back()->with("success", "Image deleted successfully.");
        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $specialty = specialty::all();
        $data = doctor::find($id);
        $imagenamepublic = $data->image;
        session(['imagenamepublic' => $imagenamepublic]);
        return view('admin.update_doctor', compact('data','specialty'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->specialty = $request->specialty;
        $doctor->room = $request->room;
        $image = $request->file;
        if($image)
        {
            $imagenamepublic1 = session('imagenamepublic');
            unlink("doctorimage/".$imagenamepublic1);
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image = $imagename;
        }
        
        $doctor->save();
        return redirect()->back()->with('message','Doctor updated successfully');
    }
}