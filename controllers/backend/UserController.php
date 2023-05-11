<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\type;

class UserController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('auth');
    }
    public function AllUser() {
        $all=DB::table('users')
        ->get();
        
        
        return view('backend.user.all-user',compact('all'));
    }
    // AddUser,InsertUser
    public function AllUserIndex(){
        return view('backend.user.add_user');
    }
    public function InsertUser(Request $request){
       $data=array();
       $data['name']=$request->name;
       $data['email']=$request->email;
       $data['ppr']=$request->ppr;
       $data['role']=$request->role;
       $data['password']=Hash::make($request->password);
       $data['created_at']=date('Y-m-d H:i:s');
       $data['updated_at']=date('Y-m-d H:i:s');

       $insert = DB::table('users')->insert($data);
    //    if($insert){
    //     echo 'Successfull';
    //    }
    //    else{
    //     echo 'Something is wrong';
    //    }
    return redirect()->back()->with('message','user Added successfuly');

    }
    public function Edituser($id){
        $edit=DB::table('users')->where('id',$id)->first();
        return view('backend.user.edit-user',compact('edit'));
    }
    public function UpdateUser(Request $request,$id){
        $data=array();
       $data['name']=$request->name;
       $data['email']=$request->email;
       $data['ppr']=$request->ppr;
       $data['role']=$request->role;
       $data['password']=Hash::make($request->password);
       $data['created_at']=date('Y-m-d H:i:s');
       $data['updated_at']=date('Y-m-d H:i:s');

       $update = DB::table('users')
       ->where('id',$id)
       ->update($data);
    //    if($update){
    //     echo 'User updated successfully';
    //    }
    //    else{
    //     echo 'Something is wrong';
    //    }
    return redirect()->back()->with('message','user Update successfuly');
    }
    public function DeleteUser($id){
        $delete=DB::table('users')->where('id',$id)->delete();
        // if($delete){
        //     echo 'User deleted successfully';

        // }
        // else{
        //     'something went wrong';
        // }
    return redirect()->back()->with('message','user Deleted successfuly');

    }
    public function AllUserMaterial(){
        return view('backend.material.all-user-material');
    }


    public function AllType(){
    $data = Type::all();
    return view('backend.material.type',compact('data'));
    }

    public function AddType(Request $request){
        $data = new Type;
        $data->type_name=$request->type;
        $data->save();
        return redirect()->back()->with('message','type Added successfuly');

    }
    public function DeleteType($id){
        $data = Type::find($id);
        $data->delete();
        return redirect()->back()->with('message','type deleted successfuly');
}
}
