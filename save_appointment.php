<?php
function showResultPage(string $title, string $message, string $type = 'success'): void
{
    $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    $className = $type === 'success' ? 'success' : 'error';

    echo <<<HTML
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$safeTitle} — LAPA</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="status-page">
    <main class="status-wrapper">
        <section class="status-card {$className}">
            <span class="status-icon"></span>
            <h1>{$safeTitle}</h1>
            <p>{$safeMessage}</p>
            <a class="btn" href="index.php#booking">Вернуться на сайт</a>
        </section>
    </main>
</body>
</html>
HTML;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    showResultPage('Не удалось отправить заявку', 'Проверьте данные и попробуйте снова', 'error');
    exit;
}

require_once __DIR__ . '/includes/db.php';

if (!$pdo) {
    showResultPage('Не удалось отправить заявку', 'Проверьте подключение к базе данных и попробуйте снова', 'error');
    exit;
}

$ownerName = trim($_POST['owner_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$petName = trim($_POST['pet_name'] ?? '');
$petType = trim($_POST['pet_type'] ?? '');
$breed = trim($_POST['breed'] ?? '');
$service = trim($_POST['service'] ?? '');
$appointmentDate = trim($_POST['appointment_date'] ?? '');
$appointmentTime = trim($_POST['appointment_time'] ?? '');
$comment = trim($_POST['comment'] ?? '');
$privacyAgreement = isset($_POST['privacy_agreement']);

$requiredFields = [$ownerName, $phone, $petName, $petType, $service, $appointmentDate, $appointmentTime];

foreach ($requiredFields as $field) {
    if ($field === '') {
        showResultPage('Не удалось отправить заявку', 'Проверьте данные и попробуйте снова', 'error');
        exit;
    }
}

if (!$privacyAgreement) {
    showResultPage('Не удалось отправить заявку', 'Нужно согласиться на обработку персональных данных', 'error');
    exit;
}

$allowedPetTypes = ['Собака', 'Кошка'];
$allowedServices = [
    'Комплексный груминг',
    'Стрижка',
    'Мытьё и сушка',
    'Вычёсывание',
    'Уход за когтями',
    'Гигиенический уход',
];
$allowedTimes = ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];

if (!in_array($petType, $allowedPetTypes, true) || !in_array($service, $allowedServices, true) || !in_array($appointmentTime, $allowedTimes, true)) {
    showResultPage('Не удалось отправить заявку', 'Проверьте данные и попробуйте снова', 'error');
    exit;
}

$date = DateTime::createFromFormat('Y-m-d', $appointmentDate);
$today = new DateTime('today');

if (!$date || $date->format('Y-m-d') !== $appointmentDate || $date < $today) {
    showResultPage('Не удалось отправить заявку', 'Выберите корректную дату записи', 'error');
    exit;
}

try {
    $stmt = $pdo->prepare(
        'INSERT INTO appointments
        (owner_name, phone, pet_name, pet_type, breed, service, appointment_date, appointment_time, comment, privacy_agreement)
        VALUES
        (:owner_name, :phone, :pet_name, :pet_type, :breed, :service, :appointment_date, :appointment_time, :comment, :privacy_agreement)'
    );

    $stmt->execute([
        ':owner_name' => $ownerName,
        ':phone' => $phone,
        ':pet_name' => $petName,
        ':pet_type' => $petType,
        ':breed' => $breed !== '' ? $breed : null,
        ':service' => $service,
        ':appointment_date' => $appointmentDate,
        ':appointment_time' => $appointmentTime,
        ':comment' => $comment !== '' ? $comment : null,
        ':privacy_agreement' => $privacyAgreement,
    ]);

    showResultPage('Заявка успешно отправлена', 'Мы свяжемся с вами для подтверждения записи', 'success');
} catch (PDOException $e) {
    showResultPage('Не удалось отправить заявку', 'Проверьте данные и попробуйте снова', 'error');
}
