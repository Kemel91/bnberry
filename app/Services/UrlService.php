<?php
declare(strict_types=1);

namespace App\Services;

use App\Url;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class UrlService
 * @package App\Services
 */
class UrlService
{
    /** @var int $length_short_url Длина URL */
    private int $length_short_url = 4;

    /**
     * Сохранение ссылки
     * @param array $data
     * @return Model
     */
    public function save(array $data): Model
    {
        $url_input = $data['url'];
        if ($url_input[mb_strlen($url_input) - 1] === '/')
        {
            $url_input = mb_substr($url_input, 0, mb_strlen($url_input) - 1);
        }
        $short_url = $data['user_short_url'] ?? $this->shortUrl();
        $date = !empty($data['date']) ? Carbon::parse($data['date'])->format('Y-m-d') : null;
        return Url::query()->firstOrCreate([
            'url' => $url_input,
        ], [
            'short_url' => $short_url,
            'date_delete' => $date
        ]);
    }

    /**
     * Делаем рандомную ссылку
     * @return string
     */
    private function shortUrl(): string
    {
        $short_url = Str::random($this->length_short_url);
        if ($this->checkShortUrl($short_url) === true)
        {
            $this->length_short_url++;
            $short_url = $this->shortUrl();
        }
        return $short_url;
    }

    /**
     * Проверка URL в базе
     * @param string $url
     * @return bool
     */
    private function checkShortUrl(string $url): bool
    {
        return Url::query()->where('short_url', $url)->exists();
    }

}
