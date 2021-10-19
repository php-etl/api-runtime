<?php

namespace Kiboko\Component\Runtime\API;

use Kiboko\Component\Runtime\Hook\HookRuntimeInterface;

interface APIRuntimeInterface
{
    public function addHookRuntime(string $hookName, HookRuntimeInterface $hookRuntime): self;
    public function feed(string $hookName, ...$data): self;
    public function run(string $hookName): array;
}
