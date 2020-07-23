<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Сущность Url
 * @package App
 * @property int $id Идентификатор
 * @property string $url Полный Url сайта
 * @property string $short_url Сокращение
 * @property \DateTime $date_delete Дата удаления
 * @property \DateTime $created_at Дата и время создания
 * @property \DateTime $updated_at Дата и время обновления
 */
class Url extends Model
{
    /** @var string[] $fillable Поля для авто заполнения */
    protected $fillable = [
        'url',
        'short_url',
        'date_delete'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'short_url';
    }
}
