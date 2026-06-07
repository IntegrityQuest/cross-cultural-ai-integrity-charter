# Session Summary: IQ Platform — Homepage Overhaul, Free Plan Update, UI Tweaks
**Date:** 2026-06-07 (continuation)
**Session type:** Platform polish, content alignment, UI consistency

---

## What Was Done

### 1. Homepage — Full Rewrite (`src/views/LandingPage.tsx`)
Replaced the entire generic AI Suite CodeCanyon landing page with IQ-mission content.

**Removed:**
- "The Ultimate AI Productivity Suite" hero copy
- "50K+ Active Users", "10M+ Generations" (fictional stats)
- CodeCanyon "Buy Now" button
- AI Marketing and Music sections (not IQ-relevant)
- Fake testimonials (Sarah Chen, Michael Torres, Emily Watson)
- "Trusted by Google, Microsoft, Amazon..." branding

**Added:**
- Hero: "AI That Operates Under the Golden Rule"
- Real stats: 50 traditions | 5,000 years | 6 tools | $0 forever
- Tools section: all 6 IQ chatbots as cards (IQ Chat, One Accord, Scholar, Counsel, Scribe, Compare AI)
- Framework section: three pillars
  - "Fifty traditions, one conclusion" — charter origin
  - "Every response is a live test" — accountability architecture
  - "Free. Not freemium." — mission commitment
- Charter quote block
- Pricing: single centered Free plan card, full features list, no 3-column grid issue
- Footer: IQ-specific links, Charter GitHub repo link, CC BY 4.0 notice
- Nav: Tools | Framework | Pricing | Log in | Get Started Free (no Buy Now)

**Floating hero icons updated:** Scale, Users, Compass, Feather (IQ tools)

### 2. Free Plan — Database Update
Updated the `pricing_plans` table in Supabase directly (was showing "Access to 10 AI tools"):

New features list:
- IQ Chat — framework-grounded conversation
- One Accord — consensus from 4 AI systems
- Scholar — deep research assistant
- Counsel — ethical guidance companion
- Scribe — professional writing assistant
- Compare AI — 5 providers side by side
- 1,000 tokens refreshed monthly
- Copy, download & voice input on every tool
- File upload on all chatbots (.txt .md .csv .json)
- Flag & report accountability on every response

New description: "Full access to all IQ tools. Free forever — because the Golden Rule doesn't charge a subscription fee."

Also updated `src/lib/pricing-defaults.ts` (the fallback used if DB is unavailable) to match.

### 3. Registration Flow — Confirmed
- `/register` was already fully functional (name, email, password form calling `register()` from AuthContext → redirects to `/dashboard`)
- Homepage CTAs ("Get Started Free") now link directly to `/register`
- Admin plan CTA updated to "Get Started Free"

### 4. One Accord Header — Matched to GenericChatPage Pattern
The landing state header was narrower (`max-w-lg`) and left-aligned info card. Updated to match the `GenericChatPage` pattern exactly:
- Outer wrapper: `w-full max-w-3xl mx-auto flex flex-col items-center gap-5`
- Description: `max-w-2xl mx-auto` (was `max-w-lg`)
- Info card: `w-full` (was `max-w-lg w-full`)
- Starter prompts grid: `grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 w-full` (was 2-col max-w-lg)
- Info card text: `text-left` (was centered)

### 5. Logo Font Size +1px (All Instances)
- Sidebar logo: `text-[14px]` → `text-[15px]` (both full and collapsed states)
- Header logo: `text-[14px]` → `text-[15px]`
- Landing page BrandMark: `text-[18px]` → `text-[19px]` (both header and footer)

---

## Architecture Notes

### Pricing Strategy
IQ is a single-plan platform (Free only). The landing page now hard-codes the IQ Free plan rather than dynamically fetching from `/api/plans`. The admin dashboard still manages plans for the subscription system (token allocation, user records), but the public-facing page is static IQ content. This is intentional — no ambiguity about tiers.

### Registration Path
`/register` → `register()` in AuthContext → creates user in `users` table → assigns Free plan → redirects to `/dashboard`. Already complete. No additional work needed on the signup flow.

---

## Files Modified
- `src/views/LandingPage.tsx` — full rewrite
- `src/lib/pricing-defaults.ts` — removed Pro/Enterprise demo plans, updated Free plan
- `src/views/OneAccordPage.tsx` — header layout matched to GenericChatPage
- `src/components/layout/Sidebar.tsx` — logo font 14px → 15px
- `src/components/layout/Header.tsx` — logo font 14px → 15px
- Supabase `pricing_plans` table — Free plan features and description updated directly

---

## Current Platform Status
All six IQ chatbots are live and accessible via the sidebar:
- IQ Chat (bespoke component)
- One Accord (consensus AI — Boomie discovery)
- Scholar (deep research)
- Counsel (ethical guidance, IQ framework)
- Scribe (professional writing)
- Compare AI (5 providers side by side)

Homepage reflects IQ mission. Registration works. Free plan is accurate.
Next: Fisher doing comprehensive look-see and user testing. Platform is entering soak/test phase.
