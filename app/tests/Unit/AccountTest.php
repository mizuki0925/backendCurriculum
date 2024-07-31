<?php

namespace Tests\Unit;

use App\Models\Account;
use Tests\TestCase;

class AccountTest extends TestCase
{
    // テストメソッド毎に最初に実行される
    public function setup(): void
    {
        parent::setUp();

        // // ユーザーデータを一つ作る
        // $user = Account::factory()->create();
        // // ログインした状態にする
        // $this->actingAs($user);

        // ログインを実行
        $this->post('login', [
            'email'    => 'hana1@example.com',
            'password' => 'test01',
        ]);
    }

    /**
     * アカウントページのアクセス確認
     *
     * @return void
     */
    public function testAcsess()
    {
        $response = $this->get('/account');

        $response->assertStatus(200);
    }

    /**
     * アカウント作成の確認
     *
     * @return void
     */
    public function testAccountCreate()
    {

        $response = $this->post('/account/regist', [
            'name' => 'test',
            'email' => 'test7@gmail.com',
            'password' => 'password',
            'tel' => '09011112222',
            'role' => 2,
        ]);

        $response->assertRedirect('/account');
        $response = $this->get('/account')->assertViewHas('success', 'アカウントを登録しました');
        // $this->followRedirects($response)->assertViewHas('success', 'アカウントを登録しました');
    }

    /**
     * 新規登録フォーム表示の確認
     *
     * @test
     * @return void
     */
    public function accountRegist()
    {
        $response = $this->get('/account/regist');

        $response->assertViewIs('account.regist');
    }
}
