<?php

namespace App\Containers\MarketPalace\Channel\Tasks;

use App\Containers\MarketPalace\Channel\Data\Repositories\ChannelRepository;
use App\Containers\MarketPalace\Channel\Models\Channel;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateChannelTask extends ParentTask
{
    public function __construct(
        protected ChannelRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Channel
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
