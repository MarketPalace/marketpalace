<?php

/**
 * @apiGroup           Link
 * @apiName            GetAllLinks
 *
 * @api                {GET} /v1/links Get All Links
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

use App\Containers\MarketPalace\Link\UI\API\Controllers\GetAllLinksController;
use Illuminate\Support\Facades\Route;

Route::get('links', [GetAllLinksController::class, 'getAllLinks'])
    ->middleware(['auth:api']);

