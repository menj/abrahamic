# Changelog

All notable changes to the Abrahamic theme are recorded here. The format follows Keep a Changelog, and the project uses Semantic Versioning. Version locations are listed in `ssot.md`, section 3.

## [2.52.0] - 2026-09-25

### Added
- Journal: `post:apostasy-in-the-abrahamic-traditions` (Religion, History; 16 notes). Sources verified live: Sanhedrin 44a and CCAR responsa (Judaism); Codex Theodosianus 16.7.1 and 16.7.4, Aquinas ST II-II q. 11 a. 3, and Dignitatis Humanae 2 (Christianity); Qur'an 2:217, 2:256, 4:137, the classical jurists' ruling and al-Alwani's 2011 IIIT study (Islam); Drower 1937, p. 59 (Mandaeism); Federal Constitution Articles 11, 153 and 160 and Lina Joy [2007] 3 AMR 693 (Malaysia). The uploaded Springer study (Ab Rashid and Mohamad, 2019) is cited only for its constitutional background, pp. 1-2; its subject, a named private individual, is not discussed. Three photographs (Vilna Talmud, opening of Vatican II, Palace of Justice Putrajaya), credited on the Copyright and DMCA page. Cross-linked with the Amman Message article. Seed version 48.

## [2.51.1] - 2026-09-23

### Added
- `post:the-population-of-the-abrahamic-religions`: new section "Where Christians will live" (notes 10 to 12), drawn from the Pew report's chapter 2 "Christians" page: regional distribution in 2010 and 2050, Europe's projected fall from 553 to 454 million, Nigeria's projected third-largest Christian population at 39 per cent of its people, and the effect of religious switching in North America (66 per cent Christian with switching, 75 per cent without). Former notes 10 and 11 renumbered 13 and 14. Seed version 47.

### Corrected
- The 2.49.0 entry listed this Pew page among the article's sources, but none of its distinctive material had been used; it is now.

## [2.51.0] - 2026-09-23

### Changed
- Line spacing and justification are now sitewide defaults rather than scoped to article prose. `body { line-height: 1.5; }` replaces the body base; a new `p, li { text-align: justify; text-align-last: left; hyphens: auto; }` rule (added just after the body rule in `theme.css`) covers every paragraph and list item on the site, superseding the narrower `.abr-prose p:not(.abr-further)` rule from 2.46.0, which is removed.
- Roughly a dozen component-level line-height overrides on flowing copy (`.abr-hero p`, `.abr-intro p`, `.abr-heritage__copy p`, `.abr-about p`, `.abr-prose`, `.abr-prose li`, `.abr-standfirst`, `.abr-notes`, `.abr-sub`, `.abr-cite__text`, `.abr-tag-item__excerpt`, `.abr-result__snippet`, figure/place/era captions, the typewriter note style, and pull quotes), previously set anywhere from 1.55 to 1.8, are removed so this copy now inherits the 1.5 base uniformly. Headings, the logo, icon-sized elements and icon-only buttons keep their own tighter line-heights, since those are not flowing text and a uniform 1.5 would visibly break display type rather than improve readability.

## [2.50.0] - 2026-09-23

### Added
- Journal: `post:paul-and-peter-two-missions` (History, Scripture; 10 notes), drawing on Michael Goulder's St. Paul versus St. Peter: A Tale of Two Missions (1995) and the USCCB's own introduction to 2 Peter, both project sources. Covers the Antioch confrontation (Galatians 2:11-14), the Corinthian Paul/Cephas factions (1 Corinthians 1:12), Acts' more harmonious retelling of the Jerusalem council against Paul's own franker account, and 2 Peter's closing reconciliation of the two apostles, read alongside the USCCB's own statement that 2 Peter is widely regarded by scholars as pseudonymous and among the latest-written books in the New Testament. Three new photographs (Antakya on the site of ancient Antioch, a Chester Beatty papyrus of Paul's letters, the ruins of ancient Corinth), credited on the Copyright and DMCA page. Cross-linked from Understanding the Bible and the Qur'an in historical context. Seed version 46.
- Fixed a duplicate-photo slip caught before release, the same pattern as 2.48.0 and 2.49.0: the article's first draft reused its featured image inline; the photo was removed from that slot and two new, more specific photographs (the Corinth ruins, tied to the article's new 1 Corinthians 1:12 point) were added instead.

## [2.49.1] - 2026-09-23

### Fixed
- Header menu default (`inc/options.php`): "Sacred texts" and "Timeline" were listed as top-level items, siblings of "Reference," even though both are children of the Reference page (`/reference/sacred-texts/`, `/reference/timeline/`) alongside Figures, Places, Comparative studies, Glossary, FAQ and Research. The footer menu and every breadcrumb trail already reflected the real hierarchy; only the header menu did not. Both are now nested under Reference in the header too, so the top level reads Religions, Reference, Journal. The previous default is registered in `abr_legacy_menu_defaults()`, so a site still on it migrates automatically the next time options are read; a customised header menu is left alone.

## [2.49.0] - 2026-09-23

### Added
- Journal: `post:the-population-of-the-abrahamic-religions` (Religion, History; 11 notes), drawing on three project sources: Pew Research Center's "The Future of World Religions: Population Growth Projections, 2010-2050" (2 April 2015), its companion piece "Why Muslims Are the World's Fastest-Growing Religious Group" (2017 update of a 2015 original), and the Pew page on projected changes in the global Christian population. Covers present-day numbers, the fertility and age gap driving future change, the projected 2050 near-parity of Christians (2.9 billion) and Muslims (2.8 billion), the 2060 projection of Muslims overtaking Christians, the Jewish population's projected growth in absolute terms, and a historical footnote on the Coleman/Bulliet minority view that Muslims may briefly have outnumbered Christians between 1000 and 1600 CE. States plainly, in the source's own terms, that these are projections bounded by an explicit time frame and stated assumptions, not predictions. Notes that Mandaeism falls below the scale at which this kind of demographic projection is possible. Three new photographs (Lagos, the Istiqlal Mosque in Jakarta, a 2020 world population density map), credited on the Copyright and DMCA page. Seed version 45.
- Fixed a duplicate-photo slip caught before release, the same pattern as 2.48.0: the article's featured image was reused inline; replaced with the population density map before packaging.

## [2.48.0] - 2026-09-20

### Added
- Journal: `post:haman-in-the-quran` (Scripture, History; 15 notes), drawing on the project's Islamic Awareness source on Haman. Covers the Orientalist objection (Nöldeke, the Encyclopaedia of Islam), the weak historicity of the Book of Esther itself (Levenson, Fox, Berlin), the minority scholarly proposal that Haman is an Arabized Egyptian title tied to Amun-priesthoods, the candidate Bakenkhons (Kitchen's Ramesside Inscriptions), and a correction the source itself made after review by an Egyptologist (Jürgen Osing) on a since-withdrawn inscriptional identification — kept in for the same reason the site's other corrections are kept in. States plainly that the title theory is a minority position against Silverstein's literary-dependence case. Two new photographs (the Luxor Temple obelisk and pylon; the Hypostyle Hall at Karnak), credited on the Copyright and DMCA page, plus a Persepolis photograph for the Esther context. Cross-linked from The king and the Pharaoh. Seed version 44.
- Fixed a duplicate-photo slip caught before release: the article's first draft used the same photograph as both its featured image and an inline photograph; the inline one was swapped for a distinct Karnak Hypostyle Hall photograph before packaging.

## [2.47.1] - 2026-09-20

### Changed
- `templates/404.html`: the heading and standfirst are now lightly humorous and on-theme ("This page has wandered off" / "Every pilgrimage meets a wrong turn now and then..."), rather than the plain functional wording. `abr_breadcrumb_trail()`'s "Page not found" label (used in the breadcrumb, the browser title and the BreadcrumbList schema) is unchanged, since clarity matters more than wit in those three places.

## [2.47.0] - 2026-09-20

### Changed
- Header search rebuilt as `[abr_header_search]` (`inc/shortcodes.php`), replacing the core Search block. A single icon button, last in `.abr-header__actions`, toggles a dropdown field anchored beneath it: opens on click, closes on a second click of the same icon, on Escape, or on a click outside it (handled in `assets/js/theme.js`); the icon itself swaps between a magnifying glass and a close mark via `.is-open`. The "Show search" setting (`header_search`) still controls visibility, now via `.abr-no-header-search .abr-header-search`.
- The header's light/dark switch is wider: `--abr-mode-w` raised from 3.1rem to 3.75rem, height from 1.7rem to 1.8rem.
- Added a `close` icon to `abr_icon()`.

## [2.46.1] - 2026-09-20

