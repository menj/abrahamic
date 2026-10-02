# Abrahamic: Single Source of Truth

This file is authoritative for identity, naming, structure, design tokens, breakpoints, settings and recorded decisions. When code and this file disagree, correct one of them in the same release and log the change in `changelog.md`.

| Field | Value |
|---|---|
| Current version | **2.81.0** |
| Release date | 2026-09-20 |
| Status | Stable |

---

## 1. Identity

| Item | Value |
|---|---|
| Theme name | Abrahamic |
| Folder and slug | `abrahamic` |
| Package file | `abrahamic-{version}.zip`, containing the `abrahamic/` folder |
| Parent theme | Twenty Twenty-Five (`Template: twentytwentyfive`) |
| Theme type | Child theme. The parent must stay installed. The child supplies `front-page` and `page-landing` templates and the `header` and `footer` parts, which the parent's templates also pick up by slug; all other templates come from the parent. Child `theme.json` merges over the parent's |
| Site | https://abrahamic-religions.com/ |
| Author | Abrahamic Religions, https://abrahamic-religions.com |
| Licence | GNU GPL v2 or later (`License` and `License URI` in `style.css` and `readme.txt`) |
| Minimum WordPress | 6.7 |
| Tested up to | 7.1 |
| Minimum PHP | 7.4 |

## 2. Naming conventions

Every identifier the theme introduces carries one prefix. Do not introduce a second.

| Kind | Convention | Examples |
|---|---|---|
| Text domain | `abrahamic` | `__( 'Gold', 'abrahamic' )` |
| PHP functions | `abr_` | `abr_get_option()`, `abr_icon()` |
| PHP constants | `ABR_` | `ABR_VERSION`, `ABR_DIR`, `ABR_URI` |
| Option key | `abr_options` (single array) | |
| Settings group | `abr_settings` | |
| Admin page slug | `abrahamic-theme-options` (`ABR_OPTIONS_SLUG`) | Appearance > Theme Options |
| Admin-post actions and nonces | `abr_` + verb + object | `abr_export_options`, `abr_import_options`, `abr_reset_options`, `abr_seed_run`, `abr_seed_restore` |
| Seed options, meta and filter | `abr_seed…`, `_abr_seed…` | `abr_seeded_slugs`, `abr_seed_version`, `abr_seed_log`, `_abr_seed`, `abr_seed_enabled` |
| Shortcodes | `abr_` | `[abr_newsletter]`, `[abr_social]`, `[abr_icon]`, `[abr_year]` |
| CSS classes | `abr-`, BEM-style elements with `__` | `.abr-header__inner`, `.abr-religion` |
| CSS modifiers | `is-` state and variant classes | `.is-dark`, `.is-active`, `.is-islam` |
| CSS custom properties | `--abr-` | `--abr-navy`, `--abr-font` |
| Asset handles | `abr-` | `abr-theme`, `abr-admin`, `abr-editor-scheme` |
| JavaScript globals | `abr` + PascalCase | `abrTheme`, `abrOptions` |
| Browser storage keys | `abr` + PascalCase | `abrOptionsTab` |
| Pattern namespace | `abrahamic/` | `abrahamic/hero` |
| Pattern category | `abrahamic` | |
| Block style | `gold` on `core/button` | `.is-style-gold` |

Retired in 2.0.0: prefix `ar_`/`AR_`/`ar-`, option `ar_options`, text domain and slug `abrahamic-religions`. The 2.0.0 migration reads `ar_options` once; nothing else may reference the old names.

## 3. Version locations

A release updates every row. The procedure lives in `upgrading.md`, section "Release checklist".

| # | File | Field |
|---|---|---|
| 1 | `style.css` | `Version:` |
| 2 | `functions.php` | `ABR_VERSION` |
| 3 | `readme.txt` | `Stable tag:` and a new `= x.y.z - date =` changelog entry |
| 4 | `docs/changelog.md` | New `## [x.y.z] - date` section |
| 5 | `docs/ssot.md` | "Current version" and "Release date" above |
| 6 | Package file name | `abrahamic-x.y.z.zip` |

Versioning follows Semantic Versioning. A change to any identifier in section 2, a removed setting or a removed pattern is a major release.

## 4. Directory structure

```
abrahamic/
├── style.css              Theme header only
├── functions.php          Bootstrap, asset loading, block style, shortcode render filter
├── theme.json             Palette, type, font faces, layout widths, element styles
├── screenshot.png         1200 × 900, captured from the front page at 2x and resized; refresh it whenever the header, hero or palette changes
├── readme.txt             General audience
├── assets/
│   ├── css/theme.css      Front end and editor
│   ├── css/admin.css      Settings screen
│   ├── css/login.css      Login screen
│   ├── js/subnav.js       Home page section bar: marks the section in view
│   ├── js/parallax.js     Home page chapter banners: parallax drift
│   ├── images/banners/    Chapter banner photographs (desktop and phone AVIF)
│   ├── js/theme.js        Front end
│   ├── js/admin.js        Settings screen
│   ├── js/analytics.js    Google Analytics bootstrap
│   ├── js/mode.js         Light and dark colours, loaded in the head
│   ├── js/description.js  Search description counter
│   ├── js/lightbox.js     Photograph viewer, pages with [abr_photo] only
│   ├── images/            logo-mark.svg (AR monogram), logo.png (512 × 512), favicon-32.png, icon-192.png,
│   │                      apple-touch-icon.png (180 × 180), share.png (1200 × 630),
│   │                      symbols.png (alpha mask, 606 × 280), photos/ (site photographs, AVIF;
│   │                      photos/large/ holds full-frame versions up to 2000 px for the viewer)
│   ├── icons/social/      45 network marks, one SVG per slug (section 11)
│   └── fonts/             Sabon Next LT (8 files, bundled by requirement), EB Garamond supplement (2),
│                          Special Elite, Arslan Wessam, Noto Serif Hebrew, Noto Sans Syriac,
│                          Noto Sans Imperial Aramaic
├── inc/
│   ├── icons.php          abr_icon() interface icons (section 10)
│   ├── social.php         Network registry and icon loader (section 11)
│   ├── options.php        Option schema, defaults, sanitising, schemes, migration (section 8)
│   ├── theme-options.php  Theme Options screen and Tools handlers (section 8)
│   ├── shortcodes.php     Option-driven shortcodes
│   ├── structure.php      Link tokens, navigation builder, breadcrumbs, hub listings, site map (section 13)
│   ├── seed.php           Starter content seeder (section 12)
│   ├── seed/content.php   Starter pages, articles and categories as block markup (section 12)
│   ├── seed/legacy-v1.php Version 1 fingerprints and addresses (section 12)
│   ├── seo.php            Search output, description box, analytics (section 13)
│   ├── redirects.php      301s from earlier addresses, link updater (section 13)
│   ├── search.php         Search index, relevance, readable search addresses
│   ├── unlist.php         Unlisted posts and pages (port of Unlist Posts & Pages)
│   ├── login.php          Themed login screen, private login address (ports of Login Logo and WPS Hide Login)
│   ├── diagrams.php       [abr_diagram]: the family tree and shared-beliefs diagrams
│   ├── anonymity.php      Keeps every person out of public output: REST users, author archives, feeds, embeds, sitemap
│   ├── rank-math.php      Rank Math: focus keywords where empty; licence, speakable and FAQ data merged into its schema; no Person or Gravatar
│   ├── tags.php           Journal tags: fixed lowercase vocabulary (inc/seed/tags.php), lowercase enforced, thin tag pages noindexed
│   └── maintenance.php    Back-shortly notice (503): wp-content drop-ins for updates, fatal errors, database failures; missing-file guard
├── parts/                 header.html, footer.html
├── patterns/              Fifteen home page sections (section 9)
├── templates/             front-page.html, page-landing.html, page.html, single.html, home.html, archive.html, search.html, 404.html
└── docs/                  readme.md, changelog.md, upgrading.md, ssot.md
```

Documentation is limited to `readme.txt` and the four files in `docs/`. Any other notes are merged into one of these.

The theme is licensed GPLv2 or later, declared in the `style.css` header and in `readme.txt`, whose Copyright section lists every bundled resource with its licence. No separate licence file ships; the EB Garamond, Noto and Special Elite subsets keep their copyright and full licence text (OFL and Apache 2.0) inside their own name tables (name IDs 0, 13 and 14).

| Resource | Licence | GPL position |
|---|---|---|
| Theme code, templates, patterns, interface icons, share image, symbols watermark | GPLv2 or later | Theme licence; the symbols artwork was supplied by the site owner as GPL |
| Photographs in `assets/images/photos/` | Supplied by the site owner from the site's own media library (2016 to 2023 backup) | Confirm the rights for each before distributing the theme beyond this site |
| Photographs from Wikimedia Commons: place-sinai, mandaeism, isaiah-scroll, tanakh, christian-bible, ur-ziggurat, jordan-river, jerusalem-panorama, cordoba, megiddo, birmingham-quran, ten-commandments and dumat-al-jandal | Public domain or Creative Commons, per file (section 6, Photographs) | Attribution kept on the Copyright and DMCA page; ShareAlike files stay under their licence |
| AR mark and its rasters | Outlines taken from Sabon Next LT | Not placed under the GPL; logo use rests on the Monotype licence held for Sabon |
| Minimalist Social & Platform Icons Pack (43 icons) | GNU GPL | Compatible |
| Simple Icons (LinkedIn, Scribd) | CC0 1.0 | Compatible |
| EB Garamond supplement (1.003) | SIL OFL 1.1 | Accepted for bundling in GPL themes |
| Noto Serif Hebrew (2.003), Noto Sans Syriac (3.000), Noto Sans Imperial Aramaic (2.002) | SIL OFL 1.1 | Accepted for bundling in GPL themes |
| Special Elite (1.001) | Apache 2.0 | Compatible with GPLv3; distributed alongside a GPLv2-or-later theme as a separate font file |
| Arslan Wessam A (1.00) | No licence terms in the file; copyright "Arslan, Dev-Point.com"; embedding flag allows editable embedding | Supplied by the site owner for this site; not placed under the GPL; confirm the author's terms before redistributing the theme |
| Dubidam Arabic | "Free personal use" | Not bundled: a public website is outside personal use without a commercial licence |
| Sabon Next LT | Proprietary (Monotype) | Not GPL; bundled by requirement, excluded from the theme licence, and stated as such in `readme.txt` |

## 5. Colour tokens

Palette slugs are defined in `theme.json`. The active scheme overrides the matching `--wp--preset--color--*` variables inline (`abr_scheme_css()`), so blocks and theme CSS follow it. Tints are derived in CSS with `color-mix()` from these five values; never hard-code a tint.

| Slug | Role | Classic Navy | Manuscript Sepia | Jerusalem Stone | Lapis |
|---|---|---|---|---|---|
| `navy` | Headings, dark bands, primary buttons | `#172033` | `#3B2A1E` | `#2F3A2E` | `#14305C` |
| `ivory` | Page background | `#F8F5EF` | `#F6EFE2` | `#F5F2EA` | `#F7F6F2` |
| `gold` | Accent | `#B89555` | `#A8743A` | `#B08D57` | `#C39A4A` |
| `beige` | Surfaces, placeholders | `#E9E2D5` | `#E7DAC4` | `#E4DDCD` | `#E3E4E8` |
| `charcoal` | Body text, footer | `#242424` | `#2B2420` | `#262A24` | `#1E2330` |
| `white` | Cards | `#FFFFFF` | fixed | fixed | fixed |

The Custom scheme takes the five editable values from the settings screen.

## 6. Typography

