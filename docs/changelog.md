# Changelog

All notable changes to the Abrahamic theme are recorded here. The format follows Keep a Changelog, and the project uses Semantic Versioning. Version locations are listed in `ssot.md`, section 3.

## [2.77.1] - 2026-09-27

### Changed
- Precedence rule from the site owner: where the theme's schema and metadata support is superior to Rank Math's, the theme's defaults take precedence; everything else is Rank Math's, with the earlier rules unchanged (anything an editor sets in Rank Math wins; theme defaults fill what Rank Math leaves empty).
- Compared with Rank Math 1.0.279's default output, the theme's structured data is the more complete: licence data for every credited photograph, speakable, FAQPage built from question-and-answer content, BreadcrumbList, AboutPage, ContactPage and CollectionPage types, the Organization as author, and no Person or Gravatar. `abr_rank_math_json_ld()` therefore prints the theme's graph (`abr_schema_graph()`) inside Rank Math's own script tag, in place of Rank Math's, so there is one graph and no duplication. `abr_rank_math_schema_customised()` detects a schema built in Rank Math's Schema tab for the page (`rank_math_schema_*` post meta); there Rank Math's graph is kept and the theme only adds its licence, speakable and FAQ data and removes any Person, as in 2.77.0.
- Left with Rank Math, where its support is the broader: robots directives, canonical links, the Open Graph and Twitter tags (other than the default titles and descriptions the theme supplies where Rank Math is empty), and the XML sitemaps.

### Tested
- With Rank Math active: the home page, an article, the FAQ, the Journal and a reference page each carry one graph, the theme's (article: Organization, WebSite, BreadcrumbList, Article, WebPage and 3 licensed images; FAQ: FAQPage). With a schema added in Rank Math on an article, Rank Math's graph (including the added Book schema) is kept, with the theme's licensed images added and no Person. No PHP notices.

## [2.77.0] - 2026-09-27

### Added
- `inc/rank-math.php`, written against Rank Math SEO 1.0.279 (supplied by the site owner) and tested with it active on the test site. Rank Math keeps the last word wherever an editor has set something; this module only fills gaps and merges data.
  - Focus keywords: new `inc/seed/focus-keywords.php` gives a Rank Math focus keyword (primary, then secondary, comma-separated as Rank Math stores them) to all 41 articles and six principal pages (home, FAQ, Comparative studies, the Islamic Dilemma page, Places, Timeline), from the site's keyword research; no two items share a primary keyword. `abr_seed_focus_keywords()` writes `rank_math_focus_keyword` only where it is empty, so a keyword typed in Rank Math is never replaced. It runs after every starter-content run and once on the first admin page load after the list changes (`abr_focus_keywords_stamp`), so the live site receives the keywords on update. 47 written on the test site.
  - Structured data merged into Rank Math's graph (`rank_math/json_ld`, priority 100): licence data for the featured image and every `[abr_photo]` photograph, linked from the WebPage; speakable on BlogPosting/Article; FAQPage on the FAQ-style pages when Rank Math has none; and the site's Organization node if Rank Math's graph lacks it.

### Fixed
- Anonymity leak found on the live site: Rank Math's schema described each article's author as a Person whose image was a Gravatar URL, a hash derived from the WordPress account's email address, which anyone who guesses the address can confirm. The Person node is now removed from Rank Math's graph and every `author` points to the site's Organization. Checked with Rank Math active: no Person node and no Gravatar anywhere in the page.

### Tested
- With Rank Math 1.0.279 active: titles (home 58, article 58, FAQ 48, Journal 29 characters) and descriptions (104 to 119) follow the theme defaults where Rank Math is empty, including the Open Graph and Twitter titles; a title and description set in Rank Math on an article are output exactly as Rank Math writes them. Structured data: one graph, 3 licensed images and speakable on an article, FAQPage with 8 questions on a question-and-answer article and 30 on the FAQ, author the Organization, no Person. No PHP notices.

## [2.76.0] - 2026-09-27

### Changed
- Rank Math precedence, at the site owner's instruction: the site always defers to Rank Math when it is active. `abr_rank_math_has()` checks whether an editor set a Rank Math title or description for the current post, page or topic (`rank_math_title`, `rank_math_description`, and the Facebook and Twitter fields); where one is set, Rank Math's text is used untouched, branding and length included. Only where nothing is set, which is where Rank Math would fall back to its generic templates ("Home - Abrahamic Religions"), do the theme's defaults apply. The theme's own SEO output (schema, descriptions and tags) stays off while Rank Math is active, as before. The Yoast and All in One SEO hooks added in 2.75.1 are removed.
- Title length: every title, branding included, is under 60 characters (`ABR_TITLE_MAX`, 59). New `inc/seed/seo-titles.php` gives short search titles to the 24 articles whose headlines were too long (for example "Halakhah, canon law and the sharia", "The Council of Nicaea, 325"); the headline on the page is unchanged. A post's own "Search title" (`_abr_seo_title`) takes precedence. Any other title too long is shortened at a word boundary. Search pages read "Search: query", the query shortened to fit. Home page title default changed to "A guide to the four Abrahamic faiths" (58 with branding); the earlier default was 64.
- Description length: every description, call to action included, is under 130 characters (`ABR_DESCRIPTION_MAX`, 129). `abr_seo_finish_description()` keeps a written description's own call to action, or adds one where the last sentence lacks it ("Read more." on articles and pages, "Browse the articles." on listings, "Explore the guide." on the home page), shortening the text at a word boundary to make room.

### Fixed
- Branded titles decoded only some HTML entities, so a curly quotation mark counted as seven characters and search titles were cut short; all entities are now decoded before measuring.

### Tested
- Thirteen views (home, Journal, FAQ, Places, a religion page, articles with short titles, articles with added calls to action, a topic listing, a 404 and two searches): every title under 60 and every description under 130. Rank Math behaviour tested on an article: with no Rank Math fields, the theme's short branded title and description; with a Rank Math title and description set, Rank Math's text unchanged.

## [2.75.1] - 2026-09-27

### Fixed
- Home page title. The live site showed "Home - Abrahamic Religions". Checked on the live server: Rank Math SEO is active there, and with its default settings it titles a static front page by the page's own name ("Home") and uses " - " as separator; the theme's own title output steps aside whenever an SEO plugin is active (`abr_seo_active()`), so the theme could not correct it.
- Branding, at the site owner's instruction: every title ends "| Abrahamic Religions". New `abr_branded_title()` strips any existing site-name suffix, whatever the separator (- – — | · : »), and appends " | Abrahamic Religions". Applied to: WordPress's own document title (`document_title_separator` is now "|"; `document_title_parts` gives the home page the home title in place of the site name and tagline, and drops the tagline elsewhere); Rank Math's title, Open Graph and Twitter titles (`rank_math/frontend/title`, `rank_math/opengraph/facebook/og_title`, `rank_math/opengraph/twitter/twitter_title`); Yoast (`wpseo_title`, `wpseo_opengraph_title`) and All in One SEO (`aioseo_title`); and the theme's own Open Graph and Twitter titles. These filters run whether or not an SEO plugin is active.
- New option `home_title` (SEO tab, "Home page title"), default "Judaism, Mandaeism, Christianity and Islam", in the site's order of the traditions. The tagline stored in Settings > General lists them out of order ("Judaism, Christianity, Islam, Mandaeism") and is no longer used in titles.

### Tested
- Titles checked for the home page, the Journal, the FAQ, an article, a religion page, a search and a 404: all end "| Abrahamic Religions", and the Open Graph titles match. `abr_branded_title()` converts "Home - Abrahamic Religions", "… - Abrahamic Religions" and "Journal – Abrahamic Religions" correctly and leaves an already branded title unchanged.

## [2.75.0] - 2026-09-27

### Added
- Audit against Google's "Structured data markup that Google Search supports" (last updated 15 June 2026) and the SEO Starter Guide, both supplied by the site owner. Already in place and confirmed on sample pages: Article (headline, description, dates, author and publisher as the site's Organization, image, section, word count), BreadcrumbList on every inner page with visible breadcrumbs, Organization (name, URL, logo, description, email when set), WebSite, FAQPage on the FAQ, CollectionPage for listings, AboutPage and ContactPage. From the Starter Guide: unique titles and descriptions, one H1 per page, alt text on every content image, canonical links, words in URLs, working parent addresses (/reference/, /reference/sacred-texts/ and the like), an HTML sitemap and the XML sitemap in robots.txt, and a helpful 404 page.
- Image licence metadata (Google Images can show the creator, licence and where to obtain an image). New `inc/seed/photo-credits.php`, generated from the build's photograph records: creator, licence, licence URL, source page and source for 134 of the 143 bundled photographs. `abr_schema_licensed_image()` builds an ImageObject with `contentUrl`, `license`, `acquireLicensePage`, `creator`, `creditText` and `copyrightNotice`. Every article's featured image becomes a `#primaryimage` node used by the Article and the WebPage, and every photograph placed with `[abr_photo]` on a page or article gets its own node linked from the WebPage. The nine photographs without a recorded licence (the four religion-page heroes, the home page Kaaba, three Jerusalem and Hebron place images, and the prayer image) are left without licence data rather than given a guessed one. The credits file names no person connected with the site.
- Speakable (`SpeakableSpecification`) on every Article: the title and the first paragraph, for read-aloud assistants.
- FAQPage on the two question-and-answer articles (`abr_faq_style_keys()`: the FAQ, `post:islamic-dilemma-reddit`, `post:judaism-vs-christianity-reddit`). Footnote markers are now stripped from answer text in all FAQ data.
- Not applicable to this site, and not added: Carousel, Course list, Dataset, Discussion forum, Education Q&A (flashcards), Employer rating, Event, Job posting, Local business, Math solver, Movie, Product, Q&A page (for user-contributed answers), Recipe, Review snippet, Software app, Subscription and paywalled content, Vacation rental, Video (the site hosts no video). Profile page is not added because it would name a person, which the anonymity rule forbids.

