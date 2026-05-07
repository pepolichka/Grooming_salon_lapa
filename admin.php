<?php
require_once __DIR__ . '/includes/db.php';

$appointments = [];
$loadError = false;

if ($pdo) {
    try {
        $stmt = $pdo->query('SELECT * FROM appointments ORDER BY created_at DESC');
        $appointments = $stmt->fetchAll();
    } catch (PDOException $e) {
        $loadError = true;
    }
} else {
    $loadError = true;
}

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки — LAPA</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="admin-page">
    <header class="admin-header">
        <div class="container admin-header-inner">
            <div>
                <p class="section-label">Административная страница</p>
                <h1>Заявки на запись</h1>
            </div>
            <a class="btn btn-small" href="index.php">Вернуться на сайт</a>
        </div>
    </header>

    <main class="container admin-main">
        <?php if ($loadError): ?>
            <section class="empty-state">
                <h2>Не удалось загрузить заявки</h2>
                <p>Проверьте подключение к PostgreSQL и наличие таблицы appointments.</p>
            </section>
        <?php elseif (count($appointments) === 0): ?>
            <section class="empty-state">
                <h2>Заявок пока нет</h2>
                <p>После отправки формы записи заявки появятся на этой странице.</p>
            </section>
        <?php else: ?>
            <div class="table-wrap">
                <table class="appointments-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя владельца</th>
                            <th>Телефон</th>
                            <th>Питомец</th>
                            <th>Тип питомца</th>
                            <th>Порода</th>
                            <th>Услуга</th>
                            <th>Дата</th>
                            <th>Время</th>
                            <th>Комментарий</th>
                            <th>Дата создания</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?php echo e((string) $appointment['id']); ?></td>
                                <td><?php echo e($appointment['owner_name']); ?></td>
                                <td><?php echo e($appointment['phone']); ?></td>
                                <td><?php echo e($appointment['pet_name']); ?></td>
                                <td><?php echo e($appointment['pet_type']); ?></td>
                                <td><?php echo e($appointment['breed'] ?: '—'); ?></td>
                                <td><?php echo e($appointment['service']); ?></td>
                                <td><?php echo e($appointment['appointment_date']); ?></td>
                                <td><?php echo e(substr($appointment['appointment_time'], 0, 5)); ?></td>
                                <td><?php echo e($appointment['comment'] ?: '—'); ?></td>
                                <td><?php echo e($appointment['created_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
