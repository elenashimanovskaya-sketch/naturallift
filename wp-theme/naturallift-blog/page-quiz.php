<?php
/**
 * Template Name: Skin Diagnosis Quiz
 * Description: Интерактивный квиз для диагностики кожи на русском языке (аналог Louis Widmer).
 */

get_header();

$quiz_intro_image = naturallift_get_quiz_intro_image_url();
$quiz_step1_image = naturallift_get_quiz_step1_image_url();
?>

<div class="container" style="padding-top: var(--space-lg); padding-bottom: var(--space-xl);">
    <div class="quiz-wrapper" style="max-width: 1000px; margin: 0 auto; background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 12px; overflow: hidden; box-shadow: 0 20px 40px rgba(74, 51, 54, 0.05);">
        
        <!-- Стартовый экран квиза -->
        <div id="quiz-start" class="quiz-screen" style="display: flex; min-height: 550px;">
            <div class="quiz-image-side" style="flex: 1; min-height: 400px; position: relative; overflow: hidden; background: var(--color-bg);">
                <img
                    src="<?php echo esc_url( $quiz_intro_image ); ?>"
                    alt="Диагностика кожи — Natural Lift"
                    class="skip-lazy eio-wp-skip-lazy"
                    width="600"
                    height="800"
                    loading="eager"
                    fetchpriority="high"
                    decoding="async"
                    style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block;"
                />
                <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(26,10,13,0.3), rgba(26,10,13,0.1)); pointer-events: none;"></div>
            </div>
            <div class="quiz-content-side" style="flex: 1; padding: 60px 48px; display: flex; flex-direction: column; justify-content: center;">
                <span class="product-promo__kicker" style="font-size: 11px; letter-spacing: 2px;">Интеллектуальный анализ кожи</span>
                <h1 style="font-size: 44px; font-family: var(--font-heading); line-height: 1.2; margin-bottom: 20px; color: var(--color-text);">
                    Диагностика кожи онлайн
                </h1>
                <p style="color: var(--color-text-muted); font-size: 15px; line-height: 1.7; margin-bottom: 32px;">
                    Получите персональный ритуал ухода Silver Cream и рекомендации по фейс-йоге всего за несколько шагов с помощью нашей умной интерактивной анкеты.
                </p>
                <div style="margin-bottom: 32px; display: flex; align-items: flex-start; gap: 12px;">
                    <input type="checkbox" id="quiz-terms" style="margin-top: 4px; accent-color: var(--color-primary);">
                    <label for="quiz-terms" style="font-size: 13px; color: var(--color-text-muted); line-height: 1.5; cursor: pointer;">
                        Нажимая кнопку ниже, чтобы начать анализ кожи, вы соглашаетесь с обработкой персональных данных.
                    </label>
                </div>
                <button onclick="startQuiz()" class="btn btn-primary" style="padding: 16px 40px; font-size: 14px; align-self: flex-start;">Начать диагностику</button>
            </div>
        </div>

        <!-- Экран вопросов (будет управляться через JS) -->
        <div id="quiz-questions" class="quiz-screen" style="display: none; padding: 48px; min-height: 550px;">
            <div class="quiz-progress-bar-wrap" style="width: 100%; height: 4px; background: var(--color-border); border-radius: 2px; margin-bottom: 40px; position: relative;">
                <div id="quiz-progress" style="position: absolute; top:0; left:0; height: 100%; background: var(--color-primary); width: 0%; transition: width 0.3s ease;"></div>
            </div>
            
            <div class="quiz-question-container" style="display: flex; gap: 48px; align-items: center; min-height: 400px;">
                <div id="quiz-question-media" class="quiz-question-media" style="flex: 0 0 45%; max-width: 400px; display: none;">
                    <img id="question-img" src="" alt="Тема вопроса" style="width: 100%; aspect-ratio: 4/5; object-fit: cover; border-radius: 8px; border: 1px solid var(--color-border);">
                </div>
                <div class="quiz-question-body" style="flex: 1;">
                    <span id="question-number" class="product-promo__kicker" style="font-size: 11px; letter-spacing: 1.5px; margin-bottom: 8px; display: block;">Вопрос 1 из 5</span>
                    <h2 id="question-title" style="font-size: 32px; font-family: var(--font-heading); color: var(--color-text); margin-bottom: 24px; line-height: 1.3;">Каков тип вашей кожи?</h2>
                    
                    <div id="quiz-options" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
                        <!-- Варианты ответов будут генерироваться динамически -->
                    </div>

                    <div style="margin-top: 40px; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--color-border); padding-top: 24px;">
                        <button onclick="prevQuestion()" id="btn-prev" class="btn" style="background: transparent; border: 1px solid var(--color-border); padding: 12px 24px; font-size: 13px; visibility: hidden;">← Назад</button>
                        <button onclick="nextQuestion()" id="btn-next" class="btn btn-primary" style="padding: 12px 32px; font-size: 13px;" disabled>Далее →</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Экран результатов -->
        <div id="quiz-results" class="quiz-screen" style="display: none; padding: 48px;">
            <div style="text-align: center; max-width: 700px; margin: 0 auto 48px;">
                <span class="product-promo__kicker">Ваш персональный уход</span>
                <h2 style="font-size: 40px; font-family: var(--font-heading); color: var(--color-text); margin-bottom: 16px;">Рекомендации по уходу</h2>
                <p id="result-intro-text" style="color: var(--color-text-muted); font-size: 15px; line-height: 1.6;">Анализ завершен! На основе ваших ответов мы разработали идеальную синергию ухода Silver Cream и практик фейс-йоги.</p>
            </div>

            <!-- Рекомендации по Routine (Утро / Вечер) -->
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 32px; margin-bottom: 48px;">
                <div style="background: var(--color-bg); padding: 32px; border-radius: 8px; border: 1px solid var(--color-border);">
                    <div style="font-size: 24px; margin-bottom: 16px; display: flex; align-items: center; gap: 8px; color: var(--color-text); font-family: var(--font-heading);">
                        <span>☀️</span> Утренний ритуал
                    </div>
                    <p id="morning-routine-text" style="font-size: 14px; line-height: 1.6; color: var(--color-text-muted); margin-bottom: 24px;">Нанесите дневной крем легкими помпажными движениями.</p>
                    <div id="morning-routine-product" style="display: flex; gap: 16px; align-items: center; border-top: 1px solid var(--color-border); padding-top: 16px;">
                        <!-- Продукт утреннего ухода -->
                    </div>
                </div>

                <div style="background: var(--color-bg); padding: 32px; border-radius: 8px; border: 1px solid var(--color-border);">
                    <div style="font-size: 24px; margin-bottom: 16px; display: flex; align-items: center; gap: 8px; color: var(--color-text); font-family: var(--font-heading);">
                        <span>🌙</span> Вечерний ритуал
                    </div>
                    <p id="evening-routine-text" style="font-size: 14px; line-height: 1.6; color: var(--color-text-muted); margin-bottom: 24px;">Глубокий лимфодренажный самомассаж перед сном.</p>
                    <div id="evening-routine-product" style="display: flex; gap: 16px; align-items: center; border-top: 1px solid var(--color-border); padding-top: 16px;">
                        <!-- Продукт вечернего ухода -->
                    </div>
                </div>
            </div>

            <!-- Практики Фейс-йоги -->
            <div style="background: var(--color-surface); border: 1px solid var(--color-border); padding: 32px; border-radius: 8px; text-align: center; margin-bottom: 48px;">
                <span class="product-promo__kicker" style="font-size: 10px;">Мануальные практики</span>
                <h3 style="font-family: var(--font-heading); font-size: 24px; color: var(--color-text); margin-bottom: 12px;">Рекомендованное упражнение фейс-йоги</h3>
                <p id="recommended-exercise-text" style="font-size: 14px; color: var(--color-text-muted); max-width: 600px; margin: 0 auto; line-height: 1.6;">Простые и эффективные упражнения для улучшения результатов косметического ухода.</p>
            </div>

            <div style="text-align: center;">
                <button onclick="resetQuiz()" class="btn" style="border: 1px solid var(--color-border); background: transparent; padding: 12px 32px; font-size: 13px;">Пройти заново</button>
            </div>
        </div>
    </div>
