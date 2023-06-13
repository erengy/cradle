# Cradle

Cradle is a starter theme for WordPress. Meant to be modified per project and used along with [mu-plugins](https://github.com/erengy/mu-plugins).

## Usage

1. Clone this repository into `wp-content/themes/`:

	`git clone https://github.com/erengy/cradle.git example`

2. Remove the following files and directories:

	- `.git`
	- `.gitignore`
	- `README.md`

3. Replace the following strings in `.php` files:

	- `'cradle'` → `'example'`
	- `namespace Cradle` → `namespace Example`
	- `Cradle\` → `Example\`

4. Update the text domain in `style.css`.

5. Create translation files:

	`wp i18n make-pot . languages/example.pot --include="inc,templates"`

6. Activate the theme:

	`wp theme activate example`

## Recommended plugins

- [ACF PRO](https://www.advancedcustomfields.com/pro/)
- [Classic Editor](https://wordpress.org/plugins/classic-editor/)
- [Classic Widgets](https://wordpress.org/plugins/classic-widgets/)
- [mu-plugins](https://github.com/erengy/mu-plugins)

## License

Licensed under [GNU General Public License v2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html) or later.
