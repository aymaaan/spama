<?php

namespace App\Http\Middleware;

use Closure;
use session;
use App\BlockList;
class RestrictIp

{

public function handle($request, Closure $next)

{
$ips = BlockList::pluck('ip')->implode(',');
$restricted_ip = $ips; // add IP's by comma separated

$ipsDeny = explode(',',preg_replace('/\s+/', '', $restricted_ip));

if(count($ipsDeny) >= 1 )

{

if(in_array(request()->ip(), $ipsDeny))

{

return abort('404');

}

}

return $next($request);

}

}