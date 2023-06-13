
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manajemen Staff</h1>
<p class="mb-4">
    Halaman ini digunakan untuk mengelola staff
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Staff</h6>
    </div>
    <form action="staff_insert.php" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="username" id="username" required placeholder="Masukan username" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" id="password" required placeholder="Masukan password" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="password" class="form-control" name="confirm-password" id="confirm-password" required placeholder="Masukan password" autocomplete="off">
            </div>
            <div class="error-register-container" style="margin-top: 10px; margin-bottom: 10px;">
                <span class="error-register-message" id="error-register-message" style="color: red;"></span>
            </div>
            <div class="form-group">
                <label>Role:</label>
                <select name="role" id="role" class="form-control">
                    <option value='admin'>Admin</option>
                    <option value='staff'>Staff</option>
                </select>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" name="staff-register" id="register-button" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="dashboard.php?menu=staff" class="btn btn-warning">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            

        </div>
    </form>

    <!-- Register Validation -->
    <script>
            const usernameInput = document.getElementById('username');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirm-password');
            const roleInput = document.getElementById('role')
            const errorRegisterMessage = document.getElementById('error-register-message');
            const registerButton = document.getElementById('register-button');

            function validatePassword() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                if (password !== confirmPassword) {
                    errorRegisterMessage.textContent = "Password tidak sesuai";
                } else {
                    errorRegisterMessage.textContent = "";
                }
            }

            function validateUsername() {
                const username = usernameInput.value;
                var regex = /^[a-zA-Z0-9]+$/;
                
                if (regex.test(username)) {
                    errorRegisterMessage.textContent = '';
                } else {
                    errorRegisterMessage.textContent = 'Username hanya bisa mengandung huruf dan angka';
                } 
                }

            function validateRole() {
                const role = roleInput.value;

                if (role === '') {
                    registerButton.disabled = true;
                } else {
                    registerButton.disabled = false;
                }
            }
            
            
            usernameInput.addEventListener('input', validateUsername);
            passwordInput.addEventListener('input', validatePassword);
            confirmPasswordInput.addEventListener('input', validatePassword);
            roleInput.addEventListener('change', validteRole);
    </script>

</div>

</div>

