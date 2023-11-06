<?php

use Illuminate\Support\Facades\DB;

function wisataImg($id)
{
    $query = DB::table('media')->where('model_type', 'App\Models\Wisata')->where('model_id', $id)->first();

    if ($query) {
        return env('APP_URL')."/storage/".$query->id."/".$query->file_name;
    }
    return "https://api2.kemenparekraf.go.id/storage/app/uploads/public/620/b45/665/620b456650495115128160.jpg";
}
