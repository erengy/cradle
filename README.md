# Cradle

Cradle is a starter theme for WordPress. Meant to be modified per project and used along with [mu-plugins](https://github.com/erengy/mu-plugins).

## Usage

1. [Download](https://github.com/erengy/cradle/archive/refs/heads/master.zip) or [install](https://developer.wordpress.org/cli/commands/theme/install/) this repository to `wp-content/themes/`:

	`wp theme install https://github.com/erengy/cradle/archive/refs/heads/master.zip`

2. Remove or modify `README.md`.

3. Replace the following strings in `.php` files:

	- `'cradle'` → `'example'`
	- `namespace Cradle` → `namespace Example`
	- `Cradle\` → `Example\`

4. Update the header fields in `style.css`.

5. Build the main stylesheet:

	`sass assets/css/main.scss assets/css/main.css`

6. Create translation files:

	`wp i18n make-pot . languages/example.pot --include="inc,templates"`

7. Activate the theme:

	`wp theme activate example`

## Recommended plugins

- [Advanced Custom Fields](https://www.advancedcustomfields.com/)
- [Classic Editor](https://wordpress.org/plugins/classic-editor/)
- [Classic Widgets](https://wordpress.org/plugins/classic-widgets/)
- [mu-plugins](https://github.com/erengy/mu-plugins)

## License

Licensed under [GNU General Public License v2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html) or later.
