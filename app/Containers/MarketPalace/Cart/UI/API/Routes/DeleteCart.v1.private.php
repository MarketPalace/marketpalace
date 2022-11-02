<?php

/**
 * @apiGroup           Cart
 * @apiName            DeleteCart
 *
 * @api                {DELETE} /v1/carts/:id Delete Cart
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

use App\Containers\MarketPalace\Cart\UI\API\Controllers\DeleteCartController;
use Illuminate\Support\Facades\Route;

Route::delete('carts/{id}', [DeleteCartController::class, 'deleteCart'])
    ->middleware(['auth:api']);

