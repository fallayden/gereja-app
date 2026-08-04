---
version: 1.0.0
name: GBIA GRAMMATA GPIB Design System
description: Modern, clean, and elegant interface tailored for church profile and congregations.
colors:
    primary: "#1E3A8A"     # Biru Dongker/Navy - For headers, primary UI, and strong backgrounds
    secondary: "#4B5563"   # Slate Gray - For borders, metadata, secondary text
    tertiary: "#DC2626"    # Merah - Accent color for dates, notification badges, and CTA Buttons
    neutral: "#F8FAFC"     # Off-White/Light Gray - General page foundation and background
    surface: "#FFFFFF"     # White - For clean cards and content containers
    on-primary: "#FFFFFF"  # White text on top of primary navy
typography:
    display:
        fontFamily: Merriweather, serif
        fontSize: 3.2rem
        fontWeight: 700
        letterSpacing: "-0.01em"
    h1:
        fontFamily: Merriweather, serif
        fontSize: 2.0rem
        fontWeight: 600
    body:
        fontFamily: Inter, sans-serif
        fontSize: 1rem
        lineHeight: 1.6
    label:
        fontFamily: Inter, sans-serif
        fontSize: 0.85rem
        fontWeight: 500
rounded:
    sm: 4px
    md: 8px
    lg: 12px
spacing:
    sm: 8px
    md: 16px
    lg: 32px
    xl: 64px
components:
    button-primary:
        backgroundColor: "{colors.tertiary}"
        textColor: "{colors.on-primary}"
        rounded: "{rounded.md}"
        padding: 12px 24px
    button-secondary:
        backgroundColor: "{colors.primary}"
        textColor: "{colors.on-primary}"
        rounded: "{rounded.md}"
        padding: 12px 24px
    card:
        backgroundColor: "{colors.surface}"
        textColor: "{colors.secondary}"
        rounded: "{rounded.lg}"
        padding: 24px
        shadow: "0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)"
---

## Overview

A warm, professional, and accessible palette designed specifically for a church profile and community portal. 
It combines a trustworthy foundation with an engaging accent.

## Colors

The palette relies on strong contrasts to ensure readability and direct the user's flow.

- **Primary (`#1E3A8A`):** The core brand color. Used for headers, main backgrounds (like the CTA section), and structural elements.
- **Secondary (`#4B5563`):** Subdued color for descriptive text, metadata, and visual borders.
- **Tertiary/Accent (`#DC2626`):** The driver for high-priority elements. Used for important dates, labels, and primary CTA buttons.
- **Surface (`#FFFFFF`):** Pure white used to separate content pieces into clean cards.
- **Neutral (`#F8FAFC`):** Subtle off-white background to prevent eye strain.

## Typography

- **display:** Serif (Merriweather) - Used for major section headers and warm greetings (e.g., Kata Sambutan Gembala) to provide an elegant, personal touch.
- **h1:** Serif (Merriweather) - Standard section titles.
- **body:** Sans-serif (Inter) - High legibility for long reading (Warta, Sejarah).
- **label:** Sans-serif (Inter) - Small tags, dates, and minor navigation elements.

## Do's and Don'ts

- **Do** use Tertiary (Red) sparingly to ensure actions (like 'Download Warta' or 'Temukan Kami') stand out.
- **Do** rely on the Surface (White) cards to encapsulate information against the Neutral background.
- **Do** utilize Serif fonts for paragraphs that require a personal, emotional connection (Kata Sambutan Gembala).
- **Don't** clutter the screen with heavy boxes; rely on spacing (`lg`, `xl`) to create breathing room.
- **Don't** force PDF embeds on mobile; always provide direct interaction buttons.
