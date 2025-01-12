@extends('partials.master')
@section('main')
<div id="kt_app_toolbar" class="app-toolbar">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
        <div class="d-flex flex-stack flex-wrap gap-4 w-100">
            <div class="page-title d-flex flex-column gap-3 me-3">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Kullanıcı Yönetimi</h1>
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
                </ul>
            </div>
            <div class="d-flex align-items-center gap-3 gap-lg-5">
                <div class="m-0">
                    <button type="button" class="btn btn-flex btn-sm btn-color-gray-700 bg-body fw-bold px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                        <i class="fa-solid fa-floppy-disk"></i> Yeni Kullanıcı Ekle
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow-sm mt-4">
    <div class="card-header">
      <h3 class="card-title">Kullanıcı Filtreleme</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-3">
            <div class="mb-10">
              <label class="required form-label">Kullanıcı ID</label>
              <input type="text" class="form-control form-control-solid" id="search-user-id" name="search-user-id" placeholder="Kullanıcı Id Numarasını Giriniz..." />
            </div>
          </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Ad ve Soyad</label>
            <input type="text" class="form-control form-control-solid" id="search-user-fullname" name="search-user-fullname" placeholder="Kullanıcının Ad ve Soyadını Giriniz..." />
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Telefon Numarası</label>
            <input type="text" class="form-control form-control-solid" id="search-user-phone" name="search-user-phone" placeholder="Kullanıcının Telefon Numarasını Giriniz..." />
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">E-Posta Adresi</label>
            <input type="email" class="form-control form-control-solid" id="search-user-email" name="search-user-email" placeholder="Kullanıcının E-Posta Adresini Giriniz..." />
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Departman</label>
            <select class="form-select form-select-solid" id="search-user-department" name="search-user-department" data-control="select2" data-placeholder="Seçiniz...">
              <option></option>
              <option value="1">Aktif</option>
              <option value="2">Pasif</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Durum</label>
            <select class="form-select form-select-solid" id="search-user-status" name="search-user-status" data-control="select2" data-placeholder="Seçiniz...">
              <option></option>
              <option value="1">Aktif</option>
              <option value="2">Pasif</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">İşe Başlama Tarihi</label>
            <div class="input-group input-group-solid mb-5">
              <input type="date" class="form-control" id="search-start-date" aria-describedby="basic-addon1" />
              <input type="date" class="form-control" id="search-end-date" aria-describedby="basic-addon1" />
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <button class="btn btn-warning btn-sm float-end">
            <i class="fa-solid fa-filter"></i> Detaylı Filtreleme </button>
        </div>
      </div>
    </div>
  </div>
  <div class="card shadow-sm mt-4">
    <div class="card-header">
      <h3 class="card-title">Kullanıcı Listesi</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
          <thead>
            <tr class="fw-semibold fs-6 text-muted">
              <th>Id</th>
              <th>İsim Soyisim</th>
              <th>E-Posta</th>
              <th>Departman</th>
              <th>Durum</th>
              <th>İşe Başlama Tarihi</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td>$320,800</td>
              <td>
                <button class="btn btn-primary btn-sm">Detay</button>
                <button class="btn btn-danger btn-sm">Sil</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{-- Yeni Kullanıcı Ekle Modal --}}
  <div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Yeni Kullanıcı Ekleme Formu</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body">
              <form>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">Ad Soyad</label>
                            <input type="text" class="form-control form-control-solid" id="fullname" name="fullname" placeholder="Ad Soyad Giriniz..." />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                         <label class="required form-label">E-Posta Adresi</label>
                            <input type="text" class="form-control form-control-solid" id="email" name="email" placeholder="E-Posta Adresi Giriniz..." />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                         <label class="required form-label">Telefon Numarası</label>
                            <input type="text" class="form-control form-control-solid" id="phone" name="phone" placeholder="Telefon Numaranızı Giriniz..." />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                         <label class="required form-label">Departman Bilgisi</label>
                         <select class="form-select form-select-solid" id="departmentId" name="departmentId" data-control="select2" data-placeholder="Seçiniz...">
                            <option></option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                         <label class="required form-label">Durum</label>
                         <select class="form-select form-select-solid" id="statusId" name="statusId" data-control="select2" data-placeholder="Seçiniz...">
                            <option></option>
                            <option value="1">Aktif</option>
                            <option value="2">Pasif</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                         <label class="required form-label">İşe Başlama Tarihi</label>
                            <input type="date" class="form-control form-control-solid" id="startDate" name="startDate" placeholder="Adınızı Giriniz..." />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                         <label class="required form-label">Doğum Tarihi</label>
                            <input type="date" class="form-control form-control-solid" id="birthday" name="birthday" placeholder="Adınızı Giriniz..." />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                         <label class="required form-label">Şehir</label>
                         <select class="form-select form-select-solid" data-control="select2" id="city" name="city" data-placeholder="Seçiniz...">
                            <option></option>
                            <option value="1">Aktif</option>
                            <option value="2">Pasif</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                         <label class="required form-label">İlçe</label>
                         <select class="form-select form-select-solid" data-control="select2" id="district" name="district" data-placeholder="Seçiniz...">
                            <option></option>
                            <option value="1">Aktif</option>
                            <option value="2">Pasif</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                         <label class="required form-label">Parola</label>
                            <input type="text" class="form-control form-control-solid" id="password" name="password" placeholder="Parola Oluşturunuz..." />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10">
                         <label class="required form-label">Adres Bilgisi</label>
                         <textarea class="form-control form-control-solid" id="address" name="address" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                    <button type="button" id="addUserButton" name="addUserButton" class="btn btn-primary">Yeni Kullanıcı Oluştur</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
  <script>
    $(document).ready(function() {
    // Datatables
    $('#kt_datatable_zero_configuration').DataTable();

    // Yeni Müşteri Kaydet
    $('#addUserButton').click(function(e){
        e.preventDefault();
        // Form Veri Değerleri
        let fullname       = $('#fullname').val();
        let email          = $('#email').val(); ;
        let phone          = $('#phone').val(); ;
        let department_id  = $('#departmentId').val();
        let status_id      = $('#statusId').val();
        let start_date     = $('#startDate').val();
        let birthday       = $('#birthday').val();
        let city           = $('#city').val();
        let district       = $('#district').val();
        let password       = $('#password').val();
        let address        = $('#address').val();
        // Ajax İşlemi
        $.ajax({
            type:"POST",
            url:"/settings/users/store",
            data:{
                _token: '{{ csrf_token() }}',
                fullname       : fullname,
                email          : email,
                phone          : phone,
                department_id  : department_id,
                status_id      : status_id,
                start_date     : start_date,
                birthday       : birthday,
                city           : city,
                district       : district,
                password       : password,
                address        : address
            },
            success:function(response)
            {
                if(response.success == true)
            {
                console.log(response.message);
            }
            else{
                console.log(response.message);
            }
            }
        })
    })
    })
  </script>
  @endsection