</div>

<script>
// URL hero-фото стартового экрана (синхрон с PHP)
const quizIntroImageUrl = <?php echo wp_json_encode( $quiz_intro_image ); ?>;
const quizStep1ImageUrl = <?php echo wp_json_encode( $quiz_step1_image ); ?>;

// Данные квиза (Вопросы, Варианты, Ответы)
const quizData = [
    {
        question: "Каков тип или текущее состояние вашей кожи?",
        numberText: "Шаг 1 из 5",
        media: quizStep1ImageUrl,
        options: [
            { text: "Сухая и шелушащаяся", desc: "Стянутость, мелкие поры, тусклый цвет", value: "dry" },
            { text: "Очень сухая кожа", desc: "Выраженная стянутость, ранние морщинки", value: "very_dry" },
            { text: "Нормальная кожа", desc: "Сбалансированная, умеренное увлажнение", value: "normal" },
            { text: "Чувствительная кожа", desc: "Частые покраснения, зуд, раздражения", value: "sensitive" }
        ]
    },
    {
        question: "Какая эстетическая задача для вас первостепенна?",
        numberText: "Шаг 2 из 5",
        media: "https://naturallift.store/wp-content/uploads/2026/05/фото-моих-кремов-на-подносе.jpg",
        options: [
            { text: "Борьба с возрастными изменениями", desc: "Морщины, потеря упругости", value: "anti_age" },
            { text: "Устранение отечности по утрам", desc: "Застой лимфы, тяжелое лицо", value: "drainage" },
            { text: "Питание и глубокое увлажнение", desc: "Устранение сухости и шелушений", value: "nutrition" },
            { text: "Покраснения и сосудистая сеточка", desc: "Укрепление барьера кожи", value: "barrier" }
        ]
    },
    {
        question: "Каков ваш возраст?",
        numberText: "Шаг 3 из 5",
        media: "https://naturallift.ru/wp-content/uploads/2026/04/dizajn-bez-nazvaniya4.png",
        options: [
            { text: "До 35 лет", desc: "Профилактика первых морщин и защита", value: "young" },
            { text: "35 – 45 лет", desc: "Первые признаки снижения тонуса", value: "mid" },
            { text: "45 – 55 лет", desc: "Активная борьба с потерей упругости", value: "mid_mature" },
            { text: "55 лет и старше", desc: "Глубокое восстановление и питание", value: "mature" }
        ]
    },
    {
        question: "Как влияет климат и окружающая среда на вашу кожу?",
        numberText: "Шаг 4 из 5",
        media: "https://naturallift.store/wp-content/uploads/2026/07/hand-made-silver-cream-with-girls-on-it.jpg",
        options: [
            { text: "Сухой воздух, отопление / кондиционеры", desc: "Кожа быстро обезвоживается", value: "dry_air" },
            { text: "Активное солнце и загар", desc: "Требуется защита от фотостарения", value: "sun" },
            { text: "Городская пыль, стресс", desc: "Нужен детокс и сияние лица", value: "city" },
            { text: "Умеренный климат", desc: "Базовый поддерживающий уход", value: "normal_climate" }
        ]
    },
    {
        question: "Практикуете ли вы массаж лица или фейс-йогу?",
        numberText: "Шаг 5 из 5",
        media: "https://naturallift.store/wp-content/uploads/2026/07/face-yoga-with-silver-cream-oils.jpg",
        options: [
            { text: "Да, занимаюсь регулярно", desc: "Ищу косметику для синергии с практиками", value: "yoga_regular" },
            { text: "Иногда делаю самомассаж руками", desc: "Хочу внедрить регулярные ритуалы ухода", value: "yoga_sometimes" },
            { text: "Нет, но хочу начать заниматься", desc: "Ищу простую и понятную систему старта", value: "yoga_want" },
            { text: "Не практикую, только уход", desc: "Интересует исключительно космецевтика", value: "yoga_none" }
        ]
    }
];

