<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * テストバッチクラス
 */
class TestBatch extends Command
{
    // TODO:⑤参考バッチ
    /**
     * コマンド実行する、コマンド名
     *
     * @var string
     */
    protected $signature = 'command:TestBatch {name} {age}';

    /**
     * TestBatchの説明
     *
     * @var string
     */
    protected $description = 'テスト用コマンド';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info('実行しました。');
        \Log::info($this->argument('name'));
        \Log::info($this->argument('age'));

        return Command::SUCCESS;
    }
}
