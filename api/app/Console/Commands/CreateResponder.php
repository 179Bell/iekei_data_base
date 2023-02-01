<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateResponder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:responder {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new responder class';

    /**
     * Responderディレクトリへのパス
     */
    protected const RESPONDER_PATH = 'app/Http/Responders/';

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
        $content = "<?php\n\ndeclare(strict_types=1);\n\nnamespace App\Http\Responders;\n\nclass $this->class_name"."\n{\n    public function __construct()\n    {\n\n    }\n\n    public function response()\n    {\n\n    }\n}";
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
