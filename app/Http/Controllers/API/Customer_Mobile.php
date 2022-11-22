<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Customer_mobile_Model;

class Customer_Mobile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =Customer_mobile_Model::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validater=Validator::make($request->all(),[
            'url'=>'required'
        ]);
        if ($validater->fails()) {
            return response()->json([
                'status'=>400,
                'error'=>$validater->messages()
            ]);

        }
        else
        {
              $Customer_mobile_Model= new Customer_mobile_Model;
              $Customer_mobile_Model->Mobile_number= $request->Mobile_number;
              $Customer_mobile_Model->Email= $request->Email;
              $Customer_mobile_Model->User_Name= $request->User_Name;
              $Customer_mobile_Model->Customercode= $request->Customercode;



              $Customer_mobile_Model->save();
              return response()->json([
                'status'=>200,
                'message'=>'Added Successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Customer_mobile_Model= Customer_mobile_Model::find($id);
        if ($Customer_mobile_Model) {
            return response()->json([
                'status'=>200,
                'data'=>$Customer_mobile_Model
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Not Found'
            ]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $Customer_mobile_Model= Customer_mobile_Model::find($id);
        if ($data) {
          $validater=Validator::make($request->all(),[
              'url'=>'required'
          ]);
          $Customer_mobile_Model->Mobile_number= $request->Mobile_number;
          $Customer_mobile_Model->Email= $request->Email;
          $Customer_mobile_Model->User_Name= $request->User_Name;
          $Customer_mobile_Model->update();
          return response()->json([
            'status'=>200,
            'error'=>$validater->messages(),
            'message'=>'Update Successfully'
        ]);
      }
      else{
          return response()->json([
              'status'=>404,
              'message'=>'Not Found'
          ]);

      }

    }
    function allerdy_mobile($mobile){

        $data = DB::table('Customer_mobilenumbers')->where('Mobile_number',$mobile)->get();
        if (count($data) > 0 ) {
            return response()->json([
                'status'=>1,
                'message'=>'Data Found'
            ]);

        }
        else{
            return response()->json([
                'status'=>0,
                'message'=>'Data Not Found'
            ]);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $Customer_mobile_Model= Customer_mobile_Model::find($id);
    $Customer_mobile_Model->delete();
    return response()->json([
        'status'=>200,
        'message'=>'Delete Successfully'
    ]);
    }
}
