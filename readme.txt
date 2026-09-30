=== Abrahamic ===
Contributors: abrahamic
Requires at least: 6.7
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 2.77.1
Template: twentytwentyfive
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

The house theme for abrahamic-religions.com, an independent educational resource on Judaism, Mandaeism, Christianity and Islam.

== Description ==

Abrahamic gives abrahamic-religions.com its look: deep navy, ivory and antique gold, set in the Sabon Next LT typeface. The home page presents the four traditions through fifteen sections:

* Introduction and the four traditions
* Shared heritage, with a lineage diagram
* A side-by-side comparison of beliefs and practices
* Sacred texts, key figures and sacred places
* A scrolling historical timeline
* The latest articles, featured topics and a knowledge base
* Frequently asked questions, an About section and a newsletter sign-up

Every section can be edited in the WordPress Site Editor without touching code. The layout adapts to phones, tablets and desktop screens.

The theme fills a new site for you. On activation it creates the pages the menus link to (Judaism, Mandaeism, Christianity, Islam, Sacred texts, Figures, Places, Glossary, About and more), fourteen introductory articles and the topic categories, and sets up the front page, the Journal page and readable web addresses.

The site is organised for readers and search engines alike: section pages for the religions, the reference material and the Journal articles, breadcrumbs on every page, a site map, a helpful page-not-found screen, and built-in search descriptions, social sharing tags and structured data. If you use an SEO plugin such as Yoast SEO or Rank Math, the theme leaves those tasks to it.

Abrahamic is a child theme: it builds on Twenty Twenty-Five, which must stay installed.

Appearance > Theme Options lets you:

* set the logo wording, the header search button and the header call-to-action button;
* set the footer title, tagline, description, copyright notice and note;
* choose one of four colour schemes, or build your own;
* connect the newsletter form to your mailing service;
* add profile links for 45 networks, from Facebook and YouTube to ORCID, Academia.edu and Wikidata;
* turn the sticky header and the fade-in effect on or off;
* export your options to a file, import them on another site, or reset them.

== Installation ==

1. Make sure the Twenty Twenty-Five theme is installed. It does not need to be active.
2. Go to Appearance > Themes > Add New > Upload Theme, choose abrahamic-2.77.1.zip, and activate it. The starter pages and articles are created automatically.
3. Open Appearance > Theme Options to set the header and footer wording, pick a colour scheme, and enter your newsletter and social profile details.
4. Review and edit the starter pages and articles, and set the contact address under Appearance > Theme Options > Footer.
5. Add your Google Search Console code under Theme Options > Search, then submit your-site/wp-sitemap.xml there.

== Frequently Asked Questions ==

= Is Abrahamic a child theme? =

Yes. It is a child theme of Twenty Twenty-Five. Keep Twenty Twenty-Five installed; Abrahamic supplies the front page, the header and the footer, and Twenty Twenty-Five supplies the layouts for posts, archives, search and other pages.

= Where are the Theme Options? =

Appearance > Theme Options. Site editors also find a Theme Options link in the admin bar, under the site name.

= How do I back up or copy my settings? =

Open Appearance > Theme Options > Tools and download the export file. Import that file on the same or another site running Abrahamic.

= Does the theme add content to my site? =

Yes. On activation it creates the pages the menus link to, eight articles and the topic categories. If a page with the same address already exists, your page is kept as it is. On a new site it also moves WordPress's untouched sample post and page to the trash and switches to readable web addresses.

= Will an update overwrite my changes to the starter pages? =

By default, yes: starter pages take the version shipped with the theme, and the text you had is kept in the page's revisions, where you can restore it. Choose "Keep my edits" under Appearance > Theme Options > Tools to change that. Pages you created yourself are never touched.

= If I delete a starter page, will it come back? =

No. The theme remembers everything it has created, so deleted items stay deleted. To bring one back, open Appearance > Theme Options > Tools > Starter content and choose Restore.

= Can visitors choose dark mode? =

Yes. A switch in the header changes between light and dark colours, and each visitor's choice is remembered on their own device. Under Appearance > Theme Options > Header you can hide the switch, and set which colours a first-time visitor sees: light, dark, or the setting their device prefers.

= Can I change the login screen? =

Yes. Appearance > Theme Options > Login sets the logo, the photograph and the line beside the form, and can move the login screen to a private address. If that address is ever lost, add define( 'ABR_HIDE_LOGIN', false ); to wp-config.php, log in at wp-login.php, and remove the line again.

= How do I hide a post without deleting it? =

Tick "Unlist this item" in the Listing box of the editor sidebar. The post stays at its own address and disappears from lists, search, feeds, the sitemap and search engines. Unlisted items are gathered under an Unlisted view above the post list.

= How do I change the logo? =

Open Appearance > Theme Options > Header and choose the AR mark with the name, the mark alone, or the name alone. The mark takes the colours of the chosen colour scheme. To use a different browser icon, set a Site Icon under Settings > General.

= How do I set up donations? =

Both Donate buttons open the owner's payment page. To change them, open Appearance > Theme Options > Header: Donate button link sets the header button (use @donate to open the Donate page first), and Donation link sets the Donate now button on the Donate page. You can also change the button label, colour and link there, or hide the header button.

= Should I use tags or topics? =

Topics are the main scheme and every starter article belongs to one. Tags are optional and narrower, for a thread that crosses topics, such as Covenant. Add them in the editor as you would on any WordPress post; the archive and the tag list appear by themselves.

= How do I add Hebrew or Aramaic? =

Type or paste the text; the theme displays it in the right typeface automatically. For best results, open the HTML view of the paragraph and wrap the text, for example <span lang="he" dir="rtl">שמע</span> for Hebrew, lang="arc" for Aramaic in Hebrew letters, or lang="syc" for Syriac.

= How do I use the typewriter and calligraphy styles? =

Select a paragraph or quote and choose the Typewriter note style for archival notes or transcriptions. Select a paragraph or heading, type a short Arabic phrase, and choose the Arabic calligraphy style. Keep ordinary Arabic words in running text as they are; they use a plainer Arabic typeface for legibility.

= How do I change the menus? =

Open Appearance > Theme Options > Navigation. Write one link per line as Label | address. The main menu holds five top-level links; start a line with a dash to place it in the dropdown of the line above. Links about the site itself (About, Contact, Donate, policies) go in the secondary menu, which appears at the foot of every page. Short codes such as @faq or @guides point to the theme's pages and keep working if those pages move.

= What does each page show in Google? =

Each page and article has a "Search description" box in the editor. Keep it to about 130 characters and end with an invitation to read on.

= I upgraded and my page addresses changed. Are old links broken? =

No. Earlier addresses send visitors and search engines to the new ones. Theme Options > Tools lists any of your pages that still link to an old address and can update them for you.

= How do I change the text on the home page? =

Go to Appearance > Editor > Templates > Front Page and click into any section to edit it.

= Where do the articles on the home page come from? =

The "From the Archive" section shows your three most recent posts automatically.

= Why is the newsletter form not showing? =

The form appears once a form address is entered under Appearance > Theme Options > Newsletter. Until then, only site editors see a reminder in its place.

= Which social networks are supported? =