### Fixed
- The hero, introduction and About sections are built as a two-column grid (text, then photograph) that collapses to one column below 1024px. With no explicit order, the stacked column followed source order, so the photograph rendered below its text on phones, reported from a real device. `.abr-hero__visual` and any direct `figure.abr-photo` child of `.abr-grid--2` now get `order: -1` inside that breakpoint, so the photograph appears first once the layout stacks; the desktop and tablet side-by-side layout is untouched. The heritage section's lineage diagram already put its visual first in source order and needed no change.

## [2.46.0] - 2026-09-20

### Changed
- Removed Shia-specific content and imagery at the site owner's request, who is Sunni: the Najaf shrine photograph on the Amman Message article, replaced with a photograph of the King Abdullah I Mosque in Amman; the named mention of Grand Ayatollah Sistani as an endorser; the phrase "Sunni-Shi'a divide," reworded to "the Muslim world's major schools"; the Ja'fari-school clause in the Islam page's account of fiqh; the paragraph on the Islamic page describing the Sunni-Shia succession dispute; and the Shia clause in the Glossary's Imam entry.
- One factual line was generalised rather than deleted outright: the Amman Message's own first point is a definition of a Muslim that recognises multiple schools of Islamic law and theology, Sunni, Shi'i and Ibadi alike, which is what the document itself says. Removing that recognition from the description would have misstated what the declaration contains, so the sentence now reads "the recognised schools of Islamic law and theology" rather than naming them, keeping the description accurate without dwelling on the specific schools.
- Body text on every page and article template (`page.html` and `single.html`, both sharing the `.abr-prose` class) is now justified: `.abr-prose p` gets `text-align: justify`, `text-align-last: left` so a paragraph's final line is not stretched, and `hyphens: auto` to soften the word-spacing justification can introduce. Footnotes, the further-reading line and other short asides are left aligned as before.

## [2.45.0] - 2026-09-20

### Changed
- All 74 bundled photographs (67 in `assets/images/photos/`, 7 in `assets/images/photos/large/`) converted from WebP to AVIF, encoded at quality 50 after visual comparison against 40, 50, 55 and 65: 50 gave a genuine size reduction with no visible loss on the most demanding test case, a dense manuscript scan, while 65 came out larger than the original WebP for this image set. Total size fell from 11,328 KB to 7,477 KB, about 34%.
- `[abr_photo]` (`inc/shortcodes.php`) and `abr_seed_photo_attachment()` (`inc/seed.php`) now read and write `.avif` and set `image/avif` as the attachment mime type; every `.webp` reference in both files, and in the SSOT's format description, is gone. All 67 WebP files are removed from the package.
- Featured-image attachments are re-created as AVIF on the next seeder run for any post that does not already carry one; a post with an existing WebP thumbnail keeps it until its `_abr_seed_photo` meta is cleared, consistent with the seeder's usual won't-overwrite-an-editor's-choice rule.

### Verified
- Tested on a PHP 8.3 / GD environment with no AVIF encode or decode support (a realistic stand-in for older hosting): `wp_upload_bits()` and `wp_insert_attachment()` succeed without incident, since WordPress 6.5+ recognises `image/avif` as an allowed upload type independently of the image editor; `wp_generate_attachment_metadata()` returns an empty `sizes` array rather than erroring, so the media library serves the original 1200×675 file in place of a missing thumbnail crop, with no broken image and no fatal error. PHP's `getimagesize()` reads AVIF dimensions correctly even without GD's AVIF support, so the `[abr_photo]` shortcode's width/height attributes are unaffected either way.
- Crawled all 49 seeded pages: zero remaining `.webp` references anywhere in rendered output. Confirmed in a real browser that every bundled and featured AVIF image loads and decodes correctly, including the photograph viewer's full-size files in `photos/large/`.

## [2.44.1] - 2026-09-20

### Added
- A second photograph for The Sabians of the Qur'an: a diagram of lunar phases from a manuscript of al-Biruni's Kitab al-Tafhim (public domain), the same scholar the article cites for distinguishing the true Sabians from the Harranian claimants. This closes the one gap noted in 2.44.0; every Journal article now has a featured image plus at least two further photographs, and a full audit confirms no photograph repeats across any two articles (60 distinct images across 20 articles). Seed version 40.

## [2.44.0] - 2026-09-20

### Fixed
- Nine articles (John the Baptist, Masbuta, the Sabians, the king and the Pharaoh, Mary, Preservation and transmission, al-Ghazali, the Amman Message, the Cairo Genizah) rendered their featured photograph a second time inline, since the article had been given only one photograph to work with. Each now has a distinct accompanying photograph in its place.
- Four photographs that had ended up assigned to two articles at once (`birmingham-quran`, `qumran-caves`, `cordoba`, `damascus-mosque`) were each resolved to a single owning article, with a replacement sourced for the other.

### Added
- Thirty-nine photographs across the twenty Journal articles, all from Wikimedia Commons (public domain or Creative Commons), credited individually on the Copyright and DMCA page. Every article now carries a featured image plus at least two further photographs relevant to its content, sized loosely to the article's length; the one exception is The Sabians of the Qur'an, which has one accompanying photograph, since no further Commons image of the Harranian or Mandaean Sabians met the site's sourcing standard.
- No photograph is used in more than one Journal article; a full crawl of all twenty confirmed zero duplicates across 59 distinct images.
- New images include Abraham's Oak and Beersheba (Abraham), the Merneptah Stele and the Lachish Relief (archaeology), the Sea of Galilee and Manger Square (Jesus), the House of the Virgin Mary and the Basilica of the Annunciation (Mary), the Toledo School of Translators and a Latin Averroes manuscript alongside an Aquinas manuscript (faith and reason), the shrine of Imam Ali in Najaf and al-Azhar's courtyard (the Amman Message), and the World Council of Churches' Geneva headquarters (interfaith dialogue), among others.

## [2.43.0] - 2026-09-20

### Added
- FAQPage structured data on the FAQ page (`abr_faq_qa_pairs()` in `inc/seo.php`), parsed from the page's own `<h2>` questions and the paragraph that follows each; twelve question/answer pairs confirmed on the test site. Skips a "Notes" heading if the page ever gains one.
- `[abr_last_updated]` shortcode (`inc/structure.php`), shown in the article byline next to reading time only when a post's modified date is at least a day past its published date, so an unedited article shows one date, not two.

### Reviewed, no change needed
- A wider technical/UX review turned up that schema.org structured data (Organization, WebSite, WebPage, BreadcrumbList, Article with datePublished/dateModified/wordCount), the reading-time indicator, the cite-this-article snippet with a copy button, and RSS feed discovery (`automatic-feed-links`, confirmed serving at `/feed/`) were already built and working; this release adds the two pieces that were missing, FAQPage markup and a last-updated signal, rather than rebuilding what already existed.

## [2.42.3] - 2026-09-20

### Changed
- Donate page: "helps the site improve" reworded to "helps keep the material accurate", closing out the self-reference sweep. Seed version 37.

