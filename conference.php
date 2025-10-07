<?php include 'auth.php'; ?>
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php
$fee = 0;
$morning = isset($_POST['morning']) ? 1 : 0;
$afternoon = isset($_POST['afternoon']) ? 1 : 0;
$lunch = isset($_POST['lunch']) ? 1 : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SESSION['role'] == 'teacher') {
        $fee = 0;
    } elseif ($_SESSION['role'] == 'student') {
        $fee = ($morning * 150) + ($afternoon * 100) + ($lunch * 50);
    }
}
?>
        <h1>資管一日營報名</h1>
        <p>歡迎您，<?php echo htmlspecialchars($_SESSION['name']); ?>！</p>
        <form method="POST" action="">
            <div class="mb-3">
                <label>參加場次：</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="morning" id="morning" <?php echo $morning ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="morning">上午場 (150 元)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="afternoon" id="afternoon" <?php echo $afternoon ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="afternoon">下午場 (100 元)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="lunch" id="lunch" <?php echo $lunch ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="lunch">午餐 (50 元)</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">計算費用</button>
        </form>
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <div class="alert alert-info mt-3">
                費用：<?php echo $fee; ?> 元
            </div>
        <?php endif; ?>
<?php include 'footer.php'; ?>
