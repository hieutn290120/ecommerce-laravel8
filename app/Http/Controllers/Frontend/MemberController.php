<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MbRegisRequest;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\AccRequest;
use App\Models\User;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function register()
    {
        return view('frontend.member.register');
    }
    public function getRegister(MbRegisRequest $request)
    {
        $data = $request->all();
        $data['password']= bcrypt($request->get('password'));
        $file = $request->file('avatar');
        $data['avatar'] = $file->getClientOriginalName();
        $data['level'] = 0;
        if(User::create($data)){
            $file->move('upload/image_register',$file->getClientOriginalName());
            return redirect('/member-login');
        }else{
            return redirect()->back()->withErrors('Error! An error occurred. Please try again');
        }
    }
    public function login()
    {
        return view('frontend.member.login');
    }
    public function getLogin(Request $request)
    {
        $login = [
            'email' => $request->email,
            'password'=> $request->password,
            'level' => 0,
        ];
        if(Auth::attempt($login)){
            return redirect()->to('/');
        }else{
            return redirect()->back()->withErrors('Error! An error occurred. Please try again');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->to('member-login');
    }
    public function account()
    {
        return view('frontend.account');
    }
    public function updateAccount(AccRequest $request)
    {
        $id = Auth::id();
        $usUpdate = User::findOrFail($id);
        $result = $request->all();
        $file = $request->file('avatar');
        if(!empty($file)){
            $result['avatar'] = $file->getClientOriginalName();
        }
        if($result['password']){
            $result['password'] = bcrypt($result['password']);
        }else{
            $result['password'] = $usUpdate->password;
        }
        if($usUpdate->update($result)){
            if(!empty($file)){
                $file->move('upload/image_accUpdate',$file->getClientOriginalName());
            }
            return response()->json($usUpdate->update($result),201);
        }else{
            return redirect()->back()->withErrors('Update profile error');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
