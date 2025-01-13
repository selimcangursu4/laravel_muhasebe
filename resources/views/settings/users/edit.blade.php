@extends('partials.master')
@section('main')
<div id="kt_app_toolbar" class="app-toolbar">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
        <div class="d-flex flex-stack flex-wrap gap-4 w-100">
            <div class="page-title d-flex flex-column gap-3 me-3">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Kullanıcı Detayı</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                        <a href="../dist/index.html" class="text-gray-500">
                            <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                    </li>
                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Ayarlar</li>
                    <li class="breadcrumb-item">
                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                    </li>
                    <li class="breadcrumb-item text-gray-500">Kullanıcı Yönetimi</li>
                    <li class="breadcrumb-item">
                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                    </li>
                    <li class="breadcrumb-item text-gray-500">Kullanıcı Detayı</li>
                    <li class="breadcrumb-item">
                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                    </li>
                    <li class="breadcrumb-item text-gray-500">{{$user->id}}</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-3 gap-lg-5">
                <div class="m-0">
                    <button type="button" class="btn btn-flex btn-sm btn-color-gray-700 bg-body fw-bold px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                        <i class="fa-solid fa-floppy-disk"></i> Bilgileri Güncelle
                    </button>
                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Sil</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow-sm mt-3">
    <div class="card-header">
        <h3 class="card-title">Kullanıcı Profili</h3>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <strong>İsim Soyisim:</strong> {{$user->name}}
            </li>
            <li class="list-group-item">
                <strong>E-Posta Adresi:</strong> {{$user->email}}
            </li>
            <li class="list-group-item">
                <strong>Telefon Numarası:</strong>  {{$user->phone}}
            </li>
            <li class="list-group-item">
                <strong>Departman Bilgisi:</strong>  {{$user->department_id}}
            </li>
            <li class="list-group-item">
                <strong>Durum:</strong>  @if ($user->status_id == 1) Aktif @elseif ($user->status_id == 2) Pasif @endif
            </li>
            <li class="list-group-item">
                <strong>İşe Başlama Tarihi:</strong>  {{$user->start_date}}
            </li>
            <li class="list-group-item">
                <strong>İş Sonlandırma Tarihi:</strong> {{$user->end_date}}
            </li>
            <li class="list-group-item">
                <strong>Doğum Tarihi:</strong> {{$user->birth_date}}
            </li>
            <li class="list-group-item">
                <strong>Şehir / İlçe:</strong> {{$user->city_id}} / {{$user->district_id}}
            </li>
            <li class="list-group-item">
                <strong>Adres Bilgisi:</strong> {{$user->address}}
            </li>
        </ul>
    </div>
</div>
<div class="card shadow-sm mt-3">
    <div class="card-header">
        <h3 class="card-title">Kullanıcı Parola Güncelle</h3>
    </div>
    <div class="card-body">
        <div class="mb-10">
            <label class="required form-label">Yeni Parola Oluştur</label>
            <input type="text" class="form-control" placeholder="********"/>
        </div>
        <div class="mb-10">
            <label class="required form-label">Yeni Parola Tekrarla</label>
            <input type="text" class="form-control" placeholder="********"/>
        </div>
        <div class="mb-10">
           <button class="btn btn-primary btn-sm float-end"><i class="fa-solid fa-floppy-disk"></i> Parolayı Güncelle</button>
        </div>
    </div>
</div>
<div class="card shadow-sm mt-3">
    <div class="card-header">
        <h3 class="card-title">Kullanıcı Giriş Denemeleri</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Id</th>
                        <th>Giriş Tarihi</th>
                        <th>Durum</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#kt_datatable_zero_configuration").DataTable();
    })
</script>
@endsection
