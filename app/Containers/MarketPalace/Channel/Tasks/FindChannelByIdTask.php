<?php

namespace App\Containers\MarketPalace\Channel\Tasks;

use App\Containers\MarketPalace\Channel\Data\Repositories\ChannelRepository;
use App\Containers\MarketPalace\Channel\Models\Channel;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindChannelByIdTask extends ParentTask
{
    public function __construct(
        protected ChannelRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Channel
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