### Reviewed, no change needed
- An editorial audit for tone checked the site against two standards at once: the appearance of neutrality (the "Independent, academic, even-handed" claim on About and the Editorial policy) and the site's actual editorial aim (advancing Islam through emphasis and selection, never through a misstatement about another tradition — see the September decision on this in this file's earlier entries).
  - Searched for advocacy-toned or absolutist language ("proves", "clearly", "definitively", "beyond doubt", "true religion" unhedged): none found. Every claim about what a tradition holds is attributed to it ("on this reading", "Muslim tradition holds", "Muslims understand").
  - Read the Editorial policy in full: it already states a real method (describe each tradition in its own terms, evidence before conclusion, conclusions marked as the site's own, correction process) rather than empty branding.
  - Read "Understanding the Bible and the Qur'an in historical context" in full: the Documentary Hypothesis, New Testament dating and Qur'an manuscript dating are each presented with the same hedged, sourced, even-handed treatment; the added weight the aim calls for sits in which facts are foregrounded (the Birmingham leaves) rather than in how any tradition's material is described.
  - Checked citation variety on the two articles most reliant on Islamic Awareness (Understanding the Bible and the Qur'an, and The king and the Pharaoh): both also cite standard Egyptological reference works (Wilkinson, Gardiner, Shaw and Nicholson) and, on the Sabians article, two academic journal studies rather than an apologetics site, so the sourcing does not read as one-sided.
  - No change made to the About page's or Editorial policy's neutrality language, per the standing instruction to keep it as written.

## [2.42.2] - 2026-09-20

### Changed
- A further, wider sweep for self-reference beyond "this site" and "treated as a fourth": eleven sentences on Sacred texts, Places, Research, the Privacy policy (twice), Terms, Editorial policy, DMCA, the Copyright credits paragraph, and the Mandaeism page's darfash entry. Openers such as "This page outlines...", "This policy sets out...", "By using this website..." are replaced with sentences that simply say the thing, or name Abrahamic Religions directly where a self-reference cannot be avoided (a policy document referring to its own effective date, for instance). Seed version 36.

## [2.42.1] - 2026-09-20

### Changed
- Removed editorial self-reference to the site's own choice to count Mandaeism as a fourth tradition. Five sentences reworded on the Religions index (twice: intro paragraph and Glossary), Comparative studies ("the category itself" and its own Glossary-style aside), the Mandaeism page's FAQ answer, and the front-page intro and FAQ patterns. Each now states the fact plainly — "Judaism, Christianity, Islam and the far smaller Mandaeism" — rather than describing it as something the site does. Seed version 35.

## [2.42.0] - 2026-09-20

### Changed
- Removed the self-referencing phrase "this site" from all site-facing content, per the site owner. Fifteen instances across the Glossary, Research, About, Privacy policy, DMCA, Religions index, the front-page intro pattern and the FAQ pattern: most now name Abrahamic Religions directly, the rest rephrased ("used throughout", "published here", "our own library", "the theme"). `readme.txt`, a WordPress-facing file no visitor sees, is untouched. Seed version 34.

### Fixed
- A page's `_abr_description` (SEO meta description) was written only when empty, so a later wording correction to the seed content never reached an existing site, unlike the page body, which already follows the replace-or-unedited rule. `abr_seed_set_description()` now runs under the same rule as the body, in `abr_run_seeder()`'s per-item update. This surfaced because the Privacy policy page's stored description still read "this site" after the sweep above; it now updates with everything else.

## [2.41.1] - 2026-09-20

### Fixed
- Six footnotes citing Ismaʿil Raji al Faruqi's Historical Atlas of the Religions of the World and The Great Asian Religions misspelled his name as "Ragi". Corrected to "Raji" throughout (Comparative studies notes, Places, Timeline, Figures). Seed version 33.

## [2.41.0] - 2026-09-20

### Changed
- Reordered the four traditions to Judaism, Mandaeism, Christianity, Islam wherever they appear as a sequence, per the site owner's instruction. Seed version 32.
  - `inc/options.php`: the default `nav_header` and `nav_footer_1` menus. The previous defaults are kept in `abr_legacy_menu_defaults()`, so a site still on them is moved to the new order the next time options are read; a site with its own customised menu is untouched.
  - `patterns/religions.php`: the four front-page tradition cards.
  - `patterns/texts.php`: the four Sacred-texts cards.
  - `patterns/comparison.php`: the compare tabs and their columns.
  - `inc/seed/content.php`: the Comparative studies table (header and all eleven rows); the Sacred texts page now orders its sections Hebrew Bible, rabbinic literature, Aramaic, the Mandaean scriptures, the Christian Bible, the Qur'an and Hadith; roughly a dozen excerpts, descriptions and introductory sentences that listed all four traditions in a phrase.
  - Two stale three-tradition strings caught in the sweep and corrected to name Mandaeism too: the home page's excerpt, and the Religions index page's description.
- Left unchanged: sections such as Jerusalem, Hebron, medieval philosophy and interfaith dialogue that name only three traditions on purpose, since Mandaeism has no part in those histories; and discursive paragraphs (in "God", "Revelation and scripture" and similar sections of Comparative studies) that already treat all four but do not present them as a plain sequence — reordering mid-sentence there risked the sentences themselves, for no reader-facing benefit.

## [2.40.0] - 2026-09-20

### Changed
- Internal linking across the starter content. Before this release most pages linked out to only two or three others and several Journal articles had no links at all, in or out. Seed version 31.
  - First mentions link to their page: the four tradition pages, the Tanakh, Bible and Qur'an pages, figures (to their Figures anchors), places (to their Places anchors), and subjects with their own article (Abraham, John the Baptist, Jerusalem, the Sabians, masbuta, *millat Ibrāhīm*, *tawḥīd*, Kedar, Pharaoh, prayer, archaeology, Maimonides and Ibn Rushd, interfaith dialogue). About 110 links added.
  - Every Journal article closes with a "Further reading" line (`.abr-further`) to two or three related articles; Comparative studies points to the Timeline and the FAQ.
  - Crawl of all 43 seeded URLs: 319 internal links in content, 0 broken, 0 to the page itself.

## [2.39.0] - 2026-09-20

### Added
- Journal: `post:the-king-and-the-pharaoh` (Scripture, History; eleven notes): the Qur'an's *al-malik* for Joseph's ruler and *Firʿawn* for Moses', the Bible's single title, the New Kingdom origin of "Pharaoh" as a name for the king (Shaw and Nicholson, p. 222; Wilkinson, p. 186; Gardiner, p. 75), the datings of Joseph and Moses, and the counter-argument of a permanent title. Featured image `karnak.webp` (Tsyganov Sergey, CC0), credited on the Copyright and DMCA page.
- Figures, Joseph: the same distinction, with note 4. Seed version 30.

### Sources
- Added to the project: two Islamic Awareness studies of the kings and Pharaohs of Egypt (1999, updated 2006; and a condensed version, 1999), cited by section. The Egyptological dictionaries are cited through them where their pages could not be checked directly.

## [2.38.2] - 2026-09-20

### Changed
- `post:john-the-baptist-in-four-traditions`: the Qur'an section gives both classical readings of *samiyy* in 19:7 (namesake, or peer: Mujāhid, Saʿīd ibn Jubayr, Ibn ʿAbbās; al-Ṭabarī's preference for the first) and the distinct roots of Yaḥyā and Yoḥanan. Two new notes to the Islamic Awareness study of 19:7 (2000), by section; notes 6 to 10 renumbered 8 to 12. The earlier wording, that the name had been given to no one before, stated only one reading, the one critics use against the verse. Seed version 29.

### Sources
- Added to the project: the Islamic Awareness study of Qur'an 19:7 (web page, cited by section number, since it carries no pagination).

## [2.38.1] - 2026-09-20

### Fixed
- Colour-mode switch: the rail was content-box, so its 1px border sat outside `--abr-mode-h` while the knob's size already allowed for it; the knob ended 2px short of centre, sitting high and tight to the start. The rail is now border-box and the knob is centred with `top: 50%` and `translateY(-50%)`; the dark position translates by `--abr-mode-w` less `--abr-mode-h`. Measured margin: 3.2 px on every side in both positions, at 1440, 1280 and 560 px.

## [2.38.0] - 2026-09-20

### Added
- Journal: `post:the-sabians-of-the-quran` (Scripture, History; seventeen notes), drawing on Osmani and Rahman (2025) and Sabjan (2011) from the project sources, with Drower (1937, p. 110) and the Haran Gawaita (pp. 15-16). The Mandaeism page's Sabian section links to it. Seed version 28.

### Sources
- Added to the project: Osmani and Rahman, "The Sabians (al-Ṣābiʾūn)" (2025), cited by page; Sabjan (2011), cited by journal page; Hines, Interpretatio Islamica (AUC thesis, 2023), not yet cited. The journal title of the Osmani article could not be confirmed; the note gives its e-ISSN.

## [2.37.0] - 2026-09-20

### Changed
- Editorial review of the starter content against the site's aims. Seed version 27.
  - Comparative studies, "The category itself": the Qur'an's own religion of Abraham (new note 3, Qur'an 2:135; 3:65-67; notes 3 and 4 renumbered 4 and 5).
  - Monotheism article: closing paragraph on the Qur'an's presentation of tawḥīd as the faith of Abraham.
  - Who was Abraham?: the Qur'an's placing of Abraham before the Torah and the Gospel.
  - Bible and Qur'an in historical context: the Birmingham leaves (parchment 568 to 645 CE, 95.4 per cent probability), with a note to the University of Birmingham statement of 22 July 2015.
  - Figures: the Qur'anic command to follow Abraham's path (note 3, Qur'an 16:123).
  - History and timeline: protected communities under early Muslim rule.
  - Faith and reason: the Arabic route by which Aristotle reached Latin Europe.
  - Glossary: *Millat Ibrāhīm*. FAQ: "How does Islam regard the other Abrahamic traditions?"

## [2.36.0] - 2026-09-20

### Added
- Journal: `post:john-the-baptist-in-four-traditions` (Religion, Scripture; ten notes: Luke, Mark, Josephus, Qur'an 19:2-7, 3:39 and 19:12-15, Drower 1937 pp. 261-262 and 281, Haran Gawaita p. 7) and `post:masbuta-baptism-in-running-water` (Culture; seven notes: Segelberg pp. 38 and 53, Drower 1937 pp. 35-36, 109, 110 and 115-116). Seed version 26.
- `assets/images/photos/masbuta-karun.webp`, a group baptism on the Karun River (Mehdi Pedramkhoo, CC BY 4.0), the baptism article's featured image; credited on the Copyright and DMCA page.

## [2.35.2] - 2026-09-20

### Changed
- The darfash is the owner's artwork: Dragovit's drawing (Wikimedia Commons, CC BY-SA 3.0), stored at `assets/images/darfash.svg` with its fills removed so it takes `currentColor`. `abr_icon( 'darfash' )` now returns it through `abr_darfash_svg()`; the simplified 24-pixel redrawing is gone. The religion cards reserve 1.4em for their icons so the four titles line up.
- `[abr_darfash]` prints the drawing as a captioned figure (`.abr-darfash`), used at the head of the Mandaeism page. The drawing is credited on the Copyright and DMCA page. Seed version 25.

### Fixed
- The Mandaeism page's Practice list referred to a symbol at the head of the page that was not there.
- Religion cards stack in one column up to 560 px; at two columns "Mandaeism" and its button label broke mid-word.

## [2.35.1] - 2026-09-20

### Fixed
- *Yardna* was glossed as "named after the Jordan" on the Mandaeism, Places and Glossary pages. Segelberg (1958, p. 38 and n. 2) derives it from the river, with Lidzbarski, and records that Drower rejected the connection. The three pages now give the majority view and Drower's dissent. Mandaeism note 8 and Places note 1 cite Segelberg; the Mandaeism page adds his observation that each person is baptised individually. Seed version 24.

### Sources
- Added to the project: Segelberg's study of the Mandaean baptism (used) and McGrath's life of John the Baptist (not cited: the supplied text has no page numbers).

## [2.35.0] - 2026-09-20

### Changed
- Mandaeism is carried through every place the site speaks of the Abrahamic traditions as a whole. Sections about Jerusalem, Hebron, medieval philosophy and modern interfaith dialogue stay with Judaism, Christianity and Islam, because Mandaeism has no part in those histories; where it has a view (Jerusalem), the text notes it.
- Home page patterns: `texts.php` gains a Mandaeism card and moves to a four-column grid (two columns up to 1023 px, one up to 560 px); `timeline.php` gains "Mandaean beginnings" (c. 100 to 300 CE); `figures.php` now runs Adam, Seth, Noah, Abraham, Sarah, Isaac, Ishmael, Jacob, Joseph, Moses, David, Solomon, Mary, John the Baptist, Jesus, Muhammad, and each label names only the traditions that honour the figure (Mary, Jesus and Muhammad were wrongly labelled with all three); `faq.php` answers now include Mandaeism; the heritage diagram's accessible label names it; the religions pattern is titled "Four traditions".
- Starter content, seed version 23: Figures adds Adam, Seth and Noah with notes, and the Mandaean view of Abraham, Moses, Jesus and Muhammad; Sacred texts adds "The Mandaean scriptures"; Comparative studies adds Mandaean paragraphs on revelation, law and the afterlife (note 4); History and timeline adds Mandaean events in three periods; FAQ reworks two questions; Glossary adds Ganzibra, Hayyi Rabbi, Mandaic, Mandi, Tarmida and Yardna; Places adds the Jordan River; About, excerpts and search descriptions name four traditions; the monotheism, prayer and Abraham articles gain Mandaean sections.
- New notes cite E. S. Drower, The Mandaeans of Iraq and Iran (1937), pp. 110, 163 and 197-199.
- Category descriptions (History, Philosophy, Interfaith studies) name the four traditions. Terms may carry a `previous` description; when the stored description still matches it, the seeder writes the current one, so edited descriptions are left alone.
- FAQ anchors renamed: `#do-they-worship-the-same-god`, `#why-is-jerusalem-important`.

## [2.34.0] - 2026-09-20

### Added
- Photograph viewer, `assets/js/lightbox.js`, loaded only on singular views whose content carries `[abr_photo]`. It wraps each photograph in `.wp-block-post-content` in a button (`.abr-photo__zoom`) and opens it in a native `<dialog class="abr-lightbox">` with the alt text as its caption. Escape, the close button or a click outside the photograph closes it; focus returns to the photograph; page scroll is locked while open (`abr-lightbox-open` on the root). No library and no jQuery. Browsers without `<dialog>` keep the plain photograph.
- `assets/images/photos/large/`: full-frame versions at up to 2000 pixels for place-sinai, jerusalem-panorama, jordan-river, ur-ziggurat, isaiah-scroll, tanakh and christian-bible. `[abr_photo]` adds `data-abr-full` when a large file exists; other photographs open at their own size.
- Viewer styles in `theme.css` use `--abr-dark-surface`, `--abr-on-dark` and `--abr-gold`, so they follow the active scheme and colour mode; the fade-in runs only without a reduced-motion preference.

## [2.33.0] - 2026-09-20

### Added
- Thirteen photographs from Wikimedia Commons in `assets/images/photos/`: place-sinai, mandaeism, isaiah-scroll, tanakh, christian-bible, ur-ziggurat, jordan-river, jerusalem-panorama, cordoba, megiddo, birmingham-quran, ten-commandments and dumat-al-jandal. Six are public domain; seven are under CC BY or CC BY-SA and are credited on the Copyright and DMCA page.
- Home page: Mount Sinai fills the last place card; the intro and About panels show Jerusalem from the Mount of Olives and the Great Mosque of Córdoba in place of their icon panels.
- Pages: photographs on Mandaeism, Sacred texts, The Tanakh, The Christian Bible and History and timeline; under Moses and John the Baptist on Figures; under Jerusalem, Hebron, Mount Sinai and Makkah on Places.
- Featured images for all ten starter articles. Items may carry `'photo' => array( 'name', 'alt' )`; the seeder copies the bundled file into the media library once (`abr_seed_photo_attachment()`, map in the `abr_seed_photos` option) and sets it as the thumbnail when the article has none. `_abr_seed_photo` records the assignment so a removed or replaced image is never restored. Counted as `photos` in `abr_seed_log` and reported in Theme Options > Tools.
- Copyright and DMCA: a "Photograph credits" section. Seed version 22.

### Fixed
- The base `.abr-photo` rule carried a stray `:root[data-abr-mode="dark"]` prefix, so in light mode photographs lost their rounded corners and kept the browser's default figure margins.

## [2.32.3] - 2026-09-18

### Changed
- `screenshot.png` recaptured from the current front page. The old one dated from 2.6.0 and showed the pre-rename menu (Knowledge Base, Articles), Title Case headings, the placeholder art panel with its editor note, and no Donate button or colour switch.

## [2.32.2] - 2026-09-18

### Changed
- Prose sweep against the owner's writing rules. Privacy policy: "in order to reply" becomes "so that we can reply". Comparative studies: "the front page offers a side-by-side comparison table" becomes "the front page carries a shorter version of this comparison". Same treatment for three copulative dodges in readme.txt, readme.md and upgrading.md. Seed version 21.

## [2.32.1] - 2026-09-18

### Fixed
- Starter content was applied only on `admin_init`, and only for a user with `edit_theme_options`. On a site where that did not happen, pages added by newer versions never appeared, while the theme's own files (patterns, templates, styles) updated as usual, leaving the front page describing content the site did not have. It now runs on `wp_loaded` as well, once, behind a transient lock (`abr_seed_on_request()`).

### Added
- `abr_seed_is_behind()` and `abr_seed_missing_keys()`, and an admin notice on every screen while the starter content is behind or items are missing, with a button to add them.

## [2.32.0] - 2026-09-18

### Added
- Comparative studies: "The category itself", on the polemical use of Abraham before the mid-twentieth century, the ecumenical sense that followed, and the argument that the category has no historical referent. Two footnotes to Hughes, with the existing note renumbered.
- FAQ: a question on the origin of the term. Glossary: the date of the phrase.
- Seed version 20.

## [2.31.0] - 2026-09-18

### Added
- `[abr_citation]`: a "Cite this page" box with title, site, year and address, and a Copy button (clipboard handler in `theme.js`).
- Article presentation: a full-width dark title panel with a short gold rule, a raised opening letter, gold diamonds above section headings, pull-quote styling for blockquotes, and references in two columns from 900px.

## [2.30.0] - 2026-09-18

### Changed
- Layout: `contentSize` 820px, `wideSize` 1320px, with a single reading measure of 45rem shared by the page head and the prose, so every element lines up on one edge.
- Type: body 1.22rem, line height 1.78, paragraph spacing 1.35em, wider heading margins.
- Spacing: page head 64px above (34px on phones), main 104px below (64px on phones).
- Tables, photographs and images inside prose span `min(1180px, 92vw)` and return to the column below 1240px.

## [2.29.0] - 2026-09-18

### Added
- Mandaeism (seed version 19): the Haran Gawaita's account of sixty thousand Nasoraeans leaving Jerusalem for the Median hills under King Ardban; *nāṣerutā* as knowledge handed to priests at ordination and withheld from others; Adam Kasia, the hidden Adam; the mandi as the enclosure holding pool and cult hut; the priestly ranks *tarmida* and *ganzibra*; and the scroll's own record of Anush son of Danqa before the Arab ruler. Seven footnotes to three works of E. S. Drower.

### Fixed
- The main menu wrapped onto a second row from 1024 to about 1152 pixels: link padding, gaps and the switch are tightened there, and the call-to-action now appears from 1200 pixels.
- The header overflowed the viewport between about 490 and 720 pixels: the logo shows the AR mark alone up to 560 pixels, and the call-to-action stays hidden below 1200.

## [2.28.1] - 2026-09-18

### Fixed
- `abr_link()` fell back to the literal path when a page token could not be resolved, so the front page linked to `/religions/mandaeism/` on sites where the page had not been created. It now returns an empty string unless the fallback holds published content (`abr_path_exists()`), and the Mandaeism card and lineage node render only when the page exists.
- Front page text still described three traditions in the heritage, introduction and FAQ sections; the Jerusalem and Mount Sinai cards said "all three traditions".

### Changed
- The lineage diagram places Mandaeism below a rule, outside the descent from Abraham, with a note on what it shares and what it rejects.

## [2.28.0] - 2026-09-18

### Added
- Islam: the *ḥunafāʾ* as the tradition Islam names as its predecessor, with the Qur'anic references, and Makkah before the revelation (the clan balance, the four months of truce, the sanctuary and its idols). Three new footnotes.
- Judaism: the reading of the patriarchal formula as steadfast love, awe and the search for truth.
- Christianity: the two traditions in Matthew on the scope of the mission, and the movement outwards in Acts.
- Seed version 18.

### Changed
- Footnotes renumbered into document order on the pages that gained notes, with "Ibid." kept valid where two different works are cited on one page.

## [2.27.0] - 2026-09-18

### Changed
- Sentence case throughout: page and article titles, in-content headings, front page section headings and eyebrow labels, buttons, menu labels and the topic name "Interfaith studies". Seed version 17.
- `ABR_SEED_TAGLINE` is now "Judaism, Christianity, Islam, Mandaeism", which brings the home page title from 76 to 61 characters.
- `abr_legacy_menu_defaults()` keeps the earlier wording, so menus saved before this release still map to the new defaults.

## [2.26.0] - 2026-09-18

### Added
- Islam: "Islam among the religions", on true religion as the pattern God implanted, the repetition of one message through successive prophets with law developing by circumstance, and the miracle located in the content of the revelation. Five footnotes, two of them to the anthology.
- Sacred Texts and Comparative Studies: sourced passages, each with a footnote.
- Seed version 16.

### Changed
- Sacred Texts now says "all four traditions" and includes the Mandaean ritual commentaries.

## [2.25.0] - 2026-09-18

### Changed
- The front page comparison keeps five themes of the eleven and gains a "See the Full Comparison" button to `@comparisons`.
- Comparative Studies opens with the full table (seed version 15), rendered through the content table support, above the thematic sections.

## [2.24.0] - 2026-09-18

### Added
- "Mandaeism" (`/religions/mandaeism/`, seed version 14): origins, belief, prophets, the Sabians of the Qur'an, a table of the scriptures, practice and the community today, with a footnote to Qur'an 2:62, 5:69 and 22:17.
- The darfash icon; a fourth religion card; a fourth column and tab in the comparison table; a Mandaeism node in the lineage diagram; menu and footer entries; six glossary terms; John the Baptist in Figures; Mandaean scripture in Sacred Texts; an FAQ entry on the classification.

### Changed
- The Religions hub, About, the home page hero and headings, and several search descriptions now describe four traditions.

### Fixed
- `ABR_SEED_VERSION` had drifted back to 12, which would have kept the scripture pages added at 13 from reaching an existing site. It is now 14.

## [2.23.1] - 2026-09-18

### Changed
- The default main menu drops the Topics submenu, leaving Journal as a plain link; a menu saved with the old default maps forward.
- `[abr_page_heading]` appends a link to the Topics page to the Journal listing's introduction.

## [2.23.0] - 2026-09-18

### Added
- `templates/tag.html`: a compact tag archive, distinct from the topic archive's card grid.
- `[abr_term_label]`, `[abr_term_count]` and `[abr_tag_list]`, with chip styles matching the topic chips.
- Articles list the tags they carry (`abr-single-tags`), and topic archives now carry the label Topic.

## [2.22.1] - 2026-09-18

### Fixed
- The header search field expanded inline at every width. Below 1024px it pushed the header past the viewport and gave the page up to 213px of horizontal scroll. It now opens as a full-width row beneath the header, with the icon in place as the submit button; between 1024 and 1279px it opens at 170px.

## [2.22.0] - 2026-09-18

### Added
- `inc/search.php`: a normalised search index per item (`_abr_index`, `_abr_index_title`), spelling equivalents (`abr_search_equivalents()`), diacritic folding without the intl extension (`abr_search_letters()`), relevance ranking, and `[abr_search_results]` with section labels, marked passages and pagination.
- Tools action "Rebuild the search index"; the index is also rebuilt on `save_post` and after each seeder run.

### Changed
- Search covers pages and articles together, twelve to a page, ordered by relevance instead of date.
- The search template renders results through the shortcode inside a constrained group.

### Fixed
- Queries using a different spelling from the page returned fewer results or none: Koran returned nothing, Quran three where Qur'an returned ten.
- Searching a word buried the page named after it, because results were ordered by date.

## [2.21.0] - 2026-09-18

### Added
- Three pages under Sacred Texts (seed version 13): "The Tanakh" (`/reference/sacred-texts/tanakh/`), "The Christian Bible" (`/bible/`) and "The Qur'an" (`/quran/`).
- Table support in the starter content: pipe-delimited lines become a `core/table` with the class `abr-table`, with Hebrew and Arabic cells marked for language and direction.
- Table styles, including horizontal scrolling inside the table on narrow screens.

## [2.20.0] - 2026-09-18

### Changed
- Insights renamed Journal: page title and slug (`/journal/`), permalinks `/journal/%postname%/`, category base `journal/topics`, tag base `journal/tags`, menus, footer column and interface text. Seed version 12.
- Redirects: `/insights/…` joins `/articles/…` in pointing to `/journal/…`, so every earlier address resolves in one hop.
- The permalink step is keyed by the settings it applies (`option:permalinks:{hash}`), so a later change to them runs once; `abr_previous_permalink_structures()` lists the structures replaced automatically.

## [2.19.0] - 2026-09-18

### Added
- `seed_mode` option (`abr_seed_modes()`), on the Tools tab: `replace` (default) or `keep`.
- Retirement: a seeded item the starter set no longer carries is moved to the trash, counted as `retired`.
- `abr_seed_log` gains `replaced` and `retired`; the Tools notice lists added, updated, replaced and trashed counts.

### Changed
- Starter pages are replaced with the current version by default, edited or not; WordPress keeps the previous text as a revision. Adopted pages and pages created by hand are still never written to.

## [2.18.0] - 2026-09-18

### Changed
- Seed version 11: Makkah and Madinah throughout the starter content, paired with the English form at first mention; Places headings and anchors become `#makkah` and `#madinah`; the front page card, the comparison table and the photograph descriptions follow; search descriptions keep Mecca and Medina.

### Added
- Glossary entry for Makkah, noting that most English sources write Mecca.

## [2.17.0] - 2026-09-18

### Changed
- Seed version 10. About states the site's purpose and the three traditions it treats; the Editorial Policy adds how argued conclusions are handled; the article on Kedar sets out the reading its evidence supports, with the Jewish and Christian readings beside it and a sixth footnote.

## [2.16.1] - 2026-09-18

### Changed
- The Site Map page is now Sitemap at `/sitemap/` (seed version 9, key `page:site-map` unchanged); menus, the footer and the listing follow.
- `inc/seed/legacy-2016.php` became `inc/seed/legacy-paths.php` (`abr_legacy_paths()`) and now carries the theme's own renames as well, starting with `/site-map/`.

## [2.16.0] - 2026-09-18

### Added
- Two articles from the site's earlier years, rewritten: "The Path of Abraham in the Qur'an" and "Kedar, the Arabs and the Prophets".
- Pages: "Copyright and DMCA" (`/dmca/`) and "Thank You" (`/donate/thank-you/`).
- Footnotes: `[^n]` markers in the content source, a `## Notes` list rendered with anchors and back-links, and styles for both.
- `inc/seed/legacy-2016.php`, mapping the nine addresses used between 2016 and 2023 to the seed keys that carry that material, for 301 redirects.
- Photographs inside the Judaism, Christianity, Islam, Jerusalem and path of Abraham pages.

### Changed
- Seed version 8. The Judaism, Christianity and Islam pages and the Abraham and Jerusalem articles merge the site's earlier text with the existing pages, rewritten in the house style with figures updated for 2026. The Privacy Policy covers analytics, donations and the absence of advertising; About notes that questions turning on wording are taken back to the languages.

## [2.15.0] - 2026-09-18

### Added
- `assets/images/photos/`: nine photographs from the site's 2023 backup, cropped and saved as WebP (792 KB in total).
- `[abr_photo]`, which prints a bundled photograph with dimensions, lazy loading and alt text, and falls back to the decorative panel when the file is absent.

### Changed
- The hero shows the Kaaba; the sacred places cards show Jerusalem, Mecca and Hebron, with Mount Sinai keeping its panel.
- The Medina card became Hebron, with the Cave of the Patriarchs.
- Place card art, photograph or panel, shares one 16:10 frame; the old fixed height of 140 pixels is gone.

## [2.14.0] - 2026-09-18

### Added
- Light and dark colours. `[abr_mode_toggle]` places the switch in the header; `assets/js/mode.js` loads in the head, applies the stored choice before the first paint, and stores it under `abr-mode`. Options `mode_toggle` and `mode_default` (light, dark or the device setting), with `abr_modes()`.
- Dark palette: `:root[data-abr-mode="dark"]` remaps the five scheme presets, so every scheme works in both modes.
- Tokens `--abr-dark-surface`, `--abr-on-dark` (dark bands and footer in both modes), `--abr-footer-bg` and `--abr-gold-ink` (a gold that holds contrast as small text on light surfaces).
- Sun and moon icons.

### Fixed
- Small uppercase gold labels sat at 2.8:1 on white cards; they now use `--abr-gold-ink` at 4.8:1.

## [2.13.1] - 2026-09-17

### Fixed
- The hero placeholder's guidance line ("Replace this panel with a manuscript or architectural photograph.") reached visitors. It now prints through `[abr_art_note]`, which requires a signed-in user with `edit_theme_options`.

## [2.13.0] - 2026-09-17

### Added
- `assets/images/symbols.png`, the cross, crescent and star as an alpha mask (GPL, supplied by the site owner), placed by `.abr-heritage::after` as a scheme-coloured watermark at the lower right of the shared heritage band: gold at 9% opacity, 7% and wider below 600px, hidden under `prefers-reduced-transparency`.

## [2.12.1] - 2026-09-17

### Changed
- `header_donate_url` and `donation_url` default to https://www.paypal.com/paypalme/menj; both remain editable on the Header tab.
- `[abr_donation]` falls back to the header link when the donation link is empty and the header link points to another site.
- The header Donate button carries a title naming the host when it leaves the site.

### Added
- One-time migration `abr_migrate_donate_link()`: a stored `@donate` becomes the PayPal address; flag `abr_donate_link_migrated`.

## [2.12.0] - 2026-09-17

### Added
- Red Donate button after the header call-to-action (`[abr_header_donate]`), visible at every width, with options `header_donate`, `header_donate_label`, `header_donate_url` (default `@donate`) and `donate_colour` (default `#b3261e`, printed as `--abr-donate`).
- Donate page (`page:donate`, `/donate/`), seed version 7, with `[abr_donation]`: a button to `donation_url` when set, otherwise a pointer to the Contact page and a note for editors. Options `donation_url` and `donation_button`.
- "Donate (red)" block style for buttons.
- Donate in the default secondary menu.

### Changed
- The secondary menu appears only in the footer's bottom row: the bar above the header and the site links in the overlay panel are removed.
- Up to 480px wide the header logo shows the AR mark alone.

## [2.11.0] - 2026-09-17

### Changed
- Main menu default: Religions (Judaism, Christianity, Islam), Sacred Texts, Timeline, Reference (Figures, Places, Comparative Studies, Glossary, Frequently Asked Questions, Research), Insights (Topics).
- Secondary menu default now holds the site links: About AR, Editorial Policy, Contact AR, Knowledge Base (knowislam.wiki), Privacy Policy, Terms & Conditions, Site Map.
- Footer columns: Explore (the religions), Reference (its pages), Insights (latest, topics and five topic archives).
- Terms page retitled Terms & Conditions; seed version 6.
- Menus and footer headings saved unchanged from the 2.10.0 defaults are read as the new defaults.

### Added
- The secondary menu renders as the footer's bottom row (`[abr_secondary_nav context="footer"]`) and at the foot of the overlay panel below 1024px (`abr-nav-site`).

## [2.10.0] - 2026-09-17

### Changed
- Articles renamed Insights: posts page title and slug (`/insights/`), permalinks `/insights/%postname%/`, category base `insights/topics`, tag base `insights/tags`. Interface text follows (listing heading, related insights, pagination, 404 page, topic counts, search descriptions).
- Knowledge Base renamed Reference: hub title and slug (`/reference/`), its eight pages beneath it, the front page section ("Explore the Reference Section").
- Default menus: main menu Religions, Reference, Insights, Knowledge Base (knowislam.wiki), About; Sacred Texts moves into the Reference dropdown and the secondary bar; the Resources footer column gains Knowledge Base. Menus saved unchanged from earlier defaults are read as the new ones (`abr_legacy_menu_defaults()`).
- The seeder applies the new permalinks to sites still on `/articles/%postname%/` (`option:permalinks-3`), and refreshes an unedited item's title and excerpt even when its text is unchanged. Seed version 5.
- The link updater rewrites any internal link that no longer resolves but has a redirect target, keeping anchors (`abr_rewrite_legacy_links()`).

### Added
- Redirects from any `/articles/…` or `/knowledge-base/…` address to its `/insights/…` or `/reference/…` counterpart when that exists.
- Token aliases `@religions`, `@reference`, `@insights`.
- External link treatment in menus, the secondary bar, footer columns and Further reading: outward arrow, host in the title, screen-reader text.

## [2.9.0] - 2026-09-17

### Added
- Further reading list (`further_title`, `further_links`, up to 6 links) on the Navigation tab, rendered by `[abr_further_reading]` in `single.html` after related articles.
- Seed version 4.

### Changed
- About, Editorial Policy and Research describe the editorial method: traditions in their own terms, positions with their reasons, sources, corrections and editorial responsibility. Editorial Policy excerpt and search description updated.
- Comparative Studies adds a note on Jewish and Muslim understandings of divine unity; Comparative Studies and Sacred Texts add the oral transmission of the Qur'an and the term *ḥāfiẓ*.
- Front page about and comparison introductions reworded to match.
- The link-limit warning covers every limited list.

## [2.8.0] - 2026-09-17

### Added
- Noto Serif Hebrew (variable weight, vowel points, cantillation), Noto Sans Syriac (Estrangela, variable weight) and Noto Sans Imperial Aramaic, all SIL OFL 1.1 with the licence embedded; presets `hebrew`, `syriac` and `imperial-aramaic`.
- Language rules: Hebrew and square-script Aramaic (`he`, `hbo`, `arc`, `tmr`, `jpa`, `oar`, `sam`), Syriac (`syc`, `syr`, `aii`, `cld`) and Imperial Aramaic (`arc-Armi`).
- The three faces join the body font stack as fallbacks for untagged text.
- Seed version 3: Hebrew script and translations for the key terms on Judaism, with the Kaddish; an "Aramaic in the scriptures" section on Sacred Texts; Glossary entries for Aramaic, Gemara, Peshitta, Syriac and Targum.

### Changed
- `:lang(he)` now uses the bundled Hebrew face instead of a system stack.

## [2.7.0] - 2026-09-17

### Added
- "Typewriter note" block style for paragraphs and quotes, set in Special Elite (Apache 2.0), for archival notes and document transcriptions.
- "Arabic calligraphy" block style for paragraphs and headings, set in Arslan Wessam (Diwani), for short centred Arabic display lines.
- Greek preset "EB Garamond Greek", applied to `lang="grc"` and `lang="el"` text.
- Font presets `greek`, `typewriter` and `arabic-display` in `theme.json`.

### Changed
- Transliteration fallback rebuilt from EB Garamond 1.003 variable fonts (weight 400 to 800) as `eb-garamond-supplement(-italic).woff2`, adding polytonic Greek; replaces `eb-garamond-translit(-italic).woff2`.
- Full OFL and Apache 2.0 texts embedded in the EB Garamond and Special Elite files.

### Fixed
- Bold transliteration letters (ḥ, ṭ, ẓ and others) rendered at regular weight inside bold words.
- Polytonic Greek letters had no glyphs.

### Not included
- Dubidam Arabic, whose licence is limited to personal use.

## [2.6.0] - 2026-09-17

### Added
- AR monogram as the site logo: `assets/images/logo-mark.svg`, traced from Sabon Next LT Bold (no font needed), drawn inline by `abr_logo_mark()` with its three parts coloured from the active scheme.
- `logo_style` option on the Header tab: AR mark and name (default), AR mark only, or name only; a select field type for `abr_field()`.
- Footer brand shows the mark beside the title.
- Browser icons from the mark (`favicon-32.png`, `icon-192.png`, `apple-touch-icon.png`, and the SVG) on the site and the login screen, until a Site Icon is set (`abr_default_icons()`).

### Changed
- `assets/images/logo.png` (the Organization logo in structured data) is now rendered from the same SVG.
- `screenshot.png` shows the current header.

## [2.5.0] - 2026-09-17

### Added
- Secondary menu (`nav_secondary`): a slim bar above the header, up to 8 links, shown from 1024 pixels; `[abr_secondary_nav]`.
- Menu limits: `ABR_PRIMARY_NAV_MAX` (5 top-level links), `ABR_NAV_CHILDREN_MAX` (10 dropdown links each), `ABR_SECONDARY_NAV_MAX` (8). Extra lines are removed on saving with a warning; the renderer applies the same limits to older saved menus, and the Navigation tab flags them.
- Dropdown panels styled to match the menu; the parent of the current page is marked (`.is-current-parent`, `.current-menu-ancestor`).

### Changed
- Default main menu: Religions (Judaism, Christianity, Islam), Sacred Texts, Knowledge Base (History and Timeline, Figures, Places, Comparative Studies, Glossary, Frequently Asked Questions, Research), Articles (Topics), About (Editorial Policy, Contact). Home is reached through the logo.
- A main menu saved unchanged from 2.4.x is read as the new default.
- The overlay menu is used below 1024 pixels (was below 1280); dropdowns appear expanded and indented inside it.
- `[abr_hub_links]` includes dropdown links.
- Anchor offsets allow for the secondary bar.

## [2.4.1] - 2026-09-17

### Changed
- Main menu links are rounded (8px) with a beige fill on hover and keyboard focus, and a navy fill with ivory text for the current section; the gold underline is gone. The overlay menu and submenus use the same shapes.
- Header Navigation block gap reduced to 4px; link padding now provides the spacing (12px, or 9px between 1280 and 1439 pixels).

### Fixed
- Overlay menu rows no longer extend past the left edge of the panel.

## [2.4.0] - 2026-09-17

### Added
- Site structure: Religions, Knowledge Base, About, Articles and Topics hubs, with every page nested under its section (see `ssot.md`, sections 12 and 13).
- Five starter pages: Knowledge Base, History and Timeline, Frequently Asked Questions, Topics and Site Map. Seed version 2.
- Templates: `page.html`, `single.html`, `home.html`, `archive.html`, `search.html` and `404.html`, with breadcrumbs, one `h1`, topic chips, related articles, pagination and a helpful 404 page.
- `inc/structure.php`: link tokens, the Theme Options navigation builder, breadcrumbs and ten structure shortcodes, including an HTML site map organised by section.
- `inc/seo.php`: meta descriptions, canonical addresses for listings, robots rules, a robots.txt rule for search results, an XML sitemap without author archives, Open Graph and Twitter tags, and a JSON-LD graph with Organization, WebSite, WebPage, BreadcrumbList and Article. Stands down when a dedicated SEO plugin is active.
- "Search description" box on posts and pages, with a 130-character counter; written descriptions for all 30 starter items.
- `inc/redirects.php`: 301 redirects from every 2.3.0 starter address and from `/category/` archives, and a Tools action that updates old links inside content.
- Theme Options tabs: Navigation (header menu and three footer columns) and Search (search output, front page description, logo, share image, Google and Bing verification, Google Analytics 4).
- Bundled `assets/images/logo.png` and `assets/images/share.png`, set in Sabon.
- Tools > System information: permalink, search output and sitemap status.

### Changed
- Permalinks: `/articles/%postname%/`, category base `articles/topics`, tag base `articles/tags`, applied on plain sites and on post-name sites without articles of their own.
- The seeder now syncs the address and parent of its own items when the seed version rises, and refreshes their text only when unedited.
- The Guides page became the Religions hub at `/religions/`.
- Starter content links point to the new addresses; section headings carry anchors; the Privacy Policy mentions analytics.
- Header menu and footer columns come from Theme Options; the header button accepts page tokens and defaults to `@guides`.
- Front page links follow their pages; figure and place cards link to their entries; timeline and questions sections link to their full pages; the generic "Read article" link is gone from article cards.
- Site tagline set on new sites; page excerpts enabled; feed links enabled.

### Fixed
- Category links and rewrite rules written in the same request as a permalink change now use the new structure.

## [2.3.0] - 2026-09-17

### Added
- Starter content seeder (`inc/seed.php`) with tombstone list `abr_seeded_slugs`. It runs on activation and after updates that raise `ABR_SEED_VERSION`, and creates:
  - 17 pages: Home, Articles, Judaism, Christianity, Islam, Sacred Texts, Figures, Places, Glossary, Comparative Studies, Religion Guides, Research, About, Editorial Policy, Contact, Privacy Policy, Terms;
  - 8 articles, back-dated across the preceding months;
  - 8 categories: Religion, History, Scripture, Theology, Culture, Philosophy, Archaeology and Interfaith Studies.
- One-time site set-up on new installs: post-name permalinks, untouched WordPress sample post and page moved to the trash, default privacy policy draft filled and published, Home and Articles set as front page and posts page.
- Theme Options > Tools > Starter content: status summary, "Add missing starter content", item table with Edit, View, Open trash and Restore.
- `contact_email` option on the Footer tab and the `[abr_contact_email]` shortcode, obfuscated with `antispambot()`.
- `abr_category_url()` and `[abr_topic_url]`.
- `abr_seed_enabled` filter.
- Hebrew font stack for `lang="he"` text.

### Changed
- Topic cards link to the category archives instead of `/topic/` addresses.
- Body text weight set to 400 in `theme.json`; quotes and pull quotes set to 400; `strong` and `b` set to 700.

### Fixed
- Bold text rendered at regular weight, because the parent theme's body weight of 300 made `bolder` compute to 400.

## [2.2.1] - 2026-09-17

### Added
- Extended Sabon files, one per face (`sabon-next-lt-{face}-ext.woff2`), with Greek, Cyrillic, currency signs and Monotype private-use alternates. Sabon Next LT is now bundled complete: all 882 characters.
- `abr_sabon_files()` and `abr_sabon_missing()`; an error notice on the Themes and Theme Options screens when a bundled Sabon file is missing; a Sabon row in Tools > System information.
- Release checklist step confirming the eight Sabon files.

### Changed
- Latin Sabon files rebuilt from the original fonts with every name record kept; `unicode-range` set to U+0000-02FF, U+1E00-1EFF, U+2000-214F, U+2190-22FF, U+25CA, U+FB00-FB06.
- Combining marks U+0300, U+0301, U+0303, U+0309 and U+0323 moved out of the Latin files and out of every `unicode-range`.
- Preload targets named as the Latin Regular and Bold files.

### Fixed
- Greek and Cyrillic text fell back to another serif because the 1.1.0 conversion dropped those letters.

### Removed
- Technical debt entry that proposed loading Sabon from a web font service.

## [2.2.0] - 2026-09-17

### Added
- Header tab: logo main line and second line, search button switch, call-to-action switch, label and link.
- Footer tab: title, tagline, description, copyright notice with `{year}`, and note.
- Tools tab: export to JSON, import from JSON, reset to defaults with confirmation, system information table.
- Shortcodes `[abr_logo]`, `[abr_header_cta]`, `[abr_footer_brand]`, `[abr_copyright]` and `[abr_footer_note]`.
- Tab icons; tab selection from `?tab=` in the address; Home and End keys on the tab list.
- Theme Options shortcut in the admin bar.
- Redirect from the former screen address `page=abrahamic-settings`.
- `abr_option_types()` schema, `abr_get_options()`, and the `abr-no-header-search` body class.
- Users with `edit_theme_options` can save options without `manage_options`.
- Sticky save bar on the options screen.

### Changed
- Settings screen renamed to **Theme Options** and moved to Appearance > Theme Options (`abrahamic-theme-options`).
- `inc/settings.php` split into `inc/options.php` (data) and `inc/theme-options.php` (screen and tools).
- `abr_sanitize_options()` now works from the schema and drops unknown keys.
- Header and footer parts output their wording through the new shortcodes in Custom HTML blocks.
- Theme shortcodes are also processed inside Custom HTML and Paragraph blocks (`abr_render_theme_shortcodes()`, formerly `abr_render_shortcode_block()`).
- Admin script data renamed from `abrSchemes` to `abrOptions`; tab storage key from `abrSettingsTab` to `abrOptionsTab`.
- Unticked switches now submit an explicit 0.
- Tab list scrolls sideways on narrow screens.

### Fixed
- On/off switches rendered with a collapsed track over their label.

### Removed
- `inc/settings.php`.
- `abr_add_settings_page()` and `abr_render_settings_page()`, replaced by `abr_add_options_page()` and `abr_render_options_page()`.

## [2.1.1] - 2026-09-17

### Added
- `License: GNU General Public License v2 or later` and `License URI` in `style.css`; `License` and `License URI` in `readme.txt`.
- `readme.txt` Copyright section with the GPL notice and a list of bundled resources and their licences.
- Licence rows in `docs/readme.md` and `docs/ssot.md`, and a resource licence table in each.
- Technical debt entry for the proprietary Sabon Next LT files inside a GPL package.

### Changed
- `readme.txt` section "Credits" renamed back to "Copyright".
- SSOT decision record: GPLv2 or later supersedes the 2.0.1 no-licence decision.

## [2.1.0] - 2026-09-17

### Added
- Profile links for 45 networks in six groups, using the Minimalist Social & Platform Icons Pack 2.8 (`assets/icons/social/`).
- `inc/social.php`: network registry (`abr_social_groups()`, `abr_social_networks()`), option key helper (`abr_social_key()`), icon loader (`abr_social_icon()`) and saved-profile list (`abr_social_profiles()`).
- Social settings tab: grouped fields with icon previews, a name filter that hides empty groups, and a live count of filled fields.
- `abr_icon()` and `[abr_icon]` return social marks for any registered network slug.

### Changed
- `[abr_social]` now outputs a list (`<ul class="abr-social">`) that wraps across lines, with `rel="me noopener"` and a tooltip on each link.
- Footer icon circles use border-box sizing: 36px, or 44px on touch screens.
- Social URLs are trimmed before saving.
- LinkedIn and Scribd marks taken from Simple Icons in place of the pack's Font Awesome versions.

### Removed
- Hand-drawn `facebook`, `x`, `instagram` and `youtube` paths from `inc/icons.php`.

## [2.0.1] - 2026-09-17

### Removed
- `License` and `License URI` fields from `style.css` and `readme.txt`.
- `assets/fonts/OFL-EBGaramond.txt`.
- Licence statements from the readme credits, the Licence rows in `docs/readme.md` and `docs/ssot.md`, the typography licensing row, and the Sabon licence item in the technical debt log.

### Changed
- EB Garamond subset files now hold their full attribution text in the font name table (name ID 13), alongside the existing copyright (ID 0) and URL (ID 14). Each file grew from about 5 KB to about 8 KB.
- `readme.txt` section "Copyright" renamed to "Credits".

## [2.0.0] - 2026-09-17

### Changed
- Theme renamed from "Abrahamic Religions" to **Abrahamic**. Folder, slug and text domain are now `abrahamic`.
- Prefix changed from `ar` to `abr` across PHP functions, constants, the option key, shortcodes, CSS classes, custom properties, asset handles and JavaScript globals. See `ssot.md`, section 2.
- Option key changed from `ar_options` to `abr_options`.
- Pattern namespace and category changed from `abrahamic-religions` to `abrahamic`.
- Settings screen renamed to Appearance > Abrahamic; admin page slug is now `abrahamic-settings`.
- Stylesheets moved to `assets/css/`, scripts to `assets/js/`.
- Author metadata set to MENJ, https://menj.blog.
- Side gutters are now fluid, `clamp(20px, 4vw, 40px)`.
- Hero heading scales with the viewport (`clamp(2.6rem, 5.2vw, 4.6rem)`) so the two-column hero holds on landscape tablets.
- Card and button lift effects apply only on devices with hover.

### Added
- Responsive tier system for desktop, tablet landscape, tablet portrait, mobile and small phones. See `ssot.md`, section 7.
- Navigation collapses to the overlay panel below 1280px, where nine links no longer fit one row. Link spacing tightens from 1280px to 1439px.
- Overlay menu styling: ivory panel, large full-width links with dividers, 44px open and close buttons, gold focus ring.
- Tablet portrait layouts: two-up three-column grids with an odd last item spanning the row; three-up figures; two-up places and articles; four-up topics; footer brand row above three link columns.
- Mobile layouts: 64px header, full-width hero buttons, single-column cards, two-up figures and topics, two-column footer, stacked footer bottom line.
- Small-phone adjustments up to 360px.
- Touch targets of at least 44px for footer links, comparison tabs, timeline arrows and social links on coarse pointers.
- Newsletter field height of 48px; field text at 16.8px, above the iOS zoom threshold.
- `text-size-adjust` locked at 100% to stop mobile browsers inflating text.
- One-time migration of saved settings from `ar_options` (`abr_migrate_legacy_options()`, on theme switch and admin load).
- `screenshot.png` for the Themes screen.
- Documentation: `readme.txt`, `docs/readme.md`, `docs/changelog.md`, `docs/upgrading.md`, `docs/ssot.md`.

### Fixed
- Header wrapped to two or three rows between 600px and 1279px.
- Header actions overflowed the viewport by 12px at 320px.
- Figures grid overflowed at 320px; grid items may now shrink below their content width.
- Overlay menu background rendered white instead of the scheme's ivory.
- The header's `backdrop-filter` confined the overlay menu to the header bar; the filter is now removed while the menu is open.
- Sticky header sat below the admin bar's former position on phones, where the admin bar scrolls away.

### Removed
- Folders `css/` and `js/` at the theme root, replaced by `assets/css/` and `assets/js/`.

## [1.1.0] - 2026-09-17

### Changed
- Typeface changed from Playfair Display and Inter to Sabon Next LT (Regular, Italic, Bold, Bold Italic), converted to WOFF2 and subset to Latin ranges.
- Type scale retuned for Sabon's smaller x-height: base size 19px, small text enlarged by about ten percent.
- All weights set explicitly to 400 or 700; synthetic bold and italic disabled.
- Section titles set in Regular; card headings and buttons in Bold.
- Uppercase labels tracked at 0.16em.
- Preloaded fonts changed to Sabon Regular and Bold.

### Added
- EB Garamond transliteration fallback, limited by `unicode-range` to the letters Sabon lacks (ḥ ḍ ṭ ẓ ʿ ʾ ḫ ṯ ḏ and capitals), scaled to Sabon's x-height.
- Arabic script font stack for `lang="ar"` content.
- Balanced heading wraps and improved paragraph wraps.

### Removed
- Playfair Display and Inter font files.

## [1.0.0] - 2026-09-17

### Added
- Child theme of Twenty Twenty-Five replicating the abrahamic-religions.com home page design.
- `theme.json` palette (navy, ivory, gold, beige, charcoal, white), type scale and layout widths.
- Fifteen block patterns: hero, introduction, religions, heritage, comparison, sacred texts, figures, places, timeline, articles, topics, knowledge base, FAQ, about, newsletter.
- Front page and full-width landing templates; header and footer parts.
- Tabbed settings screen (General, Colours, Newsletter, Social) with four colour schemes and a custom palette.
- Shortcodes for the newsletter form, social links, icons and the current year.
- Inline SVG icon set.
- Gold button block style.
- Comparison section with all three traditions, and keyboard-operable tabs.
- Timeline with scroll-snap and arrow controls.
- FAQ built on the Details block.
- Articles section built on the Query Loop.
- Optional fade-in on scroll, disabled under reduced motion.
- Arabic terms in the comparison and FAQ sections marked with `lang="ar" dir="rtl"`.

### Fixed
- Relative to the source site: empty Christianity and Islam comparison columns; Mary listed as revered in Judaism; a Christian claim about David presented as shared.
