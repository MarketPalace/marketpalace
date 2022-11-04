<?php

/**
 * @apiGroup           Product
 * @apiName            FindProductById
 *
 * @api                {GET} /v1/products/:id Find Product By Id
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

use App\Containers\MarketPalace\Product\UI\API\Controllers\FindProductByIdController;
use Illuminate\Support\Facades\Route;

Route::get('products/{id}', [FindProductByIdController::class, 'findProductById'])
    ->middleware(['auth:api']);

