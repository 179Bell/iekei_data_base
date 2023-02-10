<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateApiActions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:apiaction {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new api actions class';

    /**
     * Actionsディレクトリへのパス
     */
    protected const ACTIONS_PATH = 'app/Http/Actions/api/';

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
     * Actions/apiディレクトリが存在するか確認
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
        $content = <<<EOD
        <?php

        declare(strict_types=1);

        namespace App\Http\Actions\api;

        use App\Http\Controllers\Controller;

        class {$this->class_name} extends Controller
        {
            public function __construct()
            {
            }

            public function __invoke()
            {
            }
        }
        EOD;
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
