<?php

namespace spec\App;

use App\Models\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class UserSpec
 * Generated as an example using `vendor/bin/phpspec desc App\\User`
 * @package spec\App
 */
class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }
}
