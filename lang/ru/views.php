<?php

return [
    'auth' => [
        'register' => [
            'register' => 'Зарегистрировать'
        ]
    ],
    'task' => [
        'name_required' => 'Это обязательное поле: Имя',
        'name_max' => 'Имя слишком длинное, превышает 255 символов',
        'status_required' => 'Это обязательное поле: Статус',

        'created' => 'Задача успешно создана',
        'updated' => 'Задача успешно изменена',
        'deleted' => 'Задача успешно удалена',
        'cannot_delete' => 'Только создатель задачи может удалить ее',

        'create' => 'Создать задачу',
        'edit' => 'Изменение задачи',
        'show' => 'Просмотр задачи',
    ],
    'task-status' => [
        'name_required' => 'Это обязательное поле: Имя',
        'name_unique' => 'Статус с таким именем уже существует',
        'name_max' => 'Имя слишком длинное, превышает 255 символов',

        'created' => 'Статус успешно создан',
        'updated' => 'Статус успешно изменён',
        'deleted' => 'Статус успешно удалён',
        'cannot_delete' => 'Не удалось удалить статус',

        'create' => 'Создать статус',
        'edit' => 'Изменение статуса',
        'show' => 'Просмотр статуса',
    ],
    'label' => [
        'name_required' => 'Это обязательное поле: Имя',
        'name_unique' => 'Метка с таким именем уже существует',
        'name_max' => 'Имя слишком длинное, превышает 255 символов',

        'created' => 'Метка успешно создана',
        'updated' => 'Метка успешно изменена',
        'deleted' => 'Метка успешно удалена',
        'cannot_delete' => 'Не удалось удалить метку',

        'create' => 'Создать метку',
        'edit' => 'Изменение метки',
        'show' => 'Просмотр метки',
    ]
];
