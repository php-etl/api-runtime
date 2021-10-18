<?php

namespace Kiboko\Component\Runtime\Api;

use Kiboko\Component\Runtime\Hook\HookRuntimeInterface;

interface ApiRuntimeInterface
{
    public function addHookRuntime(string $hookName, HookRuntimeInterface $hookRuntime): self;
    public function feed(string $hookName, ...$data): self;
    public function run(string $hookName): int;
}
