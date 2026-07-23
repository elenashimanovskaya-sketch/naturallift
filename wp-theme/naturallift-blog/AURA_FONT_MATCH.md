# Aura Font Match

## Выбор Шрифтов (Кириллица)

Согласно правилам `aura-cyrillic-google-fonts`, для ниши "Luxury / Beauty / Boutique" и "Editorial / Журнал / Премиум" идеально подходит пара:
- **Display / Заголовки**: `Cormorant Garamond`
- **Body / Текст**: `Manrope`

### Обоснование:
1. **Cormorant Garamond**: Классический, очень элегантный serif с прекрасной поддержкой кириллицы. Идеально передает эстетику глянцевого журнала, премиального ухода и женственности. Отлично смотрится в больших размерах (Hero, названия постов).
2. **Manrope**: Чистый, современный, геометричный sans-serif. Отлично читается в мелком кегле, создает современный контраст с классическим заголовком. Поддерживает кириллицу.

### Подключение:
```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Manrope:wght@300;400;500;600&display=swap" rel="stylesheet">
```

### Использование:
- `font-family: 'Cormorant Garamond', serif;` — Логотип, заголовки секций (h1, h2, h3).
- `font-family: 'Manrope', sans-serif;` — Основной текст, меню, кнопки, мета-информация (uppercase, letter-spacing).