Facebook, Instagram, X, Threads, Bluesky, Mastodon, LinkedIn, TikTok, Pinterest, Snapchat, Reddit, Tumblr, GTribe, YouTube, Vimeo, Twitch, Spotify, SoundCloud, Suno, WhatsApp, Telegram, Signal, Discord, LINE, WeChat, Substack, Medium, WordPress, WordPress.org Profile, Goodreads, Issuu, Scribd, Quora, Academia.edu, ORCID, Wikipedia, Wikidata, ISNI, VIAF, OCLC, GitHub, Behance, Dribbble, Flickr and Fiverr. Fill in the ones you use under Appearance > Theme Options > Social; the footer shows only those, in the order listed on that screen.

= Can I use my own photographs? =

Yes. The hero section and the place cards hold patterned placeholders. Replace each with an Image block in the Site Editor.

= I used an earlier version called "Abrahamic Religions". What happens to my settings? =

They are copied across automatically when you activate Abrahamic. Changes you made to templates in the Site Editor under the old theme are not carried over. See docs/upgrading.md for details.

== Upgrade Notice ==

= 2.77.1 =
With Rank Math active, the theme's fuller structured data is used in place of Rank Math's default, unless a schema was built in Rank Math for that page.

= 2.77.0 =
Works alongside Rank Math: focus keywords for every article, the theme's image licence, speakable and FAQ data added to Rank Math's structured data, and the author's Gravatar removed from it.

= 2.76.0 =
Titles stay under 60 characters and descriptions under 130 with a call to action. Rank Math settings always win where they are set.

= 2.75.1 =
Every page title now ends "| Abrahamic Religions", and the home page no longer shows as "Home", with or without an SEO plugin.

= 2.75.0 =
Image licence structured data for the site's photographs, speakable article sections, and FAQ structured data on the two question-and-answer articles.

= 2.74.2 =
Two further FAQ answers from the 2024 site.

= 2.74.1 =
The four-tradition Venn diagram now also appears on Comparative studies and in the FAQ.

= 2.74.0 =
Two FAQ answers drawn from the 2024 site, and the old Venn diagram address now leads to the family-tree article.

= 2.73.2 =
Chapter banner titles and chapter labels in title case.

= 2.73.1 =
Section introductions on the home page now line up under their headings.

= 2.73.0 =
Two question-and-answer pieces in the Journal for readers who search with the word Reddit.

= 2.72.1 =
The Islamic Dilemma pages link to the rebuttal at The Muslim Apologist.

= 2.72.0 =
A Journal article and a reference page on the Islamic Dilemma.

= 2.71.0 =
Seven new Journal articles drawn from the site's search keyword research.

= 2.70.0 =
Twelve new FAQ answers, the 2020 world religion figures with a chart, and a comparison of the traditions in pairs, built from the site's search keyword research.

= 2.69.0 =
Parallax chapter banners between the main sections of the home page.

= 2.68.1 =
Journal pages show twelve articles, so their rows fill completely.

= 2.68.0 =
A section bar under the header on the home page, Back to top links, and a header that now stays fixed as intended.

= 2.67.0 =
The front page is rearranged as a journey in thirteen chapters.

= 2.66.0 =
Restores the missing featured images on the newest Journal articles, and the shared-heritage symbols now include the Mandaean darfash.

= 2.65.0 =
The Places page is rewritten: ten fuller sections, each with its own photograph and sources.

= 2.64.0 =
Visitors now see a calm "Back shortly" notice instead of an error during updates, fatal errors and database outages.

= 2.63.4 =
Footer links: About AR and Contact AR.

= 2.63.3 =
The footer's secondary navigation labels are set in capitals.

= 2.63.2 =
The Knowledge base menu label becomes KB, with Knowledge Base shown on hover.

= 2.63.1 =
The main-menu label Editorial policy is shortened to Editorial.

= 2.63.0 =
Fuller About, Editorial policy, Terms of use, Privacy policy and Contact us pages.

= 2.62.0 =
Editorial policy and Knowledge base join the main menu.

= 2.61.1 =
The site-pages bar moves from above the header to the footer.

= 2.61.0 =
A top bar of site pages, and the site now names no person anywhere a visitor, search engine or AI tool can read.

= 2.60.0 =
A new Journal article on the cave of Hira and the Quba Mosque.

= 2.59.0 =
A new Journal article on the stations of the Hajj.

= 2.58.0 =
A new Journal article on the history of Hagia Sophia.

= 2.57.3 =
The Nicaea article now ties the city's history to the Qur'anic verses it cites.

= 2.57.2 =
The Nicaea article now covers the city's destruction and later history.

= 2.57.1 =
The patriarchal cities move from the front page to their own Journal article.

= 2.57.0 =
A new Journal article on the Council of Nicaea, and four patriarchal cities on the front page.

= 2.56.3 =
A new photograph for Hebron on the front page.

= 2.56.2 =
Vatican City joins the front page's sacred places, completing two rows of four.

= 2.56.1 =
Madinah joins the front page's sacred places.

= 2.56.0 =
The front page's sacred places now include the Mandaeans.

= 2.55.3 =
Fixes a blank front page after a theme update.

= 2.55.2 =
The family tree now links the Mandaeans to John the Baptist.

= 2.55.1 =
Mandaeism now appears in both diagrams.

= 2.55.0 =
A new Journal article with an Abrahamic family tree and a diagram of shared beliefs, and redirects for every address of the 2016-2023 site.

= 2.54.2 =
Repairs featured images whose file on the server is empty or missing.

= 2.54.1 =
Restores missing featured images on Journal articles, and stops headings from stretching across the line.

= 2.54.0 =
A new Journal article: The Sabians in classical Muslim scholarship.

= 2.53.2 =
The wp-config.php switch for the private login address is now define( 'ABR_HIDE_LOGIN', false );.

= 2.53.1 =
A fully redesigned login screen: a centred card on a dark page, now the default layout.

= 2.53.0 =
A themed login screen, an optional private login address, unlisted posts and readable search addresses are now built in. Deactivate Login Logo, WPS Hide Login, Unlist Posts & Pages and Pretty Search Permalinks after upgrading; their settings carry over.

= 2.52.2 =
A house-style pass over the English prose of every page and article.

= 2.52.1 =
Removes the remaining self-referencing phrases from the content.

= 2.52.0 =
A new Journal article: Apostasy in the Abrahamic traditions.

= 2.51.1 =
The population article gains a section on where the world's Christians will live by 2050.

= 2.51.0 =
All paragraph and list text now uses 1.5 line spacing and full justification.

= 2.50.0 =
A new Journal article: Paul and Peter, two missions in the early church.

= 2.49.1 =
Sacred texts and History and timeline move into the Reference menu, matching where they actually sit on the site.

= 2.49.0 =
A new Journal article on Pew Research's population projections for the Abrahamic religions.

= 2.48.0 =
A new Journal article: Haman in the Qur'an.

= 2.47.1 =
A warmer, wittier 404 page.

= 2.47.0 =
The header search moves to a single icon at the far right; the light/dark switch is wider.

= 2.46.1 =
Fixes photographs showing below their text on phones in the hero, intro and About sections.

= 2.46.0 =
Removes Shia-specific content and photographs; body text is now justified on every page and article.

= 2.45.0 =
All bundled photographs are now AVIF instead of WebP, about a third smaller in total.

= 2.44.1 =
The Sabians article now has a second photograph, completing the photo set on every Journal article.

= 2.44.0 =
Every Journal article now has a distinct set of photographs; no photo is reused across two articles.

= 2.43.0 =
FAQPage structured data and a "Last updated" indicator on revised articles.

= 2.42.3 =
Minor wording fix on the Donate page; editorial audit found no other changes needed.

= 2.42.2 =
Removes the remaining self-referencing language across the site.

