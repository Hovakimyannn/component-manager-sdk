<?php

namespace App\Services;

use ComponentManager\ComponentManagerServiceClient;
use ComponentManager\UpdateBlockVersionRequest;
use ComponentManager\UpdateBlockSubVersionRequest;
use ComponentManager\EnableBlockMigrationRequest;
use ComponentManager\DisableBlockMigrationRequest;

use const Grpc\STATUS_OK;

/**
 * To manage gRPC communication.
 */
class ComponentManagerGrpcService
{
    /**
     * @param \ComponentManager\ComponentManagerServiceClient $client
     */
    public function __construct(private readonly ComponentManagerServiceClient $client)
    {
    }

    /**
     * @param int    $blockId
     * @param string $version
     *
     * @return array
     */
    public function updateBlockVersion(int $blockId, string $version): array
    {
        $request = new UpdateBlockVersionRequest();
        $request->setBlockId($blockId);
        $request->setVersion($version);

        [$response, $status] = $this->client->UpdateBlockVersion($request)->wait();

        return $this->handleResponse($response, $status);
    }

    /**
     * @param int    $blockId
     * @param string $subVersion
     *
     * @return array
     */
    public function updateBlockSubVersion(int $blockId, string $subVersion): array
    {
        $request = new UpdateBlockSubVersionRequest();
        $request->setBlockId($blockId);
        $request->setSubVersion($subVersion);

        [$response, $status] = $this->client->UpdateBlockSubVersion($request)->wait();

        return $this->handleResponse($response, $status);
    }

    /**
     * @param int $blockId
     *
     * @return array
     */
    public function enableBlockMigration(int $blockId): array
    {
        $request = new EnableBlockMigrationRequest();
        $request->setBlockId($blockId);

        [$response, $status] = $this->client->EnableBlockMigration($request)->wait();

        return $this->handleResponse($response, $status);
    }

    /**
     * @param int $blockId
     *
     * @return array
     */
    public function disableBlockMigration(int $blockId): array
    {
        $request = new DisableBlockMigrationRequest();
        $request->setBlockId($blockId);

        [$response, $status] = $this->client->DisableBlockMigration($request)->wait();

        return $this->handleResponse($response, $status);
    }

    /**
     * @param $response
     * @param $status
     *
     * @return array
     */
    private function handleResponse($response, $status): array
    {
        if ($status->code !== STATUS_OK) {
            return [
                'success' => false,
                'message' => $status->details,
            ];
        }

        return [
            'success' => $response->getSuccess(),
            'message' => $response->getMessage(),
        ];
    }
}
