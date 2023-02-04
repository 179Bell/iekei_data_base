<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateActions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // make:actions HogeActions
    protected $signature = 'make:action {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new actions class';

    /**
     * Actionsディレクトリへのパス
     */
    protected const ACTIONS_PATH = 'app/Http/Actions/';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->class_name = $this->argument('name');
        $this->file_name = self::ACTIONS_PATH.$this->class_name.'.php';

        if (! $this->isDirectoryExists()) {
            $this->createDirectory();
        }

        if ($this->isExistFiles()) {
            $this->error("{$this->class_name} already exist");
            return;
        }

        $this->createActionsClass();
        $this->info("{$this->class_name} created successfully");
    }

    /**
     * Actionsディレクトリが存在するか確認
     *
     * @return boolean
     */
    private function isDirectoryExists(): bool
    {
        return file_exists(self::ACTIONS_PATH);
    }

    /**
     * Actionsクラスを作成
     *
     * @return void
     */
    public function createActionsClass(): void
    {
        $content = "<?php\n\ndeclare(strict_types=1);\n\nnamespace App\Http\Actions;\n\nclass $this->class_name" . " extends Controller\n{\n    public function __construct()\n    {\n\n    }\n\n\n    public function __invoke()\n    {\n\n    }\n}";
        file_put_contents($this->file_name, $content);
    }

    /**
     * 同じ名前のActionsが存在するか確認
     *
     * @return bool
     */
    private function isExistFiles(): bool
    {
        return file_exists($this->file_name);
    }

    /**
     * Actionsディレクトリを作成
     *
     * @return void
     */
    private function createDirectory(): void
    {
        mkdir(self::ACTIONS_PATH, 0755, true);
    }
}
