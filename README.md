# famous-shablon.ru


Сайт представляет простую структуру MVC, с единой точкой входа `"index.php"`, а также:

- `"config.php"` содержит класс `Core` с основными переменными
- `"variables.php"` для роутинга страниц, с определением допустимых адресов страниц, и переадресация на ошибку 404

Контроллеры содержаться в папке `"/modules"`, вид в `"/skins"`. 

Вид содержит точку входа `"/skins/default/index.tpl"`. 

Админка расположена в `"/modules/admin", "/skins/admin"`.

Пример кода PHP можно посмотреть в папке `"/libs"`, код представлен классами и набором используемых функций в папке `"/libs/default.php"`

Пример кода JavaScript в папке `"/skins/default/js/script-v1.js"`