= 2.42.1 =
Removes editorial framing of Mandaeism as a "fourth" tradition "treated here".

= 2.42.0 =
Removes self-referencing "this site" wording from every page.

= 2.41.1 =
Corrects a misspelling of Ismaʿil Raji al Faruqi's name in six footnotes.

= 2.41.0 =
The four traditions now appear in one order everywhere: Judaism, Mandaeism, Christianity, Islam.

= 2.40.0 =
Pages and articles now link to one another throughout.

= 2.39.0 =
A new Journal article on the rulers of Egypt in the stories of Joseph and Moses.

= 2.38.2 =
Expands the Qur'an section of the John the Baptist article.

= 2.38.1 =
Fixes the alignment of the light and dark switch.

= 2.38.0 =
A new Journal article on the Sabians of the Qur'an.

= 2.37.0 =
Editorial revisions across seven pages and articles, and a new FAQ entry.

= 2.36.0 =
Two new Journal articles on Mandaean subjects.

= 2.35.2 =
The darfash drawing now marks Mandaeism on the home page and heads the Mandaeism page.

= 2.35.1 =
Corrects how the Mandaean word yardna is explained, with a new source.

= 2.35.0 =
Mandaeism now appears wherever the site speaks of the Abrahamic traditions as a whole.

= 2.34.0 =
Photographs in pages and articles now open larger when clicked.

= 2.33.0 =
Adds photographs across the site, featured images for every starter article, and photograph credits on the Copyright and DMCA page.

= 2.32.3 =
Updates the theme preview image shown in Appearance > Themes.

= 2.32.2 =
Wording fixes in the Privacy policy and Comparative studies pages.

= 2.32.1 =
Fixes starter content that never arrived on sites where no administrator had opened an admin screen since the update.

= 2.32.0 =
Adds a section on where the term "Abrahamic religions" comes from, with a matching question in the FAQ.

= 2.31.0 =
Articles gain a journal-style title panel, a raised opening letter, section marks, pull quotes, a citation box and two-column references.

= 2.30.0 =
More comfortable reading: a wider column, larger text, more space between lines and sections, and wide tables that use the full page.

= 2.29.0 =
Expands the Mandaeism page from the standard scholarship, and fixes the header on screens between about 490 and 1150 pixels wide.

= 2.28.1 =
Fixes links to the Mandaeism page before the page exists, and updates the home page text to describe four traditions.

= 2.28.0 =
Adds sourced material to the Judaism, Christianity and Islam pages, with footnotes.

= 2.27.0 =
Titles, headings and menu labels now use sentence case, and the tagline is shorter so the home page title fits in search results.

= 2.26.0 =
Adds sourced material to the Islam, Sacred Texts and Comparative Studies pages, with footnotes.

= 2.25.0 =
The home page comparison is now a short summary; the full table moves to Comparative Studies.

= 2.24.0 =
Adds Mandaeism as a fourth tradition, with its own page, a place in the comparison table and the menus.

= 2.23.1 =
The Journal menu item no longer opens a dropdown. Topics is linked from the Journal page and the footer.

= 2.23.0 =
Tags now have their own archive layout, and articles show the tags they carry. Topics are unchanged.

= 2.22.1 =
Fixes the header search field on phones and tablets, where opening it pushed the page sideways.

= 2.22.0 =
Search now understands alternative spellings, ranks results by relevance and shows where each result sits. The index is built automatically.

= 2.21.0 =
Adds three pages under Sacred Texts: the Tanakh, the Christian Bible and the Qur'an, each listing its books or chapters in full.

= 2.20.0 =
The Insights section is now the Journal, at /journal/. Earlier addresses redirect. Submit your sitemap again afterwards.

= 2.19.0 =
Starter pages are now replaced with the current version when the theme ships new content, and retired starter pages go to the trash. To keep your edits instead, change the setting under Theme Options > Tools before upgrading.

= 2.18.0 =
The site now writes Makkah and Madinah, giving the English spellings once on each page. Pages you have edited keep your text.

= 2.17.0 =
The About page now states the site's purpose, and the article on Kedar states its conclusion. Pages you have edited keep your text.

= 2.16.1 =
The Site Map page is now called Sitemap, at /sitemap/. The old address redirects.

= 2.16.0 =
Starter content updated for 2026 and expanded with material from the site's earlier years. Pages you have edited keep your text.

= 2.15.0 =
Adds photographs to the home page hero and the sacred places cards.

= 2.14.0 =
Adds a light and dark switch to the header. Visitors keep their choice; set the starting mode under Theme Options > Header.

= 2.13.1 =
The guidance line on the home page image placeholder is now shown only to signed-in editors.

= 2.13.0 =
Adds a faint watermark of the three religious symbols to the shared heritage section on the home page.

= 2.12.1 =
The Donate button now opens the PayPal page the owner's payment page. Change it under Theme Options > Header.

= 2.12.0 =
Adds a red Donate button and a Donate page. Site links now appear in the footer only. Add your payment link under Theme Options > Header.

= 2.11.0 =
Site pages (About, Contact, policies, Knowledge Base, Site Map) move to the slim bar above the header and to the footer. Customised menus keep their links; review them under Theme Options > Navigation.

= 2.10.0 =
Articles are now called Insights (/insights/) and the Knowledge Base section is now Reference (/reference/). Old addresses redirect automatically. The main menu gains a Knowledge Base link to knowislam.wiki.

= 2.9.0 =
Revises the About, Editorial Policy, Research, Comparative Studies and Sacred Texts starter pages where unedited, and adds an optional Further reading list for articles.

= 2.8.0 =
Adds bundled fonts for Hebrew, Aramaic and Syriac. Unedited Judaism, Sacred Texts and Glossary pages receive new Hebrew and Aramaic material.

= 2.7.0 =
Adds two optional block styles, Typewriter note and Arabic calligraphy, and improves bold transliteration and Greek text.

= 2.6.0 =
The AR monogram now appears beside the site name in the header and footer, and is the browser icon until you set a Site Icon.

= 2.5.0 =
The main menu now holds five links with dropdowns, and a secondary bar carries quick links. A menu you customised keeps its first five links; review it under Theme Options > Navigation.

= 2.4.0 =
Page and article addresses move into sections. Earlier addresses redirect automatically, and your edits are kept. If you customised the header menu in the Site Editor, copy it into Theme Options > Navigation.

== Changelog ==

= 2.77.1 - 2026-09-27 =
* With Rank Math active, the theme's structured data takes precedence over Rank Math's default schema, since it is the more complete. A schema built in Rank Math's Schema tab for a page is still respected. Everything else stays with Rank Math.

= 2.77.0 - 2026-09-27 =
* Rank Math integration: every article and principal page receives a Rank Math focus keyword where none is set, and the theme's structured data is merged into Rank Math's.
* Anonymity: Rank Math's author Person, which carried a Gravatar derived from the account's email address, is removed; the site is named as author.

= 2.76.0 - 2026-09-27 =
* Every page title, branding included, is now under 60 characters, and every meta description under 130 characters with a call to action.
* With Rank Math active, any title or description set in Rank Math is used as it stands; the theme's defaults apply only where Rank Math has nothing set.

= 2.75.1 - 2026-09-27 =
* Fixed: the home page title read "Home - Abrahamic Religions". It now reads "Judaism, Mandaeism, Christianity and Islam | Abrahamic Religions", editable in Theme Options.
* Every page title and sharing title now ends "| Abrahamic Religions", whether the theme or an SEO plugin (Rank Math, Yoast, All in One SEO) writes it.

