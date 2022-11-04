<?php

/**
 * @apiGroup           Product
 * @apiName            DeleteProduct
 *
 * @api                {DELETE} /v1/products/:id Delete Product
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

use App\Containers\MarketPalace\Product\UI\API\Controllers\DeleteProductController;
use Illuminate\Support\Facades\Route;

Route::delete('products/{id}', [DeleteProductController::class, 'deleteProduct'])
    ->middleware(['auth:api']);

