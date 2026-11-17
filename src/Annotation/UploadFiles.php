<?php
namespace Ray\HttpMessage\Annotation;

use Attribute;
use Ray\Di\Di\Qualifier;

/**
 * Qualifies the uploaded files of the request as a tree of UploadedFileInterface
 *
 * @see https://bearsunday.github.io/manuals/1.0/en/psr7.html#upload-files
 */
#[Attribute(Attribute::TARGET_METHOD), Qualifier]
final class UploadFiles
{
}