= 2.75.0 - 2026-09-27 =
* Structured data audited against Google's list of supported features. New: image licence metadata for the site's photographs, a speakable section on every article, and FAQ data on the two question-and-answer articles.

= 2.74.2 - 2026-09-27 =
* Two further FAQ answers carried over from the 2024 site: how the Abrahamic religions view Abraham, and whether they share the same values.

= 2.74.1 - 2026-09-27 =
* The Venn diagram of shared beliefs now also appears on the Comparative studies page and under the FAQ answer on what Judaism, Christianity and Islam have in common.

= 2.74.0 - 2026-09-27 =
* Two new FAQ answers carried over from the 2024 site: who the prophets of the Abrahamic religions are, and why the religions are sometimes called Western.
* The old Venn diagram image addresses now redirect to the family-tree article, where the diagram is drawn today.

= 2.73.2 - 2026-09-27 =
* The home page chapter titles use title case: on the seven banners (The Root, The People, The Land, The Word, Four Paths, Through the Ages, Meeting and Parting) and in the thirteen chapter labels above the section headings.

= 2.73.1 - 2026-09-26 =
* Fixed: on the home page, the short introduction under each section heading sat to the right with a gap beside it, in justified text. Every section now lines up its label, heading and introduction on one left edge, with the introduction set ragged-right.

= 2.73.0 - 2026-09-26 =
* Two new Journal pieces for readers who add "Reddit" to their searches: "The Islamic Dilemma: answers for Reddit readers" and "Judaism vs Christianity: answers for Reddit readers".

= 2.72.1 - 2026-09-26 =
* The Islamic Dilemma article and reference page now link to "The Islamic Dilemma, refuted" at The Muslim Apologist.

= 2.72.0 - 2026-09-26 =
* New Journal article, "The Islamic Dilemma: the argument and the answer", and a new reference page, "What is the Islamic Dilemma?", under Comparative studies, with a matching FAQ answer.
* Fixed: opening quotation marks in several recent articles appeared as closing marks.

= 2.71.0 - 2026-09-26 =
* Seven new Journal articles: What language did Abraham speak?; The parting of the ways; Where was Abraham from?; The symbols of the four traditions; Religious law in the Abrahamic traditions; Food and faith; Are the Abrahamic religions violent?

= 2.70.0 - 2026-09-26 =
* Content expanded to answer what readers search for: twelve new FAQ answers, the Pew Research Center's 2020 world religion figures with a chart, a comparison of the traditions in pairs, and a glossary entry for Abrahamism.

= 2.69.0 - 2026-09-26 =
* New parallax chapter banners on the home page: a photograph before each of the seven main sections, drifting more slowly than the page, with the chapter number, name and one line of text.

= 2.68.1 - 2026-09-26 =
* Journal and topic listings show twelve articles a page, so the card grid no longer leaves a single card alone on its last row.

= 2.68.0 - 2026-09-26 =
* New section bar under the header on the home page only, with smooth-scrolling links to its seven main sections and the current section highlighted.
* A quiet Back to top link closes each of those sections.
* Fixed: the header scrolled away instead of staying fixed at the top.

= 2.67.0 - 2026-09-26 =
* The front page now reads as a journey: its sections are rearranged into thirteen numbered chapters, from the opening question through the root, the people, the land and the word to the four paths, their history and where they meet.

= 2.66.0 - 2026-09-26 =
* Fixed: featured images missing from the newest Journal articles; the starter-content check now keeps retrying until every image is in place.
* The shared-heritage watermark shows all four symbols, in the site's order: the Star of David, the Mandaean darfash, the cross and the crescent.
* The four traditions are listed in the site's order on the front page and in two articles.

= 2.65.0 - 2026-09-26 =
* The Places page is rewritten and expanded to ten places, each with a photograph and footnoted sources, adding Vatican City and Ahvaz and the Karun.

= 2.64.0 - 2026-09-26 =
* New maintenance notice: during WordPress updates, after a fatal PHP error, when the database is unreachable, or while the theme is being replaced, visitors see a branded "Back shortly" page with a 503 status instead of an error message.

= 2.63.4 - 2026-09-26 =
* Footer links renamed About AR and Contact AR.

= 2.63.3 - 2026-09-26 =
* The footer's secondary navigation labels are shown in capitals.

= 2.63.2 - 2026-09-26 =
* The main-menu label "Knowledge base" becomes "KB", with "Knowledge Base" as its tooltip. Menu lines accept an optional third part for such a tooltip.

= 2.63.1 - 2026-09-26 =
* The main-menu label "Editorial policy" is shortened to "Editorial"; the page keeps its full title.

= 2.63.0 - 2026-09-26 =
* The About, Editorial policy, Terms, Privacy and Contact pages are rewritten and expanded, and their titles now match the footer links.

= 2.62.0 - 2026-09-26 =
* Editorial policy and Knowledge base are added to the main menu, after Journal.

= 2.61.1 - 2026-09-26 =
* The secondary navigation bar (About this site, Terms of use, Privacy policy, DMCA, Contact us, Sitemap) now sits in the footer's bottom row, as requested; the bar above the header is removed.

= 2.61.0 - 2026-09-26 =
* New top bar above the header with About this site, Terms of use, Privacy policy, DMCA, Contact us and Sitemap, set on the Navigation tab.
* Owner anonymity: the user list is removed from the REST API, author archives and ?author= addresses redirect to the Journal, feeds, embeds and schema name the site as author, and the users sitemap is switched off.
* The theme's own files name the site as author, and the readme and documentation are no longer served to visitors.
* The Donate links no longer default to a personal payment page.

= 2.60.0 - 2026-09-26 =
* New in the Journal: "Ḥirāʾ and Qubāʾ: where the revelation and the first mosque began", built around Qur'an 96:1-5 and 9:108.

= 2.59.0 - 2026-09-26 =
* New in the Journal: "The stations of the Hajj: Minā, ʿArafāt and Muzdalifah", day by day, with the call to Abraham in Qur'an 22:26-27 that the rites answer.

= 2.58.0 - 2026-09-26 =
* New in the Journal: "Hagia Sophia: cathedral, mosque, museum and mosque again", from Justinian's church to the mosque of today, closing on the verse of Light (Qur'an 24:35) inscribed in its dome.

= 2.57.3 - 2026-09-26 =
* The Nicaea article now connects the city's earthquakes, the sinking of its church and the conversion of its Hagia Sophia to the imagery of Qur'an 19:88-91.

= 2.57.2 - 2026-09-26 =
* The Nicaea article gains a section on the city's earthquakes, conquests and the sinking and re-emergence of the lakeside basilica.

= 2.57.1 - 2026-09-26 =
* New in the Journal: "The five great sees of the early church", on Rome, Constantinople, Alexandria, Antioch and Jerusalem.
* Alexandria, Antioch, Nicaea and Constantinople are removed from the front page's sacred places, which return to eight.

= 2.57.0 - 2026-09-26 =
* New in the Journal: "Nicaea, 325: the council, the creed and the church beneath the lake", on the 2026 excavation at İznik, the council and its creed, the ranking of the great sees, and the Qur'an's answer in Surah Maryam 19:88-91.
* The front page's sacred places now number twelve, adding Alexandria, Antioch, Nicaea and Constantinople.
* Qur'anic passages are set in the bundled Amiri Quran typeface.

= 2.56.3 - 2026-09-26 =
* The front page's Hebron card now shows the outside of the Cave of the Patriarchs, its ancient walls and minarets. The earlier photograph of the shrine inside stays on the Places page.

