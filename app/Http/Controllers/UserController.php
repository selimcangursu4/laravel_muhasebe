<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use App\Models\DepartmentsModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    // Kullanıcılar İndex Sayfası
    public function view()
    {
        $departments = DepartmentsModel::where('status_id','=',1);
        return view('settings.users.view',compact('departments'));
    }

    // Kullanıcı Oluşturma
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
        $password        = $request->input('password');
        $bcrypt_password = Hash::make($password);

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

            // Başarılı İşlem Durumunu Dön
            return response()->json(['success'=>true, 'message'=>'Kullanıcı Başarıyla Oluşturuldu']);

        } catch (Exception $error) {

            // Hata İşlem Durumunu Dön
            return response()->json(['success'=>false, 'message'=>'Kullanıcı Oluşturulamadı Hata' . ' ' . $error->getMessage()]);
        }
    }

    // Kullanıcıların View Sayfası Datatables Listelenmesi
    public function fetch(Request $request)
    {
        $users = User::query();

        if ($request->has('user_id') && $request->input('user_id') !== null) {
            $users->where('id', $request->input('user_id'));
        }

        if ($request->has('fullname') && $request->input('fullname') !== null) {
            $users->where('name', 'LIKE', '%' . $request->input('fullname') . '%');
        }

        if ($request->has('email') && $request->input('email') !== null) {
            $users->where('email', 'LIKE', '%' . $request->input('email') . '%');
        }

        if ($request->has('phone') && $request->input('phone') !== null) {
            $users->where('phone', 'LIKE', '%' . $request->input('phone') . '%');
        }

        if ($request->has('department_id') && $request->input('department_id') !== null) {
            $users->where('department_id', $request->input('department_id'));
        }

        if ($request->has('status_id') && $request->input('status_id') !== null) {
            $users->where('status_id', $request->input('status_id'));
        }

        if ($request->has('start_date') && $request->input('start_date') !== null) {
            $users->where('start_date', '>=', $request->input('start_date'));
        }

        if ($request->has('end_date') && $request->input('end_date') !== null) {
            $users->where('start_date', '<=', $request->input('end_date'));
        }

        return datatables()->of($users)->make(true);
    }

    // Kullanıcı Detay Sayfası
    public function edit(Request $request , $id)
    {
        $user        = User::find($id);
        $departments = DepartmentsModel::where('status_id','=',1);

        return view('settings.users.edit',compact('user','departments'));
    }

    // Kullanıcı Bilgilerini Güncelleme
    public function update(Request $request)
    {
        try {
        // Formdan Gelen Değerler
        $user_id       = $request->input('user_id');
        $fullname      = $request->input('fullname');
        $email         = $request->input('email');
        $phone         = $request->input('phone');
        $department_id = $request->input('department_id');
        $status_id     = $request->input('status_id');
        $start_date    = $request->input('start_date');
        $created_at    = $request->input('created_at');
        $birthday      = $request->input('birthday');
        $city_id       = $request->input('city_id');
        $district_id   = $request->input('district_id');
        $address       = $request->input('address');

        $user = User::where('id','=',$user_id);

        $user->update([
            'name'          => $fullname,
            'email'         => $email,
            'phone'         => $phone,
            'department_id' => $department_id,
            'status_id'     => $status_id,
            'start_date'    => $start_date,
            'created_at'    => $created_at,
            'birth_date'    => $birthday,
            'city_id'       => $city_id,
            'district_id'   => $district_id,
            'address'       => $address,
        ]);
           //Güncelleme Başarılı Mesajı
           return response()->json(['success'=>true, 'message'=>'Kullanıcı Bilgileri Güncellendi']);
        } catch (Exception $error) {
            // Güncelleme Başarısız Mesajı
           return response()->json(['success'=>false, 'message'=>'Kullanıcı Bilgileri Güncellenemedi Hata' .''. $error->getMessage()]);
        }

    }

    // Kullanıcı Silme Post İşlemi
    public function delete(Request $request)
    {
        try {

            $user_id     = $request->input('user_id');
            $delete_user = User::where('id','=',$user_id);
            $delete_user->delete();

            // Silme Başarılı Mesajı
            return response()->json(['success'=> true, 'message'=>"Kullanıcı Başarıyla Silindi"]);

        } catch (Exception $error) {

            // Silme Başarısız Mesajı
            return response()->json(['success'=> true, 'message'=>"Kullanıcı Silinemedi" . ' ' . $error->getMessage()]);

        }
    }

    // Kullanıcıyı Pasife Al
    public function is_active(Request $request)
    {
        try {
            $user_id     = $request->input('user_id');
            $delete_user = User::where('id', '=', $user_id)->update(['status_id' => 0]);

            // Silme Başarılı Mesajı
            return response()->json(['success' => true, 'message' => "Kullanıcı Başarıyla Pasife Alındı"]);

        } catch (Exception $error) {
            // Silme Başarısız Mesajı
            return response()->json(['success' => false, 'message' => "Kullanıcı Pasife Alınamadı" . ' ' . $error->getMessage()]);
        }
    }

    // Kullanıcı Parolası Güncelleme
    public function password_update(Request $request)
    {
        try {
            $password        = $request->input('password');
            $newPassword     = bcrypt($password);
            $user_id         = $request->input('user_id');
            $update_password = User::where('id', '=', $user_id)->update(['password' => $newPassword]);

            // Parola Güncelleme Başarılı Mesajı
            return response()->json(['success' => true, 'message' => "Kullanıcı Parolası Başarıyla Güncellendi"]);

        } catch (Exception $error) {
            // Parola Güncelleme Başarısız Mesajı
            return response()->json(['success' => false, 'message' => "Kullanıcı Parolası Güncellenemedi " . ' ' . $error->getMessage()]);
        }
    }


}
