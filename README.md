# ChapleanBonuslyClientBundle

![Codeship Status for chaplean/bonusly-io-client-bundle](https://app.codeship.com/projects/42812bd0-97bc-0135-385d-161fd251d857/status?branch=master)

# Prerequisites

This version of the bundle requires Symfony 2.8+.

# Installation

## 1. Composer

```bash
composer require chaplean/bonusly-client-bundle
```


## 2. AppKernel.php

Add
```php
new Chaplean\Bundle\BonuslyClientBundle\ChapleanBonuslyClientBundle(),
```


# Configuration

## 1. config.yml
```yml
imports:
    - { resource: '@ChapleanBonuslyClientBundle/Resources/config/config.yml' }
```

## 2. paramters.yml

```yml
chaplean_bonusly.access_token: 'your access token'
```

# Available functions:

* Users
    * getUsers()
    * postUsers()
    * putUsers()
    * deleteUsers()

* Bonuses()
    * getBonuses()
    * postBonuses()

* Companies
    * getCompanies()
    * putCompanies()

* Values
    * getValues()

* Leaderboards
    * getLeaderboards()
