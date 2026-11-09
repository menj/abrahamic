# Abrahamic

WordPress child theme of Twenty Twenty-Five for [abrahamic-religions.com](https://abrahamic-religions.com/).

| | |
|---|---|
| Version | 2.96.20 |
| Licence | GNU GPL v3 or later; the full text is in `LICENSE` |
| Type | Child theme of Twenty Twenty-Five |
| Requires | WordPress 6.7, PHP 7.4, Twenty Twenty-Five installed |
| Tested up to | WordPress 7.1, PHP 8.3 |
| Author | Abrahamic Religions |

Identity, naming rules, tokens, breakpoints, the settings schema and the decision record are maintained in [`ssot.md`](ssot.md). Release history is in [`changelog.md`](changelog.md); upgrade steps, roadmap and the release checklist are in [`upgrading.md`](upgrading.md).

---

## Error pages

WordPress shows three files from `wp-content` when it cannot build a page. The theme writes them on the first admin page after each update, and from the **Install error pages** button on Theme Options > Tools, which shows each file as installed, outdated or foreign. A file without the theme's marker is never overwritten.

| File | Shown when | Status |
|---|---|---|
| `maintenance.php` | WordPress is updating | 503, `Retry-After: 300` |
| `php-error.php` | a fatal PHP error | 500 |
| `db-error.php` | the database cannot be reached | 503, `Retry-After: 600` |

All three are self-contained (inline style, no theme file, no WordPress function, no database), send `noindex` and `no-store`, and are built by `inc/error-page-html.php`.

Every page carries the 32px mark as a `data:` icon (`abr_error_page_icon()`), so the tab icon needs no path and shows on a subfolder install and while WordPress is down.

For errors the web server answers before WordPress runs, `errors/` holds static 403, 500, 502, 503 and 504 pages, built with `php bin/build-error-pages.php`. They link the home page at `/`, so they suit a site at the domain root only.

The theme also writes a copy of each into `wp-content/abrahamic-errors/`, with the site's own home address, at the same times and under the same rules as the drop-ins. A site installed in a subfolder, such as `example.com/blog/`, gets a home link that works. Switching to another theme removes the copies. The Tools tab shows the lines for `.htaccess` with this site's addresses. For a site at the root they read:

```
ErrorDocument 403 /wp-content/abrahamic-errors/403.html
ErrorDocument 500 /wp-content/abrahamic-errors/500.html
ErrorDocument 502 /wp-content/abrahamic-errors/502.html
ErrorDocument 503 /wp-content/abrahamic-errors/503.html
ErrorDocument 504 /wp-content/abrahamic-errors/504.html
```

On a network the main site writes the files, since every site shares `wp-content`. When the main site runs another theme, the site with the lowest ID that runs Abrahamic writes them, and only that one. The last site to leave the theme removes them.

---

## Installation

1. Install Twenty Twenty-Five.
2. Upload `abrahamic-2.96.20.zip` and activate **Abrahamic**. The starter content seeder populates the site on activation.
3. Configure Appearance > Theme Options, including the Search tab.
4. Submit `/wp-sitemap.xml` in Google Search Console and Bing Webmaster Tools.

WP-CLI:

```
wp theme install twentytwentyfive
wp theme install abrahamic-2.96.20.zip --activate
wp eval 'echo count( get_option( "abr_seeded_slugs" ) );'   # runs the deferred activation hook, then reports
```

The front page template renders regardless of the Reading setting. On a new site the seeder sets Home as the front page, Articles as the posts page, and the permalink structure described below.

## Architecture

Abrahamic is a child theme (`Template: twentytwentyfive`). It adds no PHP templates. The child supplies the block templates for the front page, pages, articles, the Journal page, archives, tag archives, search results and the 404 page, plus `page-landing.html` and the header and footer parts. Any remaining template (for example attachment pages) comes from the parent and still uses the child's header and footer. `theme.json` in the child is merged over the parent's. PHP handles Theme Options, the colour scheme, shortcodes and asset loading.

```
functions.php
 ├─ inc/maintenance.php     Back-shortly notice (503); loaded first, with abr_incomplete_theme() as the upload guard
 ├─ inc/icons.php           abr_icon( $name )
 ├─ inc/favicon.php         Browser icons, manifest link, theme-color, /favicon.ico (abr_default_icons, abr_serve_favicon)
 ├─ inc/social.php          abr_social_groups(), abr_social_networks(), abr_social_key(),
 │                          abr_social_icon(), abr_social_profiles()
 ├─ inc/options.php         abr_schemes(), abr_option_types(), abr_option_defaults(),
 │                          abr_get_options(), abr_get_option(), abr_sanitize_options(),
 │                          abr_scheme_css(), abr_migrate_legacy_options()
 ├─ inc/seed-sync.php       Starter content review: fingerprints, edited items listed with a diff, supersedes map, dry run and log (Tools)
 ├─ inc/theme-options.php   Theme Options screen (twelve tabs), abr_field(), Tools handlers,
 │                          abr_render_seed_section()
 ├─ inc/shortcodes.php      Option-driven shortcodes ([abr_newsletter], [abr_social], [abr_logo] ...)
 ├─ inc/structure.php       abr_resolve_link(), abr_link(), abr_parse_menu(),
 │                          abr_primary_nav_data(), abr_breadcrumb_trail(), abr_seed_index(),
 │                          structure shortcodes
 ├─ inc/seed-schedule.php   Fixed publication dates (post_date) for seeded posts
 ├─ inc/seed.php            abr_run_seeder(), abr_seed_status(), abr_seed_permalinks(),
 │                          abr_seed_is_unedited(), seed Tools handlers
 ├─ inc/seo.php             abr_seo_description(), abr_seo_canonical(), abr_schema_graph(),
 │                          abr_seo_head(), description box, analytics
 ├─ inc/redirects.php       abr_redirect_target(), abr_legacy_redirect(), link updater
 ├─ inc/search.php          Search index, spelling variants, relevance, /search/{term}/
 ├─ inc/unlist.php          Unlisted posts and pages
 ├─ inc/progress.php        Reading progress bar
 ├─ inc/article-parts.php   In short box, mid-article next step, review note, table regions
 ├─ inc/lead-list.php       Lead and list above the Journal and archive grids (abr_lead_list, abrahamic/lead-list)
 ├─ inc/login.php           Themed login screen, private login address
 ├─ inc/diagrams.php        [abr_diagram] SVG drawings
 ├─ inc/anonymity.php       REST users, author archives, feeds and embeds kept free of people
 ├─ inc/security-detector.php  Gambling spam score (plain PHP, no WordPress calls)
 ├─ inc/security.php        Security tab: remote-publishing locks, spam gate, 410 Gone,
 │                          the two .htaccess sections at the site root, reports and clean-up
 ├─ inc/rank-math.php       Additions to Rank Math's output where an editor left a field empty
 ├─ inc/schema.php          Structured data beyond the base graph
 ├─ inc/image-sitemap.php   /image-sitemap.xml
 ├─ inc/tags.php            Fixed tag vocabulary, thin tag pages noindexed
 ├─ inc/contextual-links.php  Links in the running text (the_content, priority 30)
 ├─ inc/quran-text.php      Tanzil to KFGQPC encoding for Qur'anic verses
 ├─ inc/error-page-html.php The error pages as plain HTML (no WordPress function)
 ├─ inc/error-pages.php     wp-content drop-ins, static copies, Tools section
 ├─ inc/dev-files.php       Removes the development files from a live theme folder
 ├─ inc/data/*.json         network-links, schema-entities, gone-slugs
 └─ inc/seed/*.json         content (seed version 110), tags, focus keywords, SEO titles,
                            photo credits, legacy-v1, legacy-paths
```

### Hooks

| Hook | Callback | Purpose |
|---|---|---|
| `after_setup_theme` | `abr_setup` | Editor style, pattern category |
| `wp_enqueue_scripts` | `abr_enqueue_assets` | `abr-theme` style and deferred script; scheme variables inline; `abrTheme` settings object |
| `enqueue_block_assets` | `abr_enqueue_editor_assets` | Scheme variables in the editor |
| `wp_head` (priority 1) | `abr_preload_fonts` | Preload the Latin Sabon Regular and Bold files |
| `admin_notices` | `abr_sabon_missing_notice` | Error on the Themes and Theme Options screens if a bundled Sabon file is missing |
| `init` | `abr_register_block_styles` | Gold button style |
| `render_block_core/shortcode`, `render_block_core/html`, `render_block_core/paragraph` | `abr_render_theme_shortcodes` | Runs `[abr_…]` shortcodes inside nested patterns |
| `body_class` | `abr_option_body_classes` | `abr-no-header-search` when the search button is off |
| `admin_init` | `abr_register_settings` | Registers `abr_options` |
| `option_page_capability_abr_settings` | `abr_options_capability` | Lets `edit_theme_options` save |
| `admin_init` (priority 5), `after_switch_theme` | `abr_migrate_legacy_options` | Copies 1.x settings once |
| `admin_menu` | `abr_add_options_page` | Appearance > Theme Options; loads admin assets on that screen only |
| `admin_page_access_denied` | `abr_redirect_legacy_screen` | Sends `page=abrahamic-settings` to the new screen |
| `admin_bar_menu` (priority 100) | `abr_admin_bar_link` | Theme Options shortcut under the site name |
| `admin_post_abr_export_options` | `abr_handle_export` | Export download |
| `admin_post_abr_import_options` | `abr_handle_import` | Import |
| `admin_post_abr_reset_options` | `abr_handle_reset` | Reset to defaults |
| `after_switch_theme` | `abr_seed_on_activation` | Runs the starter content seeder |
| `admin_init` (priority 20) | `abr_seed_on_upgrade` | Runs the seeder when `ABR_SEED_VERSION` rises |
| `admin_post_abr_seed_run` | `abr_handle_seed_run` | Tools: add missing starter content |
| `admin_post_abr_seed_restore` | `abr_handle_seed_restore` | Tools: restore one deleted starter item |
| `admin_post_abr_update_links` | `abr_handle_update_links` | Tools: point content links at current addresses |
| `render_block_data` | `abr_primary_nav_data` | Header menu from Theme Options |
| `wp_head` (priority 2) | `abr_seo_head` | Verification codes; description, canonical, social tags and JSON-LD when search output is on |
| `wp_robots` | `abr_seo_robots` | `noindex, follow` on 404, date, author and attachment views |
| `robots_txt` (priority -1) | `abr_seo_robots_txt` | Disallows internal search results |
| `wp_sitemaps_add_provider` | `abr_seo_sitemap_providers` | Removes author archives from the XML sitemap |
| `after_setup_theme` | `abr_seo_supports` | Feed links, page excerpts |
| `init` | `abr_seo_register_meta` | Registers `_abr_description` |
| `add_meta_boxes`, `save_post` | `abr_seo_add_meta_box`, `abr_seo_save_meta_box` | "Search description" box |
| `admin_enqueue_scripts` | `abr_seo_editor_assets` | Description counter on the editor screens |
| `wp_enqueue_scripts`, `script_loader_tag` | `abr_seo_analytics`, `abr_seo_analytics_tag` | Google Analytics 4 |
| `template_redirect` (priority 5) | `abr_legacy_redirect` | 301s from earlier addresses |
| `the_content` (priority 12) | closure in `inc/article-parts.php` | The "In short" box at the top of an article and the next step before its third section |
| `render_block_core/table` | closure in `inc/article-parts.php` | A table in an article becomes a focusable region named by its caption |
| `add_meta_boxes_post`, `save_post_post` | `abr_article_meta_box` | The Key points and review box (`_abr_takeaways`, `_abr_reviewed`) |
| `the_content` (priority 30) | `abr_ctx_filter` | Contextual links to inner pages here and on the sister sites, after blocks, texturising and shortcodes |

The table lists the core of the theme. The later modules hook in from their own files; `grep -n "add_action\|add_filter" functions.php inc/*.php` lists every one. The ones a host or developer most often meets:

| Hook | Callback | Purpose |
|---|---|---|
| `init` | `abr_cleanup_on_version_change` | Removes the development files once per version (`inc/dev-files.php`) |
| `admin_init`, `after_switch_theme`, `update_option_abr_options` | `abr_sec_sync_htaccess` | Keeps the two root `.htaccess` sections in step, at most hourly |
| `switch_theme` | `abr_sec_remove_htaccess`, `abr_maintenance_remove_dropins` | Takes the `.htaccess` sections and the theme's own drop-ins out |
| `rest_pre_dispatch` (priority 5) | `abr_sec_rest_guard` | REST writes need a browser session and nonce |
| `wp_insert_post_data` (priority 99) | `abr_sec_gate` | Holds gambling spam as Pending |
| `template_redirect` (priority 0) | `abr_sec_send_gone`, `abr_sec_send_gone_listed` | 410 Gone for removed spam |
| `authenticate` (priority 100) | `abr_sec_refuse_remote_password` | Refuses a correct password sent through XML-RPC |

Filters provided:

| Filter | Arguments | Effect |
|---|---|---|
| `abr_seed_enabled` | bool | False stops the seeder |
| `abr_seo_enabled` | bool | Overrides the search output decision |
| `abr_image_sitemap_enabled` | bool | Overrides whether `/image-sitemap.xml` is served (off by default while an SEO plugin is active) |
| `abr_contextual_links_map` | array of phrase, url, sister | Changes the contextual link phrases |
| `abr_contextual_links_enabled` | bool, `WP_Post` | Switches contextual links off for one entry |
| `abr_sec_rest_allow` | string[] route prefixes | Routes that may write with non-cookie authentication, for example `/jetpack/`. Empty by default |
| `unlist_posts_enabled` | bool | False turns the unlist feature off. Named as in the plugin it was built from |

Action provided: `abr_cleanup_tick`, fired for each entry the development-file clean-up walks, which renews its lease.

### Shortcodes

| Shortcode | Output |
|---|---|
| `[abr_newsletter]` | Intro text and sign-up form posting to the configured URL. Without a URL, visitors see the text only and editors see a setup notice |
| `[abr_social]` | A list of icon links for every network with a saved URL, in registry order |
| `[abr_icon name="scroll"]` | Inline SVG. Interface names come from `inc/icons.php`; any social network slug returns that network's mark |
| `[abr_logo]` | Logo from the Header tab: AR mark and name, mark only, or name only, linked to the home page |
| `[abr_header_cta]` | Header button from the Header tab; empty when switched off or incomplete |
| `[abr_footer_brand]` | Footer title, tagline and description from the Footer tab |
| `[abr_copyright]` | Copyright paragraph; `{year}` becomes the current year |
| `[abr_footer_note]` | Footer note paragraph; empty when the option is empty |
| `[abr_year]` | Current year |
| `[abr_art_note text=""]` | Guidance on a placeholder panel, shown only to signed-in editors |
| `[abr_mode_toggle]` | The light and dark switch for the header |
| `[abr_search_results]` | Search results with section, marked passage and pagination |
| `[abr_citation]` | A "Cite this page" box with a Copy button |
| `[abr_answer_box summary="" points=""]` | "In short": the article's key points, or its own summary and points (`;;` between points). The theme puts one at the top of the text unless the text has its own |
| `[abr_last_reviewed]` | The review note, from the Key points and review box; nothing without a date |
| `[abr_term_label]` | The word Topic or Tag above an archive title |
| `[abr_term_count]` | How many articles carry the current term |
| `[abr_tag_list]` | Every tag in use, as chips, with the current one marked |
| `[abr_photo name="" alt=""]` | A bundled photograph, falling back to the decorative panel |
| `[abr_contact_email]` | Contact address from the Footer tab, obfuscated; nothing for visitors when empty |
| `[abr_topic_url slug="history"]` | Address of a category archive |
| `[abr_secondary_nav]` | The secondary (site) menu, as the footer's bottom row |
| `[abr_header_donate]` | Red Donate button for the header |
| `[abr_donation]` | Donate page: a calm note, four US dollar amount links ($5, $10, $25, $50) and a Donate with PayPal button, all to `ABR_DONATION_BASE` |
| `[abr_further_reading]` | Further reading list from the Navigation tab; nothing when empty |
| `[abr_breadcrumbs]` | Breadcrumb trail for the current view |
| `[abr_child_pages]` | Cards for the child pages of the current page |
| `[abr_topic_index]` | Every topic with its description and article count |
| `[abr_topic_chips]` | Compact topic links; the current topic is marked |
| `[abr_page_heading]` | `h1` and introduction of the Journal page |
| `[abr_related_articles]` | Up to three articles sharing a topic with the current article |
| `[abr_reading_time]` | Reading time of the current article at 220 words a minute |
| `[abr_hub_links]` | Header menu links plus the Site Map, for the 404 and search pages |
| `[abr_site_map]` | HTML site map: page sections, articles by topic, and site information pages |
| `[abr_footer_menu column="1"]` | A footer column from the Navigation tab |

Place option-driven shortcodes in a Custom HTML block. A Paragraph block holding only a shortcode loses its `<p>`, because WordPress strips paragraph wrappers from lone shortcodes; the shortcodes above supply their own wrapper. In the Site Editor these blocks show the shortcode text; the output appears on the site.

Interface icon names: `star-of-david`, `cross`, `crescent`, `scroll`, `city`, `mosque`, `mountain`, `arrow-down`, `arrow-right`, `info`, `book`, `history`, `pray`, `globe`, `lamp`, `archway`, `handshake`, `landmark`, `search`. Social slugs are listed in `ssot.md`, section 11.

### Front-end script

`assets/js/theme.js` is dependency-free and deferred. It:

- adds `.is-scrolled` to the header after 8px of scroll;
- marks the in-view section's menu link with `.is-current` and `aria-current="location"`;
- runs the comparison tabs with arrow-key support (tabs are visible below 1024px);
- scrolls the timeline one card per arrow press;
- adds the fade-in when the setting is on and the visitor has not asked for reduced motion.

### Theme Options

Appearance > Theme Options has twelve tabs: General, Header, Footer, Navigation, Colours, Newsletter, Social, Login, Search, Contextual links, Security and Tools. All but Tools share one form and save through the Settings API. Tools posts to `admin-post.php`, except the starter content choice (`seed_mode`), whose Save this choice button submits the shared form. The Security tab's scan and clean-up buttons show to administrators only, and its reports load only when the screen opens on that tab. A tab opens from `?tab=` in the address (for example `&tab=footer`), else from the last tab used in the session. Saving returns to the same tab.

To add an option:

1. Add the key and its sanitising type to `abr_option_types()` and a default to `abr_option_defaults()` in `inc/options.php`.
2. Add an `abr_field()` call to the matching panel in `inc/theme-options.php`.
3. Read it with `abr_get_option( 'key' )`.
4. Record it in `ssot.md`, section 8.

Tools:

- **Export** downloads a JSON file with the theme slug, version, date, site address and every option.
- **Import** takes such a file (up to 1 MB). Options in the file replace current values; options missing from the file keep theirs; unknown keys are ignored; every value is sanitised.
- **Reset** asks for confirmation and writes the defaults.
- **Error pages** installs the three drop-ins and the static copies, shows each file's state, and prints the `ErrorDocument` lines for this site (see Error pages above).
- **System information** lists the theme and parent versions, WordPress and PHP versions, the active scheme, the number of social profiles, and whether options and the legacy 1.x row are stored.

### Starter content

The theme populates a new site on activation: 30 pages, 70 Journal articles and 8 categories (seed version 110), plus one-time set-up of permalinks, sample content, the privacy policy and the reading settings. `ssot.md`, section 12, holds the rules and the full inventory.

The seeder records every item it creates or adopts in `abr_seeded_slugs`. Deleted items are never recreated; Theme Options > Tools > Starter content lists every item with its status and offers Restore for deleted ones. Pages that already existed at the same address are adopted and never written to, and pages you create yourself are never touched.

When the theme ships newer starter content, Tools decides what happens to the starter pages: **Replace** (the default) writes the current version over them, including edited ones, keeping the earlier text in the page's revisions, and moves retired starter pages to the trash; **Keep my edits** refreshes only the pages nobody has changed.

To add starter content, append an item to `inc/seed/content.json` with a new key and `'since' => N`, then raise `ABR_SEED_VERSION` in `inc/seed.php` to `N`. Existing sites receive the new item on their next admin load. To disable seeding, return false from the `abr_seed_enabled` filter in a must-use plugin.

### Site structure

Journal articles live at `/journal/{slug}/` and topics at `/journal/topics/{slug}/`. Pages sit in three hubs: `/religions/` (Judaism, Christianity, Islam), `/reference/` (Sacred Texts, History and Timeline, Figures, Places, Comparative Studies, Glossary, FAQ, Research) and `/about/` (Editorial Policy, Contact), with the Site Map, Privacy Policy and Terms at the top level. Every inner page shows breadcrumbs. Addresses from 2.3.0 redirect permanently. `ssot.md`, section 13, holds the rules and the conformance tables for Google's SEO Starter Guide and supported structured data. The main menu also links to the external knowledge base at knowislam.wiki, marked with an outward arrow. Addresses from 2.4.0 to 2.9.x (`/articles/…`, `/knowledge-base/…`) redirect permanently to their new homes.

Menus are written on the Navigation tab, one `Label | target` per line. The main menu holds five top-level content links, each with up to ten dropdown links (lines starting with a dash). The secondary menu holds up to eight site links (About, Contact, Donate, policies, the external knowledge base, the site map) and appears only as the footer's bottom row. A red Donate button sits beside Explore in the header and opens the owner's payment page; the Donate page offers the same link as a Donate now button. Both links are set under Theme Options > Header, where `@donate` sends the header button to the Donate page instead. A target can be a page token such as `@guides` or `@faq`, so menus keep working when a page moves.

### Search

The theme writes a description, canonical address, social tags and structured data for every view, keeps internal search results out of the index, and removes author archives from the XML sitemap. Each post and page has a "Search description" box (130 characters or fewer, ending with a call to action). The Search tab adds verification codes, Google Analytics, a logo and a share image. With a dedicated SEO plugin active, the theme leaves all of this except verification and analytics to the plugin.

### Social profiles

`inc/social.php` holds the registry: 45 networks in six groups. The same list drives the settings fields, the option defaults, sanitising and the footer order, so a network is added in one place:

1. Save its normalised SVG as `assets/icons/social/{slug}.svg` (see `ssot.md`, section 11).
2. Add `'{slug}' => 'Label'` to the right group in `abr_social_groups()`.
3. Record it in `ssot.md`, section 11.

URLs are stored as `social_{slug}` in `abr_options`, with each hyphen in the slug replaced by an underscore (`wordpress-profile` becomes `social_wordpress_profile`). `abr_social_icon()` reads only registered slugs from disk and caches each file per request. Icons use `fill="currentColor"`, so they take the colour of the surrounding link.

The Social tab has a name filter and a live count of filled fields; filled fields show their icon in navy.

### Colour schemes

`abr_scheme_css()` prints the active scheme as `--wp--preset--color--{slug}` overrides after the theme stylesheet and in the editor. Every colour in `theme.css` reads from those variables through `--abr-*` aliases, and tints use `color-mix()`, so a scheme change needs no further CSS. To add a scheme, add an entry to `abr_schemes()` and record it in `ssot.md`, section 5.

### Typography

Sabon Next LT is bundled with the theme, complete, and must stay bundled. Each of its four faces ships as two WOFF2 files: a Latin file, which every page loads, and an extended file for Greek, Cyrillic and the rest, which browsers fetch only when a page contains those characters. `abr_sabon_files()` lists all eight; if one is missing, the Themes and Theme Options screens show an error and Tools > System information names the file. Sabon's combining accents are bundled but kept out of use, because the font positions them badly. An EB Garamond supplement, in every weight, supplies the transliteration letters Sabon lacks and sets Greek marked `lang="grc"`, limited by `unicode-range` so browsers fetch it only when needed. Hebrew and Aramaic in square script use Noto Serif Hebrew, with vowel points and cantillation; Syriac uses Noto Sans Syriac (Estrangela); Imperial Aramaic inscriptions use Noto Sans Imperial Aramaic. Each is bundled, applied by language tag, and also reached as a fallback for untagged text. Arabic glosses use a system Naskh stack through `:lang(ar)`. Two display faces are available only as block styles: **Typewriter note** (Special Elite) on paragraphs and quotes, for archival notes and document transcriptions, and **Arabic calligraphy** (Arslan Wessam, Diwani) on paragraphs and headings, for short centred Arabic lines. Details are in `ssot.md`, section 6.

Writing transliterated Arabic needs no markup; the fallback applies automatically. Arabic script should be wrapped:

```html
<span lang="ar" dir="rtl">توحيد</span>
<span lang="he" dir="rtl">שמע</span>
<span lang="hbo" dir="rtl">בְּרֵאשִׁ֖ית</span>        <!-- Biblical Hebrew -->
<span lang="arc" dir="rtl">תרגום</span>          <!-- Aramaic, square script -->
<span lang="syc" dir="rtl">ܦܫܝܛܬܐ</span>          <!-- Syriac -->
<span lang="arc-Armi" dir="rtl">𐡀𐡓𐡌𐡉𐡀</span>  <!-- Imperial Aramaic -->
<span lang="grc">ὁ λόγος</span>
```

## Responsive design

Tiers are declared together at the end of `assets/css/theme.css`:

| Tier | Width |
|---|---|
| Desktop | 1280px and up |
| Tablet landscape | 1024 to 1279px |
| Tablet portrait | 601 to 1023px |
| Mobile | up to 600px |
| Small phone | up to 360px |

The Navigation block's built-in collapse point (600px) is extended to 1279px. Touch devices get 44px targets; hover effects are limited to devices with hover. Per-tier layouts are listed in `ssot.md`, section 7.

Add section-specific rules inside the matching tier block, so all width rules stay in one place.

## Editing content

All front page sections are patterns in the "Abrahamic" category and can be edited under Appearance > Editor > Templates > Front Page. Section anchors (`#religions`, `#timeline` and so on) are set on each section's Group block and are used by the header menu; keep them when editing.

Class names on blocks (`abr-*`) carry the design. Removing a class in the editor's Advanced panel removes its styling.

## Constants

Set these in `wp-config.php`, above the line that loads WordPress. Each is optional.

| Constant | Effect |
|---|---|
| `ABR_SECURITY_LOCK` | `false` turns off the three Security locks (XML-RPC, application passwords, REST writes) without changing the saved options |
| `ABR_ALLOW_CORE_FILES` | `true` takes the "Abrahamic: deny direct core files" section out of `.htaccess`, for a plugin or host that needs one of those files by address |
| `ABR_KEEP_DOTFILES` | `true` keeps `.git`, `.claude`, the other hidden entries, `tests/` and `tools/` in the theme folder. Local and development sites (`wp_get_environment_type()`) keep them without it |
| `ABR_HIDE_LOGIN` | `false` switches the private login address off, for when it is lost |
| `ABR_SPAM_THRESHOLD`, `ABR_TITLE_MAX`, `ABR_DESCRIPTION_MAX`, `ABR_TAG_MIN_POSTS` | Defined only when not already set: spam score at which a post is held (3), title length (59), description length (129), articles a tag page needs before it is indexed (3) |

Fixed in code: `ABR_VERSION`, `ABR_DIR`, `ABR_URI`, `ABR_OPTIONS_SLUG`, `ABR_SEED_VERSION` (110), `ABR_PERMALINK_STRUCTURE` (`/journal/%postname%/`), `ABR_CATEGORY_BASE` (`journal/topics`), `ABR_TAG_BASE` (`journal/tags`), `ABR_PRIMARY_NAV_MAX` (5), `ABR_NAV_CHILDREN_MAX` (10), `ABR_SECONDARY_NAV_MAX` (8), `ABR_LISTING_PER_PAGE` (12), `ABR_FURTHER_MAX` (6), `ABR_CTX_SITE`, and the security option names `ABR_SEC_*`.

## .htaccess

Three places carry rules.

The theme folder's own `.htaccess` refuses `readme.txt` and every `.md` file, answers 404 for `.claude/`, 403 for every name that begins with a dot (`.well-known` stays open) and 403 for `tests/`, `tools/`, `bin/` and `docs/`. The rules sit inside `<IfModule>`; without mod_alias, mod_rewrite refuses the same paths. `docs/`, `tests/`, `bin/` and `.claude/` also carry their own deny file, which works wherever the theme folder sits.

The site's root `.htaccess` gets two sections, written through `insert_with_markers()` on Apache only, and checked at most hourly from the admin:

- `# BEGIN Block xmlrpc.php` denies `xmlrpc.php` while the "Turn off XML-RPC" switch is on. Other themes by the same owner use the same marker, so a switch between them never writes it twice.
- `# BEGIN Abrahamic: deny direct core files` answers 403 for the PHP files in `wp-includes` (TinyMCE's loader and `ms-files.php` excepted), `wp-settings.php`, `wp-config-sample.php`, `readme.html` and `wp-admin/install.php`. It follows WordPress into its own subfolder, and is not written when WordPress sits outside the `.htaccess` folder. `ABR_ALLOW_CORE_FILES` removes it.

A theme switch removes both. The Security tab reports "unavailable" when the file cannot be written.

The `ErrorDocument` lines are the owner's to add by hand; the Tools tab prints them with this site's addresses.

## Build, test and deploy

```
set -e                                               # stop at the first failure
php bin/build-error-pages.php                       # rebuild errors/*.html
for t in tests/*.php; do php "$t" || exit 1; done   # every test, each exits non-zero on a failure
find . -name '*.php' -not -path './.git/*' -print0 | xargs -0 -n1 php -l > /dev/null   # non-zero on any syntax error
for f in assets/js/*.js; do node --check "$f" || exit 1; done
git archive --format=zip --prefix=abrahamic/ -o abrahamic-2.96.20.zip HEAD   # after the release is committed
```

Every script in `tests/` and `bin/` exits at once unless PHP runs it from the command line. The tests replace WordPress with small stubs, so they need only PHP.

`.gitattributes` keeps `.claude/`, `.gitattributes` and `tests/` out of the zip. `docs/` and `bin/` ship.

Deploy by the dashboard (Upload Theme, then "Replace active with uploaded") or by FTP. For FTP, show hidden files and upload to a temporary folder in `wp-content/themes/`, such as `abrahamic-new`, sending its `.htaccess` files (root, `assets/images/`, `bin/`, `docs/`, `tests/`) first, so on Apache their rules apply to each file as it arrives (public assets stay readable, as on the live site; Nginx relies on the server block rules below). Then swap the folder names one straight after the other, with the admin closed, since the site has no `abrahamic` folder between the two renames. If a copy straight over the live folder breaks part-way, `functions.php` checks every file before it loads any and answers visitors with the 503 notice (`abr_incomplete_theme()`); the login screen, AJAX, cron and WP-CLI carry on. The guard lives in `functions.php`, so it cannot cover a missing or half-written `functions.php`, or the moment between the two renames. Load one admin page after the upload: it writes the drop-ins, and runs the seeder when `ABR_SEED_VERSION` has risen. `abr_sec_sync_htaccess()` runs at most hourly (the `abr_sec_htaccess_checked` transient), so inside that hour the `.htaccess` sections wait for the first admin page after it; saving a changed Theme Option forces it. The first request of any kind removes the development files.

## Nginx

Nginx ignores `.htaccess`. On Nginx the theme writes neither root section and the Security tab reports the file as unavailable; the PHP side of every lock, the 410 answers, the upload guard and the clean-up still work. Put the equivalent rules in the server block, ahead of the `location ~ \.php$` block that hands PHP to FastCGI, since Nginx uses the first regular expression that matches:

```
location ~ /\.(?!well-known/) { deny all; }
location ~ ^/wp-content/themes/abrahamic[^/]*/(tests|tools|bin|docs)/ { deny all; }
location ~ ^/wp-content/themes/abrahamic[^/]*/(.+\.md|readme\.txt)$ { deny all; }
location = /xmlrpc.php { deny all; }
location ~ ^/wp-includes/(?!js/tinymce/|ms-files\.php$).+\.php$ { deny all; }
location ~ ^/(wp-settings|wp-config-sample)\.php$ { deny all; }
location = /readme.html { deny all; }
location = /wp-admin/install.php { deny all; }
error_page 403 /wp-content/abrahamic-errors/403.html;
error_page 500 /wp-content/abrahamic-errors/500.html;
error_page 502 /wp-content/abrahamic-errors/502.html;
error_page 503 /wp-content/abrahamic-errors/503.html;
error_page 504 /wp-content/abrahamic-errors/504.html;
```

The `abrahamic[^/]*` in the theme rules also covers the `abrahamic-new` and `abrahamic-old` folders of an FTP update, which Nginx would otherwise serve while both sit on the server.

Nginx serves `error_page` for PHP's own 500 and 503 answers only with `fastcgi_intercept_errors on;` in the FastCGI location; without it those answers reach visitors as PHP sent them. Jetpack needs XML-RPC: leave out the `xmlrpc.php` line and also switch "Turn off XML-RPC" off on the Security tab, since the theme refuses XML-RPC in PHP too. Where the client logs in to XML-RPC, with a password or any other credential, switch the REST lock off as well, since `abr_sec_refuse_remote_password()` refuses every XML-RPC login while either switch is on. These rules do not follow the Security switches or `ABR_SECURITY_LOCK`: to let XML-RPC through, take the `xmlrpc.php` line out by hand as well. Prefix the paths when WordPress lives in a subfolder.

## Multisite

Theme Options, the seeder and its tombstones, the Security settings and logs are per site. The rest is shared:

- The drop-ins and `wp-content/abrahamic-errors/` serve every site. The main site writes them; while it runs another theme, the site with the lowest ID that runs Abrahamic does. The last site to leave the theme removes them.
- The private login address is off on a network; the Login tab says so.
- The root `.htaccess` is one file for the network, and it holds whatever the site that last synced it wanted. The xmlrpc.php section follows that site's own "Turn off XML-RPC" switch, so a sync from a site with the switch off takes the section out for the whole network. A theme switch on any one site removes both sections until another site's next admin check writes them back (see the roadmap in `upgrading.md`). Keep the Security switches the same on every site.

## Browser icons

`inc/favicon.php` prints the icon tags on `wp_head`, `login_head` and `admin_head` while no Site Icon is set: `favicon.svg`, `favicon-32.png`, `icon-192.png`, `apple-touch-icon.png`, `site.webmanifest` and `theme-color` #172033. With a Site Icon, WordPress prints its own tags and the theme prints none.

`/favicon.ico` reaches WordPress when no such file sits in the site root. The theme answers it with `assets/images/favicon.ico` (16, 32 and 48px), `Cache-Control: public, max-age=86400` and an ETag; a matching `If-None-Match` gets a 304. It hooks `template_redirect` at priority 0 so HEAD requests get the same headers, and `do_faviconico` as well. With a Site Icon, WordPress redirects to it. On a site in a subfolder, such as `example.com/blog/`, browsers still ask for `example.com/favicon.ico`, which WordPress never sees: put a copy of `assets/images/favicon.ico` at the domain root there. The head tags cover the pages either way. If a Site Icon is set, put that icon there as favicon.ico instead.

The manifest is a static file with relative icon paths, so it works on a subfolder install. `assets/images/.htaccess` gives `.webmanifest` the type `application/manifest+json` and `.ico` the type `image/x-icon`; on Nginx the stock `mime.types` covers both. No deny rule touches `assets/images/`.

## Lead and list

`templates/home.html` and `templates/archive.html` carry `<!-- wp:abrahamic/lead-list /-->` above the query. The block draws only on page 1 of the Journal and of an archive. It takes the first six posts of the main query, so it follows the same order, the same unlisted rule (`abr_unlist_pre_get_posts()`) and the same posts per page.

`abr_lead_list( array $posts, array $args )` returns `array( 'html' => ..., 'ids' => ... )`. `$args` takes `heading`, `heading_id`, `lead_id` and `max` (at most five). A `lead_id` leads and leaves the list; an unlisted or unpublished one is ignored. The block's `leadId` attribute passes it. The heading reads "Latest articles", or "Latest in" and the topic or tag name on an archive; the `heading` attribute replaces it.

It draws nothing when fewer than five posts are left, or when the lead has no featured image, and the grid shows alone. When it draws, `pre_render_block` hands the grid's post template the main query without the six posts it showed, and `render_block` puts them back, so pagination and everything after the grid see the whole query.

Markup: a `<section aria-labelledby>` with an `h2`, the lead as `<article><figure>` with the title link on the photograph and the credit in a `<figcaption>` outside it, and the list as a `<ul>` whose thumbnails carry `alt=""`. The credit is the photograph's entry in `inc/seed/photo-credits.json` when the featured image is the seeded one (`_abr_seed_photo`), otherwise the attachment caption.

The block adds category tabs, hover, focus and pressed states (one `--abr-ll-on` variable drives them), a date and reading-time line, and a fade-up from `assets/js/lead-list.js`. The Colours tab sets `ll_tabs`, `ll_motion` and `ll_accent`; the filters are `abr_lead_list_show_tabs`, `abr_lead_list_motion` and `abr_lead_list_accent`.

`assets/css/lead-list.css` loads on the first page of the Journal and of the archives that use `archive.html` (`abr_lead_list_assets()`, `wp_enqueue_scripts` at 20). It is not enqueued from the block: an enqueue made while the template renders prints `theme.css` above the core block styles, which then win over it. Columns run `minmax(0,3fr) minmax(0,2fr)` and stack under 782px. The title sits on `rgb(0 0 0 / .85)`, which fades to clear above it, so white type stays above 4.5:1 on any photograph. Each card is one link; its `::after` covers the card and takes the focus ring. List titles clamp at three lines. Hover zoom stops under `prefers-reduced-motion`.

## Donations (2.96.18)

`inc/options.php` defines `ABR_DONATION_BASE` (the site's PayPal.me link) and the helpers `abr_donation_amounts()` (5, 10, 25, 50), `abr_donation_amount_url()` (base plus `/25USD`), `abr_donation_url_is_valid()` (the base, or the base plus `/<whole dollars>USD`, and nothing else), `abr_donation_url()` and `abr_donation_rejected_options()`. There is no currency setting and no other currency.

`donation_url` has the option type `donation`: Theme Options shows it as read-only text, a posted value is ignored, and a stored value is kept as it is. `header_donate_url` accepts `@donate` or a valid link; anything else prints the Donate page link and raises a notice on the Header tab. Output links carry `rel="noopener noreferrer"`. No PayPal script or tracking loads. `php tests/donation-test.php` covers the rules.

Testing performed for 2.96.18: the header button, the Donate page and the Header tab at 375 and 1280 pixels, no overflow, axe clean; the four amount links end in 5USD, 10USD, 25USD and 50USD.

## Testing performed for 2.96.17

- Playwright at 320, 360, 375, 390, 414, 480, 768, 1024 and 1280 pixels on 16 page types: no horizontal overflow at any width, no new axe violation, and the 1024 and 1280 layouts unchanged.
- Menu button: keyboard open, `aria-expanded` true and false, focus trap, Escape to close, focus back on the button. The header search toggle behaves the same way.
- `php tests/*.php` and `php -l` pass.

## Testing performed for 2.96.12

- 68 posts, 65 of them with photographs: the Journal and a topic archive at 1280 and 375 pixels, light and dark. axe reports nothing.
- Page 1 shows 12 posts (six in the lead and list, six in the grid) and page 2 starts at the 13th.
- Three posts in a category, and a newest post with no featured image: the grid shows alone, as before.
- An unlisted post stays out of the list; a `lead_id` leads and leaves the list; an unlisted `lead_id` is ignored.
- `php tests/lead-list-test.php` and every other test pass.

## Testing performed for 2.96.11

- With no Site Icon: the six tags on the home page, the login screen and the dashboard. With one: only WordPress's tags.
- `/favicon.ico`: 200 `image/x-icon`, 304 on a matching ETag, HEAD with the icon's type; with a Site Icon, a 302 to it.
- `site.webmanifest` parses as JSON; the tab shows the AR mark in Chromium.

## Testing performed for 2.80.0

- Every article and page scored in Rank Math 1.0.279's own editor panel: all 85 green (81 to 88). Titles, descriptions, tables of contents, redirects from the shortened addresses and phone layout checked. No PHP notices.

## Testing performed for 2.78.0

- Fourteen new articles: featured images attached, notes linked both ways, titles under 60 and descriptions under 130; no repeated photographs across 55 articles. No PHP notices.

## Testing performed for 2.77.0

- Tested with Rank Math 1.0.279 active: titles, descriptions, social titles, focus keywords, merged structured data, and Rank Math's own settings taking precedence. No PHP notices.

## Testing performed for 2.75.0

- Structured data parsed on an article (3 licensed images, speakable), a question-and-answer article (FAQPage with 8 questions), the Places page (9 licensed images) and the FAQ (30 questions). No PHP notices.

## Testing performed for 2.72.0

- Article and reference page render with notes linked both ways; FAQ entry present; no PHP notices.

## Testing performed for 2.71.0

- Seven new articles: featured images attached, notes linked both ways, verse blocks rendered, no overflow at 390 pixels; no repeated photographs across 38 articles. No PHP notices.

## Testing performed for 2.70.0

- FAQ renders 25 questions, all 25 in the FAQPage structured data; chart renders; updated pages answer 200. No PHP notices.

## Testing performed for 2.69.0

- Parallax banners: movement, frame cost, reduced motion and phone layout checked. No PHP notices.

## Testing performed for 2.68.0

- Section bar, active-section marking, smooth scrolling, Back to top links and the fixed header checked at 1440 and 390 pixels. No PHP notices.

## Testing performed for 2.67.0

- Front page rendered in its new order with chapter labels and alternating backgrounds. No PHP notices.

## Testing performed for 2.66.0

- Featured-image retry reproduced and confirmed; all Journal cards have images; heritage watermark shows four symbols. No PHP notices.

## Testing performed for 2.65.0

- Places page: 10 sections, 10 distinct photographs, 23 notes linked both ways, no overflow at 390 pixels. No PHP notices.

## Testing performed for 2.64.0

- Maintenance notice tested for a missing theme file, a fatal error and an update in progress; 503 and Retry-After confirmed. No PHP notices.

## Testing performed for 2.63.0

- All seven site pages render with content and their new titles after reseeding. No PHP notices.

## Testing performed for 2.62.0

- Main menu with five links checked at three widths; one-time menu update tested. No PHP notices.

## Testing performed for 2.61.1

- Footer navigation bar checked on desktop and phone; header has no top bar. No PHP notices.

## Testing performed for 2.61.0

- Top bar checked at 1440 and 390 pixels. Anonymity checks: REST user list 404, ?author=1 301 to the Journal, users sitemap 404, Article schema author is the Organization, feed creator and oEmbed author are the site name. No PHP notices.

## Testing performed for 2.60.0

- Ḥirāʾ and Qubāʾ article: 10 notes linked both ways, six verse lines, three inline photographs, no overflow at 390 pixels; photograph audit clean across 31 articles. No PHP notices.

## Testing performed for 2.59.0

- Hajj article: 9 notes linked both ways, two verse lines, three inline photographs, no overflow at 390 pixels; no duplicate Journal photographs across 30 articles. No PHP notices.

## Testing performed for 2.58.0

- Hagia Sophia article: 14 notes linked both ways, verse block rendered, no overflow at 390 pixels; no duplicate Journal photographs across 29 articles. No PHP notices.

## Testing performed for 2.57.3

- Nicaea article re-rendered with the new paragraphs; 22 notes intact. No PHP notices.

## Testing performed for 2.57.2

- Nicaea article re-rendered: 22 notes linked both ways, new section present. No PHP notices.

## Testing performed for 2.57.1

- New article renders with 9 notes and two photographs; the front page shows eight places; no duplicate Journal photographs across 28 articles. No PHP notices.

## Testing performed for 2.57.0

- Nicaea article, Qur'an passage and twelve front-page places checked; no duplicate Journal photographs; no PHP notices.

## Testing performed for 2.56.3

- Front-page places rendered with the new Hebron photograph; the Places page still shows the original. No PHP notices.

## Testing performed for 2.56.2

- Front-page places checked with eight cards at three widths. No PHP notices.

## Testing performed for 2.56.1

- Front-page places checked at three widths with seven cards. No PHP notices.

## Testing performed for 2.56.0

- Front-page places section checked with six cards at desktop and phone widths. No PHP notices.

## Testing performed for 2.55.3

- Test site updated to WordPress 7.1.2 to match live. An empty pattern cache blanked the front page without the guard and recovered on the first request with it. No PHP notices.

## Testing performed for 2.55.2

- Family tree rendered; the browser confirms every line, box and label stays inside the drawing. No PHP notices.

## Testing performed for 2.55.1

- Both diagrams checked in light and dark; every label of the four-set diagram verified by geometry to sit in its region, and by the browser to stay inside the drawing. No PHP notices.

## Testing performed for 2.55.0

- New article and both diagrams checked in light, dark and at phone width; 13 old addresses redirect. No PHP notices.

## Testing performed for 2.54.2

- An emptied featured-image file was replaced on the next check; all live Journal and front-page images checked for content. No PHP notices.

## Testing performed for 2.54.1

- Featured-image repair tested against a deleted photograph, a deliberately removed image and a missing file; card titles checked on the Journal page. No PHP notices.

## Testing performed for 2.54.0

- Seed version 51 created the article with its featured image; 20 notes link both ways; two inline photographs; no duplicate photographs across 25 articles; the Sabians article links to it. No PHP notices.

## Testing performed for 2.53.2

- `ABR_HIDE_LOGIN` checked undefined, false and true against the private login address. No PHP notices.

## Testing performed for 2.53.1

- Centred login layout checked at 1440 and 390 pixels, light and dark, and with an error message. No overflow, no PHP notices.

## Testing performed for 2.53.0

- See the Tested section of the 2.53.0 changelog entry: login screen in four views, the private address end to end with a real login, unlisting across every listing, and the search redirect. No PHP notices.

## Testing performed for 2.52.2

- Re-ran the style audit after the rewrite: no remaining banned vocabulary or contrastive constructions outside proper names and quotations. Full reseed (version 50); the seven most heavily edited articles return 200 with all footnotes linked both ways. No PHP notices.

## Testing performed for 2.52.1

- Crawled all 53 rendered pages for self-referential phrasing after a full reseed (version 49): none remain outside the legal pages and Editorial policy. No PHP notices.

## Testing performed for 2.52.0

- Seed version 48 created the article with its featured image; 16 notes render and link both ways; two inline photographs; zero cross-article photo duplicates across 24 articles (72 images). No PHP notices.

## Testing performed for 2.51.1

- Seed version 47 refreshed the population article; all 14 notes render in order and link both ways, and the new section appears. No PHP notices.

## Testing performed for 2.51.0

- Confirmed in a live browser: body line-height computes to 1.5 times its font size; article, card, FAQ and footnote paragraphs all compute to `text-align: justify`; headings keep their own line-heights unaffected. No horizontal overflow at 1000 or 390 pixels; `/`, an article, the FAQ and the Glossary all return 200 with no PHP notices.

## Testing performed for 2.50.0

- Seed version 46 created the article with its featured image; all 10 notes render in order and link both ways. Full cross-article photo audit across all 23 Journal articles: zero duplicates, 69 distinct images. Confirmed the three new credits on the Copyright and DMCA page and the cross-link from the Bible-and-Qur'an article. No PHP notices.

## Testing performed for 2.49.1

- Reset to default options: the header's top-level menu now reads Religions, Reference, Journal, and the Reference dropdown lists all eight of its children (Sacred texts, History and timeline, Figures, Places, Comparative studies, Glossary, FAQ, Research) in order. Confirmed against the footer menu and breadcrumb trails, which already matched this structure. No PHP notices; `/`, `/reference/`, `/reference/sacred-texts/` and `/reference/timeline/` all return 200.

## Testing performed for 2.49.0

- Seed version 45 created the article with its featured image; all 11 notes render in order and link both ways. Full cross-article photo audit across all 22 Journal articles: zero duplicates, 66 distinct images. Confirmed the three new credits on the Copyright and DMCA page. No PHP notices.

## Testing performed for 2.48.0

- Seed version 44 created the article with its featured image; all 15 notes render in order and link both ways. Full cross-article photo audit across all 21 Journal articles: zero duplicates, 63 distinct images. Confirmed the cross-link from The king and the Pharaoh and the two new credits on the Copyright and DMCA page. No PHP notices.

## Testing performed for 2.47.1

- Requested a nonexistent URL directly: confirmed the server still returns a genuine 404 status, and the page shows the new heading and standfirst text.

## Testing performed for 2.47.0

- Confirmed in a live browser: the search icon is the last item in the header actions row; the mode toggle's computed width increased from about 49.6px to 56.8px; clicking the search icon opens the field and focuses it, a second click closes it, a click elsewhere closes it, and Escape closes it and returns focus to the icon. No horizontal overflow at 1280 or 390 pixels with the field open.

## Testing performed for 2.46.1

- Screenshotted the hero, introduction and About sections at 390px: photograph appears above the text in all three. Confirmed at 1280px the two-column side-by-side layout is unchanged, and no horizontal overflow at either width.

## Testing performed for 2.46.0

- Crawled all 49 seeded pages for "shia", "ayatollah", "sistani", "najaf", "ja'fari" and "twelver": no hits anywhere. Confirmed the King Abdullah I Mosque photograph renders on the Amman Message article and its credit appears on the Copyright and DMCA page.
- Confirmed `.abr-prose p` computes to `text-align: justify` in a live browser, that footnotes and the further-reading line remain left-aligned, and that no page overflows horizontally at 900 or 390 pixels.

## Testing performed for 2.44.1

- Full reseed (version 40); confirmed the Sabians article renders both photographs and no PHP notices; re-ran the cross-article duplicate audit on all 20 Journal articles: zero duplicates, zero articles short of two accompanying photographs.

## Testing performed for 2.44.0

- Full reseed (version 39); a script-driven audit of all 20 Journal articles' `photo` field and inline `[abr_photo]` shortcodes confirmed zero photographs shared between any two articles, across 59 distinct images. All 39 new image files return 200 when requested directly. `php -l` clean; no PHP notices.

## Testing performed for 2.43.0

- FAQ page: confirmed FAQPage JSON-LD present with twelve question/answer pairs matching the page's visible content.
- An edited article (Who was Abraham?) shows "Last updated" with a correct date; confirmed the shortcode returns nothing on a page whose modified date is within a day of publication. `php -l` clean on all files; no PHP notices; `/`, `/reference/faq/`, `/journal/` and `/about/` all return 200.

## Testing performed for 2.42.3

- Full reseed (version 37); confirmed the Donate page shows the reworded sentence. No PHP notices.

## Testing performed for 2.42.2

- Full reseed (version 36); crawled all 43 seeded URLs for "this page", "this policy", "this website", "this platform", "this resource", "published here", "listed here", "fourth" and "treats it as": no hits anywhere on the site. No PHP notices.

## Testing performed for 2.42.1

- Full reseed (version 35); crawled all 43 seeded URLs for "fourth" and "treats it as"/"treated here": no hits. No PHP notices.

## Testing performed for 2.42.0

- Full reseed on the local site (seed version 34); crawled all 43 seeded URLs for "this site": no hits, including the Privacy policy page's meta description, tags and JSON-LD, which had been stuck on the old wording until the description-sync fix. No PHP notices.

## Testing performed for 2.41.1

- Searched the full content file for "Ragi": none remain. Confirmed "Ismaʿil Raji al Faruqi" renders on the Comparative studies page. No PHP notices.

## Testing performed for 2.41.0

- Reset to default options and reseeded: header dropdown, footer menu, front-page tradition cards, Sacred-texts cards, and compare tabs and columns all read Judaism, Mandaeism, Christianity, Islam. The Comparative studies table header and Sacred texts section order confirmed the same. All seven affected URLs return 200; no PHP notices.

## Testing performed for 2.40.0

- Crawled all 43 seeded URLs after seed version 31: 319 internal links in page content, 40 distinct targets, every one returning 200; no page links to itself; no nested links. The related-articles block excludes the current article. No PHP notices.

## Testing performed for 2.39.0

- Seed version 30 created the article with its featured image; eleven notes render in order and link both ways; the Figures page shows four notes; the article appears on the front page. No PHP notices.

## Testing performed for 2.38.2

- Seed version 29 refreshed the John the Baptist article; its twelve notes are in order and linked both ways. No PHP notices.

## Testing performed for 2.38.1

- Colour-mode switch measured in light and dark positions at 1440, 1280 and 560 px: the knob sits 3.2 px from the track on top, bottom and the near end in both states.

## Testing performed for 2.38.0

- Seed version 28 created the Sabians article with its featured image; all seventeen notes render and link both ways; the Mandaeism page links to it. No PHP notices.

## Testing performed for 2.37.0

- Seed version 27 refreshed nine items; each revision renders; footnotes on Comparative studies (five), Figures (three), Who was Abraham? (four) and the scripture article (one) are in order and linked both ways. No PHP notices.

## Testing performed for 2.36.0

- Seed version 26 on the local site created both articles with their featured images; each renders with all its notes linked both ways (ten and seven) and appears on the Journal page and the front page. No PHP notices.

## Testing performed for 2.35.2

- Religion cards in light and dark mode: the darfash takes the scheme gold and all four titles sit at the same height at 1280, 800 and 390 pixels; one column up to 560 pixels, with no title broken mid-word.
- The Mandaeism page opens with the drawing, 240 pixels tall, and its caption. `php -l` clean; no PHP notices.

## Testing performed for 2.35.1

- Seed version 24 on the local site: the Mandaeism page shows note 8 and the Places page note 1, both linked both ways; the Glossary entry reads with both views. `php -l` clean; no PHP notices.

## Testing performed for 2.35.0

- Upgrade from 2.34.0 on the local WordPress 7.1.1 site: seed version 23 ran; sixteen checks confirmed the new Mandaean passages on the front page, Figures, Sacred texts, Places, Glossary, Comparative studies, History and timeline, FAQ, About and three articles; the three category descriptions updated.
- Front page grids: texts and figures at four columns (1280 px), two (800 px), and one and two (390 px); ten timeline periods; no horizontal overflow. `php -l` clean; no PHP notices.

## Testing performed for 2.34.0

- Places at 1280 pixels in light mode and 390 pixels in dark mode: four photographs become buttons; a click opens the viewer with the 2000-pixel Jerusalem file, focus moves to the close button and page scroll locks; Escape closes it and returns focus to the photograph; a click outside the photograph closes it. No script errors, no horizontal overflow.
- The Tanakh opens the full Leningrad Codex folio; Mandaeism, which has no large file, opens its own photograph.
- The viewer script loads on pages with photographs and not on Contact. `php -l` clean; no PHP notices.

## Testing performed for 2.33.0

- Upgrade from 2.32.3 on WordPress 7.1.1 with SQLite and PHP 8.3: seed version 22 ran on the first request, refreshed nine items and set ten featured images; each image was copied to the media library once.
- Every changed page returned 200 and served its new photograph; the Copyright and DMCA page lists fourteen Commons sources and links.
- Front page: all seven photographs load at full resolution; no horizontal overflow at 1280 and 390 pixels on the front page, Mandaeism and Journal.
- Article share previews use the featured image. `php -l` clean on every file; no PHP notices.

## Testing performed for 2.32.3

- `screenshot.png` recaptured from the current front page at 1200 x 900, showing the five-item menu, the colour switch, the Donate button, the sentence-case hero naming four traditions, and the Kaaba photograph.

## Testing performed for 2.32.2

- Swept the starter content, readme.txt and the docs for banned vocabulary, dead phrases, dead transitions, negative parallelism, copulative dodges, triads and anaphoric runs. Five real hits, all fixed; the rest were proper nouns.

## Testing performed for 2.32.1

- A site rolled back to starter content version 13, with the Mandaeism page deleted and the current theme files in place, received the page and its links from a single visitor request, with no admin visit and no PHP notices.
- With the page missing, every admin screen showed a notice naming the number of missing items; its button added them.

## Testing performed for 2.32.0

- Comparative studies opens with a section on the category itself, carrying three footnotes in document order; the FAQ gains an eleventh question and the Glossary entry the date of the term.
- Seed version 20 refreshed the three pages; 47-page crawl clean; no PHP notices.

## Testing performed for 2.31.0

- Article pages show the dark title panel with the gold rule aligned to the text edge, a raised opening letter, gold diamonds between sections, and references in two columns from 900 pixels.
- The citation box copies its text to the clipboard and confirms; no page scrolls sideways at 390 pixels.

## Testing performed for 2.30.0

- Measured before and after at 1440, 1280, 1024, 768 and 390 pixels: lines fall from about 80 characters to about 74, body type rises from 19 to 19.5 pixels with line height 1.78, and the space above the content rises from 44 to 64 pixels.
- Breadcrumbs, title, headings, paragraphs, lists and notes share one left edge at every width.
- The surah table and photographs now span up to 1180 pixels and return to the column below 1240; no page scrolls sideways.

## Testing performed for 2.29.0

- The Mandaeism page carries seven footnotes, markers and notes matching, each "Ibid." following its own work.
- Header and layout checked in 8px steps from 320 to 1440 pixels on five pages: no wrapped menu, no sideways scrolling. Two faults were found and fixed: the menu wrapped onto two rows from 1024 to about 1152 pixels, and the header pushed the page sideways between roughly 490 and 720 pixels.
- 47-page crawl clean; no PHP notices.

## Testing performed for 2.28.1

- With the Mandaeism page absent, the front page renders no links to it (three cards, no lineage node); with the page present, four cards and the node return. Its own address answered 404 before this fix while the front page still linked to it.
- Front page text now describes four traditions in the heritage, introduction and FAQ sections; the Jerusalem and Sinai cards name the traditions concerned instead of saying "all three".
- 47-page crawl clean; no PHP notices.

## Testing performed for 2.28.0

- Islam carries eight footnotes, Judaism and Christianity two each; markers run in document order, notes match, anchors and back-links work.
- Fresh install, 47-page crawl clean, no PHP notices.

## Testing performed for 2.27.0

- Audit of nine representative pages against Google's starter guide: unique titles and descriptions, one `h1` each, no heading-level skips, no images without alt text, no vague anchors, robots.txt blocking search results and declaring the sitemap. The single finding, a 76-character home page title, is now 61.
- Sentence case applied to page and article titles, section headings, eyebrow labels, buttons and menu labels; the list of earlier default menus keeps its original wording so menus saved before the change still map forward.
- Fresh install, 47-page crawl clean, no PHP notices.

## Testing performed for 2.26.0

- The Islam page carries a new section with five footnotes, Sacred Texts and Comparative Studies one each; markers and notes match, and the back-links work.
- 47-page crawl clean; no PHP notices.

## Testing performed for 2.25.0

- The front page comparison shows five rows in each of the four columns with a link to the full version; Comparative Studies opens with the full table of eleven themes by four traditions.
- The table scrolls inside its own box at 390 pixels with no page overflow; 47-page crawl clean; no PHP notices.

## Testing performed for 2.24.0

- Fresh install with seed version 14: the Mandaeism page at `/religions/mandaeism/`, four religion cards, four comparison columns with four tabs on a phone, six lineage nodes, and Mandaeism in the Religions dropdown and the footer.
- Search for "sabians" returns the Mandaeism page first; 47-page crawl clean; no overflow at 390 pixels; no PHP notices.
- `ABR_SEED_VERSION` had drifted to 12 and is now 14, so existing sites receive the pages added at 13 and 14.

## Testing performed for 2.23.1

- The main menu shows five entries, of which Journal is now a plain link; the phone menu matches; no overflow at 1280 pixels.
- The Journal listing's introduction ends with a link to Topics, and the Topics page still lists all eight.

## Testing performed for 2.23.0

- With three test tags applied: the tag archive shows the label, name, count, a compact list of articles and the tag chips, with the current tag marked; the topic archive keeps its card grid and topic chips.
- An article carrying tags shows a "Tagged:" line; an article without tags shows nothing.
- Count and title align at the same edge; no overflow at 390 pixels; 49-page crawl clean, no PHP notices.
- Test tags were removed afterwards, so the starter content still ships without tags.

## Testing performed for 2.22.1

- The header icon was clicked at 320, 390, 600, 768, 1023, 1024, 1280 and 1440 pixels: the field opens and takes focus, the icon stays visible, Enter submits to the results, and no width overflows. Escape and a click outside close it.
- Below 1024 pixels the field opens as a row beneath the header; from 1024 to 1279 it opens at 170 pixels; above that at full width.

## Testing performed for 2.22.0

- Sixteen queries before and after: Mecca and Makkah now return the same 8 results; Qur'an, Quran and Koran the same 12; hadith and ḥadīth the same 2; Koran returned nothing before.
- Ranking: "abraham" now leads with the two Abraham articles instead of a prayer article and hub pages.
- Whole-word expansion: pages that say "Abrahamic" no longer count as saying "Abraham", which had put the Privacy Policy among the top matches.
- Empty search and no match both show a prompt with the eight topics and the section links; results, count and title line up at the same edge; no page overflow at 390 pixels.
- Index of 38 items rebuilt on activation and from Tools; 46-page crawl clean; no PHP notices.

## Testing performed for 2.21.0

- Three pages created under Sacred Texts at `/reference/sacred-texts/tanakh/`, `/bible/` and `/quran/`; 46-page crawl clean, no PHP notices.
- Surah data checked against the Kufan count: 114 rows, verse total 6,236, 86 Makkan and 28 Madinan.
- Hebrew cells render in Noto Serif Hebrew and Arabic cells carry `lang="ar"`; tables scroll inside their own box at 390 pixels with no page overflow.

## Testing performed for 2.20.0

- Seed version 12 renamed the section and moved the addresses: articles at `/journal/{slug}/`, topics at `/journal/topics/{slug}/`, listing at `/journal/`.
- Redirects resolve in one hop from `/insights/…`, `/articles/…`, `/category/…` and the 2016 addresses such as `/abraham/`.
- Crawl of 44 pages clean; no PHP notices.
- The permalink step, previously keyed to a fixed name, is now keyed to the settings; without that fix the rename left the site on the old structure.

## Testing performed for 2.19.0

- With the default setting, an edited starter page was replaced by the current version (counted as `replaced`), its earlier text kept in revisions; a starter item no longer in the set was moved to the trash (`retired`); a page created by hand was untouched.
- With "Keep my edits", the same edit survived the run.
- Tools reports the counts; the crawl stayed clean with no PHP notices.

## Testing performed for 2.18.0

- Seed version 11 refreshed nine items; headings and anchors read `#makkah` and `#madinah`, the home page card links to the new anchor, first mentions pair the English form, and the search descriptions still carry Mecca and Medina.
- Crawl of 43 pages clean; no PHP notices.

## Testing performed for 2.17.0

- Seed version 10 refreshed the About page, the Editorial Policy and the Kedar article on an existing install; the crawl of 43 pages stayed clean with no PHP notices.
- Prose sweep over all 35 starter items: no contractions, em dashes, contrastive constructions or banned vocabulary.

## Testing performed for 2.16.1

- Seed version 9 renamed the page and its address; the footer, menus and site map listing follow, and `/site-map/` answers 301 to `/sitemap/` while the 2016 to 2023 addresses keep working.

## Testing performed for 2.16.0

- Fresh install with seed version 8: 48 actions, 35 starter items, 43-page crawl clean, no PHP notices.
- The nine addresses from the 2016 to 2023 site (`/abraham/`, `/jerusalem/`, `/millat-ibrahim/`, `/kedar/`, `/the-abrahamic-religions/`, `/dmca-policy/`, `/thank-you/`, `/sitemap/`, `/contact-abrahamic-religions/`) answer 301 to the pages that carry the material now, alongside the earlier maps.
- Footnote markers and notes match on every article; the notes list carries back-links.
- Photographs appear inside the Judaism, Christianity, Islam, Jerusalem and path of Abraham pages at 1200 pixels wide.
- Prose sweep over all 35 items: no contractions, em dashes, contrastive constructions or banned vocabulary.

## Testing performed for 2.15.0

- Nine photographs cropped from the 2023 backup to their frames and saved as WebP, 792 KB in total; hero 1200 × 1000, place cards 800 × 450, article images 1200 × 675.
- The hero and three place cards show photographs; the fourth keeps the decorative panel, and all four measure 282 × 176 at 1280 pixels, so the row stays even. An old rule fixing card images to 140 pixels was removed.
- No horizontal overflow; images carry width, height, alt text and lazy loading.

## Testing performed for 2.14.0

- The switch flips `data-abr-mode` on `<html>`, updates `aria-pressed` and its screen-reader label, and stores the choice; the choice survives navigation, applied in the head before the first paint.
- Settings: "Dark" starts dark with the switch hidden when the switch is turned off; "Follow the visitor's device" matched a light and a dark device.
- Contrast measured in both modes across body text, cards, navigation, gold labels, footer, dark bands and prose: every pair meets 4.5:1, or 3:1 for large text. Two failures found and fixed on the way: dark text on the dark footer, and a bright heritage band; the gold labels, below 4.5:1 on white since earlier releases, now use a darker gold in light mode.
- Header fits with the switch at 320, 380, 390, 768, 1024 and 1440 pixels; the switch hides up to 480 pixels.

## Testing performed for 2.13.1

- Audit of the shipped files found no framework, build or authoring fingerprints; the rendered front page carries no stray comments, empty attributes or editor-facing text.
- The hero placeholder shows its caption to visitors and adds the guidance line only for signed-in editors; starter content fingerprints unchanged.

## Testing performed for 2.13.0

- The symbols watermark renders through a CSS mask at 1280 and 390 pixels, taking the scheme gold at 9% opacity, with the band's text and diagram above it.
- Crawl and responsive sweep clean; no PHP notices.

## Testing performed for 2.12.1

- With no stored options, the header button and the Donate page button both open the owner's payment page; the header button's title reads "Opens www.paypal.com".
- A stored `@donate` with the migration flag absent became the PayPal address on the next page load; after that, saving `@donate` on the Header tab kept it and the button opened `/donate/`.
- A custom donation link replaced the Donate page button; an empty one fell back to the PayPal header link.
- No PHP notices.

## Testing performed for 2.12.0

- Header at 320, 360, 390, 480, 540, 600, 768, 1024, 1280 and 1440 pixels: one line, no overflow, Donate visible in red (#b3261e) linking to `/donate/`; Explore shown from 601 pixels; AR mark alone up to 480 pixels; no bar above the header. Hover darkens the red.
- Footer bottom row: About AR, Editorial Policy, Contact AR, Donate, Knowledge Base, Privacy Policy, Terms & Conditions, Site Map.
- Seed version 7 created the Donate page. Without a donation link it points to the Contact page; with one, it shows a red Donate now button to it.
- Crawl and responsive sweep clean; no PHP notices.

## Testing performed for 2.11.0

- At 1024, 1280 and 1440 pixels: main menu Religions, Sacred Texts, Timeline, Reference, Insights on one row; the bar above shows About AR, Editorial Policy, Contact AR, Knowledge Base, Privacy Policy, Terms & Conditions, Site Map; Reference marked as the section on Figures; no overflow.
- Footer: columns Explore, Reference and Insights with no repeats; the bottom row lists the seven site links above the copyright line, at 1280 and 390 pixels.
- Phone menu at 390 pixels: the five content links with their dropdowns, then the seven site links below a rule.
- Seed version 6 retitled Terms as Terms & Conditions.
- Crawl and responsive sweep clean; no PHP notices.

## Testing performed for 2.10.0

- Upgrade from 2.9.0 (structure `/articles/%postname%/`, one page edited to link to `/articles/…` and `/knowledge-base/…`): permalinks moved to `/journal/%postname%/` with topics under `/journal/topics/`; the posts page became Insights at `/journal/` and the reference hub Reference at `/reference/`; 10 items moved, 9 refreshed. The Tools notice listed the edited page, and Update links rewrote both links, keeping the `#terms` anchor.
- Redirects: `/articles/`, an article, the topics hub, a topic, a listing page, `/knowledge-base/` and two of its pages, a `/category/` archive and 2.3.0 addresses all answered 301 to their current homes; unknown paths under the old prefixes stayed 404.
- Header at 1280 pixels: Religions, Reference, Insights, Knowledge Base, About on one row; the Knowledge Base link opens knowislam.wiki with an outward arrow, a title and screen-reader text; Reference is marked as the section on Figures; breadcrumbs read Home, Reference, Figures. Footer and homepage show the new names.
- Fresh install: seed version 5 with 43 actions, 38-page crawl clean, sitemap addresses all 200, responsive sweep clean, no PHP notices.

## Testing performed for 2.9.0

- Seed version 4 on a version 3 site: About, Editorial Policy, Research, Comparative Studies and Sacred Texts refreshed; the Editorial Policy excerpt updated.
- Front page shows the revised about and comparison text.
- Further reading: absent from articles while empty; with two links, rendered after related articles and aligned with the column at 1100 and 390 pixels.

## Testing performed for 2.8.0

- Rendered-font report: pointed Biblical Hebrew with cantillation, bold Hebrew (weight 700), Biblical and Talmudic Aramaic from Noto Serif Hebrew; Syriac from Noto Sans Syriac with joined Estrangela forms; Imperial Aramaic from its own face; untagged Hebrew inside English text from Noto Serif Hebrew.
- Seed version 3 on a version 2 site with the Judaism page edited: Judaism kept its edit; Sacred Texts and Glossary took the new text; the other items were stamped version 3 unchanged.
- Fresh install: seed version 3, 38-page crawl clean, no PHP notices; Judaism and Sacred Texts show their Hebrew, Aramaic and Syriac glosses in line with Sabon.

## Testing performed for 2.7.0

- Rendered-font report on a test page: bold transliteration letters from EB Garamond at bold weight; tagged Greek from EB Garamond Greek; untagged polytonic letters from the fallback; typewriter paragraphs and quotes wholly in Special Elite; the calligraphy heading wholly in Arslan Wessam, spaces included; the inline Arabic gloss on the Naskh stack.
- Block style registry: Typewriter note on paragraph and quote; Arabic calligraphy on paragraph and heading. The editor canvas loads all new faces with no script errors.
- The front page references the new fonts only in `@font-face` rules and preloads Sabon alone.
- Responsive sweep and 38-page crawl clean; no PHP notices.

## Testing performed for 2.6.0

- Traced mark compared with the agreed PNG: the same layout, with 2.6% of pixels differing through anti-aliasing only.
- Each logo style at 320, 390, 1024 and 1440 pixels: no overflow; mark 44px (48px alone, 38px at 320); name shown or hidden as chosen; link label "Abrahamic Religions, home"; the mark's square takes the scheme navy.
- Footer shows the 40px mark beside the title.
- Icon links (SVG, 32px, 192px, touch icon) printed on the front end and the login screen with no Site Icon set.
- The Header tab select saves each value.

## Testing performed for 2.5.0

- At 1024, 1280 and 1440 pixels: five top-level links on one row (Religions, Sacred Texts, Knowledge Base, Articles, About), no overflow, header 107px with the secondary bar; the Knowledge Base dropdown opens on hover; on the Figures page, Figures is filled navy and Knowledge Base carries the parent style, and the bar marks Figures.
- At 390 pixels: secondary bar hidden, menu button shown; the overlay lists the five links with their dropdown links expanded, indented and full width.
- Saving seven top-level links kept five and warned; saving ten secondary links kept eight and warned; a dropdown child under a removed parent was removed with it.
- A stored 2.4.x default menu was read as the new default; a stored custom menu of seven links rendered its first five.
- No horizontal overflow on nine views at 320, 390, 768, 1024, 1280 and 1440 pixels; crawl of 38 pages clean.

## Testing performed for 2.4.1

- Header at 1280 and 1440 pixels: one row, no overflow, 8px corners; hover fill applied on rollover; the current section (Figures) shows navy with ivory text.
- Overlay menu at 390 pixels: rows sit inside the panel (20 to 370 pixels), rounded, with the hover fill.
- No horizontal overflow on nine views at 320, 390, 768, 1024, 1280 and 1440 pixels.

## Testing performed for 2.4.0

- Fresh WordPress 7.1 install, activated through WP-CLI: 43 set-up actions; permalinks, category base, tag base and tagline set; 22 pages in their hubs and 8 articles under `/articles/`, each with a search description. Category links and rewrite rules were correct within the same request.
- Crawl from the front page: 38 pages, all 200; one `h1` on each; no duplicate titles or descriptions; every description 130 characters or fewer; self-referencing canonical addresses; breadcrumbs on every inner page; no stray shortcode text; valid JSON-LD everywhere, with Article on the eight articles, CollectionPage on listings, AboutPage and ContactPage where expected.
- robots.txt disallows `/?s=` and `/search/` inside the `User-agent: *` group; the sitemap index lists posts, pages and categories only; all 38 sitemap addresses return 200.
- A missing address returns 404 with `noindex, follow`, a heading, section links and three latest articles. Search results are `noindex`. Seven earlier addresses (pages, articles, categories and a paged category) redirect with 301.
- Article structured data carries headline, dates, author, publisher, image and sections; its BreadcrumbList matches the visible trail. The Organization node carries the bundled logo at 512 × 512.
- Upgrade from 2.3.0 with one starter page edited: 7 new actions, 23 items moved, 22 refreshed; the edited page kept its paragraph and moved to its hub; Guides became Religions at `/religions/`; the crawl found one redirect, from the old link inside the edited page. Tools listed that page; Update links fixed it and kept the edit.
- Theme Options: nine tabs; submenu lines render as a submenu; lines without a target and `javascript:` targets are dropped; a pasted verification tag is reduced to its code; the Analytics ID is normalised and loaded with its data attribute. The description box shows the stored text and a live count.
- With a dedicated SEO plugin simulated, the theme printed no description, social tags or JSON-LD, left robots.txt and the sitemap alone, and kept breadcrumbs and verification.
- Nine views (front page, hub, timeline, Articles, topic, article, site map, 404, search) at 320, 390, 768, 1024, 1280 and 1440 pixels: no horizontal overflow; page titles aligned with the breadcrumbs; menu collapse below 1280; the current section marked in the header.

## Testing performed for 2.3.0

- Fresh WordPress 7.1 install with a pre-existing About page, then activation through WP-CLI (the activation hook ran on the following request, with no logged-in user):
  - 16 pages and 8 articles created, 8 categories created, permalinks set to post names, sample post and page trashed, default privacy draft filled and published, Home and Articles set as front and posts pages;
  - the existing About page kept its own text and was recorded;
  - every seeded item parses entirely into blocks; internal links point to the site's own address.
- Front end: "From the Archive" lists the three newest seeded articles; all 28 internal links on the front page return 200; each topic card opens its category archive with its articles (Religion 2, History 3, Scripture 1, Theology 2, Culture 1, Philosophy 1, Archaeology 1, Interfaith Studies 1); Articles lists all eight.
- Seeded pages at 1440 and 390 pixels: correct title, no horizontal overflow; Arabic glosses render inline.
- Tombstones: after one page was deleted permanently and another trashed, a re-run created nothing (33 keys skipped). Resetting the stored seed version and loading an admin page re-ran the seeder without duplicates. Tools showed "Deleted" with Restore, "In trash" with a trash link, and "Your existing content kept" for About. Restore recreated the deleted page, which returned 200; the trashed page stayed at 404.
- Contact page: nothing shown to visitors until an address is set; then the obfuscated address and `mailto:` link appear.
- `strong` computes to weight 700 in Sabon.

## Testing performed for 2.2.1

- All eight Sabon files present in the package; each pair together holds the original font's 882 characters, and the Latin and extended files share none.
- A page with only Latin text loads the three Latin Sabon files it uses and no extended file. A page with a Greek word also loads `sabon-next-lt-regular-ext.woff2`, and the browser reports every Greek glyph from Sabon Next LT.
- HarfBuzz shaping: ḥ and ẓ find no glyph in the Latin file, so the fallback applies; ṣ and ā render from Sabon. In the browser, the dot under ḥ sits centred, from EB Garamond.
- Tools > System information reports "Bundled (8 files)"; removing a file produces the error notice and names it.

## Testing performed for 2.2.0

- Appearance menu lists Theme Options; the admin-bar shortcut appears on admin screens and on the front end; `page=abrahamic-settings` redirects to the new screen.
- `?tab=header` opens the Header tab; saving from the Header and Footer tabs returns to the same tab and leaves other options untouched (44 social profiles kept).
- Front end with defaults matches the 2.1 header pixel for pixel at 1440 pixels.
- After changing options: new logo wording, second line removed, logo accessible name updated, button label and link changed, search button hidden, `{year}` replaced, empty footer note hidden. Tags typed into the button label are stripped.
- Export downloads `abrahamic-options-2026-09-17.json` with all 67 options. Reset asks for confirmation; cancelling leaves the options alone.
- Import of a partial file applies its values, ignores an unknown key, strips markup, and keeps options the file lacks. A file from elsewhere and a missing file each produce an error notice.
- A custom role holding only `read` and `edit_theme_options` can open and save Theme Options.
- Switches toggle by click and by the Space key.
- Options screen at 390 pixels: no horizontal overflow; tabs scroll sideways.
- Front end at 320, 390, 600, 768, 1024, 1279, 1280 and 1440 pixels: single-row header, no horizontal overflow.

## Testing performed for 2.1.0

- All 45 icons load through `abr_social_icon()`; an unregistered or path-like slug returns an empty string.
- Footer rendered with all 45 profiles at 1440 and 390 pixels: every icon visible, no horizontal overflow.
- Settings round trip: a cleared field is dropped on save and the other 44 values persist; the Social tab is restored after saving.
- The filter narrows fields and hides empty groups; pressing Enter in it does not submit the form.
- Social tab at 390 pixels: fields stack, no horizontal overflow.
- `abr_icon( 'youtube' )` still returns a mark through the social fallback.

## Testing performed for 2.0.0

- `php -l` on all PHP files under PHP 8.3; `node --check` on both scripts.
- WordPress 7.1 on SQLite with Twenty Twenty-Five 1.5; no PHP notices or warnings from the theme.
- Chromium render at 320, 340, 360, 390, 600, 601, 768, 820, 1023, 1024, 1180, 1239, 1240, 1279, 1280, 1366, 1439 and 1440 pixels: no horizontal overflow; single-row header throughout.
- Overlay menu opened and closed at 390, 768 and 1180 pixels with touch emulation; menu links close the panel and land below the sticky header.
- Comparison tabs switch columns on narrow screens; settings screen tabs and custom palette toggle without script errors.
- Settings migration from `ar_options` confirmed on activation.
- Font loading confirmed through the browser's rendered-font report: Sabon for Latin text, EB Garamond only for missing transliteration letters.

## Credits

| Resource | Location | Licence |
|---|---|---|
| Abrahamic theme code and interface icons | whole theme | GPLv3 or later |
| Twenty Twenty-Five (parent) | separate theme | GPLv2 or later |
| Minimalist Social & Platform Icons Pack 2.8, 43 icons | `assets/icons/social/` | GNU GPL |
| Simple Icons: LinkedIn, Scribd | `assets/icons/social/` | CC0 1.0 |
| EB Garamond supplement | `assets/fonts/` | SIL OFL 1.1, text embedded in the font files |
| Noto Serif Hebrew, Noto Sans Syriac, Noto Sans Imperial Aramaic | `assets/fonts/` | SIL OFL 1.1, text embedded in the font files |
| Symbols watermark (`assets/images/symbols.png`) | `assets/images/` | GPL, supplied by the site owner |
| Photographs (`assets/images/photos/`) | `assets/images/photos/` | Supplied by the site owner from the site's own media library |
| Darfash drawing (`assets/images/darfash.svg`) | `assets/images/` | CC BY-SA 3.0, Dragovit, via Wikimedia Commons; credited on the Copyright and DMCA page |
| Photographs from Wikimedia Commons (thirteen files, listed in `ssot.md`, section 6) | `assets/images/photos/` | Public domain, CC BY 2.0, 3.0 and 4.0, CC BY-SA 3.0 and 4.0; credited on the Copyright and DMCA page |
| Special Elite | `assets/fonts/` | Apache 2.0, text embedded in the font file |
| Arslan Wessam A | `assets/fonts/` | No licence terms stated; supplied by the site owner |
| Sabon Next LT, Monotype GmbH, complete (8 files) | `assets/fonts/` | Proprietary; bundled by requirement; outside the GPL |

Brand marks belong to their owners.
