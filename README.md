# Nashville PHP (nashvillephp.org)

## Code of conduct

This project adheres to a [Code of Conduct][]. By participating in this project
and its community, you are expected to uphold this code.

## Contributing

Contributions are welcome! Please read [CONTRIBUTING][] for details.

## Developing locally

To run the website locally for development, use

    npm run serve

Leave it running in your terminal and browse to the website at
<http://localhost:8000>.

While it's running, [Laravel Mix][] watches assets, according to the settings
in `webpack.mix.js`, and regenerates those assets in the `public/` directory
every time a change is made. Meanwhile, [Browsersync][] refreshes the pages
in your browser automatically.

## Deployment notes

* The npm [mozjpeg][] module (required by [laravel-mix][] through [img-loader][])
  requires libpng16-dev installed on the server: `apt-get install libpng16-dev`

## Copyright and license

The content and source code of nashvillephp.org is copyright © Nashville PHP.

Except where otherwise noted, content on nashvillephp.org is licensed under a
[Creative Commons Attribution-ShareAlike 4.0 International License][cc-by-sa].

The nashvillephp.org source code is licensed under the MIT License (MIT).

Portions of the source code are copyright © Taylor Otwell and licensed under
the MIT License (MIT).

Please see [LICENSE][] for more information.


[code of conduct]: https://github.com/nashvillephp/policies
[contributing]: https://github.com/nashvillephp/nashvillephp.org/blob/master/CONTRIBUTING.md
[cc-by-sa]: https://creativecommons.org/licenses/by-sa/4.0/
[license]: https://github.com/nashvillephp/nashvillephp.org/blob/master/LICENSE
[mozjpeg]: https://www.npmjs.com/package/mozjpeg
[laravel-mix]: https://www.npmjs.com/package/laravel-mix
[img-loader]: https://www.npmjs.com/package/img-loader
[laravel mix]: https://www.npmjs.com/package/laravel-mix
[browsersync]: https://www.npmjs.com/package/browser-sync
