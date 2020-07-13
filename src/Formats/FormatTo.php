<?php

namespace Ypio\MSGraphFileConverter\Formats;


use ReflectionClass;
use ReflectionException;
use Ypio\MSGraphFileConverter\Exceptions\InvalidOutPutTypeException;

/**
 *
 * Class that extends this one can represent an input format and an output format
 *
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
 *
 * @example ```php
 *
 * class FormatToPdfFrom extends {@see FormatTo} {
 *
 *   public const DOCX = 'docx';
 *
 *   public function input() {
 *      return 'pdf'
 *   }
 *
 * }
 *
 * $format = new FormatToPdfFrom(FormatToPdfFrom::DOCX);
 *
 * ```
 *
 */
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