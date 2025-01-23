@include('_partials.header', ['title' => 'Users'])

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col">
            {{-- <div class="mb-3 d-flex">
                <a href="{{ url('/manage/users/off') }}" class="btn btn-dark btn-sm"><i class="ti ti-user-off"> User OFF</i>
                    ( <span id="inactiveCount" class="fw-bold"></span> )
                </a>
            </div> --}}
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TABLE USER</h6>
                    {{-- @if ($user->UserRole->RoleName == 'admin') --}}
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-info shadow-sm btn-sm" data-bs-toggle="modal"
                                data-bs-target="#ModalTambah">
                                <i class='bx bx-user-plus' ></i> TAMBAH USER
                            </button>
                        </div>
                    {{-- @endif --}}
                </div>
                <div class="card-body">

                    {{-- Alert --}}
                    @if (session()->exists('alert'))
                        <div class="alert alert-{{ session()->get('alert') ['bg'] }} alert-dismissible fade show" role="alert">
                            {{ session()->get('alert') ['message'] }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error )
                                {{ $error }}
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                    @endif
     
                   <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTables" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name Lengkap</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Role Name</th>
                                    <th>Nama Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ========== Modal form tambah User  ==========
--}}
<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Form Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>

            <form action="{{ url('/create/users') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="Username" placeholder="Input Username" value="{{ old('Username') }}" required>
                        <label for="">Username*</label>
                        @error('Username')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="PasswordHash" placeholder="Input Password" required>
                        <label for="">Password*</label>
                        @error('PasswordHash')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="NameIdentifier" placeholder="Masukan Nama Lengkap" value="{{ old('NameIdentifier') }}" required>
                        <label for="">Nama Lengkap*</label>
                        @error('NameIdentifier')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input type="email" class="form-control" name="Email" placeholder="eyx@example.com" value="{{ old('Email') }}" required>
                        <label for="">Email*</label>
                        @error('Email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input type="number" min="0" class="form-control" name="PhoneNumber" placeholder="628123456789" value="{{ old('PhoneNumber') }}"required>
                        <label for="">Phone*</label>
                    </div>
                    {{-- <div class="form-group form-floating mb-3">
                        <select name="RoleId" id="RoleId" class="form-control @error('RoleId') is-invalid @enderror">
                            <option selected disabled {{ old('RoleId') ? '' : 'selected' }}>- Pilih Role -</option>
                            @foreach ($Role as $data)
                                <option value="{{ $data->RoleId }}" {{ old('RoleId') == $data->RoleId ? 'selected' : '' }}> {{ $data->RoleName }} </option>
                            @endforeach
                        </select>
                        <label for="">Role*</label>
                        @error('RoleId')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    {{-- <div class="form-group form-floating mb-3">
                        <select name="NamaLokasi" id="NamaLokasi" class="form-control @error('NamaLokasi') is-invalid @enderror fw-bold" required style="width: 100%;">
                            <option selected disabled {{ old('NamaLokasi') ? '' : 'selected' }}>- Nama Lokasi -</option>
                                @foreach ($MstLokasi as $data)
                                    <option value="{{ $data->NamaLokasi }}" {{ old('NamaLokasi') == $data->NamaLokasi ? 'selected' : '' }}> {{ $data->NamaLokasi }} </option>
                                @endforeach
                        </select>
                        <label for="NamaLokasi">Nama Lokasi<span class="text-danger">*</span></label>
                        @error('NamaLokasi')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success shadow-sm"><i class='bx bx-save' ></i> Save</button>
                    <button type="reset" class="btn btn-outline-danger shadow-sm"><i class='bx bx-reset' ></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('_partials.footer')