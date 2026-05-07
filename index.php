<?php
$services = [
    [
        'title' => 'Комплексный груминг',
        'description' => 'Мытьё, сушка, расчёсывание, стрижка и базовый уход.',
        'price' => 'от 3500 ₽',
        'image' => 'service-corso.png'
    ],
    [
        'title' => 'Стрижка',
        'description' => 'Модельная или гигиеническая стрижка с учётом породы.',
        'price' => 'от 2500 ₽',
        'image' => 'service-poodle.png'
    ],
    [
        'title' => 'Мытьё и сушка',
        'description' => 'Очищение шерсти профессиональными средствами и бережная сушка.',
        'price' => 'от 1500 ₽',
        'image' => 'service-bish.png'
    ],
    [
        'title' => 'Вычёсывание',
        'description' => 'Удаление лишней шерсти и профилактика колтунов.',
        'price' => 'от 1400 ₽',
        'image' => 'service-french.png'
    ],
    [
        'title' => 'Уход за когтями',
        'description' => 'Аккуратная обработка когтей и уход за лапами.',
        'price' => 'от 600 ₽',
        'image' => 'service-dogo.png'
    ],
    [
        'title' => 'Гигиенический уход',
        'description' => 'Уход за ушами, лапами, шерстью и чувствительными зонами.',
        'price' => 'от 1200 ₽',
        'image' => 'service-cat.png'
    ],
];

