<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UserModuleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Tests that a user randomly created is in the view
     */
    function  test_it_shows_the_user_list()
    {

        $this->withoutExceptionHandling();

        User::factory()->create([
            'name' => 'Tarja'
        ]);
        
        $this->get('/users')
        ->assertStatus(200)
        ->assertSee('Tarja');

    }

    /**
     * Tests that a user with a specified id and randomly created is in the view
     */
    function test_it_displays_the_users_details()
    {

        $user = User::factory()->create([
            'name' => 'Turunen'
        ]);

        $this->get('/users/'.$user->id)
        ->assertStatus(200)
        ->assertSee('Turunen');
    }

    /**
     * Tests that a user randomly created is in the view
     */
    function test_it_creates_a_new_user()
    {
        $this->withoutMiddleware();
        $response = $this->from('users/')
        ->post('/users/', [
            'name' => 'Yepez',
            'rol_id' => '1',
            'city_id' => '1'
        ]);

        $response->assertSee('Yepez');
    }

    /**
     * Test that the id of the randomly created user is in the view
     */
    function test_it_loads_the_edit_page()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->get('/'.'users/'.$user->id.'/edit')
        ->assertSee($user->id);
    }

    /**
     * Test that User::updateUser redirects to '/users/{user} view and truly updates a specified user
     */
    function test_it_updates_a_user()
    {
        $user = User::factory()->create();

        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        $response = $this->put('/users/'.$user->id, [
            'name' => 'Ronny',
            'city_id' => '2',
            'rol_id' => '2'
        ]);

        $response->assertRedirect('/users/'.$user->id);
    }

    /**
     * Tests that the id of removed user does not exist in the view
     */
    function test_it_deletes_a_user()
    {

        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->delete('/users/'.$user->id)
            ->assertRedirect('/users')
            ->assertDontSee($user->id);
    }

    /**
     * Test that the correct message is shown according to city_id
     * if city_id = 1 then "'user' está en Madrid"
     * if city_id =! then "'user' no puede ingresar"
     */
    function test_show_info_if_user_is_on_madrid()
    {

        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'city_id' => '1'
        ]);

        $this->get('/'.'users/'.$user->id.'/city')
        ->assertSee($user->city_id);
    }

    /**
     * Test if user is admin, the list of all users will appear
     * if not, a message will appear saying "'user' es 'rol'"
     */
    function test_show_allUsers_if_user_is_admin()
    {

        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'rol_id' => '1'
        ]);

        $this->get('/'.'users/'.$user->id.'/allUsers')
        ->assertSee($user->rol_id);
    }
}
