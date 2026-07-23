# Brief — naturallift.store

## Цель

Вести блог на https://naturallift.store/ по плану `11-blog-topics.md`: Excalibur пишет SEO/GEO лонгриды, публикует в существующую тему `naturallift-blog`.

## Что уже есть

- Live WordPress + тема `naturallift-blog` (v0.3.1)
- 3 опубликованные записи в блоке «Новое в блоге»
- Плагин Dzen RSS: `/feed/dzen/`
- Knowledge base продуктов: `knowledge-base/products/`
- AURADESIGN в `wp-theme/naturallift-blog/`

## Что делаем сейчас

1. **Не** пересобираем сайт с нуля — только блоговый контур.
2. Пишем статьи по темам **B01–B06** (см. semantic-core run).
3. Публикуем через Excalibur → `teya_excalibur_wp_publish.py` после `allow_publish=yes`.

## Голос и ограничения

- Авторский голос: **Елена Шимановская**, 55+, практик фейс-йоги и создатель Silver Cream.
- Тон: тёплый, экспертный, без медицинских гарантий и AI-slop.
- Мягкие CTA: диагностика кожи, каталог Silver Cream, упражнения.
- Медицинский дисклеймер для Дзена — через плагин RSS.

## Команда Teya

Старт блога (не полный Phase 1):

```text
/teya-phase2-excalibur
```

Параметры: `topic_id: B01` (или `P0-only`, `all`).
