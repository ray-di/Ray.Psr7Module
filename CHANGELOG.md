# Changelog

All notable changes to this project will be documented in this file.

## [1.4.0] - 2026-01-29

### Added
- PHP 8 Attribute support for `UploadFiles`.
- Lazy Loading example in README.

### Changed
- Required PHP version increased to `^8.1`.
- `HttpRequestProvider` now implements `Ray\Di\ProviderInterface` directly.
- Updated `doctrine/coding-standard` to `^13.0`.

### Deprecated
- `Ray\HttpMessage\RequestProviderInterface` (Use `Ray\Di\ProviderInterface` instead).
- `Ray\HttpMessage\HttpRequestRayProvider` (Use `Ray\HttpMessage\HttpRequestProvider` instead).

### Removed
- Support for PHP 7.3, 7.4, and 8.0.
- Dependency on `doctrine/annotations` and `koriym/attributes`.
- Direct dependency on `ray/aop`.
