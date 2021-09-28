<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Instagram;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InstagramPosts
{

  public array $posts;
  public Instagram $instagram;

  /**
   *
   */
  public function __construct ()
  {
    $this->initialInstagram();
  }

  private function initialInstagram (): void
  {
    try {
      $this->instagram = Instagram::firstOrFail();
    } catch (ModelNotFoundException $e) {
      $this->instagram = new Instagram();
      $this->instagram->key = config('instagram.key');
      $this->instagram->posts = [];
      $this->instagram->key_update = Carbon::now();
      $this->instagram->posts_update = Carbon::create('2000', '1', '1');
      $this->instagram->save();
      $this->updateToken();
    }

    $this->updatePosts();

  }

  public function updateToken (): void
  {
    // Запрос на обновление токена
    $url = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=" . $this->instagram->key;
    $instagramCnct = curl_init(); // инициализация cURL подключения
    curl_setopt($instagramCnct, CURLOPT_URL, $url); // адрес запроса
    curl_setopt($instagramCnct, CURLOPT_RETURNTRANSFER, 1); // просим вернуть результат
    $response = json_decode(curl_exec($instagramCnct)); // получаем и декодируем данные из JSON
    curl_close($instagramCnct); // закрываем соединение

    // обновляем токен и дату его создания в базе

    $this->instagram->key = $response->access_token;
    $this->instagram->key_update = Carbon::now();
    $this->instagram->save();
  }

  public function updatePosts (): InstagramPosts
  {
    if (Carbon::now()->diffInDays($this->instagram->posts_update) >= 2) {
      $this->instagram->posts = $this->responsePosts();
      $this->instagram->posts_update = Carbon::now();
      $this->instagram->save();
    }
    $this->posts = $this->instagram->posts;

    return $this;
  }

  private function responsePosts (): array
  {
    $accessToken = $this->instagram->key;
    $url = "https://graph.instagram.com/me/media?fields=id,media_type,media_url,caption,timestamp,thumbnail_url,permalink,children{fields=id,media_url,thumbnail_url,permalink}&limit=6&access_token=" . $accessToken;
    $instagramCnct = curl_init(); // инициализация cURL подключения
    curl_setopt($instagramCnct, CURLOPT_URL, $url); // подключаемся
    curl_setopt($instagramCnct, CURLOPT_RETURNTRANSFER, 1); // просим вернуть результат
    $media = json_decode(curl_exec($instagramCnct)); // получаем и декодируем данные из JSON
    curl_close($instagramCnct); // закрываем соединение

    $instaFeed = array();
    foreach ($media->data as $mediaObj) {
        $instaFeed[$mediaObj->id]['img'] = $mediaObj->thumbnail_url ?? $mediaObj->media_url;
        $instaFeed[$mediaObj->id]['link'] = $mediaObj->permalink;
    }
    return $instaFeed;
  }

}
