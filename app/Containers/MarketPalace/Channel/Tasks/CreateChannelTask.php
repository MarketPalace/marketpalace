<?php

namespace App\Containers\MarketPalace\Channel\Tasks;

use App\Containers\MarketPalace\Channel\Data\Repositories\ChannelRepository;
use App\Containers\MarketPalace\Channel\Models\Channel;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateChannelTask extends ParentTask
{
    public function __construct(
        protected ChannelRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Channel
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