### Fixed
- Two opening quotation marks in the Islamic Dilemma question-and-answer article were closing marks. Seed version 87.

## [2.74.2] - 2026-09-27

### Added
- The same 2024 Wayback archive was uploaded again (identical file, 61 files). The remaining usable material from its home page is now carried over, rewritten:
  - FAQ "How do the Abrahamic religions view Abraham?", with the Hebrew and Arabic forms of his name that the 2024 page gave, Genesis 17:5, Galatians 3:7, Qur'an 2:124 and 4:125 (*Khalīl Allāh*), and Mandaeism's rejection of him as a prophet.
  - FAQ "Do the Abrahamic religions share the same values?", from the 2024 page's section on shared values and dialogue, linking to the Amman Message article.
- Nothing further in the archive is usable: its other pages are "page has moved" stubs. FAQ now 30 questions, all in the FAQPage structured data. Seed version 86.

## [2.74.1] - 2026-09-27

### Changed
- `[abr_diagram name="shared-beliefs"]`, the four-tradition Venn diagram, added to `page:comparisons` (with an introductory paragraph, before the section on God) and to `page:faq` (under "What do Judaism, Christianity and Islam have in common?", whose last sentence now introduces it), at the site owner's request. Both captions name it a Venn diagram, for readers who search for "Abrahamic religions Venn diagram", and point to the family-tree article for the reasoning. Checked at 1280 and 390 pixels. Seed version 85.

## [2.74.0] - 2026-09-27

### Added
- Review of `Abrahamic_Religions.zip`, a Wayback Machine copy of the site as it stood in June 2024 (61 files). Only the home page holds content (about 880 words); every other page in the copy is a "page has moved" stub, and all those addresses already redirect (checked: /abraham/, /christianity/, /judaism/, /islam/, /jerusalem/, /millat-ibrahim/, /dmca-policy/, /contact-abrahamic-religions/, /about/, /sitemap/, /privacy-policy/). Most of the 2024 text is superseded by fuller, sourced pages, and parts of it are not reused because they conflict with the site's editorial policy: it omits Mandaeism, calls the land of Judaism's origin "the Occupied Palestinian Territories and Israel", and says that Muhammad "revealed the Quran", which misstates Muslim belief (God revealed it; the Prophet received it). Two of its questions were worth keeping and are rewritten:
  - FAQ "Who are the prophets of the Abrahamic religions?" (search demand: "abrahamic prophets", 260 a month): the shared names, each tradition's view of prophecy, Qur'an 33:40, Mandaeism's prophets; links to Figures.
  - FAQ "Why are the Abrahamic religions sometimes called Western religions?": the textbook origin of the label and why it misleads, with the 2020 population figures.
- `inc/seed/legacy-paths.php`: the 2016 Venn diagram image (full size and its 130x150, 259x300 and 52x60 copies), which image search still finds, now redirects to `post:abrahamic-family-tree`, where the four-tradition diagram is drawn. It previously fell through to the home page. `abr_legacy_redirect()` now also acts on addresses under /wp-content/uploads/ that WordPress does not report as a 404 (it can match an old attachment by name, which is what sent the diagram home); all other addresses still need a 404 before any redirect.
- The archive's embedded lecture (a third-party YouTube video) and its PayPal and Google Ads scripts are not carried over. Seed version 84.

## [2.73.2] - 2026-09-27

### Changed
- Title case for the home page chapter names, at the site owner's request: the `title` attribute of all seven `[abr_parallax]` banners in `templates/front-page.html`, the thirteen chapter labels (`.abr-label`, I The Question to XIII Behind the Journey) in the section patterns, and the hero label (Religion, History, Culture). Minor words stay lower case (the, and). The banners' italic lines and the section headings keep sentence case, as elsewhere on the site.

## [2.73.1] - 2026-09-26

### Fixed
- Home page section heads (reported with four screenshots: III The people, IV The land, V The word, VI Four paths). `.abr-section-head` was centred and its `.abr-sub` introduction a 680-pixel block with `margin-inline: auto`, while headings are start-aligned site-wide (2.54.1); the introduction therefore floated right of its heading with a gap on the left, and inherited the body's justified text, which opened wide gaps between words. All section heads, `.is-left` or not, now align label, heading and introduction to one start edge; the introduction is ragged-right with hyphenation off; any button row in a head starts at the same edge. Measured on every home page section at 1440 and 390 pixels: label, heading and introduction share the same left position in all ten sections that have a head.

## [2.73.0] - 2026-09-26

### Added
- The "Reddit" search technique described by David Quaid (transcript supplied by the site owner), applied sparingly as asked: people and AI assistants add "Reddit" to searches to find plain discussion, and a page can rank for such searches when the phrase is in its title and address. Two pieces only, on the two subjects where the site owner's keyword exports show "Reddit" searches ("islamic dilemma reddit", 40 a month; "judaism vs christianity reddit" and its variants, about 60, a figure the speaker notes such tools undercount):
  - `post:islamic-dilemma-reddit`, "The Islamic Dilemma: answers for Reddit readers" (Scripture, Theology; 9 notes): short answers to the questions searched for (what it is, is it true, Surah 5:46, 5:47, 10:94, has the Qur'an been changed, with the Birmingham manuscript's radiocarbon date from the University of Birmingham, 22 July 2015; has the Bible been changed), linking to the full article, the reference page and The Muslim Apologist.
  - `post:judaism-vs-christianity-reddit`, "Judaism vs Christianity: answers for Reddit readers" (Religion, History; 5 notes): same religion?, the main difference, the Bible each reads, Christians and Jewish law, how each sees the other.
- Honesty rule: Reddit itself cannot be reached from the build environment (its site and API refused the connection), so neither piece claims to summarise what Reddit users say. The titles address the reader ("answers for Reddit readers"), and each opens by saying who the page is for; the questions come from real search data. Pexels photographs, credited. Seed version 83.

## [2.72.1] - 2026-09-26

