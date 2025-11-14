<?php
require_once 'config.php';

if(is_logged_in()) {
    redirect('dashboard.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = clean_input($_POST['name']);
    $email = clean_input($_POST['email']);
    $password = password_hash(clean_input($_POST['password']), PASSWORD_DEFAULT);
    $role = clean_input($_POST['role']);
    $phone = clean_input($_POST['phone']);
    $address = clean_input($_POST['address']);
    $division = clean_input($_POST['division']);
    
    
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);
    
    if(mysqli_num_rows($result) > 0) {
        set_alert('danger', 'Email sudah terdaftar!');
    } else {
        $sql = "INSERT INTO users (name, email, password, role, phone, address, division, join_date) 
                VALUES ('$name', '$email', '$password', '$role', '$phone', '$address', '$division', CURDATE())";
        
        if(mysqli_query($conn, $sql)) {
            set_alert('success', 'Registrasi berhasil! Silakan login.');
            redirect('login.php');
        } else {
            set_alert('danger', 'Registrasi gagal!');
        }
    }
}

require_once 'header.php';
?>

<main class="container">
    <div class="form-container">
        <h2 style="text-align: center; margin-bottom: 2rem;">Daftar Akun</h2>
        
        <?php $alert = get_alert(); if($alert): ?>
            <div class="alert alert-<?php echo $alert['type']; ?>">
                <?php echo $alert['message']; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="role-selector">
                <div class="role-option">
                    <input type="radio" id="roleAdmin" name="role" value="admin">
                    <label for="roleAdmin"> Admin</label>
                </div>
                <div class="role-option">
                    <input type="radio" id="roleAnggota" name="role" value="anggota" checked>
                    <label for="roleAnggota"> Anggota</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="division">Jabatan</label>
                <select id="division" name="division" required>
                    <option value="">Pilih Jabatan</option>
                    <option value="Ketua">Ketua </option>
                    <option value="Wakil Ketua">Wakil Ketua</option>
                    <option value="Sekertaris">Sekertaris</option>
                    <option value="Pendahara">Pendahara</option>
                    <option value="Anggota">Anggota</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-success" style="width: 100%;">Daftar</button>
        </form>
        
        <p style="text-align: center; margin-top: 1rem;">
            Sudah punya akun? <a href="login.php">Masuk di sini</a>
        </p>
    </div>
</main>

<?php require_once 'footer.php'; ?>