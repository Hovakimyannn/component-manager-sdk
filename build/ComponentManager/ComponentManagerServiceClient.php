<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ComponentManager;

/**
 */
class ComponentManagerServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \ComponentManager\UpdateBlockVersionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateBlockVersion(\ComponentManager\UpdateBlockVersionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/componentManager.ComponentManagerService/UpdateBlockVersion',
        $argument,
        ['\ComponentManager\UpdateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ComponentManager\UpdateBlockSubVersionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateBlockSubVersion(\ComponentManager\UpdateBlockSubVersionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/componentManager.ComponentManagerService/UpdateBlockSubVersion',
        $argument,
        ['\ComponentManager\UpdateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ComponentManager\EnableBlockMigrationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function EnableBlockMigration(\ComponentManager\EnableBlockMigrationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/componentManager.ComponentManagerService/EnableBlockMigration',
        $argument,
        ['\ComponentManager\UpdateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ComponentManager\DisableBlockMigrationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DisableBlockMigration(\ComponentManager\DisableBlockMigrationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/componentManager.ComponentManagerService/DisableBlockMigration',
        $argument,
        ['\ComponentManager\UpdateResponse', 'decode'],
        $metadata, $options);
    }

}
