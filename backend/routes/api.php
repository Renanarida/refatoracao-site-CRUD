<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReuniaoController;

Route::apiResource('reunioes', ReuniaoController::class);

?>