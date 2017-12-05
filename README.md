# Advanced URL Field

*Advanced URL Field* is a Craft CMS plugin that adds a field type for entering a URL. It uses the standard plain text field, but provides validation to ensure that the value is a properly-formatted URL. The field can also be configured to only accept certain URL types such as absolute, relative, mailto, or tel.

This plugin can help prevent incorrect URLs such as `http://example.com/www.google.com/`, which happen when a user intends to enter an absolute URL but omits the protocol so it is interpreted as a relative URL.

## Requirements

* Craft CMS 2.x

## Installation

1. Download the latest version of *Advanced URL Field*.
2. Move the `advancedurlfield` directory into the `craft/plugins/` directory.
3. In the Craft control panel, go to *Settings > Plugins*.
4. Find *Advanced URL Field* in the list of plugins and click the *Install* button.

## Usage

### Creating an Advanced URL Field

1. Create a new field.
2. Select *Advanced URL* as the field type.
4. Select which URL types to allow.*
5. Attach the new field to a section.

**URL Types*

* **Relative URLS** must match the format of a URL path, relative to the document root, for example `/about` or `/categories/new#first`.
* **Absolute URLS** must match a full absolute url, prefixed with protocol and containing a domain name, for example `https://www.example.com/` or `https://example.com/about`.
* **Mailto Protocol** must be an email address prefixed by `mailto:`.
* **Tel Protocol** must be a phone number prefixed by `tel:`.

### Templating with an Advanced URL Field

In a Twig template, you can retrieve the data just as you would from a plain text field. See the example below, where `myURL` is an Advanced URL field that determines the link destination.

```twig
<a href="{{ entry.myURL }}">My Link</a>
```

---

*Built for [Craft CMS](https://craftcms.com/) by [Charlie Development](http://charliedev.com/)*
