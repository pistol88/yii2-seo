Yii2-seo
==========

Модуль дает возможность быстро присвоить и быстро распаковать СЕО поля: титл, дескрипшн, кейвордс (ТДК) и т.д.

Установка
---------------------------------

Выполнить команду

```
php composer require pistol88/yii2-seo "*"
```

Или добавить в composer.json

```
"pistol88/yii2-seo": "*",
```

И выполнить

```
php composer update
```

Миграция:

```
php yii migrate --migrationPath=vendor/pistol88/yii2-seo/migrations
```

Использование
---------------------------------

К модели подключить поведение:

```php
    function behaviors()
    {
        return [
            'seo' => [
                'class' => 'pistol88\seo\behaviors\SeoFields',
            ],
        ];
    }
```

Теперь все СЕО поля доступны при вызове $model->seo.

Пример использования во вью файле:

```php

if(!$title = $model->seo->title) {
    $title = "Купить {$model->name} в Кургане в магазине «Шоп45»";
}

if(!$description = $model->seo->description) {
    $description = 'Страница '.$model->name;
}

if(!$keywords = $model->seo->keywords) {
    $keywords = '';
}

$this->title = $title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $description,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $keywords,
]);

```

Виджеты
---------------------------------

Ввод СЕО полей:
```
<?=\pistol88\seo\widgets\SeoForm::widget([
        'model' => $model, 
        'form' => $form, 
    ]); ?>
```
Его необходимо вызвать внутри формы редактирования вашей модели.
