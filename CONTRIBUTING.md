# Contributing

Contributions are welcome. We accept pull requests on [GitHub](https://github.com/nashvillephp/nashvillephp.org).

This project adheres to a [Code of Conduct](https://github.com/nashvillephp/policies). By participating in this project and its community, you are expected to uphold this code.

## Communication Channels

You can find help and discussion in the following places:

* The #php channel on [NashDev Slack](http://nashdev.com)
* The #nashvillephp channel on [Freenode IRC](http://webchat.freenode.net/?channels=%23nashvillephp)

## Reporting Bugs

Bugs are tracked in the project's [issue tracker](https://github.com/nashvillephp/nashvillephp.org/issues).

When submitting a bug report, please include enough information to reproduce the bug. A good bug report includes the following sections:

* Expected outcome
* Actual outcome
* Steps to reproduce, including sample code
* Any other information that will help debug and reproduce the issue, including stack traces, system/environment information, and screenshots

**Please do not include passwords or any personally identifiable information in your bug report and sample code.**

## Fixing Bugs

We welcome pull requests to fix bugs!

If you see a bug report that you'd like to fix, please feel free to do so. Following the directions and guidelines described in the "Adding New Features" section below, you may create bugfix branches and send pull requests.

## Adding New Features

If you have an idea for a new feature, it's a good idea to check out the [issues](https://github.com/nashvillephp/nashvillephp.org/issues) or active [pull requests](https://github.com/nashvillephp/nashvillephp.org/pulls) first to see if the feature is already being worked on. If not, feel free to submit an issue first, asking whether the feature is beneficial to the project. This will save you from doing a lot of development work only to have your feature rejected. We don't enjoy rejecting your hard work, but some features just don't fit with the goals of the project.

When you do begin working on your feature, here are some guidelines to consider:

* Your pull request description should clearly detail the changes you have made. If there is no description or it does not adequately describe your feature, we will ask you to update the description.
* nashvillephp/nashvillephp.org follows the **[PSR-2 coding standard](http://www.php-fig.org/psr/psr-2/)**. Please ensure your code does, too.
* Please **write tests** for any new features you add.
* Please **ensure that tests pass** before submitting your pull request. nashvillephp/nashvillephp.org has Travis CI automatically running tests for pull requests. However, running the tests locally will help save time.
* **Use topic/feature branches.** Please do not ask to pull from your master branch.
* **Submit one feature per pull request.** If you have multiple features you wish to submit, please break them up into separate pull requests.
* **Send coherent history**. Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please squash them before submitting.

## Developing Locally

First, fork this repository and create a new branch for your feature or bugfix.
If you're new to Git or GitHub, you can read about forks and pull requests in
the GitHub [Forking Projects][] and [Understanding the GitHub Flow][] guides.

After cloning your fork and creating a new branch to work in, install the
project dependencies (you'll need to have [Node.js][] and [Composer][]
installed):

    npm install
    composer install

Before you're able to run the website, you'll need to set up some environment
variables. Copy `.env.example` to `.env`, generate an app key, link local
storage for file uploads, and add your Meetup.com API Key:

    cp .env.example .env
    php artisan key:generate
    php artisan storage:link

Go to <https://secure.meetup.com/meetup_api/key/> and copy your Meetup.com API
key. Then, edit `.env` and paste the API key as the value for `MEETUP_API_KEY`:

    MEETUP_API_KEY=XXXXXXXXXXXXXXXXXXXXXXXXXXXXX

Go to <https://developers.google.com/api-client-library/php/start/get_started>
and [create a service account][]. Enable access to the [Google Sheets API][]
for your service account. Copy the JSON file containing your service account
keys to a secure location, and edit `.env` with the full path to the JSON file
as the value for `GOOGLE_APPLICATION_CREDENTIALS`:

    GOOGLE_APPLICATION_CREDENTIALS=/path/to/service-account.json

Create a Google Sheet to which the above credentials have access and copy the
ID of the sheet to `GOOGLE_PROPOSALS_SHEET_ID` in `.env`. Then, grant read and
write access on your sheet to the service account. The service account has an
ID that looks like an email address; use this to "share" the sheet with the
service account.

Now, you're ready to run the website locally for development. Typically, with a
Laravel app, you might be familiar with running `php artisan serve` to run your
app with PHP's built-in web server. Instead, we'll run the following command,
which does the same thing but also watches CSS and JS files for changes:

    npm run serve

Leave it running in your terminal and browse to the website at
<http://localhost:8000>.

While it's running, [Laravel Mix][] watches all your files, and regenerates
assets in the `public/` directory every time a change is made. Meanwhile,
[Browsersync][] refreshes the pages in your browser automatically.

You may tail the log to see any emails that are sent during development
(`.env.example` is set up to use the `log` driver for email messages):

    tail -n 100 storage/logs/laravel.log

That's it! Now, you're ready to develop locally. When you're ready, push your
branch to your fork, and [open a pull request][].

Thanks for helping us out!

### System Dependencies

This project requires [PHP 7.2][]. On macOS or Linux, we recommend using
[PHPBrew][] to install and manage PHP versions. On Windows, [XAMPP][] is a
good choice.

Depending on your system, the npm [mozjpeg][] module (required by [laravel-mix][]
through [img-loader][]) requires libpng16-dev (and possibly nasm) installed. If
using Ubuntu or Debian, you may install these with `apt-get`:

    apt-get install libpng16-dev nasm

## Running Tests

The following must pass before we will accept a pull request. If this does not pass, it will result in a complete build failure. Before you can run this, be sure to `composer install`.

To run all the tests and coding standards checks, execute the following from the command line, while in the project root directory (the same place as the `composer.json` file):

    composer test


[forking projects]: https://guides.github.com/activities/forking/
[understanding the github flow]: https://guides.github.com/introduction/flow/
[open a pull request]: https://help.github.com/articles/creating-a-pull-request-from-a-fork/
[node.js]: https://nodejs.org/
[composer]: https://getcomposer.org/
[php 7.2]: http://php.net/
[phpbrew]: http://phpbrew.github.io/phpbrew/
[xampp]: https://www.apachefriends.org/index.html
[mozjpeg]: https://www.npmjs.com/package/mozjpeg
[laravel-mix]: https://www.npmjs.com/package/laravel-mix
[img-loader]: https://www.npmjs.com/package/img-loader
[laravel mix]: https://www.npmjs.com/package/laravel-mix
[browsersync]: https://www.npmjs.com/package/browser-sync
[create a service account]: https://developers.google.com/api-client-library/php/auth/service-accounts#creatinganaccount
[google sheets api]: https://console.developers.google.com/apis/library/sheets.googleapis.com/
