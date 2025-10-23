<?php
// session_start();
require_once '../pdo.php';
require_once '../check-account.php';
require_once '../helpers.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // دریافت داده‌های فرم
    $post_id = $_POST['post_id'];
    $product_name = $_POST['product_name'];
    $price = (int)$_POST['price'];
    $quantity = (int)$_POST['quantity'];  // تعداد محصول
    $receiver_name = $_POST['receiver_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $plaque = $_POST['plaque'];
    $floorUnit=$_POST['floor_unit'];
    $total_price = $price * $quantity;  // محاسبه قیمت کل
    $user_email = $_SESSION['user'];

    // فرض بر این است که پرداخت موفق است
    $payment_successful = true;

    if ($payment_successful) {
        // ذخیره سفارش در دیتابیس
        $query = "INSERT INTO orders (
                    post_id, product_name, quantity, price, total_price,
                    receiver_name, phone, address, plaque,floor_unit,
                    user_email, delivery_status
                  )
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([
            $post_id,
            $product_name,
            $quantity,
            $price,
            $total_price,
            $receiver_name,
            $phone,
            $address,
            $plaque,
            $floorUnit,
            $user_email,
            'pending'  // وضعیت تحویل: در انتظار
        ]);

        echo "<h2>هنوز درگاه پرداختی وجود ندارد✅</h2>";
        echo "<p>کد سفارش: " . $pdo->lastInsertId() . "</p>";
    } else {
        echo "<h2>پرداخت انجام نشد ❌</h2>";
    }
} else {
    echo "درخواست نامعتبر است.";
}
?>
