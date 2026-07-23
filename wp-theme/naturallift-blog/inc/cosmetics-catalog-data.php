<?php
/**
 * Актуальный каталог Silver Cream — фото и цены с naturallift.store (июнь 2026).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @return array<int, array<string, mixed>>
 */
function naturallift_sc_seed_products_data(): array {
	$base = 'https://naturallift.store/wp-content/uploads/2026/06/';

	return array(
		array(
			'slug'          => 'antivozrastnoj-dnevnoj-krem',
			'title'         => 'Антивозрастной дневной крем',
			'menu_order'    => 1,
			'thumbnail_url' => $base . 'antivzrastnoj-dnevnoj-krem.jpg',
			'meta'          => array(
				'label'              => 'Дневной уход · Anti-age',
				'price_options'      => "30 мл — 1880\n50 мл — 2250",
				'short_description'  => 'Баобаб, стволовые клетки, пептиды и чёрный трюфель — плотность, лифтинг и сияние для зрелой кожи без тяжёлой плёнки.',
				'gallery_urls'       => "https://naturallift.store/wp-content/uploads/2026/06/antivozrastnoj-dnevnoj-krem-1.jpg",
				'active_ingredients' => '<ul><li>Масло и стволовые клетки баобаба — питание, уплотнение, мягкий лифтинг овала</li><li>Стволовые клетки дикой оливы — энергия и тонус кожи</li><li>Гликарин — защита от гликации и «сахарного» старения</li><li>CO₂-экстракт чёрного трюфеля — осветление, регенерация, ухоженное сияние</li><li>Прожелин и пептиды — укрепление, сглаживание, работа с гравитацией</li><li>Бакучиол в наносомах — мягкий anti-age без раздражения</li></ul>',
				'full_composition'   => '<ul><li>Масло баобаба, масло конопли, масло жожоба</li><li>Dermochlorella — <a href="https://co2-extract.ru/product_info.php?products_id=980" target="_blank" rel="noopener">подробнее</a></li><li>Витамин E, масло смородины, трегалоза, Sepitonic</li><li>CO₂-экстракт чёрного трюфеля — <a href="https://co2-extract.ru/product_info.php?products_id=1471" target="_blank" rel="noopener">подробнее</a></li><li>Бакучиол в наносомах</li><li>Стволовые клетки баобаба — <a href="https://co2-extract.ru/product_info.php?products_id=1730" target="_blank" rel="noopener">подробнее</a></li><li>Прожелин-пептид — <a href="https://co2-extract.ru/product_info.php?products_id=562" target="_blank" rel="noopener">подробнее</a></li><li>Гликарин — <a href="https://co2-extract.ru/product_info.php?products_id=745" target="_blank" rel="noopener">подробнее</a></li><li>Вода, стабилизаторы профессиональной косметики</li></ul>',
				'application'        => '<p>Утром на очищенную и увлажнённую кожу лица и шеи. Текстура ложится как шёлк — подходит как база под макияж. При активном солнце завершите SPF.</p>',
				'recommendations'    => '<p>Для кожи 40+ с первыми признаками возрастных изменений. Крем работает на упругость, мягкий лифтинг и уверенное сияние — про комфорт, мягкость и собранный овал, а не про «номер в паспорте».</p>',
				'face_yoga'          => '<p>Наносите перед утренней практикой: крем улучшает скольжение и помогает активам усваиваться во время массажа.</p>',
				'telegram_message'   => 'Здравствуйте! Хочу заказать Антивозрастной дневной крем Silver Cream.',
				'related_slugs'      => 'dnevnoj-krem-dlya-suhoj-kozhi,gidrolat-dlya-licza,krem-dlya-glaz',
			),
			'skin_type'      => array( 'Нормальная', 'Сухая', 'Комбинированная' ),
			'skin_concern'   => array( 'Тусклый цвет', 'Сухость', 'Пигментация' ),
			'product_effect' => array( 'Восстановление', 'Сияние', 'Увлажнение' ),
		),
		array(
			'slug'          => 'dnevnoj-krem-dlya-suhoj-kozhi',
			'title'         => 'Дневной крем для сухой кожи',
			'menu_order'    => 2,
			'thumbnail_url' => $base . 'dnevnoj-krem-dlya-suhoj-kozhi.jpg',
			'meta'          => array(
				'label'              => 'Дневной уход · Сухая кожа',
				'price_options'      => "30 мл — 1880\n50 мл — 2250",
				'short_description'  => 'Плотное питание для сухой кожи с укреплением сосудов — керамиды, таману, троксерутин и anti-age активы в одной формуле.',
				'gallery_urls'       => "https://naturallift.store/wp-content/uploads/2026/06/dnevnoj-krem-dlya-suhoj-kozhi-1.jpg",
				'active_ingredients' => '<ul><li>Комплекс керамидов — восстановление липидного барьера</li><li>Таману и масло ши — питание и регенерация</li><li>Троксерутин и CO₂-экстракты — укрепление сосудов и микроциркуляция</li><li>Sepilift — поддержка упругости</li><li>Витамины C и E, альфа-липоевая кислота — антиоксидантная защита</li></ul>',
				'full_composition'   => '<ul><li>Масло ши, кунжутное масло</li><li>Таману — <a href="https://co2-extract.ru/product_info.php?products_id=387" target="_blank" rel="noopener">подробнее</a></li><li>Sepilift — <a href="https://co2-extract.ru/product_info.php?products_id=283" target="_blank" rel="noopener">подробнее</a></li><li>НУФ, ПГК, дигидрокверцетин и арабиногалактан</li><li>Кофеин, троксерутин, витамин E, витамин C (МАР)</li><li>Комплекс керамидов — <a href="https://co2-extract.ru/product_info.php?cPath=28&products_id=65" target="_blank" rel="noopener">подробнее</a></li><li>Альфа-липоевая кислота</li><li>CO₂-экстракты арники, крапивы, конского каштана, розмарина</li></ul>',
				'application'        => '<p>Утром на очищенную и увлажнённую кожу лица и шеи. Подходит как база под макияж.</p>',
				'recommendations'    => '<p>Для сухой, обезвоженной кожи и кожи с выраженной сосудистой сеткой. Ежедневный дневной ритуал для восстановления барьера и комфорта.</p>',
				'face_yoga'          => '<p>Наносите перед практикой — крем улучшает скольжение и снижает стянутость во время массажа.</p>',
				'telegram_message'   => 'Здравствуйте! Хочу заказать Дневной крем для сухой кожи Silver Cream.',
				'related_slugs'      => 'gidrolat-dlya-licza,vv-krem,nochnaya-maslyanaya-syvorotka',
			),
			'skin_type'      => array( 'Сухая', 'Нормальная' ),
			'skin_concern'   => array( 'Сухость', 'Обезвоженность', 'Тусклый цвет' ),
			'product_effect' => array( 'Увлажнение', 'Восстановление', 'Сияние' ),
		),
		array(
			'slug'          => 'vv-krem',
			'title'         => 'ВВ-крем',
			'menu_order'    => 3,
			'thumbnail_url' => $base . 'vv-krem.jpg',
			'meta'          => array(
				'label'              => 'Дневной тон · Glow',
				'price'              => '1880',
				'volume'             => '40 мл',
				'short_description'  => 'Выравнивающая основа с эффектом подсветки — ровный тон, свежий вид и стойкая база под макияж или финиш без перегруза.',
				'gallery_urls'       => "https://naturallift.store/wp-content/uploads/2026/06/vv-krem-1.jpg\nhttps://naturallift.store/wp-content/uploads/2026/06/vv-krem-2.jpg",
				'active_ingredients' => '<ul><li>Aqua Shuttle — глубокое увлажнение с контролируемым высвобождением активов</li><li>Ланол — натуральный эмолент, сливочная текстура без жирности</li><li>Масло абрикоса — мягкость, упругость, баланс сальных желёз</li><li>Шелковая мика и Ronaflair Balance Gold — сияние, шелковистость, идеальное нанесение</li><li>Натуральные минеральные пигменты — деликатное выравнивание тона</li></ul>',
				'full_composition'   => '<ul><li>Aqua Shuttle, Lecigel, протеины пшеницы</li><li>Ланол, масло абрикоса, экстракт розмарина</li><li>Шелковая мика, Ronaflair Balance Gold</li><li>Натуральные пигменты коричневый и бежевый</li></ul>',
				'application'        => '<p>Утром тонким слоем на увлажнённую кожу. Можно использовать как базу под макияж или как финишное средство для лёгкого сияния без тяжёлого покрытия.</p>',
				'recommendations'    => '<p>Основа под макияж с эффектом подсветки: корректирует неровности, кожа выглядит свежее и здоровее. Минеральные частицы улучшают стойкость макияжа. При жаре дополнительно используйте SPF и тень.</p>',
				'face_yoga'          => '<p>После утренней практики для закрепления сияния.</p>',
				'telegram_message'   => 'Здравствуйте! Хочу заказать ВВ-крем Silver Cream.',
				'related_slugs'      => 'dnevnoj-krem-dlya-suhoj-kozhi,gidrolat-dlya-licza,gidrofilnoe-maslo',
			),
			'skin_type'      => array( 'Нормальная', 'Комбинированная' ),
			'skin_concern'   => array( 'Неровный тон', 'Тусклый цвет' ),
			'product_effect' => array( 'Выравнивание тона', 'Сияние', 'Увлажнение' ),
		),
		array(
			'slug'          => 'gidrolat-dlya-licza',
			'title'         => 'Гидролат для лица',
			'menu_order'    => 4,
			'thumbnail_url' => $base . 'gidrolat-dlya-licza.jpg',
			'meta'          => array(
				'label'              => 'Тонизирование · First step',
				'price'              => '780',
				'volume'             => '100 мл',
				'short_description'  => 'Авторский гидролат собственного производства — первый шаг ухода после умывания, оживляет кожу и готовит к сыворотке и крему.',
				'gallery_urls'       => "https://naturallift.store/wp-content/uploads/2026/06/gidrolat-dlya-licza-1.jpg",
				'active_ingredients' => '<ul><li>100% натуральный гидролат розы, василька, чабреца или лаванды</li><li>Без искусственных красителей, ароматизаторов и спирта</li><li>Восстанавливает pH и защищает кожу от бактерий</li></ul>',
				'full_composition'   => '<p>Гидролат розы / василька / чабрец / лаванда — водная дистилляция лепестков и трав. Травы выращиваются в огороде или закупаются в аптеке. Аламбик, ручная дистилляция ~2 часа. Состав василька подбирается под запрос.</p>',
				'application'        => '<p>На чистое лицо после умывания — ватным диском или пульверизатором. Затем сыворотка и при необходимости крем.</p>',
				'recommendations'    => '<p>Освежает, улучшает цвет лица, смягчает и повышает упругость. Особенно для сухой и зрелой кожи. Хранить при 5–20 °C, беречь от света; открытую тару — в холодильнике.</p>',
				'face_yoga'          => '<p>Используйте перед практикой для подготовки кожи к массажу.</p>',
				'telegram_message'   => 'Здравствуйте! Хочу заказать Гидролат для лица Silver Cream.',
				'related_slugs'      => 'gidrofilnoe-maslo,dnevnoj-krem-dlya-suhoj-kozhi,nochnaya-maslyanaya-syvorotka',
			),
			'skin_type'      => array( 'Любой тип', 'Нормальная', 'Комбинированная' ),
			'skin_concern'   => array( 'Обезвоженность', 'Тусклый цвет' ),
			'product_effect' => array( 'Увлажнение', 'Сияние', 'Очищение' ),
		),
		array(
			'slug'          => 'gidrofilnoe-maslo',
			'title'         => 'Гидрофильное масло для умывания',
			'menu_order'    => 5,
			'thumbnail_url' => $base . 'gidrofilnoe-maslo.jpg',
			'meta'          => array(
				'label'              => 'Очищение · First step',
				'price'              => '780',
				'volume'             => '50 мл',
				'short_description'  => 'Мягкое гидрофильное очищение — снимает макияж и SPF без стянутости, готовит кожу к фейс-йоге.',
				'active_ingredients' => '<ul><li>Касторовое масло и масло жожоба — деликатное растворение загрязнений</li><li>CO₂-экстракты календулы, петрушки и берёзы — успокаивание при очищении</li><li>Эфирное масло иланг-иланга — аромат и комфорт ритуала</li></ul>',
				'full_composition'   => '<ul><li>Касторовое масло, масло жожоба</li><li>CO₂-экстракты календулы, петрушки, берёзы</li><li>Эфирное масло иланг-иланга</li></ul>',
				'application'        => '<p>На сухую кожу, эмульгируйте водой, смойте тёплой водой.</p>',
				'recommendations'    => '<p>Для сухой и зрелой кожи. Первый шаг вечернего ритуала.</p>',
				'face_yoga'          => '<p>Идеально перед вечерней практикой.</p>',
				'telegram_message'   => 'Здравствуйте! Хочу заказать Гидрофильное масло для умывания Silver Cream.',
				'related_slugs'      => 'gidrolat-dlya-licza,dnevnoj-krem-dlya-suhoj-kozhi,krem-dlya-glaz',
			),
			'skin_type'      => array( 'Сухая', 'Нормальная', 'Комбинированная' ),
			'skin_concern'   => array( 'Сухость', 'Гиперкератоз' ),
			'product_effect' => array( 'Очищение', 'Восстановление' ),
		),
		array(
			'slug'          => 'krem-dlya-glaz',
			'title'         => 'Крем для глаз',
			'menu_order'    => 6,
			'thumbnail_url' => $base . 'krem-dlya-glaz.jpg',
			'meta'          => array(
				'label'              => 'Периорбитальная зона',
				'price'              => '1380',
				'volume'             => '20 мл',
				'short_description'  => 'Для отёков, тёмных кругов и потери тонуса области вокруг глаз.',
				'active_ingredients' => '<ul><li>Дренажные активы — борьба с отёчностью</li><li>Увлажнение — комфорт тонкой кожи</li><li>Пептиды — поддержка упругости</li></ul>',
				'full_composition'   => '<p>Дренажный комплекс, увлажняющие активы, пептиды, антиоксиданты.</p>',
				'application'        => '<p>По орбитальной кости подушечками без давления.</p>',
				'recommendations'    => '<p>Для 35+ с отёчностью. Эффективнее с дренажным массажем.</p>',
				'face_yoga'          => '<p>После упражнений на область вокруг глаз.</p>',
				'telegram_message'   => 'Здравствуйте! Хочу заказать Крем для глаз Silver Cream.',
				'related_slugs'      => 'nochnaya-maslyanaya-syvorotka,dnevnoj-krem-dlya-suhoj-kozhi,gidrolat-dlya-licza',
			),
			'skin_type'      => array( 'Любой тип', 'Комбинированная' ),
			'skin_concern'   => array( 'Отечность', 'Пигментация', 'Тусклый цвет' ),
			'product_effect' => array( 'Восстановление', 'Увлажнение', 'Гладкость' ),
		),
		array(
			'slug'          => 'krem-dlya-ruk',
			'title'         => 'Крем для рук',
			'menu_order'    => 7,
			'thumbnail_url' => $base . 'krem-dlya-ruk-1.jpg',
			'meta'          => array(
				'label'              => 'Барьер · Hand care',
				'price'              => '1380',
				'volume'             => '40 мл',
				'short_description'  => 'Питание и восстановление для сухих рук — баобаб, Sepilift, фильтр улитки и «кровь дракона» без липкой плёнки.',
				'gallery_urls'       => "https://naturallift.store/wp-content/uploads/2026/06/krem-dlya-ruk-2.jpg",
				'active_ingredients' => '<ul><li>Масло баобаба и масло бабасу — питание и мягкость</li><li>Sepilift — упругость и поддержка контуров</li><li>Фильтр улитки и Epidermist — регенерация и барьер</li><li>Экстракт готу колы и алоэ — успокоение и восстановление</li><li>CO₂-экстракт питания — <a href="https://co2-extract.ru/product_info.php?products_id=724" target="_blank" rel="noopener">подробнее</a></li></ul>',
				'full_composition'   => '<ul><li>Масло баобаба, Sepilift — <a href="https://co2-extract.ru/product_info.php?products_id=283" target="_blank" rel="noopener">подробнее</a></li><li>Масло чайного дерева, масло бабасу</li><li>Экстракт готу колы, фильтр улитки, трегалоза — <a href="https://co2-extract.ru/product_info.php?products_id=841" target="_blank" rel="noopener">подробнее</a></li><li>Epidermist — <a href="https://co2-extract.ru/forum/showthread.php?tid=1876&amp;fid=114&amp;block=0" target="_blank" rel="noopener">подробнее</a></li><li>Алоэ, консервант, кровь дракона</li><li>CO₂-экстракт питания — <a href="https://co2-extract.ru/product_info.php?products_id=724" target="_blank" rel="noopener">подробнее</a></li></ul>',
				'application'        => '<p>На чистые руки по необходимости, особенно после воды и домашних дел.</p>',
				'recommendations'    => '<p>Для сухой, обезвоженной кожи рук и ломких ногтей. Особенно после 45 лет и при частом мытье рук.</p>',
				'face_yoga'          => '<p>—</p>',
				'telegram_message'   => 'Здравствуйте! Хочу заказать Крем для рук Silver Cream.',
				'related_slugs'      => 'gidrofilnoe-maslo,krem-dlya-glaz,dnevnoj-krem-dlya-suhoj-kozhi',
			),
			'skin_type'      => array( 'Любой тип', 'Сухая' ),
			'skin_concern'   => array( 'Сухость' ),
			'product_effect' => array( 'Восстановление', 'Увлажнение' ),
		),
		array(
			'slug'          => 'nochnaya-maslyanaya-syvorotka',
			'title'         => 'Ночная масляная сыворотка',
			'menu_order'    => 8,
			'thumbnail_url' => $base . 'nochnaya-maslyanaya-syvorotka.jpg',
			'meta'          => array(
				'label'              => 'Ночной ритуал · Oil serum',
				'price'              => '1800',
				'volume'             => '30 мл',
				'short_description'  => 'Натуральная масляная сыворотка для глубокого восстановления липидного барьера, плотности и вечернего лифтинга — идеальна с массажем и фейс-йогой.',
				'gallery_urls'       => "https://naturallift.store/wp-content/uploads/2026/06/nochnaya-maslyanaya-syvorotka-1.jpg",
				'active_ingredients' => '<ul><li>Триглицериды, сквалан, масло жожоба — лёгкая база и восстановление барьера</li><li>Масло шиповника и примулы вечерней — регенерация и эластичность</li><li>Экстракт акмелы — мягкий лифтинг, работа с мимическим напряжением</li><li>CO₂-экстракты омоложения — <a href="https://co2-extract.ru/product_info.php?products_id=724" target="_blank" rel="noopener">подробнее</a></li><li>SWT-7 — <a href="https://co2-extract.ru/product_info.php?products_id=1149" target="_blank" rel="noopener">подробнее</a></li><li>Витамин E, эфирные масла герани и розмарина</li></ul>',
				'full_composition'   => '<ul><li>Триглицериды, масло шиповника, масло примулы вечерней, масло жожоба, сквалан</li><li>Экстракт акмелы, эфирное масло герани, эфирное масло розмарина</li><li>Витамин E, CO₂-экстракты омоложения и питания, масло чайного дерева, SWT-7</li></ul>',
				'application'        => '<p>Очищение → лёгкое увлажнение (вода или гидролат) → 3–5 капель на влажную кожу → мягкий вечерний массаж. 5–7 раз в неделю, до или вместо крема.</p>',
				'recommendations'    => '<p>Для сухой, обезвоженной и зрелой кожи 30+, когда крема недостаточно. Накопительный эффект: плотность, сияние, спокойный отдохнувший вид. Ручное изготовление, без минеральных масел и силиконов.</p>',
				'face_yoga'          => '<p>После вечернего массажа для закрепления эффекта.</p>',
				'telegram_message'   => 'Здравствуйте! Хочу заказать Ночную масляную сыворотку Silver Cream.',
				'related_slugs'      => 'krem-dlya-glaz,dnevnoj-krem-dlya-suhoj-kozhi,gidrolat-dlya-licza',
			),
			'skin_type'      => array( 'Сухая', 'Нормальная' ),
			'skin_concern'   => array( 'Сухость', 'Тусклый цвет', 'Пигментация' ),
			'product_effect' => array( 'Восстановление', 'Сияние', 'Увлажнение' ),
		),
	);
}

/**
 * Slug продуктов, снятых с витрины.
 *
 * @return string[]
 */
function naturallift_sc_retired_product_slugs(): array {
	return array(
		'dnevnoj-uvlazhnyayushhij-krem',
		'nochnoj-vosstanavlivayushhij-krem',
		'syvorotka-s-peptidami',
		'letnyaya-syvorotka-antistress',
		'vv-krem-dnevnoy',
		'tonik-vitaminka',
		'nochnoj-kontsentrat',
		'oleogel-dlya-ruk',
	);
}
