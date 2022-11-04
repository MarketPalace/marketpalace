<?php

/**
 * @apiGroup           Product
 * @apiName            GetAllProducts
 *
 * @api                {GET} /v1/products Get All Products
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

use App\Containers\MarketPalace\Product\UI\API\Controllers\GetAllProductsController;
use Illuminate\Support\Facades\Route;

Route::get('products', [GetAllProductsController::class, 'getAllProducts'])
    ->middleware(['auth:api']);

