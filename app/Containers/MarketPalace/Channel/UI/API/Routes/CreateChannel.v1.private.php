<?php

/**
 * @apiGroup           Channel
 * @apiName            CreateChannel
 *
 * @api                {POST} /v1/channels Create Channel
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

use App\Containers\MarketPalace\Channel\UI\API\Controllers\CreateChannelController;
use Illuminate\Support\Facades\Route;

Route::post('channels', [CreateChannelController::class, 'createChannel'])
    ->middleware(['auth:api']);

