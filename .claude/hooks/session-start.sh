#!/bin/bash
set -euo pipefail

# Only run in remote Claude Code sessions
if [ "${CLAUDE_CODE_REMOTE:-}" != "true" ]; then
  exit 0
fi

PAT_FILE="$HOME/.github_pat"

if [ ! -f "$PAT_FILE" ]; then
  echo "WARNING: ~/.github_pat not found — git push to GitHub will fail." >&2
  exit 0
fi

PAT=$(cat "$PAT_FILE")
git -C "${CLAUDE_PROJECT_DIR:-.}" remote set-url origin \
  "https://${PAT}@github.com/IntegrityQuest/cross-cultural-ai-integrity-charter.git"