$advantages = [
    ['title' => 'Бережный подход', 'text' => 'Работаем без стресса и спешки, с любовью и пониманием.'],
    ['title' => 'Опытные мастера', 'text' => 'Специалисты знают особенности ухода за разными породами и типами шерсти.'],
    ['title' => 'Качественная косметика', 'text' => 'Используем безопасные средства ухода для собак и кошек.'],
    ['title' => 'Удобная запись', 'text' => 'Клиент может выбрать услугу, дату и время прямо на сайте.'],
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPA — груминг-салон для питомцев</title>
    <meta name="description" content="LAPA — груминг-салон с бережным подходом к собакам и кошкам. Онлайн-запись на услуги ухода.">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="site-header" id="siteHeader">
        <div class="container header-inner">
            <a class="logo" href="#home" aria-label="LAPA, на главную">
                <img src="assets/images/logo.png" alt="LAPA grooming salon">
            </a>
            <nav class="nav" aria-label="Главное меню">
                <a class="nav-link active" href="#home">Главная</a>
                <a class="nav-link" href="#about">О нас</a>
                <a class="nav-link" href="#services">Услуги</a>
                <a class="nav-link" href="#contacts">Контакты</a>
            </nav>
            <a class="btn btn-small" href="#booking">Записаться</a>
        </div>
    </header>

    <main>
        <section class="hero section" id="home">
            <div class="container hero-grid">
                <div class="hero-content reveal">
                    <p class="eyebrow">премиум груминг-салон</p>
                    <h1>Ваш питомец в центре внимания</h1>
                    <p class="hero-text">Профессиональный уход для собак и кошек — спокойно, бережно и с вниманием к каждой детали.</p>
                    <div class="hero-actions">
                        <a class="btn" href="#booking">Записаться онлайн</a>
                        <a class="btn btn-ghost" href="#services">Посмотреть услуги</a>
                    </div>
                </div>
                <div class="hero-visual reveal" aria-label="Декоративное изображение питомца">
                    <span class="dot-pattern hero-dots"></span>
                    <span class="red-circle"></span>
                    <img src="assets/images/hero-dog.png" alt="Собака на главном экране груминг-салона LAPA">
                    <div class="floating-card">
                        <strong>с 2022</strong>
                        <span>заботимся о ваших питомцах</span>
                    </div>
                    <p class="side-word">
                        <span>стиль</span>
                        <span>забота</span>
                        <span>детали</span>
                    </p>
                    <span class="side-line-bottom"></span>
                </div>
            </div>
        </section>

        <section class="section about" id="about">
            <div class="container about-grid">
                <div class="about-content reveal">
                    <p class="section-label">О нас</p>
                    <h2>Забота. Опыт. Любовь к животным.</h2>
                    <p>LAPA — это груминг-салон с индивидуальным подходом к каждому питомцу. Мы сочетаем профессионализм, качественные материалы и тёплую атмосферу, чтобы ваш четвероногий друг чувствовал себя комфортно и выглядел безупречно.</p>
                    <p>Мы понимаем, что для каждого владельца питомец — это член семьи. Поэтому наша задача не просто выполнить процедуру, а сделать уход спокойным, безопасным и комфортным.</p>
                    <div class="advantages-grid">
                        <?php foreach ($advantages as $advantage): ?>
                            <article class="advantage-card">
                                <span class="advantage-dot"></span>
                                <h3><?php echo htmlspecialchars($advantage['title']); ?></h3>
                                <p><?php echo htmlspecialchars($advantage['text']); ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="about-image reveal">
                    <div class="about-photo">
                        <img src="assets/images/about-dog.png" alt="Питомец после ухода в салоне LAPA">
                    </div>
                </div>
            </div>
        </section>

        <section class="section services" id="services">
            <div class="container services-layout">
                <div class="section-head reveal">
                    <p class="section-label">Услуги</p>
                    <h2>Наши услуги</h2>
                    <p>Подбираем уход индивидуально: учитываем породу, тип шерсти, состояние кожи и характер каждого питомца.</p>
                </div>
                <div class="services-grid">
                    <?php foreach ($services as $service): ?>
                        <article class="service-card reveal">
                            <div class="service-image">
                                <img src="assets/images/<?php echo htmlspecialchars($service['image']); ?>" alt="<?php echo htmlspecialchars($service['title']); ?>">
                            </div>
                            <div class="service-body">
                                <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                                <p><?php echo htmlspecialchars($service['description']); ?></p>
                                <strong><?php echo htmlspecialchars($service['price']); ?></strong>
                                <button class="choose-service service-arrow" type="button" data-service="<?php echo htmlspecialchars($service['title']); ?>" aria-label="Выбрать услугу <?php echo htmlspecialchars($service['title']); ?>">→</button>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section contacts" id="contacts">
            <img class="contacts-map" src="assets/images/map.png" alt="" aria-hidden="true">
            <div class="container contacts-grid">
                <div class="contacts-content reveal">
                    <p class="section-label">Контакты</p>
                    <h2>Мы всегда рядом</h2>
                    <div class="contact-list">
                        <div class="contact-item">
                            <span>Адрес</span>
                            <strong>Москва, ул. Петрова, 6</strong>
                        </div>
                        <div class="contact-item">
                            <span>Телефон</span>
                            <strong><a href="tel:+79999999999">+7 (999) 999-99-99</a></strong>
                        </div>
                        <div class="contact-item">
                            <span>График</span>
                            <strong>Ежедневно с 10:00 до 20:00</strong>
                        </div>
                        <div class="contact-item">
                            <span>Email</span>
                            <strong><a href="mailto:info@lapa-salon.ru">info@lapa-salon.ru</a></strong>
                        </div>
                    </div>
                </div>
                <div class="map-card reveal" aria-label="Карта проезда">
                    <div class="map-pin">LAPA</div>
                </div>
            </div>
        </section>

        <section class="section booking" id="booking">
            <div class="container booking-grid">
                <div class="booking-info reveal">
                    <p class="section-label">Онлайн-запись</p>
                    <h2>Запишитесь онлайн</h2>
                    <p>Оставьте заявку, и мы свяжемся с вами для подтверждения записи.</p>
                </div>
                <form class="booking-form reveal" id="bookingForm" method="POST" action="save_appointment.php" novalidate>
                    <div class="form-grid">
                        <input type="text" name="owner_name" placeholder="Имя владельца*" required>
                        <input type="tel" name="phone" placeholder="Телефон*" required>
                        <input type="text" name="pet_name" placeholder="Имя питомца*" required>
                        <select name="pet_type" required>
                            <option value="">Тип питомца*</option>
                            <option value="Собака">Собака</option>
                            <option value="Кошка">Кошка</option>
                        </select>
                        <input type="text" name="breed" placeholder="Порода">
                        <select name="service" id="serviceSelect" required>
                            <option value="">Услуга*</option>
                            <?php foreach ($services as $service): ?>
                                <option value="<?php echo htmlspecialchars($service['title']); ?>"><?php echo htmlspecialchars($service['title']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label class="date-field">
                            <span class="date-label">Дата*</span>
                            <span class="date-value" id="dateValue">Выберите дату</span>
                            <input type="date" name="appointment_date" id="appointmentDate" required>
                        </label>
                        <select name="appointment_time" required>
                            <option value="">Время*</option>
                            <?php for ($hour = 10; $hour <= 19; $hour++): ?>
                                <option value="<?php echo sprintf('%02d:00', $hour); ?>"><?php echo sprintf('%02d:00', $hour); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <textarea name="comment" placeholder="Комментарий" rows="5"></textarea>
                    <label class="checkbox-field">
                        <input type="checkbox" name="privacy_agreement" value="1" required>
                        <span>Я согласен(на) на обработку персональных данных</span>
                    </label>
                    <p class="form-message" id="formMessage" role="alert"></p>
                    <button class="btn btn-submit" type="submit">Отправить заявку</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <div class="footer-logo">
                <img src="assets/images/logo.png" alt="LAPA grooming salon">
            </div>
            <div>
                <h3>Меню</h3>
                <a href="#home">Главная</a>
                <a href="#about">О нас</a>
                <a href="#services">Услуги</a>
                <a href="#contacts">Контакты</a>
            </div>
            <div>
                <h3>Услуги</h3>
                <?php foreach ($services as $service): ?>
                    <span><?php echo htmlspecialchars($service['title']); ?></span>
                <?php endforeach; ?>
            </div>
            <div>
                <h3>Контакты</h3>
                <span>Москва, ул. Петрова, 6</span>
                <span>+7 (999) 999-99-99</span>
                <span>Ежедневно 10:00 – 20:00</span>
                <a href="admin.php">Админка</a>
            </div>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
