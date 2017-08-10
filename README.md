### Permutations with repetition
The generator of permutations with repetition (the alphabet size is 2).

## Installation:

```bash
composer install
```

## Usage:

```bash
php index.php --fieldsCount 36 --chipCount 35
```
**Parameters:**
* ``fieldsCount`` - total number of available cells
* ``chipCount`` - number of chips

The result is going to be in the file ``output/permutations.txt``

## Roadmap:

* Tests
* Dockerize the lib
* Use the GMP extension
* Improve the docs