| Item | Decision |
|---|---|
| Family | Sabon Next LT for all text (`--abr-font`, preset slug `sabon`) |
| Bundling | **Required.** Sabon Next LT ships inside the theme, in full, and is never loaded from an external service. `abr_sabon_files()` lists the eight files; a missing file raises an error notice on the Themes and Theme Options screens and shows in Tools > System information |
| Faces | Regular 400, Italic 400, Bold 700, Bold Italic 700, converted to WOFF2 with every glyph, OpenType feature and name record kept |
| Files per face | `sabon-next-lt-{face}.woff2` (Latin, 493 characters, about 55 KB) and `sabon-next-lt-{face}-ext.woff2` (everything else, 389 characters, about 50 KB). Together they hold all 882 characters of the original font |
| Latin `unicode-range` | U+0000-02FF, U+1E00-1EFF, U+2000-214F, U+2190-22FF, U+25CA, U+FB00-FB06 |
| Extended `unicode-range` | U+0374-0375, U+0384-0386, U+0388-038A, U+038C, U+038E-03A1, U+03A3-03CE, U+03F0-03F1, U+0400-045F, U+0490-0493, U+0496-0497, U+049A-049B, U+04B0-04B3, U+04B6-04B7, U+051A-051D, U+058F, U+060B, U+09F2-09F3, U+0AF1, U+0BF9, U+0E3F, U+17DB, U+E089, U+E100-E109, U+E11E-E127, U+E132-E14F, U+E192-E193, U+E196, U+E19F-E1B6, U+E1DA, U+E1DF-E1E0, U+E1E3, U+E200-E207, U+E20B-E20D, U+E214, U+E232-E233, U+E23B-E23E, U+E248, U+E276-E280, U+E283, U+E288-E28F, U+E2B0-E2B2, U+E2F8-E2FE, U+E300-E30A, U+E30C, U+E310, U+E319-E31B, U+E32B-E33B, U+E91F, U+EC01, U+ED08-ED17, U+F464, U+F6D1, U+F6D4, U+F8FF, U+FDFC. Covers Greek, Cyrillic, currency signs and Monotype private-use alternates; browsers fetch the file only when a page uses one of these |
| Combining marks | U+0300, U+0301, U+0303, U+0309 and U+0323 are bundled in the extended files and left out of both ranges, so they are never used. Sabon's anchors misplace them (the dot below lands at the letter's origin), and their presence in the Latin file let browsers build ḥ from h plus a misplaced dot |
| Weights in CSS | 400 and 700 only. `font-synthesis: none` is set, so any other weight would be matched to the nearest real face |
| Display headings | Regular 400 (h1, h2, section titles) |
| Small headings, buttons | Bold 700 |
| Labels | Regular 400, uppercase, tracked 0.16em |
| Body weight | 400, set in `theme.json` to replace the parent's 300; quotes and pull quotes also 400; `strong` and `b` fixed at 700 |
| Base size | 1.1875rem (19px), fluid down to 1.125rem |
| Preload | Latin Regular and Latin Bold |
| Transliteration fallback | "EB Garamond Transliteration" from `eb-garamond-supplement(-italic).woff2`, EB Garamond 1.003 variable (weight 400 to 800), roman and italic, `size-adjust: 107%`, `unicode-range` U+02BE-02BF, U+0323, U+032E, U+0331, U+1E0C-1E0F, U+1E24-1E25, U+1E2A-1E2B, U+1E6C-1E6F, U+1E92-1E96, U+1F00-1FFF. Bold transliteration letters render at true bold weight. Loads only on pages that use those characters |
| Greek | "EB Garamond Greek" (preset `greek`), the same files, `unicode-range` U+0300-036F, U+0370-03FF, U+1F00-1FFF, applied through `:lang(grc)` and `:lang(el)` so whole Greek words share one design. Untagged polytonic letters fall back to the transliteration face. Mark ancient Greek with `<span lang="grc">` |
| Hebrew and square-script Aramaic | Noto Serif Hebrew (preset `hebrew`), variable weight 100 to 900 at normal width, with vowel points, cantillation marks and presentation forms; `unicode-range` U+0590-05FF, U+FB1D-FB4F and joiners. Applied through `:lang(he)`, `:lang(hbo)` (Biblical Hebrew) and the Aramaic tags `:lang(arc)`, `:lang(tmr)`, `:lang(jpa)`, `:lang(oar)`, `:lang(sam)`, at 1.06em. The stack continues to the Imperial Aramaic and Syriac faces, so an `arc` tag resolves in any script |
| Syriac | Noto Sans Syriac, Estrangela (preset `syriac`), variable weight, with its joining features; `unicode-range` U+0700-074F, U+0860-086F and the marks Syriac borrows. Applied through `:lang(syc)`, `:lang(syr)`, `:lang(aii)`, `:lang(cld)`, at 1.1em |
| Imperial Aramaic | Noto Sans Imperial Aramaic (preset `imperial-aramaic`), U+10840-1085F, applied through `:lang(arc-Armi)` and reached from the Hebrew stack |
| Untagged Semitic text | The body stack lists the Hebrew, Syriac and Imperial Aramaic faces after the transliteration fallback, so Hebrew or Aramaic pasted without a language tag still renders from the bundled fonts. Tagging remains preferred for size and direction |
| Typewriter note | Special Elite (preset `typewriter`), Latin only, used solely by the "Typewriter note" block style on paragraphs and quotes (`.is-style-abr-typewriter`): archival notes and document transcriptions. Bold becomes underline and italic becomes roman, since the face has one style |
| Arabic calligraphy | Arslan Wessam, Diwani (preset `arabic-display`), Arabic ranges and the space only, with its joining features kept. Used solely by the "Arabic calligraphy" block style on paragraphs and headings (`.is-style-abr-calligraphy`): short centred display lines at 2.2rem to 3.6rem. Never for running text or inline glosses, which keep the Naskh stack |
| Loading | None of the added faces is preloaded; each downloads only on a page that uses its characters or style |
| Marking up | `<span lang="he" dir="rtl">`, `<span lang="hbo" dir="rtl">`, `<span lang="arc" dir="rtl">` (square script), `<span lang="syc" dir="rtl">`, `<span lang="arc-Armi" dir="rtl">`, `<span lang="grc">`, `<span lang="ar" dir="rtl">` |
| Arabic script | `:lang(ar)` stack: Noto Naskh Arabic, Amiri, Scheherazade New, Geeza Pro, Traditional Arabic, serif; 1.12em. Mark Arabic with `<span lang="ar" dir="rtl">` |
| Sabon glyph gaps | ḥ ḍ ṭ ẓ ʿ ʾ ḫ ṯ ḏ and their capitals are absent from Sabon Next LT; ā ī ū ṣ š ġ are present. Enter transliteration as precomposed characters, which is what keyboards and the block editor produce |

## 6a. Logo

| Item | Decision |
|---|---|
| Mark | "AR" in Sabon Next LT Bold at 250 units, tracked -0.02em, centred in a 512-unit square, baseline at 336; a gold rule 240 × 6 at y 394 |
| Source | `assets/images/logo-mark.svg`, outlines traced from the bundled font with fontTools, so no font loads for it. Parts carry the classes `abr-mark__bg`, `abr-mark__letters` and `abr-mark__rule` |
| Colours | Navy square, ivory letters, gold rule; inline copies take `--abr-navy`, `--abr-ivory` and `--abr-gold` from the active scheme. The file itself keeps the Classic values |
| Sizes | Header 44px (48px when the mark stands alone, 38px up to 360px wide); footer 40px with a faint outline; 6px corners |
| Rasters | `logo.png` 512, `icon-192.png`, `apple-touch-icon.png` 180 and `favicon-32.png`, all rendered from the SVG. Regenerate them whenever the SVG changes |
| Accessibility | Inline mark is `aria-hidden`; the link carries "{name}, home" |
| Icons | Printed by `abr_default_icons()` on `wp_head` and `login_head` only while `has_site_icon()` is false |

### Reference works as leads, not as sources

An encyclopedia article may be used to find what to check, never as the citation itself, and never as text: its licence would carry conditions onto anything reproduced from it. The claims it suggests are verified against scholarship and cited there. The history of the term "Abrahamic religions" reached the site this way.

### Sources

Where a reference page draws on scholarship, the prose is written from the source and the source is cited in a footnote with its page. Nothing is reproduced: neither wording, nor a selection's arrangement, nor scanned material. Six sources are used this way, all in copyright:

- The 1969 Macmillan anthology compiled by Wing-tsit Chan, al Faruqi, Joseph M. Kitagawa and P. T. Raju, whose Islam section al Faruqi compiled: cited on Islam (pp. 323, 332), Sacred texts (p. 332) and Comparative studies (pp. 323, 326).
- The 1974 Macmillan historical atlas of the religions of the world, edited by al Faruqi with David E. Sopher as map editor: cited on Islam (pp. 237, 240), Judaism (p. 140, the chapter by Jacob Agus) and Christianity (p. 201, the chapter by Gerard Sloyan). Its maps and photographs are not reproduced.
- Aaron W. Hughes on the history of the category (Oxford University Press, 2012), pp. 17-35 and 35, cited on Comparative studies.
- Three works of E. S. Drower, the standard field scholarship on the Mandaeans, all cited on the Mandaeism page: her edition and translation of the Haran Gawaita (Vatican, 1953), pp. 3 and 15-16; her ethnography of the Mandaeans of Iraq and Iran (Oxford, 1937), pp. xiii-xiv; and her study of Nasoraean gnosis (Oxford, 1960), pp. ix-x and 21-33.
- Eric Segelberg's 1958 study of the Mandaean baptismal liturgy (Uppsala: Almqvist & Wiksells): cited at p. 38 and n. 2 on the Mandaeism and Places pages for the word *yardna* and the individual rite. Segelberg derives the word from the river Jordan and records that Drower doubted the connection, so the site gives both views.
- James F. McGrath's 2024 life of John the Baptist (Grand Rapids: Eerdmans), supplied as an unpaginated ebook text: not cited, because the file carries no page numbers. A paginated copy is needed before it can support a footnote.
- Two studies of the Sabians, cited on the Sabians article: Noor Mohammad Osmani and Abul Kalam Md Motiur Rahman (2025, e-ISSN 2600-8394, vol. 9, no. 2; journal title unconfirmed), and Muhammad Azizan Sabjan (2011), World Journal of Islamic History and Civilization 1 (3): 163-167. Maurice Hines's 2023 AUC thesis is in the project and not yet cited.
- The Islamic Awareness study of Qur'an 19:7 (2000): cited on the John the Baptist article by section, for the two readings of *samiyy* and the separate roots of Yaḥyā and Yoḥanan.
- Two Islamic Awareness studies of the kings and Pharaohs of Egypt: cited on the king and Pharaoh article and the Figures page by section, and as the route to the Egyptological dictionaries they quote.

Footnote numbers follow document order, and "Ibid." is used only where the preceding note is the same work, which matters on Islam, where both sources appear.

### Footnotes

Scripture references and citations go in footnotes. In the content source a marker is `[^n]`; the generator turns it into `<sup class="abr-fn">` linking to `#note-n`, and a final `## Notes` heading with a list becomes an ordered list with `id="note-n"` and a back-link to the marker. Verse numbers never appear in the running text.

### Tags

Journal tags come from the fixed vocabulary in `inc/seed/tags.php`: lowercase, search-led, each on at least three articles, and never repeating a category (the theme refuses a tag that matches one). New articles need a line there; a new tag needs a description under 130 characters with a call to action and a focus keyword, and should not be added until three articles can carry it.

### Rank Math

