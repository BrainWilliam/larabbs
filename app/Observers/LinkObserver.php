<?php

namespace App\Observers;

use Cache;
use App\Models\Link;

class LinkObserver
{

	// creating, created, updating, updated, saving,
	// saved,  deleting, deleted, restoring, restored
	public function saved(Link $link){
		Cache::forget($link->cache_key);
	}
	public function updated(Link $link){
		Cache::forget($link->cache_key);
	}
}
