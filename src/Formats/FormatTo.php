<?php

namespace Ypio\MSGraphFileConverter\Formats;


use ReflectionClass;
use ReflectionException;
use Ypio\MSGraphFileConverter\Exceptions\InvalidOutPutTypeException;

abstract class FormatTo {

    private $type;

    /**
     * FormatTo constructor.
     * @param string $type
     * @throws ReflectionException
     */
    public function __construct(string $type)
    {

        $reflection = new ReflectionClass($this);

        if (!in_array($type, $reflection->getConstants(), true)) {
            throw new InvalidOutPutTypeException();
        }

        $this->type = $type;
    }

    public function input(): string
    {
        return $this->type;
    }

    public function compare(string $type): bool
    {
        return $this->type === $type;
    }

    abstract public function output(): string;

}