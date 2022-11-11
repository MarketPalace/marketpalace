<?php

/**
 * @apiGroup           Property
 * @apiName            FindPropertyById
 *
 * @api                {GET} /v1/properties/:id Find Property By Id
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

use App\Containers\MarketPalace\Property\UI\API\Controllers\FindPropertyByIdController;
use Illuminate\Support\Facades\Route;

Route::get('properties/{id}', [FindPropertyByIdController::class, 'findPropertyById'])
    ->middleware(['auth:api']);

