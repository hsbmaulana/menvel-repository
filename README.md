<h1 align="center">Menvel-Repository</h1>

Menvel-Repository is an implementation of repository pattern for Lumen and Laravel.

Getting Started
---

Installation :

```
$ composer require hsbmaulana/menvel-repository
```

How to use it (sample files) :

- Create file app/Contracts/Repository/IRepository.php.

```php
<?php

namespace App\Contracts\Repository;

use Menvel\Repository\Contracts\Allable;
use Menvel\Repository\Contracts\Getable;
use Menvel\Repository\Contracts\Addable;
use Menvel\Repository\Contracts\Modifyable;
use Menvel\Repository\Contracts\Removeable;

interface IRepository extends Allable, Addable, Removeable
{
    //
}
```

- Create file app/Repositories/Eloquent/MyRepository.php.

```php
<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repository\IRepository;
use Menvel\Repository\AbstractRepository;

class MyRepository extends AbstractRepository implements IRepository
{
    /**
     * @param array $querystring
     * @return mixed
     */
    public function all($querystring = []) {}

    /**
     * @param array $data
     * @return mixed
     */
    public function add($data) {}

    /**
     * @param int|string $identifier
     * @return mixed
     */
    public function remove($identifier) {}
}
```

- Create file app/Providers/RepositoryServiceProvider.php.

```php
<?php

namespace App\Providers;

use Menvel\Repository\RepositoryServiceProvider as ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $map =
    [
        \App\Contracts\Repository\IRepository::class => \App\Repositories\Eloquent\MyRepository::class,
    ];
}
```

- Put `App\Providers\RepositoryServiceProvider` to service provider configuration list.

Author
---

- Hasby Maulana ([@hsbmaulana](https://linkedin.com/in/hsbmaulana))
