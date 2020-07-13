<?php

namespace Ypio\MSGraphFileConverter\Exceptions;

use LogicException;

/**
 * Exception that occur when trying to use an invalid format.
 *
 * Note :
 * * This exception is not thrown if the format has been already sent to MSGraph. In this case {@see MSGraphException} will occurred
 *
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
 */
class InvalidOutPutTypeException extends LogicException {



}