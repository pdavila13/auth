<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')->see('Laravel 5');
    }

    /**
     * Check login page.
     *
     * @return void
     */
    public function testLoginPage()
    {
        //$this->visit('/login')->see('LOGIN');
        $this->visit(route('auth.login'))->see('LOGIN');
    }

    public function atestUserWithoutAccessToResource()
    {
        $this->unlogged();
        $this->visit('/resource')
            ->seePageIs(route('auth.login'))
            ->see('Login')
            ->dontSee('Logout');

        //Session::set('autenticated' == false);
        //$this-> unlogged();
        //$this->visit('/resource')->see('RESOURCE');
        //$this->visit('/resource')->seePageIs(route('auth.login'));
        /*$this->visit('/resource')
            ->seePageIs(route('auth.login'))
            ->see('Login')
            ->dontSee('Logout');*/
    }

    public function testUserWithAccessToResource()
    {
        $this->logged();
        $this->visit('/resource')
            ->seePageIs('/resource');
    }

    public function logged()
    {
        Auth::loginUsingId(1);
        //Session::set('autenticated',true);
    }

    public function unlogged()
    {
        Auth::logout();
        //Session:set('autenticated',false);
    }

    public function AtestLoginPageHaveRegisterLinkAndWorksOk()
    {
        //$this->visit('/login')->Click('register')->seePageIs('/register');
    }

    public function AtestPostLoginOk()
    {
        $this->visit('/login')
            ->type('pepitopalotes@iesebre.com', 'email')
            ->type('pepito', 'password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/home');
    }

    public function AtestPostLoginNotOk()
    {
        $this->visit('/login')
            ->type('paolodavila@iesebre.com', 'email')
            ->type('123', 'password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/login');
    }
}
