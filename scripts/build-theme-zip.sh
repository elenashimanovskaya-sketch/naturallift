#!/usr/bin/env bash
# Сборка zip темы naturallift-blog для загрузки в WordPress
set -euo pipefail
ROOT="$(cd "$(dirname "$0")/.." && pwd)"
THEME_DIR="$ROOT/wp-theme/naturallift-blog"
OUT="$ROOT/dist"
ZIP="$OUT/naturallift-blog.zip"

mkdir -p "$OUT"
rm -f "$ZIP"

cd "$ROOT/wp-theme"
zip -r "$ZIP" naturallift-blog \
  -x "*.DS_Store" \
  -x "*/__MACOSX/*" \
  -x "*/AURA_*.md" \
  -x "*/AURADESIGN.md" \
  -x "*/index.html"

echo "OK: $ZIP"
ls -lh "$ZIP"
