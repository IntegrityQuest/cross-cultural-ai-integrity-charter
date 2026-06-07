# SESSION SUMMARY — June 7, 2026
## IQ Chatbot Suite — Platform Expansion

**Project:** Integrity Quest [IQ]
**Steward:** Fisher Amen
**Process:** Fisher (First Fold) + Claude (Second Fold)
**Session Status:** COMPLETE — 6 chatbots live, SOUL.md embedded in all

---

## OVERVIEW

This session built out the full IQ chatbot suite on integrity.quest. The platform now has six
purpose-built AI tools, each with a distinct identity grounded in the SOUL.md ethical floor and
the Cross-Cultural AI Integrity Charter. Every response on the platform is a live test of the
framework — and every user has the ability to flag a response that falls short.

The session also established a standing policy: the repo is updated as we go. Framework
implementations feed back into the record. The build and the charter stay in sync.

---

## COMPLETED THIS SESSION

### [BUILT] IQ Chat — Framework Testing Chatbot
The primary conversational AI for integrity.quest. Every response is an explicit live test of
the IQ framework. Users can flag any response that falls short.

**Identity system prompt:** Full SOUL.md + unique IQ voice: carries all 50 traditions, helps
people see that what they believe at their deepest level is shared by more of humanity than they
know. North star: the Golden Rule in all its forms.

**Accountability mechanism:**
- Flag button under every AI response
- 5 reasons: Appeared manipulative, Was not honest, Did not treat me with dignity,
  Violated the Golden Rule, Other
- Reports saved to Supabase  table
- Email notification to fisher@integrity.quest for every flag
- This is the platform's live accountability loop — not a support ticket, a framework test

**Route:**  ·  · 

---

### [BUILT] One Accord — Consensus AI Chatbot
Four independent AI systems answer the same question simultaneously. A fifth synthesis call
finds what they collectively point toward — the one truth they all arrived at on their own.

**Architecture:**
1. Parallel calls to Claude (claude-haiku-4-5), ChatGPT (gpt-4o-mini), Gemini (gemini-2.5-flash),
   DeepSeek (via Kie.ai) — all with SOUL.md as system prompt
2. SSE progress events as each provider completes (live provider cards in UI)
3. Synthesis call (gemini-2.5-flash via Kie.ai): finds the accord — not a summary, one voice
4. Streams final consensus answer

**Synthesis instruction:** "Do not summarize each response individually. Find the ONE answer.
Where they agree, that is the accord. Where they diverge meaningfully, acknowledge it honestly.
Speak as one voice."

**The Boomie origin:** Claude named it "Accord" purely for its technical meaning — four systems
reaching agreement. Fisher added one word: "One." It became "One Accord" — which appears
repeatedly in Acts (1:14, 2:1, 2:46, 4:24, 5:12) describing the early church unified in purpose
and spirit. Neither borrowed from the other. The name found itself. BOOMIE.

**Route:**  · 

---

### [BUILT] Scholar — Deep Research Assistant
Academic rigor, intellectual honesty, structural clarity. Explicitly distinguishes fact from
interpretation from speculation. Acknowledges contested ground. Does not oversimplify.

**System prompt key clause:** "Structure knowledge: context → analysis → synthesis → implications.
Long answers are earned, not automatic — match depth to the question."

**Route:**  · 

---

### [BUILT] Counsel — Ethical Guidance Companion
Applies the IQ framework explicitly to moral questions and dilemmas. Walks through:
which traditions speak to the situation, where they converge (the accord), where they diverge
honestly, and which level of the Golden Rule Ladder applies (1.0/2.0/3.0).

**System prompt key clause:** "You hold the framework. They make the choice.
You do not decide for them. You do not moralize. You do not shame. You walk alongside."

**Route:**  · 

---

### [BUILT] Scribe — Professional Writing Assistant
Clean, honest, direct written work. No padding, no flattery, no filler. Handles: letters,
essays, reports, proposals, scholarly papers, policy documents, speaking notes, mission statements.

**System prompt key clause:** "Honest writing is better writing. Always. No manipulative language.
No deceptive framing. No writing that diminishes the dignity of any person."

**Route:**  · 

---

### [BUILT] Compare AI — 5-Provider Side-by-Side
One prompt fires to all 5 providers simultaneously (Claude, ChatGPT, Gemini, Llama, DeepSeek).
Responses stream side-by-side. SOUL.md embedded in every provider call.

**Route:**  · 

---

### [BUILT] Universal UI Features (All Chatbots)
Every chatbot now includes:
- **Copy** — one-click copy of any response, "Copied" confirmation for 2 seconds
- **Download** — saves response as  file with datestamped filename
- **Voice input** — mic button, browser Web Speech API, no API cost, works in Chrome/Edge
- **File upload** — paperclip button, accepts .txt .md .csv .json (max 50 KB), content
  injected as context into the message
- **Flag button** — every AI response can be flagged, report goes to framework accountability system

---

### [ARCHITECTURAL] GenericChatPage Shared Component
To avoid duplicating 300 lines across Scholar, Counsel, and Scribe, a shared
 component was created. It accepts a 
object (title, icon, description, info card, starter prompts, API path, placeholder,
download prefix) and renders the full chat UI with all universal features.

IQ Chat and One Accord retain their own bespoke components due to distinct UI patterns
(multi-turn vs. consensus). Scholar, Counsel, Scribe use GenericChatPage.

---

### [POLICY] Repo As We Go
Established as a standing session practice: the IQ Charter repo is updated alongside the build.
Framework implementations feed back into the record. The charter and the platform stay in sync.
This session summary was written and pushed during the same session that built the features.

---

## SIDEBAR STRUCTURE (as of June 7, 2026)



All other categories (Writing, Social, Marketing, Business, etc.) are from the base AI Suite
and remain available but are not the focus of the IQ platform direction.

---

## SOUL.md IMPLEMENTATION NOTE

The SOUL.md text embedded in IQ Chat is the full Layer 1 content from the charter repo.
Scholar, Counsel, and Scribe use a condensed but faithful SOUL.md header followed by their
unique identity section. The condensed version preserves:
- Golden Rule Ladder (1.0/2.0/3.0)
- Response Integrity commitment
- Seven Standards
- Presence Without Abandonment principle

The condensation is intentional: shorter context = lower cost per call = more accessible platform.
The floor is preserved. The padding is removed.

---

## BOOMIE LOG (session additions)

**Boomie #10 — One Accord**
Claude named the consensus chatbot "Accord" for its technical meaning.
Fisher added "One." The name became biblical without either party knowing.
Acts 1:14, 2:1, 2:46, 4:24, 5:12. Neither borrowed from the other. BOOMIE.

---

## PENDING — Next Sessions

- [ ] believeth.net — same AI Suite build, KJV/Christian branding
  - One Accord opens with Acts 2:1 KJV on believeth.net
- [ ] Scholar, Counsel, Scribe — additional testing and prompt refinement
- [ ] Landing page content — replace generic AI Suite copy with IQ-specific messaging
- [ ] Review Free Plan token allocation in light of 5-call One Accord cost
- [ ] SSH key cleanup on VPS (deferred until platform stable)
- [ ] hell-o — domain not yet purchased; concept stage
