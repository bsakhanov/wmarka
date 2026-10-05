# Демо-сайт «Вестник» и пакет pkg_wmarka

Исходники того, что входит в пакет `pkg_wmarka` вместе с шаблоном из корня репозитория:

| Папка | Расширение |
|---|---|
| `tpl_wmarka_vestnik/` | дочерний шаблон демо-сайта (`<parent>wmarka</parent>`), собран по правилам ядра Joomla |
| `plg_sampledata_wmarka/` | установщик образцов данных «Демо-сайт wmarka» |
| `pkg_wmarka/` | манифест и сценарий пакета |

Как собрать пакет вручную: заархивируйте корень репозитория (без папки `demo`) в `tpl_wmarka.zip`, папки `tpl_wmarka_vestnik` и `plg_sampledata_wmarka` — в одноимённые архивы, добавьте `com_blank.zip` (компонент «Пустая страница», Alek Volsk, Sergey Tolkachyov) и `lib_juimage.zip` (github.com/Joomla-Ukraine/JUImage), положите всё в `packages/` рядом с `pkg_wmarka.xml` и `script.php` и заархивируйте. Готовые архивы — во вкладке Releases.

Подробно о шаблоне — в [README.md](../README.md).