let currentStep = 0;
let answers = [];

function startQuiz() {
    const termsCheckbox = document.getElementById('quiz-terms');
    if (termsCheckbox && !termsCheckbox.checked) {
        alert('Пожалуйста, подтвердите согласие на обработку данных для продолжения.');
        return;
    }
    document.getElementById('quiz-start').style.display = 'none';
    document.getElementById('quiz-questions').style.display = 'block';
    renderQuestion();
}

function renderQuestion() {
    const data = quizData[currentStep];
    
    // Прогресс
    const progressPercent = (currentStep / quizData.length) * 100;
    document.getElementById('quiz-progress').style.style = `width: ${progressPercent}%;`;
    document.getElementById('quiz-progress').style.width = progressPercent + '%';

    // Шаг и Заголовок
    document.getElementById('question-number').innerText = data.numberText;
    document.getElementById('question-title').innerText = data.question;

    // Фото к вопросу
    const mediaEl = document.getElementById('quiz-question-media');
    if (data.media) {
        document.getElementById('question-img').src = data.media;
        mediaEl.style.display = 'block';
    } else {
        mediaEl.style.display = 'none';
    }

    // Варианты ответов
    const optionsContainer = document.getElementById('quiz-options');
    optionsContainer.innerHTML = '';
    
    data.options.forEach((opt, idx) => {
        const isSelected = answers[currentStep] === opt.value;
        const card = document.createElement('div');
        card.className = 'quiz-option-card';
        card.style = `
            border: 1px solid ${isSelected ? 'var(--color-primary)' : 'var(--color-border)'};
            background: ${isSelected ? 'var(--color-bg)' : 'var(--color-surface)'};
            padding: 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        `;
        card.onclick = () => selectOption(opt.value, card);
        card.innerHTML = `
            <strong style="color: var(--color-text); font-size: 15px; display: block; margin-bottom: 6px;">${opt.text}</strong>
            <p style="color: var(--color-text-muted); font-size: 12px; margin: 0; line-height: 1.4;">${opt.desc}</p>
        `;
        optionsContainer.appendChild(card);
    });

    // Навигация
    document.getElementById('btn-prev').style.visibility = currentStep > 0 ? 'visible' : 'hidden';
    document.getElementById('btn-next').innerText = currentStep === quizData.length - 1 ? 'Завершить →' : 'Далее →';
    document.getElementById('btn-next').disabled = answers[currentStep] === undefined;
}

