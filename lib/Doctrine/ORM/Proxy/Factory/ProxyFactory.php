<?php


declare(strict_types=1);

namespace Doctrine\ORM\Proxy\Factory;

use ProxyManager\Proxy\GhostObjectInterface;

interface ProxyFactory
{
    /**
     * Never autogenerate a proxy and rely that it was generated by some
     * process before deployment.
     *
     * @var integer
     */
    const AUTOGENERATE_NEVER = 0;

    /**
     * Always generates a new proxy in every request.
     *
     * This is only sane during development.
     *
     * @var integer
     */
    const AUTOGENERATE_ALWAYS = 1;

    /**
     * Autogenerate the proxy class when the proxy file does not exist.
     *
     * This strategy causes a file exists call whenever any proxy is used the
     * first time in a request.
     *
     * @var integer
     */
    const AUTOGENERATE_FILE_NOT_EXISTS = 2;

    /**
     * Generate the proxy classes using eval().
     *
     * This strategy is only sane for development, and even then it gives me
     * the creeps a little.
     *
     * @var integer
     */
    const AUTOGENERATE_EVAL = 3;

    /**
     * @param \Doctrine\ORM\Mapping\ClassMetadata[] $classMetadataList
     *
     * @return int
     */
    public function generateProxyClasses(array $classMetadataList) : int;

    /**
     * Gets a reference proxy instance for the entity of the given type and identified by
     * the given identifier.
     */
    public function getProxy(string $className, array $identifier) : GhostObjectInterface;
}
