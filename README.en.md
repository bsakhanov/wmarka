# Wmarka 4.0.9 — starter template for Joomla 5 and 6 built on UIkit 3

*Русская версия: [README.md](README.md)*

Wmarka is a free starter template for Joomla 5 and 6 built on UIkit 3.25, with no Bootstrap. It fits a news site as well as a company site: every option lives in the template style, the markup of Joomla's own pages is rewritten with UIkit components, and the "Vestnik" demo site installs from a single package.

- Repository: <https://github.com/bsakhanov/wmarka>
- Demo: <https://site.webmarka.kz>
- Developer: Webmarka · Beibit Sakhanov, <https://webmarka.kz>
- License: GNU GPL version 2 or later

---

## Contents

1. [What is in the package](#what-is-in-the-package)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [First steps](#first-steps)
5. [Template settings](#template-settings)
6. [Module positions](#module-positions)
7. [Module styles and layouts](#module-styles-and-layouts)
8. [Menus and mega menus](#menus-and-mega-menus)
9. [Articles, blog, tags, authors](#articles-blog-tags-authors)
10. [News presentation](#news-presentation)
11. [Images](#images)
12. [SEO and structured data](#seo-and-structured-data)
13. [Blank page (com_blank)](#blank-page-com_blank)
14. [Child template](#child-template)
15. [Custom CSS and JS](#custom-css-and-js)
16. [The "Vestnik" demo site](#the-vestnik-demo-site)
17. [Updating](#updating)
18. [History](#history)
19. [What changed since 3.0](#what-changed-since-30)
20. [File structure](#file-structure)
21. [FAQ](#faq)
22. [Credits and third-party components](#credits-and-third-party-components)

---

## What is in the package

The full installation is one archive, **`pkg_wmarka-4.0.9.zip`**. It contains five extensions, installed in this order:

| Extension | What it is | Why |
|---|---|---|
| `lib_juimage` 5.21 | JUImage library (Denys Nosov, Joomla! Ukraine) | crops thumbnails and converts them to WebP |
| `tpl_wmarka` 4.0.9 | the template | all site styling |
| `tpl_wmarka_vestnik` 1.0.0 | child template of the demo site | a child template built the way Joomla builds them |
| `com_blank` 2.0.1 | "Blank page" component (Alek Volsk, Sergey Tolkachyov) | pages made of modules: homepage, landings |
| `plg_sampledata_wmarka` | sample data installer | deploys the "Vestnik" demo site |

The template alone is **`tpl_wmarka-4.0.9.zip`**. JUImage and com_blank are then optional: without JUImage images are shown as originals; without com_blank a module-built homepage needs another menu item type.

## Requirements

- Joomla 5.0 or later, tested on Joomla 6.1.4;
- PHP 8.1 or later;
- for thumbnails, the PHP GD extension with WebP support (available on most hosts);
- SEF URLs and `.htaccess` enabled, for clean URLs and Smart Search at `/search`.

## Installation

### Option 1. Full demo installation

Good for trying the template and for a brand-new site.

1. Install a clean Joomla 5 or 6.
2. **System → Install Extensions → Upload Package File** → `pkg_wmarka-4.0.9.zip`. The package installs JUImage, the template, the child template, com_blank and the demo installer, and enables the component and the installer.
3. **System → Sample Data** (or the "Sample Data" box on the dashboard) → **wmarka demo site → Install**. Six steps run one after another; each reports what it did.
4. Open the site: homepage, news, mega menus and the "Module positions" page are in place.

The demo changes the template style and the global options of Articles, Tags and Contacts. Install it on a clean Joomla, not on a production site. Running it again is safe: records are looked up by key and updated, no duplicates appear.

### Option 2. Template only

1. Install `tpl_wmarka-4.0.9.zip`.
2. Optionally install JUImage (from the package or <https://github.com/Joomla-Ukraine/JUImage>) and com_blank.
3. **System → Site Template Styles → wmarka → Default**.
4. Follow the [first steps](#first-steps).

### Option 3. Updating from 3.0.x

Install the new archive over the old one — "Install Extensions" updates the template. See [Updating](#updating) for what happens.

## First steps

All options are in the template style: **System → Site Template Styles → wmarka**. The first tab has a "Template status" card: template and UIkit versions, whether JUImage is found, whether `user.css` exists, how many thumbnails are cached.

1. **General:** site title and slogan, logo (image, text or both), container width, font.
2. **Contacts:** phone, e-mail, WhatsApp, Telegram, address, map, opening hours. They go to the toolbar, the mobile panel, the footer and structured data.
3. **Header & navigation:** header layout, sticky navbar, call-to-action button, search menu item.
4. **Images:** check that JUImage is enabled and set thumbnail sizes.
5. **SEO:** organization name and type, address, social profiles, default social image.
6. **Menu:** publish a menu module in `navbar-right` (or `navbar-left`). The mobile panel copies it automatically.
7. **Search:** create a Smart Search menu item with the alias `search` (a hidden menu is fine) and select it in "Search menu item".

## Template settings

Nine tabs, over 120 options. The essentials are below; every field has a tooltip in the administrator.

| Tab | What it controls |
|---|---|
| **General** | template status; title and slogan; logo (mode, file, logo for a dark footer, width, alt); container width (750 px to full width); component on the homepage; font (UIkit system stack or local Noto Sans SemiCondensed); mobile menu breakpoint |
| **Header & navigation** | header layout (logo in the navbar or above it); navbar background; sticky and show-on-scroll-up; full-width dropdowns; alignment; search button and its menu item; call-to-action button (an anchor opens a modal); mobile panel (animation, side, menu copy, contacts); toolbar (contacts, background, on phones) |
| **Contacts** | phones, e-mail, WhatsApp with a prefilled message, Telegram, address, map link, opening hours |
| **Layout** | sidebar width, breakpoint and gutter; main section padding; breadcrumbs without a module; block position background, alternation, padding, columns and gutter; footer background and contacts; copyright holder and founding year; back-to-top button |
| **Images** | JUImage; "intro" and "full" profile sizes; quality and format (WebP or JPEG); cache folder; placeholder; intro instead of full; first image from text; responsive images (srcset); lazy loading |
| **Content** | card teaser length; date style; tags in cards; video and photo news tags; share buttons; author box; tags at the end of the article; horizontal card image width; thumbnails in article navigation; default blog view; reading time; quote typographer |
| **SEO & structured data** | template SEO engine (turn off when an SEO extension is used); canonical; OpenGraph and Twitter; JSON-LD; page title; organization, address, coordinates, social profiles; article type (Article, NewsArticle, BlogPosting) |
| **Counters & code** | Yandex Metrica (with Webvisor), Google Analytics, skip administrators, custom code in `head`, after `body` and before `/body` |
| **Advanced** | sentence case instead of UIkit caps; Joomla core markup bridge; UIkit icons; disable Bootstrap; favicons and their folder; theme color; meta generator |

Values from 3.0 language overrides (`TPL_WMARKA_SEO_*` and others) keep working while the matching option is empty, so there is nothing to migrate by hand.

## Module positions

The template declares 37 positions. The demo "Module positions" page shows each of them with a labelled module.

| Position | Where it appears |
|---|---|
| `toolbar`, `toolbar-left` | toolbar, left |
| `toolbar-right`, `lang` | toolbar, right (languages separately) |
| `head-banner` | above the header, full width |
| `logo` | instead of the logo from the settings |
| `headbar` | right of the logo in the "logo above menu" header |
| `navbar-left`, `navbar-center`, `navbar-right` | navbar |
| `iconnav` | icons in the navbar |
| `login` | dropdown under the user icon |
| `offcanvas-menu`, `offcanvas` | mobile panel: menu and modules |
| `breadcrumb` | breadcrumbs (built by the template when empty) |
| `adver-top` | under the header, above the content |
| `slider` | slider or cover |
| `block-a`, `block-b` | block positions above the content |
| `main-top`, `main-bottom` | above and below the component, in the content column |
| `sidebar-a`, `sidebar-b` | left and right sidebars |
| `block-c` … `block-k` | block positions below the content |
| `footer-left`, `footer-center`, `footer-right` | footer columns (contacts appear in `footer-right` when it is empty) |
| `footer` | copyright row |
| `counters` | hidden position for tracking code |
| `debug` | debug, the very bottom |

### How block positions work

All block positions (`block-a` … `block-k`) are rendered by one method, `Helper::block()`; there is no separate file per position. The rule is simple:

- **all modules of the position use the `blank` style** — the position is output as is, without a wrapper. The module brings its own full-width section (`<section class="uk-section …">`). Covers, video blocks, calls to action and subscriptions are built this way;
- **otherwise** the template wraps the position itself: a `uk-section` (background, padding and alternation from the settings), a container, a `uk-grid` with as many columns as modules (up to four) or as set in "Columns in block position".

A module class suffix `uk-width-…` overrides the column width. For example, `uk-width-2-3@m` on one module and `uk-width-1-3@m` on another give a two-thirds and one-third layout.

## Module styles and layouts

### Module styles (module "Advanced" tab → "Module Style")

| Style | Look |
|---|---|
| `wmarka` | default: title and content; in a block position the title becomes the section heading |
| `card` | white `uk-card-default` card |
| `primary` | accent card |
| `secondary` | dark card |
| `muted` | muted background |
| `tile` | `uk-tile` tile |
| `navbar` | for the navbar, no wrapper |
| `blank` | no wrapper at all; in a block position, a full-width section |

The module title class is the standard "Advanced → Header Class": `uk-heading-line` gives a heading with a line, `uk-heading-bullet` a heading with a bullet.

### Module layouts ("Advanced → Layout")

| Modules | Layout | Look |
|---|---|---|
| article modules (`mod_articles`, Latest, Most Read, Category, Related, Tags – Similar) | `wm-cards` | card grid |
| same | `wm-media` | list with a thumbnail on the left |
| same | `wm-slider` | card carousel |
| same | `wm-feed` | feed: time and title, like a latest-news column |
| Newsflash (`mod_articles_news`) | `horizontal`, `vertical` | cards in a row or a column |
| menu (`mod_menu`) | `wm-nav` | vertical menu |
| menu | `wm-subnav` | inline links |
| Tags – Popular | `cloud` | tag cloud |

All 25 Joomla 6 site modules are overridden, as well as com_content, com_contact, com_tags, com_finder, com_users and the article navigation plugin.

## Menus and mega menus

Mega menus are switched on by tokens in the **"Link Class"** field of a first-level navbar menu item.

| Token | What it does |
|---|---|
| `wm-mega` | dropdown panel; columns are the item's children, links are their children |
| `wm-mega:menutype` | dropdown panel from an auxiliary menu: first-level items are columns, their children are links |
| `wm-mega-modal:menutype` | the same, full screen: a section per column, a card with icon and note per item |
| `uk-icon:name` | UIkit icon before the title (`uk-icon:camera`, `uk-icon:grid`…) |
| `wm-icon-only` | icon only, the title is visually hidden (kept for screen readers) |
| `wm-mod-ID` | renders the module with this ID in the column (the module must be published in any position, e.g. `mega`) |
| `wm-invert` | dark column |
| `wm-col-footer` | the link goes to the column footer |

**Building a mega menu from an auxiliary menu:**

1. Create a menu, e.g. `news-mega`. Do not output it with a module.
2. First-level items are columns. The "Heading" type is the most convenient. Put the column subtitle in the "Note" field.
3. Their children are links. The "Alias" type pointing to real pages is best: URLs stay clean and the active item is highlighted.
4. In the main menu, add `wm-mega:news-mega` to the "Link Class" of the "News" item.
5. For a full-screen window use `wm-mega-modal:template-mega`. The note of the main item becomes the window title, the notes of the links become card captions.

### Page tokens (menu item "Page Class")

- `wm-blank` — a page without the component, modules only (a block-built homepage);
- `wm-wide` — full-width component, no sidebars.

## Articles, blog, tags, authors

### The "WMARKA options" tab of a menu item

"Category Blog", "Featured Articles" and "Tag" menu items get their own tab:

- default view: grid or list;
- grid/list switcher for visitors (the choice is remembered);
- masonry;
- card gutter;
- card style: white, dark, accent, borderless;
- image position: top, bottom, left, right, alternate;
- hover shadow;
- card teaser length, leading articles in full.

Cards are built on the UIkit Card component: `uk-card-media-top` for the top image; a horizontal card with `uk-cover` for left and right; `uk-card-body` without an image.

### Joomla's own options keep working

The template does not replace standard Joomla options: columns, tag "Maximum Characters", images and descriptions in tag lists, "Icons or text" in contacts, full-text image float and info block position all work. Template options are added only where core has none.

### Tags

- "Tag" — as cards (`default`) or as a table (`list`, with thumbnails);
- "All tags" — a card grid, "Tag catalog" (`wm-catalog`, with a filter), "Tags and categories map" (`wm-tree`, trees of tags and categories).

### Authors

An article author is a Joomla user who has a contact (the contact's "Linked User" is set). Then:

- the byline links to the contact page;
- the contact page lists all of the author's articles (contact option "Show Articles");
- an author box appears under the article: photo, position, "All articles by the author".

The contact category layout "Team" (`wm-team`) shows authors as cards with round photos.

## News presentation

The presentation follows Kazakhstan news portals (zakon.kz, nur.kz, baq.kz) and uses only UIkit classes:

- **section** as a line above the title, in cards and articles;
- **news-style dates**: "Today, 14:32", "Yesterday, 18:50", "2 October, 17:14"; in an article "18:11, 2 October 2026"; time only in a feed ("Date style" option);
- **tags** as hashtags in the card meta line and as chips at the end of an article (`uk-button-small uk-border-pill`);
- **video and photo news** get a play or camera badge over the image. The tags are set by "Video news tag" and "Photo news tag" (aliases `video` and `foto` by default);
- **lead**: the first paragraph of an article gets `uk-text-lead`;
- **quotes** (`<blockquote>` with a `<footer>` for attribution) get a large quote glyph as a backdrop and a pale background;
- **share** — WhatsApp, Telegram, Facebook, X as plain links, no third-party scripts;
- **YouTube video** in the text (`<iframe>` with `width` and `height`) becomes responsive by itself; a video article does not repeat its cover above the player;
- **photo galleries** — `uk-lightbox` markup in the article text.

## Images

JUImage is required for thumbnails and is part of the full package. Without it the site works and shows originals.

- **One thumbnail per image.** Blog and featured cards, tag pages, search and all modules use the same intro file. The full article image is the second size; on phones the intro file is shown instead. Social images are 1200 × 630 JPG.
- **The intro image is enough.** If "Full Article Image" is empty, the article shows the intro image. If both are empty, the template takes the first image from the text, then the placeholder.
- **srcset without extra files.** Intro (720w) and full (1200w) are the same picture in two sizes, so cards get a `srcset` of these two files and `sizes` based on the layout. The browser picks the file.
- **Sizes** are set on the "Images" tab: 720 × 480 and 1200 × 800 by default; the demo uses 16 : 9 — 720 × 405 and 1200 × 675.
- **Cache** — the `img/` folder in the site root (configurable). After changing sizes old thumbnails can be deleted; new ones are created on the next visit.

## SEO and structured data

The template SEO engine (`php/Seo.php`) is switched on the "SEO & structured data" tab.

- **Canonical** — one URL per article regardless of the menu item, no `Itemid` duplicates.
- **OpenGraph and Twitter Card** — title, description, a 1200 × 630 image from the article or the default one.
- **JSON-LD** — a single `@graph`: Organization (or the selected type), WebSite with SearchAction, BreadcrumbList, Article or NewsArticle, CollectionPage and ItemList for blogs and tags, Person for authors.
- **Page title** — no "News | News | Site" duplication.

If an SEO extension is installed (4SEO, JSitemap, etc.), turn the template engine off to avoid duplicate markup.

## Blank page (com_blank)

com_blank outputs nothing by itself: the page is made of module positions. The template adds a "WMARKA options" tab to the menu item:

- lead paragraph, cover image and page text (editor);
- text column width and alignment.

The standard "Show Page Heading" works. When the fields are empty and the heading is off, the template does not draw an empty section for the component. For a module-built homepage, put the `wm-blank` token into the "Page Class".

## Child template

Keep your customization in a child template rather than in wmarka itself: template updates will not touch it.

**Create it the standard way.** **System → Site Templates → wmarka Details and Files → Create Child Template**. Joomla creates `templates/wmarka_name`:

- the manifest is a copy of the parent's without `languages`, `media`, `files`, `update`, with `<inheritable>0</inheritable>` and `<parent>wmarka</parent>`;
- an `html/` folder for overrides;
- a media folder `media/templates/site/wmarka_name/` with `css`, `js`, `images`, `scss`.

**What to put into the child template:**

| What | Where | How it works |
|---|---|---|
| overrides | `templates/wmarka_name/html/…` | Joomla looks in the child first, then in wmarka |
| custom styles | `media/templates/site/wmarka_name/css/user.css` | loaded instead of the parent `user.css` |
| custom script | `…/js/user.js` | instead of the parent one |
| placeholder, avatar, favicons | `…/images/placeholder.jpg`, `…/images/avatar.svg`, `…/images/favicon/` | the template looks in the child first |
| header, footer, block partials | `templates/wmarka_name/partial/name.php` | `Helper::partial()` uses the child's file when it exists |

See `wmarka_vestnik` in the demo package. A child template style keeps its own settings and has the same tabs as the parent.

A child template has no language files — that is how core creates it. The template loads the parent's `TPL_WMARKA_*` strings itself.

## Custom CSS and JS

- `media/templates/site/wmarka/css/user.css` and `js/user.js` are created on first install and **never overwritten** by updates. Put your rules there if you do not use a child template.
- `css/wmarka.css` is the core markup bridge and the quote styling. It is updated with the template; there is no need to edit it.
- UIkit's capitals are removed by `css/nocaps.css` ("Sentence case" option).

## The "Vestnik" demo site

The sample data installer creates a news site.

| What | How many |
|---|---|
| sections | 7 (Economy, Energy, Society, Technology, Science, Culture, Sport) plus Reference, Template, Authors |
| articles | 30: 20 news items, 4 video news items, a photo report, 3 reference articles, 2 template pages |
| tags | 14, including Video and Photo |
| authors | 4 author users with contacts and portraits, plus an editorial contact |
| illustrations | 39 files in `images/wmarka-demo` |
| menus | main, two mega menus (News — dropdown, Template — full screen), service menu |
| modules | 67, including a block-built homepage and the "Module positions" page |

News items, names and contacts are fictional; this is stated in the toolbar, the footer and at the end of every news item. Reference articles are real. Videos are Blender open movies (CC BY), embedded from YouTube via `youtube-nocookie.com`.

All created records are tagged and listed in the "Sample Data - wmarka demo site" plugin options ("Created records") for manual cleanup.

## Updating

Updates are safe for the site:

- `user.css` and `user.js` are never overwritten;
- style settings are kept; new options get their defaults;
- 3.0.x language overrides keep working as a fallback;
- old files that would otherwise hijack new output are removed: `html/pagination.php`, `html/modules.php`, old menu layouts, per-block partials.

Back up a production site before updating — a rule for any extension.

## History

**Roots.** Wmarka grew out of clean-markup Joomla starter templates. As the 3.0 description puts it, the clean philosophy comes from the **J!Blank** skeleton (without LESS and SASS generation), and the position scheme from the **Master3** template. Styling was built on **UIkit** from the start, image processing on the **JUImage** library.

**3.0.0 (29 March 2026)** — the first public release for Joomla 5 and 6:

- PHP 8.3, UIkit 3, JUImage with WebP required;
- site blocks moved into partials (`partial/`);
- com_content, com_tags (with a tag tree), com_finder, com_contact, com_blank and some modules rewritten;
- Schema.org and OpenGraph markup, but organization data was set with **language overrides** (`TPL_WMARKA_SEO_*`) and thumbnail sizes by editing layout files;
- prototyping mode: empty pages were filled with placeholders.

**Internal branch 3.0.1–3.0.26 (summer 2026).** Builds were tested on the TAMGARD PARTNERS site: Joomla 6 audit, token-driven mega menus, an SEO engine with a JSON-LD `@graph`, author and team layouts, UIkit forms, a mobile audit. The branch was consolidated into one release.

**4.0.0 (October 2026)** — the first public release after 3.0.0, rebuilt from scratch:

- all options in the administrator, in nine tabs;
- a single image service with one thumbnail per image;
- UIkit 3.25.25;
- overrides for all modules and the main components;
- a fixed package structure.

**4.0.1–4.0.9** — overrides audited against Joomla's original layouts, dosed teasers, srcset, Card-component cards, news presentation, card-based mega menus, a child template built by core rules, a full demo installation. Details are in [CHANGELOG.md](CHANGELOG.md).

## What changed since 3.0

| | 3.0 | 4.0 |
|---|---|---|
| Settings | language overrides and file edits | over 120 options in nine style tabs, status card |
| PHP | 8.3 | 8.1 or later |
| UIkit | 3.25.14 | 3.25.25, no Bootstrap or Font Awesome |
| Images | JUImage required; sizes in layout files; up to eight thumbnails per photo | JUImage recommended; sizes in settings; one thumbnail for the whole site plus one for the article; srcset |
| Cards | custom markup variants | UIkit Card component: top, bottom, left, right, `uk-cover` |
| Blog and tags | basic grid | "WMARKA options" in the menu item, view switcher, masonry, alternating images; core options respected |
| News presentation | — | section line, news dates, hashtags, video and photo badges, feed, author box, share |
| Mega menus | — | tokens, auxiliary menus, card-based dropdown and full-screen window |
| Modules | some modules | all 25 Joomla 6 site modules, four layouts for article modules |
| Blocks | a partial per position | one `Helper::block()`: full-width module (`blank`) or automatic grid |
| SEO | markup from language constants | engine with canonical, OpenGraph and a single JSON-LD `@graph`, data from settings |
| Child templates | — | created by core; `wmarka_vestnik` example in the package |
| Blank page | override with prototype placeholders | override with menu item options and no empty sections |
| Package | template | JUImage, template, child template, com_blank, demo site |
| Updates | `joomla.asset.json` was not delivered | registry in the template folder; `user.css` and `user.js` kept; old files removed |

## File structure

```
templates/wmarka/
├── index.php            order of page partials
├── component.php, error.php, offline.php, raw.php
├── joomla.asset.json    asset registry (relative paths: also works for child templates)
├── templateDetails.xml  manifest: positions, options
├── script.php           install and update
├── php/                 Config, Helper, Image, Seo, Card, Ui; "Template status" field
├── partial/             toolbar, header, breadcrumb, top, main, bottom, footer, offcanvas, search, totop, counters
├── html/                overrides: components, modules, layouts, module styles
├── language/            ru-RU and en-GB
└── seed/                user.css and user.js seeds

media/templates/site/wmarka/
├── css/  uikit.min.css, wmarka.css, nocaps.css, fonts.css, user.css
├── js/   uikit.min.js, uikit-icons.min.js, wmarka.js, user.js
├── images/  logo.svg, placeholder.jpg, avatar.svg, favicon/
└── fonts/   Noto Sans SemiCondensed (woff2)
```

## FAQ

**Images are not cropped, originals are shown.** JUImage is not installed or is off on the "Images" tab. The "Template status" card shows whether the library is found.

**`TPL_WMARKA_…` keys are shown instead of text.** The template language files were not installed: reinstall the template from the same archive.

**Search returns 404.** Enable SEF URLs and `.htaccess`, create a Smart Search menu item and select it in "Search menu item". Rebuild the index with `php cli/joomla.php finder:index` or in "Smart Search → Index".

**How do I make a full-width module?** Publish it in a block position with the `blank` style. The module must provide its own section, e.g. `<section class="uk-section uk-section-muted"><div class="uk-container">…</div></section>`.

**The mega menu does not appear.** Check that the token is in the "Link Class" of a first-level item and that the auxiliary menu exists and has first-level items.

**A module in a mega menu column is missing.** It must be published, assigned to all pages and placed in any position (e.g. `mega`). The token is `wm-mod-ID` on the column item.

**Can I do without com_blank?** Yes. A module-built homepage works on any menu item with `wm-blank` in the "Page Class".

## Credits and third-party components

- **Wmarka** — Webmarka · Beibit Sakhanov, GNU GPL v2+.
- **UIkit 3** — YOOtheme, MIT license.
- **JUImage** — Denys Nosov, Joomla! Ukraine, GNU GPL v2+ (<https://github.com/Joomla-Ukraine/JUImage>). The package includes the library built from its sources without changes.
- **com_blank** — Alek Volsk, Sergey Tolkachyov, GNU GPL.
- **Noto Sans SemiCondensed** — Google, SIL Open Font License.
- **Demo illustrations** were drawn for the package. Videos are Blender Foundation and Blender Studio open movies (CC BY).
