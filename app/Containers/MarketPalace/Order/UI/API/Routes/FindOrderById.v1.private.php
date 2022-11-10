<?php

/**
 * @apiGroup           Order
 * @apiName            FindOrderById
 *
 * @api                {GET} /v1/orders/:id Find Order By Id
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

use App\Containers\MarketPalace\Order\UI\API\Controllers\FindOrderByIdController;
use Illuminate\Support\Facades\Route;

Route::get('orders/{id}', [FindOrderByIdController::class, 'findOrderById'])
    ->middleware(['auth:api']);

