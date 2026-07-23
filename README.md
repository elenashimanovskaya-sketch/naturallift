# NaturalLift Site

WordPress-тема, плагин Dzen RSS, knowledge-base и контент-план для [naturallift.store](https://naturallift.store/).

## Связь с EXCALIBUR (облачный пайплайн)

| Репозиторий | Роль |
|-------------|------|
| **naturallift-site** (этот) | Тема WP, Dzen RSS, реестр тем, KB продуктов |
| **[EXCALIBUR](https://github.com/elenashimanovskaya-sketch/EXCALIBUR)** | Cloud Agent: research → writer → QA → cover → publish в WP |

Публикация в WordPress → лента `/feed/dzen/` → Яндекс Дзен.

## Расписание (Cursor Automations)

3 запуска в день по **Europe/Moscow**: **09:00**, **13:00**, **18:00**.  
Настройка — в репозитории EXCALIBUR, файл `CLOUD-AUTOMATION.md`.

## Backup

Локальные снимки: `C:\Cursor\backups\naturallift-site-backup-*`

## Секреты

Только в Cursor Dashboard Secrets / `teya-memory/teya.env.local` (не в git).
