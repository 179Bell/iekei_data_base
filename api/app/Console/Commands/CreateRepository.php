<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * Repositoriesディレクトリへのパス
     */
    protected const REPOSITORY_PATH = 'app/Http/Repositories/';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->class_name = $this->argument('name');
        $this->repository_name = self::REPOSITORY_PATH.$this->class_name.'.php';
        $this->interface_name = self::REPOSITORY_PATH.$this->class_name.'Interface.php';

        if (! $this->isDirectoryExists()) {
            $this->createDirectory();
        }

        if ($this->isRepositoryExists()) {
            $this->error("{$this->class_name} already exists");
            return;
        }

        if ($this->isInterfaceExists()) {
            $this->error("{$this->class_name}Interface already exists");
            return;
        }

        $this->createRepositoryClass();
        $this->createRepositoryInterface();
        $this->info("{$this->class_name} created successfully");
    }

    /**
     * Repositoryクラスを作成
     *
     * @return void
     */
    public function createRepositoryClass(): void
    {
        $content = "<?php\n\ndeclare(strict_types=1);\n\nnamespace App\Http\Repositories;\n\nclass $this->class_name"." implements " .$this->class_name."Interface\n{\n\n}";
        file_put_contents($this->repository_name, $content);
    }

    public function createRepositoryInterface(): void
    {
        $content = "<?php\n\ndeclare(strict_types=1);\n\nnamespace App\Http\Repositories;\n\ninterface $this->class_name"."Interface\n{\n\n}";
        file_put_contents($this->interface_name, $content);
    }

    /**
     * 同じ名前のRepositoryがあるか確認
     * @return bool
     */
    private function isRepositoryExists(): bool
    {
        return file_exists($this->repository_name);
    }

    /**
     * 同じ名前のInterfaceがあるか確認
     * @return bool
     */
    private function isInterfaceExists(): bool
    {
        return file_exists($this->interface_name);
    }

    /**
     * Repositoryディレクトリが存在するか確認
     *
     * @return boolean
     */
    private function isDirectoryExists(): bool
    {
        return file_exists(self::REPOSITORY_PATH);
    }

    /**
     * Repositoryディレクトリを作成
     *
     * @return void
     */
    private function createDirectory(): void
    {
        mkdir(self::REPOSITORY_PATH, 0755, true);
    }
}
