<?php
namespace Ray\HttpMessage\Annotation;

use Attribute;
use Ray\Di\Di\Qualifier;

#[Attribute(Attribute::TARGET_METHOD), Qualifier]
final class UploadFiles
{
}
