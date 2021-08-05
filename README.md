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

> You better to have installed yarn on your local machine because it is invoked in composer section scripts > install-scripts
> Same is about webpack because command ```make build``` executed ```yarn run``` which invoked ```$ webpack --config webpack.config.js --mode production```

> As a good practice is recommended to install webpack and webpack-dev-server locally, more info [here](https://webpack.js.org/guides/installation/).
> ```yarn add webpack webpack-dev-server --dev``` or  ```npm install webpack webpack-dev-server --save-dev```
 
### Generating the AMP Scripts

Using `make build` you can generate the AMPScripts for each page.

### Work locally

Using `make serve` will open a webserver let you code.

## Yarn watch

During developments you can use `yarn watch` to update build folder on file changes.


## Configuration

The `config.php` file helps you to set up variables.


