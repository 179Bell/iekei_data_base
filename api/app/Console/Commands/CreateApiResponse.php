<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateApiResponse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:apiresponder {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new api responder class';

    /**
     * Responderディレクトリへのパス
     */
    protected const RESPONDER_PATH = 'app/Http/Responders/api/';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->class_name = $this->argument('name');
        $this->file_name = self::RESPONDER_PATH.$this->class_name.'.php';

        if (! $this->isDirectoryExists()) {
            $this->createDirectory();
        }

        if ($this->isFileExists()) {
            $this->error("{$this->class_name} already exists");
            return;
        }

        $this->createResponderClass();
        $this->info("{$this->class_name} created successfully");
    }

    /**
     *  Responderクラスを作成
     *
     * @return void
     */
    public function createResponderClass(): void
    {
        $content = <<<EOD
        <?php

        declare(strict_types=1);

        namespace App\Http\Responders\api;

        use Illuminate\Http\Response;

        class {$this->class_name}
        {
            public function __construct()
            {

            }

            public function response()
            {

            }
        }
        EOD;
        file_put_contents($this->file_name, $content);
    }

    /**
     * 同じ名前のResponderがあるか確認
     * @return bool
     */
    private function isFileExists(): bool
    {
        return file_exists($this->file_name);
    }

    /**
     * Responderディレクトリが存在するか確認
     *
     * @return boolean
     */
    private function isDirectoryExists(): bool
    {
        return file_exists(self::RESPONDER_PATH);
    }

    /**
     * Responderディレクトリを作成
     *
     * @return void
     */
    private function createDirectory(): void
    {
        mkdir(self::RESPONDER_PATH, 0755, true);
    }
}
