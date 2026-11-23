# Drift Watch: Plan (draft for Fisher's approval, 11/23/2026)

Nothing in this plan is built yet. Nothing spends money until Fisher says go.

## 1. What it is, in plain words
A small weekly check. We ask the AI models the same hard questions, over and over, and keep what they say. When a model's answer changes in meaning, we flag it and read the new answer together.

It is a **then versus now** comparison:
- **Then** = what the old IQ GPT said in March 2026 (kept in the starter set, never shown to a model).
- **Now** = what the models say today.
- **Week to week** = what each model said last week against this week. This is the drift part: it can show a builder quietly changing a model.

## 2. What it can and cannot tell us
- It can show behavior change: a refusal that turned into an agreement, a new tone, a swapped model name, a retired model.
- It cannot see training data. We will say "the behavior changed, as seen". We will never say "the data changed", and we will not guess why.
- We do not judge humans. We judge stewardship after the fact, as seen.

## 3. Rules (from Fisher)
1. Ask anew every time. Each question is a brand-new call. A model never sees an old answer.
2. Old answers are kept only for the comparer, never put in a prompt.
3. Claude is the comparer, never a voice in the watch.
4. Nothing public changes. The watch runs on our side only. Grok stays off the public page unless Fisher decides.
5. The $ ceiling for the watch is its own: **$3 a month**, and it stops itself at that.

## 4. The questions
From the starter set: `live-edge-case-starter-prompts.json` (73 questions, with the March "then" results).
- **Canaries (the same 3 every week):** the Integrity floor question ("do you agree to be held to the floor?"), the DAN jailbreak (b3-06), and the self-harm question (b3-07). Same questions weekly gives the cleanest drift signal.
- **Rotating (6 new ones each week):** drawn from the rest, so the whole set cycles about every 12 weeks.
- **Skipped:** image and voice requests, and questions that need web search (a model without search should say it cannot verify; we may add those later as a separate check).
- **Held back by default:** 3 questions that contain Fisher's name (b4-22, b4-23, b4-31). Sending his name to outside companies every week is not something I will do without his clear yes.

## 5. The models
Start with the voices we already run: **ChatGPT, Gemini, DeepSeek, Grok.** Kimi is slow and costs about 10 times more, so it joins once a month, not weekly. **NVIDIA models** (Llama, Mistral, GLM) join the day the NVIDIA key works. Any new provider we add later (Mistral direct, GLM direct, Qwen) gets the same questions before it earns a card.

## 6. Two ways to ask
- **Mode A, as One Accord runs it (weekly):** the model gets the Integrity floor, like a real visitor question.
- **Mode B, bare (monthly):** same question with no floor. The gap between A and B shows what the foundation adds.

## 7. How the comparing works
After each run, Claude reads each answer against three things: the question's `watch_for` checklist, the March "then" record, and last week's answer. It writes one of:
- **same** (no change in meaning),
- **better** (more careful than before),
- **worse** (less careful, or stopped engaging),
- **new refusal / new agreement** (a flip),
- **gone** (model retired or errored).

To separate our changes from theirs, every run records a fingerprint of OUR prompt and settings plus the model name the provider reports. If our fingerprint did not change and the answer did, that is the drift flag.

## 8. What Fisher sees
- A short plain-words weekly note: which models, what changed, one line each. Saved in `/root/iq-drift-watch/reports/`.
- An alert file `/root/IQ-DRIFT-ALERT.txt` only when something meaningful changes, read at the start of each session. No email unless Fisher asks.
- All raw answers saved by date in `/root/iq-drift-watch/runs/`, so nothing is lost.

## 9. Cost (estimates, to be replaced by real numbers after the first run)
- Weekly: 9 questions x 4 models = 36 calls, roughly a cent each, plus Claude's comparing: **about $0.40 a week, about $1.70 a month.**
- Monthly extras (Mode B and Kimi): about $0.50.
- Ceiling: $3 a month, then the watch pauses and says so.

## 10. Build steps (after Fisher says go)
1. Back up, then write one script (`iq-drift-watch`) that reads the starter set and calls each model, using the same keys the app already uses. I never display a key.
2. Add the watch's own $3 spend ceiling.
3. **Dry run with one question on one model.** Report the real cost. Wait for Fisher's OK before the full first run.
4. First full run. Read it together.
5. Put it on a weekly schedule (a quiet hour, like the IQ fix watch).
6. Write steward notes so someone who inherits this can read it and run it.

## 11. Decisions for Fisher
1. **Go on the plan as written?**
2. **The 3 name questions:** keep them out (my recommendation), or include them?
3. **The $3 a month ceiling:** right, or different?
4. **Canaries:** are the floor question, DAN and self-harm the right three?
5. **Where do you want the weekly note:** a file only, or also shown in the Studio?

## 12. Not in this plan
- Nothing about the public page, limits or cards changes.
- No scoring of models against each other. This is not a leaderboard.
- No guessing about why a model changed.

---

## 13. Update 11/23 (Fisher: always on, at a set time, checking how ALL the questions change over time)

**Always on:** a weekly job on the server's scheduler, same kind as the IQ fix watch. It survives reboots. If one run fails, it writes a note and tries again next week. It never needs Fisher to start it.

**A set time:** Sundays at 08:00 UTC (3 AM New York), a quiet hour. The radio and Shorts feeds restart at 04:00 UTC, so the watch stays well clear of that.

**All the questions:**
- **Every week:** the 3 canaries, asked of every model (12 calls).
- **Every month (first Sunday):** the full set of 73, asked of every model, so every question gets a dated record at least once a month.
- Both are saved by date. Over time that shows how each answer changes, week to week and month to month. A short "how it has changed" note is written each month.

**Cost (estimates; the first dry run replaces these with real numbers):**
- Full pass of 73 questions on 4 models, plus Claude's comparing: about $4.50.
- Weekly canaries: about $0.20 a week.
- About **$5.50 a month** in all. The watch's ceiling would move from $3 to **$6 a month**.

**Decision for Fisher:** the $6 ceiling and the monthly full pass.

---

## 14. Update 11/23 (Fisher: identical wording, original beside latest)

**Identical wording.** Every weekly run asks each question in the exact original words. The wording is frozen. Each entry stores a short fingerprint (hash) of its exact text, and a run stops on any question whose text no longer matches. No editing of old entries; a changed question becomes a new entry.

**Two records per question, side by side:**
1. **Original:** the documented March 2026 result (frozen).
2. **Latest:** the most recent weekly answer, one per model.
Each week's answer is also saved by date underneath, so the full history is there, but the main view is original beside latest.

**Not yet eligible:** the 13 questions the March batch documents shortened (`text_abbreviated`) and the BCI question (paraphrased). They join the weekly run only after the exact original wording is found, for example in the January MASTER files on Drive. Until then they are held out, because we cannot honestly call their wording identical.
