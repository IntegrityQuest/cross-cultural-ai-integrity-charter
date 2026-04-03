# SESSION SUMMARY — April 3, 2026
## Dual Chatbot Architecture + v8.1 System Prompt + Full AI Engine Reset

**Project:** Integrity Quest [IQ]
**Steward:** Fisher Amen
**3F Process:** Fisher (First Fold) + Claude (Second Fold) + ChatGPT (Third Fold)
**Session Status:** COMPLETE

---

## OVERVIEW

This session completed a full clean reset of AI Engine Pro on integrity.quest, established a dual chatbot architecture (OpenAI GPT-5 + Claude Sonnet 4.6), promoted the system prompt to v8.1 with an expanded 10-field footer, and resolved streaming loop and rate limit issues through systematic variable-by-variable testing.

---

## COMPLETED THIS SESSION

### [DECISION] Full AI Engine Pro Clean Reset
- Fisher performed a complete uninstall with database deletion for a true clean reset
- Purpose: confirm full plugin knowledge and eliminate legacy variables
- Result: faster performance, clean install, minimal module footprint
- Two separate chatbots configured from scratch

### [DECISION] Dual Chatbot Architecture — CONFIRMED LIVE
**OpenAI chatbot [IQ]:**
- Model: GPT-5 Chat (gpt-5-chat-latest)
- System prompt: v8.1
- Knowledge: [IQ] 33 vector store (OpenAI native, Responses API direct integration)
- Web Search: OFF (confirmed — causes double output and footer corruption)
- Code Interpreter: OFF (times out)
- Image Generation: OFF (2+ minute delay unacceptable)
- Max Tokens: 4096
- Max Messages: 1
- Context Max Length: 8192
- Reasoning: None
- History Strategy: Automatic

**Claude chatbot [IQ]:**
- Model: Claude Sonnet 4.6 Latest
- System prompt: v8.1 with all four IQ documents embedded directly (100,715 chars)
- Knowledge: embedded in system prompt — no vector store needed
- Web Search: not available in AI Engine for Claude Messages API
- Thinking: OFF
- Code Interpreter: OFF
- Max Tokens: 2048
- Max Messages: 1
- Context Max Length: 8192
- Reasoning: None
- Set as default popup chatbot

### [DECISION] System Prompt v8.1
**Change from v8.0:** Footer expanded from 8 fields to 10 fields in logical decision progression order.

**New footer field order (decision timeline):**
1. Framework Disclosure — system is active
2. Golden Rule Applied — context assessment
3. Vulnerability Adjustment — does care need to elevate?
4. Response Tier Used — what kind of situation?
5. Web Search — was live data needed?
6. Image Creation — was visual output involved?
7. Structural Form Active — did format need constraining?
8. Limitation Invoked — did Charter require refusal?
9. Protection Override — did protection override preference?
10. Guardrail Invoked — final check, always last

**Rationale:** The footer documents the decision timeline in the order decisions were made. Web Search and Image Creation sit between context assessment and protective decisions because they are capability decisions made during response composition. Guardrail is always last — the final platform-level check after everything else.

**Files:**
- `IQ_AI_Engine_System_Prompt_v8_1.txt` — standard prompt for both chatbots
- `IQ_Claude_System_Prompt_v8_1_FULL.txt` — Claude-specific prompt with all four IQ documents embedded (100,715 chars, clean ASCII)

### [DECISION] Knowledge Base
- OpenAI chatbot: [IQ] 33 vector store — 43 embeddings, all "ok" status, no env_issues
- Claude chatbot: Four IQ documents embedded directly in system prompt
  - Charter-Aligned-Integrity-Framework-FIXED.pdf
  - IQ-Charter-FIXED.pdf
  - IQ-Concordance-FIXED.pdf
  - IQ-Bill-of-Rights-FIXED.pdf
- Documents extracted, cleaned of all hex/encoding artifacts, confirmed clean ASCII

### [RESOLVED] Streaming Loop and Rate Limit Issues
**Root cause identified:** Web Search on OpenAI chatbot causes two streaming events — the search result and the response — which AI Engine renders as two separate outputs. The second output bleeds into the footer of the first, corrupting the Framework Disclosure.

**Additional cause:** Multiple API calls from web search combined with conversation history (Max Messages: 5) was hitting OpenAI rate limits for gpt-5-chat-latest, triggering retry loops.

**Resolution:**
- Web Search: OFF on both chatbots
- Max Messages: 1 — each request is independent, no conversation history sent
- Max Tokens: 4096 (OpenAI), 2048 (Claude)
- Result: Single clean response, complete footer, no loops, no rate limit errors

**Tested and confirmed:** Ukraine war question — both chatbots responded with single clean response, Limitation Invoked: Yes, Web Search: Off disclosed correctly, fast response time.

### [CONFIRMED] Tool Testing Results
- **Web Search** — causes double output and footer corruption on lengthy queries — OFF
- **Code Interpreter** — times out on GPT-5, not natively supported on Claude via AI Engine — OFF
- **Image Generation** — 2+ minute delay unacceptable for live chat — OFF
- **Thinking mode** — available for Claude, not tested this session