### Changed
- `post:the-islamic-dilemma` (further reading) and `page:islamic-dilemma` (further reading list) link to "The Islamic Dilemma, refuted" at The Muslim Apologist (https://themuslimapologist.online/articles/the-islamic-dilemma/), with the site owner's explicit permission. This is a considered exception to the anonymity rule for this one outbound link; nothing else on the site names or links the owner. Seed version 81.

## [2.72.0] - 2026-09-26

### Added
- From the site owner's keyword exports for "Islamic Dilemma" (US all-keywords and broad-match, 2 August 2026) and islamicdilemma.com's organic positions in the US, UK and Canada (31 July 2026). The competitor ranks first to third for "islamic dilemma" (1,600 to 1,900 US searches a month), "the islamic dilemma", "islam dilemma", "what is the islamic dilemma", "islamic dilemma verses", "the islamic dilemma explained" and "quranic dilemma", with its home page and a PDF tract. "Surah 5:46" alone draws 320 searches a month. Two pieces divide the searches so they do not compete: a reference page for the definitional searches, and a Journal article for the argument and its answer.
  - `page:islamic-dilemma`, "What is the Islamic Dilemma?", child of Comparative studies (/reference/comparisons/islamic-dilemma/): the argument in two horns, the verses it relies on with their text (3:3-4, 5:46, 5:47, 5:68, 10:94; a heading "The verses" anchored as `the-islamic-dilemma-verses`), the Muslim reply in three points, and further reading. 4 notes.
  - `post:the-islamic-dilemma`, "The Islamic Dilemma: the argument and the answer" (Scripture, Theology; 17 notes). It sets out the argument at its strongest (islamicdilemma.com, Hold Fast Apologetics, Ad Lucem, Apologia Daily), then tests its premises: *muṣaddiq* and *muhaymin* in 5:48, with Ibn ʿAbbās (Bukhārī, Virtues of the Qur'an, ch. 1) and al-Ṭabarī via Ibn Kathīr; the one Injīl given to Jesus against the four Gospels (Luke 1:1-4); the Qur'an's own references to alteration (2:79, 3:78, 5:13); 5:47 with 7:157; the exegesis of 10:94 (Blyth's note at Quranenc, citing al-Ṭabarī, Ibn ʿAṭiyyah, Ibn Kathīr and others); and the later additions in the seventh-century Bible (Mark 16:9-20, per Logos; John 7:53-8:11, NIV note). It closes on Qur'an 5:48 as the verse that answers the dilemma. No work by the site owner is cited, per the anonymity rule.
  - FAQ: "What is the Islamic Dilemma?", linking both (26 questions in the FAQPage structured data).
  - Photographs: an open Qur'an on a stand (featured), an open Bible, a page of the Qur'an (Pexels), and a page of the 1879-1883 facsimile of Codex Alexandrinus (CC0, Commons); credited on the Copyright and DMCA page. Seed version 80.

### Fixed
- Twenty opening quotation marks in the articles added in 2.71.0 and 2.72.0 were written as closing marks (’) where they should have been opening marks (‘). All corrected.

## [2.71.0] - 2026-09-26

### Added
Seven Journal articles on subjects with search demand in the site owner's keyword export and no existing coverage (38 articles now). Every source was checked live; Qur'an wording from Quran.com (Saheeh International); each article that cites a verse sets it in the verse block and closes by connecting its narrative to it. 22 new photographs (18 Pexels, 4 Commons), all credited on the Copyright and DMCA page; the photograph audit finds no repeats across the Journal.
- `post:what-language-did-abraham-speak` (History, Scripture; 9 notes). Genesis 11:31, 12:4-5; the Amarna letters in Akkadian (Biblical Archaeology Society; *Britannica*); the Aramean kin (Genesis 22, 25, 31:47; Deuteronomy 26:5; *Jewish Encyclopedia*); Isaiah 19:18; Jubilees 12:25-27; Ibn Ḥazm on Syriac, Hebrew and Arabic; Bukhārī 3364 (Ishmael learnt Arabic from Jurhum). Verse: Qur'an 14:4, with 12:2.
- `post:the-parting-of-the-ways` (History, Religion; 9 notes). Acts 2, 11, 15; Galatians 2; Eusebius on Pella (HE 3.5.3); Marcus on the *birkat ha-minim*; Justin Martyr on Bar Kokhba (1 Apology 31.6); Nicaea; the 2025 roundtable on "the ways that never parted". Verse: Qur'an 2:213.
- `post:where-was-abraham-from` (History, Archaeology; 8 notes). Genesis and Acts 7; Rawlinson and Woolley at Tell el-Muqayyar; Pseudo-Eupolemus via Eusebius (Preparation for the Gospel 9.17); the northern theory; Urfa and Balıklıgöl (Madain Project; Turkish Museums, which calls the tradition unproven). Verse: Qur'an 21:68-69.
- `post:the-symbols-of-the-four-traditions` (Culture, History; 6 notes). The Star of David (*Britannica*); the Mandaean drabsha (Drower 1937, pp. 108-109, with Drower's own plate of its consecration); the cross (*Britannica*; Christianity Today on Clement's list); the crescent (*Britannica*; IslamOnline on the plain flags of the first Muslims). No verse cited.
- `post:religious-law-in-the-abrahamic-traditions` (Religion, Theology; 7 notes). Makkot 23b and Maimonides on the 613 commandments; Acts 15; canon law (*Britannica*: Gratian, the codes of 1917 and 1983); al-Shāfiʿī's four sources; Mandaean purity (Drower pp. 47-48, 174). Verse: Qur'an 5:48.
- `post:food-and-faith` (Culture, Religion; 7 notes). Leviticus 11, Exodus 23:19, Deuteronomy 14:21; Mark 7:18-19, Acts 10 and 15; Qur'an 2:173, 6:146, 7:157; Mandaean food rules (Drower pp. 47-48). Verse: Qur'an 5:5.
- `post:war-and-peace-in-the-abrahamic-traditions` (Religion, History; 10 notes), written at the site owner's request despite its framing. The *Encyclopedia of Wars* index (121 of 1,763) with Andrew Holt's correction of the popular "123" figure; Martel's *Encyclopedia of War* (about 6%); Cavanaugh; Deuteronomy 20, Isaiah 2:4, Mishnah Sanhedrin 4:5; Matthew 5 and 26; Qur'an 22:39, 2:190, 8:61, 2:256; Abū Bakr's ten commands (*Muwaṭṭaʾ* 21.10); Mandaean teaching that all bloodshed is sin (Drower p. 48). Verse: Qur'an 5:32, joined to the Mishnah's parallel.
- Cross-links added from "Who was Abraham?", "Paul and Peter", "Apostasy", "The Abrahamic family tree" and "The Amman Message". Seed version 78.

## [2.70.0] - 2026-09-26

### Added
- Keyword coverage, from the site owner's keyword export (US, 26 September 2026; 10,003 keywords, 171,040 monthly searches). Keywords were grouped by term and checked against every page, article and front-page section. Before this release the largest gaps were world religion statistics (largest, biggest, percentage, breakdown, chart), "Abrahamism", the pairwise comparisons (Judaism and Christianity, Judaism and Islam), "is Islam an Abrahamic religion", "which came first", the major religions of the world, and religions of the Middle East. Keywords about sects were excluded, per the site owner's standing instruction.
  - `page:faq`: twelve new answers, each an H2 and so included in the FAQPage structured data (now 25 questions): What are the three Abrahamic religions?; What is Abrahamism?; Is Islam an Abrahamic religion? (Qur'an 3:67, 16:123, 2:127); Which Abrahamic religion came first? (with Islam's own answer, 3:19); Which is the largest Abrahamic religion?; What percentage of the world follows an Abrahamic religion?; What are the major religions of the world?; Where did the Abrahamic religions originate?; What do Judaism, Christianity and Islam have in common?; What are the main differences between them?; What is the difference between Judaism and Christianity?; How are Judaism and Islam similar?; Are Jews Muslims? (5:44). Qur'an wording checked on Quran.com; population figures from Pew Research Center, 9 and 10 June 2025.
  - `post:the-population-of-the-abrahamic-religions`: new section "The latest count: 2020" (Christians 2.3 billion, 28.8%; Muslims 2.0 billion, 25.6%, up 347 million, the fastest-growing group; Jews 14.8 million, 0.2%; together 54.6%; sub-Saharan Africa now home to 30.7% of Christians), with notes renumbered (18 in all) and a new chart.
  - `[abr_diagram name="world-religions"]`: a bar chart of the seven Pew groups in 2020 with the Abrahamic groups in gold, drawn in SVG with a text description for screen readers.
  - `page:comparisons`: new section "The traditions in pairs" (Judaism and Christianity, Judaism and Islam, Christianity and Islam, Mandaeism and the other three).
  - `page:glossary`: "Abrahamism"; the Abrahamic religions entry now lists the four in the site's order.
- Phrases searched for but missing from the site now appear where they belong: "Abrahamic faiths" and "the three great monotheistic religions" in the FAQ's first answer and the front-page introduction, and "the Abrahamic God" in the FAQ answer on whether the traditions worship the same God. FAQ description revised. Seed version 76.

### Coverage
- Measured after the changes: every content word of keywords carrying 89% of the search volume now appears on the site. The remainder is misspellings of "Abrahamic", searches in Spanish, German and Portuguese, year-stamped queries ("2024", "2021") for figures no newer than Pew's 2020 count, and "African religions", which concerns the traditional religions of Africa rather than the Abrahamic ones.

## [2.69.0] - 2026-09-26

### Added
- Home page chapter banners, `[abr_parallax image numeral title line]`, placed in `templates/front-page.html` before the seven main sections (II The root, III The people, IV The land, V The word, VI Four paths, VII Through the ages, VIII Meeting and parting), each with one line of text. Seven new Pexels photographs in `assets/images/banners/`, each as a 1920 by 1080 AVIF and a 960 by 720 AVIF for phones (`srcset`), 530 KB for all fourteen, lazy-loaded with empty alt text since they are decorative; credited on the Copyright and DMCA page. Option `home_parallax` (on by default) on the Navigation tab, now headed "Home page journey" with the section bar.
- `assets/js/parallax.js`, home page only, deferred. The photograph is 136% of its frame's height and moves by transform only (`translate3d`), at 0.24 of the scroll speed (0.14 below 768 pixels). An IntersectionObserver keeps only banners on or near the screen active; scroll and resize listeners are passive; one requestAnimationFrame per frame at most. No movement under `prefers-reduced-motion` (checked live, including a change while the page is open) or with data saving on; the CSS then shows the photograph still, at its natural size.
- Banner styles in `theme.css`: navy fallback, darkening gradient for legible text, gold chapter numeral and rule, centred title and italic line, `contain: paint` and `isolation` so the effect cannot affect the layout around it.

### Tested
- 1440 pixels: the photograph moves as the page scrolls (for example from -21.5 to 74.5 pixels over 400 pixels of scrolling); 60 scrolled frames averaged 16.6 ms, the display's own frame rate. Reduced motion: no transform applied. 390 pixels: the 960-pixel file is used, no horizontal overflow. Banners appear on the home page only. No PHP notices.

## [2.68.1] - 2026-09-26

### Changed
- Journal, topic, tag and date listings show `ABR_LISTING_PER_PAGE` (12) articles a page through `abr_listing_page_size()` on `pre_get_posts`. The listings inherit WordPress's "Blog pages show at most" setting, 10 by default, which in a three-column grid left one card alone on each page's last row with two empty slots beside it (reported with a screenshot). Twelve fills three columns and the two-column tablet layout exactly; only the final page of a listing can end short. Search keeps its own twelve.

## [2.68.0] - 2026-09-26

### Added
- Home page section bar: `[abr_home_subnav]` placed in `templates/front-page.html` directly after the header part, so it appears on the home page only. Options on the Navigation tab: `home_subnav` (on by default) and `home_subnav_items` (Label | #anchor lines; `abr_sanitize_link()` now keeps `#fragment` targets). Default links in reading order: Shared Heritage, Figures, Geography, Sacred Scriptures, The Traditions, Timeline, Comparative View (#heritage, #figures, #places, #texts, #religions, #timeline, #comparison). Sticky beneath the header, translucent ivory with blur, gold underline on hover and on the current section. Scrolls sideways without a scrollbar on narrow screens, the current link kept centred. Smooth scrolling uses the existing `scroll-behavior: smooth` on `html` (off under reduced motion); `scroll-padding-top` grows by the bar's height when the bar is present, so section headings land clear of both bars.
- `assets/js/subnav.js`, loaded on the home page only, deferred: an IntersectionObserver sets `aria-current` on the link of the section crossing a line a third of the way down the screen, and a sentinel adds a shadow once the bar is stuck.
- `[abr_back_to_top]`: a small right-aligned "Back to top ↑" link (`href="#top"`, which browsers treat as the top of the page) at the end of the seven sections; muted, gold on hover, lighter on dark sections.

### Fixed
- The header never stayed fixed. `.abr-header` was sticky inside the header template part's own wrapper, which is exactly as tall as the header, so it had no room to stick and scrolled away at every width. The wrapper (`.wp-site-blocks > header.wp-block-template-part`) now carries `position: sticky` (offset for the admin bar), and "Keep the header fixed" off makes it static and sets the section bar's offset to zero. The phone menu still opens as a full-screen panel.

### Tested
- 1440 and 390 pixels: bar directly under the header at load and stuck under it while scrolling; clicking Geography scrolls smoothly to the Places section and marks Geography current; Back to top returns to the top; the bar appears on the home page only; no horizontal overflow. No PHP notices.

## [2.67.0] - 2026-09-26

### Changed
- Front page arranged as a story, at the site owner's request. `templates/front-page.html` now runs: hero; I The question (intro); II The root (shared heritage); III The people (figures); IV The land (places); V The word (sacred texts); VI Four paths (the religions); VII Through the ages (timeline); VIII Meeting and parting (comparison); IX The journey continues (Journal); X Paths to explore (topics); XI For the road (reference); XII Questions along the way (FAQ); XIII Behind the journey (about); newsletter. The arc: the question, then the shared root and its people, where they lived, the scriptures that record them, the four traditions that grew from them, their history to the present, and how they meet and differ, before the reader goes on through the Journal and the reference tools.
- Each section's small label (`.abr-label`) is now its chapter number and name. Section backgrounds follow the new order, alternating white and ivory, with the shared heritage, reference and newsletter sections dark.

### Tested
- Full front page rendered at 1440 pixels: 13 chapters in order, backgrounds alternate, no adjacent sections share a background. No PHP notices.

## [2.66.0] - 2026-09-26

### Fixed
- Missing featured images on the five newest Journal articles on the live site (Ḥirāʾ and Qubāʾ, the Hajj, Hagia Sophia, the five great sees, Nicaea). Checked against the live server: the articles existed, their photograph files were present, and none had a featured image. Cause: the starter-content check had run while a theme upload was still unpacking, so the photograph files were missing at that moment. The check recorded the failures, then marked its version complete, and so it never tried again. `abr_run_seeder()` now records the version only when every featured image succeeds; otherwise it sets `abr_seed_retry` for five minutes and runs again afterwards, on the front end or in the admin, until the images are all in place. It also stops at once when the content file is missing, before the retirement step, which would otherwise treat every seeded post as withdrawn. Reproduced locally: with one photograph file hidden, the version stayed behind and the retry was set; once the file returned, the next run gave all five articles their images. Seed version 73 makes the live site run the check again.
- Shared-heritage watermark (`assets/images/symbols.png`): it showed only the cross, crescent and Star of David, in that order. The new artwork (791 by 280) carries four symbols in the site's order: the Star of David, the Mandaean darfash (from the theme's existing `darfash.svg`, lines thickened to match the other silhouettes), the cross and the crescent. The watermark is repositioned so that all four stay in view.
- Tradition order (Judaism, Mandaeism, Christianity, Islam) corrected in the hero lead, the shared-heritage introduction, the John the Baptist article and the apostasy article's description.

## [2.65.0] - 2026-09-26

### Changed
- `page:places` rewritten (from about 450 words to 1,330, notes 1 to 23), after the site owner found the Madinah section two sentences long with no photograph. Bethlehem (23 words), Nazareth (19) and Madinah (32) had no photographs at all. Each of the ten sections now has a fuller account, a photograph of its own and footnotes: Jerusalem; Hebron (Genesis 23; UNESCO 1565); Bethlehem (UNESCO 1433; Qur'an 19:22-26); Nazareth (Luke 1; Qur'an 3:45-47, 19:16-21; the Basilica of the Annunciation, 1969); Mount Sinai (Exodus 19-20; Qur'an 95:2, 20:11-14; UNESCO 954); the Jordan River (Joshua 3, Matthew 3; UNESCO 1446 for Bethany beyond the Jordan; Segelberg on *yardna*); Makkah (Qur'an 3:96, 2:127, 2:144); Madinah (Qur'an 33:13, 9:40; *Britannica*); and two new sections, Vatican City (UNESCO 286) and Ahvaz and the Karun (Drower 1937, pp. 1-2; *Encyclopaedia Iranica* on the Mandaean community in Iran). Qur'an wording checked against Quran.com.
- Photographs: to avoid repeating the front-page cards, eight new photographs, six from Pexels (Bethlehem, Nazareth, Sinai, Makkah, Madinah, Vatican) and two from Commons (the Jordan baptism site, Ahvaz at night), all credited on the Copyright and DMCA page. Jerusalem and Hebron keep their existing photographs, which differ from the front page.
- Front-page Vatican City and Ahvaz cards now link to their new Places sections.
- Notes lists use two columns only when they hold four or more notes (`:has()`), so a short list no longer sits in a narrow half-width column.

## [2.64.0] - 2026-09-26

### Added
- `inc/maintenance.php`, from the site owner's server logs for September 2026. The PHP error log held 40 fatal errors: 26 on 16 September from a WordPress core update in progress (the Requests library half-replaced), and the rest on 20 to 26 September from theme uploads caught mid-unpack (`inc/seed/content.php` missing; `abr_icon()` and `abr_logo_mark()` undefined because patterns loaded before the files that define them). Visitors met WordPress's generic error screen or a blank page each time. Now:
  - `abr_maintenance_document()` builds one self-contained notice ("Back shortly": the site is temporarily offline for maintenance while it is being updated), with inline styles, light and dark by the visitor's system setting, the AR mark in text, and no dependency on any theme file, font or WordPress function. It is served with HTTP 503, `Retry-After: 300` and `no-store`, so search engines treat the outage as temporary and keep the pages indexed. It names no person.
  - Three WordPress drop-ins written to `wp-content` on the first admin page load after each theme update and on theme activation: `maintenance.php` (core, plugin and theme updates), `php-error.php` (any fatal error, replacing "There has been a critical error on this website"), and `db-error.php` (database unreachable). They sit outside the theme, so they keep working while the theme is replaced or after it is deleted. A marker line identifies the theme's own drop-ins; a drop-in the theme did not write is never overwritten. The result is stored in `abr_dropins`.
  - `functions.php` now lists every file it loads and checks them all before loading any (`abr_maintenance_guard()`): if one is missing, visitors get the notice, while the admin screens, login and WP-CLI carry on so the update can finish. `abr_seed_data()` seeds nothing instead of failing when `inc/seed/content.php` is briefly absent.

### Tested
- Local site: drop-ins written (3 of 3). A missing `inc/diagrams.php` gave the notice with 503 and Retry-After 300, and the site returned to 200 once the file was back. A forced fatal error gave the notice, and the generic critical-error text was absent. A `.maintenance` file (an update in progress) gave the notice. Checked in light and dark.

## [2.63.4] - 2026-09-26

### Changed
- Footer secondary navigation: "About this site" and "Contact us" become "About AR" and "Contact AR", at the site owner's request (shown in capitals). New `nav_utility` default; `abr_migrate_footer_ar_labels()` renames those two exact lines once in a stored list (flag `abr_footer_ar_labels`). The pages keep their titles, About this site and Contact us. Tested on a stored list.

## [2.63.3] - 2026-09-26

### Changed
- Footer secondary navigation bar (`.abr-footer-links`): labels in capitals, at the site owner's request, with 0.08em letter-spacing at 0.8rem so the six fit on one line on desktop. Done in CSS, so the stored labels keep their ordinary case for screen readers and settings. Checked at 1440 and 390 pixels.

## [2.63.2] - 2026-09-26

### Added
- Menu lines accept an optional third part, the full name of a shortened label: `KB | https://knowislam.wiki/ | Knowledge Base`. `abr_parse_menu()` reads it as `hint`, `abr_sanitize_menu()` keeps it on saving, and `abr_menu_block()` renders the label as `<abbr class="abr-nav-abbr" title="…">` (the tooltip on hover) followed by the full name in screen-reader text, so assistive technology announces "Knowledge Base". The link's own title reads "Knowledge Base (opens knowislam.wiki)" for external links. Documented in the Main menu help text.

### Changed
- Main menu: "Knowledge base" becomes "KB" with the tooltip "Knowledge Base", at the site owner's request. New default; the 2.62.0 one-time addition uses the new form; `abr_migrate_nav_kb_label()` rewrites the exact stored line once (flag `abr_nav_kb_label`). Tested on a stored menu: rewritten once, preserved by the sanitiser, tooltip "Knowledge Base" confirmed in the browser.

## [2.63.1] - 2026-09-26

### Changed
- Main menu: the label "Editorial policy" becomes "Editorial", at the site owner's request. New default in `inc/options.php`; the 2.62.0 one-time addition now uses the short label; `abr_migrate_nav_editorial_label()` renames the exact line `Editorial policy | @editorial-policy` once in a stored menu (flag `abr_nav_editorial_label`), leaving any other label alone. The page title stays "Editorial policy". Tested on a stored menu: renamed once, rest of the menu unchanged.

## [2.63.0] - 2026-09-26

### Changed
- Site pages, all created by the starter content on activation and refreshed on existing sites where unedited (seed version 70):
  - `page:about`, now titled "About this site" (460 words): new sections on how the content is made (sources, verified citations, licensed photographs, no depictions of prophets) and on independence (no affiliation, no advertising, reader-funded). No person is named, per the anonymity rule. Fixed an error: "the first three are the largest" counted Mandaeism, second in the list, among the largest traditions.
  - `page:editorial-policy` (340 words): new sections on sources and citations and on images; editorial responsibility now states that no religious body, sponsor or advertiser has a say.
  - `page:terms`, now titled "Terms of use" (369 words, was 128): quoting rules, material belonging to others (translations, licensed photographs), acceptable use, liability, and where to send copyright notices.
  - `page:privacy-policy` (375 words): now matches what the theme does. It states that nothing is collected to read the site; that the reading mode is kept in the reader's own browser storage and never sent; and that fonts and photographs come from the site's own server. The comments paragraph is removed, since the site takes no comments.
  - `page:contact`, now titled "Contact us": what to include when reporting an error, and where copyright notices go.
- Titles now match the footer links (About this site, Terms of use, Contact us); descriptions updated to match, all within 130 characters.

## [2.62.0] - 2026-09-26

### Changed
- Main menu: Editorial policy (`@editorial-policy`) and Knowledge base (https://knowislam.wiki/, marked external) added as the fourth and fifth top-level links, filling `ABR_PRIMARY_NAV_MAX` (5). Both left the footer row in 2.61.1. New default in `inc/options.php`; `abr_migrate_nav_editorial_kb()` appends them once to a stored main menu when it has room and does not already link them (flag `abr_nav_editorial_kb_added`), so the live site gets them without losing its own menu.

### Tested
- One-time update checked on a stored three-item menu (both links appended, run once). Header checked at 1440, 1280 and 1024 pixels: no wrapping or overflow. No PHP notices.

## [2.61.1] - 2026-09-26

### Changed
- The secondary navigation bar belongs in the footer; 2.61.0 misplaced it above the header. `[abr_topbar]`, its place in `parts/header.html` and its styles are removed. The footer's bottom row (`[abr_secondary_nav]`) now renders `nav_utility`, the six site pages (About this site, Terms of use, Privacy policy, DMCA, Contact us, Sitemap), in the existing footer link style. The Navigation tab has a single "Footer links" field for it. The earlier `nav_secondary` list (which also carried Editorial policy, Donate and Knowledge base) is kept in stored options but no longer shown.

### Tested
- Footer row renders the six links on every page; no top bar in the header; no overflow at 390 pixels. No PHP notices.

## [2.61.0] - 2026-09-26

### Added
- Top bar: new `nav_utility` option (Navigation tab, "Top bar links"), rendered by `[abr_topbar]` at the top of `parts/header.html`. Default: About this site, Terms of use, Privacy policy, DMCA, Contact us, Sitemap. Right-aligned in small capitals on wide screens; scrolls sideways without a scrollbar below 1024 pixels. The footer's bottom row keeps its own list (`nav_secondary`, now labelled "Footer bottom-row links"; its old help text wrongly described a bar above the header).
- `inc/anonymity.php`, at the site owner's standing instruction that no person be publicly associated with the site. Tested on the local site: `/wp-json/wp/v2/users` answers 404 to anyone who cannot list users (it exposed the account name and a Gravatar hash of the account's email address, checked against the live site); author archives and `?author=` redirect 301 to the Journal; author links point home; the author name in feeds and on the page is the site name; oEmbed responses name the site; the users sitemap answers 404.
- `.htaccess` in the theme root denies `readme.txt` and every `.md` file; `docs/.htaccess` denies the folder. Both were readable at their theme URLs.

### Changed
- `inc/seo.php`: Article schema always names the site's Organization as author. The Person branch, which named the WordPress user whenever the profile had a biography, is removed.
- Theme header (`style.css`) Author and Author URI, `readme.txt` Contributors and copyright lines, and all documentation now name Abrahamic Religions and https://abrahamic-religions.com; earlier references to the owner and the owner's personal pages are replaced throughout, the changelog included.
- `header_donate_url` defaults to `@donate` and `donation_url` to empty, replacing a default personal payment page. Stored values are untouched; the help text now warns that a personal payment page shows the account holder's name to donors.

## [2.60.0] - 2026-09-26

### Added
- Journal: `post:hira-and-quba` (History, Scripture; 10 notes), the second gap from the holy-sites inventory. Sources verified live on Sunnah.com: Bukhārī 3 and 4953 (the first revelation in the cave), Bukhārī 1193 and Muslim 1399g (the Saturday visits to Qubāʾ), Ibn Mājah 1412 with Tirmidhī 324 (the reward of an ʿumrah), Muslim 1398a and Nasāʾī 698 with commentary (which mosque 9:108 means, and how scholars reconcile the two readings); for the building, the Madain Project, Macca and Aryanti (IOP, 2017) and Mohammad al-Asad on El-Wakil's mosques (the 1986 rebuilding, 13,730 square metres). Two verse blocks, Qur'an 96:1-5 and 9:108 (Arabic from Quran.com, Saheeh International), and a closing section that joins them: the command to recite given in solitude, and the house founded on piety for those who love to purify themselves, which is the same purification the Prophet's promise for Qubāʾ requires.
- Photographs from Commons and, for the first time, Flickr: Jabal al-Nūr (`jabal-al-nour-peak`, Richard Mortel), the cave entrance (saudipics), the mosque at night (Diego Delso) and by day (Adhi Rachdian, CC BY 2.0, found on Flickr through the Openverse catalogue). All credited on the Copyright and DMCA page. Seed version 69.

### Fixed
- The new Jabal al-Nūr photograph was first saved under the existing name `jabal-al-nour`, overwriting the photograph used in "The path of Abraham in the Qur'an". The original was restored from the 2.59.0 package and the new one renamed `jabal-al-nour-peak`; the photograph audit confirms no duplicates and no missing files across 31 articles.

## [2.59.0] - 2026-09-26

### Added
- Journal: `post:the-stations-of-the-hajj` (Religion, Scripture; 9 notes), the first of the gaps identified in the holy-sites inventory. Sources verified live: the GASTAT 2026 release (1,707,301 pilgrims; 1,546,655 from abroad by air, road and sea), *Britannica* "Hajj" (the fifth pillar, the rites, Jabal al-Raḥmah, the stoning as rejection of the Devil, the sacrifice for Abraham, the farewell ṭawāf), *Saudipedia* (the day-by-day order from Tarwiyah to the Days of Tashrīq), Ṣaḥīḥ al-Bukhārī 3364 (Hagar between Ṣafā and Marwah as the origin of the saʿy) and Sunan Abī Dāwūd 1949 with Tirmidhī 2975 (the Hajj is ʿArafah), both on Sunnah.com, and Qur'an 2:158, 2:198 and 37:107. Qur'an 22:26-27 is set as the verse block (Arabic from Quran.com, Saheeh International), and the article is built around it: the 2026 arrivals by air, road and sea are read against the verse's promise that pilgrims would come from every distant pass, and the closing section ties each rite back to Abraham's family and the call. Arabic terms given with transliteration and translation on first use (iḥrām, ṭawāf, saʿy, wuqūf, al-Mashʿar al-Ḥarām, ramy). Photographs: the ʿArafāt boundary (featured), the tents of Minā, the night at Muzdalifah, and an Ottoman İznik tile of the camp at ʿArafāt in the Topkapı Palace; all credited on the Copyright and DMCA page. Linked from "Who was Abraham?" and "The path of Abraham in the Qur'an". Seed version 67.

## [2.58.0] - 2026-09-26

### Added
- Journal: `post:hagia-sophia` (History, Culture; 14 notes). Sources verified live: the American Society of Civil Engineers landmark page (the three churches of 360, 415 and 537, the architects, the dome's collapse in 558 and rebuilding in 562), Procopius *Buildings* 1.1.46 (the dome hanging from heaven on a golden chain), *Britannica* on Leo IX (Humbert's bull, 16 July 1054) with *Christian History Magazine* on why 1054 no longer counts as the start of the schism, Niketas Choniates via the Internet Medieval Sourcebook and the Orthodox Church in America (the sack of 1204, the altar broken up among the soldiers, the Latin patriarch until 1261), *Vatican News* (1453, 1934, the Council of State ruling and prayers from 24 July 2020, Patriarch Bartholomew's protest), *TheCollector* (minarets, covered mosaics, buttresses, the sultan's personal ownership that protected the mosaics), the Turkish Ministry of Culture's museum page (the Fossati restoration of 1847-49, Kazasker Mustafa İzzet Efendi's eight roundels, UNESCO 1985), *Skylife* and TheHagiaSophia.com (the verse of Light in the dome), and Smarthistory (1934). The verse, Qur'an 24:35, is set in Arabic from Quran.com's Uthmani text with Mustafa Khattab's translation, and the closing section connects the article's narrative to it, per the standing instruction: the dome Procopius thought hung from heaven now names the source of its light; 24:36 and 72:18 (Saheeh International) on houses raised for God's name and the places of prostration belonging to God. Photographs: the exterior across the Sultanahmet fountain (featured), the Haghe-Fossati lithograph of 1852 and the dome from below, all credited on the Copyright and DMCA page. Linked from the Nicaea and five-sees articles. Seed version 66.

## [2.57.3] - 2026-09-26

### Changed
- `post:the-council-of-nicaea`: two paragraphs added after the Qur'an 19:88-91 passage, at the site owner's instruction that an article citing a verse must connect its narrative to it. They set the verses' imagery (the earth about to split apart, the mountains about to crumble at the claim that God has offspring) beside the city's history, drawing only on facts already sourced in the article: the earthquake of 368 that destroyed the church of the council, the earthquake of 740 that brought down the Church of the Holy Fathers and sank it into the lake, and the conversion of Nicaea's Hagia Sophia into a mosque under Orhan, which serves as one today. The second paragraph keeps the historian's limit explicit: the Qur'an names no city, and the earthquakes are not presented as a verdict; the correspondence is left to the reader. Seed version 65.

## [2.57.2] - 2026-09-26

### Added
- `post:the-council-of-nicaea`: new section "Earthquake, conquest and the lake" (notes 17 to 20), before the Qur'anic answer. The earthquake of 740 that brought down the Church of the Holy Fathers and sank it into the lake (*Türkiye Today*, 29 January 2026; UNESCO Tentative List entry 5900); the eleventh-century earthquake that damaged Hagia Sophia and the destruction of the Koimesis church in 1065; the Seljuk capture of 1081 and the name İznik; the Byzantine recovery of 1097; the Empire of Nicaea, 1204 to 1261; the Ottoman capture of 1331, the Orhan Mosque, the early Ottoman buildings and the İznik tiles; damage in the War of Independence (all UNESCO); and the lake's retreat from 2020 that left the basilica on dry land by 2025 (*Greek Reporter*, 25 November 2025, quoting Şahin). Notes renumbered in reading order (22 in all). Seed version 64.

## [2.57.1] - 2026-09-26

### Changed
- The four church cities added to the front-page places in 2.57.0 (Alexandria, Antioch, Nicaea, Constantinople) are removed; the site owner had asked for them as a Journal piece, and 2.57.0 misread the request. The front page returns to eight places in two rows of four.

### Added
- Journal: `post:the-five-great-sees` (History, Religion; 9 notes): how the pentarchy formed (Nicaea canons 6-7 via Tanner; Constantinople I canon 3 and Chalcedon canon 28 via OrthoChristian; Justinian's Novel 131 and the Council in Trullo via *Britannica*), the two principles behind the order (civic weight against apostolic foundation, *Britannica*), a paragraph on each see (Rome; Constantinople and Hagia Sophia's history from 537 to 2020, *Vatican News*; Alexandria and Mark, Eusebius *Church History* 2.16.1; Arius and Athanasius, *Catholic Encyclopedia*; Antioch, Acts 11:26 and Galatians 2:11-14; Jerusalem and canon 7), and the seventh-century change. Notes that Nicaea was the place of the ranking and never one of the five. Photographs: Hagia Sophia in Istanbul (featured), Alexandria and Antioch, all three now used only here. Linked from the Nicaea article. Seed version 63.

## [2.57.0] - 2026-09-26

### Added
- Journal: `post:the-council-of-nicaea` (History, Archaeology, Theology; 18 notes). The Türkiye Today report supplied by the site owner, corroborated and expanded from HeritageDaily, Fox News Digital and Greek Reporter (the 2026 finds, the 2014 aerial discovery, the Italian partners), Eusebius's *Life of Constantine* 3.6 and 3.10 (the choice of Nicaea; the palace-hall session, set against Şahin's reading of Eusebius), the 1911 *Catholic Encyclopedia* (Arius, the Alexandrian synod, church and palace), Tanner's *Decrees of the Ecumenical Councils* via Papal Encyclicals Online (opening date, bishop counts, the creed with *homoousios*, the anathemas, canons 6 and 7, the synodal letter, Easter), OrthoChristian (Constantinople I canon 3, Chalcedon canon 28) and *Britannica* (Justinian's Novel 131, the Council in Trullo, the seventh-century change). The Qur'an passage 19:88-91 is set as supplied, Arabic with Mustafa Khattab's translation (verified against Quran.com), followed by 4:171 and 112:1-4. The article states that Nicaea was the city where the ranking of the five sees began and never one of them, since the fifth see of the pentarchy is Jerusalem. Photographs: the shore of Lake İznik (featured), the Lefke Gate, and Hagia Sophia in İznik. Linked from "Jesus across the traditions". Seed version 62.
- Front-page places: Alexandria, Antioch, Nicaea and Constantinople, making twelve places in three rows of four and, with Rome and Jerusalem already there, all five pentarchy sees plus Nicaea. Four new photographs; all seven new photographs credited on the Copyright and DMCA page.
- `assets/fonts/amiri-quran-arabic.woff2` (Amiri Quran, Arabic subset, SIL OFL 1.1) and a `.abr-verse` block style: Arabic verse lines right-aligned in Amiri Quran, each followed by its translation. The test browser's fallback Arabic font dropped the small high rounded zero in *daʿaw* (19:91), leaving a gap; the bundled face renders the Uthmani marks correctly.

