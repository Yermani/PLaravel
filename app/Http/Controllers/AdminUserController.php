<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminUserController extends Controller
{
    
	//-------------------------------------   User  par  admin -------------------------

    public function adminShowUsers()
    {
        
        $users=\App\Models\User::with('roles')->get();
      	return view('admin.adminShowUsers',compact('users'));
    }

    public function adminAddUser()
    {
    	$roles=\App\Models\Role::all();
        return view('admin.adminAddUser',compact('roles'));
    }

    public function adminAddUserPost(Request $request)
    {
    	

        $userSameEmail=\App\Models\User::where('email',$request->email)->first();
        if (isset($userSameEmail) )
        {
            return redirect()->back()->with('ErrorMessage','Email  existe déjà');
        }


        $user= new \App\Models\User();

        $user->name=$request['name'];
    	$user->email=$request['email'];
    	$user->password=\Hash::make($request['password']);
        $user->actif=$request['actif'];
        $user->naissance=$request['naissance'];
        $user->tel=$request['tel'];
       
        $user->cin=$request['cin'];
        $user->passport=$request['passport'];
        $user->cnss=$request['cnss'];
        $user->banque=$request['banque'];
        $user->rib=$request['rib'];

       
    	$user->save();

    	$user->roles()->sync($request->roles);

       

    	return redirect()->route('adminShowUsers')->with('SuccessMessage','Employé ajouté avec succès ');
    }

    public function adminEditUser($id)
    {
    	$user=\App\Models\User::with('roles')->where('id',$id)->first();
    	$roles=\App\Models\Role::all();
       return view('admin.adminEditUser',compact('user','roles'));
    }

    public function adminEditUserPost(Request $request)
    {
    	
          
    	$user=\App\Models\User::where('id',$request->id)->first();

        
        if ($user->name<>$request->name)
        {
            $securite= new \App\Models\Securite();
            $securite->date=\Carbon\Carbon::now();
            $securite->niveau="moyen";
            $securite->type="Edition";
            $securite->alerte=" ";
            $securite->user_id=\Auth::user()->id;
            $securite->nomtable="users";
            $securite->nomelement="Name";
            $securite->element=$user->name."(".$user->ref.")";
            $securite->ancien=$user->name;
            $securite->nouveau=$request->name;

            $securite->save();
        }

      
    
        $userSameEmail=\App\Models\User::where('email',$request->email)->where('email','<>',$user->email)->first();
       
        if (isset($userSameEmail) )
        {
            return redirect()->back()->with('ErrorMessage','Email ou Matricule existe déjà');
        }

        $user->name=$request['name'];
    	$user->email=$request['email'];
        if ($request['password']<>"") $user->password=\Hash::make($request['password']);
       $user->actif=$request['actif'];
      

        $user->naissance=$request['naissance'];
        $user->tel=$request['tel'];
      
       
        $user->cin=$request['cin'];
        $user->passport=$request['passport'];
        $user->cnss=$request['cnss'];
        $user->banque=$request['banque'];
        $user->rib=$request['rib'];

      

     	$user->update();

    	$user->roles()->sync($request->roles);
       
    	return redirect()->route('adminShowUsers')->with('SuccessMessage','Employé mis à jour avec succès ');
    }

    public function adminDeleteUser($id)
    {
    	$user=\App\Models\User::find($id);
    	return view('admin.adminDeleteUser',compact('user'));
    }

    public function adminDeleteUserPost(Request $request)
    {
    	
    	$user=\App\Models\User::where('id',$request->id)->first();
        $user->roles()->sync([]);
    	$user->delete();

    	return redirect()->route('adminShowUsers');
    }

  

//-------------------------------------   Role    -------------------------

    public function adminShowRoles()
    {
    	$roles=\App\Models\Role::with('permissions')->get();
      	return view('admin.adminShowRoles',compact('roles'));
    }

    public function adminAddRole()
    {
    	$permissions=\App\Models\Permission::all();
    	return view('admin.adminAddRole',compact('permissions'));
    }

    public function adminAddRolePost(Request $request)
    {
    	$role= new \App\Models\Role();
    	$role->name=$request['name'];
    	$role->display_name=$request['display_name'];
    	$role->description=$request['description'];
    	$role->save();

    	$role->permissions()->sync($request->permissions);

    	return redirect()->route('adminShowRoles');
    }

    public function adminEditRole($id)
    {
    	$role=\App\Models\Role::with('permissions')->where('id',$id)->first();
    	$permissions=\App\Models\Permission::all();
    	return view('admin.adminEditRole',compact('role','permissions'));
    }

    public function adminEditRolePost(Request $request)
    {
    	
    	$role=\App\Models\Role::where('id',$request->id)->first();
    	//$role->name=$request['name'];
    	$role->display_name=$request['display_name'];
    	$role->description=$request['description'];
    	$role->update();

    	$role->permissions()->sync($request->permissions);

    	return redirect()->route('adminShowRoles');
    }

    public function adminDeleteRole($id)
    {
    	$role=\App\Models\Role::find($id);
        $UsersHasRole=\App\Models\User::whereRoleIs([$role->name])->get();
    	return view('admin.adminDeleteRole',compact('role','UsersHasRole'));
    }

    public function adminDeleteRolePost(Request $request)
    {
    	
    	$role=\App\Models\Role::where('id',$request->id)->first();
    	$role->delete();

    	return redirect()->route('adminShowRoles');
    }


//-------------------------------------   Permission    -------------------------

    public function adminShowPermissions()
    {
    	$permissions=\App\Models\Permission::all();
      	return view('admin.adminShowPermissions',compact('permissions'));
    }

    public function adminAddPermission()
    {
    	return view('admin.adminAddPermission');
    }

    public function adminAddPermissionPost(Request $request)
    {
    	$permission= new \App\Models\Permission();
    	$permission->name=$request['name'];
    	$permission->display_name=$request['display_name'];
    	$permission->description=$request['description'];
    	$permission->save();

    	return redirect()->route('adminShowPermissions');
    }

    public function adminEditPermission($id)
    {
    	$permission=\App\Models\Permission::where('id',$id)->first();
    	return view('admin.adminEditPermission',compact('permission'));
    }

    public function adminEditPermissionPost(Request $request)
    {
    	
    	$permission=\App\Models\Permission::where('id',$request->id)->first();
    	$permission->name=$request['name'];
    	$permission->display_name=$request['display_name'];
    	$permission->description=$request['description'];
    	$permission->update();

    	return redirect()->route('adminShowPermissions');
    }

    public function adminDeletePermission($id)
    {
    	$permission=\App\Models\Permission::find($id);
    	return view('admin.adminDeletePermission',compact('permission'));
    }

    public function adminDeletePermissionPost(Request $request)
    {
    	
    	$permission=\App\Models\Permission::where('id',$request->id)->first();
    	$permission->delete();

    	return redirect()->route('adminShowPermissions');
    }

}