= 2.56.2 - 2026-09-26 =
* Vatican City added to the front page's sacred places, giving two full rows of four.

= 2.56.1 - 2026-09-26 =
* Madinah added to the front page's sacred places, after Makkah. The seven places sit four to a row, with the shorter last row centred.

= 2.56.0 - 2026-09-26 =
* The front page's "Sacred places" section now has six places in two rows of three, adding the Jordan River and Ahvaz on the Karun, so the Mandaeans are represented beside the other three traditions.

= 2.55.3 - 2026-09-26 =
* Fixed: after a theme update, the front page could render with nothing between the header and the footer for up to half an hour. The theme now detects and clears the cause on the next page load, and after every update.

= 2.55.2 - 2026-09-26 =
* The family tree now joins the Mandaeans to John the Baptist with a dotted line, labelled and added to the key.

= 2.55.1 - 2026-09-26 =
* Mandaeism added to both diagrams: the family tree shows the Mandaean line beside Shem, and the diagram of shared beliefs now covers all four traditions.

= 2.55.0 - 2026-09-26 =
* New in the Journal: "The Abrahamic family tree and what the traditions share", with a family tree from Adam to Muhammad and Jesus and a diagram of the beliefs Judaism, Christianity and Islam share.
* New [abr_diagram] shortcode for the two diagrams, drawn in SVG in the site's colours, in light and dark.
* Every address of the 2016-2023 site now redirects to the page that carries its material.

= 2.54.2 - 2026-09-26 =
* Fixed: a featured image whose file on the server was empty or missing showed as a broken image. The starter-content check now finds it and replaces the theme's photograph with a fresh copy. A broken image an editor chose is listed under Theme Options > Tools instead.
* The bundled photographs are now served with the correct AVIF type on Apache servers that did not send one.

= 2.54.1 - 2026-09-26 =
* Fixed: a Journal article whose featured photograph had been removed from the media library stayed without one for good. The starter-content check now puts the photograph back, while an image an editor removed or replaced on purpose is left alone. Any photograph that cannot be added is listed under Theme Options > Tools.
* Fixed: headings, including the titles on Journal cards, were justified with the body text and spread across the line; they now keep their own alignment.

= 2.54.0 - 2026-09-26 =
* New in the Journal: "The Sabians in classical Muslim scholarship", on how Ibn al-Nadim, Sa'id al-Andalusi and al-Shahrastani understood the Qur'an's Sabians, with the Mandaean account of Abraham beside them.

= 2.53.2 - 2026-09-25 =
* The private login address is now switched off from wp-config.php with define( 'ABR_HIDE_LOGIN', false );. Left undefined, or defined as true, the Login tab decides.

= 2.53.1 - 2026-09-25 =
* The login screen has a new default layout: a card centred on a dark page, with a large logo and a line of text above it, a gold rule across the top of the card, and a full-width Log In button. The photograph layout from 2.53.0 remains available on the Login tab.

= 2.53.0 - 2026-09-25 =
* New Login tab in Theme Options: the login screen now uses the site's colours, type, AR mark and a photograph beside the form, in light and dark, with an optional private login address.
* Posts and pages can be unlisted from the editor sidebar: reachable at their own address, absent from lists, search, feeds, the sitemap and search engines.
* Search results can open at /search/term/ (Search tab).
* Built in from Login Logo, WPS Hide Login, Unlist Posts & Pages and Pretty Search Permalinks. While any of those plugins is active, the theme leaves that feature to it.
* Fixed: the full-size Jerusalem photograph used by the photograph viewer was an empty file after the AVIF conversion in 2.45.0.
* Theme Options tabs now wrap onto a second line on narrow screens, so every tab stays visible.

= 2.52.2 - 2026-09-25 =
* House-style pass over all English prose: about 30 contrastive constructions ("not X but Y", "rather than", "so much as") rewritten as direct statements, two headings reworded, and a handful of flagged words replaced.

= 2.52.1 - 2026-09-25 =
* Removed the remaining self-referencing phrases ("treated here", "elsewhere on this site", "discussed on the Timeline", "we treat", "see the article") from the About, FAQ, Topics, Sacred texts and Mandaeism pages and five Journal articles. The citation box heading now reads "Citation".

= 2.52.0 - 2026-09-25 =
* New in the Journal: "Apostasy in the Abrahamic traditions," comparing how Judaism, Christianity, Islam and Mandaeism have treated those who leave, with Malaysia as a modern case.

= 2.51.1 - 2026-09-23 =
* "The population of the Abrahamic religions" gains a section, "Where Christians will live": the projected shift of the world's Christians toward sub-Saharan Africa, Europe's decline in absolute numbers, Nigeria's rise, and the effect of religious switching in the West.

= 2.51.0 - 2026-09-23 =
* All paragraph and list text across the site is now justified, with 1.5 line spacing throughout, replacing the mix of spacing values (1.55 to 1.8) used in different sections before. Headings and single-line interface text are unaffected.

= 2.50.0 - 2026-09-23 =
* New in the Journal: "Paul and Peter: two missions in the early church," on the Antioch confrontation in Galatians 2, the Corinthian factions of 1 Corinthians 1:12, Acts' more harmonious retelling, and 2 Peter's later reconciliation of the two apostles.

= 2.49.1 - 2026-09-23 =
* The header menu's "Sacred texts" and "Timeline" are now inside the Reference dropdown, alongside Figures, Places, Comparative studies, Glossary, FAQ and Research. Both pages are children of Reference in the site's own structure and already appeared that way in the footer menu and in breadcrumbs; only the header menu treated them differently. The top-level menu is now Religions, Reference, Journal.

= 2.49.0 - 2026-09-23 =
* New in the Journal: "The population of the Abrahamic religions," on Pew Research Center's demographic projections to 2050 and 2060: current numbers, fertility and age, the projected near-parity of Christians and Muslims by 2050, and a historical note on when the two may last have been so close.

= 2.48.0 - 2026-09-20 =
* New in the Journal: "Haman in the Qur'an", on the Orientalist objection that Haman is borrowed from the Book of Esther, the historicity of Esther itself, and the case that Haman is an Egyptian priestly title rather than a personal name.

= 2.47.1 - 2026-09-20 =
* The 404 page's heading and standfirst are now a little more quirky ("This page has wandered off"), in keeping with the site's own subject matter. The breadcrumb label, page title and structured data still read the plain "Page not found", for clarity there.

= 2.47.0 - 2026-09-20 =
* The header search is now an icon at the far right of the bar, after Explore and Donate. Click it to open a search field, click again (or press Escape, or click elsewhere) to close it.
* The light/dark switch in the header is wider.

= 2.46.1 - 2026-09-20 =
* Fixed: on phones, the hero, introduction and About sections showed their photograph below the text once the two-column layout stacked into one column. The photograph now comes first on phones in all three sections; the side-by-side layout on larger screens is unchanged.

= 2.46.0 - 2026-09-20 =
* Removed Shia-specific text and photographs at the site owner's request: the Najaf shrine photograph, the named mention of Grand Ayatollah Sistani, the Ja'fari school reference, the Imam glossary entry's Shia clause, and the Sunni-Shia division passage on the Islam page.
* Body text on every page and article is now justified, with hyphenation and a left-aligned final line per paragraph.

