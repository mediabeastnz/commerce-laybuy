# Release Notes for Laybuy for Craft Commerce

## 1.0.1 - 2019-02-10
### Added
- README section on how to update your Craft's `tokenParam` config. The Laybuy gateway returns a querystring that contains the word `token` and Craft by default uses this internally. Thankfully there's an easy way to update your Craft install to use a slightly different word instead.

## 1.0.0 - 2019-02-10
### Added
- Initial release
- Using custom built Omnipay wrapper
- Support for refunds