When Rank Math is active it has the last word wherever an editor has set a title, description, focus keyword or schema. Where the theme's support is superior, its defaults take precedence: its structured data replaces Rank Math's default schema (unless a schema was built in Rank Math's Schema tab for that page), and its titles and descriptions fill whatever Rank Math leaves empty. Robots, canonical links, social tags and sitemaps are Rank Math's. Every item must score green in Rank Math. A new article needs: a focus keyword drawn from its address in `inc/seed/focus-keywords.php`; a search title in `inc/seed/seo-titles.php` that starts with the keyword, stays under 60 characters with the branding, and where possible carries a number and a power word; the keyword in the description, opening, a subheading and the featured image alt text; a table of contents; at least 600 words, paragraphs under 120 words, one external source link, keyword density 1% to 2.5%; and an address of 34 characters or fewer, so the full live address stays under 75. Keywords about the Qur'an use the curly apostrophe.

### Titles and descriptions

Rank Math, when active, always wins: any title or description set in it is used as it stands. Where Rank Math has nothing set, and whenever it is not active, the theme's defaults apply: titles end "| Abrahamic Religions" (never " - ") and are under 60 characters in all (short search titles in `inc/seed/seo-titles.php`, or a post's `_abr_seo_title`); descriptions are under 130 characters and end with a call to action. The home page title is the `home_title` option, never the page name "Home".

### Structured data

Organization, WebSite, WebPage (or CollectionPage, AboutPage, ContactPage), BreadcrumbList, Article with speakable, FAQPage (FAQ and the question-and-answer articles), and ImageObject with licence data from `inc/seed/photo-credits.php` for every credited photograph. When photographs are added, add their credit to that file as well as to the Copyright and DMCA page. No Person or ProfilePage anywhere.

### Anonymity

No person is named as author, owner or creator anywhere a visitor, search engine or AI tool can read: pages, feeds, embeds, the REST API, sitemaps, schema, or the theme's own public files. Every article's author and publisher is the site itself. See `inc/anonymity.php`.

### Photographs

**Sources and licences.** Photographs come from Wikimedia Commons, from Flickr (searched through the Openverse catalogue) and from Pexels. The site is non-commercial, as confirmed by the site owner on 26 September 2026, so the permitted licences are public domain, CC0, CC BY, CC BY-SA, CC BY-NC and CC BY-NC-SA, together with the Pexels licence. No-derivatives (ND) licences are excluded because every photograph is cropped to its frame, and so is anything marked all rights reserved. Every photograph is credited on the Copyright and DMCA page with its author, licence and a link to its source page. NC photographs are licensed for this non-commercial site only: if the theme or the site were ever used commercially, those photographs would need to be replaced.

`[abr_photo name="" alt="" ratio="" icon="" caption="" note=""]` prints a bundled photograph from `assets/images/photos/{name}.avif` with its own width and height, lazy loading and async decoding; where the file is absent it falls back to the decorative panel, so a pattern never breaks. Images are cropped to their frame at build time (hero 1200 × 1000, place cards 800 × 450, article images 1200 × 675), saved as AVIF at quality 50, and dimmed slightly in dark mode. Place cards and the hero share one ratio between photographs and panels, so a card without a photograph lines up with its neighbours.

### Placeholder panels

`.abr-panel-art` stands in for photography. Its caption is public; guidance for the site's own editors goes in `[abr_art_note text=""]`, which prints only for signed-in users who can edit theme options, so the text stays out of the public page even if the front page is later customised in the Site Editor. Editor-only notices elsewhere (newsletter, contact address, donation link) follow the same rule.

### Symbols watermark

`assets/images/symbols.png` holds the cross, crescent and star as an alpha mask: the file carries shape only, and CSS supplies the colour, so the watermark follows the active scheme. `.abr-heritage::after` places it at the lower right of the shared heritage band, gold at 9% opacity (7% and wider up to 600px), bleeding off the edge, hidden under `prefers-reduced-transparency`. Keep any further use faint and small; the drawing is coarser than the rest of the design. Its symbol order runs Christianity, Islam, Judaism, against the site's chronological order elsewhere.

Commons sources, cropped and resized for the theme. `masbuta-karun` (Mehdi Pedramkhoo, CC BY 4.0) was added in 2.36.0, and `karnak` (Tsyganov Sergey, CC0) in 2.39.0. Public domain: `place-sinai` (Mount Sinai Egypt.jpg), `tanakh` (Leningrad Codex Folio 008a), `christian-bible` (Codex Alexandrinus 013a), `isaiah-scroll` (Great Isaiah Scroll Ch53), `birmingham-quran`, `ten-commandments` (Aleppo Codex, Deuteronomy). CC BY: `mandaeism` (Mehdi Pedramkhoo, 4.0), `ur-ziggurat` (Hardnfast, 3.0), `dumat-al-jandal` (Richard Mortel, 2.0). CC BY-SA: `megiddo` (AVRAMGR, 4.0), `cordoba` (Benjamin Smith, 4.0), `jordan-river` (Fallaner, 4.0), `jerusalem-panorama` (Daniel Case, 3.0). Photographs placed with `[abr_photo]` inside page or article content open in the viewer (`assets/js/lightbox.js`): a native `<dialog>` whose colours come from `--abr-dark-surface`, `--abr-on-dark` and `--abr-gold`. A file of the same name in `photos/large/`, full frame and no more than 2000 pixels on its long side, is what the viewer shows; `[abr_photo]` exposes it as `data-abr-full`. Hero, place card, intro and About photographs sit outside post content and do not open. Any new Commons image needs a line in the credits section of the Copyright and DMCA page (`page:dmca`) and here. No image depicts a prophet.

## 6b. Light and dark colours

| Item | Decision |
|---|---|
| Switch | `[abr_mode_toggle]` in the header before the search icon: a rail with a sliding knob carrying the sun and moon icons, `aria-pressed` on the button and screen-reader text that changes with the state. Hidden up to 480px, where the header has no room |
| Storage | `localStorage` key `abr-mode`; a visitor's choice outlives the setting in Theme Options |
| First visit | `mode_default`: light, dark, or the device setting. `assets/js/mode.js` loads in the head, before the first paint, and reads the value from `data-abr-mode-default` on its own script tag; with `system`, later changes to the device setting are followed until the visitor chooses |
| Applying | `data-abr-mode="dark"` on `<html>`; `color-scheme` set in both modes so form controls and scrollbars follow |
| Palette | Dark mode remaps the five scheme presets (ivory `#0f131b`, white `#171d29`, navy `#ece7dd`, charcoal `#e8e3d9`, beige `#2b3341`, gold `#cfa869`), so components that pair tokens invert together and every scheme, including a custom one, keeps its character |
| Surfaces that stay dark | `--abr-dark-surface` and `--abr-on-dark` carry the dark bands (shared heritage, knowledge base, newsletter) and the footer, so they stay dark in both modes instead of inverting |
| Readable gold | `--abr-gold-ink` (gold mixed toward navy in light mode, the scheme gold in dark) carries small uppercase labels, which the plain gold left at 2.8:1 on white |
| Contrast | Measured in both modes on body text, cards, navigation, labels, footer, dark bands and prose: every pair at or above 4.5:1, except large text held to 3:1 |

## 6c. Search

| Item | Decision |
|---|---|
| Index | Each published page and article carries `_abr_index` (title, excerpt, search description, terms and content) and `_abr_index_title` (title and excerpt), both normalised: lower case, diacritics removed (`abr_search_letters()` covers hosts without the intl extension), apostrophes dropped, punctuation reduced to spaces, and padded with spaces so a whole word can be matched |
| Spelling variants | `abr_search_equivalents()` holds sets such as Makkah, Mecca, Bakkah; Qur'an, Koran; Muhammad, Mohammed; Ibrahim, Abraham. When a text uses one of a set, the others are added to its index, so either spelling finds it. Matching is by whole word, so "Abrahamic" never counts as "Abraham" |
| Scope | Pages and articles together, 12 to a page (`pre_get_posts`) |
| Matching | `posts_search` is replaced: every word of the query, or one of its equivalents, must appear in the index |
| Ranking | `posts_orderby` scores the whole phrase as a title (400), the phrase inside the title (120), each word whole in the title (60), part of a title word (15) and each word in the body (8), newest first within a score |
| Results | `[abr_search_results]`: the count, then each result with the section it sits in, a passage around the first match with the match marked, and its address. An empty search asks for a word and offers the topics; no match does the same |
| Index upkeep | Rebuilt on `save_post`, after each seeder run, and from Theme Options > Tools > Rebuild the search index (`abr_search_rebuild_index()`, count in `abr_search_indexed`) |
| The header form | The core search block with the field hidden (`buttonPosition: button-only`, `isSearchFieldHidden`). The icon opens the field and focuses it, Escape and a click outside close it, Enter submits to `/?s=`. Core marks the open state by removing `wp-block-search__searchfield-hidden` from the form, which the theme's styles key off |
| The form at each width | Up to 1023px the open field drops to a full-width row under the header (absolute, with the header inner positioned), so the bar never moves; the icon stays in place and submits. From 1024 to 1279px the field opens at 170px, because the bar also carries the whole menu, Explore and Donate. From 1280px it opens at its full width |
| Crawling | Search results stay out of search engines: `noindex` on the page and a `Disallow` line in robots.txt |

### Topics and tags

Topics are categories: they carry descriptions, appear as chips on listings and in the footer, and every starter article belongs to one or more. Tags are optional and unused by the starter content; nothing breaks when none exist, since the tag chips and the tagged line on an article render only when there is something to show. A topic archive keeps the card grid with the topic chips; a tag archive uses `tag.html`, a narrower index that ends with every tag in use.

## 6d. Reading measure and spacing

| Item | Decision |
|---|---|
| Column | `contentSize` 820px, `wideSize` 1320px |
| Measure | `--abr-measure: 45rem` (720px), applied to every child of `.abr-prose` and of `.abr-page-head`, so breadcrumbs, title, headings, paragraphs, lists and notes share one left edge. A fixed length, since `ch` scales with each element's own font size and would leave headings wider |
| Type | Body 1.22rem with line height 1.78; paragraph spacing 1.35em; `h2` 2.4em above, `h3` 1.9em |
| Air | Page head 64px above, main 104px below; 34px and 64px on phones |
| Breaking out | `.abr-table`, `.abr-photo` and images span `min(1180px, 92vw)`, centred with negative margins, and return to the column below 1240px |
| Why | Lines ran to about 80 characters in a 760px column with 44px above the content, which reads as cramped; the measure is now about 74 characters with more leading and more room around it |

## 6e. Article presentation

| Item | Decision |
|---|---|
| Header | `.abr-article-head` on `single.html`: a full-width dark panel carrying breadcrumbs, topics, title, standfirst, a short gold rule and the byline. The rule is a block sharing the measure with a 96px bar inside, so it starts on the text edge |
| Opening letter | A raised initial on the first paragraph, with a gold hairline beneath. `::first-letter` accepts neither `transform` nor `clip-path`, so the diamond of the reference design is not attempted |
| Section marks | A small gold diamond above each `h2` in an article, excluding the notes heading |
| Pull quotes | Blockquotes set in italic at 1.28em with a gold left rule |
| Citation | `[abr_citation]` prints a bordered "Cite this page" box with title, site, year and address, and a Copy button handled in `theme.js` |
| References | Two columns from 900px, with items kept whole |

## 7. Breakpoints

Width tiers are declared once, at the end of `assets/css/theme.css`. Queries use `max-width` except for the menu range.

