<?php
/**
 * Created by PhpStorm.
 * User: Dmitry Andreevich
 * Date: 14.06.2018
 * Time: 11:44
 */

namespace App\Classes;


class ValidateMessages
{
    const ORGANIZATION_STORE = [
        'cover.required' => 'Вы не выбрали обложку.',
        'cover.image' => 'Обложка должна быть картинкой.',
        'cover.max' => 'Превышен максимальный размер обложки. Макс. - :max',

        'docs.required' => 'Вы не выбрали документ.',
        'docs.file' => 'Документ должен быть файлом.',
        'docs.max' => 'Превышен максимальный размер документа. Макс. - :max',

        'photos.required' => 'Выберите фотографии для организации.',
        'address.required' => 'Вы не указали адрес.',
        'name.required' => 'Вы не указали имя организации.',
        'name.max' => 'Максимальное количество символов в имени - :max',

        'description.required' => 'Поле описание, является обязательным для заполнения.',
        'description.between' => 'Размер описания должен быть :min - :max символов.',

    ];

}
