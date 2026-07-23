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

| Тип | Путь |
|-----|------|
| Локальный zip | `C:\Cursor\backups\naturallift-site-backup-20260723-170919.zip` |
| Git tag | `backup/pre-cloud-20260723` → commit `f71b07b` |
| GitHub branch (старый main) | `backup/github-pre-cloud-main-20260723` |

Откат: `git checkout backup/pre-cloud-20260723` или распаковать zip.

## Секреты

Только в Cursor Dashboard Secrets / `teya-memory/teya.env.local` (не в git).
