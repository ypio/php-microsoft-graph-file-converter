<?php

namespace Ypio\MSGraphFileConverter\Formats;


use ReflectionClass;
use ReflectionException;
use Ypio\MSGraphFileConverter\Exceptions\InvalidOutPutTypeException;

/**
 *
 * Class that extends this one can represent an input format and an output format
 *
 *
 * Example :
 * ```php
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
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
 *
 *
 */
abstract class FormatTo {

    private $type;

    /**
     * FormatTo constructor.
     *
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

    /**
     * Get the input format
     * @return string
     */
    public function input(): string
    {
        return $this->type;
    }

    /**
     * Get the output format
     *
     * @return string
     */
    abstract public function output(): string;

}