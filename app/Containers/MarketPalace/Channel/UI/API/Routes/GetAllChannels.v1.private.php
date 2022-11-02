<?php

/**
 * @apiGroup           Channel
 * @apiName            GetAllChannels
 *
 * @api                {GET} /v1/channels Get All Channels
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\MarketPalace\Channel\UI\API\Controllers\GetAllChannelsController;
use Illuminate\Support\Facades\Route;

Route::get('channels', [GetAllChannelsController::class, 'getAllChannels'])
    ->middleware(['auth:api']);