= 2.45.0 - 2026-09-20 =
* All 74 bundled photographs converted from WebP to AVIF (quality 50), cutting their total size by roughly a third with no visible loss of quality.
* The [abr_photo] shortcode and the featured-image seeder now read and write .avif files; existing WebP files are removed from the package.
* On a server whose PHP cannot process AVIF, featured images still display correctly at full size; only the automatic smaller thumbnail crops are skipped.

= 2.44.1 - 2026-09-20 =
* Added a second photograph to The Sabians of the Qur'an: a lunar-phase diagram from a manuscript of al-Biruni's Kitab al-Tafhim, the scholar the article already cites for the Sabian identification. All twenty Journal articles now carry a featured image and at least two further photographs, with no photo shared between any two articles.

= 2.44.0 - 2026-09-20 =
* Fixed: nine articles repeated their featured photograph a second time inline.
* Every one of the twenty Journal articles now has a featured photograph and, with one exception, at least two further photographs, none shared with any other article.
* Thirty-nine new photographs added, all credited on the Copyright and DMCA page.

= 2.43.0 - 2026-09-20 =
* The FAQ page now carries FAQPage structured data, read automatically from its own questions and answers.
* Articles that have been revised since publication now show a "Last updated" date alongside the reading time.

= 2.42.3 - 2026-09-20 =
* Fixed a last self-referencing phrase on the Donate page ("helps the site improve").

= 2.42.2 - 2026-09-20 =
* Removed the last self-referencing phrases: "this page", "this policy", "this website", "published here", "listed here" and similar, on Sacred texts, Places, Research, the Privacy policy, Terms, Editorial policy, DMCA and the Mandaeism page. Each now states its content directly.

= 2.42.1 - 2026-09-20 =
* Five sentences on the Religions index, Glossary, Comparative studies, Mandaeism page and the front-page intro described Mandaeism as being "treated here as a fourth" or the site as "treating it as one". All now simply state Mandaeism's place among the traditions as fact.

= 2.42.0 - 2026-09-20 =
* Removed "this site" from every page and article; the site now names itself Abrahamic Religions, or the wording is rephrased.
* Fixed: a page's SEO meta description could only be set once and never refreshed by later content corrections; it now follows the same rule as the page body.

= 2.41.1 - 2026-09-20 =
* Fixed: six footnotes citing Ismaʿil Raji al Faruqi misspelled his name as "Ragi". Corrected on the Comparative studies, Places, Timeline and Figures pages.

= 2.41.0 - 2026-09-20 =
* The four traditions now appear in the order Judaism, Mandaeism, Christianity, Islam throughout: the header and footer menus, the front page's tradition and sacred-texts cards, the comparison tabs, the Comparative studies table, the Sacred texts page's section order, and every text listing of the four.

= 2.40.0 - 2026-09-20 =
* Pages and articles now link to one another: the first mention of a tradition, a scripture, a figure, a place or a subject with its own article links to it, and every Journal article ends with further reading. Over three hundred internal links, none broken and none pointing back to its own page.

= 2.39.0 - 2026-09-20 =
* New in the Journal: "The king and the Pharaoh", on why the Qur'an calls Joseph's ruler a king and Moses' ruler Pharaoh, and what the Egyptian record shows.
* Figures: the Joseph section notes the same distinction.

= 2.38.2 - 2026-09-20 =
* "John the Baptist in four traditions" now sets out the two classical readings of Qur'an 19:7 and explains that the names Yahya and John come from different roots.

= 2.38.1 - 2026-09-20 =
* Fixed: the knob of the light and dark switch sat against the top and left of its track. It is now centred with an even margin all round, in both positions.

= 2.38.0 - 2026-09-20 =
* New in the Journal: "The Sabians of the Qur'an", on the three verses, the classical commentators and jurists, al-Biruni's account, and the Mandaeans. The Mandaeism page links to it.

= 2.37.0 - 2026-09-20 =
* Editorial revisions to Comparative studies, Figures, the Glossary, History and timeline, and the articles on Abraham, monotheism, scripture in historical context, and faith and reason.
* New FAQ entry on how Islam regards the other Abrahamic traditions.

= 2.36.0 - 2026-09-20 =
* New in the Journal: "John the Baptist in four traditions", on the Gospels, Josephus, the Qur'an and Mandaean tradition, and "Masbuta: baptism in running water", a step-by-step account of the Mandaean baptism. Both carry footnotes and featured photographs.

= 2.35.2 - 2026-09-20 =
* The Mandaeism card and the Mandaeism page now use the darfash drawing supplied by the site owner, in the colour scheme's gold, in place of a simplified icon. It is credited on the Copyright and DMCA page.
* Fixed: the Mandaeism page said the banner appeared at its head when it did not.
* Fixed: on phones the religion cards were too narrow, and "Mandaeism" broke across two lines. They now stack in one column up to 560 pixels.

= 2.35.1 - 2026-09-20 =
* The Mandaeism, Places and Glossary pages no longer state as fact that the Mandaean word yardna comes from the river Jordan. Most scholars hold that it does; E. S. Drower doubted it. Both views are now given, with a footnote to Eric Segelberg's study of Mandaean baptism.

= 2.35.0 - 2026-09-20 =
* Home page: a Mandaean scriptures card, a Mandaean beginnings period on the timeline, and Adam, Seth, Noah and John the Baptist among the figures. Figure labels now name only the traditions that honour each figure.
* Figures page: Adam, Seth and Noah added, and the Mandaean view of Abraham, Moses, Jesus and Muhammad.
* Sacred texts, Comparative studies, History and timeline, FAQ, Glossary and About now include Mandaeism, with sourced notes.
* Places: a new section on the Jordan River.
* Articles on monotheism, prayer and Abraham gain Mandaean sections.

= 2.34.0 - 2026-09-20 =
* Photographs in pages and articles open larger on a click or tap, with their description underneath. Escape, the close button or a click outside the photograph closes the view.
* Seven photographs open at up to 2000 pixels, showing the whole original frame: Mount Sinai, Jerusalem, the Jordan River, the ziggurat of Ur, and the Isaiah Scroll, Leningrad Codex and Codex Alexandrinus pages.

= 2.33.0 - 2026-09-20 =
* Thirteen new photographs: Mount Sinai on the home page, the Mandaeism, Sacred texts, Tanakh, Christian Bible and History pages, sections of the Figures and Places pages, and the home page introduction and About panels.
* Every starter article now has a featured image, shown on article cards, at the top of the article and in social share previews.
* Photograph credits added to the Copyright and DMCA page.
* Fixed: photographs showed the browser's default indents in light mode.

= 2.32.3 - 2026-09-18 =
* The preview image in Appearance > Themes now shows the current design.

= 2.32.2 - 2026-09-18 =
* Tightened the wording on the Privacy policy and Comparative studies pages, and in the theme's own documentation.

= 2.32.1 - 2026-09-18 =
* Fixed: new starter pages and articles could sit unapplied indefinitely, because they were added only when an administrator opened an admin screen. They now arrive on the next visit to the site.
* Every admin screen now says when starter content is missing, with a button to add it.

= 2.32.0 - 2026-09-18 =
* Comparative studies opens with a section on the term itself: how Abraham was used in argument between the communities before the twentieth century, and how the shared-heritage sense arose after the Second World War.
* New question in the FAQ on where the term comes from, and a note in the glossary.

= 2.31.0 - 2026-09-18 =
* Articles open with a dark title panel carrying the topics, title, summary and date.
* The first paragraph begins with a raised letter, and a small gold diamond marks each new section.
* Quotations stand out as pull quotes, and references are set in two columns on wider screens.
* Every article ends with a "Cite this page" box, with a button that copies the citation.