### Tested
- Article: 18 notes linked both ways; four verse lines; no overflow at 390 pixels. Front page: twelve cards, no broken images. Journal photographs: no duplicates across 27 articles. No PHP notices.

## [2.56.3] - 2026-09-26

### Changed
- Front-page Hebron card: `place-hebron` (the green-draped cenotaph inside the shrine) was also in use on the Places page and as the featured image of "Interfaith dialogue in the modern era", and looked out of place on the front page. The card now uses a new photograph, `place-hebron-exterior.avif` (the Herodian enclosure and its two minarets, CC BY-SA 4.0, Djampa), credited on the Copyright and DMCA page. `place-hebron` stays in the theme and in its other two uses. Seed version 61.

## [2.56.2] - 2026-09-26

### Changed
- `patterns/places.php`: Vatican City card added before Ahvaz (seat of the Pope, centre of the Catholic Church, St Peter's Basilica over the traditional tomb of Peter), linking to the Christianity page, so the eight places fill two rows of four. Photograph `place-vatican.avif`, a public-domain view of St Peter's Square from the dome; a close view of the facade was passed over because its statue of Christ at the centre would breach the site's rule against depicting prophets. Credited on the Copyright and DMCA page. Seed version 60.

### Tested
- Eight cards at 1440 (two rows of four), 900 (four rows of two) and 390 pixels (one column); no broken images, no overflow. No PHP notices.

## [2.56.1] - 2026-09-26

### Changed
- `patterns/places.php`: Madinah card added after Makkah (the Hijra of 622, the first Muslim community, the Prophet's Mosque and his grave), linking to the Madinah section of the Places page. New bundled photograph `place-madinah.avif` (CC0), credited on the Copyright and DMCA page.
- Places layout: `.abr-places .abr-grid.abr-grid--places` is now a centred, wrapping flex row (`display: flex !important`, overriding the global `.abr-grid` grid rule): four cards to a row on wide screens, two on tablets, one on phones, with a shorter last row centred at every width. Seed version 59.

### Tested
- Seven cards at 1440, 900 and 390 pixels: last row centred at 1440 and 900, single column at 390, no horizontal overflow. No PHP notices.

## [2.56.0] - 2026-09-26

### Changed
- `patterns/places.php`: the front-page sacred places left the Mandaeans out; the four cards covered Jerusalem, Makkah, Hebron and Mount Sinai only. Two cards added: the Jordan River (linking to its section on the Places page; John the Baptist, Christians and Mandaeans, and the usual derivation of *yardna* from its name, as the Mandaeism and Places pages already state) and Ahvaz and the Karun (linking to the Mandaeism page; a principal Mandaean community that still baptises in the river). The grid shows three columns on wide screens (`.abr-places .abr-grid--4`), two on tablets and one on phones as before. The introduction now reads "Cities, rivers and sites ... across the four Abrahamic traditions". New bundled photograph `place-karun.avif` (800 by 450), credited on the Copyright and DMCA page; seed version 58.

### Tested
- Six cards render with no broken images at 1440 pixels; no horizontal overflow at 390. No PHP notices.

## [2.55.3] - 2026-09-26

### Fixed
- Blank front page on the live site after the 2.55.2 update (reported with a screenshot). Diagnosed against the live server: the front page's `<main>` held the fifteen pattern placeholders of `templates/front-page.html` and nothing else, while the pattern files were present and every other page rendered. WordPress caches each theme's pattern list for 30 minutes in the site transient `wp_theme_files_patterns-<hash>`, keyed to the theme version; a request that arrives while an update is still unpacking can see the new `style.css` before the `patterns/` folder and cache an empty list under the new version. Reproduced on the test site (WordPress 7.1.2, matching live) by writing an empty list into that transient: the front page rendered 0 words, exactly as live. New `abr_pattern_cache_guard()` in `functions.php` (init, priority 0) compares the cached list with the files in `patterns/` and calls `WP_Theme::delete_pattern_cache()` when the cache holds fewer; the cache is also cleared on `upgrader_process_complete` for theme updates and on `after_switch_theme`. With the guard, the same poisoned cache recovered on the first request (1,882 words).

## [2.55.2] - 2026-09-26

### Changed
- Family tree: a dotted violet line (`.is-honour`) now joins the Mandaean node to John the Baptist, routed round the right of the tree and beneath it so that it crosses no other line or box, labelled "honoured by the Mandaeans as their great teacher" and added to the key. The Mandaean box subtitle is now "line of Seth and Shem"; the SVG description, the article paragraph and the caption say what the dotted line means. View box 1040 by 810. Seed version 57.

## [2.55.1] - 2026-09-26

### Changed
- Mandaeism added to both diagrams in `inc/diagrams.php`, at the site owner's request.
  - Family tree: a Mandaean node on a dashed line from Shem ("line of Seth, honour John"), outside Abraham's line, in a violet accent (`.is-mandaean`), with the SVG description updated.
  - Shared beliefs: a fourth set, an ellipse (centre 715, 375; radii 260, 90), placed by a region-by-region geometry search so that it meets only what Mandaeism shares and no other overlap: all four (one God, scripture, a judgement after death, Drower 1937 pp. 73, 95), Mandaeism with Christianity and Islam (John the Baptist), and Mandaeism with Christianity (baptism); Mandaeism alone (repeated baptism in running water, the Ginza Rabba). Abraham and the prophets now sit in the region Judaism, Christianity and Islam share without Mandaeism. Every label was checked to fall in its intended region and inside the drawing. View box widened to 1000.
- Article text rewritten for four traditions; note 7 adds Drower for the Mandaean side; caption updated. Seed version 55.

## [2.55.0] - 2026-09-26

### Added
- Material drawn from the site owner's cPanel backup of the 2016-2023 site (21 August 2023). Only the site database was read; mail, keys and configuration in the archive were left unopened. The old posts and pages (Abraham, Kedar, Millat Ibrahim, Jerusalem, the three religion posts) had already been superseded by fuller Journal articles and reference pages, so no text was carried over. Two things were still useful:
  - **Search demand.** The old Rank Math Search Console table shows what visitors searched for. After "who was Abraham", which the Journal already answers, the leading queries asked for a list, a family tree and a Venn diagram of the Abrahamic religions. New article `post:abrahamic-family-tree` (History, Religion; 10 notes) answers both diagram queries: Genesis 11, 16, 21, 25 and 35, Matthew 1:1, Luke 1:5, the Qur'an (2:127, 133, 136; 19:54; 3:45; 4:157-159, 171; 5:73; 19:19-21; 33:40; 112), Guillaume's translation of Ibn Ishaq (pp. 3-4, Muhammad's descent from Ismail through Adnan and Nabit), and Hines (p. 73) and Drower (pp. 265-266) for the Mandaean line. Three photographs (Abraham's cenotaph in the Ibrahimi Mosque, the approach to the Cave of the Patriarchs, the old Zamzam enclosure), credited on the Copyright and DMCA page. Linked from "Who was Abraham?". Seed version 54.
  - **Old addresses.** The old Rank Math redirects table and the old `/%postname%/` post addresses added 13 entries to `inc/seed/legacy-paths.php`: `/millat/`, `/the-abrahamic-faiths/`, `/abrahamic-faiths/`, `/why-are-these-religions-abrahamic/`, `/why-abrahamic/`, `/the-religion-of-judaism/`, `/the-religion-of-christianity/`, `/the-religion-of-islam/`, `/judaism/`, `/christianity/`, `/islam/`, `/thank-you-for-your-generosity/`, `/information/`.
- `inc/diagrams.php`: `[abr_diagram name="family-tree"]` and `[abr_diagram name="shared-beliefs"]`, SVG with title and description for screen readers, styled by the new "Diagrams" block in `theme.css` from scheme tokens so they follow light and dark mode. Drawn in PHP so content filtering cannot strip them.

### Tested
- Article renders with both diagrams and all 10 notes; no horizontal overflow at 390 pixels; diagrams checked in light and dark. All 13 old addresses answer 301 to the right page. No PHP notices.

## [2.54.2] - 2026-09-26

### Fixed
- Broken featured image on "Who was Abraham?" on the live site. Checked against the live server: `wp-content/uploads/2026/09/ur-ziggurat.webp` answers 200 with a length of zero, so the attachment exists but its file is empty; no smaller sizes were ever generated from it. Every other featured image on the Journal and the front page (74 files) was checked and has content. The 2.54.1 repair tested only whether the attachment record existed, so it would have left this one alone. New `abr_seed_attachment_ok()` requires the file to be on disk with content; `abr_seed_photo_attachment()` no longer reuses a mapped attachment that fails it. In the featured-image step, a broken thumbnail that is the theme's own photograph is deleted and replaced with a fresh upload; a broken image an editor chose is left in place and listed on the Tools tab. Seed version 53.
- `assets/images/.htaccess` adds `AddType image/avif .avif`. The live Apache server sends the theme's AVIF photographs with no Content-Type header; browsers display them by sniffing, but the header is now correct. AVIF files in the media library are outside the theme folder; see the upgrade notes.

### Tested
- Emptied the local "Who was Abraham?" featured-image file: the check deleted the broken attachment, uploaded the ziggurat again (58 KB) and set it as the featured image. No PHP notices.

## [2.54.1] - 2026-09-26

### Fixed
- Missing featured images on the live site (reported for the population, Paul and Peter, and apostasy articles). The featured-image step in `abr_run_seeder()` skipped any article carrying `_abr_seed_photo`, even when its photograph had since been deleted from the media library (WordPress then also drops `_thumbnail_id`), so the article stayed without an image permanently. The step now skips only when the article has a working thumbnail, or when the photograph it was given (recorded in the new `_abr_seed_photo_id`, or found through `abr_seed_photos` for older posts) still exists in the library, which is the case where an editor removed the image on purpose. Otherwise it uploads the photograph again. Upload failures are now caught with their reason (missing file, upload error, attachment error), stored in the seed log as `photo_errors`, and listed on the Tools tab. Seed version 52 makes every site run the check once.
- Headings, including Query Loop card titles, inherited `text-align: justify` from the 2.51.0 `li` rule, since post cards render as list items; a two-line title such as "The population of the Abrahamic religions" spread across the card. `h1` to `h6` and `.wp-block-post-template > li` now keep start alignment and no hyphenation; paragraphs inside cards stay justified.

### Tested
- Deleted the photographs of two articles from the media library and removed a third article's featured image without deleting its photograph: the check restored the first two and left the third alone. Hid a bundled photograph file: the check recorded "the file vilna-talmud.avif is missing from the theme", and restored the image on the next run once the file was back. Journal page: all ten cards show images; card titles compute to start alignment.

## [2.54.0] - 2026-09-26

### Added
- Journal: `post:the-sabians-in-classical-muslim-scholarship` (History, Religion; 20 notes), built from the Project's Hines thesis (AUC, 2023), cited by page, with Drower 1937, pp. 265-269, for the Mandaean legend of Abraham and al-Biruni's report of it. Covers Ibn al-Nadim's two pictures of the Harranians and the al-Ma'mun story (with Hines's own doubt about it), Sa'id al-Andalusi's Sabian origin of the sciences, al-Shahrastani's Sabian and hanif framework and his reading of Abraham's arguments against idols and stars (Qur'an 6:74-79 and parallels), and Hines's case for the classical authors. States that the thesis calls its own claims bold, draws on esoteric writers, and stands against the prevailing academic view. Three photographs (Harran, al-Sufi's fixed stars, a 984 CE astrolabe), credited on the Copyright and DMCA page. Cross-linked with The Sabians of the Qur'an. Seed version 51.

## [2.53.2] - 2026-09-25

### Changed
- The wp-config.php override for the private login address is now `define( 'ABR_HIDE_LOGIN', false );`, replacing `ABR_DISABLE_LOGIN_ADDRESS` from 2.53.0. `abr_login_hide_on()` returns false when the constant is defined and false; undefined or true leaves the decision to the Login tab. Help text on the Login tab, the readme FAQ and the upgrade notes updated.

### Tested
- With the private address on in Theme Options: no constant, `wp-login.php` answers 404; `ABR_HIDE_LOGIN` false, 200; `ABR_HIDE_LOGIN` true, 404.

## [2.53.1] - 2026-09-25

### Changed
- Login screen redesigned after a sample supplied by the site owner. New `login_layout` option (Theme Options > Login > Layout): `centred` (default) and `split` (the 2.53.0 photograph layout, which falls back to centred when no photograph is chosen). The centred layout sets a card on a dark page built from the scheme's navy, with the chosen photograph behind it at about ten per cent strength; a large AR mark (76 pixels) above the wordmark; the Line of text option under the logo, placed ahead of any WordPress message through `login_message`; a four-pixel gold rule across the top of the card; ivory fields; and a full-width gold Log In button with the Remember Me row above it. Links below the card are underlined. Error and notice boxes follow the card's colours, with a red or gold left edge.
- `assets/css/login.css` rewritten around shared tokens (`--abr-page`, `--abr-card`, `--abr-ink`, `--abr-field`) with light and dark values, then per-layout blocks.

### Tested
- Centred layout at 1440 and 390 pixels, in light and dark, and with a failed login showing the error box. No horizontal overflow; no PHP notices.

## [2.53.0] - 2026-09-25

### Added
- `inc/login.php` and `assets/css/login.css`: the login screen in the theme's design (Theme Options > Login). Scheme colours and Sabon, the AR mark with the header's logo text (or a chosen logo, or `wp-content/login-logo.png` following Login Logo 0.10.3 by Mark Jaquith), a bundled photograph with a line of text beside the form (a band above it on phones), and the visitor's light or dark choice through `mode.js`. The logo links to the site; the browser title drops the WordPress suffix.
- Private login address, ported from WPS Hide Login 1.9.18 (WPServeur, NicolasKulka, wpformation), single sites only, off by default. With it on, the login screen answers at the chosen word, `wp-login.php` and `wp-register.php` answer as missing pages, and logged-out requests for `wp-admin` go to the fallback address. Every generated login, logout and lost-password address, and redirects to `wp-login.php`, follow the new address; password-protected posts and personal-data confirmations keep working. The request is read at theme load, which still precedes init and request parsing, so the plugin's interception holds. The three settings are read from the stored option directly at that stage, before translations load. Its settings (`whl_page`, `whl_redirect_admin`) seed the defaults. `ABR_DISABLE_LOGIN_ADDRESS` in wp-config.php switches it off for recovery. Login and fallback addresses must differ from each other and from the search address; reserved WordPress words are refused.
- `inc/unlist.php`: unlisted posts and pages, ported from Unlist Posts & Pages 1.2.1 (Nikhil Chavan), keeping its `unlist_posts` option. A Listing box in the editor sidebar; excluded from front-end queries through `pre_get_posts` (single-post queries, exact-ID lists and filter-suppressed queries such as the seeder excepted; the theme's related-articles and site-map lists opt back in with `abr_hide_unlisted`), `get_pages()` lists, previous and next links, `wp_list_pages`, the XML sitemap; `noindex, nofollow` on the item itself; an "Unlisted" post state and view in the post lists.
- Search addresses in `inc/search.php`, ported from Pretty Search Permalinks 1.3 (Angel Costa): `/?s=term` redirects to `get_search_link()`, with the base word from the Search tab (seeded from `wpseosearch_base`). Rewrite rules rebuild once whenever the base differs from the one they were built with.
- New option types `slug` and `login_photo`; `abr_reserved_slugs()`.
- While any of the four plugins is active, the theme leaves that feature to it and shows a notice on the Plugins and Theme Options screens.

### Fixed
- `assets/images/photos/large/jerusalem-panorama.avif` was a zero-byte file, left by the AVIF batch conversion in 2.45.0 timing out mid-write; the photograph viewer showed nothing for it. Rebuilt from the 2.44.1 WebP. Every AVIF in the package now opens.
- Theme Options tabs wrap instead of scrolling, so Search and Tools no longer sit off-screen.

### Tested
- Login screen at 1280 and 390 pixels, light and dark. Private address on: `/wp-login.php` 404, `/wp-admin/` redirects to `/404/`, the new address serves the form, a trailing-slash-less request redirects, a real login through it reaches the dashboard, and the logout and lost-password links point at it. Unlisting the Cairo Genizah article removed it from the Journal, front page, category archive, feed items, sitemap, search and related articles while its own page stayed at 200 with `noindex`. `/?s=abraham` redirects to `/search/abraham/`. No PHP notices.

## [2.52.2] - 2026-09-25

### Changed
- Anti-AI house-style audit of every page, article and front-page pattern, run by script against the banned vocabulary, banned phrases and contrastive constructions, then judged by hand. Rewrote about 30 contrastive sentences across 12 items, most in the newer Journal articles (Haman, population, Paul and Peter, apostasy, Cairo Genizah, al-Ghazali, preservation, Amman Message, Jesus, Mary), as direct statements. Two headings renamed: "Haman as a title, not a name" is now "Haman as an Egyptian title" (`#haman-as-an-egyptian-title`), and "What a projection is not" is now "The limits of a projection" (`#the-limits-of-a-projection`); neither old anchor had inbound links. Replaced "meticulous", "valuable", "align", "rich" (as puffery), "straightforwardly" and a metaphorical "journey". Removed one surviving meta-reference in the Haman article ("the argument set out above"). Seed version 50.
- Left in place after review: "Testament" and "Night Journey" (proper names), the "not... but" inside the quotation of Qur'an 4:157, and the triads that the sweep flagged in titles of works, creedal titles and lists of prophets, all of which are content.
- Replaced the five em dashes remaining in `docs/changelog.md` and `docs/ssot.md`.

## [2.52.1] - 2026-09-25

### Changed
- Self-reference sweep, run as a crawl of all 53 rendered pages: rewrote "treated here" (About, Mandaeism, Jesus), "elsewhere on this site" (FAQ intro, Mary, Preservation and transmission), "discussed on the Timeline" and "the preservation and transmission article" (Cairo Genizah), "Which religions we treat" and "we leave them aside" (About; anchor now `#the-four-traditions`, no inbound links), "Every article in the Journal" (Topics), "See the article" (Sacred texts), and the About and FAQ first-person sentences. `[abr_citation]` heading "Cite this page" is now "Citation". Seed version 49.
- Left as they are: the institutional "we" of the Contact, Privacy policy, Terms and DMCA pages, which is the standard form for legal notices, and the Editorial policy, which stays unchanged by standing instruction.

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
- Journal: `post:haman-in-the-quran` (Scripture, History; 15 notes), drawing on the project's Islamic Awareness source on Haman. Covers the Orientalist objection (Nöldeke, the Encyclopaedia of Islam), the weak historicity of the Book of Esther itself (Levenson, Fox, Berlin), the minority scholarly proposal that Haman is an Arabized Egyptian title tied to Amun-priesthoods, the candidate Bakenkhons (Kitchen's Ramesside Inscriptions), and a correction the source itself made after review by an Egyptologist (Jürgen Osing) on a since-withdrawn inscriptional identification: kept in for the same reason the site's other corrections are kept in. States plainly that the title theory is a minority position against Silverstein's literary-dependence case. Two new photographs (the Luxor Temple obelisk and pylon; the Hypostyle Hall at Karnak), credited on the Copyright and DMCA page, plus a Persepolis photograph for the Esther context. Cross-linked from The king and the Pharaoh. Seed version 44.
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
- Featured-image attachments are re-created as AVIF on the next seeder run for any post that does not already carry one; a post with an existing WebP thumbnail keeps it until its `_abr_seed_photo` meta is cleared, consistent with the seeder's usual will not-overwrite-an-editor's-choice rule.

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
- An editorial audit for tone checked the site against two standards at once: the appearance of neutrality (the "Independent, academic, even-handed" claim on About and the Editorial policy) and the site's actual editorial aim (advancing Islam through emphasis and selection, never through a misstatement about another tradition: see the September decision on this in this file's earlier entries).
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
- Removed editorial self-reference to the site's own choice to count Mandaeism as a fourth tradition. Five sentences reworded on the Religions index (twice: intro paragraph and Glossary), Comparative studies ("the category itself" and its own Glossary-style aside), the Mandaeism page's FAQ answer, and the front-page intro and FAQ patterns. Each now states the fact plainly ("Judaism, Christianity, Islam and the far smaller Mandaeism") rather than describing it as something the site does. Seed version 35.

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
- Left unchanged: sections such as Jerusalem, Hebron, medieval philosophy and interfaith dialogue that name only three traditions on purpose, since Mandaeism has no part in those histories; and discursive paragraphs (in "God", "Revelation and scripture" and similar sections of Comparative studies) that already treat all four but do not present them as a plain sequence: reordering mid-sentence there risked the sentences themselves, for no reader-facing benefit.

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
- `header_donate_url` and `donation_url` default to the owner's payment page; both remain editable on the Header tab.
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
- Author metadata set to Abrahamic Religions, https://abrahamic-religions.com.
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
