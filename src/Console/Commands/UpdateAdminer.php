<?php

namespace Ladminer\Console\Commands;

use Illuminate\Console\Command;

class UpdateAdminer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ladminer:update';

    /**
     * @var Filesystem $files
     */
    protected $files;

    /**
     * @var String $filename
     */
    protected $filename;

    /**
     * @var String $version
     */
    protected $version;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update adminer to latest.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;

        $resources      = realpath(dirname(__FILE__).'/../resources');
        $this->version  = $resources.'/version';
        $this->filename = $resources.'/adminer.php';
        $this->tmpfile  = $resources.'/tmp.php';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $latest_version = $this->get('https://api.github.com/repos/vrana/adminer/releases/latest');

        if (!$latest_version || $latest_version->getStatusCode() != '200') {
            $this->error('Adminer: latest release no found??');

            return;
        }
        $latest_version = json_decode((string) $latest_version->getBody())->tag_name;

        try {
            $last_version = $this->files->get($this->version);
        } catch (\Exception $e) {
            // do not care if file not found...
            $this->info('Adminer: no last version, welcome!');
            $last_version = false;
        }

        if ($latest_version != $last_version) {
            $result = $this->get('http://www.adminer.org/latest.php', ['sink' => $this->filename]);

            if ($result && $result->getStatusCode() == '200') {
                $this->all_sed_and_done();
                $this->files->put($this->version, $latest_version);
                $this->info('Adminer: updated!');
            } else {
                $this->error('Adminer: '.$result->getStatusCode().' :: file not downloaded?');
            }
        } else {
            $this->info('Adminer: already latest version!');
        }
    }
}
