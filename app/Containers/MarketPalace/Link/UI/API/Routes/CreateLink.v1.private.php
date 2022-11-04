<?php

/**
 * @apiGroup           Link
 * @apiName            CreateLink
 *
 * @api                {POST} /v1/links Create Link
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

use App\Containers\MarketPalace\Link\UI\API\Controllers\CreateLinkController;
use Illuminate\Support\Facades\Route;

Route::post('links', [CreateLinkController::class, 'createLink'])
    ->middleware(['auth:api']);

