<x-admin-header />
<div class="row align-items-center justify-content-center" style="height: 90vh;">
    <div class="card col-md-4">
        <div class="card-body">
            <div class="mt-2 text-center">
                <img src="assets/img/logo/logo.png" alt="" width="40%">
            </div>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="text" name="email">
                </div>
                <div class="form-group">
                    <label>Password <span class="text-danger">*</span></label>
                    <div class="pass-group">
                        <input type="password" name="password" class=" pass-input">
                        <span class="fas toggle-password fa-eye-slash"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Role <span class="text-danger">*</span></label>
                    <select class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="role">
                        <option value="Student">Student</option>
                        <option value="Staff">Staff</option>
                    </select>
                </div>
                @if ($errors->any())
                    <div class="">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-12">
                    <button class="btn btn-submit w-100">Login</button>
                </div>

            </form>
        </div>
    </div>
</div>
<x-admin-footer />
