<?php
// ===== config.php =====
// session_start();

// اگر از فرم زبانی انتخاب شده، ذخیره در سشن
if (isset($_POST['lang'])) {
    $_SESSION['lang'] = $_POST['lang'];
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// تعیین زبان جاری (پیش‌فرض فارسی)
$langCode = $_SESSION['lang'] ?? 'fa';

// لود فایل ترجمه استاتیک‌ها
include_once "lang_$langCode.php";

// تابع ترجمه خودکار با Google Translate
function translateText($text, $targetLang = 'en', $sourceLang = 'auto') {
    $text = urlencode($text);
    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=$sourceLang&tl=$targetLang&dt=t&q=$text";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $responseArray = json_decode($response, true);
    return $responseArray[0][0][0] ?? $text;
}
?>