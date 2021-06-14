<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //proteger rutas con middleware por medio del cosntructor
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index'); //especificamos la ruta para para los permisos que tiene
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.edit')->only('edit', 'update', 'show'); //solo los autorizados con este permiso podran acceder a estas vistas
        $this->middleware('can:users.destroy')->only('destroy');

    }
    public function index()
    {
        $users = User::paginate(5); //Cada 5 registros de usuarios se cambia de página
        return view('users.index', compact('users'));
    }

    public function create()
    {
    
        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        
        //Validación de usuario 
        // $request->validate([
        //     'name' => 'required|min:3|max:5',
        //     'username' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required'
        // ]);
        $user = User::create($request->only('name', 'username', 'email')
            + [
                'password' => bcrypt($request->input('password')),
            ]);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario creado correctamente');
    }

    public function show(User $user)
    {
        // $user = User::findOrFail($id);
        // dd($user);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UserEditRequest $request, User $user)
    {
        // $user=User::findOrFail($id);
        $data = $request->only('name', 'username', 'email');
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        // if(trim($request->password)=='')
        // {
        //     $data=$request->except('password');
        // }
        // else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }
        
        //$user->roles()->sync($request->roles);
        $role =  $user->roles;
        
        if(count($role) > 0){
            $role_id = $role[0]->id;
            User::find($user->id)->roles()->updateExistingPivot($role_id,['role_id' => $request->get('role')]);
        }else{
            $user->assignRole($request->get('role'));
        }
        
        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('succes', 'Usuario eliminado correctamente');
    }
}
