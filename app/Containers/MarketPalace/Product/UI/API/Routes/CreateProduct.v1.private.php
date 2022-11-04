<?php

/**
 * @apiGroup           Product
 * @apiName            CreateProduct
 *
 * @api                {POST} /v1/products Create Product
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

use App\Containers\MarketPalace\Product\UI\API\Controllers\CreateProductController;
use Illuminate\Support\Facades\Route;

Route::post('products', [CreateProductController::class, 'createProduct'])
    ->middleware(['auth:api']);

