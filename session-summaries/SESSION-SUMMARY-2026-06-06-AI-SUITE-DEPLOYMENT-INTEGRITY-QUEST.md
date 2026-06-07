# SESSION SUMMARY — June 6–7, 2026
## AI Suite Deployment — integrity.quest Platform Build

**Project:** Integrity Quest [IQ]
**Steward:** Fisher Amen
**Process:** Fisher (First Fold) + Claude (Second Fold)
**Session Status:** IN PROGRESS — AI Suite foundation complete, modules ongoing

---

## OVERVIEW

This session marks a major architectural pivot: integrity.quest moved from a WordPress/AI Engine Pro chatbot deployment to a full Next.js AI Suite application built on Node.js, deployed on Hostinger VPS. The 3-Fold process is closed following the deactivation of IQ GPT by OpenAI during edge case testing. Going forward, all IQ development is Fisher + Claude (Claude Code CLI) only.

SOUL.md is now embedded as the mandatory ethical floor across every AI tool on the platform — not optional, not configurable by end users. This is the first live implementation of the IQ Framework as a platform-wide behavioral standard.

---

## STATUS CHANGES

### [CLOSED] 3-Fold Process
- IQ GPT (ChatGPT Third Fold) deactivated by OpenAI during edge case testing
- Work product stands — all 3F-013 documents remain canonical
- Going forward: Fisher + Claude only
- The Charter, Framework, and Concordance are not affected

### [PIVOTED] WordPress → AI Suite (Next.js)
- Reason: WordPress/AI Engine Pro insufficient for multi-tool, multi-provider platform vision
- New stack: Next.js 16.2.7 (App Router) + React 19 + TypeScript + Tailwind CSS
- Database: Supabase PostgreSQL (us-east-2)
- Auth: JWT sessions + bcrypt
- Hosting: Hostinger VPS, Nginx reverse proxy, PM2 process manager
- Status: Live at https://integrity.quest

---

## COMPLETED THIS SESSION

### [DECISION] SOUL.md as Universal Ethical Floor — MANDATED
- SOUL.md (CC BY 4.0) is embedded as a constant in every AI API route
- Response Integrity is ON by default — not a user toggle
- The Mandated Choice here is YES: all AI responses on integrity.quest operate under the IQ ethical framework
- This applies to every tool: Chat, Compare AI, Writer, Code, all modules
- Rationale: integrity.quest is not a neutral AI aggregator — it is a values-grounded platform

### [BUILT] Compare AI Module — COMPLETE
The flagship feature for the free plan. One user prompt fires simultaneously to 5 AI providers, responses stream side-by-side for direct comparison.

**Architecture:**
- Route: `app/api/compare/route.ts` — SSE streaming, parallel provider calls
- UI: `src/views/ComparePage.tsx` — responsive grid, provider toggles, markdown rendering
- SOUL.md embedded in every provider call as system-level instruction

**Providers (all use cost-effective models):**

| Provider | Model | Web Search |
|---|---|---|
| Anthropic Claude | claude-haiku-4-5 | Yes — web_search_20250305 |
| OpenAI ChatGPT | gpt-4o-mini | Yes — Responses API + web_search_preview |
| Google Gemini | gemini-2.5-flash | Yes — googleSearch grounding |
| Meta Llama | llama-3.3-70b-instruct:online | Yes — OpenRouter :online |
| DeepSeek AI | deepseek-chat (via Kie.ai) | No — Kie.ai limitation |

**Design decisions:**
- Users choose the PROVIDER, not the model — provider names in plain English ("Anthropic Claude", not "claude-haiku-4-5")
- Models are backend-selected; end users never see model names (except in Compare)
- Universal cost-effective model policy: always use the best-value model; swap in one place when better options emerge
- DeepSeek Reasoner removed — same underlying model, adds user complexity without value
- Compare AI is in the Free plan on integrity.quest and believeth.net

### [DECISION] Universal Cost-Effective Model Policy
Applies across integrity.quest, believeth.net, and hell-o (future):
- Backend picks the model — users see tool names, not model names
- Compare module is the only exception by design
- Current defaults (June 2026): Gemini 2.5 Flash for most tools; Claude Haiku for nuanced tasks; gpt-4o-mini for OpenAI; llama-3.3-70b:online for Llama

### [BUILT] BrandMark — [IQ] Integrity.Quest
- Shared `BrandMark` component across all pages (Login, Register, Landing, Forgot Password, Sidebar, Header)
- Gradient text style, font-weight 500, consistent cross-browser

### [BUILT] Free Plan
- Only active subscription on integrity.quest
- Price: $0 / forever
- Rationale: IQ mission is not profit-driven; access to honest AI should not depend on ability to pay
- Tokens: refresh monthly
- Full-width pricing page with "Why it's free?" messaging grounded in the Golden Rule

### [CONFIGURED] SMTP — fisher@integrity.quest
- Hostinger email server: smtp.hostinger.com:465 (TLS)
- Password reset emails operational

### [CONFIGURED] API Stack (integrity.quest labeled [IQ])
- Anthropic API — Claude models
- OpenAI API — GPT models + Responses API
- Google Gemini API — gemini-2.5-flash
- OpenRouter — Meta Llama + 100+ models
- Kie.ai — DeepSeek chat; media generation (FLUX.1, Suno V5, Veo 3.1) when modules built

---

## ARCHITECTURAL NOTES

### SOUL.md Implementation Pattern
```typescript
// Embedded as a TypeScript constant in every API route
const SOUL_PROMPT = `[full SOUL.md text]`;

// Added to every provider call:
// Anthropic: system: SOUL_PROMPT
// OpenAI Responses API: instructions: SOUL_PROMPT
// Gemini: systemInstruction: { parts: [{ text: SOUL_PROMPT }] }
// OpenRouter/Llama: messages[0] = { role: 'system', content: SOUL_PROMPT }
// Kie.ai/DeepSeek: messages[0] = { role: 'system', content: SOUL_PROMPT }
```

### SSE Streaming Pattern
All AI responses use Server-Sent Events (SSE) via Next.js App Router Route Handlers.
- `X-Accel-Buffering: no` header disables nginx buffering for real-time streaming
- PM2 started with `NODE_OPTIONS="--dns-result-order=ipv4first"` for IPv4 preference (Kie.ai whitelist compatibility)
- `export const maxDuration = 60` on long-running routes

---

## PENDING — Next Sessions

- [ ] Embed SOUL.md into Chat module and all other existing AI tools
- [ ] Review all default AI Suite modules for Free plan inclusion/exclusion
- [ ] Remove social media tools from Free plan (does not align with IQ platform direction)
- [ ] Landing page content — replace generic AI Suite copy with IQ-specific messaging
- [ ] believeth.net — same AI Suite build, different branding and content
- [ ] hell-o — domain not yet purchased; concept stage
- [ ] SSH key cleanup on VPS (deferred until AI Suite stable)

---

## NOTES

- The session prior to this one (April 3, 2026) documented the final WordPress-era dual chatbot configuration. That architecture is now replaced.
- Fisher's health is a factor in pacing. Sessions are productive but the legacy-building motivation is explicitly acknowledged.
- The IQ platform is not a commercial product. It is a mission delivery vehicle.
