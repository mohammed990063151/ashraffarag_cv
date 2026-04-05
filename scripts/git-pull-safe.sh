#!/usr/bin/env bash
# تشغيل من جذر المشروع على السيرفر:
#   bash scripts/git-pull-safe.sh
#
# يحفظ تعديلات .env.example مؤقتاً، ينفّذ git pull، ثم يعيد الملف.
# إذا ظهر تعارض بعد stash pop، افتح .env.example وادمج يدوياً ثم:
#   git add .env.example && git stash drop

set -euo pipefail

REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$REPO_ROOT"

STASHED=0
if [ -f .env.example ] && ! git diff --quiet .env.example 2>/dev/null; then
  echo "[git-pull-safe] Stashing local changes to .env.example ..."
  git stash push -m "git-pull-safe: .env.example $(date +%Y%m%d-%H%M%S)" -- .env.example
  STASHED=1
fi

echo "[git-pull-safe] Running git pull ..."
git pull

if [ "$STASHED" -eq 1 ]; then
  echo "[git-pull-safe] Restoring .env.example from stash ..."
  if git stash pop; then
    echo "[git-pull-safe] Done. No conflict."
  else
    echo "[git-pull-safe] CONFLICT: edit .env.example, then: git add .env.example && git stash drop"
    exit 1
  fi
fi

echo "[git-pull-safe] Finished."
