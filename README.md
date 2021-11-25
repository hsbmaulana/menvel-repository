<h1 align="center">Menvel-Repository</h1>

Menvel-Repository (still alpha version) offers repository pattern that has capabilities to pipelining, paginating, and caching.

Getting Started
---

Installation :

```
$ composer require hsbmaulana/menvel-repository
```

How to use (somewhere in repository implementation) :

```php
$dataQueryBuilder = \Illuminate\Support\Facades\DB::table('users');
$dataEloquent = App\Models\User::query();

// $filter = new Menvel\Repository\Filter($dataQueryBuilder); //
// Or //
// $filter = new Menvel\Repository\Filter($dataEloquent); //

$filter->through(new Menvel\Repository\Actions\Searcher('id', "3"));
$filter->through(new Menvel\Repository\Actions\Sorter('id:asc,email:desc'));
$filter->through(new Menvel\Repository\Actions\PaginatorLimitOffset(3, 1, 'menvel_current_page'));

$filter->execute();
```

Author
---

- Hasby Maulana ([@hsbmaulana](https://linkedin.com/in/hsbmaulana))
