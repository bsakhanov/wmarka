# 🚀 Wmarka Template for Joomla 5 & 6

![Joomla](https://img.shields.io/badge/Joomla-5%20%7C%206-173861?style=for-the-badge&logo=joomla&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-%E2%89%A58.3-777BB4?style=for-the-badge&logo=php&logoColor=white)
![UIkit](https://img.shields.io/badge/UIkit-3.x-222222?style=for-the-badge&logo=uikit&logoColor=white)
![WebP](https://img.shields.io/badge/Image_Optimization-JUImage_(WebP)-009688?style=for-the-badge)
![License](https://img.shields.io/badge/License-GPLv2-blue?style=for-the-badge)

*(Scroll down for Russian version / Русская версия ниже)*

Wmarka is a modern, high-performance, mobile-first starter template tailored specifically for **Joomla 5/6** and **PHP 8.3+**. Built on the **UIkit 3** framework, it inherits the clean philosophy of **J!Blank** (with LESS/SASS removed for simplicity) and utilizes the layout positions of **Master3**.

## ⚠️ Required Dependency: JUImage Library
To use this template, you **must** install the [JUImage Library](https://github.com/Joomla-Ukraine/JUImage) for automatic resizing, cropping, and on-the-fly **WebP** conversion.
* **Pro-Tip for Content Managers:** When creating an article in `com_content`, you **do not need to duplicate** images in both the "Intro Image" and "Full Article Image" fields. Simply upload your photo to the **Intro Image** field. The overridden `full_image` layout will automatically resize and display it on the article page! 
* **Adjusting Image Sizes:** You can customize the exact crop dimensions and proportions yourself. Simply edit the layout files located at `html/layouts/joomla/content/` (specifically `intro_image.php` and `full_image.php`).

## ⚙️ Smart Search & SEO Setup (Language Overrides)
1. **Smart Search (`com_finder`):** For the search to work correctly, enable SEF and `.htaccess` in Joomla's global configuration. Create a hidden menu item for Smart Search with the alias `search` (e.g., `domain.com/search`). If you need a different URL, update it in `partial/navbar.php`.
2. **SEO & Microdata (Schema.org):** The template features automatic generation of Open Graph and Schema.org markup (for articles, tags, and contacts).
3. **Important Configuration:** Since generating proper markup requires real data (company names, addresses, phones), you must create language overrides via the Joomla Administrator (**System -> Language Overrides**). Select your language and override the following constants:
   * `TPL_WMARKA_SEO_ORG_NAME` (Your Company Name)
   * `TPL_WMARKA_SEO_ORG_TYPE` (e.g., Organization, LocalBusiness)
   * `TPL_WMARKA_SEO_ORG_LOGO` (Path to logo)
   * `TPL_WMARKA_SEO_STREET`, `TPL_WMARKA_SEO_CITY`, `TPL_WMARKA_SEO_COUNTRY` (Address)
   * `TPL_WMARKA_SEO_TEL` (Phone number)
   * `TPL_WMARKA_SEO_LAT`, `TPL_WMARKA_SEO_LONG` (Geo-coordinates)
   * `TPL_WMARKA_SEO_SOCIAL_INST`, `TPL_WMARKA_SEO_SOCIAL_FB` (Social links)
   * `TPL_WMARKA_SEO_OG_IMAGE_DEFAULT` (Default Open Graph image)

## ✨ Key Features
* **Pure UIkit 3:** Full utilization of UIkit grids, cards, and articles with zero traces of Bootstrap.
* **Prototyping Mode:** Auto-generates UIkit wireframes and placeholders for empty pages.
* **Modern Asset Management:** Utilizes `joomla.asset.json`. Upload your generated favicons (via realfavicongenerator.net) to the `images/favicon/` folder and initialize the paths in `php/init.php`.

## 🛠 Architecture & Overrides
* **Partials (`partial/`):** Global site blocks (header, footer, offcanvas) are separated into individual files and included in `index.php`. Make all your custom CSS modifications strictly in `/media/templates/site/wmarka/css/user.css`.
* **Components (`html/`):** Completely rebuilt `com_content` (articles, blogs, categories), `com_tags` (including the custom **Tree Layout `tree.php`** for a sitemap-like hierarchy), `com_blank`, `com_finder`, and `com_contact`.
* **Modules:** Breadcrumbs feature `itemprop` microdata. Native overrides for `mod_articles`, `mod_login`, `mod_menu`, and `mod_footer`. The `modules.php` file includes custom styles like `wmarka` (UIkit Cards) and `blank`.
* **Plugins:** Standard in-article pagination has been replaced with a responsive UIkit version (`plg_content_pagenavigation`).

## 📦 Recommended Extensions
* [Quantum Manager](https://norrnext.com/joomla-extensions/quantum-manager) ([My Config](https://bit.ly/3qaieoF))
* [Advanced Module Manager](https://regularlabs.com/advancedmodulemanager)
* [JCH Optimize](https://www.jch-optimize.net/download.html) (Enable "Combine Files" and "Minify HTML")
* [JCE Editor](https://clck.ru/359Hfu) ([My Profile](https://clck.ru/359HjC))

---
---

# 🚀 Wmarka — Стартовый шаблон для Joomla 5 и 6

Wmarka — это почти чистый, высокопроизводительный шаблон для **Joomla 5/6** и **PHP 8.3+**. За основу взята философия чистоты **J!Blank** (однако убрана генерация LESS и SASS) и разметка позиций от шаблона **Master3**. Дизайн и сетка полностью базируются на фреймворке **UIkit 3**.

## ⚠️ Обязательная зависимость: Библиотека JUImage
Для корректной работы шаблона **обязательна** установка библиотеки [JUImage](https://github.com/Joomla-Ukraine/JUImage) для автоматического ресайзинга, кроппинга и конвертации изображений в **WebP**. 
* **Лайфхак для контент-менеджера:** При публикации материала в `com_content` **нет необходимости дублировать фото** в оба поля ("Вступительное" и "Полное"). Достаточно вставить фото только для превью (`intro_image`). Переопределенный макет `full_image` автоматически возьмет его, изменит размер и покажет на странице статьи!
* **Настройка размеров:** Вы можете сами настроить нужные вам размеры ресайзинга и пропорции. Для этого просто отредактируйте макеты по пути от корня шаблона: `html/layouts/joomla/content/` (файлы `intro_image.php` и `full_image.php`).

## ⚙️ Настройка Поиска и Языковых Констант (SEO / Микроразметка)
1. **Умный поиск:** Для корректной работы поиска необходимо создать скрытый пункт меню для компонента умного поиска, который должен открываться по адресу: `domen.kz/search` (обязательно включите SEF и `.htaccess`). Переопределить URL поиска можно в файле `partial/navbar.php`.
2. **SEO и Микроразметка:** В шаблоне настроена автоматическая генерация разметки Open Graph и Schema.org (для статей, меток, контактов).
3. **Важно:** Поскольку генерация правильной разметки (адреса, телефоны, названия компании) требует реальных данных, вам необходимо заранее создать соответствующие языковые переопределения через админку Joomla (**Система -> Переопределение констант**). Выберите свой язык и создайте следующие константы:
   * `TPL_WMARKA_SEO_ORG_NAME` (Название вашей организации)
   * `TPL_WMARKA_SEO_ORG_TYPE` (Тип, например: Organization или LocalBusiness)
   * `TPL_WMARKA_SEO_ORG_LOGO` (Ссылка на логотип)
   * `TPL_WMARKA_SEO_STREET`, `TPL_WMARKA_SEO_CITY`, `TPL_WMARKA_SEO_COUNTRY` (Адрес)
   * `TPL_WMARKA_SEO_TEL` (Телефон)
   * `TPL_WMARKA_SEO_LAT`, `TPL_WMARKA_SEO_LONG` (Гео-координаты)
   * `TPL_WMARKA_SEO_SOCIAL_INST`, `TPL_WMARKA_SEO_SOCIAL_FB` (Ссылки на соцсети)
   * `TPL_WMARKA_SEO_OG_IMAGE_DEFAULT` (Картинка по умолчанию для соцсетей)

## ✨ Главные фишки
* **Чистый UIkit 3:** Полное использование сетки, карточек и статей без следов Bootstrap.
* **Режим прототипирования:** Авто-генерация "рыбы" и плейсхолдеров для пустых страниц.
* **Современное управление ассетами:** Использование `joomla.asset.json`. Набор фавиконок (сгенерированный через realfavicongenerator.net) загружайте в папку `images/favicon/` и прописывайте пути в `init.php`.

## 🛠 Архитектура и переопределения
* **Партиклы (`partial/`):** Глобальные блоки (секции) сайта вынесены в отдельные файлы и подключаются в `index.php`. Свои правки по стилю вносите строго в файл `/media/templates/site/wmarka/css/user.css`.
* **Компоненты (`html/`):** Полностью переработаны `com_content` (статьи, блог, категории), `com_tags` (включая **Макет Дерева `tree.php`** в виде карты рубрик), `com_blank`, `com_finder` и `com_contact`.
* **Модули:** Крошки с микроразметкой `itemprop`, нативные `mod_articles`, `mod_login`, `mod_menu` и `mod_footer`. В `modules.php` добавлены стили `wmarka` (карточки UIkit) и `blank`.
* **Плагины:** Внутристатейная пагинация заменена на адаптивную UIkit-версию (`plg_content_pagenavigation`).

## 📦 Рекомендуемые расширения
* **[Quantum Manager](https://norrnext.com/joomla-extensions/quantum-manager):** Менеджер файлов. ([Мои настройки](https://bit.ly/3qaieoF))
* **[Advanced Module Manager](https://regularlabs.com/advancedmodulemanager):** Гибкое управление модулями.
* **[JCH Optimize](https://www.jch-optimize.net/download.html):** Включите `Combine Files` для CSS/JS и `Minify HTML` — сайт будет "летать".
* **[JCE Editor](https://clck.ru/359Hfu):** Визуальный редактор. ([Мой профиль настроек](https://clck.ru/359HjC))

> Посмотрите, ненужное вам смело убирайте. И будет вам счастье!