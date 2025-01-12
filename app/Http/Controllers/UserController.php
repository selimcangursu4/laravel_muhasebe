<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view()
    {
        return view('settings.users.view');
    }

    public function store(Request $request)
    {
        try {

        // Formdan Gelen Değerler
        $fullname        = $request->input('fullname');
        $email           = $request->input('email');
        $phone           = $request->input('phone');
        $department_id   = $request->input('department_id');
        $status_id       = $request->input('status_id');
        $start_date      = $request->input('start_date');
        $birthday        = $request->input('birthday');
        $city_id         = $request->input('city');
        $district_id     = $request->input('district');
        $address         = $request->input('address');
        $password        = $request->input('passwrod');
        $bcrypt_password = bcrypt($password);

        // Veritabanına Kayıt Ekle
        $user                = new User();
        $user->name          = $fullname;
        $user->email         = $email;
        $user->phone         = $phone;
        $user->department_id = $department_id;
        $user->status_id     = $status_id;
        $user->start_date    = $start_date;
        $user->birth_date    = $birthday;
        $user->city_id       = $city_id;
        $user->district_id   = $district_id;
        $user->address       = $address;
        $user->password      = $bcrypt_password;
        $user->save();

           return response()->json(['success'=>true, 'message'=>'Kullanıcı Başarıyla Oluşturuldu']);

        } catch (Exception $error) {

            return response()->json(['success'=>false, 'message'=>'Kullanıcı Oluşturulamadı Hata' . $error->getMessage()]);
        }
    }


}
