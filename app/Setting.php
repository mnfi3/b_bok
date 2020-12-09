<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
  use SoftDeletes;

  protected $fillable = ['key', 'value'];


  public static function get($key){
    $result = Setting::where('key', '=', $key)->orderBy('id', 'desc')->first();
    if (is_null($result)){
      $result = new Setting();
    }
    $result->key = $key;

    return $result;
  }


  const KEY_ADDRESS = 'address';
  const KEY_LINK1_TITLE = 'link1-title';
  const KEY_LINK1_URL = 'link1-url';
  const KEY_LINK2_TITLE = 'link2-title';
  const KEY_LINK2_URL = 'link2-url';
  const KEY_LINK3_TITLE = 'link3-title';
  const KEY_LINK3_URL = 'link3-url';

  const KEY_EXPERT_NAME = 'exper-name';
  const KEY_EXPERT_DIRECT_PHONE = 'exper-direct-phone';
  const KEY_EXPERT_INTERNAL_PHONE = 'exper-internal-phone';
  const KEY_EXPERT_EMAIL = 'exper-email';

  const KEY_BOSS_NAME = 'boss-name';
  const KEY_BOSS_DIRECT_PHONE = 'boss-direct-phone';
  const KEY_BOSS_INTERNAL_PHONE = 'boss-internal-phone';
  const KEY_BOSS_EMAIL = 'boss-email';
}
