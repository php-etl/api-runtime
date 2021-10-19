<?php

declare(strict_types=1);

namespace Kiboko\Component\Runtime\API;

use Kiboko\Component\Runtime\Hook\HookRuntimeInterface;

class APIRuntime implements ApiRuntimeInterface
{
    private array $hookRuntimes = [];

    public function addHookRuntime(string $hookName, HookRuntimeInterface $hookRuntime): self
    {
        $this->hookRuntimes[$hookName] = $hookRuntime;
        return $this;
    }

    public function run(string $hookName): int
    {
        if (!array_key_exists($hookName, $this->hookRuntimes)) {
            throw new \RuntimeException(
                sprintf('Unknown hook runtime %s , please register it', $hookName)
            );
        }
        return $this->hookRuntimes[$hookName]->run();
   }

    public function feed(string $hookName, ...$data): self
    {
        if (!array_key_exists($hookName, $this->hookRuntimes)) {
            throw new \RuntimeException(
                sprintf('Unknown hook runtime %s , please register it', $hookName)
            );
        }
        $this->hookRuntimes[$hookName]->feed($data);

        return $this;
    }
}
