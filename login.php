<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php
$users = [
    "root"  => ["password" => "password", "name" => "管理員", "role" => "teacher"],
    "user1" => ["password" => "pw1", "name" => "小明",   "role" => "student"],
    "user2" => ["password" => "pw2", "name" => "小華",   "role" => "student"],
    "user3" => ["password" => "pw3", "name" => "小美",   "role" => "student"],
    "user4" => ["password" => "pw4", "name" => "小強",   "role" => "student"],
];
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $users[$username]['name'];
        $_SESSION['role'] = $users[$username]['role'];
        $redirect = isset($_GET['redirect']) ? urldecode($_GET['redirect']) : 'index.php';
        header("Location: $redirect");
        exit;
    } else {
        $error = '帳號或密碼錯誤';
    }
}
?>
        <h1>登入</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">帳號</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">密碼</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">登入</button>
        </form>
<?php include 'footer.php'; ?>
