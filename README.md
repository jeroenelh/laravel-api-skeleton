# Laravel skeleton

An empty Laravel API project. Application code lives in `src/` under the `App\` namespace; there is no `app/` folder.

## Requirements

PHP 8.4.3 or higher and Composer. The default database is SQLite.

## First-time setup

```sh
composer setup
```

## Structure

```text
src/
├── Auth/
│   ├── Domain/
│   ├── Application/
│   ├── Infrastructure/Models/User.php
│   └── Interfaces/Http/
└── Shared/
    ├── Domain/
    ├── Application/
    ├── Infrastructure/Providers/SharedServiceProvider.php
    └── Interfaces/Http/
```

`bootstrap/app.php` sets the application path to `src/`, and `composer.json` maps `App\` to `src/`. Routes live in `routes/api.php` under the `/api` prefix, `GET /up` is the health check, and all errors are rendered as JSON.

Artisan generators such as `make:controller` write to `src/Http/...`, so move generated classes into the right context.

## Quality tools

| Command | Tool | Config |
| --- | --- | --- |
| `composer cs:check` | PHP CS Fixer, report only | `.php-cs-fixer.php` |
| `composer cs:fix` | PHP CS Fixer, apply fixes | `.php-cs-fixer.php` |
| `composer md` | PHPMD | `phpmd.xml` |
| `composer psalm` | Psalm with the Laravel plugin | `psalm.xml` |
| `composer deptrac` | Deptrac, layers and contexts | `deptrac.yaml`, `deptrac.contexts.yaml` |
| `composer test` | PHPUnit | `phpunit.xml` |
| `composer quality` | All checks above except `cs:fix` | |

Deptrac checks the layers inside a context (`deptrac.yaml`) and the dependencies between contexts (`deptrac.contexts.yaml`). A context may use its own code, the `Application` layer of another context, and all of `Shared`. Add every new context to `deptrac.contexts.yaml`; until then, each dependency of that context is reported as a violation.

GitHub Actions runs `composer quality` and `composer audit` on every pull request and on pushes to `main`. Dependabot proposes Composer and action updates weekly.
