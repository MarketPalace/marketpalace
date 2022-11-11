<?php

/**
 * @apiGroup           Property
 * @apiName            CreateProperty
 *
 * @api                {POST} /v1/properties Create Property
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

use App\Containers\MarketPalace\Property\UI\API\Controllers\CreatePropertyController;
use Illuminate\Support\Facades\Route;

Route::post('properties', [CreatePropertyController::class, 'createProperty'])
    ->middleware(['auth:api']);

