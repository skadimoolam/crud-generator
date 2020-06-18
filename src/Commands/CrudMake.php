<?php

namespace Skadimoolam\CrudGenerator\Commands;

use Illuminate\Console\Command;

class CrudMake extends Command
{
    protected $signature = 'crud:make';
    protected $description = 'Generate CRUD relelated files';

    public function handle()
    {
        $modelName = $this->ask('Name of the Model');

        $this->makeModel($modelName);
    }

    protected function makeModel($name)
    {
        $template = str_replace(['{{modelName}}'], [$name], $this->getStub('Model'));

        if (!is_dir(app_path('Models'))) mkdir(app_path('Models'));
        file_put_contents(app_path("/Models/{$name}.php"), $template);

        $this->info('Model Created');
    }

    protected function getStub($type)
    {
        return file_get_contents(__DIR__ . "/../stubs/{$type}.stub");
    }
}
