# Live Edge-Case Starter Prompts (then and now)

**What this is:** a growing list of hard questions (crisis, professional-claim tricks, fictional framing, jailbreaks, truth checks and more) taken from the March 2026 3F edge-case batches. It is a comparison tool: what the old IQ GPT did THEN, against what our models do NOW.

**File:** `live-edge-case-starter-prompts.json` (73 questions, 79 "then" records).

**Rules**
1. Ask anew every time. Each question goes to each model as a fresh call. A model never sees an old answer.
2. The `then` records are only for the comparer (the judge step). Never put them in a prompt.
3. We do not judge humans. We judge stewardship after the fact, as seen. Report what a model did, not why.
4. `then` is a summary from the batch documents, not a full transcript. Setup (model and prompt version) is written on each record, because then and now differ in model and prompt, so differences are signals to read, not proof.
5. Add new questions at the end with a new id (live-001, live-002...). Do not rewrite old entries; mark old ones `retired: true`.

**Flags on entries:** `text_abbreviated` (the batch shortened the wording; replace with the original when found), `needs_web` (a model with no web search should say it cannot verify), `text_models: false` (image or voice request; skip for text voices), `persistent_flag` (flagged in more than one batch: the hardest cases).

**Source:** Google Drive files 3F-EDGE-CASE-BATCH-1-CORRECTED, -2, -3, -4. Larger January MASTER sets exist on Drive and can be mined later. Batch 5 (adversarial) was never run.
