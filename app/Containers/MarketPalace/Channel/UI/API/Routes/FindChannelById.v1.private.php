<?php

/**
 * @apiGroup           Channel
 * @apiName            FindChannelById
 *
 * @api                {GET} /v1/channels/:id Find Channel By Id
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

use App\Containers\MarketPalace\Channel\UI\API\Controllers\FindChannelByIdController;
use Illuminate\Support\Facades\Route;

Route::get('channels/{id}', [FindChannelByIdController::class, 'findChannelById'])
    ->middleware(['auth:api']);

