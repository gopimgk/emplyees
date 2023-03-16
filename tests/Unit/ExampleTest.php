<?php

namespace Tests\Unit;

use Tests\TestCase;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;
// use Illuminate\Foundation\Testing\RefreshDatabase;
class ExampleTest extends TestCase
{
	// use DatabaseMigrations;
	//  use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
    	 // $response = $this->post('registartionSubmit',['name'=>'mahin1','email'=>'mahin1@gmail.com','password'=>'123456789','role'=>'user']);
      //    // dd($response);
      //   $response->assertStatus(302);
        $response = $this->post('loginCheck',['email'=>'gopik@gmail.com','password'=>'123456789']);
        // dd($response);
        $response->assertStatus(302);
       
         $response1 = $this->post('empDataSubmit',['id'=>'125','FirstName'=>'gopi','LastName'=>'krishna','Skills'=>'php,java','StratDate'=>'2023-03-03']);
         dd($response);
        $response1->assertStatus(302);
         $response2 = $this->post('empUpdateDataSubmit',['id'=>'125','FirstName'=>'gopi','LastName'=>'krishna','Skills'=>'php,java','StratDate'=>'2023-03-03']);
         // dd($response);
        $response2->assertStatus(302);
    }
    //  public function test_reg()
    // {
    //     $response = $this->post('registartionSubmit',['name'=>'mahi','email'=>'mahesh1@gmail.com','password'=>'123456789','role'=>'user']);
    //      // dd($response);
    //     $response->assertStatus(302);
    // }
    //  public function test_createemp()
    // {
    //     $response = $this->post('empDataSubmit',['id'=>'125','FirstName'=>'gopi1','LastName'=>'krishna','Skills'=>'php,java','StratDate'=>'2023-03-03']);
    //      // dd($response);
    //     $response->assertStatus(302);
    // }
    //   public function test_update()
    // {
    //     $response = $this->post('empUpdateDataSubmit',['id'=>'125','FirstName'=>'gopi1','LastName'=>'krishna','Skills'=>'php,java','StratDate'=>'2023-03-03']);
    //      // dd($response);
    //     $response->assertStatus(302);
    // }
}
