<?php
/**
 * @author  Ishwor Khadka <ishworkh@gmail.com>
 * @created 2016-12-26
 */

namespace ArrayIterator;

use Illuminate\Support\ServiceProvider;

/**
 * @author Ishwor Khadka <ishworkh@gmail.com>
 */
class ArrayIteratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ArrayIteratorFactory::class, function () {
            return ArrayIteratorLocator::getInstance()->getArrayIteratorFactory();
        });
    }
}