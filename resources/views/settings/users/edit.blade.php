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
                    <button type="button" id="removeUserButton" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Sil</button>
                    @if ($user->status_id == 1)
                    <button type="button" id="deleteUserButton" class="btn btn-dark btn-sm"><i class="fa-solid fa-trash-can"></i> Kullanıcı İşten Çıkar</button>
                    @endif
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
            <input type="text" id="newPassword" name="newPassword" class="form-control" placeholder="********"/>
        </div>
        <div class="mb-10">
            <label class="required form-label">Yeni Parola Tekrarla</label>
            <input type="text" id="newPasswordRepeat" name="newPasswordRepeat" class="form-control" placeholder="********"/>
        </div>
        <div class="mb-10">
           <button id="updateUserPassword" class="btn btn-primary btn-sm float-end"><i class="fa-solid fa-floppy-disk"></i> Parolayı Güncelle</button>
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
{{-- Kullanıcı Bilgileri Güncelleme Modal --}}
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Kullanıcı Bilgilerini Güncelle</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <div class="modal-body">
               <form>
                @csrf
                <div class="row">
                    <div class="col-md-12" style="display: none">
                        <div class="mb-10">
                            <label class="required form-label">Kullanıcı Id</label>
                            <input type="text" class="form-control form-control-solid" id="user_id" name="user_id" value="{{$user->id}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">İsim Soyisim</label>
                            <input type="text" class="form-control form-control-solid" id="fullname" name="fullname" value="{{$user->name}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">E-Posta Adresi</label>
                            <input type="email" class="form-control form-control-solid" id="email" name="email" value="{{$user->email}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">Telefon Numarası</label>
                            <input type="text" class="form-control form-control-solid" id="phone" name="phone" value="{{$user->phone}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">Departman Bilgisi</label>
                            <select class="form-select form-select-solid" id="department_id" name="department_id" data-control="select2" data-placeholder="Seçiniz...">
                                <option value="1">1</option>
                                {{-- @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        @if ($user->department_id == $department->id) selected @endif>
                                        {{ $department->name }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">Durum</label>
                            <select class="form-select form-select-solid" data-control="select2" id="status_id" name="status_id" data-placeholder="Seçiniz...">
                                <option></option>
                                <option value="1" @if ($user->status_id == 1) selected @endif>Aktif</option>
                                <option value="0" @if ($user->status_id == 0) selected @endif>Pasif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">İşe Başlangıç Tarihi</label>
                            <input type="date" class="form-control form-control-solid" id="start_date" name="start_date" value="{{$user->start_date}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">Doğum Tarihi</label>
                            <input type="date" class="form-control form-control-solid" id="birthday" name="birthday" value="{{$user->birth_date}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">Kayıt Oluşturma Tarihi</label>
                            <input type="date" class="form-control form-control-solid" id="created_at" name="created_at" value="{{$user->created_at}}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">Şehir</label>
                            <select class="form-select form-select-solid" id="city_id" name="city_id" data-control="select2" data-placeholder="Seçiniz...">
                                <option></option>
                                <option value="1">Aktif</option>
                                <option value="2">Pasif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label class="required form-label">İlçe</label>
                            <select class="form-select form-select-solid" id="district_id" name="district_id" data-control="select2" data-placeholder="Seçiniz...">
                                <option></option>
                                <option value="1">Aktif</option>
                                <option value="2">Pasif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="required form-label">Adres Bilgisi</label>
                            <textarea class="form-control form-control-solid" id="address" name="address" rows="3">{{$user->address}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                    <button type="button" id="updateUserButton" class="btn btn-primary">Güncelle</button>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
        	// Giriş Log Kayıtları Datatables
        	$("#kt_datatable_zero_configuration").DataTable();
        	// Kullanıcı Bilgilerini Güncelle
        	$('#updateUserButton').click(function(e) {
        		e.preventDefault();
        		// Kullanıcı Bilgileri Güncelleme İnput Verileri

        		let user_id       = $('#user_id').val();
        		let fullname      = $('#fullname').val();
        		let email         = $('#email').val();
        		let phone         = $('#phone').val();
        		let department_id = $('#department_id').val();
        		let status_id     = $('#status_id').val();
        		let start_date    = $('#start_date').val();
        		let birthday      = $('#birthday').val();
        		let created_at    = $('#created_at').val();
        		let city_id       = $('#city_id').val();
        		let district_id   = $('#district_id').val();
        		let address       = $('#address').val();

        		// Ajax İşlemi
        		$.ajax({
        			type: "POST",
        			url: "/settings/users/update",
        			data: {
        				user_id: user_id,
        				fullname: fullname,
        				email: email,
        				phone: phone,
        				department_id: department_id,
        				status_id: status_id,
        				start_date: start_date,
        				birthday: birthday,
        				created_at: created_at,
        				city_id: city_id,
        				district_id: district_id,
        				address: address,
        				_token: "{{csrf_token()}}"
        			},
        			success: function(response) {
        				// Kullanıcı Bilgilerinin Güncellenmesi Durumu
        				if (response.success == true) {
        					console.log(response.message);
        					Swal.fire({
        						title: "Başarılı",
        						text: response.message,
        						icon: "success",
        						showCancelButton: true,
        						confirmButtonColor: "#3085d6",
        						cancelButtonColor: "#d33",
        						confirmButtonText: "Tamam!",
        						cancelButtonText: "Kapat!",
        					}).then((result) => {
        						if (result.isConfirmed) {
        							window.location.reload();
        						}
        					});
        				} else {
        					// Kullanıcı Ekleme Başarısız Olma Durumu
        					console.log(response.message);
        					Swal.fire({
        						title: "Hata",
        						text: response.message,
        						icon: "danger",
        						showCancelButton: true,
        						confirmButtonColor: "#3085d6",
        						cancelButtonColor: "#d33",
        						confirmButtonText: "Tamam!",
        						cancelButtonText: "Kapat!",
        					})
        				}
        			}
        		})
        	})
        	// Kullanıcıyı Sil
        	$('#removeUserButton').click(function(e) {
        		e.preventDefault();
        		Swal.fire({
        			title: "Dikkat",
        			text: "Silmek İstediğinize Emin misiniz ?",
        			icon: "warning",
        			showCancelButton: true,
        			confirmButtonColor: "#3085d6",
        			cancelButtonColor: "#d33",
        			confirmButtonText: "Evet,Sil !"
        		}).then((result) => {
        			if (result.isConfirmed) {
        				// Silinecek Kullanıcı
        				let user_id = $('#user_id').val();
        				$.ajax({
        					type: "POST",
        					url: "/settings/users/delete",
        					data: {
        						user_id: user_id,
        						_token: "{{csrf_token()}}"
        					},
        					success: function(response) {
        						if (response.success == true) {

        							console.log(response.message);
        							Swal.fire({
        								title: "Başarılı",
        								text: response.message,
        								icon: "success",
        								showCancelButton: true,
        								confirmButtonColor: "#3085d6",
        								cancelButtonColor: "#d33",
        								confirmButtonText: "Tamam!",
        								cancelButtonText: "Kapat!",
        							}).then((result) => {
        								if (result.isConfirmed) {
        									window.location.href = '/settings/users/view';
        								}
        							});

        						} else {
        							// Kullanıcı Ekleme Başarısız Olma Durumu
        							console.log(response.message);
        							Swal.fire({
        								title: "Hata",
        								text: response.message,
        								icon: "danger",
        								showCancelButton: true,
        								confirmButtonColor: "#3085d6",
        								cancelButtonColor: "#d33",
        								confirmButtonText: "Tamam!",
        								cancelButtonText: "Kapat!",
        							})
        						}
        					}
        				})
        			}
        		});
        	})
        	// Kullanıcıyı İşten Çıkar
        	$('#deleteUserButton').click(function(e) {
        		e.preventDefault();
        		Swal.fire({
        			title: "Dikkat",
        			text: "Kullanıcı Silinmeyecektir Sadece Pasife Alınacaktır, Onaylıyormusun ?",
        			icon: "warning",
        			showCancelButton: true,
        			confirmButtonColor: "#3085d6",
        			cancelButtonColor: "#d33",
        			confirmButtonText: "Evet,Pasife Al !"
        		}).then((result) => {
        			if (result.isConfirmed) {
        				// Silinecek Kullanıcı
        				let user_id = $('#user_id').val();
        				$.ajax({
        					type: "POST",
        					url: "/settings/users/is-active",
        					data: {
        						user_id: user_id,
        						_token: "{{csrf_token()}}"
        					},
        					success: function(response) {
        						if (response.success == true) {

        							console.log(response.message);
        							Swal.fire({
        								title: "Başarılı",
        								text: response.message,
        								icon: "success",
        								showCancelButton: true,
        								confirmButtonColor: "#3085d6",
        								cancelButtonColor: "#d33",
        								confirmButtonText: "Tamam!",
        								cancelButtonText: "Kapat!",
        							}).then((result) => {
        								if (result.isConfirmed) {
        									window.location.href = '/settings/users/view';
        								}
        							});

        						} else {
        							// Kullanıcı Ekleme Başarısız Olma Durumu
        							console.log(response.message);
        							Swal.fire({
        								title: "Hata",
        								text: response.message,
        								icon: "danger",
        								showCancelButton: true,
        								confirmButtonColor: "#3085d6",
        								cancelButtonColor: "#d33",
        								confirmButtonText: "Tamam!",
        								cancelButtonText: "Kapat!",
        							})
        						}
        					}
        				})
        			}
        		});
        	})
        	// Parola Güncelleme
        	$('#updateUserPassword').click(function(e) {
        		e.preventDefault();

        		let user_id           = $('#user_id').val();
        		let password          = $('#newPassword').val();
        		let newPasswordRepeat = $('#newPasswordRepeat').val();

        		if (password == newPasswordRepeat) {
        			$.ajax({
        				type: "POST",
        				url: "/settings/users/password/update",
        				data: {
        					user_id: user_id,
        					password: password,
        					newPasswordRepeat: newPasswordRepeat,
        					_token: "{{csrf_token()}}"
        				},
        				success: function(response) {
        					if (response.success == true) {

        						console.log(response.message);
        						Swal.fire({
        							title: "Başarılı",
        							text: response.message,
        							icon: "success",
        							showCancelButton: true,
        							confirmButtonColor: "#3085d6",
        							cancelButtonColor: "#d33",
        							confirmButtonText: "Tamam!",
        							cancelButtonText: "Kapat!",
        						}).then((result) => {
        							if (result.isConfirmed) {
        								window.location.reload();
        							}
        						});
        					} else {
        						Swal.fire({
        							icon: "error",
        							title: "Oops...",
        							text: response.message,
        						});
        					}
        				}
        			})
        		} else {
        			Swal.fire({
        				position: "top-end",
        				icon: "warning",
        				title: "Şifreler Uyuşmuyor Lütfen Tekrar Dene",
        				showConfirmButton: false,
        				timer: 1500
        			});

        		}
        	})
         })
</script>
@endsection
