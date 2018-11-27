# bonusly-client-bundle

[![build status](https://git.chaplean.coop/open-source/bundle/bonusly-client-bundle/badges/master/build.svg)](https://git.chaplean.coop/open-source/bundle/bonusly-client-bundle/commits/master)
[![build status](https://git.chaplean.coop/open-source/bundle/bonusly-client-bundle/badges/master/coverage.svg)](https://git.chaplean.coop/open-source/bundle/bonusly-client-bundle/commits/master)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/chaplean/bonusly-client-bundle/issues)

This bundle allows you to use the [bonusly api](https://www.bonusly.org/projects/bonusly/wiki/Rest_api) easily from your php code.

## Table of content

* [Installation](#Installation)
* [Configuration](#Configuration)
* [Usage](#Usage)
* [Versioning](#Versioning)
* [Contributing](#Contributing)
* [Hacking](#Hacking)
* [License](#License)

## Installation

This bundle requires at least Symfony 3.0.

You can use [composer](https://getcomposer.org) to install bonusly-client-bundle:
```bash
composer require chaplean/bonusly-client-bundle
```

Then add to your AppKernel.php:

```php
new Chaplean\Bundle\BonuslyClientBundle\ChapleanBonuslyClientBundle(),
```

## Configuration

First you will need to import the bundle configuration.

config.yml:
```yaml
imports:
    - { resource: '@ChapleanBonuslyClientBundle/Resources/config/config.yml' }
```

You must also create some parameters.

parameters.yml:
```yaml
parameters:
    chaplean_bonusly.access_token: 'your access token'
```

## Usage

See the rest-client-bundle's [usage documentation](https://github.com/chaplean/rest-client-bundle#using-a-bundle-based-on-rest-client-bundle).

### Available functions:

* [Users](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/users)
    * [getUsers()](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/users/endpoints/list-users)
    * [postUsers()](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/users/endpoints/list-users-8e2b0d72-7e30-48ab-8c26-693a19235da5)
    * [putUsers()](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/users/endpoints/list-users-a95bfa92-248a-4f2f-8bfc-deacb9fcd7e0)
    * [deleteUsers()](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/users/endpoints/list-users-276907b3-2691-42d9-a4e8-4e6fab396386)

* [Bonuses()](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/bonuses)
    * [getBonuses()](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/bonuses/endpoints/list-bonuses)
    * [postBonuses()](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/bonuses/endpoints/list-bonuses-db38e8a0-56bb-4b0d-95d0-52590a9a11c4)

* [Companies](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/companies)
    * [getCompanies()](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/companies/endpoints/list-companies)
    * [putCompanies()](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/companies/endpoints/list-companies-2e014ef7-a6d6-4410-945d-02401f269002)

* [Analytics](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/analytics)
    * [getLeaderboards()](https://bonusly.gelato.io/docs/versions/353215342023018198/resources/analytics/endpoints/list-analytics-b75d9a42-603a-44fa-b172-4e6fdca9e7b8)

## Versioning

bonusly-client-bundle follows [semantic versioning](https://semver.org/). In short the scheme is MAJOR.MINOR.PATCH where
1. MAJOR is bumped when there is a breaking change,
2. MINOR is bumped when a new feature is added in a backward-compatible way,
3. PATCH is bumped when a bug is fixed in a backward-compatible way.

Versions bellow 1.0.0 are considered experimental and breaking changes may occur at any time.

## Contributing

Contributions are welcomed! There are many ways to contribute, and we appreciate all of them. Here are some of the major ones:

* [Bug Reports](https://github.com/chaplean/bonusly-client-bundle/issues): While we strive for quality software, bugs can happen and we can't fix issues we're not aware of. So please report even if you're not sure about it or just want to ask a question. If anything the issue might indicate that the documentation can still be improved!
* [Feature Request](https://github.com/chaplean/bonusly-client-bundle/issues): You have a use case not covered by the current api? Want to suggest a change or add something? We'd be glad to read about it and start a discussion to try to find the best possible solution.
* [Pull Request](https://github.com/chaplean/bonusly-client-bundle/pulls): Want to contribute code or documentation? We'd love that! If you need help to get started, GitHub as [documentation](https://help.github.com/articles/about-pull-requests/) on pull requests. We use the ["fork and pull model"](https://help.github.com/articles/about-collaborative-development-models/) were contributors push changes to their personnal fork and then create pull requests to the main repository. Please make your pull requests against the `master` branch.

As a reminder, all contributors are expected to follow our [Code of Conduct](CODE_OF_CONDUCT.md).

## Hacking

You might find the following commands usefull when hacking on this project:

```bash
# Install dependencies
composer install

# Run tests
bin/phpunit
```

## License

bonusly-client-bundle is distributed under the terms of the MIT license.

See [LICENSE](LICENSE.md) for details.