| Tier | Width | Behaviour |
|---|---|---|
| Desktop | 1280px and up | Inline main menu with dropdowns; Explore and Donate buttons |
| Tablet landscape | 1024 to 1279px | Inline main menu with link padding reduced to 9px. Content keeps desktop grids; comparison rows stack label over value |
| Tablet portrait | 601 to 1023px | Main menu collapses to the overlay panel. Split sections stack. Three-up grids become two-up, with an odd last item spanning the row. Figures three-up, places two-up, topics four-up, articles two-up. Comparison shows one tradition with tabs. Footer: brand row, then three link columns |
| Header widths | Checked in 8px steps from 320 to 1440: the menu never wraps to a second row and no page scrolls sideways. The logo shows the AR mark alone up to 560px, the call-to-action appears from 1200px, and from 1024 to 1199px the menu links, gaps and switch are tightened |
| Mobile | up to 600px | Header 64px, Explore button hidden, Donate button compact; up to 480px the logo shows the AR mark alone. Single column. Figures and topics two-up. Hero buttons full width. Footer two columns |
| Small phone | up to 360px | Compact header and tighter card gaps |
| Touch | `pointer: coarse` | 44px minimum targets for footer links, tabs, timeline arrows and social links |
| Hover | `hover: hover` | Card lift and button lift only where hover exists |

The Navigation block collapses at 600px by default. `theme.css` extends the collapse to 1023px; five top-level links fit one row from 1024px. The header is 72px tall; anchor offsets use `--abr-header-h`. The header's `backdrop-filter` is removed while the overlay is open (`:has(.is-menu-open)`), since it would otherwise trap the fixed-position panel inside the bar.

Side gutters come from `theme.json`: `clamp(20px, 4vw, 40px)`.

Verified widths for 2.0.0: 320, 340, 360, 390, 600, 601, 768, 820, 1023, 1024, 1180, 1239, 1240, 1279, 1280, 1366, 1439 and 1440, with no horizontal overflow and a single-row header at each.

## 8. Theme Options

Screen: Appearance > Theme Options (`themes.php?page=abrahamic-theme-options`), rendered by `inc/theme-options.php`. The data layer is `inc/options.php`. Capability: `edit_theme_options`, for viewing and for saving (`option_page_capability_abr_settings`). The former address `page=abrahamic-settings` redirects here. An admin-bar shortcut sits under the site name.

| Tab | Holds | Saves through |
|---|---|---|
| General | Sticky header, fade-in | Settings API (`abr_settings`) |
| Header | Logo lines, search button, call-to-action button | Settings API |
| Footer | Brand title, tagline, description, copyright notice, note, contact email | Settings API |
| Navigation | Header menu, three footer columns (section 13) | Settings API |
| Colours | Scheme, custom palette | Settings API |
| Newsletter | Form address, field name, intro | Settings API |
| Social | 45 profile URLs | Settings API |
| Search | Search output switch, front page description, logo, share image, verification codes, Analytics ID | Settings API |
| Tools | Export, import, reset, starter content, link updater, system information | `admin-post.php` |

Tab selection: `?tab=` in the address first, then `sessionStorage` key `abrOptionsTab`, then General. The script keeps the address and the form referer in step, so saving returns to the same tab. Unticked switches submit through a hidden `0` field.

Stored as one array in `abr_options`. `abr_option_types()` is the schema; `abr_option_defaults()` the defaults; `abr_sanitize_options()` drops unknown keys and cleans each value by type; `abr_get_options()` merges the stored row over the defaults.

| Key | Type | Default | Tab |
|---|---|---|---|
| `sticky_header` | bool | 1 | General |
| `reveal_motion` | bool | 1 | General; ignored under reduced motion |
| `logo_style` | logo_style | `mark_text` | Header; `mark_text`, `mark` or `text` (`abr_logo_styles()`) |
| `logo_main` | text | Abrahamic | Header; also the accessible name when the mark stands alone |
| `logo_sub` | text | Religions | Header; empty gives a one-line logo |
| `header_search` | bool | 1 | Header; off adds body class `abr-no-header-search` |
| `header_cta` | bool | 1 | Header |
| `header_cta_label` | text | Explore | Header |
| `header_cta_url` | link | `@guides` | Header; full, root-relative or anchor address, or a token (section 13) |
| `header_donate` | bool | 1 | Header; red Donate button after the call-to-action, visible at every width |
| `header_donate_label` | text | Donate | Header |
| `header_donate_url` | link | `the owner's payment page` | Header; `@donate` opens the Donate page instead. A stored `@donate` from 2.12.0 is moved to the PayPal address once (`abr_migrate_donate_link()`, flag `abr_donate_link_migrated`); a later deliberate `@donate` is kept. External targets carry a title naming the host |
| `donate_colour` | hex | `#b3261e` | Header; printed as `--abr-donate` with the scheme variables |
| `donation_url` | url | `the owner's payment page` | Header; the Donate now button on the Donate page (`[abr_donation]`). When empty, the page uses the header link if it points to another site, otherwise it points to the Contact page |
| `donation_button` | text | Donate now | Header |
| `footer_title` | text | Abrahamic Religions | Footer |
| `footer_tagline` | text | Exploring faith, history, culture, and shared heritage. | Footer |
| `footer_text` | textarea | Description sentence | Footer |
| `footer_copyright` | text | © {year} Abrahamic Religions. All rights reserved. | Footer; `{year}` becomes the current year |
| `footer_note` | text | An independent educational resource. | Footer; empty hides it |
| `contact_email` | email | empty | Footer; shown on the Contact page through `[abr_contact_email]`, obfuscated with `antispambot()`; empty shows nothing to visitors |
| `nav_header` | menu_primary | Five content links: Religions (Judaism, Mandaeism, Christianity, Islam), Sacred Texts, Timeline, Reference (Figures, Places, Comparative Studies, Glossary, Frequently Asked Questions, Research), Journal. Values equal to an earlier default (`abr_legacy_menu_defaults()`) are read as this default | Navigation |
| `further_title` | text | Further reading | Navigation |
| `further_links` | menu_further | empty | Navigation; up to 6 links (`ABR_FURTHER_MAX`), no dropdowns; empty hides the list |
| `nav_secondary` | menu_secondary | Site links: About AR, Editorial Policy, Contact AR, Donate, Knowledge Base (external: `https://knowislam.wiki/`), Privacy Policy, Terms & Conditions, Sitemap | Navigation; shown only in the footer's bottom row; empty hides the row |
| `nav_footer_1_title`, `nav_footer_1` | text, menu | Explore; Religions, Judaism, Christianity, Islam | Navigation |
| `nav_footer_2_title`, `nav_footer_2` | text, menu | Reference; Reference, Sacred Texts, History and Timeline, Figures, Places, Comparative Studies, Glossary, FAQ, Research | Navigation |
| `nav_footer_3_title`, `nav_footer_3` | text, menu | Journal; Latest Entries, All Topics, History, Scripture, Theology, Philosophy, Interfaith Studies | Navigation |
| `scheme` | scheme | `classic` | Colours; must be a key of `abr_schemes()` |
| `custom_navy`, `custom_ivory`, `custom_gold`, `custom_beige`, `custom_charcoal` | hex | Classic values | Colours; invalid values fall back to the default |
| `newsletter_url` | url | empty | Newsletter; empty hides the form from visitors |
| `newsletter_name` | key | `email` | Newsletter |
| `newsletter_text` | textarea | Intro sentence | Newsletter |
| `social_{slug}` for each of the 45 networks in section 11; each hyphen in the slug becomes an underscore | url | empty | Social; empty entries are omitted from the footer |
| `seed_mode` | seed_mode | `replace` | Tools; `replace` or `keep` (`abr_seed_modes()`) |
| `seo_enabled` | bool | 1 | Search |
| `seo_home_description` | textarea | empty | Search |
| `org_logo`, `share_image` | url | empty | Search; chosen from the media library |
| `google_verification`, `bing_verification` | token | empty | Search |
| `ga4_id` | ga4 | empty | Search; must match `G-` followed by 4 to 20 letters or digits |

Sanitising by type: `bool` to 0 or 1; `email` through `sanitize_email`; `link` through `abr_sanitize_link()` (tokens keep `a-z0-9:_-`, anything else through `esc_url_raw`); `menu` line by line through `abr_sanitize_menu()`, dropping lines without a label or a valid target; `menu_primary` and `menu_secondary` also apply the limits in section 13 and report removed lines as a settings warning; `token` through `abr_sanitize_token()`; `ga4` upper-cased and pattern-checked; `logo_style` must be a key of `abr_logo_styles()`; `text` through `sanitize_text_field`; `textarea` through `sanitize_textarea_field`; `url` trimmed, then `esc_url_raw`; `key` through `sanitize_key`; `hex` through `sanitize_hex_color`. A missing text, textarea or url value takes its default; a missing bool counts as off.

Tools:

| Action | Handler | Nonce | Behaviour |
|---|---|---|---|
| Export | `admin_post_abr_export_options` | `abr_export_options` | Downloads `abrahamic-options-YYYY-MM-DD.json`: `theme`, `version`, `exported`, `site`, `options` |
| Import | `admin_post_abr_import_options` | `abr_import_options` | Accepts a JSON file up to 1 MB whose `theme` is `abrahamic`. Known keys in the file replace current values; other options keep theirs; unknown keys are ignored; everything is sanitised |
| Reset | `admin_post_abr_reset_options` | `abr_reset_options` | Asks for confirmation, then writes the defaults. The row stays in place with default values, so the 1.x migration cannot re-import `ar_options` |
| Add missing starter content | `admin_post_abr_seed_run` | `abr_seed_run` | Runs the seeder (section 12) |
| Restore | `admin_post_abr_seed_restore` | `abr_seed_restore_{key}` | Clears one tombstone and recreates that item |
| Update links | `admin_post_abr_update_links` | `abr_update_links` | Points content links at current addresses (section 13) |

Result notices use the `abr-notice` query argument: `imported`, `reset`, `import-empty`, `import-bad`, `seeded`, `restored`, `restore-failed`, `links-updated`.

## 9. Templates, parts and patterns

| File | Purpose |
|---|---|
| `templates/front-page.html` | Header, the fifteen patterns below in order, footer |
| `templates/page-landing.html` | Full-width page without a title |
| `templates/page.html` | Breadcrumbs, `h1` title, content |
| `templates/single.html` | Breadcrumbs, topics, `h1` title, excerpt, date and reading time, featured image, content, topics, related articles, further reading, previous and next links |
| `templates/home.html` | Insights page: breadcrumbs, `[abr_page_heading]`, topic chips, article grid, pagination |
| `templates/tag.html` | Tag archive: breadcrumbs, the label Tag, the tag name, its description, how many articles carry it, a compact list of 20 (topics, title, excerpt, date), pagination, every tag in use as chips, then the section links |
| `templates/archive.html` | Breadcrumbs, archive title, term description, topic chips, article grid, pagination |
| `templates/search.html` | Breadcrumbs, search title, search form, results, section links |
| `templates/404.html` | Breadcrumbs, heading, explanation, search form, section links, three latest articles |
| `parts/header.html` | `[abr_logo]`, Navigation block (`abr-primary-nav`, links from Theme Options), Search block, `[abr_header_cta]`, `[abr_header_donate]` |
| `parts/footer.html` | `[abr_footer_brand]`, `[abr_social]`, `[abr_footer_menu column="1"]` to `"3"`, then a bottom row: `[abr_secondary_nav]` on its own line, `[abr_copyright]` and `[abr_footer_note]` |

Structure shortcodes (`inc/structure.php`): `[abr_term_label]`, `[abr_term_count]`, `[abr_tag_list]`, `[abr_secondary_nav]`, `[abr_further_reading]`, `[abr_breadcrumbs]`, `[abr_child_pages]`, `[abr_topic_index]`, `[abr_topic_chips]`, `[abr_page_heading]`, `[abr_related_articles]`, `[abr_reading_time]`, `[abr_hub_links]`, `[abr_site_map]`, `[abr_footer_menu]`. Front page patterns build their links with `abr_link()`, so they follow the pages they point to; figure and place cards link to the matching section of the Figures and Places pages.

