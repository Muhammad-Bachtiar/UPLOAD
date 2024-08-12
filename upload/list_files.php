<?php
session_start();

$upload_dir = "uploads/";

// Cek jika direktori ada dan dapat diakses
if (!is_dir($upload_dir)) {
    echo "Direktori tidak ditemukan.";
    exit;
}

// Ambil semua file dari direktori
$files = array_diff(scandir($upload_dir), array('.', '..'));

// Ambil pesan dari sesi
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar File Unggahan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Daftar File Unggahan</h1>
        <?php if ($message): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <?php if (empty($files)): ?>
            <p>Tidak ada file yang diunggah.</p>
        <?php else: ?>
            <ul class="file-list">
                <?php foreach ($files as $file): ?>
                    <li>
                        <a href="<?php echo $upload_dir . $file; ?>" target="_blank">
                            <?php echo htmlspecialchars($file); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <a class="btn-back" href="index.html">Kembali</a>
    </div>

    
    
</body>
</html>