= 2.30.0 - 2026-09-18 =
* Pages read more comfortably: a wider column, slightly larger text, more space between lines, and more room above and below the content.
* Tables and photographs inside articles now spread wider than the text, up to the full width of the page.
* Breadcrumbs, titles, headings and text now line up on the same edge.

= 2.29.0 - 2026-09-18 =
* The Mandaeism page adds the community's own account of its departure from Jerusalem, the knowledge its priests transmit, the hidden Adam, the sacred enclosure and the priestly ranks, with footnotes.
* Fixed: the menu wrapped onto two rows on screens between about 1024 and 1150 pixels, and the header pushed the page sideways between about 490 and 720 pixels.

= 2.28.1 - 2026-09-18 =
* Fixed: the home page linked to the Mandaeism page before that page existed, so the links answered "not found". Links now appear only when their page is there.
* The home page heritage, introduction and questions sections now describe four traditions.
* In the heritage diagram, Mandaeism stands beside the line from Abraham instead of below it, with a note explaining why.

= 2.28.0 - 2026-09-18 =
* The Islam page adds the tradition Islam names as its predecessor, and the setting of Makkah before the revelation.
* The Judaism page adds the rabbinic reading of the formula naming the God of Abraham, Isaac and Jacob.
* The Christianity page adds the two Gospel traditions on how far the first mission was to travel.

= 2.27.0 - 2026-09-18 =
* Titles, headings, buttons and menu labels now use sentence case.
* The tagline is shorter, so the home page title fits within what Google shows.

= 2.26.0 - 2026-09-18 =
* The Islam page gains a section on how Muslim thought places the other religions, with footnotes.
* Sacred Texts and Comparative Studies gain sourced passages on the Qur'an and on the prophets.

= 2.25.0 - 2026-09-18 =
* The home page comparison now shows five themes with a link to the full version.
* Comparative Studies opens with the full table: eleven themes across the four traditions.

= 2.24.0 - 2026-09-18 =
* New page on Mandaeism, covering the Mandaeans of Iraq and Iran, their scriptures and rites, and their identification with the Sabians named in the Qur'an.
* Mandaeism joins the home page cards, the comparison table, the lineage diagram, the Religions menu and the footer.
* New glossary entries: Mandaeism, Sabians, Ginza Rabba, Masbuta, Darfash, Nasoraeans; John the Baptist added to Figures; Mandaean scripture added to Sacred Texts.

= 2.23.1 - 2026-09-18 =
* The Journal menu item is now a plain link. Topics is reached from the Journal page's introduction and from the footer.

= 2.23.0 - 2026-09-18 =
* Tag archives now use their own layout: a compact list of articles, how many carry the tag, and every tag in use at the foot.
* Articles show the tags they carry, beneath their topics.
* Topic archives are labelled Topic, tag archives Tag.

= 2.22.1 - 2026-09-18 =
* Fixed: opening the header search on a phone or tablet pushed the header off the screen and let the page scroll sideways. The field now opens as a row under the header.

= 2.22.0 - 2026-09-18 =
* Search now finds a page whichever spelling you use: Makkah or Mecca, Qur'an or Quran or Koran, hadith or ḥadīth, Ibrahim or Abraham.
* Results are ordered by relevance, with title matches first, and pages and articles are searched together.
* Each result shows the section it belongs to and a short passage with your words marked.
* An empty search now asks for a word and offers the topics.
* New button under Theme Options > Tools to rebuild the search index.

= 2.21.0 - 2026-09-18 =
* New page for the Tanakh, listing all twenty-four books with their Hebrew names.
* New page for the Christian Bible, listing every book and showing how the canon differs between Protestant, Catholic, Orthodox and Ethiopian churches.
* New page for the Qur'an, listing all 114 surahs with their Arabic names, meanings, verse counts and place of revelation.

= 2.20.0 - 2026-09-18 =
* The article section is now called Journal and sits at /journal/, with topics at /journal/topics/.
* Every earlier address, including /insights/ and /articles/, redirects to the new one.

= 2.19.0 - 2026-09-18 =
* New setting under Theme Options > Tools: when the theme ships new starter content, replace the starter pages (the default) or keep your edits.
* Starter pages the theme no longer carries are moved to the trash.
* Replaced text is kept in each page's revisions, and pages you created yourself are never touched.

= 2.18.0 - 2026-09-18 =
* The site now writes Makkah and Madinah, with Mecca and Medina given once on each page where they appear, and kept in search descriptions.
* New glossary entry explaining the spelling.

= 2.17.0 - 2026-09-18 =
* The About page states the purpose of the site: to help the reader decide which of the Abrahamic religions is true, and which traditions the site treats.
* The article on Kedar sets out the figure its evidence points to.
* The Editorial Policy explains how argued conclusions are handled.

= 2.16.1 - 2026-09-18 =
* The Site Map page is now called Sitemap and sits at /sitemap/, the address used on the earlier site. The old address redirects.

= 2.16.0 - 2026-09-18 =
* The Judaism, Christianity and Islam pages, and the articles on Abraham and Jerusalem, are rewritten and expanded, with current figures for 2026.
* Two new articles: the path of Abraham in the Qur'an, and Kedar, the Arabs and the prophets.
* New pages: Copyright and DMCA, and a Thank You page for donors.
* Scripture references now appear as footnotes, with links in both directions.
* Photographs added to the religion pages and two articles.
* Earlier addresses such as /abraham/ and /jerusalem/ redirect to the pages that carry that material now.

= 2.15.0 - 2026-09-18 =
* The home page now shows photographs: the Kaaba in the hero, and Jerusalem, Mecca and Hebron on the sacred places cards.
* The Medina card is now Hebron, the burial place of Abraham.

= 2.14.0 - 2026-09-18 =
* New light and dark colours, with a switch in the header. Visitors keep their choice on their own device.
* Dark colours are derived from your chosen colour scheme, so all four schemes and a custom palette work in both modes.
* Choose the colours a first-time visitor sees under Theme Options > Header: light, dark, or whatever their device prefers. The switch can also be hidden.
* Improved the readability of small gold labels on white cards.

= 2.13.1 - 2026-09-17 =
* Fixed: the note asking for a manuscript or architectural photograph appeared to visitors on the home page. It now shows only when you are signed in.

= 2.13.0 - 2026-09-17 =
* The shared heritage section on the home page now carries a faint watermark of the cross, crescent and star, tinted to match the colour scheme.

= 2.12.1 - 2026-09-17 =
* The Donate button and the Donate page button now open the owner's payment page. Both links can be changed under Theme Options > Header.

= 2.12.0 - 2026-09-17 =
* New red Donate button beside Explore, on every screen size, and a new Donate page.
* Add a payment link under Theme Options > Header and the Donate page shows a Donate now button; until then it points readers to the Contact page.
* Site links (About, Contact, Donate, policies, Knowledge Base, Site Map) now appear only in the footer.
* On narrow phones the header shows the AR mark alone to make room.

= 2.11.0 - 2026-09-17 =
* The main menu now holds content only: Religions, Sacred Texts, Timeline, Reference and Insights.
* About, Editorial Policy, Contact, Knowledge Base, Privacy Policy, Terms & Conditions and Site Map sit in the bar above the header, in the footer's bottom row, and at the foot of the phone menu.
* Footer columns now cover the religions, the reference pages and Insights topics.
* The Terms page is now titled Terms & Conditions.