Front page order, with section anchors: `hero` (#hero), `intro` (#intro), `religions` (#religions), `heritage` (#heritage), `comparison` (#comparison), `texts` (#texts), `figures` (#figures), `places` (#places), `timeline` (#timeline), `articles` (#articles), `topics` (#topics), `resources` (#resources), `faq` (#faq), `about` (#about), `newsletter` (#newsletter).

Theme shortcodes (`[abr_…]`) inside Shortcode, Custom HTML and Paragraph blocks are rendered at block render time (`abr_render_theme_shortcodes()`), because WordPress runs `do_shortcode()` on templates before nested patterns are expanded. A Paragraph that holds nothing but a shortcode loses its `<p>` to `shortcode_unautop()`, so option-driven output goes in Custom HTML blocks and supplies its own wrapper.

## 10. Interface icons

`inc/icons.php` holds a small hand-drawn set on a 24×24 grid with a 1.6 stroke and `currentColor`: `star-of-david`, `cross`, `crescent`, `scroll`, `city`, `mosque`, `mountain`, `arrow-down`, `arrow-right`, `info`, `book`, `history`, `pray`, `globe`, `lamp`, `archway`, `handshake`, `landmark`, `search`.

`abr_icon( $name )` falls back to `abr_social_icon( $name )` for any name outside that set, so social marks are reachable through the same function and the `[abr_icon]` shortcode. Brand marks are never drawn by hand.

## 11. Social icons

| Item | Decision |
|---|---|
| Source | Minimalist Social & Platform Icons Pack 2.8, `svg/black/` |
| Substitutions | `linkedin.svg` from Simple Icons 13 and `scribd.svg` from Simple Icons 15 (CC0), replacing the pack's Font Awesome versions, whose CC BY 4.0 terms require a visible credit on the site |
| Location | `assets/icons/social/{slug}.svg`, 45 files, about 44 KB in total |
| Normalisation | Comments, `<title>` and `role` removed; `fill="currentColor"` on the root; black fills on groups replaced with `currentColor`; whitespace collapsed. Markup limited to `svg`, `g` and `path`; every file checked for scripts, styles, links and embedded images, and parsed as well-formed XML |
| Output | Inline, with `aria-hidden="true"`, `focusable="false"` and classes `abr-icon abr-icon--social abr-icon--{slug}`. The link carries the accessible name |
| Loading | `abr_social_icon()` reads only registered slugs, so no path from input reaches the file system; results are cached per request |
| Not shipped | The pack's PNG folders, its white SVG variants (colour comes from CSS) and its README |
| Footer size | 36px circles with 17px marks; 44px circles with 19px marks on touch screens |

Registry, in footer order:

| Group | Slugs |
|---|---|
| Social networks | `facebook`, `instagram`, `x`, `threads`, `bluesky`, `mastodon`, `linkedin`, `tiktok`, `pinterest`, `snapchat`, `reddit`, `tumblr`, `gtribe` |
| Video and audio | `youtube`, `vimeo`, `twitch`, `spotify`, `soundcloud`, `suno` |
| Messaging | `whatsapp`, `telegram`, `signal`, `discord`, `line`, `wechat` |
| Writing and publishing | `substack`, `medium`, `wordpress`, `wordpress-profile`, `goodreads`, `issuu`, `scribd`, `quora` |
| Scholarly and identity | `academia`, `orcid`, `wikipedia`, `wikidata`, `isni`, `viaf`, `oclc` |
| Creative and professional | `github`, `behance`, `dribbble`, `flickr`, `fiverr` |

`wordpress` is the platform mark; `wordpress-profile` is for profiles.wordpress.org. Both use the same glyph.

## 12. Starter content

The theme populates the site itself, following the seeder pattern used in the Murtadd theme. `inc/seed.php` runs the seeder; `inc/seed/content.php` holds the content as ready block markup and is the single source for it; `inc/seed/legacy-v1.php` holds the version 1 fingerprints and addresses.

### Rules

1. **Runs** on theme activation (`after_switch_theme`) and on the next admin load whenever the stored `abr_seed_version` is below `ABR_SEED_VERSION`. Editors can run it from Theme Options > Tools.
2. **Tombstones.** Every key the seeder creates or adopts is written to `abr_seeded_slugs` with a timestamp. A recorded key is never processed again, so content an editor deletes or trashes is never recreated. Only Restore in Tools removes one key and recreates that item.
3. **Adoption.** If a page or post with the same slug exists when an item is first created, the seeder adopts it untouched, records the key and never writes to it again. WordPress's own default privacy policy draft is filled and published only while it is unedited (modified date equals creation date).
4. **Structure sync.** When the seed version rises, each seeder-owned item (`_abr_seed` present) whose `_abr_seed_version` is older takes the current slug and parent page. Adopted pages are never moved.
5. **Text sync,** governed by the `seed_mode` option (`abr_seed_modes()`):
   - `replace` (default): title, text and excerpt take the current version whether or not the item was edited. WordPress stores the previous text as a revision.
   - `keep`: the text is refreshed only while it still matches its fingerprint, `_abr_seed_hash`, or for version 1 items the hash in `legacy-v1.php`. Links are compared root-relative.
6. **Retirement.** A key in the tombstone list that the starter set no longer carries has its post moved to the trash, where it can be restored; option and cleanup keys are exempt. Counted as `retired` in `abr_seed_log`.
6b. **When it runs.** On activation; on an admin screen loaded by a user with `edit_theme_options` while the stored version is behind; and, failing both, on the next ordinary page request (`abr_seed_on_request()` at `wp_loaded`, behind a five-minute transient lock). A site whose owner never opens the right admin screen still receives new starter content. Every admin screen also carries a notice while the content is behind or items are missing (`abr_seed_admin_notice()`), with a button that runs it.

7. **Set-up steps run once:** the permalink step, keyed `option:permalinks:{hash of the three settings}`, applies the settings in section 13 when the site uses plain permalinks, uses `/%postname%/` with no published articles of its own, or still uses a structure the theme applied before (`abr_previous_permalink_structures()`). Keying by the settings means a later change to them runs once more; `option:tagline` sets the tagline when it is empty or WordPress's old default; `cleanup:defaults` moves the untouched sample post and page to the trash; `option:reading` sets Home as the front page and Articles as the posts page, only when the site shows latest posts with no front page chosen. Earlier versions recorded `option:permalinks` and `option:permalinks-2`.
8. **Links** in seed content are root-relative in the source and rewritten to `home_url()` at insert time. Section headings carry anchors made from their text.
9. **Marking.** Created posts carry `_abr_seed` (the key), `_abr_seed_version`, `_abr_seed_hash` and `_abr_description`. Authors are the current user, else the first administrator. Articles are back-dated by `days_ago`.
10. **Adding or changing content:** edit the item, give new items a permanent key and `'since' => N`, raise `ABR_SEED_VERSION` to `N`, and update the inventory below. Never rename a key: `page:guides` (Religions), `page:knowledge-base` (Reference) and `page:articles` (Insights) keep their original keys. When the seed version rises, an unedited item takes a changed title or excerpt even if its text is unchanged.
10b. **Featured images.** An item with a `'photo'` entry receives that bundled photograph as its featured image while it has none. The file is copied into the media library once and reused; `_abr_seed_photo` marks the article, so the seeder never sets an image on it again.
10c. **Category descriptions.** A term with a `previous` description is brought up to date when its stored description still matches `previous`; any other wording is the editor's and stays.
10c-a. **No self-reference.** Site content never calls itself "this site", and never frames Mandaeism's inclusion as something the site does ("treated here as a fourth", "treats it as one"); it names Abrahamic Religions directly where a self-reference is unavoidable, and otherwise states Mandaeism's place among the four traditions as fact.
10c-b. **Tradition order.** Wherever the four traditions appear as a sequence (menus, front-page cards, compare tabs, tables, section order, list phrases) the order is Judaism, Mandaeism, Christianity, Islam, per the site owner. Exception: passages naming only three (Jerusalem, Hebron, medieval philosophy, interfaith dialogue) keep Judaism, Christianity, Islam, since Mandaeism has no part in those histories.
10d. **Internal links.** The first mention in body text of a tradition, a scripture, a figure, a place or a subject with its own article links to it; never in headings, notes or the opening paragraph, never to the page itself, at most two new links per paragraph. Every Journal article ends with a "Further reading" line (`.abr-further`) to two or three related articles. New content follows the same rule.
11. **Switching off:** `add_filter( 'abr_seed_enabled', '__return_false' );` in a must-use plugin stops every run.
12. **Content standard:** neutral educational register; each tradition described in its own terms; no contractions, em dashes, contrastive negation or banned vocabulary; Arabic terms with transliteration, script and translation on first use, and Hebrew, Aramaic and Syriac terms with their script and translation where they are introduced; lower-case pronouns for Jesus; no book titles in body text; no citations that cannot be verified; figures and dates checked before seeding; each search description 130 characters or fewer, ending with a call to action.

| Stored | Type | Purpose |
|---|---|---|
| `ABR_SEED_VERSION` | constant | Current seed version (97) |
| `abr_seed_photos` | option | Bundled photograph name to media library attachment ID |
| `_abr_seed_photo` | post meta | The photograph the seeder set as this article's featured image |
| `abr_seeded_slugs` | option, not autoloaded | Tombstone list: key => timestamp |
| `abr_seed_version` | option | Last seed version run |
| `abr_seed_log` | option | Time, version, and counts of created, adopted, moved, refreshed, replaced and retired items in the last run |
| `_abr_seed`, `_abr_seed_version`, `_abr_seed_hash` | post meta | Key, version and text fingerprint on seeder-owned posts |
| `_abr_description` | post meta | Search description (section 13), editable in the "Search description" box |

Keys: `category:{slug}`, `page:{key}`, `post:{slug}`, `option:permalinks` (version 1), `option:permalinks-2` (versions 2 to 4), `option:permalinks-3`, `option:tagline`, `cleanup:defaults`, `option:reading`.

### The comparison

The front page carries five themes (belief in God, sacred texts, Abraham, prophets, afterlife) in four columns, which become tabs below 1024px, and a button to the full version. Comparative Studies opens with the whole table, eleven themes by four traditions, before the thematic sections. Keep the two in step when either changes.

### The four traditions on the front page

The Mandaeism card and its node in the lineage diagram are wrapped in `abr_link( '@mandaeism', '' )`, so they appear only where the page exists; a site that has the theme but not yet the starter content shows the other three and no dead links. In the diagram Mandaeism sits below a rule, apart from the descent from Abraham, with a note saying that it shares the prophets from Adam to Shem and does not accept Abraham.

### The four traditions

The site treats Judaism, Mandaeism, Christianity and Islam. Mandaeism is carried as the fourth: it shares the prophetic line from Adam through Noah and Shem, belongs to the same Aramaic world of late antiquity, and has been identified since the seventh century with the Sabians the Qur'an names beside Jews and Christians. The pages state plainly that Mandaeans do not accept Abraham, Moses, Jesus or Muhammad as prophets, and that scholarship more often classifies the religion as Gnostic. Front page sections, the comparison table, the lineage diagram, the Religions hub, the About criterion, the FAQ and the glossary all carry the fourth tradition; the lineage note says that Mandaeism stands apart from the Abrahamic descent.

### Prose audit

Shipped English (starter content, readme.txt, the docs) is swept against the owner's writing rules before release: banned vocabulary, dead phrases and transitions, negative parallelism and its disguises, copulative dodges ("serves as", "offers a"), coordinated triads, anaphoric runs. Proper nouns that collide with the banned list, Old Testament and Night Journey among them, are left alone. Reference lists of the term-plus-definition kind keep their bold lead-ins; ordinary prose does not use that shape.

### Capitalisation

Titles, headings, buttons, menu labels and eyebrow labels are sentence case: the first word and proper nouns only. Proper nouns keep their capitals (Abraham, Abrahamic, Judaism, Mandaeism, Christianity, Islam, Qur'an, Tanakh, Hebrew, Near East, Makkah, DMCA, Sabians). Earlier default menus in `abr_legacy_menu_defaults()` keep their original wording, since they exist to match menus saved before the change.

### Search-engine checks

Measured against Google's starter guide: unique descriptive titles under 60 characters where possible, one `h1` a page, no heading-level skips, unique descriptions of 130 characters or fewer, descriptive anchor text with no "click here" or bare "read more", alt text on every image, readable addresses with one canonical form, breadcrumbs, an HTML sitemap and an XML sitemap, a 404 page that answers with the 404 status and offers routes onward, robots.txt that blocks search results and declares the sitemap, and one responsive site for every device instead of a separate mobile site. The home page title is the site title plus the tagline, so `ABR_SEED_TAGLINE` is kept short: "Judaism, Mandaeism, Christianity, Islam" gives 61 characters.

### Naming

Place and term names follow the transliteration of the source language: Makkah, Madinah, Qur'an. The English form is given once, at the first mention on a page, as "Makkah (Mecca)" in running text or as an opening clause under a heading, so that headings and anchors stay clean (`#makkah`, `#madinah`). Search descriptions keep the English forms, which is what readers type. The Glossary carries an entry explaining the choice.

### Inventory (seed version 11)

Version 11 moved the site to Makkah and Madinah across the starter content, with the English forms paired at first mention and kept in the search descriptions.

### Inventory (seed version 10)

Version 10 restored the site's stated purpose on the About page, which now says plainly that the site exists to help the reader decide which of the three traditions is true, and names the three it treats. The article on Kedar states the conclusion its evidence supports and attributes it. The Editorial Policy adds that where an article reaches a conclusion of its own, the evidence comes first and the conclusion is marked as the site's.


Version 9 renamed the Site Map page to Sitemap at `/sitemap/`, the address the site used before, keeping the key `page:site-map`.


Version 8 brought across the material written for the site between 2016 and 2023, rewritten for 2026 in the house style and merged with the existing text: the three religion pages, the Abraham and Jerusalem articles, the Privacy Policy, and the About page's note on working from the languages. It added four items: the articles on the path of Abraham and on Kedar, the Copyright and DMCA page, and the Thank You page under Donate. Figures were brought up to date (Christianity about 2.4 billion, Catholics about 1.4 billion, Jews close to sixteen million, Muslims close to two billion). `inc/seed/legacy-paths.php` maps earlier addresses to the seed key that carries the material now, for 301 redirects: the nine used between 2016 and 2023, and any the theme itself renames, such as `/site-map/` to `/sitemap/`.

Version 7 added the Donate page (`page:donate`, `/donate/`), whose Give section is `[abr_donation]`: a button to `donation_url` when set, otherwise a sentence pointing to the Contact page, with a note for editors.

Version 6 retitled Terms as Terms & Conditions (address unchanged).

Version 5 renamed two sections: the posts page became Insights at `/journal/` and the reference hub became Reference at `/reference/`; links in the starter content follow.

Version 4 revised five items: About, Editorial Policy and Research now describe the site's method (traditions in their own terms, sources, corrections, editorial responsibility); Comparative Studies and Sacred Texts add notes on divine unity in Jewish and Muslim thought and on the oral transmission of the Qur'an.

Version 3 revised three items: Judaism (Hebrew script for its key terms and the Kaddish), Sacred Texts (a section on Aramaic, Targums and the Peshitta) and Glossary (Aramaic, Gemara, Peshitta, Syriac, Targum). The generator marks glosses as `AR{}`, `HE{}`, `AM{}` (Aramaic in square script) and `SY{}` (Syriac).

Categories: `religion`, `history`, `scripture`, `theology`, `culture`, `philosophy`, `archaeology`, `interfaith-studies`.

| Key | Address | Title | Since | Role |
|---|---|---|---|---|
| `page:home` | `/` | Home | 1 | front |
| `page:articles` | `/journal/` | Journal | 1 | posts |
| `page:judaism` | `/religions/judaism/` | Judaism | 1 |  |
| `page:christianity` | `/religions/christianity/` | Christianity | 1 |  |
| `page:islam` | `/religions/islam/` | Islam | 1 |  |
| `page:sacred-texts` | `/reference/sacred-texts/` | Sacred texts | 1 |  |
| `page:figures` | `/reference/figures/` | Figures | 1 |  |
| `page:places` | `/reference/places/` | Places | 1 |  |
| `page:glossary` | `/reference/glossary/` | Glossary | 1 |  |
| `page:comparisons` | `/reference/comparisons/` | Comparative studies | 1 |  |
| `page:guides` | `/religions/` | Religions | 1 |  |
| `page:research` | `/reference/research/` | Research | 1 |  |
| `page:about` | `/about/` | About | 1 |  |
| `page:editorial-policy` | `/about/editorial-policy/` | Editorial policy | 1 |  |
| `page:contact` | `/about/contact/` | Contact | 1 |  |
| `page:privacy-policy` | `/privacy-policy/` | Privacy policy | 1 | privacy |
| `page:terms` | `/terms/` | Terms & conditions | 1 |  |
| `page:knowledge-base` | `/reference/` | Reference | 2 |  |
| `page:timeline` | `/reference/timeline/` | History and timeline | 2 |  |
| `page:faq` | `/reference/faq/` | Frequently asked questions | 2 |  |
| `page:topics` | `/journal/topics/` | Topics | 2 |  |
| `page:site-map` | `/sitemap/` | Sitemap | 2 |  |
| `page:donate` | `/donate/` | Donate | 7 |  |
| `page:dmca` | `/dmca/` | Copyright and DMCA | 8 |  |
| `page:thank-you` | `/donate/thank-you/` | Thank you | 8 |  |
| `page:tanakh` | `/reference/sacred-texts/tanakh/` | The Tanakh | 13 |  |
| `page:bible` | `/reference/sacred-texts/bible/` | The Christian Bible | 13 |  |
| `page:quran` | `/reference/sacred-texts/quran/` | The Qur’an | 13 |  |
| `page:mandaeism` | `/religions/mandaeism/` | Mandaeism | 14 |  |

| Key | Address | Title | Categories |
|---|---|---|---|
| `post:who-was-abraham` | `/journal/who-was-abraham/` | Who was Abraham? | history, religion |
| `post:how-the-abrahamic-religions-understand-monotheism` | `/journal/how-the-abrahamic-religions-understand-monotheism/` | How the Abrahamic religions understand monotheism | theology, religion |
| `post:understanding-the-bible-and-the-quran-in-historical-context` | `/journal/understanding-the-bible-and-the-quran-in-historical-context/` | Understanding the Bible and the Qur’an in historical context | scripture |
| `post:jerusalem-in-three-traditions` | `/journal/jerusalem-in-three-traditions/` | Jerusalem in three traditions | history |
| `post:prayer-across-the-abrahamic-traditions` | `/journal/prayer-across-the-abrahamic-traditions/` | Prayer across the Abrahamic traditions | culture |
| `post:what-archaeology-tells-us-about-the-ancient-near-east` | `/journal/what-archaeology-tells-us-about-the-ancient-near-east/` | What archaeology tells us about the ancient Near East | archaeology, history |
| `post:faith-and-reason-in-medieval-thought` | `/journal/faith-and-reason-in-medieval-thought/` | Faith and reason in medieval Jewish, Christian and Muslim thought | philosophy, theology |
| `post:interfaith-dialogue-in-the-modern-era` | `/journal/interfaith-dialogue-in-the-modern-era/` | Interfaith dialogue in the modern era | interfaith-studies |
| `post:millat-ibrahim` | `/journal/millat-ibrahim/` | The path of Abraham in the Qur’an | scripture, theology |
| `post:who-was-kedar` | `/journal/who-was-kedar/` | Kedar, the Arabs and the prophets | history, scripture |

Shortcodes inside seed content: `[abr_donation]` (Donate), `[abr_child_pages]` (Religions, Reference, About), `[abr_topic_index]` (Topics), `[abr_site_map]` (Site Map), `[abr_contact_email]` (Contact).

## 13. Site structure and search

### Addresses

| Setting | Value | Constant |
|---|---|---|
| Permalink structure | `/journal/%postname%/` | `ABR_PERMALINK_STRUCTURE` |
| Category base | `journal/topics` | `ABR_CATEGORY_BASE` |
| Tag base | `journal/tags` | `ABR_TAG_BASE` |

Every level of every address resolves to a page: `/religions/`, `/reference/`, `/about/`, `/journal/` and `/journal/topics/` are hub pages. The external knowledge base at knowislam.wiki is reached from the main menu and the Resources footer column. Addresses are lower case, built from words, and at most three levels deep. Tools > System information reports whether the recommended settings are in use.

### Earlier addresses

From 2.10.0, any request under `/articles/` or `/knowledge-base/` that would end in a 404 is sent to the same path under `/journal/` or `/reference/`, provided something answers there (`abr_renamed_prefixes()`, `abr_resolve_current_path()`). `inc/redirects.php` answers requests that would end in a 404 with a 301 (`X-Redirect-By: Abrahamic`), before WordPress guesses: the 2.3.0 address of each seeded item (from `legacy-v1.php`) goes to its current permalink, and `/category/{slug}/` (with pages) goes to the topic archive. Tools lists pages and articles whose content still links to an earlier address and offers "Update links", which rewrites only matching `href` values.

### Navigation

| Menu | Option | Limit | Where |
|---|---|---|---|
| Main | `nav_header` | 5 top-level links (`ABR_PRIMARY_NAV_MAX`), 10 dropdown links each (`ABR_NAV_CHILDREN_MAX`) | Header; overlay panel below 1024px |
| Secondary (site links) | `nav_secondary` | 8 links, no dropdowns (`ABR_SECONDARY_NAV_MAX`) | The footer's bottom row only (`[abr_secondary_nav]`) |
| Footer | `nav_footer_1` to `nav_footer_3` | None | Footer columns |
| Further reading | `further_links` | 6 links, no dropdowns (`ABR_FURTHER_MAX`) | `[abr_further_reading]` at the foot of articles, after related articles |

The main menu carries the site's content; pages about the site itself (About, Contact, Donate, policies, the external knowledge base, the site map) belong in the secondary menu, which appears only as the footer's bottom row. Footer columns avoid repeating those links. The home page is reached through the logo, so the main menu carries no Home link. Links to other sites carry the class `abr-external`, a small outward arrow, a `title` naming the host and screen-reader text "(on host)" (`abr_is_external()`, `abr_menu_anchor()`, `abr_external_nav_label()`). Limits apply when saving (extra lines removed, with a warning) and again when rendering, so an older saved menu shows only its first five top-level links; the Navigation tab flags such a menu. Dropdown children of a removed parent are removed with it. The parent of the current page takes the hover fill with a gold rule (`.is-current-parent`, set by `theme.js`, and WordPress's `.current-menu-ancestor`).

Header and footer menus come from Theme Options > Navigation. Each line is `Label | target`; a line starting with `-` becomes a dropdown child of the line above (main menu only). `abr_link( $target, $fallback )` returns an empty string when a page token resolves to nothing and the fallback path holds no published content (`abr_path_exists()`), so a pattern can drop the link instead of pointing at a missing page; passing an empty fallback forces that behaviour. Targets are a full address, a root-relative path, an anchor, or a token resolved by `abr_resolve_link()`: `@{page key}` (aliases `@religions`, `@reference`, `@insights`), `@post:{slug}`, `@topic:{slug}`, `@privacy-policy`, `@articles`. Tokens follow a page when its address changes. The header Navigation block carries the class `abr-primary-nav`; `abr_primary_nav_data()` replaces its links at render time and gives page and category links their IDs, so WordPress marks the current item. `theme.js` also marks the section link whose path is the longest prefix of the current path.

### Menu appearance

Header links are rounded boxes set by custom properties on `.abr-header`: `--abr-nav-radius` (8px), `--abr-nav-pad-x` (12px; 9px from 1024 to 1279 pixels), `--abr-nav-hover-bg` (beige mixed with ivory), `--abr-nav-current-bg` (navy) and `--abr-nav-current-fg` (ivory). Colours follow the active scheme. Hover and keyboard focus take the hover fill; the current section (`.is-current`, `aria-current`, `.current-menu-item`) takes the current fill. Transitions stop under reduced motion.

### Breadcrumbs

`abr_breadcrumb_trail()` builds one trail per request, used by `[abr_breadcrumbs]` and by the BreadcrumbList data. Pages follow their ancestors; articles go Home, Insights, first topic, title; topic archives go Home, Insights, Topics, topic; search and 404 pages add a final unlinked item.

### Search output

`inc/seo.php`. When a dedicated SEO plugin is active (Yoast SEO, Rank Math, All in One SEO, SEOPress, The SEO Framework, Slim SEO, Squirrly SEO), everything in this table except verification codes and analytics stands down; `abr_seo_enabled` overrides the decision.

| Output | Source |
|---|---|
| Meta description | Front page: Search tab, else the Home page's description, else the tagline. Posts page, pages and articles: `_abr_description`, else the excerpt, else the text. Topics: the term description, else a generated sentence. Trimmed to 130 characters at a word boundary |
| Canonical | WordPress on single views; the theme on the posts page and archives, including page numbers; none on search and 404 |
| Robots | `noindex, follow` on 404, date, author and attachment views; WordPress adds it on search results |
| robots.txt | Adds `Disallow: /?s=` and `Disallow: /search/` inside the `User-agent: *` group, before WordPress's Sitemap line |
| XML sitemap | WordPress core sitemap without the users provider |
| Open Graph and Twitter | Site name, locale, type, title, description, address, image (featured image, Search tab image, or `assets/images/share.png` at 1200 × 630); article times; `twitter:site` from the X profile |
| Structured data | One JSON-LD graph: Organization (name, address, logo from the Search tab, site icon or `assets/images/logo.png` (the AR mark), `sameAs` from the Social tab, email from the Footer tab), WebSite, a WebPage node (CollectionPage for listings, AboutPage, ContactPage), BreadcrumbList on every page but the front page, and Article on articles (headline, description, dates, author, publisher, image, sections, word count). The author is a Person when the user has a biography, else the Organization |
| Verification | `google-site-verification` and `msvalidate.01` from the Search tab; a pasted meta tag is reduced to its code |
| Analytics | Google Analytics 4 through `googletagmanager.com` and `assets/js/analytics.js`, which reads the ID from `data-ga-id`; not loaded for users who can edit posts |
| Feeds | `automatic-feed-links` |

### Conformance: SEO Starter Guide

| Guide topic | How the theme meets it |
|---|---|
| Unique, accurate page titles | Title per page from WordPress; front page title is the site name with the tagline; crawl confirms no duplicates |
| Description meta tag | A written description for every seeded item, 130 characters or fewer with a call to action; a "Search description" box with a counter; fallbacks as above; crawl confirms unique descriptions |
| Structure of URLs | Words in addresses; a directory for each kind of content; one address per document through canonical tags and 301 redirects; lower case |
| Easier navigation | Hub pages at every address level; breadcrumbs on every inner page; an HTML site map organised by section; an XML sitemap; text links in the header and footer; a 404 page with search, section links and recent articles, sent with a 404 status and `noindex` |
| Quality content | Seeded content written for readers; sections with headings; no text inside images |
| Anchor text | Descriptive link text; the generic "Read article" link removed from article cards, whose titles carry the link |
| Images | Images in `assets/images/`; alt text through WordPress; decorative icons hidden from assistive technology |
| Heading tags | One `h1` per page; `h2` for sections, and for card titles under a page heading; `h3` inside front page sections |
| robots.txt and robots meta | Internal search results disallowed and marked `noindex`; thin archives marked `noindex` |
| rel="nofollow" | Comment links carry `nofollow ugc` through WordPress |
| Mobile | One responsive address for every device, with the same content |
| Promotion | Feeds, social tags and Organization `sameAs` |
| Webmaster tools | Verification codes, Analytics, and the sitemap address shown on the Search tab and listed in robots.txt |

### Conformance: structured data features

Used: Article, Breadcrumb, Organization. Not applicable to this site's content: Carousel, Course list, Dataset, Discussion forum, Education Q&A, Employer aggregate rating, Event, Image metadata, Job posting, Local business, Math solver, Movie, Product, Profile page, Q&A, Recipe, Review snippet, Software app, Speakable, Subscription and paywalled content, Vacation rental, Video. The FAQ page uses headings only, because FAQ markup is not in the list.

## 14. Decision record

| Date | Version | Decision | Reason |
|---|---|---|---|
| 2026-09-17 | 1.0.0 | Build as a child of Twenty Twenty-Five | Block theme foundation with the design carried by `theme.json` and patterns |
| 2026-09-17 | 1.0.0 | Replace Font Awesome with inline SVG | Removes a third-party dependency |
| 2026-09-17 | 1.0.0 | FAQ uses `core/details` | Native disclosure, no script |
| 2026-09-17 | 1.0.0 | Articles section uses a Query Loop | The source site hard-coded three cards |
| 2026-09-17 | 1.0.0 | Content corrections: Mary listed under Christianity and Islam only; David's "ancestor of Jesus" removed; comparison columns for Christianity and Islam written | Factual accuracy and even-handedness |
| 2026-09-17 | 1.1.0 | Sabon Next LT throughout; 400 and 700 only | Requested typeface; the family ships two weights |
| 2026-09-17 | 1.1.0 | EB Garamond subset as transliteration fallback | Sabon lacks scholarly transliteration letters; EB Garamond shares the Garamond lineage |
| 2026-09-17 | 2.0.0 | Theme renamed to Abrahamic; prefix `abr` | House naming rules |
| 2026-09-17 | 2.0.0 | Assets moved under `assets/`; documentation under `docs/` | House structure rules |
| 2026-09-17 | 2.0.0 | Menu collapses below 1280px | Nine links do not fit one row below that width |
| 2026-09-17 | 2.0.0 | Comparison tabs apply below 1024px only | Three columns remain readable on landscape tablets and desktops |
| 2026-09-17 | 2.0.0 | Legacy `ar_options` row is copied, not deleted | Allows rollback to 1.x during the transition |
| 2026-09-17 | 2.0.1 | No licence header, licence file or licensing notes in the theme | House rule; EB Garamond attribution travels inside the font files |
| 2026-09-17 | 2.1.0 | Social marks come from the Minimalist Social & Platform Icons Pack; hand-drawn brand icons retired | Consistent, accurate marks across 45 networks |
| 2026-09-17 | 2.1.0 | LinkedIn and Scribd taken from Simple Icons | The pack's versions require a visible credit on the site; the CC0 marks need none |
| 2026-09-17 | 2.1.0 | One registry drives fields, defaults, sanitising and footer order | A network is added or removed in one place |
| 2026-09-17 | 2.1.0 | Option keys stay flat (`social_{slug}`) | The four 2.0 keys keep working with no migration |
| 2026-09-17 | 2.1.1 | Theme licensed GPLv2 or later; supersedes the 2.0.1 no-licence decision | Owner's instruction; WordPress convention |
| 2026-09-17 | 2.1.1 | Bundled resources listed with their licences in `readme.txt`; no separate licence file | Documentation stays within the five permitted files |
| 2026-09-17 | 2.2.0 | Settings screen becomes Appearance > Theme Options with seven tabs and Tools | House convention for theme settings; the WordPress-standard location for theme screens |
| 2026-09-17 | 2.2.0 | Header and footer wording comes from Theme Options through shortcodes in Custom HTML blocks | Editable without the Site Editor; Custom HTML blocks avoid the paragraph stripping that `shortcode_unautop()` applies to lone shortcodes |
| 2026-09-17 | 2.2.0 | Menu links and footer link columns stay in the Site Editor | Navigation and list blocks already give a full editing interface |
| 2026-09-17 | 2.2.0 | Data layer and screen split into `inc/options.php` and `inc/theme-options.php` | Keeps the schema readable apart from the markup |
| 2026-09-17 | 2.2.1 | Sabon Next LT must be bundled with the theme, complete; loading it from a web font service is ruled out | Owner's requirement |
| 2026-09-17 | 2.2.1 | Each Sabon face split into Latin and extended files with complementary `unicode-range` | Full character set bundled at almost no cost to Latin-only pages |
| 2026-09-17 | 2.2.1 | Sabon's combining marks kept out of use | Their anchor data misplaces accents and dots |
| 2026-09-17 | 2.3.0 | The theme populates the site on activation with a tombstone-guarded seeder | House pattern from the Murtadd theme; a new install is complete from the first visit |
| 2026-09-17 | 2.3.0 | Seeder adopts existing slugs and never overwrites | Editorial work always wins over starter content |
| 2026-09-17 | 2.3.0 | Seeder sets post-name permalinks, trashes untouched WordPress samples and sets reading options, once each | The theme's links assume readable addresses; the sample post would otherwise head the archive |
| 2026-09-17 | 2.3.0 | Seed content stored as block markup in a PHP data file | No parser needed at run time; documentation stays within the five permitted files |
| 2026-09-17 | 2.3.0 | Topic cards link to category archives | The former `/topic/` addresses had no destination |
| 2026-09-17 | 2.3.0 | Body weight fixed at 400 | The parent's 300 made bold text compute to 400 and render as regular |
| 2026-09-17 | 2.4.0 | Articles under /articles/, topics under /articles/topics/, pages in three hubs | The Starter Guide asks for a directory structure that shows the kind of content and for a page at every level of an address |
| 2026-09-17 | 2.4.0 | Permalinks changed only on plain sites, or post-name sites with no articles of their own | Changing an established site's article addresses is the owner's decision |
| 2026-09-17 | 2.4.0 | Seeder moves its own items and refreshes only unedited text, judged by fingerprint | Existing sites gain the new structure without losing editorial work |
| 2026-09-17 | 2.4.0 | Menus defined in Theme Options with page tokens | House rule: major parts controlled from Theme Options; tokens keep links valid when pages move |
| 2026-09-17 | 2.4.0 | Theme search output stands down for dedicated SEO plugins | Two sets of descriptions, canonical tags and structured data would conflict |
| 2026-09-17 | 2.4.0 | Structured data limited to Organization, WebSite, WebPage, BreadcrumbList and Article | These match the site's content and Google's supported features; FAQ markup is not supported |
| 2026-09-17 | 2.4.0 | Analytics loaded without inline script | House rule against inline JavaScript; the ID travels in a data attribute |
| 2026-09-17 | 2.4.0 | Search descriptions capped at 130 characters with a call to action | House standard for meta descriptions |
| 2026-09-17 | 2.4.1 | Menu links shown as rounded fills: beige on hover, navy for the current section | Requested; a filled shape gives a larger, clearer target than an underline |
| 2026-09-17 | 2.5.0 | Main menu limited to five top-level links, with dropdowns and a secondary bar | Requested; a short menu is easier to scan and fits one row down to 1024px |
| 2026-09-17 | 2.5.0 | Sacred Texts kept at the top level although it also sits in the Knowledge Base | The scriptures are a primary reason readers arrive; the page keeps one address |
| 2026-09-17 | 2.6.0 | The AR monogram becomes the site logo and default browser icon | Agreed design; one vector source keeps every copy identical and scheme-aware |
| 2026-09-17 | 2.7.0 | EB Garamond fallback rebuilt from the variable font, with Greek | Bold transliteration letters rendered at regular weight; polytonic Greek had no glyphs |
| 2026-09-17 | 2.7.0 | Special Elite and Arslan Wessam offered only as opt-in block styles | Neither suits running text in the house design; each fits one purpose |
| 2026-09-17 | 2.7.0 | Dubidam Arabic not bundled; inline Arabic keeps the system Naskh stack | Personal-use licence; the calligraphic faces are too ornate for glosses |
| 2026-09-17 | 2.8.0 | Noto Serif Hebrew, Noto Sans Syriac and Noto Sans Imperial Aramaic bundled | Hebrew relied on visitors' system fonts and Aramaic had no support; the Noto faces are OFL, cover vowel points and cantillation, and Noto Serif Hebrew offers every weight. Ezra SIL was considered and set aside: one weight, 2007 release |
| 2026-09-20 | 2.35.2 | The owner's darfash artwork replaces the simplified icon | The owner supplied the drawing as the symbol of Mandaeism; its licence, CC BY-SA 3.0, allows bundling with credit, and removing its fills lets it follow the colour scheme |
| 2026-09-20 | 2.35.0 | Mandaeism carried through every section that speaks of the traditions as a whole; labels on figures name only the traditions that honour each one | The site treats four traditions, and several sections still spoke of three. Sections on Jerusalem, Hebron, medieval philosophy and interfaith dialogue keep three because Mandaeism has no part in those histories |
| 2026-09-20 | 2.34.0 | Native photograph viewer built on `<dialog>`; Lightbox2 2.12.0 considered and set aside | Lightbox2 needs jQuery, which the front end does not load, adds about 150 KB, and draws its controls from fixed PNG files that ignore the colour scheme |
| 2026-09-20 | 2.33.0 | Commons photographs fill the remaining panels, and starter articles take featured images through the media library | Owner requested real photography; media library attachments stay editable without a theme release, and articles show places and manuscripts in place of depictions of prophets |
| 2026-09-18 | 2.32.3 | Theme screenshot recaptured | It still showed the 2.6.0 site: the old menu, Title Case, the placeholder panel, no Donate button and no colour switch |
| 2026-09-18 | 2.32.2 | Shipped prose swept against the writing rules | Five constructions had slipped through: four copulative dodges and one "in order to" |
| 2026-09-18 | 2.32.1 | Starter content runs on an ordinary request, and its state is reported in the admin | A live site sat on version 13 for weeks: the theme files were current, so the front page showed the four-tradition wording while the Mandaeism page and the retitled articles never arrived, because nobody had opened an admin screen as an administrator |
| 2026-09-18 | 2.32.0 | The history of the category added to Comparative studies, the FAQ and the Glossary | It shows the grouping is modern and its boundaries arguable, which supports treating Mandaeism as a fourth and squares with what the sources show |
| 2026-09-18 | 2.31.0 | Article pages take journal conventions: dark title panel, raised initial, section diamonds, pull quotes, a citation box and two-column references | Borrowed from the reference design supplied; they suit a site that already carries footnotes and sourced pages |
| 2026-09-18 | 2.30.0 | Wider column, larger type, more leading, and wide elements breaking out of the measure | Reported as cramped: 80-character lines in a 760px column, 44px of air above the content, and tables squeezed into the text width |
| 2026-09-18 | 2.29.0 | The Mandaeism page draws on Drower's editions and ethnography | The community's own scroll and the standard field study carry more weight than a summary, and the scroll records the meeting behind the Sabian recognition |
| 2026-09-18 | 2.29.0 | Header checked in 8px steps, not at six fixed widths | Fixed-width tests missed a band from 1024 to 1152 where the menu wrapped, and another near 500 where the page scrolled sideways |
| 2026-09-18 | 2.28.1 | Links whose target does not exist are dropped instead of falling back to the address | A fallback path for a page that was never created renders a link that answers 404 |
| 2026-09-18 | 2.28.1 | Mandaeism placed beside the Abrahamic descent in the diagram, not beneath it | The diagram implied descent from Abraham, which the page denies |
| 2026-09-18 | 2.28.0 | The 1974 atlas added as a second cited source on the religion pages | Same terms as the anthology: facts and framing used and cited, nothing reproduced |
| 2026-09-18 | 2.27.0 | Sentence case for titles, headings, buttons and menu labels | Requested |
| 2026-09-18 | 2.27.0 | Tagline shortened to keep the home page title inside 61 characters | The former tagline pushed it to 76, beyond what a result shows |
| 2026-09-18 | 2.26.0 | Reference pages draw on the 1969 anthology as a cited source | The work is in copyright, so facts and framing are used and cited while nothing is reproduced |
| 2026-09-18 | 2.25.0 | The front page shows five themes and links to the full table on Comparative Studies | Eleven themes in four columns ran to over a thousand pixels and buried the sections beneath it |
| 2026-09-18 | 2.24.0 | Mandaeism carried as the fourth tradition, anchored to the Qur'anic Sabians | Requested. The pages keep the facts that complicate the classification, since a reader who finds them elsewhere would discount the rest |
| 2026-09-18 | 2.24.0 | `ABR_SEED_VERSION` corrected from 12 to 14 | It had drifted back to 12, so an existing site would never have received the scripture pages added at 13 |
| 2026-09-18 | 2.23.1 | Journal is a plain menu link; Topics is reached from the Journal introduction and the footer | Requested; a dropdown holding one item earns no space in the bar |
| 2026-09-18 | 2.23.0 | Tags get their own template, and articles list the tags they carry | Topic and tag archives were identical, and a tag added in WordPress was invisible on the article itself |
| 2026-09-18 | 2.22.1 | The header field opens as a row under the bar below 1024px | Opening it inline pushed the header past the screen and gave the page 213px of sideways scroll on a phone |
| 2026-09-18 | 2.22.0 | Search runs on a normalised index with spelling variants | The same names are written several ways here, so a reader searching Mecca, Quran or hadith found less than one searching Makkah, Qur'an or ḥadīth |
| 2026-09-18 | 2.22.0 | Results ranked by where the match falls, and shown with their section and a marked passage | Date order buried the obvious answer: "abraham" returned a prayer article above "Who Was Abraham?" |
| 2026-09-18 | 2.21.0 | A page for each scripture, listing its contents in full | Requested; these are the lists a reader comes to a reference section for |
| 2026-09-18 | 2.21.0 | Canon differences shown as one table across four traditions | The disagreement is the substance of the subject, and a table shows it at a glance |
| 2026-09-18 | 2.20.0 | The article section is called Journal, at `/journal/` | Requested; it suits a section of dated essays |
| 2026-09-18 | 2.20.0 | The permalink step is keyed by the settings it applies | The old fixed key meant a later change to the structure never ran |
| 2026-09-18 | 2.19.0 | Starter content replaces edited starter pages by default, and retired items go to the trash | Requested: the shipped content is the source of truth for this site. Revisions and the trash keep both recoverable, and a Tools setting restores the older behaviour |
| 2026-09-18 | 2.18.0 | Makkah and Madinah in the site's prose, with the English forms paired at first mention and kept in search descriptions | Matches the owner's usage elsewhere and the transliteration used for other terms, without losing readers who search for Mecca |
| 2026-09-18 | 2.17.0 | The About page states the site's purpose: to help the reader decide which tradition is true | The site's own aim, and a plain statement is more honest than an implied one |
| 2026-09-18 | 2.17.0 | Articles may argue to a conclusion, with the evidence first and the conclusion marked as the site's | Keeps the descriptive sections trustworthy while allowing the site to make its case |
| 2026-09-18 | 2.16.1 | Site Map renamed Sitemap at `/sitemap/` | Requested; it restores the address the site used before and matches common usage |
| 2026-09-18 | 2.16.0 | The 2016 to 2023 material rewritten for 2026 and merged into the starter content | The site's own writing outranks placeholder prose; rewriting brings it to the house style, updates its figures and keeps it clear of any source wording |
| 2026-09-18 | 2.16.0 | Kedar and the path of Abraham presented with their interpretive history | The arguments belong to the site; attributing them, with the readings against them, keeps the page defensible |
| 2026-09-18 | 2.16.0 | Scripture references moved into footnotes | House standard |
| 2026-09-18 | 2.15.0 | Photographs from the 2023 site backup fill the hero and place cards | The site's own images beat decorative placeholders, and the originals are high resolution |
| 2026-09-18 | 2.15.0 | The Medina card became Hebron | A photograph of the Cave of the Patriarchs was available, and the site is shared ground for all three traditions |
| 2026-09-18 | 2.14.0 | Light and dark colours, switched in the header | Requested; the palette is derived from the scheme, so one switch serves every colour scheme |
| 2026-09-18 | 2.14.0 | Mode script loads in the head, uncached by defer | Applying the stored choice before the first paint avoids a flash of the other mode |
| 2026-09-18 | 2.14.0 | Dark bands and the footer keep dark surfaces in both modes | Inverting them would have put bright panels in the middle of a dark page and dark text on the dark footer |
| 2026-09-17 | 2.13.1 | Editor guidance printed through a capability-checked shortcode | Instructions to the site's editors have no place in the public page, and a shortcode survives customising in the Site Editor |
| 2026-09-17 | 2.13.0 | Symbols artwork used as a faint watermark, through a CSS mask | Supplied by the owner as GPL; a mask keeps it scheme-aware, and low opacity keeps flat clip art from competing with Sabon |
| 2026-09-17 | 2.12.1 | Donate links default to the owner's payment page | Requested; both links stay editable on the Header tab |
| 2026-09-17 | 2.12.1 | Earlier Donate link migrated once, not on every read | A read-time mapping would overwrite a deliberate choice of `@donate` |
| 2026-09-17 | 2.12.0 | Secondary menu shown in the footer only | Requested; the header keeps to content and actions |
| 2026-09-17 | 2.12.0 | Red Donate button beside Explore, linked to a Donate page | Requested; the page routes readers to the Contact page until a payment link exists, so the button never leads nowhere |
| 2026-09-17 | 2.12.0 | AR mark alone up to 480px wide | Keeps logo, menu, search and Donate on one line on phones |
| 2026-09-17 | 2.11.0 | Site pages moved to the secondary menu and the footer's bottom row; main menu keeps content only | Requested; separates reading from site information, as readers expect |
| 2026-09-17 | 2.11.0 | Site links repeated at the foot of the overlay panel (withdrawn in 2.12.0) | The secondary bar is hidden below 1024px |
| 2026-09-17 | 2.10.0 | Articles renamed Insights; Knowledge Base renamed Reference | Requested; Reference describes the section plainly and leaves "knowledge base" to the external wiki |
| 2026-09-17 | 2.10.0 | Knowledge Base menu item links to knowislam.wiki, marked as external | Requested; readers should know when a link leaves the site |
| 2026-09-17 | 2.10.0 | Sites on the 2.4 to 2.9 structure move to `/insights/` automatically | The structure was the theme's own; general prefix redirects cover every earlier address |
| 2026-09-17 | 2.9.0 | About, Editorial Policy and Research describe the site's method in concrete terms | Every statement a page makes about the site must be accurate |
| 2026-09-17 | 2.9.0 | Optional Further reading list on articles | Lets the editors point readers to related resources elsewhere |
| 2026-09-17 | 2.8.0 | Aramaic routed by language tag to the script it is written in | Aramaic appears in square script, Syriac and Imperial Aramaic; one `arc` tag resolves through the stack |
