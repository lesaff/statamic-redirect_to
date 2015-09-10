
# Statamic Addon to automatically redirect page to the first child
By Rudy Affandi (2015)

Version 1.0.0

## What is this?
`redirect_to` redirects page to its first child

## Changelog
- 1.0.0: Initial release

## Installation
Copy the `redirect_to` folder to the `_add-ons` folder in your Statamic website.

## How to use
Use the following single tag in your template.
`{{ redirect_to response="301" }}`

### Available parameters
`response` By default, this is set to `302`. Options (`301`, `302`)