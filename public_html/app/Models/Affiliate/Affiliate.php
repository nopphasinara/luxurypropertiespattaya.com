<?php

namespace App\Models\Affiliate;

use Illuminate\Database\Eloquent\Model;
//
use App\Models\Affiliate\AffiliateLink;
use App\Models\Affiliate\AffiliateSession;

class Affiliate extends Model
{
  //
  public static function track()
  {
    $affiliate_user = '';

    $client_ip = request()->getClientIp();
    $landing_uri = request()->getUri();
    $requested_uri = request()->getRequestUri();

    $uid = request()->cookie('__atuvs', md5(rand()));
    $aid = request('aid', '');

    if ($aid) {
      $affiliate_user = \App\User::where('id', $aid)->first();

      if (!isset($_COOKIE['affiliate_id'])) {
        setcookie('affiliate_id', encrypt($aid . ':' . $requested_uri), strtotime('+1 hours'), '/');
      }
    }
  }
}