function selectOption(value, element) {
    answers[currentStep] = value;
    
    // Перерендерить только варианты ответа для подсветки активного
    const optionsContainer = document.getElementById('quiz-options');
    const cards = optionsContainer.children;
    const data = quizData[currentStep];
    
    data.options.forEach((opt, idx) => {
        const card = cards[idx];
        const isSelected = answers[currentStep] === opt.value;
        card.style.borderColor = isSelected ? 'var(--color-primary)' : 'var(--color-border)';
        card.style.background = isSelected ? 'var(--color-bg)' : 'var(--color-surface)';
    });

    document.getElementById('btn-next').disabled = false;
}

function prevQuestion() {
    if (currentStep > 0) {
        currentStep--;
        renderQuestion();
    }
}

function nextQuestion() {
    if (currentStep < quizData.length - 1) {
        currentStep++;
        renderQuestion();
    } else {
        showResults();
    }
}

function showResults() {
    document.getElementById('quiz-questions').style.display = 'none';
    document.getElementById('quiz-results').style.display = 'block';

    const typeSkin = answers[0]; // dry, very_dry, normal, sensitive
    const aestheticGoal = answers[1]; // anti_age, drainage, nutrition, barrier
    const ageValue = answers[2]; // young, mid, mid_mature, mature

    // Скрипты выбора ухода на основе ответов
    let morningText = "";
    let eveningText = "";
    let morningProduct = {};
    let eveningProduct = {};
    let exerciseText = "";

    // 1. Утренний уход
    if (typeSkin === 'dry' || typeSkin === 'very_dry' || aestheticGoal === 'nutrition') {
        morningText = "После умывания водой нанесите «Дневной увлажняющий крем Silver Cream» нежными поглаживающими движениями по массажным линиям. Он насытит роговой слой влагой, закроет дефициты липидов и защитит кожу от сухости в течение всего дня.";
        morningProduct = {
            title: "Дневной увлажняющий крем",
            img: "https://naturallift.store/wp-content/uploads/2026/02/dnevnoj-uvlazhnyayushhij-krem-9-na-16-scaled.jpg",
            desc: "Bestseller · легкая защитная и увлажняющая формула"
        };
    } else {
        morningText = "После тонизирования нанесите 2-3 капли «Пептидной сыворотки» для стимуляции упругости, а поверх зафиксируйте ее «Дневным увлажняющим кремом Silver Cream». Это укрепит эластичность кожи и выровняет тон на весь день.";
        morningProduct = {
            title: "Сыворотка с пептидами + Дневной крем",
            img: "https://naturallift.store/wp-content/uploads/2026/05/сыворотка-для-лица-с-пептидами.jpg",
            desc: "Интенсивный утренний лифтинг и антиоксидантная защита"
        };
    }

    // 2. Вечерний уход
    if (aestheticGoal === 'anti_age' || ageValue === 'mature' || ageValue === 'mid_mature') {
        eveningText = "В вечерний ритуал включите дуэт «Сыворотки с пептидами» и «Ночного восстанавливающего крема». Нанесите сыворотку на мимические морщины, а поверх — питательный ночной крем. Сделайте легкий расслабляющий самомассаж.";
        eveningProduct = {
            title: "Ночной крем + Пептидная сыворотка",
            img: "https://naturallift.store/wp-content/uploads/2026/07/hand-made-silver-cream-with-girls-on-it.jpg",
            desc: "Глубокая ночная регенерация и расслабление мимического напряжения"
        };
    } else {
        eveningText = "За 1-1.5 часа до сна нанесите «Ночной восстанавливающий крем Silver Cream» плотным слоем. Легкими дренажными движениями проработайте зону подбородка и шеи, чтобы на утро получить идеально свежее лицо без отеков.";
        eveningProduct = {
            title: "Ночной восстанавливающий крем",
            img: "https://naturallift.store/wp-content/uploads/2026/07/hand-made-silver-cream-with-girls-on-it.jpg",
            desc: "Ночной уход с акцентом на лимфодренаж и питание барьера кожи"
        };
    }

    // 3. Упражнения фейс-йоги
    if (aestheticGoal === 'drainage' || typeSkin === 'very_dry') {
        exerciseText = "«Упражнение: Утреннее пробуждение лимфы». Кончиками пальцев сделайте 10 легких помпажных нажатий в области ключиц, затем нежно погладьте боковые стороны шеи сверху вниз. Нанесите дневной крем легкими скользящими движениями. Это запустит отток жидкости и моментально снимет утреннюю отечность.";
    } else if (aestheticGoal === 'anti_age' || ageValue === 'mature') {
        exerciseText = "«Упражнение: Снятие зажимов и лифтинг щек». Положите ладони на щеки так, чтобы пальцы обнимали виски. Слегка подтяните ладонями кожу вверх и назад. В этом положении медленно открывайте рот в овал на 10 секунд. Повторите 3 раза. Нанесите сыворотку с пептидами по массажным линиям.";
    } else {
        exerciseText = "«Упражнение: Расслабление лба и межбровья». Положите указательные пальцы обеих рук горизонтально над бровями. Сделайте легкий преднатяг вверх и массируйте лоб круговыми движениями, двигаясь от центра к вискам. Это упражнение идеально стирает маску усталости.";
    }

    // Вывод на экран
    document.getElementById('morning-routine-text').innerText = morningText;
    document.getElementById('evening-routine-text').innerText = eveningText;
    document.getElementById('recommended-exercise-text').innerText = exerciseText;

    // Вывод карточек продуктов
    document.getElementById('morning-routine-product').innerHTML = `
        <img src="${morningProduct.img}" alt="${morningProduct.title}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 6px; border: 1px solid var(--color-border);">
        <div>
            <strong style="color: var(--color-text); font-size: 15px; display: block; margin-bottom: 4px;">${morningProduct.title}</strong>
            <span style="font-size: 11px; color: var(--color-gold-deep); text-transform: uppercase; letter-spacing: 0.5px; display: block; margin-bottom: 4px;">Рекомендуется утром</span>
            <p style="font-size: 12px; color: var(--color-text-muted); margin: 0;">${morningProduct.desc}</p>
        </div>
    `;

    document.getElementById('evening-routine-product').innerHTML = `
        <img src="${eveningProduct.img}" alt="${eveningProduct.title}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 6px; border: 1px solid var(--color-border);">
        <div>
            <strong style="color: var(--color-text); font-size: 15px; display: block; margin-bottom: 4px;">${eveningProduct.title}</strong>
            <span style="font-size: 11px; color: var(--color-gold-deep); text-transform: uppercase; letter-spacing: 0.5px; display: block; margin-bottom: 4px;">Рекомендуется вечером</span>
            <p style="font-size: 12px; color: var(--color-text-muted); margin: 0;">${eveningProduct.desc}</p>
        </div>
    `;
}

function resetQuiz() {
    currentStep = 0;
    answers = [];
    document.getElementById('quiz-results').style.display = 'none';
    document.getElementById('quiz-questions').style.display = 'block';
    renderQuestion();
}
</script>