= 2.10.0 - 2026-09-17 =
* Articles are now called Insights, at /insights/.
* The Knowledge Base section is now called Reference, at /reference/.
* The main menu and footer link to the Know Islam knowledge base, marked as an external site.
* Old addresses redirect to the new ones, and Tools can update old links inside your pages.

= 2.9.0 - 2026-09-17 =
* New optional Further reading list at the foot of articles, set under Theme Options > Navigation.
* The About and Editorial Policy pages describe the site's editorial method more precisely.
* Comparative Studies and Sacred Texts gain short notes on divine unity and on how the Qur'an has been transmitted.

= 2.8.0 - 2026-09-17 =
* Hebrew, including vowel points and cantillation, now displays in a bundled typeface on every device.
* Aramaic displays in the script it is written in: square Hebrew letters, Syriac or Imperial Aramaic.
* The Judaism page shows key terms in Hebrew; Sacred Texts gains a section on Aramaic; the Glossary adds five terms.

= 2.7.0 - 2026-09-17 =
* Bold transliterated words such as Ḥadīth now show every letter in bold.
* Ancient Greek displays in full, including accents and breathings.
* New block style "Typewriter note" for archival notes and document transcriptions.
* New block style "Arabic calligraphy" for short decorative Arabic lines.

= 2.6.0 - 2026-09-17 =
* The AR monogram is now the site logo, beside the name in the header and footer. Choose mark and name, mark only or name only under Theme Options > Header.
* The monogram is also the browser and home screen icon until a Site Icon is set.

= 2.5.0 - 2026-09-17 =
* The main menu is limited to five links: Religions, Sacred Texts, Knowledge Base, Articles and About, with dropdowns for the pages inside each.
* A slim secondary menu above the header holds quick links such as the timeline, figures, glossary and contact page.
* The full menu now shows from 1024 pixels wide.

= 2.4.1 - 2026-09-17 =
* Main menu links now have rounded corners, a soft fill when the pointer rests on them, and a solid fill for the section you are in, on desktop and in the phone menu.

= 2.4.0 - 2026-09-17 =
* Pages are now organised into Religions, Knowledge Base and About sections, with articles and topics under /articles/.
* New pages: Knowledge Base, History and Timeline, Frequently Asked Questions, Topics and Site Map.
* Breadcrumbs, a site map, related articles and a helpful page-not-found screen.
* Search descriptions, social sharing tags and structured data, plus Google and Bing verification and Google Analytics.
* Menus are now edited under Theme Options > Navigation.
* Earlier addresses redirect to the new ones.

= 2.3.0 - 2026-09-17 =
* The theme now fills a new site with starter pages, eight articles and topic categories, and sets up the front page and web addresses.
* Deleted starter items stay deleted; Theme Options > Tools lists them and can restore them.
* New contact address option for the Contact page.
* Topic cards now open their category pages.
* Fixed bold text appearing at regular weight.

= 2.2.1 - 2026-09-17 =
* Sabon Next LT is now bundled complete, including its Greek and Cyrillic letters, which load only on pages that use them.
* Dotted transliteration letters such as ḥ always show the dot centred under the letter.
* The Theme Options system information and a warning on the Themes screen confirm the Sabon files are in place.

= 2.2.0 - 2026-09-17 =
* Settings moved to Appearance > Theme Options, with new Header, Footer and Tools tabs.
* Logo wording, header buttons and footer wording are now set in Theme Options.
* Export, import and reset tools, plus a system information table.
* Fixed the on/off switches on the options screen.

= 2.1.1 - 2026-09-17 =
* Theme licensed under the GNU General Public License, version 2 or later.

= 2.1.0 - 2026-09-17 =
* Footer profile links now cover 45 networks, drawn from the Minimalist Social & Platform Icons Pack.
* The Social settings tab groups the networks by type and includes a filter.

= 2.0.1 - 2026-09-17 =
* Licence statements and the separate font licence file removed.

= 2.0.0 - 2026-09-17 =
* Theme renamed to Abrahamic.
* Layouts tuned for phones, portrait tablets and landscape tablets; the menu collapses into a full-screen panel below 1280 pixels.
* Files reorganised and documentation added.

= 1.1.0 - 2026-09-17 =
* Typeface changed to Sabon Next LT, with support for Arabic transliteration letters.

= 1.0.0 - 2026-09-17 =
* First release.

== Copyright ==

Abrahamic WordPress Theme, Copyright 2026 Abrahamic Religions.
Abrahamic is distributed under the terms of the GNU General Public License.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

Abrahamic is a child theme of Twenty Twenty-Five WordPress Theme, (C) 2024-2026 WordPress.org and contributors.
Twenty Twenty-Five is distributed under the terms of the GNU GPL.

This theme bundles the following resources:

Code adapted from four WordPress plugins, all under the GNU GPL:

Login Logo 0.10.3 (inc/login.php, the login-logo.png convention)
Copyright 2011-2024 Mark Jaquith
License: GPLv2 or later

WPS Hide Login 1.9.18 (inc/login.php, the private login address)
Copyright WPServeur, NicolasKulka, wpformation
License: GPLv2 or later

Unlist Posts & Pages 1.2.1 (inc/unlist.php)
Copyright Nikhil Chavan
License: GPLv2 or later

Pretty Search Permalinks 1.3 (inc/search.php, search addresses)
Copyright Angel Costa
License: GPLv2 or later

Interface icons (inc/icons.php)
Copyright 2026 Abrahamic Religions
License: GPLv2 or later

Minimalist Social & Platform Icons Pack 2.8 (assets/icons/social/, 43 icons)
License: GNU GPL

LinkedIn and Scribd marks (assets/icons/social/linkedin.svg, scribd.svg)
Source: Simple Icons, https://simpleicons.org
License: CC0 1.0 Universal, https://creativecommons.org/publicdomain/zero/1.0/

EB Garamond 1.003, transliteration and Greek subset (assets/fonts/eb-garamond-supplement*.woff2)
Copyright 2017 The EB Garamond Project Authors
Source: https://github.com/octaviopardo/EBGaramond12
License: SIL Open Font License, Version 1.1, https://openfontlicense.org
The full licence text is embedded in each font file.

Noto Serif Hebrew 2.003, Noto Sans Syriac 3.000, Noto Sans Imperial Aramaic 2.002 (assets/fonts/noto-*.woff2)
Copyright 2022 The Noto Project Authors
Source: https://github.com/notofonts
License: SIL Open Font License, Version 1.1, https://openfontlicense.org
The full licence text is embedded in each font file.

Symbols watermark (assets/images/symbols.png)
Supplied by the site owner under the GNU General Public License.

Special Elite 1.001 (assets/fonts/special-elite.woff2)
Copyright 2010 Brian J. Bonislawsky DBA Astigmatic (AOETI)
License: Apache License, Version 2.0, https://www.apache.org/licenses/LICENSE-2.0
The full licence text is embedded in the font file.

Arslan Wessam A 1.00, Arabic subset (assets/fonts/arslan-wessam.woff2)
Copyright Arslan, Dev-Point.com
The font file states no licence terms. It is included for this site at the owner's request and is not covered by the GNU GPL.

Sabon Next LT, complete, bundled with the theme (assets/fonts/sabon-next-lt-*.woff2, 8 files)
Copyright 2002-2015, 2018 Monotype GmbH
License: proprietary Monotype licence. This typeface is not covered by the GNU GPL and may be redistributed or served only as the Monotype licence permits.

Brand names and marks belong to their respective owners. Their use here identifies the linked profiles and implies no endorsement.
