<?php

/**
 * @apiGroup           Channel
 * @apiName            UpdateChannel
 *
 * @api                {PATCH} /v1/channels/:id Update Channel
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

use App\Containers\MarketPalace\Channel\UI\API\Controllers\UpdateChannelController;
use Illuminate\Support\Facades\Route;

Route::patch('channels/{id}', [UpdateChannelController::class, 'updateChannel'])
    ->middleware(['auth:api']);

