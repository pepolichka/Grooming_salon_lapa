document.addEventListener('DOMContentLoaded', function () {
    var header = document.getElementById('siteHeader');
    var navLinks = document.querySelectorAll('.nav-link');
    var sections = document.querySelectorAll('section[id]');
    var serviceButtons = document.querySelectorAll('.choose-service');
    var serviceSelect = document.getElementById('serviceSelect');
    var dateInput = document.getElementById('appointmentDate');
    var dateValue = document.getElementById('dateValue');
    var bookingForm = document.getElementById('bookingForm');
    var formMessage = document.getElementById('formMessage');

    function updateHeader() {
        if (window.scrollY > 20) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    function scrollToSection(hash) {
        var target = document.querySelector(hash);

        if (!target) {
            return;
        }

        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            var hash = link.getAttribute('href');

            if (hash.length > 1) {
                event.preventDefault();
                scrollToSection(hash);
            }
        });
    });

    var activeObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var id = entry.target.getAttribute('id');

                navLinks.forEach(function (link) {
                    link.classList.toggle('active', link.getAttribute('href') === '#' + id);
                });
            }
        });
    }, {
        rootMargin: '-35% 0px -55% 0px',
        threshold: 0
    });

    sections.forEach(function (section) {
        activeObserver.observe(section);
    });

    var revealObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12
    });

    document.querySelectorAll('.reveal').forEach(function (element) {
        revealObserver.observe(element);
    });

    serviceButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var selectedService = button.dataset.service;

            serviceSelect.value = selectedService;
            scrollToSection('#booking');
            serviceSelect.classList.remove('highlight-field');

            window.setTimeout(function () {
                serviceSelect.classList.add('highlight-field');
                serviceSelect.focus();
            }, 450);
        });
    });

    if (dateInput) {
        var today = new Date();
        var year = today.getFullYear();
        var month = String(today.getMonth() + 1).padStart(2, '0');
        var day = String(today.getDate()).padStart(2, '0');

        dateInput.min = year + '-' + month + '-' + day;

        dateInput.addEventListener('change', function () {
            if (!dateInput.value || !dateValue) {
                return;
            }

            var parts = dateInput.value.split('-');
            dateValue.textContent = parts[2] + '.' + parts[1] + '.' + parts[0];
        });

        dateInput.parentElement.addEventListener('click', function () {
            if (typeof dateInput.showPicker === 'function') {
                dateInput.showPicker();
            } else {
                dateInput.focus();
            }
        });
    }

    if (bookingForm) {
        bookingForm.addEventListener('submit', function (event) {
            var service = bookingForm.elements.service.value;
            var date = bookingForm.elements.appointment_date.value;
            var time = bookingForm.elements.appointment_time.value;
            var privacy = bookingForm.elements.privacy_agreement.checked;

            formMessage.textContent = '';

            if (!bookingForm.checkValidity() || !service || !date || !time || !privacy) {
                event.preventDefault();
                formMessage.textContent = 'Заполните обязательные поля, выберите услугу, дату, время и подтвердите согласие.';
                bookingForm.reportValidity();
            }
        });
    }

    updateHeader();
    window.addEventListener('scroll', updateHeader);
});
