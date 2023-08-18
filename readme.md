# wmarka
Почти чистый шаблон под Joomla 4  (с использованием стилей дизайн-фреймворка Uikit 3). За основу взят J!Blank (https://jbzoo.ru/blog/jblank-for-joomla-3), однако убрана генерация LESS и SASS. Также использована разметка позиций шаблона от Master3 (шаблона для Joomla! 3 на UIkit 3). Плюс добавлена поддержка AMP (можете подредактировать под себя файл amp.php в корне шаблона)

В шаблоне переопределены (с использованием стилей дизайн-фреймворка Uikit 3) разметка вывода меток Joomla, артиклей, категории. Также имеются несколько вариантов переиопределения модулей mod_articles_category, mod_articles_news, mod_articles_popular и других. 

Блоки сайта вынесены в партикли, их можно редактировать в папке partial, подключаются они в index.php шаблона. 

CSS и JavaScript подключаются через joomla.asset.json (в корне сайта) и далее через index.php с помощью WebAssetManager (https://jpath.ru/docs/output/js-css/kak-pravilno-podklyuchat-javascript-i-css-v-joomla-4). Вносить правки по стилю можно в файл user.css (находится по пути /media/templates/site/wmarka/css/user.css).

В папке images имеется подпапка favicon, куда можете загрузить свой набор фавиконов, который я обычно генерирую через сервис https://realfavicongenerator.net. Не забудьте прописать пути (строки с 94 по 102) к фавиконкам в файле init.php, который находится в папке php шаблона.

В установочный пакет шаблона включены языковые файлы шаблоны, которые при установке шаблона будут загружены в папку language/overrides от корня сайта. Сделано это для большего удобства. К примеру, значения языковых констант шаблона (они применяются для автоматической SEO-оптимизации микроразметки article и category) нужно будет поменять на свои данные через админку: искать ничего не нужно, просто зайдите в раздел "Языки: Переопределение констант" и выберите опцию нужной языковой версии сайта — сразу все константы переопределенные выйдут единмы списком, там же легко их поменять.

Обязательно для работы шаблона установка библиотеки JUImage (https://github.com/Joomla-Ukraine/JUImage) — для автоматического ресайзинга и кроппинга изображений, а также автоматической конвертации в webp, данная библиотека используется шаблоном для отображения фото full_image в артикле, intro_image. Следует отметить, что при публикации материала в com_content нет необходимости дублировать изображения в оба окошка вставки фото, достаточно вставить фото для превью, т.е. для intro_image, поскольку макет переопределенный в шаблоне full_image использует на самом деле intro_image для ресайзинга и отображения на странице материала (артикля). Можете сами пройти по пути от корня шаблона html/layouts/joomla/content, где увидите эти переопределения и сами сможете настроить необходимые вам размеры ресайзинга изображений.  

Также рекомендуется установить необходимый набор расширений (необязательно)

Quantum Manager — менеджер файлов, изображений, видео  https://norrnext.com/joomla-extensions/quantum-manager (настройки для него можно скачать мои здесь: https://bit.ly/3qaieoF)

Advanced Module Manager (удобный, гибкий как угодно настраиваемый менеджер модулей) https://regularlabs.com/advancedmodulemanager

JCH Optimize (https://www.jch-optimize.net/download.html) —  мощный компонент кеширования для Joomla 4, ускоряющий загрузку веб-страниц сайта без изменений в содержимом исходных файлов CMS. Расширение позволит значительно ускорить загрузку сайта. Предлагаю для начала просто включить минимизацию HTML и объединение файлов СSS и JavaScript (пройти в настройки компонента и включить Combine Files для CSS и JavaScript, а также Minify HTML).

JCE — профессиональный визуальный редактор https://clck.ru/359Hfu (по ссылке версия 2.9.36, после установки пройдите в профиль редактора и импортируйте также настройки редактора, которые можно взять мои: https://clck.ru/359HjC)

Настроена автоматическая генерация разметки  Open Graph и Schema.org производится для артикля и меток, но для этого нужно заранее создать соответствующие языковые константы через админку Джумлы (телефоны, адреса и т.д.), поскольку генерация разметки использует языковые константы. 

Плюс куча кастомных переопределений для макетов родных джумловских модулей. Ну и куча партиклей — все-таки ведь !Blank!)

Посмотрите, ненужное вам смело убирайте. И будет вам счастье!
