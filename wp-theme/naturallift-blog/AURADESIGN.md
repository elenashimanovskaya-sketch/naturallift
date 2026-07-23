---
name: Natural Lift Blog
description: Дизайн-система для блога о фейс-йоге и естественном омоложении, вдохновленная темой Audrey.
niche: Beauty, Wellness, Yoga, Blog
colors:
  background: "#fdf6f5"
  surface: "#ffffff"
  surface-soft: "#f5e6e8"
  border: "#e8d5d5"
  primary: "#d4a3a5"
  gold-mid: "#c89f88"
  gold-light: "#e8d5a8"
  gold-deep: "#9a7224"
  text-main: "#4a3336"
  text-muted: "#8a6d70"
  lavender: "#8b6fad"
typography:
  headings: "'Cormorant Garamond', serif"
  body: "'Manrope', sans-serif"
spacing:
  section: "80px"
  element: "24px"
radii:
  none: "0px"
  circle: "50%"
  arch: "250px 250px 0 0"
components:
  buttons: "Sharp corners, thin border, elegant hover"
  cards: "White background, overlap on images, no shadow"
assets:
  brand_kit: "https://tempfile.aiquickdraw.com/images/chatgpt/7518a41735c92159485c1158c9750867_a780832a6ce14f99ac51271fb7dc9404.png"
---

# Aura Design System: Natural Lift

## 1. Source Replication Doctrine
Этот дизайн строго следует структуре темы Audrey (17th Avenue Designs) с учетом обновленного референса. Мы используем чистые линии, много воздуха (white space), элегантные шрифты с засечками для заголовков и круглые миниатюры для категорий.

## 2. Composition Lock
- **Header**: Логотип слева, навигация справа.
- **Hero Split**: Экран разделен на две части. Слева — текст на сплошном мягком фоне, справа — фоновое изображение (сыворотка). По центру на границе секций расположено портретное фото в форме арки (tombstone) с толстой белой рамкой.
- **Categories**: Сетка из 4 круглых изображений, подписи центрированы.
- **Layout**: Максимальная ширина контейнера 1400px для шапки и hero, 1200px для контента.

## 3. Philosophy
Естественность, спокойствие, премиальный уход. Дизайн не должен отвлекать от контента. Использование глянцевых розовых и золотых оттенков (rose gold, pearl pink) создает атмосферу роскоши и нежности.

## 4. Typography Hierarchy
- **H1 (Hero/Logo)**: Cormorant Garamond, 48px-64px, 400 weight.
- **H2 (Section Titles)**: Cormorant Garamond, 36px-42px, 400 weight, italic опционально.
- **H3 (Post Titles)**: Cormorant Garamond, 28px.
- **Body**: Manrope, 15px-16px, 1.6 line-height, 300-400 weight.
- **Meta / Buttons**: Manrope, 12px, uppercase, 1.5px letter-spacing.

## 5. Shape & Component Specs
- **Кнопки**: `background: #d4a3a5`, `color: #ffffff`, `padding: 14px 32px`, `text-transform: uppercase`. При наведении: `background: #c89f88`.
- **Hero Portrait**: `border-radius: 250px 250px 0 0` (Arch shape), `border: 12px solid #ffffff`.
- **Изображения (Категории)**: `aspect-ratio: 1/1`, `border-radius: 50%`, `object-fit: cover`.

## 6. Responsive Behavior
- На мобильных устройствах Hero Split перестраивается в колонку: текст сверху, фото сыворотки под ним, портрет перекрывает нижнюю часть фото сыворотки.
- Сетка категорий перестраивается с 4 колонок на 2, затем на 1.
- Навигация центрируется под логотипом.

## 7. QA Checklist
- [ ] Проверить контраст текста `#4a3336` на фоне `#fdf6f5`.
- [ ] Убедиться, что форма арки в Hero строго повторяет референс.
- [ ] Проверить, что изображения категорий строго круглые.
- [ ] Убедиться в наличии кириллицы в Google Fonts.
