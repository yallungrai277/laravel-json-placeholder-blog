<?php

namespace JsonRai277\LaravelJsonPlaceholder\Exceptions;

use Exception;

class LaravelJsonPlaceholderException extends Exception
{
    /**
     * Throw a new exception.
     */
    public static function new(string $message, int $code = 500): self
    {
        return new self($message, $code);
    }

    /**
     * Throw a response failed exception.
     */
    public static function responseFailed(string $message, int $code): self
    {
        return static::new($message, $code);
    }

    /**
     * Throw a json placeholder url not set exception.
     */
    public static function jsonPlacedHolderUrlNotSet(): self
    {
        return static::new('Json placeholder url has not been setup in the config.', 500);
    }

    /**
     * Throw invalid template engine excption.
     */
    public static function invalidTemplateEngine(): self
    {
        return static::new('Invalid template engine used. Supported is blade.', 500);
    }
}
