<?php
/**
 * @author  Ishwor Khadka <ishwor.khadka@kiosked.com>
 * @created 2016-12-26
 */

namespace ArrayIterator;

use Illuminate\Support\ServiceProvider;

/**
 * @author Ishwor Khadka <ishwor.khadka@kiosked.com>
 */
class ArrayIteratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ArrayIteratorFactory::class, function(){
           return ArrayIteratorLocator::getInstance()->getArrayIteratorFactory();
        });
    }
}