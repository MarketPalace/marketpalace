<?php

/**
 * @apiGroup           Cart
 * @apiName            UpdateCart
 *
 * @api                {PATCH} /v1/carts/:id Update Cart
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

use App\Containers\MarketPalace\Cart\UI\API\Controllers\UpdateCartController;
use Illuminate\Support\Facades\Route;

Route::patch('carts/{id}', [UpdateCartController::class, 'updateCart'])
    ->middleware(['auth:api']);

