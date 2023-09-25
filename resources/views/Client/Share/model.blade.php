<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="loginForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng Nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input autocomplete="off" class="form-control" id="username" name="email" type="email"
                            required="" placeholder="Nhập Email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required="" type="password" name="password" id="password"
                            placeholder="Nhập Mật Khẩu">
                    </div>
                    <div class="login_footer form-group">
                        <a type="button" id="viewRegister">Tạo tài khoản ?</a>
                        <a href="/reset">Quên mật khẩu?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-fill-out btn-block">Đăng nhập</button>
                    </div>


                </div>
            </form>
            <form id="registerForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" name="ho_ten" id="ho_ten"
                            placeholder="Nhập Họ Tên">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Nhập Email">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="so_dien_thoai" id="so_dien_thoai"
                            placeholder="Nhập Số Điện Thoại">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password"" placeholder="Nhập Mật Khẩu">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="re_password" placeholder="Nhập Lại Mật Khẩu">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="dia_chi" placeholder="Nhập Địa Chỉ">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="sex" id="sex">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="login_footer form-group">
                            <a type="button" id="viewLogin">Đăng nhập</a>
                        <a href="/reset">Quên mật khẩu ?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-fill-out btn-block">Đăng Ký</button>
                    </div>

                </div>

            </form>
            {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
        </div>
    </div>
</div>


{{-- <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng Ký Tài Khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="registerForm">
                    <div class="form-group">
                        <input type="text" class="form-control" name="ho_ten" id="ho_ten"
                            placeholder="Nhập Họ Tên">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Nhập Email">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="so_dien_thoai" id="so_dien_thoai"
                            placeholder="Nhập Số Điện Thoại">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password"" placeholder="Nhập Mật Khẩu">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="re_password"
                            placeholder="Nhập Lại Mật Khẩu">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="dia_chi" placeholder="Nhập Địa Chỉ">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="sex" id="sex">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="login_footer form-group">
                        <div class="chek-form">
                            <div class="form-note text-center"><a class="btn" id="viewLogin">Đăng nhập</a></div>
                        </div>
                        <a href="/reset">Quên mật khẩu ?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-fill-out btn-block">Đăng Ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
