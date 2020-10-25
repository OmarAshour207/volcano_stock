<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\Input;
use Validator;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {

        $datas = Region::with('city')->orderBy('id','desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('name', function(Region $data) {
                return $data->name;
            })
            ->editColumn('parent', function(Region $data) {
                return $data->parent_id != null ? $data->city->name : 'Parent';
            })
            ->editColumn('price', function(Region $data) {
                return $data->price;
            })
            ->addColumn('action', function(Region $data) {
                return '<div class="action-list"><a data-href="' . route('admin-regions-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-regions-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.regions.index');
    }

    //*** GET Request
    public function create()
    {
        $cities = City::orderBy('name', 'desc')->get();
        return view('admin.regions.create', compact('cities'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = ['name' => 'unique:regions'];
        $customs = ['name.unique' => 'This region already Entered.'];
        $validator = Validator::make(Input::all(), $rules, $customs);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        Region::create($request->only('name', 'parent_id', 'price'));
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return redirect()->route('admin-regions-index')->with($msg);
//        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Region::findOrFail($id);
        $cities = City::orderBy('name', 'desc')->get();

        return view('admin.regions.edit', compact('data', 'cities'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section

        $rules = ['name' => 'unique:cities,name,'.$id];
        $customs = ['name.unique' => 'This Name has already been taken.'];
        $validator = Validator::make(Input::all(), $rules, $customs);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Region::findOrFail($id);
        $data->update($request->only('name', 'parent_id', 'price'));
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Region::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

}
