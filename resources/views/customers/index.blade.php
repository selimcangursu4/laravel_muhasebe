@extends('partials.master')
@section('main')
<div id="kt_app_toolbar" class="app-toolbar">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
      <div class="d-flex flex-stack flex-wrap gap-4 w-100">
        <div class="page-title d-flex flex-column gap-3 me-3">
          <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Müşteri Yönetimi</h1>
          <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
              <a href="../dist/index.html" class="text-gray-500">
                <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
              </a>
            </li>
            <li class="breadcrumb-item">
              <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Müşteri ve Tedarikçi</li>
            <li class="breadcrumb-item">
              <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-500">Müşteri Yönetimi</li>
          </ul>
        </div>
        <div class="d-flex align-items-center gap-3 gap-lg-5">
          <div class="m-0">
            <button type="button" class="btn btn-flex btn-sm btn-color-gray-700 bg-body fw-bold px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
              <i class="fa-solid fa-floppy-disk"></i> Yeni Müşteri Ekle </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card shadow-sm mt-4">
    <div class="card-header">
      <h3 class="card-title">Müşteri Filtreleme</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Müşteri Kodu</label>
            <input type="text" class="form-control form-control-solid" id="search-customer-id" name="search-customer-id" placeholder="Müşteri Kodunu Giriniz.." />
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Müşteri Ad Soyad</label>
            <input type="text" class="form-control form-control-solid" id="search-customer-fullname" name="search-customer-fullname" placeholder="Müşteri Adı Soyadı Giriniz" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Telefon Numarası</label>
            <input type="text" class="form-control form-control-solid" id="search-customer-phone" name="search-customer-phone" placeholder="Müşteri Telefon Numarasını Giriniz..." />
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">E-Posta Adresi</label>
            <input type="email" class="form-control form-control-solid" id="search-customer-email" name="search-customer-email" placeholder="Kullanıcı E-Posta Adresi Giriniz.." />
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Cinsiyet</label>
            <select class="form-select form-select-solid" data-control="select2" id="search-customer-gender" name="search-customer-gender" data-placeholder="Seçiniz">
              <option></option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Durum</label>
            <select class="form-select form-select-solid" data-control="select2" id="search-customer-status" name="search-customer-status" data-placeholder="Seçiniz.">
              <option></option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Müşteri Tipi</label>
            <select class="form-select form-select-solid" data-control="select2" id="search-customer-type" name="search-customer-type" data-placeholder="Seçiniz.">
              <option></option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="mb-10">
            <label class="required form-label">Kayıt Tarihi</label>
            <div class="input-group input-group-solid mb-5">
              <input type="date" class="form-control" id="search-start-date" name="search-start-date" aria-describedby="basic-addon1" />
              <input type="date" class="form-control" id="search-end-date" name="search-end-date" aria-describedby="basic-addon1" />
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <button id="filterCustomerButton" type="button" class="btn btn-warning btn-sm float-end">Detaylı Filtrele</button>
        </div>
      </div>
    </div>
  </div>
  <div class="card shadow-sm mt-4">
    <div class="card-header">
      <h3 class="card-title">Müşteri Listesi</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
          <thead>
            <tr class="fw-semibold fs-6 text-muted">
              <th>#</th>
              <th>Müşteri Tipi</th>
              <th>İsim Soyisim</th>
              <th>Telefon Numarası</th>
              <th>E-Posta Adresi</th>
              <th>Cinsiyet</th>
              <th>Durum</th>
              <th>Kayıt Tarihi</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<script>
    $(document).ready(function(){
    $("#kt_datatable_zero_configuration").DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            type: "POST",
            url: "{{ route('customers.fetch') }}",
            data: function(d) {
                d.search_customer_id         = $('#search-customer-id').val();
                d.search_customer_fullname   = $('#search-customer-fullname').val();
                d.search_customer_phone      = $('#search-customer-phone').val();
                d.search_customer_email      = $('#search-customer-email').val();
                d.search_customer_gender     = $('#search-customer-gender').val();
                d.search_customer_status     = $('#search-customer-status').val();
                d.search_customer_type       = $('#search-customer-type').val();
                d.search_customer_start_date = $('#search-start-date').val();
                d.search_customer_end_date   = $('#search-end-date').val();
            }
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'customer_type_id', name: 'customer_type_id' },
            { data: 'fullname', name: 'fullname' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { data: 'gender_id', name: 'gender_id' },
            { data: 'status_id', name: 'status_id' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' , render:function(data,type,row){
                return `<button class="btn btn-primary btn-sm">Detay</button>`
            }},
        ]
    });
});

</script>
@endsection
