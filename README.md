# Salesforce Marketing Cloud - Application Bootstrapper

This project helps to build on SFMC.

## Requirements

- PHP
- Composer
- Make
- Yarn

## Installation

You can install the project via `composer`

```bash
composer create-project almaviacx/sfmc-bootstrapper mysfmcapp --no-interaction
```
 
> Waiting for this repository to be tagged, you might have to do `almaviacx/sfmc-bootstrapper:dev-main` (depending on your context/config)
 
 
### Generating the AMP Scripts

Using `make build` you can generate the AMPScripts for each page.

### Work locally

Using `make serve` will open a webserver let you code.

## Yarn watch

During developments you can use `yarn watch` to update build folder on file changes.


## Configuration

The `config.php` file helps you to set up variables.


