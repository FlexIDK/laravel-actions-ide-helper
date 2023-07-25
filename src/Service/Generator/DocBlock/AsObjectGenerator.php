<?php

namespace Wulfheart\LaravelActionsIdeHelper\Service\Generator\DocBlock;

use Lorisleiva\Actions\Concerns\AsObject;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Wulfheart\LaravelActionsIdeHelper\Service\ActionInfo;

class AsObjectGenerator extends DocBlockGeneratorBase implements DocBlockGeneratorInterface
{
    protected string $context = AsObject::class;

    /**
     * @return \phpDocumentor\Reflection\DocBlock\Tag[]
     */
    public function generate(ActionInfo $info): array
    {
        /** @var Method $method */
        $method = $this->findMethod($info, 'handle');

        return $method == null ? [] : [new \Wulfheart\LaravelActionsIdeHelper\Service\Generator\DocBlock\Custom\Method('run', $method->getArguments(), $method->getReturnType(), true)];
    }
}
