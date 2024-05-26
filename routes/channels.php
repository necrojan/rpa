<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('itemcreated', function ($user, $id) {
    return true;
});

Broadcast::channel('itemupdated', function ($user, $id) {
    return true;
});
