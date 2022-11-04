<?php

/**
 * @apiGroup           Product
 * @apiName            UpdateProduct
 *
 * @api                {PATCH} /v1/products/:id Update Product
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

use App\Containers\MarketPalace\Product\UI\API\Controllers\UpdateProductController;
use Illuminate\Support\Facades\Route;

Route::patch('products/{id}', [UpdateProductController::class, 'updateProduct'])
    ->middleware(['auth:api']);

