<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Serviceディレクトリへのパス
     */
    protected const SERVICES_PATH = 'app/Http/Services/';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->class_name = $this->argument('name');
        $this->file_name = self::SERVICES_PATH.$this->class_name.'.php';

        if (! $this->isDirectoryExists()) {
            $this->createDirectory();
        }

        if ($this->isFileExists()) {
            $this->error("{$this->class_name} already exists");
            return;
        }

        $this->createServiceClass();
        $this->info("{$this->class_name} created successfully");
    }

    /**
     *  Serviceクラスを作成
     *
     * @return void
     */
    public function createServiceClass(): void
    {
        $content = "<?php\n\ndeclare(strict_types=1);\n\nnamespace App\Http\Services;\n\nclass $this->class_name" . " extends Controller\n{\n\n}";
        file_put_contents($this->file_name, $content);
    }

    /**
     * 同じ名前のServiceがあるか確認
     * @return bool
     */
    private function isFileExists(): bool
    {
        return file_exists($this->file_name);
    }

    /**
     * Serviceディレクトリが存在するか確認
     *
     * @return boolean
     */
    private function isDirectoryExists(): bool
    {
        return file_exists(self::SERVICES_PATH);
    }

    /**
     * Serviceディレクトリを作成
     *
     * @return void
     */
    private function createDirectory(): void
    {
        mkdir(self::SERVICES_PATH, 0755, true);
    }
}
