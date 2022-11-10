<?php

/**
 * @apiGroup           Order
 * @apiName            CreateOrder
 *
 * @api                {POST} /v1/orders Create Order
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

use App\Containers\MarketPalace\Order\UI\API\Controllers\CreateOrderController;
use Illuminate\Support\Facades\Route;

Route::post('orders', [CreateOrderController::class, 'createOrder'])
    ->middleware(['auth:api']);