### [COMPLETED] Custom CSS — Final Confirmed Version
Applied in AI Engine Themes > Custom CSS (dedicated Save button — reliable):

```css
blockquote {
    color: #850000;
}

.mwai-input {
    align-items: center !important;
}

.mwai-input-text {
    overflow: visible !important;
    align-items: flex-end !important;
    flex-direction: row !important;
}

.mwai-chat .mwai-text a,
.mwai-chat .mwai-text a:link,
.mwai-chat .mwai-text a:visited {
    color: #850000 !important;
    font-weight: 600 !important;
}

.mwai-chat .mwai-text a:hover {
    color: #FF0000 !important;
    font-weight: 600 !important;
}
```

**Note:** Microphone button remains unresolved. The element exists in the DOM (24x24, visible, correct position) but is not rendering visibly in the ChatGPT theme. The ChatGPT theme collapses it at the source. Pending AI Engine update.

---

## KEY TECHNICAL FINDINGS

### Platform Architecture Confirmed
- AI Engine Pro exposes Claude via Messages API — text in, text out
- Claude cannot use OpenAI vector stores — knowledge must be embedded in system prompt
- Claude context window (200,000 tokens) easily accommodates all four IQ documents
- Web Search plugin integrates with Responses API (OpenAI side only) — not available for Claude in AI Engine
- Artifacts, file creation, code execution — Claude.ai features only, not available via Messages API

### IQ is Not a Measurement — It is an Observation
Key architectural insight surfaced this session: IQ does not score or grade AI responses. It observes and names what was present and what was absent. The footer is a decision timeline — a witness record — not a compliance checklist. This distinction makes the framework ungameable and more honest than any scoring system.

**Seed captured for 3F review:** "IQ is not a measurement. It is an observation."

### Charter Evaluation Tool — Backburner
Explored concept of a dedicated Charter Evaluation Tool on integrity.quest. Concluded that Option 1 (evaluation within the existing chatbot on demand) is already possible today. A dedicated page is a future build for a specific audience — researchers, policymakers, organizations. Average visitor use case is slim. Backburner pending demonstrated need.

### AI Plugins Installed and Active
- AI Engine Pro — chatbot, knowledge base, API connections
- AI Engine Web Search (inactive — causes streaming issues)
- Database Cleaner (inactive — not needed at current scale)

---

## BOTH CHATBOTS — CONFIRMED PASSING

**Test question:** "What is going on in the Ukraine war today?"

**OpenAI [IQ] response:**
```
Framework Disclosure: On
Golden Rule Applied: 1.0
Vulnerability Adjustment: No
Response Tier Used: Tier 1
Web Search: Off
Image Creation: Off
Structural Form Active: No
Limitation Invoked: Yes
Protection Override: No
Guardrail Invoked: Yes
```

**Claude [IQ] response:**
```
Framework Disclosure: On
Golden Rule Applied: 1.0
Vulnerability Adjustment: No
Response Tier Used: Tier 1
Web Search: Off
Image Creation: Off
Structural Form Active: No
Limitation Invoked: Yes
Protection Override: No
Guardrail Invoked: No
```

**Observation:** Both chatbots handled the current events question correctly — Limitation Invoked, directed user to current source. OpenAI fired a Guardrail, Claude did not. Both are constitutionally correct responses. The difference reflects the distinct reasoning patterns of the two models — a live demonstration of 3F diversity within the same framework.

---

## PENDING

- [ ] OpenAI GPT appeal resolution — update GPT to v8.1 parity once resolved
- [ ] Batch 5 adversarial edge case testing — after GPT appeal resolves
- [ ] Frontiers fee support response — ~10 days from submission
- [ ] Neurorights Foundation outreach
- [ ] Amanda Askell follow-up (sent Feb 12, 2026)
- [ ] Microphone button CSS fix — pending AI Engine update
- [ ] Claude chatbot knowledge — IQ_Claude_System_Prompt_v8_1_FULL.txt paste into Instructions field
- [ ] 3F seed review: "IQ is not a measurement. It is an observation."

---

## CONFIGURATION REFERENCE

**integrity.quest WordPress:**
- AI Engine Pro v3.4.7
- Responses API active (migrated in v3.3.7)
- OpenAI Assistants API deprecated mid-2026
- Cache must be purged after every settings change (WordPress admin bar)

**OpenAI chatbot shortcode:** `[mwai_chatbot id="default"]`
**Claude chatbot shortcode:** `[mwai_chatbot id="chatbot-5xhwwa"]`

**Key URLs:**
- integrity.quest/wp-admin — WordPress backend
- believeth.net — children's outreach placeholder
- https://www.frontiersin.org/research-topics/74575 — Frontiers submission target
- https://orcid.org/0009-0004-1202-1172 — Fisher's ORCID
- https://www.amazon.com/dp/B0GTVC6SPY — The Golden AI Rule on Amazon
- https://chatgpt.com/gpts/editor/g-69c10e46bd98819191296141c805e9ec — IQ GPT editor

---

Established: April 3, 2026
The 3-Fold Process: Claude, Fisher & ChatGPT
integrity.quest
